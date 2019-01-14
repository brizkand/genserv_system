-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 02:52 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genservp_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceiling_fan_table`
--

CREATE TABLE `ceiling_fan_table` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL DEFAULT 'CEILING CIRCULATION FAN',
  `date_released` date NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `delivery_receipt` varchar(50) NOT NULL,
  `received` int(11) DEFAULT NULL,
  `released` int(11) DEFAULT NULL,
  `employee_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ceiling_fan_table`
--

INSERT INTO `ceiling_fan_table` (`product_id`, `product_name`, `date_released`, `client_name`, `delivery_receipt`, `received`, `released`, `employee_user`) VALUES
(1, 'CEILING CIRCULATION FAN', '2016-08-05', '', '', 105, NULL, 'no records'),
(2, 'CEILING CIRCULATION FAN', '2016-08-05', 'pm sons construction', '11553', NULL, 2, 'no records'),
(3, 'CEILING CIRCULATION FAN', '2016-08-05', 'gracious group lending phil corp', '11554', NULL, 5, 'no records'),
(4, 'CEILING CIRCULATION FAN', '2016-08-05', 'fsbh corp/sir joseph', '11554', NULL, 1, 'no records'),
(5, 'CEILING CIRCULATION FAN', '2016-08-05', 'ph pacific', '11557', NULL, 2, 'no records'),
(6, 'CEILING CIRCULATION FAN', '2016-08-10', 'our lady of lourdes hospital/ engr. jorge', '11560', NULL, 5, 'no records'),
(7, 'CEILING CIRCULATION FAN', '2016-08-11', 'ms. jewel go', '11563', NULL, 1, 'BRIZKAND BEVINISHEL'),
(8, 'CEILING CIRCULATION FAN', '2016-08-16', 'meilin restaurant', '11566', NULL, 2, 'no records'),
(9, 'CEILING CIRCULATION FAN', '2016-08-16', 'ms. jewel go', '11565', NULL, 1, 'no records'),
(18, 'CEILING CIRCULATION FAN', '2016-08-16', 'tong yang corp', '11567', NULL, 1, 'no records'),
(19, 'CEILING CIRCULATION FAN', '2016-08-16', 'pm sons construction', '11568', NULL, 10, 'no records'),
(20, 'CEILING CIRCULATION FAN', '2016-09-03', 'johnson ku', '11579', NULL, 1, 'no records'),
(21, 'CEILING CIRCULATION FAN', '2016-09-07', 'peter sy', '', NULL, 1, 'no records'),
(22, 'CEILING CIRCULATION FAN', '2016-09-13', 'pm sons construction', '11581', NULL, 8, 'no records'),
(26, 'CEILING CIRCULATION FAN', '2016-09-14', 'gudlyf property corp/ jefferson tomas', '11582', NULL, 7, 'no records'),
(27, 'CEILING CIRCULATION FAN', '2016-09-15', 'pm sons construction', '11584', NULL, 2, 'no records'),
(28, 'CEILING CIRCULATION FAN', '2016-09-16', 'ian campbell', '11585', NULL, 2, 'no records'),
(29, 'CEILING CIRCULATION FAN', '2016-09-29', 'aris martila', '11594', NULL, 1, 'no records'),
(30, 'CEILING CIRCULATION FAN', '2016-10-06', 'peter sy', '', 1, NULL, 'no records'),
(31, 'CEILING CIRCULATION FAN', '2016-10-06', 'mandarin aquare', '-', NULL, 1, 'no records'),
(32, 'CEILING CIRCULATION FAN', '2016-10-05', 'nimrod diaz', '', NULL, 1, 'no records'),
(33, 'CEILING CIRCULATION FAN', '2016-10-07', 'sean tan', '11597', NULL, 1, 'no records'),
(34, 'CEILING CIRCULATION FAN', '2016-10-21', 'mark anthony chua', '11605', NULL, 1, 'no records'),
(35, 'CEILING CIRCULATION FAN', '2016-10-27', 'scopro optical co. inc', '-', NULL, 1, 'no records'),
(36, 'CEILING CIRCULATION FAN', '2016-11-04', 'madarin square', '11613', NULL, 2, 'no records'),
(37, 'CEILING CIRCULATION FAN', '2016-11-07', 'global tower', '11618', NULL, 1, 'no records'),
(38, 'CEILING CIRCULATION FAN', '2016-11-07', 'mer. wei', '11614', NULL, 1, 'no records'),
(39, 'CEILING CIRCULATION FAN', '2016-11-08', 'mer. wei', '-', NULL, 3, 'no records'),
(40, 'CEILING CIRCULATION FAN', '2016-11-08', '', '', 1, NULL, 'BRIZKAND BEVINISHEL'),
(41, 'CEILING CIRCULATION FAN', '2016-11-09', 'armadelo holdings', '-', NULL, 1, 'no records'),
(42, 'CEILING CIRCULATION FAN', '2016-11-10', 'pedro & coi', '11620', NULL, 5, 'no records'),
(43, 'CEILING CIRCULATION FAN', '2016-12-08', 'pm sons construction', '11621', NULL, 6, 'no records'),
(44, 'CEILING CIRCULATION FAN', '2016-12-13', 'songsong & periquet', '11623', NULL, 4, 'no records'),
(45, 'CEILING CIRCULATION FAN', '2016-12-13', 'scopro optical co. inc', '-', NULL, 4, 'no records'),
(46, 'CEILING CIRCULATION FAN', '2016-12-15', 'scopro optical co. inc', '11624', NULL, 11, 'no records'),
(47, 'CEILING CIRCULATION FAN', '2016-12-17', 'market place', '-', NULL, 1, 'no records'),
(48, 'CEILING CIRCULATION FAN', '2016-12-17', 'fhy - taiwan chamber party', '---', NULL, 2, 'no records'),
(50, 'CEILING CIRCULATION FAN', '2016-12-16', '-', '', 10, NULL, 'no records'),
(51, 'CEILING CIRCULATION FAN', '2017-01-18', 'pm sons construction', '11635', NULL, 6, 'no records'),
(52, 'CEILING CIRCULATION FAN', '2017-01-18', '-', '', 150, NULL, 'no records'),
(53, 'CEILING CIRCULATION FAN', '2017-01-23', 'mark anthony chua', '11637', NULL, 20, 'no records'),
(54, 'CEILING CIRCULATION FAN', '2017-02-03', 'ompong tan', '11640', NULL, 1, 'no records'),
(55, 'CEILING CIRCULATION FAN', '2017-02-16', 'momarco resort', '11644', NULL, 1, 'no records'),
(56, 'CEILING CIRCULATION FAN', '2017-02-27', 'pm sons construction', '11649', NULL, 11, 'no records'),
(57, 'CEILING CIRCULATION FAN', '2017-03-02', 'ezmll inc', '11761', NULL, 2, 'no records'),
(58, 'CEILING CIRCULATION FAN', '2017-03-06', 'alexander periquet', '11762', NULL, 6, 'no records'),
(59, 'CEILING CIRCULATION FAN', '2017-03-11', 'mario de guia', '11763', NULL, 1, 'no records'),
(60, 'CEILING CIRCULATION FAN', '2017-03-21', 'pm sons construction', '11767', NULL, 1, 'no records'),
(61, 'CEILING CIRCULATION FAN', '2017-03-23', 'pm sons construction', '11755', NULL, 2, 'no records'),
(62, 'CEILING CIRCULATION FAN', '2017-03-31', 'market place', '11756', NULL, 5, 'no records'),
(63, 'CEILING CIRCULATION FAN', '2017-04-11', 'carina cuaycong', '11776', NULL, 2, 'no records'),
(64, 'CEILING CIRCULATION FAN', '2017-04-17', 'e.s hernandez construction', '11777', NULL, 4, 'no records'),
(65, 'CEILING CIRCULATION FAN', '2017-04-24', 'pedro & coi', '11778', NULL, 16, 'no records'),
(66, 'CEILING CIRCULATION FAN', '2017-05-02', 'allan dungupon', '11781', NULL, 1, 'no records'),
(67, 'CEILING CIRCULATION FAN', '2017-05-20', 'zelid electrical & industrial supply', '11794', NULL, 11, 'no records'),
(68, 'CEILING CIRCULATION FAN', '2017-05-20', 'louie dajutoy', '11795', NULL, 1, 'no records'),
(69, 'CEILING CIRCULATION FAN', '2017-06-15', 'james ugate', '11657', NULL, 1, 'no records'),
(70, 'CEILING CIRCULATION FAN', '2017-06-29', 'songsong & periquet', '11663', NULL, 1, 'no records'),
(71, 'CEILING CIRCULATION FAN', '2017-07-13', 'elian habayeb', '11669', NULL, 1, 'no records'),
(72, 'CEILING CIRCULATION FAN', '2017-08-02', 'pm sons construction', '11672', NULL, 8, 'no records'),
(73, 'CEILING CIRCULATION FAN', '2017-08-09', 'ideal builders', '11675', NULL, 12, 'no records'),
(74, 'CEILING CIRCULATION FAN', '2017-08-09', 'ideal builders', '11676', NULL, 2, 'no records'),
(75, 'CEILING CIRCULATION FAN', '2017-08-18', 'zelid electrical & industrial supply', '11681', NULL, 10, 'no records'),
(76, 'CEILING CIRCULATION FAN', '2017-08-23', 'chris ah', '11682', NULL, 2, 'no records'),
(77, 'CEILING CIRCULATION FAN', '2017-08-23', 'mr. bulatao', '11686', NULL, 2, 'no records'),
(78, 'CEILING CIRCULATION FAN', '2017-08-25', 'sta cruz office', '----', NULL, 1, 'no records'),
(79, 'CEILING CIRCULATION FAN', '2017-08-26', 'eng bee tin deli', '11687', NULL, 6, 'no records'),
(80, 'CEILING CIRCULATION FAN', '2017-09-15', 'mr. michael lin', '11694', NULL, 2, 'no records'),
(81, 'CEILING CIRCULATION FAN', '2017-09-22', 'zelid electrical & industrial supply', '11696', NULL, 10, 'no records'),
(82, 'CEILING CIRCULATION FAN', '2017-09-25', 'pm sons construction', '11700', NULL, 4, 'no records'),
(83, 'CEILING CIRCULATION FAN', '2017-08-31', 'office use - sir joe', '------', NULL, 1, 'no records'),
(84, 'CEILING CIRCULATION FAN', '2017-09-28', '', '', 100, NULL, 'no records'),
(85, 'CEILING CIRCULATION FAN', '2017-10-04', 'alexander periquet', '11702', NULL, 6, 'no records'),
(86, 'CEILING CIRCULATION FAN', '2017-11-02', 'pm sons construction', '11712', NULL, 2, 'no records'),
(87, 'CEILING CIRCULATION FAN', '2017-11-29', 'montemar beach club', '11727', NULL, 31, 'no records'),
(88, 'CEILING CIRCULATION FAN', '2017-11-29', 'pm sons construction', '11728', NULL, 6, 'no records'),
(89, 'CEILING CIRCULATION FAN', '2017-12-06', 'zelid electrical & industrial supply', '11731', NULL, 10, 'no records'),
(90, 'CEILING CIRCULATION FAN', '2017-12-06', 'pm sons construction', '-----', NULL, 1, 'no records'),
(91, 'CEILING CIRCULATION FAN', '2017-12-06', 'alexander periquet', '11732', NULL, 8, 'no records'),
(92, 'CEILING CIRCULATION FAN', '2017-12-14', 'pm sons construction', '11734', NULL, 6, 'no records'),
(93, 'CEILING CIRCULATION FAN', '2018-01-06', 'sol cruz', '11746', NULL, 3, 'no records'),
(94, 'CEILING CIRCULATION FAN', '2018-01-26', 'pm sons construction', '11744', NULL, 3, 'no records'),
(95, 'CEILING CIRCULATION FAN', '2018-02-02', 'alexander periquet', '11853', NULL, 6, 'no records'),
(96, 'CEILING CIRCULATION FAN', '2018-02-09', 'e.s hernandez construction', '11860', NULL, 2, 'no records'),
(97, 'CEILING CIRCULATION FAN', '2018-03-16', 'foremost cagayan development and leisure corp', '11875', NULL, 1, 'no records'),
(98, 'CEILING CIRCULATION FAN', '2018-04-06', 'mrs. chien', '11878', NULL, 2, 'no records'),
(99, 'CEILING CIRCULATION FAN', '2018-04-10', 'mrs. chien', '11885', NULL, 3, 'no records'),
(100, 'CEILING CIRCULATION FAN', '2018-04-24', 'pm sons construction', '11890', NULL, 2, 'no records'),
(101, 'CEILING CIRCULATION FAN', '2018-04-25', 'pm sons construction', '11891', NULL, 3, 'no records'),
(102, 'CEILING CIRCULATION FAN', '2018-05-07', 'mrs. chien', '11898', NULL, 3, 'BRIZKAND BEVINISHEL'),
(103, 'CEILING CIRCULATION FAN', '2018-05-29', 'PM SONS CONSTRUCTION', '11907', NULL, 2, 'BRIZKAND BEVINISHEL'),
(104, 'CEILING CIRCULATION FAN', '2018-06-13', 'ZELID ELECTRICAL SUPPLY', '11915', NULL, 6, 'BRIZKAND BEVINISHEL');

-- --------------------------------------------------------

--
-- Table structure for table `emp_table`
--

CREATE TABLE `emp_table` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cstatus` varchar(25) NOT NULL,
  `cnum` varchar(25) NOT NULL,
  `eadd` varchar(50) NOT NULL,
  `nameincase` varchar(50) NOT NULL,
  `numincase` varchar(25) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `dhired` date NOT NULL,
  `empstatus` varchar(25) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pword` varchar(50) NOT NULL,
  `rpword` varchar(25) NOT NULL,
  `profile` varchar(50) DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_table`
