-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2023 at 07:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrimexx`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `pembuat_buku` varchar(50) NOT NULL,
  `deskripsi_buku` varchar(500) NOT NULL,
  `rilis_buku` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori_buku`, `pembuat_buku`, `deskripsi_buku`, `rilis_buku`) VALUES
(8, 'The Ballad Of Straight Usep', 'Edukasi', 'Carl Johnson', 'Bercerita tentang seorang Pria bernama Usep Tony yang harus hidup menerjang hiruk pikuk dunia yang semakin menggila, dia hidup di lingkungan dimana orientasi seksual disana sangatlah kacau, hanya tony dan beberapa orang saja yang masih berpikiran waras dan menyukai lawan jenis, Tony memiliki tujuan untuk menyadarkan warga kota Liberty City untuk bisa kembali ke jalan yang lurus ', '2023-06-08 19:06:09'),
(9, 'Petualangan Sherina', 'School', 'Papa T Bob', 'Bercerita tentang Sherina dan Teman temannya yang berpetualang hingga berusaha beba dari penculik yang minta tebusan kepada orang tua temannya yang konglomerat', '2023-06-10 20:06:02'),
(10, 'Pemrograman Java dengan spring4', 'Edukasi', 'Feri Djuandi', 'Berisi tentang bagaimana memulai sebuah project menggunakan java dengan spring4, penjelasan yang diberikan pada buku ini cukup lengkap dan mudah dipahami', '2023-06-11 00:06:06'),
(11, 'Lahirnya Tragedi ', 'Drama', 'Friedrich Nietzsche', 'Buku ini tidak membahas sebuah tragedi secara harafiah,hanya sebuah kiasan yang menggambarkan benturan sudut pandang manusia terhadap sebuah seni', '2023-06-11 00:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `durasi_pinjaman` enum('3 Hari','7 Hari','30 Hari') NOT NULL,
  `status_buku` enum('Dipinjam','Hilang','Dikembalikan') NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `nama`, `nama_buku`, `email`, `no_telp`, `alamat`, `durasi_pinjaman`, `status_buku`, `tanggal_pinjam`) VALUES
(2, 'Mokel Jeksen', 'The Ballad Of Straight Usep', 'mokeljeksen@mail.com', '08123456789', 'sumedang selatan no.420', '7 Hari', 'Dikembalikan', '2023-06-10 18:06:23'),
(3, 'Mokel Jecksen', 'Petualangan Sherina', 'mokeljeksen@mail.com', '08446515656', 'situ sarkanjut', '7 Hari', 'Dikembalikan', '2023-06-10 23:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id`) VALUES
(1, 'Teknik Industri', NULL),
(2, 'Teknologi Pangan', NULL),
(3, 'Teknik Mesin', NULL),
(4, 'Teknik Informatika', NULL),
(5, 'Teknik Lingkungan', NULL),
(6, 'Perancangan Wilayah Kota (Planologi)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `id_prodi` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `jenis_kelamin` enum('Lelaki','Perempuan') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('admin','member') NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_prodi`, `nama`, `email`, `password`, `jenis_kelamin`, `createdAt`, `role`, `foto`) VALUES
(35, 1, 'Billie Euis', 'eyelashh@mail.com', '$2y$10$/qhCedWs78.t92ix5ed0N.dY2rl5E97J9HyZ2hp1JGV9KGphPwei.', 'Perempuan', '2023-06-07 18:06:02', 'admin', 'foto-Billie Euis.jpg'),
(36, 4, 'Mokel Jecksen', 'mokeljeksen@mail.com', '$2y$10$qvD.JTZ1vHroH/CpEbcXMO9Fo6YP5rKel8IafkfeSwM9sqw6LR.z.', 'Lelaki', '2023-06-09 04:06:38', 'member', 'foto-Mokel Jeksen.jpg'),
(37, 4, 'Apip Yulistian', 'apippp@mail.com', '$2y$10$16oALtpX6bMqznXrc.NfzOS6T3gqzlUmGnBN0Zmyy96ZUpQjm1WpC', 'Lelaki', '2023-06-10 04:06:35', 'member', 'foto-Apip Yulistian.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
