-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2024 pada 16.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kode_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `almt` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tmp_lhr` varchar(100) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_atraksi`
--

CREATE TABLE `data_atraksi` (
  `kode_atraksi` varchar(10) NOT NULL,
  `nama_atraksi` varchar(100) DEFAULT NULL,
  `sk` text DEFAULT NULL,
  `harga_atraksi` int(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_atraksi`
--

INSERT INTO `data_atraksi` (`kode_atraksi`, `nama_atraksi`, `sk`, `harga_atraksi`, `created_at`, `updated_at`) VALUES
('A001', 'odong-odong', 'tidak boleh locat dari odong-odong\r\ntidak boleh duduk di atap odong-odong', 50000, '2024-10-29 04:09:18', '2024-10-30 17:00:00'),
('A002', 'mancing mania', '1.dilarang berenang di kolam ikan', 20000, '2024-10-29 04:09:18', NULL),
('A004', 'perah susu sapi', 'Hanya boleh perah susu sapi ya dek ya\r\nPerhnya yang halus ya dek ya', 30000, '2024-10-31 19:38:24', '2024-10-30 17:00:00'),
('A005', 'memetik kangkung', 'hanya kangkung', 20000, '2024-11-09 18:18:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_deskripsi`
--

CREATE TABLE `data_deskripsi` (
  `kode_deskripsi` varchar(10) NOT NULL,
  `nama_atraksi` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `dokumentasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_deskripsi`
--

INSERT INTO `data_deskripsi` (`kode_deskripsi`, `nama_atraksi`, `deskripsi`, `dokumentasi`, `created_at`, `updated_at`) VALUES
('D001', 'odong-odong', 'atraksi ini menyediakan sensasi extream yaitu offroad dengan menggunakan odong odong menyusuri sungai polinela yaaa', '1730213563_f497e742b2b6d1544812.jpg', '2024-10-29 14:51:52', '2024-10-30 17:00:00'),
('D002', 'mancing mania', 'atraksi ini menyediakan permancingan yang dinama yang dipancing ikan bukan emosi hehe', '1730388029_d8b7999b5fdf43c5fb04.jpg', '2024-10-29 15:04:31', '2024-10-30 17:00:00'),
('D003', 'memetik kangkung', 'Memetik kangkung adalah aktivitas yang menyenangkan dan bermanfaat, terutama dalam suasana pedesaan atau di lingkungan agroedutourisme. Kangkung, tanaman air yang mudah tumbuh dan kaya nutrisi, sering menjadi pilihan bagi pengunjung yang ingin mencoba pengalaman bercocok tanam sederhana. Dalam aktivitas ini, pengunjung akan diajak langsung ke kebun kangkung yang segar, di mana mereka dapat belajar cara memilih dan memetik kangkung dengan benar.\r\n\r\nKegiatan ini dimulai dengan mengenali jenis-jenis kangkung dan bagian yang layak dipanen. Pengunjung kemudian akan diberi panduan mengenai cara memetik daun dan batang muda yang memiliki tekstur renyah dan rasa yang lezat. Pengalaman memetik kangkung ini tidak hanya memberikan wawasan tentang praktik pertanian organik, tetapi juga mengajarkan penghargaan terhadap proses alami dalam menyediakan sayuran segar.', '1731275288_4607adc72c39c51fcdfb.png', '2024-11-10 21:48:08', '2024-11-09 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengunjung`
--

CREATE TABLE `data_pengunjung` (
  `kode_pengunjung` varchar(10) NOT NULL,
  `kode_tiket` varchar(50) NOT NULL,
  `nama_pengunjung` varchar(100) DEFAULT NULL,
  `email_pengunjung` varchar(100) DEFAULT NULL,
  `jk` varchar(40) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `total_pembayaran` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`kode_pengunjung`, `kode_tiket`, `nama_pengunjung`, `email_pengunjung`, `jk`, `no_hp`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
('P001', 'TKT-2077056CBA', 'Muhamad Arif Yonanda', 'marifyonanda4@gmail.com', 'Laki-laki', '087775628408', 1600000, '2024-11-10 22:00:09', '2024-11-10 22:00:09'),
('P002', 'TKT-2150323ED7', 'nanda', 'yonanda@gmail.com', 'Laki-laki', '098763775646', 1750000, '2024-11-11 02:14:58', '2024-11-11 02:14:58'),
('P003', 'TKT-482DCFAA99', '', 'anisaa', '', '9999999', 200000, '2024-11-11 02:32:59', '2024-11-11 02:32:59'),
('P004', 'TKT-5FBEA21716', 'jenny', 'yonanda@gmail.com', 'Perempuan', '089357858923', 1400000, '2024-11-17 16:35:02', '2024-11-17 16:35:02'),
('P005', 'TKT-5FBEA21716', 'nanda', 'marifyonanda4@gmail.com', 'Laki-laki', '087775628408', 1400000, '2024-11-17 17:06:28', '2024-11-17 17:06:28'),
('P006', 'TKT-5FBEA21716', 'nanda', 'marifyonanda4@gmail.com', 'Laki-laki', '087775628408', 1400000, '2024-11-17 17:11:37', '2024-11-17 17:11:37'),
('P007', 'TKT-5FBEA21716', 'jono', 'jono@gmail.com', 'Laki-laki', '087775628408', 2100000, '2024-11-17 17:52:37', '2024-11-17 17:52:37'),
('P008', 'TKT-E85C0FC6C2', 'jono', 'arifyonanda@gmail.com', 'Laki-laki', '087775628408', 1750000, '2024-11-17 18:18:27', '2024-11-17 18:18:27'),
('P009', 'TKT-6714993DA9', 'marsinah', 'marsinah@gmail.com', 'Perempuan', '089357858923', 3000000, '2024-11-17 18:28:23', '2024-11-17 18:28:23'),
('P010', 'TKT-C5A6974F53', 'Ranu', 'ranu@gmail.com', 'Laki-laki', '098763775646', 3000000, '2024-11-17 18:48:18', '2024-11-17 18:48:18'),
('P011', 'TKT-F0CDB87A3F', 'muhamad', 'marifyonanda4@gmail.com', 'Laki-laki', '098763775646', 6000000, '2024-11-17 18:54:18', '2024-11-17 18:54:18'),
('P012', 'TKT-2F883DABDC', 'Alya', 'agro@gmail.com', 'Laki-laki', '098763775646', 10000000, '2024-11-17 19:02:54', '2024-11-17 19:02:54'),
('P013', 'TKT-6EA0D5DFE8', 'dudung', 'dudung@gmai.com', 'Laki-laki', '087775628408', 2100000, '2024-11-17 19:20:32', '2024-11-17 19:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kode_pemesanan` varchar(10) NOT NULL,
  `kode_pengunjung` varchar(10) DEFAULT NULL,
  `kode_tiket` varchar(25) DEFAULT NULL,
  `tgl_pemesanan` timestamp NULL DEFAULT current_timestamp(),
  `total_pembayaran` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`kode_pemesanan`, `kode_pengunjung`, `kode_tiket`, `tgl_pemesanan`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
('PM001', 'P001', 'TKT-2077056CBA', '2024-11-10 22:00:09', 1600000.00, '2024-11-10 15:00:09', '2024-11-10 15:00:09'),
('PM002', 'P002', 'TKT-2150323ED7', '2024-11-11 02:14:58', 1750000.00, '2024-11-10 19:14:58', '2024-11-10 19:14:58'),
('PM003', 'P003', 'TKT-482DCFAA99', '2024-11-11 02:32:59', 200000.00, '2024-11-10 19:32:59', '2024-11-10 19:32:59'),
('PM004', 'P004', 'TKT-5FBEA21716', '2024-11-17 16:35:02', 1400000.00, '2024-11-17 09:35:02', '2024-11-17 09:35:02'),
('PM005', 'P005', 'TKT-5FBEA21716', '2024-11-17 17:06:28', 1400000.00, '2024-11-17 10:06:28', '2024-11-17 10:06:28'),
('PM006', 'P006', 'TKT-5FBEA21716', '2024-11-17 17:11:37', 1400000.00, '2024-11-17 10:11:37', '2024-11-17 10:11:37'),
('PM007', 'P007', 'TKT-5FBEA21716', '2024-11-17 17:52:37', 2100000.00, '2024-11-17 10:52:37', '2024-11-17 10:52:37'),
('PM008', 'P008', 'TKT-E85C0FC6C2', '2024-11-17 18:18:27', 1750000.00, '2024-11-17 11:18:27', '2024-11-17 11:18:27'),
('PM009', 'P009', 'TKT-6714993DA9', '2024-11-17 18:28:23', 3000000.00, '2024-11-17 11:28:23', '2024-11-17 11:28:23'),
('PM010', 'P010', 'TKT-C5A6974F53', '2024-11-17 18:48:18', 3000000.00, '2024-11-17 11:48:18', '2024-11-17 11:48:18'),
('PM011', 'P011', 'TKT-F0CDB87A3F', '2024-11-17 18:54:18', 6000000.00, '2024-11-17 11:54:18', '2024-11-17 11:54:18'),
('PM012', 'P012', 'TKT-2F883DABDC', '2024-11-17 19:02:54', 10000000.00, '2024-11-17 12:02:54', '2024-11-17 12:02:54'),
('PM013', 'P013', 'TKT-6EA0D5DFE8', '2024-11-17 19:20:32', 2100000.00, '2024-11-17 12:20:32', '2024-11-17 12:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `kode_tiket` varchar(25) NOT NULL,
  `pilihan_atraksi` varchar(200) DEFAULT NULL,
  `tgl_berkunjung` date NOT NULL,
  `total` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`kode_tiket`, `pilihan_atraksi`, `tgl_berkunjung`, `total`) VALUES
('TKT-07053B7F91', 'odong-odong', '2024-11-16', '50000'),
('TKT-1F30F94F6E', 'memetik kangkung', '2024-11-23', '20000'),
('TKT-2077056CBA', 'odong-odong, perah susu sapi', '2024-11-21', '80000'),
('TKT-2150323ED7', 'odong-odong, mancing mania', '2024-11-13', '70000'),
('TKT-2F883DABDC', 'odong-odong, mancing mania, perah susu sapi', '2024-11-21', '100000'),
('TKT-482DCFAA99', 'memetik kangkung, mancing mania', '2024-11-05', '40000'),
('TKT-5FBEA21716', 'odong-odong, memetik kangkung', '2024-11-17', '70000'),
('TKT-6714993DA9', 'odong-odong, mancing mania, perah susu sapi', '2024-11-21', '100000'),
('TKT-6EA0D5DFE8', 'odong-odong, mancing mania', '2024-11-20', '70000'),
('TKT-C5A6974F53', 'odong-odong, mancing mania, perah susu sapi, memetik kangkung', '2024-11-22', '120000'),
('TKT-E3DF358896', 'mancing mania, odong-odong', '2024-11-05', '70000'),
('TKT-E85C0FC6C2', 'odong-odong, memetik kangkung', '2024-11-19', '70000'),
('TKT-F0CDB87A3F', 'odong-odong, mancing mania, perah susu sapi, memetik kangkung', '2024-11-27', '120000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `email_pengunjung` varchar(255) NOT NULL,
  `total_pembayaran` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `order_id`, `nama_pengunjung`, `email_pengunjung`, `total_pembayaran`, `status`, `created_at`) VALUES
(1, 'ORDER-673a3a72c51150.39284111', 'Ranu', 'ranu@gmail.com', 3000000.00, 'pending', '2024-11-17 18:48:19'),
(2, 'ORDER-673a3aa8c45297.48114699', 'Ranu', 'ranu@gmail.com', 3000000.00, 'pending', '2024-11-17 18:49:13'),
(3, 'ORDER-673a3b0a3b0497.58231084', 'Ranu', 'ranu@gmail.com', 3000000.00, 'pending', '2024-11-17 18:50:50'),
(4, 'ORDER-673a3bdb12d213.28459144', 'muhamad', 'marifyonanda4@gmail.com', 6000000.00, 'pending', '2024-11-17 18:54:19'),
(5, 'ORDER-673a3dde89ec25.40591199', 'Alya', 'agro@gmail.com', 10000000.00, 'pending', '2024-11-17 19:02:55'),
(6, 'ORDER-673a3df9559894.03774236', 'Alya', 'agro@gmail.com', 10000000.00, 'pending', '2024-11-17 19:03:22'),
(7, 'ORDER-673a4200e85f07.26346217', 'dudung', 'dudung@gmai.com', 2100000.00, 'pending', '2024-11-17 19:20:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `kode_admin` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode_user`, `kode_admin`, `username`, `password`, `status`, `role`) VALUES
(1, 2, 'admin', '$2y$10$Gtx20Sr7s3AavLhe2bNMKet3mTms9U0hdQPWjeEd52oFVrX0BsAkO', 'aktif', 'admin'),
(2, 0, 'Admin1', '$2y$10$Gtx20Sr7s3AavLhe2bNMKet3mTms9U0hdQPWjeEd52oFVrX0BsAkO', 'aktif', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indeks untuk tabel `data_atraksi`
--
ALTER TABLE `data_atraksi`
  ADD PRIMARY KEY (`kode_atraksi`);

--
-- Indeks untuk tabel `data_deskripsi`
--
ALTER TABLE `data_deskripsi`
  ADD PRIMARY KEY (`kode_deskripsi`);

--
-- Indeks untuk tabel `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`kode_pengunjung`),
  ADD KEY `kode_tiket` (`kode_tiket`),
  ADD KEY `kode_tiket_2` (`kode_tiket`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kode_pemesanan`),
  ADD KEY `kode_pengunjung` (`kode_pengunjung`),
  ADD KEY `pemesanan_ibfk_2` (`kode_tiket`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`kode_tiket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`kode_pengunjung`) REFERENCES `data_pengunjung` (`kode_pengunjung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
