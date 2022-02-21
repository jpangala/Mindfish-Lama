-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 05:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `id` int(11) NOT NULL,
  `nama_ikan` varchar(50) NOT NULL,
  `gambar_ikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`id`, `nama_ikan`, `gambar_ikan`) VALUES
(1, 'Cupang', 'cupang.jpg'),
(2, 'Lele', 'lele.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembudidaya`
--

CREATE TABLE `pembudidaya` (
  `user_account_id` int(11) NOT NULL,
  `nama_budidaya` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `domisili` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembudidaya`
--

INSERT INTO `pembudidaya` (`user_account_id`, `nama_budidaya`, `alamat`, `domisili`) VALUES
(1, 'Ikan_Air', 'Jln. Padjajaran 15 No.1', 'Bogor, Jawa Barat'),
(6, 'Ikan_Tawar', 'Jalan Sunter 3 no 2', 'Jakarta Selatan, DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pembudidaya_ikan`
--

CREATE TABLE `pembudidaya_ikan` (
  `user_account_id` int(11) NOT NULL,
  `ikan_id` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembudidaya_ikan`
--

INSERT INTO `pembudidaya_ikan` (`user_account_id`, `ikan_id`, `keterangan`) VALUES
(1, 1, 'Cupang Merah 2 bulan'),
(1, 2, 'Lele 3 bulan');

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
  `status` varchar(50) NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `perusahaan_id`, `pesanan_masuk`, `pesanan_selesai`, `request`, `umur`, `ukuran`, `ikan_id`, `request_temp`, `status`) VALUES
(3, 1, '2021-03-03', '2021-04-03', 1968, '6 bulan', '', 2, 68, 'proses'),
(4, 1, '2021-03-04', '2021-04-08', 717, '1 bulan', '', 1, 0, 'selesai'),
(6, 1, '2021-03-06', '2021-03-20', 7000, '12 bulan', '', 1, 7000, 'proses');

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
,`user_image` varchar(50)
,`nama_budidaya` varchar(50)
,`alamat` varchar(100)
,`domisili` varchar(50)
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
(50, 1, 500, 'diambil', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `password`, `nama`, `nomor`, `user_image`, `tanggal_daftar`) VALUES
(1, 'jpangala', '$2y$10$AVamPIuD6s7dHIQX5LRyi.Q0YbFzDLbey7gr3X5z5OjaTcY/PMOJa', 'Jeremia Joseph P', '08333333', '', '2021-03-02'),
(6, 'jek', '$2y$10$IOg2MUs8YT3ppIPU4DkR6O7yQKK1hBp2CwbrppO.Xd6fLI.ZOUIa2', 'Obed Jack Gredo', '082221834578', 'jerry2.jpg', '2021-03-09');

-- --------------------------------------------------------

--
-- Structure for view `tampilan_akun_budidaya`
--
DROP TABLE IF EXISTS `tampilan_akun_budidaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_akun_budidaya`  AS SELECT `user_account`.`id` AS `id`, `user_account`.`username` AS `username`, `user_account`.`nomor` AS `nomor`, `user_account`.`tanggal_daftar` AS `tanggal_daftar`, `user_account`.`nama` AS `nama`, `user_account`.`user_image` AS `user_image`, `pembudidaya`.`nama_budidaya` AS `nama_budidaya`, `pembudidaya`.`alamat` AS `alamat`, `pembudidaya`.`domisili` AS `domisili` FROM (`user_account` join `pembudidaya`) WHERE `user_account`.`id` = `pembudidaya`.`user_account_id` ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_pesanan`
--
DROP TABLE IF EXISTS `tampilan_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_pesanan`  AS SELECT `pesanan`.`id` AS `id`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `pesanan`.`request_temp` AS `request`, `pesanan`.`keterangan` AS `keterangan`, `ikan`.`nama_ikan` AS `nama_ikan`, `ikan`.`gambar_ikan` AS `gambar_ikan` FROM (`pesanan` join `ikan`) WHERE `pesanan`.`ikan_id` = `ikan`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_pesanan_admin`
--
DROP TABLE IF EXISTS `tampilan_pesanan_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_pesanan_admin`  AS SELECT `pesanan`.`id` AS `id`, `perusahaan`.`perusahaan_nama` AS `perusahaan_nama`, `ikan`.`nama_ikan` AS `nama_ikan`, `pesanan`.`keterangan` AS `keterangan`, `pesanan`.`request` AS `request`, `pesanan`.`request_temp` AS `request_temp`, `pesanan`.`pesanan_masuk` AS `pesanan_masuk`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai` FROM ((`perusahaan` join `pesanan`) join `ikan`) WHERE `perusahaan`.`id` = `pesanan`.`perusahaan_id` AND `ikan`.`id` = `pesanan`.`ikan_id` AND `pesanan`.`status` = 'proses' ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_pesanan_task`
--
DROP TABLE IF EXISTS `tampilan_pesanan_task`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_pesanan_task`  AS SELECT `user_account`.`username` AS `username`, `pesanan`.`id` AS `pesanan_id`, `pesanan`.`request` AS `request`, `task`.`jumlah` AS `jumlah`, `task`.`status_task` AS `status_task` FROM ((`user_account` join `pesanan`) join `task`) WHERE `user_account`.`id` = `task`.`user_account_id` AND `pesanan`.`id` = `task`.`pesanan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_rekap`
--
DROP TABLE IF EXISTS `tampilan_rekap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_rekap`  AS SELECT `perusahaan`.`perusahaan_nama` AS `perusahaan_nama`, `pesanan`.`pesanan_masuk` AS `pesanan_masuk`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `pesanan`.`request` AS `request`, `pesanan`.`status` AS `status`, `pesanan`.`keterangan` AS `keterangan`, `ikan`.`nama_ikan` AS `nama_ikan` FROM ((`perusahaan` join `pesanan`) join `ikan`) WHERE `perusahaan`.`id` = `pesanan`.`perusahaan_id` AND `pesanan`.`ikan_id` = `ikan`.`id` AND `pesanan`.`status` = 'selesai' ;

-- --------------------------------------------------------

--
-- Structure for view `tampilan_task`
--
DROP TABLE IF EXISTS `tampilan_task`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilan_task`  AS SELECT `ikan`.`nama_ikan` AS `nama_ikan`, `task`.`id` AS `task_id`, `task`.`jumlah` AS `jumlah`, `task`.`status_task` AS `status_task`, `pesanan`.`pesanan_selesai` AS `pesanan_selesai`, `task`.`user_account_id` AS `user_account_id` FROM ((`ikan` join `task`) join `pesanan`) WHERE `task`.`ikan_id` = `ikan`.`id` AND `task`.`pesanan_id` = `pesanan`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
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
  ADD PRIMARY KEY (`user_account_id`,`ikan_id`);

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
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
