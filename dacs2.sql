-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 30, 2019 lúc 04:16 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacs2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangthongbao`
--

CREATE TABLE `bangthongbao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bangthongbao`
--

INSERT INTO `bangthongbao` (`id`, `tieude`, `noidung`, `created_at`, `updated_at`) VALUES
(1, 'Chương trình “Chào đón năm mới - Mừng xuân Canh Tí 2020”', '<p>I. MỤC Đ&Iacute;CH, &Yacute; NGHĨA:</p>\r\n\r\n<p>- Tạo s&acirc;n chơi l&agrave;nh mạnh bổ &iacute;ch cho sinh vi&ecirc;n ở nội tr&uacute; K&yacute; t&uacute;c x&aacute; tại 03 cơ sở gi&aacute;o dục th&agrave;nh vi&ecirc;n Đại học Đ&agrave; Nẵng l&agrave; Trường Cao đẳng C&ocirc;ng nghệ Th&ocirc;ng tin, Khoa C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng v&agrave; Khoa Y Dược</p>\r\n\r\n<p>- Tạo mối giao lưu đo&agrave;n kết v&agrave; kh&ocirc;ng kh&iacute; thi đua s&ocirc;i nổi trong tuổi trẻ Trường Cao đẳng C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Khoa C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng.</p>\r\n\r\n<p>- L&agrave; một hoạt động &yacute; nghĩa ch&agrave;o đ&oacute;n năm mới 2020.</p>\r\n\r\n<p>II. TH&Agrave;NH PHẦN THAM DỰ:</p>\r\n\r\n<p>- To&agrave;n bộ sinh vi&ecirc;n k&yacute; t&uacute;c x&aacute;.</p>\r\n\r\n<p>- Sinh vi&ecirc;n hiện đang theo học tại Trường Cao đẳng C&ocirc;ng nghệ Th&ocirc;ng tin ĐHĐN.</p>\r\n\r\n<p>- Sinh vi&ecirc;n đang theo học tại Khoa C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng ĐHĐN.</p>\r\n\r\n<p>III. NỘI DUNG</p>\r\n\r\n<p>1. Thời gian, địa điểm</p>\r\n\r\n<p>- Thời gian: 19h00 ng&agrave;y 31/12/2019 (Thứ Ba)</p>\r\n\r\n<p>- Địa điểm: Ph&ograve;ng tự học K&yacute; t&uacute;c x&aacute;.</p>\r\n\r\n<p>2. Nội dung chương tr&igrave;nh:</p>\r\n\r\n<p>2.1. Chương tr&igrave;nh &ldquo;Dọn nh&agrave; năm mới&rdquo;:</p>\r\n\r\n<p>- Thời gian: L&uacute;c 13h30 ng&agrave;y 31/12/2019.</p>\r\n\r\n<p>- Địa điểm: Trong K&yacute; t&uacute;c x&aacute; v&agrave; khu vực xung quanh.</p>\r\n\r\n<p>- Th&agrave;nh phần: Tổ Quản l&yacute; K&yacute; t&uacute;c x&aacute; sẽ huy động to&agrave;n thể sinh vi&ecirc;n ở tại KTX ra qu&acirc;n tổng vệ sinh ph&ograve;ng ở để ch&agrave;o đ&oacute;n năm mới 2020.</p>\r\n\r\n<p>2.2. Chấm thi &ldquo;Ph&ograve;ng ở Kiểu mẫu&rdquo;: BẮT BUỘC TẤT CẢ C&Aacute;C PH&Ograve;NG THAM GIA</p>\r\n\r\n<p>- Thời gian: V&agrave;o Từ 16h00 ng&agrave;y 30/12/2019, BTC tiến h&agrave;nh chấm điểm c&aacute;c ph&ograve;ng ở K&yacute; t&uacute;c x&aacute;.</p>\r\n\r\n<p>- Ti&ecirc;u ch&iacute;:</p>\r\n\r\n<p>+ Vệ sinh: sạch sẽ, gọn g&agrave;ng, ngăn nắp.</p>\r\n\r\n<p>+ Khoa học: sắp xếp c&aacute;c g&oacute;c sinh hoạt, học tập hợp l&yacute; v&agrave; khoa học</p>\r\n\r\n<p>+ Thẩm mỹ: an to&agrave;n, trang tr&iacute; ch&agrave;o đ&oacute;n năm mới ấn tượng, đẹp mắt.</p>\r\n\r\n<p>- Cơ cấu giải thưởng: 7 giải: 01 Nhất, 02 Nh&igrave;, 02 Ba, 02 Khuyến kh&iacute;ch</p>\r\n\r\n<p>Đặc biệt chấm điểm ưu ti&ecirc;n với những ph&ograve;ng c&oacute; g&oacute;c trang tr&iacute; ch&agrave;o năm mới 2020, c&oacute; c&acirc;u đối trang tr&iacute; ph&ograve;ng ng&agrave;y tết.</p>\r\n\r\n<p>2.3. Chương tr&igrave;nh Hội diễn văn nghệ sinh vi&ecirc;n K&yacute; t&uacute; x&aacute; năm 2019:</p>\r\n\r\n<p>- C&aacute;c ph&ograve;ng ở nội tr&uacute; K&yacute; t&uacute;c x&aacute; tiến h&agrave;nh tập luyện v&agrave; đăng k&yacute; tham gia dự thi tiết mục văn nghệ.</p>\r\n\r\n<p>- Đăng k&yacute; tham gia qua link: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fsum.vn%2FNYe1a%3Ffbclid%3DIwAR2wDhhqj3xrhRxWX8M9QN68SxjbHQ--5JXwv-hu_B1r9c6eb4-pUFXq6LM&amp;h=AT3s-Oj0yf_VBL6mBxlTSp2fR-SzEm7JvyEtde3LfORanSV_s4TaQWGkDNX0hm4_5Nh23jRLbZeU1D8glfVHzTaqhnkDeGAhv-Qnv5lFeaeYZMfKqREDv9pNKdRJcLc95Do3S5mirnqB_APvp4p1Qj8\" target=\"_blank\">https://sum.vn/NYe1a</a></p>\r\n\r\n<p>Lưu &yacute;: Đăng k&yacute; cho Tổ Quản l&yacute; K&yacute; t&uacute;c x&aacute; trước ng&agrave;y 24/12/2019.</p>\r\n\r\n<p>- Thi văn nghệ: 19h00 ng&agrave;y 31/12/2019 (Thứ Ba) tại ph&ograve;ng tự học KTX.</p>\r\n\r\n<p>- Cơ cấu giải thưởng: 7 giải: 01 Nhất, 02 Nh&igrave;, 02 Ba, 02 Khuyến kh&iacute;ch</p>\r\n\r\n<p>2.4. Giao lưu mừng năm mới:</p>\r\n\r\n<p>- Chương tr&igrave;nh Sinh nhật hồng.</p>\r\n\r\n<p>- Chương tr&igrave;nh M&acirc;m cỗ mừng xu&acirc;n, Coutdown.</p>\r\n\r\n<p>IV. TỔ CHỨC, PHỐI HỢP, THỰC HIỆN:</p>\r\n\r\n<p>1. Ban Tổ chức chương tr&igrave;nh:</p>\r\n\r\n<p>- Đo&agrave;n Trường Cao đẳng C&ocirc;ng nghệ Th&ocirc;ng tin, Tổ quản l&yacute; KTX b&aacute;o c&aacute;o với Đảng ủy, Ban Gi&aacute;m hiệu Trường Cao đẳng C&ocirc;ng nghệ Th&ocirc;ng tin, LCĐ Khoa C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng b&aacute;o c&aacute;o với Ban Chủ nhiệm Khoa về kế hoạch tổ chức chương tr&igrave;nh.</p>\r\n\r\n<p>- X&acirc;y dựng dự tr&ugrave; kinh ph&iacute; tổ chức chương tr&igrave;nh, th&agrave;nh lập Ban Gi&aacute;m khảo, tổ chức chấm điểm v&agrave; trao thưởng cho c&aacute;c phần thi.</p>\r\n\r\n<p>2. C&ocirc;ng t&aacute;c phối hợp với Ph&ograve;ng CTSV v&agrave; Ph&ograve;ng Tổ chức - H&agrave;nh ch&iacute;nh Trường Cao đẳng C&ocirc;ng nghệ Th&ocirc;ng tin</p>\r\n\r\n<p>- Phối hợp với Ph&ograve;ng C&ocirc;ng t&aacute;c Sinh vi&ecirc;n trong việc triển khai thực hiện đến c&aacute;c sinh vi&ecirc;n trong k&yacute; t&uacute;c x&aacute;. Tổ Quản l&yacute; KTX ph&acirc;n c&ocirc;ng, vận động sinh vi&ecirc;n chủ động tham gia chương tr&igrave;nh văn nghệ, ph&ograve;ng ở kiểu mẫu, tiến h&agrave;nh dọn vệ sinh tạo cảnh quan xanh sạch đẹp ch&agrave;o đ&oacute;n năm mới 2020.</p>\r\n\r\n<p>- Phối hợp với Ph&ograve;ng Tổ chức - H&agrave;nh ch&iacute;nh trong c&ocirc;ng t&aacute;c đảm bảo an ninh trật tự, an to&agrave;n ch&aacute;y nổ tại KTX.</p>\r\n\r\n<p>3. Thực hiện:</p>\r\n\r\n<p>Đội Tự quản, c&aacute;c ph&ograve;ng nội tr&uacute; K&yacute; t&uacute;c x&aacute; căn cứ kế hoạch thực hiện nghi&ecirc;m t&uacute;c v&agrave; hiệu quả.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; kế hoạch tổ chức c&aacute;c hoạt động &ldquo;Ch&agrave;o đ&oacute;n năm mới - Mừng xu&acirc;n Canh T&iacute; 2020&rdquo;, trong qu&aacute; tr&igrave;nh triển khai thực hiện, mọi thắc mắc xin vui l&ograve;ng li&ecirc;n hệ Ban Tổ chức chương tr&igrave;nh qua Email: <a href=\"mailto:doanthanhniencit@gmail.com\">nvhung@cit.udn.vn</a>, SĐT: 0985.541.079 (gặp đ/c Hưng).</p>', '2019-12-16 12:40:58', '2019-12-16 17:32:27'),
(4, 'Thông báo 4', '<p>Kh&ocirc;ng c&oacute; n&ocirc;i dung</p>\r\n\r\n<p>&nbsp;</p>', '2019-12-16 14:07:36', NULL),
(5, 'Thông báo 5', '<p>0</p>', '2019-12-16 14:07:45', NULL),
(6, 'Thông báo thứ 6', '<p>Nội dung&nbsp;Th&ocirc;ng b&aacute;o thứ 6</p>', '2019-12-16 14:07:56', '2019-12-17 10:12:00'),
(7, 'Thông báo lao động chủ nhật xanh', '<p>Tập trung tại s&acirc;n</p>', '2019-12-16 17:34:40', '2019-12-17 10:11:35'),
(8, 'Thông báo làm giấy nội trú', '<p>Th&ocirc;ng b&aacute;o l&agrave;m giấy nội tr&uacute;</p>', '2019-12-16 17:34:48', '2019-12-17 10:11:09'),
(9, 'Thông báo lao động hè', '<p>Thời gian 10h30 ng&agrave;y 1/1/2020</p>', '2019-12-16 17:34:53', '2019-12-17 10:09:26'),
(10, 'Thông báo nộp tiền tháng 10', '<p>Nhanh ch&oacute;ng nộp tiền th&aacute;ng 10 tại ph&ograve;ng ban quản l&yacute;</p>', '2019-12-16 17:34:59', '2019-12-17 10:08:55'),
(11, 'Thông báo thứ 7', '<p>Th&ocirc;ng b&aacute;o thứ 7</p>', '2019-12-17 10:12:29', NULL),
(12, 'Thông báo thứ 8', '<p>Th&ocirc;ng b&aacute;o thứ 8</p>', '2019-12-17 10:12:40', NULL),
(13, 'Thông báo thứ 9', '<p>Th&ocirc;ng b&aacute;o thứ 9</p>', '2019-12-17 10:13:09', NULL),
(14, 'Thông báo thứ 10', '<p>Th&ocirc;ng b&aacute;o thứ 10</p>', '2019-12-17 10:13:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giuong`
--

