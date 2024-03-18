<div class="header">
  <div class="header__left">
    <img src="../assets/images/mail_white.png" alt="" class="mail" id="mailIcon"/>
    <h1>php-mail</h1>
  </div>

  <form class="header__middle" id="searchForm">
    <button type="submit" id="searchButton">
        <span class="material-icons"> search </span>
    </button>
    <input type="search" id="searchInput" placeholder="" autocomplete="off" spellcheck="false"/>
  </form>

  <div class="header__right">
      <button class="user">
        <h3 id="username">
          <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Username'; ?>
        </h3>
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