-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.infinityfree.com
-- Waktu pembuatan: 26 Jan 2025 pada 20.23
-- Versi server: 10.6.19-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_38023539_portfolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'password123', '2025-01-01 15:23:47'),
(3, 'aliyyul', 'faef6b50dd925fc5319810ad004096f4', '2025-01-01 15:30:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_replied` tinyint(1) DEFAULT 0,
  `reply` text DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `user_id`, `name`, `email`, `message`, `created_at`, `is_replied`, `reply`, `message_id`) VALUES
(4, 1, 'aliyyul', 'anjay@gmail.com', 'hai aku munif', '2025-01-01 15:49:56', 1, 'iya hai munif', NULL),
(13, 1, 'Test Name', 'test@example.com', 'Test message', '2025-01-02 00:48:49', 1, 'okee baik', NULL),
(23, 1, 'Aliyyul Munif', 'anjay@gmail.com', 'haalo', '2025-01-02 02:50:40', 1, 'halo', NULL),
(24, 1, 'klklklklkl', 'napaspositif@gmail.com', 'sdgsgsg', '2025-01-02 03:13:56', 1, 'bcvbcb', NULL),
(25, 1, 'gjghj', 'anjay@gmail.com', 'jhgjhgjg', '2025-01-02 04:12:47', 1, 'hgjgj', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
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
-- Dumping data untuk tabel `portfolio`
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
(41, 'Retable Grapix Poster ', 'Retable Grapix Poster ', 'IMG_20240205_101801_198.jpg', '2025-01-03 14:01:53', 'Poster'),
(42, 'Sales Poster', 'Sales Poster', 'IMG_20250103_210321.jpg', '2025-01-03 14:05:11', 'Poster'),
(43, 'Sales Poster', 'Sales Poster', 'IMG_20250103_210359.jpg', '2025-01-03 14:05:33', 'Poster');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, '12345678', '$2y$10$USWwRzKSG0K7mVXtr4rjHuQ9AjZJ.RimNtYeoksh8ObeSX7vxfxFC', '2025-01-01 15:22:54'),
(4, '123456789', '$2y$10$iLO5q/P/PGXFEbGVt/mf2ODkuUC/LIUEDbFtoC43hnOsfeOKSMT1i', '2025-01-02 05:08:44'),
(21, 'zz', '$2y$10$3U0ha9YdBarodcWq9k.pVeoVP61yTw9itPwMNtRiofFiHMZfvo7w2', '2025-01-02 23:22:50'),
(22, 'Ali', '$2y$10$cxiqG6MQyXK7zp6q7Axd0eGaEK8T4z9Awl0lF4KjtbZtk2K8gkr1a', '2025-01-02 23:40:28'),
(23, 'ulinnuhehe', '$2y$10$gLKwRNtSilaIVQb27XhLCOGITMrDZI286ZkV4Dr0XKXDO7VytpL9u', '2025-01-03 00:57:13'),
(24, 'Alif', '$2y$10$dGS211Jtl2FMZlYi6DRejuEbInSvsoMH2b6DciTohuAipQOvlDSv2', '2025-01-03 00:59:56'),
(25, 'Yonixc', '$2y$10$qGO88QKv06sOz3ecrudlR.eH087nOi/effx/OfAvtrFdhhNafSAbW', '2025-01-03 01:01:29'),
(26, 'Bgs', '$2y$10$wJOSr2v3ABzBQ6IvIs78MuQMAilaxMWystXIHCrcHEzaHZfV0mGBO', '2025-01-03 01:12:47'),
(27, 'Ariandy', '$2y$10$ZK20nXWLQNwNzAegdZ.kqeJHiIwS07qrKaYZwSAevw2OvTnPMwzTu', '2025-01-03 03:41:34'),
(28, 'Mzkishr', '$2y$10$ZC99lLG8bDUWmlrEFlkYWuffe2fVFOxh7zfThJiooMs2EsRUWE2mC', '2025-01-03 03:45:57'),
(29, 'aliyyul', '$2y$10$dziinWlSHpVrPY0ZgNh1vOfNMf7hKmznDYzV5uB3kN35HF3L0eHhC', '2025-01-03 03:48:21'),
(30, 'Kontolodon', '$2y$10$tEv/.3I13YjYYt2/ATfYH.0O2RMdshidMlN/xAqgktKKMQ9mEnCpK', '2025-01-03 04:09:22'),
(31, 'marsada ', '$2y$10$7DP2Xu3WnVEviqKMV2SJx.Be92Wb7C4T4IsyL.WeZ88w3lxuc54/G', '2025-01-03 04:12:36'),
(32, 'Nandy hasan', '$2y$10$iBEfgDzBVeYwky34.WMf0e8Ah5c41unMpaqUS0vTpeM1Qdwy0m80e', '2025-01-03 04:48:32'),
(33, 'wildanfirmanagung', '$2y$10$eVRRZbjwimfoQ2ZE6tKQdeEZ1YbJoMWPhUJr903vzutgDQNRBsmoa', '2025-01-03 05:31:56'),
(34, 'wildanfirmanagung', '$2y$10$6NDArWFumTayZ9oW2epnCuIuwwF2c4Vb5k6QgYZgWWYzuEAgpj7ee', '2025-01-03 05:32:11'),
(35, 'wildanfirmanagung', '$2y$10$sFBUrdR/O4Tl6pkEv4AdUunMKg8oRdOiteogO8FGGAHG.j7/AM0f6', '2025-01-03 05:32:57'),
(36, 'dafur', '$2y$10$IEl9wFhg0roJa1d6bWsFF.ygmzIlNCB/8l0qjREaZP1gHyUYXFyOi', '2025-01-03 07:14:42'),
(37, 'Nogh', '$2y$10$.wrHUlhAxyZNUcUgIIcgGuR3kLDaozAugKL44ksP6vv.QVzvXt.EW', '2025-01-03 09:05:02'),
(38, 'lukman', '$2y$10$e7/jvtruvlSA6F/zYyoDOedTqmjtoXOGV1tkzFIrRsCnmdsCQqVDy', '2025-01-12 06:09:29'),
(39, 'Munif', '$2y$10$tdM.n04rhxHoh3mUdBH93esBwMKxpmPKUVB/y4/ynmI5E2rWj0b2G', '2025-01-13 06:07:11'),
(40, 'Nandy09', '$2y$10$KMGCTZYo3pSPEsGXBFI7iOWCdG1QLumAXZNSgZhOR6JM.0sc3Kyri', '2025-01-13 11:40:05'),
(41, 'bengkelmobilsms', '$2y$10$LqRC41G54NLe6Y24NriaZOPtlVAkf8DTEeOt8brEQjUGyL4RiqTRa', '2025-01-15 08:10:04'),
(42, '12345678', '$2y$10$XIhIj0EhLj4Q6iQ5sg7BDeZAE/BX.kiYGqVXyRFyGrRKLGVQ3x18i', '2025-01-16 04:23:56'),
(43, 'Anjayyyy', '$2y$10$5OmXfF7WDzJEQIMz39UojeNituMtMiJIcllwIpJqorERAXi0WZCxq', '2025-01-16 04:27:16'),
(44, 'Kok', '$2y$10$yOHKVDDV3EdiQI6LZZOjTenLYM0GMhRxQdWFORUizewbwTBSTyODC', '2025-01-16 04:28:11'),
(45, 'ali', '$2y$10$rB.hpQ.iYB1AKT3lDPVjNOXOVSvXbyeuuWLyVoAzpom.Ucp26zlVe', '2025-01-16 04:33:37'),
(46, 'coa', '$2y$10$Ir6.RsG0hv7/JqjV6mxg/.DX4yLSk147s8t2U23K14SyPacl7AMGq', '2025-01-23 11:00:20'),
(47, 'munif', '$2y$10$674aQ0tA9lAFXHdXHMbsl.eOfAu5/hJGwbaNUFoamVAQqX4Yttvgu', '2025-01-25 03:20:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_messages_ibfk_1` (`user_id`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
