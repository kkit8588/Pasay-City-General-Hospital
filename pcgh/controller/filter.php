<?php   
include '../connect.php';
    if (isset($_GET['from']) && isset($_GET['to'])) {
        $from = $_GET['from'];
        $to = $_GET['to'];

        mysqli_query($conn, "SELECT * FROM form WHERE created_at BETWEEN '$from' AND '$to'");
        header('location: ../gad/list.php');
    } 



    ?>