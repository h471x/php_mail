// Function to handle click on sidebar option
function handleSidebarOptionClick() {
  document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));
  this.classList.add('sidebarOption__active');
}

document.querySelectorAll('.sidebarOption').forEach(option => {
  option.addEventListener('click', handleSidebarOptionClick);
});

// Logout button
document.querySelector('.logout').addEventListener('click', function() {
  window.location.href = '../index.php';
});

// Theme toggleer
const themeButton = document.querySelector('.theme');
const iconSpan = document.querySelector('#light');
const favicon = document.getElementById('mailIcon');
const root = document.documentElement;

// Persistent theme 
let isLight = localStorage.getItem('isLight') === 'true';
isLight ? root.classList.add('light-mode') : null;

const faviconURLs = {
  white: '../assets/images/gui_icons/white/mail.png',
  black: '../assets/images/gui_icons/black/mail.png'
};

// Theme toggler icon
iconSpan.innerHTML = isLight ? 'brightness_3' : 'wb_sunny';

const initialFaviconURL = isLight ? faviconURLs.black : faviconURLs.white;
favicon.setAttribute('src', initialFaviconURL);

// Toggle button
themeButton.addEventListener('click', () => {
  root.classList.toggle('light-mode');
  iconSpan.innerHTML = isLight ? 'wb_sunny' : 'brightness_3';
  isLight = !isLight;
  const faviconURL = isLight ? faviconURLs.black : faviconURLs.white;
  favicon.setAttribute('src', faviconURL);
  localStorage.setItem('isLight', isLight);
});