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
-- Database: `sd_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_absensi`
--

CREATE TABLE `t_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `keterangan` enum('h','s','i','a') NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `selesai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_agama`
--

CREATE TABLE `t_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_agama`
--

INSERT INTO `t_agama` (`id_agama`, `agama`) VALUES
(1, 'Kristen'),
(2, 'Katholik'),
(3, 'Buddha'),
(4, 'Hindu'),
(5, 'Islam'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `t_datasiswa`
--

CREATE TABLE `t_datasiswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `birthday` text NOT NULL,
  `gender` text NOT NULL,
  `agama` text NOT NULL,
  `selesai` varchar(3) NOT NULL,
  `selected` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jeniskelamin` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_pelajaran` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `hari` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_jam`
--

CREATE TABLE `t_jam` (
  `id_jam` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  `mulai` varchar(30) NOT NULL,
  `akhir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jam`
--

INSERT INTO `t_jam` (`id_jam`, `jam`, `mulai`, `akhir`) VALUES
(5, 5, '11:25', '12:15');

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
(1, 'Pria'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` int(11) NOT NULL,
  `namakelas` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `namakelas`) VALUES
(1, 'Kelas 1 SD'),
(2, 'Kelas 2 SD'),
(3, 'Kelas 3 SD'),
(4, 'Kelas 4 SD'),
(5, 'Kelas 5 SD'),
(6, 'Kelas 6 SD');

-- --------------------------------------------------------

--
-- Table structure for table `t_orangtua`
--

