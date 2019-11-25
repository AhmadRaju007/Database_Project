-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 07:24 PM
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
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `m_units` int(11) NOT NULL,
  `g_units` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT '0',
  `due_amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`bill_no`, `c_date`, `p_id`, `p_name`, `m_units`, `g_units`, `unit_price`, `total_price`, `paid_status`, `due_amount`) VALUES
(101, '2019-11-23 22:23:44', 1, 'LX', 102, 110, 120, 11000, 1, 0);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `is_active`, `password`, `created_by`, `created_at`) VALUES
(101, 'raju', 1, '67959999', '1', '2019-11-07 05:25:44'),
(102, 'aaaaa', 0, '11111', '1', '2019-11-04 09:18:00'),
(103, 'abc', 1, '123', '1', '2019-11-05 05:20:54'),
(104, 'bbb', 0, 'bbb', '1', '2019-11-05 05:26:23'),
(105, 'raj', 1, '123', '1', '2019-11-07 08:43:55'),
(106, 'aaa', 0, '111', '1', '2019-11-07 08:46:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`bill_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `bill_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
