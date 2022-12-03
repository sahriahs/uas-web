-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2022 pada 10.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_villa`
--

CREATE TABLE `data_villa` (
  `id_villa` int(11) NOT NULL,
  `nama_villa` varchar(64) NOT NULL,
  `gambar_villa` varchar(64) NOT NULL,
  `deskripsi_villa` varchar(255) NOT NULL,
  `harga_villa` varchar(20) NOT NULL,
  `alamat_villa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_villa`
--

INSERT INTO `data_villa` (`id_villa`, `nama_villa`, `gambar_villa`, `deskripsi_villa`, `harga_villa`, `alamat_villa`) VALUES
(1, 'Gemilang Villa', 'g-5.jpg', 'Villa bergaya modern dengan pemndangan indah di pantai bali', '3000000', 'Pantai Bali'),
(2, 'Damai Jiwa Villa', 'g-2.jpg', 'Vila yang memberikan sensasi nyaman dan menyuguhkan langsung pemandangan indonesia yang asri', '500000', 'Puncak'),
(3, 'Baksu Villa', 'g-3.jpg', 'Villa di pinggir kota yang indah dan modern dan sangat nyamat dikunjungi bersama teman', '700000', 'Bandung'),
(4, 'Selari Villa', 'g-4.jpg', 'Berlibur untuk menikmati alam sekaligus meniti rasa dengan jiwa semakin nyaman dengan fasilitas yang diberikan', '300000', 'Malang'),
(43, 'Villa bumi merah', 'g-6.jpg', 'ini villa bukan sembarang villa', '1500000', 'Berau city');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan_villa`
--

CREATE TABLE `penyewaan_villa` (
  `id_sewa` int(11) NOT NULL,
  `id_villa` int(11) NOT NULL,
  `nama_penyewa` varchar(55) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `tgl_datang` date NOT NULL,
  `tgl_pergi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_villa`
--
ALTER TABLE `data_villa`
  ADD PRIMARY KEY (`id_villa`);

--
-- Indeks untuk tabel `penyewaan_villa`
--
ALTER TABLE `penyewaan_villa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_villa` (`id_villa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_villa`
--
ALTER TABLE `data_villa`
  MODIFY `id_villa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `penyewaan_villa`
--
ALTER TABLE `penyewaan_villa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penyewaan_villa`
--
ALTER TABLE `penyewaan_villa`
  ADD CONSTRAINT `penyewaan_villa_ibfk_1` FOREIGN KEY (`id_villa`) REFERENCES `data_villa` (`id_villa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