CREATE TABLE `t_orangtua` (
  `id_data` int(11) NOT NULL,
  `NISN` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `tempat_lahir_ayah` varchar(100) NOT NULL,
  `workFather` varchar(100) NOT NULL,
  `TertiaryEducationFather` varchar(32) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tempat_lahir_ibu` varchar(100) NOT NULL,
  `workMother` varchar(100) NOT NULL,
  `TertiaryEducationMother` varchar(32) NOT NULL,
  `alamat_rumah` text DEFAULT NULL,
  `selesai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_pekerjaan`
--

CREATE TABLE `t_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `profesi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pekerjaan`
--

INSERT INTO `t_pekerjaan` (`id_pekerjaan`, `profesi`) VALUES
(1, 'Arsitek'),
(2, 'Apoteker'),
(3, 'Akuntan'),
(4, 'Aktor'),
(5, 'Aktris'),
(6, 'Atlet'),
(7, 'Bidan'),
(8, 'Dokter'),
(9, 'Dosen'),
(10, 'Direktur'),
(11, 'Desainer'),
(12, 'Guru'),
(13, 'Hakim'),
(14, 'Jaksa'),
(15, 'Kasir'),
(16, 'Kondektur'),
(17, 'Chef'),
(18, 'Karyawan'),
(19, 'Masinis'),
(20, 'Model'),
(21, 'Nelayan'),
(22, 'Novelis'),
(23, 'Nahkoda'),
(24, 'Pegawai Negeri Sipil'),
(25, 'Penyanyi'),
(26, 'Pengacara'),
(27, 'Programmer'),
(28, 'Polisi'),
(29, 'Perawat'),
(30, 'Penerjemah'),
(31, 'Pilot'),
(32, 'Presiden'),
(33, 'Penari'),
(34, 'Pemadam Kebakaran'),
(35, 'Pelayan'),
(36, 'Petani'),
(37, 'Resepsionis'),
(38, 'Satpam'),
(39, 'Seniman'),
(40, 'Supir'),
(41, 'Sekretaris'),
(42, 'Tentara'),
(43, 'Video Editor'),
(44, 'Wartawan'),
(45, 'CEO'),
(46, 'Koordinator Pelayan Kesehatan'),
(47, 'Koordinator Manajemen Bakat'),
(48, 'Manajer Media Sosial'),
(49, 'User Experience Design'),
(50, 'Manajer Kampanye Politik Online'),
(51, 'Penulis Konten Web'),
(52, 'Konsultan Keberlanjutan'),
(53, 'Jurnalis Video'),
(54, 'Tukang Tambal Ban'),
(55, 'Pawang Hujan'),
(56, 'Tukang Tukar Duit'),
(57, 'Tukang Patri'),
(58, 'Tukang Parkir'),
(59, 'Tukang isi korek gas'),
(60, 'Joki 3 in 1'),
(61, 'Calo Tiket'),
(62, 'Jasa sol sepatu'),
(63, 'Penjual jamu gendong'),
(64, 'Pak ogah'),
(65, 'Ojek payung'),
(66, 'Jasa permak jins keliling'),
(67, 'Tukang urut'),
(68, 'Tukang Pangkas rambut'),
(69, 'Artifical Intelligence'),
(70, 'Self-Driving Car Engineer'),
(71, 'Data Scientist'),
(72, 'Cloud Architect'),
(73, 'Automation Engineer'),
(74, 'Mobile App Developer'),
(75, 'Social Media Officer'),
(76, 'Digital Strategist'),
(77, 'Community Manager'),
(78, 'Head of culture'),
(79, 'Podcast Producer'),
(80, 'Drone Operator'),
(81, 'Motion Graphic Designer'),
(82, 'Psychologist'),
(83, 'Generic Councelor'),
(84, 'Financial Techonology Analyst'),
(85, 'Copywriter'),
(86, 'Content Writer'),
(87, 'Ui/Ux Designer'),
(88, 'Selebgram'),
(89, 'Youtuber'),
(90, 'Blogger'),
(91, 'pramugari'),
(92, 'Pramusaji');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelajaran`
--

CREATE TABLE `t_pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pelajaran`
--

INSERT INTO `t_pelajaran` (`id_pelajaran`, `pelajaran`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(3, 'Seni Budaya'),
(4, 'Jasmani dan Rohani'),
(5, 'Ilmu Pengetahuan Alam'),
(6, 'Ilmu Pengetahuan Sosial'),
(7, 'PPKN'),
(8, 'Sejarah Kebudayaan Islam'),
(9, 'Bahasa Arab'),
(10, 'Fiqih'),
(11, 'Alquran dan Hadist'),
(12, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `t_pendidikan`
--

CREATE TABLE `t_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `jenjang` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pendidikan`
--

INSERT INTO `t_pendidikan` (`id_pendidikan`, `jenjang`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'SMK'),
(5, 'D3'),
(6, 'S1'),
(7, 'S2'),
(8, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `t_seleksi`
--

CREATE TABLE `t_seleksi` (
  `id_seleksi` int(11) NOT NULL,
  `seleksi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_seleksi`
--

INSERT INTO `t_seleksi` (`id_seleksi`, `seleksi`) VALUES
(1, 'Lulus Seleksi'),
(2, 'Tidak Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `kd_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `NISN` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `selesai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_tempat`
--

CREATE TABLE `t_tempat` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_tempat`
--

INSERT INTO `t_tempat` (`id_provinsi`, `provinsi`) VALUES
(1, 'Aceh'),
(2, 'Sumatra Utara'),
(3, 'Sumatra Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Bengkulu'),
(8, 'Sumatra Selatan'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Lampung'),
(11, 'Banten'),
(12, 'Daerah Khusus Ibukota Jakarta'),
(13, 'Jawa Barat'),
(14, 'Jawa Tengah'),
(15, 'Daerah Istimewa Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Barat'),
(26, 'Sulawesi Selatan'),
(27, 'Sulawesi Tenggara'),
(28, 'Sulawesi Tengah'),
(29, 'Gorontalo'),
(30, 'Sulawesi Utara'),
(31, 'Maluku Utara'),
(32, 'Maluku'),
(33, 'Papua Barat'),
(34, 'Papua Selatan'),
(35, 'Papua Tengah'),
(36, 'Papua Pegunungan'),
(37, 'Papua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `t_agama`
--
ALTER TABLE `t_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `t_datasiswa`
--
ALTER TABLE `t_datasiswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_guru` (`id_guru`) USING BTREE,
  ADD KEY `id_pelajaran` (`id_pelajaran`) USING BTREE,
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE,
  ADD KEY `id_jam` (`id_jam`) USING BTREE;

--
-- Indexes for table `t_jam`
--
ALTER TABLE `t_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `t_jeniskelamin`
--
ALTER TABLE `t_jeniskelamin`
  ADD PRIMARY KEY (`id_jeniskelamin`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_orangtua`
--
ALTER TABLE `t_orangtua`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `t_pekerjaan`
--
ALTER TABLE `t_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `t_pelajaran`
--
ALTER TABLE `t_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `t_seleksi`
--
ALTER TABLE `t_seleksi`
  ADD PRIMARY KEY (`id_seleksi`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`kd_siswa`);

--
-- Indexes for table `t_tempat`
--
ALTER TABLE `t_tempat`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_absensi`
--
ALTER TABLE `t_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `t_agama`
--
ALTER TABLE `t_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_datasiswa`
--
ALTER TABLE `t_datasiswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `t_jam`
--
ALTER TABLE `t_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_jeniskelamin`
--
ALTER TABLE `t_jeniskelamin`
  MODIFY `id_jeniskelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_orangtua`
--
ALTER TABLE `t_orangtua`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pekerjaan`
--
ALTER TABLE `t_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `t_pelajaran`
--
ALTER TABLE `t_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_seleksi`
--
ALTER TABLE `t_seleksi`
  MODIFY `id_seleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `kd_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_tempat`
--
ALTER TABLE `t_tempat`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `t_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jam` FOREIGN KEY (`id_jam`) REFERENCES `t_jam` (`id_jam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pelajaran` FOREIGN KEY (`id_pelajaran`) REFERENCES `t_pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
