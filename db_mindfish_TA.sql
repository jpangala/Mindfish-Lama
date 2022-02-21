-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 02:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mindfish`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_ikan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `subtotal_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_ikan`, `id_penjualan`, `jumlah`, `harga_jual`, `subtotal_harga`) VALUES
(23, 2, 2, 1, 2000000, 2000000),
(24, 19, 2, 4, 200000, 800000),
(25, 19, 2, 4, 200000, 800000),
(26, 20, 2, 7, 25000, 175000),
(27, 1, 2, 12, 15000, 180000),
(28, 2, 3, 31, 2000000, 62000000),
(32, 20, 4, 77, 25000, 1925000),
(34, 2, 5, 90, 2000000, 180000000),
(35, 1, 7, 1, 15000, 15000),
(36, 1, 7, 1, 15000, 15000),
(37, 1, 7, 1, 15000, 15000),
(38, 1, 7, 1, 15000, 15000),
(39, 1, 7, 90, 15000, 1350000),
(40, 1, 7, 33, 15000, 495000),
(43, 2, 8, 2, 2000000, 4000000),
(45, 2, 8, 3, 2000000, 6000000),
(46, 1, 8, 4, 15000, 60000),
(47, 1, 8, 6, 15000, 90000),
(49, 1, 4, 12, 15000, 180000),
(50, 2, 6, 1, 2000000, 2000000),
(51, 2, 9, 3, 2000000, 6000000),
(52, 20, 9, 5, 25000, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `id` int(11) NOT NULL,
  `id_jenis` int(60) NOT NULL,
  `nama_ikan` varchar(50) NOT NULL,
  `deskripsi` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`id`, `id_jenis`, `nama_ikan`, `deskripsi`, `harga`) VALUES
(1, 1, 'Cupang Dragon Blue', '3 Bulan', 15000),
(2, 2, 'Arwana Super Red', '5 Bulan', 2000000),
(19, 0, 'Cupang Betta Mandor', '1 Bulan', 200000),
(20, 0, 'Cupang Crown Tail', '2 Bulan', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(60) NOT NULL,
  `nama_jenis` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`) VALUES
(1, 'Cupang Dragon'),
(2, 'Arwana Super Red');

-- --------------------------------------------------------

--
-- Table structure for table `pembudidaya`
--

CREATE TABLE `pembudidaya` (
  `user_account_id` int(11) NOT NULL,
  `nama_budidaya` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `domisili` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembudidaya`
--

INSERT INTO `pembudidaya` (`user_account_id`, `nama_budidaya`, `alamat`, `domisili`, `jenis`) VALUES
(1, 'Ikan_Air', 'Jln. Padjajaran 15 No.1', 'Bogor, Jawa Barat', 'Ikan Hias'),
(6, 'Ikan_Tawar', 'Jalan Sunter 3 no 2', 'Jakarta Selatan, DKI Jakarta', 'Ikan Konsumsi'),
(8, 'Ikan_licin', 'Jln. Tembalang raya no 1', 'Semarang, Jawa Tengah', 'Ikan Hias');

-- --------------------------------------------------------

--
-- Table structure for table `pembudidaya_ikan`
--

CREATE TABLE `pembudidaya_ikan` (
  `id_stok` int(100) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `ikan_id` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `stok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembudidaya_ikan`
--

INSERT INTO `pembudidaya_ikan` (`id_stok`, `user_account_id`, `ikan_id`, `keterangan`, `stok`) VALUES
(1, 6, 1, 'Cupang Merah 2 bulan', '250'),
(2, 6, 2, 'Lele 3 bulan', '450');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_penjualan` varchar(11) NOT NULL,
  `nama_pembeli` varchar(60) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_penjualan`, `nama_pembeli`, `total_harga`, `tanggal_dibuat`, `tanggal_selesai`, `status`) VALUES
(2, 'IKN01140001', 'Adit', 3955000, '2022-01-13 16:39:33', '0000-00-00 00:00:00', 'Proses'),
(4, 'IKN02050003', 'Erika', 2105000, '2022-02-05 20:01:00', '0000-00-00 00:00:00', 'Proses'),
(5, 'IKN02060004', 'Adi', 180000000, '2022-02-02 02:00:00', '0000-00-00 00:00:00', 'Proses'),
(6, 'IKN02060005', 'Jek', 2000000, '2022-02-06 02:12:00', '0000-00-00 00:00:00', 'Proses'),
(7, 'IKN02060006', 'Petrik', 1905000, '2022-02-06 02:12:00', '0000-00-00 00:00:00', 'Proses'),
(8, 'IKN02060007', 'Siska', 10150000, '2022-02-06 02:22:00', '0000-00-00 00:00:00', 'Proses'),
(9, 'IKN02110008', 'Felix', 6125000, '2022-02-11 01:04:00', '0000-00-00 00:00:00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `perusahaan_nama` varchar(50) NOT NULL,
  `perusahaan_deskripsi` varchar(1000) NOT NULL,
  `perusahaan_nomor` varchar(13) NOT NULL,
  `perusahaan_cp` varchar(13) NOT NULL,
  `perusahaan_alamat` varchar(250) NOT NULL,
  `perusahaan_domisili` varchar(50) NOT NULL,
  `perusahaan_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `perusahaan_nama`, `perusahaan_deskripsi`, `perusahaan_nomor`, `perusahaan_cp`, `perusahaan_alamat`, `perusahaan_domisili`, `perusahaan_jenis`) VALUES
