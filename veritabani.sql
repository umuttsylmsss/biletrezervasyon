-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 10:46 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umutsoylamis`
--

-- --------------------------------------------------------

--
-- Table structure for table `biletler`
--

CREATE TABLE `biletler` (
  `bilet_id` int(11) NOT NULL,
  `bilet_firma_id` int(11) NOT NULL,
  `bilet_kullanici` int(11) DEFAULT NULL,
  `bilet_gun` date DEFAULT NULL,
  `bilet_saat` varchar(5) DEFAULT NULL,
  `bilet_koltuk` int(11) DEFAULT NULL,
  `bilet_kalkis` varchar(250) NOT NULL,
  `bilet_varis` varchar(250) NOT NULL,
  `bilet_adi` varchar(250) NOT NULL,
  `bilet_soyadi` varchar(250) DEFAULT NULL,
  `bilet_telefon` varchar(15) NOT NULL,
  `bilet_mail` varchar(250) NOT NULL,
  `bilet_tarih` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `firmalar`
--

CREATE TABLE `firmalar` (
  `firma_id` int(11) NOT NULL,
  `firma_adi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `firmalar`
--

INSERT INTO `firmalar` (`firma_id`, `firma_adi`) VALUES
(1, 'FİRMA A'),
(2, 'FİRMA B');

-- --------------------------------------------------------

--
-- Table structure for table `il`
--

CREATE TABLE `il` (
  `il_no` int(11) NOT NULL,
  `isim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `il`
--

INSERT INTO `il` (`il_no`, `isim`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elâzığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkâri'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adi` varchar(250) NOT NULL,
  `kullanici_sifre` varchar(250) NOT NULL,
  `kullanici_tarih` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adi`, `kullanici_sifre`, `kullanici_tarih`) VALUES
(1, 'test', '123', '2024-06-06 22:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `yonetici_id` int(11) NOT NULL,
  `yonetici_adi` varchar(250) NOT NULL,
  `yonetici_parola` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yoneticiler`
--

INSERT INTO `yoneticiler` (`yonetici_id`, `yonetici_adi`, `yonetici_parola`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`bilet_id`);

--
-- Indexes for table `firmalar`
--
ALTER TABLE `firmalar`
  ADD PRIMARY KEY (`firma_id`);

--
-- Indexes for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Indexes for table `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`yonetici_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biletler`
--
ALTER TABLE `biletler`
  MODIFY `bilet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `firmalar`
--
ALTER TABLE `firmalar`
  MODIFY `firma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `yonetici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
