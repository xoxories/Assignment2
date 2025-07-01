<?php
session_start();
include 'db.php';

$keyword = "";
$query = "SELECT * FROM destinations";

if (isset($_GET['search'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
    $query .= " WHERE name LIKE '%$keyword%' OR location LIKE '%$keyword%' OR country LIKE '%$keyword%'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Destinations</title>
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
        .about-text {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 40px auto 20px auto;
            text-align: center;
            color: #333;
            font-weight: 500;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="#">TravelRec</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navmenu">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="destination.php" class="nav-link">Destination</a></li>
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

<!-- Content -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Recommended Travel Destinations</h2>

    <form method="get" class="d-flex justify-content-center mb-4">
        <input type="text" class="form-control w-50 me-2" name="search" placeholder="Search by name or location" value="<?php echo $keyword; ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- About Text (Centered, Same Width as Slider) -->
    <div class="text-center mb-4" style="
    max-width: 1700px;
    margin: 0 auto;
    font-size: 1.4rem;
    font-weight: 600;
    font-family: 'Segoe UI', 'Helvetica Neue', 'Arial', sans-serif;
    color: #333;
    line-height: 1.6;
">
    At TravelRec, we believe every journey is an opportunity to create unforgettable memories. 
    We are committed to bringing you the world's best destinations, carefully curated to ensure your travel experience is seamless, exciting, and filled with wonder.
</div>




    <!-- Carousel -->
    <div id="travelCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/image/slide1.png" class="d-block w-100" style="max-height:400px; object-fit:cover;" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="assets/image/slide2.png" class="d-block w-100" style="max-height:400px; object-fit:cover;" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="assets/image/slide3.png" class="d-block w-100" style="max-height:400px; object-fit:cover;" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="assets/image/slide4.png" class="d-block w-100" style="max-height:400px; object-fit:cover;" alt="Slide 4">
            </div>
            <div class="carousel-item">
                <img src="assets/image/slide5.png" class="d-block w-100" style="max-height:400px; object-fit:cover;" alt="Slide 5">
            </div>
        </div>
    </div>

    <h4 class="text-center mb-4">Explore Our Destinations</h4>

    <div class="row">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="img-hover-zoom">
                            <img src="assets/image/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><strong>Location:</strong> <?php echo $row['location']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No destinations found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Contact Us CTA -->
<div class="mt-5 text-center p-4 bg-light rounded shadow-sm">
    <h4 class="fw-bold mb-3">Have Questions or Ready to Plan Your Dream Trip?</h4>
    <p class="mb-4" style="font-size: 1.1rem;">
        Feel free to <strong>contact us</strong> anytime to ask questions or book your travel plan. 
        Our team is here to help make your journey unforgettable.
    </p>
    <a href="contact.php" class="btn btn-primary btn-lg">Contact Us</a>
</div>
            

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-slide every 3 seconds
    const carousel = document.querySelector('#travelCarousel');
    const bsCarousel = new bootstrap.Carousel(carousel, {
        interval: 3000,
        ride: 'carousel'
        
    });

    
</script>
</body>
</html>
