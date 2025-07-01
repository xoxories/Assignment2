<?php
$host = 'database-1.che47cqav4hm.us-east-1.rds.amazonaws.com';
$user = 'admin';        // Replace with your RDS master username
$pass = 'Afrian0003!'; // Replace with your RDS master password
$db = 'database-1';      // You will create this database inside RDS

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
