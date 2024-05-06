<?php
if (isset($_POST['namaProyek'], $_POST['lokasiProyek'], $_POST['tanggalMulaiProyek'], $_POST['statusProyek'])) {
    $jsonData = file_get_contents('proyek.json');

    $kategoriArray = json_decode($jsonData, true);

    $newProyek = $_POST['namaProyek'];
    $newLokasiProyek = $_POST['lokasiProyek'];
    $newTanggalMulaiProyek = $_POST['tanggalMulaiProyek'];
    $newStatusProyek = $_POST['statusProyek'];

    $newEntry = array(
        'id' => count($kategoriArray) + 1,
        'namaproyek' => $newProyek,
        'lokasiproyek' => $newLokasiProyek,
        'tanggalmulaiproyek' => $newTanggalMulaiProyek,
        'statusproyek' => $newStatusProyek
    );

    $kategoriArray[] = $newEntry;

    $updatedJsonData = json_encode($kategoriArray, JSON_PRETTY_PRINT);

    file_put_contents('proyek.json', $updatedJsonData);

    echo "Data berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan data. Form tidak lengkap.";
}

