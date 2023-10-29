-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 10:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_companies`
--

CREATE TABLE `db_companies` (
  `id_company` int(10) NOT NULL,
  `name_company` varchar(200) NOT NULL,
  `alias_company` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_companies`
--

INSERT INTO `db_companies` (`id_company`, `name_company`, `alias_company`) VALUES
(1, 'PT Sefas Pelindotama', 'SP'),
(4, 'PT Sefas Keliantama', 'SK'),
(5, 'PT Tribina Panutan', 'TP'),
(6, 'PT Blue Coolant Indonesia', 'BCI'),
(9, 'PT Cahaya Samoedera Bersaudara', 'CSB'),
(10, 'PT Energi Hijau Samoedera Bersaudara\r\n', 'EHSB'),
(11, 'PT Evron Cetiga Indonesia', 'ECI'),
(12, 'PT Sinergi Semesta Pratama', 'SSP');

-- --------------------------------------------------------

--
-- Table structure for table `db_company_areas`
--

CREATE TABLE `db_company_areas` (
  `id_area` int(11) NOT NULL,
  `nsid_area` int(12) NOT NULL,
  `id_company` int(11) NOT NULL,
  `code_area` varchar(100) NOT NULL,
  `name_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_company_areas`
--

INSERT INTO `db_company_areas` (`id_area`, `nsid_area`, `id_company`, `code_area`, `name_area`) VALUES
(1, 76, 6, 'BPN - BCI', 'Balikpapan'),
(2, 77, 9, 'BPN - CSB', 'Balikpapan'),
(3, 74, 4, 'BPN - SK', 'Balikpapan'),
(4, 73, 1, 'BPN - SP', 'Balikpapan'),
(5, 75, 5, 'BPN - TP', 'Balikpapan'),
(6, 86, 6, 'BJS - BCI', 'Banjarmasin (CSB)'),
(7, 87, 9, 'BJS - CSB', 'Banjarmasin (CSB)'),
(8, 84, 4, 'BJS - SK', 'Banjarmasin (CSB)'),
(9, 83, 1, 'BJS - SP', 'Banjarmasin (CSB)'),
(10, 85, 5, 'BJS - TP', 'Banjarmasin (CSB)'),
(11, 81, 6, 'BJP - BCI', 'Banjarmasin (BCI)'),
(12, 82, 9, 'BJP - CSB', 'Banjarmasin (CSB)'),
(13, 79, 4, 'BJP - SK', 'Banjarmasin (SK)'),
(14, 78, 1, 'BJP - SP', 'Banjarmasin (SP)'),
(15, 80, 5, 'BJP - TP', 'Banjarmasin (TP)'),
(16, 96, 6, 'BTM - BCI', 'Batam'),
(17, 97, 9, 'BTM - CSB', 'Batam'),
(18, 94, 4, 'BTM - SK', 'Batam'),
(19, 89, 1, 'BTM - SP', 'Batam'),
(20, 95, 5, 'BTM - TP', 'Batam'),
(21, 101, 6, 'BRU - BCI', 'Berau'),
(22, 102, 9, 'BRU - CSB', 'Berau'),
(23, 99, 4, 'BRU - SK', 'Berau'),
(24, 98, 1, 'BRU - SP', 'Berau'),
(25, 100, 5, 'BRU - TP', 'Berau'),
(26, 106, 6, 'BTG - BCI', 'Bitung'),
(27, 107, 9, 'BTG - CSB', 'Bitung'),
(28, 104, 4, 'BTG - SK', 'Bitung'),
(29, 103, 1, 'BTG - SP', 'Bitung'),
(30, 105, 5, 'BTG - TP', 'Bitung'),
(31, 112, 6, 'CKR - BCI', 'Cikarang'),
(32, 113, 9, 'CKR - CSB', 'Cikarang'),
(33, 110, 4, 'CKR - SK', 'Cikarang'),
(34, 108, 1, 'CKR - SP', 'Cikarang'),
(35, 111, 5, 'CKR - TP', 'Cikarang'),
(36, 117, 6, 'CLG - BCI', 'Cilegon'),
(37, 118, 9, 'CLG - CSB', 'Cilegon'),
(38, 115, 4, 'CLG - SK', 'Cilegon'),
(39, 114, 1, 'CLG - SP', 'Cilegon'),
(40, 116, 5, 'CLG - TP', 'Cilegon'),
(41, 329, 6, 'DPS - BCI', 'Denpasar'),
(42, 330, 9, 'DPS - CSB', 'Denpasar'),
(43, 327, 4, 'DPS - SK', 'Denpasar'),
(44, 326, 1, 'DPS - SP', 'Denpasar'),
(45, 328, 5, 'DPS - TP', 'Denpasar'),
(46, 68, 10, 'EHSB', 'Denpasar'),
(47, 653, 6, 'Head Office - BCI', 'Jakarta'),
(48, 654, 9, 'Head Office - CSB', 'Jakarta'),
(49, 655, 10, 'Head Office - EHSB', 'Jakarta'),
(50, 651, 4, 'Head Office - SK', 'Jakarta'),
(51, 650, 1, 'Head Office - SP', 'Jakarta'),
(52, 652, 5, 'Head Office - TP', 'Jakarta'),
(53, 546, 6, 'KDI - BCI', 'Kendari'),
(54, 547, 9, 'KDI - CSB', 'Kendari'),
(55, 544, 4, 'KDI - SK', 'Kendari'),
(56, 539, 1, 'KDI - SP', 'Kendari'),
(57, 545, 5, 'KDI - TP', 'Kendari'),
(58, 343, 6, 'KPG - BCI', 'Kupang'),
(59, 344, 9, 'KPG - CSB', 'Kupang'),
(60, 341, 4, 'KPG - SK', 'Kupang'),
(61, 340, 1, 'KPG - SP', 'Kupang'),
(62, 342, 5, 'KPG - TP', 'Kupang'),
(63, 441, 6, 'LBK - BCI', 'Lombok'),
(64, 442, 9, 'LBK - CSB', 'Lombok'),
(65, 439, 4, 'LBK - SK', 'Lombok'),
(66, 438, 1, 'LBK - SP', 'Lombok'),
(67, 440, 5, 'LBK - TP', 'Lombok'),
(68, 446, 6, 'MKS - BCI', 'Makassar'),
(69, 447, 9, 'MKS - CSB', 'Makassar'),
(70, 444, 4, 'MKS - SK', 'Makassar'),
(71, 443, 1, 'MKS - SP', 'Makassar'),
(72, 445, 5, 'MKS - TP', 'Makassar'),
(73, 800, 6, 'MRD - BCI', 'Marunda'),
(74, 801, 9, 'MRD - CSB', 'Marunda'),
(75, 798, 4, 'MRD - SK', 'Marunda'),
(76, 797, 1, 'MRD - SP', 'Marunda'),
(77, 799, 5, 'MRD - TP', 'Marunda'),
(78, 451, 6, 'MDN - BCI', 'Medan'),
(79, 452, 9, 'MDN - CSB', 'Medan'),
(80, 449, 4, 'MDN - SK', 'Medan'),
(81, 448, 1, 'MDN - SP', 'Medan'),
(82, 450, 5, 'MDN - TP', 'Medan'),
(83, 456, 6, 'PLM - BCI', 'Palembang'),
(84, 457, 9, 'PLM - CSB', 'Palembang'),
(85, 454, 4, 'PLM - SK', 'Palembang'),
(86, 453, 1, 'PLM - SP', 'Palembang'),
(87, 455, 5, 'PLM - TP', 'Palembang'),
(88, 461, 6, 'PTK - BCI', 'Pontianak'),
(89, 462, 9, 'PTK - CSB', 'Pontianak'),
(90, 459, 4, 'PTK - SK', 'Pontianak'),
(91, 458, 1, 'PTK - SP', 'Pontianak'),
(92, 460, 5, 'PTK - TP', 'Pontianak'),
(93, 781, 6, 'SMD - BCI', 'Samarinda'),
(94, 782, 9, 'SMD - CSB', 'Samarinda'),
(95, 779, 4, 'SMD - SK', 'Samarinda'),
(96, 778, 1, 'SMD - SP', 'Samarinda'),
(97, 780, 5, 'SMD - TP', 'Samarinda'),
(98, 466, 6, 'SOR - BCI', 'Sorong'),
(99, 467, 9, 'SOR - CSB', 'Sorong'),
(100, 464, 4, 'SOR - SK', 'Sorong'),
(101, 463, 1, 'SOR - SP', 'Sorong'),
(102, 465, 5, 'SOR - TP', 'Sorong'),
(103, 476, 6, 'SBS - BCI', 'Surabaya (CSB)'),
(104, 477, 9, 'SBS - CSB', 'Surabaya (CSB)'),
(105, 474, 4, 'SBS - SK', 'Surabaya (CSB)'),
(106, 473, 1, 'SBS - SP', 'Surabaya (CSB)'),
(107, 475, 5, 'SBS - TP', 'Surabaya (CSB)'),
(108, 471, 6, 'SBK - BCI', 'Surabaya (SK)'),
(109, 472, 9, 'SBK - CSB', 'Surabaya (SK)'),
(110, 469, 4, 'SBK - SK', 'Surabaya (SK)'),
(111, 468, 1, 'SBK - SP', 'Surabaya (SK)'),
(112, 470, 5, 'SBK - TP', 'Surabaya (SK)'),
(113, 481, 6, 'TGR - BCI', 'Tangerang'),
(114, 482, 9, 'TGR - CSB', 'Tangerang'),
(115, 479, 4, 'TGR - SK', 'Tangerang'),
(116, 478, 1, 'TGR - SP', 'Tangerang'),
(117, 480, 5, 'TGR - TP', 'Tangerang'),
(118, 486, 6, 'TRK - BCI', 'Tarakan'),
(119, 487, 9, 'TRK - CSB', 'Tarakan'),
(120, 484, 4, 'TRK - SK', 'Tarakan'),
(121, 483, 1, 'TRK - SP', 'Tarakan'),
(122, 485, 5, 'TRK - TP', 'Tarakan'),
(123, 0, 11, 'CKR - ECI', 'Cikarang'),
(124, 0, 12, 'MRD - SSP', 'Marunda'),
(125, 0, 12, 'CKR - SSP', 'Cikarang');

-- --------------------------------------------------------

--
-- Table structure for table `db_departemen`
--

CREATE TABLE `db_departemen` (
  `id_departemen` varchar(11) NOT NULL,
  `name_departemen` varchar(50) NOT NULL,
  `id_division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_departemen`
--

INSERT INTO `db_departemen` (`id_departemen`, `name_departemen`, `id_division`) VALUES
('1', 'Accounting', 3),
('10', 'POD', 4),
('11', 'Sales', 1),
('12', 'Supply Chain - Area 1', 6),
('13', 'Supply Chain - Area 2', 6),
('14', 'Technical', 5),
('2', 'Commercial', 3),
('3', 'Corporate Communication', 2),
('4', 'Finance', 3),
('5', 'HRGA', 4),
('6', 'ISO & HSE', 4),
('7', 'IT', 7),
('8', 'Legal', 7),
('9', 'Marketing Communication', 2),
('AT', 'Accounting & Tax', 0),
('CSBFAT', 'CSB FA & Tax', 0),
('CSBHRGAL', 'CSB HRGA Legal', 0),
('CSBS', 'CSB Sales', 0),
('CSBSC', 'CSB Supply Chain', 0),
('CSBT', 'CSB Technical', 0),
('EHSBS', 'EHSB Sales', 0),
('EHSBSC', 'EHSB Supply Chain', 0),
('ESBS', 'ESB Sales', 0),
('P', 'Pukati', 0),
('SBCI', 'Sales BCI', 0),
('SC', 'Supply Chain', 0),
('SKA', 'Sales Key Account', 0),
('SSKBN', 'Sales SK Bali Nugra', 0),
('SSKJ', 'Sales SK Jakarta', 0),
('SSKP', 'Sales SK Papua', 0),
('SSPKS', 'Sales SP Kalsel', 0),
('SSPKT', 'Sales SP Kaltim', 0),
('STPC', 'Sales TP Cilegon', 0),
('STPT', 'Sales TP Tangerang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_notification`
--

CREATE TABLE `db_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_label` varchar(200) NOT NULL,
  `notification_link` varchar(200) NOT NULL,
  `notification_datetime` datetime NOT NULL,
  `notification_reference_type` int(11) NOT NULL,
  `notification_reference_id` int(11) NOT NULL,
  `notification_read` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_read_notification`
--

CREATE TABLE `db_read_notification` (
  `id_read` int(11) NOT NULL,
  `id_notification` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_request`
--

CREATE TABLE `db_request` (
  `id_request` int(12) NOT NULL,
  `id_ticket` varchar(100) NOT NULL,
  `request_date` datetime NOT NULL,
  `id_request_level` int(2) NOT NULL,
  `request_by` int(12) NOT NULL,
  `id_company_area` int(4) NOT NULL,
  `id_company` int(4) NOT NULL,
  `request_to` int(12) NOT NULL,
  `id_request_category` int(11) NOT NULL,
  `request_subject` varchar(100) NOT NULL,
  `request_description` text NOT NULL,
  `request_attachment` text NOT NULL,
  `handle_by` int(12) NOT NULL,
  `id_request_status` int(4) NOT NULL,
  `request_submit_notes` text NOT NULL,
  `last_update_date` datetime NOT NULL,
  `completed_date` datetime NOT NULL,
  `closed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_request`
--

INSERT INTO `db_request` (`id_request`, `id_ticket`, `request_date`, `id_request_level`, `request_by`, `id_company_area`, `id_company`, `request_to`, `id_request_category`, `request_subject`, `request_description`, `request_attachment`, `handle_by`, `id_request_status`, `request_submit_notes`, `last_update_date`, `completed_date`, `closed_date`) VALUES
(32, 'T-SK-00001', '2022-08-18 15:52:13', 1, 205, 50, 4, 7, 1, 'testss', '<p>testss</p>', 'Ricky_Roesli.png', 126, 4, 'done', '2022-08-23 14:06:43', '2022-08-23 13:40:40', '2022-08-23 14:06:43'),
(33, 'T-SK-00002', '2022-08-23 09:27:49', 1, 205, 50, 4, 7, 1, 'Request penambahan akun google workspace untuk karyawan baru', '<p>Request penambahan akun google workspace untuk karyawan baru<br></p>', 'WhatsApp Image 2022-08-22 at 16.43.48.jpeg', 1, 3, 'done', '2022-08-23 15:40:48', '2022-08-23 15:40:48', '0000-00-00 00:00:00'),
(36, 'T-SK-00003', '2022-08-23 14:12:39', 3, 171, 50, 4, 7, 2, 'Request untuk cek scanner printer lt 1', '<p>Request untuk cek scanner printer lt 1 yang ter reset address usernya?<br></p>', '', 99, 2, '', '2022-08-23 15:40:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'T-SP-00001', '2022-08-23 17:07:22', 1, 1, 51, 1, 7, 2, 'test', '<p>test</p>', '', 126, 2, '', '2022-08-24 15:08:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'T-SK-00004', '2022-08-23 17:07:45', 1, 171, 50, 4, 7, 1, 'test', '<p>tst</p>', '', 99, 2, '', '2022-08-24 10:33:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'T-SK-00005', '2022-08-23 17:08:39', 3, 171, 50, 4, 7, 2, 'camera error', '<p>camera error</p>', '', 126, 3, 'done test ticket', '2022-08-23 17:24:02', '2022-08-23 17:24:02', '0000-00-00 00:00:00'),
(40, 'T-SP-00002', '2022-08-23 17:12:46', 2, 1, 51, 1, 7, 2, 'asdada da sad a', '<p>asda da da da&nbsp;</p>', '', 1, 2, '', '2022-08-23 17:14:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'T-SK-00006', '2022-08-24 10:36:44', 1, 205, 50, 4, 7, 1, 'demo ticketing', '<p>test demo ticketing</p>', 'star.png', 126, 4, 'sudah di cek kembali dan sudah complete yaa tolong tiketnya di close', '2022-08-24 10:54:18', '2022-08-24 10:53:33', '2022-08-24 10:54:18'),
(42, 'T-SK-00007', '2022-08-24 15:29:32', 1, 205, 50, 4, 7, 1, 'test rename attachment', '<p>test rename attachment<br></p>', 'TSK00007.png', 126, 2, '', '2022-08-25 17:23:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'T-SK-00008', '2022-08-25 17:34:41', 1, 205, 50, 4, 7, 1, 'test rename attachment 2', '<p>test rename attachment 2<br></p>', 'TSK00008.jpeg', 0, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'T-SK-00009', '2022-08-26 10:56:54', 1, 205, 50, 4, 7, 1, 'test add dari dashboard', 'test add dari dashboard', 'TSK00009.', 0, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_request_category`
--

CREATE TABLE `db_request_category` (
  `id_request_category` int(2) NOT NULL,
  `name_request_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_request_category`
--

INSERT INTO `db_request_category` (`id_request_category`, `name_request_category`) VALUES
(1, 'Supporting'),
(2, 'Troubleshooting');

-- --------------------------------------------------------

--
-- Table structure for table `db_request_comment`
--

CREATE TABLE `db_request_comment` (
  `id_request_comment` int(12) NOT NULL,
  `id_request` int(12) NOT NULL,
  `id_request_status` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `note_comment` text NOT NULL,
  `date_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_request_comment`
--

INSERT INTO `db_request_comment` (`id_request_comment`, `id_request`, `id_request_status`, `id_user`, `note_comment`, `date_comment`) VALUES
(1, 32, 2, 1, 'test', '2022-08-22 15:43:19'),
(2, 33, 2, 126, 'di handle mas dion ya', '2022-08-23 13:40:10'),
(3, 32, 3, 126, 'done', '2022-08-23 13:40:40'),
(4, 32, 4, 205, 'Closed', '2022-08-23 14:06:43'),
(5, 36, 2, 126, 'akan di handle mas budi ya', '2022-08-23 15:40:17'),
(6, 33, 3, 1, 'done', '2022-08-23 15:40:48'),
(7, 39, 3, 126, 'done test ticket', '2022-08-23 17:24:02'),
(8, 38, 2, 126, 'ticket di handle mas budi hari ini saya tidak sempat', '2022-08-24 10:33:30'),
(9, 40, 2, 126, 'gimana ini perkembangannya ?', '2022-08-24 10:36:00'),
(10, 41, 3, 126, 'done ya', '2022-08-24 10:42:21'),
(11, 41, 2, 205, 'masih belum bener tolong cek lagi dong', '2022-08-24 10:52:59'),
(12, 41, 3, 126, 'sudah di cek kembali dan sudah complete yaa tolong tiketnya di close', '2022-08-24 10:53:33'),
(13, 41, 4, 205, 'Closed', '2022-08-24 10:54:18'),
(14, 37, 2, 126, 'test', '2022-08-24 15:08:34'),
(15, 42, 2, 126, 'test email comment', '2022-08-25 15:50:01'),
(16, 42, 2, 126, 'test email comment', '2022-08-25 15:53:57'),
(17, 42, 2, 126, 'test email comment', '2022-08-25 15:54:49'),
(18, 42, 2, 205, 'test email user', '2022-08-25 16:54:18'),
(19, 42, 2, 205, 'test email user', '2022-08-25 16:57:53'),
(20, 42, 2, 205, 'test email user', '2022-08-25 17:06:44'),
(21, 42, 2, 205, 'test email user', '2022-08-25 17:09:52'),
(22, 42, 2, 126, 'test email admin', '2022-08-25 17:10:20'),
(23, 42, 2, 126, 'test', '2022-08-25 17:12:20'),
(24, 42, 2, 126, 'test lagi', '2022-08-25 17:14:31'),
(25, 42, 2, 205, 'test user lagi', '2022-08-25 17:14:42'),
(26, 42, 2, 205, 'comment', '2022-08-25 17:22:27'),
(27, 42, 2, 205, 'comment', '2022-08-25 17:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `db_request_level`
--

CREATE TABLE `db_request_level` (
  `id_request_level` int(2) NOT NULL,
  `name_request_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_request_level`
--

INSERT INTO `db_request_level` (`id_request_level`, `name_request_level`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `db_request_status`
--

CREATE TABLE `db_request_status` (
  `id_request_status` int(2) NOT NULL,
  `name_request_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_request_status`
--

INSERT INTO `db_request_status` (`id_request_status`, `name_request_status`) VALUES
(1, 'Not Started'),
(2, 'On Progress'),
(3, 'Completed'),
(4, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `db_request_timeline`
--

CREATE TABLE `db_request_timeline` (
  `id_request_timeline` int(12) NOT NULL,
  `id_request` int(12) NOT NULL,
  `update_by` int(12) NOT NULL,
  `date_timeline` datetime NOT NULL,
  `id_request_status` int(2) NOT NULL,
  `request_timeline_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_request_timeline`
--

INSERT INTO `db_request_timeline` (`id_request_timeline`, `id_request`, `update_by`, `date_timeline`, `id_request_status`, `request_timeline_notes`) VALUES
(53, 32, 205, '2022-08-18 15:52:13', 1, 'Create new ticket.'),
(54, 32, 1, '2022-08-22 15:36:47', 2, 'Claim this ticket.'),
(55, 32, 1, '2022-08-22 15:43:19', 2, 'Assigment this ticket to YOPIE ALAMSYAH'),
(56, 33, 205, '2022-08-23 09:27:49', 1, 'Create new ticket.'),
(59, 33, 126, '2022-08-23 13:30:42', 2, 'Claim this ticket.'),
(60, 33, 126, '2022-08-23 13:40:10', 2, 'Assigment this ticket to GIDEON BENJASON SIRAPANJI'),
(61, 32, 126, '2022-08-23 13:40:40', 3, 'Completed this ticket.'),
(62, 32, 205, '2022-08-23 14:06:43', 4, 'Closed this ticket.'),
(63, 36, 171, '2022-08-23 14:12:39', 1, 'Create new ticket.'),
(64, 36, 126, '2022-08-23 15:40:02', 2, 'Claim this ticket.'),
(65, 36, 126, '2022-08-23 15:40:17', 2, 'Assigment this ticket to BUDI SETIAWAN'),
(66, 33, 1, '2022-08-23 15:40:48', 3, 'Completed this ticket.'),
(67, 37, 1, '2022-08-23 17:07:22', 1, 'Create new ticket.'),
(68, 38, 171, '2022-08-23 17:07:45', 1, 'Create new ticket.'),
(69, 39, 171, '2022-08-23 17:08:39', 1, 'Create new ticket.'),
(70, 40, 1, '2022-08-23 17:12:46', 1, 'Create new ticket.'),
(71, 40, 1, '2022-08-23 17:14:50', 2, 'Claim this ticket.'),
(72, 39, 126, '2022-08-23 17:17:40', 2, 'Claim this ticket.'),
(73, 39, 126, '2022-08-23 17:24:02', 3, 'Completed this ticket.'),
(74, 38, 126, '2022-08-24 10:32:09', 2, 'Claim this ticket.'),
(75, 38, 126, '2022-08-24 10:33:30', 2, 'Assigment this ticket to BUDI SETIAWAN'),
(76, 41, 205, '2022-08-24 10:36:44', 1, 'Create new ticket.'),
(77, 41, 126, '2022-08-24 10:38:05', 2, 'Claim this ticket.'),
(78, 41, 126, '2022-08-24 10:42:21', 3, 'Completed this ticket.'),
(79, 41, 126, '2022-08-24 10:53:33', 3, 'Completed this ticket.'),
(80, 41, 205, '2022-08-24 10:54:18', 4, 'Closed this ticket.'),
(81, 37, 126, '2022-08-24 11:04:21', 2, 'Claim this ticket.'),
(82, 42, 205, '2022-08-24 15:29:32', 1, 'Create new ticket.'),
(83, 42, 126, '2022-08-25 15:54:43', 2, 'Has claimed this ticket.'),
(84, 43, 205, '2022-08-25 17:34:41', 1, 'Create new ticket.'),
(85, 44, 205, '2022-08-26 10:56:54', 1, 'Create new ticket.');

-- --------------------------------------------------------

--
-- Table structure for table `db_roles`
--

CREATE TABLE `db_roles` (
  `id` int(10) NOT NULL,
  `name_role` varchar(100) NOT NULL,
  `permissions` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_roles`
--

INSERT INTO `db_roles` (`id`, `name_role`, `permissions`) VALUES
(1, 'Administrator', '{\"admin_login\":1,\"admin_view\":1,\"request\":1,\"add_request\":1,\"edit_request\":1,\"delete_request\":1}'),
(2, 'User', '{\"admin_login\":1,\"admin_view\":1,\"request\":1,\"add_request\":1,\"edit_request\":0,\"delete_request\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `db_roles_users`
--

CREATE TABLE `db_roles_users` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_roles_users`
--

INSERT INTO `db_roles_users` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 1, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 2, 20),
(21, 2, 21),
(22, 2, 22),
(23, 2, 23),
(24, 2, 24),
(25, 2, 25),
(26, 2, 26),
(27, 2, 27),
(28, 2, 28),
(29, 2, 29),
(30, 2, 30),
(31, 2, 31),
(32, 2, 32),
(33, 2, 33),
(34, 2, 34),
(35, 2, 35),
(36, 2, 36),
(37, 2, 37),
(38, 2, 38),
(39, 2, 39),
(40, 2, 40),
(41, 2, 41),
(42, 2, 42),
(43, 2, 43),
(44, 2, 44),
(45, 2, 45),
(46, 2, 46),
(47, 2, 47),
(48, 2, 48),
(49, 2, 49),
(50, 2, 50),
(51, 2, 51),
(52, 2, 52),
(53, 2, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(57, 2, 57),
(58, 2, 58),
(59, 2, 59),
(60, 2, 60),
(61, 2, 61),
(62, 2, 62),
(63, 2, 63),
(64, 2, 64),
(65, 2, 65),
(66, 2, 66),
(67, 2, 67),
(68, 2, 68),
(69, 2, 69),
(70, 2, 70),
(71, 2, 71),
(72, 2, 72),
(73, 2, 73),
(74, 2, 74),
(75, 2, 75),
(76, 2, 76),
(77, 2, 77),
(78, 2, 78),
(79, 2, 79),
(80, 2, 80),
(81, 2, 81),
(82, 2, 82),
(83, 2, 83),
(84, 2, 84),
(85, 2, 85),
(86, 2, 86),
(87, 2, 87),
(88, 2, 88),
(89, 2, 89),
(90, 2, 90),
(91, 2, 91),
(92, 2, 92),
(93, 2, 93),
(94, 2, 94),
(95, 2, 95),
(96, 2, 96),
(97, 2, 97),
(98, 2, 98),
(99, 2, 99),
(100, 2, 100),
(101, 2, 101),
(102, 2, 102),
(103, 2, 103),
(104, 2, 104),
(105, 2, 105),
(106, 1, 106),
(107, 2, 107),
(108, 2, 108),
(109, 2, 109),
(110, 2, 110),
(111, 2, 111),
(112, 2, 112),
(113, 2, 113),
(114, 3, 114),
(115, 2, 115),
(116, 2, 116),
(117, 1, 117),
(118, 2, 118),
(119, 2, 119),
(120, 2, 120),
(121, 2, 121),
(122, 2, 122),
(123, 2, 123),
(124, 2, 124),
(125, 2, 125),
(126, 1, 126),
(127, 2, 127),
(128, 2, 128),
(129, 2, 129),
(130, 2, 130),
(131, 2, 131),
(132, 2, 132),
(133, 3, 133),
(134, 2, 134),
(135, 2, 135),
(136, 2, 136),
(137, 2, 137),
(138, 2, 138),
(139, 2, 139),
(140, 2, 140),
(141, 2, 141),
(142, 2, 142),
(143, 2, 143),
(144, 2, 144),
(145, 2, 145),
(146, 2, 146),
(147, 2, 147),
(148, 2, 148),
(149, 2, 149),
(150, 2, 150),
(151, 2, 151),
(152, 2, 152),
(153, 2, 153),
(154, 2, 154),
(155, 2, 155),
(156, 2, 156),
(157, 2, 157),
(158, 2, 158),
(159, 2, 159),
(160, 2, 160),
(161, 2, 161),
(162, 2, 162),
(163, 2, 163),
(164, 2, 164),
(165, 2, 165),
(166, 2, 166),
(167, 2, 167),
(168, 2, 168),
(169, 2, 169),
(170, 2, 170),
(171, 1, 171),
(172, 2, 172),
(173, 2, 173),
(174, 2, 174),
(175, 2, 175),
(176, 2, 176),
(177, 2, 177),
(178, 2, 178),
(179, 2, 179),
(180, 2, 180),
(181, 2, 181),
(182, 2, 182),
(183, 2, 183),
(184, 2, 184),
(185, 2, 185),
(186, 2, 186),
(187, 2, 187),
(188, 2, 188),
(189, 2, 189),
(190, 2, 190),
(191, 2, 191),
(192, 2, 192),
(193, 2, 193),
(194, 2, 194),
(195, 2, 195),
(196, 2, 196),
(197, 2, 197),
(198, 2, 198),
(199, 2, 199),
(200, 2, 200),
(201, 2, 201),
(202, 3, 202),
(203, 2, 203),
(204, 2, 204),
(205, 2, 205),
(206, 2, 206),
(207, 2, 207),
(208, 2, 208),
(209, 2, 209),
(210, 2, 210),
(211, 2, 211),
(212, 2, 212),
(213, 2, 213),
(214, 2, 214),
(215, 2, 215),
(216, 2, 216),
(217, 2, 217),
(218, 2, 218),
(219, 2, 219),
(220, 2, 220),
(221, 2, 221),
(222, 2, 222),
(223, 2, 223),
(224, 2, 224),
(225, 2, 225),
(226, 2, 226),
(227, 2, 227),
(228, 2, 228),
(229, 2, 229),
(230, 2, 230),
(231, 2, 231),
(232, 2, 232),
(233, 2, 233),
(234, 2, 234),
(235, 2, 235),
(236, 2, 236),
(237, 2, 237),
(238, 2, 238),
(239, 2, 239),
(240, 2, 240),
(241, 2, 241),
(242, 2, 242),
(243, 2, 243),
(244, 2, 244),
(245, 2, 245),
(246, 2, 246),
(247, 2, 247),
(248, 2, 248),
(249, 2, 249),
(250, 2, 250),
(251, 2, 251),
(252, 2, 252),
(253, 2, 253),
(254, 2, 254),
(255, 2, 255),
(256, 2, 256),
(257, 2, 257),
(258, 2, 258),
(259, 2, 259),
(260, 2, 260),
(261, 2, 261),
(262, 2, 262),
(263, 2, 263),
(264, 2, 264),
(265, 2, 265),
(266, 1, 266),
(267, 2, 267),
(268, 2, 268),
(269, 2, 269),
(270, 2, 270),
(271, 2, 271),
(272, 2, 272),
(273, 2, 273),
(274, 2, 274),
(275, 2, 275),
(276, 2, 276),
(277, 2, 277),
(278, 2, 278),
(279, 2, 279),
(280, 2, 280),
(281, 2, 281),
(282, 2, 282),
(283, 2, 283),
(284, 2, 284),
(285, 2, 285),
(286, 2, 286),
(287, 2, 287),
(288, 2, 288),
(289, 2, 289),
(290, 2, 290),
(291, 2, 291),
(292, 4, 292),
(293, 2, 293),
(294, 2, 294),
(295, 2, 295),
(296, 2, 296),
(297, 2, 297),
(298, 2, 298),
(299, 2, 299),
(300, 2, 300),
(301, 2, 301),
(302, 2, 302),
(303, 2, 303),
(304, 2, 304),
(305, 2, 305),
(306, 2, 306),
(307, 2, 307),
(308, 2, 308),
(309, 2, 309),
(310, 2, 310),
(311, 2, 311),
(312, 2, 312),
(313, 2, 313),
(314, 2, 314),
(315, 2, 315),
(316, 2, 316),
(317, 2, 317),
(318, 2, 318),
(319, 2, 319),
(320, 2, 320),
(321, 2, 321),
(322, 2, 322),
(323, 2, 323),
(324, 2, 324),
(325, 1, 325),
(326, 2, 326),
(327, 2, 327),
(328, 2, 328),
(329, 2, 329),
(330, 2, 330),
(331, 2, 331),
(332, 2, 332),
(333, 2, 333),
(334, 2, 334),
(335, 2, 335),
(336, 2, 336),
(337, 2, 337),
(338, 2, 338),
(339, 2, 339),
(340, 2, 340),
(341, 2, 341),
(342, 2, 342),
(343, 2, 343),
(344, 2, 344),
(345, 2, 345),
(346, 2, 346),
(347, 2, 347),
(348, 2, 348),
(349, 2, 349),
(350, 2, 350),
(351, 2, 351),
(352, 2, 352),
(353, 2, 353),
(354, 2, 354),
(355, 2, 355),
(356, 2, 356),
(357, 2, 357),
(358, 2, 358),
(359, 2, 359),
(360, 2, 360),
(361, 2, 361),
(362, 2, 362),
(363, 2, 363),
(364, 2, 364),
(365, 2, 365),
(366, 2, 366),
(367, 2, 367),
(368, 2, 368),
(369, 2, 369),
(370, 2, 370),
(371, 2, 371),
(372, 1, 372),
(373, 4, 373),
(374, 2, 374),
(375, 2, 375),
(376, 2, 376),
(377, 2, 377),
(378, 2, 378),
(379, 2, 379),
(380, 2, 380),
(381, 2, 381),
(382, 2, 382),
(383, 2, 383),
(384, 2, 384),
(385, 2, 385),
(386, 2, 386),
(387, 2, 387),
(388, 2, 388),
(389, 2, 389),
(390, 2, 390),
(391, 2, 391),
(392, 2, 392),
(393, 2, 393),
(394, 2, 394),
(395, 2, 395),
(396, 2, 396),
(397, 2, 397),
(398, 2, 398),
(399, 2, 399),
(400, 2, 400),
(401, 2, 401),
(402, 2, 402),
(403, 2, 403),
(404, 2, 404),
(405, 2, 405),
(406, 2, 406),
(407, 2, 407),
(408, 2, 408),
(409, 2, 409),
(410, 2, 410),
(411, 2, 411),
(412, 2, 412),
(413, 2, 413),
(414, 3, 414),
(415, 2, 415),
(416, 2, 416),
(417, 2, 417),
(418, 2, 418),
(419, 2, 419),
(420, 2, 420),
(421, 2, 421),
(422, 2, 422),
(423, 2, 423),
(424, 2, 424),
(425, 2, 425),
(426, 2, 426),
(427, 2, 427),
(428, 2, 428),
(429, 2, 429),
(430, 1, 430),
(431, 2, 431),
(432, 2, 432),
(433, 2, 433),
(434, 2, 434),
(435, 2, 435),
(436, 2, 436),
(437, 2, 437),
(438, 2, 438),
(439, 2, 439),
(440, 2, 440),
(441, 2, 441),
(442, 2, 442);

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL,
  `id_internal` varchar(25) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `id_role` int(1) NOT NULL,
  `id_role_ticket` int(1) NOT NULL,
  `id_position` varchar(15) NOT NULL,
  `id_company_areas` varchar(11) NOT NULL,
  `id_job_grade` varchar(11) NOT NULL,
  `id_company` varchar(11) NOT NULL,
  `id_sbu` varchar(11) NOT NULL,
  `id_direktorat` varchar(11) NOT NULL,
  `id_division` varchar(11) NOT NULL,
  `id_departemen` varchar(11) NOT NULL,
  `id_section` varchar(11) NOT NULL,
  `id_function` varchar(11) NOT NULL,
  `id_kota` varchar(11) NOT NULL,
  `join_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `direct_superior_1` varchar(20) NOT NULL,
  `direct_superior_2` varchar(20) NOT NULL,
  `direct_superior_3` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `input_date` date NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `id_internal`, `nik`, `password`, `name_user`, `email`, `phone`, `ktp`, `id_role`, `id_role_ticket`, `id_position`, `id_company_areas`, `id_job_grade`, `id_company`, `id_sbu`, `id_direktorat`, `id_division`, `id_departemen`, `id_section`, `id_function`, `id_kota`, `join_date`, `status`, `direct_superior_1`, `direct_superior_2`, `direct_superior_3`, `last_login`, `input_date`, `photo`) VALUES
(1, '5408', '01-011-0074', 'b7be342667b2adabf3e8f420616e278d', 'GIDEON BENJASON SIRAPANJI', 'it@sefasgroup.com', '818224324', '7318051312870000', 1, 1, '195', '51', '4', '1', 'HO - SP', '4', '7', '7', '', 'NS', 'Jakarta-CT', '2011-08-01', 'Active', '01-007-0030', '01-097-0001', '', '2022-08-23 03:40:40', '0000-00-00', 'metals.jpeg'),
(2, '', '01-001-0005', 'b7be342667b2adabf3e8f420616e278d', 'PURWANI HANDAYANI', 'purwani@sefasgroup.com', '', '', 2, 2, '213', '51', '10', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2001-04-16', 'Active', '01-006-0018', '01-018-0359', '', '2021-09-24 00:00:00', '0000-00-00', ''),
(3, '', '01-005-0008', 'b7be342667b2adabf3e8f420616e278d', 'HARIS HIDAJAT WIJONO', 'haris.wijono@sefasgroup.com', '', '', 2, 2, '11', '4', '1', '1', 'HO - SP', '2', '0', '0', '', 'NS', 'Balikpapan', '2004-04-01', 'Active', '01-097-0001', '', '', '2021-11-13 00:00:00', '0000-00-00', ''),
(4, '', '01-005-0013', '619ef7af283ee338d936318852529f4b', 'WAHYU EKA PRIHANTINI', 'eka.prihantini@sefasgroup.com', '', '', 2, 2, '179', '51', '4', '1', 'HO - SP', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2005-03-01', 'Active', '01-098-0002', '01-097-0001', '', '2021-06-29 00:00:00', '0000-00-00', ''),
(5, '', '01-005-0014', 'b7be342667b2adabf3e8f420616e278d', 'MIRANI RAZNA RAHMADANI', 'mirani.razna@sefasgroup.com', '', '', 2, 2, '175', '4', '10', '1', 'KT', '3', '3', '4', 'F', 'NS', 'Balikpapan', '2005-08-30', 'Active', '01-018-0447', '', '', '2021-09-24 00:00:00', '0000-00-00', ''),
(6, '', '01-005-0015', 'b7be342667b2adabf3e8f420616e278d', 'YUDIK DADANG KURNIAWAN', 'yudik.dadang@sefasgroup.com', '', '', 2, 2, '47', '4', '10', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2005-09-06', 'Active', '01-019-0471', '01-006-0020', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(7, '', '01-006-0017', 'b7be342667b2adabf3e8f420616e278d', 'IRHAM ZUL FAHMI', 'testing@test.com', '', '', 2, 2, '216', '51', '5', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2006-03-01', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(8, '', '01-006-0018', 'b7be342667b2adabf3e8f420616e278d', 'SABARLINA SILAEN', 'lina.silaen@sefasgroup.com', '', '', 1, 2, '201', '51', '6', '1', 'HO - SP', '4', '4', '5', '', 'NS', 'Jakarta-CT', '2006-03-20', 'Active', '01-018-0359', '01-007-0030', '', '2021-11-18 00:00:00', '0000-00-00', ''),
(9, '', '01-006-0019', 'b7be342667b2adabf3e8f420616e278d', 'FABIOLA MAGRETHA', 'feby@sefasgroup.com', '', '', 2, 2, '151', '51', '9', '1', 'HO - SP', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2006-05-09', 'Active', '02-009-0047', '', '', '2020-04-07 00:00:00', '0000-00-00', ''),
(10, '', '01-006-0020', 'b7be342667b2adabf3e8f420616e278d', 'ALPIUS PABUNTANG', 'alpius@sefasgroup.com', '', '', 2, 2, '45', '4', '6', '1', 'KT', '2', '6', '12', 'SC', 'NS', 'Balikpapan', '2006-07-01', 'Active', '01-005-0008', '', '', '2021-06-07 00:00:00', '0000-00-00', ''),
(12, '', '01-007-0023', 'b7be342667b2adabf3e8f420616e278d', 'HERU OCTANTO', 'heru.octanto@sefasgroup.com', '', '', 2, 2, '50', '4', '9', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2007-02-07', 'Active', '01-019-0471', '01-006-0020', '', '2021-04-14 00:00:00', '0000-00-00', ''),
(13, '', '01-007-0027', 'b7be342667b2adabf3e8f420616e278d', 'ERAWATI TIUR PURBA', 'erawati@sefasgroup.com', '', '', 2, 2, '152', '4', '9', '1', 'KT', '2', '1', '11', '', 'NS', 'Balikpapan', '2007-08-01', 'Active', '01-018-0447', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(14, '', '01-007-0029', 'b7be342667b2adabf3e8f420616e278d', 'AHMAD SOPYAN', 'sopyanazzam2015@gmail.com', '', '', 2, 2, '218', '51', '3', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2007-08-24', 'Active', '01-001-0005', '01-006-0018', '', '2020-04-03 00:00:00', '0000-00-00', ''),
(15, '', '01-007-0030', 'b7be342667b2adabf3e8f420616e278d', 'HERMAN SOEGENG', 'hsoegeng@sefasgroup.com', '', '', 2, 2, '256', '50', '1', '4', 'HO - SK', '5', '2', '3', '', 'NS', 'Jakarta-CT', '2007-10-01', 'Active', '01-097-0001', '', '', '2021-09-30 00:00:00', '0000-00-00', ''),
(17, '', '01-008-0034', 'b7be342667b2adabf3e8f420616e278d', 'AGUSTINUS SAPPE', 'test@test.com', '', '', 2, 2, '56', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2008-10-06', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(18, '', '01-008-0036', 'b7be342667b2adabf3e8f420616e278d', 'HERMAN', 'herman.najma@gmail.com', '', '', 2, 2, '217', '51', '5', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2008-10-09', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(19, '', '01-008-0039', 'b7be342667b2adabf3e8f420616e278d', 'KARNITA AFRILU SARI', 'karnita.sari@sefasgroup.com', '', '', 2, 2, '52', '4', '9', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2008-12-15', 'Active', '01-019-0471', '01-006-0020', '', '2021-04-29 00:00:00', '0000-00-00', ''),
(20, '', '01-008-0040', 'b7be342667b2adabf3e8f420616e278d', 'WASDI', 'test@test.com', '', '', 2, 2, '60', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2008-12-17', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(21, '', '01-008-0041', 'b7be342667b2adabf3e8f420616e278d', 'MANSYUR', 'mansyur@gmail.com', '', '', 2, 2, '55', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2008-12-17', 'Active', '01-005-0015', '01-019-0471', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(22, '', '01-009-0042', 'b7be342667b2adabf3e8f420616e278d', 'ALIBAR', 'test@test.com', '', '', 2, 2, '57', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2009-02-02', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(23, '', '01-009-0044', 'b7be342667b2adabf3e8f420616e278d', 'DIDIK', 'didietlegion@gmail.com', '', '', 2, 2, '61', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2009-02-10', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(24, '', '01-009-0046', 'b7be342667b2adabf3e8f420616e278d', 'ADITYA SAPUTRA', 'aditya.saputra@sefasgroup.com', '', '', 2, 2, '103', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2009-09-01', 'Active', '01-014-0162', '01-008-0031', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(25, '', '01-009-0048', 'b7be342667b2adabf3e8f420616e278d', 'ANDESTI SITEPU', 'andesti.sitepu@sefasgroup.com', '', '', 2, 2, '51', '4', '9', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2009-10-09', 'Active', '01-019-0471', '01-006-0020', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(26, '', '01-009-0049', 'b7be342667b2adabf3e8f420616e278d', 'ASIK KUSWOYO', 'test@test.com', '', '', 2, 2, '55', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2009-10-09', 'Active', '01-005-0015', '01-019-0471', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(27, '', '01-010-0052', 'b7be342667b2adabf3e8f420616e278d', 'STEFFI KARAMOY', 'steffi.karamoy@sefasgroup.com', '', '', 2, 2, '104', '4', '9', '1', 'KT', '2', '1', '11', '', 'NS', 'Balikpapan', '2010-04-05', 'Active', '01-008-0031', '', '', '2021-05-10 00:00:00', '0000-00-00', ''),
(28, '', '01-010-0053', 'b7be342667b2adabf3e8f420616e278d', 'ABDUL MAJID MUHARAM', 'abdul.majid@sefasgroup.com', '', '', 2, 2, '48', '4', '9', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2010-06-21', 'Active', '01-005-0015', '01-019-0471', '', '2021-04-21 00:00:00', '0000-00-00', ''),
(30, '', '01-011-0064', 'b7be342667b2adabf3e8f420616e278d', 'NGATMIRAN RIDWANTO', 'ngatmiran.ridwanto@gmail.com', '', '', 2, 2, '206', '4', '5', '1', 'KT', '4', '4', '5', 'HRGA', 'NS', 'Balikpapan', '2011-02-01', 'Active', '01-019-0504', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(31, '', '01-011-0066', 'b7be342667b2adabf3e8f420616e278d', 'A. BANUADJI SETIAWAN', 'banuadjie.setiawan@sefasgroup.com', '', '', 2, 2, '101', '4', '10', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2011-02-02', 'Active', '01-008-0031', '', '', '2021-04-20 00:00:00', '0000-00-00', ''),
(33, '', '01-011-0070', 'b7be342667b2adabf3e8f420616e278d', 'BAMBANG HADI KUSUMA', 'bambanghk@sefasgroup.com', '', '', 2, 2, '95', '9', '4', '1', 'KS', '2', '1', '11', '', 'S', 'Banjarbaru', '2011-05-02', 'Active', '01-005-0008', '', '', '2021-09-24 00:00:00', '0000-00-00', ''),
(34, '', '01-011-0072', 'b7be342667b2adabf3e8f420616e278d', 'SENDY STEDI LUMENTA', 'log.trustbontang@sefasgroup.com', '', '', 2, 2, '65', '4', '9', '1', 'KA Mining', '2', '6', '12', 'WL1', 'NS', 'Bontang', '2011-05-20', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(35, '', '01-011-0076', 'b7be342667b2adabf3e8f420616e278d', 'DEWI RIYANTI', 'dewi.riyanti@sefasgroup.com', '', '', 2, 2, '101', '4', '10', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2011-09-05', 'Active', '01-008-0031', '', '', '2021-04-15 00:00:00', '0000-00-00', ''),
(37, '', '01-011-0080', 'b7be342667b2adabf3e8f420616e278d', 'RAHAYU SLAMET', 'george.alexson.ayu@gmail.com', '', '', 2, 2, '159', '51', '9', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2011-11-14', 'Active', '01-014-0160', '', '', '2021-04-26 00:00:00', '0000-00-00', ''),
(39, '', '01-012-0084', 'b7be342667b2adabf3e8f420616e278d', 'AHMAD SYARIF AL ASY ARI', 'ahmadsyarif@sefasgroup.com', '', '', 2, 2, '82', '4', '4', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2012-01-05', 'Active', '02-010-0051', '', '', '2021-04-25 00:00:00', '0000-00-00', ''),
(40, '', '01-012-0085', 'b7be342667b2adabf3e8f420616e278d', 'LUGIYANTO SEDO', 'lugianto@sefasgroup.com', '', '', 2, 2, '100', '4', '4', '1', 'KT', '2', '1', '11', 'T', 'NS', 'Balikpapan', '2012-01-05', 'Active', '02-010-0051', '', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(43, '', '01-012-0093', 'a93682dc9c5756f6d8454e37efee7465', 'IRMA FARIDA MUTIARA', 'yopie.alamsyah@sefasgroup.com', '', '', 2, 2, '184', '51', '4', '1', 'HO - SP', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2012-04-02', 'Active', '01-098-0002', '', '', '2021-11-19 00:00:00', '0000-00-00', ''),
(46, '', '01-012-0097', 'b7be342667b2adabf3e8f420616e278d', 'DOMINGGUS PASA TANGIBALI', 'test@test.com', '', '', 2, 2, '63', '24', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Berau', '2012-05-07', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(47, '', '01-012-0098', 'b7be342667b2adabf3e8f420616e278d', 'ABDUS SHALIHIN', 'abdusshalihin@gmail.com', '', '', 2, 2, '206', '4', '5', '1', 'KT', '4', '4', '5', '', 'NS', 'Balikpapan', '2012-06-28', 'Active', '01-019-0504', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(48, '', '01-012-0099', 'b7be342667b2adabf3e8f420616e278d', 'SUTIKO PRIYADI', 'sutikopriyadi@gmail.com', '', '', 2, 2, '38', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2012-07-02', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(49, '', '01-012-0101', 'b7be342667b2adabf3e8f420616e278d', 'NOOR JANNAH', 'sefas.bjm@sefasgroup.com', '', '', 2, 2, '176', '9', '9', '1', 'KS', '3', '3', '4', 'F', 'NS', 'Banjarbaru', '2012-07-09', 'Active', '01-011-0070', '', '', '2021-07-08 00:00:00', '0000-00-00', ''),
(50, '', '01-012-0102', 'b7be342667b2adabf3e8f420616e278d', 'PRIS DURAYA', 'pris.duraya@sefasgroup.com', '', '', 2, 2, '74', '9', '9', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2012-07-09', 'Active', '01-006-0020', '', '', '2021-07-08 00:00:00', '0000-00-00', ''),
(51, '', '01-012-0103', 'b7be342667b2adabf3e8f420616e278d', 'KAMARULLAH', 'ulah07.eneill@gmail.com', '', '', 2, 2, '67', '9', '5', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2012-07-09', 'Active', '01-012-0102', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(52, '', '01-012-0104', 'b7be342667b2adabf3e8f420616e278d', 'REDA ILHAMI', 'reda.ilhami@sefasgroup.com', '', '', 2, 2, '96', '9', '9', '1', 'KS', '2', '1', '11', 'SSPKS', 'S', 'Banjarbaru', '2012-07-13', 'Active', '01-011-0070', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(55, '', '01-013-0110', 'b7be342667b2adabf3e8f420616e278d', 'WATI SIAHAAN', 'wati_siahaan@yahoo.com', '', '', 2, 2, '182', '51', '9', '1', 'HO - SP', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2013-01-10', 'Active', '01-005-0013', '', '', '2021-06-21 00:00:00', '0000-00-00', ''),
(56, '', '01-013-0111', 'b7be342667b2adabf3e8f420616e278d', 'NENG NOVIA', 'nengnoff@gmail.com', '', '', 2, 2, '180', '51', '9', '1', 'HO - SP', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2013-01-15', 'Active', '01-005-0013', '', '', '2021-05-05 00:00:00', '0000-00-00', ''),
(57, '', '01-013-0114', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMMAD TAUPIK RAHMAN', 'm.taupik@sefasgroup.com', '', '', 2, 2, '98', '9', '9', '1', 'KS', '2', '1', '11', 'SSPKS', 'S', 'Banjarbaru', '2013-03-01', 'Active', '01-011-0070', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(58, '', '01-013-0120', 'b7be342667b2adabf3e8f420616e278d', 'SAIDATUL MAR\'AH', 'saida@sefasgroup.com', '', '', 2, 2, '103', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2013-04-01', 'Active', '01-011-0076', '01-008-0031', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(59, '', '01-013-0129', 'b7be342667b2adabf3e8f420616e278d', 'EKO BUDIYANTO', 'eko.budiyanto@sefasgroup.com', '', '', 2, 2, '98', '9', '9', '1', 'KS', '2', '1', '11', 'SSPKS', 'S', 'Banjarbaru', '2013-08-19', 'Active', '01-011-0070', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(60, '', '01-013-0133', 'b7be342667b2adabf3e8f420616e278d', 'AGISTA EVI USTIKA SARI', 'agistaevi99@gmail.com', '', '', 2, 2, '180', '51', '9', '1', 'HO - SP', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2013-09-11', 'Active', '01-005-0013', '', '', '2021-05-25 00:00:00', '0000-00-00', ''),
(62, '', '01-013-0141', 'b7be342667b2adabf3e8f420616e278d', 'ABDUL GOFUR BASRI', 'abdulgofur.basri@yahoo.com', '', '', 2, 2, '37', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2013-12-16', 'Active', '02-015-0193', '02-007-0026', '', '2020-03-31 00:00:00', '0000-00-00', ''),
(63, '', '01-014-0144', 'b7be342667b2adabf3e8f420616e278d', 'MARISYA SYA\'BANIA', 'marisya28@gmail.com', '', '', 2, 2, '215', '51', '9', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2014-01-07', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(64, '', '01-014-0146', 'b7be342667b2adabf3e8f420616e278d', 'SAID ISMAIL', 'said.ismail@sefasgroup.com', '', '', 2, 2, '79', '9', '4', '1', 'KS', '2', '5', '14', 'T', 'NS', 'Banjarbaru', '2014-02-03', 'Active', '02-010-0051', '01-005-0008', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(66, '', '01-014-0152', 'b7be342667b2adabf3e8f420616e278d', 'ANISA MUNADHIROH', 'anisa.munadhiroh@sefasgroup.com', '', '', 2, 2, '103', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2014-05-05', 'Active', '01-011-0066', '01-008-0031', '', '2021-04-30 00:00:00', '0000-00-00', ''),
(67, '', '01-014-0158', 'b7be342667b2adabf3e8f420616e278d', 'MARIA ULFAH L.', 'salesbjm@sefasgroup.com', '', '', 2, 2, '99', '9', '9', '1', 'KS', '2', '1', '11', '', 'NS', 'Banjarbaru', '2014-08-04', 'Active', '01-011-0070', '', '', '2021-07-08 00:00:00', '0000-00-00', ''),
(68, '', '01-014-0160', 'b7be342667b2adabf3e8f420616e278d', 'SUNNY KURNIA', 'sunny.kurnia@sefasgroup.com', '', '', 2, 2, '154', '51', '6', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2014-08-11', 'Active', '01-098-0002', '01-097-0001', '', '2021-08-09 00:00:00', '0000-00-00', ''),
(69, '', '01-014-0162', 'b7be342667b2adabf3e8f420616e278d', 'ROIS KURNIAWAN', 'rois.kurniawan@sefasgroup.com', '', '', 2, 2, '101', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2014-09-01', 'Active', '01-008-0031', '', '', '2021-04-20 00:00:00', '0000-00-00', ''),
(70, '', '01-014-0163', 'b7be342667b2adabf3e8f420616e278d', 'JOHAN PARDOMUAN', 'johan.ps@sefasgroup.com', '', '', 2, 2, '84', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2014-09-03', 'Active', '01-012-0085', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(71, '', '01-015-0182', 'b7be342667b2adabf3e8f420616e278d', 'HABIBI', 'habibiehabibie7@gmail.com', '', '', 2, 2, '61', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2015-03-11', 'Active', '01-005-0015', '01-019-0471', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(72, '', '01-015-0185', 'b7be342667b2adabf3e8f420616e278d', 'GUNTAR MAULANA', 'guntar.maulana@sefasgroup.com', '', '', 2, 2, '103', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2015-05-01', 'Active', '01-011-0076', '01-008-0031', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(74, '', '01-015-0187', 'b7be342667b2adabf3e8f420616e278d', 'SUKMA ALAM ROSADI', 'sukma.alam@sefasgroup.com', '', '', 2, 2, '98', '9', '9', '1', 'KS', '2', '1', '11', 'SSPKS', 'S', 'Banjarbaru', '2015-05-01', 'Active', '01-011-0070', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(75, '', '01-015-0190', 'b7be342667b2adabf3e8f420616e278d', 'ELIANSYAH', 'logistic.berau@sefasgroup.com', '', '', 2, 2, '54', '24', '9', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Berau', '2015-06-10', 'Active', '01-019-0471', '01-006-0020', '', '2021-04-29 00:00:00', '0000-00-00', ''),
(77, '', '01-015-0198', 'b7be342667b2adabf3e8f420616e278d', 'DENNY KURNIAWAN', 'dennykurniawan773@gmail.com', '', '', 2, 2, '64', '121', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Tarakan', '2015-08-01', 'Active', '01-019-0471', '01-006-0020', '', '2021-04-26 00:00:00', '0000-00-00', ''),
(78, '', '01-015-0199', 'b7be342667b2adabf3e8f420616e278d', 'DAHLIA', 'ar.bppn@sefasgroup.com', '', '', 2, 2, '168', '4', '9', '1', 'KT', '3', '3', '4', 'F', 'NS', 'Balikpapan', '2015-08-18', 'Active', '01-005-0014', '01-018-0447', '', '2021-04-29 00:00:00', '0000-00-00', ''),
(79, '', '01-015-0201', 'b7be342667b2adabf3e8f420616e278d', 'ZENNY SINAGA', 'zennysinaga128@gmail.com', '', '', 2, 2, '180', '51', '9', '1', 'HO - SP', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2015-09-01', 'Active', '01-005-0013', '', '', '2021-04-28 00:00:00', '0000-00-00', ''),
(80, '', '01-015-0202', 'b7be342667b2adabf3e8f420616e278d', 'ARI WIBOWO', 'ari.coy31@gmail.com', '', '', 2, 2, '57', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2015-12-01', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(81, '', '01-016-0208', 'b7be342667b2adabf3e8f420616e278d', 'AGNES DWI ANGGRAENI', 'agnesda2@gmail.com', '', '', 2, 2, '157', '51', '9', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2016-01-21', 'Active', '01-014-0160', '', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(82, '', '01-016-0211', 'b7be342667b2adabf3e8f420616e278d', 'SISKA FRISKILLA', 'siska.friskilla@sefasgroup.com', '', '', 2, 2, '104', '4', '9', '1', 'KT', '2', '1', '11', '', 'NS', 'Balikpapan', '2016-03-07', 'Active', '01-008-0031', '', '', '2021-04-29 00:00:00', '0000-00-00', ''),
(83, '', '01-016-0214', 'b7be342667b2adabf3e8f420616e278d', 'MOHAMMAD ROSIDI SANDI PRADINATA', 'mrsandip_84@yahoo.co.id', '', '', 2, 2, '58', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2016-04-18', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(84, '', '01-016-0215', 'b7be342667b2adabf3e8f420616e278d', 'ROMA ANDIKA SITEPU', 'test@test.com', '', '', 2, 2, '56', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2016-04-18', 'Active', '01-005-0015', '01-019-0471', '01-006-0020', '0000-00-00 00:00:00', '0000-00-00', ''),
(85, '', '01-016-0216', 'b7be342667b2adabf3e8f420616e278d', 'PERI PABUNTANG', 'stevenpabuntang@gmail.com', '', '', 2, 2, '56', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2016-04-18', 'Active', '01-005-0015', '01-019-0471', '01-006-0020', '0000-00-00 00:00:00', '0000-00-00', ''),
(86, '', '01-016-0217', 'b7be342667b2adabf3e8f420616e278d', 'ANDRIAN PRABOWO', 'andryhmu@gmail.com', '', '', 2, 2, '61', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2016-04-18', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(87, '', '01-016-0218', 'b7be342667b2adabf3e8f420616e278d', 'AHMAD YUSUF WIJAYA', 'yusufgt7@gmail.com', '', '', 2, 2, '55', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2016-04-18', 'Active', '01-005-0015', '01-019-0471', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(88, '', '01-016-0220', 'b7be342667b2adabf3e8f420616e278d', 'PARSITO', 'tax@sefasgroup.com', '', '', 2, 2, '189', '51', '9', '1', 'HO - SP', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2016-04-25', 'Active', '01-012-0093', '', '', '2021-05-25 00:00:00', '0000-00-00', ''),
(93, '', '01-017-0273', 'b7be342667b2adabf3e8f420616e278d', 'R. ARDY WIBOWO', 'radenardy.wibowo@sefasgroup.com', '', '', 2, 2, '81', '9', '9', '1', 'KS', '2', '5', '14', 'T', 'NS', 'Banjarbaru', '2017-04-01', 'Active', '01-014-0146', '02-010-0051', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(94, '', '01-017-0275', 'b7be342667b2adabf3e8f420616e278d', 'SYAIFUDIN', 'syaifudin.si30@gmail.com', '', '', 2, 2, '69', '9', '5', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2017-04-01', 'Active', '01-012-0102', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(95, '', '01-017-0276', 'b7be342667b2adabf3e8f420616e278d', 'HERMANSYAH', 'test@test.com', '', '', 2, 2, '70', '9', '5', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2017-04-01', 'Active', '01-012-0102', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(97, '', '01-017-0285', 'b7be342667b2adabf3e8f420616e278d', 'DAHNIAR', 'dahniar1206@yahoo.com', '', '', 2, 2, '161', '51', '9', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2017-05-02', 'Active', '01-014-0160', '', '', '2021-06-30 00:00:00', '0000-00-00', ''),
(99, '', '01-017-0303', 'b7be342667b2adabf3e8f420616e278d', 'BUDI SETIAWAN', 'budi.setiawan@sefasgroup.com', '', '', 2, 1, '197', '4', '9', '1', 'KT', '4', '7', '7', '', 'NS', 'Balikpapan', '2017-07-24', 'Active', '01-011-0074', '', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(100, '', '01-017-0315', 'b7be342667b2adabf3e8f420616e278d', 'MARDI SUSILO', 'logisticbjm@sefasgroup.com', '', '', 2, 2, '68', '9', '9', '1', 'KS', '2', '6', '12', 'WL2', 'NS', 'Banjarbaru', '2017-09-07', 'Active', '01-012-0102', '01-006-0020', '', '2021-07-08 00:00:00', '0000-00-00', ''),
(101, '', '01-017-0318', 'b7be342667b2adabf3e8f420616e278d', 'DEVITA SARI', 'devita.sari@sefasgroup.com', '', '', 2, 2, '104', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'NS', 'Balikpapan', '2017-09-26', 'Active', '01-008-0031', '', '', '2021-04-29 00:00:00', '0000-00-00', ''),
(102, '', '01-017-0330', 'b7be342667b2adabf3e8f420616e278d', 'ANINDYATAMI', 'anindya.tami@sefasgroup.com', '', '', 2, 2, '204', '4', '9', '1', 'KT', '4', '4', '5', 'HRGA', 'NS', 'Balikpapan', '2017-10-25', 'Active', '01-019-0504', '01-006-0018', '', '2021-05-29 00:00:00', '0000-00-00', ''),
(103, '', '01-017-0336', 'b7be342667b2adabf3e8f420616e278d', 'INGGRID CHINTYA SABATINI SILALAHI', 'chintya.inggrid@gmail.com', '', '', 2, 2, '157', '51', '9', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2017-12-06', 'Active', '01-014-0160', '', '', '2021-04-27 00:00:00', '0000-00-00', ''),
(105, '', '01-018-0350', 'b7be342667b2adabf3e8f420616e278d', 'RASMUJI', 'rasmuji@sefasgroup.com', '', '', 2, 2, '5', '51', '10', '1', 'HO - SP', '1', '2', '3', '', 'NS', 'Jakarta-CT', '2018-01-15', 'Active', '01-014-0150', '01-020-0536', '', '2021-05-28 00:00:00', '0000-00-00', ''),
(106, '', '01-018-0359', 'b7be342667b2adabf3e8f420616e278d', 'YOGA SAMUDRA DEWA', 'yoga.samudra@sefasgroup.com', '', '', 1, 2, '198', '51', '2', '1', 'HO - SP', '4', '4', '0', '', 'NS', 'Jakarta-CT', '2018-01-16', 'Active', '01-007-0030', '01-097-0001', '', '2021-11-18 00:00:00', '0000-00-00', ''),
(107, '', '01-018-0367', 'b7be342667b2adabf3e8f420616e278d', 'SYARIANI', 'testing@test.com', '', '', 2, 2, '72', '9', '5', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2018-02-12', 'Active', '01-012-0102', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(109, '', '01-018-0386', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMMAD TAUFIK HIDAYAT', 'test@test.com', '', '', 2, 2, '208', '9', '3', '1', 'KS', '4', '4', '5', 'HRGA', 'NS', 'Banjarbaru', '2018-03-26', 'Active', '01-019-0504', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(110, '', '01-018-0394', 'b7be342667b2adabf3e8f420616e278d', 'ABDUL RACHMAD', 'a_rahmat78@yahoo.com', '', '', 2, 2, '81', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'ST', 'Balikpapan', '2018-05-02', 'Active', '01-012-0084', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(113, '', '01-018-0417', '972d6cec236b22386bbd94a579ed1462', 'DENNY BAYUAJI', 'denny.bayuaji@sefasgroup.com', '', '', 2, 2, '85', '51', '4', '1', 'HO - SP', '2', '5', '14', 'T', 'NS', 'Jakarta-CT', '2018-08-27', 'Active', '02-010-0051', '', '', '2021-11-13 00:00:00', '0000-00-00', ''),
(114, '', '01-018-0422', 'b7be342667b2adabf3e8f420616e278d', 'ELA FITRI SUGIANUR RACHMAH', 'recruitment.kalimantan@sefasgroup.com', '', '', 3, 2, '203', '4', 'Staff', '1', 'KT', '4', '4', '5', 'HRGA', 'NS', 'Balikpapan', '2018-09-06', 'Active', '01-019-0504', '01-006-0018', '', '2021-04-15 00:00:00', '0000-00-00', ''),
(118, '', '01-018-0436', 'b7be342667b2adabf3e8f420616e278d', 'HANSEN YULIANTO', 'hansenamstrong@gmail.com', '', '', 2, 2, '200', '4', '9', '1', 'KT', '4', '4', '6', 'ISOHSE', 'NS', 'Balikpapan', '2018-10-01', 'Active', '01-020-0564', '02-010-0051', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(119, '', '01-018-0442', 'b7be342667b2adabf3e8f420616e278d', 'SAMSURYANTO', 'bangsams3113@gmail.com', '', '', 2, 2, '58', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2018-10-25', 'Active', '01-019-0471', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(120, '', '01-018-0447', 'b7be342667b2adabf3e8f420616e278d', 'REZA SETIABUDI', 'reza.setiabudi@sefasgroup.com', '', '', 2, 2, '148', '4', '4', '1', 'KA Mining', '2', '1', '11', '', 'NS', 'Balikpapan', '2018-11-25', 'Active', '01-005-0008', '01-097-0001', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(121, '', '01-018-0449', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMAD RAMDONI', 'donimuhamadramdoni@gmail.com', '', '', 2, 2, '180', '51', '9', '1', 'HO - SP', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2018-12-27', 'Active', '01-005-0013', '', '', '2021-07-09 00:00:00', '0000-00-00', ''),
(125, '', '01-019-0463', 'b7be342667b2adabf3e8f420616e278d', 'HELDA ENI WAHYUNI', 'helda1206@gmail.com', '', '', 2, 2, '52', '4', '9', '1', 'KT', '2', '6', '12', 'F', 'NS', 'Balikpapan', '2019-03-11', 'Active', '01-005-0014', '01-018-0447', '', '2021-04-29 00:00:00', '0000-00-00', ''),
(126, '', '01-019-0465', 'b7be342667b2adabf3e8f420616e278d', 'YOPIE ALAMSYAH', 'yopie.alamsyah@sefasgroup.com', '082110012366', '', 1, 1, '196', '51', '9', '1', 'HO - SP', '4', '7', '7', '', 'NS', 'Jakarta-CT', '2019-03-11', 'Active', '01-011-0074', '', '', '2022-08-26 11:05:55', '0000-00-00', ''),
(127, '', '01-019-0469', 'b7be342667b2adabf3e8f420616e278d', 'ROY ADAM', 'roy.adam13@yahoo.com', '', '', 2, 2, '72', '9', '5', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2019-04-01', 'Active', '01-012-0102', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(128, '', '01-019-0471', 'b7be342667b2adabf3e8f420616e278d', 'MIFTACHUL HUDA', 'miftachul.huda@sefasgroup.com', '', '', 2, 2, '46', '4', '8', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2019-04-11', 'Active', '01-006-0020', '', '', '2021-05-28 00:00:00', '0000-00-00', ''),
(130, '', '01-019-0480', 'b7be342667b2adabf3e8f420616e278d', 'HERMINA SARASWATI HUTAJULU', 'test@test.com', '', '', 2, 2, '186', '51', '9', '1', 'HO - SP', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2019-06-25', 'Active', '01-012-0093', '', '', '2021-06-28 00:00:00', '0000-00-00', ''),
(131, '', '01-019-0481', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMMAD NURUL FAJRY', 'fajry@sefasgroup.com', '', '', 2, 2, '211', '51', '10', '1', 'HO - SP', '4', '4', '5', 'CV', 'NS', 'Jakarta-CT', '2019-06-25', 'Active', '02-010-0051', '', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(132, '', '01-019-0503', 'b7be342667b2adabf3e8f420616e278d', 'M. HASBUL HAFIZ', 'hasbulhafiz97@gmail.com', '', '', 2, 2, '70', '9', '5', '1', 'KS', '2', '6', '12', 'WL1', 'NS', 'Banjarbaru', '2019-08-14', 'Active', '01-012-0102', '01-006-0020', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(133, '', '01-019-0504', 'b7be342667b2adabf3e8f420616e278d', 'YULI ROSALI', 'hrd.bppn@sefasgroup.com', '', '', 3, 2, '202', '4', '10', '1', 'KT', '4', '4', '5', 'HRGA', 'NS', 'Balikpapan', '2019-08-26', 'Active', '01-006-0018', '01-018-0359', '', '2021-06-07 00:00:00', '0000-00-00', ''),
(135, '', '01-097-0001', 'b7be342667b2adabf3e8f420616e278d', 'RICKY ROESLI', 'ricky.roesli@sefasgroup.com', '', '', 2, 2, '1', '51', '1', '1', 'HO - SP', '1', '2', '3', '', 'NS', 'Jakarta-CT', '1997-10-27', 'Active', '', '', '', '2021-08-09 00:00:00', '0000-00-00', ''),
(136, '', '01-098-0002', 'b7be342667b2adabf3e8f420616e278d', 'YULIA', 'yulia.trifena@sefasgroup.com', '', '', 2, 2, '153', '51', '1', '1', 'HO - SP', '3', '0', '0', '', 'NS', 'Jakarta-CT', '1998-04-01', 'Active', '01-097-0001', '', '', '2021-11-18 00:00:00', '0000-00-00', ''),
(138, '', '01-099-0004', 'b7be342667b2adabf3e8f420616e278d', 'MULYOTO', 'octo26tari@gmail.com', '', '', 2, 2, '161', '51', '9', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '1999-03-01', 'Active', '01-014-0160', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(139, '', '02-004-0009', 'b7be342667b2adabf3e8f420616e278d', 'MIFAOSOKHI ZEGA', 'mifao.zega@sefasgroup.com', '', '', 2, 2, '114', '50', '10', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2004-04-01', 'Active', '02-018-0427', '02-004-0011', '', '2021-04-25 00:00:00', '0000-00-00', ''),
(140, '', '02-004-0011', 'b7be342667b2adabf3e8f420616e278d', 'TRISULO WIDIYANTONO', 'trisulo.widi@sefasgroup.com', '', '', 2, 2, '111', '50', '6', '4', 'Jakarta', '2', '1', '11', '', 'S', 'Jakarta-CT', '2004-10-11', 'Active', '02-018-0448', '01-005-0008', '', '2021-09-30 00:00:00', '0000-00-00', ''),
(141, '', '02-005-0012', 'b7be342667b2adabf3e8f420616e278d', 'YENNE', 'yenne@sefasgroup.com', '', '', 2, 2, '113', '50', '10', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2005-02-01', 'Active', '02-018-0427', '02-004-0011', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(142, '', '02-007-0025', 'b7be342667b2adabf3e8f420616e278d', 'SADIYO', 'test@test.com', '', '', 2, 2, '37', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2007-06-27', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(143, '', '02-007-0026', 'b7be342667b2adabf3e8f420616e278d', 'SUHARDO ALEXANDER', 'hardo.aritonang@gmail.com', '', '', 2, 2, '13', '33', '4', '4', 'Jakarta', '4', '6', '13', '', 'NS', 'Cikarang', '2007-07-01', 'Active', '01-020-0536', '01-097-0001', '', '2021-05-06 00:00:00', '0000-00-00', ''),
(144, '', '02-007-0028', 'b7be342667b2adabf3e8f420616e278d', 'FLORENTINUS DWIATMOKO S', 'dwi@sefasgroup.com', '', '', 2, 2, '114', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2007-08-01', 'Active', '02-018-0427', '02-004-0011', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(145, '', '02-008-0035', 'b7be342667b2adabf3e8f420616e278d', 'YOHAN', 'test@test.com', '', '', 2, 2, '39', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2008-10-06', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(146, '', '02-008-0037', 'b7be342667b2adabf3e8f420616e278d', 'FERRI SUMANGELI LASE', 'ferri.lase@sefasgroup.com', '', '', 2, 2, '114', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2008-11-03', 'Active', '02-018-0427', '02-004-0011', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(147, '', '02-008-0038', 'b7be342667b2adabf3e8f420616e278d', 'ISWANTO', 'test@test.com', '', '', 2, 2, '39', '33', '3', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2008-11-03', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(148, '', '02-009-0045', 'b7be342667b2adabf3e8f420616e278d', 'RENATA DINAWATI SILABAN', 'retail.admin@sefasgroup.com', '', '', 2, 2, '116', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2009-08-01', 'Active', '02-018-0427', '02-004-0011', '02-018-0448', '0000-00-00 00:00:00', '0000-00-00', ''),
(149, '', '02-009-0047', 'b7be342667b2adabf3e8f420616e278d', 'HENDERI', 'hendri.ravlin@sefasgroup.com', '', '', 2, 2, '150', '51', '10', '1', 'HO - SP', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2019-01-25', 'Active', '01-005-0008', '', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(150, '', '02-010-0051', 'b7be342667b2adabf3e8f420616e278d', 'ANDREAS ADI SURYA', 'yopie.alamsyah@sefasgroup.com', '', '', 2, 2, '78', '51', '6', '1', 'HO - SP', '2', '5', '14', '', 'NS', 'Jakarta-CT', '2010-04-01', 'Active', '01-005-0008', '', '', '2021-11-13 00:00:00', '0000-00-00', ''),
(151, '', '02-010-0056', 'b7be342667b2adabf3e8f420616e278d', 'RUBENDI', 'test@test.com', '', '', 2, 2, '39', '33', '3', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2010-10-21', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(152, '', '02-011-0061', 'b7be342667b2adabf3e8f420616e278d', 'ARIF RUDI KARTIKA', 'yoi.jrotjrot@gmail.com', '', '', 2, 2, '217', '50', '5', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-Kmy', '2011-01-05', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(153, '', '02-011-0065', 'b7be342667b2adabf3e8f420616e278d', 'ARI AFIVAH KUSTANDINA', 'ari_afivah@yahoo.co.id', '', '', 2, 2, '119', '50', '9', '4', 'HO - SK', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2011-02-01', 'Active', '02-004-0011', '', '', '2021-04-28 00:00:00', '0000-00-00', ''),
(154, '', '02-011-0078', 'b7be342667b2adabf3e8f420616e278d', 'ELISABETH ITA KALATANAN', 'elisabeth.itha@sefasgroup.com', '', '', 2, 2, '115', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2011-10-24', 'Active', '02-005-0012', '02-018-0427', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(155, '', '02-011-0079', 'b7be342667b2adabf3e8f420616e278d', 'RIZKI KUSYANTO', 'rcholay123@gmail.com', '', '', 2, 2, '218', '50', '3', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2011-11-03', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(156, '', '02-012-0086', 'b7be342667b2adabf3e8f420616e278d', 'STEVEN R SENGKEY', 'steven.sengkey@sefasgroup.com', '', '', 2, 2, '116', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2012-01-09', 'Active', '02-018-0427', '02-004-0011', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(157, '', '02-012-0087', 'b7be342667b2adabf3e8f420616e278d', 'DARIMAN', 'dariman@sefasgroup.com', '', '', 2, 2, '116', '50', '9', '4', 'HO - SK', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2012-01-09', 'Active', '02-004-0009', '02-018-0427', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(159, '', '02-012-0096', 'b7be342667b2adabf3e8f420616e278d', 'DANIEL SUGIRI', 'sugiridaniel09@gmail.com', '', '', 2, 2, '217', '50', '5', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2012-05-01', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(160, '', '02-012-0105', 'b7be342667b2adabf3e8f420616e278d', 'DEDEN GUNAWAN', 'deden@sefasgroup.com', '', '', 2, 2, '116', '50', '9', '4', 'HO - SK', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2012-08-01', 'Active', '02-018-0427', '02-004-0011', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(162, '', '02-013-0112', 'b7be342667b2adabf3e8f420616e278d', 'SATRIA OKTA PRIANTOKO', 'sefas.sby@sefasgroup.com', '', '', 2, 2, '14', '110', '9', '4', 'BN', '2', '6', '13', 'WL2', 'NS', 'Surabaya', '2013-02-04', 'Active', '02-007-0026', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(164, '', '02-013-0121', 'b7be342667b2adabf3e8f420616e278d', 'MAMAY MAKSUM', 'mamaymaksum@yahoo.com', '', '', 2, 2, '42', '60', '9', '4', 'BN', '2', '6', '13', 'WL2', 'NS', 'Kupang', '2013-05-01', 'Active', '02-007-0026', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(165, '', '02-013-0127', 'b7be342667b2adabf3e8f420616e278d', 'BIMA RETZA BUDI PRADANA', 'test@test.com', '', '', 2, 2, '20', '110', '3', '4', 'BN', '2', '6', '13', 'WL2', 'NS', 'Surabaya', '2013-07-19', 'Active', '02-007-0026', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(166, '', '02-013-0130', 'b7be342667b2adabf3e8f420616e278d', 'KABUL PUJIYANTO', 'kabulterpuji@gmail.com', '', '', 2, 2, '216', '50', '5', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2013-09-02', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(167, '', '02-013-0131', 'b7be342667b2adabf3e8f420616e278d', 'DONI HARMEN', 'doni.harmen@sefasgroup.com', '', '', 2, 2, '115', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2013-09-05', 'Active', '02-005-0012', '02-018-0427', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(170, '', '02-013-0142', 'b7be342667b2adabf3e8f420616e278d', 'HENDRIK AP', 'hendrikap@gmail.com', '', '', 2, 2, '39', '33', '3', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2013-12-30', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(171, '', '02-014-0151', 'b7be342667b2adabf3e8f420616e278d', 'ANDI PURNAMA', 'emailhris.andi@gmail.com', '85640553400', '', 1, 2, '225', '50', '4', '4', 'HO - SK', '4', '4', '10', '', 'NS', 'Jakarta-CT', '2014-04-07', 'Active', '01-018-0359', '', '', '2022-08-23 02:11:49', '0000-00-00', ''),
(172, '', '02-014-0154', 'b7be342667b2adabf3e8f420616e278d', 'FEBRI SATRIA AKHIRUDIN', 'febri.satria@sefasgroup.com', '', '', 2, 2, '4', '50', '10', '4', 'HO - SK', '1', '2', '3', '', 'NS', 'Jakarta-CT', '2014-06-02', 'Active', '01-020-0536', '', '', '2021-10-08 00:00:00', '0000-00-00', ''),
(173, '', '02-014-0156', 'b7be342667b2adabf3e8f420616e278d', 'IRVANA', 'telemarketing@sefasgroup.com', '', '', 2, 2, '119', '50', '9', '4', 'HO - SK', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2014-07-15', 'Active', '02-004-0011', '', '', '2021-07-02 00:00:00', '0000-00-00', ''),
(175, '', '02-014-0165', 'b7be342667b2adabf3e8f420616e278d', 'DESTIANA ANGGRAINI', 'ga.jkt@sefasgroup.com', '', '', 2, 2, '166', '50', '9', '4', 'HO - SK', '3', '3', '4', 'GA', 'NS', 'Jakarta-CT', '2014-09-09', 'Active', '01-001-0005', '01-006-0018', '', '2020-04-03 00:00:00', '0000-00-00', ''),
(176, '', '02-014-0167', 'b7be342667b2adabf3e8f420616e278d', 'KASWOTO', 'test@test.com', '', '', 2, 2, '37', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2014-10-01', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(177, '', '02-015-0171', 'b7be342667b2adabf3e8f420616e278d', 'AFANDI', 'testing@test.com', '', '', 2, 2, '16', '110', '5', '4', 'BN', '2', '6', '13', 'WL2', 'NS', 'Surabaya', '2015-01-05', 'Active', '02-007-0026', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(178, '', '02-015-0175', 'b7be342667b2adabf3e8f420616e278d', 'TUGIMAN', 'tugidenis83@gmail.com', '', '', 2, 2, '37', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2015-02-02', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(179, '', '02-015-0178', 'b7be342667b2adabf3e8f420616e278d', 'DENISSA FATIMA DEWI', 'denissa@sefasgroup.com', '', '', 2, 2, '7', '51', '9', '1', 'HO - SP', '1', '2', '3', '', 'NS', 'Jakarta-CT', '2015-03-02', 'Active', '01-007-0030', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(180, '', '02-015-0179', 'b7be342667b2adabf3e8f420616e278d', 'SUSANTO', 'santo.poncol89@ymail.com', '', '', 2, 2, '217', '50', '5', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2015-03-02', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(181, '', '02-015-0181', 'b7be342667b2adabf3e8f420616e278d', 'DAMAN', 'daman@sefasgroup.com', '', '', 2, 2, '217', '50', '5', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2015-03-09', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(182, '', '02-015-0193', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMMAD FIRDAUS', 'ahmaddaus6@gmail.com', '', '', 2, 2, '22', '33', '9', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2015-06-15', 'Active', '02-007-0026', '', '', '2021-05-03 00:00:00', '0000-00-00', ''),
(183, '', '02-015-0194', 'b7be342667b2adabf3e8f420616e278d', 'FIKIH NUR ALAM', 'nuralamfikih@gmail.com', '', '', 2, 2, '32', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2015-07-01', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(185, '', '02-015-0203', 'b7be342667b2adabf3e8f420616e278d', 'RENGGA PANDUWINATA', 'rengga@sefasgroup.com', '', '', 2, 2, '186', '50', '7', '4', 'HO - SK', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2015-12-03', 'Active', '01-012-0093', '', '', '2021-04-22 00:00:00', '0000-00-00', ''),
(186, '', '02-015-0264', 'b7be342667b2adabf3e8f420616e278d', 'BIESMOJO ADY WIDJANARKO', 'biesmojo@sefasgroup.com', '', '', 2, 2, '92', '50', '10', '4', 'HO - SK', '2', '5', '14', 'T', 'NS', 'Jakarta-CT', '2015-06-01', 'Active', '01-018-0417', '02-010-0051', '', '2021-06-29 00:00:00', '0000-00-00', ''),
(187, '', '02-016-0209', 'b7be342667b2adabf3e8f420616e278d', 'WAHYUDI', 'wahyudi.yudi@sefasgroup.com', '', '', 2, 2, '115', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2016-02-01', 'Active', '02-005-0012', '02-018-0427', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(189, '', '02-016-0227', 'b7be342667b2adabf3e8f420616e278d', 'DENI SAPUTRA', 'deni.saputra@sefasgroup.com', '', '', 2, 2, '115', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2016-06-01', 'Active', '02-005-0012', '02-018-0427', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(192, '', '02-016-0243', 'b7be342667b2adabf3e8f420616e278d', 'IMAM MAFUT', 'testing@test.com', '', '', 2, 2, '18', '110', '5', '4', 'BN', '2', '6', '13', 'WL2', 'NS', 'Surabaya', '2016-11-11', 'Active', '02-007-0026', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(193, '', '02-016-0245', 'b7be342667b2adabf3e8f420616e278d', 'HARIS MUNANDAR', 'haris.munandar@sefasgroup.com', '', '', 2, 2, '115', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2016-11-14', 'Active', '02-004-0009', '02-018-0427', '', '2021-07-17 00:00:00', '0000-00-00', ''),
(194, '', '02-017-0254', 'b7be342667b2adabf3e8f420616e278d', 'YUNIARTI', 'yuniar246@yahoo.com', '', '', 2, 2, '156', '50', '9', '4', 'HO - SK', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2017-01-10', 'Active', '01-014-0160', '', '', '2021-07-07 00:00:00', '0000-00-00', ''),
(195, '', '02-017-0255', 'b7be342667b2adabf3e8f420616e278d', 'BRAMAYUDHA PERMANA', 'brama.yudha.18@gmail.com', '', '', 2, 2, '41', '115', '9', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Tangerang', '2017-01-10', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(196, '', '02-017-0256', 'b7be342667b2adabf3e8f420616e278d', 'YEINES YUDI LATIEF', 'test@test.com', '', '', 2, 2, '36', '33', '5', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2017-01-10', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(197, '', '02-017-0261', 'b7be342667b2adabf3e8f420616e278d', 'NENENG RULI SUPARDI', 'supardirully@gmail.com', '', '', 2, 2, '31', '33', '9', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2017-02-20', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(199, '', '02-017-0281', 'b7be342667b2adabf3e8f420616e278d', 'DANIEL PARLINDUNGAN SILAEN', 'sefas.warehouse@sefasgroup.com', '', '', 2, 2, '33', '33', '9', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2017-04-03', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(201, '', '02-017-0289', 'b7be342667b2adabf3e8f420616e278d', 'GHEATISA SURYA PUTRI', 'ghea@sefasgroup.com', '', '', 2, 2, '162', '50', '9', '4', 'HO - SK', '3', '3', '4', 'AT', 'NS', 'Jakarta-CT', '2017-05-04', 'Active', '01-012-0093', '01-014-0160', '', '2021-04-27 00:00:00', '0000-00-00', ''),
(202, '', '02-017-0297', '86630c8cb0a331f1735f3176dd1e8988', 'POLTAK MARULI IMMANUEL', 'poltakmaruli@gmail.com', '', '', 3, 2, '209', '50', '9', '4', 'HO - SK', '4', '4', '5', 'HRGA', 'NS', 'Jakarta-CT', '2017-07-03', 'Active', '01-006-0018', '01-018-0359', '', '2021-11-19 00:00:00', '0000-00-00', ''),
(205, '', '02-017-0323', 'b7be342667b2adabf3e8f420616e278d', 'BARI PRAYUDATAMA', 'bari.prayudatama@sefasgroup.com', '081280294737', '', 2, 2, '183', '50', '9', '4', 'HO - SK', '3', '3', '2', '', 'NS', 'Jakarta-CT', '2017-10-16', 'Active', '01-005-0013', '', '', '2022-08-26 10:55:20', '0000-00-00', ''),
(213, '', '02-018-0389', 'b7be342667b2adabf3e8f420616e278d', 'MUCHLISUDDIN', 'muchlisuddin@sefasgroup.com', '', '', 2, 2, '116', '50', '9', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2018-04-09', 'Active', '02-004-0009', '02-018-0427', '', '2021-04-23 00:00:00', '0000-00-00', ''),
(216, '', '02-018-0427', 'b7be342667b2adabf3e8f420616e278d', 'SETIA IRAWAN', 'setia.irawan@sefasgroup.com', '', '', 2, 2, '112', '50', '8', '4', 'Jakarta', '2', '1', '11', 'SSKJ', 'S', 'Jakarta-CT', '2018-09-17', 'Active', '02-004-0011', '02-018-0448', '', '2021-10-08 00:00:00', '0000-00-00', ''),
(218, '', '02-018-0448', 'b7be342667b2adabf3e8f420616e278d', 'SULISTYO PRAMBUDI', 'sulistyo@sefasgroup.com', '', '', 2, 2, '134', '50', '2', '4', 'Jakarta', '2', '1', '11', '', 'S', 'Jakarta-CT', '2018-12-03', 'Active', '01-005-0008', '01-097-0001', '', '2021-10-08 00:00:00', '0000-00-00', ''),
(219, '', '02-019-0451', 'b7be342667b2adabf3e8f420616e278d', 'REPOL TUMANGGOR', 'Riod5888@gmail.com', '', '', 2, 2, '122', '43', '9', '4', 'BN', '2', '1', '11', 'SSKBN', 'NS', 'Denpasar', '2019-01-07', 'Active', '02-018-0448', '', '', '2021-05-04 00:00:00', '0000-00-00', ''),
(226, '', '02-019-0476', 'b7be342667b2adabf3e8f420616e278d', 'ROSMA MEGASARI SINAGA', 'test@test.com', '', '', 2, 2, '180', '50', '9', '4', 'HO - SK', '3', '3', '2', 'C', 'NS', 'Jakarta-CT', '2019-06-10', 'Active', '01-005-0013', '', '', '2021-06-18 00:00:00', '0000-00-00', ''),
(227, '', '02-019-0477', 'b7be342667b2adabf3e8f420616e278d', 'BILSEVEN SIGALINGGING', 'bilseven.sigalingging@sefasgroup.com', '', '', 2, 2, '93', '50', '9', '4', 'HO - SK', '2', '5', '14', 'T', 'NS', 'Jakarta-CT', '2019-06-10', 'Active', '02-015-0264', '01-018-0417', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(228, '', '02-019-0527', 'b7be342667b2adabf3e8f420616e278d', 'IQFANS OKTAREISNA YASID', 'salesnugra@sefasgroup.com', '', '', 2, 2, '119', '50', '9', '4', 'HO - SK', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2019-11-18', 'Active', '02-018-0448', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(230, '', '03-004-0007', 'b7be342667b2adabf3e8f420616e278d', 'SRI MAHARANI', 'rani@sefasgroup.com', '', '', 2, 2, '127', '40', '6', '5', 'Cilegon', '2', '1', '11', '', 'S', 'Cilegon', '2004-03-15', 'Active', '01-005-0008', '01-097-0001', '', '2021-06-30 00:00:00', '0000-00-00', ''),
(231, '', '03-004-0010', 'b7be342667b2adabf3e8f420616e278d', 'AHMAD JUMADI REZA', 'jumadi@sefasgroup.com', '', '', 2, 2, '23', '40', '9', '5', 'Cilegon', '2', '6', '13', 'WL1', 'NS', 'Cilegon', '2004-09-05', 'Active', '02-015-0193', '02-007-0026', '01-005-0008', '0000-00-00 00:00:00', '0000-00-00', ''),
(232, '', '03-005-0016', 'b7be342667b2adabf3e8f420616e278d', 'JAJULI', 'test@test.com', '', '', 2, 2, '27', '40', '3', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2005-11-22', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(234, '', '03-008-0032', 'b7be342667b2adabf3e8f420616e278d', 'SUHEMI', 'testing@test.com', '', '', 2, 2, '220', '40', '3', '5', 'Cilegon', '4', '4', '5', 'GA', 'NS', 'Cilegon', '2008-08-01', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(235, '', '03-008-0033', 'b7be342667b2adabf3e8f420616e278d', 'MUMIN', 'test@test.com', '', '', 2, 2, '26', '40', '5', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2008-08-20', 'Active', '02-015-0193', '02-007-0026', '', '2021-04-26 00:00:00', '0000-00-00', ''),
(236, '', '03-010-0054', 'b7be342667b2adabf3e8f420616e278d', 'VINCE OKTAVIANI', 'logistic.tribina@sefasgroup.com', '', '', 2, 2, '24', '40', '9', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2010-06-21', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(237, '', '03-010-0059', 'b7be342667b2adabf3e8f420616e278d', 'NURALI SAEFI', 'nurali.saefi@sefasgroup.com', '', '', 2, 2, '130', '40', '9', '5', 'Cilegon', '2', '1', '11', 'STPC', 'S', 'Cilegon', '2010-12-13', 'Active', '03-004-0007', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(238, '', '03-011-0062', 'b7be342667b2adabf3e8f420616e278d', 'FEBRI ARIFIANTO', 'decanting.jkt@sefasgroup.com', '', '', 2, 2, '25', '40', '5', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2011-01-17', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(239, '', '03-011-0069', 'b7be342667b2adabf3e8f420616e278d', 'ROBANI', 'test@test.com', '', '', 2, 2, '25', '40', '5', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2011-04-15', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `db_users` (`id`, `id_internal`, `nik`, `password`, `name_user`, `email`, `phone`, `ktp`, `id_role`, `id_role_ticket`, `id_position`, `id_company_areas`, `id_job_grade`, `id_company`, `id_sbu`, `id_direktorat`, `id_division`, `id_departemen`, `id_section`, `id_function`, `id_kota`, `join_date`, `status`, `direct_superior_1`, `direct_superior_2`, `direct_superior_3`, `last_login`, `input_date`, `photo`) VALUES
(240, '', '03-011-0073', 'b7be342667b2adabf3e8f420616e278d', 'HERI MEILANTO', 'heri.meilanto@sefasgroup.com', '', '', 2, 2, '129', '40', '9', '5', 'Cilegon', '2', '1', '11', 'STPC', 'S', 'Cilegon', '2011-07-04', 'Active', '03-019-0486', '03-004-0007', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(242, '', '03-012-0089', 'b7be342667b2adabf3e8f420616e278d', 'SUJAMSARI', 'sujamsari@sefasgroup.com', '', '', 2, 2, '129', '40', '9', '5', 'Cilegon', '2', '1', '11', 'STPC', 'S', 'Cilegon', '2012-01-24', 'Active', '03-019-0486', '03-004-0007', '01-005-0008', '0000-00-00 00:00:00', '0000-00-00', ''),
(243, '', '03-012-0106', 'b7be342667b2adabf3e8f420616e278d', 'WARIH HARYATI', 'billing.tribina@sefasgroup.com', '', '', 2, 2, '177', '40', '9', '5', 'Cilegon', '3', '3', '4', 'F', 'NS', 'Cilegon', '2012-08-01', 'Active', '03-004-0007', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(244, '', '03-013-0113', 'b7be342667b2adabf3e8f420616e278d', 'SOFIE BUNGA MIRANTI', 'sophie@sefasgroup.com', '', '', 2, 2, '120', '40', '4', '5', 'Tangerang', '2', '1', '11', '', 'S', 'Cilegon', '2013-02-11', 'Active', '01-005-0008', '01-097-0001', '', '2021-06-14 00:00:00', '0000-00-00', ''),
(245, '', '03-013-0126', 'b7be342667b2adabf3e8f420616e278d', 'DENI', 'test@test.com', '', '', 2, 2, '44', '40', '5', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Tangerang', '2013-07-18', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(246, '', '03-013-0134', 'b7be342667b2adabf3e8f420616e278d', 'KIKI DWI PRATIWI', 'tribinapanutan@sefasgroup.com', '', '', 2, 2, '133', '40', '9', '5', 'Cilegon', '2', '1', '11', '', 'NS', 'Cilegon', '2013-10-01', 'Active', '03-004-0007', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(248, '', '03-014-0145', 'b7be342667b2adabf3e8f420616e278d', 'RUDY', 'rudy.tribina@sefasgroup.com', '', '', 2, 2, '128', '40', '10', '5', 'Cilegon', '2', '1', '11', 'STPC', 'S', 'Cilegon', '2014-01-13', 'Active', '03-004-0007', '', '', '2021-04-26 00:00:00', '0000-00-00', ''),
(249, '', '03-014-0170', 'b7be342667b2adabf3e8f420616e278d', 'DENI FIRMANSYAH', 'denif2503@gmail.com', '', '', 2, 2, '217', '40', '5', '5', 'Cilegon', '4', '4', '5', 'GA', 'NS', 'Cilegon', '2014-12-08', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(250, '', '03-016-0205', 'b7be342667b2adabf3e8f420616e278d', 'YULIA SARI', 'yulia.sari@sefasgroup.com', '', '', 2, 2, '129', '40', '9', '5', 'Cilegon', '2', '1', '11', 'STPC', 'S', 'Cilegon', '2016-01-04', 'Active', '03-014-0145', '03-004-0007', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(251, '', '03-016-0229', 'b7be342667b2adabf3e8f420616e278d', 'ROHMAT', 'rohmat2812@yahoo.com', '', '', 2, 2, '26', '40', '5', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2016-06-06', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(252, '', '03-016-0246', 'b7be342667b2adabf3e8f420616e278d', 'JAENAN', 'jaenanrobby828@gmail.com', '', '', 2, 2, '220', '40', '3', '5', 'Cilegon', '4', '4', '5', 'GA', 'NS', 'Cilegon', '2016-11-14', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(253, '', '03-016-0248', 'b7be342667b2adabf3e8f420616e278d', 'ATA SUNARYA', 'test@test.com', '', '', 2, 2, '224', '117', '5', '5', 'Tangerang', '4', '4', '5', 'WL2', 'NS', 'Tangerang', '2016-12-27', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(255, '', '03-017-0316', 'b7be342667b2adabf3e8f420616e278d', 'RIO YANUAR ORLANDO', 'rio.yanuar@sefasgroup.com', '', '', 2, 2, '122', '117', '9', '5', 'Tangerang', '2', '1', '11', 'STPT', 'S', 'Tangerang', '2017-09-07', 'Active', '03-013-0113', '', '', '2020-04-15 00:00:00', '0000-00-00', ''),
(257, '', '03-017-0320', 'b7be342667b2adabf3e8f420616e278d', 'DESY PURBIAGUSTIN', 'desy_purbiagustin@yahoo.com', '', '', 2, 2, '170', '40', '9', '5', 'Cilegon', '3', '3', '4', 'F', 'NS', 'Cilegon', '2017-09-27', 'Active', '03-004-0007', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(259, '', '03-018-0369', 'b7be342667b2adabf3e8f420616e278d', 'BUDI UTOMO', 'budi.utomo@sefasgroup.com', '', '', 2, 2, '125', '117', '9', '5', 'Tangerang', '2', '1', '11', 'T', 'NS', 'Tangerang', '2018-02-26', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(260, '', '03-018-0373', 'b7be342667b2adabf3e8f420616e278d', 'MICHELLE CHANDRA LIM', 'michelle_chandra_lim@yahoo.com', '', '', 2, 2, '150', '51', '4', '1', 'KS', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2019-02-25', 'Active', '01-005-0008', '', '', '2020-04-14 00:00:00', '0000-00-00', ''),
(263, '', '03-018-0415', 'b7be342667b2adabf3e8f420616e278d', 'UMMI ROCHMAWATI SAKINAH', 'ummi@tribinapanutan.com', '', '', 2, 2, '172', '117', '9', '5', 'Tangerang', '3', '3', '4', '', 'NS', 'Tangerang', '2018-08-15', 'Active', '03-013-0113', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(264, '', '03-018-0416', 'b7be342667b2adabf3e8f420616e278d', 'ABUD SIHABUDIN', 'test@test.com', '', '', 2, 2, '43', '117', '5', '5', 'Tangerang', '2', '6', '13', 'WL2', 'NS', 'Tangerang', '2018-08-21', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(267, '', '03-018-0426', 'b7be342667b2adabf3e8f420616e278d', 'JOSEPH SANJAYA', 'joseph@tribinapanutan.com', '', '', 2, 2, '122', '117', '9', '5', 'Tangerang', '2', '1', '11', 'STPT', 'S', 'Tangerang', '2018-09-17', 'Active', '03-013-0113', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(270, '', '03-018-0445', 'b7be342667b2adabf3e8f420616e278d', 'YOKI WAHYU SYAHARA', 'testing@test.com', '', '', 2, 2, '40', '117', '3', '5', 'Tangerang', '2', '6', '13', 'GA', 'NS', 'Tangerang', '2018-11-06', 'Active', '01-001-0005', '01-006-0018', '', '2020-04-15 00:00:00', '0000-00-00', ''),
(280, '', '03-019-0509', 'b7be342667b2adabf3e8f420616e278d', 'M NURHIDAYATULLOH', 'nurhidayat@tribinapanutan.com', '', '', 2, 2, '89', '40', '9', '5', 'Cilegon', '2', '5', '14', 'T', 'NS', 'Cilegon', '2019-08-26', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(281, '', '04-011-0071', 'b7be342667b2adabf3e8f420616e278d', 'BERLINO HARYANTO', 'berlino@bluecoolant.com', '', '', 2, 2, '135', '47', '4', '6', 'BCI - B2B', '2', '1', '11', '', 'S', 'Jakarta-CB', '2011-05-18', 'Active', '02-018-0448', '01-005-0008', '', '2021-04-28 00:00:00', '0000-00-00', ''),
(282, '', '04-015-0176', 'b7be342667b2adabf3e8f420616e278d', 'SUMEL LESTARI', 'imelsumel82@gmail.com', '', '', 2, 2, '140', '47', '9', '6', 'HO - BCI', '2', '1', '11', '', 'NS', 'Jakarta-CB', '2015-02-02', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(283, '', '04-015-0265', 'b7be342667b2adabf3e8f420616e278d', 'ESRON FERNANDO ELIAKIM', 'esron@bluecoolant.com', '', '', 2, 2, '87', '47', '9', '6', 'HO - BCI', '2', '5', '14', 'T', 'NS', 'Jakarta-CB', '2015-06-01', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(284, '', '04-016-0236', 'b7be342667b2adabf3e8f420616e278d', 'DEWI BUTARBUTAR', 'dewi.b@bluecoolant.com', '', '', 2, 2, '138', '47', '9', '6', 'BCI - B2B', '2', '1', '11', '', 'S', 'Jakarta-CB', '2016-09-05', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(285, '', '04-016-0237', 'b7be342667b2adabf3e8f420616e278d', 'MUCHTAR HAMDY', 'hamdy@bluecoolant.com', '', '', 2, 2, '138', '47', '9', '6', 'BCI - B2B', '2', '1', '11', '', 'S', 'Jakarta-CB', '2016-09-05', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(286, '', '04-016-0238', 'b7be342667b2adabf3e8f420616e278d', 'SUKENDI', 'sukendi@bluecoolant.com', '', '', 2, 2, '138', '47', '9', '6', 'BCI - B2B', '2', '1', '11', '', 'S', 'Jakarta-CB', '2016-09-05', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(287, '', '04-017-0267', 'b7be342667b2adabf3e8f420616e278d', 'TAMSIL ZULFIKAR', 'testing@test.com', '', '', 2, 2, '217', '47', '5', '6', 'HO - BCI', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2017-03-03', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(288, '', '04-017-0321', 'b7be342667b2adabf3e8f420616e278d', 'ELIS SUTIHAT', 'elis.elis50@yahoo.co.id', '', '', 2, 2, '141', '47', '9', '6', 'HO - BCI', '2', '1', '11', '', 'S', 'Jakarta-CB', '2017-10-02', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(290, '', '04-018-0406', 'b7be342667b2adabf3e8f420616e278d', 'UNTUNG SURONO', 'suronountung0@gmail.com', '', '', 2, 2, '142', '47', '5', '6', 'HO - BCI', '2', '1', '11', '', 'NS', 'Jakarta-CB', '2018-07-02', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(292, '', '04-019-0531', 'b7be342667b2adabf3e8f420616e278d', 'S. RAMYA INGGITA MANIKOTTAMA', 'ramya.inggita@sefasgroup.com', '', '', 4, 2, '227', '47', '10', '6', 'HO - BCI', '4', '4', '10', '', 'NS', 'Jakarta-CT', '2019-12-09', 'Active', '01-018-0359', '', '', '2021-04-24 00:00:00', '0000-00-00', ''),
(342, '', '06-017-0313', 'b7be342667b2adabf3e8f420616e278d', 'DARSONO', 'darsonosukyan@gmail.com', '', '', 2, 2, '218', '#N/A', '3', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2017-09-01', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(343, '', '07-011-0068', 'b7be342667b2adabf3e8f420616e278d', 'DESNORA TAMBUNAN', 'purchase.admin@sefasgroup.com', '', '', 2, 2, '181', '51', '9', '1', 'HO - SP', '3', '3', '2', 'C', 'NS', 'Jakarta-CT', '2011-02-14', 'Active', '01-005-0013', '', '', '2021-04-28 00:00:00', '0000-00-00', ''),
(349, '', '12-019-0507', 'b7be342667b2adabf3e8f420616e278d', 'TRI SANTOSO', 'test@test.com', '', '', 2, 2, '222', '#N/A', '3', '#N/A', '', '4', '4', '5', '', '', '', '2019-08-16', 'Active', '01-001-0005', '01-006-0018', '01-006-0018', '0000-00-00 00:00:00', '0000-00-00', ''),
(351, '', '14-011-0491', 'b7be342667b2adabf3e8f420616e278d', 'KAWI', 'test@test.com', '', '', 2, 2, '217', '51', '5', '1', 'HO - SP', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2011-11-01', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', ''),
(353, '', '14-013-0493', 'b7be342667b2adabf3e8f420616e278d', 'ISTUTININGSIH', 'istuti.ningsih@ppba.co.id', '', '', 2, 2, '155', '51', '10', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2012-02-13', 'Active', '01-014-0160', '', '', '2021-05-27 00:00:00', '0000-00-00', ''),
(357, '', '14-017-0498', 'b7be342667b2adabf3e8f420616e278d', 'DITA NURCAHYANI', 'dita.nurcahyani@ppba.co.id', '', '', 2, 2, '186', '51', '9', '1', 'HO - SP', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2017-04-01', 'Active', '01-014-0160', '', '', '2021-06-28 00:00:00', '0000-00-00', ''),
(360, '', '01-019-0508', 'b7be342667b2adabf3e8f420616e278d', 'RENATA TIAR SARI', 'renata@sefasgroup.com', '', '', 2, 2, '178', '4', '9', '1', 'KT', '3', '3', '4', 'F', 'NS', 'Balikpapan', '2019-09-05', 'Active', '01-005-0014', '01-018-0447', '', '2021-04-28 00:00:00', '0000-00-00', 'blank.jpg'),
(361, '', '01-019-0532', 'b7be342667b2adabf3e8f420616e278d', 'DELLA NATASYA YOSEFIEN TAMPI', 'della@sefasgroup.com', '', '', 2, 2, '103', '4', '9', '1', 'KT', '2', '1', '11', 'SSPKT', 'S', 'Balikpapan', '2019-12-09', 'Active', '01-014-0162', '01-008-0031', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(363, '', '01-019-0513', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMMAD LUTHFI', 'hrd.sefasgroup@gmail.com', '', '', 2, 2, '84', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2019-09-05', 'Active', '01-012-0084', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(365, '', '01-019-0512', 'b7be342667b2adabf3e8f420616e278d', 'PASCALIS ROA', 'hrd.sefasgroup@gmail.com', '', '', 2, 2, '84', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2019-09-02', 'Active', '01-012-0084', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(367, '', '01-019-0520', 'b7be342667b2adabf3e8f420616e278d', 'RICO SAPUTRA GINTING', 'hrd.sefasgroup@gmail.com', '', '', 2, 2, '194', '51', '9', '1', 'HO - SP', '4', '7', '8', '', 'NS', 'Jakarta-CT', '2019-09-16', 'Active', '01-021-0591', '', '', '2021-06-03 00:00:00', '0000-00-00', 'blank.jpg'),
(373, '', '01-020-0564', 'b7be342667b2adabf3e8f420616e278d', 'RAHEL OKTAFERA POTO', 'rahel@sefasgroup.com', '', '', 4, 2, '199', '51', '10', '1', 'HO - SP', '4', '4', '6', 'ISOHSE', 'NS', 'Jakarta-CT', '2020-10-07', 'Active', '01-018-0359', '', '', '2021-06-18 00:00:00', '0000-00-00', 'blank.jpg'),
(374, '', '01-020-0559', 'b7be342667b2adabf3e8f420616e278d', 'GISKHE ARIANA MAKHAS', 'giskhe@sefasgroup.com', '', '', 2, 2, '8', '51', '4', '1', 'HO - SP', '1', '2', '9', '', 'NS', 'Jakarta-CT', '2020-08-25', 'Active', '01-007-0030', '01-097-0001', '', '2021-04-26 00:00:00', '0000-00-00', 'blank.jpg'),
(376, '', '02-021-0595', 'b7be342667b2adabf3e8f420616e278d', 'ABDUL MUFAHIR', 'test@test.com', '', '', 2, 2, '222', '33', '5', '4', 'Jakarta', '4', '4', '5', 'GA', 'NS', 'Cikarang', '2021-02-08', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(377, '', '01-021-0590', 'b7be342667b2adabf3e8f420616e278d', 'ADE GUNAWAN SALEH', 'test@test.com', '', '', 2, 2, '72', '4', '5', '1', 'KT', '2', '6', '12', 'WL1', 'NS', 'Balikpapan', '2021-01-04', 'Active', '01-005-0015', '01-019-0471', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(384, '', '02-020-0581', 'b7be342667b2adabf3e8f420616e278d', 'AKWELLA SAPUTRA', 'akwella.saputra@sefasgroup.com', '', '', 2, 2, '91', '43', '9', '4', 'BN', '2', '5', '14', 'T', 'NS', 'Denpasar', '2020-12-01', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(385, '', '03-021-0592', 'b7be342667b2adabf3e8f420616e278d', 'ALIEF ALANG SYAHPUTRA', 'test@test.com', '', '3672071612970000', 2, 2, '27', '40', '3', '5', 'Cilegon', '2', '6', '13', 'WL2', 'NS', 'Cilegon', '2021-01-25', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(386, '', '01-020-0561', 'b7be342667b2adabf3e8f420616e278d', 'ANDI ANTARIS', 'andiantaris@gmail.com', '', '6471040612900000', 2, 2, '206', '4', '5', '1', 'KT', '4', '4', '5', 'HRGA', 'NS', 'Balikpapan', '2020-09-10', 'Active', '01-019-0504', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(393, '', '01-021-0594', 'b7be342667b2adabf3e8f420616e278d', 'DEWI LARASATI', 'test@test.com', '', '3175016805970000', 2, 2, '161', '51', '9', '1', 'HO - SP', '3', '3', '4', 'F', 'NS', 'Jakarta-CT', '2021-02-01', 'Active', '01-014-0160', '', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(396, '', '02-020-0575', 'b7be342667b2adabf3e8f420616e278d', 'FATUROHMAN', 'test@test.com', '', '', 2, 2, '40', '33', '3', '4', 'Jakarta', '2', '6', '13', 'WL2', 'NS', 'Cikarang', '2020-11-17', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(401, '', '04-020-0533', 'b7be342667b2adabf3e8f420616e278d', 'HELVANS', 'helvans@bluecoolant.com', '', '6471050508950000', 2, 2, '106', '1', '9', '6', 'BCI - B2B', '2', '1', '11', '', 'NS', 'Balikpapan', '2020-01-02', 'Active', '04-011-0071', '', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(403, '', '02-020-0540', 'b7be342667b2adabf3e8f420616e278d', 'JULIA SRIS NOOR', 'julia@sefasgroup.com', '', '3175065707920000', 2, 2, '166', '33', '9', '4', 'Jakarta', '3', '3', '4', 'F', 'NS', 'Cikarang', '2020-03-30', 'Active', '02-015-0193', '02-007-0026', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(404, '', '01-020-0544', 'b7be342667b2adabf3e8f420616e278d', 'KRISTINA LISANDRA', 'lhysandra.mejica16@gmail.com', '', '6408085612980000', 2, 2, '205', '4', '9', '1', 'KT', '4', '4', '5', 'HRGA', 'NS', 'Balikpapan', '2020-04-22', 'Active', '01-019-0504', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(405, '', '03-020-0549', 'b7be342667b2adabf3e8f420616e278d', 'MOCHAMAD RISAD WICAKSONO', 'risad.wicaksono@tribinapanutan.com', '', '3673010405960000', 2, 2, '129', '40', '9', '5', 'Cilegon', '2', '1', '11', 'STPC', 'S', 'Cilegon', '2020-07-13', 'Active', '03-014-0145', '03-004-0007', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(406, '', '02-020-0557', 'b7be342667b2adabf3e8f420616e278d', 'SAHNURUL DIAS ANANGGAR', 'test@test.com', '', '3301081811980000', 2, 2, '218', '50', '3', '4', 'Jakarta', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2020-08-21', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(408, '', '01-020-0536', 'b7be342667b2adabf3e8f420616e278d', 'KEZIA NATASHA ROESLI', 'kezia.roesli@sefasgroup.com', '', '3171016211960000', 2, 2, '191', '51', '1', '', 'HO - SP', '4', '0', '0', '', 'NS', 'Jakarta-CT', '2020-02-10', 'Active', '01-097-0001', '', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(409, '', '01-020-0558', 'b7be342667b2adabf3e8f420616e278d', 'M. IRSAN', 'irsan@sefasgroup.com', '', '1607102002790000', 2, 2, '212', '51', '9', '1', 'HO - SP', '4', '4', '5', 'CV', 'NS', 'Jakarta-CT', '2020-08-25', 'Active', '01-019-0481', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(411, '', '02-021-0593', 'b7be342667b2adabf3e8f420616e278d', 'IRFAN ARDIANTO', 'irfan.ardianto@sefasgroup.com', '', '3172040512970000', 2, 2, '117', '50', '9', '4', 'HO - SK', '2', '1', '11', 'T', 'NS', 'Jakarta-CT', '2021-02-01', 'Active', '02-015-0264', '01-018-0417', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(412, '', '03-021-0589', 'b7be342667b2adabf3e8f420616e278d', 'JOKO SRIYANTO', 'joko.sriyanto@tribinapanutan.com', '', '3374081901950000', 2, 2, '125', '117', '9', '5', 'Tangerang', '2', '1', '11', 'T', 'NS', 'Tangerang', '2021-01-04', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(413, '', '03-020-0565', 'b7be342667b2adabf3e8f420616e278d', 'KATHERINE AUDREY ESTHER E', 'audrey@sefasgroup.com', '', '', 2, 2, '10', '52', '9', '5', 'HO - TP', '1', '2', '9', '', 'NS', 'Jakarta-CT', '2020-09-25', 'Active', '01-020-0559', '', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(414, '', '01-020-0568', 'b7be342667b2adabf3e8f420616e278d', 'KRESNA ADITYA', 'hrga.bjm@sefasgroup.com', '', '', 3, 2, '207', '9', 'Staff', '1', 'KS', '4', '4', '5', 'HRGA', 'NS', 'Banjarbaru', '2020-10-01', 'Active', '01-019-0504', '01-006-0018', '', '2021-07-12 00:00:00', '0000-00-00', 'blank.jpg'),
(415, '', '02-020-0579', 'b7be342667b2adabf3e8f420616e278d', 'LINDO LIANA', 'lindo.liana@sefasgroup.com', '', '3275095104980010', 2, 2, '186', '50', '9', '4', 'HO - SK', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2020-12-01', 'Active', '01-012-0093', '', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(416, '', '01-019-0524', 'b7be342667b2adabf3e8f420616e278d', 'MAIDI', 'maidi@sefasgroup.com', '', '6308030811960000', 2, 2, '97', '9', '9', '1', 'KS', '2', '1', '11', 'T', 'NS', 'Banjarbaru', '2019-10-04', 'Active', '01-014-0146', '02-010-0051', '', '2021-04-22 00:00:00', '0000-00-00', 'blank.jpg'),
(419, '', '02-021-0596', 'b7be342667b2adabf3e8f420616e278d', 'MARGARETH PARAMITA M', 'test@test.com', '', '', 2, 2, '214', '50', '9', '4', 'HO - SK', '4', '4', '5', 'GA', 'NS', 'Jakarta-CT', '2021-02-15', 'Active', '01-001-0005', '01-006-0018', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(420, '', '03-020-0582', 'b7be342667b2adabf3e8f420616e278d', 'MUHAMAD RIZQI RAMADHAN', 'rizqi.ramadhan@tribinapanutan.com', '', '3604321712960000', 2, 2, '89', '40', '9', '5', 'Cilegon', '2', '5', '14', 'T', 'NS', 'Cilegon', '2020-12-01', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(423, '', '01-019-0522', 'b7be342667b2adabf3e8f420616e278d', 'NURIA ASTRI HUTAJULU', 'keyacc.admin@sefasgroup.com', '', '1202145709990000', 2, 2, '151', '51', '9', '1', 'HO - SP', '2', '1', '11', '', 'NS', 'Jakarta-CT', '2019-10-01', 'Active', '02-009-0047', '', '', '2021-04-23 00:00:00', '0000-00-00', 'blank.jpg'),
(424, '', '01-021-0591', 'b7be342667b2adabf3e8f420616e278d', 'RA. GRANITA RAMADHANI L', 'granita@sefasgroup.com', '', '3174106806840000', 2, 2, '192', '51', '4', '1', 'HO - SP', '4', '7', '8', '', 'NS', 'Jakarta-CT', '2021-01-20', 'Active', '01-007-0030', '01-097-0001', '', '2021-05-07 00:00:00', '0000-00-00', 'blank.jpg'),
(427, '', '01-021-0588', 'b7be342667b2adabf3e8f420616e278d', 'RIZKI PRATAMA', 'rizki.pratama@sefasgroup.com', '', '6472041811960000', 2, 2, '84', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2021-01-04', 'Active', '01-012-0085', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(428, '', '01-020-0578', 'b7be342667b2adabf3e8f420616e278d', 'SITI FATMAWATI', 'siti.fatmawati@sefasgroup.com', '', '6471045805960000', 2, 2, '84', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2020-12-01', 'Active', '01-012-0085', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(429, '', '01-020-0566', 'b7be342667b2adabf3e8f420616e278d', 'TOPANI', 'topani@sefasgroup.com', '', '6471021401900000', 2, 2, '84', '4', '9', '1', 'KT', '2', '5', '14', 'T', 'NS', 'Balikpapan', '2020-10-05', 'Active', '01-012-0085', '02-010-0051', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(430, '', '02-021-0637', '06a58651df79bb544c0a9e21855df020', 'ASMA KHAIRANI', 'asma.khairani@sefasgroup.com', '', '', 1, 2, '210', '50', '9', '4', 'HO - SK', '4', '4', '5', 'HR', 'ST', 'Jakarta-CT', '2021-08-15', 'Active', '01-006-0018', '01-018-0359', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(431, '', '01-019-0466', 'b7be342667b2adabf3e8f420616e278d', 'TEST', 'test@mail.com', '82110012323', '1231823129319', 2, 2, '196', '50', '9', '1', 'HO - SK', '4', '7', '7', '', 'ST', 'Jakarta-CT', '2022-02-04', 'Active', '01-011-0074', '01-007-0030', '', '0000-00-00 00:00:00', '0000-00-00', 'blank.jpg'),
(432, '03-021-0646', '03-021-0646', 'b7be342667b2adabf3e8f420616e278d', 'DAVID SAMUDRA NUGROHO', 'david.samudra@tribinapanutan.com', '', '', 2, 2, '89', '40', '9', '5', 'Cilegon', '2', '5', '14', 'T', 'NS', 'Cilegon', '2021-10-04', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '2022-02-16', 'blank.jpg'),
(433, '', '3506140906960002', 'b7be342667b2adabf3e8f420616e278d', 'FAUZY NUR SHODIQ', 'fauzy.shodiq@tribinapanutan.com', '', '', 2, 2, '91', '117', '9', '5', 'Tangerang', '2', '5', '14', 'T', 'NS', 'Tangerang', '2021-03-08', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '2022-05-11', 'blank.jpg'),
(434, ' 02-021-0644', '3506150411960002', 'b7be342667b2adabf3e8f420616e278d', 'GAYUH WAHYU ESKA NEGARA', 'gayuh.wahyu@sefasgroup.com', '08000000000000', '3506150411960002', 2, 2, '87', '50', '9', '4', 'HO - SK', '2', '5', '14', 'T', 'NS', 'Jakarta-CT', '2021-09-27', 'Active', '01-018-0417', '', '', '0000-00-00 00:00:00', '2022-05-31', 'blank.jpg'),
(435, ' 01-021-0623', ' 01-021-0623', 'b7be342667b2adabf3e8f420616e278d', 'FERRY MAIHAMI', 'ferry.maihami@sefasgroup.com', '', '3173072307930002', 2, 2, '185', '51', '10', '1', 'HO - SP', '3', '3', '1', 'AT', 'NS', 'Jakarta-CT', '2021-04-26', 'Active', '01-012-0093', '01-098-0002', '', '0000-00-00 00:00:00', '2022-06-14', 'blank.jpg'),
(436, ' 01-021-0649', ' 01-021-0649', 'b7be342667b2adabf3e8f420616e278d', 'KEVIN PUTRA PALAU', 'kevin.palau@sefasgroup.com', '085813450774', '3173060410910005', 2, 2, '3', '51', '4', '1', 'HO - SP', '1', '2', '3', '', 'NS', 'Jakarta-CT', '2021-10-18', 'Active', '01-020-0536', '', '', '0000-00-00 00:00:00', '2022-06-15', 'blank.jpg'),
(437, '02-021-0640', '02-021-0640', 'b7be342667b2adabf3e8f420616e278d', 'RIZKY RISDIANTO', 'rizky.risdianto@sefasgroup.com', '00', '3175022408940008', 2, 2, '87', '50', '9', '4', 'Jakarta', '2', '5', '14', 'T', 'NS', 'Jakarta-CT', '2021-09-08', 'Active', '01-018-0417', '02-010-0051', '', '0000-00-00 00:00:00', '2022-07-15', 'blank.jpg'),
(438, '01-021-0649', '01-021-0649', 'b7be342667b2adabf3e8f420616e278d', 'KEVIN PUTRA PALAU', 'kevin.palau@sefasgroup.com', '000', '', 2, 2, '3', '50', '4', '1', 'HO - SP', '1', '2', '3', 'S', 'NS', 'Jakarta-CT', '2021-10-18', 'Active', '01-020-0536', '', '', '0000-00-00 00:00:00', '2022-07-15', 'blank.jpg'),
(439, '16-022-0693', '16-022-0693', 'b7be342667b2adabf3e8f420616e278d', 'ZARNAINI, IR', 'anizarnaini@sinergisp.com', '', '3374035108640001', 2, 2, '248', '125', '2', '12', 'SSP', '2', '1', '11', 'S', 'NS', 'Cikarang', '2022-02-25', 'Active', '01-098-0002', '', '', '0000-00-00 00:00:00', '2022-07-18', 'blank.jpg'),
(440, '16-022-0674', '16-022-0674', 'b7be342667b2adabf3e8f420616e278d', 'OKTAVIA RADITE', 'radite.oktavia@sinergisp.com', '', '3275031410810026', 2, 2, '249', '125', '4', '12', 'SSP', '2', '1', '11', 'S', 'S', 'Cikarang', '2022-02-15', 'Active', '16-022-0693', '', '', '0000-00-00 00:00:00', '2022-07-18', 'blank.jpg'),
(441, ' 16-022-0678', ' 16-022-0678', 'b7be342667b2adabf3e8f420616e278d', 'LAKSONO KURNIAWAN', 'laksono.kurniawan@sinergisp.com', '082113377685', '3201020305770008', 2, 2, '259', '34', '8', '12', 'SSP', '2', '5', '14', 'T', 'NS', 'Cikarang', '2022-02-15', 'Active', '16-022-0674', '16-022-0693', '', '0000-00-00 00:00:00', '2022-08-10', 'blank.jpg'),
(442, '04-022-0741', '04-022-0741', 'b7be342667b2adabf3e8f420616e278d', 'RACHMI SATARSYAH', 'r.satarsyah@gmail.com', '081294638804', '3171075810900003', 2, 2, '3', '47', '4', '6', 'HO - BCI', '1', '2', '3', 'S', 'NS', 'Jakarta-CT', '2022-08-15', 'Active', '01-020-0536', '', '', '0000-00-00 00:00:00', '2022-08-15', 'blank.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_companies`
--
ALTER TABLE `db_companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `db_company_areas`
--
ALTER TABLE `db_company_areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `db_departemen`
--
ALTER TABLE `db_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `db_notification`
--
ALTER TABLE `db_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `db_read_notification`
--
ALTER TABLE `db_read_notification`
  ADD PRIMARY KEY (`id_read`);

--
-- Indexes for table `db_request`
--
ALTER TABLE `db_request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `db_request_category`
--
ALTER TABLE `db_request_category`
  ADD PRIMARY KEY (`id_request_category`);

--
-- Indexes for table `db_request_comment`
--
ALTER TABLE `db_request_comment`
  ADD PRIMARY KEY (`id_request_comment`);

--
-- Indexes for table `db_request_level`
--
ALTER TABLE `db_request_level`
  ADD PRIMARY KEY (`id_request_level`);

--
-- Indexes for table `db_request_status`
--
ALTER TABLE `db_request_status`
  ADD PRIMARY KEY (`id_request_status`);

--
-- Indexes for table `db_request_timeline`
--
ALTER TABLE `db_request_timeline`
  ADD PRIMARY KEY (`id_request_timeline`);

--
-- Indexes for table `db_roles`
--
ALTER TABLE `db_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_roles_users`
--
ALTER TABLE `db_roles_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_companies`
--
ALTER TABLE `db_companies`
  MODIFY `id_company` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `db_company_areas`
--
ALTER TABLE `db_company_areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `db_notification`
--
ALTER TABLE `db_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_read_notification`
--
ALTER TABLE `db_read_notification`
  MODIFY `id_read` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_request`
--
ALTER TABLE `db_request`
  MODIFY `id_request` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `db_request_category`
--
ALTER TABLE `db_request_category`
  MODIFY `id_request_category` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_request_comment`
--
ALTER TABLE `db_request_comment`
  MODIFY `id_request_comment` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `db_request_level`
--
ALTER TABLE `db_request_level`
  MODIFY `id_request_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_request_status`
--
ALTER TABLE `db_request_status`
  MODIFY `id_request_status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_request_timeline`
--
ALTER TABLE `db_request_timeline`
  MODIFY `id_request_timeline` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `db_roles`
--
ALTER TABLE `db_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_roles_users`
--
ALTER TABLE `db_roles_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
