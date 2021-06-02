-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 06:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_subcategory` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_smallprice` float(10,2) DEFAULT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category`, `product_subcategory`, `product_name`, `product_image`, `product_desc`, `product_smallprice`, `product_price`, `product_size`) VALUES
(1, '2', 'Худи', 'Худи R.Y.V.', 'images/women/Hoodie_1_R.Y.V..jpg', 'Махровый трикотаж: 90% хлопок, 10% переработанный полиэстер', NULL, 5999.00, ''),
(2, '2', 'Худи', 'Худи ADICOLOR CLASSICS', 'images/women/Hoodie_2_Adicolor_Classics.jpg', 'Махровый трикотаж: 100% хлопок', NULL, 5399.00, ''),
(4, '2', 'Свитшот', 'Свитшот Reebok Classics', 'images/women/Sweatshirt_1_Reebok_Classics_Linear_Crew.jpg', 'Материал: 80% органический хлопок / 20% полиэстер, флисовая ткань', NULL, 4699.00, ''),
(5, '2', 'Толстовка', 'Толстовка Adidas Essentials', 'images/women/Tolstovka_1_adidas_Essentials_3-Stripes.jpg', 'Футер: 53% хлопок, 36% переработанный полиэстер, 11% вискоза', NULL, 4999.00, ''),
(6, '2', 'Толстовка', 'Толстовка PARLEY', 'images/women/Tolstovka_2_PARLEY.jpg', 'Махровый трикотаж: 100% хлопок', NULL, 7999.00, ''),
(9, '1', 'Худи', 'Худи Nike Sportswear Tech Fleece', 'images/men/Hoodie_Nike_Sportswear_Tech_Fleece.jpg', 'Основа: 66% хлопок/34% полиэстер. Подкладка карманов: 100% хлопок. Подкладка капюшона: 69% хлопок/31% полиэстер.', NULL, 7799.00, ''),
(10, '1', 'Брюки', 'Спортивные брюки Nike Phenom Elite BRS', 'images/men/Trousers_1_Nike_Phenom_Elite_BRS.jpg', 'Основа: 100% нейлон. Вставки: 87% полиэстер/13% спандекс. Верхняя часть сзади: 80% полиэстер/20% спандекс. Сетка: 100% полиэстер.', NULL, 6499.00, ''),
(11, '1', 'Брюки', 'Спортивные брюки Nike Phenom Elite', 'images/men/Trousers_2_Nike_Phenom_Elite.jpg', 'Основа: 87% переработанный полиэстер/13% спандекс.Вставки: 80% полиэстер/20% спандекс.Подкладка карманов: 100% переработанный полиэстер.', NULL, 5799.00, ''),
(12, '1', 'Брюки', 'Спортивные брюки Turkey Strike', 'images/men/Trousers_3_Turkey Strike.jpg', 'Основа: 91% полиэстер/9% спандекс. Вставки: 95% полиэстер/5% спандекс. Подкладка карманов: 100% полиэстер.', NULL, 5299.00, ''),
(13, '1', 'Шорты', 'Шорты NikeCourt Dri-FIT ADV Rafa', 'images/men/Shorts_1_Nike_Sportswear.jpg', 'Махровый трикотаж: 100% хлопок', NULL, 1500.00, ''),
(14, '1', 'Шорты', 'Шорты Nike Sportswear', 'images/men/Shorts_2_NikeCourt_Dri-FIT..jpg', 'Махровый трикотаж: 100% хлопок', NULL, 1200.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
