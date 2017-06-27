-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2017 at 08:15 PM
-- Server version: 10.0.23-MariaDB-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cus_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
`id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_date`, `updated_date`) VALUES
(1, 'admin', '', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2017-06-20 00:00:00', '2017-06-20 13:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `company_name`, `name`, `email`, `phone`, `address`, `status`, `created_date`, `updated_date`) VALUES
(1, 'ABC corparate', 'Saravanan muthu', 'saravanan@izaaptech.in', '8545656656', '3rd floor,svs nagar, valasaravakkam, chennai-87', 'Y', '2017-06-21 20:34:28', '2017-06-23 10:18:08'),
(3, 'Test company', 'john', 'john@gmail.com', '8645343536', '1st street, 2nd main road, valasai', 'Y', '2017-06-23 16:44:59', '2017-06-23 11:14:59'),
(4, 'XYZ limited', 'myworld1', 'xyz@gmail.com', '8545656656', '1st street,florida,us', 'Y', '2017-06-27 16:36:00', '2017-06-27 11:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `support_types`
--

CREATE TABLE IF NOT EXISTS `support_types` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_types`
--

INSERT INTO `support_types` (`id`, `name`) VALUES
(1, 'Technical Support'),
(2, 'Customer Support'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` enum('NEW','PROCESSING','COMPLETED','CANCELLED') NOT NULL,
  `support_type` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `customer_id`, `status`, `support_type`, `description`, `created_date`, `updated_date`) VALUES
(2, 4, 'NEW', 1, 'I stumbled here as I was trying to find a way to select the best currently matching option from a multi select chosen search result list (whenever focus was lost). Here''s a short fiddle about my explorations. You don''t event need to trigger any events. Perhaps, it is of use for someone else too', '2017-06-27 16:36:00', '2017-06-27 11:06:00'),
(3, 3, 'NEW', 2, 'test report \r\ntest report \r\ntest report', '2017-06-27 16:51:04', '2017-06-27 11:21:04'),
(4, 3, 'NEW', 2, 'wethwqpotioptgi eqwrgerg\r\nasrdgergewtr qr\r\nerdfgerthgrthjr swtghrrthrth\r\nsadrfgdrfthgrthrhj', '2017-06-27 17:39:39', '2017-06-27 12:09:39'),
(5, 1, 'COMPLETED', 1, 'drujyt5ijk67k swethyujryi767i6 dthnjt\r\ndfghgfjftgyhnjfghyjmkf\r\ncdfghnfghmnjjfgjh', '2017-06-27 17:40:22', '2017-06-27 12:10:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_types`
--
ALTER TABLE `support_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `support_types`
--
ALTER TABLE `support_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1000;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
