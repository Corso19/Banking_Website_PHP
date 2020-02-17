-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 06:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `cheltuieli`
--

CREATE TABLE `cheltuieli` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` char(50) NOT NULL,
  `value` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cheltuieli`
--

INSERT INTO `cheltuieli` (`id`, `user_id`, `title`, `value`, `created_at`) VALUES
(4, 1, 'cheltuiala', 128, '2020-02-02 13:46:00'),
(6, 1, 'cheltuiala2', 240, '2020-02-02 18:30:37'),
(7, 1, 'leu pentru ateneu', 1, '2020-02-02 18:30:37');



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nume` char(30) NOT NULL,
  `prenume` char(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `nume`, `prenume`, `email`, `password`, `created_at`) VALUES
(27, 'Gabriel', 'Acatrinei', 'Gabriel', 'g@gmail.com', 'parola1', '2020-01-29 17:28:52'),
(28, 'Stefan', 'Acatrinei', 'Stefan', 'S@gmail.com', 'password', '2020-01-29 17:11:22'),
(29, 'Corso19', 'Acatrinei', 'Stefan', 'acatrinistefan75@yahoo.com', 'cinearenorocare', '2020-01-29 17:11:22');



-- --------------------------------------------------------

--
-- Table structure for table `venituri`
--

CREATE TABLE `venituri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` char(50) NOT NULL,
  `value` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venituri`
--

INSERT INTO `venituri` (`id`, `user_id`, `title`, `value`, `created_at`) VALUES
(4, 1, 'venit1', 4000, '2020-02-02 18:29:52'),
(5, 1, 'venit2', 1200, '2020-02-02 18:30:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheltuieli`
--
ALTER TABLE `cheltuieli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venituri`
--
ALTER TABLE `venituri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheltuieli`
--
ALTER TABLE `cheltuieli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `venituri`
--
ALTER TABLE `venituri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
