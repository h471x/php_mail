// Function to handle click on sidebar option
function handleSidebarOptionClick() {
  // Remove sidebarOption__active class from all sidebarOptions
  document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));

  // Add sidebarOption__active class to the clicked sidebarOption
  this.classList.add('sidebarOption__active');
}

// Add click event listener to each sidebarOption
document.querySelectorAll('.sidebarOption').forEach(option => {
  option.addEventListener('click', handleSidebarOptionClick);
});

const themeButton = document.querySelector('.theme');
const iconSpan = document.querySelector('#light');
const favicon = document.getElementById('mailIcon');
const root = document.documentElement;

// Retrieve the light mode state from localStorage, defaulting to false if not found
let isLight = localStorage.getItem('isLight') === 'true';

// Apply the light mode class to the root element if isLight is true
if (isLight) {
  root.classList.add('light-mode');
}

const faviconURLs = {
  white: '../assets/images/gui_icons/white/mail.png',
  black: '../assets/images/gui_icons/black/mail.png'
};

// Update icon based on the initial light mode state
iconSpan.innerHTML = isLight ? 'brightness_3' : 'wb_sunny';

// Set favicon URL based on the initial light mode state
const initialFaviconURL = isLight ? faviconURLs.black : faviconURLs.white;
favicon.setAttribute('src', initialFaviconURL);

// Add event listener to toggle light mode on button click
themeButton.addEventListener('click', () => {
  // Toggle light mode class on root element
  root.classList.toggle('light-mode');

  // Toggle between icon
  iconSpan.innerHTML = isLight ? 'wb_sunny' : 'brightness_3';

  // Update isLight variable and save state to localStorage
  isLight = !isLight;

  // Update favicon URL based on the light mode state
  const faviconURL = isLight ? faviconURLs.black : faviconURLs.white;
  favicon.setAttribute('src', faviconURL);

  localStorage.setItem('isLight', isLight);
});
