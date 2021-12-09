-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 03:00 AM
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
(3, 'Staf'),
(4, 'Manager');

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

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `user_id`, `query`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 'admin1', 'INSERT INTO menu(nama_menu,urutan) VALUES(\'TEST\',8)', '', '', '2021-10-26 06:48:35'),
(2, 'admin1', 'DELETE FROM menu WHERE id = \'37\'', '', '', '2021-10-26 06:49:42'),
(3, 'admin1', 'DELETE FROM menu WHERE id = \'36\'', '', '', '2021-10-26 06:50:10'),
(4, 'admin1', 'DELETE FROM menu WHERE id = \'35\'', '', '', '2021-10-26 06:50:13'),
(5, 'admin1', 'DELETE FROM menu WHERE id = \'34\'', '', '', '2021-10-26 06:50:15'),
(6, 'admin1', 'DELETE FROM menu WHERE id = \'33\'', '', '', '2021-10-26 06:50:19'),
(7, 'admin1', 'DELETE FROM menu WHERE id = \'41\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81', '2021-10-26 07:04:59'),
(8, 'admin1', 'DELETE FROM menu WHERE id = \'40\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81', '2021-10-26 07:05:02'),
(9, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81', '2021-10-26 14:50:03'),
(10, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'elog2h23coju1aghkls3l5eprdh6s8ej\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81', '2021-10-26 15:02:43'),
(11, 'admin1', 'INSERT INTO employee_mst(id_user,name,ic,id_dept,mod_by,create_by,email,pwd,file_name,file_path,accesslevel_id) VALUES(\'user1\',\'hahahah\',\'3434343434\',\'02\',\'admin1\',\'admin1\',\'tk.sama87@gmail.com\',\'$2y$', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81', '2021-10-26 15:03:36'),
(12, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 01:20:41'),
(13, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'h8frp98ebl982k0pn90o250cu0v54fnp\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 01:20:43'),
(14, 'admin1', 'DELETE FROM menu WHERE id = \'39\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 01:57:19'),
(15, 'admin1', 'DELETE FROM menu WHERE id = \'38\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 01:57:22'),
(16, 'admin1', 'INSERT INTO accesslevel_mst(access_name) VALUES(\'Staf\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:03:35'),
(17, 'admin1', 'INSERT INTO accesslevel_mst(access_name) VALUES(\'Manager\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:03:46'),
(18, 'admin1', 'DELETE FROM accesslevel_mst WHERE id = \'2\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:03:58'),
(19, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Approver By Access Level\',\'2\',\'/utilities/approver-by-access-level\',3)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:17:46'),
(20, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,19)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:17:46'),
(21, 'admin1', 'DELETE FROM menu_level1 WHERE id = \'9\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:22:45'),
(22, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Approver By Access Level\',\'2\',\'/utilities/approver-by-access-level\',4)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:23:08'),
(23, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Approver By Access Level\',\'2\',\'/utilities/approver-by-access-level\',5)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:24:21'),
(24, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Approver By Access Level\',\'2\',\'/utilities/approver-by-access-level\',6)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:27:14'),
(25, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,24)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:27:14'),
(26, 'admin1', 'DELETE FROM menu_level1 WHERE id = \'12\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:34:08'),
(27, 'admin1', 'DELETE FROM menu_level1 WHERE id = \'11\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:34:11'),
(28, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'asda\',\'2\',\'dasd\',5)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 03:34:18'),
(29, 'admin1', 'INSERT INTO `ut_appbyacclvl` (`apply_accesslvl_id`, `lvl1_approve_accesslvl_id`, `lvl2_approve_accesslvl_id`) VALUES (\'3\', \'4\', \'0\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 07:24:43'),
(30, 'admin1', 'DELETE FROM ut_appbyacclvl WHERE approver_id = \'1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 07:50:07'),
(31, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'test\',\'2\',\'test\',6);', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 08:23:13'),
(32, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,31)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 08:23:13'),
(33, 'admin1', 'DELETE FROM menu_level1 WHERE id = \'14\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 08:23:25'),
(34, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'asdadasd\',\'2\',\'asdasdasd\',6);', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 08:24:26'),
(35, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,34)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 08:24:26'),
(36, 'admin1', 'INSERT INTO `ut_appbyacclvl` (`apply_accesslvl_id`, `lvl1_approve_accesslvl_id`, `lvl2_approve_accesslvl_id`) VALUES (\'3\', \'4\', \'0\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-10-27 08:44:34'),
(37, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-01 02:27:48'),
(38, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'30lh0c798hfpiliq1g6c7qecvobhqo0b\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-01 02:27:48'),
(39, 'admin1', 'INSERT INTO menu(nama_menu,urutan) VALUES(\'Cuti\',4)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-01 02:35:59'),
(40, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Takwim Setting\',\'43\',\'cuti/takwimsetting\',1)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-01 04:07:49'),
(41, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,16)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-01 04:07:49'),
(42, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 00:06:46'),
(43, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'d9icn95nqljir3m0vldhu24fjk4jkm5q\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 00:06:46'),
(44, 'admin1', 'INSERT INTO lv_takwim(leave_date,leave_name,leave_type,create_by) VALUES(\'11/03/2021\',\'CUTI - CUTI MALAYSIA\',\'U\',\'admin1\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 00:15:08'),
(45, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Takwim List\',\'43\',\'cuti/takwimlist\',2)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 01:33:01'),
(46, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,17)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 01:33:01'),
(47, 'admin1', 'INSERT INTO lv_takwim(leave_date,leave_name,leave_type,create_by) VALUES(\'2021-11-04\',\'CUTI DEEPAVALI\',\'U\',\'admin1\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 01:53:28'),
(48, 'admin1', 'DELETE FROM lv_takwim WHERE id = \'1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 01:54:59'),
(49, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 01:59:33');

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
  `ID` bigint(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name_bm` varchar(250) NOT NULL,
  `name_bi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_mst`
--

INSERT INTO `department_mst` (`ID`, `code`, `name_bm`, `name_bi`) VALUES
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
  `contact_no` varchar(12) NOT NULL,
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
(10, 'Syafiq bin Jasmani', '871207145391', '', 2, 1, '$2y$11$u53zjWBWb49RRYrpu2q9Ye1kJ6kOLSG76gKi12ZZH0wnOOamkguf.', '2021-10-20 06:17:08', '', '2021-10-20 06:17:08', '', 'admin1', 'tk.sama87@gmail.com', NULL, 1, 1, '1634710628_da464ded8228a8499661.png', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(11, 'Takeru Kimura', '852152152252', '', 2, 1, '$2y$11$yGTNNAeJKbFCsuFzbvJXtOZ5KDDrqAPbxbNbrL342XdaQ5yckxaaS', '2021-10-24 00:50:15', 'admin1', '2021-10-24 00:50:15', 'admin1', 'nyamo', 'syafiq.jasmani87@gmail.com', NULL, 1, 2, '1635036615_103ade78df70e23aef2b.jpg', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(12, 'hahahah', '3434343434', '', 2, 1, '$2y$11$seNcdNPIe0mlxfJ/m9fj0u7cxjH0nRdwaQ3Lg/q7YfUP/7rVHYBxC', '2021-10-26 15:03:36', 'admin1', '2021-10-26 15:03:36', 'admin1', 'user1', 'tk.sama87@gmail.com', NULL, 0, 2, '1635260616_0dc4f7cb6538c5531947.png', 'C:\\xampp\\htdocs\\spa\\public/avatar');

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
(7, 1, 4),
(8, 1, 3),
(9, 1, 2),
(10, 1, 1),
(11, 1, 8),
(13, 1, 10),
(15, 1, 34),
(16, 1, 16),
(17, 1, 17);

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
(70, 'nyamo', 'oplp85go09gks59ahn5s560r834gpihv', '2021-10-24 01:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `lv_takwim`
--

CREATE TABLE `lv_takwim` (
  `id` bigint(20) NOT NULL,
  `leave_date` date NOT NULL,
  `leave_name` varchar(250) NOT NULL,
  `leave_type` varchar(4) NOT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lv_takwim`
--

INSERT INTO `lv_takwim` (`id`, `leave_date`, `leave_name`, `leave_type`, `create_by`, `create_date`) VALUES
(2, '2021-11-04', 'CUTI DEEPAVALI', 'U', 'admin1', '2021-11-02 01:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `lv_takwimtype`
--

CREATE TABLE `lv_takwimtype` (
  `id` bigint(20) NOT NULL,
  `code` varchar(4) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lv_takwimtype`
--

INSERT INTO `lv_takwimtype` (`id`, `code`, `description`) VALUES
(1, 'U', 'UMUM'),
(2, 'PB', 'CUTI PAKSA (BENCANA)'),
(3, 'BB', 'CUTI PAKSA (BUKAN BENCANA)');

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
(6, 'Peribadi', 0, 2, '/peribadi', 0),
(43, 'Cuti', 0, 4, '', 0);

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
(7, 3, '', 'Group Access', '/utilities/groupaccess', 2),
(8, 0, '', 'Staff List', '/peribadi/senaraistaf', 6),
(10, 4, '', 'Approver By Access Level', '/utilities/approver_by_access_level', 2),
(13, 5, '', 'asda', 'dasd', 2),
(15, 6, '', 'asdadasd', 'asdasdasd', 2),
(16, 1, '', 'Takwim Setting', 'cuti/takwimsetting', 43),
(17, 2, '', 'Takwim List', 'cuti/takwimlist', 43);

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
-- Table structure for table `ut_appbyacclvl`
--

CREATE TABLE `ut_appbyacclvl` (
  `approver_id` bigint(20) NOT NULL,
  `apply_accesslvl_id` bigint(20) NOT NULL,
  `lvl1_approve_accesslvl_id` bigint(20) NOT NULL,
  `lvl2_approve_accesslvl_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ut_appbyacclvl`
--

INSERT INTO `ut_appbyacclvl` (`approver_id`, `apply_accesslvl_id`, `lvl1_approve_accesslvl_id`, `lvl2_approve_accesslvl_id`) VALUES
(2, 3, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel_mst`
--
ALTER TABLE `accesslevel_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
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
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `lv_takwim`
--
ALTER TABLE `lv_takwim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lv_takwimtype`
--
ALTER TABLE `lv_takwimtype`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_menulvl1` (`parent`);

--
-- Indexes for table `menu_level2`
--
ALTER TABLE `menu_level2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ut_appbyacclvl`
--
ALTER TABLE `ut_appbyacclvl`
  ADD PRIMARY KEY (`approver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel_mst`
--
ALTER TABLE `accesslevel_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_mst`
--
ALTER TABLE `employee_mst`
  MODIFY `id_employee` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groupaccess_mst`
--
ALTER TABLE `groupaccess_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `lv_takwim`
--
ALTER TABLE `lv_takwim`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lv_takwimtype`
--
ALTER TABLE `lv_takwimtype`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `menu_level1`
--
ALTER TABLE `menu_level1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu_level2`
--
ALTER TABLE `menu_level2`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ut_appbyacclvl`
--
ALTER TABLE `ut_appbyacclvl`
  MODIFY `approver_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cm02_lampiran`
--
ALTER TABLE `cm02_lampiran`
  ADD CONSTRAINT `fk_cm02_mohonid_cm01_id` FOREIGN KEY (`cm02_mohonid`) REFERENCES `cm01_mohon` (`cm01_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_level1`
--
ALTER TABLE `menu_level1`
  ADD CONSTRAINT `fk_menu_menulvl1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
