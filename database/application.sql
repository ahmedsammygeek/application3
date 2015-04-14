-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 05:12 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'alaa', '9f501154b7e5872e75704103a87b10317e86c5ac');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `client_id`, `product_id`, `quantity`, `date`, `price`, `bill_num`, `total`) VALUES
(1, 1, 1, 80, '2015-04-14', '1000.00', 8317, '80000.00'),
(2, 1, 1, 40, '2015-04-14', '1000.00', 14519, '40000.00'),
(3, 1, 2, 40, '2015-04-14', '1000.00', 14519, '40000.00');

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
  `bill_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id`, `product_id`, `quantity`, `price`, `supplier_id`, `time`, `bill_num`) VALUES
(1, 1, 40, '1000.00', 1, '2015-04-14', 989),
(2, 1, 40, '1000.00', 1, '2015-04-14', 424),
(3, 1, 40, '1000.00', 1, '2015-04-14', 46),
(4, 1, 40, '1000.00', 1, '2015-04-14', 344),
(5, 1, 40, '1000.00', 1, '2015-04-14', 708),
(6, 1, 40, '1000.00', 1, '2015-04-14', 346);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `phone`, `address`, `deserved`) VALUES
(1, 'zizo', 'saft torab', '01099944511', '161000.000'),
(2, 'bedo', 'gmhorya', '01201212454', '1000.000'),
(3, '3oon', '6 october', '0012121444', '1000.000');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pay_supplier`
--

INSERT INTO `pay_supplier` (`id`, `supplier_id`, `money`, `date`, `elbaky`) VALUES
(1, 1, '120000.00', '2015-04-14', '281000.00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `supplier_id`, `original_price`, `quantity`, `product_price`) VALUES
(1, 'applications', '1', '1000.000', 220, '1100.000'),
(2, 'website', '2', '1500.000', 60, '1700.000'),
(3, 'design', '3', '500.000', 100, '700.000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `address`, `phone`, `debts`) VALUES
(1, 'alaa', 'mahalla', '01000021221', '161000.00'),
(2, 'ahmed', 'mansoura', '01212542100', '1000.00'),
(3, 'amira', 'nweba3', '01201212454', '1000.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
