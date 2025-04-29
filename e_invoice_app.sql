-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 08:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_invoice_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `perusahaan`, `id_user`) VALUES
(1, 'PT BINTANG 6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IzhA8QtWkmYF015pIi3KFOEuhZS9TxuT4giFoTB0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2xvZ2luLXBhZ2UiO31zOjY6Il90b2tlbiI7czo0MDoiUEVTaHNMdGhvYmowY3JUMUdlRW5ET1E5alZGdzUxRDZjMk1IWFNHdyI7fQ==', 1745906423);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `konsumen` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `asuransi` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nomor_transaksi`, `konsumen`, `total`, `asuransi`, `tanggal`, `status`) VALUES
(12, 'AJP/20250115/0001', 'Budi Santoso', 1200000.00, 'Ya', '2025-01-15', 'Telah Lunas'),
(13, 'AJP/20250116/0002', 'Siti Aisyah', 1400000.00, 'Tidak', '2025-03-16', 'Belum Bayar'),
(14, 'AJP/20250117/0003', 'Andi Wijaya', 1600000.00, 'Ya', '2025-01-17', 'Telah Lunas'),
(15, 'AJP/20250118/0004', 'Dewi Lestari', 1300000.00, 'Tidak', '2025-03-18', 'Belum Bayar'),
(16, 'AJP/20250119/0005', 'Rizky Maulana', 1250000.00, 'Ya', '2025-01-19', 'Telah Lunas'),
(17, 'AJP/20250120/0006', 'Nina Hartati', 1450000.00, 'Tidak', '2025-03-20', 'Belum Bayar'),
(18, 'AJP/20250121/0007', 'Fajar Pratama', 1750000.00, 'Ya', '2025-01-21', 'Telah Lunas'),
(19, 'AJP/20250122/0008', 'Rahmat Hidayat', 1350000.00, 'Tidak', '2025-03-22', 'Belum Bayar'),
(20, 'AJP/20250123/0009', 'Lina Kusuma', 1500000.00, 'Ya', '2025-01-23', 'Telah Lunas'),
(21, 'AJP/20250124/0010', 'Arief Kurniawan', 1550000.00, 'Tidak', '2025-01-24', 'Belum Bayar'),
(22, 'AJP/20250125/0011', 'Dina Permata', 1400000.00, 'Ya', '2025-02-25', 'Telah Lunas'),
(23, 'AJP/20250126/0012', 'Joko Susilo', 1600000.00, 'Tidak', '2025-01-26', 'Belum Bayar'),
(24, 'AJP/20250127/0013', 'Tina Wijaya', 1650000.00, 'Ya', '2025-02-27', 'Telah Lunas'),
(25, 'AJP/20250128/0014', 'Herman Saputra', 1300000.00, 'Tidak', '2025-02-28', 'Belum Bayar'),
(26, 'AJP/20250129/0015', 'Lisa Andriani', 1700000.00, 'Ya', '2025-01-29', 'Telah Lunas'),
(27, 'AJP/20250420/0001', 'Erpian', 1200000.00, 'Ya', '2025-04-20', 'Telah Lunas'),
(28, 'AJP/20250428/0001', 'Wanto', 800000.00, 'Ya', '2025-04-28', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi` int(11) NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `kendaraan` varchar(30) NOT NULL,
  `no_polisi` text NOT NULL,
  `biaya` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi`, `nomor_transaksi`, `dari`, `tujuan`, `kendaraan`, `no_polisi`, `biaya`) VALUES
(12, 'AJP/20250115/0001', 'Tangerang', 'Bekasi', 'Truk Derek', 'F 9101 EF', 600000.00),
(12, 'AJP/20250115/0001', 'Bekasi', 'Karawang', 'Mobil Derek', 'G 1213 GH', 600000.00),
(13, 'AJP/20250116/0002', 'Jakarta', 'Depok', 'Motor Derek', 'H 1415 IJ', 700000.00),
(13, 'AJP/20250116/0002', 'Depok', 'Bogor', 'Truk Derek', 'J 1617 KL', 700000.00),
(14, 'AJP/20250117/0003', 'Bandung', 'Semarang', 'Mobil Derek', 'K 1819 MN', 800000.00),
(14, 'AJP/20250117/0003', 'Semarang', 'Yogyakarta', 'Truk Derek', 'L 2021 OP', 800000.00),
(15, 'AJP/20250118/0004', 'Surabaya', 'Malang', 'Motor Derek', 'M 2223 QR', 650000.00),
(15, 'AJP/20250118/0004', 'Malang', 'Kediri', 'Mobil Derek', 'N 2425 ST', 650000.00),
(16, 'AJP/20250119/0005', 'Jakarta', 'Bandung', 'Truk Derek', 'B 1234 XY', 625000.00),
(16, 'AJP/20250119/0005', 'Bandung', 'Cirebon', 'Mobil Derek', 'D 5678 YZ', 625000.00),
(17, 'AJP/20250120/0006', 'Surabaya', 'Malang', 'Motor Derek', 'L 9101 AB', 725000.00),
(17, 'AJP/20250120/0006', 'Malang', 'Banyuwangi', 'Mobil Derek', 'N 1213 CD', 725000.00),
(18, 'AJP/20250121/0007', 'Semarang', 'Solo', 'Truk Derek', 'H 1415 EF', 875000.00),
(18, 'AJP/20250121/0007', 'Solo', 'Yogyakarta', 'Mobil Derek', 'AB 1617 GH', 875000.00),
(19, 'AJP/20250122/0008', 'Medan', 'Pekanbaru', 'Motor Derek', 'BK 1819 IJ', 675000.00),
(19, 'AJP/20250122/0008', 'Pekanbaru', 'Padang', 'Truk Derek', 'BA 2021 KL', 675000.00),
(20, 'AJP/20250123/0009', 'Bali', 'Lombok', 'Mobil Derek', 'DK 2223 MN', 750000.00),
(20, 'AJP/20250123/0009', 'Lombok', 'Sumbawa', 'Truk Derek', 'DR 2425 OP', 750000.00),
(21, 'AJP/20250124/0010', 'Jakarta', 'Bekasi', 'Truk Derek', 'B 1111 AA', 775000.00),
(21, 'AJP/20250124/0010', 'Bekasi', 'Karawang', 'Mobil Derek', 'D 2222 BB', 775000.00),
(22, 'AJP/20250125/0011', 'Surabaya', 'Mojokerto', 'Mobil Derek', 'L 3333 CC', 700000.00),
(22, 'AJP/20250125/0011', 'Mojokerto', 'Jombang', 'Truk Derek', 'N 4444 DD', 700000.00),
(23, 'AJP/20250126/0012', 'Bandung', 'Cimahi', 'Motor Derek', 'F 5555 EE', 800000.00),
(23, 'AJP/20250126/0012', 'Cimahi', 'Garut', 'Mobil Derek', 'Z 6666 FF', 800000.00),
(24, 'AJP/20250127/0013', 'Semarang', 'Pekalongan', 'Truk Derek', 'H 7777 GG', 825000.00),
(24, 'AJP/20250127/0013', 'Pekalongan', 'Tegal', 'Mobil Derek', 'K 8888 HH', 825000.00),
(25, 'AJP/20250128/0014', 'Denpasar', 'Gianyar', 'Motor Derek', 'DK 9999 II', 650000.00),
(25, 'AJP/20250128/0014', 'Gianyar', 'Karangasem', 'Mobil Derek', 'DR 1010 JJ', 650000.00),
(26, 'AJP/20250129/0015', 'Medan', 'Binjai', 'Truk Derek', 'BK 1112 KK', 850000.00),
(26, 'AJP/20250129/0015', 'Binjai', 'Tebing Tinggi', 'Mobil Derek', 'BA 1314 LL', 850000.00),
(27, 'AJP/20250420/0001', 'Subang', 'VGH', 'Xenia', 'B 2423 FSD', 600000.00),
(27, 'AJP/20250420/0001', 'Karawang', 'VGH', 'Avanza', 'B 4235 FSD', 600000.00),
(28, 'AJP/20250428/0001', 'Cirebon', 'Pemalang', 'L300', 'B 2352 FSA', 800000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Nasywa Aurellia Elysia Putri', 'wawa', 'wawa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `nomor_transaksi` (`nomor_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
