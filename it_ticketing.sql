-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 09:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_ticketing`
--
CREATE DATABASE IF NOT EXISTS `it_ticketing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `it_ticketing`;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` enum('Low','Medium','High') DEFAULT 'Medium',
  `description` text DEFAULT NULL,
  `status` enum('Open','In Progress','Closed') DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `title`, `priority`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Email not working', 'High', 'Cannot send or receive emails.', 'Open', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(2, 'Printer not responding', 'Medium', 'HP LaserJet is not printing documents.', 'In Progress', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(3, 'Forgot password', 'Low', 'User forgot Windows login password.', 'Closed', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(4, 'System crash', 'High', 'Computer crashes randomly during work.', 'Open', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(5, 'Software update needed', 'Medium', 'Need the latest Adobe Photoshop version.', 'In Progress', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(6, 'Internet connectivity issues', 'High', 'LAN connection is frequently dropping.', 'Open', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(7, 'Mouse not working', 'Low', 'Mouse is unresponsive; tried different USB ports.', 'Closed', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(8, 'Slow PC performance', 'Medium', 'System is very slow after login.', 'In Progress', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(9, 'VPN connection failure', 'High', 'Unable to connect to company VPN.', 'Open', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(10, 'Keyboard keys stuck', 'Low', 'Spacebar and enter keys are sticky.', 'Closed', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(11, 'Blue screen error', 'High', 'System shows blue screen randomly.', 'Open', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(12, 'Access denied to shared folder', 'Medium', 'User cannot access department shared folder.', 'In Progress', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(13, 'Need admin rights', 'Low', 'User needs temporary admin rights to install software.', 'Open', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(14, 'Broken monitor', 'High', 'Screen flickers and has lines across it.', 'In Progress', '2025-05-19 06:37:38', '2025-05-19 06:37:38'),
(15, 'New employee account setup', 'Medium', 'Create IT account and email for new employee.', 'Closed', '2025-05-19 06:37:38', '2025-05-19 06:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
