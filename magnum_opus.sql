-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 10:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstdb`
--

-- --------------------------------------------------------
--
-- Table structure for table `audit_log`
--


CREATE TABLE `audit_log` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `query` varchar(200) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

+-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;



--
-- Table structure for table `accesslevel_mst`
--

CREATE TABLE `accesslevel_mst` (
  `id` int(11) NOT NULL,
  `access_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accesslevel_mst`
--

INSERT INTO `accesslevel_mst` (`id`, `access_name`) VALUES
(1, 'admin'),
(2, 'Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `cm01_mohon`
--

CREATE TABLE `cm01_mohon` (
  `cm01_id` bigint(20) NOT NULL,
  `cm01_userid` bigint(20) NOT NULL,
  `cm01_sysid` bigint(20) NOT NULL,
  `cm01_modulid` bigint(20) NOT NULL,
  `cm01_klasimodul` tinyint(1) NOT NULL DEFAULT 0,
  `cm01_klasiproses` tinyint(1) NOT NULL DEFAULT 0,
  `cm01_klasiskrin` tinyint(1) NOT NULL DEFAULT 0,
  `cm01_klasibug` tinyint(1) NOT NULL DEFAULT 0,
  `cm01_klasilaporan` tinyint(1) NOT NULL DEFAULT 0,
  `cm01_ulasan` text NOT NULL,
  `cm01_statusdok` varchar(2) NOT NULL DEFAULT '00',
  `cm01_ulasantindakan` text NOT NULL,
  `cm01_datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm01_mohon`
--

INSERT INTO `cm01_mohon` (`cm01_id`, `cm01_userid`, `cm01_sysid`, `cm01_modulid`, `cm01_klasimodul`, `cm01_klasiproses`, `cm01_klasiskrin`, `cm01_klasibug`, `cm01_klasilaporan`, `cm01_ulasan`, `cm01_statusdok`, `cm01_ulasantindakan`, `cm01_datecreated`) VALUES
(1, 1, 1, 1, 0, 1, 1, 0, 0, 'xcxxcxcxcxcxc', '00', '', '2021-10-11 02:10:20'),
(2, 1, 2, 2, 1, 0, 0, 0, 0, 'hahahahahaha', '00', '', '2021-10-11 02:36:02'),
(3, 1, 2, 2, 1, 0, 0, 0, 0, 'hahahahahaha', '00', '', '2021-10-11 02:37:13'),
(4, 1, 2, 2, 1, 0, 0, 0, 0, 'hahahahahaha', '00', '', '2021-10-11 02:37:55'),
(5, 1, 2, 2, 1, 0, 0, 0, 0, 'hahahahahaha', '00', '', '2021-10-11 02:38:49'),
(6, 1, 1, 7, 0, 1, 1, 0, 0, 'testing fully', '00', '', '2021-10-11 07:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `cm02_lampiran`
--

CREATE TABLE `cm02_lampiran` (
  `cm02_id` bigint(20) NOT NULL,
  `cm02_mohonid` bigint(20) NOT NULL,
  `cm02_namadokumen` varchar(100) NOT NULL,
  `cm02_lokasi` varchar(500) NOT NULL,
  `cm02_datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm02_lampiran`
--

INSERT INTO `cm02_lampiran` (`cm02_id`, `cm02_mohonid`, `cm02_namadokumen`, `cm02_lokasi`, `cm02_datecreated`) VALUES
(1, 6, '1633937003_b6e714f1f2fbdc7614fe.png', '', '2021-10-11 07:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `cm_modul`
--

CREATE TABLE `cm_modul` (
  `id` bigint(20) NOT NULL,
  `kod` varchar(5) NOT NULL,
  `sistemid` bigint(20) NOT NULL,
  `namamodul` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_modul`
--

