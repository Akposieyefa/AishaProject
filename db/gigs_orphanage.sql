-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 09:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gigs_orphanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` date NOT NULL,
  `status` varchar(10000) DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `status`, `updated_at`) VALUES
(1, 'John', 's@gmail.com', 'Love', 'LoveLoveLoveLoveLoveLoveLove', '2021-04-01', NULL, NULL),
(2, 'oii', 'ty1@gmail.com', 'we humbly apply for job as a web developer ', 'we humbly apply for job as a web developer ', '2021-04-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orphanage`
--

CREATE TABLE `orphanage` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(340) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphanage`
--

INSERT INTO `orphanage` (`id`, `name`, `email`, `phone`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'WendyDelivery', 'orutu1@gmail.com', '08100788869', 'Mile 3 sagbama bayelsa state', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-04-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orphans`
--

CREATE TABLE `orphans` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(300) NOT NULL,
  `picture` blob NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphans`
--

INSERT INTO `orphans` (`id`, `name`, `dob`, `gender`, `picture`, `created_at`) VALUES
(1, 'Orutu Akposieyefa Williams', '2021-04-13', 'male', 0x63316630313533313365663566386636376539333030613661623137333935322e6a7067, '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `IP_ADDRESS` int(11) DEFAULT NULL,
  `access_code` varchar(255) NOT NULL,
  `paymentReference` varchar(255) NOT NULL,
  `TXN_ID` varchar(255) DEFAULT NULL,
  `AMOUNT_PAID` varchar(255) DEFAULT NULL,
  `AMOUNT_TO_PAY` varchar(255) DEFAULT NULL,
  `CURRENCY` varchar(255) DEFAULT NULL,
  `PAYMENT_TYPE` varchar(255) DEFAULT NULL,
  `DESTINATION` varchar(255) DEFAULT NULL,
  `CARD_first_6digits` int(11) DEFAULT NULL,
  `CARD_last_4digits` int(11) DEFAULT NULL,
  `CARD_issuer` varchar(255) DEFAULT NULL,
  `CARD_country` varchar(255) DEFAULT NULL,
  `CARD_type` varchar(255) DEFAULT NULL,
  `CARD_token` varchar(255) DEFAULT NULL,
  `CARD_expiry` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `DATE_CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `PaymentSecretKey` varchar(3000) NOT NULL,
  `PaymentPublicKey` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `PaymentSecretKey`, `PaymentPublicKey`) VALUES
(1, 'Aisha Kabiru', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bearer sk_test_bb1026896d1afc12368c26342b91b1bb6e1d309a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphanage`
--
ALTER TABLE `orphanage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orphans`
--
ALTER TABLE `orphans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orphanage`
--
ALTER TABLE `orphanage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orphans`
--
ALTER TABLE `orphans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
