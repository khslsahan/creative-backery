-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 08:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativebakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(535) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_description`, `creation_date`, `update_date`) VALUES
(1, 'cake', 'The cake is a form of sweet food made from flour, sugar, and other ingredients, that is usually baked. In their oldest forms, cakes were modifications of bread, but cakes now cover a wide range of', '2020-03-27 10:53:10', NULL),
(2, 'Sweets', 'Candy, also called sweets or lollies, is a confection that features sugar as a principal ingredient. The category, called sugar confectionery, encompasses any sweet confection, including chocolate, chewing gum, and sugar candy.', '2020-03-24 12:46:06', NULL),
(3, 'Pastry Foods', 'The word pastries suggest many kinds of baked products made from ingredients such as flour, sugar, milk, butter, shortening, baking powder, and eggs. Small tarts and other sweet baked products are called pastries. Common pastry dishes include pies, tarts, quiches, croissants, and pasties.', '2020-03-24 12:47:34', NULL),
(4, 'Beverages', 'A drink is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture. Common types of drinks include plain drinking water, milk, coffee, tea, hot chocolate, juice, and soft drinks.', '2020-03-24 12:48:30', NULL),
(5, ' Dessert', 'The course usually consists of sweet foods, such as confections, and possibly a beverage such as a dessert wine or liqueur; however, in the United States, it may include coffee, cheeses, nuts, or other savory items regarded as a separate course elsewhere. In some parts of the world, such as much of central and western Africa, and most parts of China, there is no tradition of a dessert course to conclude a meal.', '2020-03-24 12:50:35', NULL),
(6, 'other foods', 'They are in  no certain category', '2020-03-24 12:51:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `order_date`) VALUES
(1, 2, 1, 1, '2020-03-27 11:10:20'),
(2, 2, 1, 1, '2020-03-27 11:11:03'),
(2, 2, 2, 2, '2020-03-27 11:11:03'),
(2, 2, 3, 2, '2020-03-27 11:11:03'),
(2, 2, 4, 1, '2020-03-27 11:11:03'),
(3, 1, 1, 1, '2020-04-15 06:39:15'),
(3, 1, 2, 1, '2020-04-15 06:39:16'),
(3, 1, 3, 1, '2020-04-15 06:39:16'),
(4, 1, 3, 1, '2020-05-14 11:08:03'),
(4, 1, 2, 1, '2020-05-14 11:08:04'),
(5, 1, 3, 2, '2020-05-18 07:48:07'),
(6, 2, 2, 1, '2020-05-18 17:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_track_history`
--

CREATE TABLE `order_track_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymet_method` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_track_history`
--

INSERT INTO `order_track_history` (`id`, `user_id`, `price`, `status`, `remark`, `post_date`, `paymet_method`, `delivery_time`) VALUES
(1, 2, 250, 'Delivered', '', '2020-03-27 11:10:20', '', '2020-05-18 11:04:46 '),
(2, 2, 3460, 'on packing', '', '2020-03-27 11:11:03', '', ''),
(3, 1, 1820, 'On Delivery', '', '2020-04-15 06:39:15', '', ''),
(4, 1, 1570, 'on packing', '', '2020-05-14 11:08:03', '', ''),
(5, 1, 3000, 'on packing', '', '2020-05-18 07:48:07', '', ''),
(6, 2, 70, 'on packing', '', '2020-05-18 17:38:47', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `outlet_name` varchar(255) NOT NULL,
  `outlet_description` varchar(535) NOT NULL,
  `outlet_province` varchar(255) NOT NULL,
  `outlet_address` varchar(535) NOT NULL,
  `outlet_location` point NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `outlet_name`, `outlet_description`, `outlet_province`, `outlet_address`, `outlet_location`, `image`) VALUES
(1, 'Perera & Sons', 'Our sinfully delightful, mouthwatering desserts will haunt your dreams and live in your memories forever. They will evoke bliss, envy, ecstasy, and visions of smooth, creamy wonders whose taste will make you catch your breath with joy. One taste will have you craving for more.\r\n\r\nDark & Light Chocolate Mousse – Obsessed with chocolate? ', 'colombo', '122-124, M.D.H Jayawardena Mawatha, Madinnagoda,\r\nRajagiriya', 0x, 'perea&sonspng.png'),
(2, 'හෙල රැවුලාගේ කටගැස්ම', 'Delicious 😋 food.! love the Kochi flavor of the food Highly recommended!!\r\nඔබට අද සිට හෙල රැවුලා ගේ කටගැස්ම වෙත්න්\r\nකොත්තු වලට නව රසයක්\r\nඕනෑම කොත්තුවකට යෝගට් එකක් දමා රස වැඩි කර ගත හැක', 'Matara', 'Welewatta junction, Matara\r\nMatara, Sri Lanka', 0x, 'helarawula.jpg'),
(3, 'Open Kitchen', 'Open Kitchen\" is a fast food restaurant located in Gampaha where you will be able to taste the most delicious fast food varieties, fresh fruit juices, etc.\r\n', 'Gampaha', '165, Yakkala Road\r\nGampaha, Sri Lanka', 0x, 'openKitchen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` varchar(535) NOT NULL,
  `product_image` longtext NOT NULL,
  `product_availability` tinyint(1) NOT NULL,
  `discount` float DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `product_image`, `product_availability`, `discount`, `post_date`, `update_date`) VALUES
