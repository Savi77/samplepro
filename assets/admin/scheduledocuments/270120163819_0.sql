-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2020 at 04:27 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_universal_24jan2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_org_account_period`
--

CREATE TABLE `tbl_org_account_period` (
  `period_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `period_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_org_account_period`
--

INSERT INTO `tbl_org_account_period` (`period_id`, `org_id`, `period_name`, `start_date`, `end_date`, `status`, `date_created`) VALUES
(1, 11, '2020-2021', '2020-01-23', '2021-01-22', 1, '2020-01-23 19:50:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_org_account_period`
--
ALTER TABLE `tbl_org_account_period`
  ADD PRIMARY KEY (`period_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_org_account_period`
--
ALTER TABLE `tbl_org_account_period`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
