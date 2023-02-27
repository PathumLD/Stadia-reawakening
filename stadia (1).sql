-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 05:53 AM
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
-- Database: `stadia`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminabout`
--

CREATE TABLE `adminabout` (
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adminaddequipment`
--

CREATE TABLE `adminaddequipment` (
  `ItemId` int(50) NOT NULL,
  `Itemname` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminaddequipment`
--

INSERT INTO `adminaddequipment` (`ItemId`, `Itemname`, `Quantity`) VALUES
(1236, 'Rackets', '250'),
(1237, 'Goggles', '490'),
(1238, 'Ball', '25'),
(1239, 'ShuttleCocks', '50');

-- --------------------------------------------------------

--
-- Table structure for table `adminevents`
--

CREATE TABLE `adminevents` (
  `id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` varchar(255) NOT NULL,
  `end_event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('Admin','Manager','External Supplier','Equipment Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`email`, `password`, `type`) VALUES
('cham@gmail.com', 'abc', 'Manager'),
('fb@gmail.com', '123', 'Admin'),
('fiya@gmail.com', '123', 'Admin'),
('mich@gmail.com', '1234', 'External Supplier'),
('path@gmail.com', 'abcd', 'Equipment Manager');

-- --------------------------------------------------------

--
-- Table structure for table `adminpasswords`
--

CREATE TABLE `adminpasswords` (
  `userid` int(12) NOT NULL,
  `currentpassword` varchar(255) NOT NULL,
  `newpassword` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adminusersdetails`
--

CREATE TABLE `adminusersdetails` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `adminNIC` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusersdetails`
--

INSERT INTO `adminusersdetails` (`fname`, `lname`, `adminNIC`, `phone`, `dob`) VALUES
('', '', '', 0, '0000-00-00'),
('Fathima', ' Fiyaza', '145879358V', 742698524, '2002-08-09'),
('michelle', 'perera', '200245879V', 789648523, '1999-02-08'),
('pathum', 'rdawd', '5667778865v', 2147483647, '2022-12-09'),
('Pathum', 'Lakshan', '972482447V', 767342605, '1997-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `time` varchar(100) NOT NULL,
  `court` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `email`, `date`, `time`, `court`) VALUES
(1, 'g@gmail.com', 'Wednesday', '2.00pm-4.00pm', 'volleyball'),
(2, 'c@gmail.com', 'Wednesday', '3.00pm-5.00pm', 'volleyball'),
(3, 'j@gmail.com', 'Tuesday', '1.00 - 2.00 p.m', 'badminton'),
(4, 'm@gmail.com', 'Tuesday', '10.00 - 11.00 p.m', 'badminton');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `item`, `date`, `time`, `amount`) VALUES
(1, 'j@gmail.com', 'racket', '2023.02.15', '3.00 - 4.00 p.m', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `client_classes`
--

CREATE TABLE `client_classes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `coach` varchar(100) NOT NULL,
  `date` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `time` varchar(20) NOT NULL,
  `paymentdetails` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_classes`
--

INSERT INTO `client_classes` (`id`, `email`, `sport`, `coach`, `date`, `time`, `paymentdetails`) VALUES
(1, 'g@gmail.com', 'basketball', 'coach1', 'Friday', '8am-10am', 'done'),
(2, 'c@gmail.com', 'swimming', 'coach3', 'Wednesday', '5.00pm-7.00pm', 'Not done'),
(3, 'j@gmail.com', 'badminton', 'chamudi', 'Wednesday', '2.00pm - 3.00pm', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `client_equipment`
--

CREATE TABLE `client_equipment` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `orderedquantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_equipment`
--

INSERT INTO `client_equipment` (`id`, `email`, `date`, `itemname`, `orderedquantity`) VALUES
(1, '', '2023-02-06', 'racket', 4),
(2, '', '2023-02-07', 'goggles', 1),
(3, 'g@gmail.com', '2023-02-06', 'goggles', 4),
(4, 'g@gmail.com', '2023-02-07', 'ball', 5),
(5, 'g@gmail.com', '2023-02-05', 'goggle', 4),
(6, 'g@gmail.com', '2023-02-28', 'racket', 6),
(7, 'j@gmail.com', '2023-02-22', 'shuttlecock', 5);

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
  `orderedquantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_refreshments`
--

INSERT INTO `client_refreshments` (`id`, `email`, `date`, `time`, `itemname`, `orderedquantity`) VALUES
(1, '', '2023-02-06', '11:00:00', 'snack1', 10),
(2, '', '2023-02-07', '14:00:00', 'drink2', 5),
(3, 'g@gmail.com', '2023-01-28', '16:00:00', 'snack1', 10),
(4, 'g@gmail.com', '2023-02-06', '11:00:00', 'drink1', 1),
(5, 'j@gmail.com', '2023-02-22', '00:00:02', 'drink1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `coachequipment`
--

CREATE TABLE `coachequipment` (
  `item` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coachequipment`
--

INSERT INTO `coachequipment` (`item`, `price`, `quantity`) VALUES
('Badminton', '100', 5),
('ball', '1000', 25),
('shuttlecock', '250', 10);

-- --------------------------------------------------------

--
-- Table structure for table `coach_classes`
--

CREATE TABLE `coach_classes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `time` varchar(20) NOT NULL,
  `age_group` varchar(20) NOT NULL,
  `no_of_students` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_classes`
--

INSERT INTO `coach_classes` (`id`, `email`, `date`, `time`, `age_group`, `no_of_students`) VALUES
(1, 'l@gmail.com', 'Tuesday', '2.00pm - 3.00pm', 'below 18', '15'),
(2, 'm@gmail.com', 'Thursday', '2.00pm - 4.00pm', 'above 18', '20');

-- --------------------------------------------------------

--
-- Table structure for table `coach_class_details`
--

CREATE TABLE `coach_class_details` (
  `indexNo` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_class_details`
--

INSERT INTO `coach_class_details` (`indexNo`, `name`, `dob`, `phoneNo`, `address`, `payments`) VALUES
(1, 'Nikeetha', '2000-05-20', 712663564, 'mandavila road, Piliyandala', 'Rs.1000/=');

-- --------------------------------------------------------

--
-- Table structure for table `coach_details`
--

CREATE TABLE `coach_details` (
  `id` int(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `nic` varchar(20) NOT NULL,
  `phone` char(20) NOT NULL,
  `dob` date NOT NULL,
  `em_con` char(20) NOT NULL,
  `em_name` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_details`
--

INSERT INTO `coach_details` (`id`, `fname`, `lname`, `nic`, `phone`, `dob`, `em_con`, `em_name`, `email`) VALUES
(1, 'Chamudi', 'Sandunika', '998765432V', '0761234567', '1999-01-01', '0779856432', 'Somapala', 'c@gmail.com'),
(2, 'A', 'B', '9876434245V', '0767342605', '2012-12-12', '0775647353', 'pathum', 'r@gmail.com'),
(3, 'Lakshan', 'Dissanayake', '972482447V', '0767342605', '1997-09-02', '0776546254', 'Chamudi', 'coach@gmail.com'),
(4, 'pathum', 'lakshan', '2002083822', '0714527652', '1997-12-31', '0779856432', 'piyadasa', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `coach_students`
--

CREATE TABLE `coach_students` (
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

INSERT INTO `coach_students` (`indexNo`, `name`, `dob`, `gender`, `NIC`, `phoneNo`, `address`) VALUES
(1, 'Pathum', '2012-09-04', 'Male', '', 767342605, 'Poramadala, Yatigaloluwa, Polgahawela'),
(2, 'Michelle', '2000-05-20', 'Male', '', 717837352, 'Mandavila road, Piliyandala');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `subject` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `complaintID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`subject`, `details`, `email`, `datetime`, `complaintID`) VALUES
('mathematics', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'm@gmail.com', '2023-02-04 07:23:41', 1),
('new', 'qqqqqqzzzzzzzzzz', 'g@gmail.com', '2023-02-05 14:07:29', 2),
('dbhedbc', 'eeeeeeeeeeeeeee', 'c@gmail.com', '2023-02-08 20:35:54', 3),
('dbhedbc', 'eeeeeeeeeeeeeee', 'c@gmail.com', '2023-02-08 20:36:34', 4),
('badminton', 'practice time is not enough ', 'j@gmail.com', '2023-02-10 01:18:20', 5),
('badminton', 'practice time is not enough ', 'j@gmail.com', '2023-02-10 01:20:45', 6);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `itemid` varchar(100) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`itemid`, `itemname`, `quantity`, `price`) VALUES
('bdm001', 'racket', 10, 100),
('swm002', 'goggles', 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_orders`
--

CREATE TABLE `equipment_orders` (
  `date` date NOT NULL,
  `ccid` varchar(20) NOT NULL,
  `itemid` varchar(100) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(3, 'michelle', '2023-02-14 00:00:00', '2023-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manageraddfirstaid`
--

CREATE TABLE `manageraddfirstaid` (
  `item_id` int(100) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manageraddfirstaid`
--

INSERT INTO `manageraddfirstaid` (`item_id`, `item_name`, `quantity`) VALUES
(0, '', 89),
(1, 'lkj', 79),
(2, 'lkj', 789),
(3, 'oiu', 78),
(4, 'iuy', 89),
(5, 'oiu', 56),
(7, 'wer', 98),
(9, 'red', 89),
(10, 'pok', 98);

-- --------------------------------------------------------

--
-- Table structure for table `managerclientdetails`
--

CREATE TABLE `managerclientdetails` (
  `nic` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `emergency_contact` varchar(20) NOT NULL,
  `emergency_contact_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managerclientdetails`
--

INSERT INTO `managerclientdetails` (`nic`, `name`, `phone_number`, `email`, `date_of_birth`, `emergency_contact`, `emergency_contact_name`) VALUES
('199950510679', 'ghy', '0762803041', 'chamudisandu@gmail.c', '2022-11-03', '0762803041', 'hgt');

-- --------------------------------------------------------

--
-- Table structure for table `managervieworders`
--

CREATE TABLE `managervieworders` (
  `clientcoach_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `order_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managervieworders`
--

INSERT INTO `managervieworders` (`clientcoach_id`, `date`, `order_id`) VALUES
(1, '2023-02-01', 1),
(2, '2023-02-01', 5),
(5, '2023-02-03', 5);

-- --------------------------------------------------------

--
-- Table structure for table `manager_payment_suppliers`
--

CREATE TABLE `manager_payment_suppliers` (
  `order_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `amount_due` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager_payment_suppliers`
--

INSERT INTO `manager_payment_suppliers` (`order_id`, `date`, `amount_due`) VALUES
(2, '2023-02-22', 'Rs 1000'),
(3, '2023-02-23', 'Rs. 2000');

-- --------------------------------------------------------

--
-- Table structure for table `refreshments_drinks`
--

CREATE TABLE `refreshments_drinks` (
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refreshments_drinks`
--

INSERT INTO `refreshments_drinks` (`itemname`, `price`) VALUES
('drink1', 100),
('drink2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `refreshments_snacks`
--

CREATE TABLE `refreshments_snacks` (
  `itemname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refreshments_snacks`
--

INSERT INTO `refreshments_snacks` (`itemname`, `price`) VALUES
('snack1', 100),
('snack2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `suppliermyorders`
--

CREATE TABLE `suppliermyorders` (
  `OrderId` int(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliermyorders`
--

INSERT INTO `suppliermyorders` (`OrderId`, `Date`, `Quantity`, `Amount`) VALUES
(75, '2022/9/2', '450', 'Rs.4500'),
(78, '2022/9/18', '650', 'Rs.7200'),
(79, '2022/10/4', '400', 'Rs.5200');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` enum('client','coach') NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `dob` date NOT NULL,
  `emphone` int(10) NOT NULL,
  `emname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `type`, `gender`, `fname`, `lname`, `NIC`, `phone`, `dob`, `emphone`, `emname`) VALUES
('c@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Male', 'chamudi', 'sandunika', '', 718760054, '2000-05-01', 729997763, 'Pathum'),
('d@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Female', 'Jacob', 'Damian', '903245678V', 724563289, '1990-03-13', 774563145, 'jimmy'),
('f@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Male', 'fiyaza', 'fawsar', '', 714567865, '2000-12-06', 765431234, 'Pathum'),
('g@gmail.com', '202cb962ac59075b964b07152d234b70', 'client', 'Female', 'gavini', 'sandunika', '200067534671', 729997763, '1997-02-28', 718760054, 'Pathum'),
('j@gmail.com', '202cb962ac59075b964b07152d234b70', 'client', 'Male', 'John', 'Doe', '956745341V', 776541276, '1995-10-07', 714569834, 'Smith'),
('l@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Male', 'Pathum', 'Nikeetha', '972482447V', 729997763, '1997-09-20', 718760054, 'Baba'),
('m@gmail.com', '202cb962ac59075b964b07152d234b70', 'client', 'Male', 'Michelle', 'Nikeetha', '972482447V', 718760054, '2000-05-20', 729997763, 'Pathum'),
('mf@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Other', 'Michelle', 'fawsar', '200067534671', 729997763, '2000-05-20', 718760054, 'Baba'),
('p@gmail.com', '202cb962ac59075b964b07152d234b70', 'client', 'Male', 'Pathum', 'Lakshan', '972482447V', 729997763, '1997-09-04', 718760054, 'Baba'),
('pn@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Other', 'Pathum', 'sandunika', '972482447V', 714567865, '2000-12-11', 729997763, 'Pathum'),
('q@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', '', 'Michelle', 'fawsar', '200067534671', 718760054, '2000-05-12', 729997763, 'Pathum'),
('s@gmail.com', '202cb962ac59075b964b07152d234b70', 'client', 'Other', 'sandunika', 'mallika', '200067534671', 718760054, '2000-12-03', 729997763, 'Baba'),
('sm@gmail.com', '202cb962ac59075b964b07152d234b70', 'coach', 'Other', 'sandunika', 'mallika', '200067534671', 718760054, '1999-12-02', 765431234, 'Baba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaddequipment`
--
ALTER TABLE `adminaddequipment`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `adminevents`
--
ALTER TABLE `adminevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `adminpasswords`
--
ALTER TABLE `adminpasswords`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `adminusersdetails`
--
ALTER TABLE `adminusersdetails`
  ADD PRIMARY KEY (`adminNIC`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_equipment`
--
ALTER TABLE `client_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_refreshments`
--
ALTER TABLE `client_refreshments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coachequipment`
--
ALTER TABLE `coachequipment`
  ADD PRIMARY KEY (`item`);

--
-- Indexes for table `coach_classes`
--
ALTER TABLE `coach_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach_class_details`
--
ALTER TABLE `coach_class_details`
  ADD PRIMARY KEY (`indexNo`);

--
-- Indexes for table `coach_details`
--
ALTER TABLE `coach_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach_students`
--
ALTER TABLE `coach_students`
  ADD PRIMARY KEY (`indexNo`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manageraddfirstaid`
--
ALTER TABLE `manageraddfirstaid`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `managerclientdetails`
--
ALTER TABLE `managerclientdetails`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `manager_payment_suppliers`
--
ALTER TABLE `manager_payment_suppliers`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `suppliermyorders`
--
ALTER TABLE `suppliermyorders`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminaddequipment`
--
ALTER TABLE `adminaddequipment`
  MODIFY `ItemId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1240;

--
-- AUTO_INCREMENT for table `adminevents`
--
ALTER TABLE `adminevents`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminpasswords`
--
ALTER TABLE `adminpasswords`
  MODIFY `userid` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_classes`
--
ALTER TABLE `client_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_equipment`
--
ALTER TABLE `client_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_refreshments`
--
ALTER TABLE `client_refreshments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coach_classes`
--
ALTER TABLE `coach_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coach_class_details`
--
ALTER TABLE `coach_class_details`
  MODIFY `indexNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coach_details`
--
ALTER TABLE `coach_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coach_students`
--
ALTER TABLE `coach_students`
  MODIFY `indexNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manager_payment_suppliers`
--
ALTER TABLE `manager_payment_suppliers`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
