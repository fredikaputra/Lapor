-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 11:05 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('09847810001', 'Muqqoroba Lada Sattar', 'ladasattar', '$2y$12$bKV3xT2HZ8t5bsQKI1rqfufAaOTy.i0kD5O6PRPQ9hO4ClVDMMF8u', '085829303379'),
('12347810001', 'Riski Saputra', 'riski', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '08507325488'),
('22347810001', 'anoimus', 'llllada', '$2y$12$TF8GBSIRFz.w5Q2Yj1AwjujnN6zEUyRM6QBYwDWzS1vRlgsdSX8AW', '0853684905'),
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
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
('3', '1585629916', '09847810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID1345074', '1582957903', '61837810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID1A3C84A', '1582964654', '35747810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', 'LPRID1A3C84A.jpg', '1'),
('LPRID427D037', '1585923917', '09847810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID55696D5', '1584014278', '35747810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID57586B3', '1584014320', '60987810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID5AD5DD2', '1585924299', '09847810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', 'LPRID5AD5DD2.jpg', '1'),
('LPRID70A6E7A', '1584014293', '35747810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID831C69A', '1584014085', '60987810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRID8E78029', '1584014118', '61837810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRIDAD4B04B', '1584014049', '62317910001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRIDCF6F0D1', '1584014164', '35747810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRIDDADFE01', '1584089053', '35747810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRIDDBDEBE2', '1584014247', '62347810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRIDEC1321E', '1585901785', '88834810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', NULL, '0'),
('LPRIDF87A99C', '1583757331', '61027810001', 'Dengan Hormat\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.\r\nSehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI)\r\nPada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya. akan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H.\r\nBedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya.\r\nDalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI.\r\nDemikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\nTerima Kasih.', 'LPRIDF87A99C.jfif', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
('PTGS7808', 'Aldi Pradana', 'aldipradana', '$2y$12$bKV3xT2HZ8t5bsQKI1rqfufAaOTy.i0kD5O6PRPQ9hO4ClVDMMF8u', '085829303379', '2'),
('PTGS7809', 'I Putu Fredika Putra', 'fredikaputra', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '085829303379', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` varchar(50) NOT NULL,
  `id_pengaduan` varchar(50) NOT NULL,
  `tgl_tanggapan` varchar(50) NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
('TGPN0088ACB', 'LPRID5AD5DD2', '1585925262', 'sepsep', 'PTGS7809'),
('TGPN044D15D', 'LPRID1A3C84A', '1585926281', 'okok\r\n', 'PTGS7809'),
('TGPN1C7AEA4', 'LPRID5AD5DD2', '1585925238', 'ok', 'PTGS7809'),
('TGPN4293DD6', 'LPRID5AD5DD2', '1585925597', 'sepsepsepsepsepsepsepsep', 'PTGS7809'),
('TGPN5085B99', 'LPRID5AD5DD2', '1585925580', 'sepsepsepsepsepsepsepsep', 'PTGS7809'),
('TGPN5A2A2E7', 'LPRID5AD5DD2', '1585925697', '', 'PTGS7809'),
('TGPN5A961B1', 'LPRID5AD5DD2', '1585925091', 'ok', 'PTGS7809'),
('TGPN7C99EF0', 'LPRID5AD5DD2', '1585925247', 'ok', 'PTGS7809'),
('TGPN8CABFFC', 'LPRID5AD5DD2', '1585925316', 'ok', 'PTGS7809'),
('TGPN94FE138', 'LPRID5AD5DD2', '1585925571', 'sepsepsep', 'PTGS7809'),
('TGPN9D2B346', 'LPRID5AD5DD2', '1585925290', 'ok', 'PTGS7809'),
('TGPNAE434A2', 'LPRID5AD5DD2', '1585925348', 'ok', 'PTGS7809'),
('TGPNAF4DDB8', 'LPRID5AD5DD2', '1585925695', '', 'PTGS7809'),
('TGPNAF95D75', 'LPRID5AD5DD2', '1585925451', 'ok', 'PTGS7809'),
('TGPNB929174', 'LPRID5AD5DD2', '1585925296', 'ok', 'PTGS7809'),
('TGPNC63F35C', 'LPRID5AD5DD2', '1585926189', 'okok\r\n', 'PTGS7809'),
('TGPNCACAC60', 'LPRID1A3C84A', '1585926295', 'sep', 'PTGS7809'),
('TGPNCF56DED', 'LPRIDDADFE01', '1585903428', 'apa sih anj', 'PTGS7809');

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

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `FK_tanggapan_pengaduan` (`id_pengaduan`),
  ADD KEY `FK_tanggapan_petugas` (`id_petugas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `FK_pengaduan_masyarakat` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `FK_tanggapan_pengaduan` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tanggapan_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
