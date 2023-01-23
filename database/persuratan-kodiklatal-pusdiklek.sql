-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2021 pada 14.17
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan-kodiklatal-pusdiklek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisis`
--

CREATE TABLE `disposisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_2` date DEFAULT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terima_dari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diteruskan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal_surat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dibaca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menggetahui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kasetum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasubbagminu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaur_tu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasetum_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasubbagminu_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaur_tu_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `disposisis`
--

INSERT INTO `disposisis` (`id`, `id_pengirim`, `id_tujuan`, `tanggal`, `no_agenda`, `tanggal_2`, `no_surat`, `terima_dari`, `alamat_aksi`, `diteruskan`, `aksi`, `catatan`, `perihal_surat`, `file_surat`, `dibaca`, `menggetahui`, `kasetum`, `kasubbagminu`, `kaur_tu`, `kasetum_kembali`, `kasubbagminu_kembali`, `kaur_tu_kembali`, `created_at`, `updated_at`) VALUES
(1, '11', '12,13,14', '2021-12-13', '1233213', NULL, '123', '', NULL, '2', '1', '123', '123zzzz', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-13 06:36:04', '2021-12-15 06:43:08'),
(2, '11', '12,13,14,15', '2021-12-13', '123123', NULL, '123123123', '', NULL, '2', '1', '12312313', '123123123', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-13 06:46:48', '2021-12-13 07:28:10'),
(3, '11', '12,13,14,15', '2021-12-13', '111111', NULL, '111111', '', NULL, '3', '13', '111111', '11111111', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-13 06:56:50', '2021-12-13 07:27:40'),
(4, '11', '12,13,14,15', '2021-12-14', 'asd', NULL, 'asd', '', NULL, '4', '18', 'asd', 'asdsad', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-14 07:49:13', '2021-12-14 07:49:13'),
(5, '11', '15', '2021-12-14', 'qqqq', NULL, 'qqqqq', '', NULL, '22', '17', 'qqqqqqq', 'qqqqqq', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-14 07:50:32', '2021-12-14 07:50:32'),
(6, '11', '12,13,14,15', '2021-12-14', '123123', NULL, '123123', '', NULL, '20', '9', 'bjjbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '123', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-14 08:21:50', '2021-12-15 06:42:04'),
(7, '11', '14,15', '2021-12-15', '121212', NULL, '121212', '', NULL, NULL, '11', '121212', '121212', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 06:40:28', '2021-12-15 06:40:28'),
(8, '11', '12,15', '2021-12-15', 'saadasdad', NULL, '321', '', NULL, NULL, '2', 'zxczxczx', 'cxzczcz', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-15 06:59:31', '2021-12-15 09:22:56'),
(9, '11', '12,15', '2021-12-15', '151515', NULL, '151515', '', NULL, '1515151515', '2', '15151515', '151511515', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 07:03:29', '2021-12-15 07:03:29'),
(10, '11', '15', '2021-12-15', '123123123', NULL, '321123123', '', NULL, '123123123', '9', '123123123', '1231231231', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 07:05:23', '2021-12-15 07:05:23'),
(11, '11', '12,13,15', '2021-12-15', '123', NULL, '321', '', NULL, '23131', '9', '125', '5325', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-15 07:06:55', '2021-12-15 07:44:24'),
(12, '11', '12,14,15', '2021-12-15', '12312312312312312', NULL, '12312312', '', NULL, 'sadsd', '9', 'qweqweqwe', 'aweqweqwe', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 08:57:01', '2021-12-15 08:57:01'),
(13, '11', '12,13', '2021-12-15', '123213213', NULL, '123213213', '', NULL, '21312312', '9', '123123213123123', '123123123', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 08:59:26', '2021-12-15 08:59:26'),
(14, '11', '12,15', '2021-12-15', '123123123', NULL, '123123', '', NULL, '123123123123', '14', '123123', '12312312312', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 09:00:25', '2021-12-15 09:00:25'),
(15, '11', '13', '2021-12-15', '123123123', NULL, '312312312', '', NULL, '312312312', '9', '123123123', '123123', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 09:01:05', '2021-12-15 09:01:05'),
(16, '11', '12,15', '2021-12-15', '12312312', NULL, '12732163', 'wisnu', NULL, 'wisnu', '9', 'wisnu', 'qwewqe', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-15 09:02:24', '2021-12-15 09:02:24'),
(17, '11', '12', '2021-12-15', 'nomor agenda', NULL, 'nomor', 'terimadari', NULL, 'diteruskan kepada', '9', 'disposisi catatan', 'perihal', NULL, ',12', NULL, '', '', '', '', '', '', '2021-12-15 09:07:13', '2021-12-15 09:23:02'),
(18, '11', '12,13', '2021-12-16', '1111111111111111', NULL, '3213123', 'wwwww', NULL, 'wisnu', '3,10,16', 'coba', 'wisnu', NULL, NULL, NULL, '', '', '', '', '', '', '2021-12-16 05:32:42', '2021-12-16 05:32:42'),
(19, '11', '12,13,14,15', '2021-12-16', '123123/12312/123123/', '2011-11-11', '11111/123123/123123/', '_kembali', NULL, '_kembali', '3,10,15', '_kembali', '_kembali', NULL, NULL, NULL, '_kembali', '_kembali_kembali', '_kembali', '_kembali', '_kembali', '', '2021-12-16 05:48:57', '2021-12-16 05:48:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(5, '2021_11_19_083200_create_surats_table', 2),
(6, '2021_12_05_131801_create_telegrams_table', 3),
(7, '2021_12_13_115713_disposisi', 4),
(8, '2021_12_13_115713_disposisis', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_unit` tinyint(4) NOT NULL,
  `id_jenis_surat` tinyint(4) NOT NULL,
  `id_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal_surat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibaca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surats`
