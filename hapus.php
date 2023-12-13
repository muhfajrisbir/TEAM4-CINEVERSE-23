<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
  $id = $_GET["id"];
  $conn = connectDB();
  $conn->query("DELETE FROM movies WHERE id=$id");
  echo "<script>alert('Film Berhasil dihapus.');</script>";
  // Mengalihkan ke watchlist
  echo '<script>window.location.href = "watchlist.php";</script>';
}
