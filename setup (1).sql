-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:04 AM
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
(1, 'Super admin', 'Dsoi', '16/08/1945', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'images/admin_image/1.jpg', '9303119152', 'jabalpur', 'jabalpur', 'Madhya pradesh', 'india', '482002', 'yes', '2020-04-01 19:52:17', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT '1=active 2=inactive 3=alloted',
  `booking_status` int(11) DEFAULT 1 COMMENT '1=available 2=booked 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `number`, `password`, `booking_status`) VALUES
(1, 'admin', 1234567890, '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `main_educaton` varchar(255) DEFAULT NULL,
  `medical_reg_no` varchar(255) DEFAULT NULL,
  `speciality` int(11) DEFAULT NULL,
  `year_of_experience` varchar(255) DEFAULT NULL,
  `patients_per_hour` int(11) DEFAULT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'NULL',
  `status` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `number`, `main_educaton`, `medical_reg_no`, `speciality`, `year_of_experience`, `patients_per_hour`, `fees`, `gender`, `image`, `status`, `createdat`) VALUES
(1, 'ajaykant', '123', 'bd', '123', 0, '12', 5, NULL, 1, 'uploads/5e9554098b7ec_user_image.jpg', 1, '0000-00-00 00:00:00'),
(2, 'kanojiya', '254', 'md', '34', 0, '5', 7, NULL, 1, 'uploads/5e9555ff24b25_download (2).jpg', 1, '2020-04-14 11:49:43'),
(3, 'kanojya', '1234567890', 'md', '12345', 0, '1', 5, '500', 1, 'uploads/5e9558d39e7d4_user_image.jpg', 1, '2020-04-14 12:01:47');

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
(1, 'Dani', 9303119152, 'admin@matrimonial.com', 'hhhjhh', 1, 1),
(2, 'ajay', 9303119151, 'admin@matrimonial.com', 'jabplur', 1, 1),
(3, 'admin', 9303119153, 'admin@matrimonial.com', 'sadsd', 2, 1),
(4, 'Emp', 9303119150, 'admin@gmail.com', 'indore', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `close_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `start_time`, `end_time`, `status`, `open_time`, `close_time`) VALUES
(1, 'Morning Syndicate', '12am', '3:00', 1, '2:00', '3:00'),
(2, 'Kalayn', '12am', '5:45', 1, '3:45', '5:45');

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
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `designation` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '1=admin 2=emp 3=user',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `log_id`, `name`, `number`, `email`, `password`, `designation`, `type`, `status`) VALUES
(1, 1, 'admin', 9810565610, NULL, '1234', NULL, '3', 1),
(2, 1, 'Dani', 9303119152, 'admin@matrimonial.com', '123', NULL, '1', 1),
(3, 2, 'ajay', 9303119151, 'admin@matrimonial.com', 'fca4a02937e4bdf109822f200e18c627', NULL, '1', 1),
(4, 3, 'admin', 9303119153, 'admin@matrimonial.com', '74b656d04c03736c25b40fd8c702dbf4', NULL, '2', 1),
(5, 4, 'Emp', 9303119150, 'admin@gmail.com', 'cf16a1de8271a0ecfc63288fecd6e449', NULL, '3', 1),
(6, 3, 'kanojya', 1234567890, NULL, 'e807f1fcf82d132f9bb018ca6738a19f', NULL, '4', 1),
(7, 3, 'ajju', 8770364802, NULL, 'c994c24be1365f2aec1e71f95237af82', NULL, '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `sex` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `service` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `date`, `type`, `name`, `number`, `sex`, `dob`, `age`, `address`, `city`, `pincode`, `service`, `doctor`, `fees`, `amount`, `time`, `createdat`) VALUES
(1, '2020-03-21', 1, 'admin', '9810565610', 1, '2020-04-10', '12', 'sdsaf', 'jabapur', 482001, 2, 3, '300', 200, NULL, '2020-04-15 09:40:45'),
(2, '2020-02-05', 1, 'ajay', '8800779299', 1, '2020-04-21', '12', 'asdsafas', 'jabapur', 482001, 3, 3, '300', 200, NULL, '2020-04-15 10:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `open` int(11) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `close` int(11) DEFAULT NULL,
  `amount2` bigint(20) DEFAULT NULL,
  `jodi` int(11) DEFAULT NULL,
  `amount3` bigint(20) DEFAULT NULL,
  `pati` int(11) DEFAULT NULL,
  `amount4` bigint(20) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fees_amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `fees_amount`, `status`) VALUES
(1, 'camp', '20', 1),
(2, 'normal', '300', 1),
(3, 'poor', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id`, `name`, `status`) VALUES
(1, 'speciality1', 1),
(2, 'speciality2', 1),
(3, 'speciality3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT 'NULL',
  `age` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT 'NULL',
  `work_time` varchar(255) DEFAULT 'NULL',
  `image` varchar(255) DEFAULT NULL,
  `id_image` varchar(255) DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(255) DEFAULT 'NULL',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `type`, `name`, `father_name`, `age`, `sex`, `address`, `mobile`, `salary`, `work_time`, `image`, `id_image`, `id_number`, `createdat`, `date`, `status`) VALUES
(1, 2, 'ssdd', 'cdd', 0, 0, '', '', '', 'dd', 'uploads/5e9581d4de1b0_', 'uploads/5e9581d4e1a53_', NULL, '2020-04-14 09:26:44', '', 1),
(2, 2, 'ajju', 'abc', 12, 1, 'sfdsfdsf', '9303119156', '9000', '45', 'uploads/5e95b282beb20_user_image.jpg', 'uploads/5e95b282bf726_NHA ENGLISH LOG0-01 (1).png', '', '2020-04-14 12:28:43', '05-05-2020', 1),
(3, 3, 'ajju', 'abc', 30, 1, 'jabalpur', '8770364802', '15000', '12', 'uploads/5e95d66bd35bf_NHA ENGLISH LOG0-01 (1).png', 'uploads/5e95d66bdba73_download.jpg', NULL, '2020-04-14 15:27:39', '21-04-2020', 1);

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
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
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
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
