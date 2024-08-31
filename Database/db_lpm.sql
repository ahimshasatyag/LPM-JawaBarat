-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 03:28 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bansos`
--

CREATE TABLE `bansos` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` int(11) NOT NULL,
  `nomor_kk` int(11) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_kk` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `provinsi_id` varchar(100) NOT NULL,
  `kota_kabupaten_id` varchar(100) NOT NULL,
  `kecamatan_id` varchar(100) NOT NULL,
  `kelurahan_id` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `penghasilan_sebelum_pandemi` int(11) NOT NULL,
  `penghasilan_setelah_pandemi` int(11) NOT NULL,
  `alasan` enum('Kehilangan pekerjaan','Kepala keluarga','Tergolong fakir miskin','Lainnya..') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bansos`
--

INSERT INTO `bansos` (`id`, `nama`, `nik`, `nomor_kk`, `foto_ktp`, `foto_kk`, `umur`, `jenis_kelamin`, `provinsi_id`, `kota_kabupaten_id`, `kecamatan_id`, `kelurahan_id`, `alamat`, `rt`, `rw`, `penghasilan_sebelum_pandemi`, `penghasilan_setelah_pandemi`, `alasan`) VALUES
(10, 'Ahimsha', 2147483647, 2147483647, 'Dairy_Milk.jpg', '8A7PpQob3g_(2).jpg', 21, 'Laki-laki', '33', '3374', '3374080', '3374080012', 'Sidomulyo II/32', '09', '20', 500, 1000, 'Kepala keluarga'),
(11, 'Rijal', 2147483647, 2147483647, '796ad08f2408d03b54fe3e144735882d.jpg', 'adobe-banner.jpg', 20, 'Laki-laki', '33', '3374', '3374110', '3374110006', 'Parang Sarpo I/7', '20', '30', 1000, 50000, 'Kehilangan pekerjaan'),
(12, 'Irwin', 123213133, 234324234, 'asus-rog-flow-900x570.jpg', 'dream.jpg', 19, 'Laki-laki', '31', '3173', '3173030', '3173030001', 'Parang Baris II/10', '10', '20', 6000, 100000, ''),
(13, 'Adam', 43580903, 324902422, 'images1.jpg', 'images8.jpg', 20, 'Laki-laki', '32', '3204', '3204120', '3204120003', 'Medoho Asri II/10', '12', '30', 2000, 5000, 'Kepala keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','sekertaris','kepaladesa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_petugas`, `level`) VALUES
('admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Ahimsha', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bansos`
--
ALTER TABLE `bansos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
