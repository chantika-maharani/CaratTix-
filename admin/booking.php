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
<title>Data Booking</title>

<style>

body{
margin:0;
font-family:'Segoe UI';
background:url('../assets/img/seventeen.jpg');
background-size:cover;
background-position:center;
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

.logout{
background:#F7CAC9;
padding:6px 12px;
border-radius:6px;
color:white;
text-decoration:none;
}

.user{
display:flex;
align-items:center;
gap:15px;
}

.container{
padding:30px;
}

h2{
color:white;
}

/* tombol */
.btn{
padding:5px 10px;
border-radius:5px;
text-decoration:none;
color:white;
font-size:13px;
}

.btn-terima{background:green;}
.btn-tolak{background:red;}

/* table */
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

tr:hover{
background:#f5f5f5;
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
<a href="tiket.php">Tiket</a>
<a href="booking.php">Booking</a>
</div>

<div class="user">
<span>Halo, <?php echo $_SESSION['username']; ?></span>
<a href="logout.php" class="logout">Logout</a>
</div>

</div>

<div class="container">

<h2>Data Booking</h2>

<div style="margin-bottom:15px;">
<a href="dashboard.php" 
style="background:#ddd;padding:8px 12px;border-radius:5px;text-decoration:none;color:black;">
← Kembali
</a>
</div>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>No HP</th> <!-- ✅ TAMBAHAN -->
<th>Konser</th>
<th>Tiket</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Total</th>
<th>Benefit</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($conn,"
SELECT booking.*, 
       konser.nama_konser, 
       tiket.kategori, 
       tiket.harga, 
       tiket.benefit
FROM booking
JOIN tiket ON booking.id_tiket = tiket.id_tiket
JOIN konser ON tiket.id_konser = konser.id_konser
");

while($d = mysqli_fetch_assoc($data)){
$total = $d['harga'] * $d['jumlah'];
?>

<tr>

<td><?php echo $no++; ?></td>
<td><?php echo $d['nama']; ?></td>

<!-- ✅ TAMPILKAN NO HP -->
<td><?php echo $d['no_hp']; ?></td>

<td><?php echo $d['nama_konser']; ?></td>

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
<td><?php echo $d['jumlah']; ?></td>

<td><b>Rp <?php echo number_format($total); ?></b></td>

<td><?php echo $d['benefit']; ?></td>

<!-- STATUS -->
<td>
<?php
if($d['status']=="Menunggu Pembayaran"){
echo "<span style='color:orange;font-weight:bold;'>Menunggu</span>";
}else if($d['status']=="Sudah Dibayar"){
echo "<span style='color:green;font-weight:bold;'>Lunas</span>";
}else{
echo "<span style='color:red;font-weight:bold;'>Batal</span>";
}
?>
</td>

<!-- AKSI -->
<td>
<a href="status_booking.php?id=<?php echo $d['id_booking']; ?>&aksi=terima" 
class="btn btn-terima">✔</a>

<a href="status_booking.php?id=<?php echo $d['id_booking']; ?>&aksi=tolak" 
class="btn btn-tolak">✖</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>