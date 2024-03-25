// Logout button
document.querySelector('.logout').onclick = (event) => {
  event.preventDefault();
  window.location.href = '/php_mail/app/controllers/logoutCtl.php';
};