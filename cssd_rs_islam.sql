-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2024 pada 03.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cssd_rs_islam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_medis`
--

CREATE TABLE `alat_medis` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat_medis`
--

INSERT INTO `alat_medis` (`id_alat`, `nama_alat`, `jenis`, `jumlah`) VALUES
(1, 'Stetoskop', 'Alat Medis', 50),
(2, 'Termometer', 'Alat Medis', 30),
(3, 'Sphygmomanometer', 'Alat Medis', 20),
(4, 'Oksimeter', 'Alat Medis', 15),
(5, 'Nebulizer', 'Alat Medis', 10),
(6, 'Alat Ukur Gula Darah', 'Alat Medis', 25),
(7, 'Kursi Roda', 'Alat Medis', 5),
(8, 'Alat Pijat', 'Alat Medis', 8),
(9, 'Alat Bantu Dengar', 'Alat Medis', 12),
(10, 'Alat Cuci Darah', 'Alat Medis', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_alat`, `tanggal_keluar`, `jumlah_keluar`, `pengguna_id`, `id_unit`) VALUES
(1, 1, '2023-01-12', 5, 1, 5),
(2, 2, '2023-01-15', 2, 1, 4),
(3, 3, '2023-01-18', 3, 2, 3),
(4, 4, '2023-01-22', 1, 2, 2),
(5, 5, '2023-01-25', 2, 3, 1),
(6, 6, '2023-01-28', 5, 3, 5),
(7, 7, '2023-02-01', 1, 1, 4),
(8, 8, '2023-02-03', 1, 2, 3),
(9, 9, '2023-02-05', 2, 3, 2),
(10, 10, '2023-02-10', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_alat`, `tanggal_masuk`, `jumlah_masuk`, `pengguna_id`, `id_unit`) VALUES
(1, 1, '2023-01-10', 10, 1, 4),
(2, 2, '2023-01-12', 5, 1, 2),
(3, 3, '2023-01-15', 8, 2, 3),
(4, 4, '2023-01-20', 12, 2, 4),
(5, 5, '2023-01-22', 6, 3, 5),
(6, 6, '2023-01-25', 15, 3, 1),
(7, 7, '2023-01-28', 4, 1, 2),
(8, 8, '2023-02-01', 3, 2, 3),
(9, 9, '2023-02-05', 7, 3, 4),
(10, 10, '2023-02-10', 2, 1, 5),
(11, 1, '2013-01-23', 1, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_rusak`
--

CREATE TABLE `barang_rusak` (
  `id_barang_rusak` int(11) NOT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `tanggal_rusak` date DEFAULT NULL,
  `jumlah_rusak` int(11) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_rusak`
--

INSERT INTO `barang_rusak` (`id_barang_rusak`, `id_alat`, `tanggal_rusak`, `jumlah_rusak`, `alasan`, `pengguna_id`) VALUES
(1, 1, '2023-01-15', 2, 'Kerusakan pada selang stetoskop', 1),
(2, 2, '2023-01-18', 2, 'Termometer tidak berfungsi', 1),
(3, 3, '2023-01-20', 1, 'Sphygmomanometer bocor', 2),
(4, 4, '2023-01-22', 1, 'Oksimeter tidak memberikan hasil', 2),
(5, 5, '2023-01-25', 1, 'Nebulizer tidak mengeluarkan uap', 3),
(6, 6, '2023-01-28', 3, 'Alat ukur gula darah error', 3),
(7, 7, '2023-02-01', 1, 'Kursi roda rusak pada roda', 1),
(8, 8, '2023-02-03', 1, 'Alat pijat tidak berfungsi', 2),
(9, 9, '2023-02-05', 2, 'Alat bantu dengar tidak mengeluarkan suara', 3),
(10, 10, '2023-02-10', 1, 'Alat cuci darah mengalami kerusakan mekanis', 1),
(17, 9, '2024-11-29', 1, 'gak tau juga', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_barang_masuk` int(11) DEFAULT NULL,
  `id_barang_keluar` int(11) DEFAULT NULL,
  `id_barang_rusak` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Al Farabi'),
(2, 'Al Haitam'),
(3, 'Al Razi'),
(4, 'Paviliun Ibnu Sina'),
(5, 'Poliklinik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `nomor_telepon`, `alamat`, `level`) VALUES
(1, 'admin', 'admin', 'rasyid', '0888888', 'handil bakti', 1),
(2, 'user', 'user', 'abdul', '0891237252', 'anjir muara', 2),
(3, 'user2', 'user2', 'gundul', '0888888', 'jati barat', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat_medis`
--
ALTER TABLE `alat_medis`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `fk_barang_keluar_unit` (`id_unit`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `fk_barang_masuk_unit` (`id_unit`);

--
-- Indeks untuk tabel `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD PRIMARY KEY (`id_barang_rusak`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_barang_masuk` (`id_barang_masuk`),
  ADD KEY `id_barang_keluar` (`id_barang_keluar`),
  ADD KEY `id_barang_rusak` (`id_barang_rusak`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat_medis`
--
ALTER TABLE `alat_medis`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id_barang_rusak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat_medis` (`id_alat`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_barang_keluar_unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat_medis` (`id_alat`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_barang_masuk_unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD CONSTRAINT `barang_rusak_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat_medis` (`id_alat`),
  ADD CONSTRAINT `barang_rusak_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_barang_masuk`) REFERENCES `barang_masuk` (`id_barang_masuk`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_barang_keluar`) REFERENCES `barang_keluar` (`id_barang_keluar`),
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`id_barang_rusak`) REFERENCES `barang_rusak` (`id_barang_rusak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
