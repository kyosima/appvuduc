-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 07, 2021 lúc 09:13 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test_api_vnpost`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhthanh`
--

CREATE TABLE `tinhthanh` (
  `id` int(11) NOT NULL,
  `matinhthanh` int(11) DEFAULT NULL,
  `tentinhthanh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tinhthanh`
--

INSERT INTO `tinhthanh` (`id`, `matinhthanh`, `tentinhthanh`, `created_at`, `updated_at`) VALUES
(1, 10, 'Hà Nội', NULL, NULL),
(2, 16, 'Hưng Yên', NULL, NULL),
(3, 17, 'Hải Dương', NULL, NULL),
(4, 18, 'Hải Phòng', NULL, NULL),
(5, 20, 'Quảng Ninh', NULL, NULL),
(6, 22, 'Bắc Ninh', NULL, NULL),
(7, 23, 'Bắc Giang', NULL, NULL),
(8, 24, 'Lạng Sơn', NULL, NULL),
(9, 25, 'Thái Nguyên', NULL, NULL),
(10, 26, 'Bắc Kạn', NULL, NULL),
(11, 27, 'Cao Bằng', NULL, NULL),
(12, 28, 'Vĩnh Phúc', NULL, NULL),
(13, 29, 'Phú Thọ', NULL, NULL),
(14, 30, 'Tuyên Quang', NULL, NULL),
(15, 31, 'Hà Giang', NULL, NULL),
(16, 32, 'Yên Bái', NULL, NULL),
(17, 33, 'Lào Cai', NULL, NULL),
(18, 35, 'Hoà Bình', NULL, NULL),
(19, 36, 'Sơn La', NULL, NULL),
(20, 38, 'Điện Biên', NULL, NULL),
(21, 39, 'Lai Châu', NULL, NULL),
(22, 40, 'Hà Nam', NULL, NULL),
(23, 41, 'Thái Bình', NULL, NULL),
(24, 42, 'Nam Định', NULL, NULL),
(25, 43, 'Ninh Bình', NULL, NULL),
(26, 44, 'Thanh Hoá', NULL, NULL),
(27, 46, 'Nghệ An', NULL, NULL),
(28, 48, 'Hà Tĩnh', NULL, NULL),
(29, 51, 'Quảng Bình', NULL, NULL),
(30, 52, 'Quảng Trị', NULL, NULL),
(31, 53, 'Thừa Thiên Huế', NULL, NULL),
(32, 55, 'Đà Nẵng', NULL, NULL),
(33, 56, 'Quảng Nam', NULL, NULL),
(34, 57, 'Quảng Ngãi', NULL, NULL),
(35, 58, 'Kon Tum', NULL, NULL),
(36, 59, 'Bình Định', NULL, NULL),
(37, 60, 'Gia Lai', NULL, NULL),
(38, 62, 'Phú Yên', NULL, NULL),
(39, 63, 'Đắk Lăk', NULL, NULL),
(40, 64, 'Đắk Nông', NULL, NULL),
(41, 65, 'Khánh Hoà', NULL, NULL),
(42, 66, 'Ninh Thuận', NULL, NULL),
(43, 67, 'Lâm Đồng', NULL, NULL),
(44, 70, 'Hồ Chí Minh', NULL, NULL),
(45, 79, 'Bà Rịa Vũng Tàu', NULL, NULL),
(46, 80, 'Bình Thuận', NULL, NULL),
(47, 81, 'Đồng Nai', NULL, NULL),
(48, 82, 'Bình Dương', NULL, NULL),
(49, 83, 'Bình Phước', NULL, NULL),
(50, 84, 'Tây Ninh', NULL, NULL),
(51, 85, 'Long An', NULL, NULL),
(52, 86, 'Tiền Giang', NULL, NULL),
(53, 87, 'Đồng Tháp', NULL, NULL),
(54, 88, 'An Giang', NULL, NULL),
(55, 89, 'Vĩnh Long', NULL, NULL),
(56, 90, 'Cần Thơ', NULL, NULL),
(57, 91, 'Hậu Giang', NULL, NULL),
(58, 92, 'Kiên Giang', NULL, NULL),
(59, 93, 'Bến Tre', NULL, NULL),
(60, 94, 'Trà Vinh', NULL, NULL),
(61, 95, 'Sóc Trăng', NULL, NULL),
(62, 96, 'Bạc Liêu', NULL, NULL),
(63, 97, 'Cà Mau', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tinhthanh`
--
ALTER TABLE `tinhthanh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tinhthanh`
--
ALTER TABLE `tinhthanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
