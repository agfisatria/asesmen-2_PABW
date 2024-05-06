<?php
if (isset($_GET['id'])) {
    $idToEdit = $_GET['id'];

    $jsonString = file_get_contents('proyek.json');

    $proyek = json_decode($jsonString, true);

    foreach ($proyek as $key => $project) {
        if ($project['id'] == $idToEdit) {
            $projectToEdit = $project;
            break;
        }
    }
}

if (isset($projectToEdit)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Kategori</title>
    </head>

    <body>
        <h1>Edit Kategori</h1>
        <form action="updatekategori.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $projectToEdit['id']; ?>">
            <label for="namaProyek">Nama Proyek:</label>
            <input type="text" id="namaProyek" name="namaProyek" value="<?php echo $projectToEdit['namaproyek']; ?>">
            <br>

            <label for="lokasiProyek">Lokasi Proyek:</label>
            <input type="text" id="lokasiProyek" name="lokasiProyek" value="<?php echo $projectToEdit['lokasiproyek']; ?>"><br>

            <label for="tanggalMulaiProyek">Tanggal Mulai Proyek:</label>
            <input type="date" id="tanggalMulaiProyek" name="tanggalMulaiProyek" value="<?php echo $projectToEdit['tanggalmulaiproyek']; ?>"><br>

            <label for="statusProyek">Status Perizinan Proyek:</label>
            <select id="statusProyek" name="statusProyek" value="<?php echo $projectToEdit['statusproyek']; ?>">
                <option value="Izin">Diizinkan</option>
                <option value="Tidak">Tidak Diizinkan</option>
            </select><br>
            <button type="submit">Update</button>
        </form>
    </body>

    </html>
<?php
} else {
    echo "Category not found.";
}
?>