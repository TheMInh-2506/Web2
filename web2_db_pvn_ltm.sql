-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 02:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_db_pvn_ltm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'tan', 'phamvantan@gmail.com', 'tanadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `address`, `phone`, `password`) VALUES
(1, 'Phạm Văn Tân ', 'phamvantan@gmail.com', '.Sóc Trăng.', '.0763299252.', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Lý Thế Minh', 'lytheminh3q@gmail.com', '.Sóc Trăng.', '.0763299252.', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'ưda', 'ădwaw', '.Sóc Trăng.', '.0763299252.', '318023aa5b080e879660996fc46e4f77');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productid`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`, `note`) VALUES
(35, 14, '1', 1, 1, '1', '7039020c87.png', 1, '2021-05-25 15:59:37', NULL),
(91, 31, 'burger1', 2, 1, '94000', '41c3742f6c.png', 0, '2021-05-27 08:35:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productName`, `product_desc`, `price`, `image`) VALUES
(24, 'roll12', '12', 70000, 'ca7b077fa2.jpg'),
(25, 'roll13', '13', 65000, 'd586d1c6b4.jpg'),
(26, 'roll14', '14', 45000, '3f8a106c48.jpg'),
(27, 'roll15', '15', 75000, '6d71a7ac32.jpg'),
(28, 'roll16', '16', 63000, '567b19801b.jpg'),
(29, 'roll17', '17', 45000, '3a11cbe99d.jpg'),
(30, 'roll18', '18', 34500, '2369031e02.jpg'),
(31, 'burger1', '1', 94000, '41c3742f6c.png'),
(32, 'burger2', '2', 65400, '92e6a14cb0.png'),
(33, 'burger3', '3', 105000, 'dbce3a3865.png'),
(34, 'burger4', '4', 82000, '18fc207efc.png'),
(35, 'burger5', '5', 140000, 'fa533c804a.png'),
(36, 'burger6', 'Burger gà', 78000, '44af2ded84.png'),
(37, 'burger6', 'Burger bò', 99000, 'eb9b9fcac1.png'),
(38, 'pasta7', '7', 85600, '5ee6f002e7.png'),
(39, 'pasta8', '8', 72500, '9647fa26c6.png'),
(40, 'pasta9', '9', 110000, 'a86259c5b8.png'),
(41, 'pasta10', 'Mỳ ý loại 3', 62700, '540d6bf550.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
