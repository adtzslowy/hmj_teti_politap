-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2025 at 07:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmj_teti_politap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `role` enum('Operator','God') NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `nim`, `role`, `foto_profil`, `created_at`, `updated_at`) VALUES
('07923881-de2e-4cd5-a5df-da3c364e9863', 'ADITYA PRASETYO', 'prasetyoaditya257@gmail.com', '$2y$12$1fRcD7XQqZwVkvmoJoc6Ne9TvLhUueP0nR2Iy2ppM6.rQiSbmvFka', '3042023032', 'God', 'profile_admin/FKaAENghc1KHYPZHMbezA8uiYTS1dmf0kWdi6B4E.jpg', '2025-10-31 02:13:58', '2025-10-30 19:13:58'),
('ac4afc1a-56ef-4ce1-b425-76bab8fa64aa', 'Arfy', 'arfy@gmail.com', '$2y$12$P//7zF34z3JVN4tuHd8H5OFPO52mkvOR6CYPwKo4sK0UArqijNk/K', '3042023001', 'Operator', 'default.jpg', '2025-11-08 23:38:58', '2025-11-08 23:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` char(36) NOT NULL,
  `mahasiswa_id` char(36) NOT NULL,
  `divisi_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_admin` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `id_admin`, `nama_dokumen`, `deskripsi`, `file`, `created_at`, `updated_at`) VALUES
('25e35b95-734d-4086-b1d4-9fa141e2e9c8', '07923881-de2e-4cd5-a5df-da3c364e9863', 'AMBATUKAM', '<p>d</p>', '1762740557_D0pBA6TnBb.pdf', '2025-11-09 19:09:17', '2025-11-09 19:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` char(36) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `dokumentasi` varchar(255) NOT NULL,
  `tanggal_post` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `dokumentasi`, `tanggal_post`, `created_at`, `updated_at`) VALUES
