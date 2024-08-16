<?php
require "koneksi.php";
$id = $_GET["id_tugas"];

// Fetch data based on the id
$query = "SELECT * FROM tugas WHERE id_tugas = $id";
$result = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($result);

if (!$db) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Check if the submit button has been pressed
if (isset($_POST["submit"])) {

   
    // Check if data is successfully updated
    if (edit($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'detail.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'detail.php';
            </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="mt-4">
            <h1>Edit Tugas</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="id_tugas" value="<?php echo $data['id_tugas']; ?>">

                <div class="mb-3">
                    <label for="nama_tugas" class="form-label">Nama Tugas</label>
                    <input type="text" class="form-control short-input" id="nama_tugas" name="nama_tugas" placeholder="Nama Tugas" required value="<?php echo $data['nama_tugas']; ?>">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Tugas</label>
                    <input type="text" class="form-control short-input" id="deskripsi" name="deskripsi" placeholder="Deskripsi Tugas" required value="<?php echo $data['deskripsi']; ?>">
                </div>

                <div class="mb-2">
                    <label for="status" class="form-label">Status Tugas</label>
                    <input type="text" class="form-control short-input" id="status" name="status" placeholder="Status Tugas" required value="<?php echo $data['status']; ?>">
                </div>

                <!-- Button submit -->
                <div class="button">
                    <button class="btn btn-primary mt-3" type="submit" name="submit">Simpan Data</button>
                    <a href="detail.php" class="btn btn-success mt-3">Halaman Detail</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
