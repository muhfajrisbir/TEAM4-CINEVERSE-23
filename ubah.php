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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineverse | Edit Watchlist</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar Ubah Film -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="uploads/cineverselogo.png" width="90" height="50" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="beranda.php"
                >Beranda</a
              >
            </li>

            <li class="nav-item">
              <a href="watchlist.php" class="nav-link active">Watchlist</a>
            </li>
          </ul>

          <!-- Username//Tombol Logout -->
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = connectDB();
    $result = $conn->query("SELECT * FROM movies WHERE id=$id");
    $movie = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $director = $_POST["director"];
    $rating = $_POST["rating"];
    $poster = $_POST["poster"];

    $conn = connectDB();
    $sql = "UPDATE movies SET title='$title', director='$director',rating='$rating', poster='$poster' WHERE id=$id";
     if ($conn->query($sql) === TRUE) {
        // Data update sukses
        echo '<script>alert("Data berhasil diubah!");</script>';
        // Mengalihkan ke index
        echo '<script>window.location.href = "watchlist.php";</script>';
        exit;
    } else {
        echo "Error : " . $conn->error;
    }
}
?>

<!-- Form ubah movie -->
<div class="container mt-5">
  <h1 class="mt-5 text-center"><b>Update Film</b></h1>
  <hr>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $movie["id"] ?>">
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $movie["title"] ?>" required>
        </div>
        <div class="form-group">
            <label for="director">Sutradara</label>
            <input type="text" class="form-control" id="director" name="director" value="<?= $movie["director"] ?>" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <select class="form-control" id="rating" name="rating" required>
                <option value="★">★</option>
                <option value="★★">★★</option>
                <option value="★★★">★★★</option>
                <option value="★★★★">★★★★</option>
                <option value="★★★★★">★★★★★</option>
            </select>
        </div>
        <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file" class="form-control" id="poster" name="poster" required>
      </div>
        <button type="submit" class="btn btn-warning" name="update">Ubah</button>
    </form>
    <a href="watchlist.php" class="btn btn-secondary mt-3">Kembali Ke Watchlist</a>
</div>

<!-- Opsional JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
</body>
</html>
