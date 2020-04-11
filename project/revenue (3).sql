-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 01:17 PM
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
-- Database: `revenue`
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
  `amount` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`id`, `customer_id`, `employee_id`, `building_id`, `room_id`, `amount`, `rent`, `from_date`, `to_date`, `status`) VALUES
(1, 1, 5, 2, 4, '', '2000', '2020-02-12', '2020-02-29', 1),
(2, 4, 7, 3, 3, '', '5000', '2020-02-12', '2020-03-07', 1),
(3, 2, 7, 4, 1, '', '3500', '2020-02-10', '2020-03-07', 1),
(5, 3, 6, 4, 2, '', '2000', '2020-02-08', '2020-03-07', 1),
(6, 5, 9, 4, 1, '', '6001', '2020-02-14', '2020-03-01', 1),
(7, 1000, 6, 3, 3, '2000', 'sd', '2020-03-03', '2020-03-03', 1);

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
  `status` int(11) NOT NULL,
  `booking_status` enum('1','2') NOT NULL COMMENT '1 for avilable 2 for booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buil_details`
--

INSERT INTO `buil_details` (`id`, `Bullding_id`, `name`, `rent`, `status`, `booking_status`) VALUES
(1, 4, '1 bed', 2000, 1, '2'),
(2, 4, '2 bed', 3500, 1, '1'),
(3, 3, '1 bed', 2000, 1, '2'),
(4, 2, '1 bed', 3000, 1, '2');

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
  `status` int(11) NOT NULL COMMENT '1=active 2=inactive 3=alloted',
  `booking_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=available 2=booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `pri_mobile`, `whatsup_no`, `sec_mobile`, `dob`, `address`, `aadharcard_no`, `image`, `customer_type`, `status`, `booking_status`) VALUES
(1, 'cus', 'cus@gmail.com', 12345, 12345, 12345, '2020-02-18', 'ewfr', 12345, 'uploads/5e454aa93df66_download.jpg', 'c', 3, 1),
(2, 'cus2', 'cus2@gmail.com', 8770364802, 8770364802, 8770364802, '2020-02-19', 'sdgg', 1234567890, 'uploads/5e45648fbf48b_download (1).jpg', 'c', 3, 1),
(3, 'cus3', 'cus3@gmail.com', 9999999999, 9999999999, 9999999999, '2020-03-03', 'gfg', 987654321, 'uploads/5e4564da8a2f9_download (3).jpg', 'c', 3, 1),
(4, 'cus1', 'cus1@gmail.com', 1234567899, 1234567899, 1234567899, '2020-02-26', 'sdfg', 2147483647, 'uploads/5e45652e66375_user_image.jpg', 'c', 3, 1),
(5, 'Cust1', 'cust1@gmail.com', 9999098892, 9999999999, 999999999, '2009-01-06', 'AddCust1', 12345, '', 'c', 3, 1),
(6, 'dfd', 'demo@gamil.com', 432544, 463, 354346, '2020-02-18', 'gg', 46, '', 'c', 1, 1),
(1000, 'sad', 'de@gmail.com', 5454, 466, 4436, '2020-01-28', 'sdsfdf', 53254, 'uploads/5e4cd9336dd1b_images.jpg', 'c', 3, 1);

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
(6, 'emp2', 9999098820, 'emp2@gmail.com', 'dsgksfgkfg', 1),
(7, 'emp1', 9303119152, 'emp1@gmail.com', 'af', 1),
(8, 'Emp3', 9303119151, 'emp3@gmail.com', 'fdf', 1),
(9, 'Emp4', 9999098811, 'gmail2@gmail.com', 'Address4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `Item_detail` text NOT NULL,
  `paying_employee` int(11) NOT NULL,
  `amount_paid` bigint(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_type` bigint(11) NOT NULL,
  `sic_bill` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `vendor_bill` varchar(11) DEFAULT NULL,
  `shop_name` varchar(11) DEFAULT NULL,
  `vendor_type` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `manufacturing_company` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `stayinclass_asset_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `date`, `transaction_id`, `category`, `subcategory`, `Item_detail`, `paying_employee`, `amount_paid`, `payment_mode`, `building_id`, `room_id`, `room_type`, `sic_bill`, `comment`, `vendor_bill`, `shop_name`, `vendor_type`, `location`, `mobile`, `asset_id`, `model`, `manufacturing_company`, `warranty`, `stayinclass_asset_id`) VALUES
(1, '0000-00-00', 0, 0, 0, 'safasf', 6, 3123124, 43432, 2323, 2321, 0, 0, 'sfDF', '3423', 'xczx', 0, 'xcxzc', 'czcZ', 2141, 'wqe', 'wewe', 'wewe', 0),
(2, '0000-00-00', 932, 12, 22, 'wdd', 6, 3123124, 4556, 22, 2321, 3, 4546, 'gfghfg', '3423', 'xczx', 0, '5465', '42343253252', 2141, '45456', 'ghg', '65465', 45654),
(3, '2020-02-17', NULL, 2, 1, 'dsgsgg', 0, 600, 1, 4, 2, 1, 65, 'fdsf', '', '', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `name`, `status`) VALUES
(1, 'electricity bil', 1),
(2, 'Grocery Bill', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_subcategory`
--

