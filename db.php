<?php
$host = 'student-mysql.che47cqav4hm.us-east-1.rds.amazonaws.com';
$user = 'student';        // Replace with your RDS master username
$pass = 'Password123!'; // Replace with your RDS master password
$db = 'student-mysql';      // You will create this database inside RDS

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
