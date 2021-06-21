-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 04:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uek-meranti`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`agama`) VALUES
('Islam'),
('Kristen'),
('Katolik'),
('Budha'),
('Hindu'),
('Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenkel` varchar(15) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date DEFAULT NULL,
  `status_activation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `agama`, `pekerjaan`, `alamat`, `email`, `no_telp`, `picture`, `password`, `level`, `createdAt`, `updatedAt`, `status_activation`) VALUES
('1455201001', 'Panji', 'Brebes, Jawa Timur', '2021-05-06', 'Wanita', 'Kristen', 'Developer Web', 'Jl. Pisangan Lama III', 'panjukusuma@gmail.com', '085165788909', '20190514_124218.jpg', 'c8837b23ff8aaa8a2dde915473ce0991', 2, '0000-00-00', '2021-05-06', 1),
('1455201002', 'Ivan Rojak', 'Lamongan', '1997-01-01', 'Pria', 'Islam', 'Frontend Developer', 'Jl. Pisangan Lama III', 'ivanrojak@gmail.com', '081221344321', 'pogba.jpg', 'c8837b23ff8aaa8a2dde915473ce0991', 2, '2021-05-06', NULL, 1),
('1455201003', 'Febrian', 'Bandung', '1997-01-01', 'Pria', 'Islam', 'Frontend Developer', 'Jl. Pisangan Lama III', 'febrian@gmail.com', '085165788909', 'cr7.jpg', 'c8837b23ff8aaa8a2dde915473ce0991', 2, '2021-05-06', NULL, 1),
('1455201004', 'Irwan Ardiansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 'c8837b23ff8aaa8a2dde915473ce0991', 2, '2021-05-07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `kode_angsuran` varchar(20) NOT NULL,
  `kode_pinjam` varchar(10) NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `angsuran_ke` tinyint(4) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `deskripsi` text NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`kode_angsuran`, `kode_pinjam`, `kode_anggota`, `angsuran_ke`, `jumlah_bayar`, `deskripsi`, `createdAt`) VALUES
('ANG-UEK-0001', 'P-UEK-0001', '1455201001', 1, 833333.3333333334, 'Angsuran Bulan Ke-1', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `kode_dokumen` varchar(15) NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `file_one` varchar(100) NOT NULL,
  `file_two` varchar(100) NOT NULL,
  `createdAtt` date NOT NULL,
  `modifiedAtt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`kode_dokumen`, `kode_anggota`, `file_one`, `file_two`, `createdAtt`, `modifiedAtt`) VALUES
('D-UEK-0001', '1455201001', 'BAHAN_SERTIFIKASI.pdf', 'TRANSKIP.pdf', '2021-05-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpan`
--

CREATE TABLE `jenis_simpan` (
  `id` int(11) NOT NULL,
  `jenis_simpanan` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_simpan`
--

INSERT INTO `jenis_simpan` (`id`, `jenis_simpanan`, `deskripsi`) VALUES
(1, 'Qurban', 'Simpanan Qurban');

-- --------------------------------------------------------

--
-- Table structure for table `jenkel`
--

CREATE TABLE `jenkel` (
  `jenkel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenkel`
--

INSERT INTO `jenkel` (`jenkel`) VALUES
('Pria'),
('Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `kode_level` tinyint(4) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`kode_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `kode_pinjam` varchar(20) NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `jumlah_pinjam` bigint(20) NOT NULL,
  `tenor` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_persetujuan` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`kode_pinjam`, `kode_anggota`, `jumlah_pinjam`, `tenor`, `tgl_pengajuan`, `tgl_persetujuan`, `status`, `deskripsi`) VALUES
('P-UEK-0001', '1455201001', 5000000, 1, '2021-05-07', '2021-05-07', 1, 'Pinjaman Mantap'),
('P-UEK-0002', '1455201001', 10000000, 4, '2021-05-08', NULL, 0, 'Mau minjam untuk buka bengkel');

-- --------------------------------------------------------

--
-- Table structure for table `simpan`
--

CREATE TABLE `simpan` (
  `kode_simpan` varchar(20) NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `kode_jenis_simpan` int(11) NOT NULL,
  `jumlah_simpan` bigint(20) NOT NULL,
  `tgl_simpan` datetime NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpan`
--

INSERT INTO `simpan` (`kode_simpan`, `kode_anggota`, `kode_jenis_simpan`, `jumlah_simpan`, `tgl_simpan`, `createdAt`, `updatedAt`) VALUES
('S-UEK-0001', '1455201002', 1, 2000000, '2021-05-06 18:36:49', '2021-05-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenor`
--

CREATE TABLE `tenor` (
  `kode_tenor` int(11) NOT NULL,
  `tenor` int(11) NOT NULL,
  `nama_tenor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenor`
--

INSERT INTO `tenor` (`kode_tenor`, `tenor`, `nama_tenor`) VALUES
(1, 6, '6 Bulan'),
(2, 12, '12 Bulan'),
(3, 18, '18 Bulan'),
(4, 24, '24 Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nik`, `nama`, `email`, `username`, `password`, `level`, `picture`, `createdAt`, `updatedAt`) VALUES
(4, '1755201000', 'Aldi Febrian', 'aldifebrian@gmail.com', 'aldifebrian', 'c8837b23ff8aaa8a2dde915473ce0991', 1, 'Unilak_Pas1.jpg', '2021-05-14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`kode_angsuran`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`kode_dokumen`);

--
-- Indexes for table `jenis_simpan`
--
ALTER TABLE `jenis_simpan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`kode_level`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indexes for table `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`kode_simpan`);

--
-- Indexes for table `tenor`
--
ALTER TABLE `tenor`
  ADD PRIMARY KEY (`kode_tenor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_simpan`
--
ALTER TABLE `jenis_simpan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `kode_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenor`
--
ALTER TABLE `tenor`
  MODIFY `kode_tenor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
