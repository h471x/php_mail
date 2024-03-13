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

// Load the language preference from localStorage or set a default
var languagePreference = localStorage.getItem('languagePreference') || 'fr';

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
    var dropdown = document.getElementById('languageDropdown');
    dropdown.style.display = 'none';
  }, 250);
}

// Add an event listener to the button to toggle the dropdown
document.getElementById('languageToggle').addEventListener('click', function() {
  var dropdown = document.getElementById('languageDropdown');
  var tooltip = document.querySelector('.tooltip');
  dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
  if (dropdown.style.display === 'block') {
    tooltip.style.visibility = 'hidden';
  }
});

// Add an event listener to the button to hide the tooltip when the mouse hovers over it
document.querySelector('.dropbtn').addEventListener('mouseover', function() {
  var dropdown = document.getElementById('languageDropdown');
  var tooltip = document.querySelector('.tooltip');
  if (dropdown.style.display === 'block') {
    tooltip.style.visibility = 'hidden';
  } else {
    tooltip.style.visibility = 'visible';
  }
});

// Add an event listener to the button to show the tooltip when the mouse leaves it
document.querySelector('.dropbtn').addEventListener('mouseout', function() {
  var tooltip = document.querySelector('.tooltip');
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



