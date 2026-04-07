<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$konser = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM konser"));
$tiket  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tiket"));
$booking = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM booking"));
?>

<!DOCTYPE html>
<html>
<head>
    
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('../assets/img/seventeen.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Overlay biar HD & smooth */
        .overlay {
            background: rgba(0,0,0,0.25);
            
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: rgba(146,168,209,0.8);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        .menu a {
            margin-right: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        .logout {
            background: #F7CAC9;
            padding: 6px 12px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* Content */
        .container {
            padding: 30px;
        }

        h2 {
            color: white;
        }

        /* Glass card */
        .card {
            display: inline-block;
            width: 250px;
            margin: 10px;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            color: white;
            font-weight: bold;

            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Info */
        .info {
            background: rgba(255,255,255,0.9);
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="overlay">

    <!-- Navbar -->
    <div class="navbar">
        <div class="menu">
            <a href="#">Dashboard</a>
            <a href="konser.php">Konser</a>
            <a href="tiket.php">Tiket</a>
            <a href="#">Booking</a>
        </div>
        <div>
            Halo, <?php echo $_SESSION['username']; ?> 
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="container">

        

        <div class="card">
             Total Konser <br><br>
            <?php echo $konser; ?>
        </div>

        <div class="card">
             Total Tiket <br><br>
            <?php echo $tiket; ?>
        </div>

        <div class="card">
             Total Booking <br><br>
            <?php echo $booking; ?>
        </div>

        <div class="info">
            Anda login sebagai <b><?php echo $_SESSION['username']; ?></b>.  
            Gunakan menu di atas untuk mengelola konser, tiket, dan booking di CaratTix.
        </div>

    </div>

</div>

</body>
</html>