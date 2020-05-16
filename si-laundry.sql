-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 09:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
('166b8f01-411d-4a44-a567-18a4eef56ce2', 'miftakhulfitria08@gmail.com', 'Miftakhul Fitria', '085812873833', 'Jl. Kembang Turi', '2020-03-14 23:04:44', '2020-04-28 22:50:48'),
('61470936-cba0-4882-8e6b-617d21bacaf8', 'afifahnugraheni5@gmail.com', 'Afifah Millatina', '085731180372', 'Jl.Soekarno Hatta', '2020-03-17 15:07:35', '2020-03-17 15:07:35'),
('68a1fc3d-f0be-46af-9627-160970fa7843', 'fitanugraheni@gmail.com', 'Fita Nugraheni', '085812873832', 'Jl.Pisang Kipas', '2020-03-16 16:17:46', '2020-03-16 16:17:46'),
('8d5469c6-934a-4b15-b373-9d628ba62f34', 'miftakhul@gmail.com', 'Fitria', '085812873832', 'Jl. Ciliwung', '2020-03-17 16:31:21', '2020-03-17 16:44:34'),
('b3dcf08a-e25a-4a75-a78d-89520170506a', 'citrarisky@gmail.com', 'Citra Risky', '085812873845', 'Jl. Mayjend Panjaitan Gg.17A No.12', '2020-05-10 06:27:22', '2020-05-10 06:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_14_141449_create_table_paket', 2),
(4, '2020_03_15_045621_table_customer', 3),
(5, '2020_03_15_112600_status_pesanan', 4),
(6, '2020_03_15_113619_status-pesanan', 5),
(7, '2020_03_15_132153_alter_status', 6),
(8, '2020_03_15_140715_status-pembayaran', 7),
(9, '2020_03_15_151341_alter_status_pembayaran', 8),
(10, '2020_03_15_215420_create_table_transaksi', 9),
(11, '2020_03_17_152623_created_nama_usaha', 10),
(12, '2020_04_21_020645_table_transaksi_soft_deletes', 11);

-- --------------------------------------------------------

--
-- Table structure for table `nama_usaha`
--

CREATE TABLE `nama_usaha` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nama_usaha`
--

INSERT INTO `nama_usaha` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('de6f33bf-4b9b-4ef0-b896-ed975d67abb9', 'Fam\'s Laundry', '2020-03-17 09:20:10', '2020-03-17 09:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
('2130b997-fb08-4156-8b92-c3b378c732b1', 'Paket Premium', 16000, '2020-03-14 09:06:49', '2020-03-14 09:06:49'),
('99e00169-95d2-4c7c-a1bd-a46b134485c1', 'Paket Medium', 11000, '2020-03-14 09:08:29', '2020-03-14 17:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$xp5Eq1iV/z8qTN.2EXpWf.xMSofB9Nok1JwGoB.7lHYGp6Y2oVqmy', '2020-03-13 08:58:02'),
('fitanugraheni@gmail.com', '$2y$10$MAzBn2Vc1PhJloS/eidpq./YYDayUDTWyYrreNKB8rx2.9itnYAlO', '2020-03-13 08:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `status-pembayaran`
--

CREATE TABLE `status-pembayaran` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status-pembayaran`
--

