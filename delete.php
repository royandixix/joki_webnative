<?php 
require "koneksi.php";

// Check if 'id_tugas' is set in the URL
if (isset($_GET["id_tugas"])) {
    $id_tugas = $_GET["id_tugas"];

    // Make sure the id is an integer to prevent SQL injection
    $id_tugas = intval($id_tugas);

    // Call the delete function
    if (delet($id_tugas) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'detail.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'detail.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('ID tidak ditemukan');
            document.location.href = 'detail.php';
        </script>
    ";
}

?>