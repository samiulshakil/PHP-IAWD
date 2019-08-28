-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 10:31 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iawd_1802_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cit_roles`
--

CREATE TABLE `cit_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cit_roles`
--

INSERT INTO `cit_roles` (`role_id`, `role_name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Author'),
(4, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `cit_users`
--

CREATE TABLE `cit_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cit_users`
--

INSERT INTO `cit_users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_username`, `user_password`, `role_id`, `user_photo`, `user_time`) VALUES
(1, 'Monirul Islam', '01766556354', 'monirul@gmail.com', 'monirul', '202cb962ac59075b964b07152d234b70', 1, '', '0000-00-00 00:00:00'),
(2, 'Mehedi Hasan', '01988765446', 'mehedi@gmail.com', 'mehedi', 'c20ad4d76fe97759aa27a0c99bff6710', 2, '', '0000-00-00 00:00:00'),
(3, 'Sumon Khan Web', '01877665567', 'sumon@gmail.com', 'sumonbd', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', '0000-00-00 00:00:00'),
(5, 'Talha', '01766556351', 'talha@gmail.com', 'talha', 'c20ad4d76fe97759aa27a0c99bff6710', 3, 'User-151989313418712435217.jpg', '0000-00-00 00:00:00'),
(6, 'Sazzat Khan', '01766556356', 'sazzat.web@gmail.com', 'sazzat', '37693cfc748049e45d87b8c7d8b9aacd', 2, 'User-151989321846262290205.jpg', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cit_roles`
--
ALTER TABLE `cit_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `cit_users`
--
ALTER TABLE `cit_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cit_roles`
--
ALTER TABLE `cit_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cit_users`
--
ALTER TABLE `cit_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cit_users`
--
ALTER TABLE `cit_users`
  ADD CONSTRAINT `cit_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `cit_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
