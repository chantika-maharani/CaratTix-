<?php
include "koneksi.php";

$id_konser = $_POST['id_konser'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];

if($kategori=="VIP"){
    $benefit="Boneka Miniteen 🧸";
}else{
    $benefit="Keychain Miniteen 🔑";
}

mysqli_query($conn,"INSERT INTO tiket
(id_konser,kategori,harga,benefit)
VALUES('$id_konser','$kategori','$harga','$benefit')");

header("location:tiket.php");