CREATE TABLE `giuong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sogiuong` int(11) NOT NULL,
  `tinhtrang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maphong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giuong`
--

INSERT INTO `giuong` (`id`, `sogiuong`, `tinhtrang`, `maphong`) VALUES
(1, 1, 'TRONG', 'A101'),
(2, 1, 'TRONG', 'A202'),
(3, 1, 'TRONG', 'A203'),
(4, 2, 'TRONG', 'A202'),
(5, 3, 'DACO', 'A202'),
(6, 2, 'TRONG', 'A203'),
(7, 3, 'TRONG', 'A203'),
(8, 2, 'TRONG', 'A101');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makhu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maphong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sogiuong` int(11) NOT NULL,
  `ngaylap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thoihan` int(11) NOT NULL,
  `trangthai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id`, `masv`, `makhu`, `maphong`, `sogiuong`, `ngaylap`, `thoihan`, `trangthai`, `manv`) VALUES
(1, '18it296', 'KHUA', 'A203', 1, '2019-12-17 08:23:27', 6, 'DAXACNHAN', ''),
(2, '18it222', 'KHUA', 'A203', 2, '2019-12-17 08:27:04', 6, 'DAXACNHAN', ''),
(3, '18it333', 'KHUA', 'A101', 1, '2019-12-17 08:23:36', 6, 'DAXACNHAN', ''),
(4, '18it444', 'KHUA', 'A203', 4, '2019-12-17 08:27:25', 6, 'CHUAXACNHAN', ''),
(5, '18it555', 'KHUA', 'A203', 3, '2019-12-17 09:41:08', 6, 'DAXACNHAN', ''),
(6, '18it666', 'KHUA', 'A202', 2, '2019-12-17 11:56:43', 6, 'CHUAXACNHAN', ''),
(7, '18it123', 'KHUA', 'A203', 2, '2019-12-17 09:59:36', 6, 'CHUAXACNHAN', ''),
(8, '18it277', 'KHUA', 'A203', 2, '2019-12-17 10:41:05', 6, 'DAXACNHAN', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu`
--

