-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2024 at 08:34 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstorage21360859049`
--

-- --------------------------------------------------------

--
-- Table structure for table `Calisanlar`
--

CREATE TABLE `Calisanlar` (
  `CalisanID` int(11) NOT NULL,
  `KullaniciAdi` int(11) NOT NULL,
  `Sifre` varchar(255) NOT NULL,
  `Adi` varchar(100) DEFAULT NULL,
  `Soyadi` varchar(100) DEFAULT NULL,
  `CalismaBirimi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Calisanlar`
--

INSERT INTO `Calisanlar` (`CalisanID`, `KullaniciAdi`, `Sifre`, `Adi`, `Soyadi`, `CalismaBirimi`) VALUES
(1, 1001, 'password123', 'Ahmet', 'Yılmaz', 'Yazılım Geliştirme'),
(2, 1002, 'password', 'Ayşe', 'Kaya', 'Test Mühendisliği'),
(3, 1003, 'passwordmehmet', 'Mehmet', 'Demir', 'Proje Yönetimi'),
(4, 1004, 'password1004', 'Elif', 'Şahin', 'Tasarım'),
(5, 1005, 'passwordali', 'Ali', 'Çelik', 'Destek'),
(6, 1006, 'kemerli15', 'Zehra', 'Akturk', 'IT'),
(7, 1007, 'kemerli15', 'ali', 'aktan', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `Gorevler`
--

CREATE TABLE `Gorevler` (
  `GorevID` int(11) NOT NULL,
  `ProjeID` int(11) DEFAULT NULL,
  `CalisanID` int(11) DEFAULT NULL,
  `GorevAciklamasi` text DEFAULT NULL,
  `Durum` enum('Bekliyor','Devam Ediyor','Tamamlandi') NOT NULL,
  `BaslangicTarihi` date DEFAULT NULL,
  `BitisTarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Gorevler`
--

INSERT INTO `Gorevler` (`GorevID`, `ProjeID`, `CalisanID`, `GorevAciklamasi`, `Durum`, `BaslangicTarihi`, `BitisTarihi`) VALUES
(10, 1, 3, 'Müşteri ilişkileri yönetim sistemi geliştirme projesi', 'Bekliyor', '2024-05-26', '2024-05-31'),
(11, 1, 1, 'Kullanıcı arayüzünü geliştirme', 'Devam Ediyor', '2024-01-10', '2024-03-15'),
(12, 1, 2, 'Test senaryolarını yazma', 'Bekliyor', '2024-03-01', '2024-04-01'),
(13, 2, 3, 'Proje planlaması ve takibi', 'Devam Ediyor', '2024-02-05', '2024-08-31'),
(14, 1, 4, 'Müşteri Tablosu Bakımı', 'Bekliyor', '2024-05-18', '2024-05-12'),
(15, 1, 4, 'tablo bakımı', 'Bekliyor', '2024-05-17', '2024-05-11'),
(16, 2, 4, 'Proje Durum Raporu', 'Bekliyor', '2024-05-25', '2024-06-08'),
(17, 1, 4, 'aba', 'Devam Ediyor', '2024-05-25', '2024-07-05'),
(18, 2, 4, 'abanan', 'Devam Ediyor', '2024-05-23', '2024-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `Projeler`
--

CREATE TABLE `Projeler` (
  `ProjeID` int(11) NOT NULL,
  `ProjeAdi` varchar(255) NOT NULL,
  `ProjeAciklamasi` text DEFAULT NULL,
  `BaslangicTarihi` date DEFAULT NULL,
  `BitisTarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Projeler`
--

INSERT INTO `Projeler` (`ProjeID`, `ProjeAdi`, `ProjeAciklamasi`, `BaslangicTarihi`, `BitisTarihi`) VALUES
(1, 'CRM Sistemi', 'Müşteri ilişkileri yönetim sistemi geliştirme projesi', '2024-01-01', '2024-06-30'),
(2, 'E-Ticaret Platformu', 'Yeni nesil e-ticaret platformu geliştirme projesi', '2024-02-01', '2024-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `ToplantiOdalari`
--

CREATE TABLE `ToplantiOdalari` (
  `ToplantiOdasiID` int(11) NOT NULL,
  `OdaTipi` enum('Sunum Odasi','Ekip Calismasi Odasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ToplantiOdalari`
