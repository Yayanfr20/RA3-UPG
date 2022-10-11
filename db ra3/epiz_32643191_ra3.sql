-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.epizy.com
-- Generation Time: Oct 10, 2022 at 11:01 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32643191_ra3`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `mk` varchar(200) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `absensi_mk`
--

CREATE TABLE `absensi_mk` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nim` int(20) NOT NULL,
  `mk` varchar(200) NOT NULL,
  `kehadiran` varchar(200) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img`) VALUES
(1, 'hero.jpg'),
(2, 'hero2.jpg'),
(3, 'hero3.jpg'),
(11, '6336d9c9282a5.jpg'),
(12, '6338c8de6778b.jpg'),
(13, '6338c8f242964.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `tanggal`, `author`, `img`, `text`) VALUES
(16, 'Tugaa Pak endang Organisasi Dan Arsitektur Komputer', 'October 3, 2022, 12:50 pm', 'fajar', '633a78d53f4d3.jpg', '<p>Assalamualaikum Guys</p>\r\n\r\n<p>Tugas dari pak endang&nbsp; terakhir kamis sore</p>\r\n\r\n<p>Kirim k wa saya 085900214677 jgn lupa save okeeh</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(17, 'Informasi PENDIDIKAN AGAMA', 'October 4, 2022, 1:17 pm', 'yayan', '633bd05336850.jpg', '<p>Assalamualaikum warahmatullahi wabarokatu</p>\r\n\r\n<p>Halo guys ada info nih</p>\r\n'),
(19, 'Info pengumpulan tugas pendidikan agama', 'October 10, 2022, 11:03 pm', 'yayan', '634443ad6a4e0.jpg', '<p>Assalamualaikum wr wb&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Informasi buat kawan kawan ra3 Terkait pengumpulan tugas pendidikan agama menganalisis film alim lam mim.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tugasnya dibikin jadi pdf yah lalu kirim kan ke link berikut</p>\r\n\r\n<p>http://ra3upg.rf.gd/InputTugas.php?id=4</p>\r\n\r\n<p>untuk kode akses japri km mata kuliah</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `judul_list` varchar(100) NOT NULL,
  `code` varchar(40) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `judul_list`, `code`, `tanggal`, `author`) VALUES
(8, 'Yang mengerjakan tugas pak endang', '633a7a0c92cb3', 'October 3, 2022, 12:58 pm', 'fajar');

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(200) NOT NULL,
  `dosen` varchar(200) NOT NULL,
  `km` varchar(200) NOT NULL,
  `wa` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk`
--

INSERT INTO `mk` (`id`, `pelajaran`, `dosen`, `km`, `wa`) VALUES
(1, 'Pendidikan Agama', 'Euis Ismayati Yuniar, M.Pd', 'Yayan Faturrohman', 'https://chat.whatsapp.com/JrpOhsT8jOUJqQ9FIwBn9e'),
(2, 'Bahasa Inggris', 'Hanifah Andriani, S.Pd., M.Pd', 'Rama Octaviano Afandy', 'https://chat.whatsapp.com/CjZFU3d0fH89Foe2eIwW16'),
(3, 'Pendidikan Pancasila', 'Titi Alawiyah, M.Pd ', 'Tanjung Lesmana', 'https://chat.whatsapp.com/LSgl3110B5qJxHblvYktSU'),
(4, 'PEMROGRAMAN DASAR', 'Ahmad Rufa\'i, S.Kom., M.TI', 'Mario', 'https://chat.whatsapp.com/CjZFU3d0fH89Foe2eIwW16'),
(5, 'Bahasa Indonesia', 'Maya Kuswaty, M.Pd ', 'Ghina', 'https://chat.whatsapp.com/E2FuLTsdeLgDOsDfvF9Czn'),
(6, 'Sistem Digital', 'ADITH AULIA RAHMAN', 'Novia', 'https://chat.whatsapp.com/DKnfHciG7E8GYQvHq3a4nH'),
(7, 'Arsitektur & Organisasi Komputer', 'Endang Kusnadi, S.Kom., M.T.I ', 'Fajar', 'https://chat.whatsapp.com/BimKVOgCSGRGEpxCu7eEqM'),
(8, 'Algoritma dan pemrogramman', 'Yulian Ansori, S.Kom., M.Kom', '-', 'https://chat.whatsapp.com/EekyOKMSU0GKGCjn8gT7P0'),
(9, 'MICRO CONTROLLER I', 'Ahmad Rufa\'i, S.Kom., M.TI', 'Reno ropen', 'https://chat.whatsapp.com/C9wM33RZvvO8ZCqkNWqdYk');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pesan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `src_list`
--

