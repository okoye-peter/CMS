-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 02:26 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `user_id` int(11) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `pics` varchar(100) DEFAULT NULL,
  `categories` varchar(25) DEFAULT NULL,
  `date_posted` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`user_id`, `title`, `content`, `pics`, `categories`, `date_posted`, `id`) VALUES
(2, 'THE BEAUTY OF GRAPHIC DESIGN', 'W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2018 by Refsnes Data. All Rights Reserved.<br />\r\nPowered by W3.CSS.<br />\r\n<br />\r\n W3Schools.com', '5d5d232ea11ba7.37925374.jpg', 'Graphic design', '1564513347', 2),
(1, 'My Life Style', 'Summary Constructor functions or, briefly, constructors, are regular functions, but thereâ€™s a common agreement to name them with capital letter first. Constructor functions should only be called using new. Such a call implies a creation of empty this at the start and returning the populated one at the end. We can use constructor functions to make multiple similar objects. JavaScript provides constructor functions for many built-in language objects: like Date for dates, Set for sets and others that we plan to study. Objects, weâ€™ll be back! In this chapter we only cover the basics about objects and constructors. They are essential for learning more about data types and functions in the next chapters. After we learn that, in the chapter Article \"object-oriented-programming\" not found we return to objects and cover them in-depth, including inheritance and classes.<br />\r\n<br />\r\n', '5d56ca204f91d9.44092909.jpg', 'Life Style', '1565968928', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `gender`, `status`) VALUES
(1, 'okoye peter', 'peter', '$2y$10$Gz8Ydj.qz/zc.rK7Z6PTs.k4hdkkWXaV.JWTrGkva76G5AdrMVwXi', 'M', '0'),
(2, NULL, NULL, '$2y$10$.Mg7Y/fgbPexEfAL4zc1LuFYoliZQxoziD0nhzKT7l/Rr6Q74eyeW', 'F', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trial` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `trial` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
