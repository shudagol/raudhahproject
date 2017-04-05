-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Apr 2017 pada 05.51
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `english`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(23, 'Body'),
(21, 'Book'),
(24, 'Candy'),
(18, 'City'),
(22, 'Color'),
(3, 'Food'),
(6, 'Greeting'),
(20, 'Phone'),
(16, 'Place'),
(10, 'Sports'),
(9, 'Transportation'),
(19, 'Vacation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentence`
--

CREATE TABLE `sentence` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `sentence` varchar(225) NOT NULL,
  `translation` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sentence`
--

INSERT INTO `sentence` (`id`, `category`, `sentence`, `translation`, `file`, `description`) VALUES
(3, 3, 'rice', 'nasi', 'cc', 'bla bla'),
(4, 23, 'knk', 'kjkj', 'Bossanova Jawa - Alun - Alun Nganjuk.mp3', 'kjkjsks');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variant`
--

CREATE TABLE `variant` (
  `id` int(11) NOT NULL,
  `sentence` int(11) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `variant`
--

INSERT INTO `variant` (`id`, `sentence`, `variant`, `translation`, `file`, `description`) VALUES
(1, 3, 'one', 'satu', 'kok', 'angk satu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `sentence`
--
ALTER TABLE `sentence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sentence`
--
ALTER TABLE `sentence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
