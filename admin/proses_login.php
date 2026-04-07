<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek ke database
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

// Hitung data
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    echo "<script>
            alert('Login gagal! Username atau password salah');
            window.location='login.php';
          </script>";
}
?>