-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Nov 2016 pada 12.43
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
-- Struktur dari tabel `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categorys`
--

INSERT INTO `categorys` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bumbu', '2016-11-05 17:45:51', '2016-11-05 18:20:10', NULL),
(2, 'alat', '2016-11-05 17:47:51', '2016-11-05 17:54:42', '2016-11-05 17:54:42'),
(3, 'minuman', '2016-11-05 17:48:03', '2016-11-05 17:48:03', NULL),
(4, 'makanan', '2016-11-05 17:48:25', '2016-11-05 17:48:25', NULL),
(5, 'miras', '2016-11-05 17:49:41', '2016-11-05 17:49:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_recipes`
--

CREATE TABLE `detail_recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_resep` int(10) UNSIGNED NOT NULL,
  `id_bahan` int(11) UNSIGNED NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan_resep` int(10) UNSIGNED NOT NULL,
  `satuan_pembelian` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `deskripsi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `ingredients`
--

INSERT INTO `ingredients` (`id`, `nama`, `satuan_resep`, `satuan_pembelian`, `id_kategori`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cabe Merah', 2, 1, 1, 'Eneng2 naek motor tanjal tiga, pake celana ketat', '2016-11-05 19:34:03', '2016-11-05 23:57:33', NULL),
(2, 'Air Mineral', 2, 2, 3, '', '2016-11-05 19:35:55', '2016-11-05 23:55:02', '2016-11-05 23:55:02'),
(3, '', 1, 1, 1, '', '2016-11-05 20:17:09', '2016-11-05 20:29:19', '2016-11-05 20:29:19'),
(4, '', 1, 1, 1, '', '2016-11-05 20:17:14', '2016-11-05 21:45:09', '2016-11-05 21:45:09'),
(5, '', 1, 1, 1, '', '2016-11-05 20:17:53', '2016-11-05 21:45:13', '2016-11-05 21:45:13'),
(6, '', 1, 1, 1, '', '2016-11-05 20:18:01', '2016-11-05 21:45:18', '2016-11-05 21:45:18'),
(7, '', 1, 1, 1, '', '2016-11-05 20:18:59', '2016-11-05 21:45:21', '2016-11-05 21:45:21'),
(8, '', 1, 1, 1, '', '2016-11-05 20:19:06', '2016-11-05 21:45:24', '2016-11-05 21:45:24'),
(9, '', 1, 1, 1, '', '2016-11-05 20:22:36', '2016-11-05 21:45:27', '2016-11-05 21:45:27'),
(10, '', 1, 1, 1, '', '2016-11-05 20:22:41', '2016-11-05 21:45:31', '2016-11-05 21:45:31'),
(11, '', 1, 1, 1, '', '2016-11-05 20:23:08', '2016-11-05 21:45:34', '2016-11-05 21:45:34'),
(12, '', 1, 1, 1, '', '2016-11-05 20:23:13', '2016-11-05 21:45:38', '2016-11-05 21:45:38'),
(13, '', 1, 1, 1, '', '2016-11-05 20:23:47', '2016-11-05 21:45:41', '2016-11-05 21:45:41'),
(14, '', 1, 1, 1, '', '2016-11-05 20:23:54', '2016-11-05 21:45:44', '2016-11-05 21:45:44'),
(15, '', 1, 1, 1, '', '2016-11-05 20:24:01', '2016-11-05 21:45:47', '2016-11-05 21:45:47'),
(16, 'Air Mineral', 2, 2, 5, 'Aqua, Kalo tak ade Nestle lah. pokoknye yang mane yang murah lah', '2016-11-05 23:55:39', '2016-11-05 23:55:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `measurements`
--

CREATE TABLE `measurements` (
  `id` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `measurements`
--

INSERT INTO `measurements` (`id`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gram', '2016-11-05 18:42:44', '2016-11-05 21:50:48', NULL),
(2, 'pcs', '2016-11-05 18:45:09', '2016-11-05 18:45:09', NULL),
(3, 'asdasdas', '2016-11-05 18:45:18', '2016-11-05 18:45:21', '2016-11-05 18:45:21'),
(4, 'miligram', '2016-11-05 21:51:00', '2016-11-05 21:51:00', NULL),
(5, 'sendok makan', '2016-11-05 21:51:06', '2016-11-05 21:51:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  `menu_pembuka` int(10) UNSIGNED NOT NULL,
  `menu_utama` int(10) UNSIGNED NOT NULL,
  `menu_penutup` int(10) UNSIGNED NOT NULL,
  `minuman` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(56, '2014_10_12_000000_create_users_table', 1),
(57, '2014_10_12_100000_create_password_resets_table', 1),
(58, '2016_11_05_074804_ingredients', 1),
(59, '2016_11_05_080511_variant', 1),
(60, '2016_11_05_155359_category', 1),
(61, '2016_11_05_155527_measurement', 1),
(62, '2016_11_05_173935_menu', 1),
(63, '2016_11_05_174849_recipe', 1),
(64, '2016_11_05_175257_detail_recipe', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'heru', 'heru@indoflac.com', '$2y$10$LZ8abNdIBZ/lv3F6ximxeuBx6.xw9lGhqAlyNhbu0SuoTfjuudiBa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `variants`
--

CREATE TABLE `variants` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bahan_utama` tinyint(1) NOT NULL,
  `deskripsi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `variants`
--

INSERT INTO `variants` (`id`, `id_bahan`, `nama`, `bahan_utama`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Cabe Keriting', 0, 'cabe di rebounding', '2016-11-05 22:52:30', '2016-11-05 23:30:57', NULL),
(2, 1, 'Cabe Rawit', 1, 'cabe yang kecil2 tu', '2016-11-05 22:57:03', '2016-11-05 23:30:11', NULL),
(3, 1, 'Cabe Besar', 1, 'Cabe yang tidak pedas, biasanya buat tumpeng', '2016-11-05 22:57:31', '2016-11-05 23:34:43', NULL),
(4, 1, 'asdasd', 0, 'asdassasdas', '2016-11-05 22:59:54', '2016-11-05 23:34:24', '2016-11-05 23:34:24'),
(5, 1, 'asdasczxczxc', 0, 'asdasdaszxc', '2016-11-05 23:00:05', '2016-11-05 23:34:19', '2016-11-05 23:34:19'),
(6, 1, 'Baru', 1, 'asdasda', '2016-11-05 23:00:14', '2016-11-05 23:34:14', '2016-11-05 23:34:14'),
(7, 1, 'asdas', 1, 'asdasdas', '2016-11-05 23:30:24', '2016-11-05 23:34:10', '2016-11-05 23:34:10'),
(8, 1, 'asdasda', 0, 'zxczxcasd', '2016-11-05 23:30:36', '2016-11-05 23:34:06', '2016-11-05 23:34:06'),
(9, 16, '350ml', 1, 'sedang', '2016-11-05 23:56:25', '2016-11-05 23:56:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_recipes`
--
ALTER TABLE `detail_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resep` (`id_resep`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satuan_resep` (`satuan_resep`),
  ADD KEY `satuan_pembelian` (`satuan_pembelian`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_pembuka` (`menu_pembuka`),
  ADD KEY `menu_utama` (`menu_utama`),
  ADD KEY `menu_penutup` (`menu_penutup`),
  ADD KEY `minuman` (`minuman`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_recipes`
--
ALTER TABLE `detail_recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_recipes`
--
ALTER TABLE `detail_recipes`
  ADD CONSTRAINT `fk_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resep` FOREIGN KEY (`id_resep`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `Fk_satuan_pembelian` FOREIGN KEY (`satuan_pembelian`) REFERENCES `measurements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_satuan_resep` FOREIGN KEY (`satuan_resep`) REFERENCES `measurements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_minuman` FOREIGN KEY (`minuman`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembuka` FOREIGN KEY (`menu_pembuka`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penutup` FOREIGN KEY (`menu_penutup`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utama` FOREIGN KEY (`menu_utama`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
