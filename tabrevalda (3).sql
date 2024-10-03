-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 05:58 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_lainlain`
--

INSERT INTO `biaya_lainlain` (`kode_biaya_lainlain`, `nama_biaya_lainlain`, `satuan_biaya_lainlain`, `harga_biaya_lainlain`, `tanggal_biaya_lainlain`, `jumlah_biaya_lainlain`, `bukti_biaya_lainlain`, `cek_status_biaya_lainlain`, `created_at`, `updated_at`) VALUES
('sSq-12', 'weqw', 12, 12313131, '2024-03-12', 123, 0x706963747572652e6a7067, 0, '2024-03-14 04:10:15', '2024-03-14 04:12:47'),
('VTU-22', 'HFE', 2, 13000, '2024-03-04', 22, 0x617373657473207369732e737667, 0, '2024-03-05 19:01:54', '2024-03-05 12:19:30'),
('VVT-212', 'weqw', 123, 13121324, '2024-03-20', 2, 0x617373657473207369732e737667, 0, '2024-03-05 12:10:20', '2024-03-14 04:09:42'),
('VVT-2122222', 'weqw', 1231, 1231, '2024-03-07', 12, 0x706f737465726b7520686f7265206d6172692e6a7067, 1, '2024-03-14 04:05:39', '2024-03-14 04:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_operational_non_budgeting`
--

