// Declare and initialize variables
let languagePreference = localStorage.getItem('languagePreference') || 'fr';
const dropdown = document.getElementById('languageDropdown');
const dropbtn = document.querySelector('.dropbtn');
const toggleBtn = document.getElementById('languageToggle');
const tooltip = document.querySelector('.tooltip');
let emailListScrollPosition = 0;
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
  document.getElementById("composetitle").textContent = languageDict.composetitle;
  document.getElementById("lang").textContent = languageDict.lang;
  document.getElementById("send_compose").value = languageDict.send_compose;
  document.getElementById("searchInput").placeholder = languageDict.search;
  document.getElementById("destinationUser").placeholder = languageDict.destination;
  document.getElementById("subject").placeholder = languageDict.subject;
  document.getElementById("mailmessage").placeholder = languageDict.mailmessage;
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
  }, 500);
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
frLink.addEventListener('click', (event) => {
  event.preventDefault();
  changeLanguage('fr');
  hideDropdownWithDelay();
});

enLink.addEventListener('click', (event) => {
  event.preventDefault();
  changeLanguage('en');
  hideDropdownWithDelay();
});

mgLink.addEventListener('click', (event) => {
  event.preventDefault();
  changeLanguage('mg');
  hideDropdownWithDelay();
});

// Load the checkmark icons based on initial language preference
updateCheckmarks();

// Handle row clicking
document.addEventListener('click', function(event) {
  const emailRow = event.target.closest('.emailRow');
  const emailList = document.querySelector('.emailList');

  if (emailRow) {
    // Deactivate all rows
    document.querySelectorAll('.emailRow').forEach(row => {
      row.classList.remove('row_active');
    });

    // Make the clicked row active
    emailRow.classList.add('row_active');

    // Show the mail content
    showEmailContent(emailRow);

    // Hide the scrollbar
    emailList.classList.add('hide-scrollbar');
    emailList.classList.add('disable-scroll');

    // Store the current scroll position
    emailListScrollPosition = emailList.scrollTop;

    // Scroll the emailList to the top
    emailList.scrollTop = 0;
  }
});

// Hide the content when pressing return button
document.addEventListener('click', function(event) {
  const returnButton = event.target.closest('.return');
  const emailList = document.querySelector('.emailList');

  if (returnButton) {
    // Restore the scroll position
    emailList.scrollTop = emailListScrollPosition;

    // Show scrollbar
    emailList.classList.remove('hide-scrollbar');
    emailList.classList.remove('disable-scroll');

    // Hide the email content
    toggleEmailContentVisibility();
  }
});

// Function to show email content
function showEmailContent(emailRow) {
  // Get the mail data
  var message = emailRow.querySelector('.emailRow__message h4').textContent;
  var senderFormatted = emailRow.querySelector('.sender_formatted').textContent;
  var body = emailRow.querySelector('.body').innerHTML;
  var datetime = emailRow.querySelector('.date_time').textContent;

  // Append the data to the content preview
  document.querySelector('.emailContent__title').textContent = senderFormatted;
  document.querySelector('.emailContent__message').textContent = message;
  document.querySelector('.emailContent__time').textContent = datetime;
  document.querySelector('.emailContent__body').innerHTML = body;

  // Show email content
  toggleEmailContentVisibility();
}

// Function to toggle email content visibility
function toggleEmailContentVisibility() {
  var emailContent = document.querySelector('.emailContent');
  let isContentHidden = emailContent.style.visibility === "hidden";
  emailContent.style.visibility = (isContentHidden) ? "visible" : "hidden";
}