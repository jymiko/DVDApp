-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 10:18 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvd_store`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteUser` (IN `c_email` VARCHAR(255))  BEGIN
	DECLARE c_id INT(10);
    DECLARE c_order INT(10);
    
	SET c_id = (SELECT id_customer FROM tbl_customer WHERE customer_email = c_email);
    SET c_order = (SELECT id_order FROM tbl_order WHERE id_customer = c_id);
    
    DELETE FROM tbl_payment WHERE id_order = c_order;
	DELETE FROM tbl_order WHERE id_customer = c_id AND id_order = c_order;
    DELETE FROM tbl_customer WHERE id_customer = c_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(10) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(10) NOT NULL,
  `id_role` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `id_role`, `customer_name`, `customer_email`, `customer_password`, `country`, `city`, `phone_number`, `address`, `image`) VALUES
(2, 1, 'lukman arief', 'lukman@gmail.com', 'lukman21', 'bondowoso', 'indonesia', '08912834245', 'bondowoso ex malang', 'foto-profil2.png'),
(3, 1, 'man', 'man@gmail.com', 'man123', 'malang', 'indonesia', '085649806398', 'jl. gadang', 'man.jpg'),
(4, 1, 'Faldi', 'Faldi767@gmail.com', '123', 'Indonesia', 'Malang', '085804805750', 'Sumpil', 'smoke_anonymous_steam_avatars.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_customer`, `id_product`, `amount`, `invoice_no`, `quantity`, `order_date`, `order_status`) VALUES
(4, 2, 9, 80000, 964118438, 2, '2018-05-29 20:37:17', 'Complete'),
(5, 2, 13, 74000, 310950471, 2, '2018-05-29 21:03:46', 'Complete'),
(6, 2, 11, 90000, 1943503502, 2, '2018-05-29 21:05:43', 'Complete'),
(10, 4, 3, 150000, 621511351, 3, '2018-07-12 08:15:26', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(11) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `id_order`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(4, 5, 'Bank', 1234, '23052018'),
(5, 6, 'Bank', 533, '23052018'),
(15, 10, 'Bank', 456, '01042018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(10) NOT NULL,
  `id_cat_p` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `id_cat_p`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(3, 2, '2018-05-06 14:19:19', 'Aquaman', 'aquaman.jpg', 'aquaman.jpg', 'aquaman.jpg', 50000, '                                        enter data into a database containing foreign keys                                                                                                            ', 'aquaman'),
(8, 4, '2018-05-06 05:33:36', 'rampage', 'rampage.jpg', 'rampage.jpg', 'rampage.jpg', 50000, '                                                                                rampage film                                                                        ', 'rampage'),
(9, 3, '2018-05-06 05:34:59', 'Ant Man', 'antman.jpg', 'antman.jpg', 'antman.jpg', 40000, 'Ant man Movies ', 'antman'),
(10, 3, '2018-05-06 06:33:39', 'Deadpool', 'deadpool_2.jpg', 'deadpool_2.jpg', 'deadpool_2.jpg', 40000, '                                                                                                                                                                Deadpool movies                                                                                                                                                ', 'deadpool'),
(11, 3, '2018-05-06 06:15:03', 'Black Panther', 'blackpanther.jpg', 'blackpanther.jpg', 'blackpanther.jpg', 45000, 'Black panther movies ', 'blackpanther'),
(12, 4, '2018-05-06 06:35:50', 'The Incredibles', 'icrdibles.jpg', 'icrdibles.jpg', 'icrdibles.jpg', 35000, 'The incredibles movie', 'incredibles'),
(13, 5, '2018-05-06 06:36:54', 'Skycrappers', 'skyscraper.jpg', 'skyscraper.jpg', 'skyscraper.jpg', 37000, 'skycrappers movie', 'skycrappers'),
(14, 5, '2018-05-06 06:49:02', 'Jurasic Park', 'jurasicpark.jpg', 'jurasicpark.jpg', 'jurasicpark.jpg', 38000, 'jurasik park', 'jurasic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `id_cat_p` int(10) NOT NULL,
  `cat_p_title` text NOT NULL,
  `cat_p_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`id_cat_p`, `cat_p_title`, `cat_p_desc`) VALUES
(2, 'DRAMA', 'Drama movies contain love scene and any romantic scene'),
(3, 'Sci-Fi', 'Sci-Fi Movies test'),
(4, 'Horror', 'Horror genre'),
(5, 'Action', 'Action Movie'),
(6, 'Cartoon', 'Cartoon Movies'),
(7, 'Comedy', 'Comedy movies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`) VALUES
(1, 'Member'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slide_id`, `slide_name`, `slide_images`) VALUES
(1, 'slide 1', '1.jpeg'),
(2, 'slide 2', '2.jpeg'),
(3, 'slide 3', '3.jpeg'),
(4, 'slide 4', '4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product_2` (`id_product`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_customer_2` (`id_customer`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_cat_p` (`id_cat_p`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`id_cat_p`),
  ADD KEY `id_cat_p` (`id_cat_p`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `id_cat_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`);

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `tbl_customer_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tbl_role` (`id_role`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_cat_p`) REFERENCES `tbl_product_category` (`id_cat_p`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
