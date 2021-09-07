-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 08:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naukri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `user_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 22, 1, '', '2021-09-07', '0000-00-00'),
(2, 18, 22, 2, '', '2021-09-07', '0000-00-00'),
(3, 16, 22, 1, '', '2021-09-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cv` text NOT NULL,
  `knowledge` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `description`, `cv`, `knowledge`, `skills`, `education`, `experience`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Devjoshi', 'updated', 'example_cv.pdf', 'basic knowledge of c , php , bootstrap , python', 'programming', 'bca', '1 year', 'blog1.jpg', '2021-09-06 21:32:07', '2021-09-06 21:32:07'),
(2, 'Profile_user', '', '', '', '', '', '', 'kart_5.jpg', '2021-09-07 01:27:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `company_name` varchar(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  `nature` text NOT NULL,
  `knowledge` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company_id`, `company_name`, `user_id`, `username`, `description`, `vacancy`, `nature`, `knowledge`, `skills`, `education`, `experience`, `salary`, `location`, `created_at`, `updated_at`) VALUES
(16, 'C Programmer 2', '1', 'Deo Ltd.', '', '', 'c programmer 2 needed for Deo Ltd.', '5', 'Full Time', 'Basic knowledge of c', 'C , C++', 'gdf', '1 year', '45000', 'delhi', '2021-09-04 13:18:51', '0000-00-00 00:00:00'),
(18, 'Php Writter 2', '2', 'ABC Ltd.', '', '', 'php programmer 2 needed', '4', 'Full Time', 'Basic knowledge of php', 'php bootstrap', 'dgf', '1 year', '45000', 'delhi', '2021-09-04 13:21:38', '0000-00-00 00:00:00'),
(20, 'wsdac', '1', 'Deo Ltd.', '', '', 'kejsdvnjkdslvn cx', '4', 'part time', 'basic', 'coding', 'bca', '1 year', '45000', 'delhi', '2021-09-07 13:22:24', '2021-09-07 13:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `type`, `email`, `image`, `status`, `skills`, `description`, `capacity`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Deo Ltd.', '123', 1, 'deo@gmail.com', 'blog1.jpg', '', '', 'Deo Technologies Pvt. Ltd. new and updated description...congratulations...!!', '100', 'DELHI , BENGALURU', '2021-09-03 01:43:59', '2021-09-03 02:11:53'),
(2, 'ABC Ltd.', '123', 1, 'abc@gmail.com', 'blog2.jpg', '', '', 'abc limited description updated', '100', 'DELHI', '2021-09-02 23:12:25', '2021-09-03 15:36:11'),
(20, 'Profile_user', '123', 0, 'profile_user@gmail.com', 'kart_5.jpg', '', '', '', '', '', '2021-09-07 01:03:43', '2021-09-07 01:03:43'),
(22, 'Devjoshi', '123', 0, 'dev@gmail.com', 'blog1.jpg', '', '', '', '', '', '2021-09-07 01:17:52', '2021-09-07 01:17:52'),
(23, 'nAukri', '123', 2, 'nAukri@gmail.com', 'kart_2.jpg', '', '', '', '', '', '2021-09-07 01:49:26', '2021-09-07 01:49:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
