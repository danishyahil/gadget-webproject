-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 09:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(15) NOT NULL,
  `custUser` varchar(40) NOT NULL,
  `custPassword` varchar(40) NOT NULL,
  `custName` varchar(40) NOT NULL,
  `custAddress` varchar(40) NOT NULL,
  `custEmail` varchar(40) NOT NULL,
  `custPhone` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custUser`, `custPassword`, `custName`, `custAddress`, `custEmail`, `custPhone`) VALUES
(1, 'Ali', 'ali123', 'Ali', 'Selangor', 'ali@gmail.com', '0123452673'),
(6, 'abu', 'abu123', 'abu', 'Selangor', 'abu@gmail.com', '0123452673'),
(11, 'Adam', 'adam1234', 'Adam', 'Selangor', 'adam@gmail.com', '0132423124');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `payment`, `products`, `total`) VALUES
(15, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), ', '600.00'),
(16, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), ', '600.00'),
(17, 'Ali', 'ali@gmail.com', 'C-3A-8, Suite 1, Megan Avenue 1, Jalan Tun Razak,', 'Debit/Credit', 'Apple Watch Series 3(1), Apple Airpods(1), ', '1500.00'),
(18, 'Abu', 'abu@gmail.com', 'no 9 jalan cheras', 'Debit/Credit', 'Apple Macbook Air(1), ', '4000.00'),
(19, 'Sab', 'sab@gmail.com', 'no 24 jalan salleh', 'Debit/Credit', 'Apple Watch Series 3(1), ', '900.00'),
(20, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), ', '600.00'),
(21, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Watch Series 3(1), ', '900.00'),
(22, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Watch Series 3(1), ', '900.00'),
(23, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), ', '600.00'),
(24, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), Apple Macbook Air(1), ', '4600.00'),
(25, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), ', '600.00'),
(26, 'Ali', 'ali@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), Apple Macbook Air(1), ', '4600.00'),
(27, 'Adam', 'adam@gmail.com', 'no 9 jalan ampang', 'Debit/Credit', 'Apple Airpods(1), ', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `sku`, `price`, `image`) VALUES
(1, 'Apple Macbook Air', 'A001', '4000.00', 'img/Macbook-Air-2019.jpg'),
(2, 'Apple Watch Series 3', 'A002', '900.00', 'img/watch.jpg'),
(3, 'Apple Airpods', 'A003', '600.00', 'img/airpods.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