--

INSERT INTO `ToplantiOdalari` (`ToplantiOdasiID`, `OdaTipi`) VALUES
(1, 'Sunum Odasi'),
(2, 'Ekip Calismasi Odasi');

-- --------------------------------------------------------

--
-- Table structure for table `ToplantiRezervasyon`
--

CREATE TABLE `ToplantiRezervasyon` (
  `RezervasyonID` int(11) NOT NULL,
  `CalisanID` int(11) DEFAULT NULL,
  `ToplantiOdasiID` int(11) DEFAULT NULL,
  `RezervasyonSaati` time DEFAULT NULL,
  `RezervasyonTarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ToplantiRezervasyon`
--

INSERT INTO `ToplantiRezervasyon` (`RezervasyonID`, `CalisanID`, `ToplantiOdasiID`, `RezervasyonSaati`, `RezervasyonTarihi`) VALUES
(1, 1, 1, '14:00:00', '2024-06-01'),
(2, 2, 2, '10:00:00', '2024-06-02'),
(3, 3, 1, '11:30:00', '2024-06-03'),
(4, 3, 1, '11:30:00', '2024-05-30'),
(5, 3, 1, '11:30:00', '2024-05-30'),
(6, 3, 1, '11:30:00', '2024-05-30'),
(7, 3, 2, '16:30:00', '2024-05-10'),
(8, 2, 2, '14:52:00', '2024-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Calisanlar`
--
ALTER TABLE `Calisanlar`
  ADD PRIMARY KEY (`CalisanID`);

--
-- Indexes for table `Gorevler`
--
ALTER TABLE `Gorevler`
  ADD PRIMARY KEY (`GorevID`),
  ADD KEY `ProjeID` (`ProjeID`),
  ADD KEY `CalisanID` (`CalisanID`);

--
-- Indexes for table `Projeler`
--
ALTER TABLE `Projeler`
  ADD PRIMARY KEY (`ProjeID`);

--
-- Indexes for table `ToplantiOdalari`
--
ALTER TABLE `ToplantiOdalari`
  ADD PRIMARY KEY (`ToplantiOdasiID`);

--
-- Indexes for table `ToplantiRezervasyon`
--
ALTER TABLE `ToplantiRezervasyon`
  ADD PRIMARY KEY (`RezervasyonID`),
  ADD KEY `CalisanID` (`CalisanID`),
  ADD KEY `ToplantiOdasiID` (`ToplantiOdasiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Calisanlar`
--
ALTER TABLE `Calisanlar`
  MODIFY `CalisanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Gorevler`
--
ALTER TABLE `Gorevler`
  MODIFY `GorevID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Projeler`
--
ALTER TABLE `Projeler`
  MODIFY `ProjeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ToplantiOdalari`
--
ALTER TABLE `ToplantiOdalari`
  MODIFY `ToplantiOdasiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ToplantiRezervasyon`
--
ALTER TABLE `ToplantiRezervasyon`
  MODIFY `RezervasyonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Gorevler`
--
ALTER TABLE `Gorevler`
  ADD CONSTRAINT `Gorevler_ibfk_1` FOREIGN KEY (`ProjeID`) REFERENCES `Projeler` (`ProjeID`),
  ADD CONSTRAINT `Gorevler_ibfk_2` FOREIGN KEY (`CalisanID`) REFERENCES `Calisanlar` (`CalisanID`);

--
-- Constraints for table `ToplantiRezervasyon`
--
ALTER TABLE `ToplantiRezervasyon`
  ADD CONSTRAINT `ToplantiRezervasyon_ibfk_1` FOREIGN KEY (`CalisanID`) REFERENCES `Calisanlar` (`CalisanID`),
  ADD CONSTRAINT `ToplantiRezervasyon_ibfk_2` FOREIGN KEY (`ToplantiOdasiID`) REFERENCES `ToplantiOdalari` (`ToplantiOdasiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
