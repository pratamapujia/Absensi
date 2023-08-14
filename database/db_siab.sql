-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 06:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siab`
--

-- --------------------------------------------------------

--
-- Table structure for table `jam_absen`
--

CREATE TABLE `jam_absen` (
  `id_jam_absen` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Masuk','Keluar','Terlambat') NOT NULL,
  `mulai_absen` time NOT NULL,
  `selesai_absen` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jam_absen`
--

INSERT INTO `jam_absen` (`id_jam_absen`, `type`, `mulai_absen`, `selesai_absen`) VALUES
(1, 'Masuk', '07:00:00', '08:00:00'),
(2, 'Keluar', '14:00:00', '15:00:00'),
(3, 'Terlambat', '08:00:59', '13:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'OTKP'),
(2, 'RPL'),
(3, 'TBSM'),
(4, 'TKJ'),
(5, 'TKR');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `id_jurusan` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode_kelas`, `id_jurusan`) VALUES
(1, '10 OTKP', 10, 1),
(2, '10 TKJ', 10, 4),
(3, '11 RPL', 11, 2),
(4, '11 TBSM', 11, 3),
(5, '12 TKR', 12, 5),
(6, '11 OTKP', 11, 1),
(7, '11 TKJ', 11, 4),
(8, '10 RPL', 10, 2),
(9, '10 TKR', 10, 5),
(10, '10 TBSM', 10, 3),
(11, '11 TKR', 11, 5),
(12, '12 OTKP', 12, 1),
(13, '12 RPL', 12, 2),
(14, '12 TBSM', 12, 3),
(15, '12 TKJ', 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `libur`
--

CREATE TABLE `libur` (
  `id_libur` bigint(20) UNSIGNED NOT NULL,
  `type` enum('weekend','other') NOT NULL,
  `tanggal_libur` varchar(100) NOT NULL,
  `keterangan_libur` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libur`
--

INSERT INTO `libur` (`id_libur`, `type`, `tanggal_libur`, `keterangan_libur`, `status`) VALUES
(1, 'weekend', '2023-07-29', 'sabtu', 'Aktif'),
(2, 'weekend', '2023-07-30', 'minggu', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-06-25-043912', 'App\\Database\\Migrations\\Jurusan', 'default', 'App', 1688709579, 1),
(2, '2023-06-25-045342', 'App\\Database\\Migrations\\Kelas', 'default', 'App', 1688709579, 1),
(3, '2023-06-29-092806', 'App\\Database\\Migrations\\Siswa', 'default', 'App', 1688709579, 1),
(6, '2023-07-27-130450', 'App\\Database\\Migrations\\Libur', 'default', 'App', 1690464484, 2),
(7, '2023-07-27-130551', 'App\\Database\\Migrations\\JamAbsen', 'default', 'App', 1690464543, 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepone_siswa` varchar(30) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(5) NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `foto_siswa` varchar(70) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `tgl_lahir`, `telepone_siswa`, `alamat_siswa`, `jenis_kelamin`, `id_kelas`, `id_jurusan`, `foto_siswa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '01114', 'Shofwan Hadi Febriyanto', '2008-02-28', '+6283830694069', 'Jl. Tropodo 1 Barat Rt20 Rw02 Waru Sidoarjo', 'L', 3, 2, 'fs_5261a9_07-07-2023.jpg', '2023-07-07 13:48:13', '2023-08-14 22:55:37', NULL),
(2, '01112', 'Distia Anggita Putri', '2007-06-07', '+6283830694069', 'Jl. Tropodo 1 Barat Rt20 Rw02 Waru Sidoarjo', 'P', 1, 1, 'fs_39d68e_07-07-2023.jpg', '2023-07-07 13:50:22', '2023-08-14 22:55:08', NULL),
(4, '01113', 'Puji Istiani', '2006-06-06', '+6283830694069', 'Jl. Tropodo 1 Barat Rt20 Rw02 Waru Sidoarjo', 'P', 2, 4, 'fs_2aec31_19-07-2023.jpg', '2023-07-19 15:08:31', '2023-08-14 22:55:24', NULL),
(5, '01115', 'Siti Jamilin', '2007-06-14', '081553566510', 'Tropodo', 'P', 1, 1, 'fs_af0f14_14-08-2023.jpg', '2023-08-14 22:44:56', '2023-08-14 22:55:47', NULL),
(6, '01111', 'Abdul Latif', '2007-07-20', '0812123123', 'Tropodo', 'L', 1, 1, 'fs_1370ad_14-08-2023.jpg', '2023-08-14 22:46:03', '2023-08-14 22:54:55', NULL),
(7, '01116', 'Fatkhur Rohman', '2007-10-26', '083830694069', 'Tropodo', 'L', 8, 2, 'fs_53819a_14-08-2023.jpg', '2023-08-14 23:03:28', '2023-08-14 23:03:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jam_absen`
--
ALTER TABLE `jam_absen`
  ADD PRIMARY KEY (`id_jam_absen`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_id_jurusan_foreign` (`id_jurusan`);

--
-- Indexes for table `libur`
--
ALTER TABLE `libur`
  ADD PRIMARY KEY (`id_libur`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_id_kelas_foreign` (`id_kelas`),
  ADD KEY `siswa_id_jurusan_foreign` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jam_absen`
--
ALTER TABLE `jam_absen`
  MODIFY `id_jam_absen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `libur`
--
ALTER TABLE `libur`
  MODIFY `id_libur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
