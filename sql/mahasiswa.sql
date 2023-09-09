-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 05:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL DEFAULT 'L',
  `prodi` enum('IND','TIF','PET') NOT NULL DEFAULT 'TIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jk`, `prodi`) VALUES
(2, '1002', 'Sutrisno Hendrawan', 'L', 'TIF'),
(3, '4456', 'Fachrudin Hidayat', 'L', 'IND'),
(4, '5505', 'Farhan sdfsdf', 'L', 'IND'),
(6, '123456', 'Harun Simanjuntak', 'L', 'TIF'),
(7, '76543', 'Yahya', 'L', 'TIF'),
(8, '1010', 'Masliha', 'L', 'TIF'),
(9, '2020', 'Fitri Dian', 'P', 'PET'),
(11, '8888', 'Sintha', 'L', 'IND'),
(12, '3333', 'Rara', 'P', 'TIF'),
(13, '88888', 'Toni', 'L', 'IND'),
(16, '3689', 'Bonny', 'L', 'TIF'),
(17, '55778', 'Shanty Kumara', 'P', 'PET'),
(20, '227766', 'Raihan Sulaiman', 'L', 'IND'),
(21, '1167', 'Haykal Sulaiman', 'L', 'IND');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
