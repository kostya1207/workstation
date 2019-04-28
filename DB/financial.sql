-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 10:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial`
--

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `age` int(10) NOT NULL,
  `mon_salary` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_salary` varchar(255) COLLATE utf8_bin NOT NULL,
  `other_income` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_other_income` varchar(255) COLLATE utf8_bin NOT NULL,
  `total_income` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_total_income` varchar(255) COLLATE utf8_bin NOT NULL,
  `rent` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_rent` varchar(255) COLLATE utf8_bin NOT NULL,
  `food` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_food` varchar(255) COLLATE utf8_bin NOT NULL,
  `utilities` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_utilities` varchar(255) COLLATE utf8_bin NOT NULL,
  `other_expenses` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_other_expenses` varchar(255) COLLATE utf8_bin NOT NULL,
  `total_expenses` varchar(255) COLLATE utf8_bin NOT NULL,
  `ann_total_expenses` varchar(255) COLLATE utf8_bin NOT NULL,
  `savings_rate` varchar(255) COLLATE utf8_bin NOT NULL,
  `savings_account` varchar(255) COLLATE utf8_bin NOT NULL,
  `invested` varchar(255) COLLATE utf8_bin NOT NULL,
  `cash_hand` varchar(255) COLLATE utf8_bin NOT NULL,
  `liquid_assets` varchar(255) COLLATE utf8_bin NOT NULL,
  `total_networth` varchar(255) COLLATE utf8_bin NOT NULL,
  `percentage` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `email_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `country_code` int(10) NOT NULL,
  `phone_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email_address`, `password`, `country_code`, `phone_no`) VALUES
(0, 'admin', 'admin@manager.com', 'admin', 123, 456789),
(8, 'Tim Scott', 'timscott@gmail.com', '12345', 673, 6765432);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
