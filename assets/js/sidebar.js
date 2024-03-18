// Function to handle click on sidebar option
const handleSidebarOptionClick = function() {
  document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));
  this.classList.add('sidebarOption__active');
};

document.querySelectorAll('.sidebarOption').forEach(option => {
  option.onclick = handleSidebarOptionClick;
});

// Get the compose button
const compose = document.querySelector(".sidebar__compose");
const composeClose = document.querySelector("#closeButton");
const composeContainer = document.querySelector(".composeContainer");
var isComposeContainer = false;

// When clicked Show/Hide the compose
compose.onclick = function () {
  composeContainer.style.visibility = isComposeContainer ? "hidden" : "visible";
  isComposeContainer = !isComposeContainer;
};

// When clicked Show/Hide the compose
composeClose.onclick = function () {
  composeContainer.style.visibility = isComposeContainer ? "hidden" : "visible";
  isComposeContainer = !isComposeContainer;
};