-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 12:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task2_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `hobbies`, `password`, `utype`) VALUES
(1, 'SuperAdmin', 'testuser@kcsitglobal.com', 'Male', 'singing', '5ebe2294ecd0e0f08eab7690d2a6ee69', '1'),
(2, 'Admin', 'admin@gmail.com', 'Male', 'Singing', '5ebe2294ecd0e0f08eab7690d2a6ee69', '2'),
(3, 'User', 'user@gmail.com', 'Male', 'Cricket,Singing', '5ebe2294ecd0e0f08eab7690d2a6ee69', '3'),
(8, 'user', 'user1@gmail.com', 'Male', 'Cricket,Singing,Swimming,Shopping', 'f91e15dbec69fc40f81f0876e7009648', '3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `active` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`, `active`) VALUES
(2, 'CAR', 'Yes'),
(3, 'mobile', 'Yes'),
(4, 'Watch', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `createdbyuser` varchar(255) NOT NULL,
  `active` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `category_id`, `images`, `createdbyuser`, `active`) VALUES
(1, 'HP i3', 5, '52795333267G62PA-4_T1646987030.jpeg', '1', 'Yes'),
(2, 'realme', 3, '2073643649Redmi-note-7-blue.jpeg', '1', 'No'),
(3, 'BMW', 2, '12765078411j6r7p38_car_625x300_30_November_21.jpg', '1', 'Yes'),
(4, 'kcs', 2, '694490848images.jpg', 'testuser@kcsitglobal.com', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
