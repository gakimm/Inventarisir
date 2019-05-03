-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 03:06 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_inventaris`
--

CREATE TABLE `app_inventaris` (
  `id_inventaris` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kondisi_baik` int(5) DEFAULT NULL,
  `kondisi_buruk` int(5) DEFAULT NULL,
  `jumlah` int(5) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `id_jenis` int(5) NOT NULL,
  `id_ruang` int(5) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_inventaris`
--

INSERT INTO `app_inventaris` (`id_inventaris`, `nama`, `kondisi_baik`, `kondisi_buruk`, `jumlah`, `keterangan`, `date_created`, `date_updated`, `id_jenis`, `id_ruang`, `id_petugas`, `gambar`) VALUES
(1, 'AC', NULL, NULL, 12, 'Ac baru', '2019-04-29 00:00:00', '2019-04-29 09:04:56', 1, 1, 1, 'ac.jpg'),
(3, 'Monitor', NULL, NULL, 7, 'monitor samsung', '2019-04-29 00:00:00', NULL, 1, 1, 1, 'monitor.jpg'),
(4, 'Kulkas', NULL, NULL, 7, 'kulkas baru', '2019-04-29 10:04:12', '2019-04-29 10:04:12', 1, 1, 2, 'kulkas.jpg'),
(5, 'Laptop', NULL, NULL, 10, 'Acer', '2019-04-30 02:04:07', NULL, 1, 1, 1, 'ac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_jenis`
--

CREATE TABLE `app_jenis` (
  `id_jenis` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_jenis`
--

INSERT INTO `app_jenis` (`id_jenis`, `nama`, `keterangan`) VALUES
(1, 'Elektronik', 'Hanya Untuk Di lab'),
(2, 'Kebersihan', 'Hanya Untuk kebersihan'),
(3, 'Alat Makan', 'semua berbahan stainless');

-- --------------------------------------------------------

--
-- Table structure for table `app_level`
--

CREATE TABLE `app_level` (
  `id_level` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_level`
--

INSERT INTO `app_level` (`id_level`, `nama`) VALUES
(1, 'Administrator'),
(2, 'Operator'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `app_pegawai`
--

CREATE TABLE `app_pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_pegawai`
--

INSERT INTO `app_pegawai` (`id_pegawai`, `nama`, `nip`, `alamat`, `date_created`) VALUES
(1, 'Milea', 11601001, 'Jalan Raya New York belah kidul', '2019-04-29'),
(2, 'Dolan', 11601002, 'Jalan Raya bogor no 15', '2019-04-29'),
(3, 'Lukman', 11605671, 'Cisarua', '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `app_peminjaman`
--

CREATE TABLE `app_peminjaman` (
  `id_peminjaman` int(5) NOT NULL,
  `date_borrow` datetime NOT NULL,
  `date_return` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0 => uncomplete, 1=> borrowed, 2 => returned, 3=>canceled',
  `id_pegawai` int(5) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `id_inventaris` int(5) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `barang_rusak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_peminjaman`
--

INSERT INTO `app_peminjaman` (`id_peminjaman`, `date_borrow`, `date_return`, `status`, `id_pegawai`, `id_petugas`, `id_inventaris`, `jumlah`, `barang_rusak`) VALUES
(39, '2019-04-30 12:04:34', NULL, 2, 2, 1, 4, 2, 0),
(40, '2019-04-30 02:04:40', '2019-04-30 00:00:00', 2, 3, 1, 5, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_petugas`
--

CREATE TABLE `app_petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_petugas`
--

INSERT INTO `app_petugas` (`id_petugas`, `nama`, `email`, `date_created`) VALUES
(1, 'Gabriel', 'gabriella@gmail.com', '2019-04-29'),
(2, 'Joyce', 'joyce@gmail.com', '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `app_ruang`
--

CREATE TABLE `app_ruang` (
  `id_ruang` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_ruang`
--

INSERT INTO `app_ruang` (`id_ruang`, `nama`, `keterangan`) VALUES
(1, 'R202', 'Lab Komputer'),
(2, 'R203', 'Lab Komputer'),
(3, 'R210', 'Lab PMN'),
(4, 'R206', 'Ruangan Lab ');

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(5) NOT NULL,
  `id_petugas` int(5) DEFAULT NULL,
  `id_pegawai` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id_user`, `username`, `password`, `id_level`, `id_petugas`, `id_pegawai`) VALUES
(1, 'gabriel1', 'admin123', 1, 1, NULL),
(2, 'milea31', 'pegawai123', 3, NULL, 1),
(3, 'lukman123', 'pegawai123', 3, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_inventaris`
--
ALTER TABLE `app_inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `app_jenis`
--
ALTER TABLE `app_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `app_level`
--
ALTER TABLE `app_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `app_pegawai`
--
ALTER TABLE `app_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `app_peminjaman`
--
ALTER TABLE `app_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `app_petugas`
--
ALTER TABLE `app_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `app_ruang`
--
ALTER TABLE `app_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_inventaris`
--
ALTER TABLE `app_inventaris`
  MODIFY `id_inventaris` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `app_jenis`
--
ALTER TABLE `app_jenis`
  MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_level`
--
ALTER TABLE `app_level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_pegawai`
--
ALTER TABLE `app_pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_peminjaman`
--
ALTER TABLE `app_peminjaman`
  MODIFY `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `app_petugas`
--
ALTER TABLE `app_petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `app_ruang`
--
ALTER TABLE `app_ruang`
  MODIFY `id_ruang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
