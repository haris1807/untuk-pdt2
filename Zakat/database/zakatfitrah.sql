-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2023 at 02:55 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id_zakat` int NOT NULL,
  `nama_KK` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_tanggungan` int NOT NULL,
  `jenis_bayar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_tanggunganyangdibayar` int NOT NULL,
  `bayar_beras` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bayar_uang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bayarzakat`
--

INSERT INTO `bayarzakat` (`id_zakat`, `nama_KK`, `jumlah_tanggungan`, `jenis_bayar`, `jumlah_tanggunganyangdibayar`, `bayar_beras`, `bayar_uang`) VALUES
(1, 'Aidan', 5, 'beras', 5, '12.5 Kg', 'Rp. 0'),
(2, 'Eliseo', 6, 'beras', 6, '15 Kg', 'Rp. 0'),
(3, 'Ambrose', 2, 'beras', 2, '5 Kg', 'Rp. 0'),
(4, 'Yahya', 7, 'beras', 6, '15 Kg', 'Rp. 0'),
(5, 'Emery', 3, 'uang', 2, '0 Kg', 'Rp. 30000'),
(6, 'Flynn', 2, 'beras', 2, '5 Kg', 'Rp. 0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_hak` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`id_kategori`, `nama_kategori`, `jumlah_hak`) VALUES
(1, 'Amil', 10),
(2, 'Fakir', 20),
(3, 'miskin', 8),
(4, 'Fisabilillah(Ustad)', 3),
(5, 'Fisabilillah(Santri)', 3),
(6, 'Mampu', 3),
(7, 'Lainnya', 3),
(8, 'Muallaf', 5),
(9, 'ibnu sabil', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id_mustahiklainnya` int NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hak` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`id_mustahiklainnya`, `nama`, `kategori`, `hak`) VALUES
(1, 'Jajang', 'Ibnu Sabil', '5 Kg'),
(2, 'Usep', 'Amilin', '10 Kg'),
(3, 'dazong', 'Mualaf', '5 Kg'),
(4, 'dorothy', 'Fisabilillah(Ustad)', '3 Kg'),
(5, 'dart', 'Fisabilillah(Santri)', '3 Kg'),
(6, 'AcidFace', 'Ibnu Sabil', '5 Kg'),
(7, 'Atomic Blastoid', 'Ibnu Sabil', '5 Kg'),
(8, 'Betty Cricket', 'Amilin', '10 Kg');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id_mustahikwarga` int NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hak` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id_mustahikwarga`, `nama`, `kategori`, `hak`) VALUES
(1, 'Aidan', 'Mampu', '3 Kg'),
(2, 'Ambrose', 'Fakir', '20 Kg'),
(3, 'Eliseo', 'miskin', '8 Kg'),
(4, 'Emery', 'Mampu', '3 Kg'),
(5, 'Ethan', 'miskin', '8 Kg');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int NOT NULL,
  `nama_muzakki` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_tanggungan` int NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 'Aidan', 5, 'Warga tetap'),
(2, 'Ambrose', 2, 'Warga tetap'),
(3, 'Eliseo', 6, 'Warga tetap'),
(4, 'Ethan', 1, 'Warga sementara'),
(5, 'Rodolfo', 4, 'Warga tetap'),
(6, 'Todd', 3, 'Warga tetap'),
(7, 'Yahya', 6, 'Warga tetap'),
(8, 'Emery', 3, 'Warga tetap'),
(9, 'Flynn', 2, 'Warga sementara'),
(10, 'Jade', 4, 'Warga tetap'),
(12, 'Madhava', 4, 'Warga tetap'),
(14, 'Keseleo', 4, 'Warga tetap'),
(15, 'Koro', 3, 'Warga tetap');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'Haris', 'Haris@gmail.com', 'Haris123'),
(10, 'awdhawdh', 'hariss@gmail.com', 'aasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indexes for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id_mustahiklainnya`);

--
-- Indexes for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id_mustahikwarga`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id_zakat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id_mustahiklainnya` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id_mustahikwarga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
