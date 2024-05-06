<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h1>Data Kategori</h1>
    <a href="#" id="tambahDataLink">Tambah Data</a>

    <div id="tambahDataForm" style="display: none;">
        <form id="kategoriForm">
            <label for="namaProyek">Nama Proyek:</label>
            <input type="text" id="namaProyek" name="namaProyek" required><br>

            <label for="lokasiProyek">Lokasi Proyek:</label>
            <input type="text" id="lokasiProyek" name="lokasiProyek" required><br>

            <label for="tanggalMulaiProyek">Tanggal Mulai Proyek:</label>
            <input type="date" id="tanggalMulaiProyek" name="tanggalMulaiProyek" required><br>

            <label for="statusProyek">Status Perizinan Proyek:</label>
            <select id="statusProyek" name="statusProyek" required>
                <option value="Izin">Diizinkan</option>
                <option value="Tidak">Tidak Diizinkan</option>
            </select><br>

            <button type="submit">Tambah</button>
        </form>
    </div>

    <table border="1" cellspacing="0" id="kategoriTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Proyek</th>
                <th>Lokasi Proyek</th>
                <th>Tanggal Mulai Proyek</th>
                <th>Status Perizinan Proyek</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetchAndDisplayKategori() {
                $.getJSON("proyek.json", function(data) {
                    // Clear existing table rows
                    $("#kategoriTable tbody").empty();

                    $.each(data, function(index, project) {
                        var newRow = $("<tr>");
                        newRow.append("<td>" + project.id + "</td>");
                        newRow.append("<td>" + project.namaproyek + "</td>");
                        newRow.append("<td>" + project.lokasiproyek + "</td>");
                        newRow.append("<td>" + project.tanggalmulaiproyek + "</td>");
                        newRow.append("<td>" + project.statusproyek + "</td>");
                        newRow.append("<td><a href='editproyek.php?id=" + project.id + "'>Ubah</a> <a href='hapuskategori.php?id=" + project.id + "'>Hapus</a></td>");
                        $("#kategoriTable tbody").append(newRow);
                    });
                });
            }

            fetchAndDisplayKategori();

            $("#tambahDataLink").click(function() {
                $("#tambahDataForm").toggle();
            });

            $("#kategoriForm").submit(function(event) {
                event.preventDefault();
                var namaProyek = $("#namaProyek").val();
                var lokasiProyek = $("#lokasiProyek").val();
                var tanggalMulaiProyek = $("#tanggalMulaiProyek").val();
                var statusProyek = $("#statusProyek").val();

                $.ajax({
                    url: "insert_data.php",
                    method: "POST",
                    data: {
                        namaProyek: namaProyek,
                        lokasiProyek: lokasiProyek,
                        tanggalMulaiProyek: tanggalMulaiProyek,
                        statusProyek: statusProyek
                    },
                    success: function(response) {
                        fetchAndDisplayKategori();
                        $("#tambahDataForm").hide();
                    }
                });
            });
        });
    </script>
</body>

</html>
