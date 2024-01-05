-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2024 at 08:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stadiumstream`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'basic'),
(2, 'premium'),
(3, 'vip');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'Abidjan'),
(2, 'Bouaké'),
(3, 'Daloa'),
(4, 'Yamoussoukro'),
(5, 'San-Pédro'),
(6, 'Divo'),
(7, 'Korhogo'),
(8, 'Anyama'),
(9, 'Abengourou'),
(10, 'Man'),
(11, 'Gagnoa'),
(12, 'Soubré'),
(13, 'Agboville'),
(14, 'Dabou'),
(15, 'Grand-Bassam'),
(16, 'Bouaflé'),
(17, 'Issia'),
(18, 'Sinfra'),
(19, 'Katiola'),
(20, 'Bingerville'),
(21, 'Adzopé'),
(22, 'Séguéla'),
(23, 'Bondoukou'),
(24, 'Oumé'),
(25, 'Ferkessedougou'),
(26, 'Dimbokro'),
(27, 'Odienné'),
(28, 'Duékoué'),
(29, 'Danané'),
(30, 'Tingréla'),
(31, 'Guiglo'),
(32, 'Boundiali'),
(33, 'Agnibilékrou'),
(34, 'Daoukro'),
(35, 'Vavoua'),
(36, 'Zuénoula'),
(37, 'Tiassalé'),
(38, 'Toumodi'),
(39, 'Akoupé'),
(40, 'Lakota');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `link`) VALUES
(1, 'nigiria.png'),
(2, 'Equatorialguinea.png'),
(3, 'codevoir.png'),
(4, 'bissau.png'),
(5, 'egypt.png'),
(6, 'Mozambique.png'),
(7, 'ghana.png'),
(8, 'greenhead.png'),
(9, 'senegal.png'),
(10, 'gambia.png'),
(11, 'cameroon.png'),
(12, 'guinea.png'),
(13, 'algeria.png'),
(14, 'angola.png'),
(15, 'burkinafaso.png'),
(16, 'mauritania.png'),
(17, 'tunisia.png'),
(18, 'namibia.png'),
(19, 'mali.png'),
(20, 'southafrica.png'),
(21, 'morocco.png'),
(22, 'tanzania.png'),
(23, 'democratic.png'),
(24, 'zambia.png'),
(25, 'public/uploads/stadiums/bouake.jpg'),
(26, 'public/uploads/stadiums/korhogo.jpg'),
(27, 'public/uploads/stadiums/san-pedro.jpg'),
(28, 'public/uploads/stadiums/yamoussoukro.jpg'),
(29, 'public/uploads/stadiums/boigny.jpg'),
(30, 'public/uploads/stadiums/abidjan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `firstname`, `lastname`) VALUES
(1, 'Jean-Louis', 'Gasset'),
(2, 'Baciro', 'Candé'),
(3, 'Jose', 'Peseiro'),
(4, 'Juan', 'Micha'),
(5, 'Rui', 'Vitória'),
(6, 'Chiquinho', 'Conde'),
(7, 'Chris', 'Hughton'),
(8, 'Pedro Leitão', 'Brito'),
(9, 'Aliou', 'Cissé'),
(10, 'Tom', 'Saintfiet'),
(11, 'Rigobert', 'Song'),
(12, 'Kaba', 'Diawara'),
(13, 'Djamel', 'Belmadi'),
(14, 'Pedro', 'Gonçalves'),
(15, 'Hubert', 'Velud'),
(16, 'Amir', 'Abdou'),
(17, 'Jalel', 'Kadri'),
(18, 'Collin', 'Benjamin'),
(19, 'Éric', 'Chelle'),
(20, 'Hugo', 'Broos'),
(21, 'Walid', 'Regragui'),
(22, 'Adel', 'Amrouche'),
(23, 'Sébastien', 'Desabre'),
(24, 'Avram', 'Grant');

-- --------------------------------------------------------

--
-- Table structure for table `matche`
--

CREATE TABLE `matche` (
  `id` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `stadium` int DEFAULT NULL,
  `team_1` int DEFAULT NULL,
  `team_2` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matche`
--

INSERT INTO `matche` (`id`, `date`, `stadium`, `team_1`, `team_2`) VALUES
(1, '2024-01-13 20:00:00', 1, 1, 2),
(2, '2024-01-14 14:00:00', 1, 3, 4),
(3, '2024-01-15 16:00:00', 6, 5, 6),
(4, '2024-01-16 20:00:00', 6, 7, 8),
(5, '2024-01-14 14:00:00', 5, 9, 10),
(6, '2024-01-15 16:00:00', 5, 11, 12),
(7, '2024-01-15 19:00:00', 2, 13, 14),
(8, '2024-01-16 14:00:00', 2, 15, 16),
(9, '2024-01-16 16:00:00', 3, 17, 18),
(10, '2024-01-17 16:00:00', 4, 21, 22),
(11, '2024-01-17 14:00:00', 4, 23, 24),
(12, '2024-01-18 16:00:00', 1, 4, 2),
(13, '2024-01-18 15:00:00', 1, 1, 3),
(14, '2024-01-18 15:00:00', 6, 5, 7),
(15, '2024-01-19 20:00:00', 6, 8, 6),
(16, '2024-01-19 15:00:00', 5, 9, 11),
(17, '2024-01-19 14:00:00', 5, 12, 10),
(18, '2024-01-20 15:00:00', 2, 13, 15),
(19, '2024-01-20 20:00:00', 2, 16, 14),
(20, '2024-01-21 15:00:00', 4, 21, 23),
(21, '2024-01-21 20:00:00', 4, 24, 22),
(22, '2024-01-21 16:00:00', 3, 20, 18),
(23, '2024-01-22 15:00:00', 1, 4, 1),
(24, '2024-01-22 15:00:00', 6, 2, 3),
(25, '2024-01-22 20:00:00', 1, 6, 7),
(26, '2024-01-22 15:00:00', 1, 8, 5),
(27, '2024-01-23 14:00:00', 1, 12, 9),
(28, '2024-01-23 15:00:00', 1, 10, 11),
(29, '2024-01-23 20:00:00', 1, 14, 15),
(30, '2024-01-23 16:00:00', 1, 16, 13),
(31, '2024-01-24 14:00:00', 1, 20, 17),
(32, '2024-01-24 20:00:00', 1, 22, 23),
(33, '2024-01-24 16:00:00', 1, 24, 21);

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `vip_seats` int NOT NULL,
  `premuim_seats` int NOT NULL,
  `basic_seats` int NOT NULL,
  `img` int DEFAULT NULL,
  `city` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `Name`, `Address`, `capacity`, `vip_seats`, `premuim_seats`, `basic_seats`, `img`, `city`) VALUES
