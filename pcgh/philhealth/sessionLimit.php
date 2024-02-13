<?php 
    session_start();
    include '../connect.php';

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../login.php');
        exit();
    }

    // Limit Access Page
    $userType = $_SESSION['user_type'];

    if ($userType !== 'Philhealth') {
        header('Location: ../login.php');
        exit();
    }

?>