(1, 'PT_Sejahtera', 'kaya raya', '0822222222', '0893429439', 'Jalan Merak 6 No 1', 'Bogor, Jawa Barat', 'Ikan Hias'),
(2, 'PT_Asoy', 'Asikin aja mang', '0889898989', '0834534534', 'Jalan Walet No. 13', 'Bogor, Jawa Barat', 'Ikan Air Tawar');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `pesanan_masuk` date NOT NULL,
  `pesanan_selesai` date NOT NULL,
  `request` int(11) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `ikan_id` int(11) NOT NULL,
  `request_temp` int(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'proses',
  `request_temp_admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `perusahaan_id`, `pesanan_masuk`, `pesanan_selesai`, `request`, `umur`, `ukuran`, `ikan_id`, `request_temp`, `status`, `request_temp_admin`) VALUES
(3, 1, '2021-03-03', '2021-04-03', 1968, '6 bulan', '20 kg', 2, 68, 'proses', 0),
(4, 1, '2021-03-04', '2021-04-08', 717, '1 bulan', '20 kg', 1, 0, 'selesai', 0),
(6, 1, '2021-03-06', '2021-03-20', 7000, '12 bulan', '30 kg', 1, 0, 'selesai', 5900);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(60) NOT NULL,
  `id_ikan` int(60) NOT NULL,
  `status` int(60) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `nama_pembudidaya` varchar(60) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_ikan`, `status`, `keterangan`, `nama_pembudidaya`, `tanggal`) VALUES
