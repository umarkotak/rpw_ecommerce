-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 04:41 AM
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
  `orders_id` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `orders_id`, `users_id`, `items_id`, `quantity`, `total`, `status`) VALUES
(1, 1, 2, 6, 1, 25000, 'complete'),
(3, 2, 2, 9, 1, 25000, 'complete'),
(4, 2, 2, 10, 1, 22000, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image_url` varchar(75) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image_url`, `price`, `stock`) VALUES
(1, 'Tenderloin Steak', 'Karena lebih lembut, daging sapi tenderloin biasanya yang paling dicari dan harganya cenderung lebih mahal daripada sirloin. Tenderloin ini secara keseluruhan cukup sedikit disediakan sebagai salah satu fillet, yang juga kadang-kadang disebut dengan ', 'image/items/1.jpg', 25000, 100),
(2, 'Sirloin Steak', 'The sirloin steak is cut from the back of the animal. In a common U.S. butchery, the steak is cut from the rear back portion of the animal, continuing off the short loin from which T-bone, porterhouse, and club steaks are cut. The sirloin is actually', 'image/items/2.jpg', 27500, 150),
(3, 'Full Special Umar Steak', 'Daging sapi pilihan yang dipanggang dengan lembut. ditaburi saus barbeque spesial ala kantin online umar. dengan tambahan kentang yang disajikan diatas hotplate.', 'image/items/3.jpg', 33000, 65),
(4, 'Steak Cincang Ala Carte', 'Daging sapi spesial yang disajikan dalam bentuk potongan potongan kecil. bumbunga sangat meresap dengan berbagai rempah rempah. kaya ada stun stunnya gitu, dagingnya halal 1000%', 'image/items/4.jpg', 30000, 75),
(5, 'Sayur Mblenger', 'campuran sayur sayuran segar yang dipadukan dengan bumbu khas ala kaboom', 'image/items/5.jpg', 25000, 200),
(6, 'Burger KING', 'burger dengan racikan ala kantin online. ukuran amat sangat besar, dijamin anda pasti kenyang dengan memakan ini', 'image/items/6.jpg', 25000, 199),
(7, 'Indomie Bala Bala', 'merupakan campuran dari 2 indomie ayam bawang dan sate ayam. dicampur dengan bumbu bon cabe sehingga mendapatkan perpaduan rasa yang sangat hebat. tersedia dalam 5 level pedas', 'image/items/7.jpg', 15000, 100),
(8, 'Nasi Goreng Spesial', 'seperti nasi nasi lainnya, namun yang satu ini digoreng dengan bumbu daging kambing. jadi ada rasa rasa mantap nya. ditamah dengan telur mata sapi setengah matang yang meningkatkan cita rasa masakan ini', 'image/items/8.jpg', 20000, 100),
(9, 'Sushi Special', 'Sushi adalah makanan Jepang yang terdiri dari nasi yang dibentuk bersama lauk berupa makanan laut, daging, sayuran mentah atau yang sudah dimasak. Nasi sushi mempunyai rasa asam yang lembut karena dibumbui campuran cuka beras (mizkan), garam, dan gul', 'image/items/9.jpg', 25000, 249),
(10, 'Bakso Keju Spesial', 'Bakso or baso is Indonesian meatball, or meat paste made from beef surimi. Its texture is similar to the Chinese beef ball, fish ball, or pork ball. The term bakso could refer to a single meatball or the whole bowl of meatballs soup.', 'image/items/10.jpg', 22000, 99),
(11, 'Spesial Familiy Set', 'Satu set masakan sayur sayuran yang dapat anda nikmati. cukup untuk 4 orang', 'image/items/11.jpeg', 125000, 50),
(12, 'Pizza Mantab', 'Piza (atau pizza) adalah sejenis roti bundar, pipih yang dipanggang di oven dan biasanya dilumuri saus tomat serta keju dengan bahan makanan tambahan lainnya yang bisa dipilih. Keju yang dipakai biasanya mozzarella atau \"keju pizza\".', 'image/items/12.jpg', 65000, 125);

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date_created`, `total_price`) VALUES
(1, 2, 20180103, 25000),
(2, 2, 20180103, 47000);

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
(2, 'firman', 'umarkotak', 'firman giri f', 'firman@yahoo.com', '0853', 'user'),
(3, 'admin', 'admin', 'admin', 'admin@ecommerce.com', '123456789', 'admin'),
(4, 'ryan', 'umarkotak', 'iriyansya putra', 'pace@gmail.com', '123', 'user'),
(6, 'rehan', 'umarkotak', 'fahmi roihanul', 'fahmi@email.com', '53114', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
