-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2024 pada 15.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunadmin`
--

CREATE TABLE `akunadmin` (
  `Username` varchar(16) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akunadmin`
--

INSERT INTO `akunadmin` (`Username`, `Password`) VALUES
('adminproject@gma', '12345678'),
('NaylaZeanlita', '$2y$10$lbf8Nyq1bxpbH'),
('Nayla', '$2y$10$qsxUMerQ7i/FF'),
('lulu', '$2y$10$sK1KGYEWoYW2H'),
('mahasiswa', '$2y$10$oAw25vFiRfiYZZQQC1MM8eqjUs.yQ619VA1NoG.VD7/8CiCuiEDWe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunuser`
--

CREATE TABLE `akunuser` (
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `budgetoroject`
--

CREATE TABLE `budgetoroject` (
  `id` int(11) NOT NULL,
  `nama proyek` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `budget` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materialproject`
--

CREATE TABLE `materialproject` (
  `id` int(11) NOT NULL,
  `nama proyek` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongoingproject`
--

CREATE TABLE `ongoingproject` (
  `id` int(11) NOT NULL,
  `nama proyek` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ongoingproject`
--

INSERT INTO `ongoingproject` (`id`, `nama proyek`, `category`, `lokasi`, `status`) VALUES
(1, 'Tol Cisumdawu', 'Street', 'Cirebon-Sumedang-Dawuan', 'In Progress'),
(3, 'Widening Pantura Highway', 'Street', 'Cirebon-Brebes', 'Planning'),
(4, 'South Ring Road', 'Street', 'Bandung', 'On Hold'),
(5, 'Tol Trans Sumatra ', 'Street', 'Lampung-Palembang', 'In Progress'),
(6, 'Road Rehabilitation', 'Street', 'Garut-Tasikmalaya', 'Planning'),
(7, 'Tol Serang-Panimbang', 'Street', 'Serang-Panimbang', 'In Progress'),
(8, 'Improvement Village Road', 'Street', 'Bogor Regency', 'Completed'),
(9, 'Bridge IKN-Balikpapan', 'Bridge', 'Penajam-Balikpapan', 'Completed'),
(10, 'Tol Yogya-Solo', 'Street', 'Yogyakarta-Surakarta', 'Planning'),
(11, 'Port Access', 'Street', 'Tanjung Priok', 'On Hold'),
(12, 'YIA Airport Access', 'Street', 'Kulon Progo', 'In Progress'),
(13, 'Jabodetabek LRT Bridge', 'Bridge', 'Jakarta-Bogor', 'On Hold'),
(14, 'Sudirman Pedestrian Bridge', 'Bridge', 'Central Jakarta', 'Completed'),
(15, 'Mahakam River Bridge', 'Bridge', 'Samarinda ', 'Completed'),
(16, 'Kapuas River Bridge', 'Bridge', 'Pontianak', 'In Progress'),
(17, 'Sukabumi Suspension Bridge', 'Bridge ', 'Sukabumi', 'In Progress'),
(18, 'Red Heritage Bridge', 'Bridge', 'Surabaya', 'On Hold\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progressproject`
--

CREATE TABLE `progressproject` (
  `id` int(11) NOT NULL,
  `nama proyek` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `descib` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `projectrecommendation`
--

CREATE TABLE `projectrecommendation` (
  `ID` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `RecommendationDate` date NOT NULL,
  `Recommendation` varchar(100) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Images` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `projectrecommendation`
--

INSERT INTO `projectrecommendation` (`ID`, `User`, `RecommendationDate`, `Recommendation`, `Category`, `Images`) VALUES
(1, 'lulu', '2024-10-16', 'xryjvhbjrzfdtvg jbyv ubybfbyucderxfvyg', 'Infrastruktur Lainnya', NULL),
(2, 'lulu', '2024-10-16', 'xryjvhbjrzfdtvg jbyv ubybfbyucderxfvyg', 'Infrastruktur Lainnya', NULL),
(3, 'nay', '2024-10-16', 'demo upload file', 'Infrastruktur Lainnya', 0x696d6167652f323032342d31302d31362031302e32322e33362e6a7067),
(4, 'nay', '2024-10-16', 'demo upload file', 'Infrastruktur Lainnya', 0x696d6167652f323032342d31302d31362031302e32332e34372e6a7067),
(5, 'nay', '2024-10-16', 'demo upload file', 'Infrastruktur Lainnya', 0x696d6167652f323032342d31302d31362031302e32332e35352e6a7067),
(6, 'nay', '2024-10-16', 'demo upload file', 'Infrastruktur Lainnya', 0x696d6167652f323032342d31302d31362031302e32342e34342e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `projectreview`
--

CREATE TABLE `projectreview` (
  `ID` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `ReviewDate` date NOT NULL,
  `Rating` varchar(255) NOT NULL,
  `Review` varchar(100) NOT NULL,
  `Images` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `projectreview`
--

INSERT INTO `projectreview` (`ID`, `User`, `ReviewDate`, `Rating`, `Review`, `Images`) VALUES
(3, '0', '2024-10-12', '★5 Excellent', 'test', NULL),
(4, '0', '2024-10-12', '★5 Excellent', 'test', NULL),
(9, '0', '2024-10-18', '★4 Very Good', '2kli', NULL),
(10, 'nay', '2024-11-01', '★1 Poor', '3kali', NULL),
(11, 'da', '2024-10-04', '★5 Excellent', 'sADfAFCSC', NULL),
(12, 'da', '2024-10-04', '★5 Excellent', 'sADfAFCSC', NULL),
(13, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', 0x75706c6f6164732f),
(14, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', 0x75706c6f6164732f),
(15, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', 0x75706c6f6164732f),
(16, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', 0x75706c6f6164732f),
(17, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', 0x75706c6f6164732f),
(18, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', NULL),
(19, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', NULL),
(20, 'sisi', '2024-10-16', '★3 Good', 'gifvtyfghvyiy', NULL),
(21, 'sisi', '2024-10-16', '★1 Poor', 'vza csXOSUIXBus', NULL),
(22, 'sisi', '2024-10-16', '★1 Poor', 'vza csXOSUIXBus', NULL),
(23, 'sisi', '2024-10-16', '★1 Poor', 'vza csXOSUIXBus', NULL),
(24, 'sisi', '2024-10-16', '★1 Poor', 'vza csXOSUIXBus', NULL),
(25, 'sisi', '2024-10-16', '★1 Poor', 'vza csXOSUIXBus', 0x696d6167652f323032342d31302d31362030392e33362e35382e6a706567),
(26, 'nay', '2024-10-16', '★5 Excellent', 'demo up file', 0x696d6167652f323032342d31302d31362031352e31322e34302e706e67),
(27, 'nay', '2024-10-16', '★5 Excellent', 'demo up file', 0x696d6167652f323032342d31302d31362031352e31322e35372e706e67),
(28, 'nay', '2024-10-16', '★2 Fair', 'demo up file', 0x696d6167652f323032342d31302d31362031352e31332e32392e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `budgetoroject`
--
ALTER TABLE `budgetoroject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materialproject`
--
ALTER TABLE `materialproject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongoingproject`
--
ALTER TABLE `ongoingproject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progressproject`
--
ALTER TABLE `progressproject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `projectrecommendation`
--
ALTER TABLE `projectrecommendation`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `projectreview`
--
ALTER TABLE `projectreview`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `budgetoroject`
--
ALTER TABLE `budgetoroject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `materialproject`
--
ALTER TABLE `materialproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ongoingproject`
--
ALTER TABLE `ongoingproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `progressproject`
--
ALTER TABLE `progressproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `projectrecommendation`
--
ALTER TABLE `projectrecommendation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `projectreview`
--
ALTER TABLE `projectreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
