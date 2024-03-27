-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2024 at 05:14 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u356562325_reliso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(63, 33, 29, 'PeanutButter_01', 200, 1, 'peanut-15.png'),
(80, 43, 33, 'PeanutButter_05', 300, 1, 'peanut-05.png'),
(81, 43, 34, 'Pickles_01', 100, 1, 'pickles-01.png'),
(126, 53, 29, 'PeanutButter_01', 200, 1, 'peanut-15.png'),
(136, 53, 31, 'PeanutButter_03', 200, 1, 'peanut-3.png'),
(137, 53, 30, 'PeanutButter_02', 200, 1, 'peanut-2.png'),
(138, 53, 44, 'Pickles_10', 100, 1, 'OIP (1).jpg'),
(139, 53, 33, 'PeanutButter_05', 300, 1, 'peanut-05.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(8, 32, 'Ritik Kumar', 'ritik151112@gmail.com', '9693882391', 'Hi, Reliso Natura. Welcome to the team.'),
(9, 32, 'Rakesh', 'rakesh@gmail.com', '989898989', 'I want to contact you.'),
(10, 33, 'Priyanshu Sharma', 'priyahsusharma72002@gmail.com', '9885268411', 'Hi how are your.'),
(11, 35, 'Ritik_user', 'ritikuser@gmail.com', '96541311221', 'How aere yoe '),
(12, 41, 'Babul Kumar', 'babull@gmail.com', '9693882391', 'This is an amazing website.'),
(13, 44, 'Love Kush', 'love@gmail.com', '9693382391', 'Hi Ritik , your website is good.'),
(16, 49, 'Kaif', 'lightweav908pp@gmail.com', '8972230855', 'Hi myself kaif');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(15, 33, 'Priyanshu Sharma', '7001595836', 'priyahsusharma72002@gmail.com', 'cash on delivery', 'flat no. Nischintapur, Budge Budge, Kolkata Nischintapur, Budge Budge, Kolkata Budge Budge, Kolkata West Bengal India - 700137', ', Pickles_01 ( 2 ), PeanutButter_01 ( 1 )', 400, '09-Jan-2023', 'completed'),
(16, 35, 'Ritik_user', '96541311221', 'ritikuser@gmail.com', 'cash on delivery', 'flat no. Nischintapur, Budge Budge, Kolkata Nischintapur, Budge Budge, Kolkata, Nischintapur, Budge Budge, Kolkata Budge Budge, Kolkata West Bengal India - 700137', ', PeanutButter_01 ( 5 ), Pickles_05 ( 4 ), PeanutButter_04 ( 1 ), Pickles_02 ( 5 ), PeanutButter_06 ( 1 )', 3250, '10-Apr-2023', 'completed'),
(17, 35, 'Ritik kumar kumar', '9693882391', 'ritik151112@gmail.com', 'cash on delivery', 'flat no. Malighat Murli Manohar Colony Muzaffarpur Malighat Murli Manohar Colony Muzaffarpur Bihar , Muzaffarpur Bihar India - 842002', ', PeanutButter_01 ( 1 ), PeanutButter_04 ( 10 )', 1700, '20-Aug-2023', 'completed'),
(18, 41, 'Babul Kumar', '9693882391', 'babull@gmail.com', 'cash on delivery', 'flat no. Malighat Murli Manohar Colony Muzaffarpur Malighat Murli Manohar Colony Muzaffarpur Bihar , Muzaffarpur Bihar India - 842002', ', PeanutButter_01 ( 1 ), Pickles_01 ( 2 ), PeanutButter_05 ( 1 ), new product ( 1 )', 3000, '20-Aug-2023', 'completed'),
(19, 44, 'Love Kush', '9693882391', 'love@gmail.com', 'cash on delivery', 'flat no. Nischintapur, Budge Budge, Kolkata, Nischintapur, Budge Budge, Kolkata Nischintapur, Budge Budge, Kolkata, Nischintapur, Budge Budge, Kolkata Budge Budge, Kolkata West Bengal India - 700137', ', PeanutButter_01 ( 1 ), PeanutButter_02 ( 2 ), Pickles_01 ( 1 ), PeanutButter_04 ( 9 )', 3850, '21-Aug-2023', 'completed'),
(20, 45, 'ashmita', '9563851021', 'ashmita0901@gmail.com', 'cash on delivery', 'flat no. bbit girl&#39;s hostel kolkata west bengal india - 713301', ', Pickles_05 ( 1 ), Pickles_02 ( 1 ), Pickles_03 ( 1 ), Pickles_06 ( 1 )', 800, '21-Aug-2023', 'completed'),
(21, 32, 'Ritik kumar kumar', '9693882391', 'ritik151112@gmail.com', 'paytm', 'flat no. Malighat Murli Manohar Colony Muzaffarpur Malighat Murli Manohar Colony Muzaffarpur Bihar , Muzaffarpur Bihar India - 842002', ', Pickles_06 ( 1 ), PeanutButter_05 ( 2 ), Pickles_02 ( 1 ), PeanutButter_04 ( 1 ), PeanutButter_01 ( 1 ), PeanutButter_02 ( 1 ), manog_01 ( 1 ), Pickles_10 ( 1 )', 3550, '21-Aug-2023', 'completed'),
(22, 46, 'ankita', '9693882391', 'ankita@gmail.com', 'cash on delivery', 'flat no. bbit bbit,GirlsHostel, room no G302 kolkata wb india - 713301', ', Pickles_01 ( 1 ), Pickles_02 ( 1 ), Pickles_03 ( 1 ), Pickles_04 ( 1 ), Pickles_10 ( 1 )', 850, '21-Aug-2023', 'completed'),
(23, 48, 'Mukund Kumar', '12221423341', 'mukund@gmail.com', 'cash on delivery', 'flat no. Nischintapur, Budge Budge, Kolkata Nischintapur, Budge Budge, Kolkata Budge Budge Institute of Technology Kolkata WEST BENGAL India - 700137', ', PeanutButter_01 ( 5 ), Pickles_01 ( 1 ), Pickles_10 ( 1 ), Pickles_03 ( 1 )', 1400, '21-Aug-2023', 'completed'),
(24, 32, 'Ritik Kumar', '919693882391', 'ritiksrivastavatrading@gmail.com', 'paytm', 'flat no. Malighat murli manohar colony  Malighat murli manohar colony  Muzaffarpur Bihar India - 842001', ', PeanutButter_02 ( 1 ), PeanutButter_01 ( 1 ), PeanutButter_05 ( 1 )', 700, '29-Aug-2023', 'completed'),
(25, 32, 'Ritik Kumar', '9693882391', 'ritik.email01@gmail.com', 'cash on delivery', 'flat no. Nischintapur, Budge Budge, Kolkata Malighat Murli Manohar Colony Muzaffarpur Budge Budge Institute of Technology Kolkata WEST BENGAL India - 700137', ', PeanutButter_02 ( 1 ), PeanutButter_01 ( 1 ), PeanutButter_05 ( 1 ), PeanutButter_04 ( 1 )', 850, '04-Sep-2023', 'completed'),
(26, 53, 'Ashutosh Rai', '9123703032', 's@gmail.com', 'paytm', 'flat no. Promact Infotech Manjalpur Vadodara Gujrat India - 390011', ', PeanutButter_04 ( 1 ), PeanutButter_05 ( 1 ), new product ( 1 ), Pickles_02 ( 1 )', 1100, '10-Feb-2024', 'completed'),
(27, 53, 'Subham Gupta', '5637499', 's@gmail.com', 'cash on delivery', 'flat no. Jdjdk Jhjj Jjjjkk Jjjj Jjj - 123456', ', PeanutButter_01 ( 1 ), Pickles_01 ( 1 ), Pickles_02 ( 1 ), Pickles_03 ( 1 )', 650, '10-Feb-2024', 'completed'),
(28, 53, 'jjgh', '523225522', '742432@gmauil.com', 'credit card', 'flat no. 453453 3553 432453 54345 3553 - 5353', ', Pickles_01 ( 1 ), Pickles_03 ( 1 ), PeanutButter_01 ( 1 ), PeanutButter_05 ( 1 ), PeanutButter_03 ( 1 ), PeanutButter_02 ( 1 )', 1200, '10-Feb-2024', 'completed'),
(29, 32, 'Ritik kumar', '123456789', 'ritik151112@gmail.com', 'cash on delivery', 'flat no. Nischintapur, Budge Budge, Kolkata West Bengal, India Malighat Murli Manohar Colony Muzaffarpur Kolkata West Bengal Kolkata India - 700137', ', PeanutButter_01 ( 1 ), Pickles_01 ( 1 ), PeanutButter_05 ( 1 )', 600, '20-Feb-2024', 'completed'),
(30, 52, 'Prince Kumar', '2300163', 'pbaba7001@gmail.com', 'cash on delivery', 'flat no. Phulaut Boys Hostel Budge Budge institute of technology, Kolkata Sanagar Bihar India - 852219', ', Pickles_10 ( 1 ), Pickles_01 ( 1 )', 200, '18-Mar-2024', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(29, 'PeanutButter_01', 'PeanutButter', 'Best in the market.', 200, 'peanut-15.png'),
(30, 'PeanutButter_02', 'PeanutButter', 'Best in the market.', 200, 'peanut-2.png'),
(31, 'PeanutButter_03', 'PeanutButter', 'Best in the market.', 200, 'peanut-3.png'),
(32, 'PeanutButter_04', 'PeanutButter', 'Best in the market.', 150, 'peanut-04.png'),
(33, 'PeanutButter_05', 'PeanutButter', 'Best in the market.', 300, 'peanut-05.png'),
(34, 'Pickles_01', 'Pickles', 'Best in the market.', 100, 'pickles-01.png'),
(35, 'Pickles_02', 'Pickles', 'Best in the market.', 150, 'pickles-02.png'),
(36, 'Pickles_03', 'Pickles', 'Best in the market.', 200, 'pickles-03.png'),
(37, 'Pickles_04', 'Pickles', 'Best in the market.', 300, 'pickles-10.png'),
(38, 'Pickles_05', 'Pickles', 'Best in the market.', 200, 'pickles-05.png'),
(39, 'Pickles_06', 'Pickles', 'Best in the market.', 250, 'pickles-06.png'),
(40, 'PeanutButter_06', 'PeanutButter', 'Best in the market.', 550, 'peanut-12.png'),
(41, 'new product', 'PeanutButter', 'Best product in the market with affordable prices and best in taste.', 500, '4800043011058.jpg'),
(43, 'manog_01', 'Pickles', 'Best product in the market.', 100, 'th.jpg'),
(44, 'Pickles_10', 'Pickles', 'Best pickles in the market at that price.', 100, 'OIP (1).jpg'),
(45, 'Mango_Pickles', 'Pickles', 'Best Pickles in the market.', 250, 'OIP.jpg'),
(47, 'Peacles_05', 'Pickles', 'Mango pickles, a quintessential condiment in many cultures, offer a delightful fusion of tanginess and spice. Made from raw mangoes, these pickles are cherished for their vibrant flavors and versatility. The tangy essence of the mangoes is complemented by a medley of spices like mustard seeds, fenugreek, and chili, which infuse each bite with a rich, aromatic zest. Whether enjoyed as a zesty accompaniment to rice dishes, a flavorful topping for sandwiches, or simply savored on their own, mango p', 500, 'img.jpg'),
(48, 'p_01', 'Pickles', 'efef', 100, 'Task 3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `user_type`, `image`) VALUES
(31, 'admin', 'admin@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'admin', 'pic-1.png'),
(32, 'user1', 'user1@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'pic-2.png'),
(33, 'Priyanshu Sharma', 'priyahsusharma72002@gmail.com', 0, '1b1296d8ec6261b523eb4c9cfc7c2cc3', 'user', 'pic-5.png'),
(34, 'Ruptanu Jana', 'ruptanujana@gmail.com', 0, '9c8341ac673fa207b412d57118d2a7bf', 'admin', 'pic-1.png'),
(37, 'Ritik Kumar', 'user3@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'IMG_20201125_161816-DESKTOP-0IRKG1O.jpg'),
(39, 'Ritik kumar ', 'user22@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'profile_01_ritik.jpg'),
(41, 'Babul Kumar', 'babull@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'profile_01_ritik.jpg'),
(43, 'Rohit Raj', 'rohit@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'profile_01_ritik.jpg'),
(47, 'Priyanshu', 'priyanshusharma72002@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'IMG_20230731_222415.jpg'),
(48, 'Mukund', 'mukund@gmail.com', 0, 'd41d8cd98f00b204e9800998ecf8427e', 'user', 'profile_03.jpg'),
(49, 'Kaif', 'lightweav908pp@gmail.com', 0, '912dc7746da97c1cf90b5f85741bc291', 'user', '16932221380303398463736241585871.jpg'),
(50, 'Rupali Kumari', 'rupali@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'HD wallpaper_ Iron Man Mask, ironman illustraiton, Tony Stark, superhero mask.jpg'),
(51, 'Vikash Kumar Thakur', 'vikash.vkt.thakur.1234@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'WIN_20230924_01_05_42_Pro.jpg'),
(53, 'Subham', 's@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', 'Task 2.png'),
(54, 'r', 'r@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', ''),
(55, 'rk', 'rk@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', ''),
(56, 't', 't@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'user', ''),
(57, 'tk', 'afds@gmail.com', 123456, '202cb962ac59075b964b07152d234b70', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(64, 35, 33, 'PeanutButter_05', 300, 'peanut-05.png'),
(65, 35, 30, 'PeanutButter_02', 200, 'peanut-2.png'),
(72, 43, 29, 'PeanutButter_01', 2000, 'peanut-15.png'),
(73, 43, 30, 'PeanutButter_02', 200, 'peanut-2.png'),
(74, 43, 31, 'PeanutButter_03', 200, 'peanut-3.png'),
(81, 45, 30, 'PeanutButter_02', 200, 'peanut-2.png'),
(82, 45, 31, 'PeanutButter_03', 200, 'peanut-3.png'),
(92, 52, 43, 'manog_01', 100, 'th.jpg'),
(95, 53, 45, 'Mango_Pickles', 250, 'OIP.jpg'),
(102, 32, 29, 'PeanutButter_01', 200, 'peanut-15.png'),
(103, 32, 34, 'Pickles_01', 100, 'pickles-01.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
