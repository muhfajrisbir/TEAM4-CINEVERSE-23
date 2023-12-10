<?php
session_start();
require_once('koneksi.php');

// Ambil informasi login dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk verifikasi login
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Login berhasil, buat session
    $_SESSION['username'] = $username;
    header("Location: beranda.php"); // mengallihkan ke halaman beranda.php
} else {
    // Login gagal, mengalihkan kembali ke halaman login
    echo '<script>
          alert("Login gagal. Username atau password yang anda masukkan salah!");
          window.location.href = "/cineverse/login.php";
        </script>';
}

$conn->close();
