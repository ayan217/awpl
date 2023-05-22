-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2023 at 12:35 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpots`
--

DROP TABLE IF EXISTS `dpots`;
CREATE TABLE IF NOT EXISTS `dpots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpots`
--

INSERT INTO `dpots` (`id`, `name`, `address`) VALUES
(1, 'Depot 1', 'Demo Depot Address'),
(3, 'Depot 2', 'Demo Depot Address 2'),
(4, 'Depot 3', 'Demo Depot Address 3');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dpot_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `exc_duty` varchar(255) DEFAULT NULL,
  `dist_fee` varchar(255) DEFAULT NULL,
  `pri_dist_fee` varchar(255) DEFAULT NULL,
  `tds` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '0=water,1=alcohol,2=mask,3=san',
  `in_stock` int(11) NOT NULL COMMENT '0=in,1=not',
  `f_img` varchar(255) NOT NULL,
  `s_imgs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `dpot_id`, `name`, `size`, `price`, `disc`, `exc_duty`, `dist_fee`, `pri_dist_fee`, `tds`, `type`, `in_stock`, `f_img`, `s_imgs`) VALUES
(1, 4, 'Demo Brand ', '700 X 6', '17600', '100', '30', '180', '24', '', 1, 0, 'resized-1684663825_238X300.jpg', '6469ee6497dc1.jpg,6469ee649804e.jpg'),
(2, 4, 'Water', '500 X 1', '330', '30', '', '', '', '3', 0, 0, 'resized-1684664036_238X300.jpg', ''),
(3, 4, 'Mask', '50 X 5', '1000', '100', '', '', '', '3', 2, 0, 'resized-1684664161_238X146.png', ''),
(4, 4, 'Sanitizers', '100 X 10', '1200', '200', '', '', '', '3', 3, 0, 'resized-1684664250_238X300.jpg', ''),
(5, 4, '2020 VSOP Cognac', '700 X 6', '26780', '0', '30', '180', '24', '', 1, 0, 'resized-1684664412_390X400.jpg', ''),
(6, 4, 'Bhutan Grain Whisky (WMC)', '750 X 1', '2410', '0', '60', '170', '48', '', 1, 0, 'resized-1684664496_400X400.png', ''),
(7, 4, 'Royal XXX Rum', '750 X 1', '695', '0', '75', '127', '36', '', 1, 0, 'resized-1684664636_132X249.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0=superadmin,1=depo_user,2=mangement;3=gen_user,4=civil_dist,5=def_dist',
  `dpot_id` int(11) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `l_number` varchar(255) DEFAULT NULL,
  `l_vdate` date DEFAULT NULL,
  `dist` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `moq` int(11) DEFAULT NULL,
  `v_type` varchar(255) DEFAULT NULL,
  `v_number` varchar(255) DEFAULT NULL,
  `agreement_file` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending,1=approved',
  `sdepo` varchar(255) DEFAULT NULL,
  `sdepo_status` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `full_name`, `email`, `phone`, `address`, `type`, `dpot_id`, `l_name`, `l_number`, `l_vdate`, `dist`, `city`, `moq`, `v_type`, `v_number`, `agreement_file`, `status`, `sdepo`, `sdepo_status`, `updated_at`, `created_at`) VALUES
