-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 08:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelangikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` char(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(255) NOT NULL,
  `role` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `nama`, `telp`, `username`, `password`, `role`) VALUES
('211', 'admin1', '088933198806', 'admin1', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_jenis`
--

CREATE TABLE `data_jenis` (
  `id_jenis` int(10) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jenis`
--

INSERT INTO `data_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Perorangan'),
(2, 'Pelelang'),
(3, 'Koperasi');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `lelang_id` char(20) NOT NULL,
  `pelelang_id` char(20) DEFAULT NULL,
  `produk` varchar(40) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `harga_awal` double DEFAULT NULL,
  `harga_minimal_diterima` double DEFAULT NULL,
  `incremental_value` double DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `harga_beli_sekarang` double DEFAULT NULL,
  `metode_bayar` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `panitia_id` char(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`lelang_id`, `pelelang_id`, `produk`, `deskripsi_produk`, `image1`, `image2`, `image3`, `image4`, `harga_awal`, `harga_minimal_diterima`, `incremental_value`, `tgl_mulai`, `tgl_selesai`, `harga_beli_sekarang`, `metode_bayar`, `status`, `panitia_id`, `keterangan`, `jumlah`) VALUES
('LL-2022-00001', 'PL-2022-00001', 'Ikan Mas Jumbo', 'Ikan mas jumbo paling berkualitas se Indonesia Raya', 'ikanmas1.jpg', 'ikannila1.jpg', 'ikannila1.jpg', 'ikannila1.jpg', 10000, 20000, 134000, '2022-09-07 02:10:00', '2022-09-17 01:09:00', 100000, 0, 1, 'PN-2022-00002', 'OK', 0),
('LL-2022-00004', 'PL-2022-00004', 'Ikan Koi', 'Ikan koi jumbo gaes', 'koi.jpg', 'cupang.jpg', 'cupang.jpg', 'cupang.jpg', 10000000, 25000000, 500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 600000, 0, 1, NULL, 'Monggo Bos', 4),
('LL-2022-00005', 'PL-2022-00005', 'Ikan Cupang', 'Ikan cupang pemenang lomba tingkat RT', 'cupang.jpg', 'louhan.jpg', 'louhan.jpg', 'louhan.jpg', 100000, 300000, 1000, '2022-07-05 10:23:55', '2022-07-14 10:23:55', 7200, 0, 0, NULL, 'Monggo di tawar nggeh 777 HHH Jihad ', 72),
('LL-2022-00006', 'PL-2022-00006', 'Ikan Louhan', 'Ikan louhan termahal dimuka bumi', 'louhan.jpg', 'toman.jpg', 'toman.jpg', 'toman.jpg', 1000000000, 3000000000, 1000, '2022-09-01 14:20:00', '2022-09-03 14:20:00', 2000, 0, 1, NULL, 'Sudah', 2),
('LL-2022-00007', 'PL-2022-00007', 'Ikan Toman', 'Ikan toman sehat dan bergizi', 'toman.jpg', 'image2-07-09-20221662525503.jpg', 'image3-07-09-20221662525503.jpg', 'image4-07-09-20221662525503.jpg', 9000, 1000, 1000, '2022-09-09 23:36:00', '2022-09-16 11:37:00', 9000, NULL, 0, NULL, 'ok', 2),
('LL-2022-00008', 'PL-2022-00005', 'Ikan Sapu-Sapu', 'Halal Bos', 'image1-19-09-20221663592135.jpg', 'image2-19-09-20221663592135.jpg', 'image3-19-09-20221663592135.jpg', 'image4-19-09-20221663592135.jpg', 25000, 30000, 2000, '2022-09-19 00:00:00', '2022-09-28 00:00:00', 45000, NULL, 1, NULL, 'Buruan', 2),
('LL-2022-00011', 'PL-2022-00003', 'Ikan Lele Dumbo', 'Ikan lele pemenang lomba tingkat dunia?', 'lele.jpg', 'lele.jpg', 'koi.jpg', 'koi.jpg', 100000, 200000, 2000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40000000, 0, 0, NULL, '', NULL),
('LL-2022-00024', 'PL-2022-00024', 'Ikan Nila Merah', 'Ikan nila merah dengan kualitas terbaik sedunia Halal', 'ikannila1.jpg', 'lele.jpg', 'lele.jpg', 'lele.jpg', 30000, 30000, 30000, '2022-09-01 13:11:00', '2022-09-02 13:13:00', 30000, 0, 1, 'PN-2022-00004', 'OKOK Bang', 12);

-- --------------------------------------------------------

--
-- Table structure for table `lelang_bid`
--

CREATE TABLE `lelang_bid` (
  `bid_id` int(11) NOT NULL,
  `lelang_id` char(20) DEFAULT NULL,
  `peserta_id` char(20) DEFAULT NULL,
  `tgl_bid` datetime DEFAULT NULL,
  `harga_tawar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang_bid`
--

INSERT INTO `lelang_bid` (`bid_id`, `lelang_id`, `peserta_id`, `tgl_bid`, `harga_tawar`) VALUES
(1, 'LL-2022-00015', 'PSY-2022-00015', '2022-08-23 09:00:00', 11000),
(2, 'LL-2022-00022', 'PSY-2022-00022', '2022-08-23 09:02:00', 15000),
(3, 'LL-2022-00001', 'PSY-2022-00005', '2022-08-23 13:24:00', 17000),
(4, 'LL-2022-00001', 'PSY-2022-00005', '2022-08-23 13:25:00', 21000),
(5, 'LL-2022-00002', 'PSY-2022-00005', '2022-08-23 13:26:47', 60000),
(6, 'LL-2022-00003', 'PSY-2022-00005', '2022-08-23 13:27:00', 200000),
(7, 'LL-2022-00001', 'PSY-2022-00005', '2022-08-23 13:26:00', 30000),
(8, 'LL-2022-00002', 'PSY-2022-00005', '2022-08-23 13:27:00', 120000),
(22, 'LL-2022-00022', 'PSY-2022-00022	', '2022-10-03 05:58:00', 18990);

-- --------------------------------------------------------

--
-- Table structure for table `lelang_pembayaran`
--

CREATE TABLE `lelang_pembayaran` (
  `lelang_id` char(20) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `nominal_dibayarkan` double DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `panitia_id` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang_pembayaran`
--

INSERT INTO `lelang_pembayaran` (`lelang_id`, `tgl_pembayaran`, `nominal_dibayarkan`, `bukti_pembayaran`, `panitia_id`) VALUES
('LL-2022-00002', '2022-09-05', 69000, 'pembayaran.png', 'PN-2020-00001'),
('LL-2022-00004', '2022-09-04', 69000, 'pembayaran.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lelang_pemenang`
--

CREATE TABLE `lelang_pemenang` (
  `lelang_id` char(20) NOT NULL,
  `peserta_id` char(20) DEFAULT NULL,
  `tgl_diumumkan` datetime DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `provinsi_kirim` varchar(30) DEFAULT NULL,
  `kota_kirim` varchar(30) DEFAULT NULL,
  `kecamatan_kirim` varchar(30) DEFAULT NULL,
  `kelurahan_kirim` varchar(30) DEFAULT NULL,
  `alamat_kirim` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `konfirmasi_terimaproduk` int(11) DEFAULT NULL,
  `testimoni_pemenang` text DEFAULT NULL,
  `panitia_id` char(20) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang_pemenang`
--

INSERT INTO `lelang_pemenang` (`lelang_id`, `peserta_id`, `tgl_diumumkan`, `bukti_bayar`, `tgl_bayar`, `provinsi_kirim`, `kota_kirim`, `kecamatan_kirim`, `kelurahan_kirim`, `alamat_kirim`, `status`, `konfirmasi_terimaproduk`, `testimoni_pemenang`, `panitia_id`, `total_bayar`) VALUES
('LL-2022-00001', 'PSY-2022-00001', '2022-09-27 02:33:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
('LL-2022-00002', 'PSY-2022-00002', '2022-08-29 10:00:00', '', '2022-08-28', 'Jawa Tengah', 'Semarang', 'Semarang Tengah', 'Pendrikan Kidul', 'Jalan Arjuna 26', 1, 0, 'Keren ikannya keliatan sehat dan gemuk banget kayak saya hehe', 'PL-2022-00001', 30000),
('LL-2022-00003', 'PSY-2022-00005', '2022-09-27 02:28:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
('LL-2022-00004', 'PSY-2022-00004', '2022-09-01 13:15:04', 'bayar.png', '2022-09-26', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 120000),
('LL-2022-00009', 'PSY-2022-00001', '2022-09-27 02:22:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
('LL-2022-00011', 'PSY-2022-00011', '2022-09-27 02:29:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lelang_pengiriman`
--

CREATE TABLE `lelang_pengiriman` (
  `pengiriman_id` char(100) NOT NULL,
  `lelang_id` char(100) NOT NULL,
  `pelelang_id` char(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_pengirim` varchar(150) DEFAULT NULL,
  `no_polisi` varchar(100) NOT NULL,
  `nama_kendaraan` varchar(150) NOT NULL,
  `no_telp_driver` int(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang_pengiriman`
--

INSERT INTO `lelang_pengiriman` (`pengiriman_id`, `lelang_id`, `pelelang_id`, `nama`, `nama_pengirim`, `no_polisi`, `nama_kendaraan`, `no_telp_driver`, `no_hp`, `status_transaksi`) VALUES
('PNG-2022-000001', 'LL-2022-00004', 'PL-2022-00004', '', 'Limbad Kribo', 'H 6969 OP', 'Toyota Alphard', 0, '08893319886', 1),
('PNG-2022-000002', 'LL-2022-00002', 'PL-2022-00002', '', 'Razman Ilahi Taala', 'H 4458 MSI', 'Panther Hino', 0, '08893319886', 0);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `panitia_id` char(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `instansi` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `jeniskel` char(1) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`panitia_id`, `nik`, `nama`, `instansi`, `jabatan`, `jeniskel`, `foto`, `username`, `password`) VALUES
('PN-2022-00001', '337653633400', 'Ali Imron ', 'KP kendal I', 'Direktur', 'L', 'assets/uploads/panitia/image1-26-09-2022-1664167183.jpg', 'imron', '123'),
('PN-2022-00002', '23232323232', 'Faris Tono ', 'KP Solo Utara', 'Direktur Molbile Legend', 'L', 'panitia2.jpg', 'test', 'coba'),
('PN-2022-00003', '33765363340', 'Anzhari M', 'KP kendal I', 'Direktur II', 'L', 'profil.png', 'anzhari', '12345678'),
('PN-2022-00004', '90909909099', 'Wahyu', 'Kejore', 'RT', 'L', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelelang`
--

CREATE TABLE `pelelang` (
  `pelelang_id` char(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis` int(11) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `norekening` varchar(20) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `atasnama` varchar(30) NOT NULL,
  `filektp` varchar(255) NOT NULL,
  `filenpwp` varchar(255) NOT NULL,
  `fileSIUP` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelelang`
--

INSERT INTO `pelelang` (`pelelang_id`, `nik`, `nama`, `jenis`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `telp`, `email`, `npwp`, `norekening`, `bank`, `atasnama`, `filektp`, `filenpwp`, `fileSIUP`, `status`, `deskripsi`, `username`, `password`) VALUES
('PL-2022-00002', '33765363340', 'Biyu ', 1, 'Jawa Tengah', 'Semarang', 'Semarang Utara', 'Bandarharjo', 'Jl. Melati', '088933198860', 'biyu@gmail.com', '02324782842430', '0084384934930', 'BRI', 'Biyu', '', '', '', 1, 'test bang cepet kkkk', 'kakros', '25d55ad283aa400af464c76d713c07ad'),
('PL-2022-00003', '3376536334', 'Novi', 1, 'Jawa Tengah', 'Semarang', 'Semarang Utara', 'Bandarharjo', 'Jl. Melati', '08893319886', 'opet@gmail.com', '0232478284243', '008438493493', 'BRI', 'Opet', 'ktp.png', 'npwp.jpg', 'siup.jpg', 1, 'test', 'opet', '12345678'),
('PL-2022-00004', '3376536334', 'Bambang', 2, 'Jawa Tengah', 'Semarang', 'Semarang Utara', 'Bandarharjo', 'Jl. Melati', '08893319886', 'bambang@gmail.com', '0232478284243', '008438493493', 'BRI', 'Bambang', 'ktp.png', 'npwp.jpg', 'siup.jpg', 1, 'test', 'bambang', '12345678'),
('PL-2022-00006', '3376536334', 'Jone', 1, 'Jawa Tengah', 'demak', 'demak utara', 'sayung', 'jl.merak', '08893319886', 'riski@gmail.com', '0232478284243', '008438493493', 'BCA', 'Jarjit', 'ktp.png', 'npwp.jpg', 'siup.jpg', 2, '', 'jsone', '12345678'),
('PL-2022-00009', '3376536334', 'Bustomi', 2, 'Jawa Tengah', 'demak', 'demak utara', 'sayung', 'jl.merak', '08893319886', 'riski@gmail.com', '0232478284243', '008438493493', 'BCA', 'Jarjit', 'ktp.png', 'npwp.jpg', 'siup.jpg', 1, 'OKOK', 'bustomi', '12345678'),
('PL-2022-00010', '3376536334', 'Nurdin Halid K', 2, 'Jawa Tengah', 'Semarang', 'Semarang Utara', 'Bandarharjo', 'Jl. Melati', '08893319886', 'nurdin@gmail.com', '0232478284243', '008438493493', 'BRI', 'Nurdin', 'image1-24-09-20221663990525.jpg', 'image2-24-09-20221663990525.jpg', 'image3-24-09-20221663990525.jpg', 1, 'jbjbjjbjbjbbbbbj', 'nurdin', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` char(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jeniskel` char(1) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `filektp` varchar(255) NOT NULL,
  `filenpwp` varchar(255) NOT NULL,
  `deposit` double NOT NULL,
  `status` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `nik`, `nama`, `jeniskel`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `telp`, `email`, `npwp`, `filektp`, `filenpwp`, `deposit`, `status`, `username`, `password`) VALUES
('PSY-2022-00001', '123', 'Purwa', 'L', 'Jawa Tengah', 'Wonosobo', 'Kertek', 'Kertek', 'Jalan Parakan 158', '085713607109', 'purwa@gmail.com', '123', 'ktp.png', 'npwp.jpg', 190000, 1, 'purwa', '25d55ad283aa400af464c76d713c07ad'),
('PSY-2022-00002', '337337337337', 'Agus', 'L', 'Jawa Tengah', 'Semarang', 'Semarang Tengah', 'Pendrikan Lor', 'Jalan Arjuna Ireng', '000', '000@gmail.com', '210920920920', 'ktp1.jpg', 'npwp.jpg', 90000, 1, 'qq', '412f0b4b3ff4653b4618df4eecdccc6e'),
('PSY-2022-00003', '22262020', 'Santo', 'L', 'Jawa Tengah', 'Jepara', 'Kepel', 'Kepel', 'JL. Ujung', '08893319886', 'santo@gmail.com', '11162020', 'ktp.png', 'npwp.jpg', 380000, 1, 'santo', 'ea07ff4e27d0bcf5f786f39e44e031f1'),
('PSY-2022-00004', '33788787878', 'Redi Alamsyah ', 'L', 'Jawa Tengah ', 'Wonosobo ', 'Watumalang  ', 'Ndero  ', 'Ndero Ngiso nlok barat no 56 jakarta selatan ', '0889331988', 'redi1@gmail.com', '1601000', 'ktp1.png', 'npwp.jpg', 70000, 1, 'redi', ''),
('PSY-2022-00005', '3376536334000', 'tono', 'P', 'Jawa Tengah', 'demak', 'demak utara', 'sayung', 'jl.merak', '08893319886', 'paniti@gmail.com', '023247828424300', 'ktp.png', 'npwp.jpg', 50000, 1, 'peserta1', '123'),
('PSY-2022-00006', '2732326536', 'imam', 'L', 'Jawa Tengah', 'Jepara', 'Kepel Utara', 'Kepel', 'Jl. Ujung', '08893319886', 'imam@gmail.com', '9090909990', 'ktp1.jpg', 'npwp.jpg', 60000, 0, 'imam', '827ccb0eea8a706c4c34a16891f84e7b'),
('PSY-2022-00007', '911911911', 'bambang', 'L', 'Jawa Tengah', '', '', '', 'Jl. Maroko', '08893319886', 'bambang@gmail.com', '911911911', 'ktp.png', 'npwp.jpg', 50000, 0, 'bambang', '25d55ad283aa400af464c76d713c07ad'),
('PSY-2022-00009', '2732326536', 'emil ', 'P', 'Jawa Tengah', 'Demak', 'Sayung', 'Demak Utara', 'Jl. Ujung', '08893319886', 'emil@gmail.com', '73827883483', '', '', 30000, 1, 'emil aja', '25d55ad283aa400af464c76d713c07ad'),
('PSY-2022-00013', '000000001', 'andi', 'L', 'Jawa tengah ', 'Semarang 0', 'Bandarharjo 0', 'Semarang Utara 0', 'Jl Pegangsaan 0', '08893319886', 'andi@gmail.com', '000000001', 'ktp.png', 'npwp.jpg', 80000, 0, 'andi12345', '6eea9b7ef19179a06954edd0f6c05ceb');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_deposit`
--

CREATE TABLE `peserta_deposit` (
  `deposit_id` int(11) NOT NULL,
  `peserta_id` char(20) NOT NULL,
  `tgl_deposit` date NOT NULL,
  `nominal_deposit` double NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `panitia_id` char(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_deposit`
--

INSERT INTO `peserta_deposit` (`deposit_id`, `peserta_id`, `tgl_deposit`, `nominal_deposit`, `bukti_pembayaran`, `status`, `panitia_id`, `keterangan`) VALUES
(1, 'PSY-2022-00001', '2022-09-04', 69000, 'bayar.png', 1, 'PN-2022-00001', 'proses bos'),
(2, 'PSY-2022-00002', '2022-09-07', 40000, 'bayar.png', 1, '', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `maks_bayar` int(11) NOT NULL,
  `maks_kirim` int(11) NOT NULL,
  `min_deposit` double NOT NULL,
  `biaya_adm` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `maks_bayar`, `maks_kirim`, `min_deposit`, `biaya_adm`) VALUES
(1, 86400, 604800, 500000, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`lelang_id`);

--
-- Indexes for table `lelang_bid`
--
ALTER TABLE `lelang_bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `lelang_pembayaran`
--
ALTER TABLE `lelang_pembayaran`
  ADD PRIMARY KEY (`lelang_id`);

--
-- Indexes for table `lelang_pemenang`
--
ALTER TABLE `lelang_pemenang`
  ADD PRIMARY KEY (`lelang_id`);

--
-- Indexes for table `lelang_pengiriman`
--
ALTER TABLE `lelang_pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`panitia_id`);

--
-- Indexes for table `pelelang`
--
ALTER TABLE `pelelang`
  ADD PRIMARY KEY (`pelelang_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indexes for table `peserta_deposit`
--
ALTER TABLE `peserta_deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lelang_bid`
--
ALTER TABLE `lelang_bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `peserta_deposit`
--
ALTER TABLE `peserta_deposit`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
