-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 11:28 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'public/images/user.png',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `email`, `phone`, `fullname`, `address`, `img`, `role`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin123', 'admin@gmail.com', '0914249694', 'Nguyến Văn Admin', 'Nam định', 'man.png', 1, NULL, '2018-05-20 17:00:00', '2018-05-20 17:00:00', 1),
(6, '$2y$10$wq48TKxpPv7r7B6FOc/xmOLarrI2UrOpRdYTREpGG6gJ0ubKJSffa', 'huycanh14@gmail.com', '0165757215', 'Huy Cảnh', 'Nam Định', 'X69t_05-1600x902.jpg', 1, 'bx2nVZ0lpu1TJU5YyVnNTCiJ9pSsfUz89pSMQMJAdfpQDiH7xuW2WUJpbxfT', '2018-11-12 01:59:12', '2018-11-12 09:28:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `position` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `update_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `img`, `link`, `description`, `position`, `created_at`, `update_at`, `status`) VALUES
(1, 'điện thoại 1', 'bg-1-min5whqk-1921053czv-1920duj7o-1920.png', NULL, NULL, NULL, '2018-11-07', NULL, 0),
(2, 'điện thoại 2', 'bg-5-minXJUYC-1920.png', NULL, NULL, NULL, '2018-11-07', NULL, 0),
(3, 'điện thoại 3', 'phone-old-year-built-1955-bakelite-163007.jpeg', NULL, NULL, NULL, '2018-11-07', NULL, 0),
(4, 'điện thoại 4', 'photo-hero.jpg', NULL, NULL, NULL, '2018-11-07', NULL, 0),
(5, 'điện thoại 5', 'pexels-photo-1434819.jpeg', NULL, NULL, NULL, '2018-11-07', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Apple', 'Apple', NULL, NULL, '2018-05-23', NULL, 1),
(2, 'Sony', 'Sony', NULL, NULL, '2018-05-23', NULL, 1),
(3, 'Asus', 'asus', NULL, NULL, '2018-05-23', NULL, 1),
(4, 'Xiaomi', 'xiaomi', NULL, NULL, '2018-05-23', NULL, 1),
(5, 'Samsung', 'samsung', NULL, NULL, '2018-05-23', NULL, 1),
(6, 'Kingston', 'Kingston', NULL, 'Hãng sản xuất thẻ nhớ ', '2018-05-23', NULL, 1),
(7, 'Unik', 'unik', NULL, 'Hãng sản xuất tai nghe, ốp lưng ..', '2018-05-23', NULL, 1),
(8, 'iCORE', 'iCORE', NULL, 'Hãng sản xuất sạc cáp điện thoại', '2018-05-23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `customer_group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `address`, `province_id`, `district_id`, `gender`, `password`, `customer_group_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Kotono', 'korokoro@gmail.com', '01234731395', '337,Cầu giấy', 59, 358, 1, '123456abcde', NULL, '2018-05-23 17:00:00', '2018-05-23 17:00:00', 1),
(2, 'customer_test', 'testter@gmail.com', '0124753951', '338.Cầu gò', 50, 537, 1, '123456abcde', NULL, '2018-05-23 17:00:00', '2018-05-23 17:00:00', 1),
(3, 'tranthutrang', 'trang@gmail.com', '12345666666', '330 Nguyễn Tư Giản', 22, 241, 0, '1232211abc', NULL, '2018-05-23 17:00:00', '2018-05-23 17:00:00', 1),
(4, 'nguyendonghung', 'hung@gmail.com', '0167881545845', '20 Cầu Giấy', 22, 242, 1, '1245abc', NULL, '2018-05-26 17:00:00', '2018-05-26 17:00:00', 1),
(5, 'danghuycanh', 'canh@gmail.com', '0231456789', '10 Khương Hạ', 24, 230, 1, '123abcd', NULL, '2018-05-24 17:00:00', '2018-05-24 17:00:00', 1),
(6, 'nguyenthianh', 'anh@gmail.com', '012457954', '200 Định Công', 19, 145, 0, '45ghj', NULL, '2018-04-30 17:00:00', '2018-04-30 17:00:00', 1),
(7, 'nguyenbagiap', 'giap@gmail.com', '012457896554', '180 Nguyễn Trãi', 24, 158, 1, '154acb', NULL, '2018-05-25 17:00:00', '2018-05-26 17:00:00', 1),
(8, 'dovanthang', 'thang@gmail.com', '1245875224', '150 Hồ Tùng Mậu', 21, 402, NULL, '158fgh', NULL, '2018-05-02 17:00:00', '2018-05-02 17:00:00', 1),
(9, 'nguyentiendung', 'dung@gmail.com', '019823222', '90 Nam Đàn', 20, 278, 1, '123abcdf', NULL, '2018-05-10 17:00:00', '2018-05-10 17:00:00', 1),
(11, 'nguyenlananh', 'anhn@gmail.com', '0193847554', '80 Nguyên Khiết', 15, 665, 0, '456rgf', NULL, '2018-05-06 17:00:00', '2018-05-06 17:00:00', 1),
(12, 'aaaaaaasd', 'czxczxczc@gmail.com', '123456789', '', 20, 145, 1, '0123456789', NULL, '2018-05-08 17:00:00', '2018-07-02 17:00:00', 1),
(13, 'Đặng Huy Cảnh', 'canhhuy@gmail.com', '09876453627', '347 Cổ Nhuế', 1, 15, 1, '$2y$10$7NHH3J05LHkoXmXWD1/ogOGuJV3YxvrSwH5bROdnjs/DvXD30/.7a', NULL, '2018-11-14 00:46:25', '2018-11-14 00:46:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`) VALUES
(1, 'Quận Ba Đình', 1),
(2, 'Quận Hoàn Kiếm', 1),
(3, 'Quận Tây Hồ', 1),
(4, 'Quận Long Biên', 1),
(5, 'Quận Cầu Giấy', 1),
(6, 'Quận Đống Đa', 1),
(7, 'Quận Hai Bà Trưng', 1),
(8, 'Quận Hoàng Mai', 1),
(9, 'Quận Thanh Xuân', 1),
(10, 'Huyện Sóc Sơn', 1),
(11, 'Huyện Đông Anh', 1),
(12, 'Huyện Gia Lâm', 1),
(13, 'Quận Nam Từ Liêm', 1),
(14, 'Huyện Thanh Trì', 1),
(15, 'Quận Bắc Từ Liêm', 1),
(16, 'Huyện Mê Linh', 1),
(17, 'Quận Hà Đông', 1),
(18, 'Thị xã Sơn Tây', 1),
(19, 'Huyện Ba Vì', 1),
(20, 'Huyện Phúc Thọ', 1),
(21, 'Huyện Đan Phượng', 1),
(22, 'Huyện Hoài Đức', 1),
(23, 'Huyện Quốc Oai', 1),
(24, 'Huyện Thạch Thất', 1),
(25, 'Huyện Chương Mỹ', 1),
(26, 'Huyện Thanh Oai', 1),
(27, 'Huyện Thường Tín', 1),
(28, 'Huyện Phú Xuyên', 1),
(29, 'Huyện Ứng Hòa', 1),
(30, 'Huyện Mỹ Đức', 1),
(31, 'Thành phố Hà Giang', 2),
(32, 'Huyện Đồng Văn', 2),
(33, 'Huyện Mèo Vạc', 2),
(34, 'Huyện Yên Minh', 2),
(35, 'Huyện Quản Bạ', 2),
(36, 'Huyện Vị Xuyên', 2),
(37, 'Huyện Bắc Mê', 2),
(38, 'Huyện Hoàng Su Phì', 2),
(39, 'Huyện Xín Mần', 2),
(40, 'Huyện Bắc Quang', 2),
(41, 'Huyện Quang Bình', 2),
(42, 'Thành phố Cao Bằng', 3),
(43, 'Huyện Bảo Lâm', 3),
(44, 'Huyện Bảo Lạc', 3),
(45, 'Huyện Thông Nông', 3),
(46, 'Huyện Hà Quảng', 3),
(47, 'Huyện Trà Lĩnh', 3),
(48, 'Huyện Trùng Khánh', 3),
(49, 'Huyện Hạ Lang', 3),
(50, 'Huyện Quảng Uyên', 3),
(51, 'Huyện Phục Hoà', 3),
(52, 'Huyện Hoà An', 3),
(53, 'Huyện Nguyên Bình', 3),
(54, 'Huyện Thạch An', 3),
(55, 'Thành Phố Bắc Kạn', 4),
(56, 'Huyện Pác Nặm', 4),
(57, 'Huyện Ba Bể', 4),
(58, 'Huyện Ngân Sơn', 4),
(59, 'Huyện Bạch Thông', 4),
(60, 'Huyện Chợ Đồn', 4),
(61, 'Huyện Chợ Mới', 4),
(62, 'Huyện Na Rì', 4),
(63, 'Thành phố Tuyên Quang', 5),
(64, 'Huyện Lâm Bình', 5),
(65, 'Huyện Nà Hang', 5),
(66, 'Huyện Chiêm Hóa', 5),
(67, 'Huyện Hàm Yên', 5),
(68, 'Huyện Yên Sơn', 5),
(69, 'Huyện Sơn Dương', 5),
(70, 'Thành phố Lào Cai', 6),
(71, 'Huyện Bát Xát', 6),
(72, 'Huyện Mường Khương', 6),
(73, 'Huyện Si Ma Cai', 6),
(74, 'Huyện Bắc Hà', 6),
(75, 'Huyện Bảo Thắng', 6),
(76, 'Huyện Bảo Yên', 6),
(77, 'Huyện Sa Pa', 6),
(78, 'Huyện Văn Bàn', 6),
(79, 'Thành phố Điện Biên Phủ', 7),
(80, 'Thị Xã Mường Lay', 7),
(81, 'Huyện Mường Nhé', 7),
(82, 'Huyện Mường Chà', 7),
(83, 'Huyện Tủa Chùa', 7),
(84, 'Huyện Tuần Giáo', 7),
(85, 'Huyện Điện Biên', 7),
(86, 'Huyện Điện Biên Đông', 7),
(87, 'Huyện Mường Ảng', 7),
(88, 'Huyện Nậm Pồ', 7),
(89, 'Thành phố Lai Châu', 8),
(90, 'Huyện Tam Đường', 8),
(91, 'Huyện Mường Tè', 8),
(92, 'Huyện Sìn Hồ', 8),
(93, 'Huyện Phong Thổ', 8),
(94, 'Huyện Than Uyên', 8),
(95, 'Huyện Tân Uyên', 8),
(96, 'Huyện Nậm Nhùn', 8),
(97, 'Thành phố Sơn La', 9),
(98, 'Huyện Quỳnh Nhai', 9),
(99, 'Huyện Thuận Châu', 9),
(100, 'Huyện Mường La', 9),
(101, 'Huyện Bắc Yên', 9),
(102, 'Huyện Phù Yên', 9),
(103, 'Huyện Mộc Châu', 9),
(104, 'Huyện Yên Châu', 9),
(105, 'Huyện Mai Sơn', 9),
(106, 'Huyện Sông Mã', 9),
(107, 'Huyện Sốp Cộp', 9),
(108, 'Huyện Vân Hồ', 9),
(109, 'Thành phố Yên Bái', 10),
(110, 'Thị xã Nghĩa Lộ', 10),
(111, 'Huyện Lục Yên', 10),
(112, 'Huyện Văn Yên', 10),
(113, 'Huyện Mù Căng Chải', 10),
(114, 'Huyện Trấn Yên', 10),
(115, 'Huyện Trạm Tấu', 10),
(116, 'Huyện Văn Chấn', 10),
(117, 'Huyện Yên Bình', 10),
(118, 'Thành phố Hòa Bình', 11),
(119, 'Huyện Đà Bắc', 11),
(120, 'Huyện Kỳ Sơn', 11),
(121, 'Huyện Lương Sơn', 11),
(122, 'Huyện Kim Bôi', 11),
(123, 'Huyện Cao Phong', 11),
(124, 'Huyện Tân Lạc', 11),
(125, 'Huyện Mai Châu', 11),
(126, 'Huyện Lạc Sơn', 11),
(127, 'Huyện Yên Thủy', 11),
(128, 'Huyện Lạc Thủy', 11),
(129, 'Thành phố Thái Nguyên', 12),
(130, 'Thành phố Sông Công', 12),
(131, 'Huyện Định Hóa', 12),
(132, 'Huyện Phú Lương', 12),
(133, 'Huyện Đồng Hỷ', 12),
(134, 'Huyện Võ Nhai', 12),
(135, 'Huyện Đại Từ', 12),
(136, 'Thị xã Phổ Yên', 12),
(137, 'Huyện Phú Bình', 12),
(138, 'Thành phố Lạng Sơn', 13),
(139, 'Huyện Tràng Định', 13),
(140, 'Huyện Bình Gia', 13),
(141, 'Huyện Văn Lãng', 13),
(142, 'Huyện Cao Lộc', 13),
(143, 'Huyện Văn Quan', 13),
(144, 'Huyện Bắc Sơn', 13),
(145, 'Huyện Hữu Lũng', 13),
(146, 'Huyện Chi Lăng', 13),
(147, 'Huyện Lộc Bình', 13),
(148, 'Huyện Đình Lập', 13),
(149, 'Thành phố Hạ Long', 14),
(150, 'Thành phố Móng Cái', 14),
(151, 'Thành phố Cẩm Phả', 14),
(152, 'Thành phố Uông Bí', 14),
(153, 'Huyện Bình Liêu', 14),
(154, 'Huyện Tiên Yên', 14),
(155, 'Huyện Đầm Hà', 14),
(156, 'Huyện Hải Hà', 14),
(157, 'Huyện Ba Chẽ', 14),
(158, 'Huyện Vân Đồn', 14),
(159, 'Huyện Hoành Bồ', 14),
(160, 'Thị xã Đông Triều', 14),
(161, 'Thị xã Quảng Yên', 14),
(162, 'Huyện Cô Tô', 14),
(163, 'Thành phố Bắc Giang', 15),
(164, 'Huyện Yên Thế', 15),
(165, 'Huyện Tân Yên', 15),
(166, 'Huyện Lạng Giang', 15),
(167, 'Huyện Lục Nam', 15),
(168, 'Huyện Lục Ngạn', 15),
(169, 'Huyện Sơn Động', 15),
(170, 'Huyện Yên Dũng', 15),
(171, 'Huyện Việt Yên', 15),
(172, 'Huyện Hiệp Hòa', 15),
(173, 'Thành phố Việt Trì', 16),
(174, 'Thị xã Phú Thọ', 16),
(175, 'Huyện Đoan Hùng', 16),
(176, 'Huyện Hạ Hoà', 16),
(177, 'Huyện Thanh Ba', 16),
(178, 'Huyện Phù Ninh', 16),
(179, 'Huyện Yên Lập', 16),
(180, 'Huyện Cẩm Khê', 16),
(181, 'Huyện Tam Nông', 16),
(182, 'Huyện Lâm Thao', 16),
(183, 'Huyện Thanh Sơn', 16),
(184, 'Huyện Thanh Thuỷ', 16),
(185, 'Huyện Tân Sơn', 16),
(186, 'Thành phố Vĩnh Yên', 17),
(187, 'Thị xã Phúc Yên', 17),
(188, 'Huyện Lập Thạch', 17),
(189, 'Huyện Tam Dương', 17),
(190, 'Huyện Tam Đảo', 17),
(191, 'Huyện Bình Xuyên', 17),
(192, 'Huyện Yên Lạc', 17),
(193, 'Huyện Vĩnh Tường', 17),
(194, 'Huyện Sông Lô', 17),
(195, 'Thành phố Bắc Ninh', 18),
(196, 'Huyện Yên Phong', 18),
(197, 'Huyện Quế Võ', 18),
(198, 'Huyện Tiên Du', 18),
(199, 'Thị xã Từ Sơn', 18),
(200, 'Huyện Thuận Thành', 18),
(201, 'Huyện Gia Bình', 18),
(202, 'Huyện Lương Tài', 18),
(203, 'Thành phố Hải Dương', 19),
(204, 'Thị xã Chí Linh', 19),
(205, 'Huyện Nam Sách', 19),
(206, 'Huyện Kinh Môn', 19),
(207, 'Huyện Kim Thành', 19),
(208, 'Huyện Thanh Hà', 19),
(209, 'Huyện Cẩm Giàng', 19),
(210, 'Huyện Bình Giang', 19),
(211, 'Huyện Gia Lộc', 19),
(212, 'Huyện Tứ Kỳ', 19),
(213, 'Huyện Ninh Giang', 19),
(214, 'Huyện Thanh Miện', 19),
(215, 'Quận Hồng Bàng', 20),
(216, 'Quận Ngô Quyền', 20),
(217, 'Quận Lê Chân', 20),
(218, 'Quận Hải An', 20),
(219, 'Quận Kiến An', 20),
(220, 'Quận Đồ Sơn', 20),
(221, 'Quận Dương Kinh', 20),
(222, 'Huyện Thuỷ Nguyên', 20),
(223, 'Huyện An Dương', 20),
(224, 'Huyện An Lão', 20),
(225, 'Huyện Kiến Thuỵ', 20),
(226, 'Huyện Tiên Lãng', 20),
(227, 'Huyện Vĩnh Bảo', 20),
(228, 'Huyện Cát Hải', 20),
(229, 'Huyện Bạch Long Vĩ', 20),
(230, 'Thành phố Hưng Yên', 21),
(231, 'Huyện Văn Lâm', 21),
(232, 'Huyện Văn Giang', 21),
(233, 'Huyện Yên Mỹ', 21),
(234, 'Huyện Mỹ Hào', 21),
(235, 'Huyện Ân Thi', 21),
(236, 'Huyện Khoái Châu', 21),
(237, 'Huyện Kim Động', 21),
(238, 'Huyện Tiên Lữ', 21),
(239, 'Huyện Phù Cừ', 21),
(240, 'Thành phố Thái Bình', 22),
(241, 'Huyện Quỳnh Phụ', 22),
(242, 'Huyện Hưng Hà', 22),
(243, 'Huyện Đông Hưng', 22),
(244, 'Huyện Thái Thụy', 22),
(245, 'Huyện Tiền Hải', 22),
(246, 'Huyện Kiến Xương', 22),
(247, 'Huyện Vũ Thư', 22),
(248, 'Thành phố Phủ Lý', 23),
(249, 'Huyện Duy Tiên', 23),
(250, 'Huyện Kim Bảng', 23),
(251, 'Huyện Thanh Liêm', 23),
(252, 'Huyện Bình Lục', 23),
(253, 'Huyện Lý Nhân', 23),
(254, 'Thành phố Nam Định', 24),
(255, 'Huyện Mỹ Lộc', 24),
(256, 'Huyện Vụ Bản', 24),
(257, 'Huyện Ý Yên', 24),
(258, 'Huyện Nghĩa Hưng', 24),
(259, 'Huyện Nam Trực', 24),
(260, 'Huyện Trực Ninh', 24),
(261, 'Huyện Xuân Trường', 24),
(262, 'Huyện Giao Thủy', 24),
(263, 'Huyện Hải Hậu', 24),
(264, 'Thành phố Ninh Bình', 25),
(265, 'Thành phố Tam Điệp', 25),
(266, 'Huyện Nho Quan', 25),
(267, 'Huyện Gia Viễn', 25),
(268, 'Huyện Hoa Lư', 25),
(269, 'Huyện Yên Khánh', 25),
(270, 'Huyện Kim Sơn', 25),
(271, 'Huyện Yên Mô', 25),
(272, 'Thành phố Thanh Hóa', 26),
(273, 'Thị xã Bỉm Sơn', 26),
(274, 'Thành phố Sầm Sơn', 26),
(275, 'Huyện Mường Lát', 26),
(276, 'Huyện Quan Hóa', 26),
(277, 'Huyện Bá Thước', 26),
(278, 'Huyện Quan Sơn', 26),
(279, 'Huyện Lang Chánh', 26),
(280, 'Huyện Ngọc Lặc', 26),
(281, 'Huyện Cẩm Thủy', 26),
(282, 'Huyện Thạch Thành', 26),
(283, 'Huyện Hà Trung', 26),
(284, 'Huyện Vĩnh Lộc', 26),
(285, 'Huyện Yên Định', 26),
(286, 'Huyện Thọ Xuân', 26),
(287, 'Huyện Thường Xuân', 26),
(288, 'Huyện Triệu Sơn', 26),
(289, 'Huyện Thiệu Hóa', 26),
(290, 'Huyện Hoằng Hóa', 26),
(291, 'Huyện Hậu Lộc', 26),
(292, 'Huyện Nga Sơn', 26),
(293, 'Huyện Như Xuân', 26),
(294, 'Huyện Như Thanh', 26),
(295, 'Huyện Nông Cống', 26),
(296, 'Huyện Đông Sơn', 26),
(297, 'Huyện Quảng Xương', 26),
(298, 'Huyện Tĩnh Gia', 26),
(299, 'Thành phố Vinh', 27),
(300, 'Thị xã Cửa Lò', 27),
(301, 'Thị xã Thái Hoà', 27),
(302, 'Huyện Quế Phong', 27),
(303, 'Huyện Quỳ Châu', 27),
(304, 'Huyện Kỳ Sơn', 27),
(305, 'Huyện Tương Dương', 27),
(306, 'Huyện Nghĩa Đàn', 27),
(307, 'Huyện Quỳ Hợp', 27),
(308, 'Huyện Quỳnh Lưu', 27),
(309, 'Huyện Con Cuông', 27),
(310, 'Huyện Tân Kỳ', 27),
(311, 'Huyện Anh Sơn', 27),
(312, 'Huyện Diễn Châu', 27),
(313, 'Huyện Yên Thành', 27),
(314, 'Huyện Đô Lương', 27),
(315, 'Huyện Thanh Chương', 27),
(316, 'Huyện Nghi Lộc', 27),
(317, 'Huyện Nam Đàn', 27),
(318, 'Huyện Hưng Nguyên', 27),
(319, 'Thị xã Hoàng Mai', 27),
(320, 'Thành phố Hà Tĩnh', 28),
(321, 'Thị xã Hồng Lĩnh', 28),
(322, 'Huyện Hương Sơn', 28),
(323, 'Huyện Đức Thọ', 28),
(324, 'Huyện Vũ Quang', 28),
(325, 'Huyện Nghi Xuân', 28),
(326, 'Huyện Can Lộc', 28),
(327, 'Huyện Hương Khê', 28),
(328, 'Huyện Thạch Hà', 28),
(329, 'Huyện Cẩm Xuyên', 28),
(330, 'Huyện Kỳ Anh', 28),
(331, 'Huyện Lộc Hà', 28),
(332, 'Thị xã Kỳ Anh', 28),
(333, 'Thành Phố Đồng Hới', 29),
(334, 'Huyện Minh Hóa', 29),
(335, 'Huyện Tuyên Hóa', 29),
(336, 'Huyện Quảng Trạch', 29),
(337, 'Huyện Bố Trạch', 29),
(338, 'Huyện Quảng Ninh', 29),
(339, 'Huyện Lệ Thủy', 29),
(340, 'Thị xã Ba Đồn', 29),
(341, 'Thành phố Đông Hà', 30),
(342, 'Thị xã Quảng Trị', 30),
(343, 'Huyện Vĩnh Linh', 30),
(344, 'Huyện Hướng Hóa', 30),
(345, 'Huyện Gio Linh', 30),
(346, 'Huyện Đa Krông', 30),
(347, 'Huyện Cam Lộ', 30),
(348, 'Huyện Triệu Phong', 30),
(349, 'Huyện Hải Lăng', 30),
(350, 'Huyện Cồn Cỏ', 30),
(351, 'Thành phố Huế', 31),
(352, 'Huyện Phong Điền', 31),
(353, 'Huyện Quảng Điền', 31),
(354, 'Huyện Phú Vang', 31),
(355, 'Thị xã Hương Thủy', 31),
(356, 'Thị xã Hương Trà', 31),
(357, 'Huyện A Lưới', 31),
(358, 'Huyện Phú Lộc', 31),
(359, 'Huyện Nam Đông', 31),
(360, 'Quận Liên Chiểu', 32),
(361, 'Quận Thanh Khê', 32),
(362, 'Quận Hải Châu', 32),
(363, 'Quận Sơn Trà', 32),
(364, 'Quận Ngũ Hành Sơn', 32),
(365, 'Quận Cẩm Lệ', 32),
(366, 'Huyện Hòa Vang', 32),
(367, 'Huyện Hoàng Sa', 32),
(368, 'Thành phố Tam Kỳ', 33),
(369, 'Thành phố Hội An', 33),
(370, 'Huyện Tây Giang', 33),
(371, 'Huyện Đông Giang', 33),
(372, 'Huyện Đại Lộc', 33),
(373, 'Thị xã Điện Bàn', 33),
(374, 'Huyện Duy Xuyên', 33),
(375, 'Huyện Quế Sơn', 33),
(376, 'Huyện Nam Giang', 33),
(377, 'Huyện Phước Sơn', 33),
(378, 'Huyện Hiệp Đức', 33),
(379, 'Huyện Thăng Bình', 33),
(380, 'Huyện Tiên Phước', 33),
(381, 'Huyện Bắc Trà My', 33),
(382, 'Huyện Nam Trà My', 33),
(383, 'Huyện Núi Thành', 33),
(384, 'Huyện Phú Ninh', 33),
(385, 'Huyện Nông Sơn', 33),
(386, 'Thành phố Quảng Ngãi', 34),
(387, 'Huyện Bình Sơn', 34),
(388, 'Huyện Trà Bồng', 34),
(389, 'Huyện Tây Trà', 34),
(390, 'Huyện Sơn Tịnh', 34),
(391, 'Huyện Tư Nghĩa', 34),
(392, 'Huyện Sơn Hà', 34),
(393, 'Huyện Sơn Tây', 34),
(394, 'Huyện Minh Long', 34),
(395, 'Huyện Nghĩa Hành', 34),
(396, 'Huyện Mộ Đức', 34),
(397, 'Huyện Đức Phổ', 34),
(398, 'Huyện Ba Tơ', 34),
(399, 'Huyện Lý Sơn', 34),
(400, 'Thành phố Qui Nhơn', 35),
(401, 'Huyện An Lão', 35),
(402, 'Huyện Hoài Nhơn', 35),
(403, 'Huyện Hoài Ân', 35),
(404, 'Huyện Phù Mỹ', 35),
(405, 'Huyện Vĩnh Thạnh', 35),
(406, 'Huyện Tây Sơn', 35),
(407, 'Huyện Phù Cát', 35),
(408, 'Thị xã An Nhơn', 35),
(409, 'Huyện Tuy Phước', 35),
(410, 'Huyện Vân Canh', 35),
(411, 'Thành phố Tuy Hoà', 36),
(412, 'Thị xã Sông Cầu', 36),
(413, 'Huyện Đồng Xuân', 36),
(414, 'Huyện Tuy An', 36),
(415, 'Huyện Sơn Hòa', 36),
(416, 'Huyện Sông Hinh', 36),
(417, 'Huyện Tây Hoà', 36),
(418, 'Huyện Phú Hoà', 36),
(419, 'Huyện Đông Hòa', 36),
(420, 'Thành phố Nha Trang', 37),
(421, 'Thành phố Cam Ranh', 37),
(422, 'Huyện Cam Lâm', 37),
(423, 'Huyện Vạn Ninh', 37),
(424, 'Thị xã Ninh Hòa', 37),
(425, 'Huyện Khánh Vĩnh', 37),
(426, 'Huyện Diên Khánh', 37),
(427, 'Huyện Khánh Sơn', 37),
(428, 'Huyện Trường Sa', 37),
(429, 'Thành phố Phan Rang-Tháp Chàm', 38),
(430, 'Huyện Bác Ái', 38),
(431, 'Huyện Ninh Sơn', 38),
(432, 'Huyện Ninh Hải', 38),
(433, 'Huyện Ninh Phước', 38),
(434, 'Huyện Thuận Bắc', 38),
(435, 'Huyện Thuận Nam', 38),
(436, 'Thành phố Phan Thiết', 39),
(437, 'Thị xã La Gi', 39),
(438, 'Huyện Tuy Phong', 39),
(439, 'Huyện Bắc Bình', 39),
(440, 'Huyện Hàm Thuận Bắc', 39),
(441, 'Huyện Hàm Thuận Nam', 39),
(442, 'Huyện Tánh Linh', 39),
(443, 'Huyện Đức Linh', 39),
(444, 'Huyện Hàm Tân', 39),
(445, 'Huyện Phú Quí', 39),
(446, 'Thành phố Kon Tum', 40),
(447, 'Huyện Đắk Glei', 40),
(448, 'Huyện Ngọc Hồi', 40),
(449, 'Huyện Đắk Tô', 40),
(450, 'Huyện Kon Plông', 40),
(451, 'Huyện Kon Rẫy', 40),
(452, 'Huyện Đắk Hà', 40),
(453, 'Huyện Sa Thầy', 40),
(454, 'Huyện Tu Mơ Rông', 40),
(455, 'Huyện Ia H\' Drai', 40),
(456, 'Thành phố Pleiku', 41),
(457, 'Thị xã An Khê', 41),
(458, 'Thị xã Ayun Pa', 41),
(459, 'Huyện KBang', 41),
(460, 'Huyện Đăk Đoa', 41),
(461, 'Huyện Chư Păh', 41),
(462, 'Huyện Ia Grai', 41),
(463, 'Huyện Mang Yang', 41),
(464, 'Huyện Kông Chro', 41),
(465, 'Huyện Đức Cơ', 41),
(466, 'Huyện Chư Prông', 41),
(467, 'Huyện Chư Sê', 41),
(468, 'Huyện Đăk Pơ', 41),
(469, 'Huyện Ia Pa', 41),
(470, 'Huyện Krông Pa', 41),
(471, 'Huyện Phú Thiện', 41),
(472, 'Huyện Chư Pưh', 41),
(473, 'Thành phố Buôn Ma Thuột', 42),
(474, 'Thị Xã Buôn Hồ', 42),
(475, 'Huyện Ea H\'leo', 42),
(476, 'Huyện Ea Súp', 42),
(477, 'Huyện Buôn Đôn', 42),
(478, 'Huyện Cư M\'gar', 42),
(479, 'Huyện Krông Búk', 42),
(480, 'Huyện Krông Năng', 42),
(481, 'Huyện Ea Kar', 42),
(482, 'Huyện M\'Đrắk', 42),
(483, 'Huyện Krông Bông', 42),
(484, 'Huyện Krông Pắc', 42),
(485, 'Huyện Krông A Na', 42),
(486, 'Huyện Lắk', 42),
(487, 'Huyện Cư Kuin', 42),
(488, 'Thị xã Gia Nghĩa', 43),
(489, 'Huyện Đăk Glong', 43),
(490, 'Huyện Cư Jút', 43),
(491, 'Huyện Đắk Mil', 43),
(492, 'Huyện Krông Nô', 43),
(493, 'Huyện Đắk Song', 43),
(494, 'Huyện Đắk R\'Lấp', 43),
(495, 'Huyện Tuy Đức', 43),
(496, 'Thành phố Đà Lạt', 44),
(497, 'Thành phố Bảo Lộc', 44),
(498, 'Huyện Đam Rông', 44),
(499, 'Huyện Lạc Dương', 44),
(500, 'Huyện Lâm Hà', 44),
(501, 'Huyện Đơn Dương', 44),
(502, 'Huyện Đức Trọng', 44),
(503, 'Huyện Di Linh', 44),
(504, 'Huyện Bảo Lâm', 44),
(505, 'Huyện Đạ Huoai', 44),
(506, 'Huyện Đạ Tẻh', 44),
(507, 'Huyện Cát Tiên', 44),
(508, 'Thị xã Phước Long', 45),
(509, 'Thị xã Đồng Xoài', 45),
(510, 'Thị xã Bình Long', 45),
(511, 'Huyện Bù Gia Mập', 45),
(512, 'Huyện Lộc Ninh', 45),
(513, 'Huyện Bù Đốp', 45),
(514, 'Huyện Hớn Quản', 45),
(515, 'Huyện Đồng Phú', 45),
(516, 'Huyện Bù Đăng', 45),
(517, 'Huyện Chơn Thành', 45),
(518, 'Huyện Phú Riềng', 45),
(519, 'Thành phố Tây Ninh', 46),
(520, 'Huyện Tân Biên', 46),
(521, 'Huyện Tân Châu', 46),
(522, 'Huyện Dương Minh Châu', 46),
(523, 'Huyện Châu Thành', 46),
(524, 'Huyện Hòa Thành', 46),
(525, 'Huyện Gò Dầu', 46),
(526, 'Huyện Bến Cầu', 46),
(527, 'Huyện Trảng Bàng', 46),
(528, 'Thành phố Thủ Dầu Một', 47),
(529, 'Huyện Bàu Bàng', 47),
(530, 'Huyện Dầu Tiếng', 47),
(531, 'Thị xã Bến Cát', 47),
(532, 'Huyện Phú Giáo', 47),
(533, 'Thị xã Tân Uyên', 47),
(534, 'Thị xã Dĩ An', 47),
(535, 'Thị xã Thuận An', 47),
(536, 'Huyện Bắc Tân Uyên', 47),
(537, 'Thành phố Biên Hòa', 48),
(538, 'Thị xã Long Khánh', 48),
(539, 'Huyện Tân Phú', 48),
(540, 'Huyện Vĩnh Cửu', 48),
(541, 'Huyện Định Quán', 48),
(542, 'Huyện Trảng Bom', 48),
(543, 'Huyện Thống Nhất', 48),
(544, 'Huyện Cẩm Mỹ', 48),
(545, 'Huyện Long Thành', 48),
(546, 'Huyện Xuân Lộc', 48),
(547, 'Huyện Nhơn Trạch', 48),
(548, 'Thành phố Vũng Tàu', 49),
(549, 'Thành phố Bà Rịa', 49),
(550, 'Huyện Châu Đức', 49),
(551, 'Huyện Xuyên Mộc', 49),
(552, 'Huyện Long Điền', 49),
(553, 'Huyện Đất Đỏ', 49),
(554, 'Huyện Tân Thành', 49),
(555, 'Huyện Côn Đảo', 49),
(556, 'Quận 1', 50),
(557, 'Quận 12', 50),
(558, 'Quận Thủ Đức', 50),
(559, 'Quận 9', 50),
(560, 'Quận Gò Vấp', 50),
(561, 'Quận Bình Thạnh', 50),
(562, 'Quận Tân Bình', 50),
(563, 'Quận Tân Phú', 50),
(564, 'Quận Phú Nhuận', 50),
(565, 'Quận 2', 50),
(566, 'Quận 3', 50),
(567, 'Quận 10', 50),
(568, 'Quận 11', 50),
(569, 'Quận 4', 50),
(570, 'Quận 5', 50),
(571, 'Quận 6', 50),
(572, 'Quận 8', 50),
(573, 'Quận Bình Tân', 50),
(574, 'Quận 7', 50),
(575, 'Huyện Củ Chi', 50),
(576, 'Huyện Hóc Môn', 50),
(577, 'Huyện Bình Chánh', 50),
(578, 'Huyện Nhà Bè', 50),
(579, 'Huyện Cần Giờ', 50),
(580, 'Thành phố Tân An', 51),
(581, 'Thị xã Kiến Tường', 51),
(582, 'Huyện Tân Hưng', 51),
(583, 'Huyện Vĩnh Hưng', 51),
(584, 'Huyện Mộc Hóa', 51),
(585, 'Huyện Tân Thạnh', 51),
(586, 'Huyện Thạnh Hóa', 51),
(587, 'Huyện Đức Huệ', 51),
(588, 'Huyện Đức Hòa', 51),
(589, 'Huyện Bến Lức', 51),
(590, 'Huyện Thủ Thừa', 51),
(591, 'Huyện Tân Trụ', 51),
(592, 'Huyện Cần Đước', 51),
(593, 'Huyện Cần Giuộc', 51),
(594, 'Huyện Châu Thành', 51),
(595, 'Thành phố Mỹ Tho', 52),
(596, 'Thị xã Gò Công', 52),
(597, 'Thị xã Cai Lậy', 52),
(598, 'Huyện Tân Phước', 52),
(599, 'Huyện Cái Bè', 52),
(600, 'Huyện Cai Lậy', 52),
(601, 'Huyện Châu Thành', 52),
(602, 'Huyện Chợ Gạo', 52),
(603, 'Huyện Gò Công Tây', 52),
(604, 'Huyện Gò Công Đông', 52),
(605, 'Huyện Tân Phú Đông', 52),
(606, 'Thành phố Bến Tre', 53),
(607, 'Huyện Châu Thành', 53),
(608, 'Huyện Chợ Lách', 53),
(609, 'Huyện Mỏ Cày Nam', 53),
(610, 'Huyện Giồng Trôm', 53),
(611, 'Huyện Bình Đại', 53),
(612, 'Huyện Ba Tri', 53),
(613, 'Huyện Thạnh Phú', 53),
(614, 'Huyện Mỏ Cày Bắc', 53),
(615, 'Thành phố Trà Vinh', 54),
(616, 'Huyện Càng Long', 54),
(617, 'Huyện Cầu Kè', 54),
(618, 'Huyện Tiểu Cần', 54),
(619, 'Huyện Châu Thành', 54),
(620, 'Huyện Cầu Ngang', 54),
(621, 'Huyện Trà Cú', 54),
(622, 'Huyện Duyên Hải', 54),
(623, 'Thị xã Duyên Hải', 54),
(624, 'Thành phố Vĩnh Long', 55),
(625, 'Huyện Long Hồ', 55),
(626, 'Huyện Mang Thít', 55),
(627, 'Huyện Vũng Liêm', 55),
(628, 'Huyện Tam Bình', 55),
(629, 'Thị xã Bình Minh', 55),
(630, 'Huyện Trà Ôn', 55),
(631, 'Huyện Bình Tân', 55),
(632, 'Thành phố Cao Lãnh', 56),
(633, 'Thành phố Sa Đéc', 56),
(634, 'Thị xã Hồng Ngự', 56),
(635, 'Huyện Tân Hồng', 56),
(636, 'Huyện Hồng Ngự', 56),
(637, 'Huyện Tam Nông', 56),
(638, 'Huyện Tháp Mười', 56),
(639, 'Huyện Cao Lãnh', 56),
(640, 'Huyện Thanh Bình', 56),
(641, 'Huyện Lấp Vò', 56),
(642, 'Huyện Lai Vung', 56),
(643, 'Huyện Châu Thành', 56),
(644, 'Thành phố Long Xuyên', 57),
(645, 'Thành phố Châu Đốc', 57),
(646, 'Huyện An Phú', 57),
(647, 'Thị xã Tân Châu', 57),
(648, 'Huyện Phú Tân', 57),
(649, 'Huyện Châu Phú', 57),
(650, 'Huyện Tịnh Biên', 57),
(651, 'Huyện Tri Tôn', 57),
(652, 'Huyện Châu Thành', 57),
(653, 'Huyện Chợ Mới', 57),
(654, 'Huyện Thoại Sơn', 57),
(655, 'Thành phố Rạch Giá', 58),
(656, 'Thị xã Hà Tiên', 58),
(657, 'Huyện Kiên Lương', 58),
(658, 'Huyện Hòn Đất', 58),
(659, 'Huyện Tân Hiệp', 58),
(660, 'Huyện Châu Thành', 58),
(661, 'Huyện Giồng Riềng', 58),
(662, 'Huyện Gò Quao', 58),
(663, 'Huyện An Biên', 58),
(664, 'Huyện An Minh', 58),
(665, 'Huyện Vĩnh Thuận', 58),
(666, 'Huyện Phú Quốc', 58),
(667, 'Huyện Kiên Hải', 58),
(668, 'Huyện U Minh Thượng', 58),
(669, 'Huyện Giang Thành', 58),
(670, 'Quận Ninh Kiều', 59),
(671, 'Quận Ô Môn', 59),
(672, 'Quận Bình Thuỷ', 59),
(673, 'Quận Cái Răng', 59),
(674, 'Quận Thốt Nốt', 59),
(675, 'Huyện Vĩnh Thạnh', 59),
(676, 'Huyện Cờ Đỏ', 59),
(677, 'Huyện Phong Điền', 59),
(678, 'Huyện Thới Lai', 59),
(679, 'Thành phố Vị Thanh', 60),
(680, 'Thị xã Ngã Bảy', 60),
(681, 'Huyện Châu Thành A', 60),
(682, 'Huyện Châu Thành', 60),
(683, 'Huyện Phụng Hiệp', 60),
(684, 'Huyện Vị Thuỷ', 60),
(685, 'Huyện Long Mỹ', 60),
(686, 'Thị xã Long Mỹ', 60),
(687, 'Thành phố Sóc Trăng', 61),
(688, 'Huyện Châu Thành', 61),
(689, 'Huyện Kế Sách', 61),
(690, 'Huyện Mỹ Tú', 61),
(691, 'Huyện Cù Lao Dung', 61),
(692, 'Huyện Long Phú', 61),
(693, 'Huyện Mỹ Xuyên', 61),
(694, 'Thị xã Ngã Năm', 61),
(695, 'Huyện Thạnh Trị', 61),
(696, 'Thị xã Vĩnh Châu', 61),
(697, 'Huyện Trần Đề', 61),
(698, 'Thành phố Bạc Liêu', 62),
(699, 'Huyện Hồng Dân', 62),
(700, 'Huyện Phước Long', 62),
(701, 'Huyện Vĩnh Lợi', 62),
(702, 'Thị xã Giá Rai', 62),
(703, 'Huyện Đông Hải', 62),
(704, 'Huyện Hoà Bình', 62),
(705, 'Thành phố Cà Mau', 63),
(706, 'Huyện U Minh', 63),
(707, 'Huyện Thới Bình', 63),
(708, 'Huyện Trần Văn Thời', 63),
(709, 'Huyện Cái Nước', 63),
(710, 'Huyện Đầm Dơi', 63),
(711, 'Huyện Năm Căn', 63),
(712, 'Huyện Phú Tân', 63),
(713, 'Huyện Ngọc Hiển', 63);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `payment` varchar(11) NOT NULL DEFAULT 'COD',
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `province_id`, `district_id`, `amount`, `payment`, `note`, `created_at`, `updated_at`, `status`) VALUES
(2, NULL, 'tathiphuonganh', 'anhpt@gmail.com', '0154875545', '180 Trần Khát Chân', 22, 358, '1000000 ', 'COD', '', '2018-04-30 17:00:00', '2018-05-02 00:00:00', 0),
(20, 12, 'sdcasdasd ', 'czxczxczc@gmail.com', '0123456789', 'abc', 20, 145, '162900000', 'COD', 'xcvxcvxvds', '2018-07-11 17:00:00', '2018-07-12 00:00:00', 1),
(31, 12, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 18, 196, '29990000 ', 'COD', 'Chưa có lưu ý', '2018-07-11 17:00:00', '2018-07-12 00:00:00', 1),
(33, 12, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 18, 196, '29990000 ', 'COD', 'Chưa có lưu ý', '2018-07-11 17:00:00', '2018-07-12 00:00:00', 1),
(34, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 18, 196, '335860000 ', 'COD', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(35, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 18, 196, '335860000 ', 'COD', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(36, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 17, 187, '335860000 ', 'COD', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(37, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 1, 2, '335860000 ', 'ATM', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(38, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 3, 43, '335860000 ', 'ATM', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(49, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 1, 2, '489090000', 'ATM', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-11-11 12:34:46', 1),
(50, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 4, 56, '489090000 ', 'COD', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(52, NULL, 'Huy Cảnh', 'huycanh14@gmail.com', '165757215', 'Xóm 2, xã Mỹ Hưng', 5, 64, '489090000', 'COD', 'Chưa có lưu ý', '2018-07-12 17:00:00', '2018-07-13 00:00:00', 1),
(53, 13, 'Đặng Huy Cảnh', 'canhhuy@gmail.com', '09876453627', '347 Cổ Nhuế', 1, 15, '33480000', 'COD', '', '2018-11-14 10:37:17', '2018-11-14 17:37:17', 1),
(54, 13, 'Đặng Huy Cảnh', 'canhhuy@gmail.com', '09876453627', '347 Cổ Nhuế', 1, 15, '3490000', 'COD', '', '2018-11-14 10:44:55', '2018-11-14 17:44:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `qty`) VALUES
(2, 2, 1, '100000', 3),
(3, 2, 1, '100000', 7),
(11, 20, 1, '54300000', 1),
(12, 20, 51, '54300000', 1),
(13, 20, 6, '54300000', 1),
(17, 31, 5, '29990000', 1),
(19, 33, 5, '29990000', 1),
(20, 34, 3, '23990000', 14),
(21, 35, 3, '23990000', 14),
(22, 36, 3, '23990000', 14),
(23, 37, 3, '23990000', 14),
(24, 38, 3, '23990000', 14),
(25, 49, 3, '23990000', 14),
(26, 49, 5, '29990000', 3),
(28, 49, 16, '7990000', 1),
(29, 49, 15, '6990000', 1),
(30, 49, 19, '13490000', 1),
(31, 49, 4, '34790000', 1),
(32, 50, 3, '23990000', 14),
(33, 50, 5, '29990000', 3),
(35, 50, 16, '7990000', 1),
(36, 50, 15, '6990000', 1),
(37, 50, 19, '13490000', 1),
(38, 50, 4, '34790000', 1),
(39, 52, 3, '23990000', 14),
(40, 52, 5, '29990000', 3),
(42, 52, 16, '7990000', 1),
(43, 52, 15, '6990000', 1),
(44, 52, 19, '13490000', 1),
(45, 52, 4, '34790000', 1),
(46, 53, 5, '29990000', 1),
(47, 53, 21, '3490000', 1),
(48, 54, 21, '3490000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `qty` float NOT NULL DEFAULT '0',
  `brand_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `description` text,
  `content` text,
  `views` int(11) DEFAULT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_sale` int(11) NOT NULL DEFAULT '0',
  `is_featured` int(11) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `colors`, `qty`, `brand_id`, `product_category_id`, `description`, `content`, `views`, `is_new`, `is_sale`, `is_featured`, `created_at`, `updated_at`, `status`) VALUES
(1, 'iPhone 8 Plus RED', 'iphone-8-plus-256G-product-red', '28790000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 1250, 1, 0, 1, '2018-02-06', '2018-04-18', 1),
(2, 'iPhone 8 Plus 64GB', 'iphone-8-plus-64gb', '23990000', 'đỏ, trắng, đen, xám', 100, 1, 1, '', '', 1425, 1, 0, 1, '2018-02-06', '2018-04-18', 1),
(3, 'iPhone 8 Plus 64GB PRODUCT RED', 'iphone-8-plus-64gb-product-red', '23990000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 45870, 1, 0, 1, '2018-02-06', '2018-04-18', 1),
(4, 'iPhone X 256GB', 'iphone-x-256gb', '34790000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 14500, 1, 0, 1, '2018-02-06', '2018-04-18', 1),
(5, 'iPhone X 64GB ', 'iphone-x', '29990000', 'đỏ, trắng, đen, xám', 100, 1, 1, '<h2 align=\"center\">  Đánh giá chi tiết iPhone X 64GB </h2>\r\n<p> Đã lâu lắm rồi Apple mới ra mắt một sản phẩm với thiết kế đột phá và liều lĩnh. Dù vấp phải khá nhiều ý kiến trái chiều nhưng cũng không thể phủ nhận độ hấp dẫn của chiếc iPhone thế hệ thứ 10 này. Công nghệ bảo mật mới, loại bỏ nút home truyền thống, camera với những tính năng độc quyền, tất cả đã khiến người dùng đứng ngồi không yên cho đến khi được trên tay. </p>\r\n<br>\r\n<b>iPhone X 64GB có thiết kế lột xác hoàn toàn </b> <br>\r\n<p>iPhone X 64GB đã lột xác hoàn toàn với việc loại bỏ nút Home truyền thống, màn hình tràn viền và camera kép ở phía sau đã được đặt lại vị trí theo chiều dọc. Khung viền từ thép sáng bóng bền bỉ và mặt lưng kính với các góc bo tròn dễ dàng cầm nắm. Có thể nói đây là một thiết kế khá đột phá mà lâu lắm rồi Apple mới thể hiện lại. Người dùng cần phải trên tay thì mới cảm nhận được hết nét tinh tế và sang trọng của sản phẩm.</p><br>\r\n<b>Màn hình của iPhone X 64GB hiển thị đẹp hơn</b> <br>\r\n<p>iPhone X 64GB là chiếc smartphone đầu tiên được Apple ưu ái cho tấm nền màn hình OLED, kích thước 5.8 inch và độ phân giải đạt chuẩn Super Retina HD, Điều này giúp cho màn hình có màu sắc sống động, góc nhìn rộng hơn, cải thiện độ sáng và tốn ít điện năng hơn. Bên cạnh đó, công nghệ True Tone còn giúp màu sắc trở nên cực kì trung thực.\r\n\r\n </p>\r\n', '<h2>Cấu hình sản phẩm: </h2><br>\r\n\r\nMàn Hình: 5.8 inchs OLED <br>\r\nCamera: 7.0 MP/ Dual 12.0 MP <br>\r\nPin: 2716 mAh, Li-Ion battery <br>\r\nRam: 3 GB <br> \r\nCPU: Apple A11 Bionic <br> \r\nHĐH: iOS 11 <br>', 24780, 1, 0, 1, '2018-02-06', '2018-04-18', 1),
(6, 'iPhone 6 32GB (2017)', 'iphone-6-32gb', '7499000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 45600, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(7, 'iPhone 6s Plus 32GB', 'iphone-6s-plus-32gb', '13999000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 124, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(8, 'iPhone 8 256GB', 'iphone-8-256gb', '25790000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 47840, 1, 0, 1, '2018-02-06', '2018-04-18', 1),
(9, 'iPhone 7 Plus 32GB', 'iphone-7-plus', '19999000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, '', 1245, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(10, 'iPhone 7 32GB', 'iphone-7', '15999000', 'đỏ, trắng, đen, xám', 100, 1, 1, NULL, NULL, 3214, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(11, 'Sony Xperia L1 Dual', 'sony-xperia-l1-dual', '3590000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 48712, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(12, 'Sony Xperia L2', 'sony-xperia-l2', '4990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 4245, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(13, 'Sony Xperia XA1 Plus', 'sony-xperia-xa1-plus', '5990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 45214, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(14, 'Sony Xperia XA1 Ultra', 'sony-xperia-xa1-ultra', '6990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 1212, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(15, 'Sony Xperia XA Ultra', 'sony-xperia-xa-ultra', '6990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 475400, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(16, 'Sony Xperia X', 'sony-xperia-x', '7990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 121400, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(17, 'Sony Xperia XZs', 'sony-xperia-xzs', '9990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 1235, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(18, 'Sony Xperia XZ1', 'sony-xperia-xz1', '11990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 1247, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(19, 'Sony Xperia XZ Premium Pink Gold', 'sony-xperia-xz-premium-pink-gold', '13490000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 1244000, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(20, 'Sony Xperia XZ Premium', 'sony-xperia-xz-premium', '14990000', 'đỏ, trắng, đen, xám', 100, 2, 1, NULL, NULL, 50000, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(21, 'Asus Zenfone 4 Max', 'asus-zenfone-4-max', '3490000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, NULL, 1, 1, 1, '2018-02-06', '2018-04-18', 1),
(22, 'Asus Zenfone 4 Max Pro', 'asus-zenfone-4-max-pro', '4690000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(23, 'Asus Zenfone Max Plus M1', 'asus-zenfone-max-plus-m1', '4990000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(24, 'ASUS Zenfone Max Plus M1 - ZB570TL', 'asus-zenfone-max-plus-m1-zb570tl', '4990000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(25, 'Asus Zenfone 4 Max Pro ZC554KL', 'asus-zenfone-4-max-pro-zc554kl', '4690000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, NULL, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(26, 'Asus Zenfone 4 Max ZC520KL', 'asus-zenfone-4-max-zc520kl', '3490000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, 1241, 127, 0, 1, '2018-02-06', '2018-04-18', 1),
(27, 'Asus Zenfone Live ZB501KL', 'asus-zenfone-live-zb501kl', '2990000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, 1245, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(28, 'Asus Zenfone 5', 'asus-zenfone-5', '7990000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, 1242, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(29, 'Asus Zenfone 3 Max 5.5\" - ZC553KL', 'asus-zenfone-3-max-5-5-zc553kl', '4379000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, 1245, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(30, 'Asus Zenfone 3 - ZE552KL', 'asus-zenfone-3-ze552kl', '8179000', 'đỏ, trắng, đen, xám', 100, 3, 1, NULL, NULL, 4541, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(31, 'Xiaomi Redmi Note 4 32GB', 'xiaomi-redmi-note-4-32gb', '4290000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 1478, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(32, 'Xiaomi Redmi Note 5 32GB', 'xiaomi-redmi-note-5', '4799000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 1236, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(33, 'Xiaomi Mi A1 32GB', 'xiaomi-mi-a1-32gb', '4990000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 1478, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(34, 'Xiaomi Mi A1', 'xiaomi-mi-a1', '549000000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 0, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(35, 'Xiaomi Redmi S2 32GB', 'xiaomi-redmi-s2', '567000000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 14587, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(36, 'Xiaomi Redmi Note 5 a Prime', 'xiaomi-redmi-note-5a-prime', '3690000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 1121, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(37, 'Xiaomi Redmi 4X', 'xiaomi-redmi-4x', '3690000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 2134, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(38, 'Xiaomi Redmi 5 Plus', 'xiaomi-redmi-5-plus', '3999000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 1241, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(39, 'Xiaomi Redmi Note 5A', 'xiaomi-redmi-note-5a', '2990000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 2144, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(40, 'Xiaomi Redmi 5A 16GB Ram 2GB ', 'xiaomi-redmi-5a-16gb-ram-2gb', '1990000', 'đỏ, trắng, đen, xám', 100, 4, 1, NULL, NULL, 1256, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(41, 'Samsung Galaxy S8 Plus Orchid Gray', 'samsung-galaxy-s8-plus-orchid-gray', '17990000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(42, 'Samsung Galaxy S8 Plus', 'samsung-galaxy-s8-plus', '17990000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(43, 'Samsung Galaxy Note 8 Orchid Grey ', 'samsung-galaxy-note-8-orchid-grey', '22490000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(44, 'Samsung Galaxy S9+ 128GB', 'samsung-galaxy-s9-plus-128gb', '24990000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(45, 'Samsung Galaxy S9+ Lilac Purple 128GB ', 'samsung-galaxy-s9-plus-lilac-purple', '24990000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(46, 'Samsung Galaxy J7+', 'samsung-galaxy-j7-plus', '7290000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(47, 'Samsung Galaxy J3 Pro', 'samsung-galaxy-j3-pro', '3990000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(48, 'Samsung Galaxy J7 Pro', 'samsung-galaxy-j7-pro', '6090000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(49, 'Samsung Galaxy A8 (2018)', 'samsung-galaxy-a8-2018', '10990000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(50, 'Samsung Galaxy A8+ (2018)', 'samsung-galaxy-a8-plus-2018', '13490000', 'đỏ, trắng, đen, xám', 100, 5, 1, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(51, 'Usb 3.0 32GB Kingston Data Traveler 100G3 Black', 'Usb 3.0 32GB Kingston Data Traveler 100G3 Black', '390000', 'đỏ, trắng, đen, xám', 100, 6, 3, NULL, NULL, 1245, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(52, 'USB 3.0 16Gb Kingston 101G3', 'usb-30-16gb-kingston-101g3', '250000', 'đỏ, trắng, đen, xám', 100, 6, 3, NULL, NULL, 1245, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(53, 'Thẻ nhớ MicroSD 64GB Kingston C10', 'the-nho-microsd-64gb-kingston-c10', '790000', 'đỏ, trắng, đen, xám', 100, 6, 3, NULL, NULL, 124, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(54, 'Thẻ nhớ MicroSD 8GB Kingston Class 4', 'the-nho-microsd-8gb-kingston-class-4', '170000', 'đỏ, trắng, đen, xám', 100, 6, 3, NULL, NULL, 1465, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(55, 'Thẻ nhớ MicroSD 16GB Kingston', 'the-nho-microsd-16gb-kingston-sdchc-class-4', '270000', 'đỏ, trắng, đen, xám', 100, 6, 3, NULL, NULL, 1435, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(56, 'Tai nghe choàng đầu Unik S416', 'tai-nghe-choang-dau-unik-s416', '249000', 'đỏ, trắng, đen, xám', 100, 7, 4, NULL, NULL, 1247, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(57, 'Tai nghe choàng đầu Unik S448', 'tai-nghe-choang-dau-unik-s448', '249000', 'đỏ, trắng, đen, xám', 100, 7, 4, NULL, NULL, 1248, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(58, 'Tai nghe có mic Unik S810', 'tai-nghe-co-mic-unik-s810', '150000', 'đỏ, trắng, đen, xám', 100, 7, 4, NULL, NULL, 523, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(59, 'Tai nghe có mic Unik S704', 'tai-nghe-co-mic-unik-s704', '150000', 'đỏ, trắng, đen, xám', 100, 7, 4, NULL, NULL, 154, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(60, 'Tai nghe choàng đầu có MIC Bluetooth Unik BT05', 'tai-nghe-choang-dau-co-mic-bluetooth-unik-bt05', '599000', 'đỏ, trắng, đen, xám', 100, 7, 4, NULL, NULL, 1254, 0, 1, 1, '2018-02-06', '2018-04-18', 1),
(61, 'Sạc điện thoại liền cáp 1m Icore 1A', 'sac-dien-thoai-lien-cap-1m-icore-1a', '100000', 'đỏ, trắng, đen, xám', 100, 8, 6, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(62, 'Sạc ĐT USB Icore 1 cổng 1A cho ĐT', 'sac-dt-usb-icore-1-cong-1a-cho-dt', '100000', 'đỏ, trắng, đen, xám', 100, 8, 6, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(63, 'Sạc ĐT liền cáp micro usb Icore', 'sac-dt-lien-cap-micro-usb-icore', '80000', 'đỏ, trắng, đen, xám', 100, 8, 6, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(64, 'Cáp Lightning MFI Icore 1m', 'Cap-Lightning-MFI-Icore-1m', '180000', 'đỏ, trắng, đen, xám', 100, 8, 6, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(65, 'Cáp Micro Usb Icore 1m', 'cap-micro-usb-icore-1m', '80000', 'đỏ, trắng, đen, xám', 100, 8, 6, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(66, 'Sạc dự phòng Icore 10000mAh (polymer)', 'sac-du-phong-icore-10000mah-polymer', '450000', 'đỏ, trắng, đen, xám', 100, 8, 7, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(67, 'Sạc dự phòng Icore 5000mAh', 'Sac-du-phong-Icore-5000mAh', '190000', 'đỏ, trắng, đen, xám', 100, 8, 7, NULL, NULL, NULL, 0, 0, 1, '2018-02-06', '2018-04-18', 1),
(71, 'Nước hoa Pháp 3', 'nuoc-hoa-phap-3', '23456', 'xanh', 4, 4, 6, NULL, NULL, NULL, 1, 1, 1, '2018-11-09', '2018-11-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', 'Điện thoại', 1, '2018-11-09 02:04:45', '0000-00-00 00:00:00'),
(3, 'Thẻ nhớ', 'the-nho', 'Thẻ nhớ điện thoại', 1, '2018-11-09 02:04:45', '0000-00-00 00:00:00'),
(4, 'Tai nghe', 'tai-nghe', 'Tai nghe điện thoại', 1, '2018-11-09 02:04:45', '0000-00-00 00:00:00'),
(5, 'Bao da ốp lưng', 'bao-da-op-lung', 'Bao da ốp lưng điện thoại', 1, '2018-11-09 02:04:45', '0000-00-00 00:00:00'),
(6, 'Sạc cáp', 'sac-cap', 'Sạc cáp điện thoại', 1, '2018-11-09 02:04:45', '0000-00-00 00:00:00'),
(7, 'Sạc dự phòng', 'sac-du-phong', 'Sạc dự phòng cực khỏe', 1, '2018-11-09 02:04:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_featured` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'img/products/636614727176851624_iphone--8-plus-red-1.png', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(2, 2, 'img/products/636459040422660236_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(3, 3, 'img/products/636614727176851624_iphone--8-plus-red-1 (1).png', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(4, 4, 'img/products/636483223586180190_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(5, 5, 'img/products/636483223586180190_1 (1).jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(6, 6, 'img/products/636506509528306435_iphone6-32GB-2.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(7, 7, 'img/products/636172339622394948_apple-Iphone-6s-gold-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(8, 8, 'img/products/636459060591822074_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(9, 9, 'img/products/636159432323817451_ip7p-gold-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(10, 10, 'img/products/636159398645952790_ip7-black-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(11, 11, 'img/products/636347803366796448_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(12, 12, 'img/products/636534255386871307_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(13, 13, 'img/products/636449525827101531_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(14, 14, 'img/products/636313235962471668_800-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(15, 15, 'img/products/636161892755323252_xperia-xa-ultra-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(16, 16, 'img/products/636160168215487121_xperia-x-silver-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(17, 17, 'img/products/636259601365302936_800trang.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(18, 18, 'img/products/636449520592598133_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(19, 19, 'img/products/sony-xperia-xz-premium-pink-gold-400x460.png', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(20, 20, 'img/products/sony-xperia-xz-premium-1-400x460.png', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(21, 21, 'img/products/636473926771819711_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(22, 22, 'img/products/636403898586199374_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(23, 23, 'img/products/636524079493403495_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(24, 24, 'img/products/asus-zenfone-max-plus-m1-zb570tl-den-1-3-org.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(25, 25, 'img/products/asus-zenfone-4-max-pro-zc554kl-den-1-org.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(26, 26, 'img/products/asus-zenfone-4-max-zc520kl-m-den-1-org.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(27, 27, 'img/products/asus-zenfone-live-zb501kl-400-1-400x460.png', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(28, 28, 'img/products/asus-zenfone-5-didongviet.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(29, 29, 'img/products/asus-zenfone-3-max-zc553kl-vang-dong-didongviet_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(30, 30, 'img/products/asus-zenfone-3-ze552kl-den-didongviet.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(31, 31, 'img/products/636453055114651902_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(32, 32, 'img/products/636619088468711666_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(33, 33, 'img/products/636415156301744244_1o.png', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(34, 34, 'img/products/636415162482543484_2.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(35, 35, 'img/products/636623236912499129_xiaomi-s2-3-xam.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(36, 36, 'img/products/636463347832890173_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(37, 37, 'img/products/636453072940146775_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(38, 38, 'img/products/636549777491044706_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(39, 39, 'img/products/636427922203447399_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(40, 40, 'img/products/xiaomi-redmi-5a-16gb-ram-2gb.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(41, 41, 'img/products/636344641451328424_636344634241195520_800-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(42, 42, 'img/products/636396217066191623_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(43, 43, 'img/products/636506554439585001_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(44, 44, 'img/products/636552331208636703_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(45, 45, 'img/products/636552333148760332_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(46, 46, 'img/products/636447213995680282_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(47, 47, 'img/products/636383938496757496_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(48, 48, 'img/products/636529900670656200_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(49, 49, 'img/products/636523986341921012_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(50, 50, 'img/products/636523998806629206_1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(51, 51, 'img/products/636075724321439795_HAPK-USB-30-32GB-KINGSTON-DATA-TRAVELER-100G3-07.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(52, 52, 'img/products/636074847972740142_USB-30-16GB-KINGSTON-101G3-00006137-1.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(53, 53, 'img/products/636075714037196583_HAPK-THE-NHO-MICROSD-64GB-KINGSTON-C10-05.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(54, 54, 'img/products/the-nho-microsd-8gb-kingston-class-4-id26826.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(55, 55, 'img/products/636251948217518300_HMPK-THE-NHO-MICROSD-16GB-KINGSTON-SDCHC-CLASS-4-01.jpg', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(56, 56, 'img/products/636455617292459552_HASP-TAI-NGHE-CHOANG-DAU-UNIK-S416-00391764.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(57, 57, 'img/products/636459935421057396_HASP-TAI-NGHE-CHOANG-DAU-UNIK-S448-00391765.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(58, 58, 'img/products/636455624103887552_HASP-TAI-NGHE-CO-MIC-UNIK-S810-00391762 (7).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(59, 59, 'img/products/636455619571619552_HASP-TAI-NGHE-CO-MIC-UNIK-S704-00391763 (7).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(60, 60, 'img/products/636455608714643552_HASP-TAI-NGHE-CO-MIC-BLUETOOTH-UNIK-BT05-00391766 (7).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(61, 61, 'img/products/636282152873274000_HAPK-SAC-DT-LIEN-CAP-1M-ICORE-1A-002476861 (1).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(62, 62, 'img/products/636281936660201622_HAPK-SAC-DT-USB-ICORE-1-CONG-1A-CHO-DT- 000041651 (1).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(63, 63, 'img/products/636070537766014404_HAPK-SAC-DT-LIEN-CAP-MICRO-USB-ICORE-01.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(64, 64, 'img/products/636269252051143690_HAPK-CAP-LIGHTNING-MFI-ICORE-1M-00007147 (1).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(65, 65, 'img/products/636079082096344865_HAPK-CAP-MICRO-USB-ICORE-1M-00007146-4.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(66, 66, 'img/products/636530151291840952_HASP-PIN-DU-PHONG-ICORE-15.JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10'),
(67, 67, 'img/products/636230100679237505_HAPK-SAC-DU-PHONG-ICORE-5000MAH-00262041 (1).JPG', 1, '2018-11-09 14:53:49', '2018-11-09 14:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_relates`
--

CREATE TABLE `product_relates` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_relate_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_relates`
--

INSERT INTO `product_relates` (`id`, `product_id`, `product_relate_id`, `status`) VALUES
(1, 1, 9, 1),
(2, 1, 3, 1),
(3, 1, 16, 1),
(4, 1, 17, 1),
(5, 5, 9, 1),
(6, 5, 10, 1),
(7, 5, 11, 1),
(8, 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rate` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `user_id`, `content`, `rate`, `created_at`, `updated_at`, `status`) VALUES
(1, 5, 1, 'Cái này được đó', 5, '2018-05-24', '2018-11-10', 1),
(2, 5, 2, 'Quá đắt nhưng mà cũng được.', 5, '2018-05-24', '2018-05-24', 1),
(3, 8, 13, 'Sản phẩm rất tốt', 5, '2018-11-16', '2018-11-16', 1),
(4, 8, 13, 'Sản phẩm tốt', 5, '2018-11-16', '2018-11-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `zipcode`) VALUES
(1, 'Thành phố Hà Nội', '1', '100000'),
(2, 'Tỉnh Hà Giang', '2', '310000'),
(3, 'Tỉnh Cao Bằng', '4', '270000'),
(4, 'Tỉnh Bắc Kạn', '6', '960000'),
(5, 'Tỉnh Tuyên Quang', '8', '300000'),
(6, 'Tỉnh Lào Cai', '10', '330000'),
(7, 'Tỉnh Điện Biên', '11', '380000'),
(8, 'Tỉnh Lai Châu', '12', '390000'),
(9, 'Tỉnh Sơn La', '14', '360000'),
(10, 'Tỉnh Yên Bái', '15', '320000'),
(11, 'Tỉnh Hoà Bình', '17', '350000'),
(12, 'Tỉnh Thái Nguyên', '19', '250000'),
(13, 'Tỉnh Lạng Sơn', '20', '240000'),
(14, 'Tỉnh Quảng Ninh', '22', '200000'),
(15, 'Tỉnh Bắc Giang', '24', '220000'),
(16, 'Tỉnh Phú Thọ', '25', '290000'),
(17, 'Tỉnh Vĩnh Phúc', '26', '280000'),
(18, 'Tỉnh Bắc Ninh', '27', '790000'),
(19, 'Tỉnh Hải Dương', '30', '170000'),
(20, 'Thành phố Hải Phòng', '31', '180000'),
(21, 'Tỉnh Hưng Yên', '33', '160000'),
(22, 'Tỉnh Thái Bình', '34', '410000'),
(23, 'Tỉnh Hà Nam', '35', '400000'),
(24, 'Tỉnh Nam Định', '36', '420000'),
(25, 'Tỉnh Ninh Bình', '37', '430000'),
(26, 'Tỉnh Thanh Hóa', '38', '440000'),
(27, 'Tỉnh Nghệ An', '40', '460000'),
(28, 'Tỉnh Hà Tĩnh', '42', '480000'),
(29, 'Tỉnh Quảng Bình', '44', '510000'),
(30, 'Tỉnh Quảng Trị', '45', '520000'),
(31, 'Tỉnh Thừa Thiên Huế', '46', '530000'),
(32, 'Thành phố Đà Nẵng', '48', '550000'),
(33, 'Tỉnh Quảng Nam', '49', '560000'),
(34, 'Tỉnh Quảng Ngãi', '51', '570000'),
(35, 'Tỉnh Bình Định', '52', '820000'),
(36, 'Tỉnh Phú Yên', '54', '620000'),
(37, 'Tỉnh Khánh Hòa', '56', '650000'),
(38, 'Tỉnh Ninh Thuận', '58', '660000'),
(39, 'Tỉnh Bình Thuận', '60', '800000'),
(40, 'Tỉnh Kon Tum', '62', '580000'),
(41, 'Tỉnh Gia Lai', '64', '600000'),
(42, 'Tỉnh Đắk Lắk', '66', '630000'),
(43, 'Tỉnh Đắk Nông', '67', '640000'),
(44, 'Tỉnh Lâm Đồng', '68', '670000'),
(45, 'Tỉnh Bình Phước', '70', '830000'),
(46, 'Tỉnh Tây Ninh', '72', '840000'),
(47, 'Tỉnh Bình Dương', '74', '590000'),
(48, 'Tỉnh Đồng Nai', '75', '810000'),
(49, 'Tỉnh Bà Rịa - Vũng Tàu', '77', '790000'),
(50, 'Thành phố Hồ Chí Minh', '79', '700000'),
(51, 'Tỉnh Long An', '80', '850000'),
(52, 'Tỉnh Tiền Giang', '82', '860000'),
(53, 'Tỉnh Bến Tre', '83', '930000'),
(54, 'Tỉnh Trà Vinh', '84', '940000'),
(55, 'Tỉnh Vĩnh Long', '86', '890000'),
(56, 'Tỉnh Đồng Tháp', '87', '870000'),
(57, 'Tỉnh An Giang', '89', '880000'),
(58, 'Tỉnh Kiên Giang', '91', '920000'),
(59, 'Thành phố Cần Thơ', '92', '900000'),
(60, 'Tỉnh Hậu Giang', '93', '910000'),
(61, 'Tỉnh Sóc Trăng', '94', '950000'),
(62, 'Tỉnh Bạc Liêu', '95', '260000'),
(63, 'Tỉnh Cà Mau', '96', '970000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `provicence_id` (`province_id`),
  ADD KEY `districts_id` (`district_id`),
  ADD KEY `customer_group_id` (`customer_group_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provicence_id` (`province_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_relates`
--
ALTER TABLE `product_relates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_relates`
--
ALTER TABLE `product_relates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_relates`
--
ALTER TABLE `product_relates`
  ADD CONSTRAINT `product_relates_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
