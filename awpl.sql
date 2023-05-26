-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2023 at 01:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.16

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dpot_id` int(11) NOT NULL,
  `qnty` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=added,1=nostock',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `dpot_id`, `qnty`, `status`, `created_at`) VALUES
(1, 20, 5, 4, '2', 0, '2023-05-26 15:44:07'),
(8, 20, 7, 4, '1', 0, '2023-05-26 16:43:07'),
(3, 20, 6, 4, '3', 1, '2023-05-26 15:46:29'),
(10, 19, 2, 4, '1', 0, '2023-05-26 17:54:13'),
(7, 21, 1, 4, '1', 0, '2023-05-26 16:06:21'),
(9, 20, 1, 4, '3', 0, '2023-05-26 16:43:18'),
(11, 19, 9, 1, '2', 0, '2023-05-26 18:08:53'),
(12, 19, 10, 3, '3', 0, '2023-05-26 18:09:03'),
(13, 19, 8, 1, '6', 0, '2023-05-26 18:25:09'),
(14, 19, 3, 4, '10', 0, '2023-05-26 18:25:17'),
(15, 19, 4, 4, '1', 0, '2023-05-26 18:46:04');

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
  `s_imgs_thumb` text DEFAULT NULL,
  `s_imgs` text DEFAULT NULL,
  `des` longtext DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `dpot_id`, `name`, `size`, `price`, `disc`, `exc_duty`, `dist_fee`, `pri_dist_fee`, `tds`, `type`, `in_stock`, `f_img`, `s_imgs_thumb`, `s_imgs`, `des`, `about`) VALUES
(1, 4, 'Demo Brand ', '700 X 6', '17600', '100', '30', '180', '24', '', 1, 0, 'resized-1684663825_238X300.jpg', 'thumb_646ee21f87e3d.webp,thumb_646ee21f8c4cb.jpg,thumb_646ee21fa41f8.jpg,thumb_646ee21fa99bb.jpg,thumb_646ee21fb9072.jpg,thumb_646ee21fc35c9.png,thumb_646ee21fc87a8.png', '646ee21f7026b.webp,646ee21f88782.jpg,646ee21f8c826.jpg,646ee21fa487a.jpg,646ee21faa43b.jpg,646ee21fb9481.png,646ee21fc4324.png', '<p>lorem100asdasdasdasdasdasdasd</p>', '<p>lorem100asdasdasdasdasdasdasd</p><h2><br></h2>'),
(2, 4, 'Water', '500 X 1', '330', '30', '', '', '', '3', 0, 0, 'resized-1684664036_238X300.jpg', 'thumb_646ca7d56986a.jpg,thumb_646ca7d5858da.jpg', '646ca7d565791.jpg,646ca7d569b8a.jpg', '<ol><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!</li><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!</li><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!</li></ol>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!</p>'),
(3, 4, 'Mask', '50 X 5', '1000', '100', '', '', '', '3', 2, 0, 'resized-1684664161_238X146.png', 'thumb_646ca80bad2e5.jpg,thumb_646ca80bbc9b7.jpg', '646ca80ba757e.jpg,646ca80bad74b.jpg', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>'),
(4, 4, 'Sanitizers', '100 X 10', '1200', '200', '', '', '', '3', 3, 0, 'resized-1684664250_238X300.jpg', 'thumb_646ca81bcb2c4.webp,thumb_646ca81be4a49.jpg', '646ca81bae762.webp,646ca81bcbc89.jpg', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sitm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>'),
(5, 4, '2020 VSOP Cognac', '700 X 6', '26780', '0', '30', '180', '24', '', 1, 0, 'resized-1684664412_390X400.jpg', 'thumb_646ca82560d1f.jpg,thumb_646ca82565994.png', '646ca82551130.jpg,646ca82561138.png', '<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, makingAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making</p>', '<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, makingAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, makingAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, makingAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, makingAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making</p>'),
(6, 4, 'Bhutan Grain Whisky (WMC)', '750 X 1', '2410', '0', '60', '170', '48', '', 1, 1, 'resized-1684664496_400X400.png', 'thumb_646ca83a7ed0e.webp,thumb_646ca83a8322e.jpg,thumb_646ca83a9b40e.jpg,thumb_646ca83aa0afa.jpg,thumb_646ca83aafa05.jpg,thumb_646ca83ab464f.png', '646ca83a672ce.webp,646ca83a7f51a.jpg,646ca83a835fe.jpg,646ca83a9b9eb.jpg,646ca83aa0e32.jpg,646ca83ab01ec.png', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>'),
(7, 4, 'Royal XXX Rum', '750 X 1', '695', '0', '75', '127', '37', '', 1, 0, 'resized-1684664636_132X249.png', 'thumb_646ca84ce5682.webp,thumb_646ca84cf0797.png,thumb_646ca84d012e0.png', '646ca84ccd7b0.webp,646ca84ce5e66.png,646ca84cf0f5c.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!</p>'),
(8, 1, 'Groot Mask', '50 X 6', '500', '20', '', '', '', '3', 2, 0, 'resized-1684842628_400X400.jpg', 'thumb_646ca8b002749.jpg,thumb_646ca8b007de3.png', '646ca8afe7b02.jpg,646ca8b002f29.png', '<p>m ipsum dolor sit amet consectetur adipisicing elit.<strong><u> Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit ame</u></strong>t consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>', '<p>m ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Acc<strong>usantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero</strong>, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facm ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis facilis mollitia error vero, in odio non nihil explicabo qui eius voluptatem excepturi veniam, accusamus praesentium, at itaque eum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maxime corporis fac</p>'),
(9, 1, 'Water Depo 1', '500ml', '150', '20', '', '', '', '3', 0, 0, 'resized-1685103822_400X400.jpg', NULL, '', '<p>dasdasdasdasdasda</p>', '<p>dasdasdasdasd</p>'),
(10, 3, 'Water Depo 2', '500ml', '150', '20', '', '', '', '3', 0, 0, 'resized-1685103661_400X400.png', NULL, '', '<p>dasdasdasdasdasda</p>', '<p>dasdasdasdasd</p>');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `full_name`, `email`, `phone`, `address`, `type`, `dpot_id`, `l_name`, `l_number`, `l_vdate`, `dist`, `city`, `moq`, `v_type`, `v_number`, `agreement_file`, `status`, `sdepo`, `sdepo_status`, `updated_at`, `created_at`) VALUES
(1, 'admin', '$2y$10$rCw5bkhD9eqkn/NOWWgX5OnrXo0kqycRhqxj.gGMVQeJNz97lxSX2', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-16 00:00:00'),
(6, 'depoadmin123', '$2y$10$xVmhPDl1tDG4qH.T/8do4.xfgsJG9TYHv4vwVCy1CqWNP4B5Y1Tz2', 'Depot Admin', 'depotadmin@yopmail.com', '9804006966', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-17 12:07:11', '2023-05-17 10:42:37'),
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
(21, 'testcivil123', '$2y$10$2B4tZcE1kY8ZPm6TPk2aTussHz0hxMWsqnLS/mmsqRacPnYyNfhoa', 'Test CivilDist', 'civildist@yopmail.com', '8888888888', 'demo address', 4, 4, 'civildist', '965478962548', '2026-05-07', 'demo dist', 'demo city', 70, 'demo vehicle', 'BU-sr-64298', 'Test_CivilDist_contract_agreement.pdf', 1, '2500', 1, NULL, '2023-05-21 13:20:31'),
(22, 'byhutubi', '$2y$10$BEhoveB6p0YYji9C6nn0SujplKuxp6JveyxKI.l1JCLN4wYgiFud6', 'Reese Young', 'wilahyf@mailinator.com', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-24 19:04:28'),
(23, NULL, NULL, 'Taylor Mercado', 'gogozucap@mailinator.com', '681', 'Maxime quam consequa', 5, 1, 'Tyler Daniels', '68', '1988-09-18', 'Laboriosam qui ulla', 'Incidunt aliquam co', 4, 'Ut veniam ut recusa', '202', NULL, 0, NULL, NULL, NULL, '2023-05-24 19:04:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
