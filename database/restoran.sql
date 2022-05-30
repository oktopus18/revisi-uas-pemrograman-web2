-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2022 pada 03.03
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_paket`
--

CREATE TABLE `is_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_restoran` varchar(30) NOT NULL,
  `daftar_paket` enum('Paket_Nasi_Tempe_Orek','Paket_Nasi_Sate_Padang','Nasi_ayam') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_paket`
--

INSERT INTO `is_paket` (`id_paket`, `nama_restoran`, `daftar_paket`, `harga`) VALUES
(1, 'Restoran Padang Sederhana', 'Paket_Nasi_Sate_Padang', 40000),
(2, 'Soto Ayam Ndelik', 'Nasi_ayam', 50000),
(3, 'Warteg Kharisma', 'Paket_Nasi_Tempe_Orek', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_transaksi`
--

CREATE TABLE `is_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_transaksi`
--

INSERT INTO `is_transaksi` (`id_transaksi`, `tanggal`, `nama_pelanggan`, `no_hp`, `paket`) VALUES
('TR-00001', '2022-05-30', 'syuhada', '082122123', 3),
('TR-00003', '2022-05-28', 'ressa', '082192319239', 2),
('TR-00004', '2022-05-30', 'Sonasa Rinusantoro', '081231212', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_user`
--

CREATE TABLE `is_user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_user`
--

INSERT INTO `is_user` (`id_user`, `username`, `password`, `nama_user`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(2, 'syuhada', 'c664c3ce1e6d809f591d6c80cb9695eb', 'Muhammad Syuhada', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `is_paket`
--
ALTER TABLE `is_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `is_transaksi`
--
ALTER TABLE `is_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `paket` (`paket`);

--
-- Indeks untuk tabel `is_user`
--
ALTER TABLE `is_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `is_paket`
--
ALTER TABLE `is_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `is_user`
--
ALTER TABLE `is_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `is_transaksi`
--
ALTER TABLE `is_transaksi`
  ADD CONSTRAINT `is_transaksi_lbfk_1` FOREIGN KEY (`paket`) REFERENCES `is_paket` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
