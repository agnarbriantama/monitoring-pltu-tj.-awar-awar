-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 18.10
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
-- Database: `db_sensusrw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `description`) VALUES
('5cb90329d0f13', 'Anggrek', 134000, 'default.jpg', 'Angrek adalah bunga dengan'),
('5cb90737356f4', 'Melati', 412221, '5cb90737356f4.png', 'melati adalah bla bla bla'),
('5ddd677b524b5', 'asdadas', 14141242, '5ddd677b524b5.png', 'adasdasdasd'),
('61b1ddf63413a', 'qqq', 111111, 'default.jpg', 'swwwwwwwwwwww');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anakpenerimabantuan`
--

CREATE TABLE `tb_anakpenerimabantuan` (
  `id_anak` int(8) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kepalakeluarga` int(11) NOT NULL,
  `nama_kepalakeluarga` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `prestasi` varchar(255) NOT NULL,
  `jenjang_pendidikan` varchar(255) NOT NULL,
  `jenis_bantuan` varchar(255) NOT NULL,
  `jumlah_saudara` varchar(255) NOT NULL,
  `foto_formal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anakpenerimabantuan`
--

INSERT INTO `tb_anakpenerimabantuan` (`id_anak`, `nama_lengkap`, `kepalakeluarga`, `nama_kepalakeluarga`, `nama_ibu`, `tempat_lahir`, `tanggal_lahir`, `prestasi`, `jenjang_pendidikan`, `jenis_bantuan`, `jumlah_saudara`, `foto_formal`) VALUES
(29, 'Opik', 121111115, 'Jumadi', 'Erlina', 'Jogja', '2000-03-06', 'Juara 1 Debat Provinsi', 'Kuliah', 'Prestasi', '2', 'man_(3).png'),
(30, 'patrio', 121111123, 'Paijo', 'Yukiyem', 'Solo', '1999-01-29', '-', 'Kuliah', 'KIP Kuliah', '1', 'profile_(2).png'),
(31, 'Yuni', 121111123, 'Paijo', 'Yukiyem', 'Solo', '2004-05-11', '-', 'SMA', 'KIP', '1', 'user.png'),
(32, 'Deni', 121111124, 'Tukimen', 'Yunika', 'Bandung', '2012-10-04', '-', 'SD', 'Dana Bos', '2', 'man_(2).png'),
(33, 'Roni', 121111124, 'Tukimen', 'Yunika', 'Bandung', '2010-02-02', '-', 'SMP', 'KIP', '2', 'man_(1).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggotakeluarga`
--

CREATE TABLE `tb_anggotakeluarga` (
  `id_anggotakeluarga` int(8) NOT NULL,
  `kepalakeluarga` int(11) NOT NULL,
  `nama_kepalakeluarga` varchar(255) NOT NULL,
  `nama_istri` varchar(255) NOT NULL,
  `nama_anak_pertama` varchar(255) NOT NULL,
  `nama_anak_kedua` varchar(255) NOT NULL,
  `tambahan_anggotakeluarga` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggotakeluarga`
--

INSERT INTO `tb_anggotakeluarga` (`id_anggotakeluarga`, `kepalakeluarga`, `nama_kepalakeluarga`, `nama_istri`, `nama_anak_pertama`, `nama_anak_kedua`, `tambahan_anggotakeluarga`) VALUES
(27, 121111113, 'Supardi', 'Jumini', 'Endra setiawan', 'Siti Aminah', '<p>-</p>\r\n'),
(28, 121111115, 'Jumadi', 'Erlina', 'Opik', 'Wedny', '<p>Udin</p>\r\n'),
(29, 121111119, 'Pardi', 'Tutik', 'Rudy', 'Amelia', '<p>-</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kasuscovid`
--

CREATE TABLE `tb_kasuscovid` (
  `id_kasus` int(11) NOT NULL,
  `nama_warga` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `jenis_konfirmasi` varchar(255) NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `gejala` varchar(255) NOT NULL,
  `jenis_isolasi` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kasuscovid`
--

INSERT INTO `tb_kasuscovid` (`id_kasus`, `nama_warga`, `jenis_kelamin`, `usia`, `jenis_konfirmasi`, `tanggal_konfirmasi`, `gejala`, `jenis_isolasi`, `kondisi`) VALUES
(1, 'qqqq', 'Perempuan', '23', 'PDP', '2021-12-22', 'Pusing , Mual', 'Rawat Jalan', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluargatidakmampu`
--

CREATE TABLE `tb_keluargatidakmampu` (
  `id_keluarga` int(8) NOT NULL,
  `kepalakeluarga` int(11) NOT NULL,
  `nama_kepalakeluarga` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `penghasilan_ayah` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `penghasilan_ibu` varchar(255) NOT NULL,
  `jumlah_tanggungan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keluargatidakmampu`
--

INSERT INTO `tb_keluargatidakmampu` (`id_keluarga`, `kepalakeluarga`, `nama_kepalakeluarga`, `pekerjaan_ayah`, `penghasilan_ayah`, `pekerjaan_ibu`, `penghasilan_ibu`, `jumlah_tanggungan`) VALUES
(26, 121111123, 'Paijo', 'Petani', '1500000', '-', '0', '3'),
(27, 121111124, 'Tukimen', 'Pengkrajin', '1400000', '-', '0', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kepalakeluarga`
--

CREATE TABLE `tb_kepalakeluarga` (
  `id_kepalakeluarga` int(11) NOT NULL,
  `nama_kepalakeluarga` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jumlah_anggotakeluarga` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `foto_kk` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kepalakeluarga`
--

INSERT INTO `tb_kepalakeluarga` (`id_kepalakeluarga`, `nama_kepalakeluarga`, `tanggal_lahir`, `jumlah_anggotakeluarga`, `pekerjaan`, `nomor_hp`, `foto_kk`, `keterangan`) VALUES
(121111113, 'Supardi', '1952-07-15', '3', 'Petani', '083654789234', 'Picture4.png', '<p>Ketua Rw</p>\r\n'),
(121111115, 'Jumadi', '1962-03-28', '5', 'PNS', '081234543213', 'Picture8.png', '<p>Ketua RT 16</p>\r\n'),
(121111119, 'Pardi', '1960-08-15', '4', 'Petani', '085897540786', 'Picture1.png', '<p>Ketua RT 17</p>\r\n'),
(121111120, 'Padiem', '1956-05-14', '4', 'Wirausaha', '087234543123', 'Picture14.png', '<p>Sekertaris</p>\r\n'),
(121111121, 'Doni Hendrawan', '1975-01-22', '3', 'Polisi', '089654234543', 'Picture5.png', '<p>Bendahara</p>\r\n'),
(121111122, 'Rendra Himawan', '1979-04-04', '3', 'Perawat', '082456876345', 'Picture12.png', '<p>-</p>\r\n'),
(121111123, 'Paijo', '1961-06-06', '3', 'Petani', '081567845321', 'Picture10.png', '<p>-</p>\r\n'),
(121111124, 'Tukimen', '1959-01-10', '4', 'Pengkrajin', '082765456786', 'Picture2.png', '<p>-</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_uangkas`
--

CREATE TABLE `tb_uangkas` (
  `id_kegiatan` int(20) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `kategori_kegiatan` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `tanggal` date NOT NULL,
  `kas_masuk` varchar(255) NOT NULL,
  `kas_keluar` varchar(255) NOT NULL,
  `total_kas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_uangkas`
--

INSERT INTO `tb_uangkas` (`id_kegiatan`, `nama_kegiatan`, `kategori_kegiatan`, `penanggung_jawab`, `keterangan`, `tanggal`, `kas_masuk`, `kas_keluar`, `total_kas`) VALUES
(1, 'Kas Rutin', 'Kas', 'Ketua RW , Bendahara , Sekertaris', '<h3>Lengkap</h3>\r\n', '2021-12-11', '2000000', '0', '2000000'),
(2, 'Dana Sosial', 'Dana Sosial', 'Ketua RT-1', '<p>Menjenguk Bapak Supardi</p>\r\n', '2021-12-17', '0', '200000', '1800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `created_at`, `is_active`) VALUES
(3, 'ivan', '$2y$10$lHJO/t2IiHPCsuhbdldCVeox9Vz6lgJ7V9m32fNRyl9UO6VSvRXNS', 'ivan@gmail.com', 'ivan', '081293348015', 'admin', '2021-12-21 14:31:59', '2021-12-11 16:50:29', 0),
(8, 'kreshna', '$2y$10$i84u7zhDHd4oiP2hxlIkROKQLgfIkrkuy.pG9164KmMedQ299mGvy', 'kreshna@gmail.com', 'kreshna', '000000', 'admin', '2021-12-21 17:06:03', '2021-12-21 17:06:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tb_anakpenerimabantuan`
--
ALTER TABLE `tb_anakpenerimabantuan`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `id_kepalakeluarga` (`kepalakeluarga`) USING BTREE;

--
-- Indeks untuk tabel `tb_anggotakeluarga`
--
ALTER TABLE `tb_anggotakeluarga`
  ADD PRIMARY KEY (`id_anggotakeluarga`),
  ADD KEY `id_kepalakeluarga` (`kepalakeluarga`) USING BTREE;

--
-- Indeks untuk tabel `tb_kasuscovid`
--
ALTER TABLE `tb_kasuscovid`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indeks untuk tabel `tb_keluargatidakmampu`
--
ALTER TABLE `tb_keluargatidakmampu`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_kepalakeluarga` (`kepalakeluarga`) USING BTREE;

--
-- Indeks untuk tabel `tb_kepalakeluarga`
--
ALTER TABLE `tb_kepalakeluarga`
  ADD PRIMARY KEY (`id_kepalakeluarga`);

--
-- Indeks untuk tabel `tb_uangkas`
--
ALTER TABLE `tb_uangkas`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anakpenerimabantuan`
--
ALTER TABLE `tb_anakpenerimabantuan`
  MODIFY `id_anak` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_anggotakeluarga`
--
ALTER TABLE `tb_anggotakeluarga`
  MODIFY `id_anggotakeluarga` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_kasuscovid`
--
ALTER TABLE `tb_kasuscovid`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_keluargatidakmampu`
--
ALTER TABLE `tb_keluargatidakmampu`
  MODIFY `id_keluarga` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kepalakeluarga`
--
ALTER TABLE `tb_kepalakeluarga`
  MODIFY `id_kepalakeluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121111125;

--
-- AUTO_INCREMENT untuk tabel `tb_uangkas`
--
ALTER TABLE `tb_uangkas`
  MODIFY `id_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggotakeluarga`
--
ALTER TABLE `tb_anggotakeluarga`
  ADD CONSTRAINT `id_kepalakeluarga` FOREIGN KEY (`kepalakeluarga`) REFERENCES `tb_kepalakeluarga` (`id_kepalakeluarga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
