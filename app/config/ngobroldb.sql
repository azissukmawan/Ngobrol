-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 04:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngobroldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `komen_tb`
--

CREATE TABLE `komen_tb` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `komen` text NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komen_tb`
--

INSERT INTO `komen_tb` (`id`, `id_post`, `username`, `komen`, `time`) VALUES
(51, 20, 'azis', '<div>anjay</div>', '13 January 2023 18:57'),
(52, 19, 'rizki', '<div>hello friend</div>', '13 January 2023 18:59'),
(53, 18, 'faisal', '<div>Gokil</div>', '13 January 2023 19:00'),
(54, 18, 'rizki', '<div>keren keren</div>', '13 January 2023 19:01'),
(55, 18, 'azis', '<div>👍👍👍</div>', '13 January 2023 19:01'),
(56, 20, 'test', '<div>EFBVEFBVRH</div>', '13 January 2023 21:53');

-- --------------------------------------------------------

--
-- Table structure for table `like_tb`
--

CREATE TABLE `like_tb` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_tb`
--

INSERT INTO `like_tb` (`id`, `id_post`, `username`) VALUES
(30, 19, 'faisal'),
(31, 18, 'faisal'),
(32, 20, 'rizki'),
(33, 19, 'rizki'),
(34, 18, 'rizki'),
(35, 20, 'azis'),
(36, 19, 'azis'),
(37, 18, 'azis'),
(38, 20, 'faisal'),
(39, 20, 'test'),
(41, 22, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`id`, `nama`, `tgl`) VALUES
(70, 'Azis Sukmawan', '2022-12-28 22:59:02'),
(71, 'Abdul Azis Sukmawan', '2022-12-28 23:05:16'),
(72, 'Azis Sukmawan', '2022-12-28 23:13:27'),
(73, 'Abdul Azis', '2023-01-13 18:52:54'),
(74, 'Faisal Abdullah', '2023-01-13 18:54:31'),
(75, 'Rizki Pratama', '2023-01-13 18:55:59'),
(76, 'Abdul Azis', '2023-01-13 18:56:58'),
(77, 'Faisal Abdullah', '2023-01-13 18:57:54'),
(78, 'Abdul Azis', '2023-01-13 18:58:32'),
(79, 'Rizki Pratama', '2023-01-13 18:59:11'),
(80, 'Faisal Abdullah', '2023-01-13 18:59:52'),
(81, 'Rizki Pratama', '2023-01-13 19:00:32'),
(82, 'Abdul Azis', '2023-01-13 19:01:23'),
(83, 'Abdul Azis', '2023-01-13 19:21:28'),
(84, 'Test1', '2023-01-13 21:52:43'),
(85, 'Rizki orang pondok petir', '2023-01-13 22:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `postingan_tb`
--

CREATE TABLE `postingan_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `teks` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postingan_tb`
--

INSERT INTO `postingan_tb` (`id`, `username`, `teks`, `img`, `time`) VALUES
(18, 'azis', '<div>Get Ready !</div>', 'img-63c146464e5a9.png', '13 January 2023 18:53'),
(19, 'faisal', '<div>Test</div>', '', '13 January 2023 18:54'),
(20, 'rizki', '<div>Hello world</div>', '', '13 January 2023 18:56'),
(22, 'test', '<div>Gua ganteng</div>', 'img-63c170ce68dd3.jpeg', '13 January 2023 21:55');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `fp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`id`, `nama`, `username`, `password`, `jk`, `fp`) VALUES
(4, 'Abdul Azis', 'azis', '$2y$10$zSE3PchNaecoYzBnUbek/.iaO8R/0TFFBORLzbQEJGxJFM6fQue6u', 'Laki-laki', 'profil-63c145c080b9f.jpeg'),
(5, 'Faisal Abdullah', 'faisal', '$2y$10$ISWXTs1yUSKe2Bpcf9FyOuOU/0z/ZhVwL2zZ4Vm6KOhipRmOsR3Xy', 'Laki-laki', 'bahan.jpg'),
(6, 'Rizki Pratama', 'rizki', '$2y$10$D0dazWr7fKERNYpSPdMGGudksmoFm0m6BNp1nT4lyg2iiSXuj.LhW', 'Laki-laki', 'bahan.jpg'),
(7, 'Rizki orang pondok petir', 'test', '$2y$10$S0C/l7hfT2/tUz6rA7fbbOKY7VWOcP7wbBptWVQTXHx76dJCOCq26', 'Perempuan', 'profil-63c17198b618c.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komen_tb`
--
ALTER TABLE `komen_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_tb`
--
ALTER TABLE `like_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingan_tb`
--
ALTER TABLE `postingan_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komen_tb`
--
ALTER TABLE `komen_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `like_tb`
--
ALTER TABLE `like_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `postingan_tb`
--
ALTER TABLE `postingan_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
