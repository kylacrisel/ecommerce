-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 12:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyla`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(100) NOT NULL,
  `accountID` int(100) NOT NULL,
  `itemID` int(100) NOT NULL,
  `cartCOUNT` varchar(100) NOT NULL,
  `orderID` varchar(255) DEFAULT NULL,
  `cartDATE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `accountID`, `itemID`, `cartCOUNT`, `orderID`, `cartDATE`) VALUES
(1, 1, 1, '3', 'HITECH04-15-2021-08-29-26-pm', '04/10/2021'),
(2, 1, 2, '2', 'HITECH04-15-2021-08-29-26-pm', '04/10/2021'),
(3, 1, 1, '1', 'HITECH04-15-2021-08-29-26-pm', '04/10/2021'),
(4, 1, 1, '1', 'HITECH04-15-2021-08-29-26-pm', '04/12/2021'),
(5, 1, 3, '10', 'HITECH04-15-2021-08-29-26-pm', '04/13/2021'),
(6, 1, 3, '1', 'HITECH04-15-2021-08-29-26-pm', '04/13/2021'),
(17, 1, 8, '2', 'HITECH04-15-2021-09-19-20-pm', '04/15/2021'),
(18, 2, 9, '2', 'HITECH06-29-2021-04-15-05-am', '04/19/2021'),
(19, 1, 6, '2', 'HITECH05-07-2021-02-22-35-am', '05/06/2021'),
(20, 1, 2, '1', 'HITECH05-07-2021-02-22-35-am', '05/06/2021'),
(21, 1, 2, '1', 'HITECH05-07-2021-02-22-35-am', '05/06/2021'),
(26, 10, 3, '2', 'HITECH05-07-2021-03-35-00-am', '05/07/2021'),
(27, 1, 3, '1', '1', '05/19/2021'),
(28, 1, 8, '2', '1', '05/19/2021'),
(30, 11, 1, '1', 'HITECH06-12-2021-06-00-55-pm', '06/12/2021'),
(34, 1, 2, '4', '1', '06/29/2021'),
(35, 1, 2, '3', '1', '06/29/2021'),
(36, 1, 1, '3', '1', '06/29/2021'),
(37, 1, 2, '1', '1', '06/29/2021'),
(38, 2, 2, '1', '1', '06/29/2021'),
(39, 2, 11, '2', '1', '06/29/2021'),
(43, 0, 19, '7', '1', '07/12/2021'),
(44, 0, 19, '1', '1', '07/12/2021'),
(45, 0, 19, '1', '1', '07/12/2021'),
(46, 0, 19, '1', '1', '07/12/2021'),
(53, 4, 20, '1', 'HITECH07-12-2021-02-06-12-pm', '07/12/2021'),
(54, 4, 16, '1', 'HITECH07-12-2021-02-11-51-pm', '07/12/2021'),
(55, 4, 16, '1', 'HITECH07-12-2021-02-47-59-pm', '07/12/2021'),
(56, 4, 16, '1', 'HITECH07-12-2021-04-48-17-pm', '07/12/2021'),
(57, 4, 20, '1', 'HITECH07-12-2021-05-41-12-pm', '07/12/2021'),
(58, 4, 19, '1', 'HITECH07-12-2021-05-44-41-pm', '07/12/2021'),
(59, 4, 16, '1', 'HITECH07-12-2021-05-48-00-pm', '07/12/2021'),
(60, 4, 16, '1', 'HITECH07-12-2021-05-49-10-pm', '07/12/2021'),
(61, 4, 18, '1', 'HITECH07-12-2021-05-50-17-pm', '07/12/2021'),
(62, 4, 16, '1', 'HITECH07-12-2021-05-50-53-pm', '07/12/2021'),
(63, 4, 20, '1', 'HITECH07-12-2021-05-51-52-pm', '07/12/2021'),
(64, 4, 18, '1', 'HITECH07-12-2021-05-52-33-pm', '07/12/2021'),
(65, 4, 16, '1', 'HITECH07-12-2021-05-53-08-pm', '07/12/2021'),
(66, 4, 15, '1', 'HITECH07-12-2021-05-55-10-pm', '07/12/2021'),
(67, 4, 16, '1', 'HITECH07-12-2021-05-56-52-pm', '07/12/2021'),
(68, 4, 15, '1', 'HITECH07-12-2021-06-01-14-pm', '07/12/2021'),
(69, 4, 16, '1', '1', '07/12/2021');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(112, 'Appliances', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1),
(113, 'Mens clothes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1),
(114, 'Gadgets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1),
(115, 'Mens shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1),
(116, 'kyla', 'I love you ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_price` varchar(200) NOT NULL,
  `item_image` varchar(200) NOT NULL,
  `item_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_price`, `item_image`, `item_date`) VALUES
(1, 'OFF Shirt', '140.00', '140.jpg', '2021-06-17 23:37:32'),
(2, 'I-Shirt', '160.00', '160.jpg', '2021-06-18 01:21:30'),
(3, 'Sim-shirt', '170.00', '170.jpg', '2021-06-18 01:23:07'),
(4, 'Gojo Shirt', '189.00', '01.jpg', '2021-06-18 01:25:54'),
(5, 'PTD Shirt', '219.00', 'td1.jpg', '2021-06-18 01:24:55'),
(6, 'PTD2 Shirt', '219.00', 'td2.jpg', '2021-06-18 01:28:47'),
(7, 'PTD3 Shirt', '219.00', 'td3.jpg', '2021-06-17 23:00:00'),
(8, 'OPA Shirt', '140.00', '4.jpg', '2021-06-18 01:27:34'),
(9, 'Cute shirt', '140.00', '5.jpg', '2021-06-18 01:28:58'),
(10, 'Alien Shirt', '140.00', '6.jpg', '2021-06-18 01:30:03'),
(11, 'Pika Shirt', '160.00', '8.jpg', '2021-06-18 01:30:40'),
(12, 'Qoute Shirt', '140.00', '7.jpg', '2021-06-18 01:31:59'),
(13, 'UFO Shirt', '160.00', '9.jpg', '2021-06-18 01:33:30'),
(14, 'Hk Shirt', '160.00', '10.jpg', '2021-06-18 01:33:40'),
(15, 'MM Shirt', '160.00', '11.jpg', '2021-06-18 01:34:27'),
(16, 'Ins2 Shirt', '170.00', '12.jpg', '2021-06-18 01:35:30'),
(17, 'Ins 3 Shirt', '170.00', '13.jpg', '2021-06-18 01:37:10'),
(18, 'Ins 4 shirt', '170.00', '14.jpg', '2021-06-18 01:38:00'),
(19, 'Ins 5 Shirt', '170.00', '15.jpg', '2021-06-18 01:38:53'),
(20, 'Sims-Shirt 1', '189.00', '16.jpg', '2021-06-18 01:39:48'),
(21, 'Sims Shirt 2', '189.00', '17.jpg', '2021-06-18 01:40:59'),
(22, 'Sims Shirt 3', '189.00', '18.jpg', '2021-06-18 01:41:32'),
(23, 'Sims Shirt 4', '189.00', '19.jpg', '2021-06-18 01:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_ordered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `account_id`, `status`, `date_ordered`) VALUES
(1, 0, 0, '0000-00-00'),
(2, 0, 0, '0000-00-00'),
(3, 4, 0, '0000-00-00'),
(4, 4, 0, '0000-00-00'),
(5, 4, 0, '0000-00-00'),
(6, 4, 0, '0000-00-00'),
(7, 4, 0, '0000-00-00'),
(8, 4, 0, '0000-00-00'),
(9, 4, 0, '0000-00-00'),
(10, 4, 0, '1970-01-01'),
(11, 4, 0, '0000-00-00'),
(12, 4, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_price` float NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_desc` text NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT 0,
  `p_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `p_name`, `p_price`, `p_stock`, `p_desc`, `p_status`, `p_img`) VALUES
(15, 112, 'tv', 5999, 45, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'tv.jpg'),
(16, 113, 'mens wear 1', 450, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'mens3.jfif'),
(17, 113, 'mens wear 2', 490, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'mns2.jfif'),
(18, 116, 'shoes 1', 799, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'shoes1.jpg'),
(19, 113, 'mens wear 3', 590, 20, 'asdsadasdasd', 1, 'mens1.jpg'),
(20, 115, 'tshirt', 299, 45, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo', 1, '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `mobilenumber` varchar(100) NOT NULL,
  `addresshead` varchar(100) NOT NULL,
  `datecreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `birthday`, `gender`, `mobilenumber`, `addresshead`, `datecreated`) VALUES
(1, 'peanut', '4652b19e09ced75df510bf5a263a2bfe', 'Aron Jake', '', '', '', '', ''),
(2, 'kyla', 'kyla', 'Kyla', '01-01-0001', 'Female', '09000000000', 'Sa Puso Mo', ''),
(3, 'vince', 'vince', 'Vince Kyut', '2021-06-16', 'Male', '09111111111', 'Sa Puso Nya', '06/29/2021 05:16:11 am'),
(4, 'jason005', '123456789', 'jason', '2021-07-27', 'male', '9999999999', 'cdo', '07/10/2021 12:15:11 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`account_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
