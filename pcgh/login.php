<?php

include 'connect.php';

session_start();

if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == "Er" || $_SESSION['user_type'] == "Admission" || $_SESSION['user_type'] == "Opd")) {
    header("Location: ./admin/dashboard.php");
} elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "GAD") {
    header("Location: ./gad/dashboard.php");
}elseif (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "Philhealth") {
    header("Location: ./philhealth/dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <?php include 'header.php' ?>


</head>
<body>
   
<div class="registration form-container bg-white w-25 form-control">

   <form id="registrationID" action="./controller/loginController.php" method="post" class="registrationClass p-4" >
      <h3 class="text-center">Login Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">' . $error . '</span>';
         };
      };
      ?>

      <input type="text" name="username" required placeholder="enter your username" class="form-control">
      <input type="password" name="password" required placeholder="enter your password" class="form-control">
      <input type="submit" name="submit" value="Login Now" class="btn btn-primary">
      <p>already have an account? <a href="register.php">Register now</a></p>
   </form>

</div>

</body>
</html>