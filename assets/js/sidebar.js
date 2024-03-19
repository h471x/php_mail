// Function to handle click on sidebar option
document.querySelectorAll('.sidebarOption').forEach(option => {
  option.addEventListener('click', function() {
    document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));
    this.classList.add('sidebarOption__active');

    // Get the ID of the clicked sidebar option
    const id = this.id;

    // Map the ID to the corresponding URL
    const urlMap = {
      'inboxOption': '/php_mail/controllers/inbox.php',
      'sentOption': '/php_mail/controllers/sent.php',
      'contactsOption': '/php_mail/controllers/contact.php'
    };

    // Fetch content from the corresponding URL and update the .content div
    fetch(urlMap[id])
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(data => {
        document.querySelector('.content').innerHTML = data;
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  });
});

// Get the compose button
const compose = document.querySelector(".sidebar__compose");
const composeClose = document.querySelector("#closeButton");
const composeContainer = document.querySelector(".composeContainer");
const bodyheader = document.querySelector(".header");
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector(".content");
const overlay = document.querySelector(".overlay");
var isComposeContainer = false;

// When clicked Show/Hide the compose
compose.onclick = function () {
  composeContainer.style.visibility = isComposeContainer ? "hidden" : "visible";
  overlay.style.visibility = isComposeContainer ? "hidden" : "visible";
  // bodyheader.style.filter = !isComposeContainer ? "blur(2px)" : "none";
  // sidebar.style.filter = !isComposeContainer ? "blur(2px)" : "none";
  // content.style.filter = !isComposeContainer ? "blur(2px)" : "none";
  isComposeContainer = !isComposeContainer;
};

// When clicked Show/Hide the compose
composeClose.onclick = function () {
  composeContainer.style.visibility = isComposeContainer ? "hidden" : "visible";
  overlay.style.visibility = isComposeContainer ? "hidden" : "visible";
  isComposeContainer = !isComposeContainer;
};