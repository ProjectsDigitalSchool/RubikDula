-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 03:34 PM
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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(110) NOT NULL,
  `message` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_respond` text DEFAULT 'No response yet',
  `status` varchar(255) DEFAULT 'Not complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `address`, `user_id`, `contact_respond`, `status`) VALUES
(3, 'test', 'test@gmail.com', '1', '111', '', 0, NULL, 'not dealt'),
(4, '1', 'rubik@gmail.com', '1', '1', '', 0, 'No response yet', 'Not complete'),
(5, '1', 'rubik@gmail.com', '1', '1', '', 0, 'No response yet', 'Not complete'),
(6, 'test', 'test@gmail.com', '1', '1', '', 1, 'No response yet', 'Not complete'),
(7, 'test', 'test@gmail.com', '1', '1', '', 1, 'No response yet', 'Not complete'),
(8, '1', '11111111111@gmail.com', '1', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '', 1, 'No response yet', 'Not complete'),
(10, 'test', 'test@gmail.com', '1', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '', 1, 'No response yet', 'Not complete'),
(11, 'test', 'test@gmail.com', '1', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '', 1, 'No response yet', 'Not complete'),
(12, 'test', 'test@gmail.com', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'dealt'),
(13, 'test', 'test@gmail.com', '1', '1', '', 1, NULL, 'Not complete'),
(14, 'test', 'test@gmail.com', '1', '1', '', 1, NULL, 'Not complete'),
(15, 'test', 'test@gmail.com', '1', '1', '', 1, NULL, 'Not complete'),
(16, 'test', 'test@gmail.com', '1', '', '', 1, NULL, 'Not complete'),
(17, 'test', 'test@gmail.com', '1', '1', '', 1, NULL, 'Not complete'),
(18, 'test', 'test@gmail.com', '1', '1', '', 1, NULL, 'Not complete'),
(19, 'test', 'test@gmail.com', '1', '1', '', 1, NULL, 'Not complete'),
(20, 'test', 'test@gmail.com', '1', '1212', '', 1, NULL, 'Not complete'),
(21, 'test', 'test@gmail.com', '1', '121', '', 1, NULL, 'Not complete'),
(22, 'test', 'test@gmail.com', '1', '1212', '', 1, NULL, 'Not complete'),
(23, 'test', 'test@gmail.com', '1', '1212', '', 1, NULL, 'Not complete'),
(24, 'test', 'test@gmail.com', '1', '12', '', 10, NULL, 'Not complete'),
(25, 'test', 'test@gmail.com', '1', 'ASJIAJSIAJSIAJSIAJI', '', 11, 'we are very sorry for your inconvinience...', 'dealt');

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
(3, 465.00, 'paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
(4, 465.00, 'paid', 1, 123456789, 'test', 'test', '2023-10-30 20:48:31'),
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
(32, 130.00, 'shipped', 5, 1234567879, 'test', 'test', '2023-11-08 20:36:54'),
(33, 0.00, 'not paid', 5, 1234567879, 'test', 'test', '2023-11-15 22:02:51'),
(34, 55.00, 'not paid', 5, 1234567879, 'test', 'test', '2023-11-15 22:03:44'),
(35, 55.00, 'not paid', 5, 1234567879, 'test', 'test', '2023-11-15 22:17:58'),
(36, 55.00, 'not paid', 5, 1234567879, 'test', 'test', '2023-11-15 22:19:19'),
(37, 65.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-12 16:07:06'),
(38, 165.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-12 16:42:53'),
(39, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-12 17:21:45'),
(40, 350.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-12 19:20:05'),
(41, 240.00, '', 7, 1234567879, 'test', 'test', '2023-12-12 19:41:35'),
(42, 45.00, 'not paid', 7, 1234567879, 'test', 'test', '2023-12-12 19:47:05'),
(43, 100.00, 'not paid', 7, 1234567879, 'test', 'test', '2023-12-12 19:47:40'),
(44, 100.00, 'not paid', 7, 1234567879, 'test', 'test', '2023-12-12 19:48:20'),
(45, 55.00, 'not paid', 7, 1234567879, 'test', 'test', '2023-12-13 14:01:23'),
(46, 75.00, 'not paid', 7, 1234567879, 'test', 'test', '2023-12-13 15:30:57'),
(47, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 17:37:44'),
(48, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 17:38:58'),
(49, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 17:39:01'),
(50, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 17:50:27'),
(51, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 17:51:22'),
(52, 75.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 17:58:22'),
(53, 25.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-19 20:17:37'),
(54, 527.25, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-20 18:52:49'),
(55, 150.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 15:55:33'),
(56, 150.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 15:56:23'),
(57, 450.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:00:09'),
(58, 450.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:03:03'),
(59, 150.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:15:59'),
(60, 45.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:28:46'),
(61, 156.25, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:32:27'),
(62, 100.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:35:45'),
(63, 65.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:36:14'),
(64, 65.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:37:39'),
(65, 65.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:40:41'),
(66, 175.75, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:48:04'),
(67, 150.00, 'not paid', 1, 1234567879, 'test', 'test', '2023-12-21 16:56:42'),
(68, 225.00, 'paid', 1, 1234567879, 'test', 'test', '2023-12-29 11:01:07'),
(69, 75.00, 'paid', 1, 1234567879, 'test', 'test', '2023-12-29 11:14:14'),
(70, 100.00, 'paid', 1, 1234567879, 'test', 'test', '2023-12-29 11:22:45'),
(71, 100.00, 'paid', 1, 1234567879, 'test', 'test', '2023-12-29 11:23:38'),
(72, 100.00, 'paid', 1, 1234567879, 'test', 'test', '2023-12-29 11:24:03'),
(73, 225.00, 'paid', 1, 1234567879, 'test', 'test', '2023-12-29 11:25:22'),
(74, 75.00, 'paid', 8, 1234567879, 'test', 'test', '2023-12-29 11:27:28'),
(76, 100.00, 'not paid', 8, 383044, 'test', 'test', '2023-12-29 11:28:45'),
(77, 100.00, 'not paid', 8, 1234567879, 'test', 'test', '2023-12-29 12:05:39'),
(79, 100.00, 'not paid', 8, 1234567879, 'test', 'test', '2023-12-29 12:15:22'),
(80, 150.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-03 15:59:51'),
(81, 205.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-03 16:04:10'),
(82, 1050.00, 'paid', 1, 0, 'test', 'test', '2024-01-05 18:48:47'),
(83, 150.00, 'paid', 1, 0, 'test', 'test', '2024-01-05 18:49:12'),
(84, 100.00, 'paid', 1, 2147483647, '1111111111111111', '111111111111111111111111111111111111111111111111111111', '2024-01-05 18:49:38'),
(85, 65.00, 'paid', 1, 2147483647, '11111111111111111111', '11111111111111111111111111111111111111111111111111111', '2024-01-05 18:54:56'),
(86, 219.00, 'not paid', 9, 1234567879, 'test', 'test', '2024-01-05 19:00:07'),
(87, 65.00, 'paid', 9, 1234567879, 'test', 'test', '2024-01-05 19:15:02'),
(88, 45.00, 'not paid', 1, 1234567879, 'test', 'test', '2024-01-06 13:57:19'),
(89, 45.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-06 14:00:02'),
(90, 45.00, 'paid', 1, 2147483647, '1111111111111', '111111111111111111111111111111', '2024-01-06 14:00:35'),
(91, 1365.00, 'not paid', 9, 1234567879, 'test', 'test', '2024-01-07 19:30:50'),
(92, 1365.00, 'paid', 9, 1234567879, 'test', 'test', '2024-01-07 19:30:55'),
(93, 527.00, 'not paid', 1, 1234567879, 'test', 'test', '2024-01-10 18:17:44'),
(94, 0.00, 'not paid', 1, 1234567879, 'test', 'test', '2024-01-10 18:22:47'),
(95, 175.00, 'not paid', 1, 12, '12', '12', '2024-01-10 18:26:08'),
(96, 200.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-10 18:29:14'),
(97, 2700.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-18 10:42:10'),
(98, 1870.00, 'paid', 1, 1, '1', '1', '2024-01-20 13:07:21'),
(99, 9750.00, 'paid', 1, 1, '1', '1', '2024-01-20 13:12:47'),
(100, 6.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 16:33:54'),
(101, 6.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 16:37:25'),
(102, 16.00, 'paid', 1, 2147483647, '1111111111', '1111111111111111', '2024-01-30 16:38:29'),
(103, 16.00, 'paid', 1, 1, '1', '1', '2024-01-30 16:39:13'),
(104, 67.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 16:39:34'),
(105, 16.00, 'paid', 1, 2147483647, '1111111111111111111', '11111111111111', '2024-01-30 16:42:41'),
(106, 13.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 16:46:23'),
(107, 13.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 16:47:23'),
(108, 13.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 16:47:58'),
(109, 6.00, 'paid', 1, 1234567879, 'test', '1', '2024-01-30 16:49:07'),
(110, 13.00, 'paid', 1, 111111111, '1111111111111', '1111111111', '2024-01-30 16:49:49'),
(111, 13.00, 'paid', 1, 1, '1', '1', '2024-01-30 16:50:45'),
(112, 13.00, 'paid', 1, 1234567879, '11111', '111111111111', '2024-01-30 16:53:32'),
(113, 13.00, 'paid', 1, 1, '1', '1', '2024-01-30 16:55:52'),
(114, 6.00, 'paid', 1, 2147483647, '1111111111111', '11111111111', '2024-01-30 16:57:32'),
(115, 6.00, 'paid', 1, 2147483647, '111111111111', '11111111111111', '2024-01-30 16:58:32'),
(116, 13.00, 'paid', 1, 2147483647, '111111111111111', '1111111111', '2024-01-30 16:59:45'),
(117, 13.00, 'paid', 1, 1111111, '11111111111', '11111111111111111111', '2024-01-30 17:00:52'),
(118, 13.00, 'paid', 1, 111111111, '111111111111111111111111', '111111111111111111111111111', '2024-01-30 17:01:37'),
(119, 13.00, 'paid', 1, 1111, '111111111', '111111111111111111', '2024-01-30 17:04:11'),
(120, 13.00, 'paid', 1, 11111111, '111111111111111', '1111111111111111', '2024-01-30 17:09:00'),
(121, 6.00, 'paid', 1, 111111111, '111111111111', '11111111111111111', '2024-01-30 17:09:52'),
(122, 13.00, 'not paid', 1, 2147483647, '11111111111', '1111111111111111111', '2024-01-30 17:11:02'),
(123, 13.00, 'not paid', 1, 2147483647, '1111111111111', '11111111111111111111111', '2024-01-30 17:11:40'),
(124, 13.00, 'paid', 1, 2147483647, '1111111111111', '11111111111111111111111', '2024-01-30 17:13:26'),
(125, 6.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 17:13:51'),
(126, 13.00, 'paid', 1, 2147483647, '11111111111', '1111111111111111111', '2024-01-30 17:16:13'),
(127, 13.00, 'not paid', 1, 1234567879, 'test', 'test', '2024-01-30 17:17:57'),
(128, 6.00, 'not paid', 1, 1234567879, 'test', 'test', '2024-01-30 17:19:17'),
(129, 6.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 17:20:00'),
(130, 6.00, 'not paid', 1, 1234567879, '11111111111', '1111111111111111111', '2024-01-30 17:20:46'),
(131, 13.00, 'paid', 1, 1234567879, 'test', 'test', '2024-01-30 17:21:04'),
(132, 6.00, 'not paid', 1, 1234567879, 'test', 'test', '2024-01-30 17:22:14'),
(133, 6.00, 'paid', 1, 2147483647, '111111111111111', '111111111111111', '2024-01-30 17:23:29'),
(134, 11.00, 'paid', 1, 1234567879, 'test', 'test', '2024-03-05 18:43:16'),
(135, 17.00, 'paid', 1, 1234567879, 'test', 'test', '2024-03-05 18:55:10'),
(136, 405.00, 'paid', 1, 1234567879, 'test', 'test', '2024-03-05 19:07:59'),
(137, 330.00, 'paid', 11, 1234567879, 'test', 'test', '2024-03-07 16:47:57');

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
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_ml` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`, `product_ml`) VALUES
(1, 19, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 1, '2023-10-30 21:22:16', NULL),
(2, 19, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 5, 1, '2023-10-30 21:22:16', NULL),
(3, 19, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:22:16', NULL),
(4, 19, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 4, 1, '2023-10-30 21:22:16', NULL),
(5, 19, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:22:16', NULL),
(6, 20, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 1, '2023-10-30 21:24:44', NULL),
(7, 20, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 5, 1, '2023-10-30 21:24:44', NULL),
(8, 20, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:24:44', NULL),
(9, 20, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 4, 1, '2023-10-30 21:24:44', NULL),
(10, 20, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:24:44', NULL),
(11, 21, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:25:13', NULL),
(12, 21, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:25:13', NULL),
(13, 23, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 1, '2023-10-30 21:26:59', NULL),
(14, 23, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-10-30 21:26:59', NULL),
(15, 24, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 1, '2023-11-01 19:53:51', NULL),
(16, 25, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 2, 1, '2023-11-01 20:30:50', NULL),
(17, 26, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 3, '2023-11-06 18:11:28', NULL),
(18, 27, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 1, 3, '2023-11-06 18:17:08', NULL),
(19, 28, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 1, 3, '2023-11-06 20:16:04', NULL),
(20, 28, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 1, 3, '2023-11-06 20:16:04', NULL),
(21, 29, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 3, 3, '2023-11-06 21:45:08', NULL),
(22, 29, 1, 'Yves Saint Laurent La Nuit De Lhomme', 'ysl-lanuit-de-lhomme.jpg', 75.00, 4, 3, '2023-11-06 21:45:08', NULL),
(23, 30, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 1, 4, '2023-11-07 19:39:51', NULL),
(24, 31, 4, 'Jil Sander Eau De Parfum', 'jil-sander.jpg', 30.00, 1, 4, '2023-11-07 20:32:53', NULL),
(25, 32, 2, '1 million lucky', '1million-lucky.jpg', 65.00, 2, 5, '2023-11-08 20:36:54', NULL),
(26, 33, 11, 'test', 'test1.jpeg', 0.00, 3, 5, '2023-11-15 22:02:51', NULL),
(27, 34, 11, 'test', 'test1.jpeg', 0.00, 3, 5, '2023-11-15 22:03:44', NULL),
(28, 34, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 1, 5, '2023-11-15 22:03:44', NULL),
(29, 35, 11, 'test', 'test1.jpeg', 0.00, 3, 5, '2023-11-15 22:17:58', NULL),
(30, 35, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 1, 5, '2023-11-15 22:17:58', NULL),
(31, 36, 11, 'test', 'test1.jpeg', 0.00, 3, 5, '2023-11-15 22:19:19', NULL),
(32, 36, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 1, 5, '2023-11-15 22:19:19', NULL),
(33, 37, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-12-12 16:07:06', NULL),
(34, 38, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 65.00, 1, 1, '2023-12-12 16:42:53', NULL),
(35, 38, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-12 16:42:53', NULL),
(36, 39, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-12 17:21:45', NULL),
(37, 40, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-12 19:20:05', NULL),
(38, 40, 2, '1 Million lucky', '1million-lucky.jpg', 75.00, 1, 1, '2023-12-12 19:20:05', NULL),
(39, 40, 13, 'Dior Sauvage Elixir', 'Sauvage-elixir.jpg', 175.00, 1, 1, '2023-12-12 19:20:05', NULL),
(40, 41, 3, 'Jean Paul Gualtier Le Male Le Parfum', 'jpg-lemale-le-parfum.jpg', 60.00, 4, 7, '2023-12-12 19:41:35', NULL),
(41, 42, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 1, 7, '2023-12-12 19:47:05', NULL),
(42, 43, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 7, '2023-12-12 19:47:40', NULL),
(43, 44, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 7, '2023-12-12 19:48:20', NULL),
(44, 45, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 1, 7, '2023-12-13 14:01:23', NULL),
(45, 46, 2, '1 Million lucky', '1million-lucky.jpg', 75.00, 1, 7, '2023-12-13 15:30:57', NULL),
(46, 51, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-19 17:51:22', NULL),
(47, 52, 2, '1 Million lucky', '1million-lucky.jpg', 75.00, 1, 1, '2023-12-19 17:58:22', '10'),
(48, 53, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 25.00, 1, 1, '2023-12-19 20:17:37', '10'),
(49, 54, 13, 'Dior Sauvage Elixir', 'Sauvage-elixir.jpg', 263.00, 2, 1, '2023-12-20 18:52:49', '100'),
(50, 55, 9, 'Tom Ford noir extreme', 'tom-ford.jpg', 150.00, 1, 1, '2023-12-21 15:55:33', '50'),
(51, 56, 9, 'Tom Ford noir extreme', 'tom-ford.jpg', 150.00, 1, 1, '2023-12-21 15:56:23', '50'),
(52, 57, 9, 'Tom Ford noir extreme', 'tom-ford.jpg', 150.00, 3, 1, '2023-12-21 16:00:09', '50'),
(53, 68, 9, 'Tom Ford noir extreme', 'tom-ford.jpg', 150.00, 1, 1, '2023-12-29 11:01:07', NULL),
(54, 68, 2, '1 Million lucky', '1million-lucky.jpg', 75.00, 1, 1, '2023-12-29 11:01:07', NULL),
(55, 69, 2, '1 Million lucky', '1million-lucky.jpg', 75.00, 1, 1, '2023-12-29 11:14:14', NULL),
(56, 70, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-29 11:22:45', NULL),
(57, 71, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-29 11:23:38', NULL),
(58, 72, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 1, '2023-12-29 11:24:03', NULL),
(59, 73, 9, 'Tom Ford noir extreme', 'tom-ford.jpg', 225.00, 1, 1, '2023-12-29 11:25:22', NULL),
(60, 74, 2, '1 Million lucky', '1million-lucky.jpg', 75.00, 1, 8, '2023-12-29 11:27:28', NULL),
(61, 75, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 97.00, 1, 8, '2023-12-29 11:28:22', NULL),
(62, 75, 6, 'Versace Eros', 'versace-eros.jpg', 56.00, 1, 8, '2023-12-29 11:28:22', NULL),
(63, 76, 1, 'Yves Saint Laurent La Nuit ', 'ysl-lanuit-de-lhomme.jpg', 100.00, 1, 8, '2023-12-29 11:28:45', NULL),
(64, 88, 4, 'Jil Sander Eau De Parfum', 'jil-sander.jpg', 45.00, 1, 1, '2024-01-06 13:57:19', NULL),
(65, 89, 4, 'Jil Sander Eau De Parfum', 'jil-sander.jpg', 45.00, 1, 1, '2024-01-06 14:00:02', NULL),
(66, 90, 4, 'Jil Sander Eau De Parfum', 'jil-sander.jpg', 45.00, 1, 1, '2024-01-06 14:00:35', NULL),
(67, 91, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 97.00, 14, 9, '2024-01-07 19:30:50', NULL),
(68, 92, 5, 'Jean Paul Gualtier Le Beau Le Parfum', 'jpg-lebeau-leparfum.jpg', 97.00, 14, 9, '2024-01-07 19:30:55', NULL),
(69, 93, 13, 'Dior Sauvage Elixir', 'Sauvage-elixir.jpg', 175.00, 3, 1, '2024-01-10 18:17:44', NULL),
(70, 94, 11, 'test', 'test1.jpeg', 0.00, 5, 1, '2024-01-10 18:22:47', NULL),
(71, 95, 13, 'Dior Sauvage Elixir', 'Sauvage-elixir.jpg', 175.00, 1, 1, '2024-01-10 18:26:08', NULL),
(72, 96, 13, 'Dior Sauvage Elixir', 'Sauvage-elixir.jpg', 175.00, 1, 1, '2024-01-10 18:29:14', NULL),
(73, 96, 8, 'Jil Sander Sunset', 'jil-sander-sunset.jpg', 25.00, 1, 1, '2024-01-10 18:29:14', NULL),
(74, 97, 18, 'Tom Ford Neroli Portofino', 'Tom Ford Neroli Portofino1.jpeg', 225.00, 12, 1, '2024-01-18 10:42:10', NULL),
(75, 98, 21, 'Azzaro The Mos Wanted Parfum', 'Azzaro The Mos Wanted Parfum1.jpeg', 85.00, 22, 1, '2024-01-20 13:07:21', NULL),
(76, 99, 9, 'Tom Ford noir extreme', 'tom-ford.jpg', 150.00, 65, 1, '2024-01-20 13:12:47', NULL),
(77, 100, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 16:33:54', NULL),
(78, 101, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 16:37:25', NULL),
(79, 102, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 16.00, 1, 1, '2024-01-30 16:38:29', NULL),
(80, 103, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 16.00, 1, 1, '2024-01-30 16:39:13', NULL),
(81, 104, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 67.00, 1, 1, '2024-01-30 16:39:34', NULL),
(82, 105, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 16.00, 1, 1, '2024-01-30 16:42:41', NULL),
(83, 106, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:46:23', NULL),
(84, 107, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:47:23', NULL),
(85, 108, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:47:58', NULL),
(86, 109, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 16:49:07', NULL),
(87, 110, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:49:49', NULL),
(88, 111, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:50:45', NULL),
(89, 112, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:53:32', NULL),
(90, 113, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:55:52', NULL),
(91, 114, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 16:57:32', NULL),
(92, 115, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 16:58:32', NULL),
(93, 116, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 16:59:45', NULL),
(94, 117, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:00:52', NULL),
(95, 118, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:01:37', NULL),
(96, 119, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:04:11', NULL),
(97, 120, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:09:00', NULL),
(98, 121, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 17:09:52', NULL),
(99, 124, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:13:26', NULL),
(100, 125, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 17:13:51', NULL),
(101, 126, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:16:13', NULL),
(102, 129, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 17:20:00', NULL),
(103, 130, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 17:20:46', NULL),
(104, 131, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 13.00, 1, 1, '2024-01-30 17:21:04', NULL),
(105, 132, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 17:22:14', NULL),
(106, 133, 15, 'Jean Paul Gaultier Ultra Male', 'Jean Paul Gualtier Ultra Male1.jpeg', 6.00, 1, 1, '2024-01-30 17:23:29', NULL),
(107, 134, 16, 'Dior Homme Intense Eau De Parfum', 'Dior Homme Intense Eau De Parfum1.jpeg', 11.00, 1, 1, '2024-03-05 18:43:16', NULL),
(108, 135, 16, 'Dior Homme Intense Eau De Parfum', 'Dior Homme Intense Eau De Parfum1.jpeg', 17.00, 1, 1, '2024-03-05 18:55:10', NULL),
(109, 136, 6, 'Versace Eros', 'versace-eros.jpg', 45.00, 9, 1, '2024-03-05 19:07:59', NULL),
(110, 137, 7, 'Acqua Di Gio Eau De Parfum', 'acqua-digio-edp.jpg', 55.00, 6, 11, '2024-03-07 16:47:57', NULL);

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
  `product_color` varchar(100) NOT NULL,
  `product_ml` varchar(110) DEFAULT NULL,
  `product_stock` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`, `product_ml`, `product_stock`) VALUES
