<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enhanced Bootstrap Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
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
                <h3 class="display-1">
                    Selamat datang <br>di web
                    <span class="fs-1">Todo List Native</span>
                </h3>
                <h4 class="mt-2">Mengatur Tugas dengan Efisien</h4>
                <p class="small-text mt-5">
                    Mengatur Tugas dengan Efisien: <br> Menyediakan platform yang mudah digunakan untuk mengatur tugas <br> harian, menetapkan prioritas, dan melacak kemajuan.
                </p>
                <div class="mt-5">
                    <a href="login.php">
                        <button class="btn btn-custom" type="submit">Login Dulu</button>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="meeting-6004997_1280.webp" alt="Descriptive Image" class="img-side">
            </div>
        </div>
    </div>

    <div class="container">
        
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Todo List Native. All rights reserved.</p>
        </div>
    </footer>

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
