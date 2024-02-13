<?php

include '../connect.php';

if(isset($_POST['submit'])){

   
   $username = mysqli_real_escape_string ($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $user_type = $_POST['user_type'];

   //For validation
   $usernamequery = " SELECT * FROM user WHERE username = '$username' ";
   $usernameresult = mysqli_query($conn, $usernamequery);


   if(mysqli_num_rows($usernameresult) > 0){

      $error[] = 'This username is taken!';

   }else{
         //For insert
         $insert = "INSERT INTO user (username, password, type) VALUES('$username','$pass','$user_type')";
         mysqli_query($conn, $insert);
         echo 'Register Successfuly!';
         header('location:../register.php');
      }
   

};


?>