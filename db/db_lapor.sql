-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 02:02 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lapor`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addMasyarakat` (`NIK` CHAR(16), `Name` VARCHAR(35), `Username` VARCHAR(25), `Password` VARCHAR(32), `Telp` VARCHAR(15))  INSERT INTO masyarakat VALUES(NIK, Name, Username, Password, Telp)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('09847810001', 'Muqqoroba Lada Sattar', 'lada', '$2y$12$bKV3xT2HZ8t5bsQKI1rqfufAaOTy.i0kD5O6PRPQ9hO4ClVDMMF8u', '0857252862'),
('12347810001', 'Riski Saputra', 'riski', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '08507325488'),
('35747810001', 'Ridwan Wisnu', 'wawan', '$2y$12$bKV3xT2HZ8t5bsQKI1rqfufAaOTy.i0kD5O6PRPQ9hO4ClVDMMF8u', '085761253786'),
('60987810001', 'Andika Teguh', 'teguh', '$2y$12$ZWYBW3lcNmd47dlDFlmI9O799V4AiKxWSvU5msWdIboeU74AHU21a', '08529364785'),
('61027810001', 'I Putu Fredika Putra', 'redtra', '$2y$12$mRD1K2POyOLokq/mkVZG7edtphgV8NX17On/GbVlCwdZV8tarXo8.', '085829303379'),
('61837810001', 'Moch Faruq', 'faruq', '$2y$12$iPXHSj2vNQVVPqdaJuUymO2nmaf6bzTLyleY589I4DoWDDCywcUYi', '0858372763'),
('62317910001', 'Darma Yuda', 'yuda', '$2y$12$v2sGs9yTLOZg6J2WvF.AUu601p8.7wWabL1erUxyer0aOhRyOqP7m', '08534587347'),
('62347810001', 'Padma Eka', 'padma', '$2y$12$iT2sCZ0Gcxszpfmgu6EOre7LuZ5uvPHANihaoaDYa5iVQy0fGeAPy', '0857634985'),
('62789810001', 'Novita Kristina', 'novita', '$2y$12$1uDneD41oAeMT93/yhRO.u0NyGwclNeriV5GfgHy/klLZYn8zYElK', '085347978324'),
('62987810001', 'Made Adidwipayana', 'dwipa', '$2y$12$bKV3xT2HZ8t5bsQKI1rqfufAaOTy.i0kD5O6PRPQ9hO4ClVDMMF8u', '089553726387'),
('63647810001', 'Aldi Pradana', 'aldi', '$2y$12$R8e3qZDFe8ehhAfnT5C/oO5yHnHCIdbzXg9b8P4Hw.TbhHaTFfUwu', '085346788376'),
('66877810001', 'Darma Yuda', 'yuda', '$2y$12$XhR8Od0z0KaOR4id/iHF5eii8eegU3pBxqAmpyhPoz5s2PlGIJwPm', '0857238456'),
('69267810001', 'Silvia Puspita', 'silvi', '$2y$12$mRD1K2POyOLokq/mkVZG7edtphgV8NX17On/GbVlCwdZV8tarXo8.', '08580932457'),
('69817810001', 'Angga Pratista', 'pratista', '$2y$12$WRuVCC8S.FpwqXlk2hPD5OQyQx4EfvoOWgZoCeoHGUIOkkniVUkS6', '0853276457832'),
('69877810001', 'Rama Surya', 'rama', '$2y$12$bEZv5kuAN70Qb69KytqxheoVfvpuJTYRph1kcz.YrY1/3Yr1RK.qu', '0859463278'),
('87447810001', 'Ilham Surya Sukmanjaya', 'olak', '$2y$12$qOGM6rL1Ow1ILKtFD9P06OLOFVXn3tzoL1ppXB6oJLt/gngTcjcMy', '0818734678'),
('88834810001', 'Hatta Afdillah Syahfar', 'hatta', '$2y$12$MSBd4IjgMbjDmkXDv3l.7umsmxMLFaXXWJPi0uNaPhKKhv7MtDcfy', '0850275839');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` varchar(50) NOT NULL,
  `tgl_pengaduan` varchar(50) NOT NULL,
  `nik` int(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `subjek`, `isi_laporan`, `foto`, `status`) VALUES
('LPRID1345074', '1582957903', 2147483647, 'Perusahaan minyak melakukan kecurangan', 'Saya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaretSaya sedang belanja di indomaret', NULL, '0'),
('LPRID1A3C84A', '1582964601', 2147483647, 'PLN Mengganggu', 'Tolong pindahkan kabel listrik yang ada di atas rumah saya, karena itu sanggat mengganggu!', 'LPRID1A3C84A.jpg', '0'),
('LPRID293A41D', '1582981122', 2147483647, 'saya sedang !@#$%^&*() <script> makan dil uar', 'saya sedang !@#$%^&*() <script> makan dil uar  fjsdal jk;sfdsla fjk;d', NULL, '0'),
('LPRIDA09BB6E', '1582981205', 2147483647, 'saya sedang !@#$%^&*() <script> makan dil uar', 'saya sedang !@#$%^&*() <script> makan dil uar', NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `FK_pengaduan_masyarakat` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
