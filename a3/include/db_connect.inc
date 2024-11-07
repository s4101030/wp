<?php
//db_connect.inc

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mysql";
}
else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4101030";
    $password = "fothmine1";
    $dbname = "s4101030";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>