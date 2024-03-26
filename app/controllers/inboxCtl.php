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
        $username = $_SESSION['mail'];

        // Retrieve the 2Fa from database
        $factor_pass_query = "SELECT 2fa_password FROM user WHERE email_user = :email";
        $bind = ':email';
        $stmt = $pdo->prepare($factor_pass_query);
        $stmt->bindParam($bind, $username);
        $stmt->execute();

        // Get the user 2fa password to send the mail
        $password = $stmt->fetchColumn();

        // Connect to Gmail's IMAP server
        $connection = imap_open($server, $username, $password, null, 1);

        if ($connection) {
            // Search for all emails in the INBOX
            $emails = imap_search($connection, 'ALL');

            if ($emails === false) {
                echo "Error searching for emails: " . imap_last_error() . "\n";
            } else {
                // Array to store fetched emails
                $fetchedEmails = [];

                // Loop through each email
                $count = 0;
                foreach (array_reverse($emails) as $email_number) {
                    // Fetch the email structure
                    $structure = imap_fetchstructure($connection, $email_number);

                    // Extract email details
                    $header = imap_headerinfo($connection, $email_number);
                    $title = $header->fromaddress;
                    $message = $header->subject;
                    $description = isset($structure->parts[0]->parts[0]->parts[0]->body) ? $structure->parts[0]->parts[0]->parts[0]->body : '';
                    $time = $header->date;

                    // Add email details to the fetched emails array
                    $fetchedEmails[] = [
                        "title" => $title,
                        "message" => $message,
                        "description" => $description,
                        "time" => $time
                    ];

                    // Increment count
                    $count++;

                    // Break loop if count reaches 10
                    if ($count >= 20) {
                        break;
                    }
                }

                // Close the connection
                imap_close($connection);

                // Store fetched emails in session cache
                $_SESSION['cachedEmails'] = $fetchedEmails;
            }
        } else {
            echo "Failed to connect to Gmail's IMAP server: " . imap_last_error() . "\n";
        }
    } else {
        // Retrieve cached emails from session cache
        $fetchedEmails = $_SESSION['cachedEmails'];
    }

    // Adjust the structure of $fetchedEmails array
    $formattedEmails = [];
    foreach ($fetchedEmails as $email) {
        $formattedEmails[] = [
            "title" => $email["title"],
            "message" => $email["message"],
            "description" => $email["description"],
            "time" => $email["time"]
        ];
    }

    // Function to generate email rows
    function generateEmailRows($rows) {
        foreach ($rows as $row) {
            echo '
            <div class="emailRow">
                <div class="emailRow__options">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <!-- <span class="material-icons"> star_border </span> -->
                    <!-- <span class="material-icons"> label_important </span> -->
                </div>
                <h3 class="emailRow__title">' . $row["title"] . '</h3>
                <div class="emailRow__message">
                    <h4>' . $row["message"] . '<span class="emailRow__description"> - ' . $row["description"] . '</span></h4>
                </div>
                <p class="emailRow__time">' . $row["time"] . '</p>
            </div>
            ';
        }
    }
?>

<div class="emailList" id="inbox">
  <div class="emailList__list">
    <?php generateEmailRows($formattedEmails); ?>
    <div class="emailContent" style="visibility: hidden;">
        <button class="return">back</button>
        <h2 class="emailContent__title"></h2>
        <p class="emailContent__description"></p>
        <p class="emailContent__message"></p>
        <p class="emailContent__time"></p>
    </div>
  </div>
</div>