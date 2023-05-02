-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 01:57 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(100) NOT NULL,
  `court` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `email`, `date`, `time`, `court`, `status`) VALUES
(1, 'g@gmail.com', 'Wednesday', '2.00pm-4.00pm', 'volleyball', ''),
(2, 'c@gmail.com', 'Wednesday', '3.00pm-5.00pm', 'volleyball', ''),
(7, 'm@gmail.com', '2023-03-02', '5.00pm-7.00pm', 'basketball court', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) NOT NULL DEFAULT '-',
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `item`, `date`, `time`, `amount`) VALUES
(1, 'g@gmail.com', 'badminton court', '20023/03/23', '8.00am-10.00am', 1000),
(2, 'm@gmail.com', 'drink2', '2023/02/28', '8.00 am', 2000),
(3, 'm@gmail.com', 'snack1', '2023/02/20', '4.00pm', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `client_classes`
--

CREATE TABLE `client_classes` (
  `id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_details` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_classes`
--

INSERT INTO `client_classes` (`id`, `class_id`, `email`, `payment_details`, `status`) VALUES
(1, '8', 'm@gmail.com', 'done', '1'),
(2, '9', 'd@gmail.com', 'done', '1'),
(3, '9', 'g@gmail.com', 'Not Done', '1'),
(4, '9', 'j@gmail.com', 'done', '1'),
(5, '9', 'm@gmail.com', 'done', '1'),
(7, 'bdmt1', 'm@gmail.com', 'done', '1'),
(8, 'swm2', 'm@gmail.com', 'not done', '1');

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
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_refreshments`
--

INSERT INTO `client_refreshments` (`id`, `email`, `date`, `time`, `itemname`, `orderedquantity`, `status`) VALUES
(2, 'm@gmail.com', '2023-02-07', '14:00:00', 'drink2', 5, '1'),
(3, 'g@gmail.com', '2023-01-28', '16:00:00', 'snack1', 10, '1'),
(4, 'g@gmail.com', '2023-02-06', '11:00:00', 'drink1', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `coach_classes`
--

CREATE TABLE `coach_classes` (
  `id` int(10) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `level` enum('beginner','intermediate','pro') NOT NULL,
  `sport` enum('badminton','basketball','volleyball','tennis','swimming') NOT NULL,
  `email` varchar(100) NOT NULL,
  `coach` varchar(100) NOT NULL,
  `fee` enum('2500','3000','3500') NOT NULL,
  `date` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `time` varchar(20) NOT NULL,
  `age_group` varchar(20) NOT NULL,
  `no_of_students` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_classes`
--

INSERT INTO `coach_classes` (`id`, `class_id`, `level`, `sport`, `email`, `coach`, `fee`, `date`, `time`, `age_group`, `no_of_students`, `status`) VALUES
(1, 'bdmt1', 'pro', 'badminton', 'l@gmail.com', 'lakshan', '3500', 'Sunday', '8am-10am', 'below 12', '15', 0),
(2, 'swm2', 'intermediate', 'swimming', 'l@gmail.com', 'lakshan', '3000', 'Wednesday', '5.00pm-7.00pm', 'above 21', '20', 1),
(3, '', 'intermediate', 'basketball', 'p@gmail.com', '', '2500', 'Friday', '13.00 - 14.00 p.m', '13 - 20 Years', '20', 1),
(5, '4', 'pro', 'swimming', 'p@gmail.com', '', '2500', 'Saturday', '10.00 - 11.00 a.m', 'Above 21', '15', 0),
(7, '5', 'intermediate', 'volleyball', 'p@gmail.com', '', '2500', 'Tuesday', '18.00 - 19.00 p.m', '13 - 20 Years', '10', 0),
(8, '6', 'beginner', 'tennis', 'p@gmail.com', '', '2500', 'Saturday', '13.00 - 14.00 p.m', 'Above 21', '25', 0),
(9, '10', 'beginner', 'badminton', 'p@gmail.com', '', '2500', 'Monday', '7.00 - 8.00 a.m', 'Below 12 Years', '25', 0),
(10, '16', 'beginner', 'basketball', 'p@gmail.com', '', '2500', 'Thursday', '8.00 - 9.00 a.m', 'Above 21', '15', 0),
(11, '20', 'pro', 'swimming', 'p@gmail.com', '', '2500', 'Sunday', '8.00 - 9.00 a.m', 'Above 21', '20', 0),
(12, '25', 'intermediate', 'tennis', 'p@gmail.com', 'Pathum Lakshan', '2500', 'Thursday', '7.00 - 8.00 a.m', 'Below 12 Years', '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coach_students`
--

CREATE TABLE `coach_students` (
  `id` int(10) NOT NULL,
  `indexNo` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_students`
--

INSERT INTO `coach_students` (`id`, `indexNo`, `name`, `dob`, `gender`, `NIC`, `phoneNo`, `address`) VALUES
(1, 1, 'Pathum', '2012-09-04', 'Male', '', 767342605, 'Poramadala, Yatigaloluwa, Polgahawela'),
(2, 2, 'Michelle', '2000-05-20', 'Male', '', 717837352, 'Mandavila road, Piliyandala'),
(3, 3, 'chamudi', '2012-09-04', 'Female', '987654321V', 767342605, 'gjhhfjfj');

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
('mathematics', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'm@gmail.com', '2023-02-04 07:23:41', 1, 1),
('new', 'qqqqqqzzzzzzzzzz', 'g@gmail.com', '2023-02-05 14:07:29', 2, 1),
('dbhedbc', 'eeeeeeeeeeeeeee', 'c@gmail.com', '2023-02-08 20:35:54', 3, 1),
('dbhedbc', 'eeeeeeeeeeeeeee', 'c@gmail.com', '2023-02-08 20:36:34', 4, 1),
('bio', 'hiii', 'm@gmail.com', '2023-02-17 19:29:08', 5, 1),
('new', 'Enter Your Complaint Here... ', 'm@gmail.com', '2023-02-24 11:02:13', 7, 1),
('dbhedbc', 'AAAAAAAAAAA', 'm@gmail.com', '2023-02-24 11:02:42', 8, 1),
('baba', 'ZZZZ', 'm@gmail.com', '2023-02-25 05:34:41', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) NOT NULL,
  `itemid` varchar(100) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `itemid`, `itemname`, `quantity`, `price`) VALUES
(1, '1', 'Badminton', 10, 1000),
(2, '', 'shutteles', 5, 500);

-- --------------------------------------------------------

--
-- Table structure for table `first_aid`
--

CREATE TABLE `first_aid` (
  `id` int(10) NOT NULL,
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
(8, 'm@gmail.com', '2023-02-27', 'racket', 6, 1);

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
(4, 'p@gmail.com', 'coach', 'IS2108-Topic 3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `refreshments_drinks`
--

CREATE TABLE `refreshments_drinks` (
  `id` int(11) NOT NULL,
  `itemid` varchar(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refreshments_drinks`
--

INSERT INTO `refreshments_drinks` (`id`, `itemid`, `itemname`, `price`) VALUES
(1, '1', 'drink1', 100),
(2, '2', 'drink2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `refreshments_snacks`
--

CREATE TABLE `refreshments_snacks` (
  `id` int(11) NOT NULL,
  `itemid` varchar(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refreshments_snacks`
--

INSERT INTO `refreshments_snacks` (`id`, `itemid`, `itemname`, `price`) VALUES
(1, '1', 'snack1', 100),
(2, '2', 'snack2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `slots_badminton1`
--

CREATE TABLE `slots_badminton1` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_badminton1`
--

INSERT INTO `slots_badminton1` (`id`, `title`, `start_event`, `end_event`) VALUES
(7, 'Pathum', '2023-04-23 06:00:00', '2023-04-23 07:00:00'),
(12, 'Pathum', '2023-04-24 01:00:00', '2023-04-24 02:00:00'),
(13, 'michelle', '2023-04-26 08:00:00', '2023-04-26 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slots_badminton2`
--

CREATE TABLE `slots_badminton2` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_badminton2`
--

INSERT INTO `slots_badminton2` (`id`, `title`, `start_event`, `end_event`) VALUES
(1, 'michelle', '2023-04-05 00:00:00', '2023-04-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slots_basketball`
--

CREATE TABLE `slots_basketball` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots_basketball`
--

INSERT INTO `slots_basketball` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'chamudi naawamu', '2023-02-22 00:00:00', '2023-02-23 00:00:00'),
(4, 'michhhh', '2023-02-24 00:00:00', '2023-02-25 00:00:00'),
(5, 'gfhg', '2023-03-08 00:00:00', '2023-03-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slots_swimming`
--

CREATE TABLE `slots_swimming` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_swimming`
--

INSERT INTO `slots_swimming` (`id`, `title`, `start_event`, `end_event`) VALUES
(3, 'michelle', '2023-04-25 08:00:00', '2023-04-25 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slots_tennis`
--

CREATE TABLE `slots_tennis` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots_tennis`
--

INSERT INTO `slots_tennis` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'michelle', '2023-04-26 08:00:00', '2023-04-26 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slots_volleyball`
--

CREATE TABLE `slots_volleyball` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots_volleyball`
--

INSERT INTO `slots_volleyball` (`id`, `title`, `start_event`, `end_event`) VALUES
(5, 'hello', '2023-02-10 00:00:00', '2023-02-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('Male','Female','other') NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` int(10) NOT NULL,
  `type` enum('client','coach') NOT NULL,
  `emphone` int(10) NOT NULL,
  `emname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `NIC`, `email`, `dob`, `phone`, `type`, `emphone`, `emname`, `password`) VALUES
(1, 'Chamudi', 'Sadunika', 'Male', '9878152245v', 'c@gmail.com', '1998-01-24', 718769999, 'client', 718760054, 'Michelle Perera', '202cb962ac59075b964b07152d234b70'),
(2, 'Michelle', 'Perera', 'Female', '200064101229', 'm@gmail.com', '2000-05-20', 718769999, 'client', 718760054, 'Leelaratne Perera', '202cb962ac59075b964b07152d234b70'),
(3, 'Pathum', 'Lakshan', 'Male', '972482447v', 'p@gmail.com', '1997-09-04', 714567865, 'coach', 718760054, 'Pathum', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_classes`
--
ALTER TABLE `client_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_id` (`class_id`,`email`);

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
-- Indexes for table `coach_students`
--
ALTER TABLE `coach_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indexNo` (`indexNo`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_classes`
--
ALTER TABLE `client_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client_refreshments`
--
ALTER TABLE `client_refreshments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coach_classes`
--
ALTER TABLE `coach_classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coach_students`
--
ALTER TABLE `coach_students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `first_aid`
--
ALTER TABLE `first_aid`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordered_equipment`
--
ALTER TABLE `ordered_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pdf_data`
--
ALTER TABLE `pdf_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refreshments_drinks`
--
ALTER TABLE `refreshments_drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refreshments_snacks`
--
ALTER TABLE `refreshments_snacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slots_badminton1`
--
ALTER TABLE `slots_badminton1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slots_badminton2`
--
ALTER TABLE `slots_badminton2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slots_basketball`
--
ALTER TABLE `slots_basketball`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slots_swimming`
--
ALTER TABLE `slots_swimming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slots_tennis`
--
ALTER TABLE `slots_tennis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slots_volleyball`
--
ALTER TABLE `slots_volleyball`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
