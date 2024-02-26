-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2024 pada 13.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_saya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album`
--

CREATE TABLE `tbl_album` (
  `album_id` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tgl_buat` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_album`
--

INSERT INTO `tbl_album` (`album_id`, `nama_album`, `deskripsi`, `tgl_buat`, `user_id`) VALUES
(555, 'dknfdnjq', '3', '2024-02-23', 22),
(556, 'hb', 'hbh', '0001-11-11', 111111111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `foto_id` int(11) NOT NULL,
  `judul_ft` varchar(255) NOT NULL,
  `desk_ft` varchar(255) NOT NULL,
  `tgl_unggah` date NOT NULL,
  `lokasi_file` text NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`foto_id`, `judul_ft`, `desk_ft`, `tgl_unggah`, `lokasi_file`, `album_id`, `user_id`) VALUES
(6, 'Tim 7 era Boruto', 'Tim 7 generasi kelima adalah tim 7 saat ini, tim 7 yang di ketuai oleh Konohamaru Sarutobi dan beranggotakan Boruto Uzumaki, Sarada Uciha, dan Mitsuki.  Tim 7 ini berada pada era Boruto, semua anggota tim ini tidak ada yang lemah. Semuanya sangat menonjol', '2024-02-24', 'download.jpg', 2, 2),
(7, 'Tim 7 era Naruto dkk', 'Kisah tim 7 dimulai ketika Naruto, Sasuke, dan Sakura diatur menjadi sebuah tim setelah mereka lulus dari akademi, tim ini dipilih untuk menyeimbangkan bakat mereka.  Naruto yang merupakan siswa terbodoh dikelasnya mendapat keuntungan dari kecerdasan Saku', '2024-02-24', '719dca85-48e1-4447-99ba-5f3dbce85c9b.jpg', 3, 3),
(8, 'Sasuke Uciha', 'Sasuke adalah seorang ninja jenius dari sebuah klan terkemuka di Konoha, Klan Uchiha. Klan Uchiha dikenal dengan kemampuan khususnya yaitu Sharingan, begitu juga dengan kemampuan mereka menguasai elemen api. Sasuke adalah anak kedua dan terakhir dari kapt', '2024-02-24', 'Sasuke_Uchiha_Wallpaper_4K.jpg', 0, 0),
(9, 'Naruto Uzumaki ', 'Naruto merupakan anak dari Hokage ke 4 dan Kuzhina yang merupakan keturunan clan Uzumaki. Naruto sendiri Lahir disebuah desa yang bernama Konoha. Setelah kelahiran Naruto orang tuanya meninggal akibat serangan dari musang ekor 9 untuk melindungi Naruto. S', '2024-02-24', 'Cute_Baby_Naruto_Autumn___Fall_4K_Wallpaper1.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komen`
--

CREATE TABLE `tbl_komen` (
  `komen_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_komen` varchar(225) NOT NULL,
  `tgl_komen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_like`
--

CREATE TABLE `tbl_like` (
  `like_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profil` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `email`, `profil`, `nama_lengkap`, `alamat`, `level`) VALUES
(12, 'j', 'bbb', 'tmyg72@gmail.com', 'Screenshot_2024-02-10_152800.png', 'w', 'w', 'admin'),
(13, 'mamad', '123', 'muhammadsugianto3838@gmail.com', 'IMG-20231217-WA00801.jpg', 'Muhammad Sugianto', 'Jember, Indonesia', 'admin'),
(14, 'coba coba', '111', 'muhammadsugianto3839@gmail.com', 'ertwosix.jpg', 's', 'indonesia', ''),
(15, 'xxxxx', 'nj', 'tmyg94@gmail.com', 'Screenshot_2024-02-04_221829.png', 's', 's', ''),
(16, 'jnj', 'jnjn', 'muhammadsugianto33348@gmail.com', 'IMG_8650.JPG', 'user pake s', 'n', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`foto_id`);

--
-- Indeks untuk tabel `tbl_komen`
--
ALTER TABLE `tbl_komen`
  ADD PRIMARY KEY (`komen_id`);

--
-- Indeks untuk tabel `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_komen`
--
ALTER TABLE `tbl_komen`
  MODIFY `komen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
