-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 08:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `ad_user` varchar(50) NOT NULL,
  `ad_pass` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `ad_user`, `ad_pass`, `email`, `details`, `role`) VALUES
(1, 'Husna Afrin', 'tithi', '202cb962ac59075b964b07152d234b70', 'husna@gmail.com', 'sdfsdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(10, 'Apple'),
(11, 'Samsung'),
(12, 'Dell'),
(13, 'Asus'),
(14, 'Cannon'),
(15, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sessionId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(26, '4b2n2u6qlv4e41ddllrs7u70d3', 8, 'Galaxy s7 edge', 35000.00, 1, 'uploads/products/a0d5b72c62.jpg'),
(27, 'kjag04eaec07esrcmptueu8m25', 7, 'i phone 6+', 40000.00, 8, 'uploads/products/d14f0354a0.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(11, 'Mobile Phone'),
(12, 'Headphone'),
(13, 'Camera'),
(14, 'camera'),
(15, '/123*');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `csId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `csId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`csId`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `pass`) VALUES
(5, 'Roni', 'Barisal', '1256', 'roni@gmail.com', 'barisal', 'Bangladesh', '017446455', '202cb962ac59075b964b07152d234b70'),
(8, 'disari', 'Dhaka', '1230', 'disari@gmail.com', 'Khilgaon', 'BD', '98887', '202cb962ac59075b964b07152d234b70'),
(9, 'Sarmin', 'ctg', '6789', 'sharmin@gmail.com', 'khlg', 'dhaka', '123', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `csId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `csId`, `productId`, `productName`, `quantity`, `price`, `image`, `Date`, `status`) VALUES
(74, 5, 18, 'Camera', 1, 400.00, 'uploads/products/5fdf9362ea.jpg', '2017-12-06 10:56:46', 2),
(75, 5, 15, 'Headphone', 1, 10.00, 'uploads/products/27510ee6e3.png', '2017-12-06 11:29:27', 1),
(76, 9, 19, 'iPhone-X', 1, 100.00, 'uploads/products/434acc6c6b.jpg', '2017-12-06 21:41:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pid`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(14, 'iPhone', 11, 10, '<p><strong>à¦†à¦‡à¦«à§‹à¦¨ à¦¹à¦šà§à¦›à§‡ à¦…à§à¦¯à¦¾à¦ªà¦² à¦‡à¦¨à¦•à¦°à§à¦ªà§‹à¦°à§‡à¦Ÿà§‡à¦¡ à¦¦à§à¦¬à¦¾à¦°à¦¾ à¦¨à¦¿à¦°à§à¦®à¦¿à¦¤ à¦à¦•à¦Ÿà¦¿ à¦†à¦§à§à¦¨à¦¿à¦• à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦¨à§‡à¦Ÿ à¦“ à¦®à¦¾à¦²à§à¦Ÿà¦¿à¦®à¦¿à¦¡à¦¿à¦¯à¦¼à¦¾ à¦¸à¦‚à¦¯à§à¦•à§à¦¤ à¦¸à§à¦®à¦¾à¦°à§à¦Ÿà¦«à§‹à¦¨à¥¤ à¦…à§à¦¯à¦¾à¦ªà¦²à§‡à¦° à¦¸à¦¾à¦¬à§‡à¦• à¦¸à¦¿à¦‡à¦“ à¦¸à§à¦Ÿà¦¿à¦­ à¦œà¦¬à¦¸ à¦ªà§à¦°à¦¥à¦® à¦†à¦‡à¦«à§‹à¦¨ à¦…à¦¬à¦®à§à¦•à§à¦¤ à¦•à¦°à§‡à¦¨ à§¯ à¦œà¦¾à¦¨à§à¦¯à¦¼à¦¾à¦°à¦¿ à§¨à§¦à§¦à§­ à¦¤à¦¾à¦°à¦¿à¦–à§‡à¥¤ à¦ªà§à¦°à¦¥à¦® à¦†à¦‡à¦«à§‹à¦¨à§‡à¦° à¦¬à¦¾à¦œà¦¾à¦°à¦œà¦¾à¦¤à¦•à¦°à¦£ à¦¶à§à¦°à§ à¦¹à¦¯à¦¼ à§¨à§¯ à¦œà§à¦¨ à§¨à§¦à§¦à§­ à¦¤à¦¾à¦°à¦¿à¦–à§‡</strong></p>', 200.000, 'uploads/products/a065a5772d.png', 1),
(15, 'Headphone', 12, 11, '<p><span class=\"st\"><em>iPhone</em> on Three. Looking for some great deals for new <em>iPhone</em> devices? Well, look no further. First off, how about the the <em>iPhone</em> X?</span></p>', 10.000, 'uploads/products/27510ee6e3.png', 1),
(16, 'Headphone', 12, 13, '<p>good</p>', 12.000, 'uploads/products/a200d05d29.png', 2),
(17, 'iPhone', 11, 10, '<p>good</p>', 200.000, 'uploads/products/ee4ea5216d.png', 1),
(18, 'Camera', 13, 14, '<p><span class=\"st\"><em>iPhone</em> on Three. Looking for some great deals for new <em>iPhone</em> devices? Well, look no further. First off, how about the the <em>iPhone</em> X?</span></p>', 400.000, 'uploads/products/5fdf9362ea.jpg', 1),
(19, 'iPhone-X', 11, 10, '<p>I love the <em>iPhone X</em>. </p>', 100.000, 'uploads/products/434acc6c6b.jpg', 1),
(20, 'Camera1', 14, 15, '<p>it\"s good product</p>', 1200.000, 'uploads/products/be06a47ec1.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `csId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `csId`, `productId`, `productName`, `price`, `image`) VALUES
(1, 8, 12, 'roni', 4500.00, 'uploads/products/100d8c5708.jpg'),
(2, 9, 19, 'iPhone-X', 100.00, 'uploads/products/434acc6c6b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`csId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `csId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
