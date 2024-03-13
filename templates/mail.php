
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Font Icons -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
    <link rel="stylesheet" href="../assets/css/font.css"/>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="icon" href="../assets/images/gui_icons/white/mail.png">
    <title>Php Mail</title>
  </head>
  <body>
    <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
        <!-- <span class="material-icons"> menu </span> -->
        <img src="../assets/images/gui_icons/white/mail.png" alt="" class="mail" id="mailIcon"/>
        <h1>e-mail</h1>
          <!-- src="https://i.pinimg.com/originals/ae/47/fa/ae47fa9a8fd263aa364018517020552d.png" -->
      </div>

      <form class="header__middle" action="">
        <button type="submit">
          <span class="material-icons"> search </span>
        </button>
        <input type="search" id="search" placeholder="" />
        <!-- <span class="material-icons"> arrow_drop_down </span> -->
      </form>

      <div class="header__right">
        <!-- <span class="material-icons"> apps </span>
        <span class="material-icons"> notifications </span>
        <span class="material-icons"> account_circle </span> -->
        <div class="user">
          <h3 id="username"></h3>
          <!-- <span>example@mail.com</span> -->
        </div>

        <!-- langage button -->
        <div class="dropdown">
          <button id="languageToggle" class="dropbtn">
            <span class="material-icons">arrow_drop_down</span>
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
          <!-- here for the dark mode -->
          <!-- <span class="material-icons">brightness_3</span> -->
        </button>
        <button class="logout">
          <span class="material-icons">exit_to_app</span>
          <span class="tooltip" id="logout"></span>
        </button>
        <!-- <img src="./gui_icons/white/user_circle.png" alt="" class="gui_icon"/> -->
      </div>
    </div>
    <!-- Header Ends -->

    <!-- Main Body Starts -->
    <div class="main__body">
      <!-- Sidebar Starts -->
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

        <!-- <div class="sidebarOption">
          <span class="material-icons"> label_important </span>
          <h3>Important</h3>
        </div> -->

        <!-- <div class="sidebarOption">
          <span class="material-icons"> star </span>
          <h3>Starred</h3>
        </div>

        <div class="sidebarOption">
          <span class="material-icons"> access_time </span>
          <h3>Snoozed</h3>
        </div> -->



        <!-- <div class="sidebarOption">
          <span class="material-icons"> note </span>
          <h3>Drafts</h3>
        </div> -->
        <!-- <div class="sidebarOption">
          <span class="material-icons"> expand_more </span>
          <h3>More</h3>
        </div> -->

        <!-- <div class="sidebar__footer"> -->
        <!--   <div class="sidebar__footerIcons"> -->
        <!--     <span class="material-icons"> person </span> -->
        <!--     <span class="material-icons"> duo </span> -->
        <!--     <span class="material-icons"> phone </span> -->
        <!--   </div> -->
        <!-- </div> -->
      </div>
      <!-- Sidebar Ends -->

      <!-- Email List Starts -->
      <div class="emailList">
        <!-- Settings Starts -->
        <!-- <div class="emailList__settings">
          <div class="emailList__settingsLeft">
            <input type="checkbox" /> -->
            <!-- <span class="material-icons"> arrow_drop_down </span>
            <span class="material-icons"> redo </span>
            <span class="material-icons"> more_vert </span> -->
          <!-- </div>
          <div class="emailList__settingsRight"> -->
            <!-- <span class="material-icons"> chevron_left </span>
            <span class="material-icons"> chevron_right </span> -->
            <!-- <span class="material-icons"> keyboard_hide </span> -->
            <!-- <span class="material-icons"> settings </span>
          </div>
        </div> -->
        <!-- Settings Ends -->

        <!-- Section Starts -->
        <!-- <div class="emailList__sections"> -->
        <!--   <div class="section section__selected"> -->
        <!--     <span class="material-icons"> inbox </span> -->
        <!--     <h4>Primary</h4> -->
        <!--   </div> -->
        <!---->
        <!--   <div class="section"> -->
        <!--     <span class="material-icons"> people </span> -->
        <!--     <h4>Social</h4> -->
        <!--   </div> -->
        <!---->
        <!--   <div class="section"> -->
        <!--     <span class="material-icons"> local_offer </span> -->
        <!--     <h4>Promotions</h4> -->
        <!--   </div> -->
        <!-- </div> -->
        <!-- Section Ends -->

        <!-- Email List rows starts -->
        <div class="emailList__list">
          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber<span class="emailRow__description">
                  - on Your Channel Future Coders
                </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">Google</h3>

            <div class="emailRow__message">
              <h4>
                Login on New Device<span class="emailRow__description">
                  - is this your Device ?
                </span>
              </h4>
            </div>

            <p class="emailRow__time">2am</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber<span class="emailRow__description">
                  - on Your Channel Future Coders
                </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">Google</h3>

            <div class="emailRow__message">
              <h4>
                Login on New Device<span class="emailRow__description">
                  - is this your Device ?
                </span>
              </h4>
            </div>

            <p class="emailRow__time">2am</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber<span class="emailRow__description">
                  - on Your Channel Future Coders
                </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">Google</h3>

            <div class="emailRow__message">
              <h4>
                Login on New Device<span class="emailRow__description">
                  - is this your Device ?
                </span>
              </h4>
            </div>

            <p class="emailRow__time">2am</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber<span class="emailRow__description">
                  - on Your Channel Future Coders
                </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">Google</h3>

            <div class="emailRow__message">
              <h4>
                Login on New Device<span class="emailRow__description">
                  - is this your Device ?
                </span>
              </h4>
            </div>

            <p class="emailRow__time">2am</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber
                <span class="emailRow__description"> - on Your Channel Future Coders </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">YouTube</h3>

            <div class="emailRow__message">
              <h4>
                You Got a New Subscriber<span class="emailRow__description">
                  - on Your Channel Future Coders
                </span>
              </h4>
            </div>

            <p class="emailRow__time">10pm</p>
          </div>
          <!-- Email Row Ends -->

          <!-- Email Row Starts -->
          <div class="emailRow">
            <div class="emailRow__options">
              <!-- <input type="checkbox" name="" id="" /> -->
              <!-- <span class="material-icons"> star_border </span> -->
              <!-- <span class="material-icons"> label_important </span> -->
            </div>

            <h3 class="emailRow__title">Google</h3>

            <div class="emailRow__message">
              <h4>
                Login on New Device<span class="emailRow__description">
                  - is this your Device ?
                </span>
              </h4>
            </div>

            <p class="emailRow__time">2am</p>
          </div>
          <!-- Email Row Ends -->
        </div>
        <!-- Email List rows Ends -->
      </div>
      <!-- Email List Ends -->
    </div>
    <!-- Main Body Ends -->
  </body>
  <script src="../assets/js/theme.js"></script>
  <script src="../assets/js/sidebar.js"></script>
  <script src="../assets/js/logout.js"></script>
  <script src="../assets/js/dictionary.js"></script>
  <script src="../assets/js/language.js"></script>
</html>