CREATE TABLE `biaya_operational_non_budgeting` (
  `kode_operational_non_budgeting` varchar(255) NOT NULL,
  `nama_operational_non_budgeting` varchar(255) DEFAULT NULL,
  `keterangan_operational_non_budgeting` varchar(255) DEFAULT NULL,
  `tanggal_operational_non_budgeting` date DEFAULT NULL,
  `biaya_operational_non_budgeting` int(11) DEFAULT NULL,
  `cek_status_operational_non_budgeting` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_operational_non_budgeting`
--

INSERT INTO `biaya_operational_non_budgeting` (`kode_operational_non_budgeting`, `nama_operational_non_budgeting`, `keterangan_operational_non_budgeting`, `tanggal_operational_non_budgeting`, `biaya_operational_non_budgeting`, `cek_status_operational_non_budgeting`, `created_at`, `updated_at`) VALUES
('ICBP_BONB_3', 'Biaya', 'sdqw', '2024-08-22', 120000, 1, '2024-08-29 03:41:47', '2024-08-29 03:41:47'),
('VTI-212', 'test', 'test', '2024-03-05', 120000, 0, '2024-03-06 05:30:20', '2024-03-07 03:40:26'),
('VVIR-212', 'barang 121', 'untuk keperluan kerja 121', '2024-03-10', 1200021, 0, '2024-03-06 12:18:03', '2024-03-07 03:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pribadi`
--

CREATE TABLE `biaya_pribadi` (
  `kode_biaya_pribadi` varchar(255) NOT NULL,
  `nama_biaya_pribadi` varchar(255) DEFAULT NULL,
  `satuan_biaya_pribadi` int(11) DEFAULT NULL,
  `harga_biaya_pribadi` int(11) DEFAULT NULL,
  `tanggal_biaya_pribadi` date DEFAULT NULL,
  `jumlah_biaya_pribadi` int(255) DEFAULT NULL,
  `bukti_biaya_pribadi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cek_status_biaya_pribadi` int(11) DEFAULT NULL,
  `cek_approval_biaya_pribadi` int(11) DEFAULT NULL,
  `approved_by_biaya_pribadi` varchar(255) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_pribadi`
--

INSERT INTO `biaya_pribadi` (`kode_biaya_pribadi`, `nama_biaya_pribadi`, `satuan_biaya_pribadi`, `harga_biaya_pribadi`, `tanggal_biaya_pribadi`, `jumlah_biaya_pribadi`, `bukti_biaya_pribadi`, `created_at`, `updated_at`, `cek_status_biaya_pribadi`, `cek_approval_biaya_pribadi`, `approved_by_biaya_pribadi`, `approved_at`) VALUES
('ad-123', 'se adanya', 120000, 40000, '2024-02-15', 12, 'logo SIS.jpg', '2024-02-28 21:48:46', '2024-04-23 20:14:51', 1, 0, NULL, '2024-04-24 10:14:51'),
('CRTI', 'FOYA FOYA', 1200000000, 1200000000, NULL, 12, 'logo SIS.jpg', '2024-04-23 20:19:53', '2024-04-23 20:19:53', 2, NULL, NULL, NULL),
('CRTI12', 'FOYA FOYA', 1200000000, 1200000000, NULL, 12, 'logo SIS.jpg', '2024-04-23 20:22:18', '2024-04-23 20:22:27', 1, 1, NULL, '2024-04-24 10:22:27'),
('erwe', '52352', 3412341, 4134134, '2024-02-12', 3333, 'logo SIS.jpg', '2024-02-28 21:19:31', '2024-02-28 21:44:06', 0, 2, NULL, '2024-04-24 10:10:44'),
('INDF_BPR_7', 'sd', 12, 12000, '2024-09-18', 12, 'epic games.png', '2024-09-20 20:12:10', '2024-09-20 20:12:22', 1, 1, NULL, '2024-09-21 10:12:22'),
('VIT', 'WW', 1231, 111111, '2024-03-12', 1231, 'posterku hore mari.jpg', '2024-03-12 22:30:50', '2024-04-23 20:14:48', 1, 1, NULL, '2024-04-24 10:14:48'),
('WW-123', 'foya foya', 1, 12000, '2024-02-07', 2, NULL, '2024-02-29 03:17:56', '2024-02-28 21:44:00', 0, 2, NULL, '2024-04-24 10:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `detail_biaya_operational_proyek`
--

CREATE TABLE `detail_biaya_operational_proyek` (
  `kode_biaya_detail_operational_proyek` varchar(255) NOT NULL,
  `nama_biaya_detail_biaya_operational_proyek` varchar(255) DEFAULT NULL,
  `jumlah_detail_biaya_operational_proyek` int(11) DEFAULT NULL,
  `harga_detail_biaya_operational_proyek` int(11) DEFAULT NULL,
  `bukti_detail_biaya_operational_proyek` varchar(255) DEFAULT NULL,
  `cek_status_detail_biaya_operational_proyek` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cek_approval_detail_biaya_operational_proyek` int(11) DEFAULT NULL,
  `approved_by_detail_biaya_operational_proyek` varchar(255) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `fk_header_biaya_operational` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_biaya_operational_proyek`
--

INSERT INTO `detail_biaya_operational_proyek` (`kode_biaya_detail_operational_proyek`, `nama_biaya_detail_biaya_operational_proyek`, `jumlah_detail_biaya_operational_proyek`, `harga_detail_biaya_operational_proyek`, `bukti_detail_biaya_operational_proyek`, `cek_status_detail_biaya_operational_proyek`, `created_at`, `updated_at`, `cek_approval_detail_biaya_operational_proyek`, `approved_by_detail_biaya_operational_proyek`, `approved_at`, `fk_header_biaya_operational`) VALUES
('1', 'dasdaw', 2, 212, '1231', 1, '2024-03-20 09:59:16', '2024-09-21 03:15:19', 1, NULL, '2024-09-21 10:15:19', 'BBBP-12'),
('2', '1231223', 12312, 111112, 'bep.png', 0, '2024-03-20 03:46:55', '2024-03-20 04:17:05', NULL, NULL, NULL, ''),
('3', 'asdwq', 12141, 231214, 'logo SIS.jpg', 1, '2024-03-20 03:50:03', '2024-04-24 02:34:20', 0, '', '2024-04-24 09:34:20', ''),
('4', 'qweq', 12312, 123141, 'bep.png', 1, '2024-03-20 04:18:06', '2024-04-24 09:23:47', 1, NULL, '2024-04-24 09:23:47', ''),
('5', 'sadaw', 123, 123, '22', 1, '2024-05-02 13:17:36', '2024-05-02 13:17:36', 1, '1', '2024-05-15 13:17:05', ''),
('ICBP_BOP_3_detail_1', 'reeee', 1231, 1313, 'epic games.png', 1, '2024-09-11 05:40:50', '2024-09-11 05:40:50', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_10', 'weq', 123, 1231, 'epic games.png', 0, '2024-09-11 06:00:14', '2024-09-11 06:01:57', 1, NULL, '2024-09-11 13:01:57', 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_11', 'reee', 12, 1200000000, 'epic games.png', 1, '2024-09-20 05:48:41', '2024-09-20 05:48:41', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_12', 'www', 12000, 12300000, 'epic games.png', 1, '2024-09-20 06:12:07', '2024-09-20 06:12:43', 1, NULL, '2024-09-20 13:12:43', 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_2', 'sda', 123, 1313131, 'epic games.png', 1, '2024-09-11 05:42:44', '2024-09-11 05:42:44', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_3', 'sda', 123, 1313131, 'epic games.png', 1, '2024-09-11 05:46:04', '2024-09-11 05:46:04', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_4', 'sdadw', 123, 13214, 'epic games.png', 1, '2024-09-11 05:46:56', '2024-09-11 05:46:56', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_5', 'sdaa', 231, 12312, 'epic games.png', 1, '2024-09-11 05:48:37', '2024-09-11 05:48:37', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_6', 'asdadwq', 1231, 25000, 'epic games.png', 1, '2024-09-11 05:52:09', '2024-09-11 05:52:09', 1, NULL, NULL, 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_7', 'ko', 1231999, 123123999, 'epic games.png', 0, '2024-09-11 05:54:38', '2024-09-11 07:12:10', 1, NULL, '2024-09-11 14:12:10', 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_8', 'sdasd', 1223, 1231, 'epic games.png', 0, '2024-09-11 05:57:30', '2024-09-11 06:05:34', 1, NULL, '2024-09-11 13:05:34', 'ICBP_BOP_3'),
('ICBP_BOP_3_detail_9', 'sda', 123, 123, 'epic games.png', 0, '2024-09-11 05:58:34', '2024-09-11 06:05:29', 1, NULL, '2024-09-11 13:05:29', 'ICBP_BOP_3'),
('ICBP_BOP_4_detail_1', 'reee', 12, 120000000, 'epic games.png', 1, '2024-09-20 06:30:43', '2024-09-20 06:30:43', 1, NULL, NULL, 'ICBP_BOP_4');

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
-- Table structure for table `header_biaya_operational_proyek`
--

CREATE TABLE `header_biaya_operational_proyek` (
  `kode_biaya_operational_proyek` varchar(255) NOT NULL,
  `nama_biaya_operational_proyek` varchar(255) DEFAULT NULL,
  `budget_biaya_operational_proyek` int(255) DEFAULT NULL,
  `keterangan_biaya_operational_proyek` varchar(255) DEFAULT NULL,
  `tanggal_pelaksanaan_biaya_operational_proyek` date DEFAULT NULL,
  `cek_status_header_biaya_operational_proyek` int(11) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_biaya_operational_proyek`
--

INSERT INTO `header_biaya_operational_proyek` (`kode_biaya_operational_proyek`, `nama_biaya_operational_proyek`, `budget_biaya_operational_proyek`, `keterangan_biaya_operational_proyek`, `tanggal_pelaksanaan_biaya_operational_proyek`, `cek_status_header_biaya_operational_proyek`, `created_at`, `updated_at`) VALUES
('BBBP-12', 'Kereta cepat', 120000000, '-', '2024-03-10', 0, '2024-03-13', '2024-03-13 04:42:12'),
('ICBP_BOP_3', 'Hambalang', 120000000, 'mangkrak', '2024-09-11', 1, '2024-09-11', '2024-09-11 05:11:21'),
('ICBP_BOP_4', 'lowkey', 1500000000, '-', '2024-09-19', 1, '2024-09-20', '2024-09-20 06:25:57'),
('VVIT-21', 'hambalang', 120000000, 'mangkrak', '2024-03-01', 1, '2024-03-13', '2024-03-13 10:58:52');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `nomor_telp_pegawai` varchar(255) DEFAULT NULL,
  `jabatan_pegawai` varchar(255) DEFAULT NULL,
  `cek_status_pegawai` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`username`, `password`, `nama_pegawai`, `role`, `nomor_telp_pegawai`, `jabatan_pegawai`, `cek_status_pegawai`, `created_at`, `updated_at`, `kode_perusahaan`) VALUES
('ade', '$2y$10$vn9KCDRhNIinNIq/88OZte/TZ6gPPxpR21F/us0Xdxbln8uXkZm5y', 'dad', 'pencatattransaksi', '14241', 'weq', 1, '2024-03-26 22:49:15', '2024-08-13 04:22:48', 'INDF'),
('adi', '123', 'Adi', 'approval', '9120412030', 'Manager', 0, '2024-03-26 22:47:32', '2024-03-26 23:07:46', ''),
('alex', '$2y$10$deCi1w80Ad3J2mK.WSvXPuiR1Nf5Bxye1QxUYE8csjX6cT4Jwb9xe', 'alex', 'pencatattransaksi', '01293123', 'weeqwe', 1, '2024-08-13 05:42:43', '2024-08-13 05:47:41', 'INDF'),
('alexey', '$2y$10$j6SmjfdOd/pGNC06soYoZufd9b1zJHzRUIDJ98fZN8mmWuUeHwySu', 'alexey', 'admin', '123123', 'manager', 1, '2024-09-20 06:51:43', '2024-09-20 06:51:43', 'INDF'),
('bre', '$2y$10$9sQjWKYFF25lFylYbePh6eYBxTZR6.yKShTAPgi.JTu2qCokCFgHW', 'brevalda', 'pencatattransaksi', '01923123', 'manager', 1, '2024-03-27 04:51:19', '2024-08-13 04:48:18', 'ICBP'),
('stefanus', '$2y$10$7kzW0UaJiBVUqJvwpj7vGOVluoUmCObh1sN6tWSx3RU50NEZWInEu', 'stefanus sanjaya', 'pencatattransaksi', '08124124123', 'manager', 0, '2024-08-13 04:23:38', '2024-08-13 04:24:00', 'INDF'),
('stefanus12', '$2y$10$3pX4kqBpjFOlb83QxeCAlepOtKFcP032D94T8KGSeJWrJGfwpp4X.', 'stefanus', 'approval', '3124124', 'manager', 1, '2024-08-13 05:50:22', '2024-08-13 05:50:22', 'INDF');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai_gaji`
--

INSERT INTO `pegawai_gaji` (`id_pegawai_gaji`, `nomor_ktp_pegawai_gaji`, `nama_pegawai_gaji`, `jumlah_kehadiran_pegawai_gaji`, `rate_pegawai_gaji`, `tambahan_lainlain_pegawai_gaji`, `keterangan_pegawai_gaji`, `total_pegawai_gaji`, `jabatan_pegawai_gaji`, `nomor_rekening_pegawai_gaji`, `nama_bank_pegawai_gaji`, `created_at`, `updated_at`, `cek_aktif_gajipegawai`) VALUES
('5654rte', 'sss', 'sss', 2131, 2131, 2131, 'sss', 2131, 'sss', 'sss', 'sss', '2023-11-08 10:53:53', '2023-11-08 10:53:53', 1),
('ADN-222', '1412412', 'brevalda', 120, 2400000, 200000, 'lembur 20 kali', 60000000, 'BRI', 'manager', '34351341231', '2023-12-14 03:42:50', '2023-12-13 20:42:50', 1),
('ADN-222421', 'wwww', 'wwww', 1231, 1231, 1231, 'weqwe', 123, 'eqwe', '142412', 'BCA', '2023-11-08 10:53:20', '2023-11-08 03:53:20', 0),
('ICBP_GJP_11', '12412', 'dqwd', 123, 32222, 31231, '1231', 1241231, 'sdqw', '1341314', '1231231', '2024-08-28 20:18:28', '2024-08-28 20:18:28', 1),
('ICBP_GJP_7', 'sss', 'sss', 2131, 2131, 2131, 'sss', 2131, 'sss', 'sss', 'sss', '2024-08-12 22:38:28', '2024-08-12 22:38:28', 1),
('ICBP_GJP_8', 'sss', 'sss', 2131, 2131, 2131, 'sss', 2131, 'sss', 'sss', 'sss', '2024-08-12 22:40:23', '2024-08-12 22:40:23', 1),
('ICBP_GJP_9', '231241', 'sdqw', 1231, 1231, 231231, '12312', 1231, 'eqwes', '1231231', 'qweqweq', '2024-08-12 22:41:58', '2024-08-12 22:41:58', 1),
('INDF_GJP_10', '12312', 'wwwww', 1231, 123123, 1231, '1231', 121241, '123123', '31213', 'bca', '2024-08-12 22:51:18', '2024-08-12 22:51:18', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pencatatan_biaya_untuk_masa_depan`
--

INSERT INTO `pencatatan_biaya_untuk_masa_depan` (`kode_pencatatan_biaya_masa_depan`, `nama_pencatatan_biaya_masa_depan`, `jumlah_pencatatan_biaya_masa_depan`, `harga_pencatatan_biaya_masa_depan`, `keterangan_pencatatan_biaya_masa_depan`, `created_at`, `updated_at`, `cek_status_pencatatan_biaya_masa_depan`) VALUES
('dafw-1', 'dart', 4, 456777, 'sdawaw', '2024-02-22 05:24:54', '2024-02-22 05:24:54', 1),
('ICBP_PCTBUMD_4', 'PT sssss', 1231, 20000000, '231231', '2024-08-28 20:27:43', '2024-08-28 20:27:43', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `kode_perusahaan` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `nomor_telp_perusahaan` varchar(255) NOT NULL,
  `cek_status_perusahaan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`kode_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `nomor_telp_perusahaan`, `cek_status_perusahaan`, `created_at`, `updated_at`) VALUES
('ICBP', 'Indofood cbp Sukses Makmur', 'jl. lorem lipsum', '01298312212', 1, '2024-04-18 10:20:07', '2024-08-13 10:59:02'),
('INDF', 'indofood sukses makmur', 'Jl. jakarta raya', '098819291', 1, '2024-04-18 03:36:34', '2024-04-18 04:34:30');

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
-- Indexes for table `biaya_lainlain`
--
ALTER TABLE `biaya_lainlain`
  ADD PRIMARY KEY (`kode_biaya_lainlain`);

--
-- Indexes for table `biaya_operational_non_budgeting`
--
ALTER TABLE `biaya_operational_non_budgeting`
  ADD PRIMARY KEY (`kode_operational_non_budgeting`);

--
-- Indexes for table `biaya_pribadi`
--
ALTER TABLE `biaya_pribadi`
  ADD PRIMARY KEY (`kode_biaya_pribadi`);

--
-- Indexes for table `detail_biaya_operational_proyek`
--
ALTER TABLE `detail_biaya_operational_proyek`
  ADD PRIMARY KEY (`kode_biaya_detail_operational_proyek`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `header_biaya_operational_proyek`
--
ALTER TABLE `header_biaya_operational_proyek`
  ADD PRIMARY KEY (`kode_biaya_operational_proyek`);

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
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`kode_perusahaan`);

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