(1, 'admin', '$2y$10$rCw5bkhD9eqkn/NOWWgX5OnrXo0kqycRhqxj.gGMVQeJNz97lxSX2', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-16 00:00:00'),
(6, 'depoadmin123', '$2y$10$xVmhPDl1tDG4qH.T/8do4.xfgsJG9TYHv4vwVCy1CqWNP4B5Y1Tz2', 'Depot Admin', 'depotadmin@yopmail.com', '9804006966', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-17 12:07:11', '2023-05-17 10:42:37'),
(7, 'manage123', '$2y$10$vEPxT0KZmYEFH.fIettITeW/iQw8N6/kzIqKZhpjUfCscoffF8hn2', 'Management Staff', 'management@yopmail.com', '3645879521', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-17 18:25:47', '2023-05-17 10:50:06'),
(9, 'gencust123', '$2y$10$M3hraBKTYIfHREMPttwg9.e/7YRdTvWr3b1kqfCX1li2Mo.VI1f.2', 'Gen Cust', 'gencust@yopmail.com', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-18 10:18:18'),
(12, 'kadeemholmes123', '$2y$10$1wsPmq5PvJYhcCkBh2c5Ge1M4ZNePTMFb66aJ.BwvbSNQdr9tOnem', 'Kadeem Holmes', 'jonu@mailinator.com', '5202569874', 'Qui doloribus porro ', 5, 2, 'Rahim Gilbert', '446654789245', '2007-02-24', 'Aliquip commodo maxi', 'Explicabo Numquam e', 32, 'Doloribus quo possim', 'BHU-srw-853', 'Kadeem_Holmes_contract_agreement.pdf', 1, '2000', 1, NULL, '2023-05-18 13:26:21'),
(13, 'suwog', '$2y$10$KBY5a/JNDTLF3OisHm.T3eJma8E8sTT99b8aiv1qufDBOuYSZ2p.a', 'Igor Hull', 'lidyx@mailinator.com', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-18 13:26:36'),
(14, 'merrillhubbard123', '$2y$10$ajT8ok7uE0WpEDrqtXfBlOm4VvB1kKfiJHVlzYnY8UQWtcM5ZOgxe', 'Merrill Hubbard', 'pytu@mailinator.com', '8044584526', 'Natus deserunt irure', 5, 1, 'Karyn Hanson', '164659874525', '1990-06-29', 'Non est lorem place', 'Quis mollitia offici', 15, 'Et adipisci qui magn', 'BHU-trw-624', 'Merrill_Hubbard_contract_agreement.pdf', 1, '500', 0, NULL, '2023-05-18 14:44:04'),
(15, NULL, NULL, 'Samantha Luna', 'qivoh@mailinator.com', '75', 'Corporis id sequi c', 5, 1, 'Desirae Alston', '522', '2023-04-06', 'Eos debitis eum exce', 'Est quis eiusmod lab', 32, 'Architecto tempor qu', '204', 'Samantha_Luna_contract_agreement.pdf', 0, NULL, NULL, NULL, '2023-05-18 14:44:43'),
(16, 'huxudezese', '$2y$10$klVBRl1tJVbKLW6yyw6mG.ZI3hKl9tM7SqlOR7BKZVTtYInMlpKKW', 'Summer Montoya', 'tejinona@mailinator.com', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-18 14:46:01'),
(17, 'waqejores', '$2y$10$EM5djyxSQA/4ZkRux6t2/.9n4Du3/uJWpF012XY5wORh0.h.cqtE.', 'Armand Maddox', 'pidababaqa@mailinator.com', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-18 14:46:16'),
(18, NULL, NULL, 'Colin Paul', 'keboxohis@mailinator.com', '104', 'Hic est id voluptatu', 4, NULL, 'Heidi Barton', '725', '1996-05-25', 'Anim dolor consequat', 'Fuga Saepe eligendi', 96, 'Voluptas sed sed mol', '857', 'Colin_Paul_contract_agreement.pdf', 0, NULL, NULL, NULL, '2023-05-18 14:50:52'),
(19, 'genuser123', '$2y$10$n164YsrKjYwila.3hkp5X.gMbqMTCApCuazpZLfdDpehz2OAwlnXm', 'Test GenUser', 'genuser@yopmail.com', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-21 13:16:33'),
(20, 'testdef123', '$2y$10$CSy9SKBxUAIo12AVCqA3S.ihThqtDelhYiqjcn3v9e3sTHKwomD8.', 'Test DefDist', 'defdist@yopmail.com', '6666666666', 'demo address', 5, 4, 'deflicense', '555555555555', '2025-05-23', 'demo dist', 'demo city', 50, 'demo vehicle', 'BU-ss-98654', 'Test_DefDist_contract_agreement.pdf', 1, '500', 1, NULL, '2023-05-21 13:17:30'),
(21, 'testcivil123', '$2y$10$2B4tZcE1kY8ZPm6TPk2aTussHz0hxMWsqnLS/mmsqRacPnYyNfhoa', 'Test CivilDist', 'civildist@yopmail.com', '8888888888', 'demo address', 4, 4, 'civildist', '965478962548', '2026-05-07', 'demo dist', 'demo city', 70, 'demo vehicle', 'BU-sr-64298', 'Test_CivilDist_contract_agreement.pdf', 1, '2500', 1, NULL, '2023-05-21 13:20:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