(1, 'ALASSANE OUATTARA D’EBIMPE', 'Ebimpé', 60012, 3012, 9000, 48000, 30, 1),
(2, 'LA PAIX', 'Bouaké', 40000, 2000, 6000, 32000, 25, 2),
(3, 'STADE AMADOU GON COULIBALY', 'Korhogo', 20000, 1000, 3000, 16000, 26, 7),
(4, 'LAURENT POKOU', 'San Pédro', 20000, 1000, 3000, 16000, 27, 5),
(5, 'CHARLES KONAN BANNY', 'Yamoussoukro', 20000, 1000, 3000, 16000, 28, 4),
(6, 'STADE FÉLIX HOUPHOUËT-BOIGNy', 'ABIDJAn', 33000, 1000, 300, 29000, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `manager` int DEFAULT NULL,
  `logo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `manager`, `logo`) VALUES
(1, 'Côte d’Ivoire', 1, 3),
(2, 'Guinée-Bissau', 2, 4),
(3, 'Nigeria', 3, 1),
(4, 'Guinée équatoriale', 4, 2),
(5, 'Egypte', 5, 5),
(6, 'Mozambique', 6, 6),
(7, 'Ghana', 7, 7),
(8, 'Cap-Vert', 8, 8),
(9, 'Sénégal', 9, 9),
(10, 'Gambie', 10, 10),
(11, 'Cameroun', 11, 11),
(12, 'Guinée', 12, 12),
(13, 'Algérie', 13, 13),
(14, 'Angola', 14, 14),
(15, 'Burkina Faso', 15, 15),
(16, 'Mauritanie', 16, 16),
(17, 'Tunisie', 17, 17),
(18, 'Namibie', 18, 18),
(19, 'Mali', 19, 19),
(20, 'Afrique du Sud', 20, 20),
(21, 'Maroc', 21, 21),
(22, 'Tanzanie', 22, 22),
(23, 'RDC', 23, 23),
(24, 'ZambiE', 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int NOT NULL,
  `matche` int DEFAULT NULL,
  `user` int DEFAULT NULL,
  `serialnumber` varchar(255) DEFAULT NULL,
  `category` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `matche`, `user`, `serialnumber`, `category`, `created_at`, `modified_at`) VALUES
(1, 25, 1, '25165970bfe4a2178.81873592', 1, '2024-01-04 19:50:22', '2024-01-04 19:50:22'),
(2, 25, 1, '25165970bfe4a2178.81873592', 2, '2024-01-04 19:50:22', '2024-01-04 19:50:22'),
(3, 25, 1, '25165970bfe4a2178.81873592', 3, '2024-01-04 19:50:22', '2024-01-04 19:50:22'),
(4, 25, 1, '25165970bfe4a2178.81873592', 3, '2024-01-04 19:50:22', '2024-01-04 19:50:22'),
(5, 25, 1, '25165970c021890f1.91504722', 1, '2024-01-04 19:50:26', '2024-01-04 19:50:26'),
(6, 25, 1, '25165970c021890f1.91504722', 2, '2024-01-04 19:50:26', '2024-01-04 19:50:26'),
(7, 25, 1, '25165970c021890f1.91504722', 3, '2024-01-04 19:50:26', '2024-01-04 19:50:26'),
(8, 25, 1, '25165970c021890f1.91504722', 3, '2024-01-04 19:50:26', '2024-01-04 19:50:26'),
(9, 25, 1, '25165970c0ca1ba99.69940810', 1, '2024-01-04 19:50:36', '2024-01-04 19:50:36'),
(10, 25, 1, '25165970c0ca1ba99.69940810', 2, '2024-01-04 19:50:36', '2024-01-04 19:50:36'),
(11, 25, 1, '25165970c0ca1ba99.69940810', 3, '2024-01-04 19:50:36', '2024-01-04 19:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `role` int DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrols`
--

CREATE TABLE `userrols` (
  `id` int NOT NULL,
  `rolename` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userrols`
--

INSERT INTO `userrols` (`id`, `rolename`) VALUES
(1, 'admin'),
(2, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matche`
--
ALTER TABLE `matche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_ibfk_1` (`manager`),
  ADD KEY `teams_ibfk_2` (`logo`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_ibfk_1` (`role`);

--
-- Indexes for table `userrols`
--
ALTER TABLE `userrols`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `matche`
--
ALTER TABLE `matche`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrols`
--
ALTER TABLE `userrols`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `manager` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`logo`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `userrols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
