<?php
include "koneksi.php";

$id = $_GET['id'];
$aksi = $_GET['aksi'];

if($aksi == "terima"){
    $status = "Sudah Dibayar";
}else{
    $status = "Dibatalkan";
}

mysqli_query($conn,"UPDATE booking SET status='$status' WHERE id_booking='$id'");

header("location:booking.php");