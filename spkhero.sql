-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Nov 2025 pada 19.17
-- Versi server: 10.6.23-MariaDB
-- Versi PHP: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5010803_spkhero`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Kimmy', 'gpnyFrgWXPkR8ZWamYUkJAepuxPtEDOvfwSRjTgl.jpg', '2025-10-31 03:26:57', '2025-11-07 05:03:56'),
(2, 'Pharsa', 'Bs4cyZhAiyQJUlqgGXL5OiWdLN0klgJC5UDOGZFx.jpg', '2025-10-31 03:27:13', '2025-11-07 05:04:12'),
(3, 'Zetian', 'znhRpAZdRZBRrCe8cXRWfUo5fFyeWCYcaGP03881.jpg', '2025-10-31 03:27:33', '2025-11-07 05:04:31'),
(4, 'Xavier', 'RbEXqEKNR0f7wTmR6XrjWDrmStqKJaNwTDCRZyOP.jpg', '2025-10-31 03:27:51', '2025-11-07 05:04:44'),
(5, 'Kagura', 'jDgQqi1b6LE8cVSfzLlRpoM9lSoRj6qZsjqbBsAd.jpg', '2025-10-31 03:28:28', '2025-11-07 05:05:01'),
(7, 'Kadita', 'Bea3hoD88xHHtJWtwMdpiXCj6KQ8w3S1ZYIZo29D.jpg', '2025-10-31 03:28:45', '2025-11-07 05:05:15'),
(8, 'Cecilion', '1O9ivsYnjZCALm80KveY1QjqHEQjNkNYTtRvaj0H.jpg', '2025-10-31 03:29:52', '2025-11-07 05:05:31'),
(9, 'Harith', 'UvkoeFvkKVj0F7sqpAyHl2VMnJUaU5C37pY33Cza.jpg', '2025-10-31 03:30:25', '2025-11-07 05:05:42'),
(10, 'Selena', 'lttVBX2fFWAAwKDMYMxdbaftK7W9j3fMprViPkvH.jpg', '2025-10-31 03:30:55', '2025-11-07 05:06:15'),
(11, 'Lunox', 'XmUXIeVWNccuul1AVdjvySnLWTcqv0r22JOD38nT.jpg', '2025-10-31 03:31:28', '2025-11-07 05:06:26'),
(12, 'Change', 'SmGjvFxng1kShDrg9DC9T3EAANbtWJNfBXCVfnem.jpg', '2025-10-31 03:32:56', '2025-11-07 05:06:39'),
(13, 'Zhuxin', 'xFD4VNXu7CM3X5JENGKm9DmZyL1ifSGZXvHsLg56.jpg', '2025-10-31 03:33:12', '2025-11-07 05:06:54'),
(14, 'Lylia', 'X6YQy13zCOO0k4sS0ckzVqBaHORNTPuq93ZaJymD.jpg', '2025-10-31 03:34:55', '2025-11-07 05:07:09'),
(15, 'Oddete', 'lCTKSxFq30j4TbICGoChcJ1Hld6L82MCVmhhOjXm.jpg', '2025-10-31 03:35:10', '2025-11-07 05:07:28'),
(16, 'Novaria', 'c4LwWDIMfcZCP2ieRM2zZRTJ7fcBDxzHNFnk43FW.jpg', '2025-10-31 03:35:22', '2025-11-07 05:07:47'),
(17, 'Valentina', 'prdZkl5W4ZCZmCVAbexph2QBagXixyrIgcJAAOdb.jpg', '2025-10-31 03:35:36', '2025-11-07 05:08:02'),
(18, 'Vexana', 'ALixIO7OT3WhyOHWN1LnI7ElZBiLeYhN6SkjB9xl.jpg', '2025-10-31 03:35:46', '2025-11-07 05:08:17'),
(19, 'Luo Yi', 'TqvkRn7olWDoKAJGzkBM84GkR27mRCV6pKhDc5XM.jpg', '2025-10-31 03:38:41', '2025-11-07 05:08:29'),
(20, 'Gord', 'Kwv1CYhJ3yhvAObsekBd9hve22hIQLijBLSFWRvD.jpg', '2025-10-31 03:38:52', '2025-11-07 05:08:41'),
(21, 'Vale', 'nS63Hd7UTye4gs6iS8qljb3QvzhdpedvLxi2uoFT.jpg', '2025-10-31 03:39:04', '2025-11-07 05:08:59'),
(22, 'Faramis', 'IHbqiuVyVYOkMqc0G4AJmKcj2TrStdUEut9yjZmF.jpg', '2025-10-31 03:39:18', '2025-11-07 05:09:28'),
(23, 'Cyclops', 'xTr3kiaLYP5XlVKQfATFZdAlpuc4ts20VF8opl4U.jpg', '2025-10-31 03:39:30', '2025-11-07 05:09:40'),
(24, 'Nana', '4GC22JrZsJbY0gYoKfsjepRC6RkziOemBbwz4zLa.jpg', '2025-10-31 03:39:43', '2025-11-07 05:09:56'),
(25, 'Yve', 'Rl4PIfFP1rDdUkLIjzLymvDSneLjAnMCDtMXY0JP.jpg', '2025-10-31 03:39:54', '2025-11-07 05:10:11'),
(26, 'Zhask', 'SNSumg3D26PQK3Ciwf3hlqL0O1iASZ0jEQkNdIx4.jpg', '2025-10-31 03:40:05', '2025-11-07 05:10:23'),
(27, 'Eudora', 'cHCfl97SqQpsHfMLG9wpWQP7iVay7gLPZPxFKb6z.jpg', '2025-10-31 03:40:17', '2025-11-07 05:10:37'),
(28, 'Valir', 'gTW8XS8IreOF2uiZ7oKhyoGPO6cyFDCdsjdEkfJi.jpg', '2025-10-31 03:40:28', '2025-11-07 05:10:58'),
(29, 'Aurora', 'afm4luDAcVFkp1OZH3E8MMTGZfoIHLb1KfVYwIoT.jpg', '2025-10-31 03:40:41', '2025-11-07 05:11:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `id_periode`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 29, 1, 0.05, '2025-10-31 03:59:55', '2025-10-31 04:15:53'),
(2, 8, 1, 0.20, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(3, 12, 1, 0.17, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(4, 23, 1, 0.06, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(5, 27, 1, 0.05, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(6, 22, 1, 0.08, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(7, 20, 1, 0.08, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(8, 9, 1, 0.22, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(9, 7, 1, 0.21, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(10, 5, 1, 0.23, '2025-10-31 03:59:55', '2025-10-31 04:15:49'),
(11, 1, 1, 1.00, '2025-10-31 03:59:55', '2025-10-31 04:15:47'),
(12, 11, 1, 0.18, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(13, 19, 1, 0.08, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(14, 14, 1, 0.13, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(15, 24, 1, 0.05, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(16, 16, 1, 0.14, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(17, 15, 1, 0.13, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(18, 2, 1, 0.54, '2025-10-31 03:59:55', '2025-10-31 04:15:48'),
(19, 10, 1, 0.20, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(20, 21, 1, 0.07, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(21, 17, 1, 0.11, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(22, 28, 1, 0.05, '2025-10-31 03:59:55', '2025-10-31 04:15:52'),
(23, 18, 1, 0.09, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(24, 4, 1, 0.24, '2025-10-31 03:59:55', '2025-10-31 04:15:49'),
(25, 25, 1, 0.07, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(26, 3, 1, 0.70, '2025-10-31 03:59:55', '2025-10-31 04:15:48'),
(27, 26, 1, 0.06, '2025-10-31 03:59:55', '2025-10-31 04:15:51'),
(28, 13, 1, 0.19, '2025-10-31 03:59:55', '2025-10-31 04:15:50'),
(29, 1, 2, 0.57, '2025-11-01 21:19:50', '2025-11-07 00:32:58'),
(30, 2, 2, 0.42, '2025-11-01 21:19:50', '2025-11-07 00:32:58'),
(31, 3, 2, 0.70, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(32, 4, 2, 0.22, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(33, 5, 2, 0.29, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(34, 7, 2, 0.46, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(35, 8, 2, 0.29, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(36, 9, 2, 0.11, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(37, 10, 2, 0.45, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(38, 11, 2, 0.21, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(39, 12, 2, 0.66, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(40, 13, 2, 0.34, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(41, 14, 2, 0.13, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(42, 15, 2, 0.24, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(43, 16, 2, 0.16, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(44, 17, 2, 0.07, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(45, 18, 2, 0.67, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(46, 19, 2, 0.10, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(47, 20, 2, 0.18, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(48, 21, 2, 0.21, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(49, 22, 2, 0.06, '2025-11-01 21:19:51', '2025-11-07 00:32:58'),
(50, 23, 2, 0.28, '2025-11-01 21:19:51', '2025-11-07 00:32:59'),
(51, 24, 2, 0.69, '2025-11-01 21:19:51', '2025-11-07 00:32:59'),
(52, 25, 2, 0.18, '2025-11-01 21:19:51', '2025-11-07 00:32:59'),
(53, 26, 2, 0.14, '2025-11-01 21:19:51', '2025-11-07 00:32:59'),
(54, 27, 2, 0.47, '2025-11-01 21:19:51', '2025-11-07 00:32:59'),
(55, 28, 2, 0.27, '2025-11-01 21:19:51', '2025-11-07 00:32:59'),
(56, 29, 2, 0.12, '2025-11-01 21:19:51', '2025-11-07 00:32:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` enum('Benefit','Cost') NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `ada_pilihan` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama`, `type`, `bobot`, `ada_pilihan`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'WIN RATE', 'Benefit', 0.04, 0, '2025-10-31 03:18:49', '2025-10-31 03:18:49'),
(2, 'C2', 'PICK RATE', 'Benefit', 0.50, 0, '2025-10-31 03:26:05', '2025-10-31 03:26:05'),
(3, 'C3', 'BAN RATE', 'Benefit', 0.46, 0, '2025-10-31 03:26:25', '2025-10-31 03:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_04_194616_alternatif_table', 1),
(6, '2025_10_04_195121_kriteria_table', 1),
(7, '2025_10_04_195143_sub_kriteria_table', 1),
(8, '2025_10_18_231722_create_periodes_table', 1),
(9, '2025_10_19_001945_penilaian_table', 1),
(10, '2025_10_24_060624_hasil_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` bigint(20) UNSIGNED NOT NULL,
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_periode`, `id_alternatif`, `id_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 49.99, '2025-10-31 03:46:16', '2025-10-31 03:46:16'),
(2, 1, 1, 2, 3.01, '2025-10-31 03:46:16', '2025-10-31 03:46:16'),
(3, 1, 1, 3, 41.83, '2025-10-31 03:46:17', '2025-10-31 03:46:17'),
(4, 1, 2, 1, 52.49, '2025-10-31 03:46:48', '2025-10-31 03:46:48'),
(5, 1, 2, 2, 2.64, '2025-10-31 03:46:48', '2025-10-31 03:46:48'),
(6, 1, 2, 3, 6.18, '2025-10-31 03:46:48', '2025-10-31 03:46:48'),
(7, 1, 3, 1, 46.81, '2025-10-31 03:47:49', '2025-10-31 03:47:49'),
(8, 1, 3, 2, 2.35, '2025-10-31 03:47:49', '2025-10-31 03:47:49'),
(9, 1, 3, 3, 25.20, '2025-10-31 03:47:50', '2025-10-31 03:47:50'),
(10, 1, 4, 1, 49.92, '2025-10-31 03:48:10', '2025-10-31 03:48:10'),
(11, 1, 4, 2, 1.19, '2025-10-31 03:48:10', '2025-10-31 03:48:10'),
(12, 1, 4, 3, 0.26, '2025-10-31 03:48:10', '2025-10-31 03:48:10'),
(13, 1, 5, 1, 51.44, '2025-10-31 03:48:29', '2025-10-31 03:48:29'),
(14, 1, 5, 2, 1.12, '2025-10-31 03:48:29', '2025-10-31 03:48:29'),
(15, 1, 5, 3, 0.89, '2025-10-31 03:48:29', '2025-10-31 03:48:29'),
(16, 1, 7, 1, 54.71, '2025-10-31 03:49:39', '2025-10-31 03:49:39'),
(17, 1, 7, 2, 0.98, '2025-10-31 03:49:39', '2025-10-31 03:49:39'),
(18, 1, 7, 3, 0.63, '2025-10-31 03:49:39', '2025-10-31 03:49:39'),
(19, 1, 8, 1, 46.84, '2025-10-31 03:50:49', '2025-10-31 03:50:49'),
(20, 1, 8, 2, 0.96, '2025-10-31 03:50:50', '2025-10-31 03:50:50'),
(21, 1, 8, 3, 0.36, '2025-10-31 03:50:50', '2025-10-31 03:50:50'),
(22, 1, 9, 1, 49.48, '2025-10-31 03:51:08', '2025-10-31 03:51:08'),
(23, 1, 9, 2, 1.01, '2025-10-31 03:51:09', '2025-10-31 03:51:09'),
(24, 1, 9, 3, 1.23, '2025-10-31 03:51:09', '2025-10-31 03:51:09'),
(25, 1, 10, 1, 49.65, '2025-10-31 03:51:32', '2025-10-31 03:51:32'),
(26, 1, 10, 2, 0.91, '2025-10-31 03:51:32', '2025-10-31 03:51:32'),
(27, 1, 10, 3, 1.23, '2025-10-31 03:51:32', '2025-10-31 03:51:32'),
(28, 1, 11, 1, 49.46, '2025-10-31 03:51:51', '2025-10-31 03:51:51'),
(29, 1, 11, 2, 0.87, '2025-10-31 03:51:52', '2025-10-31 03:51:52'),
(30, 1, 11, 3, 0.23, '2025-10-31 03:51:52', '2025-10-31 03:51:52'),
(31, 1, 12, 1, 46.39, '2025-10-31 03:52:13', '2025-10-31 03:52:13'),
(32, 1, 12, 2, 0.79, '2025-10-31 03:52:13', '2025-10-31 03:52:13'),
(33, 1, 12, 3, 0.40, '2025-10-31 03:52:14', '2025-10-31 03:52:14'),
(34, 1, 13, 1, 55.11, '2025-10-31 03:52:36', '2025-10-31 03:52:36'),
(35, 1, 13, 2, 0.68, '2025-10-31 03:52:37', '2025-10-31 03:52:37'),
(36, 1, 13, 3, 3.46, '2025-10-31 03:52:37', '2025-10-31 03:52:37'),
(37, 1, 14, 1, 45.43, '2025-10-31 03:53:01', '2025-10-31 03:53:01'),
(38, 1, 14, 2, 0.59, '2025-10-31 03:53:01', '2025-10-31 03:53:01'),
(39, 1, 14, 3, 0.19, '2025-10-31 03:53:02', '2025-10-31 03:53:02'),
(40, 1, 15, 1, 54.39, '2025-10-31 03:53:20', '2025-10-31 03:53:20'),
(41, 1, 15, 2, 0.55, '2025-10-31 03:53:20', '2025-10-31 03:53:20'),
(42, 1, 15, 3, 0.37, '2025-10-31 03:53:20', '2025-10-31 03:53:20'),
(43, 1, 16, 1, 52.38, '2025-10-31 03:53:41', '2025-10-31 03:53:41'),
(44, 1, 16, 2, 0.58, '2025-10-31 03:53:42', '2025-10-31 03:53:42'),
(45, 1, 16, 3, 0.11, '2025-10-31 03:53:42', '2025-10-31 03:53:42'),
(46, 1, 17, 1, 52.59, '2025-10-31 03:54:03', '2025-10-31 03:54:03'),
(47, 1, 17, 2, 0.43, '2025-10-31 03:54:03', '2025-10-31 03:54:03'),
(48, 1, 17, 3, 0.05, '2025-10-31 03:54:03', '2025-10-31 03:54:03'),
(49, 1, 18, 1, 42.44, '2025-10-31 03:54:31', '2025-10-31 03:54:31'),
(50, 1, 18, 2, 0.34, '2025-10-31 03:54:31', '2025-10-31 03:54:31'),
(51, 1, 18, 3, 0.03, '2025-10-31 03:54:31', '2025-10-31 03:54:31'),
(52, 1, 19, 1, 46.32, '2025-10-31 03:55:10', '2025-10-31 03:55:10'),
(53, 1, 19, 2, 0.27, '2025-10-31 03:55:10', '2025-10-31 03:55:10'),
(54, 1, 19, 3, 0.11, '2025-10-31 03:55:10', '2025-10-31 03:55:10'),
(55, 1, 20, 1, 49.55, '2025-10-31 03:55:34', '2025-10-31 03:55:34'),
(56, 1, 20, 2, 0.24, '2025-10-31 03:55:34', '2025-10-31 03:55:34'),
(57, 1, 20, 3, 0.06, '2025-10-31 03:55:34', '2025-10-31 03:55:34'),
(58, 1, 21, 1, 44.00, '2025-10-31 03:55:55', '2025-10-31 03:55:55'),
(59, 1, 21, 2, 0.21, '2025-10-31 03:55:55', '2025-10-31 03:55:55'),
(60, 1, 21, 3, 0.03, '2025-10-31 03:55:55', '2025-10-31 03:55:55'),
(61, 1, 22, 1, 53.91, '2025-10-31 03:57:29', '2025-10-31 03:57:29'),
(62, 1, 22, 2, 0.23, '2025-10-31 03:57:29', '2025-10-31 03:57:29'),
(63, 1, 22, 3, 0.17, '2025-10-31 03:57:29', '2025-10-31 03:57:29'),
(64, 1, 23, 1, 46.42, '2025-10-31 03:57:48', '2025-10-31 03:57:48'),
(65, 1, 23, 2, 0.17, '2025-10-31 03:57:48', '2025-10-31 03:57:48'),
(66, 1, 23, 3, 0.04, '2025-10-31 03:57:48', '2025-10-31 03:57:48'),
(67, 1, 24, 1, 41.23, '2025-10-31 03:58:07', '2025-10-31 03:58:07'),
(68, 1, 24, 2, 0.14, '2025-10-31 03:58:07', '2025-10-31 03:58:07'),
(69, 1, 24, 3, 0.15, '2025-10-31 03:58:07', '2025-10-31 03:58:07'),
(70, 1, 25, 1, 51.34, '2025-10-31 03:58:30', '2025-10-31 03:58:30'),
(71, 1, 25, 2, 0.17, '2025-10-31 03:58:30', '2025-10-31 03:58:30'),
(72, 1, 25, 3, 0.03, '2025-10-31 03:58:30', '2025-10-31 03:58:30'),
(73, 1, 26, 1, 45.12, '2025-10-31 03:58:49', '2025-10-31 03:58:49'),
(74, 1, 26, 2, 0.15, '2025-10-31 03:58:49', '2025-10-31 03:58:49'),
(75, 1, 26, 3, 0.07, '2025-10-31 03:58:49', '2025-10-31 03:58:49'),
(76, 1, 27, 1, 43.73, '2025-10-31 03:59:09', '2025-10-31 03:59:09'),
(77, 1, 27, 2, 0.12, '2025-10-31 03:59:09', '2025-10-31 03:59:09'),
(78, 1, 27, 3, 0.11, '2025-10-31 03:59:09', '2025-10-31 03:59:09'),
(79, 1, 28, 1, 40.68, '2025-10-31 03:59:27', '2025-10-31 03:59:27'),
(80, 1, 28, 2, 0.15, '2025-10-31 03:59:29', '2025-10-31 03:59:29'),
(81, 1, 28, 3, 0.02, '2025-10-31 03:59:29', '2025-10-31 03:59:29'),
(82, 1, 29, 1, 44.10, '2025-10-31 03:59:49', '2025-10-31 03:59:49'),
(83, 1, 29, 2, 0.13, '2025-10-31 03:59:49', '2025-10-31 03:59:49'),
(84, 1, 29, 3, 0.01, '2025-10-31 03:59:49', '2025-10-31 03:59:49'),
(85, 2, 1, 1, 51.83, '2025-11-01 21:08:59', '2025-11-01 21:08:59'),
(86, 2, 1, 2, 1.30, '2025-11-01 21:08:59', '2025-11-01 21:08:59'),
(87, 2, 1, 3, 3.12, '2025-11-01 21:08:59', '2025-11-01 21:08:59'),
(88, 2, 2, 1, 49.50, '2025-11-01 21:09:19', '2025-11-01 21:09:19'),
(89, 2, 2, 2, 1.17, '2025-11-01 21:09:19', '2025-11-01 21:09:19'),
(90, 2, 2, 3, 1.53, '2025-11-01 21:09:19', '2025-11-01 21:09:19'),
(91, 2, 3, 1, 48.60, '2025-11-01 21:09:38', '2025-11-01 21:09:38'),
(92, 2, 3, 2, 0.89, '2025-11-01 21:09:38', '2025-11-01 21:09:38'),
(93, 2, 3, 3, 6.31, '2025-11-01 21:09:38', '2025-11-01 21:09:38'),
(94, 2, 4, 1, 52.16, '2025-11-01 21:09:58', '2025-11-01 21:09:58'),
(95, 2, 4, 2, 0.71, '2025-11-01 21:09:58', '2025-11-01 21:09:58'),
(96, 2, 4, 3, 0.28, '2025-11-01 21:09:58', '2025-11-01 21:09:58'),
(97, 2, 5, 1, 51.19, '2025-11-01 21:10:17', '2025-11-01 21:10:17'),
(98, 2, 5, 2, 0.71, '2025-11-01 21:10:17', '2025-11-01 21:10:17'),
(99, 2, 5, 3, 1.22, '2025-11-01 21:10:17', '2025-11-01 21:10:17'),
(100, 2, 7, 1, 52.82, '2025-11-01 21:10:38', '2025-11-01 21:10:38'),
(101, 2, 7, 2, 0.80, '2025-11-01 21:10:38', '2025-11-01 21:10:38'),
(102, 2, 7, 3, 3.17, '2025-11-01 21:10:38', '2025-11-01 21:10:38'),
(103, 2, 8, 1, 50.28, '2025-11-01 21:10:59', '2025-11-01 21:10:59'),
(104, 2, 8, 2, 0.93, '2025-11-01 21:10:59', '2025-11-01 21:10:59'),
(105, 2, 8, 3, 0.45, '2025-11-01 21:10:59', '2025-11-01 21:10:59'),
(106, 2, 9, 1, 46.63, '2025-11-01 21:11:17', '2025-11-01 21:11:17'),
(107, 2, 9, 2, 0.29, '2025-11-01 21:11:17', '2025-11-01 21:11:17'),
(108, 2, 9, 3, 0.14, '2025-11-01 21:11:17', '2025-11-01 21:11:17'),
(109, 2, 10, 1, 46.05, '2025-11-01 21:11:39', '2025-11-01 21:11:39'),
(110, 2, 10, 2, 0.77, '2025-11-01 21:11:39', '2025-11-01 21:11:39'),
(111, 2, 10, 3, 3.23, '2025-11-01 21:11:40', '2025-11-01 21:11:40'),
(112, 2, 11, 1, 51.06, '2025-11-01 21:11:58', '2025-11-01 21:11:58'),
(113, 2, 11, 2, 0.54, '2025-11-01 21:11:58', '2025-11-01 21:11:58'),
(114, 2, 11, 3, 0.62, '2025-11-01 21:11:58', '2025-11-01 21:11:58'),
(115, 2, 12, 1, 50.65, '2025-11-01 21:12:21', '2025-11-01 21:12:21'),
(116, 2, 12, 2, 1.62, '2025-11-01 21:12:21', '2025-11-01 21:12:21'),
(117, 2, 12, 3, 3.41, '2025-11-01 21:12:21', '2025-11-01 21:12:21'),
(118, 2, 13, 1, 50.60, '2025-11-01 21:12:41', '2025-11-01 21:12:41'),
(119, 2, 13, 2, 0.41, '2025-11-01 21:12:41', '2025-11-01 21:12:41'),
(120, 2, 13, 3, 2.87, '2025-11-01 21:12:41', '2025-11-01 21:12:41'),
(121, 2, 14, 1, 49.48, '2025-11-01 21:13:02', '2025-11-01 21:13:02'),
(122, 2, 14, 2, 0.33, '2025-11-01 21:13:04', '2025-11-01 21:13:04'),
(123, 2, 14, 3, 0.25, '2025-11-01 21:13:04', '2025-11-01 21:13:04'),
(124, 2, 15, 1, 50.46, '2025-11-01 21:13:28', '2025-11-01 21:13:28'),
(125, 2, 15, 2, 0.72, '2025-11-01 21:13:28', '2025-11-01 21:13:28'),
(126, 2, 15, 3, 0.50, '2025-11-01 21:13:28', '2025-11-01 21:13:28'),
(127, 2, 16, 1, 48.36, '2025-11-01 21:13:48', '2025-11-01 21:13:48'),
(128, 2, 16, 2, 0.44, '2025-11-01 21:13:49', '2025-11-01 21:13:49'),
(129, 2, 16, 3, 0.30, '2025-11-01 21:13:49', '2025-11-01 21:13:49'),
(130, 2, 17, 1, 44.37, '2025-11-01 21:14:20', '2025-11-01 21:14:20'),
(131, 2, 17, 2, 0.12, '2025-11-01 21:14:20', '2025-11-01 21:14:20'),
(132, 2, 17, 3, 0.08, '2025-11-01 21:14:20', '2025-11-01 21:14:20'),
(133, 2, 18, 1, 50.96, '2025-11-01 21:14:40', '2025-11-01 21:14:40'),
(134, 2, 18, 2, 2.16, '2025-11-01 21:14:40', '2025-11-01 21:14:40'),
(135, 2, 18, 3, 1.85, '2025-11-01 21:14:40', '2025-11-01 21:14:40'),
(136, 2, 19, 1, 48.84, '2025-11-01 21:15:00', '2025-11-01 21:15:00'),
(137, 2, 19, 2, 0.24, '2025-11-01 21:15:00', '2025-11-01 21:15:00'),
(138, 2, 19, 3, 0.12, '2025-11-01 21:15:00', '2025-11-01 21:15:00'),
(139, 2, 20, 1, 52.42, '2025-11-01 21:15:21', '2025-11-01 21:15:21'),
(140, 2, 20, 2, 0.52, '2025-11-01 21:15:21', '2025-11-01 21:15:21'),
(141, 2, 20, 3, 0.27, '2025-11-01 21:15:21', '2025-11-01 21:15:21'),
(142, 2, 21, 1, 49.19, '2025-11-01 21:15:41', '2025-11-01 21:15:41'),
(143, 2, 21, 2, 0.62, '2025-11-01 21:15:42', '2025-11-01 21:15:42'),
(144, 2, 21, 3, 0.35, '2025-11-01 21:15:42', '2025-11-01 21:15:42'),
(145, 2, 22, 1, 47.34, '2025-11-01 21:16:01', '2025-11-01 21:16:01'),
(146, 2, 22, 2, 0.07, '2025-11-01 21:16:01', '2025-11-01 21:16:01'),
(147, 2, 22, 3, 0.16, '2025-11-01 21:16:01', '2025-11-01 21:16:01'),
(148, 2, 23, 1, 51.23, '2025-11-01 21:16:19', '2025-11-01 21:16:19'),
(149, 2, 23, 2, 0.89, '2025-11-01 21:16:19', '2025-11-01 21:16:19'),
(150, 2, 23, 3, 0.45, '2025-11-01 21:16:19', '2025-11-01 21:16:19'),
(151, 2, 24, 1, 46.44, '2025-11-01 21:16:40', '2025-11-01 21:16:40'),
(152, 2, 24, 2, 1.44, '2025-11-01 21:16:41', '2025-11-01 21:16:41'),
(153, 2, 24, 3, 4.44, '2025-11-01 21:16:41', '2025-11-01 21:16:41'),
(154, 2, 25, 1, 53.93, '2025-11-01 21:16:59', '2025-11-01 21:16:59'),
(155, 2, 25, 2, 0.35, '2025-11-01 21:17:00', '2025-11-01 21:17:00'),
(156, 2, 25, 3, 0.84, '2025-11-01 21:17:00', '2025-11-01 21:17:00'),
(157, 2, 26, 1, 49.61, '2025-11-01 21:17:19', '2025-11-01 21:17:19'),
(158, 2, 26, 2, 0.28, '2025-11-01 21:17:19', '2025-11-01 21:17:19'),
(159, 2, 26, 3, 0.47, '2025-11-01 21:17:19', '2025-11-01 21:17:19'),
(160, 2, 27, 1, 49.28, '2025-11-01 21:17:36', '2025-11-01 21:17:36'),
(161, 2, 27, 2, 0.80, '2025-11-01 21:17:36', '2025-11-01 21:17:36'),
(162, 2, 27, 3, 3.43, '2025-11-01 21:17:36', '2025-11-01 21:17:36'),
(163, 2, 28, 1, 50.93, '2025-11-01 21:17:57', '2025-11-01 21:17:57'),
(164, 2, 28, 2, 0.73, '2025-11-01 21:17:57', '2025-11-01 21:17:57'),
(165, 2, 28, 3, 0.82, '2025-11-01 21:17:57', '2025-11-01 21:17:57'),
(166, 2, 29, 1, 48.36, '2025-11-01 21:18:35', '2025-11-01 21:18:35'),
(167, 2, 29, 2, 0.32, '2025-11-01 21:18:35', '2025-11-01 21:18:35'),
(168, 2, 29, 3, 0.18, '2025-11-01 21:18:35', '2025-11-01 21:18:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periodes`
--

CREATE TABLE `periodes` (
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `nama_periode` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periodes`
--

INSERT INTO `periodes` (`id_periode`, `nama_periode`, `tanggal_mulai`, `tanggal_selesai`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '29 Juni 2025', '2025-06-29', '2025-06-29', 0, '2025-10-31 03:41:12', '2025-11-01 21:08:01'),
(2, '29 Oktober 2025', '2025-10-29', '2025-10-29', 1, '2025-11-01 21:07:09', '2025-11-01 21:07:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$kZIb0mBQaIVnEXWSUv04WugT00A3oP8GxWIV.OkruhP2F0eoH3hWu', 'Administrator', 'admin@gmail.com', 'admin', NULL, NULL),
(2, 'myuser', '$2y$10$4s6OW.nVqJhRcxCD028RTOAuPd/mJ4bxZt2Jo1ravS6fOM091lSly', 'User', 'myuser@gmail.com', 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `hasil_id_alternatif_foreign` (`id_alternatif`),
  ADD KEY `hasil_id_periode_foreign` (`id_periode`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `kriteria_kode_kriteria_unique` (`kode_kriteria`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD UNIQUE KEY `penilaian_id_periode_id_alternatif_id_kriteria_unique` (`id_periode`,`id_alternatif`,`id_kriteria`),
  ADD KEY `penilaian_id_alternatif_foreign` (`id_alternatif`),
  ADD KEY `penilaian_id_kriteria_foreign` (`id_kriteria`);

--
-- Indeks untuk tabel `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `sub_kriteria_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT untuk tabel `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id_periode` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id_periode`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id_periode`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
