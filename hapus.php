<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
  $id = $_GET["id"];
  $conn = connectDB();
  $conn->query("DELETE FROM movies WHERE id=$id");
  header("Location: watchlist.php");
}
