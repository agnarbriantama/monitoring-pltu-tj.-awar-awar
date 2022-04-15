-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 18.11
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggotatim`
--

CREATE TABLE `tb_anggotatim` (
  `id_anggotatim` int(11) NOT NULL,
  `id_ketuatim` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `domisili` varchar(255) NOT NULL,
  `tahun_kerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggotatim`
--

INSERT INTO `tb_anggotatim` (`id_anggotatim`, `id_ketuatim`, `nama_anggota`, `no_hp`, `domisili`, `tahun_kerja`) VALUES
(3, 2, 'ipantek', '081286', 'soloooaaaa', '<p>2211</p>\r\n');

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
(4, 'gardu A', 'admin1.jpg'),
(5, 'Gardu KK', 'WhatsApp_Image_2021-07-04_at_17_14_56.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ketuatim`
--

CREATE TABLE `tb_ketuatim` (
  `id_ketuatim` int(11) NOT NULL,
  `nama_ketuatim` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jml_ang_tim` varchar(255) NOT NULL,
  `nama_tim` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto_ketuatim` varchar(255) NOT NULL,
  `domisili_ketuatim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ketuatim`
--

INSERT INTO `tb_ketuatim` (`id_ketuatim`, `nama_ketuatim`, `tgl_lahir`, `jml_ang_tim`, `nama_tim`, `no_hp`, `foto_ketuatim`, `domisili_ketuatim`) VALUES
(2, 'adudu', '2022-04-11', '5', 'ThreeStar', '081286', 'WhatsApp_Image_2021-07-04_at_17_14_56.jpeg', '<p>soloku</p>\r\n'),
(4, 'kreshna', '2022-04-15', '5', 'Ini Tes', '1234', 'admin1.jpg', '<p>Solo</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pantauanharian`
--

CREATE TABLE `tb_pantauanharian` (
  `id_pantauan` int(11) NOT NULL,
  `id_gardu` int(11) NOT NULL,
  `suhu` varchar(255) NOT NULL,
  `arus` varchar(255) NOT NULL,
  `cosphi` varchar(255) NOT NULL,
  `tgl_pantauan` date NOT NULL,
  `tegangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lokasi_pantauan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pantauanharian`
--

INSERT INTO `tb_pantauanharian` (`id_pantauan`, `id_gardu`, `suhu`, `arus`, `cosphi`, `tgl_pantauan`, `tegangan`, `status`, `lokasi_pantauan`, `gambar`) VALUES
(16, 4, '12', '12', '21', '2022-04-15', '12', '2', 'TESSSSSS', 'WhatsApp_Image_2021-07-04_at_17_14_562.jpeg'),
(17, 4, '33', '33', '33', '2022-04-15', '33', '1', 'solo', 'Picture1.png'),
(18, 5, '44', '44', '12', '2022-04-15', '999', '2', 'TES', 'download6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `level_id`, `last_login`, `created_at`, `is_active`) VALUES
(1, 'kreshna', 'kreshna', 'adada@gmail.com', 'kreshnaaa', '0986411', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indeks untuk tabel `tb_anggotatim`
--
ALTER TABLE `tb_anggotatim`
  ADD PRIMARY KEY (`id_anggotatim`),
  ADD KEY `id_ketuatim` (`id_ketuatim`);

--
-- Indeks untuk tabel `tb_gardu`
--
ALTER TABLE `tb_gardu`
  ADD PRIMARY KEY (`id_gardu`);

--
-- Indeks untuk tabel `tb_ketuatim`
--
ALTER TABLE `tb_ketuatim`
  ADD PRIMARY KEY (`id_ketuatim`);

--
-- Indeks untuk tabel `tb_pantauanharian`
--
ALTER TABLE `tb_pantauanharian`
  ADD PRIMARY KEY (`id_pantauan`),
  ADD KEY `id_gardu` (`id_gardu`);

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
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_anggotatim`
--
ALTER TABLE `tb_anggotatim`
  MODIFY `id_anggotatim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_gardu`
--
ALTER TABLE `tb_gardu`
  MODIFY `id_gardu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_ketuatim`
--
ALTER TABLE `tb_ketuatim`
  MODIFY `id_ketuatim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pantauanharian`
--
ALTER TABLE `tb_pantauanharian`
  MODIFY `id_pantauan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggotatim`
--
ALTER TABLE `tb_anggotatim`
  ADD CONSTRAINT `id_ketuatim` FOREIGN KEY (`id_ketuatim`) REFERENCES `tb_ketuatim` (`id_ketuatim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
