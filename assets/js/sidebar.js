// Function to handle click on sidebar option
function handleSidebarOptionClick() {
  document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));
  this.classList.add('sidebarOption__active');
}

document.querySelectorAll('.sidebarOption').forEach(option => {
  option.addEventListener('click', handleSidebarOptionClick);
});