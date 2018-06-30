<?php

$servername = "localhost";
$username = "csaatuva_jz";
$password = "pandaCSA1";
$dbname = "csaatuva_csa";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset( $conn, 'utf8');
?>