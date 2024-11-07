<?php
session_start();
require_once('koneksi.php');
include 'functions.php';

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cineverse | Bioskop</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <!-- Custom CSS -->
    <style>
        #map {
            height: 500px;
            width: 100%;
            margin-top: 80px; /* Agar peta tidak tertutup navbar */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="beranda.php">
                <img src="uploads/cineverselogo.png" width="90" height="50" alt="Cineverse Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="watchlist.php" class="nav-link">Watchlist</a>
                    </li>
                    <li class="nav-item">
                        <a href="bioskop.php" class="nav-link active">Bioskop</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="container">
    <h2 class="mt-5 text-center"><b>Bioskop</b></h2>
        <hr>
        <div class="row mt-3" id="map"></div>
    </div>
    <!-- Map Container -->
    

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
    // Inisialisasi peta
    var map = L.map('map').setView([-5.135851565073646, 119.44881980671443], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Data lokasi
    var lokasi = [
    <?php
    $sql = "SELECT * FROM bioskop";
    $result = $conn->query($sql);
    $data = []; // Inisialisasi array untuk menampung data

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Tambahkan data ke array PHP
            $data[] = "[" . $row["id"] . ", '" . addslashes($row["nama_lokasi"]) . "', '" . addslashes($row["alamat"]) . "', '" . addslashes($row["deskripsi"]) . "', " . $row["latitude"] . ", " . $row["longitude"] . "]";
        }
    }

    // Gabungkan data menjadi string dan hapus trailing comma
    echo implode(",", $data);
    ?>
];


    console.log(lokasi); // Debug data lokasi

    var markers = [];
    for (var i = 0; i < lokasi.length; i++) {
        var marker = L.marker([lokasi[i][4], lokasi[i][5]])
            .bindPopup("<b>" + lokasi[i][1] + "</b><br>" + lokasi[i][2])
            .addTo(map);
        markers.push([lokasi[i][4], lokasi[i][5]]);
    }

    if (markers.length > 0) {
        map.fitBounds(markers);
    }
</script>
</body>
</html>
