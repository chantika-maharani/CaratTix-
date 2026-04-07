<?php
include "admin/koneksi.php";

// Ambil data dari form dan bersihkan untuk keamanan
$id_tiket = mysqli_real_escape_string($conn, $_POST['id_tiket']);
$nama    = mysqli_real_escape_string($conn, $_POST['nama']);
$no_hp   = mysqli_real_escape_string($conn, $_POST['no_hp']);
$jumlah  = mysqli_real_escape_string($conn, $_POST['jumlah']);
$total   = mysqli_real_escape_string($conn, $_POST['total']);

$status = "Menunggu Pembayaran";

// Validasi No HP: hanya angka dan panjang 10–15 digit
if (!preg_match('/^[0-9]{10,15}$/', $no_hp)) {
    die("Nomor HP tidak valid! Pastikan hanya angka dan 10–15 digit.");
}

// Query INSERT dengan pengecekan error
$query = "INSERT INTO booking
(id_tiket, nama, no_hp, jumlah, total, status)
VALUES
('$id_tiket', '$nama', '$no_hp', '$jumlah', '$total', '$status')";

mysqli_query($conn, $query) or die("Query Error: ".mysqli_error($conn));

// Redirect ke halaman sukses
header("location:sukses.php");
exit;
?>