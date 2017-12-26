-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2017 at 10:12 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `abbm`
--

CREATE TABLE `abbm` (
  `id` int(20) NOT NULL,
  `bm_id` int(20) NOT NULL,
  `income_date` datetime NOT NULL,
  `income_value` int(20) NOT NULL,
  `uldegdel` int(20) NOT NULL,
  `finished_date` datetime NOT NULL,
  `user_id` int(20) NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abbm`
--
ALTER TABLE `abbm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bm_id` (`bm_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abbm`
--
ALTER TABLE `abbm`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abbm`
--
ALTER TABLE `abbm`
  ADD CONSTRAINT `abbm_ibfk_1` FOREIGN KEY (`bm_id`) REFERENCES `bm` (`id`),
  ADD CONSTRAINT `abbm_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
