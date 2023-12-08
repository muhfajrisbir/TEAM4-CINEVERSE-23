<?php
function connectDB() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cineverse";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

function getMovies() {
  $conn = connectDB();
  $result = $conn->query("SELECT * FROM movies");
  return $result;
}

function tambahMovie($title, $director, $rating, $poster) {
  $conn = connectDB();
  $sql = "INSERT INTO movies (title, director, rating, poster) VALUES ('$title', '$director','$rating', '$poster')";
  $conn->query($sql);
}
?>