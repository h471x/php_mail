<div class="composeContainer" id="composeContainer" style="visibility: hidden;">
  <div class="composeHeader" id="composeHeader">
    <div class="title">
    <span class="material-icons">create</span>&nbsp;
      <p class="composetitle" id="composetitle"></p>
    </div>
    <div class="navbtn">
      <button id="reduceButton" class="compose reduce">
        <span class="material-icons">remove</span> <!-- Using "remove" icon for reduce -->
      </button>
      <button id="closeButton" class="compose close">
        <span class="material-icons">close</span> 
      </button>
    </div>
  </div>
  <form method="post" action="/php_mail/controllers/composeCtl.php" class="composeForm">
      <div class="newContainer">
        <div class="destination">
          <input type="text" placeholder="" class="destination" id="destinationUser" spellcheck="false" autocomplete="off" name="destination">
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