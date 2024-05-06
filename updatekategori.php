<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonString = file_get_contents('proyek.json');

    $proyek = json_decode($jsonString, true);

    $idToUpdate = $_POST['id'];
    $newNamaProyek = $_POST['namaProyek'];
    $newLokasiProyek = $_POST['lokasiProyek'];
    $newTanggalMulaiProyek = $_POST['tanggalMulaiProyek'];
    $newStatusProyek = $_POST['statusProyek'];

    foreach ($proyek as $key => &$project) {
        if ($project['id'] == $idToUpdate) {
            $project['namaproyek'] = $newNamaProyek;
            $project['lokasiproyek'] = $newLokasiProyek;
            $project['tanggalmulaiproyek'] = $newTanggalMulaiProyek;
            $project['statusproyek'] = $newStatusProyek;
            break;
        }
    }

    $updatedJsonString = json_encode($proyek, JSON_PRETTY_PRINT);

    file_put_contents('proyek.json', $updatedJsonString);

    header('Location: index.php');
    exit();
}
?>
