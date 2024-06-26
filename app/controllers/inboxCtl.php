<?php
  // Get the database connection instance
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  require_once $basePath . "config/php/connect.php";

  // Start session
  session_start();

  // unset($_SESSION['cachedEmails']);

  // Check if emails are already stored in session cache
  if (!isset($_SESSION['cachedEmails'])) {
      // Gmail IMAP settings
      $server = "{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX";
      $user_email = $_SESSION['mail'];

      // Retrieve the 2Fa from database
      $factor_pass_query = "SELECT 2fa_password FROM user WHERE email_user = :email";
      $bind = ':email';
      $stmt = $pdo->prepare($factor_pass_query);
      $stmt->bindParam($bind, $user_email);
      $stmt->execute();

      // Get the user 2fa password to send the mail
      $password = $stmt->fetchColumn();

      // Filter messages from php mail users only
        // Prepare the SQL query
        $query = "SELECT email_user FROM user WHERE email_user != :session_mail";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':session_mail', $_SESSION['mail']);

        // Execute the query
        $statement->execute();

      // Fetch email contacts
      $phpmail_users = $statement->fetchAll(PDO::FETCH_ASSOC);

      // Add phpmail725@gmail.com as default
      $phpmail_users[] = array("email_user" => "mailphp725@gmail.com");

      // Connect to Gmail's IMAP server
      $connection = imap_open($server, $user_email, $password, null, 1);

      if ($connection) {
        // Get the total number of emails
        $total_emails = imap_num_msg($connection);

        // Limit the loop to the last 20 emails
        $total_mails = 20;
        $start_email = max(1, $total_emails - ($total_mails - 1));
        $end_email = $total_emails;

          // Array to store fetched emails
          $fetchedEmails = [];

          // Loop through each email
          for ($email_number = $end_email; $email_number >= $start_email; $email_number--) {
              // Fetch the email header
              $header = imap_headerinfo($connection, $email_number);

              // Extract sender's name and email address
              $sender_info = imap_mime_header_decode($header->from[0]->personal);
              $sender_name = isset($sender_info[0]->text) ? $sender_info[0]->text : "";

              // Extract receiver's name and email address
              $receiver_info = imap_mime_header_decode($header->to[0]->personal);
              $receiver_name = isset($receiver_info[0]->text) ? $receiver_info[0]->text : "";

              // Extract email details
              $sender_email = $header->from[0]->mailbox . "@" . $header->from[0]->host;
              
              // Separate date and time
              $gmt_time = "+3";
              $date = date("Y-m-d", strtotime($header->date));
              $time = date("H:i", strtotime($header->date . $gmt_time . " hours"));
              
              // Extract subject
              $subject = $header->subject;

              // Extract receiver
              $receiver_email = $header->to[0]->mailbox . "@" . $header->to[0]->host;

              // Fetch the email body
              $body = imap_fetchbody($connection, $email_number, 1);

              // If the body is empty or not found in the first part, try finding it in alternative parts
              if (empty($body)) {
                  $body = imap_fetchbody($connection, $email_number, "1.1"); // HTML body
                  if (empty($body)) {
                      $body = imap_fetchbody($connection, $email_number, "1.2"); // Plain text body
                  }
              }

              // If still empty, consider using a default message
              if (empty($body)) {
                  $body = "No message body found.";
              }

              // Decode the body if it's encoded
              $body = imap_utf8($body);                

              // Add email details to the fetched emails array
              $fetchedEmails[] = [
                  "sender_name" => $sender_name,
                  "sender_mail" => $sender_email,
                  "receiver_name" => $receiver_name,
                  "receiver_mail" => $receiver_email,
                  "subject" => $subject,
                  "body" => $body,
                  "date" => $date,
                  "time" => $time
              ];
          }

          // Close the connection
          imap_close($connection);

          // Adjust the structure of $fetchedEmails array
          $formattedEmails = [];
          foreach ($fetchedEmails as $email) {
              // Check if the sender's email is in $phpmail_users
              if (in_array($email["sender_mail"], array_column($phpmail_users, 'email_user'))) {
                  $formattedEmails[] = [
                      "sender_name" => $email["sender_name"],
                      "sender_mail" => $email["sender_mail"],
                      "receiver_name" => $email["receiver_name"],
                      "receiver_mail" => $email["receiver_mail"],
                      "subject" => $email["subject"],
                      "body" => $email["body"],
                      "date" => $email["date"],
                      "time" => $email["time"]
                  ];
              }
          }

          // Store fetched emails in session cache
          $_SESSION['cachedEmails'] = $formattedEmails;
      } else {
          echo "Failed to connect to Gmail's IMAP server: " . imap_last_error() . "\n";
      }
  } else  if (isset($_SESSION['cachedEmails'])){
      // Retrieve cached emails from session cache
      $formattedEmails = $_SESSION['cachedEmails'];
  }

  // Function to generate email rows
  function generateEmailRows($rows) {
      foreach ($rows as $row) {
          echo '
          <div class="emailRow"> 
              <h3 class="emailRow__title">' . ($row["sender_name"] ? $row["sender_name"] : substr($row["sender_mail"], 0, strpos($row["sender_mail"], "@"))) . '</h3>
              <div class="emailRow__message">
                  <h4>' . $row["subject"] . '</h4>
              </div>
              <p class="emailRow__time">' . (($row["date"] == date('Y-m-d')) ? $row["time"] : $row["date"]) . '</p>
              <div class="sender_name" style="display: none;">' . $row['sender_name'] .'</div>
              <div class="sender_mail" style="display: none;">' . $row['sender_mail'] .'</div>
              <div class="sender_formatted" style="display: none;">' . $row['sender_name'] .' &lt;' . $row['sender_mail'] . '&gt;</div>
              <div class="receiver_name" style="display: none;">' . $row['receiver_name'] .'</div>
              <div class="receiver_mail" style="display: none;">' . $row['receiver_mail'] .'</div>
              <div class="subject" style="display: none;">' . $row['subject'] .'</div>
              <div class="body" style="display: none;">' . $row['body'] .'</div>
              <div class="date" style="display: none;">' . $row['date'] .'</div>
              <div class="time" style="display: none;">' . $row['time'] .'</div>
              <div class="date_time" style="display: none;">' . $row['date'] . ' <span class="time_prepo"></span> ' . $row['time'] .'</div>
          </div>
          <div class="emailContent" style="visibility: hidden;">
              <div class="contentHeader">
                  <button class="return">
                      <span class="material-icons">keyboard_arrow_left</span>
                  </button>
                  <button class="delete">
                      <span class="material-icons">delete</span>
                  </button>
              </div>
              <div class="contentBody">
                  <h2 class="emailContent__message"></h2><br>
                  <div class="mail_info">
                      <div style="display: flex; flex-direction: column;">
                          <div style="display: flex; flex-direction: flex-start;">
                              <span class="sender_info"></span>&nbsp;
                              <h4 class="emailContent__title"></h4>
                          </div>
                          <div class="sender_destination" style="margin-top: 0.25rem;"></div>
                      </div>
                      <h5 class="emailContent__time"></h5>
                  </div>
                  <div class="emailContent__body" style="margin-top: 2rem;"></div>
              </div>
          </div>
          ';
      }
  }
?>

<div class="emailList" id="inbox">
  <div class="emailList__list">
    <?php generateEmailRows($formattedEmails); ?>
  </div>
</div>
