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