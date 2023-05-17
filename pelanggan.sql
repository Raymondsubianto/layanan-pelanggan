-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2023 pada 15.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_login`
--

CREATE TABLE `db_login` (
  `id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_login`
--

INSERT INTO `db_login` (`id`, `username`, `password`, `id_level`) VALUES
(1, 'Raymond', '123', 3),
(4, 'admin', 'admin', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bulanan`
--

CREATE TABLE `tb_bulanan` (
  `id_bulanan` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `bulan` char(9) NOT NULL,
  `pemakaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bulanan`
--

INSERT INTO `tb_bulanan` (`id_bulanan`, `username`, `bulan`, `pemakaian`) VALUES
(1, 'Raymond', 'Februari', 12093),
(3, 'admin', 'agustus', 12321),
(5, 'Raymond', 'mei', 344312),
(7, 'Raymond', 'juni', 12456),
(8, 'admin', 'april', 123123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(8) NOT NULL,
  `username` char(20) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id_keluhan`, `username`, `keluhan`) VALUES
(1, 'Raymond', 'meter rusak,karena sudah tua'),
(12, 'raymond', 'tiang miring'),
(14, 'raymond', 'sering terjadi trip'),
(18, '2023-04-06T12:58', 'meter rusak, karena sudah tuaa'),
(19, 'Admin', 'meter rusak, karena sudah tua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id_lyn` int(6) NOT NULL,
  `username` char(20) NOT NULL,
  `layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_layanan`
--

INSERT INTO `tb_layanan` (`id_lyn`, `username`, `layanan`) VALUES
(1, 'Raymond', 'geser tiang karena menutupi pintu depan'),
(22, 'raymond', 'tambah dayaa'),
(25, 'raymond', 'pasang baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemadaman`
--

CREATE TABLE `tb_pemadaman` (
  `id_pemadaman` int(4) NOT NULL,
  `lokasi` varchar(15) NOT NULL,
  `waktu` datetime NOT NULL,
  `estimasi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemadaman`
--

INSERT INTO `tb_pemadaman` (`id_pemadaman`, `lokasi`, `waktu`, `estimasi`) VALUES
(7, 'Delanggu', '2023-04-17 20:37:00', 1),
(8, 'Karanganom', '2023-04-18 20:48:00', 2),
(9, 'Tempursari', '2023-04-19 08:09:00', 1),
(10, 'Jogonalan', '2023-04-24 09:09:00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_plg`
--

CREATE TABLE `tb_plg` (
  `id_plg` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` char(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `daya` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_plg`
--

INSERT INTO `tb_plg` (`id_plg`, `username`, `nama`, `alamat`, `daya`) VALUES
(1, 'Raymond', 'Raymond Subianto', 'Solo', 1350),
(3, 'theo', 'Theo', 'Solo', 1350),
(8, 'admin', 'Admins', 'solo jugaa', 1350);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_switching`
--

CREATE TABLE `tb_switching` (
  `id_switching` int(3) NOT NULL,
  `waktu` datetime NOT NULL,
  `openclose` varchar(5) NOT NULL,
  `switching` varchar(5) NOT NULL,
  `lokasi` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_switching`
--

INSERT INTO `tb_switching` (`id_switching`, `waktu`, `openclose`, `switching`, `lokasi`) VALUES
(6, '2023-04-17 19:54:00', 'Buka', 'ABSw', 'Delanggu'),
(7, '2023-04-17 20:55:00', 'Tutup', 'ABSw', 'Delanggu'),
(8, '2023-04-18 09:55:00', 'Buka', 'LBS', 'Karanganom'),
(9, '2023-04-18 11:56:00', 'Tutup', 'LBS', 'Karanganom');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_login`
--
ALTER TABLE `db_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_bulanan`
--
ALTER TABLE `tb_bulanan`
  ADD PRIMARY KEY (`id_bulanan`);

--
-- Indeks untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indeks untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id_lyn`);

--
-- Indeks untuk tabel `tb_pemadaman`
--
ALTER TABLE `tb_pemadaman`
  ADD PRIMARY KEY (`id_pemadaman`);

--
-- Indeks untuk tabel `tb_plg`
--
ALTER TABLE `tb_plg`
  ADD PRIMARY KEY (`id_plg`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_switching`
--
ALTER TABLE `tb_switching`
  ADD PRIMARY KEY (`id_switching`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_login`
--
ALTER TABLE `db_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_bulanan`
--
ALTER TABLE `tb_bulanan`
  MODIFY `id_bulanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id_keluhan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id_lyn` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_pemadaman`
--
ALTER TABLE `tb_pemadaman`
  MODIFY `id_pemadaman` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_plg`
--
ALTER TABLE `tb_plg`
  MODIFY `id_plg` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_switching`
--
ALTER TABLE `tb_switching`
  MODIFY `id_switching` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
