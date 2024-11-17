-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2024 at 02:07 PM
-- Server version: 5.7.33
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persewaan-mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_sewa_per_hari` int(11) NOT NULL,
  `status` enum('tersedia','disewa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `merek`, `model`, `nomor_plat`, `tarif_sewa_per_hari`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 'Avanza', 'B1234XYZ', 350000, 'tersedia', '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(2, 'Honda', 'Civic', 'B5678ABC', 500000, 'tersedia', '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(3, 'Suzuki', 'Swift', 'B9101DEF', 300000, 'tersedia', '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(4, 'BMW', 'X5', 'B1122GHJ', 1500000, 'tersedia', '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(5, 'Mercedes', 'A-Class', 'B3344IJK', 1200000, 'tersedia', '2024-11-17 06:36:33', '2024-11-17 06:36:33');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_15_160419_create_cars_table', 1),
(5, '2024_11_15_160431_create_rentals_table', 1),
(6, '2024_11_15_160442_create_returns_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_rental` enum('berjalan','selesai','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `tanggal_mulai`, `tanggal_selesai`, `status_rental`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-11-20', '2024-11-26', 'selesai', 2100000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(2, 2, 4, '2024-11-20', '2024-12-01', 'selesai', 16500000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(3, 3, 1, '2024-11-23', '2024-11-26', 'selesai', 1050000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(4, 3, 5, '2024-11-23', '2024-11-28', 'selesai', 6000000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(5, 4, 2, '2024-11-23', '2024-11-30', 'selesai', 3500000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(6, 4, 3, '2024-11-19', '2024-12-01', 'selesai', 3600000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(7, 5, 1, '2024-11-21', '2024-11-25', 'selesai', 1400000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(8, 5, 2, '2024-11-18', '2024-11-25', 'selesai', 3500000, '2024-11-17 06:36:33', '2024-11-17 06:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `jumlah_hari_sewa` int(11) NOT NULL,
  `biaya_sewa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `rental_id`, `tanggal_pengembalian`, `jumlah_hari_sewa`, `biaya_sewa`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-17', 6, 2100000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(2, 2, '2024-11-17', 11, 16500000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(3, 3, '2024-11-17', 3, 1050000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(4, 4, '2024-11-17', 5, 6000000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(5, 5, '2024-11-17', 7, 3500000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(6, 6, '2024-11-17', 12, 3600000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(7, 7, '2024-11-17', 4, 1400000, '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(8, 8, '2024-11-17', 7, 3500000, '2024-11-17 06:36:33', '2024-11-17 06:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LKU8hftTiOMPBL455gGPhyrfTcB2dnIobr3xHG9m', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVhSeUN4cU1PeHBWb0hjaG9RVWtRYUQyc1hPVmNyR0xTUFd0eVAxYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1731851664);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_sim` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `nomor_telepon`, `nomor_sim`, `email`, `email_verified_at`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'Jl. Admin No. 1', '081234567890', 'SIM1234567890123', 'admin@example.com', NULL, '$2y$12$paOufgcFd9Zy4sVATfK9uuFMwHZJDjuQc.GYkV1rrV4KMkuYEleMC', 'admin', '2024-11-17 06:36:31', '2024-11-17 06:36:31'),
(2, 'Customer User 1', 'Jl. Customer No. 1', '081234567891', 'SIM2345678901234', 'user1@example.com', NULL, '$2y$12$fmKKGzxoVxU5Xn2w50pIpuMoMY9edxe0jH4w0Bn5b.Fsw6NAuMGrW', 'user', '2024-11-17 06:36:32', '2024-11-17 06:36:32'),
(3, 'Customer User 2', 'Jl. Customer No. 2', '081234567892', 'SIM3456789012345', 'user2@example.com', NULL, '$2y$12$4ILn1lvBev8FGckEW8xt1uzDDg4q.b7inau.rl0oFqBLrGBu2/wT6', 'user', '2024-11-17 06:36:32', '2024-11-17 06:36:32'),
(4, 'Customer User 3', 'Jl. Customer No. 3', '081234567893', 'SIM4567890123456', 'user3@example.com', NULL, '$2y$12$FZXOLyzvu.3ZwEwoiIGJXefkM9zU2qE7mj2.LaoXickNmdC1KwStW', 'user', '2024-11-17 06:36:33', '2024-11-17 06:36:33'),
(5, 'Customer User 4', 'Jl. Customer No. 4', '081234567894', 'SIM5678901234567', 'user4@example.com', NULL, '$2y$12$uV01DzhZiV7.vn6gSn3bneAQ4Pb5fyW3RlhTWSjwbS8SqHdw6SCTm', 'user', '2024-11-17 06:36:33', '2024-11-17 06:36:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_nomor_plat_unique` (`nomor_plat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returns_rental_id_foreign` (`rental_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nomor_sim_unique` (`nomor_sim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_rental_id_foreign` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
