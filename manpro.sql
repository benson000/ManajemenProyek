-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2018 pada 09.03
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manpro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_events` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` time NOT NULL,
  `end_date` time NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `id_events`, `name`, `start_date`, `end_date`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'SI0001', 'Perkenalan Panitia', '10:00:00', '10:15:00', 'Mengenalkan panitia terhadap peserta', '2018-11-18 20:22:21', '2018-11-18 20:22:21'),
(2, 'SI0001', 'Perkenalan Panitia', '12:00:00', '12:15:00', 'Istirahat', '2018-11-18 20:25:35', '2018-11-18 20:25:35'),
(3, 'SI0001', 'Istirahat', '01:00:00', '13:02:00', 'dfdffd', '2018-11-18 20:27:32', '2018-11-18 20:27:32'),
(4, 'SI0001', 'Perkenalan Panitia', '01:02:00', '01:03:00', 'sisa makanan', '2018-11-18 20:41:02', '2018-11-18 21:18:53'),
(6, 'SI0001', 'Makan malam', '01:02:00', '01:03:00', 'kuda', '2018-11-18 21:08:00', '2018-11-18 21:27:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `budgets`
--

CREATE TABLE `budgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_events` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `budgets`
--

INSERT INTO `budgets` (`id`, `id_events`, `keterangan`, `saldo`, `created_at`, `updated_at`) VALUES
(2, 'SI0002', 'Pemberdayaan Mahasiswa Fakultas Ilmu Komputer', 6500000, '2018-11-19 07:07:08', '2018-11-19 07:11:49'),
(3, 'SI0001', 'Biaya bis luar', 550000, '2018-11-19 07:12:08', '2018-11-19 07:12:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Self-Improvement', NULL, NULL),
(2, 'Ujian Kelulusan', NULL, '2018-11-19 06:46:46'),
(4, 'Penilaian Umum', '2018-11-19 06:47:19', '2018-11-19 06:47:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `committees`
--

CREATE TABLE `committees` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_events` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggung_jawab` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `committees`
--

INSERT INTO `committees` (`id`, `id_events`, `jabatan`, `id_user`, `password`, `nama`, `tanggung_jawab`, `created_at`, `updated_at`) VALUES
(1, 'SI0001', 'Ketua', 'dummy1', 'qwerty', 'Jorgy Peterson', 'Mengkoordinasikan semua panitia', '2018-11-19 07:40:14', '2018-11-19 07:40:14'),
(2, 'SI0001', 'Wakil Ketua', 'dummy2', 'qwerty', 'Catharina Evelyn', 'Membantu ketua', '2018-11-19 07:40:53', '2018-11-19 07:42:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_events` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `id_events`, `name`, `start_date`, `end_date`, `place`, `theme`, `category`, `tujuan`, `approval`, `proposal`, `updated_at`, `created_at`) VALUES
(1, 'SI0001', 'PTMB Fakultas', '2018-11-20', '2018-11-21', 'Gedung HC8', 'Change The Future For Us', 'Self-Improvement', 'Menyiapkan mahasiswa baru dengan lingkungan kampus', 'DISETUJUI', 'exemple03.pdf.pdf', '2018-11-21 22:43:17', '0000-00-00 00:00:00'),
(2, 'SI0002', 'Dies Natalis IKOM', '2018-11-05', '2018-11-05', 'HC Lantai 8', 'Digital or Real', 'Self-Improvement', 'Memperingati hari lahir jurusan ikom', 'BELUM  DISETUJUI', 'subnetwork  [Autosaved].pdf', '2018-11-21 22:57:16', '2018-11-19 06:27:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_05_013037_create_participants_table', 1),
(4, '2018_09_05_013435_create_events_table', 2),
(5, '2018_09_05_014026_create_activities_table', 3),
(6, '2018_09_05_015238_create_committees_table', 3),
(7, '2018_09_05_020301_create_categories_table', 3),
(8, '2018_09_05_020906_create_budgets_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `participants`
--

CREATE TABLE `participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_events` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_peserta` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `participants`
--

INSERT INTO `participants` (`id`, `id_events`, `id_peserta`, `password`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'SI0001', '16.N1.0018', 'qwerty', 'Simeon Bensona', 'Istirahat', '2018-11-19 08:00:42', '2018-11-19 08:00:42'),
(2, 'SI0001', '16.N1.0017', 'qwerty', 'Jin Kaza', 'Lelah Banget', '2018-11-19 08:01:18', '2018-11-19 08:03:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `nim`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Simeon Bensona', 'sbensona77@gmail.com', NULL, NULL, '$2y$10$edP36qAVhfGDirtgH1pTGO11ce79cUfGXSBYp3dgKnNqM.CJyeu6u', '6yNnxtG9j8NAC9ysQsQ8WxGwFctKWkpj7wcJuANq4ZXHcAWj7s7MfalkmyJS', '2018-09-12 22:26:40', '2018-09-12 22:26:40'),
(2, 'Caesar Baroona', 'xxxxxx@test.com', NULL, NULL, '$2y$10$Et06yIkFI9YfkP1N.ECc8ObciTXIjE9082iWeYlQmXe2iJsVmzNE.', 'Svfd95go6ZBmHuVeobS9uTekysc5AALhbca63WQcdie25oK09u0AYjfGywNS', '2018-09-12 22:47:32', '2018-09-12 22:47:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
