-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 06:52 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `financial_attorney_transactions`
--

CREATE TABLE `financial_attorney_transactions` (
  `id` int(11) NOT NULL,
  `code_pf` varchar(10) NOT NULL,
  `version` varchar(10) NOT NULL,
  `codeH` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date_now` date NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `effective_date` date NOT NULL,
  `bene_ref` varchar(100) NOT NULL,
  `personal_id` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `financial_attorney_transactions`
--
ALTER TABLE `financial_attorney_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `financial_attorney_transactions`
--
ALTER TABLE `financial_attorney_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
