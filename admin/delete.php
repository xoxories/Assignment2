<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM destinations WHERE id = $id");
$dest = mysqli_fetch_assoc($result);

if ($dest) {
    // Hapus gambar
    unlink("../uploads/" . $dest['image']);
    // Hapus data
    mysqli_query($conn, "DELETE FROM destinations WHERE id = $id");
}

header("Location: dashboard.php");
exit;
?>
