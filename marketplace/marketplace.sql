-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2021 at 10:40 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productsID` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(150) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(75) NOT NULL,
  `sellersID` int(6) NOT NULL,
  PRIMARY KEY (`productsID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productsID`, `pname`, `price`, `description`, `image`, `sellersID`) VALUES
(2, 'Another Test', '1000', 'Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information', '7036924597.png', 1),
(3, 'Third Testings', '10000', 'Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information Test product information', '9522559884.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `sellersID` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(75) NOT NULL,
  `datereg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sellersID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sellersID`, `name`, `phone`, `email`, `password`, `datereg`) VALUES
(1, 'Amos Alade', '08037484058', 'amos.alade@yahoo.com', 'b141d3946dfd33d9efb509b8513937df', '2021-07-17 10:38:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
