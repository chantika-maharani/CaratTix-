<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Konser</title>

<style>

body{
margin:0;
font-family:'Segoe UI',sans-serif;
background:url('../assets/img/seventeen.jpg');
background-size:cover;
background-position:center;
}

.overlay{
background:rgba(0,0,0,0.25);
min-height:100vh;
}

/* NAVBAR */
.navbar{
background:rgba(146,168,209,0.85);
padding:15px 30px;
color:white;
display:flex;
justify-content:space-between;
}

.menu a{
margin-right:20px;
color:white;
text-decoration:none;
font-weight:bold;
}

.logout{
background:#F7CAC9;
padding:6px 12px;
border-radius:6px;
color:white;
text-decoration:none;
font-weight:bold;
}

/* FORM AREA */
.container{
display:flex;
justify-content:center;
padding:40px;
}

.form-box{
background:rgba(255,255,255,0.9);
padding:25px;
border-radius:12px;
width:400px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin-top:5px;
margin-bottom:15px;
border-radius:6px;
border:1px solid #ccc;
}

/* BUTTON */
.btn{
padding:8px 14px;
border-radius:6px;
border:none;
cursor:pointer;
}

.btn-simpan{
background:#F7CAC9;
}

.btn-kembali{
background:#ddd;
text-decoration:none;
padding:8px 14px;
border-radius:6px;
color:black;
margin-left:10px;
}

</style>

</head>

<body>

<div class="overlay">

<!-- NAVBAR -->
<div class="navbar">

<div class="menu">
<a href="dashboard.php">Dashboard</a>
<a href="konser.php">Konser</a>
<a href="#">Tiket</a>
<a href="#">Booking</a>
</div>

<div style="display:flex; align-items:center; gap:10px;">
<span>Halo, <?php echo $_SESSION['username']; ?></span>
<a href="logout.php" class="logout">Logout</a>
</div>

</div>

<!-- FORM -->
<div class="container">

<div class="form-box">

<h2>Tambah Konser</h2>

<form action="proses_tambah_konser.php" method="POST" enctype="multipart/form-data">

<label>Nama Konser</label>
<input type="text" name="nama_konser" required>

<label>Tanggal</label>
<input type="date" name="tanggal" required>

<label>Lokasi</label>
<input type="text" name="lokasi" required>

<label>Poster Konser</label>
<input type="file" name="gambar" required>

<button type="submit" class="btn btn-simpan">Simpan</button>

<a href="konser.php" class="btn-kembali">Kembali</a>

</form>

</div>

</div>

</div>

</body>
</html>