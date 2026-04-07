<!DOCTYPE html>
<html>
<head>
<title>Booking Berhasil</title>

<style>
body{
margin:0;
font-family:'Segoe UI';
background: linear-gradient(135deg, #fce7f3, #e9d5ff, #bfdbfe);
min-height:100vh;
text-align:center;
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
margin-left:25px; /* 🔥 INI YANG BIKIN JARAK */
}

.logo{
font-weight:bold;
font-size:18px;
}

/* BOX */
.box{
margin-top:100px;
background:white;
padding:40px;
display:inline-block;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<div class="navbar">
<div class="logo">💎 CaratTix</div>

<div class="menu">
<a href="index.php">Home</a>
<a href="cek_booking.php">Cek Booking</a>
</div>
</div>

<div class="box">

<h2>🎉 Booking Berhasil!</h2>

<p>
Terima kasih sudah melakukan booking tiket.<br>
Silakan tunggu konfirmasi dari admin.
</p>

<br>

<a href="index.php" 
style="background:#F7CAC9;padding:10px 20px;border-radius:10px;text-decoration:none;color:black;">
Kembali ke Home
</a>

</div>

</body>
</html>