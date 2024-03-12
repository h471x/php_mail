// Handle Clicked Sidebar Option

// Get all sidebarOption elements
const sidebarOptions = document.querySelectorAll('.sidebarOption');

// Add click event listener to each sidebarOption
sidebarOptions.forEach(option => {
  option.addEventListener('click', function() {
    // Check if clicked sidebarOption already has sidebarOption__active class
    const isActive = this.classList.contains('sidebarOption__active');

    if (!isActive) {
      // Remove sidebarOption__active class from all sidebarOptions
      sidebarOptions.forEach(option => {
        option.classList.remove('sidebarOption__active');
      });

      // Add sidebarOption__active class to the clicked sidebarOption
      this.classList.add('sidebarOption__active');
    }
  });
});