<?php
$host = "database-1.cilzpw3ngquz.us-east-1.rds.amazonaws.com";
$user = "admin"; // Replace if your RDS username is different
$password = "Afrian0003!"; // Replace with your actual password
$database = "database-1"; // Or whatever DB name you create

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
