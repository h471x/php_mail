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
const iframe = document.querySelector(".iframe");
var isIframeVisible = false;

// When clicked Show/Hide the compose
compose.onclick = function () {
  iframe.style.visibility = isIframeVisible ? "hidden" : "visible";
  isIframeVisible = !isIframeVisible;
};