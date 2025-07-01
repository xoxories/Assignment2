<?php
session_start();
include 'db.php';

if (!isset($_GET['country'])) {
    die("Country not specified.");
}

$country = mysqli_real_escape_string($conn, $_GET['country']);

$query = "SELECT * FROM destinations WHERE country = '$country'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $country; ?> Destinations - TravelRec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-hover-zoom {
            overflow: hidden;
            position: relative;
        }
        .img-hover-zoom img {
            transition: transform 0.5s ease;
        }
        .img-hover-zoom:hover img {
            transform: scale(1.1);
        }
    </style>
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

<!-- Country Destinations -->
<div class="container mt-5">
<h2 class="text-center mb-4"><?php echo $country; ?> Destinations</h2>

<?php if ($country == 'Indonesia'): ?>
    <p class="text-center mb-5 text-muted fs-5" style="max-width: 800px; margin: 0 auto;">
    Discover the incredible beauty of Indonesia, a vast archipelago of over 17,000 islands. From the tropical beaches of Bali to the bustling streets of Jakarta, Indonesia offers breathtaking landscapes, rich traditions, and unforgettable adventures for every traveler.
    </p>
<?php elseif ($country == 'Thailand'): ?>
    <p class="text-center mb-5 text-muted fs-5" style="max-width: 800px; margin: 0 auto;">
        Thailand, the Land of Smiles, captivates visitors with its golden temples, exotic beaches, and world-famous cuisine. Explore Bangkok's bustling streets, unwind on the shores of Phuket, and experience Thailand's timeless charm.
    </p>
<?php elseif ($country == 'Switzerland'): ?>
    <p class="text-center mb-5 text-muted fs-5" style="max-width: 800px; margin: 0 auto;">
        Switzerland, where snow-capped peaks meet crystal-clear lakes and charming alpine villages. Indulge in world-class chocolate, breathtaking mountain views, and the timeless elegance of Swiss culture.
    </p>
<?php endif; ?>

                
    <div class="row">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="img-hover-zoom">
                        <img src="assets/image/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><strong>Location:</strong> <?php echo $row['location']; ?></p>
                            <p class="card-text text-success"><strong>Price:</strong> RM <?php echo number_format($row['price'], 2); ?></p>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No destinations available in <?php echo $country; ?>.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
