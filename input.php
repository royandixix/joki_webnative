<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_tugas = $_POST['judul_tugas']; // Rename to match table column 'nama_tugas'
    $deskripsi = $_POST['tugas']; // Rename to match table column 'deskripsi'
    $status = $_POST['status'];

    // Use prepared statement to prevent SQL injection
    $stmt = $db->prepare("INSERT INTO tugas (nama_tugas, deskripsi, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama_tugas, $deskripsi, $status);

    if ($stmt->execute()) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'detail.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'detail.php';
            </script>
        ";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <style>
        .short-input {
            max-width: 400px;
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

    <div class="container mt-5">
        <div class="mt-4">
            <h1>Masukkan inputan di bawah ini</h1>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="judul_tugas" class="form-label">Nama Judul Tugas</label>
                    <input type="text" class="form-control short-input" id="judul_tugas" name="judul_tugas" placeholder="Nama judul Tugas anda" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_tugas" class="form-label">Deskripsi Tugas</label>
                    <input type="text" class="form-control short-input" id="tugas" name="tugas" placeholder="Deskripsinya Tentang Apa" required>
                </div>

                <div class="mb-2">
                    <label for="status_tugas" class="form-label">Status Tugas</label>
                    <input type="text" class="form-control short-input" id="status" name="status" placeholder="Status Tugas" required>
                </div>

                <!-- button submit -->
                <div class="button">
                    <button class="btn btn-primary mt-3" type="submit" name="submit">Simpan Data</button>
                    <a href="detail.php" class="btn btn-success mt-3">halaman detail</a>
                </div>

            </form>
        </div>

    </div>

    <!-- Optional: Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>