(1, 4, 'Milkshake', 250, 200, 'A milkshake, or simply shake, is a drink that is usually made by blending milk, ice cream, and flavorings or sweeteners such as butterscotch, caramel sauce, chocolate syrup, or fruit syrup into a thick, sweet, cold mixture', 'milkshake.jpg', 0, NULL, '2020-03-27 10:56:37', NULL),
(2, 2, 'chocolate muffin', 70, 1000, 'This classic chocolate muffin recipe will make perfectly soft and rich in chocolate flavor muffins every time, so you can rest assured they will be a success with your friends and family.\r\nThis chocolate muffin recipe makes 12 regular sized chocolate muffins and will take about 55 mins to prepare and bake, so you can dig into these lovely little treats less than an hour from when you set off baking.', 'Chocolate-muffinsjpg.jpg', 0, NULL, '2020-03-24 13:41:32', NULL),
(3, 3, 'Mix Veg Pizza', 1500, 100, 'Mix Veg Pizza is one of the most loved dishes and is made with the combination of delicious vegetables like broccoli, onion, capsicum, carrot, mushroom, and cauliflower along with tomatoes, pizza sauce, and cheese.', 'Veg-Cheese-Pizza.jpg', 0, NULL, '2020-03-24 13:46:26', NULL),
(4, 3, 'Apple Pie', 70, 200, 'A pie is a baked dish which is usually made of a pastry dough casing that contains a filling of various sweet or savory ingredients. Sweet pies may be filled with fruit, nuts, brown sugar or sweetened vegetables. Savory pies may be filled with meat, eggs, and cheese or a mixture of meat and vegetables', 'pie.jpeg', 0, NULL, '2020-03-27 03:41:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `review` varchar(535) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `ratings`, `user_name`, `summary`, `review`, `review_date`) VALUES
(1, 2, 1, 'sahan', 'Its Ok', '', '2020-05-14 14:27:16'),
(2, 1, 3, 'sahan', 'Testy Food Realy Enjoyed', '', '2020-05-14 14:30:40'),
(3, 1, 5, 'sahan', 'Testy Food Realy Enjoyed', '', '2020-05-14 14:31:55'),
(4, 1, 2, 'sahan', 'Testy Food Realy Enjoyed', '', '2020-05-14 14:33:21'),
(5, 1, 5, 'sahan', 'Testy Food Realy Enjoyed', '', '2020-05-14 14:34:24'),
(6, 2, 5, 'sahan', 'Very Tasty Food I Realy Enjoyed it', '', '2020-05-15 03:05:25'),
(7, 2, 5, 'sahan', 'Very Tasty Food I Realy Enjoyed it', '', '2020-05-15 03:05:58'),
(8, 3, 3, '', 'Testy Food I will Come Again ', '', '2020-05-16 11:04:05'),
(9, 3, 3, '', 'Testy Food I will Come Again ', '', '2020-05-16 11:04:13'),
(10, 1, 5, 'sahanbcs', 'very Tasty Bevarage I ever have', '', '2020-05-18 18:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `password` char(128) NOT NULL,
  `role` varchar(255) NOT NULL,
  `address` varchar(535) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `contact_no`, `password`, `role`, `address`, `register_date`, `updated_date`) VALUES
(1, 'sahanbcs', 'lakshitha', 'sahan@gmail.com', '0713327794', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', '49A/149,\r\nhansagiri road ,\r\ngampaha', '2020-03-27 10:43:21', '2020-05-15 23:45:04'),
(2, 'sahan', 'lakshith', 'sss@gmail.com', '1212121', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '49A/149\r\nhansagiri road gampaha', '2020-03-27 10:49:38', '2020-05-16 02:34:52'),
(3, 'sada', 'mini', 'sada@gmail.com', '1212121', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', '49A/149\r\nhansagiri road gampaha', '2020-05-16 11:14:11', '2020-05-16 02:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_ip` varchar(535) NOT NULL,
  `role` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_email`, `user_ip`, `role`, `login_time`, `logout_time`, `status`) VALUES
(1, 'sahan@gmail.com', '::1', 'customer', '2020-03-27 10:43:41', '2020-03-26 22:47:49', 0),
(2, 'sss@gmail.com', '::1', 'admin', '2020-03-27 10:50:29', '2020-03-26 23:12:37', 0),
(3, 'sahan@gmail.com', '::1', 'customer', '2020-04-15 06:39:03', NULL, 1),
(4, 'sahan@gmail.com', '::1', 'customer', '2020-05-14 09:15:34', '2020-05-15 03:08:55', 0),
(5, 'sss@gmail.com', '::1', 'admin', '2020-05-15 03:09:47', '2020-05-15 04:54:46', 0),
(6, 'sahan@gmail.com', '::1', 'customer', '2020-05-15 04:55:21', '2020-05-15 04:55:54', 0),
(7, 'sahan@gmail.com', '::1', 'customer', '2020-05-15 04:56:36', '2020-05-15 05:22:59', 0),
(8, 'sahan@gmail.com', '::1', 'customer', '2020-05-15 05:23:39', NULL, 1),
(9, 'sahan@gmail.com', '::1', 'customer', '2020-05-16 03:46:03', '2020-05-16 06:01:32', 0),
(10, 'sahan@gmail.com', '::1', 'customer', '2020-05-16 06:01:50', '2020-05-16 06:42:11', 0),
(11, 'sss@gmail.com', '::1', 'admin', '2020-05-16 06:42:26', '2020-05-15 22:08:08', 0),
(12, 'sada@gmail.com', '::1', 'customer', '2020-05-16 11:14:29', '2020-05-15 23:29:10', 0),
(13, 'sahan@gmail.com', '::1', 'customer', '2020-05-16 11:30:41', '2020-05-15 23:31:50', 0),
(14, 'sss@gmail.com', '::1', 'admin', '2020-05-16 11:33:04', '2020-05-15 23:34:16', 0),
(15, 'sada@gmail.com', '::1', 'customer', '2020-05-16 11:35:23', '2020-05-15 23:39:24', 0),
(16, 'sahan@gmail.com', '::1', 'customer', '2020-05-16 11:44:56', '2020-05-15 23:45:08', 0),
(17, 'sahan@gmail.com', '::1', 'customer', '2020-05-16 11:45:25', '2020-05-15 23:45:51', 0),
(18, 'sss@gmail.com', '::1', 'admin', '2020-05-16 14:03:15', '2020-05-16 02:36:32', 0),
(19, 'sada@gmail.com', '::1', 'admin', '2020-05-16 14:36:46', '2020-05-16 02:37:16', 0),
(20, 'sada@gmail.com', '::1', 'customer', '2020-05-16 14:37:28', '2020-05-16 02:37:35', 0),
(21, 'sahan@gmail.com', '::1', 'customer', '2020-05-16 14:43:13', '2020-05-17 05:29:35', 0),
(22, 'sss@gmail.com', '::1', 'admin', '2020-05-17 05:29:49', '2020-05-17 19:40:41', 0),
(23, 'sss@gmail.com', '::1', 'admin', '2020-05-18 07:40:57', '2020-05-17 19:41:27', 0),
(24, 'sahan@gmail.com', '::1', 'customer', '2020-05-18 07:41:38', '2020-05-17 20:57:08', 0),
(25, 'sss@gmail.com', '::1', 'admin', '2020-05-18 09:06:52', '2020-05-17 21:08:16', 0),
(26, 'sss@gmail.com', '::1', 'admin', '2020-05-18 09:09:06', '2020-05-17 21:10:31', 0),
(27, 'sss@gmail.com', '::1', 'admin', '2020-05-18 09:36:37', '2020-05-17 21:38:03', 0),
(28, 'sahan@gmail.com', '::1', 'customer', '2020-05-18 09:39:29', '2020-05-17 23:02:02', 0),
(29, 'sss@gmail.com', '::1', 'admin', '2020-05-18 11:02:18', '2020-05-17 23:09:51', 0),
(30, 'sahan@gmail.com', '::1', 'customer', '2020-05-18 11:10:02', '2020-05-17 23:15:05', 0),
(31, 'sss@gmail.com', '::1', 'admin', '2020-05-18 11:16:15', '2020-05-18 01:20:50', 0),
(32, 'sahan@gmail.com', '::1', 'customer', '2020-05-18 13:22:13', '2020-05-18 01:24:35', 0),
(33, 'sss@gmail.com', '::1', 'admin', '2020-05-18 13:25:11', '2020-05-18 05:47:56', 0),
(34, 'sahan@gmail.com', '::1', 'customer', '2020-05-18 18:04:25', '2020-05-18 06:18:27', 0),
(35, 'sss@gmail.com', '::1', 'admin', '2020-05-18 18:18:46', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `posting_date`) VALUES
(1, 1, 2, '2020-05-18 08:43:11'),
(2, 3, 1, '2020-05-18 08:46:37'),
(4, 1, 3, '2020-05-18 08:56:38'),
(5, 2, 2, '2020-05-18 09:09:13'),
(6, 1, 4, '2020-05-18 18:15:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track_history`
--
ALTER TABLE `order_track_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_track_history`
--
ALTER TABLE `order_track_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
