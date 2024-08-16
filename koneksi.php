<?php
// koneksikan ke database
$db =  mysqli_connect(
    "localhost",
    "root",
    "",
    "tugas"
);


$result = mysqli_query(
    $db,
    // OERDER BY id
    // ASC
    // DESC
    // WHERE nik = ''
    "SELECT * FROM tugas"
);

function query($query)
{

    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



 // Function to update data
 function edit($data) {
        
    global $db;
    $id_tugas = htmlspecialchars($data["id_tugas"]);
    $nama_tugas = htmlspecialchars($data["nama_tugas"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $status = htmlspecialchars($data["status"]);

    $query = "UPDATE tugas SET
                nama_tugas = '$nama_tugas',
                deskripsi = '$deskripsi',
                status = '$status'
              WHERE id_tugas = $id_tugas";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function delet($id_tugas) {
    global $db;

    // SQL query to delete the task
    $query = "DELETE FROM tugas WHERE id_tugas = $id_tugas";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}






?>