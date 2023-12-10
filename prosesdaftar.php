<?php
require 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Pendaftaran berhasil! Silahkan login.");</script>';
    echo '<script>window.location.href = "login.php";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
