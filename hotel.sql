-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2023 pada 10.53
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id` int(11) NOT NULL,
  `nama_fasilitashotel` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id`, `nama_fasilitashotel`, `keterangan`, `gambar`) VALUES
(1, 'free wi-fi', 'nyaman terpercaya', '11.jpeg'),
(2, 'kolam renang', 'gratis untuk semua tamu', '7.jpg'),
(3, 'gym', 'khusus tamu penthouse', '3.jpeg'),
(4, 'resto dalam hotel', 'untuk semua', '14.jpg'),
(5, 'free breakfast', 'tamu vvip', '6.jpg'),
(6, 'layanan resepsionis 24 jam', 'menerima keluhan semua tamu', '9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `fasilitaskamar_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`fasilitaskamar_id`, `kamar_id`, `fasilitas`) VALUES
(1, 1, 'tempat tidur, AC, TV, perlengkapan mandi, dan air minum.'),
(4, 3, 'Pengering rambut,AC,TV,Kulkas,Fasilitas pembuatan teh dan kopi.'),
(6, 5, 'Ranjang standar,meja rias kecil,kamar mandi,dan AC.'),
(7, 7, 'Tempat bak mandi,AC,Tempat Tidur Double,Televisi,Wireless Internet.'),
(8, 11, 'Pintu penghubung,kamar mandi,AC,Televisi,2 tempat tidur.'),
(9, 9, 'AC,TV,Tempat makan,Meja Setrika,Tempat Tidur King.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guest`
--

INSERT INTO `guest` (`id`, `name`, `username`, `password`, `tlp`) VALUES
(1, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', '4'),
(2, 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', '6'),
(3, 'sitiaeni', 'aeni', '5080746dea800ccb3ac99e1bf4731183', '222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('checkin','checkout') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `tipe_kamar`, `harga`, `gambar`, `status`) VALUES
(1, 'Standard room', 250, 'Alt-Text-1.jpg', 'checkout'),
(2, 'Superior room', 300, 'Alt-Text-2.jpg', 'checkin'),
(3, 'Deluxe room', 300, 'Alt-Text-3.jpg\r\n', 'checkout'),
(4, 'Twin room', 150, 'Alt-Text-4.jpg', 'checkin'),
(5, 'Single room', 750, 'Alt-Text-5.jpg', 'checkout'),
(6, 'Double room', 500, 'Alt-Text-6.jpg', 'checkin'),
(7, 'Family room', 850, 'Alt-Text-7.jpg', 'checkout'),
(8, 'Junior suite', 400, 'Alt-Text-8.jpg', 'checkin'),
(9, 'Suite room', 350, 'ALt-Text-9.jpg', 'checkout'),
(10, 'Presidential suite', 950, 'Alt-Text-10.jpg', 'checkin'),
(11, 'Connecting room', 500, 'Alt-Text-11.jpg', 'checkout'),
(12, 'Murphy room', 800, 'Alt-Text-12.jpg', 'checkin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `user_id`, `email`, `no_hp`, `kamar_id`, `checkin`, `checkout`, `jumlah`, `status`) VALUES
(36, 2, 'ujang@gmail.com', 111, 1, '2023-03-11', '2023-03-25', 3500, 'checkin'),
(37, 2, 'ujang@gmail.com', 111, 1, '2023-03-11', '2023-03-25', 3500, 'proses'),
(38, 3, 'siti@gmail.com', 2222, 1, '2023-03-10', '2023-03-11', 750, 'proses'),
(39, 3, 'siti@gmail.com', 2222, 3, '2023-03-12', '2023-03-13', 900, 'proses'),
(40, 1, 'anisaputri23141@gmail.com', 2222, 2, '2023-03-10', '2023-03-15', 1500, 'checkin'),
(41, 1, 'anisaputri23141@gmail.com', 2222, 2, '2023-03-10', '2023-03-15', 1500, 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `role` enum('admin','resevsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `no_telp`, `role`) VALUES
(1, 'adminha', 'adminmaster', '21232f297a57a5a743894a0e4a801fc3', 83112, 'admin'),
(2, 'putrirahayu\r\n', 'anisa', '4093fed663717c843bea100d17fb67c8', 83221, 'resevsionis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`fasilitaskamar_id`);

--
-- Indeks untuk tabel `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `fasilitaskamar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
