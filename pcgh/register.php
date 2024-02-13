<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <?php include 'header.php' ?>


</head>
<body>
   
<div class="registration form-container bg-white w-25 form-control">

   <form id="registrationID" action="./controller/registerController.php" method="post" class="registrationClass p-4" >
      <h3 class="text-center">Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <!-- <input type="text" name="name" required placeholder="enter your name" class="form-control"> -->
      <input type="text" name="username" required placeholder="enter your username" class="form-control">
      <!-- <input type="email" name="email" required placeholder="enter your email" class="form-control"> -->
      <input type="password" name="password" required placeholder="enter your password" class="form-control">
      <select name="user_type" class="form-control">
         <option value="Er">Er</option>
         <option value="Opd">Opd</option>
         <option value="Admission">Admission</option>
         <option value="Philhealth">Philhealth</option>
         <option value="GAD">GAD</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="btn btn-primary">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>

</html>