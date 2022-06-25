-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2022 pada 14.49
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`level_id`, `nama_level`) VALUES
(1, 'superadmin'),
(2, 'ketua'),
(3, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gardu`
--

CREATE TABLE `tb_gardu` (
  `id_gardu` int(11) NOT NULL,
  `nama_gardu` varchar(255) NOT NULL,
  `gambar_gardu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gardu`
--

INSERT INTO `tb_gardu` (`id_gardu`, `nama_gardu`, `gambar_gardu`) VALUES
(4, 'gardu A', '1.png'),
(5, 'Gardu B', '_Logo_GARDU_(5).png'),
(6, 'Gardu C', '2.png'),
(7, 'Gardu D', '3.png'),
(8, 'Gardu E', '4.png'),
(9, 'Gardu F', '5.png'),
(10, 'Gardu G', '6.png'),
(11, 'Gardu H', '7.png'),
(12, 'Gardu I', '8.png'),
(13, 'Gardu J', '9.png'),
(14, 'Gardu KK', 'bg2.png'),
(20, 'Gardu KL', 'contohgardu.jpg'),
(21, 'Gardu Y', 'ketua2.jpg'),
(22, 'Gardu Z', '11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pantauanharian`
--

CREATE TABLE `tb_pantauanharian` (
  `id_pantauan` int(11) NOT NULL,
  `id_gardu` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `suhu` varchar(255) NOT NULL,
  `arus` varchar(255) NOT NULL,
  `cosphi` varchar(255) NOT NULL,
  `tgl_pantauan` date NOT NULL,
  `tegangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lokasi_pantauan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pantauanharian`
--

INSERT INTO `tb_pantauanharian` (`id_pantauan`, `id_gardu`, `id_tim`, `suhu`, `arus`, `cosphi`, `tgl_pantauan`, `tegangan`, `status`, `lokasi_pantauan`, `username`, `gambar`) VALUES
(23, 13, 1, '45', '25', '15', '2022-06-12', '55', '2', '-7.6251136,111.49312', 'aghasyaf', '94.png'),
(24, 5, 1, '19', '20', '35', '2022-06-13', '32', '1', '-7.6251136,111.49312', 'aghasyaf', '_Logo_GARDU_(5)1.png'),
(25, 6, 1, '12', '15', '26', '2022-06-14', '45', '1', '-7.6251136,111.49312', 'aghasyaf', '21.png'),
(26, 7, 1, '36', '34', '43', '2022-06-15', '45', '1', '-7.6251136,111.49312', 'aghasyaf', '31.png'),
(27, 9, 1, '56', '86', '76', '2022-06-16', '90', '2', '-7.6251136,111.49312', 'rudi1234', '51.png'),
(28, 9, 1, '35', '45', '55', '2022-06-17', '56', '1', '-7.6251136,111.49312', 'rudi1234', '52.png'),
(29, 10, 1, '79', '98', '89', '2022-06-18', '67', '1', '-7.6251136,111.49312', 'rudi1234', '61.png'),
(30, 12, 1, '58', '86', '36', '2022-06-19', '59', '1', '-7.6251136,111.49312', 'rudi1234', '81.png'),
(31, 14, 1, '98', '87', '76', '2022-06-20', '78', '1', '-7.6251136,111.49312', 'aghasyaf', 'g1.jpg'),
(32, 20, 1, '70', '80', '90', '2022-06-21', '64', '2', '-7.6251136,111.49312', 'aghasyaf', 'g2.jpg'),
(34, 22, 1, '92', '94', '96', '2022-06-22', '100', '1', '-7.6251136,111.49312', 'aghasyaf', 'gardu1.jpg'),
(35, 6, 1, '112', '113', '121', '2022-06-23', '212', '0', '-7.6251136,111.49312', 'aghasyaf', '22.png'),
(36, 4, 1, '60', '76', '59', '2022-06-24', '56', '2', '-7.6251136,111.49312', 'rudi1234', '11.png'),
(37, 7, 1, '59', '53', '86', '2022-06-25', '67', '0', '-7.6251136,111.49312', 'rudi1234', '32.png'),
(38, 10, 1, '57', '90', '87', '2022-06-26', '98', '0', '-7.6251136,111.49312', 'rudi1234', '62.png'),
(40, 10, 1, '111', '99', '90', '2022-06-27', '80', '0', '-7.6251136,111.49312', 'rudi1234', '63.png'),
(41, 13, 1, '89', '90', '92', '2022-06-28', '89', '2', '-7.6251136,111.49312', 'rudi1234', '95.png'),
(42, 21, 1, '79', '79', '70', '2022-06-29', '90', '0', '-7.6251136,111.49312', 'rudi1234', 'gardu2.jpg'),
(43, 14, 1, '57', '78', '87', '2022-06-30', '89', '1', '-7.6251136,111.49312', 'rudi1234', 'g21.jpg'),
(44, 6, 1, '115', '90', '99', '2022-07-01', '89', '1', '-7.6251136,111.49312', 'rudi1234', '23.png'),
(45, 11, 1, '67', '76', '78', '2022-07-02', '78', '1', '-7.6251136,111.49312', 'rudi1234', '71.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim`
--

CREATE TABLE `tim` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`) VALUES
(1, 'Bima Panca Satya'),
(2, 'Cita Sandya'),
(3, 'Nusantara Merdeka'),
(4, 'Nusantara Bersatu'),
(5, 'Three Star'),
(10, 'Tim Musyawarah 1'),
(11, 'Semangat Tinggi 1'),
(12, 'Semangat Juang'),
(13, 'Belajar Berjuang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `gambar_user` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `username`, `password`, `email`, `id_tim`, `phone`, `level_id`, `gambar_user`, `created_at`, `is_active`) VALUES
(4, 'kreshna putra adi wicaksana', 'superadmin', '$2y$10$EQuhjTRa8.jIwIBT44jCseBYVQEapjLWLhNhmJT5sDLRn3ASQ8Ace', 'kreshnaputraadi31@student.uns.ac.id', 0, '081287560665', 1, 'admin.png', '1650900711', '1'),
(9, 'Agnar Briantama Ridhwanullahh', 'agnarbriantama', '$2y$10$w/xF3dAKOpaYpYFOrm5o0exW8bh9/iMlbIVf/LjIRgViKLkHFtqpy', 'agnarbriantama25@student.uns.ac.id', 1, '085235905122', 2, 'userimg.png', '1655180585', '1'),
(10, 'Agha Syafrila Myzanina', 'aghasyaf', '$2y$10$YQ5DA/vkq6xjaIfyRwlnPu7j7Srkk01OGek4ofYlI/glfbb8IBp6W', 'aghasyafrilam@student.uns.ac.id', 1, '082324511375', 3, 'anggota1.png', '1653007880', '1'),
(11, ' Hildanniar Fauzi', 'hildanniar', '$2y$10$TbQJTm30N/pbIEPrdd9dVOLF1.wwniZAfdyKKIoBpsCDLhIb3vpza', 'hildanniarfauzi6@student.uns.ac.id', 2, '089685015606', 2, 'ketua2.jpg', '1651369870', '1'),
(12, 'Arin Dwi Padmasari', 'arindwip', '$2y$10$bSd2nTDMYmQ9SS1lbLqXCuaqqLRatRhhB4woXeqM5xTbqMj4mvNti', 'arindwipadmasari_1@student.uns.ac.id', 2, '085748502961', 3, 'anggota2.jpg', '1651369952', '1'),
(19, 'Rudi Tabuti', 'rudi1234', '$2y$10$EO9LK2WQChAWIDjIiFUZZeV2Ayw4soVt1/8vOYeAyg7Nro.K8vuC2', 'khususkuliahuns@gmail.com', 1, '333444', 3, 'userimg4.jpg', '1653801592', '1'),
(20, 'Budi Adina', 'budiadina12', '$2y$10$vGGjwQ6LlRJCyMzXIKmPy.RXAzbPqhdkZkyfgZOQobco738aFiERO', 'budiadina@gmail.com', 5, '081287560665', 2, 'userimg4.jpg', '1654154707', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indeks untuk tabel `tb_gardu`
--
ALTER TABLE `tb_gardu`
  ADD PRIMARY KEY (`id_gardu`);

--
-- Indeks untuk tabel `tb_pantauanharian`
--
ALTER TABLE `tb_pantauanharian`
  ADD PRIMARY KEY (`id_pantauan`),
  ADD KEY `id_gardu` (`id_gardu`);

--
-- Indeks untuk tabel `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_gardu`
--
ALTER TABLE `tb_gardu`
  MODIFY `id_gardu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_pantauanharian`
--
ALTER TABLE `tb_pantauanharian`
  MODIFY `id_pantauan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pantauanharian`
--
ALTER TABLE `tb_pantauanharian`
  ADD CONSTRAINT `id_gardu` FOREIGN KEY (`id_gardu`) REFERENCES `tb_gardu` (`id_gardu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
