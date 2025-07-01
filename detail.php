<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("Destination ID not provided.");
}

$id = (int) $_GET['id']; // Cast to int for security

$result = mysqli_query($conn, "SELECT * FROM destinations WHERE id = $id");
$destination = mysqli_fetch_assoc($result);

if (!$destination) {
    die("Destination not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $destination['name']; ?> - TravelRec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="index.php">TravelRec</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navmenu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="destination.php" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <h2><?php echo $destination['name']; ?></h2>
    <p><strong>Location:</strong> <?php echo $destination['location']; ?></p>
    <p class="text-success"><strong>Price:</strong> RM <?php echo number_format($destination['price'], 2); ?></p>
    
    <img src="assets/image/<?php echo $destination['image']; ?>" class="img-fluid mb-4" alt="<?php echo $destination['name']; ?>">

    <p><?php echo nl2br($destination['description']); ?></p>

    <div class="alert alert-info mt-4">
        Experience the beauty and charm of <?php echo $destination['name']; ?>. Whether you're seeking adventure, relaxation, or cultural exploration, this destination offers unforgettable memories for every traveler.
    </div>

    <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
