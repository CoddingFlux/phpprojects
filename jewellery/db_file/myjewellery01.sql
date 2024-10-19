-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myjewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE `category_type` (
  `Type_Id` varchar(20) NOT NULL,
  `Type_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`Type_Id`, `Type_Name`) VALUES
('JPTID01', 'Gold'),
('JPTID02', 'Silver'),
('JPTID03', 'Platinum'),
('JPTID04', 'Dimond+Gold'),
('JPTID05', 'Dimond+Silver'),
('JPTID06', 'Dimond+Platinum');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Category_Id` varchar(20) NOT NULL,
  `Type_Id` varchar(50) NOT NULL,
  `Sub_Category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Category_Id`, `Type_Id`, `Sub_Category`) VALUES
('JPID001', 'JPTID01', 'Earring'),
('JPID002', 'JPTID02', 'Earring'),
('JPID004', 'JPTID03', 'Earring'),
('JPID005', 'JPTID04', 'Earring'),
('JPID006', 'JPTID05', 'Earring'),
('JPID007', 'JPTID01', 'Bangle'),
('JPID009', 'JPTID03', 'Pendant'),
('JPID010', 'JPTID05', 'Bracelet'),
('JPID011', 'JPTID03', 'Necklace'),
('JPID012', 'JPTID02', 'Locket'),
('JPID013', 'JPTID03', 'Ring'),
('JPID014', 'JPTID06', 'Chain');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `product_id` varchar(20) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_detail` varchar(500) DEFAULT NULL,
  `product_additional_detail` varchar(300) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT NULL,
  `product_color` varchar(50) DEFAULT NULL,
  `product_size` varchar(50) DEFAULT NULL,
  `product_weight` varchar(20) NOT NULL,
  `product_stock` int(10) NOT NULL DEFAULT 0,
  `product_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_id`, `product_img`, `product_name`, `product_type`, `product_category`, `product_price`, `product_detail`, `product_additional_detail`, `product_description`, `product_color`, `product_size`, `product_weight`, `product_stock`, `product_time`) VALUES
('JYPID000000001', 'Gold/Bracelet/bracelet3.jpg', 'Bracelet', 'Gold', 'Bracelet', 40000, '23k (85.9% pure gold) including yellow gold', '.In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '100 gm', 200, '2023-11-03 17:34:00'),
('JYPID000000002', 'Gold/Bangle/bangle1.jpg', 'Bangle', 'Gold', 'Bangle', 75000, '24k (99.9% pure gold) including yellow gold', 'In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(nclude 2.5 inches, 2.6 inches)', '200 gm', 200, '2023-11-03 17:34:17'),
('JYPID000000003', 'Gold/Bracelet/bracelet4.jpg', 'Bracelet', 'Gold', 'Bracelet', 25000, '23k (85.9% pure gold) including yellow gold', '.In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '100 gm', 200, '2023-11-03 17:34:39'),
('JYPID000000004', 'Gold/Bracelet/bracelet4.jpg', 'Bracelet', 'Gold', 'Bracelet', 40000, '23k (85.9% pure gold) including yellow gold', '.In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '100 gm', 200, '2023-11-03 17:34:50'),
('JYPID000000005', 'Gold/Bangle/bangle2.jpg', 'Bangle', 'Gold', 'Bangle', 45000, '23k (85.9% pure gold) including yellow gold', '.In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '.(include 2.5 inches, 2.5 cm', '.300 gm', 200, '2023-11-03 17:35:06'),
('JYPID000000006', 'Gold/Bangle/bangle3.jpg', 'Bangle', 'Gold', 'Bangle', 40000, '22k (80.9% pure gold) including yellow gold', 'In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '300 gm', 200, '2023-11-03 17:35:18'),
('JYPID000000007', 'Gold/Bangle/bangle4.jpg', 'Bangle', 'Gold', 'Bangle', 30000, '23k (88.9% pure gold) including yellow gold', 'In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '400 gm', 200, '2023-11-03 17:35:26'),
('JYPID000000008', 'Gold/Bangle/bangle5.jpg', 'Bangle', 'Gold', 'Bangle', 50000, '24k (99.9% pure gold) including yellow gold', 'In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 3.5 inches, 2.5 cm', '500 gm', 200, '2023-11-03 17:35:37'),
('JYPID000000009', 'Gold/Bangle/bangle6.jpg', 'Bangle', 'Gold', 'Bangle', 60000, '22k (88.9% pure gold) including yellow gold', 'In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.2 inches, 2.5 cm', '150gm', 200, '2023-11-03 17:35:48'),
('JYPID000000010', 'Gold/Bangle/bangle7.jpg', 'Bangle', 'Gold', 'Bangle', 70000, '22k (80.9% pure gold) including yellow gold', 'In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '200gm', 200, '2023-11-03 17:36:00'),
('JYPID000000011', 'Gold/Bracelet/bracelet1.jpg', 'Bracelet', 'Gold', 'Bracelet', 30000, '23k (85.9% pure gold) including yellow gold', '.In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 10 cm', '100 gm', 200, '2023-11-03 17:36:12'),
('JYPID000000012', 'Gold/Bracelet/bracelet2.jpg', 'Bracelet', 'Gold', 'Bracelet', 35000, '23k (85.9% pure gold) including yellow gold', '.In addition to gold, jewelry can be made from various other materials, including', 'Authentic gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'yellow', '(include 2.5 inches, 2.5 cm', '100 gm', 200, '2023-11-03 17:36:28'),
('JYPID000000013', 'Silver/Earring/earing1.jpg', 'Earring', 'Silver', 'Earring', 10000, '(85.9% pure Silver) including  Silver', 'In addition to silver, jewelry can be made from various other materials, including', 'Authentic silver jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'White', '(include 2.5 inches, 2.5 cm', '20gm', 200, '2023-11-03 17:44:47'),
('JYPID000000014', 'Silver/Earring/earing2.jpg', 'Earring', 'Silver', 'Earring', 10000, '(85.9% pure Silver) including  Silver', 'In addition to silver, jewelry can be made from various other materials, including', 'Authentic silver jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'White', '(include 2.5 inches, 2.5 cm', '20gm', 200, '2023-11-03 17:45:42'),
('JYPID000000015', 'Gold/Earring/earing1.jpg', 'Earring', 'Gold', 'Earring', 20000, '23k(85.9% pure Silver) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:48:19'),
('JYPID000000016', 'Gold/Pendant/pendant1.jpg', 'Pendant', 'Gold', 'Pendant', 10000, '23k(95.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:51:18'),
('JYPID000000017', 'Gold/Pendant/pendant2.jpg', 'Pendant', 'Gold', 'Pendant', 12000, '23k(95.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:52:13'),
('JYPID000000018', 'Gold/Pendant/pendant3.jpg', 'Pendant', 'Gold', 'Pendant', 14000, '23k(91.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:52:37'),
('JYPID000000019', 'Gold/Pendant/pendant4.jpg', 'Pendant', 'Gold', 'Pendant', 16000, '24k(99.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:53:20'),
('JYPID000000020', 'Gold/Pendant/pendant5.jpg', 'Pendant', 'Gold', 'Pendant', 17000, '24k(99.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:53:41'),
('JYPID000000021', 'Gold/Pendant/pendant6.jpg', 'Pendant', 'Gold', 'Pendant', 19000, '24k(99.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:54:11'),
('JYPID000000022', 'Gold/Pendant/pendant7.jpg', 'Pendant', 'Gold', 'Pendant', 20000, '24k(99.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:54:33'),
('JYPID000000023', 'Gold/Pendant/pendant8.jpg', 'Pendant', 'Gold', 'Pendant', 22000, '23k(95.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:55:02'),
('JYPID000000024', 'Gold/Pendant/pendant9.jpg', 'Pendant', 'Gold', 'Pendant', 24000, '23k(95.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:55:17'),
('JYPID000000025', 'Gold/Pendant/pendant10.jpg', 'Pendant', 'Gold', 'Pendant', 26000, '24k(99.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:57:12'),
('JYPID000000026', 'Gold/Ring/ring1.jpg', 'Ring', 'Gold', 'Ring', 20000, '24k(99.9% pure Gold) including  Gold', 'In addition to Gold, jewelry can be made from various other materials, including', 'Authentic Gold jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'Yellow', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 17:59:54'),
('JYPID000000027', 'Silver/Ring/ring1.jpg', 'Ring', 'Silver', 'Ring', 20000, '(99.9% pure Silver) including  Silver', 'In addition to Silver, jewelry can be made from various other materials, including', 'Authentic Silver jewelry often bears hallmarks that indicate its purity and the manufacturer. These hallmarks are essential for identifying the quality and origin of the piece.', 'White', '(include 2.5 inches, 1.5 cm', '20gm', 200, '2023-11-03 18:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_street` varchar(50) NOT NULL,
  `user_contact` varchar(14) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `user_address_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_name`, `user_country`, `user_state`, `user_city`, `user_street`, `user_contact`, `user_id`, `user_address_time`) VALUES