(1, 'Yves Saint Laurent La Nuit ', 'Winter', 'La Nuit de l\'Homme by Yves Saint Laurent is a Woody Spicy fragrance for men. La Nuit de l\'Homme was launched in 2009. La Nuit de l\'Homme was created by Anne Flipo, Pierre Wargnye and Dominique Ropion. Top note is Cardamom; middle notes are Lavender, Virgi', 'ysl-lanuit-de-lhomme.jpg', 'ysl-lanuit-de-lhomme2.jpg', 'ysl-lanuit-de-lhomme3.jpg', 'ysl-lanuit-de-lhomme4.jpg', 100.00, 25, '', NULL, '3'),
(2, '1 Million lucky', 'Winter', '1 Million Lucky by Paco Rabanne is a Woody fragrance for men. 1 Million Lucky was launched in 2018. The nose behind this fragrance is Natalie Gracia-Cetto. Top notes are Plum, Ozonic notes, Grapefruit and Bergamot; middle notes are Hazelnut, Honey, Cedar,', '1million-lucky.jpg', '1million-lucky2.jpg', '1million-lucky3.jpg', '1million-lucky4.jpg', 75.00, 25, '', NULL, '30'),
(3, 'Jean Paul Gaultier Le Male Le Parfum', 'Winter', 'Drawing on the potency of cardamom in its top notes and the freshness of lavender and iris at its heart, this intense eau de parfum ultimately promises to immerse you in its wonderfully addictive and prominent vanilla base note.', 'jpg-lemale-le-parfum.jpg', 'jpg-lemale-le-parfum2.jpg', 'jpg-lemale-le-parfum3.jpg', 'jpg-lemale-le-parfum4.jpg', 60.00, 0, '', NULL, '5'),
(4, 'Jil Sander Eau De Parfum', 'Winter', 'The fragrance is described as elegant, feminine and floral in the beginning, with warm, mysterious accords of vanilla and amber in the finish. Top notes will enchant you with passionate pink pepper blended with mandarin and lavender.', 'jil-sander.jpg', 'jil-sander2.jpg', 'jil-sander3.jpg', 'jil-sander.jpg', 30.00, 2, '', NULL, '5'),
(5, 'Jean Paul Gaultier Le Beau Le Parfum', 'Summer', 'Le Beau Le Parfum was launched in 2022. The nose behind this fragrance is Quentin Bisch. Top notes are Pineapple, Iris, Cypress and Ginger; middle notes are Coconut and Woodsy Notes; base notes are Tonka Bean, Sandalwood, Amber and Ambergris.', 'jpg-lebeau-leparfum.jpg', 'jpg-lebeau-leparfum2.jpg', 'jpg-lebeau-leparfum3.jpg', 'jpg-lebeau-leparfum.jpg', 65.00, 0, '', NULL, '16'),
(6, 'Versace Eros', 'Summer', 'Versace Eros is a fragrance for a strong, passionate man, who is master of himself. Eros interprets the sublime masculine through a luminous aura with an intense, vibrant, and glowing combination of fresh mint leaves, Italian lemon zest, and green apple.', 'versace-eros.jpg', 'versace-eros2.jpg', 'versace-eros3.jpg', 'versace-eros.jpg', 45.00, 0, '', NULL, '15'),
(7, 'Acqua Di Gio Eau De Parfum', 'Summer', 'ACQUA DI GIÒ EAU DE PARFUM is an intense, long-lasting men\'s fragrance, where innovative marine notes blend with natural green mandarin, sage, vetiver, and patchouli. The infinite horizon of the sea is captured in a new innovative refillable bottle.', 'acqua-digio-edp.jpg', 'acqua-digio-edp-feat.jpg', 'acqua-digio-edp-feat2.jpg', 'acqua-digio-edp.jpg', 55.00, 0, '', NULL, '39'),
(8, 'Jil Sander Sunset', 'Summer', 'Sunset by Jil Sander is the latest flanker (2022) of the well known Sun line. This perfume is fruity and bright in the opening, playful, with a rose heart that turns slightly soapy clean and a delicate warm patchouli that is barely there, probably coming ', 'jil-sander-sunset.jpg', 'jil-sander-sunset2.jpg', 'jil-sander-sunset3.jpg', 'jil-sander-sunset.jpg', 25.00, 0, '', NULL, '22'),
(9, 'Tom Ford noir extreme', 'Winter', 'Tom Ford Noir Extreme reveals a new dimension of the Noir man. An amber drenched, woody oriental fragrance with a tantalizing and delectable heart, Noir Extreme captures the aspect of the man that relishes in immoderation and dares to be extraordinary.', 'tom-ford.jpg', 'tom-ford2.jpg', 'tom-ford3.jpg', 'tom-ford.jpg', 150.00, 0, '', NULL, '65'),
(11, 'Jean Paul Gaultier Scandal Le Parfum', 'Winter', 'Scandal Pour Homme Le Parfum by Jean Paul Gaultier is a Amber fragrance for men. This is a new fragrance. Scandal Pour Homme Le Parfum was launched in 2022. Scandal Pour Homme Le Parfum was created by Quentin Bisch, Natalie Gracia-Cetto and Christophe Ray', 'jpg-scandal.jpg', 'jpg-scandal3.jpg', 'jpg-scandal2.jpg', 'jpg-scandal.jpg', 75.00, 25, '', NULL, '88'),
(13, 'Dior Sauvage Elixir', 'Winter', 'Sauvage Elixir is an extraordinarily* concentrated fragrance steeped in the emblematic freshness of Sauvage with an intoxicating heart of spices, a ', 'Sauvage-elixir.jpg', 'dior-sauvage-elixir3.jpg', 'dior-sauvage-elixir2.jpg', 'Sauvage-elixir.jpg', 175.75, 50, '', NULL, '76'),
(14, 'Joop! Homme', 'Summer', 'Joop! Homme is a very sensual, oriental fragrance with fresh citrus topnotes of mandarin, lemon, bergamot and orange blossom. The floral heart is very warm and balmy, revealing jasmine, lily of the valley, heliotrope and cinnamon.', 'joop1.jpeg', 'joop2.jpg', 'joop3.jpg', 'joop4.jpeg', 50.00, 25, '', NULL, '5'),
(15, 'Jean Paul Gaultier Ultra Male', 'Winter', 'The irresistible combination of dark lavender, woody vanilla, pear juice and mint. Ultra Male uses the shape of the Le Male torso bottle asserting its masculine attributes. It is coloured midnight blue with a black sailor\'s shirt for even greater intensit', 'Jean Paul Gualtier Ultra Male1.jpeg', 'Jean Paul Gualtier Ultra Male2.jpg', 'Jean Paul Gualtier Ultra Male3.jpg', 'Jean Paul Gualtier Ultra Male4.jpeg', 67.00, 25, '', NULL, '66.9'),
(16, 'Dior Homme Intense Eau De Parfum', 'Winter', 'Dior Homme Intense opens with a disarming iris and lavender note that blends seamlessly into a heart of warm amber. A sweet hint of pear brings out the earthiness in the Virginia cedar and woodsy vetiver base.', 'Dior Homme Intense Eau De Parfum1.jpeg', 'Dior Homme Intense Eau De Parfum2.jpeg', 'Dior Homme Intense Eau De Parfum3.jpeg', 'Dior Homme Intense Eau De Parfum4.jpeg', 115.00, 20, '', NULL, '33'),
(17, 'Jean Paul Gaultier Elixir', 'Winter', 'Woody aromatic amber, tropical tonka bean, legendary lavender, and seductive benzoin all set ablaze with sensuality beneath the translucent brown sailor top.', 'Jean Paul Gaultier Elixir1.jpeg', 'Jean Paul Gaultier Elixir2.jpeg', 'Jean Paul Gaultier Elixir3.jpeg', 'Jean Paul Gaultier Elixir4.jpeg', 85.00, 0, '', NULL, '20'),
(18, 'Tom Ford Neroli Portofino', 'Summer', 'To Tom Ford, this scent perfectly captures the cool breezes, sparkling clear water and lush foliage of the Italian Riviera. His reinvention of a classic Eau de Cologne features crisp citrus oils, surprising floral notes and amber undertones to leave a spl', 'Tom Ford Neroli Portofino1.jpeg', 'Tom Ford Neroli Portofino2.jpeg', 'Tom Ford Neroli Portofino3.jpeg', 'Tom Ford Neroli Portofino4.jpeg', 225.00, 10, '', NULL, '40'),
(19, 'Tom Ford Noir Extreme Parfum', 'Winter', 'An intensification of the original Noir Extreme scent, NOIR EXTREME PARFUM breathes a heightened concentration of spicy cardamom, spiked with the warmth of Shimoga Ginger and the rich sensuality of tonka bean and guaiacwood.', 'Tom Ford Noir Extreme Parfum1.jpeg', 'Tom Ford Noir Extreme Parfum2.jpeg', 'tf-noir-extreme-parfum2.jpg', 'Tom Ford Noir Extreme Parfum4.jpeg', 115.00, 0, '', NULL, '15'),
(20, 'Yves Saint Laurent Black Opium', 'Winter', 'The signature black coffee accord is paired with sensual vanilla, enriched by the softness of white flowers and orange blossom, set against a base of patchouli and comforting white musk. A daring contrast of light and dark, for a women\'s fragrance that be', 'Yves Saint Laurent Black Opium1.jpeg', 'Yves Saint Laurent Black Opium2.jpeg', 'Yves Saint Laurent Black Opium3.jpeg', 'Yves Saint Laurent Black Opium4.jpeg', 65.00, 0, '', NULL, '30'),
(21, 'Azzaro The Mos Wanted Parfum', 'Winter', 'The Most Wanted Parfum by Azzaro is a Woody Spicy fragrance for men. This is a new fragrance. The Most Wanted Parfum was launched in 2022. Top note is Ginger; middle note is Woodsy Notes; base note is Bourbon Vanilla.', 'Azzaro The Mos Wanted Parfum1.jpeg', 'Azzaro The Mos Wanted Parfum2.jpeg', 'Azzaro The Mos Wanted Parfum3.jpeg', 'Azzaro The Mos Wanted Parfum4.jpeg', 85.00, 0, '', NULL, '56'),
(22, 'Stronger With You Intensely', 'Winter', 'STRONGER WITH YOU INTENSELY is an intense and addictive fougere ambery woody scent. The fragrance opens with a spicy pink pepper essence that combines with the iconic STRONGER WITH YOU chestnut accord, bringing warmth and originality to the fragrance.', 'Stronger With You Intensely1.jpeg', 'Stronger With You Intensely2.jpeg', 'Stronger With You Intensely3.jpeg', 'Stronger With You Intensely4.jpeg', 65.00, 0, '', NULL, '50'),
(23, 'Acqua Di Gio Profondo', 'Summer', 'More than a fresh fragrance, Aqua di Giò Profondo is a captivating deep-dive into the profoundness of the soul. Refreshing top notes of green mandarin and bergamot blend with Acqua di Giò\'s iconic marine notes to give the fragrance a distinct character.', 'Acqua Di Gio Profondo1.jpeg', 'Acqua Di Gio Profondo2.jpeg', 'Acqua Di Gio Profondo3.jpeg', 'Acqua Di Gio Profondo4.jpeg', 50.00, 0, '', NULL, '45'),
(24, 'Dior Sauvage Eau De Parfum', 'Summer', 'Dior Sauvage Parfum is a highly concentrated interpretation, a perfume for men in which the extreme freshness of Mandarin melds with warm tones of Tonka Bean and Sandalwood. A cologne for men inspired by expanses of wilderness, a blue-tinged night sky, an', 'Dior Sauvage Eau De Parfum1.jpeg', 'Dior Sauvage Eau De Parfum2.jpeg', 'Dior Sauvage Eau De Parfum3.jpeg', 'Dior Sauvage Eau De Parfum4.jpeg', 80.00, 0, '', NULL, '110'),
(25, 'Bleu De Chanel Limited Edition', 'Summer', 'BLEU DE CHANEL Parfum is an aromatic, intensely woody fragrance. It opens with powerful freshness, then lingers with a precious accord of New Caledonian sandalwood that unfurls its generous, powerful notes in a dense and sophisticated trail.', 'Bleu De Chanel Limited Edition1.jpeg', 'Bleu De Chanel Limited Edition2.jpeg', 'Bleu De Chanel Limited Edition3.jpeg', 'Bleu De Chanel Limited Edition4.jpeg', 80.00, 0, '', NULL, '5'),
(26, 'Dolce Gabbana Light Blue Pour Homme', 'Summer', ' The sensuality of sun-drenched skin, the bracing breeze of the Mediterranean Sea, the fruity and floral scents of the vegetation: Dolce&Gabbana Light Blue captures the quintessence of a summer day lulled by gentle waves lapping against the enchanting cli', 'Dolce Gabbana Light Blue Pour Homme1.jpeg', 'Dolce Gabbana Light Blue Pour Homme2.jpeg', 'Dolce Gabbana Light Blue Pour Homme3.jpeg', 'Dolce Gabbana Light Blue Pour Homme4.jpeg', 45.00, 0, '', NULL, '16');

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
(5, 'Test4', 'test4@gmail.com', '93279e3308bdbbeed946fc965017f67a'),
(6, 'test', 'rubik', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'ThatGuy', 'rubikdula@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'theoneandonly', 'forreal@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(9, 'bruh', 'bruh4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'test', 'asas1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, '1213', 'test6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
