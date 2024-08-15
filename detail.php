<?php
include 'koneksi.php';

// SQL query to fetch data from the 'tugas' table
$query = "SELECT * FROM tugas";
$result = mysqli_query($db, $query);

// Check if the query was successful
if (!$result) {
    die("Query Error: " . mysqli_error($db));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Detail Tugas</h1>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
            <tr>
                <th>Nama Tugas</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $ts) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($ts['nama_tugas']); ?></td>
                    <td><?php echo htmlspecialchars($ts['deskripsi']); ?></td>
                    <td><?php echo htmlspecialchars($ts['status']); ?></td>
                    <td>
                        <a href="" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
                            <i class="fa fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="input.php"><button type="submit" class="btn btn-dark">Kembali</button></a>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>