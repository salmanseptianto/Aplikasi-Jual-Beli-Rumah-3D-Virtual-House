-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 07:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertivirtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `idblogs` int(11) NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`idblogs`, `judul`, `created_at`, `updated_at`, `deskripsi`, `tanggal`, `foto`) VALUES
(17, 'Tanah IKN Murah ?', '2023-12-07 06:59:02', '2023-12-07 06:59:27', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-12-07', 'image 27 (6).png');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idpembelian` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tanggaltransfer` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idpembelian`, `nama`, `tanggaltransfer`, `tanggal`, `bukti`) VALUES
(1, 1, 'Alex', '2023-12-07', '2023-12-07 00:00:00', '20231207140247bukti.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `id` int(11) NOT NULL,
  `tanggalbeli` date NOT NULL,
  `totalbeli` text NOT NULL,
  `alamat` text NOT NULL,
  `statusbeli` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `notransaksi`, `id`, `tanggalbeli`, `totalbeli`, `alamat`, `statusbeli`, `waktu`) VALUES
(1, '#TP20231207020235', 2, '2023-12-07', '20000', 'Jl. Palembang', 'Di Terima, Silahkan ke Kantor kami', '2023-12-07 14:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `pembelianproperti`
--

CREATE TABLE `pembelianproperti` (
  `idpembelianproperti` int(11) NOT NULL,
  `idpembelian` int(11) NOT NULL,
  `idproperti` int(11) NOT NULL,
  `nama` text NOT NULL,
  `harga` text NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelianproperti`
--

INSERT INTO `pembelianproperti` (`idpembelianproperti`, `idpembelian`, `idproperti`, `nama`, `harga`, `subharga`, `jumlah`) VALUES
(1, 1, 1, 'Rumah Strategis Butuh Cepat', '20000', '20000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `telepon` text NOT NULL,
  `alamat` text NOT NULL,
  `fotoprofil` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`) VALUES
(1, 'Salman', 'admin@gmail.com', 'admin', '08123456789', 'Jl. Palembang', '', 'Admin'),
(2, 'Alex', 'alex@gmail.com', 'alex', '08123456789', 'Jl. Palembang', 'Untitled.png', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `idproperti` int(11) NOT NULL,
  `namaproperti` text NOT NULL,
  `hargaproperti` text NOT NULL,
  `deskripsiproperti` text NOT NULL,
  `kamartidur` int(11) NOT NULL,
  `kamarmandi` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `fitur` text NOT NULL,
  `location_lat` varchar(100) NOT NULL,
  `location_long` varchar(100) NOT NULL,
  `links` varchar(100) NOT NULL,
  `fotoproperti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`idproperti`, `namaproperti`, `hargaproperti`, `deskripsiproperti`, `kamartidur`, `kamarmandi`, `tipe`, `fitur`, `location_lat`, `location_long`, `fotoproperti`) VALUES
(1, 'Rumah Strategis Butuh Cepat', '20000', 'Dekat SDN 27 dan 12 Talang kelapa, dekat SMPN 51 Palembang, dekat SMA 21 Palembang, tidak banjir dan tidak kekeringan saat musim kemarau.', 2, 2, '36', '-', '-2.953495474421877,', '104.73283073639186', 'rumah1.webp'),
(10, 'Dijual Cepat Ruko Strategis Area Bisnis', '600000000', '<p>Ruko aset nasabah bank .</p>\r\n\r\n<p>Legalitas aman .</p>\r\n\r\n<p>Jual beli dimediasi pihak bank, resmi dan aman .</p>\r\n\r\n<p>Keuntungan membeli aset bank via mitra resmi seperti kami : .</p>\r\n\r\n<p>Harga sangat murah dan sesuai harga dari bank .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Legalitas aman .</p>\r\n\r\n<p>.</p>\r\n\r\n<p>Dimediasi dengan pihak debitur/bank, dijelaskan secara rinci mengenai prosedur pembelian produk bank.</p>\r\n\r\n<p>Bebas fee marketing karena kami mitra resmi bank ybs .</p>\r\n\r\n<p>.</p>\r\n\r\n<p>Marketing profesional bersertifikat .</p>\r\n\r\n<p>Lokasi Strategis dan Prospektif: lb/lt 78/71m..</p>', 3, 1, '36', '-', '-2.953495474421877,', '104.73283073639186', 'image (2).webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`idblogs`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idpembelian` (`idpembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pembelianproperti`
--
ALTER TABLE `pembelianproperti`
  ADD PRIMARY KEY (`idpembelianproperti`),
  ADD KEY `idpembelian` (`idpembelian`,`idproperti`),
  ADD KEY `idproperti` (`idproperti`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`idproperti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `idblogs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelianproperti`
--
ALTER TABLE `pembelianproperti`
  MODIFY `idpembelianproperti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `idproperti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idpembelian`) REFERENCES `pembelian` (`idpembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelianproperti`
--
ALTER TABLE `pembelianproperti`
  ADD CONSTRAINT `pembelianproperti_ibfk_1` FOREIGN KEY (`idpembelian`) REFERENCES `pembelian` (`idpembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelianproperti_ibfk_2` FOREIGN KEY (`idproperti`) REFERENCES `properti` (`idproperti`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
