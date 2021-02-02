-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2020 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vtcagt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `csgt`
--

CREATE TABLE `csgt` (
  `id` int(11) NOT NULL,
  `team` varchar(60) DEFAULT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `mistake` varchar(100) DEFAULT NULL,
  `timedate` datetime DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `csgt`
--

INSERT INTO `csgt` (`id`, `team`, `address`, `lat`, `lng`, `mistake`, `timedate`, `type`) VALUES
(1, 'Doi 12F21E', 'Chan cau vuot Hoang Xa', 21.002533, 105.641449, 'Vong xuyen', '2020-01-01 07:40:40', 'on'),
(2, NULL, 'Nga tu Quoc Oai - Hieu sach nhan dan', 20.992872, 105.640678, 'Den do', '2020-01-02 09:03:02', 'on'),
(3, NULL, 'Nga 3 Quoc Oai - Gan THPT Quoc Oai', 20.990337, 105.641541, 'Mu bao hiem', '2020-01-02 09:06:02', 'off'),
(4, NULL, 'Duong vao san van ?ong', 20.991640, 105.641220, NULL, '2020-01-03 16:50:07', 'off'),
(5, NULL, 'Chan cau vuot Sai Son', 21.001966, 105.648804, NULL, '2020-01-03 08:06:50', 'off'),
(6, 'Doi B421', 'Tue Tinh - Nam Dinh', 20.449598, 106.183640, NULL, '2020-01-04 17:06:03', 'off'),
(7, NULL, 'Lang Sinh Vien Nam Dinh', 20.446304, 106.168152, 'Di nguoc chieu', '2020-01-04 11:03:02', 'on'),
(8, NULL, 'Cho quan chuot Nam Dinh', 20.452538, 106.194160, 'Mu bao hiem', '2020-03-09 10:50:10', 'off'),
(9, 'A8346FE', 'So giao thong van tai Nam Dinh', 20.490467, 106.089531, 'Toc do', '2020-01-12 04:55:23', 'off'),
(10, 'Doi A743', 'Canh benh vien Nhi Ha Noi', 21.024832, 105.809921, NULL, '2020-01-14 15:30:03', 'off'),
(11, NULL, 'Canh dai truyen hinh Viet Nam', 21.025787, 105.810493, 'Den do', '2019-12-14 08:00:00', 'off'),
(12, NULL, 'Lang Thuong - Dong Da - Ha Noi', 21.026201, 105.809113, NULL, '2020-02-17 14:30:04', 'on'),
(13, NULL, 'Co Nhue - Bac Tu Liem - Ha Noi', 21.063847, 105.767593, 'Mu bao hiem', '2020-02-18 09:32:03', 'on'),
(14, NULL, 'Gan tram y te Co Nhue', 21.060772, 105.781105, 'Guong', '2020-02-19 15:04:04', 'on'),
(15, NULL, 'Bo tu lenh Tang Thiet Giap', 21.058186, 105.777969, NULL, '2020-02-20 16:12:03', 'off'),
(16, NULL, 'Benh vien E', 21.055603, 105.780289, 'Duong mot chieu', '2020-02-22 02:11:01', 'on'),
(17, 'Doi 34EF5', 'My Dinh 2 - Ha Noi', 21.031586, 105.764542, 'Khong duoc re', '2020-02-26 09:14:24', 'off'),
(18, 'Doi 147BB13', 'Canh truong Marie Curie - Ha Noi', 21.020409, 105.772270, 'Den do', '2020-02-29 10:23:56', 'off'),
(20, NULL, 'Nga 3 Cat Dang - Yen Tien - Y Yen - Nam Dinh', 20.299862, 106.029411, NULL, '2020-03-03 11:29:56', 'off'),
(21, NULL, 'Ga Binh Luc - Ha Nam', 20.479387, 105.983231, 'Dung do', '2020-03-03 07:35:55', 'off'),
(22, NULL, 'Tam Coc - Bich ?ong - Ninh Binh', 20.177254, 105.889450, 'Dung do', '2020-03-04 15:40:50', 'on'),
(23, NULL, 'Nga 3 Cho Ngo - Ninh Binh', 20.163631, 106.004524, NULL, '2020-03-07 14:33:05', 'off'),
(24, NULL, 'Cho Hoc Mon - HCM', 10.885902, 106.586723, 'Dung do', '2020-03-08 08:55:32', 'off'),
(25, NULL, 'Cho Ben Thanh - HCM', 10.773996, 106.689804, NULL, '2020-03-10 10:43:45', 'off'),
(26, NULL, 'Canh truong Hoa Sen - HCM', 10.773996, 106.689804, 'Vong xuyen', '2020-03-10 20:59:54', 'on'),
(27, NULL, 'Canh Kinh Thanh Hue', 16.453543, 107.507072, NULL, '2020-03-16 15:16:35', 'off'),
(28, NULL, 'Cang hang khong Da Nang', 16.050764, 108.201019, 'Dung do', '2020-03-18 11:17:35', 'on'),
(29, NULL, 'Cang hang khong Ca Mau', 9.169427, 105.138420, NULL, '2020-03-19 05:18:17', 'off'),
(30, NULL, 'Ben xe khach trung tam Thai Nguyen', 21.577522, 105.733452, 'Dung do', '2020-03-20 20:18:49', 'off'),
(33, 'Doi27R2', 'Lam ha - lam dong', 11.855514, 105.356216, 'nga tu', '2020-05-13 03:19:11', 'on'),
(34, 'Doi 6', 'Son trung - son ha - Quang Ngai', 14.957013, 108.393929, 'Nut giao dai lo', '2020-05-06 07:09:29', 'off'),
(36, 'doi8', 'An phu - Tam Ky', 15.576333, 108.428673, 'vuot den do', '2020-05-03 08:07:09', 'on'),
(37, 'doi 9', 'Binh Trung - Thang Binh - Quang Nam', 15.676845, 108.398796, 'Mu Bao Hiem', '2020-05-01 10:10:20', 'on'),
(38, 'doiCR3', 'Quang Nam', 15.837216, 108.308739, 'Di nguoc chieu', '2020-05-05 15:17:23', 'on'),
(39, 'DoiCR56', 'NUi Ngu Hanh Son', 15.983811, 108.293976, 'Khong GPLX', '2020-05-10 11:12:12', 'off'),
(40, 'Doi CD45', 'cong vien Tran Phu', 18.350567, 105.889824, 'chay qua toc do', '2020-05-01 08:25:46', 'on'),
(41, 'Cd45', 'Ben xe khach Ha Tinh', 18.350567, 105.889824, 'cho nguoi qua quy dinh', '2020-05-06 10:17:12', 'on'),
(42, 'CF34', 'Kon Plong', 13.825477, 107.840790, 'Chay sai lan duong', '2020-05-01 11:27:41', 'on'),
(43, 'CD76', 'Dong Giang - Quang Nam', 13.825477, 107.840790, 'Chay qua toc do', '2020-05-05 10:22:18', 'on'),
(44, 'CK34', 'Vuon quoc gia hoang lien', 19.688166, 105.407654, 'chay qua toc do', '2020-05-03 08:00:00', 'on'),
(45, 'CB45', 'Bac Kan', 19.688166, 105.407654, 'vuot den do', '2020-05-03 09:13:45', 'on'),
(46, 'CG67', 'Nghe An', 19.688166, 105.407654, 'Chay qua toc do', '2020-05-01 09:15:15', 'off'),
(47, 'DH56', 'Thanh Hoa', 19.788111, 105.686371, 'Chay lan lan', '2020-05-03 11:05:22', 'on'),
(48, 'DE39', 'Ha Tinh', 18.473381, 105.814186, 'Khong mu bao hiem', '2020-05-07 08:22:00', 'on'),
(49, 'Doi 1', 'Dong Hoi', 17.454290, 106.535904, 'Nong do con', '2020-05-08 14:00:00', 'on'),
(50, 'DH78', 'Dong ha', 16.801315, 107.018120, 'cho qua nguoi quy dinh', '2020-05-02 07:18:19', 'off'),
(51, 'DY67', 'Hue', 16.453379, 107.507072, 'Nong do con', '2020-05-04 09:08:27', 'on'),
(52, 'VB98', 'Nha Trang', 12.259435, 109.106415, 'Khong GPLX', '2020-05-03 12:00:00', 'on'),
(53, 'CA12', 'Da Lat', 11.903876, 108.310631, NULL, '2020-05-06 08:21:08', 'on'),
(54, 'CA54', 'Phan Thiet', 10.897328, 108.033867, 'Khong GPLX', '2020-05-03 17:00:00', 'on'),
(55, 'CA78', 'Vung Tau', 10.403331, 107.053009, 'Chay qua toc do', '2020-05-10 09:00:00', 'on'),
(56, 'CA22', 'Ben Tre', 10.237393, 106.340530, 'cho qua so nguoi ', '2020-05-01 10:00:00', 'off'),
(57, 'CA23', 'Tan An', 10.525832, 106.333298, 'Nong do con', '2020-05-01 09:00:00', 'on'),
(58, 'CA26', 'My Tho', 10.369200, 106.275230, 'Khong GPLX', '2020-05-04 10:00:00', 'on'),
(59, 'CA47', 'Can Tho', 10.034185, 105.722549, 'chay sai lan', '2020-05-03 08:00:00', 'off'),
(60, '11CA', 'Vi Thanh', 9.751901, 105.345215, 'Chay qua toc do', '2020-05-11 10:00:00', 'on'),
(61, 'CA19', 'Rach Gia', 10.025296, 105.031242, 'Cho qua nguoi quy dinh', '2020-05-06 10:00:00', 'off'),
(62, 'CA36', 'Quy Nhon', 13.785582, 109.087616, 'Khong GPLX', '2020-05-05 14:00:00', 'on'),
(63, 'CA69', 'Buon Ma Thuat', 12.661299, 107.887619, 'Chay sai lan', '2020-05-10 10:00:00', 'on'),
(64, 'Doi 12F21E', '566 Duong Lang - Dong Da - Ha Noi', 21.012806, 105.806442, 'Vong xuyen', '2020-01-01 07:40:40', 'on'),
(65, '', '325 Duong Lang - Lang Ha - Ha Noi', 21.011934, 105.807129, '', '2020-01-04 07:40:40', 'on'),
(66, '', '120 Thai Ha - Trung Liet - Ha Noi', 21.011919, 105.819206, '', '2020-03-04 03:40:40', 'off'),
(67, 'Y761', '50 Tay Son - Quang Trung - Ha Noi', 21.013247, 105.824280, '', '2020-02-04 12:40:40', 'off'),
(68, '', '766 Duong La Thanh - Ha Noi', 21.024572, 105.810097, 'Nong do con', '2020-08-04 07:50:40', 'off'),
(69, '', '135 - Doi Can- Ha Noi', 21.034746, 105.825623, '', '2020-02-04 03:40:40', 'off'),
(70, '', '245 Duong Lac Long Quan - Ha Noi', 21.051733, 105.806305, '', '2020-02-12 12:50:40', 'off'),
(71, '', '147 Hoang Quoc Viet - Ha Noi', 21.046015, 105.797607, 'Mu', '2020-03-04 07:50:40', 'off'),
(72, '', '460 Thuy Khue - Buoi - Ha Noi', 21.047888, 105.808159, '', '2020-02-24 03:40:40', 'off'),
(73, '', '124 Au Co - Tay Ho - Ha Noi', 21.063015, 105.829994, '', '2020-01-12 12:50:40', 'off'),
(74, '', '89 Le Duc Tho - Ha Noi', 21.028940, 105.767464, 'Mu', '2020-08-04 07:50:40', 'on'),
(75, '', '79 - Le Duc Tho- Ha Noi', 21.030506, 105.767212, 'Nong do con', '2020-02-10 03:40:40', 'on'),
(76, '', '125 Le Duc THo - Ha Noi', 21.028479, 105.766701, '', '2020-02-11 12:50:40', 'on'),
(77, '', '79 Ho Tung Mau - Mai Dich - Ha Noi', 21.036648, 105.775810, 'Mu', '2020-02-04 07:50:40', 'off'),
(78, '', '136 - Ho Tung Mau- Ha Noi', 21.037210, 105.773834, '', '2020-02-06 03:40:40', 'off'),
(79, '', '34 Ho Tung Mau - Ha Noi', 21.036901, 105.776321, 'Nong do con', '2020-02-12 12:50:40', 'off'),
(80, '', '75 Ho Tung Mau - Ha Noi', 21.036530, 105.775398, 'Nong do con', '2020-08-04 06:50:40', 'on');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `csgt`
--
ALTER TABLE `csgt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `csgt`
--
ALTER TABLE `csgt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
