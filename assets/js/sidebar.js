// Function to handle click on sidebar option
document.querySelectorAll('.sidebarOption').forEach(option => {
  option.addEventListener('click', function() {
    document.querySelectorAll('.sidebarOption').forEach(opt => opt.classList.remove('sidebarOption__active'));
    this.classList.add('sidebarOption__active');

    // Get the ID of the clicked sidebar option
    const id = this.id;

    // Map the ID to the corresponding URL
    const urlMap = {
      'inboxOption': '/php_mail/app/controllers/inboxCtl.php',
      'sentOption': '/php_mail/app/controllers/sentCtl.php',
      'contactsOption': '/php_mail/app/controllers/contactCtl.php'
    };

    const updateLabels = (languageDict) => {
      document.querySelectorAll(".sender_info").forEach(function(element) {
        element.textContent = languageDict.sender_info;
      });
      document.querySelectorAll(".sender_destination").forEach(function(element) {
        element.textContent = languageDict.sender_destination;
      });
      document.querySelectorAll(".receiver_destination").forEach(function(element) {
        element.textContent = languageDict.receiver_destination;
      });
      document.querySelectorAll(".receiver_info").forEach(function(element) {
        element.textContent = languageDict.receiver_info;
      });
      document.querySelectorAll(".time_prepo").forEach(function(element) {
        element.textContent = languageDict.time_prepo;
      });
    };

    // Fetch content from the corresponding URL and update the .content div
    fetch(urlMap[id])
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(data => {
        document.querySelector('.content').innerHTML = data;
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
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  });
});

// Get the compose container buttons
const composeButton = document.querySelector(".sidebar__compose");
const composeClose = document.querySelector("#closeButton");
const composeReduce = document.querySelector("#reduceButton");
const composeContainer = document.querySelector(".composeContainer");
const overlay = document.querySelector(".overlay");
const destination = document.querySelector("#destinationUser");
const subject = document.querySelector("#subject");
const message = document.querySelector(".mail_message");
var isComposeContainer = false;
var isComposeReduced = false;

// Center an element
function centerElement(element){
  element.style.visibility = "visible";
  element.style.position = "fixed";
  element.style.top = "50%";
  element.style.left = "50%";
  element.style.transform = "translate(-50%, -50%)";
}

// Reset values
function resetValue(...elements) {
  elements.forEach(element => {
    element.value = "";
  });
}

// Focus the first element without a value, or the last element if all elements have values
function focusElement(...elements) {
  if (elements.some(element => element.value === "")) {
    elements.find(element => element.value === "").focus();
  } else {
    elements[elements.length - 1].focus();
  }
}

// Toggle visibility
function toggleVisibility(element, condition){
  element.style.visibility = condition ? "hidden" : "visible";
}

// When clicked Show/Hide the compose
composeButton.onclick = (event) => {
  if (!isComposeReduced) {
    toggleVisibility(composeContainer, isComposeContainer);
    toggleVisibility(overlay, isComposeContainer);
    isComposeContainer = !isComposeContainer;
    composeContainer.style.top = "50%";
    composeContainer.style.left = "50%";
    composeContainer.style.transform = "translate(-50%, -50%)";
    focusElement(destination, subject, message);
    resetValue(message);
  } else {
    overlay.style.visibility = "visible";
    centerElement(composeContainer);
    focusElement(destination, subject, message);
    isComposeReduced = false;
  }
};

// When Close button is clicked hide the compose
composeClose.onclick = function () {
  resetValue(destination, subject, message);
  toggleVisibility(composeContainer, isComposeContainer);
  toggleVisibility(overlay, isComposeContainer);
  composeContainer.style.position = "fixed";
  composeContainer.style.bottom = "0";
  composeContainer.style.left = "50%";
  composeContainer.style.transform = "translateX(-50%)";
  isComposeContainer = !isComposeContainer;
  isComposeReduced = false;
};


// When clicked Show/Reduce the compose
composeReduce.onclick = (event) => {
  event.preventDefault();
  if (!isComposeReduced) {
    centerElement(composeContainer);
    overlay.style.visibility = "hidden";
    composeContainer.style.visibility = "visible";
    composeContainer.style.position = "fixed";
    composeContainer.style.bottom = "0";
    composeContainer.style.left = "50%";
    composeContainer.style.transform = "translate(-50%, 50%)";
  } else {
    overlay.style.visibility = "visible";
    centerElement(composeContainer);
    focusElement(destination, subject, message);
  }
  isComposeReduced = !isComposeReduced;
}
