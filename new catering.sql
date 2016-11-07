-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Nov 2016 pada 09.27
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
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `detail_recipes`
--

INSERT INTO `detail_recipes` (`id`, `id_resep`, `id_bahan`, `jumlah`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '20', 'pcs', '2016-11-06 15:25:41', '2016-11-06 15:28:54', '2016-11-06 15:28:54'),
(2, 1, 1, '10', 'pcs', '2016-11-06 15:26:35', '2016-11-06 15:29:05', '2016-11-06 15:29:05'),
(3, 1, 1, '1', 'pcs', '2016-11-06 15:26:53', '2016-11-06 15:35:20', NULL),
(4, 1, 1, '10', 'pcs', '2016-11-06 15:35:28', '2016-11-06 15:37:06', NULL);

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
(16, 'Air Mineral', 2, 2, 3, 'Aqua, Kalo tak ade Nestle lah. pokoknye yang mane yang murah lah', '2016-11-05 23:55:39', '2016-11-06 11:17:12', NULL),
(17, 'asdasd', 1, 1, 1, 'asdasdas', '2016-11-06 11:17:24', '2016-11-06 11:17:41', '2016-11-06 11:17:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kapals`
--

CREATE TABLE `kapals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kapal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_kapal` tinyint(4) NOT NULL,
  `no_imo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_penyimpanan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kapals`
--

INSERT INTO `kapals` (`id`, `nama_kapal`, `tipe_kapal`, `no_imo`, `kapasitas`, `id_penyimpanan`, `created_at`, `updated_at`) VALUES
(1, 'Perang', 2, '12312', '123123', 1, NULL, NULL);

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
-- Struktur dari tabel `menuses`
--

CREATE TABLE `menuses` (
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
(65, '2016_11_05_175257_detail_recipe', 2),
(66, '2016_11_05_185121_vendors', 2),
(67, '2016_11_05_190147_kapals', 2),
(68, '2016_11_05_190625_penyimpanans', 2),
(69, '2016_11_05_190950_pelabuhans', 2);

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
-- Struktur dari tabel `pelabuhans`
--

CREATE TABLE `pelabuhans` (
  `id_pelabuhan` int(10) UNSIGNED NOT NULL,
  `nama_pelabuhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pelabuhans`
--

INSERT INTO `pelabuhans` (`id_pelabuhan`, `nama_pelabuhan`, `alamat`, `telepon`, `kota`, `created_at`, `updated_at`) VALUES
(1, 'Dwikora', 'Dekat Korem', '082255985321', 'Pontianak', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanans`
--

CREATE TABLE `penyimpanans` (
  `id_penyimpanan` int(10) UNSIGNED NOT NULL,
  `nama_tempat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `penyimpanans`
--

INSERT INTO `penyimpanans` (`id_penyimpanan`, `nama_tempat`, `created_at`, `updated_at`) VALUES
(1, 'Gudang A1', NULL, NULL);

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
(1, 'Raymen', '<p>klml;asl;</p>\r\n', 0, '<p>asdasda</p>\r\n', 'http://localhost:8000/photos/1/581fb48133d01.png', '2016-11-06 04:20:39', '2016-11-06 16:14:42', NULL),
(2, 'Sate', '<p>asdzcz</p>\r\n', 1, '<p>asdasdasdasd</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 13:16:41', '2016-11-06 13:16:41', NULL),
(3, 'asdas', '<p>zxcvsfa</p>\r\n', 2, '<p>asdasdaszcz</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 14:11:31', '2016-11-06 16:09:55', '2016-11-06 16:09:55'),
(4, 'asdasd', '<p>zczxcassda</p>\r\n', 2, '<p>asdasdzxc</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 14:18:50', '2016-11-06 16:09:59', '2016-11-06 16:09:59'),
(5, 'asdas', '<p>asdzxcz</p>\r\n', 3, '<p>asdaszxc</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 14:19:22', '2016-11-06 16:10:03', '2016-11-06 16:10:03'),
(6, '', '', 0, '', '', '2016-11-06 16:08:57', '2016-11-06 16:09:18', '2016-11-06 16:09:18'),
(7, 'asdas', '<p>asdas</p>\r\n', 0, '<p>assdasdas</p>\r\n', 'http://localhost:8000/photos/1/581fb48133d01.png', '2016-11-06 16:09:12', '2016-11-06 16:10:06', '2016-11-06 16:10:06'),
(8, 'Nasi Goreng', '<p>asdasd</p>\r\n', 1, '<p>asdzxcasd</p>\r\n', 'http://localhost:8000/photos/1/581fb48133d01.png', '2016-11-06 16:17:18', '2016-11-06 16:17:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `no_nrp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_bk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_sijil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sertifikat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_valid` date NOT NULL,
  `privilege` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email1`, `password`, `telepon`, `no_nrp`, `no_bk`, `no_sijil`, `sertifikat`, `tgl_valid`, `privilege`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'heru', 'heru@indoflac.com', 'heru@indoflac.com', '$2y$10$LZ8abNdIBZ/lv3F6ximxeuBx6.xw9lGhqAlyNhbu0SuoTfjuudiBa', '082255985321', '09128998', '9018317', '19023817', '102938109', '2020-05-07', 5, 'PLNGvaiKOEPugskyZ6i0aZjiVxLw8bQQGaY5fdB6XyqGAU5PNcBaJqMmimTh', NULL, '2016-11-06 22:50:16');

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
(9, 16, '350ml', 1, 'sedang', '2016-11-05 23:56:25', '2016-11-05 23:56:25', NULL),
(10, 1, 'cabe cabean', 1, 'dede gemes', '2016-11-06 06:36:42', '2016-11-06 11:04:24', NULL),
(11, 10, 'cabe cabean', 1, 'dede dede gemes', '2016-11-06 10:56:08', '2016-11-06 10:56:08', NULL),
(12, 1, 'cabe cabean', 1, 'vbnnghjghfg', '2016-11-06 10:57:40', '2016-11-06 11:04:03', '2016-11-06 11:04:03'),
(13, 16, '1000ml', 0, 'besar', '2016-11-06 13:55:27', '2016-11-06 13:55:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perwakilan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_pembayaran` tinyint(4) NOT NULL,
  `no_rek` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`id`, `nama_vendor`, `alamat`, `kode_pos`, `telepon`, `kota`, `perwakilan`, `tipe_pembayaran`, `no_rek`, `created_at`, `updated_at`) VALUES
(1, 'Toko Makmur', 'Jl. Perintis', '678678', '021-28141', 'Jakarta utara', 'adi', 1, '12312312', NULL, NULL),
(2, 'Wak doyok', 'Jl. Jalan yuk bosen nih', '78234', '082255985321', 'Pontianak', 'Pontianak', 1, '', NULL, NULL);

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
-- Indexes for table `kapals`
--
ALTER TABLE `kapals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuses`
--
ALTER TABLE `menuses`
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
-- Indexes for table `pelabuhans`
--
ALTER TABLE `pelabuhans`
  ADD PRIMARY KEY (`id_pelabuhan`);

--
-- Indexes for table `penyimpanans`
--
ALTER TABLE `penyimpanans`
  ADD PRIMARY KEY (`id_penyimpanan`);

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
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kapals`
--
ALTER TABLE `kapals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `pelabuhans`
--
ALTER TABLE `pelabuhans`
  MODIFY `id_pelabuhan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyimpanans`
--
ALTER TABLE `penyimpanans`
  MODIFY `id_penyimpanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_recipes`
--
ALTER TABLE `detail_recipes`
  ADD CONSTRAINT `fk_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `fk_resep` FOREIGN KEY (`id_resep`) REFERENCES `recipes` (`id`);

--
-- Ketidakleluasaan untuk tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `Fk_satuan_pembelian` FOREIGN KEY (`satuan_pembelian`) REFERENCES `measurements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_satuan_resep` FOREIGN KEY (`satuan_resep`) REFERENCES `measurements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menuses`
--
ALTER TABLE `menuses`
  ADD CONSTRAINT `fk_minuman` FOREIGN KEY (`minuman`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembuka` FOREIGN KEY (`menu_pembuka`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penutup` FOREIGN KEY (`menu_penutup`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utama` FOREIGN KEY (`menu_utama`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