CREATE TABLE `khu` (
  `makhu` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhu` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khu`
--

INSERT INTO `khu` (`makhu`, `tenkhu`) VALUES
('KHUA', 'Khu A'),
('KHUB', 'Khu B');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `layout`
--

CREATE TABLE `layout` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_12_15_195050_CreateTaikhoanqlTable', 1),
(3, '2019_12_16_192726_create_bangthongbao_table', 2),
(4, '2019_12_16_194450_create_sinhvien_table', 3),
(5, '2019_12_16_202655_create_khu_table', 4),
(7, '2019_12_16_203350_create_phong_table', 5),
(9, '2019_11_18_093642_CreateTaikhoansvTable', 6),
(10, '2019_12_17_105209_create_giuong_table', 7),
(11, '2019_12_17_112649_create_hopdong_table', 8),
(12, '2019_12_17_140705_create_tinnhan_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `maphong` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaphong` int(11) NOT NULL,
  `tinhtrang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `makhu` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`maphong`, `giaphong`, `tinhtrang`, `makhu`) VALUES
('A101', 100000, '', 'KHUA'),
('A202', 120000, '', 'KHUA'),
('A203', 120000, '', 'KHUA'),
('A204', 120000, '', 'KHUA'),
('A303', 120000, '', 'KHUA'),
('A408', 100000, '', 'KHUA'),
('B408', 110000, '', 'KHUB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL DEFAULT current_timestamp(),
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhthe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truonghoc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `hoten`, `gioitinh`, `ngaysinh`, `sdt`, `diachi`, `email`, `cmnd`, `anhthe`, `truonghoc`, `created_at`, `updated_at`) VALUES
('18it123', 'Phan Đức Hải', '1', '2000-06-08', '0136378212', 'Đà Nẵng', 'pdhai@gmail.com', '', '', '', NULL, NULL),
('18it222', 'thang', '1', '2019-12-06', '12345678', 'gb', 'tranthang054655@gmail.com', '', '', '', NULL, NULL),
('18it277', 'Thắng', '1', '2019-12-12', '01244555555', 'dt', 'th@gmail.com', '', '', '', NULL, NULL),
('18it296', 'Trần Ngọc Thắng', 'Nam', '2000-05-10', '0333333333', 'KTX CĐ CNTT', 'tranthang1052000@gmail.com', '191910973', 'anh1.jpg', 'SICT', '2019-12-16 12:40:58', '2019-12-16 12:40:58'),
('18it333', '3', '1', '2019-12-06', '3', '3', '3@gmail.com', '', '', '', NULL, NULL),
('18it444', '5', '0', '2019-12-05', '5', '5', '5@gmail.com', '', '', '', NULL, NULL),
('18it555', '5', '1', '0000-00-00', '5', '5', '5@gmail.com', '5', '5', '5', NULL, NULL),
('18it666', '6', '1', '2019-12-11', '6', '6', '6@gmail.com', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoanql`
--

CREATE TABLE `taikhoanql` (
  `id` int(10) UNSIGNED NOT NULL,
  `taikhoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoanql`
--

INSERT INTO `taikhoanql` (`id`, `taikhoan`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ad1', '$2y$10$WkpcP2U/peG5dC27GIEKAuu320KkMH3/LDUtST1IDg7TBrQ.0Kp3G', NULL, NULL, NULL),
(2, 'ad2', '$2y$10$hkoqMMrGxYEXS00b.UZJyuMNVvzjv.yWY1MoEOi7B79jkIvgEJoAe', NULL, NULL, NULL),
(3, 'ad3', '$2y$10$yyaufnhaFQvTCcw2Bpoa7ep3JgNfk2VTa4vK.mkrCrMNy03ce1H/m', NULL, NULL, NULL),
(4, 'ad1', '$2y$10$wEdWUqA9SkMcw3O6t8bUbO8wLmDrq8gnlZL8.eHcbmKkYgEdzV2kO', NULL, NULL, NULL),
(5, 'ad2', '$2y$10$Cx9vFdB.w0SIOEPA6A0njutWJNPE5DKPEkla3APc0CMjNwxu.EdN.', NULL, NULL, NULL),
(6, 'ad3', '$2y$10$4rCXhgyq58h5kFLbeRiNj.Ufscg/15dQIe.YBAfjKf4GvxEx5Nm8C', NULL, NULL, NULL),
(7, 'ad1', '$2y$10$2emN98ZUEB4jS.MkjlC52uRzpOC4FNsXlhzsk/XldKm9fNVYoAK4q', NULL, NULL, NULL),
(8, 'ad2', '$2y$10$J7hDUzEQUWjSWyuzZvVY2.DnzzwULY5XQsWf9W.p/J.oGlmiY9Mtq', NULL, NULL, NULL),
(9, 'ad3', '$2y$10$1piPIgOmtsXVO4Oghe.uiu00rsAQgy8u2bplwaN9M7rRNN.EZqe2i', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoansv`
--

CREATE TABLE `taikhoansv` (
  `id` int(10) UNSIGNED NOT NULL,
  `masv` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoansv`
--

INSERT INTO `taikhoansv` (`id`, `masv`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '18it296', '$2y$10$8IKTb/JvgEtB2dbqsWIY8eATNRECSw7MeKUnZAbs.s650cwhGiXwG', NULL, NULL, NULL),
(2, '18it222', '$2y$10$y4qNex7NEMfnBbCCDDVeQ.WixtCVbbHt9N158yJXY/TiiaOB2Og6e', NULL, NULL, NULL),
(3, '18it333', '$2y$10$Zjaz0Jazrytml5JlaIePPekN6p1Mp9eLel0bP5KZ2Sj5I1elk9Orq', NULL, NULL, NULL),
(7, '18it555', '$2y$10$PzDfXDr5GVk5gzpz8ka4gutD79Hbulul.ohzo8dRUQL.0Zl1LHPq2', NULL, NULL, NULL),
(8, '18it277', '$2y$10$wZBXTuYqH6a0F2jsa4Ep7.cftGTQoKcdAfgkEpda1owyV07OUN2SK', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinnhan`
--

CREATE TABLE `tinnhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinnhan`
--

INSERT INTO `tinnhan` (`id`, `ten`, `mail`, `tieude`, `noidung`, `created_at`, `updated_at`) VALUES
(1, '1', '1@gmail.com', '1', '1', '2019-12-17 07:10:11', NULL),
(2, '3', '3@gmail.com', '3', '3', '2019-12-17 07:11:09', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangthongbao`
--
ALTER TABLE `bangthongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giuong`
--
ALTER TABLE `giuong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khu`
--
ALTER TABLE `khu`
  ADD PRIMARY KEY (`makhu`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maphong`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`);

--
-- Chỉ mục cho bảng `taikhoanql`
--
ALTER TABLE `taikhoanql`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoansv`
--
ALTER TABLE `taikhoansv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangthongbao`
--
ALTER TABLE `bangthongbao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `giuong`
--
ALTER TABLE `giuong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `taikhoanql`
--
ALTER TABLE `taikhoanql`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `taikhoansv`
--
ALTER TABLE `taikhoansv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
