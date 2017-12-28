-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 01:24 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpw_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(75) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image_url`, `price`, `stock`) VALUES
(1, 'buku gambar', 'buku gambar adalah buku yang dapat digunakan oleh anak anak untuk menggambar', 'image/items/drawing-books-250x250.jpg', 5000, 15),
(2, 'Pensil Warna', 'Faber-Castell Watercolour Pencils dengan warna-warni indah yang dapat menjadi \"lukisan cat air\" seketika apabila disapukan dengan kuas. Gabungkan teknik mewarnai pensil dengan cat air untuk membuat hasil karya yang kreatif\r\n\r\nPensil warna yang dapat berubah menjadi cat air apabila disapukan dengan kuas basah\r\nAman untuk anak-anak\r\nSisa rautan dapat dipakai untuk mewarnai kembali', 'image/items/7540622_0999e62a-df69-4cdb-8c0a-d175d90453c6_300_492.jpg', 25000, 15),
(3, 'Meja Belajar', 'The Olive House - Meja Belajar Steel\r\ndengan design minimalis yang memberikan kesan rapi pada ruangan. Kedua laci dengan pola gelombang yang menambah nilai estetika pada produk. Material dipilih dari bahan besi yang berkualitas agar bisa tahan lama. Dilengkapi dengan rel laci untuk mempermudah buka / tutup laci. ', 'image/items/3371725_8ed2b701-adb1-4062-ba35-920ef1f922a8_448_583.png', 500000, 5),
(4, 'Papan Dart', 'Papan dart ukuran besar 17\"\r\n\r\nBonus 6 buah jarum dart', 'image/items/9216389_7add3452-3a67-46d5-a0b5-a9be277169cc_700_700.jpg', 100000, 15),
(5, 'Piring Makan', '* Saat ini yang tersedia hanya warna HIJAU\r\n*Pada saat pemesanan, tolong sertakan warna alternatif jika warna yang dipesan tidak tersedia.\r\n* Warna akan diberikan random/acak jika tidak ada keterangan.', 'image/items/8241059_c41941fa-8fbd-4c3d-afca-e81d7e941561_1200_1200.jpg', 15000, 100),
(6, 'Sendok Besi', 'DINNER SPOON BIMA SERI RHINO 1 SET ISI 6 STAINLESS / SENDOK MAKAN\r\n\r\n*Harga untuk 1 set isi 6', 'image/items/8906585_ae85a769-fd25-4512-b349-3d30d5d7e1ec_2048_0.jpg', 30000, 100),
(7, 'Gelas IKEA', '- Cocok untuk makanan pesta dan sehari-hari. Dibuat dari plastik tahan lama dan aman digunakan di mesin cuci piring dan microwave.\r\n- Dapat ditumpuk untuk menghemat ruang saat disimpan.', 'image/items/22052827_f87172e2-00d1-4c47-a43e-405d1a575360.jpg', 50000, 65);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `full_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`, `phone`, `status`) VALUES
(1, 'umarkotak', 'umarkotak', 'm umar ramadhana', 'umarkotak@yahoo.co.id', '0852', 'admin'),
(2, 'firman', 'umarkotak', 'firman giri f', 'firman@yahoo.com', '0853', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
