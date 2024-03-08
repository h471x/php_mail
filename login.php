<?php
  require "./config/php/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/boxicons.min.css">
    <link rel="stylesheet" href="./assets/css/login_style.css">
    <title>Login</title>
</head>
<body>
      
    <div class="container">
       <div class="box">
    <div class="header">
        <p>Log In to e-mail</p>
        <h4>Connection : <?php echo $message ?></h4>
    </div>
    <form action="./config/php/login.php" method="post"> 
        <!-- Form action points to login_process.php -->
        <div class="input-box">
            <label for="email">E-Mail</label>
            <input type="email" class="input-field" id="email" name="email" required> <!-- Corrected name attribute to "email" -->
            <i class="bx bx-envelope"></i>
        </div>
        <div class="input-box">
            <label for="pass">Password</label>
            <input type="password" class="input-field" id="pass" name="password" required>
            <i class="bx bx-lock"></i>
        </div>
        <div class="input-box">
            <input type="submit" class="input-submit" value="Log in">
        </div>
    </form>
    <div class="bottom">
        <span><a href="#">Sign Up</a></span>
        <span><a href="#">Forgot Password?</a></span>
    </div>
</div>

       <div class="wrapper"></div>
    </div>

    <script src="./assets/js/success.js"></script>

</body>
</html>
