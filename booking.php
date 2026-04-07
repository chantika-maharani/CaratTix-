<?php
include "admin/koneksi.php";

$id = $_GET['id'];

$konser = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM konser WHERE id_konser='$id'"));
$tiket = mysqli_query($conn,"SELECT * FROM tiket WHERE id_konser='$id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking</title>

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
z-index:999;
}

.menu a{
color:white;
text-decoration:none;
font-weight:500;
margin-left:25px; 
}

.logo{
font-weight:bold;
font-size:18px;
}

/* FORM */
.container{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.card{
max-width:500px;
margin:auto;
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);

}

input,select{
width:100%;
padding:10px;
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

.total{
font-weight:bold;
margin:10px 0;
font-size:16px;
}

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

<div class="container">

<div class="card">

<h2><?php echo $konser['nama_konser']; ?></h2>
<p>📅 <?php echo $konser['tanggal']; ?></p>
<p>📍 <?php echo $konser['lokasi']; ?></p>

<form method="POST" action="proses_booking.php">

<input type="text" name="nama" placeholder="Nama" required>
<input type="text" name="no_hp" placeholder="No HP" required>

<select name="id_tiket" id="tiket" onchange="hitung()" required>
<option value="">-- Pilih Tiket --</option>

<?php while($t=mysqli_fetch_assoc($tiket)){ ?>
<option value="<?php echo $t['id_tiket']; ?>" 
data-harga="<?php echo $t['harga']; ?>">
<?php echo $t['kategori']; ?> - Rp <?php echo number_format($t['harga']); ?>
</option>
<?php } ?>

</select>

<input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" onkeyup="hitung()" onchange="hitung()" required>

<div class="total">Total: Rp <span id="total">0</span></div>

<input type="hidden" name="total" id="total_input">

<button type="submit">Booking Sekarang</button>

</form>

</div>

</div>

<script>
function hitung(){
let tiket = document.getElementById("tiket");
let jumlah = document.getElementById("jumlah").value;

// ambil harga dari option
let harga = tiket.options[tiket.selectedIndex]?.getAttribute("data-harga");

// validasi
if(!harga || jumlah == "" || jumlah <= 0){
document.getElementById("total").innerText = "0";
document.getElementById("total_input").value = 0;
return;
}

// hitung total
let total = parseInt(harga) * parseInt(jumlah);

// tampilkan
document.getElementById("total").innerText = total.toLocaleString("id-ID");
document.getElementById("total_input").value = total;
}
</script>

</body>
</html>