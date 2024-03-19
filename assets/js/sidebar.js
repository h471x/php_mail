// Function to handle click on sidebar option
document.querySelectorAll('.sidebarOption').forEach(option => {
  option.addEventListener('click', function() {
    document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));
    this.classList.add('sidebarOption__active');
  });
});

// Get the compose button
const compose = document.querySelector(".sidebar__compose");
const composeClose = document.querySelector("#closeButton");
const composeContainer = document.querySelector(".composeContainer");
const bodyheader = document.querySelector(".header");
const sidebar = document.querySelector(".sidebar");
const content = document.querySelector(".content");
var isComposeContainer = false;

// When clicked Show/Hide the compose
compose.onclick = function () {
  composeContainer.style.visibility = isComposeContainer ? "hidden" : "visible";
  // bodyheader.style.filter = !isComposeContainer ? "blur(2px)" : "none";
  // sidebar.style.filter = !isComposeContainer ? "blur(2px)" : "none";
  // content.style.filter = !isComposeContainer ? "blur(2px)" : "none";
  isComposeContainer = !isComposeContainer;
};

// When clicked Show/Hide the compose
composeClose.onclick = function () {
  composeContainer.style.visibility = isComposeContainer ? "hidden" : "visible";
  isComposeContainer = !isComposeContainer;
};