-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 07:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohsem`
--

-- --------------------------------------------------------

--
-- Table structure for table `batter`
--

CREATE TABLE `batter` (
  `batter_id` varchar(7) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batter`
--

INSERT INTO `batter` (`batter_id`, `type`) VALUES
('1001', 'Regular'),
('1002', 'Chocolate'),
('1003', 'Blueberry'),
('1004', 'Devil\'s Food');

-- --------------------------------------------------------

--
-- Table structure for table `batters`
--

CREATE TABLE `batters` (
  `dessert_id` varchar(7) NOT NULL,
  `batter_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batters`
--

INSERT INTO `batters` (`dessert_id`, `batter_id`) VALUES
('0001', '1001'),
('0001', '1002'),
('0001', '1003'),
('0001', '1004'),
('0002', '1001'),
('0003', '1001'),
('0003', '1002');

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

CREATE TABLE `dessert` (
  `dessert_id` varchar(7) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ppu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dessert`
--

INSERT INTO `dessert` (`dessert_id`, `type`, `name`, `ppu`) VALUES
('0001', 'donut', 'Cake', 0.55),
('0002', 'donut', 'Raised', 0.55),
('0003', 'donut', 'Old Fashioned', 0.55);

-- --------------------------------------------------------

--
-- Table structure for table `dessert_topping`
--

CREATE TABLE `dessert_topping` (
  `dessert_id` varchar(7) NOT NULL,
  `topping_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dessert_topping`
--

INSERT INTO `dessert_topping` (`dessert_id`, `topping_id`) VALUES
('0001', '5002'),
('0001', '5003'),
('0001', '5004'),
('0001', '5005'),
('0001', '5006'),
('0001', '5007'),
('0002', '5002'),
('0002', '5003'),
('0002', '5004'),
('0002', '5005'),
('0003', '5002'),
('0003', '5003'),
('0003', '5004');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `topping_id` varchar(7) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`topping_id`, `type`) VALUES
('5002', 'Glazed'),
('5003', 'Chocolate'),
('5004', 'Maple'),
('5005', 'Sugar'),
('5006', 'Chocolate with Sprinkles'),
('5007', 'Powdered Sugar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batter`
--
ALTER TABLE `batter`
  ADD PRIMARY KEY (`batter_id`);

--
-- Indexes for table `batters`
--
ALTER TABLE `batters`
  ADD PRIMARY KEY (`dessert_id`,`batter_id`),
  ADD KEY `batter_id` (`batter_id`);

--
-- Indexes for table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`dessert_id`);

--
-- Indexes for table `dessert_topping`
--
ALTER TABLE `dessert_topping`
  ADD PRIMARY KEY (`dessert_id`,`topping_id`),
  ADD KEY `topping_id` (`topping_id`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`topping_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batters`
--
ALTER TABLE `batters`
  ADD CONSTRAINT `batters_ibfk_1` FOREIGN KEY (`dessert_id`) REFERENCES `dessert` (`dessert_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `batters_ibfk_2` FOREIGN KEY (`batter_id`) REFERENCES `batter` (`batter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dessert_topping`
--
ALTER TABLE `dessert_topping`
  ADD CONSTRAINT `dessert_topping_ibfk_1` FOREIGN KEY (`dessert_id`) REFERENCES `dessert` (`dessert_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dessert_topping_ibfk_2` FOREIGN KEY (`topping_id`) REFERENCES `topping` (`topping_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
