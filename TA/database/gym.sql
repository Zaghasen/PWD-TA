-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 04:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `paket_member` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`) VALUES
(10, 'Rio', 'Rusdi', 'riorusdi@gmail.com', 'uploads/1716711289Screenshot 2024-05-26 151321.png', '$2y$10$/5YI99rNjdKTSvYBtmdAceVT/4n0mRV2ySXku0MVr5tbm1/Z/QYBO', 'Female', '2024-06-03 14:54:39'),
(11, 'Nobel', 'Ganteng', 'nobel@gmail.com', 'uploads/1716702141Screenshot 2024-05-26 124050.png', '$2y$10$F9m/2Gvr6hlOcxYF28UYJeLO4lTjzoFl1eQki2Pjk7os6pyWvLaWy', 'Male', '2024-05-26 08:41:52'),
(12, 'Ardan', 'Ardun', 'dan1@gmail.com', 'uploads/1716711016Screenshot 2024-05-26 150901.png', '$2y$10$xO.7TonqByCwdUAV5ZLme.ck1Eer43v6XvcQkcgJATJ7YKs1ZkpzC', 'Male', '2024-05-26 08:42:27'),
(13, 'Fathan', 'Racing', 'fff@gmail.com', 'uploads/1716711176Screenshot 2024-05-26 151143.png', '$2y$10$PsJ8CCyYLuVPYLm0c0OgBOBYAMYH.a/GYR9xJQ9vG7SzpeOXPo/hi', 'Male', '2024-05-26 08:42:56'),
(14, 'Aidil', 'Zeta', 'ayankzeta@gmail.com', 'uploads/1716711366Screenshot 2024-05-26 151403.png', '$2y$10$REna17SuYGLFfIcUabBDL.eQ.2OrQforFm8OYT/dPfna.gilqPrXC', 'Male', '2024-05-26 08:43:25'),
(15, 'Yudha', 'Yahud', 'yyy@gmail.com', 'uploads/1716711454Screenshot 2024-05-26 151348.png', '$2y$10$ivap0TGafrLXIkZ4WqCsfOYsLNTqXFmdQ73OYSGVo9eUGzxnbIuOO', 'Male', '2024-05-26 08:43:55'),
(16, 'Abi', 'Umi', 'aaa@gmail.com', 'uploads/1716711554Screenshot 2024-05-26 151823.png', '$2y$10$eghFsZykeIOtim.TL1v18e3.kXXcC7OuzjBNOO2/Wytjuw2xtgk1W', 'Male', '2024-05-26 08:44:21'),
(17, 'Admin', 'Admin', 'admin8797@gmail.com', 'uploads/171671214887.jpg', '$2y$10$NZ3YpFNg27G63g7eGVWrdOS3XHY5yvwo4RuuaYJNFGeHzyjo793/S', 'Male', '2024-05-26 13:01:35'),
(18, 'Helisma', 'Mauludzunia', 'hlsm@gmail.com', 'uploads/171671408820240117_114655.jpg', '$2y$10$h9cQSudH9PdRWjcXmhpnNesT65rMCfrf6BFDYcZNW7LR7NwRRGN3C', 'Female', '2024-05-26 09:01:31'),
(19, 'Flora', 'Syafiqa', 'flo@gmail.com', 'uploads/171671356520240408_173422.jpg', '$2y$10$Mx8AQlcQcLhWezoCQ2fTT.AyD6fHmAqgaBKbEKcxztoIGKiPNBGoW', 'Female', '2024-05-26 08:52:45'),
(20, 'Indah', 'Cahya', 'mommy@gmail.com', 'uploads/171671368720231206_065350.jpg', '$2y$10$ivN6V2RwiChSU6MVIGTmW.XFQcNBgpZ44ZpbUEKwgnPyWj44vyaHm', 'Female', '2024-05-26 09:02:39'),
(21, 'Marsha', 'Lenathea', 'matcha@gmail.com', 'uploads/171671390520231206_065343.jpg', '$2y$10$q12uVP90kWiu9sLD5lyFHuyjYI8wfmpVIlh0eWhFam6fH1FiJuAiS', 'Female', '2024-05-26 08:58:25'),
(22, 'Kathrina', 'Irene', 'atin@gmail.com', 'uploads/171671396620231206_065342.jpg', '$2y$10$/Oh6jQuNn5.HPIfWp.kRF.UcNqr7p/GFqSL1xAst0rR4Wrndk80Nq', 'Female', '2024-05-26 08:59:26'),
(23, 'Adzana', 'Shaliha', 'acel@gmail.com', 'uploads/171671403320231206_065346.jpg', '$2y$10$m5x5I/IhSKgLadSQY.w1GOeqBUr.kWdNTUksrIdhmkYgIRepBmpoe', 'Female', '2024-05-26 09:00:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
