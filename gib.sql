-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 08:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gib2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'saiful', 'saiful@mail.com', 'tes123'),
(2, 'riza', 'riza@mail.com', 'tes123');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_catatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `catatan`) VALUES
(1, 'Tanggal 17 Maret ifthor (diponpes) .'),
(2, '24 Maret ifthor bersama adik-adik TPQ (Masjid KU).');

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah` int(11) NOT NULL,
  `tgl_hutang` date NOT NULL,
  `alasan` text NOT NULL,
  `penghutang` varchar(40) NOT NULL,
  PRIMARY KEY (`id_hutang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `jumlah`, `tgl_hutang`, `alasan`, `penghutang`) VALUES
(2, 1000000, '2019-10-17', 'Pinjam', 'riza'),
(4, 100000, '2019-10-18', 'tunggu gajian', 'lufias'),
(5, 0, '2019-10-19', '', ''),
(6, 0, '2019-10-20', '', ''),
(7, 200000, '2019-10-21', 'sakit', 'saiful'),
(8, 30000, '2019-10-22', 'berobat', 'saiful riza'),
(9, 0, '2019-10-23', '', ''),
(10, 20000, '2019-10-24', 'beli domain', 'yusril'),
(11, 120000, '2019-10-25', 'arifinal', 'untuk beli hosting'),
(12, 2500000, '2019-10-26', 'azir', 'untuk beli hosting'),
(13, 70000, '2019-10-25', 'Riza', 'Mau jalan jalan'),
(14, 50000, '0000-00-00', 'Riza', 'Beli rokok'),
(15, 40000, '2019-10-27', 'Riza', 'Uang Bensi'),
(16, 80000, '2019-10-28', 'Riza', 'Mau Nikahan'),
(17, 1000000, '2019-10-29', 'Riza', 'Biaya lahiran anak');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pondok` varchar(40) NOT NULL,
  `santri_ikhwan` int(40) NOT NULL,
  `santri_akhwat` int(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `kontak` varchar(40) NOT NULL,
  `nama_penanggung_jawab` varchar(40) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_pondok`, `santri_ikhwan`, `santri_akhwat`, `alamat`, `kontak`, `nama_penanggung_jawab`) VALUES
(1, 'PONPES. Ihyaul Ulum', 30, 40, 'Banaran, Sedayu, Kec. Muntilan, Kabupaten Magelang, Jawa Tengah 56412', '08170900589', 'Ustadz ******');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `nominal` int(20) NOT NULL,
  `sumber` varchar(20) NOT NULL,
  `id_keterangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pemasukan`),
  KEY `id_keterangan` (`id_keterangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`,`nama`,`no_telp`,`nominal`, `sumber`, `id_keterangan`, `tanggal`) VALUES
(1, 'hambaAllah', 123123, 100000, 'BSI', 2, '2024-01-05'),
(2, 'no Name', 1212, 50000, 'cash', 3,'2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`id_keterangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`,`jenis`) VALUES
(1, 'ota Mingguan'),
(2, 'ota Bulanan'),
(3, 'lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengeluaran` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `id_sumber`) VALUES
(1, '2019-10-22', 1100000, 10),
(3, '2019-10-16', 200000, 7),
(4, '2019-10-17', 3000000, 6),
(5, '2019-10-18', 100000, 7),
(6, '2019-10-19', 150000, 6),
(7, '2019-10-20', 100000, 7),
(8, '2019-10-21', 150000, 6),
(9, '2019-10-23', 123000, 9),
(10, '2019-10-15', 600000, 6),
(11, '2019-10-13', 20000, 7),
(12, '2019-10-12', 300000, 9),
(13, '2019-10-24', 500000, 8),
(14, '2019-10-30', 121212, 6),
(15, '2019-10-25', 60000, 6),
(16, '2019-10-26', 70000, 7),
(17, '2019-10-27', 60000, 8),
(18, '2019-10-28', 78000, 9),
(19, '2019-10-29', 79000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  PRIMARY KEY (`id_sumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama`) VALUES
(1, 'DONASI ORANG TUA ASUH'),
(2, 'KHAS'),
(3, 'KENCLENG'),
(4, 'OPEN DONASI');

-- --------------------------------------------------------

--
-- Table structure for table `uang`
--

CREATE TABLE `uang` (
  `id_uang` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_uang` date NOT NULL,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `id_pendapatan` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_uang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `uang`
--

INSERT INTO `uang` (`id_uang`, `tgl_uang`, `id_pengeluaran`, `id_pendapatan`, `jumlah`) VALUES
(1, '2019-10-23', NULL, 1, 500000),
(2, '2019-10-24', 2, NULL, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_keterangan` (`id_keterangan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `uang`
--
ALTER TABLE `uang`
  ADD PRIMARY KEY (`id_uang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uang`
--
ALTER TABLE `uang`
  MODIFY `id_uang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