('JEADDID000000001', 'Nitin', 'America', 'hshh', 'dhdha', 'hsdhs', '656374', 'nitin084@gmail.com', '2023-11-03 18:36:57'),
('JEADDID000000002', 'Rixit Dobariya', 'India', 'Gujarat', 'Rajkot', 'Mavadi-3800982', '7827388877', 'rixit090@gmail.com', '2023-11-03 18:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `cart_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_quantity` varchar(20) NOT NULL DEFAULT '1',
  `cart_add_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`cart_id`, `product_id`, `user_id`, `product_quantity`, `cart_add_time`) VALUES
('JCARTID0000000004', 'JYPID000000002', 'nitin084@gmail.com', '4', '2024-01-30 07:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `unique_user_id` varchar(20) NOT NULL,
  `user_name` text DEFAULT NULL,
  `user_img` varchar(50) DEFAULT NULL,
  `user_contact` varchar(14) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_roll` text NOT NULL DEFAULT 'User',
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_signup_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`unique_user_id`, `user_name`, `user_img`, `user_contact`, `user_email`, `user_password`, `user_roll`, `user_status`, `user_signup_time`) VALUES
('JUID000000001', 'Renish Limbasiya', 'profile.jpeg', '8747364876', 'renish090@gmail.com', '26ff2d51344f5ed8c6dbe0b7a2d11c32', 'Admin', 1, '2023-11-03 18:16:44'),
('JUID000000002', 'Meet Vadher', 'profile4.jpeg', '8777378377', 'meet090@gmail.com', 'd625b8775eff3855fb215f4689f50800', 'Admin', 1, '2023-11-03 18:16:44'),
('JUID000000003', 'Nitin Makawana', 'profile6.jpeg', '7837388288', 'nitin084@gmail.com', 'f25bf8288847d093235e9b38f2e27df4', 'User', 1, '2023-11-03 18:17:52'),
('JUID000000004', 'Mohit Mahidadiya', 'profile5.jpeg', '8737738778', 'mohit090@gmail.com', 'fdf28946c57cd86f8b42c1627e2ef5ec', 'User', 1, '2023-11-03 18:18:58'),
('JUID000000005', 'Raj Kanani', 'profile1.jpeg', '8727388765', 'raj090@gmail.com', 'ec5880d0ec4acb7ef0121728e8d8df2a', 'User', 1, '2023-11-03 18:20:15'),
('JUID000000006', 'Rixit Dobariya', 'profile2.jpeg', '8488348876', 'rixit090@gmail.com', 'fcc319982fb6073ac907efdd1afe8b27', 'User', 1, '2023-11-03 18:21:37'),
('JUID000000007', 'Jay Gorfad', 'profile3.jpeg', '8928398765', 'jay090@gmail.com', 'fc16499b5b9794f9d35752cb1e89b4c5', 'User', 1, '2023-11-03 18:22:50'),
('JUID000000008', 'Meetu', NULL, '3454345345', 'm2@gmail.com', '6124f8d3fc909e787e235bcc68b07129', 'Admin', 1, '2024-01-31 04:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_selling_price` int(20) NOT NULL DEFAULT 0,
  `product_quantity` varchar(100) NOT NULL,
  `replacement_charges` int(10) NOT NULL DEFAULT 0,
  `user_payment_method` varchar(30) NOT NULL,
  `user_bill_address_id` varchar(20) NOT NULL,
  `order_confirm_status` tinyint(1) NOT NULL DEFAULT 0,
  `order_time_stemp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `product_id`, `product_selling_price`, `product_quantity`, `replacement_charges`, `user_payment_method`, `user_bill_address_id`, `order_confirm_status`, `order_time_stemp`) VALUES
('JEOID00000000001', 'nitin084@gmail.com', ',JYPID000000002', 150000, ',2', 20, 'PAYTM', 'JEADDID000000001', 1, '2023-11-03 18:37:15'),
('JEOID00000000002', 'rixit090@gmail.com', ',JYPID000000003', 75000, ',3', 20, 'CASH ON DELIVERY', 'JEADDID000000002', -1, '2023-11-03 18:42:17');

--
-- Triggers `user_orders`
--
DELIMITER $$
CREATE TRIGGER `deletecart` AFTER INSERT ON `user_orders` FOR EACH ROW DELETE FROM user_cart WHERE user_id = NEW.user_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deletewishlist` BEFORE DELETE ON `user_orders` FOR EACH ROW DELETE FROM user_wishlist WHERE user_id=OLD.user_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `user_reviews_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `review_total` int(1) NOT NULL,
  `user_comment` varchar(200) NOT NULL,
  `user_review_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`user_reviews_id`, `user_id`, `product_id`, `review_total`, `user_comment`, `user_review_date_time`) VALUES
('JRID000000000000001', 'nitin084@gmail.com', 'JYPID000000002', 4, 'This Is Nice Product', '2023-11-03 18:35:43'),
('JRID000000000000002', 'rixit090@gmail.com', 'JYPID000000003', 5, 'Nice Product', '2023-11-03 18:38:58'),
('JRID000000000000003', 'nitin084@gmail.com', 'JYPID000000004', 1, 'hello', '2023-11-04 04:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE `user_wishlist` (
  `wishlist_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_quantity` varchar(20) NOT NULL DEFAULT '1',
  `wishlist_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_wishlist`
--

INSERT INTO `user_wishlist` (`wishlist_id`, `product_id`, `user_id`, `product_quantity`, `wishlist_time`) VALUES
('JWISHID0000000002', 'JYPID000000003', 'rixit090@gmail.com', '3', '2023-11-03 18:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`Type_Id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`unique_user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`user_reviews_id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
