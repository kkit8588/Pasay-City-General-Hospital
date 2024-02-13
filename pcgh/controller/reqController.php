<?php
    include '../session.php';

    $id = $_POST['id'];
    $fafp = $_POST['fafp'];
    
    //$userType = $_SESSION['user_type'];

    mysqli_query ($conn, "UPDATE form SET fafp ='$fafp' WHERE id='$id' ");

$conn->close();
?>

