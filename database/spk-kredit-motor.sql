-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 12:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-kredit-motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `nama_konsumen` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pendapatan_konsumen` int(11) NOT NULL,
  `pendapatan_pasangan` int(11) NOT NULL,
  `pengeluaran_tanggungan` int(11) NOT NULL,
  `angsurang_perbulan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `id_motor`, `nama_konsumen`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `pekerjaan`, `pendapatan_konsumen`, `pendapatan_pasangan`, `pengeluaran_tanggungan`, `angsurang_perbulan`, `tanggal_pembelian`, `status`) VALUES
(1, 3, 'Ira Asmawati', 'Ira Asmawati', 'Laki-laki', '2018-05-05', 'Islam', 'PNS', 3000000, 800000, 700000, 690000, '2018-05-05', 1),
(2, 3, 'Baharuddin', 'Baharuddin', 'Perempuan', '2018-05-05', 'Islam', 'Wirausaha', 3000000, 800000, 700000, 690000, '2018-05-05', 1),
(3, 1, 'Sofyan Ibrahim', 'Sofyan Ibrahim', 'Laki-laki', '2018-05-05', 'Islam', 'Pedagang', 3000000, 1000000, 1000000, 1000000, '2018-05-05', 1),
(4, 2, 'Suci Pratami', 'Suci Pratami', 'Perempuan', '2018-05-05', 'Islam', 'Swasta', 3000000, 800000, 700000, 690000, '2018-05-05', 1),
(5, 2, 'Hendri Kurniawan', 'Hendri Kurniawan', 'Laki-laki', '2018-05-05', 'Islam', 'BUMN', 11000000, 1000000, 1000000, 1000000, '2018-05-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(55) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Kepribadian', 25),
(2, 'Uang Muka', 35),
(3, 'Kemampuan', 15),
(4, 'Jaminan', 15),
(5, 'Kondisi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_dp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `merk`, `tipe`, `warna`, `harga`, `harga_dp`) VALUES
(1, 'Yamaha', 'Nmax 2018 ', 'Kuning', 15000000, 3000000),
(2, 'Honda', 'Scoopy', 'Hitam', 17000000, 5000000),
(3, 'Honda', 'Blade 125 FI Disc Brake', 'Merah', 20000000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_evaluasi`
--

CREATE TABLE `nilai_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nilai_evaluasi`
--

INSERT INTO `nilai_evaluasi` (`id_evaluasi`, `id_konsumen`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 3),
(3, 1, 3, 3),
(4, 1, 4, 4),
(5, 1, 5, 3),
(6, 2, 1, 2),
(7, 2, 2, 3),
(8, 2, 3, 3),
(9, 2, 4, 5),
(10, 2, 5, 3),
(11, 3, 1, 5),
(12, 3, 2, 2),
(13, 3, 3, 2),
(14, 3, 4, 4),
(15, 3, 5, 2),
(16, 4, 1, 3),
(17, 4, 2, 4),
(18, 4, 3, 3),
(19, 4, 4, 4),
(20, 4, 5, 4),
(21, 5, 1, 4),
(22, 5, 2, 4),
(23, 5, 3, 5),
(24, 5, 4, 5),
(25, 5, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `jabatan`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Pimpinan', 'Pimpinan', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 2),
(3, 'Credit Analyst', 'Credit Analyst', 'ca', '5435c69ed3bcc5b2e4d580e393e373d3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(255) NOT NULL,
  `index_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `index_nilai`) VALUES
(1, 4, 'BPKB Motor', 4),
(2, 4, 'BPKB Mobil', 5),
(12, 5, 'Sangat Kurang', 1),
(13, 5, 'Kurang', 2),
(14, 5, 'Cukup', 3),
(15, 5, 'Baik', 4),
(16, 5, 'Sangat Baik', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sub_nilai`
--

CREATE TABLE `sub_nilai` (
  `id_subnilai` int(11) NOT NULL,
  `id_evaluasi` int(11) NOT NULL,
  `subnilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sub_nilai`
--

INSERT INTO `sub_nilai` (`id_subnilai`, `id_evaluasi`, `subnilai`) VALUES
(1, 1, 5),
(2, 1, 10),
(3, 1, 10),
(4, 6, 5),
(5, 6, 5),
(6, 6, 5),
(7, 11, 10),
(8, 11, 10),
(9, 11, 10),
(10, 16, 10),
(11, 16, 5),
(12, 16, 5),
(13, 21, 10),
(14, 21, 10),
(15, 21, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`),
  ADD KEY `id_motor` (`id_motor`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`),
  ADD UNIQUE KEY `warna` (`warna`);

--
-- Indexes for table `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `sub_nilai`
--
ALTER TABLE `sub_nilai`
  ADD PRIMARY KEY (`id_subnilai`),
  ADD KEY `id_evaluasi` (`id_evaluasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sub_nilai`
--
ALTER TABLE `sub_nilai`
  MODIFY `id_subnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD CONSTRAINT `konsumen_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id_motor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  ADD CONSTRAINT `nilai_evaluasi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_evaluasi_ibfk_3` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_nilai`
--
ALTER TABLE `sub_nilai`
  ADD CONSTRAINT `sub_nilai_ibfk_1` FOREIGN KEY (`id_evaluasi`) REFERENCES `nilai_evaluasi` (`id_evaluasi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
