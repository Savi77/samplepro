-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2019 at 08:20 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_universal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_service_list`
--

CREATE TABLE `tbl_product_service_list` (
  `prd_srv_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `prdsrv_name` varchar(50) NOT NULL,
  `prdsrv_type` varchar(25) NOT NULL,
  `image` varchar(35) NOT NULL,
  `prd_brand` int(11) NOT NULL,
  `prd_specs` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `prdsrv_uom` int(11) NOT NULL,
  `prdsrv_description` varchar(250) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `sgst_tax` double NOT NULL,
  `cgst_tax` double NOT NULL,
  `igst_tax` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_service_list`
--

INSERT INTO `tbl_product_service_list` (`prd_srv_id`, `org_id`, `menu_id`, `submenu_id`, `prdsrv_name`, `prdsrv_type`, `image`, `prd_brand`, `prd_specs`, `price`, `prdsrv_uom`, `prdsrv_description`, `status`, `delete_status`, `date_created`, `sgst_tax`, `cgst_tax`, `igst_tax`) VALUES
(3, 11, 3, 3, 'Tally Products', 'product', '251119163804.jpg', 0, 0, '15200.00', 2, 'This is test', 1, 0, '2019-11-25 16:38:04', 0, 0, 0),
(4, 11, 6, 8, 'Regular LIft', 'product', '021219122547.jpg', 0, 0, '500000.00', 2, 'Basic Description', 1, 0, '2019-12-02 12:25:47', 0, 0, 0),
(5, 11, 6, 9, 'Elevator', 'product', '101219122956.jpg', 0, 0, '999999.99', 2, 'my lift', 1, 0, '2019-12-10 12:29:56', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product_service_list`
--
ALTER TABLE `tbl_product_service_list`
  ADD PRIMARY KEY (`prd_srv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product_service_list`
--
ALTER TABLE `tbl_product_service_list`
  MODIFY `prd_srv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
