-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 06:59 AM
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
(49, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-02 01:59:33'),
(50, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'mgt1r1e5fiqedeaoggllafrkalhop3ce\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54', '2021-11-03 07:05:49'),
(51, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'qc8ju8nv7u9sums7831eehju07te0l2q\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 04:34:11'),
(52, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Leave Setting\',\'43\',\'cuti/leave_setting\',3)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 04:35:39'),
(53, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,18)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 04:35:39'),
(54, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Department\',\'2\',\'/utilities/department\',7)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 04:53:12'),
(55, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,19)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 04:53:12'),
(56, 'admin1', 'INSERT INTO `lv_empsetting` (`id_user`, `year`, `leave_entitle`, `last_yr_bal`, `curr_yr_bal`) VALUES (\'user1\', \'2021\', \'25\', \'10\', \'20\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 05:01:15'),
(57, 'admin1', 'INSERT INTO `lv_empsetting` (`id_user`, `year`, `leave_entitle`, `last_yr_bal`, `curr_yr_bal`) VALUES (\'admin1\', \'2021\', \'30\', \'5\', \'25\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 05:01:15'),
(58, 'admin1', 'INSERT INTO `lv_empsetting` (`id_user`, `year`, `leave_entitle`, `last_yr_bal`, `curr_yr_bal`) VALUES (\'nyamo\', \'2021\', \'40\', \'0\', \'30\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 05:01:15'),
(59, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Leave Application\',\'43\',\'cuti/leave_application\',4)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 06:37:13'),
(60, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,20)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 06:37:13'),
(61, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-09 09:57:26'),
(62, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'1dhtccnn4hggiuahkr7m1ibltvfb03ea\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-10 02:03:13'),
(63, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-10 04:53:57'),
(64, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'kooo7ama5pf4uc6eavpm98k0thgdjb5e\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-10 04:55:30'),
(65, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-11 09:20:40'),
(66, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'cpf4n65japsrfsmteveq5ssh7dud6j3b\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-11 09:20:40'),
(67, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-11 11:17:44'),
(68, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'hnoohg7oi7rrsofs4al21ou59vqnc1ee\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-11 12:58:48'),
(69, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-11 14:53:06'),
(70, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'mq4933fgu1ujtb7s3c4tkfc3uhltgjpj\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71', '2021-11-15 07:13:40'),
(71, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'mq4933fgu1ujtb7s3c4tkfc3uhltgjpj\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71', '2021-11-15 07:28:13'),
(72, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-15 07:38:23'),
(73, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'6737n5kh9761217r2von76pd0k53vua1\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-15 07:38:23'),
(74, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-15 09:26:10'),
(75, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'6b4rf2regal9rvubnu2kb6lp4esfvf7b\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-16 02:17:16'),
(76, 'admin1', 'INSERT INTO menu_level1(menu_name,parent,menu_url,menu_order) VALUES(\'Leave Application List\',\'43\',\'cuti/applicationlist\',5)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-16 03:03:22'),
(77, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(1,21)', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-16 03:03:22'),
(78, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `create_by`, `create_date`, `mod_by`, `mod_date`, `leave_status`) VALU', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-16 03:10:08'),
(79, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-16 06:12:32'),
(80, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'slcdt72ch8g3lonamt19brbj59c0qhcv\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-16 06:12:32'),
(81, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 01:20:07'),
(82, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'2hi2kn1q8o203gneguu1kn5iu1268mj3\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 01:20:07'),
(83, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `create_by`, `create_date`, `mod_by`, `mod_date`, `leave_status`) VALU', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 03:53:57'),
(84, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 9\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 03:53:57'),
(85, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-16 21:58:03\', `approve_by` = \'admin1\', `approve_date` = \'2021-11-16 21:58:03\', `leave_status` = \'02\'\nWHERE `id` = \'02\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 03:58:03'),
(86, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 5, `curr_yr_bal` = 25, `last_yr_bal` = 1\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 03:58:03'),
(87, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-17 01:16:20\', `approve_by` = \'admin1\', `approve_date` = \'2021-11-17 01:16:20\', `leave_status` = \'02\'\nWHERE `id` = \'1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:16:20'),
(88, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 1, `curr_yr_bal` = 25, `last_yr_bal` = 1\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:16:21'),
(89, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `create_by`, `create_date`, `mod_by`, `mod_date`, `leave_status`) VALU', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:33:46'),
(90, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 5\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:33:46'),
(91, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `create_by`, `create_date`, `mod_by`, `mod_date`, `leave_status`) VALU', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:34:25'),
(92, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 9\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:34:25'),
(93, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-17 01:36:24\', `approve_by` = \'admin1\', `comment` = \'KASI CUTI\', `approve_date` = \'2021-11-17 01:36:24\', `leave_status` = \'02\'\nWHE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:36:25'),
(94, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 5, `curr_yr_bal` = 25, `last_yr_bal` = 1\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:36:25'),
(95, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-17 01:47:59\', `approve_by` = \'admin1\', `comment` = \'testttest\', `approve_date` = \'2021-11-17 01:47:59\', `leave_status` = \'02\'\nWHE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:47:59'),
(96, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 1, `curr_yr_bal` = 22, `last_yr_bal` = 0\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:47:59'),
(97, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `create_by`, `create_date`, `mod_by`, `mod_date`, `leave_status`) VALU', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:54:05'),
(98, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 2\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:54:05'),
(99, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-17 01:59:35\', `approve_by` = \'admin1\', `comment` = \'banyak sangat cuti\', `approve_date` = \'2021-11-17 01:59:35\', `leave_status` =', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:59:35'),
(100, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 0, `curr_yr_bal` = 22, `last_yr_bal` = 0\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 07:59:35'),
(101, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 08:24:49'),
(102, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'pkfh47vqk2dbobgln1vqj8r392n0icb5\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 08:26:53'),
(103, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-17 08:27:02'),
(104, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'ti607oa2ulpn6it03sttfqplafrb1lld\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:04:14'),
(105, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `create_by`, `create_date`, `mod_by`, `mod_date`, `leave_status`) VALU', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:06:20'),
(106, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 3\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:06:20'),
(107, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-17 19:06:45\', `approve_by` = \'admin1\', `comment` = \'diluluskan\', `approve_date` = \'2021-11-17 19:06:45\', `leave_status` = \'02\'\nWH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:06:45'),
(108, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 0, `curr_yr_bal` = 19, `last_yr_bal` = 0\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:06:45'),
(109, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:11:35'),
(110, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'c1slergda2pc8v7iuf4ohhqch80bmf5s\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:21:36'),
(111, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(\'3\',\'20\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:22:23'),
(112, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:24:18'),
(113, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'f84har7ujdpesc611thrvv3f2jof39j9\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:24:20'),
(114, 'admin1', 'UPDATE employee_mst set pwd = \'$2y$11$JIQXbguQJTGXFhYJatIoeOl3Qigly6XvH5sLHmBHvJUh/PCvbjozC\', chg_pwd_flag = 1 where id_user = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:24:40'),
(115, 'admin1', 'INSERT INTO employee_mst(id_user,name,ic,id_dept,mod_by,create_by,email,pwd,file_name,file_path,accesslevel_id) VALUES(\'staf1\',\'Ali Bin Ahmad\',\'900101040505\',\'02\',\'admin1\',\'admin1\',\'mazfarhamzah@gmail', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:28:45'),
(116, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:30:19'),
(117, 'staf1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'staf1\',\'e48jfbs6ja4j1m8losvorhe24l87ravp\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:30:33'),
(118, 'staf1', 'UPDATE employee_mst set pwd = \'$2y$11$yPKdAfgs3row/1rxHAsGWuA1i1z1Wp1bpcIs1KzF.4RLnkirfoPuq\', chg_pwd_flag = 1 where id_user = \'staf1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:30:44'),
(119, 'staf1', 'DELETE FROM login_session WHERE user_id = \'staf1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:31:09'),
(120, 'staf1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'staf1\',\'p4qeoc8a81ls606u27jc3gg05gsjnm0n\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:31:17'),
(121, 'staf1', 'DELETE FROM login_session WHERE user_id = \'staf1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:34:35'),
(122, 'staf1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'staf1\',\'jd1g6br5664i3jobci11jrg1qkqkrr9f\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:34:37'),
(123, 'staf1', 'DELETE FROM login_session WHERE user_id = \'staf1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:35:16'),
(124, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'c7rbgt4l1fk16b47iqknv584a0btdmkq\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:35:23'),
(125, 'admin1', 'INSERT INTO employee_mst(id_user,name,ic,id_dept,mod_by,create_by,email,pwd,file_name,file_path,accesslevel_id) VALUES(\'manager1\',\'Abdullah Bin Abu Bakar\',\'800501040521\',\'02\',\'admin1\',\'admin1\',\'mazfar', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:37:33'),
(126, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(\'4\',\'21\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:38:06'),
(127, 'admin1', 'INSERT INTO groupaccess_mst(accesslevel_id,menu_id) VALUES(\'4\',\'20\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:38:06'),
(128, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:39:37'),
(129, 'manager1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'manager1\',\'hn48s73sl57h72kudgr1keiv2el2008f\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:39:50'),
(130, 'manager1', 'UPDATE employee_mst set pwd = \'$2y$11$ct8GVSY4h6bkR9ba6qJuluInURI88QR2ZaDZKNfLa8wYsDSJZGgt.\', chg_pwd_flag = 1 where id_user = \'manager1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:40:03'),
(131, 'manager1', 'DELETE FROM login_session WHERE user_id = \'manager1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:40:58'),
(132, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'jci0p1ugpltojt4idups79jm8hg46cj5\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:41:02'),
(133, 'admin1', 'INSERT INTO `lv_empsetting` (`id_user`, `year`, `leave_entitle`, `last_yr_bal`, `curr_yr_bal`) VALUES (\'manager1\', \'2021\', \'30\', \'10\', \'20\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:44:31'),
(134, 'admin1', 'INSERT INTO `lv_empsetting` (`id_user`, `year`, `leave_entitle`, `last_yr_bal`, `curr_yr_bal`) VALUES (\'staf1\', \'2021\', \'30\', \'10\', \'20\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:44:31'),
(135, 'admin1', 'UPDATE `lv_empsetting` SET `leave_entitle` = \'25.0\', `last_yr_bal` = \'10.0\', `curr_yr_bal` = \'20.0\'\nWHERE `id_user` = \'user1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:44:31'),
(136, 'admin1', 'UPDATE `lv_empsetting` SET `leave_entitle` = \'30.0\', `last_yr_bal` = \'0.0\', `curr_yr_bal` = \'19.0\'\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:44:31'),
(137, 'admin1', 'UPDATE `lv_empsetting` SET `leave_entitle` = \'40.0\', `last_yr_bal` = \'0.0\', `curr_yr_bal` = \'30.0\'\nWHERE `id_user` = \'nyamo\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 01:44:31'),
(138, 'adminhr', 'INSERT INTO login_session(user_id,session_id) VALUES (\'adminhr\',\'7fta5itm3e58mk28n7thfs6al6d86r2d\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 03:42:35'),
(139, 'adminhr', 'DELETE FROM login_session WHERE user_id = \'adminhr\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 03:44:08'),
(140, 'adminhr', 'INSERT INTO login_session(user_id,session_id) VALUES (\'adminhr\',\'d0o70sdr4l7g8eb9l6u81bbs97im7gul\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 03:44:10'),
(141, 'adminhr', 'INSERT INTO department_mst(name_bm,name_bi) VALUES(\'test\',\'test\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 03:52:48'),
(142, 'adminhr', 'DELETE FROM department_mst WHERE id = \'13\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 03:52:54'),
(143, 'adminhr', 'DELETE FROM login_session WHERE user_id = \'adminhr\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 05:12:35'),
(144, 'manager1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'manager1\',\'7lsjt2a0fir57iujj3g1h5e2j2j1isbo\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 06:03:32'),
(145, 'manager1', 'DELETE FROM login_session WHERE user_id = \'manager1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69', '2021-11-18 07:43:29'),
(146, 'admin1', 'INSERT INTO login_session(user_id,session_id) VALUES (\'admin1\',\'5n4smvc68vl042c61999sc2vl05j4f2s\')', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45', '2021-11-22 00:39:35'),
(147, 'admin1', 'INSERT INTO `lv_application` (`id_user`, `startdate`, `enddate`, `leave_typecode`, `contact_no`, `location`, `reason`, `daysoff`, `lv_file_name`, `lv_file_path`, `create_by`, `create_date`, `mod_by`, ', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45', '2021-11-22 03:26:16'),
(148, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 1\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45', '2021-11-22 03:26:16'),
(149, 'admin1', 'UPDATE `lv_application` SET `mod_by` = \'admin1\', `mod_date` = \'2021-11-21 21:30:55\', `approve_by` = \'admin1\', `comment` = \'tiada gambar\', `approve_date` = \'2021-11-21 21:30:55\', `leave_status` = \'03\'\n', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45', '2021-11-22 03:30:55'),
(150, 'admin1', 'UPDATE `lv_empsetting` SET `applied_leave` = 0, `curr_yr_bal` = 19, `last_yr_bal` = 0\nWHERE `id_user` = \'admin1\'\nAND `year` = \'2021\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45', '2021-11-22 03:30:55'),
(151, 'admin1', 'DELETE FROM login_session WHERE user_id = \'admin1\'', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45', '2021-11-22 21:44:43');

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
  `name_bm` varchar(250) NOT NULL,
  `name_bi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_mst`
--

INSERT INTO `department_mst` (`id`, `name_bm`, `name_bi`) VALUES
(1, 'Facility Management', 'Facility Management'),
(2, 'IT', 'IT'),
(5, 'Admin', 'Admin'),
(6, 'UHPSB', 'UHPSB'),
(7, 'Management', 'Management'),
(8, 'Solar Energy', 'Solar Energy'),
(9, 'HR/Finance', 'HR/Finance'),
(10, 'Agriculture', 'Agriculture'),
(11, 'F&B', 'F&B'),
(12, 'TeaLive', 'TeaLive');

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
(10, 'Syafiq bin Jasmani', '871207145391', '', 2, 1, '$2y$11$JIQXbguQJTGXFhYJatIoeOl3Qigly6XvH5sLHmBHvJUh/PCvbjozC', '2021-10-20 06:17:08', '', '2021-10-20 06:17:08', '', 'admin1', 'mazfarhamzah@gmail.com', NULL, 1, 1, '1634710628_da464ded8228a8499661.png', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(11, 'Takeru Kimura', '852152152252', '', 2, 1, '$2y$11$yGTNNAeJKbFCsuFzbvJXtOZ5KDDrqAPbxbNbrL342XdaQ5yckxaaS', '2021-10-24 00:50:15', 'admin1', '2021-10-24 00:50:15', 'admin1', 'nyamo', 'syafiq.jasmani87@gmail.com', NULL, 1, 2, '1635036615_103ade78df70e23aef2b.jpg', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(12, 'hahahah', '3434343434', '', 2, 1, '$2y$11$seNcdNPIe0mlxfJ/m9fj0u7cxjH0nRdwaQ3Lg/q7YfUP/7rVHYBxC', '2021-10-26 15:03:36', 'admin1', '2021-10-26 15:03:36', 'admin1', 'user1', 'tk.sama87@gmail.com', NULL, 0, 2, '1635260616_0dc4f7cb6538c5531947.png', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(13, 'Ali Bin Ahmad', '900101040505', '', 2, 1, '$2y$11$yPKdAfgs3row/1rxHAsGWuA1i1z1Wp1bpcIs1KzF.4RLnkirfoPuq', '2021-11-18 01:28:44', 'admin1', '2021-11-18 01:28:44', 'admin1', 'staf1', 'mazfarhamzah@gmail.com', NULL, 1, 3, '1637198920_8fa3cf1886c6933f38e6.png', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(14, 'Abdullah Bin Abu Bakar', '800501040521', '', 2, 1, '$2y$11$ct8GVSY4h6bkR9ba6qJuluInURI88QR2ZaDZKNfLa8wYsDSJZGgt.', '2021-11-18 01:37:33', 'admin1', '2021-11-18 01:37:33', 'admin1', 'manager1', 'mazfarhamzah@gmail.com', NULL, 1, 4, '1637199448_f201ee98a7c0dcb0a4a2.png', 'C:\\xampp\\htdocs\\spa\\public/avatar'),
(15, 'Admin HR', '050505050505', '', 9, 1, '$2y$11$JIQXbguQJTGXFhYJatIoeOl3Qigly6XvH5sLHmBHvJUh/PCvbjozC', '2021-10-20 06:17:08', '', '2021-10-20 06:17:08', '', 'adminhr', 'mazfarhamzah@gmail.com', NULL, 1, 1, '1634710628_da464ded8228a8499661.png', 'C:\\xampp\\htdocs\\spa\\public/avatar');

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
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 3, 20),
(23, 4, 21),
(24, 4, 20);

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
  `lv_file_name` varchar(250) DEFAULT NULL,
  `lv_file_path` varchar(250) DEFAULT NULL,
  `create_by` varchar(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mod_by` varchar(20) NOT NULL,
  `mod_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `approve_by` varchar(20) DEFAULT NULL,
  `approve_date` timestamp NULL DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lv_application`
--

INSERT INTO `lv_application` (`id`, `id_user`, `startdate`, `enddate`, `leave_typecode`, `location`, `contact_no`, `reason`, `leave_status`, `daysoff`, `lv_file_name`, `lv_file_path`, `create_by`, `create_date`, `mod_by`, `mod_date`, `approve_by`, `approve_date`, `comment`) VALUES
(1, 'admin1', '2021-11-17', '2021-11-22', '01', 'Melaka', '0123456789', 'cuti rehat', '02', '4.0', NULL, NULL, 'admin1', '2021-11-15 13:10:08', 'admin1', '2021-11-16 17:16:20', 'admin1', '2021-11-16 17:16:20', NULL),
(2, 'admin1', '2021-11-24', '2021-11-30', '01', 'Melaka', '0123456789', 'test', '02', '5.0', NULL, NULL, 'admin1', '2021-11-16 13:53:57', 'admin1', '2021-11-16 13:58:03', 'admin1', '2021-11-16 13:58:03', NULL),
(3, 'admin1', '2021-12-01', '2021-12-06', '01', 'Melaka', '0123456789', 'nak cutiiiiiiiii', '02', '4.0', NULL, NULL, 'admin1', '2021-11-16 17:33:46', 'admin1', '2021-11-16 17:36:24', 'admin1', '2021-11-16 17:36:24', 'KASI CUTI'),
(4, 'admin1', '2021-12-07', '2021-12-10', '01', 'Melaka', '0123456789', 'nak rehattttttttttt', '02', '4.0', NULL, NULL, 'admin1', '2021-11-16 17:34:25', 'admin1', '2021-11-16 17:47:59', 'admin1', '2021-11-16 17:47:59', 'testttest'),
(5, 'admin1', '2021-12-13', '2021-12-14', '01', 'Melaka', '0123456789', 'oni', '03', '2.0', NULL, NULL, 'admin1', '2021-11-16 17:54:05', 'admin1', '2021-11-16 17:59:35', 'admin1', '2021-11-16 17:59:35', 'banyak sangat cuti'),
(6, 'admin1', '2021-12-20', '2021-12-22', '01', 'Melaka', '0123456789', 'test', '02', '3.0', NULL, NULL, 'admin1', '2021-11-17 11:06:19', 'admin1', '2021-11-17 11:06:45', 'admin1', '2021-11-17 11:06:45', 'diluluskan'),
(7, 'admin1', '2021-11-23', '2021-11-23', '04', 'Melaka', '0123456789', 'MC', '03', '1.0', '1637551576_2d835bfd042c8009fa38.jpeg', 'C:\\xampp\\htdocs\\spa\\public/cuti', 'admin1', '2021-11-21 13:26:16', 'admin1', '2021-11-21 13:30:55', 'admin1', '2021-11-21 13:30:55', 'tiada gambar');

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
(74, 'admin1', '2021', '30.0', '0.0', '19.0', '0.0', '0.0'),
(75, 'nyamo', '2021', '40.0', '0.0', '30.0', '0.0', '0.0'),
(76, 'manager1', '2021', '30.0', '10.0', '20.0', '0.0', '0.0'),
(77, 'staf1', '2021', '30.0', '10.0', '20.0', '0.0', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `lv_leavetype`
--

CREATE TABLE `lv_leavetype` (
  `id` bigint(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lv_leavetype`
--

INSERT INTO `lv_leavetype` (`id`, `code`, `description`) VALUES
(1, '01', 'Annual'),
(2, '02', 'Emergency'),
(3, '03', 'Unpaid'),
(4, '04', 'Medical'),
(5, '05', 'Replacement'),
(6, '06', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `lv_statusdoc`
--

CREATE TABLE `lv_statusdoc` (
  `id` bigint(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lv_statusdoc`
--

INSERT INTO `lv_statusdoc` (`id`, `code`, `description`) VALUES
(1, '01', 'Under Review'),
(2, '02', 'Approved'),
(3, '03', 'Not Approved');

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
(17, 2, '', 'Takwim List', 'cuti/takwimlist', 43),
(18, 3, '', 'Leave Setting', 'cuti/leave_setting', 43),
(19, 7, '', 'Department', '/utilities/department', 2),
(20, 4, '', 'Leave Application', 'cuti/leave_application', 43),
(21, 5, '', 'Leave Approval', 'cuti/applicationlist', 43);

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

-- --------------------------------------------------------

--
-- Table structure for table `ut_appbydep`
--

CREATE TABLE `ut_appbydep` (
  `approver_id` bigint(20) NOT NULL,
  `apply_dep_id` bigint(20) NOT NULL,
  `lvl1_approve_dep_id` bigint(20) NOT NULL,
  `lvl2_approve_dep_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `lv_application`
--
ALTER TABLE `lv_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lv_empsetting`
--
ALTER TABLE `lv_empsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lv_leavetype`
--
ALTER TABLE `lv_leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lv_statusdoc`
--
ALTER TABLE `lv_statusdoc`
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
-- Indexes for table `ut_appbydep`
--
ALTER TABLE `ut_appbydep`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

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
  MODIFY `id_employee` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `groupaccess_mst`
--
ALTER TABLE `groupaccess_mst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `lv_application`
--
ALTER TABLE `lv_application`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lv_empsetting`
--
ALTER TABLE `lv_empsetting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `lv_leavetype`
--
ALTER TABLE `lv_leavetype`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lv_statusdoc`
--
ALTER TABLE `lv_statusdoc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- AUTO_INCREMENT for table `ut_appbydep`
--
ALTER TABLE `ut_appbydep`
  MODIFY `approver_id` bigint(20) NOT NULL AUTO_INCREMENT;

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
