//Email & Password handler
const root = document.documentElement;
let languagePreference = localStorage.getItem('languagePreference') || 'fr';
const form = document.querySelector('form');
const passwordInput = document.getElementById('pass');
const emailInput = document.querySelector('input[name="email"]');
const passwordErrorDisplay = document.getElementById('password-error');
const emailErrorDisplay = document.getElementById('email-error');
const togglePasswordButton = document.querySelector(".toggle-password");
const toggleUserButton = document.querySelector(".toggle-user");
const title = document.getElementById('useremail');
var isPasswordVisible = false;
var isUser = false;

// Function to update labels based on language dictionary
const updateLabels = (languageDict) => {
  // document.getElementById("username").textContent = languageDict.username;
  document.getElementById("loginTitle").textContent = languageDict.loginTitle;
  document.getElementById("phpmail_signin").textContent = languageDict.phpmail_signin;
  document.getElementById("useremail").textContent = languageDict.useremail_signin;
  document.getElementById("username").textContent = languageDict.username_signin;
  document.getElementById("new_user").textContent = languageDict.new_user;
  document.getElementById("signin_password").textContent = languageDict.signin_password;
  document.getElementById("status_connected").textContent = languageDict.status_connected;
  document.getElementById("status_disconnected").textContent = languageDict.status_disconnected;
  document.getElementById("status_denied").textContent = languageDict.status_denied;
  document.getElementById("signup_link").textContent = languageDict.signup_link;
  document.getElementById("login_signin").value = languageDict.login_signin;
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
  emailInput.focus();
});

// Add some conditions before submitting the form
form.addEventListener('submit', function(event) {
  let isValid = true;

  // Validate password length
  if (!passwordInput.value.trim()) {
    event.preventDefault();
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.textContent = languageDictionaries[languagePreference].fill;
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  } else if (passwordInput.value.length < 8) {
    event.preventDefault();
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.textContent = languageDictionaries[languagePreference].lack;
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  }

  // Validate email format
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailInput.getAttribute('name') === 'email') {
    if (!emailInput.value.trim()) {
      event.preventDefault();
      emailInput.style.border = '2px solid red';
      emailErrorDisplay.textContent = languageDictionaries[languagePreference].fill;
      emailErrorDisplay.style.display = 'block';
      isValid = false;
    }else if (!emailRegex.test(emailInput.value)) {
      event.preventDefault();
      emailInput.style.border = '2px solid red';
      emailErrorDisplay.textContent = languageDictionaries[languagePreference].format;
      emailErrorDisplay.style.display = 'block';
      isValid = false;
    }
  }else if (!emailInput.value.trim()) {
    event.preventDefault();
    emailInput.style.border = '2px solid red';
    emailErrorDisplay.textContent = languageDictionaries[languagePreference].fill;
    emailErrorDisplay.style.display = 'block';
    isValid = false;
  }

  // If both email and password are valid, proceed with form submission
  if (isValid) {
    // You can add additional submission logic here if needed
    console.log('Form submitted successfully');
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
    errorDisplay.style.display = 'none'
  });

  inputElement.addEventListener('blur', function() {
    inputElement.style.border = '2px solid var(--border-color)';
  });
}

// Handle inputs controls
handleInput(passwordInput, passwordErrorDisplay);
handleInput(emailInput, emailErrorDisplay);

// Toggle password visibility
togglePasswordButton.addEventListener('click', function() {
  isPasswordVisible = !isPasswordVisible;
  var type = isPasswordVisible ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
  togglePasswordButton.querySelector('i').classList.toggle('bx-show');
  togglePasswordButton.querySelector('i').classList.toggle('bx-hide');
  passwordInput.focus();
});

// Toggle user/email login
toggleUserButton.addEventListener('click', function() {
  isUser = !isUser;
  var name = isUser ? 'username' : 'email';
  emailInput.setAttribute('id', name);
  emailInput.setAttribute('name', name);
  var iconElement = toggleUserButton.querySelector('i');
  if (isUser) {
    iconElement.classList.remove('bx', 'bx-envelope');
    iconElement.classList.add('material-icons');
    iconElement.textContent = 'person';
    title.textContent = languageDictionaries[languagePreference].username_signin;
  } else {
    iconElement.classList.add('bx', 'bx-envelope');
    iconElement.classList.remove('material-icons');
    iconElement.textContent = '';
    title.textContent = languageDictionaries[languagePreference].useremail_signin;
  }
  emailInput.focus();
});