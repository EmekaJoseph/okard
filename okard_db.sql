-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 03:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `okard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `password`, `role`, `last_login`) VALUES
(1, 'okard', '$2y$10$7KJA8djx/a6FZEpn9k7wVuApQ3JQFpVgmr7ee9WPfPxpGIMRTjCdK', NULL, '2023-03-09 09:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `extra_col` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`type`, `name`, `extra_col`) VALUES
('Material', 'Doors', NULL),
('Material', 'POP Cements', NULL),
('Material', 'Rods', NULL),
('Material', 'Tiles', NULL),
('Material', 'Roofing', NULL),
('Material', 'Plumbing Fittings', NULL),
('Property', 'Residential', NULL),
('Property', 'Commercial', NULL),
('Property', 'Lands', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` varchar(2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_update` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `address`, `phone`, `email`, `last_update`) VALUES
('1', '120, Odomola Epe Lagos State, Nigeria.', '08131048313', 'okardhvg@gmail.com', '2023-03-09 08:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imageslides`
--

CREATE TABLE `tbl_imageslides` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `extra_col` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_imageslides`
--

INSERT INTO `tbl_imageslides` (`id`, `name`, `category`, `img`, `description`, `price`, `location`, `extra_col`, `type`, `updated_at`, `created_at`) VALUES
(1, 'Duplex', 'Residential', 'img-1676760548.jpg', 'cool  duplex', 300000000, '230Km Abuja', NULL, 'Property', '2023-02-18 22:49:08', '2023-02-18 22:49:08'),
(2, 'Commercial Place', 'Commercial', 'img-1676760896.jpg', 'cool place', 4300000, 'Abuja', NULL, 'Property', '2023-02-18 22:54:56', '2023-02-18 22:54:56'),
(3, 'the Land', 'Lands', 'img-1676760936.jpg', 'land desc', 5679054, 'Lagos Ibadan', NULL, 'Property', '2023-02-18 22:55:36', '2023-02-18 22:55:36'),
(4, 'German Door', 'Doors', 'img-1676760965.jpg', 'this is a door', 30000, NULL, NULL, 'Material', '2023-02-18 22:56:05', '2023-02-18 22:56:05'),
(5, 'POP Cement HGV', 'POP Cements', 'img-1676760998.jpg', 'best quality, Grade one', 40000, NULL, NULL, 'Material', '2023-02-18 22:56:38', '2023-02-18 22:56:38'),
(6, 'Italian rods', 'Rods', 'img-1676761029.jpg', '10 years waranty', 80000, NULL, NULL, 'Material', '2023-02-18 22:57:09', '2023-02-18 22:57:09'),
(7, 'Vapor Tiles', 'Tiles', 'img-1676761065.jpg', 'the best for floor', 1200, NULL, NULL, 'Material', '2023-02-18 22:57:45', '2023-02-18 22:57:45'),
(8, 'Roofing Sheets', 'Roofing', 'img-1676761099.jpg', 'Made in Nigeria', 280000, NULL, NULL, 'Material', '2023-02-18 22:58:20', '2023-02-18 22:58:20'),
(9, 'Idian Pipes', 'Plumbing Fittings', 'img-1676761267.jpg', 'Full lengths to be enough for 3 storey', 3000, NULL, NULL, 'Material', '2023-02-18 23:01:07', '2023-02-18 23:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `isRead` varchar(10) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio`
--

CREATE TABLE `tbl_portfolio` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message` text DEFAULT NULL,
  `totalPrice` int(100) NOT NULL,
  `refImage` text DEFAULT NULL,
  `isRead` varchar(10) DEFAULT NULL,
  `voiceNote` varchar(100) DEFAULT NULL,
  `doc` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE `tbl_visitors` (
  `id` int(100) NOT NULL,
  `ip_addr` varchar(100) NOT NULL,
  `visit_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`id`, `ip_addr`, `visit_date`) VALUES
(1, '127.0.0.1', '2023-03-09 12:15:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_imageslides`
--
ALTER TABLE `tbl_imageslides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_imageslides`
--
ALTER TABLE `tbl_imageslides`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
