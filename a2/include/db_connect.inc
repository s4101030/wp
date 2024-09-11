<?php
//db_connect.inc

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wp";
}
else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4101030";
    $password = "s19q17l12";
    $dbname = $username;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>