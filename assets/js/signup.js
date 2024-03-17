//Email & Password handler
const form = document.querySelector('form');
const passwordInput = document.getElementById('signup-pass');
const confirmInput = document.getElementById('confirm-pass');
const nameInput = document.getElementById('name');
const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('signup-email');
const nameErrorDisplay = document.getElementById('name-error');
const usernameErrorDisplay = document.getElementById('user-error');
const passwordErrorDisplay = document.getElementById('password-error');
const confirmErrorDisplay = document.getElementById('confirm-error');
const emailErrorDisplay = document.getElementById('email-error');
const togglePasswordButton = document.querySelector(".toggle-password");
const toggleConfirmButton = document.querySelector(".toggle-confirm");
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var isPasswordVisible = false;
var isConfirmVisible = false;

form.addEventListener('submit', function(event) {
  let isValid = true;

   // Control the full name
   if (!nameInput.value.trim()) {
    event.preventDefault();
    nameInput.style.border = '2px solid red';
    nameErrorDisplay.style.color = 'red';
    nameErrorDisplay.textContent = 'Please fill the full name';
    nameErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    nameInput.style.border = '2px solid var(--connected)';
    nameErrorDisplay.style.color = 'var(--connected)';
    nameErrorDisplay.textContent = '✓';
    nameErrorDisplay.style.display = 'block';
  }

    // Control the username
    if (!usernameInput.value.trim()) {
      event.preventDefault();
      usernameInput.style.border = '2px solid red';
      usernameErrorDisplay.style.color = 'red';
      usernameErrorDisplay.textContent = 'Please fill the Username';
      usernameErrorDisplay.style.display = 'block';
      isValid = false;
    }else{
      usernameInput.style.border = '2px solid var(--connected)';
      usernameErrorDisplay.style.color = 'var(--connected)';
      usernameErrorDisplay.textContent = '✓';
      usernameErrorDisplay.style.display = 'block';
    }

  // Validate email format
  if (!emailInput.value.trim()) {
    event.preventDefault();
    emailInput.style.border = '2px solid red';
    emailErrorDisplay.textContent = 'Please fill the email';
    emailErrorDisplay.style.display = 'block';
    isValid = false;
  } else if (!emailRegex.test(emailInput.value)) {
    event.preventDefault();
    emailInput.style.border = '2px solid red';
    emailErrorDisplay.textContent = 'Format : mail@example.com';
    emailErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    emailInput.style.border = '2px solid var(--connected)';
    emailErrorDisplay.style.color = 'var(--connected)';
    emailErrorDisplay.textContent = '✓';
    emailErrorDisplay.style.display = 'block';
  }

  // Validate password length
  if (!passwordInput.value.trim()) {
    event.preventDefault();
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.textContent = 'Password cannot be empty';
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  } else if (passwordInput.value.length < 8) {
    event.preventDefault();
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.textContent = 'must be at least 8 characters long';
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    passwordInput.style.border = '2px solid var(--connected)';
    passwordErrorDisplay.style.color = 'var(--connected)';
    passwordErrorDisplay.textContent = '✓';
    passwordErrorDisplay.style.display = 'block';
  }

  // Control the confirm password
  if (!confirmInput.value.trim()) {
    event.preventDefault();
    confirmInput.style.border = '2px solid red';
    confirmErrorDisplay.textContent = 'Password cannot be empty';
    confirmErrorDisplay.style.display = 'block';
    isValid = false;
  } else if (passwordInput.value !== confirmInput.value) {
    event.preventDefault();
    confirmInput.style.border = '2px solid red';
    confirmErrorDisplay.textContent = 'Password do not match';
    confirmErrorDisplay.style.display = 'block';
    isValid = false;
  }else if (confirmInput.value.length < 8) {
    event.preventDefault();
    confirmInput.style.border = '2px solid red';
    confirmErrorDisplay.textContent = 'minimum 8 characters long';
    confirmErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    confirmInput.style.border = '2px solid var(--connected)';
    confirmErrorDisplay.style.color = 'var(--connected)';
    confirmErrorDisplay.textContent = '✓';
    confirmErrorDisplay.style.display = 'block';
  }

  // If both email and password are valid, proceed with form submission
  if (isValid) {
    // You can add additional submission logic here if needed
    console.log('Form submitted successfully');
  }
});

