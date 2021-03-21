-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 05:42 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siini`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`, `nama_admin`, `foto`) VALUES
('admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Irvan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nid`, `password`, `nama_dosen`, `foto`) VALUES
('12345678', '123', 'Irvan Maulana', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `jk_mhs` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `thn_akademik` year(4) NOT NULL,
  `jurusan_mhs` enum('Teknik Informatika','Sistem Informasi','Manajemen Informatika','Komputer Akuntansi') NOT NULL,
  `jenjang_mhs` enum('D3','S1','','') NOT NULL,
  `kelas_program` enum('Pagi','Malam','Shift','') NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `password`, `nama_mhs`, `jk_mhs`, `thn_akademik`, `jurusan_mhs`, `jenjang_mhs`, `kelas_program`, `foto`) VALUES
('109180640033', '123', 'Irvan Maulana', 'Laki-Laki', 2018, 'Teknik Informatika', 'S1', 'Malam', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `kode_mk` varchar(5) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `jml_sks` int(2) NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi','Manajemen Informatika','Komputerisasi Akuntansi') NOT NULL,
  `nid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nim` varchar(20) NOT NULL,
  `kode_mk` varchar(5) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `thn_akademik` year(4) NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `nilai` int(3) NOT NULL,
  `grade` char(2) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `fk_nid` (`nid`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD KEY `fk_nim` (`nim`),
  ADD KEY `fk_kodemk` (`kode_mk`),
  ADD KEY `fk_nid` (`nid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD CONSTRAINT `tbl_matakuliah_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `tbl_dosen` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `tbl_matakuliah` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_3` FOREIGN KEY (`nid`) REFERENCES `tbl_dosen` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
