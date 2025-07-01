<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - TravelRec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hero {
            background-image: url('assets/image/bg.jpg'); 
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }

        .brand-text {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-top: 30px;
        }

        .welcome-text {
            text-align: center;
            max-width: 800px;
            margin: 20px auto 40px auto;
            font-size: 1.1rem;
            color: #333;
        }

        .contact-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 100px;
            flex-wrap: wrap;
            margin: 50px 0;
            width: 100%;
        }

        .contact-icons .icon-box {
            max-width: 220px;
        }

        .contact-icons i {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 10px;
            display: block;
        }

        .contact-icons h5 {
            margin-top: 10px;
            font-weight: bold;
        }

        .map-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        iframe {
            border: 0;
            width: 100%;
            height: 350px;
        }

        .contact-form {
            width: 100%;
        }

        @media(min-width: 768px) {
            .contact-form {
                width: 48%;
            }

            .map-form iframe {
                width: 48%;
            }
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
                <li class="nav-item"><a href="destination.php" class="nav-link">Destination</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link active">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <h1>Contact Us</h1>
</div>

<!-- Brand Name and Welcome Text -->
<div class="container text-center mt-4">
    <div class="brand-text">TravelRec</div>
    <div class="welcome-text">
        <p>
            Welcome to TravelRec! We’re here to help you plan the perfect vacation and provide you with the best experiences we have to offer. Whether you’re looking for holiday packages in Malaysia, exciting travel promotions, or simply need assistance with your booking, our dedicated team is ready to assist you.
        </p>
    </div>
</div>

<!-- Contact Info Icons (FULL WIDTH) -->
<div class="contact-icons">
    <div class="icon-box">
        <i class="bi bi-geo-alt-fill"></i>
        <h5>Visit Us</h5>
        <p>123 Jalan Travel, Kuala Lumpur, Malaysia</p>
    </div>
    <div class="icon-box">
        <i class="bi bi-telephone-fill"></i>
        <h5>Call Us</h5>
        <p>+603-452-2214</p>
    </div>
    <div class="icon-box">
        <i class="bi bi-envelope-fill"></i>
        <h5>Email</h5>
        <p>travelrec@gmail.com</p>
    </div>
</div>

<!-- Map & Form Section -->
<div class="container map-form">
    
    <!-- Google Map -->
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.232884678726!2d101.68685514999999!3d3.1390035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37c9c1c1b3d3%3A0x62fbab93c3ff5f19!2sKuala%20Lumpur%20City%20Centre!5e0!3m2!1sen!2smy!4v1719823913250!5m2!1sen!2smy" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

    <!-- Contact Form -->
    <div class="contact-form">
        <form>
            <div class="mb-3">
                <label class="form-label">Your Name</label>
                <input type="text" class="form-control" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input type="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="mb-3">
                <label class="form-label">Your Message</label>
                <textarea class="form-control" rows="5" placeholder="Write your message here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Message</button>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
