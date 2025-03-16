-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Nov 2024 pada 01.11
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('AKTIF','NONAKTIF') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AKTIF',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id`, `jenis_laporan`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
('5606817f-0a89-4d44-afe6-5c7ee0c5ddcd', 'KENDALA TEKNIS PERANGKAT ELEKTRONIK', 'lorem ipsum dolor si amor', 'AKTIF', '2023-08-17 05:49:41', '2023-08-17 05:49:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2023_08_10_121918_create_jenis_kendala', 1),
(12, '2023_08_10_121950_create_laporan_kendala', 1),
(23, '2014_10_12_000000_create_users_table', 2),
(24, '2014_10_12_100000_create_password_resets_table', 2),
(25, '2019_08_19_000000_create_failed_jobs_table', 2),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(27, '2023_05_22_070256_create_pengaduans_table', 2),
(28, '2023_05_22_070554_create_jenis_laporan_table', 2),
(29, '2023_05_22_070702_create_pengaturans_sistem_table', 2),
(30, '2023_05_29_020624_pengaturan_email', 2),
(31, '2023_06_10_025012_change_column_mailer_in_pengaturan_email_table', 2),
(32, '2023_08_16_113139_create_prioritas_laporan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_unik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_laporan` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prioritas_laporan` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telephone` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_kendala` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('BARU','DITERIMA','DALAM PROSES','TIDAK VALID','SELESAI') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_proses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_selesai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `kode_unik`, `id_jenis_laporan`, `id_prioritas_laporan`, `id_petugas`, `nrp`, `satuan`, `nama_pelapor`, `no_telephone`, `email`, `uraian_kendala`, `file`, `status`, `gambar_proses`, `gambar_selesai`, `created_at`, `updated_at`) VALUES
('896652ce-b755-4bea-aa5a-a2b3dad223a2', 'TWG2K54NCC', '5606817f-0a89-4d44-afe6-5c7ee0c5ddcd', '20e6056c-87f4-4ded-aa38-906d92e6687b', NULL, '12345678', '123123', 'Endra setiawan', '1231231231111', 'setiaendra18@gmail.com', 'lorem asdfasdf asdf', 'TWG2K54NCC-SAMPLE_UPLOAD.pdf', 'BARU', NULL, NULL, '2023-09-28 17:46:11', '2023-09-28 17:46:11'),
('920f6dfa-936e-4c0d-b65e-a9a3bf4dba64', 'MNYWPALWCU', '5606817f-0a89-4d44-afe6-5c7ee0c5ddcd', '20e6056c-87f4-4ded-aa38-906d92e6687b', 'f90e4e10-bde4-4cde-8fe9-d20e5c0da4a2', NULL, NULL, 'Endra setiawan', '0813433990011', 'company@example.com', '123123', 'MNYWPALWCU-SAMPLE_UPLOAD.pdf', 'SELESAI', 'download (1).jpeg', 'SELESAI_sample.png', '2023-08-19 06:11:12', '2023-09-05 07:19:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans_email`
--

CREATE TABLE `pengaturans_email` (
  `mailer` enum('SMTP','IMAP','POP3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SMTP',
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int NOT NULL,
  `encryption` enum('SSL','TLS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SSL',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans_sistem`
--

CREATE TABLE `pengaturans_sistem` (
  `nama_sistem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telephone` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_domain` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturans_sistem`
--

INSERT INTO `pengaturans_sistem` (`nama_sistem`, `nama_instansi`, `no_telephone`, `email`, `url_domain`, `alamat`, `author`, `logo_images`, `background`) VALUES
('HELP DESK', 'PUZIAD JAKARTA', '0813433990011', 'bima@example.com', 'https://google.com', 'Jl. Kesatria Bima, Garuda No. 172, Khayangan, Sangsekerta.', 'TEST', 'LOGO-PUSZIAD-BINTANG-2.png', 'wallpaper.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prioritas_laporan`
--

CREATE TABLE `prioritas_laporan` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('AKTIF','NONAKTIF') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AKTIF',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prioritas_laporan`
--

INSERT INTO `prioritas_laporan` (`id`, `nama`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
('20e6056c-87f4-4ded-aa38-906d92e6687b', 'MENDESAK', 'LAPORAN MENDESAK', 'AKTIF', '2023-08-18 16:26:01', '2023-08-18 16:26:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pengaduan`
--

CREATE TABLE `riwayat_pengaduan` (
  `id` char(36) NOT NULL,
  `id_laporan` char(36) NOT NULL,
  `foto_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','teknisi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `telephone`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
('f2165b89-9c09-4baa-ae81-c387940efd00', 'Endra Setiawan', 'setiaendra18', 'setiaendra18@gmail.com', NULL, '$2y$10$X/X49Su7mn2ZrcAntoFfLeWTXYDEmW3aShUVfMMQm1YVaVaaJWqf2', '122231', 'teknisi', NULL, '2023-09-13 17:44:08', '2023-09-13 17:44:08'),
('f90e4e10-bde4-4cde-8fe9-d20e5c0da4a2', 'Administrators', 'admin', 'admin@gmail.com', NULL, '$2y$10$KWmWCtzJe47ZcOdbAGVHK.SWx7JiyEx9EsIP6kPIxr0n8/H9O3AnS', '08134331699', 'admin', NULL, NULL, '2023-09-13 17:32:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prioritas` (`id_prioritas_laporan`),
  ADD KEY `jenis` (`id_jenis_laporan`),
  ADD KEY `admin` (`id_petugas`);

--
-- Indeks untuk tabel `pengaturans_email`
--
ALTER TABLE `pengaturans_email`
  ADD UNIQUE KEY `pengaturans_email_mailer_unique` (`mailer`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prioritas_laporan`
--
ALTER TABLE `prioritas_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_pengaduan`
--
ALTER TABLE `riwayat_pengaduan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD CONSTRAINT `admin` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jenis` FOREIGN KEY (`id_jenis_laporan`) REFERENCES `jenis_laporan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `prioritas` FOREIGN KEY (`id_prioritas_laporan`) REFERENCES `prioritas_laporan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