CREATE TABLE `expense_subcategory` (
  `id` int(11) NOT NULL,
  `exp_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_subcategory`
--

INSERT INTO `expense_subcategory` (`id`, `exp_category_id`, `name`, `status`) VALUES
(1, 2, 'sugar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `income_register`
--

CREATE TABLE `income_register` (
  `register_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `other_emp_id` int(11) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `mode` int(11) NOT NULL,
  `other_mode` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_register`
--

INSERT INTO `income_register` (`register_id`, `customer_id`, `employee_id`, `other_emp_id`, `income`, `expense`, `mode`, `other_mode`, `comment`, `payment_status`) VALUES
(1, 2, 7, 0, 2000, 0, 1, 0, '', 0),
(2, 0, 7, 6, 0, 500, 1, 0, '  FG', 0),
(3, 0, 6, 7, 500, 0, 1, 0, '  FG', 0),
(4, 2, 7, 0, 1000, 0, 2, 0, '', 0),
(5, 0, 7, 6, 0, 500, 2, 0, '  fgygy', 0),
(6, 0, 6, 7, 500, 0, 2, 0, '  fgygy', 0),
(7, 4, 6, 0, 1000, 0, 3, 0, '', 0),
(8, 2, 9, 0, 501, 0, 1, 0, '', 0),
(9, 0, 9, 8, 0, 200, 1, 0, '  g', 0),
(10, 0, 8, 9, 200, 0, 1, 0, '  g', 0),
(11, 2, 6, NULL, 56, 0, 1, 0, NULL, NULL),
(12, NULL, 6, 8, NULL, 5, 2, 1, '    ', NULL),
(13, NULL, 6, 7, NULL, 1200, 2, 1, '  asds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `customer_id`, `month`, `amount`, `total_amount`, `status`) VALUES
(1, 5, '02-2020', 6001, 6001, 0),
(2, 1000, '02-2020', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_install`
--

CREATE TABLE `invoice_install` (
  `invoice_instaill_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
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
(6, 0, 'Mohit', 12345, 'mohit@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '1', 1),
(9, 1, 'cus', 123456, 'cus@gmail.com', '5ed3341e31fc13fb3bb013723b9c14be', 0, '3', 1),
(10, 6, 'Emp2', 9999098820, 'emp2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2', 1),
(11, 7, 'Emp1', 9303119152, 'emp1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2', 1),
(12, 8, 'Emp3', 9303119151, 'emp3@gmail.com', 'd4de43be683c4a47b9e5b52b2f191cb0', 0, '2', 1),
(13, 2, 'cus2', 8770364802, 'cus2@gmail.com', 'c994c24be1365f2aec1e71f95237af82', 0, '3', 1),
(14, 3, 'cus3', 9999999999, 'cus3@gmail.com', 'e0ec043b3f9e198ec09041687e4d4e8d', 0, '3', 1),
(15, 4, 'cus1', 1234567899, 'cus1@gmail.com', 'fbe82b93c071bedda31afded400cca52', 0, '3', 1),
(16, 9, 'Emp4', 9999098811, 'gmail2@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2', 1),
(17, 5, 'Cust1', 9999098892, 'cust1@gmail.com', 'ee9219c4c856e2a373b85fc73b51039b', 0, '3', 1),
(18, 6, 'dfd', 432544, 'demo@gamil.com', 'b117dc7c9b3188c8ae60909d575cf818', 0, '3', 1),
(19, 1000, 'sad', 5454, 'de@gmail.com', '107030ca685076c0ed5e054e2c3ed940', 0, '3', 1);

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
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `name`, `status`) VALUES
(1, 'Cash', 1),
(2, 'Phone pay', 1),
(3, 'Paytm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `rent` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`id`, `emp_id`, `building_id`, `room_id`, `customer_id`, `payment_type`, `rent`, `amount`, `payment_mode`, `date`, `comment`, `status`) VALUES
(1, 6, 4, 1, 2, NULL, 3500, 56, 1, '2020-02-25', 'sds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refund_new`
--

CREATE TABLE `refund_new` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `room_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`id`, `emp_id`, `building_id`, `room_id`, `customer_id`, `rent`, `room_type`, `amount`, `payment_mode`, `date`, `comment`, `status`) VALUES
(9, 7, 3, 1, 2, 3500, 0, 2000, 1, '2020-02-18', 'FF', 0),
(10, 7, 4, 1, 2, 3500, 0, 1000, 2, '2020-02-12', 'fffds', 0),
(11, 6, 3, 3, 4, 5000, 0, 1000, 3, '2020-03-31', 'sgfgf', 0),
(12, 9, 4, 1, 2, 3500, 0, 501, 1, '2020-02-11', 'hi sir', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `status`) VALUES
(1, 'PG', 1),
(2, 'Personal', 1),
(3, 'Individual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vender`
--

CREATE TABLE `vender` (
  `id` int(11) NOT NULL,
  `exep_category` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_type` int(11) NOT NULL,
  `vdor_business` varchar(255) NOT NULL,
  `building_id` int(11) NOT NULL,
  `date_of_onboarding` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `refrence_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `mobile2` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `shop_address` text NOT NULL,
  `gst` int(11) NOT NULL,
  `stauts` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vender`
--

INSERT INTO `vender` (`id`, `exep_category`, `vendor_name`, `vendor_type`, `vdor_business`, `building_id`, `date_of_onboarding`, `date_of_leaving`, `refrence_name`, `mobile`, `mobile2`, `landline`, `shop_address`, `gst`, `stauts`, `createdat`) VALUES
(1, 2, 'vender1', 5, 'grocery store', 4, '2020-02-15', '2020-03-01', 'emp1', '9303119152', '9303119152', '9303119152', 'dfdfdsf', 33646, 1, '2020-02-15 09:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `vender_type`
--

CREATE TABLE `vender_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vender_type`
--

INSERT INTO `vender_type` (`id`, `name`, `status`) VALUES
(1, 'Landlord', 1),
(2, 'Shop', 1),
(3, 'Electrician', 1),
(4, 'Plumber', 1),
(5, 'Grocery Store', 1);

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
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_subcategory`
--
ALTER TABLE `expense_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_register`
--
ALTER TABLE `income_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_install`
--
ALTER TABLE `invoice_install`
  ADD PRIMARY KEY (`invoice_instaill_id`);

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
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_new`
--
ALTER TABLE `refund_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vender`
--
ALTER TABLE `vender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vender_type`
--
ALTER TABLE `vender_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allotment`
--
ALTER TABLE `allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buil_details`
--
ALTER TABLE `buil_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_subcategory`
--
ALTER TABLE `expense_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_register`
--
ALTER TABLE `income_register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_install`
--
ALTER TABLE `invoice_install`
  MODIFY `invoice_instaill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refund_new`
--
ALTER TABLE `refund_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vender`
--
ALTER TABLE `vender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vender_type`
--
ALTER TABLE `vender_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
