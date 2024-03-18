// Declare and initialize variables
let languagePreference = localStorage.getItem('languagePreference') || 'fr';
const dropdown = document.getElementById('languageDropdown');
const dropbtn = document.querySelector('.dropbtn');
const toggleBtn = document.getElementById('languageToggle');
const tooltip = document.querySelector('.tooltip');
let firstClick = true;

// Declare constants for language links and checkmarks
const frLink = document.getElementById('frLink');
const enLink = document.getElementById('enLink');
const mgLink = document.getElementById('mgLink');
const frCheck = document.getElementById('frCheck');
const enCheck = document.getElementById('enCheck');
const mgCheck = document.getElementById('mgCheck');

// Function to update labels based on language dictionary
const updateLabels = (languageDict) => {
  document.getElementById("logout").textContent = languageDict.logout;
  document.getElementById("new").textContent = languageDict.new;
  document.getElementById("inbox").textContent = languageDict.inbox;
  document.getElementById("sent").textContent = languageDict.sent;
  document.getElementById("contacts").textContent = languageDict.contacts;
  document.getElementById("language").textContent = languageDict.language;
  document.getElementById("lang").textContent = languageDict.lang;
  document.getElementById("search").placeholder = languageDict.search;
};

// Function to load language labels based on preference
const loadLanguageLabels = (language) => {
  if (languageDictionaries[language]) {
    updateLabels(languageDictionaries[language]);
    localStorage.setItem('languagePreference', language);
  } else {
    console.error('Language dictionary not found for:', language);
  }
};

// Load the language labels if the language preference is set
languagePreference && loadLanguageLabels(languagePreference);

// Function to change language
const changeLanguage = (newLanguage) => {
  if (newLanguage !== languagePreference) {
    loadLanguageLabels(newLanguage);
    languagePreference = newLanguage;
    localStorage.setItem('defaultLanguagePreference', newLanguage);
    updateCheckmarks();
  }
};

// Function to update checkmark icons based on language preference
const updateCheckmarks = () => {
  frCheck.style.display = (languagePreference === 'fr') ? 'inline-block' : 'none';
  enCheck.style.display = (languagePreference === 'en') ? 'inline-block' : 'none';
  mgCheck.style.display = (languagePreference === 'mg') ? 'inline-block' : 'none';
};

// Function to hide the dropdown with a delay
const hideDropdownWithDelay = () => {
  setTimeout(() => {
    dropdown.style.display = 'none';
    dropbtn.classList.remove('clicked');
    firstClick = true;
  }, 250);
};

// Toggle dropdown with button click
toggleBtn.onclick = () => {
  dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
  firstClick ? dropbtn.classList.add('clicked') : dropbtn.classList.remove('clicked');
  firstClick = !firstClick;
  tooltip.style.visibility = (dropdown.style.display === 'block') ? 'hidden' : '';
};

// Hide tooltip on mouseover
dropbtn.onmouseover = () => {
  tooltip.style.visibility = (dropdown.style.display === 'block') ? 'hidden' : 'visible';
};

// Show tooltip on mouseout
dropbtn.onmouseout = () => {
  tooltip.style.visibility = 'hidden';
};

// Change language and hide dropdown on language option click
frLink.onclick = () => {
  changeLanguage('fr');
  hideDropdownWithDelay();
};

enLink.onclick = () => {
  changeLanguage('en');
  hideDropdownWithDelay();
};

mgLink.onclick = () => {
  changeLanguage('mg');
  hideDropdownWithDelay();
};

// Load the checkmark icons based on initial language preference
updateCheckmarks();