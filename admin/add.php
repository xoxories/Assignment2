<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../db.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle upload gambar
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $target_dir = "../uploads/" . $image_name;

    if (move_uploaded_file($image_tmp, $target_dir)) {
        $query = "INSERT INTO destinations (name, description, location, image) 
                  VALUES ('$name', '$description', '$location', '$image_name')";
        mysqli_query($conn, $query);
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Upload gambar gagal.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Destinasi</title>
</head>
<body>
    <h2>Tambah Destinasi Wisata</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nama Destinasi" required><br><br>
        <input type="text" name="location" placeholder="Lokasi" required><br><br>
        <textarea name="description" placeholder="Deskripsi" required></textarea><br><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
    <br>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
