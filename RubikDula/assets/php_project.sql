-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 07:00 PM
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
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@email.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(2, 400.00, 'delivered', 1, 1234567879, 'test', 'test', '2023-10-30 20:33:31'),
(3, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(4, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(5, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(6, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(7, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(8, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(9, 465.00, 'not paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(10, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 20:49:16'),
(11, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 20:50:29'),
(12, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 20:53:37'),
(13, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 20:53:54'),
(14, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 20:58:33'),
(15, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:14:48'),
(16, 465.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:15:39'),
(17, 510.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:19:26'),
(18, 510.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:20:55'),
(19, 510.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:22:16'),
(20, 510.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:24:44'),
(21, 140.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:25:13'),
(22, 140.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:26:21'),
(23, 140.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-10-30 21:26:59'),
(24, 65.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-11-01 19:53:51'),
(25, 130.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-11-01 20:30:50'),
(26, 75.00, 'not paid', 3, 1234567879, 'test', 'test', '2023-11-06 18:11:28'),
(27, 75.00, 'not paid', 3, 1234567879, 'test', 'test', '2023-11-06 18:17:08'),
(28, 100.00, 'not paid', 3, 383044, 'test', 'test', '2023-11-06 20:16:04'),
(29, 375.00, 'not paid', 3, 1234567879, 'test', 'test', '2023-11-06 21:45:08'),
(30, 65.00, 'not paid', 4, 383044, 'Gjakova', 'random', '2023-11-07 19:39:51'),
(31, 30.00, 'not paid', 4, 1234567879, 'test', 'test', '2023-11-07 20:32:53'),
(32, 130.00, 'not paid', 5, 1234567879, 'test', 'test', '2023-11-08 20:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 19, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 1, '2023-10-30 21:22:16'),
(2, 19, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 5, 1, '2023-10-30 21:22:16'),
(3, 19, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:22:16'),
(4, 19, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 4, 1, '2023-10-30 21:22:16'),
(5, 19, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:22:16'),
(6, 20, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 1, '2023-10-30 21:24:44'),
(7, 20, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 5, 1, '2023-10-30 21:24:44'),
(8, 20, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:24:44'),
(9, 20, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 4, 1, '2023-10-30 21:24:44'),
(10, 20, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:24:44'),
(11, 21, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:25:13'),
(12, 21, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:25:13'),
(13, 23, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:26:59'),
(14, 23, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:26:59'),
(15, 24, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 1, '2023-11-01 19:53:51'),
(16, 25, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 2, 1, '2023-11-01 20:30:50'),
(17, 26, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 3, '2023-11-06 18:11:28'),
(18, 27, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 3, '2023-11-06 18:17:08'),
(19, 28, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 1, 3, '2023-11-06 20:16:04'),
(20, 28, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 1, 3, '2023-11-06 20:16:04'),
(21, 29, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 3, 3, '2023-11-06 21:45:08'),
(22, 29, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 4, 3, '2023-11-06 21:45:08'),
(23, 30, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 4, '2023-11-07 19:39:51'),
(24, 31, 4, 'Jil Sander Eau De Parfum', 'jil-sander.jpg', 30.00, 1, 4, '2023-11-07 20:32:53'),
(25, 32, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 2, 5, '2023-11-08 20:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` tinyint(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Yves Saint Laurent La Nuit De Lhomme', 'Winter', 'Woody Fragrance', 'ysl-lanuit-de-lhomme.jpg', 'ysl-lanuit-de-lhomme.jpg', 'ysl-lanuit-de-lhomme.jpg', 'ysl-lanuit-de-lhomme.jpg', 85.50, 0, ''),
(2, '1 Million lucky', 'Summer', 'Boozy winter fragrance', '1million-lucky.jpg', '1million-lucky.jpg', '1million-lucky.jpg', '1million-lucky.jpg', 75.00, 25, ''),
(3, 'Jean Paul Gualtier Le Male Le Parfum', 'Winter Fragrance', 'Strong and Spicy Winter Fragrance', 'jpg-lemale-le-parfum.jpg', 'jpg-lemale-le-parfum.jpg', 'jpg-lemale-le-parfum.jpg', 'jpg-lemale-le-parfum.jpg', 60.00, 0, ''),
(4, 'Jil Sander Eau De Parfum', 'Winter Fragrance', 'Cozy Winter Fragrance', 'jil-sander.jpg', 'jil-sander.jpg', 'jil-sander.jpg', 'jil-sander.jpg', 30.00, 0, ''),
(5, 'Jean Paul Gualtier Le Beau Le Parfum', 'Summer Fragrance', 'Coconut Demon Fragrance', 'jpg-lebeau-leparfum.jpg', 'jpg-lebeau-leparfum.jpg', 'jpg-lebeau-leparfum.jpg', 'jpg-lebeau-leparfum.jpg', 65.00, 0, ''),
(6, 'Versace Eros', 'Summer Fragrance', 'Citrusy and mandarin beautifully made up together', 'versace-eros.jpg', 'versace-eros.jpg', 'versace-eros.jpg', 'versace-eros.jpg', 45.00, 0, ''),
(7, 'Acqua Di Gio Eau De Parfum', 'Summer Fragrance', 'Lemon and beach type smell', 'acqua-digio-edp.jpg', 'acqua-digio-edp.jpg', 'acqua-digio-edp.jpg', 'acqua-digio-edp.jpg', 55.00, 0, ''),
(8, 'Jil Sander Sunset', 'Summer Fragrance', 'You want to smell like roses and beauty? this is it', 'jil-sander-sunset.jpg', 'jil-sander-sunset.jpg', 'jil-sander-sunset.jpg', 'jil-sander-sunset.jpg', 25.00, 0, ''),
(9, 'Tom Ford noir extreme', 'Winter fragrance', 'Vanilla scent', 'tom-ford.jpg', 'tom-ford.jpg', 'tom-ford.jpg', 'tom-ford.jpg', 150.00, 0, ''),
(11, 'test', 'Winter', 'test', 'test1.jpeg', 'test2.jpeg', 'test3.jpeg', 'test4.jpeg', 0.00, 25, ''),
(13, 'Dior Sauvage Elixir', 'Winter', 'Very good', 'Dior Sauvage Elixir1.jpeg', 'Dior Sauvage Elixir2.jpeg', 'Dior Sauvage Elixir3.jpeg', 'Dior Sauvage Elixir4.jpeg', 175.75, 50, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Wolvy', 'asas@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(3, 'Rubik', 'test2@gmail.com', 'a18943a0213d765c613c53fa40e5394f'),
(4, 'bruh', 'test3@gmail.com', '93279e3308bdbbeed946fc965017f67a'),
(5, 'Test4', 'test4@gmail.com', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constrain` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
