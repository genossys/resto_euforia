-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 10:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skr_resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_17_072130_tb_master', 1),
(4, '2019_06_17_073025_relasi_tb_master', 1),
(5, '2019_06_17_082914_tb_transaksi', 1),
(6, '2019_06_17_153147_relasi_transaksi', 1),
(7, '2019_06_18_191317_triger_user', 1),
(8, '2019_06_18_201745_add_url_foto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_belanja`
--

CREATE TABLE `tb_belanja` (
  `id` int(10) UNSIGNED NOT NULL,
  `noTrans` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `subTotal` bigint(20) NOT NULL DEFAULT '0',
  `diskon` bigint(20) NOT NULL DEFAULT '0',
  `urlBukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kdKategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaKategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kdKategori`, `namaKategori`) VALUES
('Makanan', 'Makanan'),
('Minuman', 'Minuman'),
('PKW', 'Pakaian Khusus Wanita'),
('Snack', 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(10) UNSIGNED NOT NULL,
  `noTrans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdProduct` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` bigint(20) NOT NULL DEFAULT '0',
  `diskon` bigint(20) NOT NULL DEFAULT '0',
  `checkout` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `tb_member`
--
DELIMITER $$
CREATE TRIGGER `ADmember` AFTER DELETE ON `tb_member` FOR EACH ROW BEGIN
                   DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.username;
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BImember` BEFORE INSERT ON `tb_member` FOR EACH ROW BEGIN
                   INSERT INTO `tb_user` (`email`, `username`, `password` , `hakAkses` , `noHp`, `created_at`, `updated_at`) VALUES (NEW.email, NEW.username, NEW.password, 'customer' , NEW.nohp ,NEW.created_at, NEW.updated_at);
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `kdProduct` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaProduct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdKategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdSatuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaJual` bigint(20) NOT NULL DEFAULT '0',
  `diskon` bigint(20) NOT NULL DEFAULT '0',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo` enum('Y','T') COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlFoto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`kdProduct`, `namaProduct`, `kdKategori`, `kdSatuan`, `hargaJual`, `diskon`, `deskripsi`, `promo`, `urlFoto`, `created_at`, `updated_at`) VALUES
('KD001', 'Nama Product 1 asdbiiausbd aisdhiusa dhiuahs dihu', 'Snack', 'PCS', 12500, 0, 'Deskripsi Nama Product 1', 'T', '1.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD002', 'Nama Product 2', 'PKW', 'PCS', 10000, 0, 'Deskripsi Nama Product 2', 'T', '2.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD003', 'Nama Product 3', 'Snack', 'PCS', 125000, 10000, 'Deskripsi Nama Product 3', 'T', '3.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD004', 'Nama Product 4', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 4', 'Y', '4.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD005', 'Nama Product 5', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 5', 'Y', '5.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD006', 'Nama Product 6', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 6', 'Y', '1.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD007', 'Nama Product 7', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 7', 'Y', '2.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD008', 'Nama Product 8', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 8', 'Y', '1.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD009', 'Nama Product 9', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 9', 'Y', '4.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD010', 'Nama Product 10', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 8', 'Y', '1.jpg', '2019-06-19 21:11:56', '2019-06-19 21:11:56'),
('KD011', 'Nama Product 11', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 11', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD012', 'Nama Product 12', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 12', 'T', '3.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD013', 'Nama Product 13', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 13', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD014', 'Nama Product 14', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 14', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD015', 'Nama Product 15', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 15', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD016', 'Nama Product 16', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 16', 'T', '5.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD017', 'Nama Product 17', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 17', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD018', 'Nama Product 18', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 18', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD019', 'Nama Product 19', 'Makanan', 'PCS', 500000, 0, 'Deskripsi Nama Product 19', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD020', 'Nama Product 20', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 2', 'Y', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD021', 'Nama Product 21', 'Snack', 'PCS', 12500, 0, 'Deskripsi Nama Product 21', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD022', 'Nama Product 22', 'Minuman', 'PCS', 10000, 0, 'Deskripsi Nama Product 22', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD023', 'Nama Product 23', 'Snack', 'PCS', 125000, 10000, 'Deskripsi Nama Product 23', 'T', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD024', 'Nama Product 24', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 24', 'Y', '4.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD025', 'Nama Product 25', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 25', 'Y', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD026', 'Nama Product 26', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 26', 'Y', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD027', 'Nama Product 27', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 27', 'Y', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD028', 'Nama Product 28', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 28', 'Y', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31'),
('KD029', 'Nama Product 29', 'Makanan', 'PCS', 50000, 0, 'Deskripsi Nama Product 29', 'Y', '1.jpg', '2019-06-19 22:26:31', '2019-06-19 22:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `kdSatuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaSatuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`kdSatuan`, `namaSatuan`) VALUES
('BOX', 'BOX'),
('DUS', 'DUS'),
('PCS', 'PCS'),
('PKT', 'PAKET');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakAkses` enum('customer','admin','pimpinan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `noHp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `hakAkses`, `noHp`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$JlpRSrwJxJfsNsOPwLBUwOI840i3JBjDDrMNZbzk/GtjwBg0KD.7.', 'admin', '08941747', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_belanja_notrans_unique` (`noTrans`),
  ADD KEY `tb_belanja_username_index` (`username`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kdKategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_keranjang_notrans_index` (`noTrans`),
  ADD KEY `tb_keranjang_username_index` (`username`),
  ADD KEY `tb_keranjang_kdproduct_index` (`kdProduct`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_member_username_unique` (`username`),
  ADD UNIQUE KEY `tb_member_email_unique` (`email`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`kdProduct`),
  ADD KEY `tb_product_kdkategori_index` (`kdKategori`),
  ADD KEY `tb_product_kdsatuan_index` (`kdSatuan`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`kdSatuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_belanja`
--
ALTER TABLE `tb_belanja`
  ADD CONSTRAINT `usernamebelanja_ifk` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `kdproductkeranjang_ifk` FOREIGN KEY (`kdProduct`) REFERENCES `tb_product` (`kdProduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noTranskeranjang_ifk` FOREIGN KEY (`noTrans`) REFERENCES `tb_belanja` (`noTrans`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usernamekeranjang_ifk` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `usernamemember_ifk` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `kdkategoriproduk_ifk` FOREIGN KEY (`kdKategori`) REFERENCES `tb_kategori` (`kdKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kdsatuanproduk_ifk` FOREIGN KEY (`kdSatuan`) REFERENCES `tb_satuan` (`kdSatuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