INSERT INTO `cm_modul` (`id`, `kod`, `sistemid`, `namamodul`) VALUES
(1, '01', 1, 'BELANJAWAN'),
(2, '03', 1, 'PEROLEHAN'),
(3, '04', 1, 'PEMBAYARAN'),
(4, '05', 1, 'TERIMAAN'),
(5, '06', 1, 'PENDAHULUAN'),
(6, '07', 1, 'PANJAR WANG RUNCIT'),
(7, '08', 1, 'INVOIS'),
(8, '22', 1, 'NOTA KREDIT NOTA DEBIT (PEMBAYARAN)'),
(9, '10', 1, 'PENGURUSAN INVENTORI'),
(10, '11', 1, 'PENYATA PENYESUAIAN BANK'),
(11, '12', 1, 'NOTA KREDIT NOTA DEBIT'),
(12, '13', 1, 'SIMPANAN TETAP'),
(13, '14', 1, 'JURNAL'),
(14, '23', 1, 'HAPUS KIRA'),
(15, '16', 1, 'PENUTUPAN AKAUN'),
(16, '17', 1, 'UTILITI'),
(17, '18', 1, 'PENTADBIR SISTEM'),
(18, '02', 1, 'SYARIKAT'),
(19, '19', 1, 'PEROLEHAN (TEST MENU)'),
(20, '20', 1, 'LAPORAN KEWANGAN'),
(21, '21', 1, 'VERIFIKASI DATA'),
(22, '99', 2, 'PENTADBIR SISTEM'),
(23, '01', 2, 'PERIBADI'),
(24, '02', 2, 'ROC'),
(25, '03', 2, 'CUTI'),
(26, '04', 2, 'LATIHAN'),
(27, '05', 2, 'PERAKAM WAKTU'),
(28, '06', 2, 'GAJI'),
(29, '07', 2, 'TUNTUTAN'),
(30, '08', 2, 'PENILAIAN PRESTASI'),
(31, '09', 2, 'UTILITI'),
(32, '10', 2, 'SKT'),
(33, '11', 2, 'PERMIT MENGAJAR'),
(34, '12', 2, 'LAPORAN'),
(35, '13', 2, 'SLIP GAJI'),
(36, '14', 2, 'PENYATA PENDAPATAN'),
(37, '15', 2, 'KAJI SELIDIK');

-- --------------------------------------------------------

--
-- Table structure for table `cm_sistem`
--