--

INSERT INTO `surats` (`id`, `id_unit`, `id_jenis_surat`, `id_pengirim`, `id_tujuan`, `tanggal`, `no_agenda`, `no_surat`, `perihal_surat`, `password`, `disposisi`, `file_surat`, `dibaca`, `created_at`, `updated_at`) VALUES
(6, 1, 2, '12', '11,13,14', '2021-12-12', '123', '1231', '123123', '$2y$10$47FtYcVnetol8EwhbaOJW.sNfMWCpQdp0BSpt9L6a7H0mu0pyom3y', NULL, 'surat/practical-test---react-js-programmer-v.2_2-1639296192.pdf', NULL, '2021-12-12 01:03:12', '2021-12-12 02:04:51'),
(7, 1, 17, '12', '11,13,14', '2021-12-12', '123', '123', '123', '$2y$10$/E.fIHDk/SZ8gpRTuE9lFeRy9XlzBzBp8R/zOu4GvRr3T42PzaQBS', NULL, 'surat/practical-test---react-js-programmer-v.2-1639296737.pdf', NULL, '2021-12-12 01:12:17', '2021-12-12 01:22:54'),
(8, 1, 18, '12', '11,13,14', '2021-12-12', '123', '123', '123', '$2y$10$yU.Hmng89J3rVmFOV1.FDuFZDezLewmomBVStRWcLX.zK081VDycO', NULL, 'surat/practical-test---react-js-programmer-v.2_2-1639297155.pdf', ',13', '2021-12-12 01:19:15', '2021-12-12 02:10:09'),
(9, 1, 2, '13', '11,12,14', '2021-12-12', '123', '123', '123', '$2y$10$ZJxF91Y5DUUo064tcaJx1ePqsLNXt8jHNvIPXZW3MqrPi4005u2X.', NULL, 'surat/practical-test---react-js-programmer-v.2_2-1639297837.pdf', NULL, '2021-12-12 01:30:37', '2021-12-12 01:59:27'),
(10, 1, 17, '11', '12,13,14,15', '2021-12-12', '123', '123', '123', '$2y$10$1trtglDPT6acs8ZGwYXCuuCgmeYpWvtuc7qRUR0gtrRR8zcQ2B5Ji', NULL, 'surat/practical-test---react-js-programmer-v.2_2-1639300418.pdf', '0,12', '2021-12-12 02:13:38', '2021-12-12 02:18:47'),
(11, 3, 18, '11', '12,13,14,15', '2021-12-12', '123', '123', '123', '$2y$10$74.5RbSc/xC53xNdl3zAJOz06oiwtrMnBTY0/MfbnPeWPrzz7oASK', NULL, 'surat/practical-test---react-js-programmer-v.2_2-1639300470.pdf', '0', '2021-12-12 02:14:30', '2021-12-12 02:14:30'),
(12, 1, 2, '11', '12,13,14,15', '2021-12-12', '123', '123', '123', '$2y$10$KfFCVNLl9mGBtcWdsN.LyeTbgkZuQDEOAoBeHP5ple7OMpdHipU2O', NULL, 'surat/practical-test---react-js-programmer-v.2-1639300704.pdf', '0', '2021-12-12 02:18:24', '2021-12-12 02:18:24'),
(13, 1, 2, '15', '11,12,13,14', '2021-12-12', '123', '123', '123', '$2y$10$vuuoiUUGgGAKR36ni7ftXOAlbxsHSxN4E1tkMGiBdjlqziNIIysWa', NULL, 'surat/practical-test---react-js-programmer-v.2-1639301141.pdf', '0', '2021-12-12 02:25:42', '2021-12-12 02:25:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `telegrams`
--

CREATE TABLE `telegrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_unit` tinyint(4) NOT NULL,
  `id_jenis_surat` tinyint(4) NOT NULL,
  `id_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal_surat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibaca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klasifikasi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `derajat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `telegrams`
--

INSERT INTO `telegrams` (`id`, `id_unit`, `id_jenis_surat`, `id_pengirim`, `id_tujuan`, `tanggal`, `no_agenda`, `no_surat`, `perihal_surat`, `password`, `disposisi`, `file_surat`, `dibaca`, `klasifikasi`, `derajat`, `created_at`, `updated_at`) VALUES
(3, 3, 1, '12', '11,13,14,15', '2021-03-12', '123', '123', '123', '$2y$10$O/BJt0rZT5puS9bheEac5.rYBo/s1CBwYzmLzr5jxKVdarN0Hv4Rm', NULL, 'surat/practical-test---react-js-programmer-v.2_2-1639298892.pdf', ',13', '123', '123', '2021-12-12 01:48:13', '2021-12-12 01:48:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `distribusi` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `distribusi`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'ASKOMLEK', 'askomlek', 2, 0, '$2y$10$EX3x7ZHJLmjPZW0wSlokseLxRB4pR2KTMTAso1VosUTI0qJPesTp6', NULL, NULL, NULL),
(12, 'KAUR TU', 'kaurtu', 1, 0, '$2y$10$EX3x7ZHJLmjPZW0wSlokseLxRB4pR2KTMTAso1VosUTI0qJPesTp6', NULL, NULL, NULL),
(13, 'PABAN BINKOM', 'pabanbinkom', 1, 0, '$2y$10$EX3x7ZHJLmjPZW0wSlokseLxRB4pR2KTMTAso1VosUTI0qJPesTp6', NULL, NULL, NULL),
(14, 'PABAN OPSKOM', 'pabanopskom', 1, 0, '$2y$10$EX3x7ZHJLmjPZW0wSlokseLxRB4pR2KTMTAso1VosUTI0qJPesTp6', NULL, NULL, NULL),
(15, 'Admin', 'admin', 3, 1, '$2y$10$EX3x7ZHJLmjPZW0wSlokseLxRB4pR2KTMTAso1VosUTI0qJPesTp6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisis`
--
ALTER TABLE `disposisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `telegrams`
--
ALTER TABLE `telegrams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisis`
--
ALTER TABLE `disposisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `telegrams`
--
ALTER TABLE `telegrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
