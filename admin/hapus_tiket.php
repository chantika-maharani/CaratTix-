<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM tiket WHERE id_tiket='$id'");

header("location:tiket.php");