-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 07:49 AM
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
(3, '03', 'Admin', 'Admin'),
(4, '04', 'UHPSB', 'UHPSB'),
(5, '05', 'Management', 'Management'),
(6, '06', 'Solar Energy', 'Solar Energy'),
(7, '07', 'HR/Finance', 'HR/Finance'),
(8, '08', 'Agriculture', 'Agriculture'),
(9, '09', 'F&B', 'F&B'),
(10, '10', 'TeaLive', 'TeaLive');

-- --------------------------------------------------------

--
-- Table structure for table `employee_mst`
--

CREATE TABLE `employee_mst` (
  `id_employee` bigint(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `ic` varchar(20) DEFAULT NULL,
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
  `file_name` varchar(250) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_mst`
--

INSERT INTO `employee_mst` (`id_employee`, `name`, `ic`, `id_dept`, `active_flag`, `pwd`, `mod_date`, `mod_by`, `create_date`, `create_by`, `id_user`, `email`, `image`, `chg_pwd_flag`, `file_name`, `file_path`) VALUES
(1, 'Syafiq', '999999999999', 2, 1, '$2y$11$1dDAyJp95ch1YpcmiSs0PO7kdpaGc3YzEPF6Diec0A2HrkYgxJRHS', '2021-10-20 05:05:31', '', '2021-10-20 05:05:31', '', 'admin1', 'tk.sama87@gmail.com', NULL, 0, NULL, NULL),
(2, 'Azfar', '999999999999', 2, 1, '$2y$11$5gfOyQQ0rn.XpjcA.Z7MWegOUgA4/8SlDKUAW2tEXbTP7wTThtuLC', '2021-10-20 05:23:21', '', '2021-10-20 05:23:21', '', 'admin2', 'tk.sama87@gmail.com', NULL, 0, '1634707401_4907e770738c4013457f.jpg', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(3, 'test', '999999999999', 2, 1, '$2y$11$CCHiZsWDCxofGXp.iGQGmusua5h.H8SDdKevXpFTKTVlVB68qrwW2', '2021-10-20 05:27:43', '', '2021-10-20 05:27:43', '', 'admin3', 'tk.sama87@gmail.com', NULL, 0, '1634707662_e306575c2df89a86ff41.png', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(4, 'test', '999999999999', 2, 1, '$2y$11$x6efb03cNuTqZ/r8uohJLuZ3rcwUptdM5lsnwhJidXZd9kHtnI96y', '2021-10-20 05:28:45', '', '2021-10-20 05:28:45', '', 'admin3', 'tk.sama87@gmail.com', NULL, 0, '1634707725_cb508ad64df95c1bcd93.png', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(5, 'test', '999999999999', 2, 1, '$2y$11$42A6saiPpNjw4P7mliV.5u5O.UWR/zPtpEr4b5sgI6m8NWTqW2nJa', '2021-10-20 05:32:54', '', '2021-10-20 05:32:54', '', 'admin3', 'tk.sama87@gmail.com', NULL, 0, '1634707973_ba452f7112f01e603d3f.png', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(6, 'test', '999999999999', 2, 1, '$2y$11$94ULHwO25vt6f1UTyaFkHukPSRTXc5e.F32Vv3wl2oEClvLur5evO', '2021-10-20 05:34:38', '', '2021-10-20 05:34:38', '', 'admin3', 'tk.sama87@gmail.com', NULL, 0, '1634708078_2d0a5a0fd6a3540b9bb2.png', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(7, 'test', '999999999999', 2, 1, '$2y$11$YAVCj9WSplXolPKJ7wZvY..idfdn2mVNp5bYx9TTniDoJY.obMS0K', '2021-10-20 05:38:31', '', '2021-10-20 05:38:31', '', 'admin3', 'tk.sama87@gmail.com', NULL, 0, '1634708311_6bfff228fc97afb62036.png', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(8, 'test', '999999999999', 2, 1, '$2y$11$kn4pi/lciMzW2I8VqtilC.hsf5S5DP2T/wKlmUUXQOyiBW4EEI8ea', '2021-10-20 05:45:41', '', '2021-10-20 05:45:41', '', 'admin3', 'tk.sama87@gmail.com', NULL, 0, '1634708741_d9d4a95c2f4f473679db.png', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar'),
(9, 'test3', '999999999999', 2, 1, '$2y$11$JU3OC2O1f7gNDOuvpSAcx.QtIJh9qVll6btrU8rvHnw/3eog2FAkm', '2021-10-20 05:47:48', '', '2021-10-20 05:47:48', '', 'admin4', 'tk.sama87@gmail.com', NULL, 0, '1634708868_287ac53bcb84940660d2.jpg', 'G:\\XAAMP\\htdocs\\SPA\\public/avatar');

-- --------------------------------------------------------

--
-- Table structure for table `ut_menu`
--

CREATE TABLE `ut_menu` (
  `id` bigint(20) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `urutan` int(11) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ut_menu`
--

INSERT INTO `ut_menu` (`id`, `nama_menu`, `parent`, `urutan`, `menu_url`, `menu_level`) VALUES
(1, 'Aduan', 0, 99, '/home', 0),
(2, 'Utiliti', 0, 99, '/utilities', 0),
(3, 'Menu', 2, 99, '/utilities/menu', 1),
(4, 'Permohonan', 1, 99, '/home/index', 1),
(5, 'Senarai Aduan', 1, 99, '/home/senaraiaduan', 1),
(6, 'Peribadi', 0, 99, '/peribadi', 0),
(7, 'Daftar Staf', 6, 99, '/peribadi/daftarstaf', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `ut_menu`
--
ALTER TABLE `ut_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_mst`
--
ALTER TABLE `employee_mst`
  MODIFY `id_employee` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ut_menu`
--
ALTER TABLE `ut_menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
