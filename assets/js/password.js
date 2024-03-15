//Email & Password handler
const form = document.querySelector('form');
const passwordInput = document.getElementById('pass');
const emailInput = document.getElementById('email');
const passwordErrorDisplay = document.getElementById('password-error');
const emailErrorDisplay = document.getElementById('email-error');
const togglePasswordButton = document.querySelector(".toggle-password");
var isPasswordVisible = false;

form.addEventListener('submit', function(event) {
  let isValid = true;

  // Validate password length
  if (passwordInput.value.length < 8) {
    event.preventDefault();
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  }

  // Validate email format
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailInput.value)) {
    event.preventDefault();
    emailInput.style.border = '2px solid red';
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
passwordInput.addEventListener('input', function() {
  passwordErrorDisplay.style.display = 'none';
  passwordInput.style.border = '2px solid var(--border-color)';
});

emailInput.addEventListener('input', function() {
  emailErrorDisplay.style.display = 'none';
  emailInput.style.border = '2px solid var(--border-color)';
});

// Toggle password visibility
togglePasswordButton.addEventListener('click', function() {
  isPasswordVisible = !isPasswordVisible;
  var type = isPasswordVisible ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
  togglePasswordButton.querySelector('i').classList.toggle('bx-show');
  togglePasswordButton.querySelector('i').classList.toggle('bx-hide');
  passwordInput.focus();
});
