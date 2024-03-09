
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
    <title>Sign up</title>
</head>
<body>
      
    <div class="container">
       <div class="box">
    <div class="header">
        <p>Sign up to php-mail</p>
        <h4>Connection : <?php echo $message ?></h4>
    </div>
    <form action="./config/php/sign_up.php" method="post"> 
        <!-- Form action points to login_process.php -->
        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" name="name" class="input-field" id="name"/>
        </div>
        <div class="input-box">
            <label for="first_name">First name</label> 
            <input type="text" classe="input-field" id="first_name" name="first_name"/>
        </div>
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
            <input type="submit" class="input-submit" value="SIGN UP">
        </div>
    </form>
    <!-- <div class="bottom"> -->
    <!--     <span><a href="#">Sign Up</a></span> -->
    <!--     <span><a href="#">Forgot Password?</a></span> -->
    <!-- </div> -->
</div>

       <div class="wrapper"></div>
    </div>

    <script src="./assets/js/success.js"></script>

</body>
</html>
