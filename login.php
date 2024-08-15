<?php
// Sertakan file koneksi database
include 'koneksi.php';

// Mulai sesi
session_start();

// Cek apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah pengguna ada di database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    // Cek apakah ada baris yang cocok
    if (mysqli_num_rows($result) == 1) {
        // Pengguna ditemukan, simpan informasi ke dalam sesi
        $_SESSION['username'] = $username;
        header("Location: input.php"); // Redirect ke halaman setelah login
        exit();
    } else {
        // Pengguna tidak ditemukan
        $error = "Username atau kata sandi salah!";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <style>
        /* Navbar styling */
        .navbar {
            transition: box-shadow 0.3s ease-in-out;
        }

        .navbar:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* H1 Section */
        .h1 {
            margin: 100px;
        }

        .display-1 {
            animation: fadeInSlideUp 2s ease-in-out;
            transition: transform 0.3s, color 0.3s;
        }

        .display-1:hover {
            transform: scale(1.05);
            color: #007bff;
        }

        /* Interactive text style */
        .interactive-text {
            animation: fadeIn 2s ease-in-out;
            transition: color 0.3s, transform 0.3s;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .interactive-text:hover {
            color: #007bff;
            transform: scale(1.1);
        }

        /* Add keyframe animation for fading in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Adjust font size for form controls */
        .form-control {
            font-size: 0.875rem;
            /* Smaller font size for form inputs */
        }

        /* Adjust font size for form labels */
        .form-floating label {
            font-size: 0.875rem;
            /* Match label font size with input */
        }

        /* Adjust button font size if needed */
        .btn-custom {
            font-size: 1rem;
            /* Adjust button font size */
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
            padding: 10px 30px;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .btn-warning {
            font-size: 1rem;
            /* Adjust button font size */
            background-color: #FAFFAF;
            border-radius: 10px;
            padding: 10px 30px;
            position: relative;
            overflow: hidden;
            border: none;
            /* Ensure no border */
        }

        .btn-warning:hover {
            background-color: #FAFFAF;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Ripple effect for button */
        .btn-custom:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: transform 0.5s;
            transform: translate(-50%, -50%) scale(0);
        }

        .btn-warning:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: transform 0.5s;
            transform: translate(-50%, -50%) scale(0);
        }

        .btn-custom:active:after {
            transform: translate(-50%, -50%) scale(1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .h1 {
                margin: 30px 20px;
            }
        }

        /* Image Styling */
        .img-side {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .img-side:hover {
            transform: scale(1.05);
        }

        /* Small text style */
        .small-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="input.php">PeginPutan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="detail.php">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="h1 container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p class="interactive-text">Silahkan Masukan Username Dan Password</p>
                    </blockquote>
                </figure>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-custom">Login</button>
                    <a href="home.php">
                        <button type="button" class="btn btn-warning">Kembali</button>
                    </a>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="meeting-6004997_1280.webp" alt="Descriptive Image" class="img-side">
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Additional content can go here -->
    </div>

    <!-- Include Bootstrap and JavaScript for interactive components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // JavaScript for smooth scroll
        document.querySelectorAll('.nav-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>