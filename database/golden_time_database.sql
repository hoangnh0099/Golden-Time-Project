-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 23, 2019 lúc 08:21 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `golden_time_database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adminAccount`
--

CREATE TABLE `adminAccount` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adminAccount`
--

INSERT INTO `adminAccount` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'kashmir'),
(3, 'weimar'),
(7, 'Colosseum'),
(8, 'Mykonos'),
(9, 'Melissani'),
(10, 'Moraine');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(255) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `username`, `fullname`, `password`, `email`, `phone`, `address`, `gender`) VALUES
(22, 'test', 'Nguyễn Văn A', 'e10adc3949ba59abbe56e057f20f883e', 'test@abc.com', 912345678, 'Hà Nội', 1),
(23, 'test2', 'Nguyễn Thị B', 'e10adc3949ba59abbe56e057f20f883e', 'test2@abc.com', 912345678, 'Hà Nội', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`, `description`, `category`, `quantity`) VALUES
(21, 'ALEXEI', 'DH1', 2060000, 'http://localhost:8888/images/Alexei.1_1296x.jpg', '', 'kashmir', 10000),
(22, 'GENTLE', 'DH2', 1979000, 'http://localhost:8888/images/Gentle_Th_ng_1024x1024@2x.jpg', '', 'kashmir', 100000),
(23, 'SABBRE', 'DH3', 2519000, 'http://localhost:8888/images/Sabre_1_1024x1024@2x.jpg', '', 'Colosseum', 10000),
(24, 'GÜNTER', 'DH4', 2069000, 'http://localhost:8888/images/Gunter-_1_1024x1024@2x.jpg', '', 'weimar', 10000),
(25, 'TAD', 'DH5', 2429000, 'http://localhost:8888/images/Tad.1_1296x.jpg', '', 'Mykonos', 10000),
(26, 'FEARLESS', 'DH6', 1979000, 'http://localhost:8888/images/1.jpg', '', 'kashmir', 10000),
(27, 'MACE', 'DH7', 2789000, 'http://localhost:8888/images/2.jpg', '', 'Colosseum', 10000),
(28, 'HERBERT', 'DH7', 2069000, 'http://localhost:8888/images/3.jpg', '', 'weimar', 100000),
(29, 'EVAN', 'DH9', 1954000, 'http://localhost:8888/images/4.jpg', '', 'Mykonos', 10000),
(30, 'HUNK', 'DH10', 1979000, 'http://localhost:8888/images/5.jpg', '', 'kashmir', 100000),
(31, 'WHIP', 'DH11', 2519000, 'http://localhost:8888/images/6.jpg', '', 'Colosseum', 10000),
(32, 'PAUL', 'DH10', 2069000, 'http://localhost:8888/images/7.jpg', '', 'weimar', 10000),
(33, 'XANDER', 'DH13', 2294000, 'http://localhost:8888/images/8.jpg', '', 'Mykonos', 10000),
(34, 'DAPPER', 'DH14', 1979000, 'http://localhost:8888/images/9.jpg', '', 'kashmir', 10000),
(35, 'STAFF', 'Dh15', 2519000, 'http://localhost:8888/images/10.jpg', '', 'Colosseum', 10000),
(36, 'JÖRG', 'DH16', 2069000, 'http://localhost:8888/images/11.jpg', '', 'weimar', 10000),
(37, 'MAXIMUS', 'DH17', 1979000, 'http://localhost:8888/images/12.jpg', '', 'weimar', 100000),
(38, 'POTENT', 'DH18', 1979000, 'http://localhost:8888/images/14.jpg', '', 'weimar', 10000),
(39, 'KATANA', 'DH19', 2519000, 'http://localhost:8888/images/15.jpg', '', 'Colosseum', 10000),
(40, 'KURT', 'DH20', 2069000, 'http://localhost:8888/images/17.jpg', '', 'weimar', 10000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adminAccount`
--
ALTER TABLE `adminAccount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `adminAccount`
--
ALTER TABLE `adminAccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
