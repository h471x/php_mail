
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/font.css"/>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="icon" href="../assets/images/gui_icons/white/mail.png">
    <title>Php Mail</title>
  </head>
  <body>
    <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
        <img src="../assets/images/gui_icons/white/mail.png" alt="" class="mail" id="mailIcon"/>
        <h1>e-mail</h1>
      </div>

      <form class="header__middle" action="">
        <button type="submit">
          <span class="material-icons"> search </span>
        </button>
        <input type="search" id="search" placeholder="" />
      </form>

      <div class="header__right">
        <div class="user">
          <h3 id="username"></h3>
        </div>

        <!-- langage button -->
        <div class="dropdown">
          <button id="languageToggle" class="dropbtn">
            <span class="material-icons">language</span>
            <span class="tooltip" id="lang"></span>
          </button>
          <div id="languageDropdown" class="dropdown-content">
              <div class="dropdown-header" id="language"></div>
                <a href="" id="mgLink">Malagasy
                   <span id="mgCheck" class="checkmark">
                      <span class="material-icons">check</span>
                    </span>
                </a>
                <a href="" id="enLink">English
                    <span id="enCheck" class="checkmark">
                      <span class="material-icons">check</span>
                    </span>
                </a>
                <a href="" id="frLink">Français
                  <span id="frCheck" class="checkmark">
                    <span class="material-icons">check</span>
                  </span>
                </a>
          </div>
        </div>

        <!-- <button>
          <span class="material-icons"> notifications </span>
        </button> -->

        <button class="theme">
          <span class="material-icons" id="light">wb_sunny</span>
        </button>
        <button class="logout">
          <span class="material-icons">exit_to_app</span>
          <span class="tooltip" id="logout"></span>
        </button>
      </div>
    </div>

    <!-- Main Body  -->
    <div class="main__body">
      <!-- Sidebar -->
      <div class="sidebar">
        <button class="sidebar__compose">
          <span class="material-icons"> add </span>
          <h3 class="compose" id="new"></h3>
        </button>
        <div class="sidebarOption sidebarOption__active">
          <span class="material-icons"> inbox </span>
          <h3 id="inbox"></h3>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> near_me </span>
          <h3 id="sent"></h3>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> person </span>
          <h3 id="contacts">Contacts</h3>
        </div>
      </div>

      <!-- Email List  -->
      <div class="emailList">
        <ul>
          <!-- <div class="inbox"> -->
            <li>
              <?php require_once "./inbox.php" ?>
            </li>
        <!-- </div> -->
        <!-- <div class="sent">
        <?php require_once "./send.php" ?>
        </div>
        <div class="contacts">
        <?php require_once "./contact.php" ?>
        </div> -->
        </ul>
        
      </div>
    </div>
  </body>
  <script src="../assets/js/theme.js"></script>
  <script src="../assets/js/sidebar.js"></script>
  <script src="../assets/js/logout.js"></script>
  <script src="../assets/js/dictionary.js"></script>
  <script src="../assets/js/language.js"></script>
</html>
