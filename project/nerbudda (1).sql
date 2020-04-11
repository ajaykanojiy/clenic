-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 06:13 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nerbudda`
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
(1, 'admin', 'Dsoi', '16/08/1945', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'images/admin_image/1.jpg', '9303119152', 'jabalpur', 'jabalpur', 'Madhya pradesh', 'india', '482002', 'yes', '2020-02-07 04:27:14', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`id`, `customer_id`, `employee_id`, `building_id`, `room_id`, `rent`, `from_date`, `to_date`, `status`) VALUES
(1, 5, 1, 2, 1, '6000', '2020-12-14', '2020-12-22', 1),
(2, 8, 1, 2, 4, '6000', '2020-02-06', '2020-02-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `address`, `status`) VALUES
(1, 'chandrika tower', 'sastibridge', 1),
(2, 'dattcomplex', 'CIVILLINE', 1),
(3, 'BARGIHILS', 'BILHARI', 1),
(4, '41d1', '41d1 sector 41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buil_details`
--

CREATE TABLE `buil_details` (
  `id` int(11) NOT NULL,
  `Bullding_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rent` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buil_details`
--

INSERT INTO `buil_details` (`id`, `Bullding_id`, `name`, `rent`, `status`) VALUES
(1, 1, '1st Floor  1bhk', 5000, 1),
(2, 1, '1st Floor  2bhk', 7000, 1),
(3, 2, '2nd Floor 2bhk', 8000, 1),
(4, 2, '1st Floor 1bhk', 6000, 1),
(5, 4, '41DR1 - R2', 6500, 1);

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
  `customer_type` varchar(255) NOT NULL COMMENT '1= Customer, 2=Guest',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `pri_mobile`, `whatsup_no`, `sec_mobile`, `dob`, `address`, `aadharcard_no`, `image`, `customer_type`, `status`) VALUES
(1, 'admin', '', 9303119152, 0, 0, '', 'dsdsff', 0, '', '0', 1),
(2, 'cusomer_2', '', 9303119152, 0, 0, '2020-02-12', 'gftft', 0, 'uploads/5e3bcc84596e7_engag.jpg', '0', 1),
(3, 'neeraj', 'alliance@gmail.com', 7894561230, 0, 0, '2020-02-12', '', 2147483647, 'uploads/5e3bcd2a37e2e_user4-128x128.jpg', '0', 0),
(4, 'poonam', 'poonma@gmail.com', 1234567890, 1234567889900, 123456789900, '2020-02-19', 'fsfgdhtjy', 1234567890, 'uploads/5e3bdb50da81f_engag.jpg', '0', 1),
(5, 'dwsdajay', 'fdsfdsf', 455454, 436565, 46436436, '2020-02-12', '545454', 436547, 'uploads/5e3bdbbfeca74_images (2).jpg', '0', 1),
(6, 'safdf', 'dffddf', 45466, 57547475, 56754754, '2020-02-18', 'dfdfs', 63466, 'uploads/5e3bdc74ded8e_Orphic_Logo2.png', 'c', 1),
(7, 'pp', 'ddffddf', 3254636, 436465, 3543643, '2020-01-29', 'safdfdf', 3435, 'uploads/5e3c0b165e634_revenue.jpg', 'c', 1),
(8, 'Sargam Gupta', 'de@gamil.com', 9999098890, 7894561230, 7894566232, '2020-02-04', 'jabakpur', 9999, 'uploads/5e3d58cd5ba27_engag.jpg', 'c', 1);

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `email`, `address`, `status`) VALUES
(1, 'neeraj', 1234567891, 'alliance@gmail.com', 'sdfsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `designation`, `type`, `status`) VALUES
(1, 'admin', 'allianceadd@gmail.com', '123455', 0, '2', 1),
(2, 'upadhyay', 'alliance@gmail.com', '12345', 0, '2', 1),
(3, 'ajay', 'ajjukanojiya152@gmail.com', '12345', 0, '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `emp_id`, `payment`, `date`, `status`) VALUES
(6, 2, 1, 1000, '2020-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buil_details`
--
ALTER TABLE `buil_details`
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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allotment`
--
ALTER TABLE `allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buil_details`
--
ALTER TABLE `buil_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
