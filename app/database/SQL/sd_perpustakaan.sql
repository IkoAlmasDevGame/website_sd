-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 01:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_databuku`
--

CREATE TABLE `t_databuku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `genre_buku` text NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `abstract` text NOT NULL,
  `selesai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_genre`
--

CREATE TABLE `t_genre` (
  `id_genre` int(11) NOT NULL,
  `genre_buku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_genre`
--

INSERT INTO `t_genre` (`id_genre`, `genre_buku`) VALUES
(1, 'Romance'),
(2, 'Fantasy'),
(3, 'Science Fiction'),
(4, 'Horor'),
(5, 'Mysteri'),
(6, 'Thriller'),
(7, 'Comedy'),
(8, 'Inspiratif'),
(9, 'Sejarah'),
(10, 'Psikologi'),
(11, 'Keluarga'),
(12, 'Petualangan'),
(13, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `onPeminjaman` date NOT NULL,
  `onPengembalian` date NOT NULL,
  `selesai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_databuku`
--
ALTER TABLE `t_databuku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `t_genre`
--
ALTER TABLE `t_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_databuku`
--
ALTER TABLE `t_databuku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_genre`
--
ALTER TABLE `t_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
