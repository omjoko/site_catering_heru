-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Nov 2016 pada 00.35
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
-- Struktur dari tabel `detail_invoices`
--

CREATE TABLE `detail_invoices` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banyak` int(11) NOT NULL,
  `id_invoices` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `detail_invoices`
--

INSERT INTO `detail_invoices` (`id`, `nama_barang`, `harga`, `satuan`, `banyak`, `id_invoices`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sendok', 32000, 'gram', 5, 2, '2016-11-09 10:27:22', '2016-11-09 10:35:01', '2016-11-09 10:35:01'),
(2, 'asdas', 12312, 'pcs', 23, 2, '2016-11-09 10:34:10', '2016-11-09 10:49:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_recipes`
--

CREATE TABLE `detail_recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_resep` int(10) UNSIGNED NOT NULL,
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `detail_recipes`
--

INSERT INTO `detail_recipes` (`id`, `id_resep`, `id_bahan`, `jumlah`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 20, 'pcs', '2016-11-06 15:25:41', '2016-11-06 15:28:54', '2016-11-06 15:28:54'),
(2, 1, 1, 10, 'pcs', '2016-11-06 15:26:35', '2016-11-06 15:29:05', '2016-11-06 15:29:05'),
(3, 1, 1, 1, 'pcs', '2016-11-06 15:26:53', '2016-11-06 15:35:20', NULL),
(4, 1, 1, 10, 'pcs', '2016-11-06 15:35:28', '2016-11-07 09:46:41', '2016-11-07 09:46:41'),
(5, 8, 8, 1, 'pcs', '2016-11-07 06:12:24', '2016-11-07 10:20:19', '2016-11-07 10:20:19'),
(6, 1, 1, 2, 'pcs', '2016-11-07 09:42:34', '2016-11-07 09:46:36', '2016-11-07 09:46:36'),
(7, 1, 1, 2, 'pcs', '2016-11-07 09:43:55', '2016-11-07 09:46:20', '2016-11-07 09:46:20'),
(8, 1, 1, 10, 'pcs', '2016-11-07 09:44:06', '2016-11-07 10:21:31', '2016-11-07 10:21:31'),
(9, 1, 1, 5, 'pcs', '2016-11-07 09:46:26', '2016-11-07 09:46:31', '2016-11-07 09:46:31'),
(10, 2, 16, 5, 'pcs', '2016-11-07 09:56:29', '2016-11-07 10:11:35', NULL),
(11, 2, 16, 10, 'pcs', '2016-11-07 09:59:59', '2016-11-07 10:13:22', '2016-11-07 10:13:22'),
(12, 2, 2, 13123, 'pcs', '2016-11-07 10:00:07', '2016-11-07 10:10:56', '2016-11-07 10:10:56'),
(13, 2, 1, 15, 'pcs', '2016-11-07 10:01:17', '2016-11-07 10:12:01', NULL),
(14, 2, 2, 213, 'pcs', '2016-11-07 10:10:47', '2016-11-07 10:10:53', '2016-11-07 10:10:53'),
(15, 2, 16, 5, 'pcs', '2016-11-07 10:12:56', '2016-11-07 10:13:15', '2016-11-07 10:13:15'),
(16, 2, 1, 15, 'pcs', '2016-11-07 10:13:04', '2016-11-07 10:13:09', '2016-11-07 10:13:09'),
(17, 8, 16, 5, 'pcs', '2016-11-07 10:20:24', '2016-11-07 10:20:24', NULL),
(18, 1, 16, 1, 'pcs', '2016-11-07 10:21:37', '2016-11-07 10:21:37', NULL),
(19, 8, 1, 100, 'pcs', '2016-11-07 10:22:02', '2016-11-07 10:22:02', NULL),
(20, 1, 16, 213, 'pcs', '2016-11-07 11:07:57', '2016-11-07 11:07:57', NULL),
(21, 1, 1, 213, 'pcs', '2016-11-07 11:08:06', '2016-11-07 11:08:06', NULL),
(22, 1, 16, 1231412, 'pcs', '2016-11-07 11:08:12', '2016-11-07 11:08:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_requisitions`
--

CREATE TABLE `detail_requisitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_req` int(10) UNSIGNED NOT NULL,
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `detail_requisitions`
--

INSERT INTO `detail_requisitions` (`id`, `id_req`, `id_bahan`, `jumlah`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 13, 16, 3132, 123, '2016-11-09 04:43:41', '2016-11-09 04:43:41', NULL),
(14, 9, 1, 1231, 100, '2016-11-09 04:47:55', '2016-11-09 04:48:06', '2016-11-09 04:48:06'),
(15, 9, 1, 1000, 1000, '2016-11-09 04:48:25', '2016-11-09 04:48:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `food_plans`
--

CREATE TABLE `food_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pelayaran` int(10) UNSIGNED NOT NULL,
  `sarapan_eksekutif` int(10) UNSIGNED NOT NULL,
  `sarapan_bisnis` int(10) UNSIGNED NOT NULL,
  `sarapan_ekonomi1` int(10) UNSIGNED NOT NULL,
  `sarapan_ekonomi2` int(10) UNSIGNED NOT NULL,
  `siang_eksekutif` int(10) UNSIGNED NOT NULL,
  `siang_bisnis` int(10) UNSIGNED NOT NULL,
  `siang_ekonomi1` int(10) UNSIGNED NOT NULL,
  `siang_ekonomi2` int(10) UNSIGNED NOT NULL,
  `malam_eksekutif` int(10) UNSIGNED NOT NULL,
  `malam_bisnis` int(10) UNSIGNED NOT NULL,
  `malam_ekonomi1` int(10) UNSIGNED NOT NULL,
  `malam_ekonomi2` int(10) UNSIGNED NOT NULL,
  `hari` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `food_plans`
--

INSERT INTO `food_plans` (`id`, `id_pelayaran`, `sarapan_eksekutif`, `sarapan_bisnis`, `sarapan_ekonomi1`, `sarapan_ekonomi2`, `siang_eksekutif`, `siang_bisnis`, `siang_ekonomi1`, `siang_ekonomi2`, `malam_eksekutif`, `malam_bisnis`, `malam_ekonomi1`, `malam_ekonomi2`, `hari`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 3, 3, 3, 3, 1, 1, 1, 1, 4, 4, 3, 4, 1, '2016-11-08 10:56:57', '2016-11-08 10:56:57', NULL),
(2, 5, 3, 3, 3, 3, 6, 1, 6, 1, 4, 4, 3, 4, 2, '2016-11-08 10:58:01', '2016-11-08 10:58:01', NULL),
(3, 5, 3, 3, 3, 3, 6, 6, 6, 6, 4, 4, 8, 8, 3, '2016-11-08 10:58:12', '2016-11-08 13:00:50', NULL),
(6, 1, 3, 3, 3, 3, 1, 1, 1, 1, 4, 4, 4, 4, 1, '2016-11-08 13:18:35', '2016-11-08 13:18:35', NULL),
(7, 6, 7, 3, 3, 3, 6, 6, 1, 6, 4, 4, 4, 4, 1, '2016-11-09 13:45:41', '2016-11-09 13:46:10', NULL),
(8, 7, 3, 3, 3, 3, 1, 1, 1, 1, 4, 4, 4, 4, 1, '2016-11-09 13:45:59', '2016-11-09 13:45:59', NULL);

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
-- Struktur dari tabel `inventorys`
--

CREATE TABLE `inventorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_req` int(10) UNSIGNED NOT NULL,
  `gudang` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `inventorys`
--

INSERT INTO `inventorys` (`id`, `id_bahan`, `jumlah`, `id_req`, `gudang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, 1213, 9, 3, '2016-11-09 16:25:01', '2016-11-09 16:25:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `toko` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_requisitions` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `toko`, `id_requisitions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', 13, '2016-11-09 09:21:29', '2016-11-09 09:29:16', '2016-11-09 09:29:16'),
(2, '2', 9, '2016-11-09 09:29:22', '2016-11-09 10:46:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kapals`
--

CREATE TABLE `kapals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kapal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_kapal` tinyint(1) NOT NULL,
  `no_imo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kapals`
--

INSERT INTO `kapals` (`id`, `nama_kapal`, `tipe_kapal`, `no_imo`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'Lawit', 1, '12312', '123123', NULL, NULL),
(2, 'Dewa Ruci', 2, '12314', '1231', NULL, NULL),
(3, 'Lauser', 3, '123123', '123123', NULL, NULL);

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

--
-- Dumping data untuk tabel `menuses`
--

INSERT INTO `menuses` (`id`, `nama`, `tipe`, `menu_pembuka`, `menu_utama`, `menu_penutup`, `minuman`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nyam Nyam Paket', 1, 11, 8, 9, 16, '2016-11-07 02:00:46', '2016-11-08 07:20:16', NULL),
(2, 'asdasdas', 1, 11, 2, 9, 16, '2016-11-07 02:02:38', '2016-11-07 02:20:56', '2016-11-07 02:20:56'),
(3, 'Special Breakfast', 0, 1, 2, 9, 16, '2016-11-07 02:39:57', '2016-11-08 06:43:25', NULL),
(4, 'Lapar malam', 2, 1, 2, 9, 10, '2016-11-07 04:46:37', '2016-11-08 07:20:30', NULL),
(5, 'asd', 0, 1, 2, 9, 10, '2016-11-07 04:48:21', '2016-11-07 04:50:01', '2016-11-07 04:50:01'),
(6, 'Segar-Segar', 1, 1, 8, 9, 16, '2016-11-07 04:49:54', '2016-11-08 07:21:14', NULL),
(7, 'Special Dish', 0, 1, 2, 9, 10, '2016-11-08 12:46:22', '2016-11-08 12:46:22', NULL),
(8, 'Met Malam', 2, 1, 2, 9, 10, '2016-11-08 12:59:33', '2016-11-08 12:59:33', NULL);

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
(69, '2016_11_05_190950_pelabuhans', 2),
(70, '2016_11_07_090942_rutes', 3),
(71, '2016_11_07_090954_transits', 3),
(73, '2016_11_07_182153_invoice', 3),
(75, '2016_11_07_183601_kelas_makan', 3),
(77, '2016_11_07_193337_invoices_detail', 4),
(79, '2016_11_07_230250_ship_storage', 6),
(80, '2016_11_08_053445_voyage_planning', 7),
(81, '2016_11_08_170049_kelas_makans', 8),
(82, '2016_11_07_181407_food_plan', 9),
(84, '2016_11_07_184611_requisition', 10),
(85, '2016_11_08_215147_detail_requisition', 10),
(86, '2016_11_07_182238_inventory_out', 11),
(87, '2016_11_07_212503_wastes', 12);

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
(1, 'Dwikora', 'Dekat Korem', '082255985321', 'Pontianak', NULL, NULL),
(2, 'Tanjung Priuk', 'tanjung priuk', '086677', 'Jakarta utara', NULL, NULL),
(3, 'xyzq', 'rg', '564', 'ghv', NULL, NULL);

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
(1, 'Raymen', '<p>dbajshdbjkasdk</p>\r\n', 0, '<ol>\r\n	<li>asd</li>\r\n	<li>asdas</li>\r\n	<li>asdas</li>\r\n	<li>asdas</li>\r\n</ol>\r\n', 'http://localhost:8000/photos/1/agar2.jpg', '2016-11-06 04:20:39', '2016-11-09 07:03:31', NULL),
(2, 'Sate', '<p>asdzcz</p>\r\n', 1, '<p>asdasdasdasd</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 13:16:41', '2016-11-06 13:16:41', NULL),
(3, 'asdas', '<p>zxcvsfa</p>\r\n', 2, '<p>asdasdaszcz</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 14:11:31', '2016-11-06 16:09:55', '2016-11-06 16:09:55'),
(4, 'asdasd', '<p>zczxcassda</p>\r\n', 2, '<p>asdasdzxc</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 14:18:50', '2016-11-06 16:09:59', '2016-11-06 16:09:59'),
(5, 'asdas', '<p>asdzxcz</p>\r\n', 3, '<p>asdaszxc</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-06 14:19:22', '2016-11-06 16:10:03', '2016-11-06 16:10:03'),
(6, '', '', 0, '', '', '2016-11-06 16:08:57', '2016-11-06 16:09:18', '2016-11-06 16:09:18'),
(7, 'asdas', '<p>asdas</p>\r\n', 0, '<p>assdasdas</p>\r\n', 'http://localhost:8000/photos/1/581fb48133d01.png', '2016-11-06 16:09:12', '2016-11-06 16:10:06', '2016-11-06 16:10:06'),
(8, 'Nasi Goreng', '<p>asdasd</p>\r\n', 1, '<p>asdzxcasd</p>\r\n', 'http://localhost:8000/photos/1/581fb48133d01.png', '2016-11-06 16:17:18', '2016-11-06 16:17:18', NULL),
(9, 'Agar2', '<p>assdasd</p>\r\n', 2, '<p>assda</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-07 01:34:59', '2016-11-07 01:34:59', NULL),
(10, 'Es Kopyor', '<p>assdas</p>\r\n', 3, '<p>asd</p>\r\n', 'http://localhost:8000/photos/1/581f10da27f05.png', '2016-11-07 01:51:48', '2016-11-07 01:51:48', NULL),
(11, 'asdas', '<p>asdas</p>\r\n', 0, '<p>assdasd</p>\r\n', 'http://localhost:8000/photos/1/581fb48133d01.png', '2016-11-07 02:17:50', '2016-11-07 02:17:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `requisitions`
--

CREATE TABLE `requisitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `deskripsi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vendor` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_pelayaran` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `requisitions`
--

INSERT INTO `requisitions` (`id`, `deskripsi`, `vendor`, `status`, `id_pelayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'asdas', 1, 2, 1, '2016-11-09 03:47:04', '2016-11-09 04:34:09', NULL),
(13, 'vvdf', 1, 0, 6, '2016-11-09 04:40:38', '2016-11-09 04:40:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rutes`
--

CREATE TABLE `rutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `asal` int(10) UNSIGNED NOT NULL,
  `tujuan` int(10) UNSIGNED NOT NULL,
  `est_rute` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `rutes`
--

INSERT INTO `rutes` (`id`, `asal`, `tujuan`, `est_rute`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 13, NULL, '2016-11-09 13:26:54'),
(2, 1, 2, 3, '2016-11-07 14:52:33', '2016-11-09 13:27:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `storages`
--

CREATE TABLE `storages` (
  `id_storages` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` tinyint(1) NOT NULL,
  `id_kapal` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `storages`
--

INSERT INTO `storages` (`id_storages`, `nama`, `tipe`, `id_kapal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a1Tanjungpriuk', 0, 2, NULL, NULL, NULL),
(3, 'a2 TP', 1, 2, NULL, NULL, NULL),
(6, 'A01 Dwikora', 1, 1, NULL, NULL, NULL),
(7, 'A02 Dwikora', 0, 1, NULL, NULL, NULL),
(8, 'B3OL', 1, 3, NULL, NULL, NULL),
(9, 'adasda', 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transits`
--

CREATE TABLE `transits` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pelabuhan` int(10) UNSIGNED NOT NULL,
  `est_transit` int(11) NOT NULL,
  `id_rute` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `transits`
--

INSERT INTO `transits` (`id`, `id_pelabuhan`, `est_transit`, `id_rute`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 1, '2016-11-07 17:14:28', '2016-11-07 22:40:05'),
(14, 2, 1, 2, '2016-11-08 04:47:31', '2016-11-08 04:47:31'),
(15, 1, 12, 1, '2016-11-09 13:23:34', '2016-11-09 13:23:34'),
(16, 1, 2, 2, '2016-11-09 13:27:04', '2016-11-09 13:27:04');

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
(13, 16, '1000ml', 0, 'besar', '2016-11-06 13:55:27', '2016-11-06 13:55:39', NULL),
(14, 1, 'asdas', 1, 'adas', '2016-11-09 16:14:59', '2016-11-09 16:14:59', NULL);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `voyages`
--

CREATE TABLE `voyages` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rute` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keberangkatan` datetime NOT NULL,
  `id_kapal` int(10) UNSIGNED NOT NULL,
  `eksekutif` int(11) NOT NULL,
  `bisnis` int(11) NOT NULL,
  `ekonomi1` int(11) NOT NULL,
  `ekonomi2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `voyages`
--

INSERT INTO `voyages` (`id`, `id_rute`, `nama`, `keberangkatan`, `id_kapal`, `eksekutif`, `bisnis`, `ekonomi1`, `ekonomi2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'asdasdas', '2016-11-09 01:05:00', 3, 10, 20, 30, 40, '2016-11-08 01:16:20', '2016-11-09 14:49:42', NULL),
(2, 1, '', '2016-11-02 01:02:00', 2, 0, 0, 0, 0, '2016-11-08 03:04:56', '2016-11-08 03:17:36', '2016-11-08 03:17:36'),
(3, 2, '', '2016-11-08 05:00:00', 2, 0, 0, 0, 0, '2016-11-08 03:08:07', '2016-11-08 03:17:45', '2016-11-08 03:17:45'),
(4, 2, '', '2016-11-10 06:00:00', 1, 0, 0, 0, 0, '2016-11-08 03:14:02', '2016-11-08 03:17:51', '2016-11-08 03:17:51'),
(5, 1, 'asdasd', '2016-11-08 22:00:00', 2, 100, 200, 400, 500, '2016-11-08 03:54:04', '2016-11-09 14:51:20', NULL),
(6, 2, 'asdasdas', '2016-11-18 07:00:00', 2, 50, 100, 150, 200, '2016-11-08 03:57:06', '2016-11-09 14:49:54', NULL),
(7, 1, 'jffgdfdf', '2016-09-11 08:39:45', 1, 1231, 1312, 1311, 123, '2016-11-09 13:40:17', '2016-11-09 14:51:26', NULL),
(8, 1, 'hgjdgdf', '2016-09-11 03:40:15', 1, 1231, 1312, 1311, 123, '2016-11-09 13:40:28', '2016-11-09 14:51:33', NULL),
(9, 2, '', '2016-08-11 03:42:30', 2, 78978, 678, 786, 6887, '2016-11-09 13:43:10', '2016-11-09 14:14:30', '2016-11-09 14:14:30'),
(10, 2, '', '1970-01-01 03:42:45', 3, 76, 786, 677, 879, '2016-11-09 13:43:39', '2016-11-09 14:49:37', '2016-11-09 14:49:37'),
(11, 1, 'dasaczcz', '1970-01-01 03:42:30', 3, 2131, 123, 31, 312, '2016-11-09 14:12:03', '2016-11-09 14:14:27', '2016-11-09 14:14:27'),
(12, 1, 'adzxc', '2016-09-11 04:13:30', 2, 123, 31223, 1233, 1312, '2016-11-09 14:14:15', '2016-11-09 14:14:24', '2016-11-09 14:14:24'),
(13, 1, 'asd', '1970-01-01 04:42:45', 2, 123, 213, 13, 1312, '2016-11-09 14:43:27', '2016-11-09 14:43:27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wastes`
--

CREATE TABLE `wastes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_sampah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_sampah` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `id_voyages` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `wastes`
--

INSERT INTO `wastes` (`id`, `nama_sampah`, `jenis_sampah`, `berat`, `id_voyages`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdas', 1, 12, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_invoices`
--
ALTER TABLE `detail_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoices` (`id_invoices`);

--
-- Indexes for table `detail_recipes`
--
ALTER TABLE `detail_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resep` (`id_resep`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `detail_requisitions`
--
ALTER TABLE `detail_requisitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_req` (`id_req`);

--
-- Indexes for table `food_plans`
--
ALTER TABLE `food_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sarapan_eksekutif` (`sarapan_eksekutif`),
  ADD KEY `id_pelayaran` (`id_pelayaran`),
  ADD KEY `sarapan_bisnis` (`sarapan_bisnis`),
  ADD KEY `sarapan_ekonomi1` (`sarapan_ekonomi1`),
  ADD KEY `sarapan_ekonomi2` (`sarapan_ekonomi2`),
  ADD KEY `siang_eksekutif` (`siang_eksekutif`),
  ADD KEY `siang_bisnis` (`siang_bisnis`),
  ADD KEY `siang_ekonomi1` (`siang_ekonomi1`),
  ADD KEY `siang_ekonomi2` (`siang_ekonomi2`),
  ADD KEY `malam_eksekutif` (`malam_eksekutif`),
  ADD KEY `malam_bisnis` (`malam_bisnis`),
  ADD KEY `malam_ekonomi1` (`malam_ekonomi1`),
  ADD KEY `malam_ekonomi2` (`malam_ekonomi2`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satuan_resep` (`satuan_resep`),
  ADD KEY `satuan_pembelian` (`satuan_pembelian`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `inventorys`
--
ALTER TABLE `inventorys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_FP` (`id_req`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `gudang` (`gudang`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_requisitions` (`id_requisitions`);

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
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelayaran` (`id_pelayaran`),
  ADD KEY `vendor` (`vendor`);

--
-- Indexes for table `rutes`
--
ALTER TABLE `rutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asal` (`asal`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id_storages`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indexes for table `transits`
--
ALTER TABLE `transits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_pelabuhan` (`id_pelabuhan`);

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
-- Indexes for table `voyages`
--
ALTER TABLE `voyages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kapal` (`id_kapal`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `wastes`
--
ALTER TABLE `wastes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_voyages` (`id_voyages`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_invoices`
--
ALTER TABLE `detail_invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_recipes`
--
ALTER TABLE `detail_recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `detail_requisitions`
--
ALTER TABLE `detail_requisitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `food_plans`
--
ALTER TABLE `food_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `inventorys`
--
ALTER TABLE `inventorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kapals`
--
ALTER TABLE `kapals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `pelabuhans`
--
ALTER TABLE `pelabuhans`
  MODIFY `id_pelabuhan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `storages`
--
ALTER TABLE `storages`
  MODIFY `id_storages` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transits`
--
ALTER TABLE `transits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `voyages`
--
ALTER TABLE `voyages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wastes`
--
ALTER TABLE `wastes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_invoices`
--
ALTER TABLE `detail_invoices`
  ADD CONSTRAINT `fk_invoices` FOREIGN KEY (`id_invoices`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_recipes`
--
ALTER TABLE `detail_recipes`
  ADD CONSTRAINT `fk_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resep` FOREIGN KEY (`id_resep`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_requisitions`
--
ALTER TABLE `detail_requisitions`
  ADD CONSTRAINT `fk_reqss` FOREIGN KEY (`id_req`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `food_plans`
--
ALTER TABLE `food_plans`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_pelayaran`) REFERENCES `voyages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk10` FOREIGN KEY (`malam_eksekutif`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk11` FOREIGN KEY (`malam_bisnis`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk12` FOREIGN KEY (`malam_ekonomi1`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk13` FOREIGN KEY (`malam_ekonomi2`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`sarapan_eksekutif`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`sarapan_bisnis`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`sarapan_ekonomi1`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk5` FOREIGN KEY (`sarapan_ekonomi2`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`siang_eksekutif`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk7` FOREIGN KEY (`siang_bisnis`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk8` FOREIGN KEY (`siang_ekonomi1`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk9` FOREIGN KEY (`siang_ekonomi2`) REFERENCES `menuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `Fk_satuan_pembelian` FOREIGN KEY (`satuan_pembelian`) REFERENCES `measurements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_satuan_resep` FOREIGN KEY (`satuan_resep`) REFERENCES `measurements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `inventorys`
--
ALTER TABLE `inventorys`
  ADD CONSTRAINT `ASX` FOREIGN KEY (`gudang`) REFERENCES `storages` (`id_storages`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bahans` FOREIGN KEY (`id_bahan`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fp` FOREIGN KEY (`id_req`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoice` FOREIGN KEY (`id_requisitions`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menuses`
--
ALTER TABLE `menuses`
  ADD CONSTRAINT `fk_minuman` FOREIGN KEY (`minuman`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembuka` FOREIGN KEY (`menu_pembuka`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penutup` FOREIGN KEY (`menu_penutup`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utama` FOREIGN KEY (`menu_utama`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `requisitions`
--
ALTER TABLE `requisitions`
  ADD CONSTRAINT `asdasd` FOREIGN KEY (`id_pelayaran`) REFERENCES `voyages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendr` FOREIGN KEY (`vendor`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rutes`
--
ALTER TABLE `rutes`
  ADD CONSTRAINT `fk_asal` FOREIGN KEY (`asal`) REFERENCES `pelabuhans` (`id_pelabuhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tujuan` FOREIGN KEY (`tujuan`) REFERENCES `pelabuhans` (`id_pelabuhan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `storages`
--
ALTER TABLE `storages`
  ADD CONSTRAINT `fk_kapal` FOREIGN KEY (`id_kapal`) REFERENCES `kapals` (`id`);

--
-- Ketidakleluasaan untuk tabel `transits`
--
ALTER TABLE `transits`
  ADD CONSTRAINT `fk_pelabuhan` FOREIGN KEY (`id_pelabuhan`) REFERENCES `pelabuhans` (`id_pelabuhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rute` FOREIGN KEY (`id_rute`) REFERENCES `rutes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `voyages`
--
ALTER TABLE `voyages`
  ADD CONSTRAINT `fk_kapal_voyage` FOREIGN KEY (`id_kapal`) REFERENCES `kapals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rute_voyage` FOREIGN KEY (`id_rute`) REFERENCES `rutes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wastes`
--
ALTER TABLE `wastes`
  ADD CONSTRAINT `ads` FOREIGN KEY (`id_voyages`) REFERENCES `voyages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
