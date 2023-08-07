-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 01:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_pembayaran_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_04_054610_create_notifications_table', 2),
(6, '2023_08_06_133121_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('800b121a-46a1-48bf-9ed0-40ed54631ede', 'App\\Notifications\\NewUserBayarNotification', 'App\\Models\\User', 5, '{\"id_tagihan\":2,\"total_bayar\":30000,\"status_bayar\":null,\"tgl_bayar\":null}', NULL, '2023-08-07 04:19:21', '2023-08-07 04:19:21'),
('99ea1ce6-40ed-4f9b-8ed1-91bc7f4905cb', 'App\\Notifications\\NewTagihanNotification', 'App\\Models\\User', 8, '{\"keterangan\":\"Tagihan Agustus\",\"jumlah\":30000,\"status_tagihan\":0,\"tgl_tagihan\":\"2023-08-07\",\"notifikasi\":\"Baru\"}', '2023-08-07 04:19:25', '2023-08-07 04:17:29', '2023-08-07 04:19:25'),
('b2b9a1ae-9127-402f-b0fc-408a4b135887', 'App\\Notifications\\NewUserBayarNotification', 'App\\Models\\User', 5, '{\"id_tagihan\":3,\"total_bayar\":30000,\"status_bayar\":null,\"tgl_bayar\":null}', '2023-08-07 04:18:41', '2023-08-07 04:18:11', '2023-08-07 04:18:41'),
('be77d690-35e7-45c1-8ae3-0eb642639042', 'App\\Notifications\\NewKonfirmasiNotification', 'App\\Models\\User', 9, '{\"keterangan\":\"Tagihan Agustus\",\"jumlah\":30000,\"status_tagihan\":2,\"tgl_tagihan\":\"2023-08-07\",\"notifikasi\":\"Terkonfirmasi\"}', NULL, '2023-08-07 04:18:33', '2023-08-07 04:18:51'),
('e0b303fd-7768-4bc3-b16d-39e525a1183f', 'App\\Notifications\\NewTagihanNotification', 'App\\Models\\User', 6, '{\"keterangan\":\"Tagihan Agustus\",\"jumlah\":30000,\"status_tagihan\":0,\"tgl_tagihan\":\"2023-08-07\",\"notifikasi\":\"Baru\"}', NULL, '2023-08-07 04:17:15', '2023-08-07 04:17:15'),
('f0e7def9-52e1-406f-a0a6-f304fe079ee3', 'App\\Notifications\\NewTagihanNotification', 'App\\Models\\User', 9, '{\"keterangan\":\"Tagihan Agustus\",\"jumlah\":30000,\"status_tagihan\":0,\"tgl_tagihan\":\"2023-08-07\",\"notifikasi\":\"Baru\"}', '2023-08-07 04:18:51', '2023-08-07 04:17:42', '2023-08-07 04:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(256) DEFAULT NULL,
  `status_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `metode_bayar` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pembayaran`, `id_tagihan`, `total_bayar`, `bukti_bayar`, `status_bayar`, `tgl_bayar`, `metode_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 30000, '/app-assets/assets/img/bukti/pembayaran_1.jpg', 1, '2023-08-07', 2, '2023-08-07 11:18:33', '2023-08-07 11:18:33', NULL),
(2, 2, 2, 30000, '/app-assets/assets/img/bukti/pembayaran_2.jpg', 0, '2023-08-07', 2, '2023-08-07 04:19:20', '2023-08-07 11:19:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` char(15) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 1, NULL, '2023-05-30 12:06:57', NULL),
(2, 'User', 1, NULL, '2023-05-30 12:06:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_tagihan` date NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_tagihan` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `notifikasi_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `id_tagihan`, `id_user`, `tgl_tagihan`, `keterangan`, `jumlah`, `status_tagihan`, `created_at`, `updated_at`, `deleted_at`, `notifikasi_status`) VALUES
(1, 1, 6, '2023-08-07', 'Tagihan Agustus', 30000, 0, '2023-08-07 04:17:15', '2023-08-07 11:17:15', NULL, 0),
(2, 2, 8, '2023-08-07', 'Tagihan Agustus', 30000, 1, '2023-08-07 11:19:20', '2023-08-07 11:19:20', NULL, 0),
(3, 3, 9, '2023-08-07', 'Tagihan Agustus', 30000, 2, '2023-08-07 11:18:32', '2023-08-07 11:18:32', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_code` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` smallint(6) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `alamat`, `no_tlp`, `nik`, `qr_code`, `status_user`, `deleted_at`) VALUES
(5, 1, 'admin2', 'admin@gmail.com', NULL, '$2y$10$ccLO/BGGUea47W0XDy/gGOTq058gyVkCcKskizxa8m50n3xJJ9i2q', NULL, '2023-05-24 05:25:26', '2023-06-30 04:36:43', 'Jl.Cempaka 56', '08127182819', NULL, NULL, NULL, NULL),
(6, 2, 'User', 'user@gmail.com', NULL, '$2y$10$gZjPtFpqrULsPgjk3.BEFeyFufZwahbuVincXb3BWxbhOL8x0iUHq', NULL, '2023-05-24 05:25:39', '2023-05-30 05:43:31', 'Jl. Cempaka 75', '0812345678', NULL, NULL, NULL, NULL),
(8, 2, 'dahlia', 'dahlia@gmail.com', NULL, '$2y$10$zDRqO9hlWuT.ZrBF0x9YeOws8ZWySWTKUkDbMfh9ElqcRHV8ES5Ce', NULL, '2023-06-05 05:19:54', '2023-06-05 05:19:54', 'Jl. Cempaka 65', '0812345678', NULL, NULL, NULL, NULL),
(9, 2, 'Chika', 'chika@gmail.com', NULL, '$2y$10$unIdS3lOvT10.FA6V8u5dOmU8uU/J37wRGh4EeUy/DPHIXuFu1ouO', NULL, '2023-06-06 03:57:50', '2023-06-06 03:57:50', 'Jl. Cempaka 79', '0812345678', NULL, NULL, NULL, NULL),
(11, 2, 'kartika', 'kartika@gmail.com', NULL, '$2y$10$37GMf5KSSrCL7V8ITx7SK.SsThpraQxQyz8KtfcrZM1I0Au96LZK6', NULL, '2023-08-03 22:50:18', '2023-08-03 22:50:18', 'Jl. cempaka 88', '0812345678', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`) USING BTREE;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_memiliki_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
