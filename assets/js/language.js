// Declare and initialize variables
var languagePreference = localStorage.getItem('languagePreference') || 'fr';
var firstClick = true;
var dropdown = document.getElementById('languageDropdown');
var tooltip = document.querySelector('.tooltip');
var dropbtn = document.querySelector('.dropbtn');

// Function to update labels based on language dictionary
function updateLabels(languageDict) {
  document.getElementById("usernameLabel").textContent = languageDict.username;
  document.getElementById("logout").textContent = languageDict.logout;
  document.getElementById("new").textContent = languageDict.new;
  document.getElementById("inbox").textContent = languageDict.inbox;
  document.getElementById("sent").textContent = languageDict.sent;
  document.getElementById("language").textContent = languageDict.language;
  document.getElementById("lang").textContent = languageDict.lang;
  document.getElementById("searchInput").placeholder = languageDict.search;
}

// Function to load language labels based on preference
function loadLanguageLabels(language) {
  if (languageDictionaries[language]) {
    updateLabels(languageDictionaries[language]);
    localStorage.setItem('languagePreference', language);
  } else {
    console.error('Language dictionary not found for:', language);
  }
}

// Load the language labels if the language preference is set
if (languagePreference) {
  loadLanguageLabels(languagePreference);
}

// Function to change language
function changeLanguage(newLanguage) {
  if (newLanguage !== languagePreference) {
    loadLanguageLabels(newLanguage);
    languagePreference = newLanguage;
    localStorage.setItem('defaultLanguagePreference', newLanguage);
    updateCheckmarks();
  }
}

// Function to update checkmark icons based on language preference
function updateCheckmarks() {
  document.getElementById('frCheck').style.display = (languagePreference === 'fr') ? 'inline-block' : 'none';
  document.getElementById('enCheck').style.display = (languagePreference === 'en') ? 'inline-block' : 'none';
}

// Function to hide the dropdown with a delay
function hideDropdownWithDelay() {
  setTimeout(function() {
    dropdown.style.display = 'none';
    dropbtn.classList.remove('clicked');
    firstClick = true;
  }, 250);
}

// Add an event listener to the button to toggle the dropdown
document.getElementById('languageToggle').addEventListener('click', function() {
  // Toggle dropdown visibility
  dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';

  // Apply styles based on first click or subsequent clicks
  if (firstClick) {
    dropbtn.classList.add('clicked');
    firstClick = false;
  } else {
    dropbtn.classList.remove('clicked');
    firstClick = true;
  }

  // Hide tooltip if dropdown is visible
  if (dropdown.style.display === 'block') {
    tooltip.style.visibility = 'hidden';
  }
});

// Add an event listener to the button to hide the tooltip when the mouse hovers over it
dropbtn.addEventListener('mouseover', function() {
  tooltip.style.visibility = (dropdown.style.display === 'block') ? 'hidden' : 'visible';
});

// Add an event listener to the button to show the tooltip when the mouse leaves it
dropbtn.addEventListener('mouseout', function() {
  tooltip.style.visibility = 'hidden';
});

// Add event listeners to language options to change the language and hide the dropdown with delay
document.getElementById('frLink').addEventListener('click', function() {
  changeLanguage('fr');
  hideDropdownWithDelay();
});

document.getElementById('enLink').addEventListener('click', function() {
  changeLanguage('en');
  hideDropdownWithDelay();
});

// Load the checkmark icons based on initial language preference
updateCheckmarks();
