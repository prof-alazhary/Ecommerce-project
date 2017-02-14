-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2017 at 10:37 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `shop_cart_insert` (IN `u_id` SMALLINT, IN `p_id` SMALLINT, IN `quant` SMALLINT)  BEGIN     IF EXISTS(SELECT * from shop_cart where user_id=u_id and product_id=p_id and paied=0)     THEN     UPDATE shop_cart set quantity=quantity+quant where user_id=u_id and product_id=p_id ;     ELSE     insert INTO shop_cart (user_id,product_id,quantity) VALUES(u_id,p_id,quant);     END IF;   UPDATE product set quantity=quantity-quant WHERE product_id=p_id;  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `parent`, `updated_at`) VALUES
(1, 'cat1', NULL, '2017-02-11 18:28:48'),
(2, 'subCat1', 1, '2017-02-11 18:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `cat_id` smallint(5) UNSIGNED DEFAULT NULL,
  `user_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`cat_id`, `user_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` smallint(5) UNSIGNED NOT NULL,
  `cat_id` smallint(5) UNSIGNED DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `product_name`, `img_path`, `description`, `price`, `quantity`, `updated_at`) VALUES
(1, 2, 'prod 1', NULL, NULL, 200, 27, '2017-02-14 20:37:41'),
(2, 2, 'prod2', NULL, NULL, 100, 20, '2017-02-14 20:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart`
--

CREATE TABLE `shop_cart` (
  `shop_cart_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED DEFAULT NULL,
  `product_id` smallint(5) UNSIGNED DEFAULT NULL,
  `buy_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `quantity` tinyint(3) UNSIGNED DEFAULT NULL,
  `paied` tinyint(1) DEFAULT '0',
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_cart`
--

INSERT INTO `shop_cart` (`shop_cart_id`, `user_id`, `product_id`, `buy_at`, `quantity`, `paied`, `total_price`) VALUES
(1, 1, 1, '2017-02-11 18:33:36', 30, 0, NULL),
(12, 1, 2, '2017-02-14 20:12:45', 20, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `pass` char(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `birth_of_date` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `job` varchar(40) DEFAULT NULL,
  `limitcredit` double DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `register_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `pass`, `email`, `birth_of_date`, `gender`, `job`, `limitcredit`, `is_admin`, `is_deleted`, `register_at`, `updated_at`) VALUES
(1, 'azhary1', 'mohammed', 'mahmoud', '123', 'm@m.com', '2017-02-01', 'male', 'eng', 5000, 1, 0, '2017-02-11 18:26:51', '2017-02-11 18:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`shop_cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `shop_cart_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `interest_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD CONSTRAINT `shop_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `shop_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
