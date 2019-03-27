-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 10:38 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `1`
--

CREATE TABLE `1` (
  `ITEM_ID` char(5) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CUISINE_TYPE` varchar(20) DEFAULT NULL,
  `Availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1`
--

INSERT INTO `1` (`ITEM_ID`, `ITEM_NAME`, `PRICE`, `CUISINE_TYPE`, `Availability`) VALUES
('AV001', 'Prawn Biryani', 180, 'South Indian', 'Available'),
('AV002', 'Fried Tawa Prawns', 210, 'South Indian', 'Available'),
('AV003', 'Bangda Masala Fry', 120, 'South Indian', 'Available'),
('AV004', 'Bangda Tawa Fry', 120, 'South Indian', 'Available'),
('AV005', 'Neer Dosa(4 pieces)', 80, 'South Indian', 'Available'),
('AV006', 'Mutton Hyderabadi', 190, 'South Indian', 'Available'),
('AV007', 'Ghee Rice', 110, 'South Indian', 'Available'),
('AV008', 'Prawn Sukka', 190, 'South Indian', 'Available'),
('AV009', 'Crab Chilly', 200, 'Chinese', 'Available'),
('AV010', 'Chicken Noodles', 140, 'Chinese', 'Available'),
('AV011', 'Chicken Chilli', 140, 'Chinese', 'Available'),
('AV012', 'Schezwan Chicken', 170, 'Chinese', 'Available'),
('AV013', 'Veg Fried Rice', 120, 'Chinese', 'Available'),
('AV014', 'Veg Hakka Noodles', 140, 'Chinese', 'Available'),
('AV015', 'Drums of Heaven', 250, 'Chinese', 'Available'),
('AV016', 'Chicken American Chopsuey', 180, 'Chinese', 'Available'),
('AV017', 'Veg Burger', 100, 'Italian', 'Available'),
('AV018', 'Veg Mayo Burger', 110, 'Italian', 'Available'),
('AV019', 'Veg Cheese Burger', 120, 'Italian', 'Available'),
('AV020', 'Veg Mayo Cheese Burger', 130, 'Italian', 'Available'),
('AV021', 'Veg Sandwich', 110, 'Italian', 'Available'),
('AV022', 'Chicken Burger', 140, 'Italian', 'Available'),
('AV023', 'Chicken Zinger Burger', 155, 'Italian', 'Available'),
('AV024', 'Chicken Cheese Burger', 160, 'Italian', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `2`
--

CREATE TABLE `2` (
  `ITEM_ID` char(5) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CUISINE_TYPE` varchar(30) DEFAULT NULL,
  `Availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2`
--

INSERT INTO `2` (`ITEM_ID`, `ITEM_NAME`, `PRICE`, `CUISINE_TYPE`, `Availability`) VALUES
('BE001', 'VeG Spring Roll', 150, 'Chinese', 'Available'),
('BE002', 'VeG Fried Rice', 180, 'Chinese', 'Available'),
('BE003', 'Chicken Fried Rice', 190, 'Chinese', 'Available'),
('BE004', 'Egg Fried Rice', 160, 'Chinese', 'Available'),
('BE005', 'Veg Steamed Momos', 150, 'Chinese', 'Available'),
('BE006', 'Veg Hakka Noodles', 160, 'Chinese', 'Available'),
('BE007', 'Chicken Steamed Momos', 170, 'Chinese', 'Available'),
('BE008', 'Drums of Heaven', 210, 'Chinese', 'Available'),
('BE009', 'Chicken Hyderabadi', 190, 'South Indian', 'Available'),
('BE010', 'Chicken Lollipop', 210, 'South Indian', 'Available'),
('BE011', 'Chicken Kolhapuri', 210, 'South Indian', 'Available'),
('BE012', 'Chicken Kadhai', 200, 'South Indian', 'Available'),
('BE013', 'Nelllore Chicken', 220, 'South Indian', 'Available'),
('BE014', 'Hyderabadi Chicken Biryani', 200, 'South Indian', 'Available'),
('BE015', 'Chicken Dum Biryani', 210, 'South Indian', 'Available'),
('BE016', 'Mutton Biryani', 240, 'South Indian', 'Available'),
('BE017', 'Veggie Delight Pizza', 150, 'Italian', 'Available'),
('BE018', 'Veg Supreme Pizza', 225, 'Italian', 'Available'),
('BE019', 'Cheesy Pizza', 180, 'Italian', 'Available'),
('BE020', 'Golden Corn Pizza', 160, 'Italian', 'Available'),
('BE021', 'Onion Delight Pizza', 160, 'Italian', 'Available'),
('BE022', 'Cheese n Corn Pizza', 170, 'Italian', 'Available'),
('BE023', 'Margherita Pizza', 200, 'Italian', 'Available'),
('BE024', 'Chicken Delight Pizza', 225, 'Italian', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `3`
--

CREATE TABLE `3` (
  `ITEM_ID` char(5) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CUISINE_TYPE` varchar(20) DEFAULT NULL,
  `Availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `3`
--

INSERT INTO `3` (`ITEM_ID`, `ITEM_NAME`, `PRICE`, `CUISINE_TYPE`, `Availability`) VALUES
('DP001', 'Pizza Sticks', 105, 'Italian', 'Available'),
('DP002', 'Cheese Sticks', 105, 'Italian', 'Available'),
('DP003', 'Rainbow Veggie Pizza 6\'', 210, 'Italian', 'Available'),
('DP004', 'Fajita Pizza 6\'', 210, 'Italian', 'Available'),
('DP005', 'Spring Fling Pizza 6\'', 225, 'Italian', 'Available'),
('DP006', 'Paneer Tandoori Pizza 6\'', 225, 'Italian', 'Available'),
('DP007', 'Tandoori Chicken Pizza 6\'', 225, 'Italian', 'Available'),
('DP008', 'Chicken Curry Pizza 6\'', 225, 'Italian', 'Available'),
('DP009', 'Veg Steamed Momos', 140, 'Chinese', 'Available'),
('DP010', 'Veg Spring Roll', 150, 'Chinese', 'Available'),
('DP011', 'Chicken Steamed Momos', 170, 'Chinese', 'Available'),
('DP012', 'Chicken Spring Roll', 180, 'Chinese', 'Available'),
('DP013', 'Veg Fried Momos', 170, 'Chinese', 'Available'),
('DP014', 'Chicken Fried Momos', 190, 'Chinese', 'Available'),
('DP015', 'Veg Hakka Noodles', 190, 'Chinese', 'Available'),
('DP016', 'Chicken Noodles', 210, 'Chinese', 'Available'),
('DP017', 'Chicken Hyderabadi', 210, 'South Indian', 'Available'),
('DP018', 'Chicken Lollipop', 220, 'South Indian', 'Available'),
('DP019', 'Chicken Kolhapuri', 230, 'South Indian', 'Available'),
('DP020', 'Chicken Kadhai', 220, 'South Indian', 'Available'),
('DP021', 'Nelllore Chicken', 230, 'South Indian', 'Available'),
('DP022', 'Chicken Biryani', 210, 'South Indian', 'Available'),
('DP023', 'Chicken Dum Biryani', 230, 'South Indian', 'Available'),
('DP024', 'Mutton Biryani', 280, 'South Indian', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `4`
--

CREATE TABLE `4` (
  `ITEM_ID` char(5) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CUISINE_TYPE` varchar(20) DEFAULT NULL,
  `Availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `4`
--

INSERT INTO `4` (`ITEM_ID`, `ITEM_NAME`, `PRICE`, `CUISINE_TYPE`, `Availability`) VALUES
('EV001', 'Veg Steamed Momos', 120, 'Chinese', 'Available'),
('EV002', 'Veg Pan Fried Momos', 135, 'Chinese', 'Available'),
('EV003', 'Veg Deep Fried Momos', 135, 'Chinese', 'Available'),
('EV004', 'Chicken Steamed Momos', 150, 'Chinese', 'Available'),
('EV005', 'Chicken Pan Fried Momos', 170, 'Chinese', 'Available'),
('EV006', 'Chicken Deep Fried Momos', 170, 'Chinese', 'Available'),
('EV007', 'Veg Penne Pasta', 150, 'Italian', 'Available'),
('EV008', 'Veg Cheese Pasta', 180, 'Italian', 'Available'),
('EV009', 'Cheesy Tomato Pasta', 180, 'Italian', 'Available'),
('EV010', 'Chicken Pasta', 210, 'Italian', 'Available'),
('EV011', 'Veg Supreme Burger ', 160, 'Italian', 'Available'),
('EV012', 'Veg Supreme Sandwich', 150, 'Italian', 'Available'),
('EV013', 'Chicken Ravioli', 250, 'Italian', 'Available'),
('EV014', 'Cheese Ravioli', 230, 'Italian', 'Available'),
('EV015', 'Chicken Hyderabadi', 190, 'South Indian', 'Available'),
('EV016', 'Chicken Fried Rice', 170, 'Chinese', 'Available'),
('EV017', 'Chicken Schezwan Fried Rice', 180, 'Chinese', 'Available'),
('EV018', 'Chicken Lollipop', 210, 'South Indian', 'Available'),
('EV019', 'Chicken Kolhapuri', 210, 'South Indian', 'Available'),
('EV020', 'Chicken Kadhai', 200, 'South Indian', 'Available'),
('EV021', 'Nellore Chicken', 220, 'South Indian', 'Available'),
('EV022', 'Hyderabadi Chicken Biryani', 200, 'South Indian', 'Available'),
('EV023', 'Chicken Dum Biryani', 210, 'South Indian', 'Available'),
('EV024', 'Mutton Biryani', 240, 'South Indian', 'Available'),
('EV025', 'Risotto', 250, 'Italian', 'Available'),
('EV026', 'Italian Salad', 180, 'Italian', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `5`
--

CREATE TABLE `5` (
  `ITEM_ID` char(5) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CUISINE_TYPE` varchar(20) DEFAULT NULL,
  `Availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5`
--

INSERT INTO `5` (`ITEM_ID`, `ITEM_NAME`, `PRICE`, `CUISINE_TYPE`, `Availability`) VALUES
('GB001', 'Chicken Monchow Soup', 115, 'Chinese', 'Available'),
('GB002', 'Chicken Hot n Sour Soup', 130, 'Chinese', 'Available'),
('GB003', 'Veg Thukpa Soup', 110, 'Chinese', 'Available'),
('GB004', 'Gobi Manchurian Dry', 135, 'Chinese', 'Available'),
('GB005', 'Gobi Chilli Dry', 135, 'Chinese', 'Available'),
('GB006', 'Paneer Manchurian Dry', 155, 'Chinese', 'Available'),
('GB007', 'Paneer Chilli Dry', 155, 'Chinese', 'Available'),
('GB008', 'Mushroom Manchurian Dry', 155, 'Chinese', 'Available'),
('GB009', 'Chicken Hyderabadi', 160, 'South Indian', 'Available'),
('GB010', 'Chicken Lollipop', 175, 'South Indian', 'Available'),
('GB011', 'Chicken Kolhapuri', 180, 'South Indian', 'Available'),
('GB012', 'Chicken Kadhai', 170, 'South Indian', 'Available'),
('GB013', 'Nelllore Chicken', 195, 'South Indian', 'Available'),
('GB014', 'Chicken Biryani', 160, 'South Indian', 'Available'),
('GB015', 'Chicken Dum Biryani', 185, 'South Indian', 'Available'),
('GB016', 'Mutton Biryani', 230, 'South Indian', 'Available'),
('GB017', 'Chicken Ravioli', 210, 'Italian', 'Available'),
('GB018', 'Cheese Ravioli', 190, 'Italian', 'Available'),
('GB019', 'Veg Penne Pasta', 180, 'Italian', 'Available'),
('GB020', 'Veg Cheese Pasta', 180, 'Italian', 'Available'),
('GB021', 'Cheesy Tomato Pasta', 195, 'Italian', 'Available'),
('GB022', 'Chicken Pasta', 220, 'Italian', 'Available'),
('GB023', 'Veg Supreme Sandwich ', 175, 'Italian', 'Available'),
('GB024', 'Veg Supreme Burger', 175, 'Italian', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `6`
--

CREATE TABLE `6` (
  `ITEM_ID` char(5) NOT NULL,
  `ITEM_NAME` varchar(30) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CUISINE_TYPE` varchar(20) DEFAULT NULL,
  `Availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `6`
--

INSERT INTO `6` (`ITEM_ID`, `ITEM_NAME`, `PRICE`, `CUISINE_TYPE`, `Availability`) VALUES
('KF001', 'Breakfast Combo', 110, 'South Indian', 'Available'),
('KF002', 'Mega Breakfast Combo', 200, 'South Indian', 'Available'),
('KF003', 'Poori Saagu', 95, 'South Indian', 'Available'),
('KF004', 'Paper Dosa', 60, 'South Indian', 'Available'),
('KF005', 'Plain Dosa', 70, 'South Indian', 'Available'),
('KF006', 'Masala Dosa', 70, 'South Indian', 'Available'),
('KF007', 'Cheese Dosa', 100, 'South Indian', 'Available'),
('KF008', 'Cheese Masala Dosa', 110, 'South Indian', 'Available'),
('KF009', 'Veg Delight Pizza', 145, 'Italian', 'Available'),
('KF010', 'Veg Cheesy Pizza', 175, 'Italian', 'Available'),
('KF011', 'Paneer n Onion Pizza', 180, 'Italian', 'Available'),
('KF012', 'Chicken Pepperoni Pizza', 195, 'Italian', 'Available'),
('KF013', 'Chicken Delight Pizza', 190, 'Italian', 'Available'),
('KF014', 'Vrg Penne Pasta', 150, 'Italian', 'Available'),
('KF015', 'Cheesy Pasta', 160, 'Italian', 'Available'),
('KF016', 'Cheese Ravioli', 185, 'Italian', 'Available'),
('KF017', 'Veg Fried Rice', 110, 'Chinese', 'Available'),
('KF018', 'Veg Schezwan Fried Rice', 120, 'Chinese', 'Available'),
('KF019', 'Chicken Fried Rice ', 140, 'Chinese', 'Available'),
('KF020', 'Chicken Schezwan Fried Rice', 150, 'Chinese', 'Available'),
('KF021', 'Veg Hakka Noodles', 110, 'Chinese', 'Available'),
('KF022', 'Chicken Hakka Noodles', 140, 'Chinese', 'Available'),
('KF023', 'Egg Fried Rice', 110, 'Chinese', 'Available'),
('KF024', 'Egg Noodles', 120, 'Chinese', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `u_name` varchar(40) NOT NULL,
  `address` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`u_name`, `address`) VALUES
('nikhilagrawal027ji@gmail.com', 'Patanjali Chikitsalay and store, Link Road Janjgir'),
('shivambudhia@gmail.com', 'Marine drive'),
('skalhans04@gmail.com', 'Lucknow Road'),
('suniljhajhdia20@gmail.com', 'Patanjali Chikitsalay and store, Link Road Janjgir'),
('yash03agrawal@gmail.com', 'Maheshwari Hostel RR Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `u_name` varchar(40) NOT NULL,
  `city` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`u_name`, `city`) VALUES
('nikhilagrawal027ji@gmail.com', 'JANJGIR'),
('shivambudhia@gmail.com', 'Mumbai'),
('skalhans04@gmail.com', 'Gonda'),
('suniljhajhdia20@gmail.com', 'JANJGIR'),
('yash03agrawal@gmail.com', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `u_name` varchar(40) NOT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`u_name`, `country`) VALUES
('nikhilagrawal027ji@gmail.com', 'India'),
('shivambudhia@gmail.com', 'India'),
('skalhans04@gmail.com', 'India'),
('suniljhajhdia20@gmail.com', 'India'),
('yash03agrawal@gmail.com', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `u_name` varchar(40) NOT NULL,
  `f_name` varchar(20) DEFAULT '',
  `l_name` varchar(20) DEFAULT '',
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`u_name`, `f_name`, `l_name`, `contact`, `gender`) VALUES
('nikhilagrawal027ji@gmail.com', 'Nikhil', 'Agrawal', '7415727172', 'Male'),
('shivambudhia@gmail.com', 'Shivam', 'Budhia', '9876453211', 'Male'),
('skalhans04@gmail.com', 'Shivam', 'Kalhans', '7975835849', 'Male'),
('suniljhajhdia20@gmail.com', 'Sunil', 'Agrawal', '9826684582', 'Male'),
('yash03agrawal@gmail.com', 'Yash', 'Agrawal', '09755639825', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `c_order`
--

CREATE TABLE `c_order` (
  `u_name` varchar(40) DEFAULT NULL,
  `o_id` int(11) NOT NULL,
  `r_id` varchar(10) DEFAULT NULL,
  `o_status` varchar(30) DEFAULT 'Processing',
  `o_date_time` datetime NOT NULL DEFAULT '2011-01-26 14:30:00',
  `o_rating` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_order`
--

INSERT INTO `c_order` (`u_name`, `o_id`, `r_id`, `o_status`, `o_date_time`, `o_rating`) VALUES
('yash03agrawal@gmail.com', 21, '2', 'Order Denied', '2011-01-26 14:30:00', 1),
('skalhans04@gmail.com', 22, '2', 'Delivered', '2019-03-25 11:51:12', 4),
('yash03agrawal@gmail.com', 23, '5', 'Delivered', '2019-03-25 22:06:43', 5),
('yash03agrawal@gmail.com', 24, '2', 'Delivered', '2019-03-26 02:34:50', 5);

-- --------------------------------------------------------

--
-- Table structure for table `c_order_details`
--

CREATE TABLE `c_order_details` (
  `o_id` int(11) DEFAULT NULL,
  `item_id` char(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_order_details`
--

INSERT INTO `c_order_details` (`o_id`, `item_id`, `quantity`) VALUES
(21, 'BE001', 1),
(21, 'BE002', 2),
(21, 'BE003', 3),
(22, 'BE001', 2),
(23, 'GB004', 2),
(23, 'GB005', 2),
(24, 'BE004', 1),
(24, 'BE005', 2),
(24, 'BE006', 4);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `u_name` varchar(40) DEFAULT NULL,
  `r_name` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `rating` float DEFAULT '0',
  `r_id` varchar(10) NOT NULL,
  `no_of_rating` int(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`u_name`, `r_name`, `address`, `contact`, `rating`, `r_id`, `no_of_rating`) VALUES
('andhravantillu@gmail.com', 'Andhra Vantillu', 'Global Village', '9786543214', 0, '1', 0),
('beijingeats@gmail.com', 'Beijing Eats', 'RR Nagar', '7415874591', 3.33333, '2', 3),
('donspizza@gmail.com', 'Don\'s Pizza', 'MG Road', '7415987565', 0, '3', 0),
('everest@gmail.com', 'Everest', 'RR Nagar', '8825456987', 0, '4', 0),
('goodbowl@gmail.com', 'Good Bowl', 'MG Road', '9875142563', 5, '5', 1),
('kaifoods@gmail.com', 'kai Foods', 'Global Village', '7432369854', 0, '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `type` int(5) NOT NULL,
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`type`, `username`, `password`) VALUES
(1, 'andhravantillu@gmail.com', 'Qwerty123'),
(1, 'beijingeats@gmail.com', 'Qwerty123'),
(1, 'donspizza@gmail.com', 'Qwerty123'),
(1, 'everest@gmail.com', 'Qwerty123'),
(1, 'goodbowl@gmail.com', 'Qwerty123'),
(1, 'kaifoods@gmail.com', 'Qwerty123'),
(2, 'nikhilagrawal027ji@gmail.com', 'Qwerty123'),
(2, 'shivambudhia@gmail.com', 'Qwerty123'),
(2, 'skalhans04@gmail.com', 'Qwerty123'),
(2, 'suniljhajhdia20@gmail.com', 'Qwerty123'),
(2, 'yash03agrawal@gmail.com', 'Qwerty123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1`
--
ALTER TABLE `1`
  ADD PRIMARY KEY (`ITEM_ID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`u_name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`u_name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`u_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`u_name`);

--
-- Indexes for table `c_order`
--
ALTER TABLE `c_order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `u_name` (`u_name`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `c_order_details`
--
ALTER TABLE `c_order_details`
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `u_name` (`u_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_order`
--
ALTER TABLE `c_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `customer` (`u_name`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `customer` (`u_name`);

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `customer` (`u_name`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `c_order`
--
ALTER TABLE `c_order`
  ADD CONSTRAINT `c_order_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `customer` (`u_name`),
  ADD CONSTRAINT `c_order_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `restaurant` (`r_id`);

--
-- Constraints for table `c_order_details`
--
ALTER TABLE `c_order_details`
  ADD CONSTRAINT `c_order_details_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `c_order` (`o_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`u_name`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
