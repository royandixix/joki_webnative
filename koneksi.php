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

?>