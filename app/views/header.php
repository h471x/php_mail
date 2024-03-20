<div class="header">
  <div class="header__left">
    <img src="/php_mail/assets/images/mail_white.png" alt="" class="mail" id="mailIcon"/>
    <h1>php-mail</h1>
  </div>

  <form class="header__middle" id="searchForm">
    <button type="submit" id="searchButton">
        <span class="material-icons"> search </span>
    </button>
    <input type="search" id="searchInput" placeholder="" autocomplete="off" spellcheck="false"/>
  </form>

  <div class="header__right">
      <button class="userinfo">
        <h3 id="username">
          <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Username'; ?>
        </h3>
        <span class="userTooltip">
          <p id="user_fullname">
            <?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'User Full Name'; ?>
          </p>
          <p is="user-email">
            <?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : 'User e-mail'; ?>
          </p>
        </span>
      </button>

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