CREATE TABLE `cm_sistem` (
  `id` bigint(20) NOT NULL,
  `kod` varchar(5) NOT NULL,
  `namasistem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_sistem`
--

INSERT INTO `cm_sistem` (`id`, `kod`, `namasistem`) VALUES
(1, 'SPK', 'SISTEM PENGURUSAN KEWANGAN'),
(2, 'SPSM', 'SISTEM PENGURUSAN SUMBER MANUSIA');

-- --------------------------------------------------------

--
-- Table structure for table `cm_statusdok`
--

CREATE TABLE `cm_statusdok` (
  `id` bigint(20) NOT NULL,
  `kod` varchar(2) NOT NULL,
  `butiran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cm_statusdok`
--

INSERT INTO `cm_statusdok` (`id`, `kod`, `butiran`) VALUES
(1, '00', 'PERMOHONAN BARU'),
(2, '01', 'BERJAYA DISOKONG'),
(3, '02', 'DALAM PROSES'),
(4, '03', 'SELESAI'),
(5, '04', 'PERBINCANGAN'),
(6, '05', 'SEMAKAN PEMOHON');

-- --------------------------------------------------------

--
-- Table structure for table `department_mst`
--

CREATE TABLE `department_mst` (
  `id` bigint(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name_bm` varchar(250) NOT NULL,
  `name_bi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_mst`
--

INSERT INTO `department_mst` (`id`, `code`, `name_bm`, `name_bi`) VALUES
(1, '01', 'Facility Management', 'Facility Management'),
(2, '02', 'IT', 'IT'),
(5, '03', 'Admin', 'Admin'),
(6, '04', 'UHPSB', 'UHPSB'),
(7, '05', 'Management', 'Management'),
(8, '06', 'Solar Energy', 'Solar Energy'),
(9, '07', 'HR/Finance', 'HR/Finance'),
(10, '08', 'Agriculture', 'Agriculture'),
(11, '09', 'F&B', 'F&B'),
(12, '10', 'TeaLive', 'TeaLive');

-- --------------------------------------------------------

--
-- Table structure for table `employee_mst`
--

CREATE TABLE `employee_mst` (
  `id_employee` bigint(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `ic` varchar(20) DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `id_dept` bigint(20) NOT NULL,
  `active_flag` tinyint(1) NOT NULL DEFAULT 1,
  `pwd` varchar(250) NOT NULL,
  `mod_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mod_by` varchar(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `image` blob DEFAULT NULL,
  `chg_pwd_flag` tinyint(1) NOT NULL DEFAULT 0,
  `accesslevel_id` bigint(20) NOT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_mst`
--

INSERT INTO `employee_mst` (`id_employee`, `name`, `ic`, `contact_no`, `id_dept`, `active_flag`, `pwd`, `mod_date`, `mod_by`, `create_date`, `create_by`, `id_user`, `email`, `image`, `chg_pwd_flag`, `accesslevel_id`, `file_name`, `file_path`) VALUES
(10, 'Syafiq bin Jasmani', '871207145391', '0123456789', 2, 1, '$2y$11$u53zjWBWb49RRYrpu2q9Ye1kJ6kOLSG76gKi12ZZH0wnOOamkguf.', '2021-10-24 19:38:27', 'admin1', '2021-10-20 06:17:08', '', 'admin1', 'tk.sama87@gmail.com', NULL, 1, 1, '1635151107_b303f17fe615befbf122.jpg', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(11, 'Takeru Kimura', '852152152252', '01234567891', 2, 1, '$2y$11$yGTNNAeJKbFCsuFzbvJXtOZ5KDDrqAPbxbNbrL342XdaQ5yckxaaS', '2021-10-24 19:44:31', 'admin1', '2021-10-24 00:50:15', 'admin1', 'nyamo', 'syafiq.jasmani87@gmail.com', NULL, 1, 2, '1635151471_054a446260da9d92b61e.jpg', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar');

-- --------------------------------------------------------

--
-- Table structure for table `groupaccess_mst`
--

CREATE TABLE `groupaccess_mst` (
  `id` bigint(20) NOT NULL,
  `accesslevel_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupaccess_mst`
--

INSERT INTO `groupaccess_mst` (`id`, `accesslevel_id`, `menu_id`) VALUES
(1, 1, 5),
(3, 2, 2),
(5, 2, 4),
(6, 1, 7),
(7, 1, 2),
(8, 1, 3),
(9, 1, 4),
(10, 1, 1),
(11, 1, 8),
(12, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE `login_session` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`id`, `user_id`, `session_id`, `date_created`) VALUES
(70, 'nyamo', 'oplp85go09gks59ahn5s560r834gpihv', '2021-10-24 01:11:36'),
(73, 'admin1', '08bpo5uc2gdvbps2122auqop6u85ojop', '2021-10-26 02:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `urutan` int(11) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `parent`, `urutan`, `menu_url`, `menu_level`) VALUES
(1, 'Aduan', 0, 1, '/home', 0),
(2, 'Utiliti', 0, 3, '/utilities', 0),
(6, 'Peribadi', 0, 2, '/peribadi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_level1`
--

CREATE TABLE `menu_level1` (
  `id` bigint(20) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `parent` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_level1`
--

INSERT INTO `menu_level1` (`id`, `menu_order`, `code`, `menu_name`, `menu_url`, `parent`) VALUES
(1, 1, '01', 'Menu', '/utilities/menu', 2),
(2, 1, '01', 'Registration', '/peribadi/daftarstaf', 6),
(3, 1, '', 'Registration', '/home/index', 1),
(4, 2, '', 'List', '/home/senaraiaduan', 1),
(5, 2, '', 'Access Level', '/utilities/accesslevel', 2),
(7, 0, '', 'Group Access', '/utilities/groupaccess', 2),
(8, 2, '01', 'List', '/peribadi/senaraistaf', 6),
(9, 0, '', 'Department', '/utilities/department', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_level2`
--

CREATE TABLE `menu_level2` (
  `id` bigint(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `parent` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_audit_trails`
--

CREATE TABLE `user_audit_trails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event` enum('insert','update','delete') NOT NULL,
  `table_name` varchar(128) NOT NULL,
  `old_values` text DEFAULT NULL,
  `new_values` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel_mst`
--
ALTER TABLE `accesslevel_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm01_mohon`
--
ALTER TABLE `cm01_mohon`
  ADD PRIMARY KEY (`cm01_id`);

--
-- Indexes for table `cm02_lampiran`
--
ALTER TABLE `cm02_lampiran`
  ADD PRIMARY KEY (`cm02_id`),
  ADD KEY `fk_cm02_mohonid_cm01_id` (`cm02_mohonid`);

--
-- Indexes for table `cm_modul`
--
ALTER TABLE `cm_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_sistem`
--
ALTER TABLE `cm_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_statusdok`
--
ALTER TABLE `cm_statusdok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_mst`
--
ALTER TABLE `department_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_mst`
--
ALTER TABLE `employee_mst`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `groupaccess_mst`
--
ALTER TABLE `groupaccess_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_level1`
--
ALTER TABLE `menu_level1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_level2`
--
ALTER TABLE `menu_level2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_audit_trails`
--
ALTER TABLE `user_audit_trails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel_mst`
--
ALTER TABLE `accesslevel_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cm01_mohon`
--
ALTER TABLE `cm01_mohon`
  MODIFY `cm01_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cm02_lampiran`
--
ALTER TABLE `cm02_lampiran`
  MODIFY `cm02_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cm_modul`
--
ALTER TABLE `cm_modul`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cm_sistem`
--
ALTER TABLE `cm_sistem`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cm_statusdok`
--
ALTER TABLE `cm_statusdok`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department_mst`
--
ALTER TABLE `department_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_mst`
--
ALTER TABLE `employee_mst`
  MODIFY `id_employee` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `groupaccess_mst`
--
ALTER TABLE `groupaccess_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu_level1`
--
ALTER TABLE `menu_level1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_level2`
--
ALTER TABLE `menu_level2`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_audit_trails`
--
ALTER TABLE `user_audit_trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cm02_lampiran`
--
ALTER TABLE `cm02_lampiran`
  ADD CONSTRAINT `fk_cm02_mohonid_cm01_id` FOREIGN KEY (`cm02_mohonid`) REFERENCES `cm01_mohon` (`cm01_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