INSERT INTO `status-pembayaran` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
('04c35dc1-b0cd-4c59-b8fb-8b6598b8279e', 'Baru Diantarkan', 3, '2020-04-29 19:49:15', '2020-04-29 19:49:15'),
('8c2e6d5c-a67c-431c-b0d4-aecd501e5441', 'Belum Lunas', 1, '2020-03-15 08:48:34', '2020-04-29 19:48:49'),
('b05e4410-01e2-4dea-98dd-0904908e2b26', 'Dibayar', 2, '2020-03-15 08:49:02', '2020-03-15 08:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `status-pesanan`
--

CREATE TABLE `status-pesanan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status-pesanan`
--

INSERT INTO `status-pesanan` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
('0c177bca-ce60-45ec-9bab-42f5179c741a', 'Selesai', 4, '2020-03-15 06:31:47', '2020-03-15 06:37:09'),
('1bb7c5c3-3cd8-4ffd-982f-148b00eff4c5', 'Dicuci', 2, '2020-03-15 06:31:21', '2020-03-15 06:31:21'),
('38ca3b5b-610e-4d6f-bbc9-f9a068ee3c1e', 'Baru Diantarkan', 1, '2020-03-15 06:31:08', '2020-03-15 06:31:08'),
('f1c69b2f-1538-4dda-9db2-831f3463b9cb', 'Dijemur', 3, '2020-03-15 06:31:31', '2020-03-15 06:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `t-pesanan`
--

CREATE TABLE `t-pesanan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` float NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t-pesanan`
--

INSERT INTO `t-pesanan` (`id`, `customer`, `paket`, `berat`, `grand_total`, `status_pesanan`, `status_pembayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
('75400f0f-628d-4907-8f55-07ba554301ca', 'b3dcf08a-e25a-4a75-a78d-89520170506a', '99e00169-95d2-4c7c-a1bd-a46b134485c1', 1, '11000', '1bb7c5c3-3cd8-4ffd-982f-148b00eff4c5', 'b05e4410-01e2-4dea-98dd-0904908e2b26', '2020-05-16 07:10:04', '2020-05-16 07:11:16', NULL),
('a31a48af-6714-405d-b40b-ac16400050a5', '61470936-cba0-4882-8e6b-617d21bacaf8', '2130b997-fb08-4156-8b92-c3b378c732b1', 0.5, '8000', '1bb7c5c3-3cd8-4ffd-982f-148b00eff4c5', '04c35dc1-b0cd-4c59-b8fb-8b6598b8279e', '2020-05-10 01:26:44', '2020-05-10 01:29:16', NULL),
('e4af9f43-b14f-444c-8c4f-ef52a30d6ec6', 'b3dcf08a-e25a-4a75-a78d-89520170506a', '99e00169-95d2-4c7c-a1bd-a46b134485c1', 2, '22000', 'f1c69b2f-1538-4dda-9db2-831f3463b9cb', 'b05e4410-01e2-4dea-98dd-0904908e2b26', '2020-05-10 06:31:16', '2020-05-16 07:10:16', NULL),
('e862d0c0-5b84-4b68-801d-f1c8fab8360e', '68a1fc3d-f0be-46af-9627-160970fa7843', '99e00169-95d2-4c7c-a1bd-a46b134485c1', 1, '11000', '0c177bca-ce60-45ec-9bab-42f5179c741a', 'b05e4410-01e2-4dea-98dd-0904908e2b26', '2020-03-17 15:06:32', '2020-05-10 06:15:23', NULL),
('febee9d6-7d3a-4298-a1a5-770bd401b098', '61470936-cba0-4882-8e6b-617d21bacaf8', '2130b997-fb08-4156-8b92-c3b378c732b1', 2, '32000', '1bb7c5c3-3cd8-4ffd-982f-148b00eff4c5', 'b05e4410-01e2-4dea-98dd-0904908e2b26', '2020-03-17 15:08:56', '2020-05-10 00:54:59', '2020-05-10 00:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$xX8mX.hQ2.bT7AIHoeszaeLnQeyuiSO50JIqaSyaA2zRIPiD4QGuu', 'PeC9HHlWFokOmHDNdydoc1IZzphB4jEM9eqoSJrcU0qYHuPP6glSuOdSydSx', '2020-03-13 08:52:23', '2020-03-13 08:52:23'),
(3, 'Miftakhul Fitria Nugraheni', 'fitanugraheni@gmail.com', NULL, '$2y$10$qoo/9ibtGH0NjaGivlz3wuD3ZI03p42IVhmuZQ0ZJNjMv5pOvIoKC', NULL, '2020-03-13 08:59:19', '2020-03-13 08:59:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `status-pembayaran`
--
ALTER TABLE `status-pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status-pesanan`
--
ALTER TABLE `status-pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t-pesanan`
--
ALTER TABLE `t-pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pesanan_customer_foreign` (`customer`),
  ADD KEY `t_pesanan_paket_foreign` (`paket`),
  ADD KEY `t_pesanan_status_pesanan_foreign` (`status_pesanan`),
  ADD KEY `t_pesanan_status_pembayaran_foreign` (`status_pembayaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t-pesanan`
--
ALTER TABLE `t-pesanan`
  ADD CONSTRAINT `t_pesanan_customer_foreign` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `t_pesanan_paket_foreign` FOREIGN KEY (`paket`) REFERENCES `paket` (`id`),
  ADD CONSTRAINT `t_pesanan_status_pembayaran_foreign` FOREIGN KEY (`status_pembayaran`) REFERENCES `status-pembayaran` (`id`),
  ADD CONSTRAINT `t_pesanan_status_pesanan_foreign` FOREIGN KEY (`status_pesanan`) REFERENCES `status-pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
