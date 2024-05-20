-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2024 at 02:23 PM
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
-- Database: `crypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `useremail`, `currency`, `amount`, `status`, `date`) VALUES
(23, 'dev.jimin02@gmail.com', 'USDT', 120, 1, '2024-01-30 11:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `withdrawn` int(255) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transaction_id`, `useremail`, `amount`, `withdrawn`, `status`, `date`) VALUES
(1, 'u5JgTIazeO', 'dev.jimin02@gmail.com', '20', 0, 'approved', '2024-01-27 23:18:39'),
(2, 'Zr9Tk8Nmh8', 'dev.jimin02@gmail.com', '60', 0, 'pending', '2024-01-27 23:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `id` int(20) NOT NULL,
  `role` varchar(30) NOT NULL,
  `balance` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `username`, `email`, `phone`, `password`, `gender`, `id`, `role`, `balance`) VALUES
('Collins Muema', 'admin', 'onlyzap.help@gmail.com', 2147483647, '$2y$10$sniheT7KZFurZ7aXVnJVweVH2UebqmjV3/NRpQbzFEy', 'male', 1, 'user', 0),
('OnlyZap', 'admin', 'on.help@gmail.com', 2147483647, '$2y$10$9w4WzXG0oReV1Qq0YDWpDOrhgyDu1HzZO9gILwiTJhWN/59StAjc.', 'female', 2, 'admin', 0),
('Jimmy', 'Jimin', 'onlyzap.help@gmail.com', 2147483647, '$2y$10$ccA91UDYrHYbFoBUu9rmS.2DadAmAdY9gL9Cqp4WQyfTnEsmOOsHG', 'male', 3, 'user', 0),
('Dev Jimin', 'Jimin', 'dev.jimin02@gmail.com', 112163919, '$2y$10$BhDZ/3s7vhzHM1benNKgPObWNYqIBxe0lsHA7rqEPigxNUIVhPJGG', 'male', 4, 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
