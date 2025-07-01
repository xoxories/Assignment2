<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Country - TravelRec</title>
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
                <li class="nav-item"><a href="destination.php" class="nav-link active">Destination</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
            </ul>
        </div>

        <div class="d-flex align-items-center">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="text-white me-3">Hello, <strong><?php echo $_SESSION['user']; ?></strong></span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-outline-light btn-sm me-2">Login</a>
                <a href="register.php" class="btn btn-light btn-sm">Register</a>
            <?php endif; ?>
        </div>

    </div>
</nav>

<!-- Country Selection -->
<div class="container mt-5">
<h2 class="text-center mb-4">Choose a Country</h2>
<div class="row justify-content-center">
    <div class="col-md-3 mb-3">
        <a href="country.php?country=Indonesia" class="btn btn-primary w-100">Indonesia</a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="country.php?country=Thailand" class="btn btn-primary w-100">Thailand</a>
    </div>
    <div class="col-md-3 mb-3">
        <a href="country.php?country=Switzerland" class="btn btn-primary w-100">Switzerland</a>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
