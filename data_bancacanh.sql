-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 09:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nienluan`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `total_price` int(11) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `phone`, `adress`, `time`, `total_price`, `transport`, `status`) VALUES
(72, 1005, '0355644732', 'soc trang', '2023-03-27 21:05:50', 800000, 'Vận chuyển bằng xe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `quatity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `transport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_order`, `id_product`, `img`, `quatity`, `price`, `transport`) VALUES
(72, 46, 'thuoc-tri-nam-va-khuan-hai-api-melafix-273ml.jpg', 4, 200000, 'Vận chuyển bằng xe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(53, 'Cá cảnh'),
(54, 'Hồ cá và phụ kiện'),
(55, 'Thức ăn cho cá'),
(56, 'Thuốc trị bệnh và sản phẩm bổ trợ cho cá');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `product_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `quatity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`product_id`, `product_price`, `product_img`, `quatity`) VALUES
(46, '200000', 'thuoc-tri-nam-va-khuan-hai-api-melafix-273ml.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `product_name`, `cartegory_id`, `product_price`, `product_img`, `product_quantity`) VALUES
(24, 'fish_BT_1', 'Cá Bá Tước', 53, '200000', 'ca-canh-ba-tuoc-nhap-sohal-tang.jpg', '48'),
(25, 'fish_MT_1', 'Cá Cảnh Biển Mao Tiên', 53, '300000', 'ca-canh-bien-mao-tien-radiata-lionfish.jpg', '48'),
(26, 'fish_dg_1', 'Cá Rồng Huyết Long', 53, '15000000', 'huyet-fafu-35cm.jpg', '50'),
(27, 'fish_N_1', 'Cá Cảnh Biển Nẻ Nhật', 53, '400000', 'ca-canh-bien-ne-nhat-powder-blue-tang.jpg', '50'),
(28, 'fish_s_1', 'Cá cảnh biển red saddled anthias', 53, '500000', 'ca-canh-bien-red-saddled-anthias.jpg', '50'),
(29, 'fish_T_01', 'Cá cảnh biển thần yên ngựa', 53, '600000', 'ca-canh-bien-than-yen-ngua-blue-girdled-angelfish.jpg', '50'),
(30, 'fish_dg_2', 'Cá rồng kim long quá bói', 53, '5000000', 'ca-rong-kim-long-qua-boi-full-halmet.jpg', '50'),
(31, 'fish_y_1', 'Cá cảnh biển yellowtail damsefish', 53, '700000', 'ca-canh-bien-yellowtail-damselfish.jpg', '50'),
(32, 'food_01', 'Artemia Thái Lan', 55, '100000', 'artemia-uht-thai-lan-thuc-an-thanh-trung-cong-nghe-cao.jpg', '50'),
(33, 'food_02', 'Thức ăn cho cá betta', 55, '100000', 'thuc-an-cho-ca-betta-sakura-gold-35-20-gram.jpg', '50'),
(34, 'food_03', 'Thức ăn cho cá cảnh', 55, '100000', 'thuc-an-cho-ca-canh-jbl-novotab.jpg', '50'),
(35, 'food_04', 'Thức cho cá dĩa', 55, '100000', 'thuc-an-cho-ca-dia-discus.jpg', '50'),
(36, 'food_05', 'Thức Ăn Chuyên Dụng Cho Cá Rồng INCH GOLD (Hủ 454Gram)', 55, '100000', 'thuc-an-chuyen-dung-cho-ca-rong-inch-gold-hu-454gram.jpg', '50'),
(37, 'food_06', 'Thức ăn hổ trợ lên màu cho cá la hán', 55, '100000', 'thuc-an-quick-500g-ho-tro-len-mau-cho-ca-la-han.jpg', '50'),
(38, 'food_07', 'Thức ăn tetra color tropical granules', 55, '100000', 'Thuc-an-Tetra-Color-Tropical-Granules.jpg', '50'),
(39, 'food_08', 'Trùng huyết đông lạnh', 55, '100000', 'trun-huyet-dong-lanh-thuc-an-cho-ca-canh.jpg', '50'),
(40, 'ho_01', 'Hồ cá rồng ốp gỗ', 54, '12000000', 'ho-ca-rong-op-go-do.jpg', '50'),
(41, 'den_01', 'Đèn led cao cấp full quang phổ chuyên dùng cho hồ thủy sinh', 54, '1000000', 'den-cao-cap-full-quang-pho-chuyen-dung-cho-ho-thuy-sinh.jpg', '50'),
(42, 'ho_02', 'Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng', 54, '15000000', 'ho-ca-rong-op-go-xoai-son-trang.jpg', '50'),
(43, 'thuoc01', 'Thuốc trị bệnh xù vảy', 56, '150000', 'thuoc-tri-benh-xu-vay.jpg', '50'),
(44, 'thuoc02', 'Thuốc trị nắm', 56, '100000', 'thuoc-tri-nam.jpg', '50'),
(45, 'thuoc03', 'Bột vitamin C chuyên dùng cho cá', 56, '200000', 'bot-vitamin-c-mrbiofish-chuyen-dung-cho-ca-canh-120g.jpg', '50'),
(46, 'thuoc04', 'Thuốc trị nấm và khuẩn hại', 56, '200000', 'thuoc-tri-nam-va-khuan-hai-api-melafix-273ml.jpg', '20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(100, 'admin', 'admin@gmail.com', '$2y$10$ug6zCBpAAjrP6tha.ECKkekxVoiYamCFYxFnTG7n/taSnPCc2Mrjy', 'admin'),
(110, 'mai trung tín', 'maitrungtin4732@gmail.com', '$2y$10$N3Kn/ElnmqIlfd9GnydI9.2MFQpqVaE3ILjt95ls0cGzO/efYGHVy', 'user'),
(1003, 'test', 'test@gmail.com', '$2y$10$Hjdix/3L64W2vu9VpjplLuYAMlA/tiPAG7r9eNxA5CPrbk6hKAXQa', 'user'),
(1005, 'mai trung tin', 'tin@gmail.com', '$2y$10$/B0jIcdXNmVU5lRW5CPaJeD7B7/vAc2OcnzqwkWfqdo/N/d77ATMS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD KEY `orders_detail_ibfk_1` (`id_product`),
  ADD KEY `orders_detail_ibfk_2` (`id_order`);

--
-- Indexes for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product_ibfk_1` (`cartegory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Constraints for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD CONSTRAINT `tbl_inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`cartegory_id`) REFERENCES `tbl_cartegory` (`cartegory_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
