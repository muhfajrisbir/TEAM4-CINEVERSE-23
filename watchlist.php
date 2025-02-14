<?php
session_start();
require_once('koneksi.php');
include 'functions.php';

$result = getMovies();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<style>
  .movie-card {
    margin-bottom: 50px;
  }

  .movie-card img {
    width: auto;
    height: 200px;
    object-fit: cover;
  }

  .card-title {
    font-family: Helvetica;
    font-weight: bold;
    font-size: 18px;
  }

  .card-text {
    text-justify: auto;
    font-size: 13px;
  }

  p .card-text {
    line-height: 50px;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <title>Cineverse | Watchlist</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

  <!-- Navbar Watchlist -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="beranda.php">
        <img src="uploads/cineverselogo.png" width="90" height="50" alt="" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="beranda.php">Beranda</a>
          </li>

          <li class="nav-item">
            <a href="watchlist.php" class="nav-link active">Watchlist</a>
          </li>

          <li class="nav-item">
                <a href="bioskop.php" class="nav-link">Bioskop</a>
                </li>
        </ul>

        <!-- Username//Logout -->
        <div class="btn-group">
          <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a> Halo,
              <?php echo  $_SESSION['username']; ?>👋</a>
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>

      </div>
    </div>
    </div>
  </nav>
  <br>
  <br>
  <div class="container">
    <h1 class="mt-5 text-center"><b>Watchlist</b></h1>
    <hr>
    <a class="btn btn-success btn-sm" href="tambah.php" role="button">+ Tambah Film</a>
    <a class="btn btn-warning btn-sm" href="editwatchlist.php" role="button">Edit</a>

    <!-- Read/Baca ONLY -->
    <div class="row mt-3">
      <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="col-md-3 col-lg-2">
          <div class="card movie-card">
            <img src="Uploads/<?= $row["poster"] ?>" class="card-img-top" alt="<?= $row["title"] ?>">
            <div class="card-body text-center">
              <h5 class="card-title"><?= $row["title"] ?></h5>
              <p class="card-text"><?= $row["director"] ?> <br>
                <?= $row["rating"] ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>


  <!-- Opsional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>