-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 10:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id` int(11) NOT NULL,
  `nama_fasilitashotel` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_hotel`
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
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `fasilitaskamar_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`fasilitaskamar_id`, `kamar_id`, `fasilitas`) VALUES
(1, 1, 'tempat tidur, AC, TV, perlengkapan mandi, dan air minum.'),
(4, 3, 'Pengering rambut,AC,TV,Kulkas,Fasilitas pembuatan teh dan kopi.'),
(6, 5, 'Ranjang standar,meja rias kecil,kamar mandi.'),
(7, 7, 'Tempat bak mandi,AC,Tempat Tidur Double,Televisi,Wireless Internet.'),
(8, 11, 'Pintu penghubung,kamar mandi,AC,Televisi.'),
(9, 9, 'AC,,TV,Tempat makan,Setrika,Tempat Tidur King.');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `username`, `password`, `tlp`) VALUES
(1, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', '4'),
(2, 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', '6');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('checkin','checkout') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `tipe_kamar`, `harga`, `gambar`, `status`) VALUES
(1, 'Standard room', 250, '', ''),
(2, 'Superior room', 300, 'Alt-Text-2.jpg', 'checkin'),
(3, 'Deluxe room', 300, '', 'checkin'),
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
-- Table structure for table `reservasi`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `user_id`, `email`, `no_hp`, `kamar_id`, `checkin`, `checkout`, `jumlah`, `status`) VALUES
(36, 2, 'ujang@gmail.com', 111, 1, '2023-03-11', '2023-03-25', 3500, 'checkin'),
(37, 2, 'ujang@gmail.com', 111, 1, '2023-03-11', '2023-03-25', 3500, 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `role` enum('admin','resevsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `no_telp`, `role`) VALUES
(1, 'adminha', 'adminmaster', '21232f297a57a5a743894a0e4a801fc3', 83112, 'admin'),
(2, 'putrirahayu\r\n', 'anisa', '4093fed663717c843bea100d17fb67c8', 83221, 'resevsionis'),
(10, 'nis', 'a', '0cc175b9c0f1b6a831c399e269772661', 11111, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`fasilitaskamar_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `fasilitaskamar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
