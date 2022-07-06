-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 05:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carparking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ps_id` int(10) NOT NULL,
  `duration` int(11) NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `ps_id`, `duration`, `paid`, `status`, `time`) VALUES
(1, 300, 1, 1, '100.00', 'Exit', '08-11-2021 11:54:15'),
(2, 300, 1, 2, '200.00', 'Exit', '06-11-2021 11:54:15'),
(3, 300, 2, 2, '200.00', 'Exit', '2021-11-08 11:58:51'),
(4, 300, 3, 5, '500.00', 'Exit', '2021-11-15 16:11:23'),
(5, 300, 4, 1, '100.00', 'Pending', '2021-11-15 16:48:23'),
(6, 300, 4, 1, '100.00', 'Exit', '2021-11-15 16:49:05'),
(7, 300, 4, 1, '100.00', 'Pending', '2021-11-18 14:24:37'),
(8, 300, 3, 4, '400.00', 'Exit', '2021-11-18 14:26:03'),
(9, 300, 4, 3, '300.00', 'Exit', '2021-11-18 17:41:38'),
(10, 300, 6, 1, '100.00', 'Exit', '2021-11-19 09:40:19'),
(11, 300, 5, 3, '300.00', 'PAID', '2021-11-19 09:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `card_pay`
--

CREATE TABLE `card_pay` (
  `cardpay_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `card_na` varchar(20) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `exp_date` varchar(10) NOT NULL,
  `card_type` varchar(20) NOT NULL DEFAULT 'credit/debit'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_pay`
--

INSERT INTO `card_pay` (`cardpay_id`, `uid`, `card_na`, `card_no`, `exp_date`, `card_type`) VALUES
(1, 300, 'sam', '1234567890123456', '12/25', 'credit/debit'),
(2, 300, 'qwerty', '1234567890123456', '12/25', 'credit/debit'),
(3, 300, 'qwertyu', '1234567890123456', '12/25', 'credit/debit'),
(4, 300, 'qwert', '1122334455667788', '12/25', 'credit/debit'),
(5, 300, 'qwert', '1234567890123456', '12/25', 'credit/debit'),
(6, 300, 'rrr', '1234567890123456', '12/25', 'credit/debit'),
(7, 300, 'qwertyu', '1234567890123456', '12/25', 'credit/debit'),
(8, 300, 'qwert', '1234567890123456', '12/45', 'credit/debit'),
(9, 300, 'qwer', '1234567890123456', '12/24', 'credit/debit'),
(10, 300, 'wqert', '1234567890123456', '12/25', 'credit/debit'),
(11, 300, 'qwert', '1234567890123456', '12/25', 'credit/debit'),
(12, 300, 'qwretrtyu', '1234567890123456', '12/25', 'credit/debit'),
(13, 300, 'wdefg', '112233445566778899', '12/25', 'credit/debit'),
(14, 300, 'plmkoijn', '1234567891234560', '12/25', 'credit/debit'),
(15, 300, 'qwert', '1234567890123456', '12/24', 'credit/debit'),
(16, 300, 'qwert', '1234567890123456', '12/25', 'credit/debit');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `hna` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not-verified',
  `type` varchar(20) NOT NULL DEFAULT 'customer'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `uid`, `name`, `lname`, `phone`, `email`, `hna`, `city`, `pin`, `status`, `type`) VALUES
(1, 300, 'Test', 'test', 9874561230, 'test@gmail.com', 'test house', 'test city', '683593', 'verified', 'customer'),
(2, 301, 'Tony', 'Stark', 9874561230, 'tony@stark.in', 'Stark Industries', 'NYC', '455551', 'verified', 'customer'),
(3, 303, 'Glen', 'maxwell', 7458692013, 'glen.m@gmail.com', 'abc house', 'queensland', '654321', 'verified', 'customer'),
(4, 304, 'clint', 'antony', 7736324336, 'clint@gmail.com', 'p h', 'Kochi', '68006', 'verified', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `pay_status` varchar(20) NOT NULL DEFAULT 'paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `bid`, `pay_status`) VALUES
(1, 1, 'paid'),
(2, 4, 'paid'),
(3, 4, 'paid'),
(4, 0, 'Fine Amount'),
(5, 1, 'Fine Amount'),
(6, 1, 'Fine Amount'),
(7, 5, 'paid'),
(8, 7, 'paid'),
(9, 8, 'paid'),
(10, 1, 'paid'),
(11, 3, 'paid'),
(12, 4, 'paid'),
(13, 4, 'paid'),
(14, 3, 'Fine Amount'),
(15, 6, 'paid'),
(16, 1, 'Fine Amount'),
(17, 6, 'Fine Amount'),
(18, 8, 'paid'),
(19, 8, 'paid'),
(20, 9, 'paid'),
(21, 10, 'paid'),
(22, 11, 'paid'),
(23, 10, 'Fine Amount');

-- --------------------------------------------------------

--
-- Table structure for table `pslot`
--

CREATE TABLE `pslot` (
  `ps_id` int(11) NOT NULL,
  `npslot` varchar(50) NOT NULL,
  `slotrate` decimal(10,2) DEFAULT NULL,
  `slotstatus` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pslot`
