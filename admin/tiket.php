<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Tiket</title>

<style>
body{
margin:0;
font-family:'Segoe UI';
background: url('../assets/img/seventeen.jpg') no-repeat center center fixed;
background-size: cover;
}

.overlay{
background:rgba(0,0,0,0.3);
min-height:100vh;
}

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

.user{
display:flex;
gap:15px;
align-items:center;
}

.logout{
background:#F7CAC9;
padding:6px 12px;
border-radius:6px;
color:white;
text-decoration:none;
}

.container{
padding:30px;
}

h2{
color:white;
}

.btn{
padding:8px 12px;
border-radius:6px;
text-decoration:none;
}

.btn-tambah{background:#F7CAC9;color:black;}
.btn-kembali{background:#ddd;color:black;}
.btn-edit{background:orange;color:white;padding:5px 10px;border-radius:5px;}
.btn-hapus{background:red;color:white;padding:5px 10px;border-radius:5px;}

table{
width:100%;
background:white;
border-radius:10px;
overflow:hidden;
border-collapse:collapse;
}

th{
background:#8da0c2;
color:white;
padding:10px;
}

td{
text-align:center;
padding:10px;
}

tr:hover{background:#f5f5f5;}
</style>
</head>

<body>

<div class="overlay">

<div class="navbar">
<div class="menu">
<a href="dashboard.php">Dashboard</a>
<a href="konser.php">Konser</a>
<a href="tiket.php">Tiket</a>
<a href="booking.php">Booking</a>
</div>

<div class="user">
<span>Halo, <?php echo $_SESSION['username']; ?></span>
<a href="logout.php" class="logout">Logout</a>
</div>
</div>

<div class="container">

<h2>Data Tiket</h2>

<div style="display:flex; gap:10px; margin-bottom:15px;">
<a href="tambah_tiket.php" class="btn btn-tambah">+ Tambah Tiket</a>
<a href="dashboard.php" class="btn btn-kembali">← Kembali</a>
</div>

<table>
<tr>
<th>No</th>
<th>Kategori</th>
<th>Harga</th>
<th>Benefit</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT * FROM tiket ORDER BY id_tiket ASC");

while($d=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?php echo $no++; ?></td>

<td>
<?php
if($d['kategori']=="VIP"){
echo "⭐ VIP";
}else{
echo $d['kategori'];
}
?>
</td>

<td>Rp <?php echo number_format($d['harga']); ?></td>

<td><?php echo $d['benefit']; ?></td>

<td style="display:flex; gap:6px; justify-content:center;">
<a href="edit_tiket.php?id=<?php echo $d['id_tiket']; ?>" class="btn-edit">Edit</a>
<a href="hapus_tiket.php?id=<?php echo $d['id_tiket']; ?>" 
class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
</td>

</tr>

<?php } ?>

</table>

</div>
</div>
</body>
</html>