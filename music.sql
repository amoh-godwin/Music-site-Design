-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2017 at 12:54 PM
-- Server version: 5.7.16
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `song_list`
--

CREATE TABLE `song_list` (
  `id` int(7) NOT NULL,
  `song_title` text NOT NULL,
  `file_name` text NOT NULL,
  `artist` varchar(512) NOT NULL,
  `tags` text NOT NULL,
  `uploaded_by` varchar(512) NOT NULL,
  `type` varchar(5) NOT NULL,
  `size` int(12) NOT NULL,
  `downloads` int(12) NOT NULL,
  `plays` int(7) NOT NULL,
  `album_art` varchar(1024) NOT NULL,
  `upload_date` int(12) NOT NULL,
  `contributing_artist` varchar(12) NOT NULL,
  `Genre` varchar(12) NOT NULL,
  `ratings` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song_list`
--

INSERT INTO `song_list` (`id`, `song_title`, `file_name`, `artist`, `tags`, `uploaded_by`, `type`, `size`, `downloads`, `plays`, `album_art`, `upload_date`, `contributing_artist`, `Genre`, `ratings`) VALUES
(1, 'Joromi', 'jolomi - Joromi.mp3', 'jorome', 'joromi, jorome', '', 'mp3', 7406, 7, 5, '', 0, '', '', 0),
(2, 'Joromi', 'Simi - Joromi.mp3', 'Simi', 'joromi, jolomi, jorome, jolome', '', 'mp3', 7406, 15, 8, '', 0, '', '', 0),
(3, 'Age to Age', 'Hillsong - Age to Age.mp3', 'Hillsong', 'age to age, Hillsong, and his glory appears like the light from the shine, like the light from the sun', '', 'mp3', 3257, 49, 42, '', 1510219358, '', '', 0),
(4, 'I will rejoice', 'Unknown - I will rejoice.mp3', 'Unknown', 'I will rejoice, unknown', '', 'mp3', 1307, 3, 2, '', 1511447210, '', '', 0),
(5, 'League of extraordinary worshippers', 'Deitrick Haddon - League of extraordinary worshippers.mp3', 'Deitrick Haddon', 'League of extraordinary worshippers, Deitrick Haddon', '', 'mp3', 3425, 2, 2, '', 1511447314, '', '', 0),
(6, 'Give me you', 'Shana Wilson - Give me you.mp3', 'Shana Wilson', 'Give me you, Shana Wilson', '', 'mp3', 7360, 0, 7, '', 1511447372, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(512) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password_length` int(3) NOT NULL,
  `stwotsrd` varchar(2) NOT NULL,
  `hashed_password` text NOT NULL,
  `image` varchar(512) NOT NULL,
  `reg_date` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password_length`, `stwotsrd`, `hashed_password`, `image`, `reg_date`) VALUES
(1, ' ', ' ', 'ferdinand@gmail.com', 'Ferdinand', 7, 'o1', '$2y$10$ZmIwOWRmMzliZTc5ZmNmYu.0ErXMkzcP4pWqHn9VYRsMhj7h.Btfu', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song_list`
--
ALTER TABLE `song_list`
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
-- AUTO_INCREMENT for table `song_list`
--
ALTER TABLE `song_list`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
