-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2026 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caratix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `nama`, `no_hp`, `id_tiket`, `jumlah`, `total`, `status`) VALUES
(12, 'wira', '082317695470', 11, 1, 1000000, 'Sudah Dibayar'),
(13, 'chantika', '082317695470', 1, 5, 17500000, 'Sudah Dibayar'),
(14, 'tikaaa', '082317695470', 15, 10, 28000000, 'Menunggu Pembayaran'),
(15, 'chn', '082317695468', 20, 17, 59500000, 'Menunggu Pembayaran'),
(16, 'chanchan', '082317695470', 26, 2, 6000000, 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `konser`
--

CREATE TABLE `konser` (
  `id_konser` int(11) NOT NULL,
  `nama_konser` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konser`
--

INSERT INTO `konser` (`id_konser`, `nama_konser`, `tanggal`, `lokasi`, `gambar`) VALUES
(1, 'SEVENTEEN WORLD TOUR BE THE SUN', '2022-09-24', 'Jakarta', 'seventeen.jpg'),
(2, 'Caratland', '2026-06-17', 'Bandung', 'download (17).jpg'),
(3, 'SEVENTEEN WORLD TOUR [NEW_] ENCORE', '2026-04-05', 'Incheon Asiad Main Stadium', 'encore.jpeg'),
(4, 'CXM DOUBLE UP LIVE PARTY', '2026-01-23', 'Inspire Arena', 'download (21).jpg'),
(5, 'DXS SERENADE ON STAGE', '2026-06-06', 'The Venetian Arena', 'SEVENTEEN’s DxS reveals dates and stops for 2026___.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_konser` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `benefit` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_konser`, `kategori`, `harga`, `stok`, `benefit`) VALUES
(1, 1, 'VIP', 3500000, 50, 'Boneka Miniteen '),
(2, 1, 'CAT 1', 2800000, 100, 'Keychain Miniteen '),
(3, 1, 'CAT 2', 2000000, 150, 'Keychain Miniteen '),
(4, 1, 'CAT 3', 1200000, 200, 'Keychain Miniteen '),
(6, 1, 'CAT 4', 800000, 100, 'Keychain Miniteen '),
(7, 1, 'CAT 5', 500000, 250, 'Keychain Miniteen '),
(8, 2, 'VIP', 3500000, 50, 'Boneka Miniteen'),
(9, 2, 'CAT 1', 2500000, 100, 'Keychain Miniteen'),
(10, 2, 'CAT 2', 1500000, 150, 'Keychain Miniteen'),
(11, 2, 'CAT 3', 1000000, 200, 'Keychain Miniteen'),
(12, 2, 'CAT 4', 750000, 200, 'Keychain Miniteen'),
(13, 2, 'CAT 5', 500000, 200, 'Keychain Miniteen'),
(14, 3, 'VIP', 3500000, 50, 'Boneka Miniteen'),
(15, 3, 'CAT 1', 2800000, 100, 'Keychain Miniteen'),
(16, 3, 'CAT 2', 2000000, 150, 'Keychain Miniteen'),
(17, 3, 'CAT 3', 1200000, 200, 'Keychain Miniteen'),
(18, 3, 'CAT 4', 800000, 200, 'Keychain Miniteen'),
(19, 3, 'CAT 5', 500000, 200, 'Keychain Miniteen'),
(20, 4, 'VIP', 3500000, 50, 'Boneka Miniteen'),
(21, 4, 'CAT 1', 2500000, 100, 'Keychain Miniteen'),
(22, 4, 'CAT 2', 1500000, 150, 'Keychain Miniteen'),
(23, 4, 'CAT 3', 1000000, 200, 'Keychain Miniteen'),
(24, 4, 'CAT 4', 750000, 200, 'Keychain Miniteen'),
(25, 4, 'CAT 5', 500000, 200, 'Keychain Miniteen'),
(26, 5, 'VIP', 3000000, 50, 'Boneka Miniteen'),
(27, 5, 'CAT 1', 2200000, 100, 'Keychain Miniteen'),
(28, 5, 'CAT 2', 1400000, 150, 'Keychain Miniteen'),
(29, 5, 'CAT 3', 900000, 200, 'Keychain Miniteen'),
(30, 5, 'CAT 4', 700000, 200, 'Keychain Miniteen'),
(31, 5, 'CAT 5', 500000, 200, 'Keychain Miniteen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `konser`
--
ALTER TABLE `konser`
  ADD PRIMARY KEY (`id_konser`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `konser`
--
ALTER TABLE `konser`
  MODIFY `id_konser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
