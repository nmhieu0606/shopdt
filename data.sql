-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2021 at 02:18 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohanh`
--

CREATE TABLE `baohanh` (
  `id` int(11) NOT NULL,
  `thoigianbaohanh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `baohanh`
--

INSERT INTO `baohanh` (`id`, `thoigianbaohanh`) VALUES
(4, '6 tháng'),
(5, '12 tháng'),
(6, '24 tháng'),
(7, '36 tháng');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `tenchucvu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quyen` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenchucvu`, `quyen`) VALUES
(1, 'Quản lý', '\"[\"admin.index\",\"danhmuc.index\"]\"'),
(3, 'Nhân viên', '\"[\"admin.index\",\"danhmuc.index\"]\"');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'IOS'),
(2, 'Android1'),
(3, 'Máy giặt'),
(4, 'Tivi');

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `nhanvien_id` int(11) DEFAULT NULL,
  `ngaydathang` date NOT NULL,
  `tinhtrang_id` int(11) DEFAULT NULL,
  `tongtien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`id`, `khachhang_id`, `nhanvien_id`, `ngaydathang`, `tinhtrang_id`, `tongtien`) VALUES
(7, 3, 1, '2021-10-30', 1, 100000000),
(8, 3, 1, '2021-10-30', 1, 160000000),
(9, 3, 1, '2021-10-30', 1, 130000000),
(10, 3, NULL, '2021-10-30', 1, 130000000),
(11, 3, NULL, '2021-10-30', 1, 70000000),
(12, 3, NULL, '2021-10-30', 1, 40000000),
(13, 3, NULL, '2021-10-30', 1, 40000000),
(14, 3, NULL, '2021-11-05', 1, 110000000);

-- --------------------------------------------------------

--
-- Table structure for table `dathang_chitiet`
--

