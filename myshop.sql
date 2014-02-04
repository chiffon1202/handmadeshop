-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2013 at 04:22 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshop`
--
CREATE DATABASE IF NOT EXISTS `myshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `myshop`;

-- --------------------------------------------------------

--
-- Table structure for table `gods`
--

CREATE TABLE IF NOT EXISTS `gods` (
  `ID_gods` int(50) NOT NULL AUTO_INCREMENT,
  `Name_gods` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(100) NOT NULL,
  `Time` datetime NOT NULL,
  `Note` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_gods`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gods`
--

INSERT INTO `gods` (`ID_gods`, `Name_gods`, `Price`, `Time`, `Note`) VALUES
(1, 'Dolly', 35, '2013-11-30 00:00:00', 'Bup be duoc lam tu vai va day nilon voi nhieu mau sac da dang, tuoi tre va dang yeu, rat thich hop cho cac ban gai,xung dang la mon qua trong cac dip sinh nhat hoi he'),
(2, 'Chain', 10, '2013-11-30 00:00:00', 'Our products are made from fabric with pretty colors, high durability are suitable as gifts for girlfriends'),
(3, 'Ring', 20, '2013-11-30 00:00:00', 'Our products are made from fabric with pretty colors, high durability are suitable as gifts for girlfriends'),
(4, 'Pillow', 15, '2013-11-30 00:00:00', 'Our products are made from fabric with pretty colors, high durability are suitable as gifts for girlfriends'),
(6, 'Bag2', 70, '2013-12-17 00:00:00', 'Tui sach co lon duoc lam tu chat lieu soi tong hop rat tien loi cho nhung buoi di choi da ngoai. Dac biet dang co chuong trinh giam gia toi 30% cho mat hang nay'),
(7, 'Bag1', 60, '2013-12-17 00:00:00', 'Tui vai voi kick thuoc vua va nho, mau sac tuoi tre, phu hop voi nhieu loai trang phuc mua he va thu cho cac ban nu');

-- --------------------------------------------------------

--
-- Table structure for table `gods_in_order`
--

CREATE TABLE IF NOT EXISTS `gods_in_order` (
  `ID_note` int(50) NOT NULL AUTO_INCREMENT,
  `ID_gods` int(50) NOT NULL,
  `ID_order` int(50) NOT NULL,
  `Amount` int(100) NOT NULL,
  PRIMARY KEY (`ID_note`),
  UNIQUE KEY `ID_gods` (`ID_gods`,`ID_order`,`Amount`),
  KEY `ID_order` (`ID_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `gods_in_order`
--

INSERT INTO `gods_in_order` (`ID_note`, `ID_gods`, `ID_order`, `Amount`) VALUES
(23, 4, 3, 1),
(24, 6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID_order` int(50) NOT NULL AUTO_INCREMENT,
  `Date_Time` datetime NOT NULL,
  `Fullname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID_order`, `Date_Time`, `Fullname`, `Email`, `Tel`) VALUES
(1, '2013-12-15 22:27:22', 'Pham Manh', 'chiffon1202@gmail.com', '9528879256'),
(2, '2013-12-15 23:11:55', 'Cherry Chip', 'cherrychip@gmail.com', ''),
(4, '2013-12-16 04:40:04', 'Tieu Ly', 'tieuly@mail.ru', '0973656207');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
