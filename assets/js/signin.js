//Email & Password handler
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
    passwordErrorDisplay.textContent = 'Please fill this field out';
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  } else if (passwordInput.value.length < 8) {
    event.preventDefault();
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.textContent = 'must be at least 8 characters long';
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  }

  // Validate email format
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailInput.getAttribute('name') === 'email') {
    if (!emailInput.value.trim()) {
      event.preventDefault();
      emailInput.style.border = '2px solid red';
      emailErrorDisplay.textContent = 'Please fill this field out';
      emailErrorDisplay.style.display = 'block';
      isValid = false;
    }else if (!emailRegex.test(emailInput.value)) {
      event.preventDefault();
      emailInput.style.border = '2px solid red';
      emailErrorDisplay.textContent = 'Format : mail@example.com';
      emailErrorDisplay.style.display = 'block';
      isValid = false;
    }
  }else if (!emailInput.value.trim()) {
    event.preventDefault();
    emailInput.style.border = '2px solid red';
    emailErrorDisplay.textContent = 'Please fill this field out';
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
  emailInput.setAttribute('name', name);
  emailInput.setAttribute('id', name);
  var iconElement = toggleUserButton.querySelector('i');
  if (isUser) {
    iconElement.classList.remove('bx', 'bx-envelope');
    iconElement.classList.add('material-icons');
    iconElement.textContent = 'person';
    title.textContent = "Username";
  } else {
    iconElement.classList.add('bx', 'bx-envelope');
    iconElement.classList.remove('material-icons');
    iconElement.textContent = '';
    title.textContent = "E-mail";
  }
  emailInput.focus();
});