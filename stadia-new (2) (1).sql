-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 06:56 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stadia-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminabout`
--

CREATE TABLE `adminabout` (
  `details` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminabout`
--

INSERT INTO `adminabout` (`details`) VALUES
('Stadia is an online stadium booking system that comprises two badminton courts, a volleyball court, a basketball court, a tennis court, and a swimming pool. The clients can easily reserve a time slot with or without coaches and pay on-site using the system\'s built-in payment gateway by following a few easy steps to check whether the courts, swimming pool, and other facilities they need—such as renting sports equipment and refreshments are available according to their preferences. Coaches can arrange classes to suit their schedules and easily manage student information. Additionally, they can rent out equipment based on their needs through our stadia system');

-- --------------------------------------------------------

--
-- Table structure for table `client_classes`
--

CREATE TABLE `client_classes` (
  `id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_classes`
--

INSERT INTO `client_classes` (`id`, `class_id`, `email`, `status`) VALUES
(10, '2', 'm@gmail.com', 0),
(13, '2', 'm@gmail.com', 1),
(1, '8', 'm@gmail.com', 1),
(2, '9', 'd@gmail.com', 1),
(3, '9', 'g@gmail.com', 1),
(4, '9', 'j@gmail.com', 1),
(5, '9', 'm@gmail.com', 1),
(7, 'bdmt1', 'm@gmail.com', 1),
(8, 'swm2', 'm@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_refreshments`
--

CREATE TABLE `client_refreshments` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `orderedquantity` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_refreshments`
--

INSERT INTO `client_refreshments` (`id`, `email`, `date`, `time`, `itemname`, `orderedquantity`, `status`) VALUES
(3, 'g@gmail.com', '2023-01-28', '16:00:00', 'snack1', 10, 1),
(4, 'g@gmail.com', '2023-02-06', '11:00:00', 'drink1', 1, 1),
(5, 'm@gmail.com', '2023-01-28', '16:00:00', 'snack1', 10, 0),
(6, 'm@gmail.com', '2023-03-24', '14:00:00', 'drink2', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coach_classes`
--

CREATE TABLE `coach_classes` (
  `id` int(10) NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `level` enum('Beginner','Intermediate','Pro') NOT NULL,
  `sport` enum('Badminton','Basketball','Volleyball','Tennis','Swimming') NOT NULL,
  `email` varchar(100) NOT NULL,
  `coach` varchar(100) NOT NULL,
  `fee` enum('2500','3000','3500') NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `time` varchar(20) NOT NULL,
  `age_group` varchar(20) NOT NULL,
  `months` int(10) NOT NULL,
  `no_of_students` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_classes`
--

INSERT INTO `coach_classes` (`id`, `class_id`, `level`, `sport`, `email`, `coach`, `fee`, `day`, `time`, `age_group`, `months`, `no_of_students`, `status`) VALUES
(1, 'bdmt1', 'Pro', 'Badminton', 'l@gmail.com', 'lakshan', '3500', 'Monday', '9.00 - 10.00', 'below 12', 0, '15', 1),
(2, 'swm2', 'Intermediate', 'Swimming', 'l@gmail.com', 'lakshan', '3000', 'Monday', '9.00 - 10.00', 'above 21', 0, '20', 1),
(3, '', 'Intermediate', 'Basketball', 'p@gmail.com', '', '2500', 'Wednesday', '13.00 - 14.00', '13 - 20 Years', 5, '20', 1),
(5, '4', 'Pro', 'Swimming', 'p@gmail.com', '', '2500', 'Monday', '9.00 - 10.00', 'Above 21', 0, '15', 2),
(7, '5', 'Intermediate', 'Volleyball', 'p@gmail.com', '', '2500', 'Monday', '9.00 - 10.00', '13 - 20 Years', 0, '10', 2),
(8, '6', 'Beginner', 'Tennis', 'p@gmail.com', '', '2500', 'Monday', '9.00 - 10.00', 'Above 21', 0, '25', 2),
(9, '10', 'Beginner', 'Badminton', 'p@gmail.com', '', '2500', 'Monday', '9.00 - 10.00', 'Below 12 Years', 0, '25', 1),
(10, '16', 'Beginner', 'Basketball', 'p@gmail.com', '', '2500', 'Monday', '9.00 - 10.00', 'Above 21', 0, '15', 3),
(11, '20', 'Pro', 'Swimming', 'p@gmail.com', '', '2500', 'Tuesday', '9.00 - 10.00', 'Above 21', 0, '20', 1),
(12, '25', 'Intermediate', 'Tennis', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Monday', '9.00 - 10.00', 'Below 12 Years', 0, '15', 3),
(13, '30', 'Pro', 'Volleyball', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Monday', '9.00 - 10.00', 'Above 21', 0, '15', 0),
(15, NULL, 'Beginner', 'Tennis', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Monday', '9.00 - 10.00', 'Below 12 Years', 0, '5', 0),
(16, NULL, 'Beginner', 'Volleyball', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Monday', '9.00 - 10.00', 'Below 12 Years', 0, '10', 0),
(17, NULL, 'Beginner', 'Tennis', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Monday', '9.00 - 10.00', 'Above 21', 0, '5', 0),
(18, NULL, 'Pro', 'Swimming', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Monday', '20.00 - 21.00', 'Above 21', 3, '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `subject` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`subject`, `details`, `email`, `datetime`, `id`, `status`) VALUES
('new complaint', 'no ventilation', 'm@gmail.com', '2023-05-01 06:21:40', 1, 1),
('new', 'qqqqqqzzzzzzzzzz', 'g@gmail.com', '2023-02-05 14:07:29', 2, 1),
('dbhedbc', 'eeeeeeeeeeeeeee', 'c@gmail.com', '2023-02-08 20:35:54', 3, 1),
('dbhedbc', 'eeeeeeeeeeeeeee', 'c@gmail.com', '2023-02-08 20:36:34', 4, 1),
('equipment', 'not in good condition', 'm@gmail.com', '2023-05-01 06:49:40', 5, 1),
('new', 'Enter Your Complaint Here... ', 'm@gmail.com', '2023-05-01 08:16:03', 7, 0),
('complaint', 'Update5', 'm@gmail.com', '2023-05-03 08:19:17', 8, 1),
('washroom', 'not cleaned often', 'm@gmail.com', '2023-05-01 06:23:01', 9, 1),
('mich', 'not clean', 'm@gmail.com', '2023-05-01 08:15:29', 10, 0),
('test', 'Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint Here... Enter Your Complaint He', 'm@gmail.com', '2023-04-30 22:39:20', 11, 0),
('pool', 'submit', 'm@gmail.com', '2023-05-01 08:08:49', 12, 0),
('pool', 'too much chlorin', 'm@gmail.com', '2023-05-02 05:05:54', 13, 1),
('court', 'not maintained', 'm@gmail.com', '2023-05-01 08:16:27', 14, 1),
('coach', 'not good', 'm@gmail.com', '2023-05-01 08:18:56', 15, 1),
('statistics', 'Enter Your Complaint Here... ', 'm@gmail.com', '2023-05-03 08:19:56', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `itemid` varchar(100) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `itemid`, `itemname`, `quantity`, `price`) VALUES
(1, 'bdm001', 'racket', 10, 100),
(2, 'swm002', 'goggles', 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `first_aid`
--

CREATE TABLE `first_aid` (
  `id` int(11) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `first_aid`
--

INSERT INTO `first_aid` (`id`, `item_id`, `item_name`, `quantity`) VALUES
(1, 3, 'oiu', 52),
(2, 4, 'oiu', 52),
(3, 5, 'poi', 8),
(4, 6, 'iuy', 74);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_equipment`
--

CREATE TABLE `ordered_equipment` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `orderedquantity` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_equipment`
--

INSERT INTO `ordered_equipment` (`id`, `email`, `date`, `itemname`, `orderedquantity`, `status`) VALUES
(4, 'g@gmail.com', '2023-02-07', 'ball', 5, 1),
(5, 'g@gmail.com', '2023-02-05', 'goggle', 4, 1),
(6, 'g@gmail.com', '2023-02-28', 'racket', 6, 1),
(7, 'm@gmail.com', '2023-02-28', 'goggles', 2, 1),
(8, 'm@gmail.com', '2023-02-27', 'racket', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `product_id`, `quantity`, `date`, `time`) VALUES
(14, 'm@gmail.com', 'D01', 2, '2023-05-20', '08:00:00'),
(15, 'm@gmail.com', 'S01', 3, '2023-05-20', '16:00:00'),
(16, 'm@gmail.com', 'bdm001', 2, '2023-05-20', '14:00:00'),
(17, 'm@gmail.com', 'bdm001', 3, '2023-05-20', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_data`
--

CREATE TABLE `pdf_data` (
  `id` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf_data`
--

INSERT INTO `pdf_data` (`id`, `email`, `username`, `filename`) VALUES
(1, 'p@gmail.com', 'Pathum Lakshan Dissanayake', 'Official Resume.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `refreshments_drinks`
--

CREATE TABLE `refreshments_drinks` (
  `id` int(11) NOT NULL,
  `itemid` varchar(255) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refreshments_drinks`
--

INSERT INTO `refreshments_drinks` (`id`, `itemid`, `itemname`, `price`, `image`) VALUES
(1, 'D01', 'Pepsi', 100, 0x70657073692e706e67),
(2, 'D02', 'CocoCola', 200, 0x636f6b652e6a7067),
(3, 'D03', 'Sprite', 300, 0x7370726974652e6a706567),
(4, 'D04', 'Fanta', 300, 0x66616e74612e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `refreshments_snacks`
--

CREATE TABLE `refreshments_snacks` (
  `id` int(11) NOT NULL,
  `itemid` varchar(255) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refreshments_snacks`
--

INSERT INTO `refreshments_snacks` (`id`, `itemid`, `itemname`, `price`, `image`) VALUES
(1, 'S01', 'Snack 1', 100, 0x736e61636b312e6a7067),
(2, 'S02', 'Snack 2', 200, 0x736e61636b322e6a706567),
(3, 'S03', 'Snack 3', 300, 0x736e61636b332e6a7067),
(4, 'S04', 'Snack 4', 400, 0x736e61636b342e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(10) NOT NULL,
  `classid` int(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `classid`, `date`, `status`) VALUES
(1, 10, '2023-05-20', 0),
(4, 10, '2023-05-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slots_badminton1`
--

CREATE TABLE `slots_badminton1` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_badminton1`
--

INSERT INTO `slots_badminton1` (`id`, `email`, `title`, `start_event`, `end_event`, `status`) VALUES
(7, '', 'Pathum', '2023-04-23 06:00:00', '2023-04-23 07:00:00', 1),
(12, '', 'Pathum', '2023-04-24 01:00:00', '2023-04-24 02:00:00', 1),
(13, '', 'michelle', '2023-04-26 08:00:00', '2023-04-26 09:00:00', 1),
(15, '', 'michelle2', '2023-05-04 11:00:00', '2023-05-04 12:00:00', 1),
(16, 'm@gmail.com', 'hnn', '2023-05-06 11:00:00', '2023-05-06 12:00:00', 1),
(18, '', 'www', '2023-05-03 20:00:00', '2023-05-03 21:00:00', 1),
(19, '', 'qq', '2023-05-06 16:00:00', '2023-05-06 17:00:00', 1),
(20, '', 'hi', '2023-06-03 11:00:00', '2023-06-03 12:00:00', 1),
(21, '', 'hi2', '2023-07-03 09:00:00', '2023-07-03 10:00:00', 1),
(22, '', 'hi3', '2023-08-03 10:00:00', '2023-08-03 11:00:00', 1),
(23, 'm@gmail.com', 'lucifer', '2023-05-07 09:00:00', '2023-05-07 10:00:00', 1),
(27, 'm@gmail.com', 'hey', '2023-05-11 09:00:00', '2023-05-11 10:00:00', 1),
(29, 'm@gmail.com', 'mivhhhh', '2023-05-13 08:00:00', '2023-05-13 09:00:00', 1),
(30, 'u@gmail.com', 'udara', '2023-05-09 10:00:00', '2023-05-09 11:00:00', 1),
(31, 'm@gmail.com', 'mich3', '2023-05-12 07:00:00', '2023-05-12 08:00:00', 1),
(32, 'm@gmail.com', 'michelle', '2023-05-20 07:00:00', '2023-05-20 08:00:00', 1),
(33, 'm@gmail.com', 'luci - Slot 1 of 2', '2023-05-18 07:00:00', '2023-05-18 08:00:00', 1),
(34, 'm@gmail.com', 'luci - Slot 2 of 2', '2023-05-18 08:00:00', '2023-05-18 09:00:00', 1),
(35, 'm@gmail.com', 'pathum - Slot 2 of 15', '2023-05-17 08:00:00', '2023-05-17 09:00:00', 1),
(36, 'm@gmail.com', 'pathum - Slot 3 of 15', '2023-05-17 09:00:00', '2023-05-17 10:00:00', 1),
(37, 'm@gmail.com', 'pathum - Slot 1 of 15', '2023-05-17 07:00:00', '2023-05-17 08:00:00', 1),
(38, 'm@gmail.com', 'pathum - Slot 5 of 15', '2023-05-17 11:00:00', '2023-05-17 12:00:00', 1),
(39, 'm@gmail.com', 'pathum - Slot 4 of 15', '2023-05-17 10:00:00', '2023-05-17 11:00:00', 1),
(40, 'm@gmail.com', 'pathum - Slot 6 of 15', '2023-05-17 12:00:00', '2023-05-17 13:00:00', 1),
(41, 'm@gmail.com', 'pathum - Slot 7 of 15', '2023-05-17 13:00:00', '2023-05-17 14:00:00', 0),
(42, 'm@gmail.com', 'pathum - Slot 8 of 15', '2023-05-17 14:00:00', '2023-05-17 15:00:00', 1),
(43, 'm@gmail.com', 'pathum - Slot 9 of 15', '2023-05-17 15:00:00', '2023-05-17 16:00:00', 1),
(44, 'm@gmail.com', 'pathum - Slot 10 of 15', '2023-05-17 16:00:00', '2023-05-17 17:00:00', 1),
(45, 'm@gmail.com', 'pathum - Slot 11 of 15', '2023-05-17 17:00:00', '2023-05-17 18:00:00', 1),
(46, 'm@gmail.com', 'pathum - Slot 12 of 15', '2023-05-17 18:00:00', '2023-05-17 19:00:00', 1),
(47, 'm@gmail.com', 'pathum - Slot 13 of 15', '2023-05-17 19:00:00', '2023-05-17 20:00:00', 1),
(48, 'm@gmail.com', 'pathum - Slot 14 of 15', '2023-05-17 20:00:00', '2023-05-17 21:00:00', 1),
(49, 'm@gmail.com', 'pathum - Slot 15 of 15', '2023-05-17 21:00:00', '2023-05-17 22:00:00', 1),
(50, 'm@gmail.com', 'jj - Slot 1 of 1', '2023-05-15 10:00:00', '2023-05-15 11:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots_badminton2`
--

CREATE TABLE `slots_badminton2` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_badminton2`
--

INSERT INTO `slots_badminton2` (`id`, `email`, `title`, `start_event`, `end_event`, `status`) VALUES
(1, '', 'michelle', '2023-04-05 00:00:00', '2023-04-06 00:00:00', 1),
(4, 'm@gmail.com', 'pp', '2023-05-08 09:00:00', '2023-05-08 10:00:00', 1),
(5, 'm@gmail.com', 'fiyasa - Slot 2 of 2', '2023-05-13 09:00:00', '2023-05-13 10:00:00', 1),
(6, 'm@gmail.com', 'fiyasa - Slot 1 of 2', '2023-05-13 08:00:00', '2023-05-13 09:00:00', 0),
(7, 'abc@gmail.com', 'hh - Slot 1 of 2', '2023-05-13 07:00:00', '2023-05-13 08:00:00', 1),
(8, 'abc@gmail.com', 'hh - Slot 2 of 2', '2023-05-13 08:00:00', '2023-05-13 09:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots_basketball`
--

CREATE TABLE `slots_basketball` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots_basketball`
--

INSERT INTO `slots_basketball` (`id`, `email`, `title`, `start_event`, `end_event`, `status`) VALUES
(4, '', 'michhhh', '2023-02-24 00:00:00', '2023-02-25 00:00:00', 1),
(5, '', 'mdjsicjd', '2023-03-08 06:30:00', '2023-03-08 07:00:00', 1),
(6, '', 'michelle', '2023-03-07 18:00:00', '2023-03-07 18:30:00', 1),
(8, '', 'michelle', '2023-04-26 10:00:00', '2023-04-26 11:00:00', 1),
(9, 'm@gmail.com', 'qqq', '2023-05-12 08:00:00', '2023-05-12 09:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slots_swimming`
--

CREATE TABLE `slots_swimming` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_swimming`
--

INSERT INTO `slots_swimming` (`id`, `email`, `title`, `start_event`, `end_event`, `status`) VALUES
(3, '', 'michelle', '2023-04-25 08:00:00', '2023-04-25 09:00:00', 1),
(4, 'm@gmail.com', 'k', '2023-05-08 08:00:00', '2023-05-08 09:00:00', 1),
(6, 'm@gmail.com', 'group - Slot 1 of 3', '2023-05-12 08:00:00', '2023-05-12 09:00:00', 0),
(7, 'm@gmail.com', 'group - Slot 3 of 3', '2023-05-12 10:00:00', '2023-05-12 11:00:00', 1),
(8, 'm@gmail.com', 'group - Slot 2 of 3', '2023-05-12 09:00:00', '2023-05-12 10:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots_tennis`
--

CREATE TABLE `slots_tennis` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_tennis`
--

INSERT INTO `slots_tennis` (`id`, `email`, `title`, `start_event`, `end_event`, `status`) VALUES
(2, '', 'michelle', '2023-04-26 08:00:00', '2023-04-26 09:00:00', 1),
(4, 'm@gmail.com', 'gggggg', '2023-05-12 08:00:00', '2023-05-12 09:00:00', 1),
(5, 'm@gmail.com', 'pathum - Slot 2 of 2', '2023-05-11 12:00:00', '2023-05-11 13:00:00', 0),
(6, 'm@gmail.com', 'pathum - Slot 1 of 2', '2023-05-11 11:00:00', '2023-05-11 12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots_volleyball`
--

CREATE TABLE `slots_volleyball` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots_volleyball`
--

INSERT INTO `slots_volleyball` (`id`, `email`, `title`, `start_event`, `end_event`, `status`) VALUES
(5, '', 'hello', '2023-02-10 00:00:00', '2023-02-11 00:00:00', 1),
(6, '', 'mihc', '2023-03-08 00:00:00', '2023-03-09 00:00:00', 1),
(7, '', 'hcsjchfcj', '2023-03-08 00:00:00', '2023-03-09 00:00:00', 1),
(9, '', 'michelle', '2023-04-27 08:00:00', '2023-04-27 09:00:00', 1),
(10, 'm@gmail.com', 'gfgf', '2023-05-11 10:00:00', '2023-05-11 11:00:00', 1),
(12, 'm@gmail.com', 'chamu - Slot 1 of 3', '2023-05-13 08:00:00', '2023-05-13 09:00:00', 1),
(13, 'm@gmail.com', 'chamu - Slot 2 of 3', '2023-05-13 09:00:00', '2023-05-13 10:00:00', 0),
(14, 'm@gmail.com', 'chamu - Slot 3 of 3', '2023-05-13 10:00:00', '2023-05-13 11:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('Male','Female','other') NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` enum('client','coach') NOT NULL,
  `emphone` int(10) NOT NULL,
  `emname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `NIC`, `email`, `dob`, `phone`, `address`, `type`, `emphone`, `emname`, `password`, `dp`) VALUES
(1, 'Chamudi', 'Sadunika', 'Male', '9878152245v', 'c@gmail.com', '1998-01-24', 718769999, '', 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', ''),
(2, 'Gavini', 'Niketha', 'Female', '200064202500', 'g@gmail.com', '2023-03-04', 718760054, '', 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', 'CGLY3197.JPG'),
(3, 'Michelle', 'Perera', 'Female', '200064101229', 'm@gmail.com', '2000-05-20', 718769999, '', 'client', 765301376, 'Udara Nishani', '202cb962ac59075b964b07152d234b70', '645bf02d7e0c0_IMG-20211109-WA0012.jpg'),
(4, 'Pathum', 'Lakshan', 'Male', '972482447v', 'p@gmail.com', '1997-09-04', 767342605, '', 'coach', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', ''),
(5, 'Shashini', 'Mallikarachchi', 'Male', '200054201485', 's@gmail.com', '2000-12-06', 718760054, '', 'coach', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', 'noprofil.jpg'),
(6, 'Fiyaza', 'Bhanu', 'Female', '996170197v', 'f@gmail.com', '2023-02-18', 718760054, '', 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', 'IMG-20210312-WA0170.jpg'),
(7, 'Roshelle', 'Perera', 'Female', '200264202500', 'r@gmail.com', '2002-07-27', 718760054, '', 'coach', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', ''),
(8, 'Kaveesha', 'Muthukuda', 'Male', '996170180v', 'k@gmail.com', '1999-07-07', 718760054, '', 'coach', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', ''),
(9, 'Pawani', 'Nimesha', 'Female', '200064202223', 'n@gmail.com', '2000-08-08', 718760054, '', 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', ''),
(10, 'udara', 'Nishani', 'other', '736360187v', 'u@gmail.com', '1973-05-15', 718760054, '', 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', '645b3e5108211_1.jpg'),
(11, 'Yohan ', 'Buddhika', 'Male', '200064202555', 'y@gmail.com', '2000-06-06', 718760054, '291/s , 3rd lane, mandawila road,piliyandala', 'coach', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', ''),
(12, 'abc', 'Perera', 'Male', '200264202500', 'abc@gmail.com', '2011-02-15', 718769999, '291/s , 3rd lane, mandawila road,piliyandala', 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70', '645cb6f0582d5_IMG-20211109-WA0011.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_classes`
--
ALTER TABLE `client_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_id` (`class_id`,`email`,`status`);

--
-- Indexes for table `client_refreshments`
--
ALTER TABLE `client_refreshments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach_classes`
--
ALTER TABLE `coach_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemid` (`itemid`);

--
-- Indexes for table `first_aid`
--
ALTER TABLE `first_aid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_equipment`
--
ALTER TABLE `ordered_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `pdf_data`
--
ALTER TABLE `pdf_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refreshments_drinks`
--
ALTER TABLE `refreshments_drinks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemid` (`itemid`);

--
-- Indexes for table `refreshments_snacks`
--
ALTER TABLE `refreshments_snacks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemid` (`itemid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots_badminton1`
--
ALTER TABLE `slots_badminton1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots_badminton2`
--
ALTER TABLE `slots_badminton2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots_basketball`
--
ALTER TABLE `slots_basketball`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots_swimming`
--
ALTER TABLE `slots_swimming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots_tennis`
--
ALTER TABLE `slots_tennis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots_volleyball`
--
ALTER TABLE `slots_volleyball`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_classes`
--
ALTER TABLE `client_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client_refreshments`
--
ALTER TABLE `client_refreshments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coach_classes`
--
ALTER TABLE `coach_classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `first_aid`
--
ALTER TABLE `first_aid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordered_equipment`
--
ALTER TABLE `ordered_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pdf_data`
--
ALTER TABLE `pdf_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refreshments_drinks`
--
ALTER TABLE `refreshments_drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refreshments_snacks`
--
ALTER TABLE `refreshments_snacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slots_badminton1`
--
ALTER TABLE `slots_badminton1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `slots_badminton2`
--
ALTER TABLE `slots_badminton2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slots_basketball`
--
ALTER TABLE `slots_basketball`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slots_swimming`
--
ALTER TABLE `slots_swimming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slots_tennis`
--
ALTER TABLE `slots_tennis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slots_volleyball`
--
ALTER TABLE `slots_volleyball`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
