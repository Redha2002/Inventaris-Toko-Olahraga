-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 10:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `sisa_barang` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Terjual','Belum terjual') NOT NULL DEFAULT 'Terjual'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `kode_barang`, `sisa_barang`, `tanggal_keluar`, `status`) VALUES
(27, 'C002', 3, '2022-08-17', 'Terjual'),
(28, 'A001', 8, '2022-08-17', 'Terjual'),
(29, 'C001', 2, '2022-08-17', 'Terjual'),
(30, 'C002', 10, '2022-08-18', 'Terjual'),
(31, 'B002', 10, '2022-08-20', 'Terjual');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurangBarang` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
update data_barang 
SET jumlah_stok = jumlah_stok - new.sisa_barang
where kode_barang = new.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_masuk` date NOT NULL,
  `status` enum('Belum dipesan','Sudah dipesan') NOT NULL DEFAULT 'Sudah dipesan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_transaksi`, `kode_barang`, `nama_supplier`, `jumlah`, `tanggal_pemesanan`, `tanggal_masuk`, `status`) VALUES
(35, 'C002', 'Dedi', 12, '2022-08-17', '2022-08-24', 'Sudah dipesan'),
(36, 'A002', 'Andika', 5, '2022-08-17', '2022-08-24', 'Sudah dipesan'),
(37, 'A001', 'Andika', 20, '2022-08-17', '2022-08-24', 'Sudah dipesan'),
(38, 'A004', 'Lavera Conveksi', 15, '2022-08-17', '2022-08-24', 'Sudah dipesan'),
(39, 'B001', 'Susanti', 20, '2022-08-17', '2022-08-24', 'Sudah dipesan'),
(40, 'C001', 'Hadii', 21, '2022-08-17', '2022-08-24', 'Sudah dipesan'),
(41, 'C003', 'Susanti', 40, '2022-08-18', '2022-08-25', 'Sudah dipesan'),
(42, 'A003', 'Dedi', 50, '2022-08-18', '2022-08-25', 'Sudah dipesan'),
(43, 'B003', 'Lavera Conveksi', 15, '2022-08-18', '2022-08-25', 'Sudah dipesan'),
(44, 'B002', 'Lavera Conveksi', 15, '2022-08-18', '2022-08-25', 'Sudah dipesan'),
(45, 'C002', 'Lavera Conveksi', 12, '2022-08-18', '2022-08-25', 'Sudah dipesan');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambahBarang` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
update data_barang 
SET jumlah_stok = jumlah_stok + new.jumlah
where kode_barang = new.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_stok_barang` int(11) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_stok_barang`, `kode_barang`, `nama_barang`, `jumlah_stok`) VALUES
(2, 'A002', 'Bola Basket', 5),
(4, 'A001', 'Bola Kasti', 12),
(8, 'A004', 'Bola Volly', 15),
(11, 'B001', 'Baju Bola', 20),
(12, 'B002', 'Baju Basket', 5),
(13, 'B003', 'Baju Volly', 15),
(14, 'C001', 'Sarung Tangan Kiper', 19),
(15, 'C002', 'Tali Sepatu', 12),
(16, 'A003', 'Raket Badminton', 50),
(19, 'C003', 'Kaos Kaki', 40);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(3, 'Susanti', 'Jl. Baypass, Padang', '082294307265'),
(4, 'Budi', 'Jl. Puri Indah Jakarta Barat', '085234567354'),
(5, 'Andika', 'Jl.Kertapati, Palembang', '084577821223'),
(6, 'Dedi', 'Jl. Bandar Buat, Lubuk Kilangan Kota Padang', '085263845379'),
(9, 'Lavera Conveksi', 'Jl. Sawah Dalam IV, Padang', '081385419041'),
(12, 'Hadii', 'Lubuk Lingau', '089845132456');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `hak_akses` enum('A','K') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, 'redha', '123', 'K'),
(2, 'pemilik', '123', 'A'),
(3, 'karyawan', '123', 'K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_stok_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_stok_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
