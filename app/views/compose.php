<?php
  $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
  require_once $basePath . "config/php/connect.php";
  session_start();
  $email_propriate = $_SESSION['mail'];

  // Prepare and execute the query to fetch contacts
  $contact_query = "SELECT email_contact FROM contact WHERE email_propriate = :email_propriate";
  $contact = $pdo->prepare($contact_query);
  $contact->bindParam(':email_propriate', $email_propriate);
  $contact->execute();
  $contacts = $contact->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="composeContainer" id="composeContainer" style="visibility: hidden;">
  <div class="composeHeader" id="composeHeader">
    <div class="title">
    <span class="material-icons">create</span>&nbsp;
      <p class="composetitle" id="composetitle"></p>
    </div>
    <div class="navbtn">
      <button id="reduceButton" class="compose reduce">
        <span class="material-icons">remove</span>
      </button>
      <button id="closeButton" class="compose close">
        <span class="material-icons">close</span> 
      </button>
    </div>
  </div>
  <form method="post" action="/php_mail/app/controllers/composeCtl.php" class="composeForm">
      <div class="newContainer">
        <div class="destination">
          <select id="destinationUser" name="destination" class="destination">
            <option value=""class="select_title" id="select_title" disabled select></option>
            <?php
              foreach ($contacts as $contact) {
                echo '<option value="' . $contact['email_contact'] . '">' . $contact['email_contact'] . '</option>';
              }
            ?>
          </select>
        </div>

        <div class="subject">
          <input type="text" placeholder="" class="subject" id="subject" spellcheck="false" autocomplete="off" name="subject">
        </div>
        <div class="messageToSend">
          <textarea name="mail_message" id="mailmessage" cols="30" rows="11" class="mail_message" spellcheck="false" placeholder="" style="resize: none;"></textarea>
        </div>
        <div class="composeBottom">
          <div class="send">
            <input type="submit" class="compose-submit text" value="" id="send_compose" style="color: white;">
          </div>
        </div>
      </div>
  </form>
</div>