-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2021 at 04:08 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_asetdesajh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `id_bangunan` int(11) NOT NULL,
  `kode_bangunan` varchar(100) NOT NULL,
  `nama_bangunan` varchar(150) NOT NULL,
  `lokasi` text NOT NULL,
  `nilai_aset` varchar(100) NOT NULL,
  `id_sumberdana` int(11) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `kondisi` varchar(150) NOT NULL,
  `ulb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bangunan`
--

INSERT INTO `bangunan` (`id_bangunan`, `kode_bangunan`, `nama_bangunan`, `lokasi`, `nilai_aset`, `id_sumberdana`, `tanggal_pembuatan`, `kondisi`, `ulb`) VALUES
(1, 'BG01', 'Aula Desa', 'Jl. Jambu Hulu', 'Rp. 500.000.000', 2, '2021-06-22', 'Bagus', '20m x 15m'),
(2, 'BG02', 'Balai Panggung', 'Jl. Jambu Hulu', 'Rp. 150.000.000', 1, '2021-07-02', 'Bagus', '5m x 8m');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `nilai_aset` varchar(150) NOT NULL,
  `id_sumberdana` int(11) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `jumlah_stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `tipe`, `nilai_aset`, `id_sumberdana`, `tanggal_perolehan`, `kondisi`, `jumlah_stok`) VALUES
(2, 'BRG01', 'Laptop', 'Elektronik', 'Rp. 7.000.000', 2, '2021-06-07', 'Baik', '21'),
(3, 'BRG02', 'TV', 'Elektronik', 'Rp. 2.000.000', 1, '2021-06-07', 'Baik', '8'),
(4, 'BRG03', 'Kursi', 'Plastik', 'Rp. 20.000.000', 14, '2021-06-16', 'Baik', '150');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_pinjam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail`, `id_pinjam`, `id_barang`, `jumlah_pinjam`) VALUES
(1, 2, 2, '3'),
(2, 2, 4, '50');

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` int(11) NOT NULL,
  `kode_jalan` varchar(100) NOT NULL,
  `nama_jalan` varchar(150) NOT NULL,
  `lokasi` text NOT NULL,
  `nilai_aset` varchar(100) NOT NULL,
  `id_sumberdana` int(11) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `kondisi` varchar(150) NOT NULL,
  `ulj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `kode_jalan`, `nama_jalan`, `lokasi`, `nilai_aset`, `id_sumberdana`, `tanggal_pembuatan`, `kondisi`, `ulj`) VALUES
(3, 'JLN001', 'Jln Mahatama', 'Hulu Sungai Selatan', 'Rp. 150.000.000', 1, '2021-06-02', 'Baik', '20 m2'),
(4, 'JLN002', 'Jl Merak Mas', 'Hulu Sungai Selatan', 'Rp. 500.000.000', 2, '2021-06-10', 'Baik', '100 m2');

-- --------------------------------------------------------

--
-- Table structure for table `pemusnahan`
--

CREATE TABLE `pemusnahan` (
  `id_pemusnahan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_musnah` varchar(25) NOT NULL,
  `tgl_pemusnahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_perbaikan` varchar(25) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `status_perbaikan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `keperluan` varchar(150) NOT NULL,
  `kontak` varchar(17) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pinjam` varchar(20) NOT NULL,
  `status_kembali` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sumberdana`
--

CREATE TABLE `sumberdana` (
  `id_sumberdana` int(11) NOT NULL,
  `nama_sumberdana` varchar(150) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumberdana`
--

INSERT INTO `sumberdana` (`id_sumberdana`, `nama_sumberdana`, `keterangan`) VALUES
(1, 'APBN', 'Anggaran Pendapatan dan Belanja Negara'),
(2, 'DIPA', '-'),
(12, 'PAGU', '-'),
(13, 'BANSOS', 'Bantuan Sosial'),
(14, 'APBU', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` int(11) NOT NULL,
  `kode_tanah` varchar(100) NOT NULL,
  `nama_tanah` varchar(150) NOT NULL,
  `lokasi` text NOT NULL,
  `nilai_aset` varchar(100) NOT NULL,
  `id_sumberdana` int(11) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `ult` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanah`
--

INSERT INTO `tanah` (`id_tanah`, `kode_tanah`, `nama_tanah`, `lokasi`, `nilai_aset`, `id_sumberdana`, `tanggal_perolehan`, `ult`) VALUES
(6, 'TNH001', 'Pemerintahan Kabupaten Hulu Sungai Selatan Desa Jambu Hulu', 'Jl. Jambu Hulu', 'Rp. 1.000.000.000', 2, '2021-06-10', '50 m2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`) VALUES
(1, 'Mita', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`id_bangunan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indexes for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  ADD PRIMARY KEY (`id_pemusnahan`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `sumberdana`
--
ALTER TABLE `sumberdana`
  ADD PRIMARY KEY (`id_sumberdana`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id_tanah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `id_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  MODIFY `id_pemusnahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sumberdana`
--
ALTER TABLE `sumberdana`
  MODIFY `id_sumberdana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
