<?php
include "admin/koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM konser");
?>

<!DOCTYPE html>
<html>
<head>

<title>CaratTix - Booking Tiket Konser</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
.navbar-brand{
color:white;
font-weight:bold;
font-size:22px;
}

.nav-link{
color:white;
font-weight:500;
}

.nav-link:hover{
color:#ffd6e0;
}

/* HERO */

.hero{
background-image:url('assets/img/uji.jpg');
background-size:cover;
background-position:center;
height:350px;
display:flex;
align-items:center;
justify-content:center;
text-align:center;
color:white;
position:relative;
}

.hero::before{
content:"";
position:absolute;
top:0;
left:0;
right:0;
bottom:0;
background:rgba(0,0,0,0.6);
}

.hero-content{
position:relative;
z-index:2;
}

.hero h1{
font-size:48px;
font-weight:700;
}

/* SECTION */

.section-title{
text-align:center;
font-weight:700;
margin-bottom:10px;
}

.section-sub{
text-align:center;
color:#666;
margin-bottom:40px;
}

/* CARD */

.card{
border:none;
border-radius:18px;
overflow:hidden;
box-shadow:0 12px 30px rgba(0,0,0,0.15);
transition:0.3s;
}

.card:hover{
transform:translateY(-10px);
}

.card img{
height:240px;
object-fit:cover;
}

.card-title{
font-weight:600;
}

/* BUTTON */

.btn-book{
background:#F7CAC9;
border:none;
color:black;
font-weight:600;
border-radius:10px;
}

.btn-book:hover{
background:#f4baba;
}

/* FOOTER */

footer{
margin-top:80px;
background: linear-gradient(90deg, #fbcfe8, #c4b5fd, #93c5fd);
color:white;
text-align:center;
padding:20px;
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

<!-- HERO -->

<div class="hero">

<div class="hero-content">

<h1>Booking Tiket Konser</h1>
<h4>SEVENTEEN Concert Ticket</h4>
<p>Pesan tiket konser favoritmu dengan mudah dan cepat</p>

</div>

</div>

<!-- LIST KONSER -->

<div class="container mt-5">

<h3 class="section-title">Konser yang Tersedia</h3>
<p class="section-sub">Pilih konser favoritmu lalu pesan tiketnya sebelum kehabisan.</p>

<div class="row g-4 justify-content-center">

<?php while($d = mysqli_fetch_assoc($data)){ ?>

<div class="col-md-5 col-lg-4">

<div class="card h-100">

<img src="assets/img/konser/<?php echo !empty($d['gambar']) ? $d['gambar'] : 'poster.jpg'; ?>" class="card-img-top">

<div class="card-body">

<h5 class="card-title">
<?php echo $d['nama_konser']; ?>
</h5>

<p>

📅 <?php echo $d['tanggal']; ?><br>
📍 <?php echo $d['lokasi']; ?><br>

</p>

<a href="booking.php?id=<?php echo $d['id_konser']; ?>" class="btn btn-book w-100">

🎟 Pesan Tiket Sekarang

</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>



<!-- FOOTER -->

<footer>

© 2026 CaratTix  
Ticket Booking Platform for Carats 💎

</footer>

</body>
</html>