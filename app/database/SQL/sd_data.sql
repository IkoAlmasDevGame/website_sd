-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 01:37 PM
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
-- Database: `sd_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_account`
--

CREATE TABLE `t_account` (
  `id_user` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` text NOT NULL,
  `gender` int(1) NOT NULL,
  `member` int(1) NOT NULL,
  `selesai` varchar(3) NOT NULL,
  `onCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `onUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`id_user`, `userEmail`, `username`, `password`, `birthday`, `gender`, `member`, `selesai`, `onCreated`, `onUpdated`) VALUES
(1, 'admin@gmail.com', 'administrasi', '21232f297a57a5a743894a0e4a801fc3', '2001-03-10', 0, 1, 'yes', '2023-03-09 21:30:11', '2023-03-29 06:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `t_jeniskelamin`
--

CREATE TABLE `t_jeniskelamin` (
  `id_jeniskelamin` int(11) NOT NULL,
  `jeniskelamin` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jeniskelamin`
--

INSERT INTO `t_jeniskelamin` (`id_jeniskelamin`, `jeniskelamin`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_account`
--
ALTER TABLE `t_account`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `t_jeniskelamin`
--
ALTER TABLE `t_jeniskelamin`
  ADD PRIMARY KEY (`id_jeniskelamin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_account`
--
ALTER TABLE `t_account`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_jeniskelamin`
--
ALTER TABLE `t_jeniskelamin`
  MODIFY `id_jeniskelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
