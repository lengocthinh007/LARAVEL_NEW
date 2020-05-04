-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2020 lúc 10:04 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `avatar`, `active`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Thịnh Lê', 'admin@abc', NULL, NULL, 1, '$2y$10$eESookUL5Je9.riyUOu4ce3/53h4z4OENitFtsb99tgsy8GGyDXmW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'dien-thoai-dep', 0, 'fd', 'fds', '2020-01-02 20:03:41', '2020-03-24 08:33:42'),
(2, 'Iphone 2', 'iphone-2', 1, 'Iphone 2', 'Iphone 2', '2020-01-06 02:03:26', '2020-03-26 03:27:26'),
(3, 'SamSung', 'samsung', 0, 'SamSung', 'SamSung', '2020-01-06 02:03:52', '2020-01-06 02:03:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_content` text COLLATE utf8mb4_unicode_ci,
  `c_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `c_name`, `c_email`, `c_title`, `c_content`, `c_status`, `created_at`, `updated_at`) VALUES
(5, 'Lê Tú', 'nobita@abc', 'Chào Admin', 'Tốt lắm', 1, '2020-02-13 08:52:54', '2020-02-13 08:53:21'),
(6, 'Văn Lê', 'nobita@abc', 'Help me', 'Không có gì', 1, '2020-02-13 08:54:15', '2020-02-13 08:54:24'),
(7, 'Hống Ân', 'nobita@abc', 'Hihi', 'Chào', 1, '2020-02-13 08:55:27', '2020-02-13 08:55:34'),
(11, 'NoBi', 'nobita@abc', 'hay', 'qua', 0, '2020-04-28 08:16:59', '2020-04-28 08:16:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_06_025848_cates', 1),
(19, '2019_12_06_030322_products', 1),
(20, '2019_12_06_032107_product_images', 1),
(21, '2020_01_02_091118_after_product', 2),
(22, '2020_01_20_144913_contact', 3),
(23, '2020_01_21_150650_transaction', 4),
(24, '2020_01_21_150729_order', 4),
(25, '2020_01_21_150757_after_product_2', 4),
(26, '2020_01_27_101736_rating', 5),
(27, '2020_01_27_101809_after_product_3', 5),
(28, '2020_02_02_100431_admin', 6),
(29, '2020_04_16_153927_updateorder', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `qty` tinyint(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `sale` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `pro_sale` int(11) NOT NULL DEFAULT '0',
  `pro_active` tinyint(4) NOT NULL DEFAULT '1',
  `pro_hot` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pro_content` longtext COLLATE utf8mb4_unicode_ci,
  `pro_pay` tinyint(4) NOT NULL DEFAULT '0',
  `pro_number` int(11) NOT NULL DEFAULT '0',
  `pro_total_rating` int(11) NOT NULL DEFAULT '0' COMMENT 'Tổng số đánh giá',
  `pro_total_number` int(11) NOT NULL DEFAULT '0' COMMENT 'Tổng số điểm đánh giá',
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `pro_sale`, `pro_active`, `pro_hot`, `image`, `cate_id`, `created_at`, `updated_at`, `pro_content`, `pro_pay`, `pro_number`, `pro_total_rating`, `pro_total_number`, `description`) VALUES
(1, 'Điện Thoại Vsmart Star - Hàng chính hãng', 'dien-thoai-vsmart-star-hang-chinh-hang', 2000000, 30, 1, 0, '12.jpg', 3, '2020-02-02 07:55:45', '2020-04-30 03:27:55', '<h5 style=\"text-align:justify\">Thiết kế hiện đại, tinh tế</h5>\r\n\r\n<p style=\"text-align:justify\">Điện Thoại Samsung Galaxy A01&nbsp;được trang bị màn hình Infinity-V kích thước 5.7 inch, độ phân giải HD+ cho góc nhìn tốt cùng màu sắc trung tính với độ sáng cao. Mặt lưng của máy được thiết kế bằng nhựa mỏng nhẹ bậc nhất, chỉ 8.3 mm giúp giảm để lại mồ hôi và dấu vân tay, các góc cạnh được bo tròn nhẹ nhàng cho bạn cảm giác dễ dàng cầm nắm và cho vào túi quần. Tự do thể hiện cá tính riêng với các phiên bản màu sắc: Đen, Xanh và Đỏ.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/84/ba/f1/88c1f366a28c6c78ce8594d10b0fa205.jpg\" style=\"border:0px; box-sizing:border-box; display:block; height:auto; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:750px\" /></p>\r\n\r\n<h5 style=\"text-align:justify\">Màn hình rộng cho trải nghiệm bất tận</h5>\r\n\r\n<p style=\"text-align:justify\">Chơi game thoải thích trong nhiều giờ liền, phát trực tiếp hay thỏa sức đa nhiệm bất tận với màn hình HD+ TFT rộng 5.7 inch trên Galaxy A01. Camera trước được gói gọn trong góc cắt chữ V của màn hình Infinity-V giúp tăng tối đa diện tích sử dụng, mang lại tầm nhìn thoải mái và những trải nghiệm đắm chìm.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/91/7d/3e/3ae4166b2f81d2dc08ebbe091366b1dc.jpg\" style=\"border:0px; box-sizing:border-box; display:block; height:auto; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:750px\" /></p>\r\n\r\n<h5 style=\"text-align:justify\">Hai camera sau - trọn khung hình cuộc sống</h5>\r\n\r\n<p style=\"text-align:justify\">Máy được trang bị camera kép ở mặt sau bao gồm: 1 camera chính có độ phân giải 13 MP và một camera phụ hỗ trợ chụp chân dung xóa phông 2 MP. Nhanh chóng lưu trọn từng khung cảnh dù thiếu sáng hay nắng rực rỡ với Camera sau 13MP từ Galaxy A01. Đừng quên thử nghiệm tính năng Xóa Phông Chuyên Nghiệp trước hoặc sau khi chụp để tạo nên hiệu ứng nhòe hậu cảnh đầy ảo diệu. Camera Chiều Sâu nhận diện và giúp mọi khuôn mặt trở nên nổi bật bằng cách làm mờ cảnh vật xung quanh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/0b/58/f0/f2672f1ff34d7078d181262d4d5204cc.jpg\" style=\"border:0px; box-sizing:border-box; display:block; height:auto; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle; width:750px\" /></p>\r\n\r\n<h5 style=\"text-align:justify\">&nbsp;</h5>', 2, 3, 39, 138, '<ul>\r\n	<li>Hàng chính hãng, Nguyên seal, Mới 100%, Đã kích hoạt bảo hành điện tử</li>\r\n	<li>Đã kích hoạt bảo hành điện tử</li>\r\n	<li>Màn hình: PLS TFT LCD, 5.7\", HD+</li>\r\n	<li>Hệ điều hành: Android 10</li>\r\n	<li>Camera sau: Chính 13 MP &amp; Phụ 2 MP</li>\r\n	<li>Camera trước: 5 MP</li>\r\n	<li>CPU: Snapdragon 439 8 nhân</li>\r\n	<li>RAM: 2 GB</li>\r\n</ul>'),
(3, 'Điện Thoại Samsung Galaxy Note 10 Plus (256GB/12GB) - Hàng Chính Hãng - Đã Kích Hoạt Bảo Hành Điện Tử', 'dien-thoai-samsung-galaxy-note-10-plus-256gb-12gb-hang-chinh-hang-da-kich-hoat-bao-hanh-dien-tu', 3000000, 60, 1, 0, 'view_2.jpg', 3, '2020-02-07 03:59:06', '2020-02-07 03:59:06', 'hg', 0, 10, 0, 0, NULL),
(4, 'Điện Thoại Xiaomi Redmi 7A (2GB/16GB) - Hàng Chính Hãng', 'dien-thoai-xiaomi-redmi-7a-2gb-16gb-hang-chinh-hang', 5000000, 0, 1, 0, 'review_1.jpg', 3, '2020-02-07 04:00:13', '2020-02-07 04:00:13', 'u', 0, 10, 0, 0, NULL),
(5, 'Điện Thoại iPhone 11 128GB - Hàng Chính Hãng', 'dien-thoai-iphone-11-128gb-hang-chinh-hang', 10000000, 20, 1, 0, 'fcuN_best_1.png', 3, '2020-02-07 04:01:23', '2020-02-07 04:01:23', 'fgd', 0, 10, 0, 0, NULL),
(6, 'Điện Thoại iPhone 8 Plus - Hàng Chính Hãng VN/A', 'dien-thoai-iphone-8-plus-hang-chinh-hang-vn-a', 7000000, 0, 1, 0, 'banner_product.png', 3, '2020-02-07 04:01:59', '2020-02-07 04:01:59', 'gf', 0, 10, 0, 0, NULL),
(7, 'Điện Thoại iPhone 11 Pro Max 64GB - Hàng Nhập Khẩu', 'dien-thoai-iphone-11-pro-max-64gb-hang-nhap-khau', 6000000, 50, 1, 0, 'featured_1.png', 3, '2020-02-07 04:02:42', '2020-02-07 04:02:42', 'd', 0, 10, 0, 0, NULL),
(8, 'Điện Thoại iPhone 11 Pro 64GB - Hàng Chính Hãng', 'dien-thoai-iphone-11-pro-64gb-hang-chinh-hang', 4000000, 20, 1, 0, 'featured_6.png', 3, '2020-02-07 04:03:22', '2020-04-05 09:10:22', 'fds', 0, 10, 0, 0, NULL),
(9, 'Điện Thoại iPhone 10 128GB - Hàng Chính Hãng', 'dien-thoai-iphone-10-128gb-hang-chinh-hang', 9000000, 20, 1, 0, 'new_6.jpg', 3, '2020-02-07 04:04:23', '2020-04-23 03:34:42', '<p>fsd</p>', 0, 20, 0, 0, '<p>gdfgfd</p>'),
(10, 'Điện Thoại iPhone 11 158GB - Hàng Chính Hãng', 'dien-thoai-iphone-11-158gb-hang-chinh-hang', 5000000, 20, 1, 0, 'new_2.jpg', 3, '2020-02-07 04:05:04', '2020-04-23 03:01:09', '<p>fsd</p>', 0, 10, 0, 0, '<p>hahaha</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(13, '12.jpg', 1, '2020-04-22 08:48:41', '2020-04-22 08:48:41'),
(14, '10.jpg', 1, '2020-04-22 08:48:48', '2020-04-22 08:48:48'),
(15, '1407944359.12.jpg', 1, '2020-04-22 08:48:48', '2020-04-22 08:48:48'),
(16, '9.jpg', 1, '2020-04-22 08:49:18', '2020-04-22 08:49:18'),
(17, '8.jpg', 1, '2020-04-22 08:50:03', '2020-04-22 08:50:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `number` tinyint(4) NOT NULL DEFAULT '0',
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `number`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(34, 2, 3, 'đẹp', 1, '2020-02-02 08:46:19', '2020-02-02 08:46:19'),
(35, 2, 4, 'dsadsdsds', 9, '2020-02-13 09:02:19', '2020-02-13 09:02:19'),
(36, 2, 3, 'gâu', 9, '2020-02-13 09:07:45', '2020-02-13 09:07:45'),
(38, 1, 3, 'quá tốt', 31, '2020-04-28 09:12:17', '2020-04-28 09:12:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '1',
  `total_pay` int(11) DEFAULT '0',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `code_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone`, `address`, `avatar`, `active`, `total_pay`, `code`, `time_code`, `code_active`, `time_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'tung', '$2y$10$BXS85aLwb/aBIHoK4bK9n.m4U8CTzRT3gtlwiiv/MydrMGHsqrsRa', 'xbvsdgfd@fsdfds', 4224525, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$DYCOH7APYEAFEiqCsavtOOtxkVLDHAn1Z/gGwVuZantKzv2SQX0BO', '2020-02-14 03:21:25', NULL, '2020-02-14 03:21:25', '2020-02-14 03:21:25'),
(11, 'nobita', '$2y$10$6ga4.gkXV7lKpXI4MMADqubHEZcG2BLRnmH.AmyQzbDvLnWWl4tPW', 'nobita@abc', 2424345, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$pejKLzo3NFkc8MdcYVvwZeNve5LG0FF7fZSkkaGfaysKePiDzixt.', '2020-02-14 03:21:43', 'ufaPvwoeVJjEvTl1GIcbz01E8Y2sbi89cIaFnmOfq5A4XG7f6bICoLLH7gFG', '2020-02-14 03:21:43', '2020-02-14 03:21:43'),
(12, 'dsd', '$2y$10$/J5mm4YItWy3DjN7xzQHMOgYwx28Sb/UXppzUXrx2inPvyDOmfL7K', 'nobita@abc', 524524524, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$xt6X9nkqvAupXmhbMFIYRufOjR7IjS/Eq2MNtgd29gnZU2cykytAa', '2020-02-14 03:26:13', NULL, '2020-02-14 03:26:13', '2020-02-14 03:26:13'),
(13, 'dsad', '$2y$10$Ww0xiMTNvF7JX27Bh9XN7utC6srq2eovjYvwcUnhxYUctGAwYHTFO', 'fsd@dsa', 12042, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$2YVrs9u4LPrFg1.ay2q2c.Ax2ds4r0PvWbkdsjHELLKEwV7B7FfOq', '2020-02-15 08:59:31', NULL, '2020-02-15 08:59:31', '2020-02-15 08:59:31'),
(14, 'fsdfsdf', '$2y$10$FivIhcXxO5R02QtF02/Hqu0h2bAXhhD/nMguuRwX7wbUAdt825VFO', 'xbvsdgfd@fsdfds', 2524, NULL, NULL, 1, 0, NULL, NULL, '$2y$10$5fOL4InIy9yqU0fcCFSigeJ.r39wKpyF3tTG9EIrRL2ilchT1xUfK', '2020-02-15 08:59:48', NULL, '2020-02-15 08:59:47', '2020-02-15 08:59:48'),
(16, 'ds', 'dsdsad', 'dsads@dsdsds', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'dasds', 'dsadds', 'dssadds@dsdsa', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dsdsa', 'dasdsd', 'dsdasd@ddssdsdsa', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'dasd', 'dsds', 'dsadsdsd@dsdasd', 456546, 'bến tre', '81235782_1245266008998861_4379076409356713984_n.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-22 08:19:44'),
(30, 'hggjghjjgh', '$2y$10$0aUKMiG53R4r3j/h2eC/y.kzfQkWIUXGuNnFZ51xlu3VmDq0GgjwS', 'lengocthinh0000@gmail.com', 5464599, 'bến tre99', 'product-thumb-3.jpg', 1, 0, NULL, NULL, '$2y$10$4WPX/8.yl0/ApjijoBDZm.w.s1RV0Soas59fN3WMeBlcC8UBGOrma', '2020-04-25 09:01:38', 'd9a2kIJFqQmQv4EqmS6kGnXsYNUDz3tFCciOKLifcrqmo1vu8wwcaA0jHybo', '2020-04-25 09:01:38', '2020-04-26 08:16:25'),
(31, 'dsdasd', '$2y$10$6RKok1.u4fEM9TA3TqWaZ.fpNQtmqIEM0NNjqKy4bkMJR6IZVUjku', 'lengocthinh007@gmail.com', 546455, NULL, NULL, 2, 0, NULL, NULL, '$2y$10$8u8L1VLmKml7IP/xOuOCW.l65yePWH2U4zZ3Lwax.1eHqelX3ZB.K', '2020-04-26 08:50:37', 'xrYw5lPXo5i4W2gzmkprtUXQxMxqLAQy5IABikzUjmwunIGENc2C6Z11TWRD', '2020-04-26 08:50:37', '2020-04-27 07:57:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_active_index` (`active`);

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_transaction_id_index` (`transaction_id`),
  ADD KEY `order_product_id_index` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_alias_index` (`alias`),
  ADD KEY `products_pro_active_index` (`pro_active`),
  ADD KEY `products_cate_id_index` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_product_id_index` (`product_id`),
  ADD KEY `rating_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_user_id_index` (`user_id`),
  ADD KEY `transaction_status_index` (`status`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`name`),
  ADD KEY `code` (`code`),
  ADD KEY `code_active` (`code_active`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
