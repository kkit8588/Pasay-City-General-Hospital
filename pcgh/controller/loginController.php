<?php 
include '../connect.php';

session_start();

if(isset($_SESSION['admin_id'])){
      header("Location: ../admin/form.php");
}

   $username = $_POST['username'];
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_username'] = $row['username'];
         $_SESSION['user_type'] = $row['type'];

         if ($row['type'] == 'Er' || $row['type'] == 'Opd' || $row['type'] == 'Admission') {
              header('Location: ../admin/dashboard.php');
              exit();
         }else if ($row['type'] == 'Philhealth'){
             header('Location: ../philhealth/list.php');
             exit();
         }else if ($row['type'] == 'GAD'){
             header('Location: ../gad/dashboard.php');
             exit();
         }


     
   }else{
      $error[] = 'incorrect email or password!';

      header('location: ../login.php');
   }



?>