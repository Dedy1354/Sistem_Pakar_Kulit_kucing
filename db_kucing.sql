-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 08:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kucing`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `KODE_DIAGNOSIS` varchar(255) NOT NULL,
  `KODE_KUCING` varchar(225) NOT NULL,
  `KODE_PENYAKIT` varchar(255) NOT NULL,
  `TGL_DIAGNOSIS` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`KODE_DIAGNOSIS`, `KODE_KUCING`, `KODE_PENYAKIT`, `TGL_DIAGNOSIS`) VALUES
('901', '101', '201', '2018-05-16'),
('902', '102', '201', '2018-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `KODE_GEJALA` varchar(255) NOT NULL,
  `KODE_PENYAKIT` varchar(255) NOT NULL,
  `NAMA_GEJALA` varchar(255) DEFAULT NULL,
  `KET_GEJALA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`KODE_GEJALA`, `KODE_PENYAKIT`, `NAMA_GEJALA`, `KET_GEJALA`) VALUES
('501', '201', 'gatal-gatal', 'getel lek');

-- --------------------------------------------------------

--
-- Table structure for table `kucing`
--

CREATE TABLE `kucing` (
  `KODE_KUCING` varchar(225) NOT NULL,
  `NAMA_KUCING` varchar(225) DEFAULT NULL,
  `UMUR_KUCING` date DEFAULT NULL,
  `BB_KUCING` varchar(225) DEFAULT NULL,
  `GENDER_KUCING` varchar(2) DEFAULT NULL,
  `JENIS_KUCING` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kucing`
--

INSERT INTO `kucing` (`KODE_KUCING`, `NAMA_KUCING`, `UMUR_KUCING`, `BB_KUCING`, `GENDER_KUCING`, `JENIS_KUCING`) VALUES
('101', 'danu', '2018-05-08', '20 kg', 'L', 'persia'),
('102', 'romi', '2018-05-17', '30 kg', 'P', 'anggora');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `KODE_PENYAKIT` varchar(255) NOT NULL,
  `NAMA_PENYAKIT` varchar(255) DEFAULT NULL,
  `KET_PENYAKIT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`KODE_PENYAKIT`, `NAMA_PENYAKIT`, `KET_PENYAKIT`) VALUES
('201', 'gatal', 'arugeruh apah yeh');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `KODE_SOLUSI` varchar(255) NOT NULL,
  `KODE_PENYAKIT` varchar(255) NOT NULL,
  `JENIS_SOLUSI` varchar(255) DEFAULT NULL,
  `KET_SOLUSI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`KODE_SOLUSI`, `KODE_PENYAKIT`, `JENIS_SOLUSI`, `KET_SOLUSI`) VALUES
('801', '201', 'sedang', 'sedang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `KODE_USER` varchar(255) NOT NULL,
  `NAMA_USER` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(2) DEFAULT NULL,
  `LEVEL_USER` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`KODE_USER`, `NAMA_USER`, `USERNAME`, `PASSWORD`, `JENIS_KELAMIN`, `LEVEL_USER`) VALUES
('1', 'danu', 'danu', 'danu', 'P', 'L'),
('2', 'romi', 'romi', 'romi', 'P', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`KODE_DIAGNOSIS`),
  ADD KEY `FK_DIAGNOSIS` (`KODE_PENYAKIT`),
  ADD KEY `FK_MELAKUKAN` (`KODE_KUCING`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`KODE_GEJALA`),
  ADD KEY `FK_DITANDAI` (`KODE_PENYAKIT`);

--
-- Indexes for table `kucing`
--
ALTER TABLE `kucing`
  ADD PRIMARY KEY (`KODE_KUCING`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`KODE_PENYAKIT`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`KODE_SOLUSI`),
  ADD KEY `FK_SOLUSI` (`KODE_PENYAKIT`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`KODE_USER`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `FK_DIAGNOSIS` FOREIGN KEY (`KODE_PENYAKIT`) REFERENCES `penyakit` (`KODE_PENYAKIT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`KODE_KUCING`) REFERENCES `kucing` (`KODE_KUCING`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `FK_DITANDAI` FOREIGN KEY (`KODE_PENYAKIT`) REFERENCES `penyakit` (`KODE_PENYAKIT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `FK_SOLUSI` FOREIGN KEY (`KODE_PENYAKIT`) REFERENCES `penyakit` (`KODE_PENYAKIT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
