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

if (!$dest) {
    die("Destinasi tidak ditemukan.");
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Cek apakah gambar diubah
    if ($_FILES['image']['name']) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $target_dir = "../uploads/" . $image_name;

        if (move_uploaded_file($image_tmp, $target_dir)) {
            $query = "UPDATE destinations SET name='$name', location='$location', description='$description', image='$image_name' WHERE id=$id";
        } else {
            $error = "Upload gambar gagal.";
        }
    } else {
        $query = "UPDATE destinations SET name='$name', location='$location', description='$description' WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Update data gagal.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Destinasi</title>
</head>
<body>
    <h2>Edit Destinasi Wisata</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $dest['name']; ?>" required><br><br>
        <input type="text" name="location" value="<?php echo $dest['location']; ?>" required><br><br>
        <textarea name="description" required><?php echo $dest['description']; ?></textarea><br><br>
        <img src="../uploads/<?php echo $dest['image']; ?>" width="100"><br>
        <input type="file" name="image" accept="image/*"><br><br>
        <button type="submit" name="submit">Update</button>
    </form>
    <br>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
