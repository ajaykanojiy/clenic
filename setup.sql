-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 03:44 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `setup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(25) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `dob`, `emailid`, `password`, `image`, `mobile_no`, `address`, `city`, `state`, `country`, `zip_code`, `status`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Super admin', 'Dsoi', '16/08/1945', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'images/admin_image/1.jpg', '9999098890', 'jabalpur', 'jabalpur', 'Madhya pradesh', 'india', '482002', 'yes', '2020-03-23 10:46:54', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pri_mobile` bigint(20) NOT NULL,
  `whatsup_no` bigint(255) NOT NULL,
  `sec_mobile` bigint(20) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `aadharcard_no` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active 2=inactive 3=alloted',
  `booking_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=available 2=booked 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `pri_mobile`, `whatsup_no`, `sec_mobile`, `dob`, `address`, `aadharcard_no`, `image`, `status`, `booking_status`) VALUES
(1, 'Dummy', 'stayinclassluxurypg@gmail.com', 123456, 321, 123, '2009-08-25', 'F-32 sector - 41', 123456, '', 2, 0),
(2, 'Bhumika', 'abcd@gmail.com', 9958987511, 9958987511, 9958987511, '1998-08-05', '', 123, '', 1, 1),
(3, 'Shivangini Agarwal', 'abcd@gmal.com', 9732304710, 9732304710, 9732304710, '2001-04-16', '', 1234, '', 1, 1),
(4, 'Samarpita', 'abcd@gmal.com', 9568524055, 9568524055, 9568524055, '1995-06-29', '', 1234, '', 1, 1),
(5, 'Manisha Goyal', 'abcd@gmal.com', 7665919488, 7665919488, 7665919488, '1997-06-12', '', 12345, '', 1, 1),
(6, 'Naina Kumari', 'abcd@gmal.com', 9958365943, 9958365943, 9958365943, '1995-08-15', '', 12345, '', 1, 1),
(7, 'Arpita Jaiswal', 'abcd@gmal.com', 8800779299, 8800779299, 8800779299, '2018-08-12', '', 12345, '', 1, 1),
(8, 'Pragya Singh', 'abcd@gmal.com', 8449069357, 8449069357, 8449069357, '1997-08-19', '', 12345, '', 1, 1),
(9, 'Khushboo Iqbal', 'abcd@gmal.com', 7006435862, 7006435862, 7006435862, '1997-02-06', '', 12345, '', 1, 1),
(10, 'Nikita Jaiswal', 'abcd@gmal.com', 8527110909, 8527110909, 8527110909, '1992-03-25', '', 12345, '', 1, 1),
(11, 'Sambhavi  Nanda', 'abcd@gmal.com', 9097890366, 9097890366, 9097890366, '1995-01-27', '', 12345, '', 1, 1),
(12, 'Tanya Saxena', 'abcd@gmal.com', 9818079172, 9818079172, 9818079172, '1998-08-01', '', 12345, '', 1, 1),
(13, 'Pooja Missing', 'abcd@gmal.com', 8800209459, 8800209459, 8800209459, '1994-10-20', '', 12345, '', 1, 1),
(14, 'Antra Nag', 'abcd@gmal.com', 9460258301, 9460258301, 9460258301, '1994-03-06', '', 12345, '', 1, 1),
(15, 'Pragya Singh 2', 'abcd@gmal.com', 8295051761, 8295051761, 8295051761, '1998-01-25', '', 12345, '', 1, 1),
(16, 'Sunita Missing', 'abcd@gmal.com', 9999098810, 9999098810, 9999098810, '2020-03-01', '', 12345, '', 1, 1),
(17, 'Megha Basu', 'abcd@gmal.com', 7838039095, 7838039095, 7838039095, '1993-04-17', '', 1234, '', 1, 1),
(18, 'Shreya Gupta', 'abcd@gmal.com', 9411442193, 9411442193, 9411442193, '1988-01-27', '', 1234, '', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `email`, `address`, `type`, `status`) VALUES
(1, 'Mohit', 9810565610, 'gguptamohit@gmail.com', 'NA', 4, 1),
(2, 'Rajni Poddar', 9999098890, 'stayinclassluxuryhome@gmail.com', 'NA', 1, 1),
(3, 'Naveen Poddar', 9999098890, 'stayinclassluxuryhome@gmail.com', 'Na', 1, 1),
(4, 'Suresh Gupta', 9312360821, 'stayinclassluxuryhome@gmail.com', 'na', 1, 1),
(5, 'Sneh Gupta', 9999098860, 'stayinclassluxuryhome@gmail.com', 'NA', 1, 1),
(6, 'Pallavi P', 9873913094, 'stayinclassluxuryhome@gmail.com', 'NA', 4, 1),
(7, 'Abhimanyu', 8800779299, 'stayinclassluxurypg@gmail.com', 'NA', 1, 1),
(8, 'Yogesh', 9999098840, 'stayinclassluxurypg@gmail.com', 'NA', 4, 1),
(11, 'Arun', 9999098810, 'stayinclassluxurypg@gmail.com', 'na', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` int(11) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT '1=admin 2=emp 3=user',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `log_id`, `name`, `number`, `email`, `password`, `designation`, `type`, `status`) VALUES
(1, 1, 'Mohit', 9810565610, 'gguptamohit@gmail.com', 'e3b04a1c4e4485b3db7152214190ec33', 0, '4', 1),
(2, 2, 'Rajni Poddar', 9999098890, 'stayinclassluxuryhome@gmail.com', 'f76d0e7f935a1753e740d61cda58f715', 0, '1', 1),
(3, 3, 'Naveen Poddar', 9999098890, 'stayinclassluxuryhome@gmail.com', 'f76d0e7f935a1753e740d61cda58f715', 0, '1', 1),
(4, 4, 'Suresh Gupta', 9312360821, 'stayinclassluxuryhome@gmail.com', '03416352b248edf0c2f3097002fb7b21', 0, '1', 1),
(5, 5, 'Sneh Gupta', 9999098860, 'stayinclassluxuryhome@gmail.com', '56ccb866271d84b2d2f7405da14e1bf8', 0, '1', 1),
(6, 6, 'Pallavi P', 9873913094, 'stayinclassluxuryhome@gmail.com', '1c267ec7f1ad167ed967b91788f4dc7b', 0, '4', 1),
(7, 7, 'Abhimanyu', 8800779299, 'stayinclassluxurypg@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, '1', 1),
(8, 8, 'Yogesh', 9999098840, 'stayinclassluxurypg@gmail.com', '8731e002db77e03c83ad8398bb272655', 0, '4', 1),
(11, 11, 'Arun', 9999098810, 'stayinclassluxurypg@gmail.com', '27352b2261b96e0a82ea98e881c68d1b', 0, '2', 1),
(12, 1, 'Dummy', 123456, 'stayinclassluxurypg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '3', 1),
(13, 2, 'Bhumika', 9958987511, 'abcd@gmail.com', '962bc08e59a1729489909706c0aa5aaf', 0, '3', 1),
(14, 3, 'Shivangini Agarwal', 9732304710, 'abcd@gmal.com', 'be7f1e97165394e27054b7195545b5c2', 0, '3', 1),
(15, 4, 'Samarpita', 9568524055, 'abcd@gmal.com', '3d770e9f62e2acdc065256a65d0d61a5', 0, '3', 1),
(16, 5, 'Manisha Goyal', 7665919488, 'abcd@gmal.com', '9233075dd75ba2eb1d07cbc972964cfe', 0, '3', 1),
(17, 6, 'Naina Kumari', 9958365943, 'abcd@gmal.com', '4647b7762b9f6c7ebb416396555a0834', 0, '3', 1),
(18, 7, 'Arpita Jaiswal', 8800779299, 'abcd@gmal.com', '21232f297a57a5a743894a0e4a801fc3', 0, '3', 1),
(19, 8, 'Pragya Singh', 8449069357, 'abcd@gmal.com', '6212cc30821720eb02a7736c40a92a44', 0, '3', 1),
(20, 9, 'Khushboo Iqbal', 7006435862, 'abcd@gmal.com', '1acc613c1cd12bb6b598d84e4462b253', 0, '3', 1),
(21, 10, 'Nikita Jaiswal', 8527110909, 'abcd@gmal.com', 'ff6219f46bba77409f62fc8f016c1094', 0, '3', 1),
(22, 11, 'Sambhavi  Nanda', 9097890366, 'abcd@gmal.com', '8a822f1e237c4080a9cb2b974437389d', 0, '3', 1),
(23, 12, 'Tanya Saxena', 9818079172, 'abcd@gmal.com', 'ab8688194080a989ada3f245431cd7c1', 0, '3', 1),
(24, 13, 'Pooja Missing', 8800209459, 'abcd@gmal.com', 'a6d1b20bb16a978f6976b24dde950561', 0, '3', 1),
(25, 14, 'Antra Nag', 9460258301, 'abcd@gmal.com', 'bf373644f120614d3e5cf2d66ededcfa', 0, '3', 1),
(26, 15, 'Pragya Singh 2', 8295051761, 'abcd@gmal.com', 'c96e1f94b0625b78f443fcd2bef6e539', 0, '3', 1),
(27, 16, 'Sunita Missing', 9999098810, 'abcd@gmal.com', '27352b2261b96e0a82ea98e881c68d1b', 0, '3', 1),
(28, 17, 'Megha Basu', 7838039095, 'abcd@gmal.com', 'f7904be46c56cf3888cb356f1265eda4', 0, '3', 1),
(29, 18, 'Shreya Gupta', 9411442193, 'abcd@gmal.com', '91538dd1faaa89d548e6314474fb2ca7', 0, '3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
