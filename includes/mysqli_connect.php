<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csaatuva_csa";
// $dbhost = $_SERVER['aa1ekzeaefiluuy.cggakr1x6elp.us-east-1.rds.amazonaws.com'];
// $dbport = $_SERVER['3306'];
// $username = $_SERVER['csaatuva'];
// $password = $_SERVER['pandaCSA1'];
// $dbname = $_SERVER['aa1ekzeaefiluuy'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $conn = new mysqli_connect($dbhost, $username, $password, $dbname, $dbport);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset( $conn, 'utf8');
?>