('7a0794f6-7515-444d-8f4d-3a664eb69178', 'Pengusaha Ngadu Ke Purbaya Pemeriksaan Barang di Bea Cukai Sampai 34 Hari', '<p>Pelapor merasa proses pemeriksaan fisik barang tidak wajar karena memakan waktu hingga 34 hari. Ia juga mengaku didenda terus menerus dengan alasan yang tidak masuk akal, misalnya terkait tudingan bahwa dirinya menurunkan nilai barang pada invoice atau under invoicing. Oknum Bea Cukai juga meminta bukti yang tidak masuk akal sehingga sulit dipenuhi.<br />\r\n<br />\r\n&quot;Saya dikenakan notul yang berisi denda. Padahal saya tidak under invoicing dan telah melakukan impor barang serupa bertahun-tahun. Ketika diminta alasan, alasannya tidak masuk akal, misal meminta bukti negosiasi, padahal bukti-bukti itu sudah disediakan dengan lengkap. Ini terjadi hampir untuk semua kegiatan impor saya, kena denda terus,&quot; ujar Purbaya membacakan keluhan tersebut.</p>', 'dokumentasi_berita/hckHUcxcwS0vg5LsEVEtKGNld83hQCbcCCluMavb.jpg', '2025-10-18', '2025-10-17 18:58:36', '2025-10-17 18:58:36'),
('d3c01d09-7855-47d3-b2c7-9a17ebde282d', 'Bahlil Respon BBM Shell-BP Kosong: Kuota Impor 110%. Semuanya Kita Kasih!', '<p>Jakarta - Badan usaha swasta seperti Shell, Exxon, hingga BP AKR mendatangi kantor Kementerian Investasi dan Hilirisasi/BKPM pada Selasa (7/10) lalu. Kedatangan mereka membahas kepastian investasi di tengah kelangkaan BBM di SPBU swasta.<br />\r\nMenteri Energi dan Sumber Daya Mineral (ESDM) Bahlil Lahadalia lantas merespons hal itu sekaligus membantah menghalang-halangi investasi SPBU swasta di Tanah Air. Menurutnya, pemerintah telah menambah kuota impor menjadi 110% untuk tahun 2025 dibandingkan tahun 2024.<br />\r\n<br />\r\n&quot;110% itu kan harusnya udah paten kali itu kan. Jadi apanya investasinya yang kita halangi?&quot; ujar Bahlil saat ditemui di Jakarta Convention Center, Jakarta, Jumat (10/10/2025).</p>', 'dokumentasi_berita/2N1SMAROpAb1m2E5OwSxOYkrfjoCtssSqJvNBEQe.jpg', '2025-10-01', '2025-10-18 00:58:04', '2025-10-17 17:58:04');

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
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` char(36) NOT NULL,
  `nama_divisi` enum('Ketua','Koordinator','Bendahara','Sekertaris','Pengembangan Sumber Daya Mahasiswa','Akademik','Hubungan Masyarakat','Komunikasi dan Informasi','Komisi Kedisiplinan','Wakil Ketua') NOT NULL,
  `is_open` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `is_open`, `created_at`, `updated_at`) VALUES
('09cf5b78-a807-4f07-9d91-f25ae871fa07', 'Ketua', 0, '2025-11-09 02:20:00', '2025-11-08 19:20:00'),
('683de7d1-214b-464c-b380-d7fade97fcfc', 'Pengembangan Sumber Daya Mahasiswa', 0, '2025-11-10 02:08:09', '2025-11-09 19:08:09'),
('98818446-eb7c-4d58-8306-967d22c32f83', 'Wakil Ketua', 0, '2025-10-30 20:46:00', '2025-10-30 20:46:00'),
('a5ee91bd-f546-4caf-8466-386830975cd8', 'Koordinator', 0, '2025-11-10 02:08:08', '2025-11-09 19:08:08'),
('ceb11161-b841-4748-9c44-88bab55d4469', 'Komunikasi dan Informasi', 0, '2025-11-10 02:08:11', '2025-11-09 19:08:11'),
('da0cb042-aa87-46a8-b087-5f2846cc41d6', 'Komisi Kedisiplinan', 0, '2025-11-10 02:08:14', '2025-11-09 19:08:14'),
('dd780693-e830-46a9-9200-8ee91d99e7a7', 'Bendahara', 0, '2025-11-10 02:08:13', '2025-11-09 19:08:13'),
('e18eaeb8-2774-4601-a1e5-0cad0d961ec7', 'Akademik', 0, '2025-11-10 02:08:18', '2025-11-09 19:08:18'),
('f6d7ab08-eb13-461a-a5f4-70574245e7cb', 'Sekertaris', 0, '2025-11-10 02:08:20', '2025-11-09 19:08:20'),
('f748b42b-660b-4963-95ce-89db2267a877', 'Hubungan Masyarakat', 0, '2025-11-10 02:08:22', '2025-11-09 19:08:22');

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
-- Table structure for table `impersonations`
--

CREATE TABLE `impersonations` (
  `id` char(36) NOT NULL,
  `impersonator_guard` varchar(255) DEFAULT NULL,
  `impersonator_id` char(36) DEFAULT NULL,
  `target_guard` varchar(255) DEFAULT NULL,
  `target_id` varchar(255) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `stopped_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
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
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `logged_in_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `user_type`, `ip_address`, `logged_in_at`) VALUES
('113c572e-ac12-4ff2-af4f-a58512db8119', '07923881-de2e-4cd5-a5df-da3c364e9863', 'admin', '127.0.0.1', '2025-11-09 18:34:58'),
('1c4de61b-f4ed-4eaf-a303-dd94ed418a85', '07923881-de2e-4cd5-a5df-da3c364e9863', 'admin', '127.0.0.1', '2025-11-09 20:31:18'),
('54ce36e6-b8e0-447a-b224-f7c9166a1aec', 'ac4afc1a-56ef-4ce1-b425-76bab8fa64aa', 'admin', '127.0.0.1', '2025-11-09 08:47:06'),
('5db98c93-059e-41c2-b7f9-87cc502fd815', 'f396e21d-81a2-476b-8332-9fdd047afd8f', 'mahasiswa', '127.0.0.1', '2025-11-09 19:10:53'),
('6dcb6931-f91c-4838-bc20-161245a98415', '07923881-de2e-4cd5-a5df-da3c364e9863', 'admin', '127.0.0.1', '2025-11-09 08:25:38'),
('971c9bb8-d793-4cb4-8051-66700055e7cb', 'f396e21d-81a2-476b-8332-9fdd047afd8f', 'mahasiswa', '127.0.0.1', '2025-11-09 08:30:17'),
('e8574b24-40ca-49b8-a61f-33bf60e86ee4', 'ac4afc1a-56ef-4ce1-b425-76bab8fa64aa', 'admin', '127.0.0.1', '2025-11-09 19:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` char(36) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_mahasiswa` enum('Aktif','Tidak Aktif') NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`, `nim`, `password`, `status_mahasiswa`, `jenis_kelamin`, `foto_profil`, `created_at`, `updated_at`) VALUES
('00037024-a0df-4861-a8c8-62d0f14d5a02', 'Syifa Freza Salsabila', '3042024049', '$2y$12$d5YZoZGJKMUBaGCe/Qvbaea/1NfjQcCq.2MZaKcvrnYcXw5WBv58W', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:58', '2025-10-21 15:15:58'),
('0618b561-e3ff-4369-93fa-9d8b615ac037', 'Adinda Dwi Meilani', '3042024047', '$2y$12$yZMNCWx7PHwdggj.8I2w.elJPE3x4GLCTEgL0GWBb/nIUwA0WUZFy', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:57', '2025-10-21 15:15:57'),
('0b3b171b-6f70-4b76-8d31-0fcf1bd59033', 'Ibnu Farriz', '3042024035', '$2y$12$uafYJQJDRpydG1WobL8gmOinB0SUsZiDyxgoGklt4gCvIhFGenH/O', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:54', '2025-10-21 15:15:54'),
('0daba0f8-d6d3-4403-b9af-27ab82577e82', 'Variel Pratama Putra', '3042024051', '$2y$12$gqCw8hmcCfSpOZYB/zNt0eboHpN6VcyD2kg00juI0TC5CnCb0Tb2m', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:58', '2025-10-21 15:15:58'),
('153ed018-fb5d-4ea8-890c-ceb6f231c07d', 'Ryan Afandi', '3042024029', '$2y$12$utbalh7ip59xl3fh3ty3YesmLxWyoe3.5WLzMXvQwr3Vvc3ZHNjPa', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:53', '2025-10-21 15:15:53'),
('17b6cd97-d01b-4b0a-90f0-b33e4ea1169e', 'Apriandi', '3042024036', '$2y$12$tPqmjH0cyWbB9Oqy3aN1HubhOy99rR4a9g8NGI9gdgullXIUqhbT2', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:54', '2025-10-21 15:15:54'),
('1b6baa63-319c-40df-8495-ea32bc9ba6cb', 'Aulia Nazua Mesti', '3042024031', '$2y$12$qYmrxPfJt4AhAm3WUC6f.ubAkL7/R4vIOANGuJnI/ISGHw2UdMzsK', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:53', '2025-10-21 15:15:53'),
('1bdfb6db-5b41-4b4c-ad54-5ed3fdff91e6', 'Restu Azahra Putri', '3042024053', '$2y$12$0L5FHzWjNGyGzsmDHuMBXOoMNzZprN7.6rgNqbizN/fixZ0wK8BJO', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:59', '2025-10-21 15:15:59'),
('1e4c2950-1501-4700-b6a4-9873342b55f3', 'NABIL MAKARIM', '3042024062', '$2y$12$eLMFRXn8MCk4FJk/cspIMeQQIPkHeHKKNu.M1cUtyX0gkq39foAfq', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:16:01', '2025-10-21 15:16:01'),
('209a6c56-04ec-4b92-a0e8-3065e7b24817', 'MUHAMMAD ZULFADLI', '3042024064', '$2y$12$7WteEEh1HGJJQbvrBiGTcev6BIWhkJYNsx1PK0LOCnhiOe8JXoFwq', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:16:02', '2025-10-21 15:16:02'),
('21ce3020-b746-4ecd-a403-f72f53555c8d', 'DWI SAVITRI NOVALIA', '3042024061', '$2y$12$e6IJneeKLrRhDws8lt.KHeLRM.b/xTk900aEGvSdQesQ1m819NT9i', 'Aktif', 'Perempuan', '-', '2025-10-21 15:16:01', '2025-10-21 15:16:01'),
('2738648f-3fe9-4d99-b43c-f5775eae202f', 'Berliyana', '3042024022', '$2y$12$kHd0YjDemTVF3jxLGkZQ2OF2Uzc4XqTSMvsPph76upauBFtIksFli', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:51', '2025-10-21 15:15:51'),
('2c017ee2-09ee-441d-af70-af021ab455cb', 'Ainun Nurlita', '3042024002', '$2y$12$sfSzOIZrx8GsCyNxyWqd8etbTt8Yu7dhALhcIg/nWo87F3iU1AWN.', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:46', '2025-10-21 15:15:46'),
('2d576e72-59c7-42fa-9fae-33794527262a', 'Rahmi', '3042024015', '$2y$12$7163QFPNODCHzYwkznoS7u8H4WJ72cV4ofaxqtFBvQgOiKN63krzC', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:49', '2025-10-21 15:15:49'),
('30088cba-4070-4f57-88e8-2ae1bf5dfc98', 'Putri Maya Sari', '3042024038', '$2y$12$MYzwc.wbXWCXE0pRxwNtB.9PaBP5IgE6I7R.Un.995yCFSHGi6Wci', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:55', '2025-10-21 15:15:55'),
('36685352-50ef-4a45-bb77-889cf0affa11', 'Maulina', '3042024014', '$2y$12$rwZIdp8XqGILikwHPpph.uN4Bs2Iw4lg7e7AoHvBoMnlBFMMJeMYS', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:49', '2025-10-21 15:15:49'),
('3a487e4e-e606-4485-a949-39be66c8de9c', 'Anissa Fitri Ramadhani', '3042024008', '$2y$12$CeE1.2fdA0USI9n9EFeeUeQzH8VlBS/kVjmfDTjvuU4DRzDIbCuMW', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:48', '2025-10-21 15:15:48'),
('3aad8f7d-933c-42c7-b1de-e1ed3267687c', 'Gunawan', '3042024041', '$2y$12$22oAVflLU59n1aMKHSlGqeG.Qk7c8oHuN8V.YyEXftg9E6CgZ0e/K', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:56', '2025-10-21 15:15:56'),
('4d265141-0016-45c9-8c66-3bfd66b95f12', 'Nanda Aulia', '3042024040', '$2y$12$Hwk6Hvtanenn7YAjb25DRefDg66DgCX5s909EdNowo2w61cO9ykJ2', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:55', '2025-10-21 15:15:55'),
('52b447a0-17e7-4416-88a1-9b5e67c92514', 'Nill Shane', '3042024057', '$2y$12$7uio04p2O.79I8K9zAjaY.OvuNHNcABugJ7gpkKdwhln2FBVSHYLm', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:16:00', '2025-10-21 15:16:00'),
('5500e10f-1622-454a-ab7e-0422e4d427a8', 'Donny Farrell', '3042024027', '$2y$12$.oDAQHGrU8ckKZLQLkAtOekbjY1JmDWdGza0sKPaXKa1G8djC9CDS', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:52', '2025-10-21 15:15:52'),
('570ca4eb-1b77-4690-86aa-af84e4db40a6', 'Desi Putri Sri Rahayu', '3042024043', '$2y$12$5PnVjvFrOmA2CuqeH07RGOvGP2I0aRFKLyWI6puhPrFu0rV2oyPXi', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:56', '2025-10-21 15:15:56'),
('6220ba1a-d087-4b4c-855f-6af2b2961a8b', 'Ferizkyna Maulidya Ananda', '3042024058', '$2y$12$laf4FuUOjDeUAYF7n2zS0.XyAfQXrBClkBlhThILRl5Mypa5SEoxm', 'Aktif', 'Perempuan', '-', '2025-10-21 15:16:00', '2025-10-21 15:16:00'),
('66d8735c-8f6c-4d6e-a956-cfb9ffe0c885', 'Hidayatul Hasanah', '3042024054', '$2y$12$V/Bf8pA29xB9ZXhU88xyvup65rwcXoJJxEQOJHpBF.D4AFO.7aaeK', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:59', '2025-10-21 15:15:59'),
('73237f0d-ec7c-481c-a100-ca0dfbc5f434', 'Agung Tegar Pratama', '3042024017', '$2y$12$pDHG.ZNsny/YiX8i63VgfOy79a5C4w/zKz2f4TNo2TARnwK/78xHe', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:50', '2025-10-21 15:15:50'),
('8234b57c-3dd4-4a84-9f05-fbb0fea7f02d', 'Kasmawati Harahap', '3042024056', '$2y$12$yAAfwV5qBpw..cZXbFfWYe71.2Uz0HRvlhAr27mAM3LLu6jsFx2M6', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:59', '2025-10-21 15:15:59'),
('853c5a58-2f37-4cd6-83cf-e7e7072a716b', 'Safitri', '3042024023', '$2y$12$i4ldsc/yFfs.WtzUuALx5uiKYW44rZDPugA2gPgtmYxvfu40I4bBC', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:52', '2025-10-21 15:15:52'),
('868a71a6-b0ae-496b-8f08-f8be8496501b', 'Aliya Muzhoffarrizqa', '3042024006', '$2y$12$DNl9MrFOOsexjt3d.uLQZeNp2xG/vN6RW9xGuDQ5y051vLPIFU39m', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:47', '2025-10-21 15:15:47'),
('8b1ccf38-2d99-4fcd-9518-bce0c5a4d665', 'Widyati Andiny', '3042024019', '$2y$12$yg7N0wLi4IcZxj3F/RvSy.HBXWnbu673D1XvqLkZSovYa.t.T1Cq2', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:50', '2025-10-21 15:15:50'),
('8f224d32-a3b0-43f0-aa3b-fc5a7542b9bf', 'RELLIA VALDHINA', '3042024059', '$2y$12$hd8hQcBhf9cgn3H2cYw3ouFcgkrep6VdnN1mdIR/7iDukWd.00b0i', 'Aktif', 'Perempuan', '-', '2025-10-21 15:16:00', '2025-10-21 15:16:00'),
('90d815e6-0b0b-42e4-b666-64a38f95419d', 'Fitri Ningsih', '3042024045', '$2y$12$DYi5ow3XYIES5W6/vRN4eu.M3Lyz8abMFs.mB1eHE91MOq23El5TW', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:57', '2025-10-21 15:15:57'),
('92965075-1715-469b-802f-f1a26571dc9a', 'Adinda Putri', '3042024026', '$2y$12$rdz4MNIKB3WW6HRFVP837ONzAWxvHXa5K/XOn2NpLua/.lp/zWYoO', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:52', '2025-10-21 15:15:52'),
('92bf9651-7d36-40ae-b112-8ef925fc8618', 'Tomi Ahmed Desselsa', '3042024034', '$2y$12$3HUzWiGNAxHepRlFLWP2lePmqThNMfYYxAVONjrzdOO4Wplg36hwa', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:54', '2025-10-21 15:15:54'),
('9386a20f-ffb9-43df-8bf4-b7b1c75cce81', 'Geby Pebria', '3042024005', '$2y$12$lZ2UB0a5MpNNevzfJyvEu.Vqw4UFryYkn2OyLhDhFm2Ghj6bR6DNK', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:47', '2025-10-21 15:15:47'),
('95729283-9766-42ef-b4a0-cb4121b1c8f1', 'Faqih Dhiyaul Haq', '3042024021', '$2y$12$BX6nALaQAOtpP8S8v0/oYe1z43URLsH6VBp/ejFE86DRzcVrdD6fO', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:51', '2025-10-21 15:15:51'),
('97559a01-e2f6-40ab-bd4b-54c6ae53cabb', 'Ega Nadia Safitri', '3042024018', '$2y$12$KtlJigHtN3EFHn/CJo5s0uDQlPK1EoQZnZeIAbVDh6zUErOwMhshG', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:50', '2025-10-21 15:15:50'),
('995d546d-b960-41e9-8fd5-c52118994169', 'Nazla Shufiati', '3042024009', '$2y$12$sVf7AKGZzRMnwwqhkcCrveOjrOcv9Pbu.nE0oEYmrCI.TLiDZ/UHi', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:48', '2025-10-21 15:15:48'),
('9a8904cc-9a7b-4747-88c4-c8b2579bf508', 'Marisa Resti Mahendra', '3042024016', '$2y$12$WAFVLZ8t.ewtCoOP8ONPIe77BlBS/lKgZkJ6j2qXeMnSQVdRTKKxu', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:50', '2025-10-21 15:15:50'),
('9c20c200-11d2-4ef5-ad66-8bea1c9e9f6c', 'Epi Septiyani', '3042024042', '$2y$12$YRK1.7z./OHtdnO09nKexeTYFYM4XQ/osfbkkSlO9RQEmzy79CR46', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:56', '2025-10-21 15:15:56'),
('a237ae03-cc74-4e0b-bf74-da053abd8884', 'Mahesa Pratama Lindra', '3042024007', '$2y$12$Z3U83G.Iaqm22nbvyVNKle7CQn8CR.kjyPAdjXJ5VZ9.KV0fo5UXq', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:47', '2025-10-21 15:15:47'),
('a57aa29f-73b3-44d4-a5d4-db01b48e2cb1', 'Rifki Asdi Putra', '3042024011', '$2y$12$uVpwlwmfupe28pqN2i8TGeCQOFPQtpMZUYw3hLcCTxASssD3tR4B.', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:48', '2025-10-21 15:15:48'),
('a8fdbc0a-1df4-482f-9e91-79ed6be6047a', 'Ambarwati Royani', '3042024044', '$2y$12$.UlBDjnCNZeQYdrs/iN/9.PMT7frs.bCC/gKCUFTNVhAtLOF5LcRS', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:57', '2025-10-21 15:15:57'),
('aa4a2ed5-9f3f-4851-a518-2e74f89513c5', 'Agustina', '3042024004', '$2y$12$GfvK2yWyEdsPhmGBCDO7GeFCsltDn/CPw5AuHZ863kECBFlog9wRO', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:46', '2025-10-21 15:15:46'),
('aadda3e9-1bfe-4f58-8de2-07f773b4c34d', 'Tika Kartika', '3042024025', '$2y$12$3mkYAKGEwSIPPF7ZOoAliu3mPNg47Xsd1HGnbsgWSw2oygpFZE1XO', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:52', '2025-10-21 15:15:52'),
('b7427b65-ba34-4bf7-bec1-b95b46f7edd8', 'Palupi Azalia Maharani', '3042024046', '$2y$12$ZZuXhUub.6uOqHD65nEK/.gk5tO6WaSt4EGq66Mcc5H5hgAcuQxei', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:57', '2025-10-21 15:15:57'),
('bc3e44e6-2910-4771-ae6d-889840f0ccff', 'Nur Wahidah', '3042024003', '$2y$12$Yr3fJHEduxxQJz9HBX2w8ea3gCwFAQg3p5yfknTC3qDTR62ZrS4ne', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:46', '2025-10-21 15:15:46'),
('c67f5cf8-2056-4fe3-a272-2cb9fd7663c2', 'AISYAH', '3042024060', '$2y$12$kIPJYXQde12XVA8d22IJhuIsnzV7c.AamnpJGyPRnvhsBN5YRT6Xm', 'Aktif', 'Perempuan', '-', '2025-10-21 15:16:01', '2025-10-21 15:16:01'),
('c80d1f27-861f-4f22-ba4b-a8ef92dab094', 'Artika', '3042024028', '$2y$12$Ik/gNUJZnDwLoRYNO3jPsezdeinWwLU3ZDW31NT9Xp6Ygoj2vk0de', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:53', '2025-10-21 15:15:53'),
('ca7d8df3-a8a9-42c0-82de-d4734a687fa3', 'Fiki', '3042024033', '$2y$12$JX.pck4f/gOR8t0tnAVmcuycW0FUGgCt78EAHnEmg8S8MiLa8LC1e', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:54', '2025-10-21 15:15:54'),
('cf53dc81-d9a3-46e7-b732-954433a17885', 'Lianto Tri Prasetyo', '3042024030', '$2y$12$QInkxUuX9iCl5UTgKz1f5.JaZIIJGaPqvBrshYcPUB7zdnDIpUwce', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:53', '2025-10-21 15:15:53'),
('da02ac92-e966-4112-87a6-402a7c11b79c', 'Firman Hadi', '3042024048', '$2y$12$NuKDk/6bAzr1H/BJjha1gOo.9X5kVLb/Eys5VELkbeD3IlLXtAEHi', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:58', '2025-10-21 15:15:58'),
('daf340a7-ef32-4afb-97d1-3dfbfbad999f', 'Rizky Aulia Desfita', '3042024052', '$2y$12$Ml1MNO9XAPNNSKHsJk0O1Oi6tHDpYV4yPH0BQJ/nNY/eCcyMbbDnu', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:58', '2025-10-21 15:15:58'),
('debf1df7-9647-4e55-ae7b-5a93c1ad33fa', 'FATUR RIZKI', '3042024063', '$2y$12$VUEuRREOjBweRqIgCTSxKeH0rT2lPjX.qHRcCRwglJPBLnlla0oJO', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:16:01', '2025-10-21 15:16:01'),
('e132d0b8-46f1-4ee1-a53f-9c9bd97b9437', 'Rana Permata Hati', '3042024012', '$2y$12$SC4NmSzvKRS63qPeNTwFeeIp.r2E.aPwZJhH3.XF48TMNNqwwBkPK', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:49', '2025-10-21 15:15:49'),
('ec19463c-ba7c-47cd-a396-93ca9c3cc134', 'Tiana Mayasari', '3042024039', '$2y$12$GYvJxwKR2CK8vcAR0qlexOHZOCARt7j1Vrik3SvsSmWayWPk57Fq.', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:55', '2025-10-21 15:15:55'),
('ee666010-8aea-4f6c-b897-0a93315996c1', 'Julita', '3042024055', '$2y$12$ljZm.5.CXKyb8WFTtz1T7ufeYNsbaXUJnIdTrsWx/8fkwITx5Vzfq', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:59', '2025-10-21 15:15:59'),
('ef2b30ea-72c6-428f-b6ae-202793c8070c', 'Anisha Dewi', '3042024010', '$2y$12$yPQxLky9E4fLqJlJohj56er2OAGfmtH9yPLYWQSIfiWdUZ2gbtmcO', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:48', '2025-10-21 15:15:48'),
('f1941fd7-2fe8-4e7b-ab15-925b1b30b45c', 'Adrian Yoga Pratama', '3042024037', '$2y$12$LOcv6RotBFf76CjH4Baz9uNf2F1upBdS9VW.0aeoVDbIT.ncPWdqi', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:55', '2025-10-21 15:15:55'),
('f396e21d-81a2-476b-8332-9fdd047afd8f', 'Khairunnisa', '3042024001', '$2y$12$j6TNE2XywxpOAGkOKzXFoOf3vI7xVqax7qinl3aaoK9JPz5p5kMfe', 'Aktif', 'Perempuan', 'profile_picture/3M0EjyD6G56xFSxypuOPrLjTl18txS2KpI3Ok55O.jpg', '2025-10-31 02:10:52', '2025-10-30 19:10:52'),
('f83b6abd-23a1-4a41-85ff-c564726f1655', 'Riki Prayuda', '3042024013', '$2y$12$9w4z.jQrd3Naq5WlEDnlbePvhwN6T1EIQVoyyu8iSuZjZx1a/ZnmO', 'Aktif', 'Laki-Laki', '-', '2025-10-21 15:15:49', '2025-10-21 15:15:49'),
('f929444f-ba10-4b4a-9673-651e7926d201', 'Intan Saras Wati', '3042024020', '$2y$12$DmxyRwm.wo.DSF1vozKxKOOkUp1Qy/OR4OBwLx.hMDhRgLlAtjkIm', 'Aktif', 'Perempuan', '-', '2025-10-21 15:15:51', '2025-10-21 15:15:51');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_09_034954_impersonation', 2);

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
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` char(36) NOT NULL,
  `divisi_dipilih_id` char(36) NOT NULL,
  `divisi_ditempatkan_id` char(36) DEFAULT NULL,
  `mahasiswa_id` char(36) NOT NULL,
  `status_pendaftaran` enum('Approved','Pending','Decline') NOT NULL,
  `alasan_bergabung` text NOT NULL,
  `alasan_ditolak` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `divisi_dipilih_id`, `divisi_ditempatkan_id`, `mahasiswa_id`, `status_pendaftaran`, `alasan_bergabung`, `alasan_ditolak`, `created_at`, `updated_at`) VALUES
('2bd7d5c5-2ec4-4e41-aa20-0ba3d8429965', 'ceb11161-b841-4748-9c44-88bab55d4469', 'ceb11161-b841-4748-9c44-88bab55d4469', 'f396e21d-81a2-476b-8332-9fdd047afd8f', 'Approved', 'saya pengen menjadikan HMJ ini sebagai wadah tempat aspirasi mahasiswa terutama prodi ti', NULL, '2025-11-09 15:43:06', '2025-11-09 08:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mahasiswa_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul_pengaduan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Pending','Diproses','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `tanggapan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_aduan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `mahasiswa_id`, `judul_pengaduan`, `deskripsi`, `status`, `tanggapan`, `bukti_aduan`, `created_at`, `updated_at`) VALUES
('34532804-2339-4509-a6bb-09a3810252ee', '3aad8f7d-933c-42c7-b1de-e1ed3267687c', 'Pengaduan 1', 'Mengajukan Permohonan untuk melakukan kegiatan ospek ', 'Selesai', 'Laporan kamu telah selesai kami atasi terimakasih sudah menghubungi kami ya', '', '2025-11-03 18:04:35', '2025-11-08 19:45:22'),
('5c741ed4-7e5b-45cf-9500-6da8345c5467', 'f396e21d-81a2-476b-8332-9fdd047afd8f', 'HALO', '<p>HALO</p>', 'Selesai', 'TESTING', '/Applications/XAMPP/xamppfiles/temp/phpTv0UDn', '2025-11-08 19:51:08', '2025-11-08 20:10:12'),
('5fe33e2a-4a38-44d0-962c-519ee634427e', '3aad8f7d-933c-42c7-b1de-e1ed3267687c', 'Pengaduan 2', 'Melaksanakan pembekalan untuk mahasiswa baru angkatan 2025', 'Selesai', 'stest', '', '2025-11-03 18:03:08', '2025-11-09 08:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('w5oeI1pQA4UY2kcOZrVCCDvLLDoBBfG9sZik6gVQ', '07923881-de2e-4cd5-a5df-da3c364e9863', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:144.0) Gecko/20100101 Firefox/144.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYWc3OVBWNHJmMk04MTA4Y3VYWHFvSUE4OEJlSHJJYUEzemI4R2I0eCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3BlbmdhZHVhbi1tYWhhc2lzd2EiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozOToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL2ltcGVyc29uYXRlIjtzOjU6InJvdXRlIjtzOjIxOiJpbXBlcnNvbmF0ZS5tYWhhc2lzd2EiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEyOiJpbXBlcnNvbmF0b3IiO2E6Mjp7czo1OiJndWFyZCI7czo1OiJhZG1pbiI7czoyOiJpZCI7czozNjoiMDc5MjM4ODEtZGUyZS00Y2Q1LWE1ZGYtZGEzYzM2NGU5ODYzIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiMDc5MjM4ODEtZGUyZS00Y2Q1LWE1ZGYtZGEzYzM2NGU5ODYzIjtzOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319', 1762745493),
('YU3qNPVRa6lwMHGZiL34TUoaMJBdEryXf27hfLS9', 'f396e21d-81a2-476b-8332-9fdd047afd8f', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRlNFS01pUVFUSUJlNXpDRlJLc3huRHVWVUZSb0Rjd3lEd1lGN0lxZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYWhhc2lzd2EvcGVuZGFmdGFyYW4tYW5nZ290YSI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NjoibG9naW5fbWFoYXNpc3dhXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6ImYzOTZlMjFkLTgxYTItNDc2Yi04MzMyLTlmZGQwNDdhZmQ4ZiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9fQ==', 1762747246);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `divisi_id` (`divisi_id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `impersonations`
--
ALTER TABLE `impersonations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_id` (`user_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`mahasiswa_id`),
  ADD KEY `divisi_dipilih_id` (`divisi_dipilih_id`),
  ADD KEY `divisi_ditempatkan_id` (`divisi_ditempatkan_id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_mahasiswa_id_foreign` (`mahasiswa_id`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `divisi_id` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_id` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `arsip`
--
ALTER TABLE `arsip`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `divisi_dipilih_id` FOREIGN KEY (`divisi_dipilih_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `divisi_ditempatkan_id` FOREIGN KEY (`divisi_ditempatkan_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_mahasiswa` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
