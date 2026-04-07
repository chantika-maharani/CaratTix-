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
<title>Data Konser</title>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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
}

h2{
color:white;
}

/* tombol */
.btn{
padding:8px 14px;
border-radius:6px;
text-decoration:none;
font-size:14px;
}

.btn-tambah{
background:#F7CAC9;
color:black;
}

.btn-kembali{
background:#ddd;
color:black;
}

.btn-edit{
background:orange;
color:white;
padding:5px 10px;
border-radius:5px;
text-decoration:none;
}

.btn-hapus{
background:red;
color:white;
padding:5px 10px;
border-radius:5px;
text-decoration:none;
}

/* aksi */
.aksi a{
margin:0 3px;
}

/* table */
table{
background:white;
border-radius:10px;
overflow:hidden;
}

th{
background:#8da0c2;
color:white;
}

td{
text-align:center;
}

.poster{
width:70px;
border-radius:6px;
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

<h2>Data Konser</h2>

<!-- tombol -->
<div style="display:flex; justify-content:space-between; margin-bottom:15px;">

<div>
<a href="tambah_konser.php" class="btn btn-tambah">+ Tambah Konser</a>
</div>

<div>
<a href="dashboard.php" class="btn btn-kembali">← Kembali</a>
</div>

</div>

<table id="tabelKonser" class="display">

<thead>
<tr>
<th>No</th>
<th>Poster</th>
<th>Nama Konser</th>
<th>Tanggal</th>
<th>Lokasi</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT * FROM konser");

while($d=mysqli_fetch_array($data)){
?>

<tr>

<td><?php echo $no++; ?></td>

<td>
<img src="../assets/img/konser/<?php echo $d['gambar']; ?>" class="poster">
</td>

<td><?php echo $d['nama_konser']; ?></td>
<td><?php echo $d['tanggal']; ?></td>
<td><?php echo $d['lokasi']; ?></td>

<td class="aksi">

<a href="edit_konser.php?id=<?php echo $d['id_konser']; ?>" class="btn-edit">
Edit
</a>

<a href="hapus_konser.php?id=<?php echo $d['id_konser']; ?>"
class="btn-hapus"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

<script>

$(document).ready(function(){

$('#tabelKonser').DataTable({
pageLength:5,
lengthMenu:[5,10,25,50],
language:{
paginate:{
previous:"Previous",
next:"Next"
}
}
});

});

</script>

</body>
</html>