--

INSERT INTO `emp_table` (`id`, `empid`, `fname`, `lname`, `mname`, `address`, `age`, `bdate`, `gender`, `cstatus`, `cnum`, `eadd`, `nameincase`, `numincase`, `department`, `position`, `dhired`, `empstatus`, `uname`, `pword`, `rpword`, `profile`) VALUES
(1, 44, 'KEVIN ISHMAEL', 'HOLGADO', 'GARCIA', 'POOC BALAYAN BATANGAS', 24, '1994-01-27', 'MALE', 'SINGLE', '09356950022', 'kevin@genserv-ph.com', 'SANILU HOLGADO', '1212121212888', 'IT', 'IT PERSONNEL', '2017-08-29', 'REGULAR', 'kevin@genserv-ph.com', 'password@27', 'password@27', '5b07895aee8b99.35480542.jpg'),
(3, 46, 'IVY', 'VILLENA', 'DE JESUS', 'POOC BALAYAN BATANGAS', 38, '2013-03-07', 'FEMALE', 'MARRIED', '0343243243243243', 'ivy@genserv-ph.com', 'ALVIN VILLENA', '332432432432432', 'HR', 'HR SUPERVISOR', '2018-02-27', 'REGULAR', 'ivy_villena', 'password@0', 'password@0', '5ae6a9607cc571.72759139.png'),
(37, 27, 'BRIZKAND', 'BEVINISHEL', 'KEISHEL', 'SOCIAL MEDIA ZONE CENTER', 18, '2018-04-07', 'MALE', 'SINGLE', '1234567890', 'brizkand@genserv-ph.com', 'MARK ZUCKERBERG', '7292141248122', 'IT', 'IT SUPERVISOR', '2018-04-13', 'REGULAR', 'brizkand', 'password@27', 'password@27', '5b0cb94bd79af4.88382431.png'),
(38, 49, 'CRIS ANN', 'ORLANDA', 'CAPITLE', 'PANGASINAN', 22, '1996-04-21', 'FEMALE', 'SINGLE', '09165775450', 'crisann@genserv-ph.com', 'SENY SANTOS', '123456789', 'HR', 'HR REPRESENTATIVE', '2018-01-16', 'REGULAR', 'crisann22', 'password@22', 'password@22', '5aea9bcd416fa1.21665609.png'),
(63, 1, 'TEST ONE', 'TEST ONE', 'TEST ONE', 'TEST ONE', 25, '1993-01-28', 'MALE', 'SINGLE', '0123456987', 'testone@yahoo.com', 'TEST ONE', '0124536978', 'OTHERS', 'DRIVER', '2018-06-08', 'TRAINEE', 'testonetestone', 'testonetestone', 'testonetestone', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `gsat_cards_table`
--

CREATE TABLE `gsat_cards_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `po_no` varchar(50) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `card_no` int(8) UNSIGNED ZEROFILL NOT NULL,
  `box_no` varchar(50) NOT NULL,
  `clients_name` varchar(50) NOT NULL,
  `date_get` date NOT NULL,
  `date_released` date NOT NULL,
  `date_loaded` date NOT NULL,
  `card_package` varchar(50) NOT NULL,
  `request_by` varchar(50) NOT NULL,
  `emp_user` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gsat_cards_table`
--

INSERT INTO `gsat_cards_table` (`id`, `po_no`, `reference_no`, `card_no`, `box_no`, `clients_name`, `date_get`, `date_released`, `date_loaded`, `card_package`, `request_by`, `emp_user`, `time_stamp`) VALUES
(6, '12345678', '12345678', 01234567, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:38'),
(7, '12345678', '12345678', 01234568, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:38'),
(8, '12345678', '12345678', 01234569, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:38'),
(9, '12345678', '12345678', 01234570, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(10, '12345678', '12345678', 01234571, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(11, '12345678', '12345678', 01234572, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(12, '12345678', '12345678', 01234573, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(13, '12345678', '12345678', 01234574, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(14, '12345678', '12345678', 01234575, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(15, '12345678', '12345678', 01234578, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39'),
(16, '12345678', '12345678', 01234579, '', '', '2018-07-05', '0000-00-00', '0000-00-00', 'PACKAGE 500', '', 'BRIZKAND BEVINISHEL', '2018-07-05 08:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `gsat_clients_table`
--

CREATE TABLE `gsat_clients_table` (
  `id` int(11) NOT NULL,
  `so_no` int(11) NOT NULL,
  `date_installed` date NOT NULL,
  `clients_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `box_no` varchar(50) NOT NULL,
  `subscription` varchar(50) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `date_loaded` date NOT NULL,
  `card_no` varchar(25) NOT NULL,
  `expiration_date` date NOT NULL,
  `advance` int(11) NOT NULL,
  `customer_of` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `technician` varchar(50) NOT NULL,
  `emp_user` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gsat_clients_table`
--

INSERT INTO `gsat_clients_table` (`id`, `so_no`, `date_installed`, `clients_name`, `address`, `contact_no`, `email`, `box_no`, `subscription`, `quantity`, `date_loaded`, `card_no`, `expiration_date`, `advance`, `customer_of`, `remarks`, `status`, `technician`, `emp_user`, `time_stamp`) VALUES
(1, 1, '2017-09-22', 'LEONARD SO', '929 ELCANO ST. TONDO MANILA', '244-4470', '', '7 7405 37 10118437 3', 'PACKAGE 500', 1, '2017-09-22', '', '2017-10-22', 0, 'SANTA CRUZ MANILA', '', 'ACTIVE', '', 'BRIZKAND BEVINISHEL', '2018-06-08 07:01:06'),
(6, 2, '2018-05-02', 'TEST TWO', 'TEST TWO', '222222', 'TESTTWO@yahoo.com', '222222222', 'PACKAGE 99', 2, '2018-05-02', '', '2018-06-02', 2, 'HEAD OFFICE', '2', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 05:02:02'),
(7, 3, '2018-05-03', 'THREE', 'THREE', '3333', 'THREE@yahoo.com', '3333333', 'PACKAGE 200', 3, '2018-05-03', '', '2018-06-03', 3, 'SANTA CRUZ MANILA', '3', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:06:49'),
(8, 4, '2018-05-04', 'FOUR', 'FOUR', '4', 'FOUR@yahoo.com', '4444', 'PACKAGE 300', 4, '2018-05-04', '', '2018-07-04', 4, 'HEAD OFFICE', '4', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:07:49'),
(9, 5, '2018-05-05', 'FIVE', 'FIVE', '55555', '', '55555', 'PACKAGE 500', 5, '2018-05-05', '', '2018-06-05', 5, 'HEAD OFFICE', '555', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:08:43'),
(10, 6, '2018-05-06', 'TEST SIX', 'TEST SIX', '666666666', '', '6666666', 'PACKAGE 500', 6, '2018-05-06', '', '2018-06-06', 6, 'SANTA CRUZ MANILA', 'TEST SIX', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:15:22'),
(11, 7, '2018-05-07', 'TEST SEVEN', 'TEST SEVEN', '7777777', 'TESTSEVEN@yahoo.com', '77777777', 'PACKAGE 200', 7, '2018-05-07', '', '2018-06-07', 7, 'HEAD OFFICE', 'SFSDFSDF', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:20:28'),
(12, 8, '2018-05-08', 'TEST EIGHT', 'TEST EIGHT', '88888888888', 'TESTEIGHT@yahoo.com', '888888', 'PACKAGE 500', 8, '2018-05-08', '', '2018-06-08', 8, 'SANTA CRUZ MANILA', 'TGTRSTE', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:21:45'),
(13, 9, '2018-05-09', 'TEST NINE', 'TEST NINE', '999999999', 'testnine@yahoo.com', '999999', 'PACKAGE 99', 9, '2018-05-09', '', '2018-06-09', 9, 'HEAD OFFICE', 'SGFHJGHJ', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:22:41'),
(14, 10, '2018-05-10', 'TEST TEN', 'TEST TEN', '101011001101010', 'TESTTEN@yahoo.com', '1010101010', 'PACKAGE 200', 10, '2018-05-10', '', '2018-06-10', 10, 'HEAD OFFICE', 'MJNHGSDS', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:24:28'),
(15, 11, '2018-05-11', 'TEST ELEVEN', 'TEST ELEVEN', '11111111', 'TESTELEVEN@yahoo.com', '111-1-1-1-1-1', 'PACKAGE 300', 11, '2018-05-11', '', '2018-06-11', 11, 'SANTA CRUZ MANILA', 'GFDGDSFG', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:27:06'),
(16, 12, '2018-05-12', 'TEST TWELEVE', 'TEST TWELEVE', '1212121212121212', 'TESTTWELEVE@yahoo.com', '12-12-12-12-12', 'PACKAGE 300', 12, '2018-05-12', '', '2018-06-12', 12, 'HEAD OFFICE', 'FDSFGDSFDSF', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:28:16'),
(17, 13, '2018-05-13', 'TEST THIRTEEN', 'TEST THIRTEEN', '1313131313131', 'TESTTHIRTEEN@yahoo.com', '1313131-13-13-13-13', 'PACKAGE 99', 13, '2018-05-13', '', '2018-06-13', 2, 'SANTA CRUZ MANILA', 'HFDHFDGDFGFD', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:29:51'),
(18, 14, '2018-05-14', 'TEST FOURTEEN', 'TEST FOURTEEN', '1414141414', 'fourteen@gmail.com', '14-14-14-14-14', 'PACKAGE 300', 1, '2018-05-14', '', '2018-06-14', 2, 'HEAD OFFICE', 'DFGDFGDFG', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:32:04'),
(19, 15, '2018-06-15', 'TEST FIFTHTEEN', 'TEST FIFTHTEEN', '151515151', 'TESTFIFTHTEEN@yahoo.com', '15-15-15-15-15', 'PACKAGE 200', 1, '2018-05-15', '', '2018-07-15', 1, 'HEAD OFFICE', 'FGFG', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:33:45'),
(20, 16, '2018-06-16', 'TEST SIXTEEN', 'TEST SIXTEEN', '1616161616', 'TESTSIXTEEN@yahoo.com', '16-16-16-16-16', 'PACKAGE 500', 1, '2018-05-16', '', '2018-06-16', 1, 'SANTA CRUZ MANILA', 'SDFASFFASF', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:34:54'),
(21, 17, '2018-05-17', 'TEST SEVENTEEN', 'TEST SEVENTEEN', '1717171717', 'TESTSEVENTEEN@yahoo.com', '1717171717', 'PACKAGE 500', 1, '2018-05-17', '', '2018-06-17', 1, 'HEAD OFFICE', 'FGDFSAGGDSFG', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:35:57'),
(22, 18, '2018-05-18', 'TEST EIGHTEEN', 'TEST EIGHTEEN', '1818181881', 'TESTEIGHTEEN@yahoo.com', '18-18-18-18-18', 'PACKAGE 500', 1, '2018-05-18', '', '2018-06-18', 1, 'HEAD OFFICE', 'GSDGSAFSFSF', 'NOT ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-14 06:41:13'),
(23, 19, '2018-05-19', 'TEST NINETEEN', 'TEST NINETEEN', '191911991', 'TESTNINETEEN@yahoo.com', '19-19-19-19-19-19', 'PACKAGE 500', 1, '2018-05-19', '', '2018-06-19', 2, 'HEAD OFFICE', 'GSDFSDFSDFF', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:37:59'),
(24, 20, '2018-04-20', 'TEST TWENTY', 'TEST TWENTY', '2020220022020', 'TESTTWENTY@gmail.com', '20-20-2020-20', 'PACKAGE 300', 1, '2018-05-20', '', '2018-06-20', 2, 'HEAD OFFICE', 'FGFGFDGFDGDFGDG', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:39:22'),
(25, 21, '2018-05-21', 'TEST TWENTY ONE', 'TEST TWENTY ONE', '21212121212121', 'TESTTWENTYONE@yahoo.com', '21-21-21-21-21-21', 'PACKAGE 500', 1, '2018-05-21', '', '2018-06-21', 1, 'HEAD OFFICE', 'OLKJHGFD', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:40:18'),
(26, 22, '2018-05-22', 'TEST TWENTY TWO', 'TEST TWENTY TWO', '2222222222', 'TESTTWENTYTWO@yahoo.com', '22-22-22-22-22-22', 'PACKAGE 200', 1, '2018-05-22', '', '2018-06-22', 3, 'SANTA CRUZ MANILA', 'HFDGGDFGDSG', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:41:24'),
(27, 23, '2018-05-23', 'TEST TWENTY THREE', 'TEST TWENTY THREE', '2322323232323', 'TESTTWENTYTHREE@yahoo.com', '23-23-23-23-23-23-23-23-23-23', 'PACKAGE 300', 1, '2018-05-23', '', '2018-06-23', 0, 'HEAD OFFICE', 'DSFGSDFSF', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:43:41'),
(28, 24, '2018-05-24', 'TEST TWENTY FOUR', 'TEST TWENTY FOUR', '242424242424', 'TESTTWENTYFOUR@yahoo.com', '24-24-24-24-24-24-24', 'PACKAGE 99', 1, '2018-05-24', '', '2018-06-24', 4, 'SANTA CRUZ MANILA', 'SFFFQQER43RFSDFR', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:45:05'),
(29, 25, '2018-05-25', 'TEST TWENTY FIVE', 'TEST TWENTY FIVE', '252525252525', 'TESTTWENTYFIVE@yahoo.com', '25-25-25-25-25-25-25-25', 'PACKAGE 500', 1, '2018-05-25', '', '2018-06-25', 1, 'HEAD OFFICE', 'FSGGFSDGHFDFDG', 'NOT ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-14 06:41:49'),
(30, 26, '2018-05-26', 'A TEST TWENTY SIX', 'A TEST TWENTY SIX', '26', 'ATESTTWENTYSIX@yahoo.com', '26-26-26-26-26-26', 'PACKAGE 300', 1, '2018-05-26', '', '2018-06-26', 4, 'HEAD OFFICE', 'HFDGGFWERFTWGSDF', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:48:40'),
(31, 27, '2018-05-27', 'B TEST TWENTY SEVEN', 'B TEST TWENTY SEVEN', '27', 'BTESTTWENTYSEVEN@yahoo.com', '27-27-2727-27-272-7-2', 'PACKAGE 500', 1, '2018-05-27', '', '2018-06-27', 2, 'SANTA CRUZ MANILA', 'HGFDSDFDSFDS SDFSDFSF', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:49:58'),
(32, 28, '2018-05-28', 'C TEST TWENTY EIGHT', 'C TEST TWENTY EIGHT', '282828282', 'CTESTTWENTYEIGHT@yahoo.com', '282822-282828282', 'PACKAGE 500', 1, '2018-05-28', '', '2018-06-28', 11, 'HEAD OFFICE', 'SDFDSFDF', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:51:10'),
(33, 29, '2018-05-29', 'D TEST TWENTY NINE', 'D TEST TWENTY NINE', '2929292', 'DTESTTWENTYNINE@yahoo.com', '292929292', 'PACKAGE 300', 1, '2018-05-29', '', '2018-06-29', 0, 'SANTA CRUZ MANILA', 'SDFGSDGDSGDSG', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:52:12'),
(34, 30, '2018-05-30', 'E TEST THIRTY', 'E TEST THIRTY', '303030330303030', 'ETESTTHIRTY@yahoo.com', '30-30-30-30', 'PACKAGE 200', 1, '2018-05-30', '', '2018-06-30', 12, 'HEAD OFFICE', 'FGDSFDSFSDFSD SDFGDS SDAGS', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-13 06:53:36'),
(35, 31, '2018-05-31', 'F TEST THIRTY ONE', 'F TEST THIRTY ONE', '31313131331', 'FTESTTHIRTYONE@yahoo.com', '31-31-13-31-13131-31-3', 'PACKAGE 99', 1, '2018-05-31', '', '2018-07-01', 1, 'HEAD OFFICE', 'SDFSDFSDFSD FSDF SDFSF SF', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:55:42'),
(36, 32, '2018-06-01', 'TEST THIRTY TWO', 'TEST THIRTY TWO', '3232232323232', 'TESTTHIRTYTWO@gmail.com', '32-32-32-32', 'PACKAGE 300', 1, '2018-06-01', '', '2018-07-01', 0, 'HEAD OFFICE', 'GSDF FSDFDSFS SDAFDSF', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 06:57:21'),
(37, 33, '2018-04-29', 'QWERTY', 'QWERTY', '123456', 'QWERTY@yahoo.com', '3333-3333', 'PACKAGE 200', 1, '2018-04-29', '', '2018-05-29', 1, 'HEAD OFFICE', 'FDSFDSFD', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 07:29:10'),
(38, 34, '2018-04-30', 'ASDFGHJKL', 'ASDFGHJHKL', '9876543', 'ASDF@yahoo.com', '5552432131', 'PACKAGE 500', 1, '2018-04-30', '', '2018-05-30', 1, 'HEAD OFFICE', 'FDSFDSFD', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-13 08:13:25'),
(39, 35, '2018-06-14', 'FFFFSSFDASAS', 'HAGASDGSDAFGS', '124213213', '', '43434324', 'PACKAGE 500', 1, '2018-06-14', '', '2018-07-14', 0, 'SANTA CRUZ MANILA', 'GERFWEFWE', 'ACTIVE', 'EDGAR TOMAS ENERIO', 'BRIZKAND BEVINISHEL', '2018-06-14 08:53:26'),
(40, 36, '2018-06-15', 'GFGFDGDGD', 'DFGFDGDGDSG', '234234234234', '', '1313131-124234', 'PACKAGE 300', 3, '2018-06-15', '', '2018-07-15', 12, 'HEAD OFFICE', 'R2RR', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-14 08:28:30'),
(41, 37, '2018-06-18', 'FSDFD', 'GFGFGFGFG', '234234', '', '442342342', 'PACKAGE 99', 0, '2018-06-18', '2323234234', '2018-07-18', 0, 'HEAD OFFICE', '', 'ACTIVE', 'RONIE GRABRIEL', 'BRIZKAND BEVINISHEL', '2018-06-18 06:11:23'),
(45, 38, '2018-06-20', 'FSDFSDFSDFSF', 'SFSDFSDFSFF', '13213213123', '', '1212121312', 'PACKAGE 500', 0, '2018-06-20', '124324324324', '2018-07-20', 1, 'SANTA CRUZ MANILA', '24234324324', 'ACTIVE', 'DENNIS DEL ROSARIO', 'BRIZKAND BEVINISHEL', '2018-06-20 03:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `gsat_table`
--

CREATE TABLE `gsat_table` (
  `id` int(11) NOT NULL,
  `delivery_receipt` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `client` varchar(50) NOT NULL,
  `incoming` int(11) DEFAULT NULL,
  `outgoing` int(11) DEFAULT NULL,
  `total_released` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL DEFAULT 'GSat Direct TV'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gsat_table`
--

INSERT INTO `gsat_table` (`id`, `delivery_receipt`, `date`, `client`, `incoming`, `outgoing`, `total_released`, `balance`, `product_name`) VALUES
(5, '', '2018-03-05', 'omar macabinta', NULL, 1, 138, 43, 'GSat Direct TV'),
(1, 'A123456', '2018-03-03', 'kian seng', NULL, 1, 134, 27, 'GSat Direct TV'),
(2, 'B123456', '2018-03-03', 'chan leungka', NULL, 1, 135, 26, 'GSat Direct TV'),
(3, 'C123456', '2018-03-03', 'andres chua', NULL, 2, 137, 24, 'GSat Direct TV'),
(4, 'D123456', '2018-03-05', 'gsat delivery ', 20, NULL, 137, 44, 'GSat Direct TV'),
(6, 'E123456', '2018-03-09', 'edward ng', NULL, 1, 139, 42, 'GSat Direct TV'),
(7, 'F123456', '2018-03-09', 'eric jun porca', NULL, 1, 140, 41, 'GSat Direct TV'),
(8, 'G123456', '2018-05-02', 'juday jensen', 3, NULL, 140, 44, 'GSat Direct TV'),
(9, 'H66352', '2018-05-03', 'cris-ann', 30, NULL, 140, 74, 'GSat Direct TV'),
(10, 'H8327327', '2018-05-03', 'kkk', 5, NULL, 140, 79, 'GSat Direct TV');

-- --------------------------------------------------------

--
-- Table structure for table `leave_table`
--

CREATE TABLE `leave_table` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `position` varchar(25) NOT NULL,
  `date_filed` date NOT NULL,
  `reason` varchar(35) NOT NULL,
  `reason_text` longtext NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'PENDING',
  `payment` varchar(25) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`id`, `empid`, `full_name`, `position`, `date_filed`, `reason`, `reason_text`, `date_from`, `date_to`, `status`, `payment`) VALUES
(29, 27, 'BRIZKAND BEVINISHEL', 'IT SUPERVISOR', '2018-06-07', 'SICK LEAVE', 'I WILL GO TO MARS!', '2018-06-07', '2018-06-09', 'DISAPPROVED', 'NOT PAID'),
(30, 27, 'BRIZKAND BEVINISHEL', 'IT SUPERVISOR', '2018-06-07', 'VACATION LEAVE', 'I WILL GO TO KOREA!', '2018-06-12', '2018-06-13', 'APPROVED', 'PAID'),
(31, 49, 'CRIS ANN ORLANDA', 'HR REPRESENTATIVE', '2018-06-09', 'VACATION LEAVE', 'GO TO HONGKONG', '2018-06-30', '2018-07-01', 'PENDING', 'PENDING'),
(32, 27, 'BRIZKAND BEVINISHEL', 'IT SUPERVISOR', '2018-07-11', 'VACATION LEAVE', 'DSFDSF', '2018-07-11', '2018-07-12', 'PENDING', 'PENDING'),
(33, 27, 'BRIZKAND BEVINISHEL', 'IT SUPERVISOR', '2018-09-14', 'SICK LEAVE', 'UJFVGJH', '2018-09-15', '2018-09-17', 'PENDING', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `operation_request_card_table`
--

CREATE TABLE `operation_request_card_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `request_date` date NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `released_date` date NOT NULL,
  `request_name` varchar(50) NOT NULL,
  `request_card_type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `employee_user` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation_request_card_table`
--

INSERT INTO `operation_request_card_table` (`id`, `request_date`, `request_quantity`, `released_date`, `request_name`, `request_card_type`, `status`, `employee_user`, `time_stamp`) VALUES
(15, '2018-06-28', 0, '0000-00-00', 'TEST ONE', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-06-28 03:49:30'),
(16, '2018-06-28', 0, '0000-00-00', 'TEST TWO', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-06-28 04:54:49'),
(17, '2018-06-28', 0, '0000-00-00', 'QWERTY', 'PACKAGE 300', 0, 'BRIZKAND BEVINISHEL', '2018-06-28 07:49:47'),
(18, '2018-06-28', 0, '0000-00-00', 'QWERT', 'PACKAGE 200', 0, 'BRIZKAND BEVINISHEL', '2018-06-28 07:49:55'),
(19, '2018-06-28', 0, '0000-00-00', 'QWE', 'PACKAGE 99', 0, 'BRIZKAND BEVINISHEL', '2018-06-28 07:50:02'),
(20, '2018-06-30', 0, '0000-00-00', 'ASDF', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 01:51:15'),
(21, '2018-06-30', 0, '0000-00-00', 'QWERTY', 'PACKAGE 300', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 02:10:26'),
(22, '2018-06-30', 0, '0000-00-00', 'QWERTY', 'PACKAGE 200', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 02:10:35'),
(23, '2018-06-30', 0, '0000-00-00', 'QWERTY', 'PACKAGE 99', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 02:10:45'),
(24, '2018-06-30', 0, '0000-00-00', 'WALA TO', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 03:10:24'),
(25, '2018-06-30', 0, '0000-00-00', 'FDDSFSDFDSF', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 05:57:58'),
(26, '2018-06-30', 0, '0000-00-00', 'FDSFSDF', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 06:13:55'),
(27, '2018-06-30', 0, '0000-00-00', 'FSDFDSFSDFSFFD', 'PACKAGE 300', 0, 'BRIZKAND BEVINISHEL', '2018-06-30 06:50:58'),
(28, '2018-07-02', 0, '0000-00-00', 'TEST ONE', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-02 06:41:13'),
(29, '2018-07-02', 0, '0000-00-00', 'FRANKIE', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-02 08:15:07'),
(31, '2018-07-03', 0, '0000-00-00', 'FRANKIE', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-03 03:27:33'),
(32, '2018-07-04', 0, '0000-00-00', 'IVY', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-04 03:22:53'),
(33, '2018-07-04', 0, '0000-00-00', 'LESLY', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-04 03:36:04'),
(36, '2018-07-05', 0, '0000-00-00', 'CHUA LIN', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-05 01:33:34'),
(37, '2018-07-05', 0, '0000-00-00', 'TI TIU', 'PACKAGE 500', 0, 'BRIZKAND BEVINISHEL', '2018-07-05 01:37:06'),
(41, '2018-07-06', 5, '0000-00-00', '', 'PACKAGE 500', 1, 'BRIZKAND BEVINISHEL', '2018-07-06 03:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `summary_of_purchases_table`
--

CREATE TABLE `summary_of_purchases_table` (
  `id` int(11) NOT NULL,
  `date_purchased` date NOT NULL,
  `purchase_order` varchar(25) NOT NULL,
  `mrr_number` varchar(25) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `tin_number` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `payment` decimal(11,2) NOT NULL,
  `month_now` varchar(25) NOT NULL,
  `po_number_auto` int(11) NOT NULL,
  `year` varchar(25) NOT NULL,
  `date_received` date DEFAULT NULL,
  `employee_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summary_of_purchases_table`
--

INSERT INTO `summary_of_purchases_table` (`id`, `date_purchased`, `purchase_order`, `mrr_number`, `vendor`, `tin_number`, `address`, `description`, `quantity`, `rate`, `amount`, `payment`, `month_now`, `po_number_auto`, `year`, `date_received`, `employee_user`) VALUES
(3, '2018-04-01', '0418-0030', '1804-0063', 'amity satellite system inc', '001-095-322-000', '2300 leon guinto st., malate, manila', 'vinnersat fixed modulator ch. 22', 1, '7000.00', '7000.00', '7000.00', '04', 63, '2018', NULL, ''),
(1, '2018-04-03', '0418-0028', '1804-0064', 'ph pacific international trade corp', '007-992-090-000', '1711 l.m. guerrero cor. malvar st. brgy 697, malate, manila', 'gsat prepaidcard 500', 70, '435.00', '30450.00', '30450.00', '04', 64, '2018', NULL, ''),
(2, '2018-04-17', '0418-0029', '1804-0065', 'delta star power manufacturing corp', '004-833-813-0000', '1613 samuel st. jordan planes, vocaliches proper, quezon city', '15 kva dry type transformer aluminum', 1, '33000.00', '33000.00', '33000.00', '04', 65, '2018', NULL, ''),
(4, '2018-04-08', '0418-0031', '1804-0066', 'merriam webster bookstore', '004-568-826-001', 'pasong tamo cor. pasay road makati', 'various supplies', 0, '4922.50', '4922.50', '4922.50', '04', 66, '2018', NULL, ''),
(5, '2018-04-09', '0418-0032', '1804-0067', 'ph pacific international trade corp', '007-992-090-000', '11 l.m. guerero cor. malvar st. brgy 697, malate manila', 'gsat preapaid card 500', 85, '435.00', '36975.00', '36975.00', '04', 67, '2018', NULL, ''),
(6, '2018-04-09', '0418-0032', '1804-0068', 'ph pacific international trade corp', '007-992-090-000', '11 l.m. guerero cor. malvar st. brgy 697, malate manila', 'gsat prepaid card 200', 5, '174.00', '870.00', '870.00', '04', 68, '2018', NULL, ''),
(7, '2018-04-10', '0418-0033', '1804-0069', 'ph pacific international trade corp', '007-992-090-000', '11 l.m. guerero cor. malvar st. brgy 697, malate manila', 'gsat preapaid card 300', 5, '261.00', '1305.00', '1305.00', '04', 69, '2018', NULL, ''),
(8, '2018-05-15', '0518-0034', '1805-0070', 'qwertyuiop', '1234567890', 'asdf', 'zxcv', 1, '100.00', '100.00', '100.00', '05', 70, '2018', '2018-05-17', ''),
(16, '2018-05-30', '0518-0035', '1805-0071', 'ASDFSDFDSF', '2321321321', 'SADFDSFDSF', 'SDFSDFDSF', 2, '22.00', '22.00', '22.00', '05', 71, '2018', '2018-05-30', 'brizkand bevinishel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceiling_fan_table`
--
ALTER TABLE `ceiling_fan_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `emp_table`
--
ALTER TABLE `emp_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empid` (`empid`);

--
-- Indexes for table `gsat_cards_table`
--
ALTER TABLE `gsat_cards_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `gsat_clients_table`
--
ALTER TABLE `gsat_clients_table`
  ADD PRIMARY KEY (`so_no`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `gsat_table`
--
ALTER TABLE `gsat_table`
  ADD PRIMARY KEY (`delivery_receipt`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `leave_table`
--
ALTER TABLE `leave_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `operation_request_card_table`
--
ALTER TABLE `operation_request_card_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `summary_of_purchases_table`
--
ALTER TABLE `summary_of_purchases_table`
  ADD PRIMARY KEY (`mrr_number`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceiling_fan_table`
--
ALTER TABLE `ceiling_fan_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `emp_table`
--
ALTER TABLE `emp_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `gsat_cards_table`
--
ALTER TABLE `gsat_cards_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gsat_clients_table`
--
ALTER TABLE `gsat_clients_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gsat_table`
--
ALTER TABLE `gsat_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_table`
--
ALTER TABLE `leave_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `operation_request_card_table`
--
ALTER TABLE `operation_request_card_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `summary_of_purchases_table`
--
ALTER TABLE `summary_of_purchases_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
