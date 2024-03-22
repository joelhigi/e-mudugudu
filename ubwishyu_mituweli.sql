-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 05:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umudugudu`
--

-- --------------------------------------------------------

--
-- Table structure for table `ubwishyu_mituweli`
--

CREATE TABLE `ubwishyu_mituweli` (
  `ubwishyu_id` int(255) NOT NULL,
  `umuturage_id` int(255) NOT NULL,
  `aho_yishyuriye` varchar(255) DEFAULT NULL,
  `umwaka_yishyuriye` varchar(255) DEFAULT NULL,
  `impamvu_atishyuye` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ubwishyu_mituweli`
--

INSERT INTO `ubwishyu_mituweli` (`ubwishyu_id`, `umuturage_id`, `aho_yishyuriye`, `umwaka_yishyuriye`, `impamvu_atishyuye`) VALUES
(13, 36, 'Kicukiro', '2020-2021', '-'),
(14, 34, 'Kicukiro', '2020-2021', '-'),
(15, 35, 'Rusizi', '2019-2020', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ubwishyu_mituweli`
--
ALTER TABLE `ubwishyu_mituweli`
  ADD PRIMARY KEY (`ubwishyu_id`),
  ADD KEY `umuturage_id` (`umuturage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ubwishyu_mituweli`
--
ALTER TABLE `ubwishyu_mituweli`
  MODIFY `ubwishyu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ubwishyu_mituweli`
--
ALTER TABLE `ubwishyu_mituweli`
  ADD CONSTRAINT `ubwishyu_mituweli_ibfk_1` FOREIGN KEY (`umuturage_id`) REFERENCES `umuturage` (`umuturage_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
