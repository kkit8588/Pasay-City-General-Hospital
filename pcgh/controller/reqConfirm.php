<?php
    include '../session.php';

    $id = $_POST['id'];
    $completed = $_POST['completed'];
    $req_one = $_POST['req_one'];
    $req_two = $_POST['req_two'];
    $req_three = $_POST['req_three'];
    $req_four = $_POST['req_four'];

    
    $userType = $_SESSION['user_type'];
      
    mysqli_query ($conn, "UPDATE form SET req_one ='$req_one',  req_two ='$req_two',  req_three ='$req_three',  req_four ='$req_four', completed ='$completed' WHERE id='$id' ");


$conn->close();
?>

