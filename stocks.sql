-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 06:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_amount`) VALUES
(4, 'Beans', '20', '  500'),
(6, 'Sugar', '20', ' 20000'),
(12, 'Gowns', '12', '12000'),
(13, 'Rice', '10', ' 20000'),
(14, 'Beans', ' 24', ' 10000');

-- --------------------------------------------------------

--
-- Table structure for table `reg_form`
--

CREATE TABLE `reg_form` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reg_form`
--

INSERT INTO `reg_form` (`user_id`, `firstname`, `lastname`, `username`, `email`, `phone`, `password`) VALUES
(1, 'Victor', 'Omale', 'Vickson', 'victor@victor.com', 2147483647, 'ec35411b933d9377a5d538a97dcdb77be8f753069006c579ff1701822a8b41bf'),
(2, 'Victor', 'Vickson', 'vicks', 'adewalevictor9@gmail.com', 2147483647, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(3, 'Faridah', 'Akanbi', 'Desewa', 'desewa@victor.com', 2147483647, '20f3765880a5c269b747e1e906054a4b4a3a991259f1e16b5dde4742cec2319a'),
(4, 'Victoria', 'Ezequi', 'Vicky12', 'victoria@gmail.com', 2147483647, 'f969fdbe811d8a66010d6f8973246763147a2a0914afc8087839e29b563a5af0'),
(5, 'Boniface', 'Ademoney', 'Ademoney', 'Vickson@ade.com', 2147483647, 'f969fdbe811d8a66010d6f8973246763147a2a0914afc8087839e29b563a5af0'),
(6, 'Boniface', 'Ademoney', 'Ademoney', 'Vickson@ade.com', 2147483647, 'f969fdbe811d8a66010d6f8973246763147a2a0914afc8087839e29b563a5af0'),
(7, 'Boniface', 'Ademoney', 'Ademoney11', 'Vickson@ade.com', 2147483647, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(8, 'Victor', 'Boniface', 'Ademoney112', 'victor@victor.com', 2147483647, 'f969fdbe811d8a66010d6f8973246763147a2a0914afc8087839e29b563a5af0');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_name`, `product_quantity`, `product_amount`) VALUES
(1, 'Beans', ' 10', ' 10000'),
(2, 'Sugar', '10', '10000'),
(3, 'Sugar', '10', '12000'),
(4, 'Gowns', '5', '500'),
(5, 'Rice', '1', '500'),
(6, 'Rice', '1', '500'),
(7, 'Sugar', '10', '10000'),
(8, 'Sugar', '10', '10000'),
(9, 'Rice', '5', '12000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reg_form`
--
ALTER TABLE `reg_form`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reg_form`
--
ALTER TABLE `reg_form`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
