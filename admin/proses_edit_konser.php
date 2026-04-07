<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_konser'];
$tanggal = $_POST['tanggal'];
$lokasi = $_POST['lokasi'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

if($gambar != ""){

    move_uploaded_file($tmp,"../assets/img/konser/".$gambar);

    mysqli_query($conn,"UPDATE konser SET
    nama_konser='$nama',
    tanggal='$tanggal',
    lokasi='$lokasi',
    gambar='$gambar'
    WHERE id_konser='$id'");

}
else{

    mysqli_query($conn,"UPDATE konser SET
    nama_konser='$nama',
    tanggal='$tanggal',
    lokasi='$lokasi'
    WHERE id_konser='$id'");

}

header("location:konser.php");
?>