-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2024 lúc 12:52 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `memory_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `memory_id`, `product_id`, `color_id`, `soluong`) VALUES
(202, 20, 3, 1, 2, 1),
(207, 18, 3, 1, 2, 4),
(208, 18, 1, 3, 5, 3),
(209, 18, 1, 3, 2, 5),
(213, 21, 3, 1, 1, 1),
(219, 1, 3, 1, 1, 2),
(236, 1, 1, 6, 2, 3),
(246, 17, 4, 3, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'iPhone'),
(2, 'iPad'),
(3, 'MacBook'),
(4, 'Watch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`color_id`, `name`) VALUES
(1, 'white'),
(2, 'black'),
(3, 'Yellow'),
(4, 'green'),
(5, 'red'),
(6, 'Orange'),
(7, 'silver'),
(8, 'pink'),
(9, 'violet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countvisits`
--

CREATE TABLE `countvisits` (
  `id` int(11) NOT NULL,
  `numberOfHits` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countvisits`
--

INSERT INTO `countvisits` (`id`, `numberOfHits`) VALUES
(1, 959);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `memory`
--

CREATE TABLE `memory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `memory`
--

INSERT INTO `memory` (`id`, `name`) VALUES
(1, '128GB'),
(5, '1T'),
(3, '256GB'),
(6, '32GB'),
(7, '42mm'),
(8, '44mm'),
(4, '512GB'),
(2, '64GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `memory_options`
--

CREATE TABLE `memory_options` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `memory_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `memory_options`
--

INSERT INTO `memory_options` (`id`, `product_id`, `memory_id`, `price`, `discount`) VALUES
(1, 1, 3, 3990000, 3390000),
(2, 1, 4, 39990000, 35990000),
(3, 1, 5, 49990000, 45990000),
(5, 3, 1, 29990000, 26990000),
(6, 3, 4, 35000000, 29990000),
(7, 6, 2, 19990000, 14900000),
(8, 6, 1, 23990000, 19990000),
(9, 7, 3, 28990000, 18990000),
(10, 8, 4, 45000000, 34450000),
(11, 9, 7, 6990000, 4990000),
(12, 9, 8, 9990000, 6990000),
(13, 10, 1, 19990000, 17990000),
(14, 30, 4, 24990000, 19900000),
(15, 10, 3, 22990000, 19990000),
(16, 12, 2, 15990000, 11990000),
(17, 11, 1, 15990000, 13990000),
(18, 11, 4, 19990000, 17990000),
(19, 41, 7, 19990000, 17990000),
(20, 38, 8, 15990000, 6990000),
(21, 35, 8, 15990000, 6990000),
(22, 21, 2, 15990000, 11990000),
(23, 18, 2, 19990000, 14990000),
(24, 20, 2, 19990000, 15990000),
(25, 25, 3, 48990000, 38990000),
(26, 31, 4, 48990000, 46990000),
(27, 35, 7, 6990000, 6390000),
(28, 42, 1, 29900000, 26900000),
(29, 44, 1, 19990000, 17990000),
(30, 41, 7, 19990000, 17990000),
(31, 33, 8, 19990000, 12990000),
(32, 38, 8, 15990000, 10900000),
(33, 25, 4, 48990000, 34450000),
(34, 40, 8, 48990000, 46450000),
(35, 37, 7, 6990000, 2450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `quantity` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOrder` datetime NOT NULL,
  `cancellationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_name`, `memory`, `price`, `image`, `status`, `quantity`, `address`, `phoneNumber`, `email`, `fullName`, `dateOrder`, `cancellationDate`) VALUES
(433, 16, 'iPad Air 4', '64GB', 14900000, 'https://shopdunk.com/images/thumbs/0000594_ipad-air-4_240.png', 4, 2, 'xÃ³m LÃª Lá»£i, xÃ£ NghÄ©a HÃ nh, huyá»‡n TÃ¢n Ká»³, tÃ¬nh NghÃª An', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 18:03:38', '2024-01-14 18:03:46'),
(434, 16, 'iPhone 15 Plus', '128GB', 26990000, 'https://shopdunk.com/images/thumbs/0009496_iphone-14-plus-128gb_550.webp', 3, 2, 'xÃ³m LÃª Lá»£i, xÃ£ NghÄ©a HÃ nh, huyá»‡n TÃ¢n Ká»³, tÃ¬nh NghÃª An', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 18:03:38', '0000-00-00 00:00:00'),
(435, 16, 'iPhone 15 Pro Max', '1T', 45990000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 2, 1, 'xÃ³m LÃª Lá»£i, xÃ£ NghÄ©a HÃ nh, huyá»‡n TÃ¢n Ká»³, tÃ¬nh NghÃª An', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 18:03:38', '0000-00-00 00:00:00'),
(436, 16, 'iPhone 15 Pro Max', '512GB', 35990000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 4, 1, 'xÃ³m LÃª Lá»£i, xÃ£ NghÄ©a HÃ nh, huyá»‡n TÃ¢n Ká»³, tÃ¬nh NghÃª An', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 18:03:38', '2024-01-14 18:04:06'),
(440, 17, 'iPad Air 4', '128GB', 19990000, 'https://shopdunk.com/images/thumbs/0000594_ipad-air-4_240.png', 2, 1, '1', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 20:56:33', '0000-00-00 00:00:00'),
(441, 17, 'iPad Air 4', '64GB', 14900000, 'https://shopdunk.com/images/thumbs/0000594_ipad-air-4_240.png', 2, 15, '1', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 20:56:33', '0000-00-00 00:00:00'),
(442, 17, 'iPhone 15 Pro Max', '256GB', 3390000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 2, 1, '1', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 20:56:33', '0000-00-00 00:00:00'),
(446, 25, 'iPhone 15 Pro Max', '256GB', 3390000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 2, 1, '1', '0365043804', 'nguyenhuynhdt37@gmail.com', 'Huá»³nh Nguyá»…n Xuan', '2024-01-14 20:57:51', '0000-00-00 00:00:00'),
(448, 16, 'iPhone 15 Pro Max', '256GB', 3390000, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 1, 2, 'E', '0358239756', 'nguyenthoquovkj@gmail.com', 'quá»‘c khÃ¡nh', '2024-01-15 15:15:43', '0000-00-00 00:00:00'),
(449, 16, 'MacBook Air M1 2020 (8GB RAM | 256GB SSD)', '256GB', 18990000, 'https://shopdunk.com/images/thumbs/0000723_macbook-air-m1-2020-8gb-ram-256gb-ssd_240.png', 2, 2, 'E', '0358239756', 'nguyenthoquovkj@gmail.com', 'quá»‘c khÃ¡nh', '2024-01-15 15:15:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `thumbnail`) VALUES
(1, 1, 'iPhone 15 Pro Max', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png'),
(2, 1, 'iPhone 15 Pro', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_4.png'),
(3, 1, 'iPhone 15 Plus', 'https://shopdunk.com/images/thumbs/0009496_iphone-14-plus-128gb_550.webp'),
(4, 1, 'iPhone 15', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-plus_1_.png'),
(6, 2, 'iPad Air 4', 'https://shopdunk.com/images/thumbs/0000594_ipad-air-4_240.png'),
(7, 3, 'MacBook Air M1 2020 (8GB RAM)', 'https://shopdunk.com/images/thumbs/0000723_macbook-air-m1-2020-8gb-ram-256gb-ssd_240.png'),
(8, 3, ' iMac M1 2021 24 inch (8 Core GPU/8GB)', 'https://shopdunk.com/images/thumbs/0000809_imac-m1-2021-24-inch-8-core-gpu8gb512gb_240.webp'),
(9, 4, 'Apple Watch Series 3 Aluminum', 'https://shopdunk.com/images/thumbs/0022278_apple-watch-series-3-nhom_240.png'),
(10, 1, 'iPhone 13', 'https://shopdunk.com/images/thumbs/0000596_iphone-13_240.png'),
(11, 1, 'iPhone 12', 'https://shopdunk.com/images/thumbs/0006849_iphone-12-128gb_240.png'),
(12, 1, 'iPhone 11', 'https://shopdunk.com/images/thumbs/0012164_iphone-11-64gb_240.webp'),
(16, 2, 'iPad Pro M1 12.9 inch WiFi Cellular', 'https://shopdunk.com/images/thumbs/0010883_ipad-pro-m1-129-inch-wifi-cellular-512gb_240.webp'),
(17, 2, 'iPad Pro M2 11 inch WiFi', 'https://shopdunk.com/images/thumbs/0007071_ipad-pro-m2-11-inch-wifi-128gb_240.pnga'),
(18, 2, 'iPad air 5', 'https://shopdunk.com/images/thumbs/0019294_ipad-air-5-wifi-256gb_240.png'),
(19, 2, 'iPad mini 6', 'https://shopdunk.com/images/thumbs/0000593_ipad-mini-6_240.png'),
(20, 2, 'iPad gen 10', 'https://shopdunk.com/images/thumbs/0009725_ipad-gen-10-th-109-inch-wifi-64gb_240.png'),
(21, 2, 'iPad gen 9', 'https://shopdunk.com/images/thumbs/0006205_ipad-gen-9-102-inch-wifi-64gb_240.png'),
(22, 2, 'iPad pro m2 wifi', 'https://shopdunk.com/images/thumbs/0007301_ipad-pro-m2-129-inch-wifi-128gb_240.png'),
(23, 3, 'MacBook Pro 16 M1 Pro (16 Core/16GB)', 'https://shopdunk.com/images/thumbs/0008043_macbook-pro-16-m1-pro-16-core16gb1tb_240.png'),
(24, 3, 'MacBook Pro 14 inch M3 2023 (8GB RAM| 10 Core GPU)', 'https://shopdunk.com/images/thumbs/0022520_macbook-pro-14-inch-m3-2023-8gb-ram-10-core-gpu-512gb-ssd_240.jpeg'),
(25, 3, 'MacBook Pro 14 inch M3 2023 (16GB RAM| 10 Core GPU)', 'https://shopdunk.com/images/thumbs/0000809_imac-m1-2021-24-inch-8-core-gpu8gb512gb_240.webp'),
(26, 3, 'MacBook air m2', 'https://shopdunk.com/images/thumbs/0008502_macbook-air-m2-2022-8gb-ram-256gb-ssd_240.png'),
(27, 3, 'MacBook Pro 14 inch M2 Pro (16 Core| 16GB)', 'https://shopdunk.com/images/thumbs/0011267_macbook-pro-14-inch-m2-pro-16-core-16gb-512gb_240.jpeg'),
(28, 3, 'iMac 2020 27\" MXWT2 (3.1 6C/8GB/RP5300X SOA)', 'https://shopdunk.com/images/thumbs/0000833_imac-2020-27-mxwt2-31-6c8gb-256gbrp5300x-soa_240.png'),
(29, 3, 'Mac Studio', 'https://shopdunk.com/images/thumbs/0000728_studio-display_240.png'),
(30, 3, 'Mac Studio M1 Max', 'https://shopdunk.com/images/thumbs/0010612_mac-studio-m1-max_240.webp'),
(31, 3, 'Mac Studio M1 Ultra', 'https://shopdunk.com/images/thumbs/0000806_mac-studio-m1-ultra_240.png'),
(32, 3, 'MacBook Pro 13 inch M2 (10 core| 16GB RAM)', 'https://shopdunk.com/images/thumbs/0011809_macbook-pro-13-inch-m2-10-core-16gb-ram-512gb-ssd_240.png'),
(33, 4, 'Apple Watch Series 7 Nhôm GPS', 'https://shopdunk.com/images/thumbs/0001025_apple-watch-series-7-nhom-gps_240.png'),
(34, 4, 'Apple Watch Series 9', 'https://shopdunk.com/images/thumbs/0021752_apple-watch-series-9-thep-gps-cellular-41mm-milanese-loop_240.jpeg'),
(35, 4, 'Apple Watch Series 9 (GPS + Cellular)', 'https://shopdunk.com/images/thumbs/0021752_apple-watch-series-9-thep-gps-cellular-41mm-milanese-loop_240.jpeg'),
(37, 4, 'Apple Watch Series | Milanese Loop', 'https://shopdunk.com/images/thumbs/0021752_apple-watch-series-9-thep-gps-cellular-41mm-milanese-loop_240.jpeg'),
(38, 4, 'Apple Watch SE 2023 GPS Sport Loop', 'https://shopdunk.com/images/thumbs/0022276_apple-watch-se-2023-gps-sport-loop_240.jpeg'),
(39, 4, 'Apple Watch SE 2023 GPS + Cellular Sport Band size S/M', 'https://shopdunk.com/images/thumbs/0022328_apple-watch-se-2023-gps-cellular-sport-band-size-sm_240.png'),
(40, 4, 'Apple Watch Ultra 2 GPS + Cellular 49mm Alpine Loop', 'https://shopdunk.com/images/thumbs/0022172_apple-watch-ultra-2-gps-cellular-49mm-alpine-loop_240.png'),
(41, 4, 'Apple Watch SE 2022 Nhôm GPS + Cellular', 'https://shopdunk.com/images/thumbs/0022273_apple-watch-se-2022-nhom-gps-cellular_240.jpeg'),
(42, 1, 'iPhone 14 Pro Max', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-14-pro_2__5.png'),
(43, 1, 'iPhone 14', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-14_1.png'),
(44, 1, 'iPhone 13 Pro Max', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:80/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-13-pro-max.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcolors`
--

CREATE TABLE `productcolors` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcolors`
--

INSERT INTO `productcolors` (`id`, `product_id`, `color_id`, `images`) VALUES
(1, 1, 2, 'https://shopdunk.com/images/thumbs/0020074_iphone-15-pro-max-128gb_550.jpeg'),
(2, 1, 2, 'https://shopdunk.com/images/thumbs/0020075_iphone-15-pro-max-128gb.jpeg'),
(3, 1, 2, 'https://shopdunk.com/images/thumbs/0020078_iphone-15-pro-max-128gb_550.jpeg'),
(4, 1, 1, 'https://shopdunk.com/images/thumbs/0020084_iphone-15-pro-max-128gb_550.jpeg'),
(5, 1, 1, 'https://shopdunk.com/images/thumbs/0020085_iphone-15-pro-max-128gb_550.jpeg'),
(6, 1, 1, 'https://shopdunk.com/images/thumbs/0020087_iphone-15-pro-max-128gb.jpeg'),
(7, 1, 1, 'https://shopdunk.com/images/thumbs/0020087_iphone-15-pro-max-128gb.jpeg'),
(8, 1, 1, 'https://shopdunk.com/images/thumbs/0020088_iphone-15-pro-max-128gb.jpeg'),
(9, 1, 1, 'https://shopdunk.com/images/thumbs/0020088_iphone-15-pro-max-128gb_550.jpeg'),
(10, 2, 1, 'https://shopdunk.com/images/thumbs/0019569_titan-trang_550.jpeg'),
(11, 3, 2, 'https://shopdunk.com/images/thumbs/0009496_iphone-14-plus-128gb_550.webp'),
(12, 3, 2, 'https://shopdunk.com/images/thumbs/0009498_iphone-14-plus-128gb_550.webp'),
(13, 3, 2, 'https://shopdunk.com/images/thumbs/0009498_iphone-14-plus-128gb_550.webp'),
(14, 3, 5, 'https://shopdunk.com/images/thumbs/0009532_iphone-14-plus-128gb_550.png'),
(15, 6, 2, 'https://shopdunk.com/images/thumbs/0001207_space-gray_550.webp'),
(16, 7, 7, 'https://shopdunk.com/images/thumbs/0006177_space-gray_550.webp'),
(17, 7, 7, 'https://shopdunk.com/images/thumbs/0006178_space-gray_550.webp'),
(18, 7, 7, 'https://shopdunk.com/images/thumbs/0006179_space-gray_550.webp'),
(19, 7, 7, 'https://shopdunk.com/images/thumbs/0006180_space-gray_550.webp'),
(20, 8, 8, 'https://shopdunk.com/images/thumbs/0010524_pink_550.webp'),
(21, 8, 8, 'https://shopdunk.com/images/thumbs/0010525_pink_550.webp'),
(22, 8, 8, 'https://shopdunk.com/images/thumbs/0010526_pink_550.webp'),
(23, 8, 8, 'https://shopdunk.com/images/thumbs/0010529_pink_550.webp'),
(24, 8, 4, 'https://shopdunk.com/images/thumbs/0010518_green_550.webp'),
(25, 8, 4, 'https://shopdunk.com/images/thumbs/0010519_green_550.webp'),
(26, 8, 4, 'https://shopdunk.com/images/thumbs/0010520_green_550.webp'),
(27, 8, 4, 'https://shopdunk.com/images/thumbs/0010522_green_550.webp'),
(28, 7, 1, 'https://shopdunk.com/images/thumbs/0011196_silver_550.webp'),
(29, 7, 1, 'https://shopdunk.com/images/thumbs/0011197_silver_550.webp'),
(30, 7, 1, 'https://shopdunk.com/images/thumbs/0011198_silver_550.webp'),
(31, 7, 1, 'https://shopdunk.com/images/thumbs/0011201_silver_550.webp'),
(32, 7, 1, 'https://shopdunk.com/images/thumbs/0011200_silver_550.webp'),
(33, 7, 8, 'https://shopdunk.com/images/thumbs/0006171_gold_550.webp'),
(34, 7, 8, 'https://shopdunk.com/images/thumbs/0006171_gold_550.webp'),
(35, 7, 8, 'https://shopdunk.com/images/thumbs/0006172_gold_550.webp'),
(36, 7, 8, 'https://shopdunk.com/images/thumbs/0006173_gold_550.webp'),
(37, 7, 8, 'https://shopdunk.com/images/thumbs/0006174_gold_550.webp'),
(38, 7, 8, 'https://shopdunk.com/images/thumbs/0006175_gold_550.webp'),
(39, 9, 7, 'https://shopdunk.com/images/thumbs/0010160_space-gray_550.png'),
(40, 9, 7, 'https://shopdunk.com/images/thumbs/0010161_space-gray_550.jpeg'),
(41, 12, 2, 'https://shopdunk.com/images/thumbs/0011632_iphone-11-64gb_550.png'),
(42, 12, 2, 'https://shopdunk.com/images/thumbs/0011633_iphone-11-64gb_550.webp'),
(43, 12, 2, 'https://shopdunk.com/images/thumbs/0011634_iphone-11-64gb_550.webp'),
(44, 12, 1, 'https://shopdunk.com/images/thumbs/0011639_iphone-11-64gb_550.png'),
(45, 12, 1, 'https://shopdunk.com/images/thumbs/0011640_iphone-11-64gb_550.webp'),
(46, 12, 1, 'https://shopdunk.com/images/thumbs/0011641_iphone-11-64gb_550.webp'),
(47, 12, 1, 'https://shopdunk.com/images/thumbs/0011642_iphone-11-64gb_550.webp'),
(48, 10, 4, 'https://shopdunk.com/images/thumbs/0000567_alpine-green_550.png'),
(49, 10, 4, 'https://shopdunk.com/images/thumbs/0000569_alpine-green_550.webp'),
(50, 10, 4, 'https://shopdunk.com/images/thumbs/0000570_alpine-green_550.webp'),
(51, 10, 4, 'https://shopdunk.com/images/thumbs/0000571_alpine-green_550.webp'),
(52, 11, 9, 'https://shopdunk.com/images/thumbs/0006831_iphone-12-64gb_550.png'),
(53, 18, 9, 'https://shopdunk.com/images/thumbs/0019294_ipad-air-5-wifi-256gb_240.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'manage', NULL, NULL),
(2, 'client', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `fullname`, `password`, `avatar`) VALUES
(1, 1, 'admin', '1', NULL),
(15, 2, 'nguyenhuynh2', '12', NULL),
(16, 2, 'huynh1', '1', 'https://i.pinimg.com/236x/ad/0a/ec/ad0aec5a2b39bbb0d5d444562f423a2d.jpg'),
(17, 2, 'nguyenhuynhdt37@gmail.com', 'Huynh@2004', NULL),
(18, 2, 'huynh555', '1', NULL),
(19, 2, '123', '1', NULL),
(20, 2, 'dinh', 'dinh1', NULL),
(21, 2, '12', '1', NULL),
(23, 2, 'fsfsd', 'fsfsd', NULL),
(24, 2, 'nguyenhuynh', '1', NULL),
(25, 2, 'ok', '1', NULL),
(26, 2, 'user', '1', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `memory_id` (`memory_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `countvisits`
--
ALTER TABLE `countvisits`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `memory`
--
ALTER TABLE `memory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Chỉ mục cho bảng `memory_options`
--
ALTER TABLE `memory_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memory_id` (`memory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_title` (`title`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `productcolors`
--
ALTER TABLE `productcolors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fullname` (`fullname`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `countvisits`
--
ALTER TABLE `countvisits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `memory`
--
ALTER TABLE `memory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `memory_options`
--
ALTER TABLE `memory_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `productcolors`
--
ALTER TABLE `productcolors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`memory_id`) REFERENCES `memory` (`id`),
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`),
  ADD CONSTRAINT `carts_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `memory_options`
--
ALTER TABLE `memory_options`
  ADD CONSTRAINT `memory_options_ibfk_1` FOREIGN KEY (`memory_id`) REFERENCES `memory` (`id`),
  ADD CONSTRAINT `memory_options_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `productcolors`
--
ALTER TABLE `productcolors`
  ADD CONSTRAINT `productcolors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `productcolors_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
