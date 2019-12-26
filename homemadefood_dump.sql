-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 03:11 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homemadefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cust_id` int(2) NOT NULL,
  `item_id` int(2) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` int(8) NOT NULL,
  `item_quantity` int(8) NOT NULL,
  `total_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(3) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Mayur Vihar'),
(2, 'Kausambhi'),
(3, 'Indirapuram'),
(4, 'Noida Sector 15'),
(5, 'Vaishali'),
(6, 'Pitampura'),
(7, 'Noida Sector 62'),
(8, 'Karkarduma');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `cuisine_id` int(2) NOT NULL,
  `cuisine_name` varchar(50) NOT NULL,
  `cuisine_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`cuisine_id`, `cuisine_name`, `cuisine_image`) VALUES
(1, 'Sweets', 'gulab.jpg'),
(2, 'Marathi Thali', 'marathi thali.jpg'),
(3, 'Punjabi Thali', 'punjabi thali.jpg'),
(4, 'Kashmiri Thali', 'kashmiri thali.jpg'),
(5, 'North Indian Thali', 'north indian thali.jpg'),
(6, 'South Indian Thali', 'south indian thali.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(2) NOT NULL,
  `cust_fname` varchar(60) NOT NULL,
  `cust_lname` varchar(60) NOT NULL,
  `cust_email` text NOT NULL,
  `cust_phone` int(15) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cust_phone`, `cust_address`, `cust_pwd`) VALUES
(0, 'Tripti', 'Shukla', 'triptishukla@gmail.com', 2147483647, 'A-10, Kausambhi, Ghaziabad', 'e10adc3949ba59abbe56e057f20f883e'),
(0, 'Tripti', 'Shukla', 'tripti12shukla1280@gmail.com', 2147483647, 'A-10,Jaypee Institute of Information Technology,Sector 62,Noida', 'e10adc3949ba59abbe56e057f20f883e'),
(0, 'arpita', 'mittra', 'arpita@gmail.com', 2147483647, '103/86 Sunderbagh,Lucknow', 'e10adc3949ba59abbe56e057f20f883e'),
(0, 'Tripti ', 'Shukla', 'tripti@gmail.com', 2147483647, '12334 ez', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `rest_id` int(2) NOT NULL,
  `menu_id` int(2) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`rest_id`, `menu_id`, `menu_name`, `menu_price`) VALUES
(1, 1, 'Punjabi Thali', 200),
(3, 2, 'Gulab Jamun', 80),
(1, 3, 'South Indian Thali', 355),
(2, 5, 'Gujrati Thali', 400),
(3, 4, 'Kashmiri Thali', 400),
(4, 6, 'North Indian Thali', 350);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `city_id` int(2) NOT NULL,
  `cuisine_id` int(2) NOT NULL,
  `rest_id` int(2) NOT NULL,
  `rest_name` varchar(50) NOT NULL,
  `rest_address` text NOT NULL,
  `rest_speciality` varchar(50) NOT NULL,
  `rest_phone` int(12) NOT NULL,
  `rest_mail` text NOT NULL,
  `rest_desc` text NOT NULL,
  `rest_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`city_id`, `cuisine_id`, `rest_id`, `rest_name`, `rest_address`, `rest_speciality`, `rest_phone`, `rest_mail`, `rest_desc`, `rest_img`) VALUES
(2, 3, 1, 'Mrs. Priti Singh', '103/56 Udaigiri Apartments, Kausambhi, Ghaziabad', 'Punjabi Thali', 780096953, 'pritisingh@gmail.com', 'I cook really delicious punjabi food.', 'punjabi home.jpg'),
(1, 1, 2, 'Mrs. Anamika Mishra', '102/54 Mayur Vihar, Noida', 'Sweets', 765498661, 'anamikamishra@gmail.com', 'My speciality is sweets and north indian food.', 'north indian home.jpg'),
(3, 2, 3, 'Mrs. Arpi Sachdev', '243/45 Prime Apartments, Indirapuram, Noida', 'Marathi Thali', 980045322, 'arpisachdev@gmail.com', 'I cook real good marathi food. Hit me up if want to git it a shot.', 'marathi home.jpg'),
(4, 6, 4, 'Mrs. Archana Iyer', '102/56 Roletts Apartments, Noida Sector 15, Noida', 'South Indian Thali', 970034599, 'archana@gmail.com', 'I cook extremely delicious south indian food.', 'south indian home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `cust_id` int(2) NOT NULL,
  `rest_id` int(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `rating` int(5) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`cust_id`, `rest_id`, `title`, `rating`, `review`) VALUES
(0, 2, 'nice food', 4, 'the food was extremely delicious'),
(0, 1, 'Amazing Food Quality', 5, 'The food quality is outstanding.'),
(0, 3, 'Nice Packaging', 4, 'The packaging of the food delivered was very good.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