nameInput.addEventListener('blur', function (){
  // Control the full name
  if (!nameInput.value.trim()) {
    nameInput.style.border = '2px solid var(--border-color)';
    isValid = false;
  }else{
    nameInput.style.border = '2px solid var(--connected)';
    nameErrorDisplay.style.color = 'var(--connected)';
    nameErrorDisplay.textContent = '✓';
    nameErrorDisplay.style.display = 'block';
  }
});

usernameInput.addEventListener('blur', function (){
  // Control the full name
  if (!usernameInput.value.trim()) {
    usernameInput.style.border = '2px solid var(--border-color)';
    isValid = false;
  }else{
    usernameInput.style.border = '2px solid var(--connected)';
    usernameErrorDisplay.style.color = 'var(--connected)';
    usernameErrorDisplay.textContent = '✓';
    usernameErrorDisplay.style.display = 'block';
  }
});

emailInput.addEventListener('blur', function(){
  // Control the email format
  if (!emailInput.value.trim()) {
    emailInput.style.border = '2px solid var(--border-color)';
    isValid = false;
  } else if (!emailRegex.test(emailInput.value)) {
    emailInput.style.border = '2px solid red';
    emailErrorDisplay.textContent = 'Format : mail@example.com';
    emailErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    emailInput.style.border = '2px solid var(--connected)';
    emailErrorDisplay.style.color = 'var(--connected)';
    emailErrorDisplay.textContent = '✓';
    emailErrorDisplay.style.display = 'block';
  }
});

passwordInput.addEventListener('blur', function(){
   // Validate password length
   if (!passwordInput.value.trim()) {
    passwordInput.style.border = '2px solid var(--border-color)';
    isValid = false;
  } else if (passwordInput.value.length < 8) {
    passwordInput.style.border = '2px solid red';
    passwordErrorDisplay.textContent = 'must be at least 8 characters long';
    passwordErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    passwordInput.style.border = '2px solid var(--connected)';
    passwordErrorDisplay.style.color = 'var(--connected)';
    passwordErrorDisplay.textContent = '✓';
    passwordErrorDisplay.style.display = 'block';
  }
});

confirmInput.addEventListener('blur', function(){
  // Control the confirm password
  if (!confirmInput.value.trim()) {
    confirmInput.style.border = '2px solid var(--border-color)';
    isValid = false;
  } else if (passwordInput.value !== confirmInput.value) {
    confirmInput.style.border = '2px solid red';
    confirmErrorDisplay.textContent = 'Password do not match';
    confirmErrorDisplay.style.display = 'block';
    isValid = false;
  }else if (confirmInput.value.length < 8) {
    confirmInput.style.border = '2px solid red';
    confirmErrorDisplay.textContent = 'minimum 8 characters long';
    confirmErrorDisplay.style.display = 'block';
    isValid = false;
  }else{
    confirmInput.style.border = '2px solid var(--connected)';
    confirmErrorDisplay.style.color = 'var(--connected)';
    confirmErrorDisplay.textContent = '✓';
    confirmErrorDisplay.style.display = 'block';
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

handleInput(nameInput, nameErrorDisplay);
handleInput(usernameInput, usernameErrorDisplay);
handleInput(emailInput, emailErrorDisplay);
handleInput(passwordInput, passwordErrorDisplay);
handleInput(confirmInput, confirmErrorDisplay);

// Toggle password visibility
togglePasswordButton.addEventListener('click', function() {
  isPasswordVisible = !isPasswordVisible;
  var type = isPasswordVisible ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
  togglePasswordButton.querySelector('i').classList.toggle('bx-show');
  togglePasswordButton.querySelector('i').classList.toggle('bx-hide');
  passwordInput.focus();
});

toggleConfirmButton.addEventListener('click', function() {
  isConfirmVisible = !isConfirmVisible;
  var type = isConfirmVisible ? 'text' : 'password';
  confirmInput.setAttribute('type', type);
  toggleConfirmButton.querySelector('i').classList.toggle('bx-show');
  toggleConfirmButton.querySelector('i').classList.toggle('bx-hide');
  confirmInput.focus();
});
