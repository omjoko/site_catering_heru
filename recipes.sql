-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Nov 2016 pada 12.31
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  `petunjuk` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `recipes`
--

INSERT INTO `recipes` (`id`, `nama`, `deskripsi`, `tipe`, `petunjuk`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Raymen', '<p>klml;asl;</p>\r\n', 0, '<p>jlajlaksdjakl</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 04:20:39', '2016-11-06 04:20:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
