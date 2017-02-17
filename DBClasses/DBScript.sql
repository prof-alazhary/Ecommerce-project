-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2017 at 01:19 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--
create database Ecommerce;
use Ecommerce;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `shop_cart_insert` (IN `u_id` SMALLINT, IN `p_id` SMALLINT, IN `quant` SMALLINT)  BEGIN
DECLARE t_price double;
set t_price=quant*(SELECT price FROM product WHERE product_id=p_id);
IF (EXISTS(SELECT * from shop_cart where user_id=u_id and product_id=p_id and paied=0))     THEN     UPDATE shop_cart set quantity=quantity+quant, total_price=total_price+t_price where user_id=u_id and product_id=p_id ;     ELSE     insert INTO shop_cart (user_id,product_id,quantity,total_price) VALUES(u_id,p_id,quant,t_price);     END IF;   UPDATE product set quantity=quantity-quant WHERE product_id=p_id;  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `cat_name` varchar(40) NOT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `img_cat` varchar(200) DEFAULT NULL,
  `description` text,
  `parent` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `img_path`, `img_cat`, `description`, `parent`, `updated_at`) VALUES
(1, 'Women', 'images/me.png', 'images/pi3.jpg', 'hjgdjgsd', NULL, '2017-02-15 06:03:13'),
(2, 'Men', 'images/me1.png', 'images/pi2.jpg', 'kjhksdfhkj', NULL, '2017-02-15 06:03:44'),
(3, 'Kids', 'images/pi2.jpg', 'images/pi2.jpg', 'kjhkashkh', NULL, '2017-02-15 06:06:00'),
(4, 'Accessories', 'images/pi.jpg', 'images/pi3.jpg', 'Women Accessories products', 1, '2017-02-14 08:29:50'),
(5, 'aaa', 'images/pc1.jpg', 'images/pc1.jpg', 'knnnmbbn', 2, '2017-02-14 13:39:11'),
(7, 'reham', 'lkj', 'kj', 'lkjkj', 1, '2017-02-15 12:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`cat_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` smallint(5) UNSIGNED NOT NULL,
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `description` text,
  `price` double NOT NULL DEFAULT '0',
  `quantity` int(10) UNSIGNED DEFAULT '0',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `product_name`, `img_path`, `description`, `price`, `quantity`, `updated_at`) VALUES
(1, 4, 'aaa', 'images/pc.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 18:59:01'),
(3, 4, 'ccc', 'images/pc2.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 18:59:21'),
(4, 5, 'ddd', 'images/pc3.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 18:59:32'),
(5, 5, 'eee', 'images/pc4.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 18:59:42'),
(6, 5, 'fff', 'images/pc5.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 18:59:52'),
(10, 4, 'ppp', 'images/pc2.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 19:01:50'),
(11, 4, 'vvv', 'images/pc3.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 2, '2017-02-14 08:41:11'),
(12, 4, 'mmm', 'images/pc4.jpg', 'am liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es', 100, 1, '2017-02-14 08:41:42'),
(17, 5, 'verna', 'images/pc1.jpg', 'dsds', 3000, NULL, '2017-02-14 19:00:57'),
(99, 7, 'shimaa', 'l;k', ';lk', 8888, 8, '2017-02-15 06:16:24'),
(104, 1, 'iii', 'iii', 'ii', 1999, NULL, '2017-02-15 13:58:34'),
(105, 4, 'riri', 'riri', 'riri', 1000, NULL, '2017-02-15 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart`
--

CREATE TABLE `shop_cart` (
  `shop_cart_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `product_id` smallint(5) UNSIGNED NOT NULL,
  `buy_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `quantity` tinyint(3) UNSIGNED DEFAULT '0',
  `paied` tinyint(4) DEFAULT '0',
  `total_price` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `birth_of_date` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `job` varchar(40) DEFAULT NULL,
  `limitcredit` double DEFAULT '0',
  `is_admin` tinyint(4) DEFAULT '0',
  `is_deleted` tinyint(4) DEFAULT '0',
  `register_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(1200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `pass`, `email`, `birth_of_date`, `gender`, `job`, `limitcredit`, `is_admin`, `is_deleted`, `register_at`, `updated_at`, `img`) VALUES
(1, 'shimaa', 'shimaa', 'adel', 'shimaa', 'shimaa@gmail.com', '2017-02-02', 'f', 'eng', 3000, 1, 1, '2017-02-14 17:56:59', '2017-02-16 11:48:14', ''),
(2, 'afnan', 'afnan', 'afnan', '70b5992d48a5ccb513904387832b6dec99c32e4f', 'afnan.hassan1993@gmail.com', '6666-04-05', 'Female', 'student', 2000, 1, 0, '2017-02-15 22:02:33', '2017-02-16 12:58:00', '/media/afnan_h/DATA/private/10947319_1569926919929141_5992187266481905224_n.jpg'),
(3, 'admin', 'admin', 'dmin', '70b5992d48a5ccb513904387832b6dec99c32e4f', 'admin@gmail.com', '1993-01-08', 'Male', 'student', 3000, 1, 0, '2017-02-16 10:42:47', '2017-02-16 11:50:00', NULL);

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
  MODIFY `cat_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `shop_cart_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD CONSTRAINT `shop_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `shop_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
