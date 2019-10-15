-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 01:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `cust_logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `quantity` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cust_id`, `cust_logout`, `quantity`, `product_id`) VALUES
(22, 17, '2017-06-27 09:43:31', 1, 37),
(23, 17, '2017-06-27 09:43:31', 1, 40),
(24, 17, '2017-06-27 09:46:09', 2, 19),
(25, 17, '2017-06-27 09:48:38', 2, 37),
(26, 17, '2017-06-27 09:48:38', 1, 20),
(27, 17, '2017-06-27 09:48:38', 1, 19),
(28, 17, '2017-06-27 09:48:38', 1, 39),
(29, 17, '2017-06-27 10:25:41', 2, 19),
(30, 17, '2017-06-27 10:25:41', 1, 20),
(31, 17, '2017-06-27 10:25:41', 1, 37),
(32, 17, '2017-06-27 10:25:41', 3, 39),
(33, 17, '2017-06-27 10:25:41', 2, 28),
(34, 17, '2017-06-27 10:25:41', 1, 13),
(35, 17, '2017-06-27 10:25:41', 1, 32),
(36, 17, '2017-06-27 11:31:25', 1, 15),
(40, 17, '2017-06-27 12:28:13', 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(10) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `logout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `fname`, `email`, `phone`, `username`, `password`, `logout`) VALUES
(17, 'Maingi Brian', 'bm@gmail.com', 1234, 'EKI', '$2y$10$zIJlaPLdQDJPlZrefQxfqOm9A7i.rte1I5zMA9S0MJ7Cl1z6wkrma', '2017-06-27 19:35:32'),
(22, 'Maingi Brian', 'bm@gmail.com', 1234567, 'tommy40', '$2y$10$6FVZqZBa8yQBXIpeL3hz7ueai0m8qm4O7vA6T20FCp6c46S.3H8Lm', '2017-06-27 09:37:56'),
(23, 'Brian Mutinda', 'bm@gmail.com', 12345, 'someone', '$2y$10$H8w4iXwmQIg8m6dw9gjY8OL6XBfNj7nQ0pJZ6qkUUlOoZ3BVK8R/O', '2017-06-27 09:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `furniture_id` int(10) NOT NULL,
  `type_of_furniture` varchar(30) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `cost` int(30) DEFAULT NULL,
  `quantity` varchar(30) DEFAULT NULL,
  `material` varchar(30) DEFAULT NULL,
  `imagename` varchar(256) NOT NULL,
  `imagepath` varchar(256) NOT NULL,
  `ret_id` int(10) DEFAULT NULL,
  `a_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ratings` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`furniture_id`, `type_of_furniture`, `color`, `cost`, `quantity`, `material`, `imagename`, `imagepath`, `ret_id`, `a_date`, `ratings`) VALUES
(13, 'bed', 'white', 17000, '12           ', 'Metallic', '/xampp/htdocs/Ecommerce/db_images/', '', 1027, '2017-06-01 01:00:00', NULL),
(14, 'bed', 'brown', 17000, '10    ', 'wood', '/xampp/htdocs/Ecommerce/db_images/', '25-bedroom-interior-design-ideas-chairs-for-comfortable-seating-3-270014034.jpeg', 1027, '2017-06-01 01:00:00', NULL),
(15, 'bed', 'brown', 20000, '40', 'wood', '/xampp/htdocs/Ecommerce/db_images/', '3439007_P_M.jpg', 1027, '2017-06-01 01:02:00', NULL),
(16, 'bed', 'brown', 30000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'APK-B690-QPB-10x8-CROP.jpg', 1027, '2017-06-01 01:03:00', NULL),
(17, 'bed', 'Dark brown', 23500, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'bed_2_3.jpg', 1027, '2017-06-03 01:06:00', NULL),
(18, 'bed', 'brown', 45000, '4', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'Cheap-Twin-Bed-Queen-Bed-Size-Fancy-Queen-Size-Beds-For-Sale-Cheap.jpg', 1027, '2017-06-03 01:07:00', NULL),
(19, 'couch', 'white', 20000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', '1_37_243_1_1058.jpg', 1027, '2017-06-03 01:08:00', NULL),
(20, 'couch', 'Grey', 50000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', '1b621746c58555f66264bd6d9f4676ef.jpg', 1027, '2017-06-03 01:09:00', NULL),
(22, 'bed', 'Cream', 15000, '5', 'cloth', '/xampp/htdocs/Ecommerce/db_images/', '183c3b131954aac077516c7610fb8e14.jpg', 1027, '2017-06-01 01:10:00', NULL),
(25, 'bed', 'Light Brow', 15000, '2', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'category_banner_1463403650Oak-Coffee-Table_1463403650.jpg', 1027, '2017-06-03 01:11:00', NULL),
(27, 'bed', 'brown', 23500, '1 ', 'wood', '/xampp/htdocs/Ecommerce/db_images/', '25-bedroom-interior-design-ideas-chairs-for-comfortable-seating-3-270014034.jpeg', 1027, '2017-06-03 01:11:06', NULL),
(28, 'table', 'brown', 70000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'Circle-Squared-Coffee-Table-contemporary-coffee-tables-Coffee-Tables-on-Sale.jpg', 1027, '2017-06-01 01:12:00', NULL),
(29, 'bed', 'brown', 40000, '', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'colorful-kids-bunk-beds.jpg', 1027, '0000-00-00 00:00:00', NULL),
(30, 'table', 'Brown', 24000, '1', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'Confortable-Antique-Style-Coffee-Table-In-Home-Decor-Interior-Design-with-Antique-Style-Coffee-Table.jpg', 1027, '0000-00-00 00:00:00', NULL),
(31, 'table', 'Dark brown', 17000, '2', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'dining-room-sets-for-sale-dining-room-tables-on-sale-style.jpg', 1027, '0000-00-00 00:00:00', NULL),
(32, 'dinning', 'Light Brow', 54000, '20', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'DS10005707.jpg', 1027, '0000-00-00 00:00:00', NULL),
(33, 'bed', 'White', 40000, '15', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'e42deeb0b5836ea311871c709b6c4a0b.jpg', 1027, '0000-00-00 00:00:00', NULL),
(34, 'dinning', 'Dark brown', 70000, '1', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'hapihomes-vannah-smiles-6-seater-dining-set-4016-88444701-774670ab22ed6188490bd84fba44c1eb.jpg', 1027, '0000-00-00 00:00:00', NULL),
(36, 'dinning', 'brown', 70000, '13', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'HOO300275206SET1.jpg', 1027, '0000-00-00 00:00:00', NULL),
(37, 'couch', 'Black', 70000, '1', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'image.jpg', 1027, '0000-00-00 00:00:00', NULL),
(38, 'bed', 'brown', 70000, '12', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'King-Size-Bed-Set-691-1024x640.jpg', 1027, '0000-00-00 00:00:00', NULL),
(39, 'couch', 'White', 42000, '12', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'Original_Jeanine-Hays-New-Living-Room-Color-Palettes-15-Abbe-Fenimore_h.jpg.rend.hgtvcom.616.462.jpeg', 1027, '0000-00-00 00:00:00', NULL),
(40, 'couch', 'Black', 70000, '1', 'cloth', '/xampp/htdocs/Ecommerce/db_images/', 'pl170999-high_quality_living_room_furniture_european_modern_fabric_sofa.jpg', 1027, '0000-00-00 00:00:00', NULL),
(41, 'couch', 'Dark Gray', 55000, '2', 'cloth', '/xampp/htdocs/Ecommerce/db_images/', 'pl2628899-2_seater_italian_fabric_sofa_set_modern_living_room_couches_furniture_dongguan_dalingshan_furniture_factory.jpg', 1027, '0000-00-00 00:00:00', NULL),
(45, 'bed', 'White', 75677, '2', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'white-storage-bed.jpg', 1027, '0000-00-00 00:00:00', NULL),
(48, 'couch', 'White', 77000, '2', 'Leather', '/xampp/htdocs/Ecommerce/db_images/', 'white-leather-sofa-1_rect540.jpg', 1027, '2017-06-04 03:48:41', NULL),
(49, 'dinning', 'White', 77000, '12', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'Domino-Medium-Espresso-Dining-Set-P16290872.jpg', 1027, '2017-06-07 13:12:38', NULL),
(51, 'bed', 'black', 2000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'im.jpg', 1027, '2017-06-27 08:47:13', NULL),
(52, 'table', 'colourless', 89000, '12700', 'glass', '/xampp/htdocs/Ecommerce/db_images/', 'glass-desk-metal-legs-poise1-540x720.jpg', 1027, '2017-06-27 15:36:32', NULL),
(53, 'table', 'colourless', 89000, '10', 'glass', '/xampp/htdocs/Ecommerce/db_images/', '373c07e1d812d57f7dff0357e71551e3.jpg', 1027, '2017-06-27 15:37:02', NULL),
(54, 'table', 'brown', 67000, '12700', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'square-shaped-light-brown-wooden-coffee-table-with-drawer-for-sofa-yellow-square-eec59ffc619779cb.jpg', 1027, '2017-06-27 15:37:34', NULL),
(55, 'bed', 'brown', 10000, '1', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'traditional-dining-tables.jpg', 1027, '2017-06-27 15:38:12', NULL),
(56, 'dinning', 'brown', 45000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'Country_Dining_S_4d06657e3e6a9.jpg', 1027, '2017-06-27 15:41:47', NULL),
(57, 'dinning', 'white', 67000, '12700', 'wood', '/xampp/htdocs/Ecommerce/db_images/', 'prod_16316544519.jpg', 1027, '2017-06-27 15:42:16', NULL),
(58, 'bed', 'brown', 78000, '10', 'wood', '/xampp/htdocs/Ecommerce/db_images/', '9650.jpg', 1027, '2017-06-27 16:04:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_no` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `furniture_id` int(11) DEFAULT NULL,
  `quantity` int(30) DEFAULT NULL,
  `amount_paid` int(11) DEFAULT NULL,
  `record` date DEFAULT NULL,
  `comments` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_no`, `cust_id`, `furniture_id`, `quantity`, `amount_paid`, `record`, `comments`) VALUES
(1, 1, 1, 2, 2000, '2017-05-02', 'Good Service'),
(2, 2, 1, 2, 2000, '2017-05-03', 'Nice Service');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `r_id` int(10) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `phone_no` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`r_id`, `fname`, `email`, `location`, `phone_no`, `username`, `password`) VALUES
(1025, 'Victoria Brandson', 'tommy@me.com', 'Nairobi', '12345', 'vicky', '$2y$10$o86W.VGo82SW1s1Svx1FG.yv9yENgCwlbwHB8VfvhKvQy06i0HyxK'),
(1027, 'Tom Jefferson', 'tommy@me.com', 'Nairobi', '0734', 'tommy40', '$2y$10$0yDTMoEniE7XFoFyxdKiAOqCJ8wULYYHI3uSFDkmmgomw9qgLMgq6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`furniture_id`),
  ADD KEY `ret_id` (`ret_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_no`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `furniture_id` (`furniture_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `furniture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1028;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `furniture_ibfk_1` FOREIGN KEY (`ret_id`) REFERENCES `retailer` (`r_id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`user_id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`furniture_id`) REFERENCES `furniture` (`furniture_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
