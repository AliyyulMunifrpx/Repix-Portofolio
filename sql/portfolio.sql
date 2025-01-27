-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 02:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `description`, `image`, `created_at`, `category`) VALUES
(18, 'MVN Logo', 'Logo for MVN Academy', 'WhatsApp Image 2025-01-02 at 10.21.17 (1).jpeg', '2025-01-02 05:14:14', 'Logo'),
(19, 'MVN Academy Logo', 'MGM Academy Logo', '20240827_170939.jpg', '2025-01-02 07:58:05', 'Logo'),
(20, 'Sandy Walsh posters ', 'Sandy Walsh poster, digital imaging style', 'IMG-20241215-WA0003.jpg', '2025-01-02 07:59:35', 'Poster'),
(21, 'Poster Maarten paes', 'Cool Maarten paes poster', 'IMG-20241020-WA0005.jpg', '2025-01-02 08:00:14', 'Poster'),
(22, 'Marcelino Ferdinand poster', 'Marcelino Ferdinand poster', 'IMG-20241018-WA0023.jpg', '2025-01-02 08:00:47', 'Poster'),
(23, 'Oratmangoen poster', 'Ragnar Oratmangoen poster', 'IMG-20241017-WA0011.jpg', '2025-01-02 08:01:27', 'Poster'),
(24, 'posters of Kevin Diks, Ragnar Oratmangoen, and Jay Idzes', 'cool poster of 3 Indonesian national team players sitting togethercool poster of 3 Indonesian national team players sitting together', 'IMG-20241124-WA0020.jpg', '2025-01-02 08:05:21', 'Poster'),
(25, 'Nuzulul Qur\'an ', 'poster to commemorate Nuzulul Qur\'an Day ', '20240327_190501.jpg', '2025-01-02 08:07:26', 'Poster'),
(26, 'Sales poster', 'Poster to sell shoe products', '20240314_125620.jpg', '2025-01-02 08:07:19', 'Poster'),
(27, 'Ramadan poster', 'Poster for greetings for the month of Ramadan', '20240306_213036.jpg', '2025-01-02 08:08:21', 'Poster'),
(28, 'Zakat poster', 'Poster to invite Muslims to carry out their obligations, namely giving zakat fitrah in the month of Ramadan', '20240125_155140.jpg', '2025-01-02 08:14:04', 'Poster'),
(29, 'Sales poster', 'Poster to promote sandal products', '20230701_002316.jpg', '2025-01-02 08:11:58', 'Poster'),
(30, 'Head to head poster', 'Head to head Mahdi al Humaidan vs Calvin Verdonk', 'WhatsApp Image 2025-01-02 at 10.19.15.jpeg', '2025-01-02 23:51:14', 'Poster'),
(31, 'Eid Al Adha Poster', 'Eid Al Adha Poster\r\n', 'WhatsApp Image 2025-01-02 at 10.19.16 (1).jpeg', '2025-01-02 23:52:14', 'Poster'),
(32, 'Repix Logo', 'Repix is â€‹â€‹a company that offers graphic design services including logos, posters, and even websites ', '20250103_065944.jpg', '2025-01-03 00:04:43', 'Logo'),
(33, 'El Watota Logo', 'El Watota is a religious music group in Indonesia which is known as a group that uses traditional musical instruments.', '20250103_070108.jpg', '2025-01-03 00:09:29', 'Logo'),
(34, 'M Parfume Logo', 'M Parfume is a shop that sells various perfume products ', '20250103_070256.jpg', '2025-01-03 00:07:44', 'Logo'),
(35, 'Solution Works Logo', 'Solution Works is a service in the field of home improvement to provide solutions to your home building problems', '20250103_071531.jpg', '2025-01-03 00:18:16', 'Logo'),
(36, 'Arsitetika Logo', 'Architectural is a company that provides services for building construction', '20250103_071203.jpg', '2025-01-03 00:20:54', 'Logo'),
(37, 'Indonesia National Team poster', 'Indonesia National Team poster', 'WhatsApp Image 2025-01-02 at 10.19.17 (1).jpeg', '2025-01-03 13:41:34', 'Poster'),
(38, 'EId Mubarak Poster', 'EId Mubarak Poster', 'WhatsApp Image 2025-01-02 at 10.19.17.jpeg', '2025-01-03 13:42:06', 'Poster'),
(39, 'Indonesia National Team Poster', 'Indonesia National Team Poster', '20240426_223605.jpg', '2025-01-03 14:28:09', 'Poster'),
(41, 'Retable Grapix Poster ', 'Retable Grapix Poster ', 'IMG_20240205_101801_198.jpg', '2025-01-03 14:01:53', 'Poster');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
