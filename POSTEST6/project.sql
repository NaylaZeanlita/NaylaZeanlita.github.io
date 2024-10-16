-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2024 pada 10.09
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
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akunadmin`
--

INSERT INTO `akunadmin` (`Username`, `Password`) VALUES
('adminproject@gma', '12345678');

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
(2, 'lulu', '2024-10-16', 'xryjvhbjrzfdtvg jbyv ubybfbyucderxfvyg', 'Infrastruktur Lainnya', NULL);

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
(25, 'sisi', '2024-10-16', '★1 Poor', 'vza csXOSUIXBus', 0x696d6167652f323032342d31302d31362030392e33362e35382e6a706567);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `projectrecommendation`
--
ALTER TABLE `projectrecommendation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `projectreview`
--
ALTER TABLE `projectreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
