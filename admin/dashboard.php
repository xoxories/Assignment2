<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Selamat Datang, <?php echo $_SESSION['admin']; ?>!</h2>
    <a href="logout.php">Logout</a> <br><br>
    <a href="add.php">Tambah Destinasi</a> <br><br>

    <h3>List Destinasi Wisata</h3>

    <?php
    include '../db.php';
    $result = mysqli_query($conn, "SELECT * FROM destinations");

    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>No</th><th>Nama</th><th>Lokasi</th><th>Gambar</th><th>Aksi</th></tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['location']}</td>";
        echo "<td><img src='../uploads/{$row['image']}' width='100'></td>";
        echo "<td>
            <a href='edit.php?id={$row['id']}'>Edit</a> | 
            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Hapus destinasi ini?\")'>Hapus</a>
            </td>";
        echo "</tr>";
        $no++;
    }
    echo "</table>";
    ?>
</body>
</html>
