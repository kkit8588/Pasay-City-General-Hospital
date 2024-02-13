<?php 
    session_start();
    include '../connect.php';

    // Check if the user is logged in
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_username'])) {
        header('Location: ../login.php');
        exit();
    }

    // Limit Access Page
    $userType = $_SESSION['user_type'];

    if ($userType !== 'Er' && $userType !== 'Opd' && $userType !== 'Admission') {
        header('Location: ../login.php');
        exit();
    }
?>