(1, 2, 30, 'penambahan stok', 'Daniel', '2022-01-08 23:15:24'),
(2, 1, 50, 'penambahan stok', 'Jeremia', '2022-01-04 18:40:06'),
(4, 2, 40, 'penambahan stok', 'Jek', '2022-01-02 18:44:33'),
(5, 2, -20, 'pengurangan stok', 'Petrik', '2022-01-03 18:44:33'),
(6, 18, 20, 'penambahan stok', 'Erika', '2022-01-08 04:42:00'),
(7, 19, 10, 'penambahan stok', 'Felix', '2022-01-09 00:52:00'),
(8, 19, 13, 'penambahan stok', 'Joseph', '2022-01-09 10:15:00'),
(9, 1, -30, 'pengurangan stok', 'Petrik', '2022-01-09 12:18:00'),
(10, 20, 35, 'penambahan stok', 'Clara', '2022-01-08 05:16:00'),
(12, 1, 10, 'penambahan stok', 'Adit', '2022-02-12 10:39:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_akun_budidaya`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_akun_budidaya` (
`id` int(11)
,`username` varchar(50)
,`nomor` varchar(13)
,`tanggal_daftar` date
,`nama` varchar(100)
,`umur` varchar(10)
,`user_image` varchar(50)
,`nama_budidaya` varchar(50)
,`alamat` varchar(100)
,`domisili` varchar(50)
,`jenis` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_detail_stok`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_detail_stok` (
`id_stok` int(100)
,`id` int(11)
,`nama` varchar(100)
,`nama_ikan` varchar(50)
,`keterangan` varchar(150)
,`stok` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_landing`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_landing` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_pesanan` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_pesanan_admin`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_pesanan_admin` (
`id` int(11)
,`perusahaan_nama` varchar(50)
,`nama_ikan` varchar(50)
,`keterangan` varchar(11)
,`request` int(11)
,`request_temp` int(50)
,`pesanan_masuk` date
,`pesanan_selesai` date
,`ukuran` varchar(50)
,`request_temp_admin` int(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_pesanan_task`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_pesanan_task` (
`username` varchar(50)
,`pesanan_id` int(11)
,`request` int(11)
,`jumlah` int(11)
,`status_task` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_rekap`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_rekap` (
`perusahaan_nama` varchar(50)
,`pesanan_masuk` date
,`pesanan_selesai` date
,`request` int(11)
,`status` varchar(50)
,`umur` varchar(11)
,`nama_ikan` varchar(50)
,`ukuran` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilan_task`
-- (See below for the actual view)
--
CREATE TABLE `tampilan_task` (
`nama_ikan` varchar(50)
,`task_id` int(11)
,`jumlah` int(11)
,`status_task` varchar(10)
,`pesanan_selesai` date
,`user_account_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `ikan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_task` varchar(10) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `user_account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `ikan_id`, `jumlah`, `status_task`, `pesanan_id`, `user_account_id`) VALUES
(4, 2, 110, 'diambil', 3, 1),
(5, 2, 10, 'ready', 3, 1),
(6, 1, 250, 'diambil', 4, 1),
(10, 2, 69, 'diambil', 3, 1),
(49, 1, 500, 'ready', 4, 1),
(50, 1, 500, 'diambil', 4, 1),
(51, 1, 5900, 'ready', 6, 6),
(52, 1, 400, 'diambil', 6, 6),
(53, 1, 700, 'diambil', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `tipe_user` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `password`, `nama`, `umur`, `nomor`, `user_image`, `tanggal_daftar`, `tipe_user`) VALUES
(1, 'jpangala', '$2y$10$eRKntAHyfmKDlzJyqY0AteiPIkgPc.oGi30W1AqRN2U3nizfRDqv6', 'Jeremia Joseph Pangala', '21', '3141441', 'ransel.jpg', '2021-03-15', 'admin'),
(6, 'jek', '$2y$10$h.cr/WjF13bHW8p4QgsR4.B1rra3yBsNFoh5VxZiNNAegcgSm9jyK', 'Jeck Gredo', '22', '4353663', '2.jpg', '2021-03-02', 'user'),
(8, 'erika', '$2y$10$tZguLr9107DIypv2W9U0/.YL4IwDaVUetIF7Pse/Dd3pgMdqsZ4Ei', 'Erika Clara', '20', '123456789', '1.jpg', '2021-03-11', 'user');

-- --------------------------------------------------------

--
-- Structure for view `tampilan_akun_budidaya`
--
DROP TABLE IF EXISTS `tampilan_akun_budidaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_akun_budidaya`  AS SELECT `user_account`.`id` AS `id`, `user_account`.`username` AS `username`, `user_account`.`nomor` AS `nomor`, `user_account`.`tanggal_daftar` AS `tanggal_daftar`, `user_account`.`nama` AS `nama`, `user_account`.`umur` AS `umur`, `user_account`.`user_image` AS `user_image`, `pembudidaya`.`nama_budidaya` AS `nama_budidaya`, `pembudidaya`.`alamat` AS `alamat`, `pembudidaya`.`domisili` AS `domisili`, `pembudidaya`.`jenis` AS `jenis` FROM (`user_account` join `pembudidaya`) WHERE `user_account`.`id` = `pembudidaya`.`user_account_id` AND `user_account`.`tipe_user` = 'user' ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_detail_stok`
--
DROP TABLE IF EXISTS `tampilan_detail_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_detail_stok`  AS SELECT `pembudidaya_ikan`.`id_stok` AS `id_stok`, `user_account`.`id` AS `id`, `user_account`.`nama` AS `nama`, `ikan`.`nama_ikan` AS `nama_ikan`, `pembudidaya_ikan`.`keterangan` AS `keterangan`, `pembudidaya_ikan`.`stok` AS `stok` FROM ((`pembudidaya_ikan` join `ikan`) join `user_account`) WHERE `user_account`.`id` = `pembudidaya_ikan`.`user_account_id` AND `ikan`.`id` = `pembudidaya_ikan`.`ikan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_landing`
--
DROP TABLE IF EXISTS `tampilan_landing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_landing`  AS SELECT `ikan`.`nama_ikan` AS `nama_ikan`, `ikan`.`jenis_ikan` AS `jenis_ikan`, sum(`pembudidaya_ikan`.`stok`) AS `stok` FROM (`ikan` join `pembudidaya_ikan`) WHERE `ikan`.`id` = `pembudidaya_ikan`.`ikan_id` GROUP BY `ikan`.`nama_ikan` ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_pesanan`
--
DROP TABLE IF EXISTS `tampilan_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_pesanan`  AS SELECT `pesanan`.`id` AS `id`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `pesanan`.`request_temp` AS `request`, `pesanan`.`umur` AS `keterangan`, `ikan`.`nama_ikan` AS `nama_ikan`, `ikan`.`gambar_ikan` AS `gambar_ikan`, `pesanan`.`ukuran` AS `ukuran` FROM (`pesanan` join `ikan`) WHERE `pesanan`.`ikan_id` = `ikan`.`id` AND `pesanan`.`request_temp` <> 0 ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_pesanan_admin`
--
DROP TABLE IF EXISTS `tampilan_pesanan_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_pesanan_admin`  AS SELECT `pesanan`.`id` AS `id`, `perusahaan`.`perusahaan_nama` AS `perusahaan_nama`, `ikan`.`nama_ikan` AS `nama_ikan`, `pesanan`.`umur` AS `keterangan`, `pesanan`.`request` AS `request`, `pesanan`.`request_temp` AS `request_temp`, `pesanan`.`pesanan_masuk` AS `pesanan_masuk`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `pesanan`.`ukuran` AS `ukuran`, `pesanan`.`request_temp_admin` AS `request_temp_admin` FROM ((`perusahaan` join `pesanan`) join `ikan`) WHERE `perusahaan`.`id` = `pesanan`.`perusahaan_id` AND `ikan`.`id` = `pesanan`.`ikan_id` AND `pesanan`.`status` = 'proses' ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_pesanan_task`
--
DROP TABLE IF EXISTS `tampilan_pesanan_task`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_pesanan_task`  AS SELECT `user_account`.`username` AS `username`, `pesanan`.`id` AS `pesanan_id`, `pesanan`.`request` AS `request`, `task`.`jumlah` AS `jumlah`, `task`.`status_task` AS `status_task` FROM ((`user_account` join `pesanan`) join `task`) WHERE `user_account`.`id` = `task`.`user_account_id` AND `pesanan`.`id` = `task`.`pesanan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_rekap`
--
DROP TABLE IF EXISTS `tampilan_rekap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_rekap`  AS SELECT `perusahaan`.`perusahaan_nama` AS `perusahaan_nama`, `pesanan`.`pesanan_masuk` AS `pesanan_masuk`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `pesanan`.`request` AS `request`, `pesanan`.`status` AS `status`, `pesanan`.`umur` AS `umur`, `ikan`.`nama_ikan` AS `nama_ikan`, `pesanan`.`ukuran` AS `ukuran` FROM ((`perusahaan` join `pesanan`) join `ikan`) WHERE `perusahaan`.`id` = `pesanan`.`perusahaan_id` AND `pesanan`.`ikan_id` = `ikan`.`id` AND `pesanan`.`status` = 'selesai' ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_task`
--
DROP TABLE IF EXISTS `tampilan_task`;

CREATE ALGORITHM=UNDEFINED DEFINER=`minb7118`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_task`  AS SELECT `ikan`.`nama_ikan` AS `nama_ikan`, `task`.`id` AS `task_id`, `task`.`jumlah` AS `jumlah`, `task`.`status_task` AS `status_task`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `task`.`user_account_id` AS `user_account_id` FROM ((`ikan` join `task`) join `pesanan`) WHERE `task`.`ikan_id` = `ikan`.`id` AND `task`.`pesanan_id` = `pesanan`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembudidaya`
--
ALTER TABLE `pembudidaya`
  ADD PRIMARY KEY (`user_account_id`);

--
-- Indexes for table `pembudidaya_ikan`
--
ALTER TABLE `pembudidaya_ikan`
  ADD PRIMARY KEY (`id_stok`,`user_account_id`,`ikan_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembudidaya_ikan`
--
ALTER TABLE `pembudidaya_ikan`
  MODIFY `id_stok` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
