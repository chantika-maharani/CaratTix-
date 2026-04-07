<?php
include "admin/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Cek Booking</title>

<style>
body{
margin:0;
font-family:'Segoe UI';
background: linear-gradient(135deg, #fce7f3, #e9d5ff, #bfdbfe);
min-height:100vh;
}

/* NAVBAR */
.navbar{
background: linear-gradient(90deg, #fbcfe8, #c4b5fd, #93c5fd);
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
color:white;
position:sticky;
top:0;
}

.menu a{
color:white;
text-decoration:none;
margin-left:25px;
font-weight:500;
}

.logo{
font-weight:bold;
font-size:18px;
}

/* BOX */
.container{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
}
.box{
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 15px 40px rgba(0,0,0,0.1);
min-width:320px;
transition:0.3s;
}

.box:hover{
transform:translateY(-5px);
}

/* INPUT */
input{
padding:10px;
width:250px;
margin-bottom:10px;
border-radius:8px;
border:1px solid #ddd;
}

button{
padding:10px 20px;
background:#F7CAC9;
border:none;
border-radius:8px;
cursor:pointer;
transition:0.2s;
}

button:hover{
background:#f4baba;
}

/* HASIL */
.hasil{
margin-top:20px;
text-align:left;
}

.card{
background:#f9f9f9;
padding:15px;
border-radius:10px;
margin-bottom:10px;

}

.status{
font-weight:bold;
}

/* warna status */
.menunggu{color:orange;}
.setuju{color:green;}
.tolak{color:red;}
</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
<div class="logo">💎 CaratTix</div>

<div class="menu">
<a href="index.php">Home</a>
<a href="cek_booking.php">Cek Booking</a>
</div>
</div>

<!-- CONTENT -->
<div class="container">

<div class="box">

<h2>Cek Status Booking</h2>

<form method="POST">
<input type="text" name="nama" placeholder="Masukkan Nama" required>
<br>
<button type="submit">Cek</button>
</form>

<div class="hasil">

<?php
if(isset($_POST['nama'])){
$nama = $_POST['nama'];

$data = mysqli_query($conn,"
SELECT booking.*, tiket.kategori, konser.nama_konser
FROM booking
JOIN tiket ON booking.id_tiket = tiket.id_tiket
JOIN konser ON tiket.id_konser = konser.id_konser
WHERE booking.nama='$nama'
");

if(mysqli_num_rows($data) > 0){

while($d=mysqli_fetch_assoc($data)){

// warna status
$statusClass = "menunggu";
if($d['status']=="Disetujui") $statusClass="setuju";
if($d['status']=="Ditolak") $statusClass="tolak";

echo "<div class='card'>";
echo "Nama: ".$d['nama']."<br>";
echo "Konser: ".$d['nama_konser']."<br>";
echo "Tiket: ".$d['kategori']."<br>";
echo "Jumlah: ".$d['jumlah']."<br>";
echo "Total: Rp ".number_format($d['total'])."<br>";
echo "Status: <span class='status $statusClass'>".$d['status']."</span>";
echo "</div>";
}

}else{
echo "<p>Tidak ditemukan booking dengan nama tersebut.</p>";
}
}
?>

</div>

</div>

</div>

</body>
</html>