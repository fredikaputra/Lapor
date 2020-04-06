-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 10:24 AM
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
('2837450982374592', 'Ni Kadek Silvia', 'silvi', '$2y$12$nJ67umJCRF5UPc7J/6hAzeAINHr4CMxT85FC4z.1RJe9/RINVkv/C', '085859303379'),
('7584100003743986', 'Hatta Afdillah Syahfar', 'hatta', '$2y$12$GYSvml.PEaQG5dEg6wl3AOCvva2jMMrT1XZ/oGpOV87cwSZbbkHUm', '085534798239');

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
('LPRID0BAC54A', '1586161033', '2837450982374592', 'Kak, aku mau mengadu. Kemarin kakakku memaksa aku untuk belajar. Tapi aku melawan dia, karena belajar itu membosankan bagiku. Jadi aku pergi dari rumah selama 12 hari. Selama 12 hari, aku tinggal di rumah temanku. Dia sangat baik, dia ramah, tidak suka marah. Tiba tiba, orang tuaku menghampiriku dan memarahiku di tempat, bahkan aku di pukul bagian jariku hingga luka, sakit banget. Jadi, kak aku minta tolong kak. Tangkap kedua orang tua ku, bawa mereka masuk ke penjara. OK? \r\n\r\nTerima Kasih, Kak', 'LPRID0BAC54A.jpg', '1'),
('LPRID18AB4CB', '1586083772', '7584100003743986', 'Dengan Hormat,\r\n\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.Sehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI) Pada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya.\r\nAkan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H. Bedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya. Dalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI. Demikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\n\r\nTerima Kasih.', NULL, '0'),
('LPRIDD05BCAD', '1586079846', '7584100003743986', 'Halo pemerintah, saya mau lapor pak. Rumah saya dibakar orang pak. Saya ngga tau kenapa dia bakar rumah saya. Saya juga ngg kenal dia pak. Ini kejadiannya tadi malem pak. Pas saya lagi masak, tiba tiba ada bau hangus. Saya kira masakan saya hangus, jadi saya masak telor aja pak, karena waktu lalu saya laper banget. Tapi pas saya ke kamar anak saya. Ternyata udh kebakar semua isinya pak. Anak saya pake headset pak jadi ngg bisa liat pak, gelap. Jadi saya bawa anak saya keluar habis itu saya pukul dia karena saya marah sama dia. Ternyata anak saya bilang dia denger kayak ada yang lempar botol ke dalam kamar nya dia. Mungkin orang itu yang bakar rumah saya. Jadi mohon bantuannya pak. Saya minta #keadilan.', 'LPRIDD05BCAD.jpeg', '1');

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
('PTGS54C347E', 'Angga Pratista Ambara', 'pratista', '$2y$12$.Jgx1r6QavJ/ZBTWsLiNK.36mj2NK9IW3ty.k7FgXugwUBxf0uhWy', '0852783549', '2'),
('PTGSBCC908E', 'Ni Putu Ksari Purnamayani', 'ksari', '$2y$12$hFlYn5TYlDKMLvCc68cSLutr7a4dleg8C.C.J3FUCrDnlFAUt1EDC', '085823479', '2'),
('PTGSBCC908F', 'I Putu Fredika Putra', 'redtra', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '085829303379', '1'),
('PTGSBCC908G', 'Aldi Pradana', 'pradana', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '085829683379', '2'),
('PTGSBCC9D8E', 'Muqorroba Lada Sattar', 'ladasattar', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '085089683379', '2');

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
('TGPN2849C4A', 'LPRIDD05BCAD', '1586083149', 'Halo Hatta, kami telah membaca keluh kesah anda. Untuk itu, kami akan membantu menyelidiki kasus ini. Terima kasih atas laporannya. Salam Admin', 'PTGSBCC908F'),
('TGPN47B8B3E', 'LPRIDD05BCAD', '1586089265', 'Baik, petugas kami telah menemukan pelakunya siapa. Ternyata dia istri bapak. Kami sudah membawanya ke kantor polisi. Mohon untuk konfirmasi ke kantor polisi ya. Salam Petugas', 'PTGSBCC9D8E'),
('TGPN4F6BB48', 'LPRID0BAC54A', '1586161283', 'Baik dek silvi, kakak akan langsung laporkan kepada polisi agar kasus ini bisa di tangani. Cepat sembuh ya. Salam Petugas', 'PTGSBCC9D8E');

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
