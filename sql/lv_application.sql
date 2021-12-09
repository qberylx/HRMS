-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 09:03 AM
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
-- Table structure for table `lv_application`
--

CREATE TABLE `lv_application` (
  `id` bigint(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `leave_typecode` varchar(2) NOT NULL,
  `location` varchar(250) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `leave_status` varchar(2) NOT NULL,
  `daysoff` decimal(10,1) DEFAULT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mod_by` varchar(20) NOT NULL,
  `mod_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `approve_by` varchar(20) DEFAULT NULL,
  `approve_date` timestamp NULL DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indexes for table `lv_application`
--
ALTER TABLE `lv_application`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lv_application`
--
ALTER TABLE `lv_application`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
