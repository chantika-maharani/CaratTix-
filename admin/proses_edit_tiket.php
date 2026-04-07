<?php
include "koneksi.php";

$id = $_POST['id'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];

if($kategori == "VIP"){
    $benefit = "Boneka Miniteen 🧸";
}else{
    $benefit = "Keychain Miniteen 🔑";
}

mysqli_query($conn,"UPDATE tiket SET
kategori='$kategori',
harga='$harga',
benefit='$benefit'
WHERE id_tiket='$id'");

header("location:tiket.php");