<?php

$servername = "localhost";
$username = "jenn";
$password = "1234";
$dbname = "csaatuva_csa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset( $conn, 'utf8');
?>