-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 07:20 PM
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
-- Database: `ra3`
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
  `code` varchar(40) NOT NULL
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
(10, '632dd01392b7d.jpg');

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
(1, 'Pendidikan Agama', 'Euis Ismayati Yuniar, M.Pd', 'Yayan Fathurohman', 'https://chat.whatsapp.com/JrpOhsT8jOUJqQ9FIwBn9e'),
(2, 'Bahasa Inggris', 'Hanifah Andriani, S.Pd., M.Pd', 'Rama Octaviano Afandy', 'https://chat.whatsapp.com/CjZFU3d0fH89Foe2eIwW16'),
(3, 'Pendidikan Pancasila', 'Titi Alawiyah, M.Pd ', 'Tanjung Lesmana', 'https://chat.whatsapp.com/LSgl3110B5qJxHblvYktSU'),
(4, 'PEMROGRAMAN DASAR', 'Ahmad Rufa\'i, S.Kom., M.TI', '-', 'https://chat.whatsapp.com/CjZFU3d0fH89Foe2eIwW16'),
(5, 'Bahasa Indonesia', 'Maya Kuswaty, M.Pd ', '-', 'https://chat.whatsapp.com/E2FuLTsdeLgDOsDfvF9Czn'),
(6, 'Sistem Digital', 'ADITH AULIA RAHMAN', '-', 'https://chat.whatsapp.com/DKnfHciG7E8GYQvHq3a4nH');

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
  `mk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'tanjung', '$2y$10$ZR1vTVJuDY7Wa66QSO0SHONXtxkVxXFGcBHnyep/flmy56qGSwM4e', 'user', 'Pendidikan pancasila');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `absensi_mk`
--
ALTER TABLE `absensi_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `src_list`
--
ALTER TABLE `src_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