CREATE TABLE `src_list` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `src_list`
--

INSERT INTO `src_list` (`id`, `nama`, `nim`, `code`) VALUES
(3, 'MUHAMAD FAJAR ALFARISI', 221531, '633a7a0c92cb3'),
(4, 'Agus Jajuli', 220214, '633a7a0c92cb3'),
(5, 'Novia Ismiatul ajizah (RA3)', 220983, '633a7a0c92cb3'),
(6, 'Yayan Faturrohman', 220271, '633a7a0c92cb3'),
(7, 'Muhamad irpan', 221533, '633a7a0c92cb3'),
(8, 'UMMU HUMAEROH', 220539, '633a7a0c92cb3'),
(9, 'Ilham Fauzi RA3', 221534, '633a7a0c92cb3'),
(10, 'AHMAD SAHRONI ', 221029, '633a7a0c92cb3'),
(11, 'RAMA OCTAVIANO AFANDY (ra3)', 220818, '633a7a0c92cb3'),
(12, 'Reno Ropen', 221012, '633a7a0c92cb3'),
(13, 'Mario', 220612, '633a7a0c92cb3'),
(14, 'Muhamad Jalaluddin syihab ', 221622, '633a7a0c92cb3'),
(15, 'Rega fadilah', 220160, '633a7a0c92cb3'),
(16, 'RIFKI ZULFAHYANI', 220630, '633a7a0c92cb3'),
(17, 'fahrurozi', 220633, '633a7a0c92cb3'),
(18, 'Ghina Sabrina Moekardanoe ', 220403, '633a7a0c92cb3'),
(19, 'Muhammad Fathuillah', 221310, '633a7a0c92cb3'),
(20, 'RIPAI ', 221843, '633a7a0c92cb3'),
(21, 'Olif kholifah', 220132, '633a7a0c92cb3'),
(22, 'Sudarna', 220192, '633a7a0c92cb3'),
(23, 'SITI AMALIAH SOLEHAH ', 220575, '633a7a0c92cb3'),
(24, 'IAN ABDUL FATAH', 221877, '633a7a0c92cb3'),
(25, 'NICKY ALDY', 201692, '633a7a0c92cb3'),
(26, 'kirana bayu saputra', 220512, '633a7a0c92cb3'),
(27, 'Tanjung lasmana ', 221006, '633a7a0c92cb3'),
(28, 'Lucky Firmansyah Hermawan ', 220147, '633a7a0c92cb3'),
(29, 'MUHAMAD FAIS MAULANA', 221772, '633a7a0c92cb3');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `nomor` varchar(40) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id`, `nama`, `pangkat`, `nomor`, `img`) VALUES
(1, 'Najmuddin, S.Kom, M.TI', 'Dosen Pembimbing', '6281382342766', 'default.jpg'),
(2, 'Tanjung Lesmana', 'Ketua Kelas', '6285891661756', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `mk` varchar(100) NOT NULL,
  `code` varchar(40) NOT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_mk`
--

CREATE TABLE `tugas_mk` (
  `id` int(11) NOT NULL,
  `mk` varchar(100) NOT NULL,
  `date` int(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `author` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_mk`
--

INSERT INTO `tugas_mk` (`id`, `mk`, `date`, `code`, `author`, `judul`) VALUES
(4, 'Pendidikan agama', 0, '63443a3071b46', 'yayan', 'UTS Pendidikan agama');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(40) NOT NULL,
  `mk` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `mk`) VALUES
(1, 'ra3upg2022', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'admin', 'admin'),
(2, 'yayan', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Pendidikan agama'),
(3, 'rama', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Bahasa inggris'),
(4, 'tanjung', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Pendidikan pancasila'),
(5, 'fajar', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Arsitektur - Organisasi Komputer'),
(6, 'ghina', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Bahasa indonesia'),
(7, 'mario', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Pemrogramman dasar'),
(8, 'reno', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Micro Controller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_mk`
--
ALTER TABLE `absensi_mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk`
--
ALTER TABLE `mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `src_list`
--
ALTER TABLE `src_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_mk`
--
ALTER TABLE `tugas_mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `absensi_mk`
--
ALTER TABLE `absensi_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `src_list`
--
ALTER TABLE `src_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_mk`
--
ALTER TABLE `tugas_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
