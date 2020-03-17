-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 07:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `bill_no` int(10) UNSIGNED NOT NULL,
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gross_total_price` int(11) NOT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT '0',
  `due_amount` int(11) NOT NULL DEFAULT '0',
  `customer_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`bill_no`, `c_date`, `gross_total_price`, `paid_status`, `due_amount`, `customer_name`) VALUES
(101, '2019-11-23 00:00:00', 11000, 1, 0, NULL),
(102, '2019-11-27 12:10:19', 233, 0, 2, NULL),
(103, '2020-03-17 21:05:46', 22, 1, 0, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `bmw`
--

CREATE TABLE `bmw` (
  `b_no` int(10) UNSIGNED NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cherry`
--

CREATE TABLE `cherry` (
  `b_no` int(10) UNSIGNED NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_name` varchar(50) DEFAULT 'unknown',
  `customer_id` int(11) NOT NULL,
  `dues` double DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `diamond`
--

CREATE TABLE `diamond` (
  `b_no` int(10) UNSIGNED NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jorjet`
--

CREATE TABLE `jorjet` (
  `b_no` int(10) UNSIGNED NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lx`
--

CREATE TABLE `lx` (
  `b_no` int(10) UNSIGNED NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nidha`
--

CREATE TABLE `nidha` (
  `b_no` int(10) UNSIGNED NOT NULL,
  `stock_amount` bigint(20) NOT NULL,
  `amount_sold` bigint(20) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `total_price` bigint(20) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `stock_piece` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nidha`
--

INSERT INTO `nidha` (`b_no`, `stock_amount`, `amount_sold`, `price`, `total_price`, `date_added`, `stock_piece`) VALUES
(103, 0, 22, 1, 22, '2020-03-17 21:05:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` double DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`, `date`) VALUES
(101, 'raju', 1, '67959999', '1', '2019-11-07 05:25:44', '2019-11-20'),
(102, 'aaaaa', 0, '11111', '1', '2019-11-28 09:18:00', '2019-11-14'),
(103, 'abc', 1, '123', '1', '2019-11-26 05:20:54', '2019-11-27'),
(104, 'bbb', 0, 'bbb', '1', '2019-11-05 05:26:23', '2019-11-27'),
(105, 'raj', 1, '123', '1', '2019-11-27 08:43:55', '2019-11-27'),
(106, 'aaa', 0, '111', '1', '2019-11-27 08:46:23', '2019-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmw`
--
ALTER TABLE `bmw`
  ADD PRIMARY KEY (`b_no`);

--
-- Indexes for table `cherry`
--
ALTER TABLE `cherry`
  ADD PRIMARY KEY (`b_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `diamond`
--
ALTER TABLE `diamond`
  ADD PRIMARY KEY (`b_no`);

--
-- Indexes for table `jorjet`
--
ALTER TABLE `jorjet`
  ADD PRIMARY KEY (`b_no`);

--
-- Indexes for table `lx`
--
ALTER TABLE `lx`
  ADD PRIMARY KEY (`b_no`);

--
-- Indexes for table `nidha`
--
ALTER TABLE `nidha`
  ADD PRIMARY KEY (`b_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
