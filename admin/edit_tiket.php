<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tiket WHERE id_tiket='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Tiket</title>

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

/* CONTENT */
.container{
padding:30px;
color:white;
}

/* posisi tombol kembali */
.btn-wrap{
display:flex;
justify-content:flex-start;
margin-bottom:20px;
}

input, select{
padding:10px;
border-radius:6px;
border:none;
min-width:250px;
margin-right:10px;
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
padding:8px 14px;
border-radius:6px;
text-decoration:none;
color:black;
font-weight:500;
}

.form-row{
display:flex;
flex-wrap:wrap;
gap:10px;
align-items:center;
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

<h2>Edit Tiket</h2>

<div class="btn-wrap">
<a href="tiket.php" class="btn-kembali">← Kembali</a>
</div>

<form method="POST" action="proses_edit_tiket.php" class="form-row">

<input type="hidden" name="id" value="<?php echo $data['id_tiket']; ?>">

<!-- kategori -->
<select name="kategori" id="kategori" onchange="setHarga()">

<option value="VIP" <?php if($data['kategori']=="VIP") echo "selected"; ?>>VIP</option>
<option value="CAT 1" <?php if($data['kategori']=="CAT 1") echo "selected"; ?>>CAT 1</option>
<option value="CAT 2" <?php if($data['kategori']=="CAT 2") echo "selected"; ?>>CAT 2</option>
<option value="CAT 3" <?php if($data['kategori']=="CAT 3") echo "selected"; ?>>CAT 3</option>
<option value="CAT 4" <?php if($data['kategori']=="CAT 4") echo "selected"; ?>>CAT 4</option>
<option value="CAT 5" <?php if($data['kategori']=="CAT 5") echo "selected"; ?>>CAT 5</option>

</select>

<!-- harga -->
<input type="number" name="harga" id="harga" value="<?php echo $data['harga']; ?>" readonly>

<button type="submit">Simpan Perubahan</button>

</form>

</div>
</div>

<!-- SCRIPT HARGA -->
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