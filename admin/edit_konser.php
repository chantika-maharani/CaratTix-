<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM konser WHERE id_konser='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Konser</title>

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

/* navbar */
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

.container{
padding:30px;
display:flex;
justify-content:center;
}

.card{
background:white;
padding:30px;
border-radius:10px;
width:400px;
}

input{
width:100%;
padding:8px;
margin-bottom:15px;
}

button{
background:#F7CAC9;
border:none;
padding:10px 15px;
border-radius:6px;
cursor:pointer;
}

.btn-kembali{
background:#ddd;
padding:8px 14px;
border-radius:6px;
text-decoration:none;
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

<div class="container">

<div class="card">

<h2>Edit Konser</h2>

<form action="proses_edit_konser.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $d['id_konser']; ?>">

Nama Konser
<input type="text" name="nama_konser" value="<?php echo $d['nama_konser']; ?>">

Tanggal
<input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>">

Lokasi
<input type="text" name="lokasi" value="<?php echo $d['lokasi']; ?>">

Poster Lama <br>
<img src="../assets/img/konser/<?php echo $d['gambar']; ?>" width="120"><br><br>

Ganti Poster
<input type="file" name="gambar">

<button type="submit">Update</button>
<a href="konser.php" class="btn-kembali">Kembali</a>

</form>

</div>

</div>

</div>

</body>
</html>