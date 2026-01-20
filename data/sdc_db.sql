-- phpMyAdmin SQL Dump
-- version 5.2.3-dev+20250818.dd3d8baef3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 09:25 PM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 8.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdc_db`
--
CREATE DATABASE IF NOT EXISTS `sdc_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sdc_db`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` varchar(6) NOT NULL,
  `room_id` varchar(15) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `package_id` varchar(7) NOT NULL,
  `activity_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE `gift_card` (
  `card_id` int(11) NOT NULL,
  `for` varchar(100) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` varchar(18) NOT NULL,
  `image_data` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `reference_id` varchar(7) NOT NULL,
  `language_id` varchar(15) NOT NULL,
  `reference_type` enum('ACTIVITY','PACKAGE') DEFAULT NULL,
  `alt_name` varchar(50) DEFAULT NULL,
  `small_description` varchar(500) DEFAULT NULL,
  `full_description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` varchar(15) NOT NULL,
  `abbreviation` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `abbreviation`) VALUES
('ENGLISH', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `locker_id` int(11) NOT NULL,
  `type` enum('SMALL','MEDIUM','BIG') DEFAULT NULL,
  `name` varchar(75) DEFAULT 'UNASSIGNED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`locker_id`, `type`, `name`) VALUES
(1, 'SMALL', 'UNASSIGNED'),
(2, 'SMALL', 'UNASSIGNED'),
(3, 'SMALL', 'UNASSIGNED'),
(4, 'SMALL', 'UNASSIGNED'),
(5, 'SMALL', 'UNASSIGNED'),
(6, 'SMALL', 'UNASSIGNED'),
(7, 'SMALL', 'UNASSIGNED'),
(8, 'SMALL', 'UNASSIGNED'),
(9, 'SMALL', 'UNASSIGNED'),
(10, 'SMALL', 'UNASSIGNED'),
(11, 'SMALL', 'UNASSIGNED'),
(12, 'SMALL', 'UNASSIGNED'),
(13, 'SMALL', 'UNASSIGNED'),
(14, 'SMALL', 'UNASSIGNED'),
(15, 'SMALL', 'UNASSIGNED'),
(16, 'SMALL', 'UNASSIGNED'),
(17, 'SMALL', 'UNASSIGNED'),
(18, 'SMALL', 'UNASSIGNED'),
(19, 'SMALL', 'UNASSIGNED'),
(20, 'SMALL', 'UNASSIGNED'),
(21, 'SMALL', 'UNASSIGNED'),
(22, 'SMALL', 'UNASSIGNED'),
(23, 'SMALL', 'UNASSIGNED'),
(24, 'SMALL', 'UNASSIGNED'),
(25, 'SMALL', 'UNASSIGNED'),
(201, 'MEDIUM', 'UNASSIGNED'),
(202, 'MEDIUM', 'UNASSIGNED'),
(203, 'MEDIUM', 'UNASSIGNED'),
(204, 'MEDIUM', 'UNASSIGNED'),
(205, 'MEDIUM', 'UNASSIGNED'),
(206, 'MEDIUM', 'UNASSIGNED'),
(207, 'MEDIUM', 'UNASSIGNED'),
(208, 'MEDIUM', 'UNASSIGNED'),
(209, 'MEDIUM', 'UNASSIGNED'),
(210, 'MEDIUM', 'UNASSIGNED'),
(211, 'MEDIUM', 'UNASSIGNED'),
(212, 'MEDIUM', 'UNASSIGNED'),
(213, 'MEDIUM', 'UNASSIGNED'),
(214, 'MEDIUM', 'UNASSIGNED'),
(215, 'MEDIUM', 'UNASSIGNED'),
(216, 'MEDIUM', 'UNASSIGNED'),
(217, 'MEDIUM', 'UNASSIGNED'),
(218, 'MEDIUM', 'UNASSIGNED'),
(219, 'MEDIUM', 'UNASSIGNED'),
(220, 'MEDIUM', 'UNASSIGNED'),
(221, 'MEDIUM', 'UNASSIGNED'),
(222, 'MEDIUM', 'UNASSIGNED'),
(223, 'MEDIUM', 'UNASSIGNED'),
(224, 'MEDIUM', 'UNASSIGNED'),
(225, 'MEDIUM', 'UNASSIGNED'),
(401, 'BIG', 'UNASSIGNED'),
(402, 'BIG', 'UNASSIGNED'),
(403, 'BIG', 'UNASSIGNED'),
(404, 'BIG', 'UNASSIGNED'),
(405, 'BIG', 'UNASSIGNED'),
(406, 'BIG', 'UNASSIGNED'),
(407, 'BIG', 'UNASSIGNED'),
(408, 'BIG', 'UNASSIGNED'),
(409, 'BIG', 'UNASSIGNED'),
(410, 'BIG', 'UNASSIGNED'),
(411, 'BIG', 'UNASSIGNED'),
(412, 'BIG', 'UNASSIGNED'),
(413, 'BIG', 'UNASSIGNED'),
(414, 'BIG', 'UNASSIGNED'),
(415, 'BIG', 'UNASSIGNED'),
(416, 'BIG', 'UNASSIGNED'),
(417, 'BIG', 'UNASSIGNED'),
(418, 'BIG', 'UNASSIGNED'),
(419, 'BIG', 'UNASSIGNED'),
(420, 'BIG', 'UNASSIGNED'),
(421, 'BIG', 'UNASSIGNED'),
(422, 'BIG', 'UNASSIGNED'),
(423, 'BIG', 'UNASSIGNED'),
(424, 'BIG', 'UNASSIGNED'),
(425, 'BIG', 'UNASSIGNED');

-- --------------------------------------------------------

--
-- Table structure for table `logger`
--

CREATE TABLE `logger` (
  `log_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL DEFAULT 418,
  `operation` varchar(100) NOT NULL,
  `log_time` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `locker_id` int(11) DEFAULT NULL,
  `bow_rental` tinyint(1) DEFAULT 0,
  `start` date DEFAULT curdate(),
  `end` date DEFAULT (curdate() + interval 1 month)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` varchar(7) NOT NULL,
  `category` enum('NOT A PACKAGE','INDIVIDUAL','SMALL GROUP','BIG GROUP','DATE NIGHT','KIDS BIRTHDAY','TEEN BIRTHDAY','CORPORATE EVENT','OUTSIDE EVENT','OTHER') DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `reference_id` varchar(7) NOT NULL,
  `ppl_num` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `activity_id` varchar(6) NOT NULL,
  `package_id` varchar(7) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `num_of_users` smallint(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `reservation_id` int(11) NOT NULL,
  `room_id` varchar(15) NOT NULL,
  `places_taken` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(15) NOT NULL,
  `available_places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `level` enum('EMPLOYEE','MANAGER','ADMIN') NOT NULL,
  `password` varchar(30) NOT NULL DEFAULT 'Hello123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `paid` tinyint(1) DEFAULT 0,
  `amount` decimal(5,2) DEFAULT NULL,
  `type` enum('CASH','DEBIT','CREDIT','CREDIT - MASTERCARD','CREDIT - VISA','CREDIT - AMEX','CHEQUE','OTHER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `language_id` varchar(15) NOT NULL,
  `membership_id` int(11) DEFAULT NULL,
  `fname` varchar(75) DEFAULT NULL,
  `lname` varchar(75) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'Hello123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uses`
--

CREATE TABLE `uses` (
  `image_id` varchar(15) NOT NULL,
  `reference_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`package_id`,`activity_id`),
  ADD KEY `fk_activity_id_on_contains` (`activity_id`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`reference_id`,`language_id`),
  ADD UNIQUE KEY `alt_name` (`alt_name`),
  ADD KEY `fk_language_id_on_information` (`language_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`locker_id`);

--
-- Indexes for table `logger`
--
ALTER TABLE `logger`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_staff_id_on_logger` (`staff_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `fk_locker_id_on_membership` (`locker_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`reference_id`,`ppl_num`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_user_id_on_reservation` (`user_id`),
  ADD KEY `fk_transaction_id_on_reservation` (`transaction_id`),
  ADD KEY `fk_activity_id_on_reservation` (`activity_id`),
  ADD KEY `fk_package_id_on_reservation` (`package_id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`reservation_id`,`room_id`),
  ADD KEY `fk_room_id_on_reserved` (`room_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_language_id_on_user` (`language_id`),
  ADD KEY `fk_membership_id_on_user` (`membership_id`);

--
-- Indexes for table `uses`
--
ALTER TABLE `uses`
  ADD PRIMARY KEY (`image_id`,`reference_id`),
  ADD KEY `fk_reference_id_on_uses` (`reference_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logger`
--
ALTER TABLE `logger`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `fk_activity_id_on_contains` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`),
  ADD CONSTRAINT `fk_package_id_on_contains` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk_activity_id_on_information_reference_id` FOREIGN KEY (`reference_id`) REFERENCES `activity` (`activity_id`),
  ADD CONSTRAINT `fk_language_id_on_information` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`);

--
-- Constraints for table `logger`
--
ALTER TABLE `logger`
  ADD CONSTRAINT `fk_staff_id_on_logger` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `fk_locker_id_on_membership` FOREIGN KEY (`locker_id`) REFERENCES `locker` (`locker_id`) ON UPDATE CASCADE;

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `fk_reference_id_on_price` FOREIGN KEY (`reference_id`) REFERENCES `information` (`reference_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_activity_id_on_reservation` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`),
  ADD CONSTRAINT `fk_package_id_on_reservation` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`),
  ADD CONSTRAINT `fk_transaction_id_on_reservation` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`),
  ADD CONSTRAINT `fk_user_id_on_reservation` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `fk_reservation_id_on_reserved` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `fk_room_id_on_reserved` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_language_id_on_user` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_membership_id_on_user` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`membership_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uses`
--
ALTER TABLE `uses`
  ADD CONSTRAINT `fk_image_id_on_uses` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`),
  ADD CONSTRAINT `fk_reference_id_on_uses` FOREIGN KEY (`reference_id`) REFERENCES `information` (`reference_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
