// Authentification handler
const root = document.documentElement;
let languagePreference = localStorage.getItem('languagePreference') || 'fr';
const form = document.querySelector('form');
const authInput = document.getElementById('auth_pass');
const authErrorDisplay = document.getElementById('auth-error');
const toggleAuthButton = document.querySelector(".toggle-auth");
var isPasswordVisible = false;

// Function to update labels based on language dictionary
const updateLabels = (languageDict) => {
  document.getElementById("phpmail_auth").textContent = languageDict.phpmail_auth;
  document.getElementById("mail_auth").textContent = languageDict.mail_auth;
  document.getElementById("authTitle").textContent = languageDict.authTitle;
  document.getElementById("auth_password").textContent = languageDict.auth_password;
  document.getElementById("resend_link").textContent = languageDict.resend_link;
  document.getElementById("auth_mail").textContent = languageDict.auth_mail;
  document.getElementById("auth_desc_title").textContent = languageDict.auth_desc_title;
  document.getElementById("auth_desc").textContent = languageDict.auth_desc;
  document.getElementById("auth_btn").value = languageDict.auth_btn;
  document.getElementById("status_connected").textContent = languageDict.status_connected;
  document.getElementById("status_disconnected").textContent = languageDict.status_disconnected;
  document.getElementById("status_denied").textContent = languageDict.status_denied;
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

// Persistent theme 
let isLight = localStorage.getItem('isLight') === 'true';
isLight ? root.classList.add('light-mode') : null;

// Focus input onload
document.addEventListener('DOMContentLoaded', function() {
  authInput.focus();
});

 // Regular expression : xxxx space xxxx space xxxx
var authPattern = /^[0-9]{4} [0-9]{4} [0-9]{4}$/;

// Add some conditions before submitting the form
form.addEventListener('submit', function(event) {
  let isValid = true;

   // Validate password length
   if (!authInput.value.trim()) {
    event.preventDefault();
    authInput.style.border = '2px solid red';
    authErrorDisplay.textContent = languageDictionaries[languagePreference].fill;
    authErrorDisplay.style.display = 'block';
    isValid = false;
  } else if (authInput.value.length !== 16) {
    event.preventDefault();
    authInput.style.border = '2px solid red';
    authErrorDisplay.textContent = languageDictionaries[languagePreference].auth_lack;
    authErrorDisplay.style.display = 'block';
    isValid = false;
  }else if (authPattern.test(authValue)) {
    event.preventDefault();
    authInput.style.border = '2px solid var(--connected)';
    authErrorDisplay.style.color = 'var(--connected)';
    authErrorDisplay.textContent = '✓';
    authErrorDisplay.style.display = 'block';
  }else{
    authInput.style.border = '2px solid var(--connected)';
    authErrorDisplay.style.color = 'var(--connected)';
    authErrorDisplay.textContent = '✓';
    authErrorDisplay.style.display = 'block';
  }
});

authInput.addEventListener('blur', function (){
  if (!authInput.value.trim()) {
    authInput.style.border = '2px solid var(--border-color)';
    isValid = false;
  }else{
    authInput.style.border = '2px solid var(--connected)';
    authErrorDisplay.style.color = 'var(--connected)';
    authErrorDisplay.textContent = '✓';
    authErrorDisplay.style.display = 'block';
  }
});

// Clear error messages when user starts typing
function handleInput(inputElement, errorDisplay) {
  inputElement.addEventListener('input', function() {
    errorDisplay.style.display = 'none';
    inputElement.style.border = '2px solid var(--github-blue)';
  });

  inputElement.addEventListener('focus', function() {
    inputElement.style.border = '2px solid var(--github-blue)';
    errorDisplay.style.display = 'none';
  });
}

// Handle inputs controls
handleInput(authInput, authErrorDisplay);

// Toggle password visibility
toggleAuthButton.addEventListener('click', function() {
  isPasswordVisible = !isPasswordVisible;
  var type = isPasswordVisible ? 'text' : 'password';
  authInput.setAttribute('type', type);
  toggleAuthButton.querySelector('i').classList.toggle('bx-show');
  toggleAuthButton.querySelector('i').classList.toggle('bx-hide');
  authInput.focus();
});