--

INSERT INTO `pslot` (`ps_id`, `npslot`, `slotrate`, `slotstatus`) VALUES
(1, 'P01', '100.00', 'Active'),
(2, 'P02', '100.00', 'Active'),
(3, 'P03', '100.00', 'Active'),
(4, 'P04', '100.00', 'Active'),
(5, 'P05', '100.00', 'in-active'),
(6, 'P06', '100.00', 'Active'),
(7, 'P07', '100.00', 'Active'),
(8, 'P08', '100.00', 'Active'),
(9, 'P09', '100.00', 'Active'),
(10, 'P10', '100.00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `resaddress` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `datejoined` date DEFAULT NULL,
  `jobpos` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'staff'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `uid`, `firstname`, `lastname`, `email`, `phone`, `resaddress`, `street`, `city`, `state`, `datejoined`, `jobpos`, `status`, `type`) VALUES
(1100, 2, 'Staff', 'Staff', 'staff@gmail.com', 7894561230, 'staff house', 'Park-iN street', 'Kochi', 'Kerala', '2021-09-26', 'verifier', 'active', 'staff'),
(1101, 302, 'Clinston', 'Antony', 'clinston@gmail.com', 9745312880, 'Park-in', 'Park-iN street', 'Kochi', 'Kerala', '2021-06-01', 'verifier', 'active', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'customer'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `lname`, `email`, `password`, `status`, `type`) VALUES
(1, 'Admin', '', 'admin@gmail.com', 'admin', 'active', 'admin'),
(2, 'Staff', 'staff', 'staff@gmail.com', 'staff', 'active', 'staff'),
(300, 'Test', 'test', 'test@gmail.com', '123456789', 'active', 'customer'),
(301, 'Tony', 'Stark', 'tony@stark.in', 'tony123', 'in-active', 'customer'),
(302, 'Clinston', 'Antony', 'clinston@gmail.com', '123', 'active', 'staff'),
(303, 'Glen', 'maxwell', 'glen.m@gmail.com', 'glen123', 'active', 'customer'),
(304, 'clint', 'antony', 'clint@gmail.com', 'clint123', 'active', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logoutTime` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `email`, `ip`, `loginTime`, `logoutTime`, `status`) VALUES
(1, 'admin@gmail.com', '::1\0\0\0\0\0\0\0\0\0\0\0\0\0', '2021-08-26 11:18:50', '2021-08-26 17:27:50', 1),
(2, 'admin@gmail.com', '142.251.42.68', '2021-10-08 20:44:30', '2021-10-09 17:01:37', 1),
(3, 'staff@gmail.com', '216.58.196.68', '2021-10-08 20:58:07', '2021-10-09 02:35:11', 1),
(4, 'staff@gmail.com', '216.58.196.68', '2021-11-06 05:43:51', '2021-11-06 11:14:50', 1),
(5, 'test@gmail.com', '216.58.196.68', '2021-11-06 05:45:12', '2021-11-06 11:16:42', 1),
(6, 'admin@gmail.com', '216.58.196.68', '2021-11-06 05:46:53', '2021-11-06 11:17:15', 1),
(7, 'test@gmail.com', '216.58.196.68', '2021-11-06 05:47:28', '2021-11-06 12:28:50', 1),
(8, 'staff@gmail.com', '142.250.182.100', '2021-11-06 06:59:07', '2021-11-06 12:30:53', 1),
(9, 'test@gmail.com', '142.250.182.100', '2021-11-06 07:01:05', '2021-11-06 12:32:11', 1),
(10, 'staff@gmail.com', '142.250.182.100', '2021-11-06 07:02:17', '2021-11-06 14:56:37', 1),
(11, 'test@gmail.com', '142.250.182.100', '2021-11-06 09:27:00', '2021-11-06 15:51:41', 1),
(12, 'admin@gmail.com', '142.250.182.100', '2021-11-06 10:21:54', '2021-11-06 15:54:03', 1),
(13, 'test@gmail.com', '216.58.196.68', '2021-11-06 10:24:11', '2021-11-06 15:54:54', 1),
(14, 'admin@gmail.com', '216.58.196.68', '2021-11-06 10:25:02', '2021-11-08 10:06:32', 1),
(15, 'staff@gmail.com', '142.250.182.100', '2021-11-08 04:36:42', '2021-11-08 10:35:57', 1),
(16, 'admin@gmail.com', '142.251.42.36', '2021-11-08 05:06:21', NULL, 1),
(17, 'admin@gmail.com', '142.250.182.100', '2021-11-08 05:47:52', '2021-11-08 11:50:39', 1),
(18, 'test@gmail.com', '142.251.42.68', '2021-11-08 06:20:56', '2021-11-08 11:54:55', 1),
(19, 'admin@gmail.com', '142.251.42.68', '2021-11-08 06:25:02', '2021-11-08 11:55:11', 1),
(20, 'admin@gmail.com', '142.251.42.68', '2021-11-08 06:25:52', '2021-11-08 11:58:37', 1),
(21, 'test@gmail.com', '142.251.42.68', '2021-11-08 06:28:43', '2021-11-08 11:59:10', 1),
(22, 'admin@gmail.com', '142.250.182.100', '2021-11-08 06:29:16', '2021-11-08 13:59:31', 1),
(23, 'admin@gmail.com', '142.251.42.68', '2021-11-15 10:21:37', '2021-11-15 15:53:17', 1),
(24, 'admin@gmail.com', '216.58.196.68', '2021-11-15 10:34:18', '2021-11-15 16:10:03', 1),
(25, 'staff@gmail.com', '142.250.182.4', '2021-11-15 10:40:15', '2021-11-15 16:10:37', 1),
(26, 'test@gmail.com', '216.58.196.68', '2021-11-15 10:40:51', '2021-11-15 16:19:53', 1),
(27, 'staff@gmail.com', '216.58.196.68', '2021-11-15 10:50:59', '2021-11-15 16:21:50', 1),
(28, 'test@gmail.com', '172.217.160.164', '2021-11-15 10:59:10', '2021-11-15 16:31:05', 1),
(29, 'test@gmail.com', '172.217.160.164', '2021-11-15 11:01:37', '2021-11-15 16:33:50', 1),
(30, 'admin@gmail.com', '172.217.160.164', '2021-11-15 11:03:58', '2021-11-15 16:39:37', 1),
(31, 'admin@gmail.com', '142.250.182.4', '2021-11-15 11:10:15', '2021-11-15 16:40:23', 1),
(32, 'test@gmail.com', '142.250.182.4', '2021-11-15 11:10:33', '2021-11-15 16:56:17', 1),
(33, 'test@gmail.com', '172.217.27.196', '2021-11-17 06:01:14', NULL, 1),
(34, 'test@gmail.com', '142.250.67.36', '2021-11-17 06:55:37', '2021-11-17 15:19:44', 1),
(35, 'admin@gmail.com', '216.58.196.68', '2021-11-17 09:49:48', '2021-11-17 15:37:13', 1),
(36, 'admin@gmail.com', '142.250.67.36', '2021-11-18 07:02:14', '2021-11-18 12:32:26', 1),
(37, 'test@gmail.com', '142.250.67.36', '2021-11-18 07:07:40', '2021-11-18 13:59:08', 1),
(38, 'admin@gmail.com', '142.250.182.4', '2021-11-18 08:29:19', '2021-11-18 14:13:03', 1),
(39, 'test@gmail.com', '142.250.67.36', '2021-11-18 08:54:19', '2021-11-18 14:31:08', 1),
(40, 'staff@gmail.com', '142.251.42.68', '2021-11-18 09:01:20', '2021-11-18 14:57:04', 1),
(41, 'test@gmail.com', '172.217.160.164', '2021-11-18 09:27:17', '2021-11-18 14:58:51', 1),
(42, 'test@gmail.com', '172.217.160.164', '2021-11-18 09:29:44', '2021-11-18 15:54:25', 1),
(43, 'admin@gmail.com', '142.251.42.68', '2021-11-18 10:24:34', '2021-11-18 17:41:14', 1),
(44, 'test@gmail.com', '216.58.196.68', '2021-11-18 12:11:23', '2021-11-19 09:39:51', 1),
(45, 'test@gmail.com', '142.250.67.36', '2021-11-19 04:10:02', '2021-11-19 11:35:58', 1),
(46, 'admin@gmail.com', '142.250.182.36', '2021-11-19 06:06:07', '2021-11-19 11:39:10', 1),
(47, 'staff@gmail.com', '142.250.182.36', '2021-11-19 06:09:17', '2021-11-19 11:40:43', 1),
(48, 'admin@gmail.com', '142.250.182.36', '2021-11-19 06:10:53', '2021-11-19 17:01:57', 1),
(49, 'test@gmail.com', '172.217.27.196', '2021-11-19 11:32:10', '2021-11-19 17:36:41', 1),
(50, 'test@gmail.com', '142.250.192.68', '2021-12-02 15:07:41', '2021-12-02 20:40:10', 1),
(51, 'admin@gmail.com', '142.250.192.68', '2021-12-02 15:10:25', '2021-12-02 20:42:30', 1),
(52, 'admin@gmail.com', '142.250.192.68', '2021-12-02 15:13:57', NULL, 1),
(53, 'admin@gmail.com', '142.250.192.68', '2021-12-02 15:42:28', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `pslot_fk` (`ps_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `card_pay`
--
ALTER TABLE `card_pay`
  ADD PRIMARY KEY (`cardpay_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk` (`uid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `booking_id` (`bid`);

--
-- Indexes for table `pslot`
--
ALTER TABLE `pslot`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `staff_fk` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `card_pay`
--
ALTER TABLE `card_pay`
  MODIFY `cardpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pslot`
--
ALTER TABLE `pslot`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1102;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
