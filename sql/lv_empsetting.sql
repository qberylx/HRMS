-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 09:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magnum_opus`
--

-- --------------------------------------------------------

--
-- Table structure for table `lv_empsetting`
--

CREATE TABLE `lv_empsetting` (
  `id` bigint(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `leave_entitle` decimal(10,1) NOT NULL,
  `last_yr_bal` decimal(10,1) NOT NULL,
  `curr_yr_bal` decimal(10,1) NOT NULL,
  `prorate` decimal(10,1) NOT NULL,
  `applied_leave` decimal(10,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lv_empsetting`
--

INSERT INTO `lv_empsetting` (`id`, `id_user`, `year`, `leave_entitle`, `last_yr_bal`, `curr_yr_bal`, `prorate`, `applied_leave`) VALUES
(73, 'user1', '2021', '25.0', '10.0', '20.0', '0.0', '0.0'),
(74, 'admin1', '2021', '30.0', '5.0', '25.0', '0.0', '0.0'),
(75, 'nyamo', '2021', '40.0', '0.0', '30.0', '0.0', '0.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lv_empsetting`
--
ALTER TABLE `lv_empsetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lv_empsetting`
--
ALTER TABLE `lv_empsetting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
