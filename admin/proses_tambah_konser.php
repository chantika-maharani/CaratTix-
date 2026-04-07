 <?php
include "koneksi.php";

$nama = $_POST['nama_konser'];
$tanggal = $_POST['tanggal'];
$lokasi = $_POST['lokasi'];
$gambar = $_FILES['gambar']['name'];

// upload gambar
$tmp = $_FILES['gambar']['tmp_name'];
move_uploaded_file($tmp, "../assets/img/konser/".$gambar);

// INSERT (WAJIB pakai kolom)
mysqli_query($conn,"INSERT INTO konser 
(nama_konser, tanggal, lokasi, gambar)
VALUES 
('$nama','$tanggal','$lokasi','$gambar')");

header("location:konser.php");