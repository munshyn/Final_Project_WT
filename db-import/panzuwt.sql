-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 07:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panzuwt`
--
CREATE DATABASE IF NOT EXISTS `panzuwt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `panzuwt`;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `collegeName` varchar(30) NOT NULL,
  `occupied` int(2) DEFAULT NULL,
  `availability` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeName`, `occupied`, `availability`) VALUES
('Kolej Tuanku Canselor', 55, 45),
('Kolej Tun Dr Ismail', 66, 34),
('Kolej Tunku Fatimah', 36, 64);

-- --------------------------------------------------------

--
-- Table structure for table `collegeapp`
--

CREATE TABLE `collegeapp` (
  `appId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `collegeName` varchar(30) DEFAULT NULL,
  `roomType` varchar(6) DEFAULT NULL,
  `appStatus` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `level`, `name`) VALUES
(1, 'mamu@gmail.com', 'mamu1', 1, 'Mahmud'),
(2, 'mejak@gmail.com', 'mejak2', 2, 'Amjad'),
(3, 'luqman@gmail.co', 'luqman2', 2, 'Luqman'),
(4, 'syedmirin@gmail', 'syedmirin3', 3, 'Syed'),
(5, 'mirwanwan@gmail', 'mirwanwan3', 3, 'Amir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeName`);

--
-- Indexes for table `collegeapp`
--
ALTER TABLE `collegeapp`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collegeapp`
--
ALTER TABLE `collegeapp`
  MODIFY `appId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collegeapp`
--
ALTER TABLE `collegeapp`
  ADD CONSTRAINT `collegeapp_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
