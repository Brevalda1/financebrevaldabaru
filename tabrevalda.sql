-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 01:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabrevalda`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya_lainlain`
--

CREATE TABLE `biaya_lainlain` (
  `kode_biaya_lainlain` varchar(255) NOT NULL,
  `nama_biaya_lainlain` varchar(255) NOT NULL,
  `satuan_biaya_lainlain` int(11) DEFAULT NULL,
  `harga_biaya_lainlain` int(11) DEFAULT NULL,
  `tanggal_biaya_lainlain` date DEFAULT NULL,
  `jumlah_biaya_lainlain` int(11) DEFAULT NULL,
  `bukti_biaya_lainlain` blob DEFAULT NULL,
  `cek_status_biaya_lainlain` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya_lainlain`
--

INSERT INTO `biaya_lainlain` (`kode_biaya_lainlain`, `nama_biaya_lainlain`, `satuan_biaya_lainlain`, `harga_biaya_lainlain`, `tanggal_biaya_lainlain`, `jumlah_biaya_lainlain`, `bukti_biaya_lainlain`, `cek_status_biaya_lainlain`, `created_at`, `updated_at`) VALUES
('VTU-22', 'HFE', 2, 13000, '2024-03-04', 22, 0x617373657473207369732e737667, 0, '2024-03-05 19:01:54', '2024-03-05 12:19:30'),
('VVT-212', 'weqw', 123, 13121324, '2024-03-20', 2, 0x617373657473207369732e737667, 1, '2024-03-05 12:10:20', '2024-03-05 12:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pribadi`
--

CREATE TABLE `biaya_pribadi` (
  `kode_biaya_pribadi` varchar(255) NOT NULL,
  `nama_biaya_pribadi` varchar(255) NOT NULL,
  `satuan_biaya_pribadi` int(11) NOT NULL,
  `harga_biaya_pribadi` int(11) NOT NULL,
  `tanggal_biaya_pribadi` date NOT NULL,
  `jumlah_biaya_pribadi` int(255) NOT NULL,
  `bukti_biaya_pribadi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cek_status_biaya_pribadi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya_pribadi`
--

INSERT INTO `biaya_pribadi` (`kode_biaya_pribadi`, `nama_biaya_pribadi`, `satuan_biaya_pribadi`, `harga_biaya_pribadi`, `tanggal_biaya_pribadi`, `jumlah_biaya_pribadi`, `bukti_biaya_pribadi`, `created_at`, `updated_at`, `cek_status_biaya_pribadi`) VALUES
('ad-123', 'se adanya', 120000, 40000, '2024-02-15', 12, 'logo SIS.jpg', '2024-02-28 21:48:46', '2024-02-28 21:48:46', 1),
('erwe', '52352', 3412341, 4134134, '2024-02-12', 3333, 'logo SIS.jpg', '2024-02-28 21:19:31', '2024-02-28 21:44:06', 0),
('WW-123', 'foya foya', 1, 12000, '2024-02-07', 2, NULL, '2024-02-29 03:17:56', '2024-02-28 21:44:00', 0);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `nomor_telp_pegawai` varchar(255) DEFAULT NULL,
  `jabatan_pegawai` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`username`, `password`, `nama_pegawai`, `role`, `nomor_telp_pegawai`, `jabatan_pegawai`, `created_at`, `updated_at`) VALUES
('bre', '$2y$10$RDj2s5jpR/V3pKZ2VA2FX./aVHIo5qeDpBe9Ns0OmHEZKTM/LLl9S', NULL, NULL, NULL, NULL, '2023-10-04 22:21:53', '2023-10-04 22:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_gaji`
--

CREATE TABLE `pegawai_gaji` (
  `id_pegawai_gaji` varchar(255) NOT NULL,
  `nomor_ktp_pegawai_gaji` varchar(255) DEFAULT NULL,
  `nama_pegawai_gaji` varchar(255) DEFAULT NULL,
  `jumlah_kehadiran_pegawai_gaji` int(11) DEFAULT NULL,
  `rate_pegawai_gaji` int(11) DEFAULT NULL,
  `tambahan_lainlain_pegawai_gaji` int(11) DEFAULT NULL,
  `keterangan_pegawai_gaji` varchar(255) DEFAULT NULL,
  `total_pegawai_gaji` int(11) DEFAULT NULL,
  `jabatan_pegawai_gaji` varchar(255) DEFAULT NULL,
  `nomor_rekening_pegawai_gaji` varchar(255) DEFAULT NULL,
  `nama_bank_pegawai_gaji` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cek_aktif_gajipegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_gaji`
--

INSERT INTO `pegawai_gaji` (`id_pegawai_gaji`, `nomor_ktp_pegawai_gaji`, `nama_pegawai_gaji`, `jumlah_kehadiran_pegawai_gaji`, `rate_pegawai_gaji`, `tambahan_lainlain_pegawai_gaji`, `keterangan_pegawai_gaji`, `total_pegawai_gaji`, `jabatan_pegawai_gaji`, `nomor_rekening_pegawai_gaji`, `nama_bank_pegawai_gaji`, `created_at`, `updated_at`, `cek_aktif_gajipegawai`) VALUES
('5654rte', 'sss', 'sss', 2131, 2131, 2131, 'sss', 2131, 'sss', 'sss', 'sss', '2023-11-08 10:53:53', '2023-11-08 10:53:53', 1),
('ADN-222', '1412412', 'brevalda', 120, 2400000, 200000, 'lembur 20 kali', 60000000, 'BRI', 'manager', '34351341231', '2023-12-14 03:42:50', '2023-12-13 20:42:50', 1),
('ADN-222421', 'wwww', 'wwww', 1231, 1231, 1231, 'weqwe', 123, 'eqwe', '142412', 'BCA', '2023-11-08 10:53:20', '2023-11-08 03:53:20', 0),
('rqwrq', '2weqweqw', 'rqwrqw', 12412, 1241, 12142, 'erwe', 21142, 'rqr', '12142412', 'eweqweq', '2023-11-01 23:13:41', '2023-11-01 23:13:41', 0),
('yyyyy', 'sss', 'sss', 2131, 2131, 2131, 'sss', 2131, 'sss', 'sss', 'sss', '2023-10-11 22:40:47', '2023-10-11 22:40:47', 0),
('yyyyysdqweq', 'sss', 'sss', 2131, 2131, 2131, 'sss', 2131, 'sss', 'sss', 'sss', '2023-10-11 22:41:59', '2023-10-11 22:41:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pencatatan_biaya_untuk_masa_depan`
--

CREATE TABLE `pencatatan_biaya_untuk_masa_depan` (
  `kode_pencatatan_biaya_masa_depan` varchar(255) NOT NULL,
  `nama_pencatatan_biaya_masa_depan` varchar(255) DEFAULT NULL,
  `jumlah_pencatatan_biaya_masa_depan` int(11) NOT NULL,
  `harga_pencatatan_biaya_masa_depan` int(11) NOT NULL,
  `keterangan_pencatatan_biaya_masa_depan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cek_status_pencatatan_biaya_masa_depan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencatatan_biaya_untuk_masa_depan`
--

INSERT INTO `pencatatan_biaya_untuk_masa_depan` (`kode_pencatatan_biaya_masa_depan`, `nama_pencatatan_biaya_masa_depan`, `jumlah_pencatatan_biaya_masa_depan`, `harga_pencatatan_biaya_masa_depan`, `keterangan_pencatatan_biaya_masa_depan`, `created_at`, `updated_at`, `cek_status_pencatatan_biaya_masa_depan`) VALUES
('dafw-1', 'dart', 4, 456777, 'sdawaw', '2024-02-22 05:24:54', '2024-02-22 05:24:54', 1),
('sda', 'Hagra-66', 412, 1231323, '12fwefw', '2024-02-22 05:19:37', '2024-02-21 22:19:37', 1),
('VVA-1', 'sda', 423, 231, 'sdqwrqs', '2024-02-22 05:24:00', '2024-02-21 22:24:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pencatatan_rekening_partner`
--

CREATE TABLE `pencatatan_rekening_partner` (
  `kode_pencatatan_rekening_partner` varchar(255) NOT NULL,
  `nama_perusahaan_partner` varchar(255) DEFAULT NULL,
  `nomor_rekening_perusahaan_partner` varchar(255) DEFAULT NULL,
  `kode_transfer_rekening_perusahaan_partner` varchar(255) DEFAULT NULL,
  `nama_bank_perusahaan_partner` varchar(255) DEFAULT NULL,
  `keterangan_pencatatan_rekening_partner` varchar(255) DEFAULT NULL,
  `cek_status_pencatatanrekening` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencatatan_rekening_partner`
--

INSERT INTO `pencatatan_rekening_partner` (`kode_pencatatan_rekening_partner`, `nama_perusahaan_partner`, `nomor_rekening_perusahaan_partner`, `kode_transfer_rekening_perusahaan_partner`, `nama_bank_perusahaan_partner`, `keterangan_pencatatan_rekening_partner`, `cek_status_pencatatanrekening`, `created_at`, `updated_at`) VALUES
('VNT-1', 'pt mega mendung banget', '312413512', '081', 'BRI', 'tidak ada', 1, NULL, '2023-12-13 20:43:07'),
('VVT-12', 'PT.karya darma', '142415', '081', 'BNI', 'test', 1, '2023-11-29 21:27:23', '2024-01-17 18:40:06'),
('VVT-1211', 'PT.karya', '142415', '081', 'BNI', 'test', 1, '2023-12-07 18:32:40', '2024-01-17 18:40:23'),
('vvvvv-123', 'PT.karya darma', '412412', 'wqwrwq', 'JAGO', 'TEs', 0, '2024-01-17 18:38:57', '2024-01-17 18:40:57');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya_lainlain`
--
ALTER TABLE `biaya_lainlain`
  ADD PRIMARY KEY (`kode_biaya_lainlain`);

--
-- Indexes for table `biaya_pribadi`
--
ALTER TABLE `biaya_pribadi`
  ADD PRIMARY KEY (`kode_biaya_pribadi`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pegawai_gaji`
--
ALTER TABLE `pegawai_gaji`
  ADD PRIMARY KEY (`id_pegawai_gaji`);

--
-- Indexes for table `pencatatan_biaya_untuk_masa_depan`
--
ALTER TABLE `pencatatan_biaya_untuk_masa_depan`
  ADD PRIMARY KEY (`kode_pencatatan_biaya_masa_depan`);

--
-- Indexes for table `pencatatan_rekening_partner`
--
ALTER TABLE `pencatatan_rekening_partner`
  ADD PRIMARY KEY (`kode_pencatatan_rekening_partner`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
