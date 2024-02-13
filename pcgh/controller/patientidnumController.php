<?php
include '../connect.php';

// Receive the random number from the JavaScript
$patientno = $_POST['patientno'];
$patientid = $_POST['patientid'];

// Check if the number exists in the database
$query = "SELECT * FROM form WHERE patientno = '$patientno' && patientid = '$patientid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Number already exists, send 'invalid' back to JavaScript
    echo 'invalid';
} else {
    // Number is unique, send 'valid' back to JavaScript
    echo 'valid';
}

$conn->close();


?>