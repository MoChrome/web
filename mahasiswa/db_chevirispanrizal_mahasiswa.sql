-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 07:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chevirispanrizal_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `chevirispanrizal_mahasiswa`
--

CREATE TABLE `chevirispanrizal_mahasiswa` (
  `npm` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chevirispanrizal_mahasiswa`
--

INSERT INTO `chevirispanrizal_mahasiswa` (`npm`, `nama`, `kelamin`, `alamat`, `email`, `telp`, `agama`) VALUES
('123', '1asd', 'Laki-Laki', 'Jalanasd', 'chevicandra@gmail.com', '22', 'jews2'),
('123123', 'asd', 'Laki-Laki', 'Jalan', 'chevicandra@gmail.com', '32131', 'jews2'),
('2', '3', 'Laki-Laki', 'Jalan', '4', '5', '6'),
('213', 'Chevi Candra', 'Laki-Laki', 'Jalanasd22', 'chevicandra@gmail.com', 'asd', 'jews222'),
('21312', 'asd', 'Laki-Laki', 'Jalan', 'chevicandra@gmail.com', '32131', 'jews'),
('23', '2323', 'Laki-Laki', 'Jalan', 'chevicandra@gmail.com', '32131', 'jews'),
('231', 'amks', 'Laki-Laki', '2', 'chevicandra@gmail.com', '22', 'jews2'),
('23123', '2', 'Laki-Laki', 'Jalanasd22', 'chevicandra@gmail.com', '22', 'jews'),
('231312', '45435', 'Laki-Laki', '45345', '45545', '5454', '545'),
('232323', '1231231', 'Laki-Laki', '123123', '213213', '123', '213'),
('3123', '2', 'Laki-Laki', 'Jalanasd22', 'chevicandra@gmail.com', '32131', 'jews'),
('3123123', 'Silerasd', 'Laki-Laki', '2', 'chevicandra@gmail.com', '22', '2'),
('4320060071801382', 'Chevi Candra2', 'Laki-Laki', 'Jalanasd22', 'chevicandra@gmail.com2', '222', 'jews22asd2'),
('55', 'Silerasd', 'Laki-Laki', 'Jalan', 'chevicandra@gmail.com', '123', 'jews2');

-- --------------------------------------------------------

--
-- Table structure for table `chevirispanrizal_user`
--

CREATE TABLE `chevirispanrizal_user` (
  `id` int(11) NOT NULL,
  `usernm` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chevirispanrizal_user`
--

INSERT INTO `chevirispanrizal_user` (`id`, `usernm`, `passwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chevirispanrizal_mahasiswa`
--
ALTER TABLE `chevirispanrizal_mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `chevirispanrizal_user`
--
ALTER TABLE `chevirispanrizal_user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
