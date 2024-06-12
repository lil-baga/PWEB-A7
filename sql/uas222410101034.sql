-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2024 at 12:07 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas222410101034`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`) VALUES
(1, 'Drs. Antonius Cahya P, M. App,.Sc., Ph.D'),
(2, 'Achmad Maududie, ST., M.Sc'),
(3, 'Diah Ayu Retnani Wulandari, ST., M.Eng'),
(4, 'Fahrobby Adnan, S.Kom.,MMSI'),
(5, 'Prof. Drs. Slamin, M.Comp.Sc., Ph.D'),
(6, 'Prof. Dr. Saiful Bukhori, ST., M.Kom'),
(7, 'Anang Andrianto, S.T., M.T'),
(8, 'Nelly Oktavia Adiwijaya, S.Si., MT'),
(9, 'M. Arief Hidayat, S. Kom., M. Kom'),
(10, 'Yanuar Nurdiansyah, ST., M.Cs'),
(11, 'Dwiretno Istiyadi S, ST., M.Kom'),
(12, 'Katarina Leba, S.Ag., M.Th'),
(13, 'Windi Eka Yulia Retnani, S. Kom., MT'),
(14, 'Oktalia Juwita, S.Kom., M.MT'),
(15, 'Fajrin Nurman Arifin, ST., M.Eng'),
(16, 'Priza Pandunata, S.Kom., M.Sc'),
(17, 'Nova El Maidah, S.Si., M.Cs'),
(18, 'Mohammad Zarkasi, S.Kom.,M.Kom'),
(19, 'Beny Prasetyo, S.Kom.,M.Kom'),
(20, 'Muhammad ’Ariful Furqon, S.Pd.,M.Kom '),
(21, 'Tio Dharmawan, S.Kom.,M.Kom'),
(22, 'Januar Adi Putra, S.kom., M.Kom'),
(23, 'Yudha Alif Auliya, S.Kom.,M.Kom'),
(24, 'Karina Nine Amalia, S.Kom.,M.Kom'),
(25, 'Tri Agustina Nugrahani, S.Kom.,M.Kom'),
(26, 'Gama Wisnu Fajarianto, S.Kom.,M.Kom'),
(27, 'Gayatri Dwi Santika, S.SI.,M.Kom'),
(28, 'Diksy Media Firmansyah, S.Kom.,M.Kom'),
(29, 'Qurrota A’yuni Ar Ruhimat, S.Pd.,M.Sc'),
(30, 'Harry Soepandi S.Kom M.Kom'),
(31, 'Dwi Wijonarko S.Kom, M.Kom.'),
(32, 'Maliatul Fitriyasari M.Sc.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `sempro`
--

CREATE TABLE `sempro` (
  `id` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `proposal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `link_zoom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `link_record` varchar(255) DEFAULT NULL,
  `pembahas1_id` bigint NOT NULL,
  `pembahas2_id` bigint NOT NULL,
  `pembimbing1_id` bigint NOT NULL,
  `pembimbing2_id` bigint NOT NULL,
  `users_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `username` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `roles_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `roles_id`) VALUES
(1, 'admin1123', 'Admin S-Track', '$2y$12$xewWOJ48.6mr6UUyFEgaT.Tv/hluCe9kp394z6lNnTCqos8o6c2d2', 1),
(2, '760009201', 'Ayu Aisah', '$2y$12$C9mI/5Qc.XKq1mMZ5oqCzuZfHgfM4sXgSlxfmqE2lIbBnSQFkkqzu', 2),
(3, '760012459', 'Riza Resti Pratitis', '$2y$12$yDyG1qEpZY3lffwLiUWc0.9lL0NUrg2qvLvzwMw6OrhT6GKf0uiz2', 2),
(4, '760011443', 'Purwanto', '$2y$10$ToeJnEs.i52kwvRCrNCbaORh2aA/m5pdZKGYNB6jGqQHh.h7KTIRW', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sempro`
--
ALTER TABLE `sempro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembahas1_id` (`pembahas1_id`),
  ADD KEY `pembahas2_id` (`pembahas2_id`),
  ADD KEY `pembimbing1_id` (`pembimbing1_id`),
  ADD KEY `pembimbing2_id` (`pembimbing2_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sempro`
--
ALTER TABLE `sempro`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sempro`
--
ALTER TABLE `sempro`
  ADD CONSTRAINT `pembahas1_id` FOREIGN KEY (`pembahas1_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `pembahas2_id` FOREIGN KEY (`pembahas2_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `pembimbing1_id` FOREIGN KEY (`pembimbing1_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `pembimbing2_id` FOREIGN KEY (`pembimbing2_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_id` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