CREATE TABLE `dathang_chitiet` (
  `dathang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `dathang_chitiet`
--

INSERT INTO `dathang_chitiet` (`dathang_id`, `sanpham_id`, `soluong`, `dongia`) VALUES
(7, 1, 2, 60000000),
(7, 2, 1, 40000000),
(8, 1, 4, 120000000),
(9, 1, 3, 90000000),
(9, 2, 1, 40000000),
(10, 1, 3, 90000000),
(11, 1, 1, 30000000),
(12, 2, 1, 40000000),
(13, 2, 1, 40000000),
(14, 1, 1, 30000000),
(14, 2, 2, 80000000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cmnd` int(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `hovaten`, `gioitinh`, `sdt`, `cmnd`, `ngaysinh`, `diachi`, `email`, `tendangnhap`, `password`, `anh`) VALUES
(1, 'Nguyễn A', 1, '0383957803', 564654454, '2003-06-19', 'Long Xuyên', 'nmhieu_19pm@student.agu.edu.vn', 'kh1', '$2y$10$/nJB7S7wGqNj5c/WFpZNm.ShgcfUstJDUmJSzqj9JS1sVd2dQi4BG', NULL),
(2, 'Nguyễn B', 0, '0383957803', 123456789, '2002-05-24', 'Long Xuyên', 'nmhieu0606@gmail.com', 'kh2', '$2y$10$0F/FIn.kHf01iDlWVHMXfu7tFR1aDl4pKTIZl/1mAYiJRq1pHIAHK', NULL),
(3, 'Nguyễn C', 1, '0383957803', 123456789, '2021-10-05', 'Long Xuyên', 'hieuggoag12345a@gmail.com', 'kh3', '$2y$10$CA8cOXXjTdnf8GS4yzBmtOm7xSKAyNv8AEaM6x3qdHwMY9gU9d9pm', NULL),
(4, 'Nguyễn D', 0, '0383957803', 56154156, '2021-10-08', 'Long Xuyên', 'nhtung', 'kh4', '$2y$10$bmEfSUhHSLZh2VV8NHqX.ejZVkcGtEbZRKrf2/M6ey8g8upJ001gy', NULL),
(5, 'Nguyễn Minh Hiếu', 0, '0383957803', 123456, '2021-10-02', 'Long Xuyên', 'demo', 'test', '$2y$10$rRzjPPXPqCDwl8dk2v9daO/WNbNNhrzGAhgBcSn9SeqC0i1aVT/CO', NULL),
(6, 'adasd', 0, '0383957803', 123123, '2021-10-17', 'Long Xuyên', 'asdasda', '1', '$2y$10$hOjv7vapSukad0KIY30EH.U4r4CzlYksKegPXlKB2tP36kYT.hViS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhanhieu`
--

CREATE TABLE `nhanhieu` (
  `id` int(11) NOT NULL,
  `nhanhieu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhanhieu`
--

INSERT INTO `nhanhieu` (`id`, `nhanhieu`) VALUES
(1, 'APPLE');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cmnd` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chucvu_id` int(11) NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `hovaten`, `gioitinh`, `ngaysinh`, `diachi`, `sdt`, `cmnd`, `chucvu_id`, `tendangnhap`, `password`, `email`, `anh`) VALUES
(1, 'Nguyễn Minh Hiếu', 0, '2021-10-01', 'long xuyên', '0123456789', '56414441', 1, 'admin', '$2y$10$ECu1YAMahvY/DMPcyaelsu3FhekyRK5dfjf16U5gqPJFKF/LMYezO', 'nmhieu_19pm@student.agu.edu.vn', NULL),
(2, 'Nguyễn A', 0, '2021-10-13', 'Long Xuyên', '0383957803', '56154156', 1, 'user', '$2y$10$kUiNkZn3isBqC2Ucsxha3ut.2.DjJzZQAkeKhlh114URr/VzEd5h.', 'adadad', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gianhap` float NOT NULL,
  `giaxuat` float NOT NULL,
  `nhanhieu_id` int(11) NOT NULL,
  `xuatxu_id` int(11) NOT NULL,
  `baohanh_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `chitiet` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `anh`, `soluong`, `gianhap`, `giaxuat`, `nhanhieu_id`, `xuatxu_id`, `baohanh_id`, `danhmuc_id`, `chitiet`) VALUES
(1, 'IPHONE12', '1635413886-IPHONE12.jpg', 1, 20000000, 30000000, 1, 1, 5, 1, '<p>ASDASDADA</p>'),
(2, 'IPHONE 13', '1635413894-IPHONE 13.jpg', 1, 30000000, 40000000, 1, 1, 7, 1, '<h2>Tin tức nổi bật</h2>\r\n\r\n<h3><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max-256gb\" target=\"_blank\">iPhone 13 Pro Max 256GB</a>&nbsp;- si&ecirc;u phẩm mang tr&ecirc;n m&igrave;nh bộ vi xử l&yacute; Apple A15 Bionic h&agrave;ng đầu, m&agrave;n h&igrave;nh Super Retina XDR 120 Hz, cụm camera khẩu độ f/1.5 cực lớn, tất cả sẽ mang lại cho bạn những trải nghiệm tuyệt vời chưa từng c&oacute;.</h3>\r\n\r\n<h3>Thi&ecirc;́t k&ecirc;́ đẳng cấp, sang trọng</h3>\r\n\r\n<p>iPhone 13 Pro Max vẫn sẽ kế thừa thiết kế đặc trưng của&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone-12-series\" target=\"_blank\">iPhone 12 Series</a>, vẫn l&agrave; một sản phẩm với khung viền được ho&agrave;n thiện từ th&eacute;p kh&ocirc;ng gỉ, hai mặt trước sau được trang bị k&iacute;nh cường lực b&oacute;ng bẩy.</p>\r\n\r\n<p><img alt=\"Thiết kế nguyên khối đẳng cấp - iPhone 13 Pro Max 256GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/250261/iphone-13-pro-max-256gb-1.jpg\" /></p>\r\n\r\n<p>Đi&ecirc;̉m thay đ&ocirc;̉i lớn tr&ecirc;n 13 Pro Max có th&ecirc;̉ là ph&acirc;̀n module camera được l&agrave;m to hơn kh&aacute; nhiều, ph&acirc;̀n cạnh vi&ecirc;̀n máy được vát phẳng sang trọng c&ugrave;ng bốn g&oacute;c được l&agrave;m bo cong nhẹ, phủ một lớp mờ gi&uacute;p hạn chế b&aacute;m bụi bẩn v&agrave; v&acirc;n tay.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `id` int(11) NOT NULL,
  `tinhtrang` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`id`, `tinhtrang`) VALUES
(1, 'Đặt hàng thành công'),
(3, 'Đang chuẩn bị đơn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `xuatxu`
--

CREATE TABLE `xuatxu` (
  `id` int(11) NOT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `xuatxu`
--

INSERT INTO `xuatxu` (`id`, `xuatxu`) VALUES
(1, 'US');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`),
  ADD KEY `tinhtrang_id` (`tinhtrang_id`);

--
-- Indexes for table `dathang_chitiet`
--
ALTER TABLE `dathang_chitiet`
  ADD KEY `dathang_id` (`dathang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chucvu_id` (`chucvu_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanhieu_id` (`nhanhieu_id`),
  ADD KEY `xuatxu_id` (`xuatxu_id`),
  ADD KEY `baohanh_id` (`baohanh_id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baohanh`
--
ALTER TABLE `baohanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_3` FOREIGN KEY (`tinhtrang_id`) REFERENCES `tinhtrang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dathang_chitiet`
--
ALTER TABLE `dathang_chitiet`
  ADD CONSTRAINT `dathang_chitiet_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_chitiet_ibfk_2` FOREIGN KEY (`dathang_id`) REFERENCES `dathang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`chucvu_id`) REFERENCES `chucvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`xuatxu_id`) REFERENCES `xuatxu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`baohanh_id`) REFERENCES `baohanh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`nhanhieu_id`) REFERENCES `nhanhieu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
