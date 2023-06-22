-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 05:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renters`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'mostafa', '123'),
(2, 'ahmed', '123'),
(3, 'salma', '123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`) VALUES
(9, 'Electronics'),
(10, 'Fashion'),
(11, 'Sports'),
(12, 'Home Supplies'),
(13, 'Accommodations'),
(15, 'Photography'),
(16, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `name` varchar(2555) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(6, 'Dr.Khaled Badran', 'Khaled@gmail.com', 'About renting Apple watch', 'The apple watch come without charger please contact the owner and resolve the problem'),
(7, 'Dr.Mary', 'Mary@asst.edu', 'Offers', 'Hello, renters could you please send me the top rented products on mail ?'),
(8, 'Mohamed Fakhrany', 'fakh@gmail.com', 'Review', 'I want to thank you for providing such a valuable service to renters like myself. Your website has truly made a difference in my rental search experience, and I will be sure to recommend it to anyone I know who is in the market for a new rental property.\r\n\r\nThank you again for your exceptional services.\r\n\r\nBest regards,\r\nMohamed Fakhrany'),
(9, 'Salama Mohamed', 'salama@gmail.com', 'Macbook pro 13', 'The device came without charger ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `price` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img`, `title`, `desc`, `cat_id`, `owner_id`, `price`) VALUES
(34, 'midi controller.jpg', 'Midi controller', 'Alesis V25-25-Key Usb Midi Keyboard Controller With Backlit Pads, 4 Assignable Knobs And Buttons.\r\n\r\n', 9, 13, '50'),
(35, 'tamron.jpg', 'Tamron SP AF 10-24mm', '	Canon EF, Nikon F, Pentax K, Sony Alpha,	10-24mm', 15, 13, '200'),
(38, 'Macbook-Pro-13.jpg', 'Apple  MacBook Pro \"13\"', 'MacBook Pro 13\" Apple M1 Chip 8GB Memory 256GB SSD Integrated 8-core GPU (Late 2020)\r\n13.3\", Keyboard - English', 9, 13, '800'),
(39, 'canon.jpg', 'Canon 1500D + 18-55mm Lens', '• High Quality Servicing\r\n• Touch Screen & Remote Control\r\n• 24.1 MegaPixel\r\n• Full HD Video', 15, 13, '300'),
(40, 'bike.webp', 'Umit Mirage Mountain Bike', 'Rear Derailleur: SHIMANO RD-TY300 FD-TZ 500\r\nShifters: SHIMANO ALTUS SL-M315\r\nCranks: L180 MM\r\nRims: 27,5 X 2,1?\r\nTires: MITAS 27,5 X 2,1', 11, 13, '200'),
(41, 'coffe maker.jpg', '  Mixpresso 8-Cup Coffee Maker', 'he coffee maker is black and has a lighted on/off switch. The coffee maker takes three minutes to brew a full 12 cup pot of coffee.', 16, 13, '150'),
(42, 'hp print.jpg', 'HP - OfficeJet Pro 9025e Wireless', 'HP 962 Black Original Ink Cartridge (~1,000 pages), HP 962 Cyan Original Ink Cartridge (~700 pages), HP 962 Magenta Original Ink Cartridge (~700 pages), HP 962 Yellow Original Ink Cartridge (~700 pages), HP 962XL Black Original Ink Cartridge (2,000 pages)', 9, 13, '300'),
(43, 'ry.webp', 'Ray Ban BLAZE CLUBMASTER', 'Original Rayban clubmaster\r\nHINGE TO HINGE\r\n143mm\r\nLENS HEIGHT\r\nUndefinedmm\r\nBRIDGE WIDTH\r\n01 47mm\r\nTEMPLE LENGTH\r\n140mm', 10, 13, '60'),
(50, 'iphone.jpg', 'Apple iPhone 13 Pro Max Gold', '6.7\" Super Retina XDR display with ProMotion, Triple Rear Camera, 6GB RAM, Apple A15 Bionic, 5G', 9, 13, '400'),
(51, 'pansonic2.jpg', 'Panasonic Vacuum 220w', 'Power: 2200 Watt\r\nDust capacity: 21 Liters\r\nAnti-Bacteria Filter', 12, 13, '170'),
(53, 'wedd.webp', 'White Wedding Dress', 'Wedding Dress medium size', 10, 13, '2000'),
(55, 'applewtch.jpg', 'Apple Watch Ultra', 'size:49mm\r\naerospace-grade titanium case strike\r\nGPS + Cellular', 9, 13, '390'),
(56, 'drone.jpg', 'DJI Mini, Drone Quadcopter', '2.7K Camera, GPS, 30 Mins Flight , Less Than 249g, Scale 5 Wind Resistance, Return to Home.', 15, 13, '1000'),
(57, 'palm dubai.jpg', 'Studio in Palm Jumeirah - Dubai', 'This air-conditioned apartment is fitted with 1 bedroom, a flat-screen TV, and a kitchen.\r\n Palm Jumeirah – a man-made, palm tree-shaped archipelago home to luxury hotels', 13, 13, '3000'),
(64, 'demorob.jpg', 'Demo Robot', 'A robot for AAST graduation project :D', 9, 13, '150');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` datetime(6) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `card_holder_name` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `cvv` int(255) NOT NULL,
  `rentime` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `product_id`, `user_id`, `date`, `status`, `payment_method`, `card_holder_name`, `card_name`, `exp_date`, `cvv`, `rentime`, `shipping`) VALUES
(16, 50, 14, '2023-05-31 07:05:41.000000', 'Paid', '2', 'Salma Mohamed', '4916609118847519', '2025-12-22', 779, '3 Months', 'Aramex'),
(17, 38, 14, '2023-05-31 07:08:29.000000', 'Not paid', '1', '', '', '', 0, '6 Months', 'UPS'),
(18, 55, 15, '2023-05-31 07:36:31.000000', 'Paid', '2', 'Mustafa Anwar', '4916412721536656', '2027-07-07', 112, '1 Month', 'Fedex'),
(19, 34, 15, '2023-05-31 07:37:35.000000', 'Paid', '1', '', '', '', 0, '3 Months', 'UPS'),
(21, 53, 14, '2023-05-31 14:35:42.000000', 'Paid', '1', '', '', '', 0, '6 Months', 'UPS'),
(23, 41, 14, '2023-05-31 17:06:47.000000', 'Paid', '1', '', '', '', 0, '7 days', 'Fedex\r\n'),
(24, 40, 14, '2023-05-31 17:17:25.000000', 'Paid', '1', '', '', '', 0, '7 days', 'UPS'),
(26, 43, 14, '2023-06-01 14:17:06.000000', 'Paid', '1', '', '', '', 0, '3 Months', 'Aramex'),
(28, 38, 17, '2023-06-01 14:51:21.000000', 'Paid', '1', '', '', '', 0, '12 Months', 'UPS'),
(29, 56, 17, '2023-06-01 14:54:21.000000', 'Paid', '1', '', '', '', 0, '12 Months', 'UPS'),
(31, 64, 13, '2023-06-07 16:37:22.000000', 'Paid', '2', 'Ahmed Hany', '4929672753475660', '2029-12-05', 554, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(255) NOT NULL,
  `rating_num` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `time` datetime(6) NOT NULL,
  `designer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `rating_num`, `comment`, `u_name`, `u_image`, `time`, `designer_id`) VALUES
(33, '5', 'awesome device with reasonable price ', 'Salma.M', 'salma profile pic.jpg', '2023-05-31 07:20:59.000000', 50),
(34, '4', 'Perfect value for money, nice product', 'Mostafa.B', 'baioumy.webp', '2023-05-31 07:39:46.000000', 34),
(35, '5', 'Wonderfull', 'Mostafa.B', 'baioumy.webp', '2023-05-31 07:41:03.000000', 38),
(37, '5', 'Good Choice', 'Fakharany', 'fakh.jpg', '2023-06-01 14:59:07.000000', 38),
(38, '5', 'nice', 'Fakharany', 'fakh.jpg', '2023-06-01 14:59:30.000000', 34),
(39, '5', '', 'Fakharany', 'fakh.jpg', '2023-06-01 14:59:47.000000', 35),
(40, '5', 'the product is like new', 'Amr.K', 'penguin.jpg', '2023-06-01 15:00:42.000000', 34),
(41, '4', 'Perfect', 'Amr.K', 'penguin.jpg', '2023-06-01 15:01:09.000000', 35),
(42, '5', 'Macbook pro with mint condition, satisfied with renters services in Egypt\r\nThank you', 'Amr.K', 'penguin.jpg', '2023-06-01 15:03:18.000000', 38),
(45, '5', 'Awesome', 'Ahmed Heggy', 'Red-Hat-logo_2.original.jpg', '2023-06-07 16:26:49.000000', 38),
(46, '4', 'Good choice', 'Ahmed Heggy', 'Red-Hat-logo_2.original.jpg', '2023-06-07 16:33:49.000000', 38);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img`, `email`, `password`, `number`, `location`, `nid`) VALUES
(13, 'Ahmed Heggy', 'Red-Hat-logo_2.original.jpg', 'ahmadhany122@gmail.com', '123', '01001328228', 'Sheraton', 'nid demo.jpg'),
(14, 'Salma.M', 'salma profile pic.jpg', 'salma@gmail.com', '123', '01001238338', 'New Cairo', 'nid demo.jpg'),
(15, 'Mostafa.B', 'baioumy.webp', 'mostafa@gmail.com', '123', '01001427227', 'Madinaty', 'nid demo.jpg'),
(16, 'Amr.K', 'penguin.jpg', 'amr@gmail.com', '123', '01067064198', 'Maadi', 'nid demo.jpg'),
(17, 'Fakharany', 'fakh.jpg', 'fakh@gmail.com', '123', '01090000529', 'Mivida New cairo', 'nid demo.jpg'),
(19, 'demo1', 'demorob.jpg', 'demo1@gmail.com', '123', '01001282822', 'AAST', 'nid demo.jpg'),
(20, 'demo1', 'demorob.jpg', 'demo1@gmail.com', '123', '01090000529', 'AAST', 'nid demo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rentime` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer_id` (`designer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
