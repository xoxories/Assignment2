<?php
include 'db.php';

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        header("Location: login.php?success=1");
        exit;
    } else {
        $error = "Email sudah terdaftar atau terjadi error.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - TravelRec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/image/bgregister.jpg'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-box {
            background: rgba(255,255,255,0.95);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        .register-box h3 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h3 class="text-center mb-4">Create Your Account</h3>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="post">
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" name="register" class="btn btn-success w-100">Register</button>
    </form>

    <div class="mt-3 text-center">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

</body>
</html>
