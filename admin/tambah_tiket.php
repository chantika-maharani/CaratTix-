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
<title>Tambah Tiket</title>

<style>
body{
margin:0;
font-family:'Segoe UI';
background:url('../assets/img/seventeen.jpg');
background-size:cover;
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
color:white;
}

input, select{
width:300px;
padding:10px;
margin-bottom:12px;
border-radius:6px;
border:none;
}

button{
background:#F7CAC9;
padding:10px 15px;
border:none;
border-radius:6px;
cursor:pointer;
}

.btn-kembali{
background:#ddd;
color:black;
padding:8px 12px;
border-radius:6px;
text-decoration:none;
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

<!-- CONTENT -->
<div class="container">

<h2>Tambah Tiket</h2>

<a href="tiket.php" class="btn-kembali">← Kembali</a>

<br><br>

<form method="POST" action="proses_tambah_tiket.php">

<!-- PILIH KONSER -->
<select name="id_konser" required>
<option value="">-- Pilih Konser --</option>
<?php
$k=mysqli_query($conn,"SELECT * FROM konser");
while($d=mysqli_fetch_assoc($k)){
echo "<option value='$d[id_konser]'>$d[nama_konser]</option>";
}
?>
</select>

<!-- KATEGORI -->
<select name="kategori" id="kategori" onchange="setHarga()" required>
<option value="">-- Pilih Kategori --</option>
<option value="VIP">VIP</option>
<option value="CAT 1">CAT 1</option>
<option value="CAT 2">CAT 2</option>
<option value="CAT 3">CAT 3</option>
<option value="CAT 4">CAT 4</option>
<option value="CAT 5">CAT 5</option>
</select>

<!-- HARGA -->
<input type="number" id="harga" name="harga" readonly placeholder="Harga otomatis">

<br>
<button type="submit">Simpan</button>

</form>

</div>
</div>

<script>
function setHarga(){
let k=document.getElementById("kategori").value;
let h=document.getElementById("harga");

if(k=="VIP") h.value=3500000;
else if(k=="CAT 1") h.value=2800000;
else if(k=="CAT 2") h.value=2000000;
else if(k=="CAT 3") h.value=1200000;
else if(k=="CAT 4") h.value=800000;
else if(k=="CAT 5") h.value=500000;
}
</script>

</body>
</html>