-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 12:35 PM
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
('2304597874359807', 'Novita Kristina', 'novita', '$2y$12$Y06FHTsD.WZwBhMZWNzCcuP5i9GpeFPAhe/QPTwZT/1aQWOwyMyq6', '085809347598'),
('2837450982374592', 'Ni Kadek Silvia', 'silvi', '$2y$12$nJ67umJCRF5UPc7J/6hAzeAINHr4CMxT85FC4z.1RJe9/RINVkv/C', '085859303379'),
('4398572093475927', 'Yogi Leo Lopo', 'leo', '$2y$12$rmYiv/q1w3HR.D.sUm5HiOTCG3EADTobLtJQpqUozPLHPtkYp3aP.', '085278035443'),
('7290384509275757', 'Gung Inten', 'inten', '$2y$12$oPH1QdLp/c1i/wRkxKjCtekcFgf.rIEwEUMgzm4mpJt7u3ZiXB8ii', '081645798369'),
('7584100003743986', 'Hatta Afdillah Syahfar', 'hatta', '$2y$12$sJvKpjH0e.5zxeaJf5f.ReRiTKS3VQvC/8WTg0BzdgnGVR/.j4D2W', '085534798856479'),
('7584100003743987', 'Darma Yuda', 'yuda', '$2y$12$phkuo3KKNaceUMgc3TEC5.9wkVRbePySflz1CqPba8AwvtAK9qV3a', '085250437878'),
('7778483275490239', 'Riski Saputra', 'iki', '$2y$12$X76Ovmay5prztfd1UFHsTu1FhisnYVV5YIRl9lWxNPqLzRWC6q136', '085857583458'),
('7779435793825093', 'Chandra Tri Wijaya', 'wen', '$2y$12$Ovoxs898MFcLzmO0eN3EyuX4fAmA2EPN25oX0xXXtS9G445TocRoe', '085534625783'),
('7878324698324956', 'Bima Tri Aji Prasetya', 'aji', '$2y$12$UsXRHd5WAagIQfr7/I695.Jhhal3t8VS1AFCuzsyoYPXiiroLHO4i', '085584397598034'),
('8834020038745098', 'I Putu Andika Teguh', 'teguh', '$2y$12$c5kD9Pw5E2JJNdljHCEQ8Oy7tw6j311hxNl8PdoRg8YjQlCYqZYZ6', '085777489395'),
('8884457434829563', 'Kadek Rama Surya', 'rama', '$2y$12$bp40A9.wmmWsqC/0s5SJieCP3FNxaTxpjzpPnK3MOMP9Nog6paqEG', '085567344875'),
('8888349750238475', 'Padma Eka Putra', 'padma', '$2y$12$16aNg1KM36u4j/Ju6ASXmOn6HUr32vlXWygIycXGflbtdsZgpo3a2', '085554382789'),
('9827345079457029', 'Gung Krisnanda', 'gungkris', '$2y$12$WdFAqi3BrrSQ3SrlyXljCuUthtIpKqheb82ZH0snol5/fn6/qrUeq', '085780594270594');

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
('LPRID18AB4CB', '1586083772', '7584100003743986', 'Dengan Hormat,\r\n\r\nSalam sejahtera untuk kita sekalian, sering do\'a semoga kita semua selalu sehat walafiat dan senantiasa dalam lindungan Allah SWT. Dalam melaksanakan tugas dan aktivitas keseharian kita. Amin.Sehubungan dengan pengambil alihan lahan masyarakat menjadi lahan hutan tanaman industri (HTI) kami tidak akan keberatan akan tetapi yang menjadi pertanyaan dan juga sebagai aduan adalah proses atau realisasi pembayaran lahan sudah tidak sesuai dengan hasil sosialisasi yang di lakukan oleh pihak perusahaan yang mengelola Hutan Tanaman Industri (HTI) Pada saat sosialisasi yang di sampaikan adalah bahwa setiap lahan masyarakat yang masuk pada kawasan HTI akan di hargai dengan uang sebesar Rp. 450.000 perhektarnya.\r\nAkan tetapi pada saat proses pembayaran perusahaan membayar lahan masyarakat termasuk lahan saya di bayar hanya 9 Hektar dari keseluruhan lahan milik saya sebesar 23,5 H. Jadi luas lahan yang di gelapkan adalah 14,5 H. Bedasarkan permasalahan yang saya alami di atas maka saya merasa sudah di tipu dan di rugikan oleh pihak-pihak yang sudah masuk di dalamya. Dalam hal ini saya merasa sudah di tipu dan di rampok oleh pihak - pihak atas oknum-oknum yang memanfaatkan kebodohan saya. Oleh sebab itu saya mengadu pada Dewan Perwakilan Rakyat untuk mendapatkan kembali hak saya yang harus di penuhi oleh Perusahaan HTI. Demikian aspirasi aduan saya sampaikan berharap mendapatkan solusi dari DPRD Kab. Gorontalo.\r\n\r\nTerima Kasih.', NULL, '1'),
('LPRID477217B', '1586946765', '7779435793825093', 'Pak,\r\n\r\nKalau ada yang laporin saya tentang penipuan di bedugul, jangan percaya pak. Saya di permainkan orang itu. Tolong pak tangkap orang yang sembarangan lapor saya.', NULL, '1'),
('LPRID582BEC9', '1586356823', '4398572093475927', 'Halo pemerintah,\r\n\r\nSaya mau lapor pak, sebulan yang lalu saya beli gitar di toko online. Nyampe nya lama banget kira kira 3 minggu baru nyampe. Awalnya sih saya udh seneng pas kiriman saya udh dateng. Tapi kesenangan saya tidak bertahan lama, barang yang saya beli tidak sesuai dengan yang saya pesan. Gitarnya jelek sekali yang dikirim, tidak sesuai dengan gambar yang ada di toko online tersebut.\r\n\r\nJadi saya hubungi penjualnya tapi tidak di jawab. Saya telpon tidak diangkat, saya email tidak dibalas, saya kirim sms tidak punya pulsa. Ini alamat toko onlinenya: https://www.tokopedia.com/iramamusicstore/yamaha-gitar-silent-slg200s-slg-200s-200-s-akustik-elektrik. Jadi saya minta tolong, saya merasa dirugikan (kurang lebih 7 Juta hilang). Saya butuh keadilan.\r\n\r\nSalam,\r\nYogi Leo', 'LPRID582BEC9.jpg', '1'),
('LPRID5FAD971', '1586743432', '2304597874359807', 'Pak, saya mau melapor\r\n\r\nKemari waktu saya jalan jalan ke bedugul, ada orang yang dateng tawarin saya untuk membeli produknya. Awalnya sih saya ngg mau, tapi karena dia memaksa saya terus, jadi saya terpaksa beli. Produk ini berupa sampo yang katanya bikin kulit kepala saya jadi dingin (adem). Harganya juga relatif mahal, dari 500 ribu sampai 2 jutaan.\r\n\r\nSepulangnya saya dari bedugul, saya coba sampo yang baru saja saya beli. Awalnya sih emang sejuk rasanya, tapi lama lama rambut saya jadi warna putih. Saya sudah ke dokter untuk konsultasi masalah ini, trus katanya ini semua gara gara sampo yang saya beli waktu lalu. Jadi saya mohon bantuannya pak, tangkap orang yang di bedugul itu pak. Ciri ciri: tingginya sekitar 165 cm, matanya agak sipit, kulitnya putih, logatnya orang jawa gitu. Tolong ya pak.\r\n\r\nTerima kasih.', NULL, '1'),
('LPRID60D16EF', '1586434883', '7584100003743987', 'Halo,\r\n\r\nSaya mau melapor tentang kejadian aneh pak. Jadi gini pak, kamarin ada yang baru pindahan dari jawa. Dia tetangga baru saya, dan dia datang kerumah saya bawa makanan sebagai tanda perkenalan sesama penghuni perumahan saya. Beberapa hari terakhir, setiap malam dari jam 11 sampai jam 1 itu selalu ada suara berisik yang ada di belakang rumah saya. Awalnya sih saya kira itu cuma kucing, tapi kok suaranya kayak geraman anjing rabies dan suara langkah kakinya seperti kuda. Itu berlangsung selama 1 bulan lebih.\r\n\r\nKarena saking penasarannya, suatu malam saya keluar untuk mencari sumber suara itu, ternyata di ada di depan. Pas saya udh di depan, kagetnya bukan main. Seketika sekujur tubuh saya kaku, merinding, pucat melihat itu. Seperti anjing dengan bentuk kaki yang aneh. Hampir dibuatnya saya pingsan. Sebelum saya lari balik ke dalam rumah, saya sempet foto mahluknya. Setelah kejadian itu, saya langsung lari sekencang kencangnya ke dalam rumah saya. Jadi intinya, tolong cari tau tentang tetangga saya ini pak. Saya merasa tidak nyaman selama ini.\r\n\r\nTerima kasih.', 'LPRID60D16EF.jpg', '1'),
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
('PTGS6396EFD', 'Ilham Surya Sukmanjaya', 'olak', '$2y$12$jBNlbGkvllyFYPYolRw6jO5cYrXaW6dTcdZ2DOk2WWz2/8yM7E1YC', '085784326598', '2'),
('PTGSA686F33', 'Aldi Pradana', 'pradana', '$2y$12$srw6S.cgmyV2bNSG7YGwMefs90bXRrXqOYh9g3u.52/Xv.SNlan4m', '085723984570', '2'),
('PTGSBCC908E', 'Ni Putu Ksari Purnamayani', 'ksari', '$2y$12$hFlYn5TYlDKMLvCc68cSLutr7a4dleg8C.C.J3FUCrDnlFAUt1EDC', '085823479', '2'),
('PTGSBCC908F', 'I Putu Fredika Putra', 'redtra', '$2y$12$qFcTtYN2q7b6YAaP2V0npOuAGDBhmU.4xfzMlGwXXV7X1ZjF62upq', '085829303379', '1'),
('PTGSBCC9D8E', 'Muqqoroba Lada Sattar', 'ladasattar', '$2y$12$Hi71Po7OsKIIAtJgSD9f7uiFUojmI/BYvrsPZJEdC/XakUio9k8AC', '08507398455757', '2');

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
('TGPN055AF74', 'LPRID582BEC9', '1586360078', 'Baik yogi leo, kami segera menghubungi polisi, aparat keamanan, bahkan tni untuk melakukan proses penggledahan pada penjual tersebut. Terima kasih atas laporannya. Mohon untuk menunggu instruksi selanjutnya.', 'PTGS54C347E'),
('TGPN0BBB550', 'LPRID18AB4CB', '1586355219', 'Ok kak hatta, kami akan memproses masalah ini. Terima kasih telah melaporkan hal ini kepada kami. Tunggu informasi selanjutnya ya.', 'PTGSBCC908F'),
('TGPN2849C4A', 'LPRIDD05BCAD', '1586083149', 'Halo Hatta, kami telah membaca keluh kesah anda. Untuk itu, kami akan membantu menyelidiki kasus ini. Terima kasih atas laporannya. Salam Admin', 'PTGSBCC908F'),
('TGPN2D1B4C1', 'LPRID477217B', '1586947250', 'Loh, bukannya anda yang .....', 'PTGSBCC908F'),
('TGPN47B8B3E', 'LPRIDD05BCAD', '1586089265', 'Baik, petugas kami telah menemukan pelakunya siapa. Ternyata dia istri bapak. Kami sudah membawanya ke kantor polisi. Mohon untuk konfirmasi ke kantor polisi ya. Salam Petugas', 'PTGSBCC9D8E'),
('TGPN4F6BB48', 'LPRID0BAC54A', '1586161283', 'Baik dek silvi, kakak akan langsung laporkan kepada polisi agar kasus ini bisa di tangani. Cepat sembuh ya. Salam Petugas', 'PTGSBCC9D8E'),
('TGPN7A01E31', 'LPRID582BEC9', '1586360377', 'Saya turut sedih mendengar ceritanya kak leo, kami akan bekerja semaksimal mungkin untuk mengatasi masalah ini, jadi jangan sedih ya. Kami akan membantu kak leo sampai masalahnya tuntas.', 'PTGSBCC908E'),
('TGPN7ECE6D1', 'LPRID60D16EF', '1586871231', 'Kami telah menyelidiki kasus horor ini, tapi kami tidak menemukan bukti yang aneh menurut kami. Apakah foto itu benar? Kami perlu bukti keaslian foto itu, maka dari itu kami butuh anda untuk mendatangi kantor LAPOR! untuk memberikan keterangan lebih tentang hal ini.', 'PTGS54C347E'),
('TGPNBE93A4B', 'LPRID5FAD971', '1586870919', 'Ok novita, kami akan memeriksa kawasan bedugul, silahkan untuk menunggu hasil dari penyelidikan kami.', 'PTGSA686F33'),
('TGPNBF35F9B', 'LPRID60D16EF', '1586742589', 'Baik pak darma, kami akan menyelidiki kasus horor ini. Silahkan bapak laporkan terus aktivitas aneh yang ada di sekitar bapak. Tetap selalu berjaga jaga pak, sapa tau di bawah kasur bapak ada......', 'PTGSA686F33');

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
