-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2015 at 03:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(3, 'alaa', '9f501154b7e5872e75704103a87b10317e86c5ac'),
(5, 'Ø¹Ù„Ø§Ø¡', '80e9daaabc8dee9b4b51ee78c6f269032125950c'),
(6, 'amira', '7702eed698fe0c88fa00819ff05bfb5f910b441e');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `bill_num` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `client_id`, `product_id`, `quantity`, `date`, `price`, `bill_num`, `total`) VALUES
(33, 16, 8, 100, '2015-09-04', '1.00', 1, '100.00'),
(34, 16, 9, 100, '2015-09-04', '2.00', 1, '200.00'),
(35, 16, 11, 100, '2015-09-04', '3.00', 1, '300.00'),
(36, 16, 8, 100, '2015-09-04', '1.00', 2, '100.00'),
(37, 16, 9, 100, '2015-09-04', '2.00', 2, '200.00'),
(38, 16, 11, 100, '2015-09-04', '3.00', 2, '300.00'),
(39, 16, 8, 100, '2015-09-04', '1.00', 2, '100.00'),
(40, 16, 9, 100, '2015-09-04', '2.00', 2, '200.00'),
(41, 16, 11, 100, '2015-09-04', '3.00', 2, '300.00'),
(42, 16, 8, 100, '2015-09-04', '1.00', 2, '100.00'),
(43, 16, 8, 100, '2015-09-04', '1.00', 2, '100.00'),
(44, 16, 8, 100, '2015-09-04', '1.00', 2, '100.00'),
(45, 16, 8, 100, '2015-09-04', '1.00', 2, '100.00'),
(46, 16, 9, 100, '2015-09-04', '2.00', 2, '200.00'),
(47, 16, 11, 100, '2015-09-04', '3.00', 2, '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE IF NOT EXISTS `bill_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id`, `product_id`, `quantity`, `price`, `supplier_id`, `time`) VALUES
(46, 35, 100, '3.00', 13, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `deserved` decimal(10,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `phone`, `address`, `deserved`) VALUES
(16, 'Ø§Ø­Ù…Ø¯ Ø³Ø§Ù…ÙŠ', 'Ø·Ù„Ø®Ø§', '01091215411', '-2100.000'),
(17, 'Ø§ÙŠÙ‡ Ù…ØµØ·ÙÙ‰', 'Ù…Ø´ Ø¹Ø§Ø±Ù Ø§ÙŠÙ‡', '0121111421', '500.000'),
(18, 'Ø¹Ø¨Ø¯ Ø§Ù„ÙØªØ§Ø­ Ø§Ø³Ù…Ø§Ø¹ÙŠÙ„', 'Ù„Ø¬Ù…Ù‡ÙˆØ±ÙŠØ© ', '0012121444', '60.000');

-- --------------------------------------------------------

--
-- Table structure for table `pay_client`
--

CREATE TABLE IF NOT EXISTS `pay_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `elbaky` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `pay_client`
--

INSERT INTO `pay_client` (`id`, `client_id`, `money`, `date`, `elbaky`) VALUES
(25, 16, '100.00', '1212-12-12', '-2000.00'),
(27, 18, '100.00', '1515-12-15', '160.00'),
(28, 17, '100.00', '2222-02-22', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `pay_supplier`
--

CREATE TABLE IF NOT EXISTS `pay_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `elbaky` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `supplier_id` text NOT NULL,
  `original_price` decimal(10,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` decimal(10,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `supplier_id`, `original_price`, `quantity`, `product_price`) VALUES
(35, 'Ø³Ø±Ù†Ø¬Ø©', '13', '3.000', 150, '1.200'),
(36, 'Ø³Ø±Ù†Ø¬Ø©1', '14', '1.500', 100, '1.600');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `debts` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `address`, `phone`, `debts`) VALUES
(13, 'Ø¹Ù„Ø§Ø¡ Ø§Ù„Ø¬Ù†Ø¯ÙŠ', 'Ø§Ù„Ù…Ø­Ù„Ù‡', '01212542100', '-104.00'),
(14, 'Ø§Ù…ÙŠØ±Ù‡ Ø¹Ø§Ø¯Ù„', 'Ù†ÙˆÙŠØ¨Ø¹', '0101212544', '1780.75'),
(15, 'Ø²ÙŠØ§Ø¯ Ø§Ù„Ø´Ø§Ø¨ÙˆØ±Ù‰', 'ØµÙØ·', '01400114545', '1000.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
