<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM konser WHERE id_konser='$id'");

header("location:konser.php");
?>