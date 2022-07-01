-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 11:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumber_jaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_penjualan`
--

CREATE TABLE `tabel_detail_penjualan` (
  `id_detail` int(30) NOT NULL,
  `kode_penjualan` varchar(30) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_obat`
--

CREATE TABLE `tabel_obat` (
  `id_obat` int(30) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `stok` int(5) NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `bentuk` varchar(30) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `deskripsi` text,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_obat`
--

INSERT INTO `tabel_obat` (`id_obat`, `nama_obat`, `stok`, `penyimpanan`, `bentuk`, `kadaluwarsa`, `deskripsi`, `harga_beli`, `harga_jual`, `nama_pemasok`) VALUES
(1, 'Pil KB', 0, 'Rak 3', 'pil', '2022-04-19', ' Alat kontrasepsi hormonal', 7000, 8500, 'Kimia Farma'),
(2, 'Promag', 0, 'Rak 1', 'cair', '2022-07-01', 'Mengatasi sakit maag, GERD, dan perut kembung', 9000, 10000, 'Sumber Farma'),
(3, 'Strepsils Original', 100, 'Rak 2', 'tablet', '2022-06-05', 'Membantu meredakan sakit tenggorokan', 8000, 12000, 'Jaya Farma'),
(4, 'Strepsils Strawberry Sugar Fre', 12, 'Rak 3', 'tablet', '2022-07-20', 'Membantu meredakan sakit tenggorokan', 5000, 7000, 'Jaya Farma'),
(5, 'Vitamin A', 10, 'Rak 1', 'tablet', '2017-08-22', 'Mencegah dan mengobati defisiensi vitamin A', 10000, 13000, 'Jaya Farma'),
(6, 'Vitamin B1', 5, 'Rak 1', 'tablet', '2024-03-23', 'Memenuhi kebutuhan vitamin B1 dan mengobati penyakit akibat kekurangan vitamin B1', 25000, 30000, 'Sumber Farma'),
(7, 'Vitamin B12', 50, 'Rak 2', 'kapsul', '2023-06-06', 'Mengobati defisiensi vitamin B12, terutama pada penderita anemia pernisiosa', 15000, 18000, 'Kimia Farma');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pemasok`
--

CREATE TABLE `tabel_pemasok` (
  `id_pemasok` int(5) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pemasok`
--

INSERT INTO `tabel_pemasok` (`id_pemasok`, `nama_pemasok`, `alamat`, `telepon`) VALUES
(1, 'Kimia Farma', 'Taman Pondok Jati No.24, Sidoarjo', '0314564678'),
(2, 'Sumber Farma', 'Geluran', '0987654321'),
(3, 'Jaya Farma', 'Taman', '0987');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembelian`
--

CREATE TABLE `tabel_pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `kode_pembelian` varchar(15) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_beli` int(30) NOT NULL,
  `banyak` int(30) NOT NULL,
  `nama pemasok` varchar(30) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `subtotal` int(30) NOT NULL,
  `grandtotal` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengguna`
--

CREATE TABLE `tabel_pengguna` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`id_user`, `nama_user`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(10, 'Kepala Apoteker', 'kepalaapoteker@gmail.com', 'kepalaapoteker', '8e30c3e6d50e5d7c02e7eaffa5954b04d4a3afaf', 'Kepala Apoteker', '2022-07-01 09:30:49'),
(11, 'Apoteker', 'apotek@gmail.com', 'apoteker', '8e30c3e6d50e5d7c02e7eaffa5954b04d4a3afaf', 'Apoteker', '2022-07-01 09:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `kode_penjualan` varchar(30) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `grandtotal` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`kode_penjualan`, `nama_pembeli`, `tanggal_jual`, `grandtotal`) VALUES
('1f5ux3jqvg2zEdp9HRJS', 'Ye Xi Xue', '2022-06-30', 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tabel_obat`
--
ALTER TABLE `tabel_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama_obat` (`nama_obat`);

--
-- Indexes for table `tabel_pemasok`
--
ALTER TABLE `tabel_pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD UNIQUE KEY `nama_pemasok` (`nama_pemasok`);

--
-- Indexes for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD UNIQUE KEY `kode_penjualan` (`kode_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  MODIFY `id_detail` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tabel_obat`
--
ALTER TABLE `tabel_obat`
  MODIFY `id_obat` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_pemasok`
--
ALTER TABLE `tabel_pemasok`
  MODIFY `id_pemasok` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
