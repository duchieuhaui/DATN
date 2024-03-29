-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th03 29, 2024 lúc 02:34 AM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-cll-lve
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lhkhbdnj_vntravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@yomail.com', NULL, '$2y$10$.loaK9zt.wqZtAFxS78CFuQRSKRQtxCDewHXaEudBRZDKL0hYgzVq', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount_code` varchar(20) DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `total` double DEFAULT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `people` mediumint(9) NOT NULL,
  `payment_method` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Cash, 2: Momo',
  `invoice_no` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `is_payment` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Unpaid, 1: paid',
  `departure_time` date NOT NULL,
  `requirement` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: New, 2: Confirmed, 3: Completed, 4: Cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `tour_id`, `customer_id`, `price`, `discount_code`, `discount`, `total`, `deposit`, `people`, `payment_method`, `invoice_no`, `transaction_id`, `is_payment`, `departure_time`, `requirement`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3490000, 'GGCUOITUAN', 10, 3591000, 0, 1, 1, NULL, NULL, 0, '2023-11-19', NULL, 3, '2023-11-19 09:40:51', '2023-11-19 10:48:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_rooms`
--

CREATE TABLE `booking_rooms` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_rooms`
--

INSERT INTO `booking_rooms` (`id`, `booking_id`, `room_id`, `number`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 500000, '2023-11-19 09:40:51', '2023-11-19 09:40:51'),
(2, 1, 2, 0, 250000, '2023-11-19 09:40:51', '2023-11-19 09:40:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Chưa đọc, 2: Quản trị viên đã đọc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` double NOT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `number`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GGCUOITUAN', 10, 19, '2023-11-19 16:39:00', '2023-11-20 16:39:00', 1, '2023-11-19 09:39:28', '2023-11-19 09:40:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `province`, `zipcode`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Minh Toàn', 'Nguyễn', 'xuansang332@gmail.com', '0376545644', '2 Chùa Bộc, Quang Trung', 'Hà Nội', 'Đống Đa', 42000, 'Việt Nam', 1, '2023-11-19 09:40:51', '2023-11-19 09:40:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hà Giang', 'ha-giang', '20231119152924-6559c7640c3d9dulichhagiang.jpg', 1, '2023-11-19 08:29:24', '2023-11-19 08:29:24'),
(2, 'Sa Pa', 'sa-pa', '20231119153125-6559c7dd610c730-06-2023-14-53-09-du-lich-sa-pa-0.jpg', 1, '2023-11-19 08:31:25', '2023-11-19 08:31:25'),
(3, 'Nha Trang', 'nha-trang', '20231119153300-6559c83c1daae1-ngay-o-nha-trang-nen-di-dau.jpg', 1, '2023-11-19 08:33:00', '2023-11-19 08:33:00'),
(4, 'Đà Lạt', 'da-lat', '20231119165244-6559daec7cacacanh-dep-da-lat-thumb.jpg', 1, '2023-11-19 09:52:44', '2023-11-19 09:52:44'),
(5, 'Đà Nẵng', 'da-nang', '20231119165354-6559db323a8d1ba-na-hills.jpg', 1, '2023-11-19 09:53:54', '2023-11-19 09:53:54'),
(6, 'Vũng Tàu', 'vung-tau', '20231119174531-6559e74b63070tong-quan-du-lich-vung-tau-ivivu.jpg', 1, '2023-11-19 10:45:31', '2023-11-19 10:45:31'),
(7, 'Hạ Long', 'ha-long', '20231119174616-6559e778ca1cbdia-diem-du-lich-quang-ninh.png', 1, '2023-11-19 10:46:16', '2023-11-20 18:51:56'),
(8, 'Huế', 'hue', '20231119174646-6559e7964e69chue-ivivu-2.jpeg', 1, '2023-11-19 10:46:46', '2023-11-19 10:46:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faqs`
--

INSERT INTO `faqs` (`id`, `tour_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Giá tour bao gồm?', '- Xe vận chuyển 16 - 29 chỗ theo suốt chương trình.\r\n- Khách sạn tiêu chuẩn tại địa phương.\r\n- Bữa ăn theo chương trình, thực đơn bữa chính 120,000 vnđ/khách/bữa\r\n- Hướng dẫn viên chuyên nghiệp, tận tình.\r\n- Vé thắng cảnh vào cửa một lần tại các điểm thăm quan.\r\n- Quà tặng mũ Vietravel.\r\n- Nước suối trên xe 01 chai 0,5l/khách/ngày.\r\n- Bảo hiểm du lịch mức chi trả tối đa 120.000.000đ/vụ.\r\n- Thuế VAT theo quy định của nhà nước', 1, '2023-11-19 09:26:31', '2023-11-19 09:26:31'),
(2, 1, 'Lưu ý khi chuyển/hủy tour', 'Sau khi đóng tiền, nếu quý khách muốn hủy tour, vui lòng đem CCCD và hóa đơn đã đóng tiền đến ngay văn phòng của Vietravel để làm thủ tục hủy tour. Công ty không nhận khách báo hủy qua điện thoại.\r\n- Thời gian hủy tour được tính cho ngày làm việc, không tính thứ bảy, chủ nhật và các ngày Lễ, Tết.\r\n- Trường hợp quý khách tới trễ giờ bay được coi là hủy tour trước 1 ngày.\r\nCác quy định về điều kiện hoàn/ hủy tour thực hiện theo bản Điều kiện bán vé du lịch đính kèm hợp đồng.', 1, '2023-11-19 09:26:58', '2023-11-19 09:26:58'),
(3, 2, 'Giá tour bao gồm', '- Xe tham quan (15, 25 chỗ tùy theo số lượng khách) theo chương trình\r\n- Nhà nghỉ, khách sạn theo tiêu chuẩn 2 khách/phòng hoặc 3 khách/phòng.\r\n- Vé tham quan theo chương trình\r\n- Các bữa ăn theo chương trình : 05 bữa sáng + 11 bữa chính từ 120.000 – 140.000vnd/ khách\r\n- Hướng dẫn viên tiếng Việt nối tuyến\r\n- Bảo hiểm du lịch với mức bồi thường cao nhất 120.000.000đ/vụ\r\n- Nón Vietravel + Nước suối + Khăn lạnh\r\n- Thuế VAT', 1, '2023-11-19 09:49:17', '2023-11-19 09:49:17'),
(4, 5, 'Giá tour bao gồm', '- Xe tham quan (15, 25, 35, 45 chỗ tùy theo số lượng khách) theo chương trình\r\n- Vé máy bay khứ hồi SGN – DAD - SGN\r\n- Hành lý ký gửi: 20 kg, xách tay 7 kg/1 khách\r\n- Khách sạn theo tiêu chuẩn 2 khách/phòng hoặc 3 khách/phòng\r\n- Ăn theo chương trình, thực đơn món Việt (set menu)\r\n- Vé tham quan theo chương trình\r\n- Hướng dẫn viên tiếng Việt nối tuyến\r\n- Bảo hiểm du lịch với mức bồi thường cao nhất 120.000.000đ/vụ\r\n- Nón Vietravel + Nước suối + Khăn lạnh\r\n- Thuế VAT', 1, '2023-11-20 18:48:47', '2023-11-20 18:48:47'),
(5, 5, 'Lưu ý khi chuyển/hủy tour', 'Sau khi đóng tiền, nếu Quý khách muốn chuyển/hủy tour xin vui lòng mang Vé Du Lịch đến văn phòng đăng ký tour để làm thủ tục chuyển/hủy tour và chịu mất phí theo quy định của Vietravel. Không giải quyết các trường hợp liên hệ chuyển/hủy tour qua điện thoại.', 1, '2023-11-20 18:49:03', '2023-11-20 18:49:03'),
(6, 5, 'Các điều kiện hủy tour đối với ngày thường', '- Được chuyển sang các tuyến du lịch khác trước ngày khởi hành 20 ngày : Không mất chi phí.\r\n- Nếu hủy hoặc chuyển sang các chuyến du lịch khác ngay sau khi đăng ký đến từ 15-19 ngày trước ngày khởi hành: Chi phí hủy tour: 50% tiền cọc tour.\r\n- Nếu hủy hoặc chuyển sang các chuyến du lịch khác từ 12-14 ngày trước ngày khởi hành: Chi phí hủy tour: 100% tiền cọc tour.\r\n- Nếu hủy chuyến du lịch trong vòng từ 08-11 ngày trước ngày khởi hành: Chi phí hủy tour: 50% trên giá tour du lịch.\r\n- Nếu hủy chuyến du lịch trong vòng từ 05-07 ngày trước ngày khởi hành: Chi phí hủy tour: 70% trên giá tour du lịch.\r\n- Nếu hủy chuyến du lịch trong vòng từ 02-04 ngày trước ngày khởi hành: Chi phí hủy tour: 90% trên giá vé du lịch.\r\n- Nếu hủy chuyến du lịch trong vòng 1 ngày trước ngày khởi hành : Chi phí hủy tour: 100% trên giá vé du lịch.', 1, '2023-11-20 18:49:21', '2023-11-20 18:49:21'),
(7, 5, 'Điều kiện thanh toán', '- Khi đăng ký đặt cọc 50% số tiền tour.\r\n- Thanh toán hết trước ngày khởi hành 7-10 ngày (tour ngày thường), 20-25 ngày (tour lễ tết).', 1, '2023-11-20 18:49:40', '2023-11-20 18:49:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `tour_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '20231119161625-6559d269a36e3dong-van-ga-giang-1.jpg', NULL, NULL),
(2, 2, '20231119164537-6559d941045ectfd-211224122253-974945.jpg', NULL, NULL),
(3, 2, '20231119164537-6559d9410579ftfd-211224122642-631128.jpg', NULL, NULL),
(4, 4, '20231119173551-6559e507e4a21tfd-220718041417-485554.jpg', NULL, NULL),
(5, 4, '20231119173551-6559e507e6055tfd-220718041930-019084.jpg', NULL, NULL),
(6, 4, '20231119173551-6559e507e6378tfd-220718042008-362977.jpg', NULL, NULL),
(7, 6, '20231120135537-655b02e9767cadc-230614-tuong-chua-kito.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `itineraries`
--

CREATE TABLE `itineraries` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `itineraries`
--

INSERT INTO `itineraries` (`id`, `tour_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'HÀ NỘI – TUYÊN QUANG – HÀ GIANG (Ăn trưa, chiều)', '2023-11-19 09:19:09', '2023-11-19 09:19:09'),
(2, 1, 'HÀ GIANG – LŨNG CÚ – ĐỒNG VĂN (Ăn sáng, trưa, chiều)', '2023-11-19 09:20:50', '2023-11-19 09:20:50'),
(3, 2, 'HÀ NỘI - HÀ GIANG 02 bữa ăn: (Trưa, Chiều)', '2023-11-19 09:48:13', '2023-11-19 09:48:13'),
(4, 2, 'HÀ GIANG - QUẢN BẠ - YÊN MINH – ĐỒNG VĂN 03 bữa ăn: (Sáng, Trưa, Chiều)', '2023-11-19 09:48:21', '2023-11-19 09:48:21'),
(5, 2, 'THÁC BẢN GIỐC – ĐỘNG NGƯỜM NGAO – LÀNG ĐÁ KHUỔI KY 03 bữa ăn: (Sáng, Trưa, Chiều)', '2023-11-19 09:48:32', '2023-11-19 09:48:32'),
(7, 2, 'CAO BẰNG – KHU DI TÍCH PÁC PÓ – BA BỂ 03 bữa ăn: (Sáng, Trưa, Chiều)', '2023-11-19 09:48:48', '2023-11-19 09:48:48'),
(8, 2, 'ĐỒNG VĂN – MÈO VẠC – CAO BẰNG 03 bữa ăn: (Sáng, Trưa, Chiều)', '2023-11-19 09:48:52', '2023-11-19 09:48:52'),
(9, 2, 'BA BỂ - BẮC CẠN – HÀ NỘI 02 bữa ăn: (Sáng, Trưa)', '2023-11-19 09:48:57', '2023-11-19 09:48:57'),
(10, 4, 'TP. HỒ CHÍ MINH – ĐÀ LẠT Số bữa ăn: 3 bữa (Ăn sáng, trưa, chiều)', '2023-11-19 10:36:06', '2023-11-19 10:36:06'),
(11, 4, 'ĐÀ LẠT - THÀNH PHỐ NGÀN HOA Số bữa ăn: 3 bữa (Ăn sáng, trưa, chiều)', '2023-11-19 10:36:10', '2023-11-19 10:36:10'),
(12, 4, 'ĐÀ LẠT - NHA TRANG Số bữa ăn: 3 bữa (Ăn sáng, trưa, chiều)', '2023-11-19 10:36:14', '2023-11-19 10:36:14'),
(13, 4, 'NHA TRANG - HÒN LAO - VINWONDERS NHA TRANG Số bữa ăn: 2 bữa (Ăn sáng, trưa, tự túc ăn chiều)', '2023-11-19 10:36:18', '2023-11-19 10:36:18'),
(14, 4, 'NHA TRANG – TP.HCM Số bữa ăn: 2 bữa (Ăn sáng, trưa)', '2023-11-19 10:36:21', '2023-11-19 10:36:21'),
(15, 5, 'TP HỒ CHÍ MINH - ĐÀ NẴNG - HUẾ (Ăn trưa, chiều)', '2023-11-20 18:46:19', '2023-11-20 18:46:19'),
(16, 5, 'HUẾ - LA VANG - ĐỘNG THIÊN ĐƯỜNG (Ăn sáng, trưa, chiều)', '2023-11-20 18:46:23', '2023-11-20 18:46:23'),
(17, 5, 'HUẾ - ĐÀ NẴNG - KHU DU LỊCH BÀ NÀ - PHỐ CỔ HỘI AN (Ăn sáng, chiều)', '2023-11-20 18:46:27', '2023-11-20 18:46:27'),
(18, 5, 'ĐÀ NẴNG - TP.HỒ CHÍ MINH (Ăn sáng)', '2023-11-20 18:46:32', '2023-11-20 18:46:32'),
(19, 6, 'TP.HCM - VŨNG TÀU - BIỂN XANH VẪY GỌI (Ăn trưa)', '2023-11-20 18:55:49', '2023-11-20 18:55:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_12_21_093040_create_admins_table', 1),
(11, '2021_12_21_093040_create_bookings_table', 1),
(12, '2021_12_21_093040_create_contacts_table', 1),
(13, '2021_12_21_093040_create_customers_table', 1),
(14, '2021_12_21_093040_create_destinations_table', 1),
(15, '2021_12_21_093040_create_faqs_table', 1),
(16, '2021_12_21_093040_create_galleries_table', 1),
(17, '2021_12_21_093040_create_itineraries_table', 1),
(18, '2021_12_21_093040_create_places_table', 1),
(19, '2021_12_21_093040_create_reviews_table', 1),
(20, '2021_12_21_093040_create_tour_types_table', 1),
(21, '2021_12_21_093040_create_tours_table', 1),
(22, '2021_12_21_093041_add_foreign_keys_to_bookings_table', 1),
(23, '2021_12_21_093041_add_foreign_keys_to_faqs_table', 1),
(24, '2021_12_21_093041_add_foreign_keys_to_galleries_table', 1),
(25, '2021_12_21_093041_add_foreign_keys_to_itineraries_table', 1),
(26, '2021_12_21_093041_add_foreign_keys_to_places_table', 1),
(27, '2021_12_21_093041_add_foreign_keys_to_reviews_table', 1),
(28, '2021_12_21_093041_add_foreign_keys_to_tours_table', 1),
(29, '2022_01_23_130713_create_jobs_table', 1),
(30, '2022_05_04_154509_create_rooms_table', 1),
(31, '2022_05_04_155339_add_discount_column_to_bookings_table', 1),
(32, '2022_05_04_155923_create_coupons_table', 1),
(33, '2022_05_07_072455_add_deposit_column_to_bookings_table', 1),
(34, '2022_05_10_035420_add_date_column_to_coupons_table', 1),
(35, '2022_05_17_222514_add_invoice_no_column_to_bookings_table', 1),
(36, '2022_05_21_114510_create_booking_rooms_table', 1),
(37, '2022_05_21_123629_add_number_to_rooms_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `places`
--

INSERT INTO `places` (`id`, `itinerary_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ngủ đêm tại khách sạn Hà Giang', '<p><strong>06h30</strong>&nbsp;Xe v&agrave; hướng dẫn vi&ecirc;n đ&oacute;n qu&yacute; kh&aacute;ch tại&nbsp;<strong><a href=\"https://www.vietravel.com/?utm_source=internalbl&amp;utm_medium=click&amp;utm_campaign=ATLinks\" target=\"_blank\">Vietravel</a>&nbsp;Hanoi - Số 3 Hai B&agrave; Trưng, Hoàn Ki&ecirc;́m, Hà N&ocirc;̣i</strong>&nbsp;khởi h&agrave;nh đi H&agrave; Giang, tr&ecirc;n đường dừng tham quan:&nbsp;</p>\r\n\r\n<p><strong>- Đền Th&aacute;c C&aacute;i</strong>&nbsp;- Được x&acirc;y dựng từ thế kỷ XV, ng&ocirc;i đền cổ k&iacute;nh bắt nguồn từ tục thờ Mẫu của nh&acirc;n d&acirc;n Lạc Việt c&oacute; từ xa xưa trong lịch sử. Sau lưng đền l&agrave; đồi n&uacute;i, mặt trước hướng về ph&iacute;a s&ocirc;ng L&ocirc; tạo n&ecirc;n kh&iacute; thi&ecirc;ng sơn thủy hội tụ, bốn m&ugrave;a thời tiết trong l&agrave;nh m&aacute;t mẻ, tĩnh mịch.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch d&ugrave;ng cơm tối v&agrave; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi.&nbsp;&nbsp;</p>', 1, '2023-11-19 09:19:40', '2023-11-19 09:20:17'),
(3, 2, 'Ngủ đêm tại khách sạn Đồng Văn', '<p>Qu&yacute; kh&aacute;ch trả ph&ograve;ng, ăn s&aacute;ng. Xe v&agrave; hướng dẫn vi&ecirc;n đưa Qu&yacute; kh&aacute;ch đi thị trấn&nbsp;<strong><a href=\"https://travel.com.vn/ha-giang/tour-dong-van.aspx?utm_source=internalbl&amp;utm_medium=click&amp;utm_campaign=ATLinks\" target=\"_blank\">Đồng Văn</a>&nbsp;</strong>tham quan:</p>\r\n\r\n<ul>\r\n	<li>Đo&agrave;n dừng ch&acirc;n nghỉ ngơi tại&nbsp;<strong>Cổng trời Quản Bạ&nbsp;</strong>- Nơi tiếp gi&aacute;p giữa trời v&agrave; đất, ngắm&nbsp;<strong>thị trấn Tam Sơn</strong>&nbsp;v&agrave; danh thắng&nbsp;<strong>N&uacute;i Đ&ocirc;i</strong>.</li>\r\n</ul>\r\n\r\n<p>Ăn trưa tại&nbsp;<strong>Y&ecirc;n Minh,&nbsp;</strong>sau bữa trưa đo&agrave;n thăm quan:</p>\r\n\r\n<ul>\r\n	<li><strong>Phố C&aacute;o</strong>, t&igrave;m hiểu nếp nh&agrave; c&ograve;n giữ nguy&ecirc;n truyền thống,&nbsp;<strong>chụp ảnh hoa tam gi&aacute;c mạch hoa đào, hoa mơ, hoa mận &hellip;</strong>b&ecirc;n cạnh những&nbsp; bờ&nbsp; rào đ&aacute; mắt c&aacute;o đặc sắc của người d&acirc;n vùng cao ( n&ecirc;́u vào dịp hoa đào nở), tham quan và&nbsp;<strong>chụp ảnh thung lũng Sủng Là</strong>&nbsp;( được gọi là thung lũng hoa h&ocirc;̀ng) nơi&nbsp; từng l&agrave; phim trường của bộ phim Chuy&ecirc;̣n Của PAO nổi tiếng.</li>\r\n	<li><strong>L&agrave;ng văn h&oacute;a Lũng Cẩm</strong>&nbsp;(thuộc x&atilde; Sũng L&agrave;), men theo những h&agrave;ng ng&ocirc; xanh mướt dọc hai b&ecirc;n đường đo&agrave;n v&agrave;o tham quan l&agrave;ng với những n&eacute;t văn ho&aacute; đặc sắc của 3 d&acirc;n tộc L&ocirc; L&ocirc;, M&ocirc;ng v&agrave; H&aacute;n v&agrave;<strong>&nbsp;những c&aacute;nh đồng hoa rực rỡ sắc m&agrave;u</strong></li>\r\n	<li><strong>Dinh nh&agrave; Vương (Dinh Vua M&egrave;o</strong>)&ndash; Đ&acirc;y l&agrave; 1 c&ocirc;ng tr&igrave;nh kiến tr&uacute;c đẹp hiếm c&oacute; v&agrave; rất độc đ&aacute;o của v&ugrave;ng cao nguy&ecirc;n n&uacute;i đ&aacute;. Sau đ&oacute; đo&agrave;n tiếp tục khởi h&agrave;nh đi&nbsp;<strong>Lũng C&uacute;</strong>. Qu&yacute; kh&aacute;ch c&oacute; thể dừng ch&acirc;n chụp h&igrave;nh những d&atilde;y n&uacute;i đ&aacute; chập tr&ugrave;ng h&ugrave;ng vỹ hay những&nbsp;<strong>c&aacute;nh đồng hoa tam gi&aacute;c mạch rực rỡ sắc hồng khu vực Lũng T&aacute;o</strong>.</li>\r\n	<li>chinh phục&nbsp;<strong>cột cờ Lũng C&uacute;</strong>&nbsp;&ndash; Nơi địa đầu điểm Cực Bắc Tổ Quốc với l&aacute; cờ 54m2 tượng trưng cho 54 d&acirc;n tộc anh em</li>\r\n</ul>\r\n\r\n<p>Xe đưa đo&agrave;n về Đồng Văn, nhận ph&ograve;ng kh&aacute;ch sạn, nghỉ ngơi v&agrave; ăn tối.</p>', 1, '2023-11-19 09:22:16', '2023-11-19 09:22:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `rate` tinyint(4) NOT NULL COMMENT 'Từ 1-5 tương ứng với 1-5 sao',
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` double NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `tour_id`, `name`, `price`, `number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phòng đôi', 500000, 2, '2023-11-19 09:28:13', '2023-11-19 09:28:36'),
(2, 1, 'Phòng đơn', 250000, 2, '2023-11-19 09:28:43', '2023-11-19 09:28:43'),
(3, 2, 'Phòng gia đình (4 người)', 1500000, 5, '2023-11-19 09:47:09', '2023-11-19 09:47:09'),
(4, 4, 'Phòng đơn', 400000, 10, '2023-11-19 10:36:44', '2023-11-19 10:36:44'),
(5, 4, 'Phòng đôi', 750000, 5, '2023-11-19 10:36:56', '2023-11-19 10:36:56'),
(6, 5, 'Phòng gia đình (4 người)', 2000000, 4, '2023-11-20 18:50:26', '2023-11-20 18:50:26'),
(7, 5, 'Phòng đôi', 1000000, 5, '2023-11-20 18:50:38', '2023-11-20 18:50:38'),
(8, 5, 'Phòng đơn', 600000, 10, '2023-11-20 18:50:48', '2023-11-20 18:50:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_seo` varchar(100) DEFAULT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `panoramic_image` varchar(255) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `price` double NOT NULL,
  `duration` tinyint(4) NOT NULL,
  `overview` text DEFAULT NULL,
  `included` text DEFAULT NULL,
  `additional` text DEFAULT NULL,
  `departure` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `trending` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tours`
--

INSERT INTO `tours` (`id`, `type_id`, `destination_id`, `name`, `slug`, `image`, `image_seo`, `meta_title`, `meta_description`, `map`, `panoramic_image`, `video`, `price`, `duration`, `overview`, `included`, `additional`, `departure`, `status`, `trending`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hà Giang - Lũng Cú - Đồng Văn - Nơi đá nở hoa', 'ha-giang-lung-cu-dong-van-noi-da-no-hoa', '20231119161233-6559d18194d1blung-cu-ha-giang.jpg', NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117721.67370995415!2d104.91646845030887!3d22.772716913833527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cc79b180b4239d%3A0xb7a373a73bc23544!2zVHAuIEjDoCBHaWFuZywgSMOgIEdpYW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1700385260684!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 'https://youtu.be/ATpH8kFWiQU?si=JI_7pVyiCMSeUtE1', 3490000, 4, '<p>H&agrave; Giang l&agrave; mảnh đất c&oacute; rất nhiều m&agrave;u sắc ấn tượng. M&agrave;u hồng phấn của những c&aacute;nh đồng hoa tam gi&aacute;c mạch, m&ugrave;a của hoa cải v&agrave;ng, hoa mận, hoa ban; m&agrave;u v&agrave;ng ươm như r&oacute;t mật của những thửa ruộng bậc thang m&ugrave;a l&uacute;a ch&iacute;n; m&agrave;u xanh của những d&atilde;y n&uacute;i tr&ugrave;ng điệp, của cung đường đ&egrave;o M&atilde; P&igrave; L&egrave;ng nổi tiếng uốn lượn b&ecirc;n d&ograve;ng s&ocirc;ng Nho Quế thơ mộng&hellip; phủ khắp cả miền bi&ecirc;n cương h&ugrave;ng vĩ của Tổ quốc. - H&agrave; Giang c&ograve;n mang sắc m&agrave;u rực rỡ của những chiếc v&aacute;y, của một kh&ocirc;ng gian bồng bềnh m&acirc;y kh&oacute;i, xanh ngắt của n&uacute;i đồi với những con đường quanh co&hellip; Vẻ đẹp của cuộc sống giản dị h&agrave;ng ng&agrave;y giữa thi&ecirc;n nhi&ecirc;n h&ugrave;ng vĩ với những &aacute;nh mắt ng&acirc;y thơ của trẻ nhỏ hay nụ cười hồn hậu của người d&acirc;n&hellip; - Đặc biệt, du kh&aacute;ch đến H&agrave; Giang c&ograve;n bị hớp hồn bởi những triền đ&aacute; tai m&egrave;o tr&ugrave;ng điệp, những con đường quanh co, uốn lượn, những điểm đến độc đ&aacute;o như cao nguy&ecirc;n đ&aacute; Đồng Văn, dinh thự họ Vương, cột cờ Lũng C&uacute; hay cao điểm Vị Xuy&ecirc;n. Những sắc m&agrave;u mang đầy sức sống của v&ugrave;ng sơn cước khi &ldquo;cỏ c&acirc;y chen đ&aacute;, l&aacute; chen hoa&rdquo; như mời gọi du kh&aacute;ch đến với du lịch H&agrave; Giang. Tất cả đ&atilde; tạo n&ecirc;n một bức tranh H&agrave; Giang rực rỡ l&agrave;m say đắm l&ograve;ng người v&agrave; mời gọi du kh&aacute;ch.</p>', '<p>Khởi h&agrave;nh <strong>19/11/2023 - Giờ đi: 06:30</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>00:00 ng&agrave;y&nbsp; 19/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>4 ng&agrave;y</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>H&agrave; Nội</strong></p>', NULL, '<p>Khởi h&agrave;nh <strong>19/11/2023 - Giờ đi: 06:30</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>00:00 ng&agrave;y&nbsp; 19/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>4 ng&agrave;y</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>H&agrave; Nội</strong></p>', 1, 2, '2023-11-19 09:12:33', '2023-11-19 10:38:05'),
(2, 2, 1, 'Lũng Cú - Đồng Văn - Mã Pí Lèng - Mèo Vạc - Cao Bằng - Thác Bản Giốc - Hồ Ba Bể', 'lung-cu-dong-van-ma-pi-leng-meo-vac-cao-bang-thac-ban-gioc-ho-ba-be', '20231119164525-6559d93539930tfd-211224122910-956190.jpg', NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117721.67370995415!2d104.91646845030887!3d22.772716913833527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cc79b180b4239d%3A0xb7a373a73bc23544!2zVHAuIEjDoCBHaWFuZywgSMOgIEdpYW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1700387269775!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, 7450000, 6, '<p>H&agrave;nh tr&igrave;nh kh&aacute;m ph&aacute; v&ograve;ng cung Đ&ocirc;ng Bắc sẽ đưa du kh&aacute;ch tham quan những điểm đến th&uacute; vị của cao nguy&ecirc;n Đ&aacute; Đồng Văn, cột cờ Lũng C&uacute; uy nghi&ecirc;m, đ&egrave;o M&atilde; P&iacute; L&egrave;ng h&ugrave;ng vĩ. V&agrave; b&ecirc;n cạnh đ&oacute; Cao Bằng cũng kh&ocirc;ng k&eacute;m phần hấp dẫn với Th&aacute;c Bản Giốc cuồn cuộn v&agrave; một Hồ Ba Bể trong xanh, tuyệt đẹp tại Bắc Kạn.</p>', '<p>Khởi h&agrave;nh&nbsp;<strong>30/11/2023 - Giờ đi: 07:15</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>07:15 ng&agrave;y 30/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>6 ng&agrave;y</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>H&agrave; Nội</strong></p>', NULL, '<p>Khởi h&agrave;nh&nbsp;<strong>30/11/2023 - Giờ đi: 07:15</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>07:15 ng&agrave;y 30/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>6 ng&agrave;y</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>H&agrave; Nội</strong></p>', 1, 1, '2023-11-19 09:45:25', '2023-11-19 09:47:57'),
(3, 1, 3, 'Nha Trang - Chùa Long Sơn - Biển Nhũ Tiên - Vinwonder - Làng Gốm Bàu Trúc - Khám Phá Cao Tốc Mới - Kích Cầu Du Lịch', 'nha-trang-chua-long-son-bien-nhu-tien-vinwonder-lang-gom-bau-truc-kham-pha-cao-toc-moi-kich-cau-du-lich', '20231119165551-6559dba77d2b5tfd-230630023825-767139-vin-wonder-4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1490000, 3, '<p>Nha Trang với kh&iacute; hậu &ocirc;n h&ograve;a, biển xanh trong quanh năm c&ugrave;ng những điểm vui chơi bậc nhất v&agrave; kh&ocirc;ng ngừng đổi mới hằng ng&agrave;y lu&ocirc;n thu h&uacute;t du kh&aacute;ch gần xa. Đến với Nha Trang, du kh&aacute;ch kh&ocirc;ng chỉ tận hưởng những đợt gi&oacute; biển trong nắng ấm m&agrave; c&ograve;n c&oacute; dịp thưởng thức hải sản tươi ngon c&ugrave;ng sự ch&agrave;o đ&oacute;n nồng hậu từ những người d&acirc;n v&ugrave;ng biển nghĩa t&igrave;nh, cho Qu&yacute; kh&aacute;ch trải nghiệm kh&oacute; qu&ecirc;n tại v&ugrave;ng đất n&agrave;y. &nbsp;</p>', '<p>Khởi h&agrave;nh&nbsp;<strong>22/11/2023 - Giờ đi: 06:00</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>05:30 ng&agrave;y 22/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>3 ng&agrave;y 2 đ&ecirc;m</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>TP. Hồ Ch&iacute; Minh</strong></p>', NULL, '<p>Khởi h&agrave;nh&nbsp;<strong>22/11/2023 - Giờ đi: 06:00</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>05:30 ng&agrave;y 22/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>3 ng&agrave;y 2 đ&ecirc;m</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>TP. Hồ Ch&iacute; Minh</strong></p>', 1, 1, '2023-11-19 09:55:51', '2023-11-19 09:56:12'),
(4, 4, 4, 'Hành trình Hoa và Biển: Đà Lạt - Nha Trang', 'hanh-trinh-hoa-va-bien-da-lat-nha-trang', '20231119173429-6559e4b5e2f2atfd-220718042219-577912.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 4790000, 5, NULL, '<p>Khởi h&agrave;nh&nbsp;<strong>22/11/2023 - Giờ đi: 05:30</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>05:30 ng&agrave;y 22/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>5 ng&agrave;y</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>TP. Hồ Ch&iacute; Minh</strong></p>', NULL, '<p>Điểm thăm quan:&nbsp;<strong>Nha Trang, Đ&agrave; Lạt, Vinwonder, Ga Đ&agrave; Lạt, Th&aacute;c Bobla, Đường Hầm Đất S&eacute;t, L&agrave;ng Hoa Vạn Th&agrave;nh, L&agrave;ng Ch&agrave;i Xưa, H&ograve;n Lao, Đảo Khỉ</strong></p>\r\n\r\n<p>Ẩm thực:&nbsp;<strong>Buffet s&aacute;ng, Theo thực đơn, Đặc sản địa phương, Buffet s&aacute;ng, Theo thực đơn, Đặc sản địa phương</strong></p>', 1, 1, '2023-11-19 10:34:29', '2023-11-19 10:35:22'),
(5, 1, 5, 'Đà Nẵng – KDL Bà Nà – Sơn Trà – Hội An – La Vang - Động Phong Nha – Làng hương Thủy Xuân - Huế', 'da-nang-kdl-ba-na-son-tra-hoi-an-la-vang-dong-phong-nha-lang-huong-thuy-xuan-hue', '20231120134600-655b00a8eada8tfd-220524052944-027957.jpg', NULL, 'Du lịch đà nẵng', 'Đà Nẵng - Huế - Đầm Lập An - La Vang - Động Thiên Đường - KDL Bà Nà - Cầu Vàng - Sơn Trà - Hội An - Đà Nẵng', NULL, NULL, NULL, 6190000, 4, '<p>Nh&acirc;n dịp kỷ niệm 30 năm Quần thể Di t&iacute;ch Cố đ&ocirc; Huế được UNESCO c&ocirc;ng nhận l&agrave; Di sản Văn h&oacute;a Thế giới, 20 năm Nh&atilde; nhạc được c&ocirc;ng nhận Di sản Văn h&oacute;a Phi vật thể đại diện của nh&acirc;n loại, Festival Huế 2023 với Chủ đề: &ldquo;Di sản Văn h&oacute;a với hội nhập v&agrave; ph&aacute;t triển&rdquo; mở đầu bằng Chương tr&igrave;nh Khai hội &ndash; Lễ Ban S&oacute;c ng&agrave;y 01/01/2023 diễn ra tại Đại Nội kết hợp c&ugrave;ng c&aacute;c lễ hội, hoạt động Tết cung đ&igrave;nh v&agrave; d&acirc;n gian v&ocirc; c&ugrave;ng phong ph&uacute;, độc đ&aacute;o với những tập tục đ&oacute;n Tết, những kh&ocirc;ng gian văn h&oacute;a Tết truyền thống. Ngo&agrave;i ra, Lễ hội Ho&agrave;ng mai (từ 9 - 19/1) nhằm hướng tới x&acirc;y dựng Thừa Thi&ecirc;n Huế trở th&agrave;nh xứ sở Mai v&agrave;ng của Việt Nam cũng l&agrave; điểm nhấn của năm nay. Khi đến Đại Nội, B&ecirc;n cạnh việc t&igrave;m hiểu kiến tr&uacute;c lịch sử một thời h&agrave;o nho&aacute;ng kinh th&agrave;nh xưa, Qu&yacute; kh&aacute;ch c&ograve;n được trải nghiệm kh&ocirc;ng kh&iacute; hội xu&acirc;n rộn r&atilde; khắp nơi.</p>', '<p>Khởi h&agrave;nh&nbsp;<strong>22/11/2023 - Giờ đi: 07:10</strong></p>\r\n\r\n<p>Tập trung&nbsp;<strong>05:10 ng&agrave;y 22/11/2023</strong></p>\r\n\r\n<p>Thời gian&nbsp;<strong>4 ng&agrave;y</strong></p>\r\n\r\n<p>Nơi khởi h&agrave;nh&nbsp;<strong>TP. Hồ Ch&iacute; Minh</strong></p>', NULL, '<p>Ẩm thực:&nbsp;<strong>Buffet s&aacute;ng, Theo thực đơn, Đặc sản địa phương</strong></p>\r\n\r\n<p>Kh&aacute;ch sạn:&nbsp;<strong>4 sao</strong></p>\r\n\r\n<p>Đối tượng th&iacute;ch hợp:&nbsp;<strong>Gia đ&igrave;nh nhiều thế hệ, Thanh ni&ecirc;n, Cặp đ&ocirc;i</strong></p>', 1, 1, '2023-11-20 18:46:01', '2023-11-20 18:48:29'),
(6, 1, 6, 'Vũng Tàu - Sắc Màu Biển Xanh - Mở mùa Xuân', 'vung-tau-sac-mau-bien-xanh-mo-mua-xuan', '20231120135421-655b029d9f312dc-230614-bai-bien-thuy-van-minh-hoa.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 350000, 1, '<p>Biển xanh, nắng v&agrave;ng, phong cảnh trữ t&igrave;nh c&ugrave;ng c&ocirc;ng trinh kiến tr&uacute;c tầm cỡ v&agrave; sự nhộn nhịp, hiện đại đến kh&oacute; tả, Vũng T&agrave;u lu&ocirc;n l&agrave; một điểm đến đặc sắc d&agrave;nh cho du kh&aacute;ch bốn phương.</p>', '<p>Khởi h&agrave;nh 10/12/2023 - Giờ đi: 05:30</p>\r\n\r\n<p>Tập trung 05:00 ng&agrave;y 10/12/2023</p>\r\n\r\n<p>Thời gian 1 ng&agrave;y</p>\r\n\r\n<p>Nơi khởi h&agrave;nh TP. Hồ Ch&iacute; Minh</p>', NULL, '<p>Điểm thăm quan:&nbsp;<strong>Vũng T&agrave;u, Tượng Ch&uacute;a Kito, Vạn Phật Đại T&ograve;ng T&acirc;m</strong></p>\r\n\r\n<p>Đối tượng th&iacute;ch hợp: <strong>Gia đ&igrave;nh nhiều thế hệ</strong></p>\r\n\r\n<p>Ẩm thực: <strong>Theo thực đơn</strong></p>', 1, 1, '2023-11-20 18:54:21', '2023-11-20 18:55:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_types`
--

CREATE TABLE `tour_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 2: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_types`
--

INSERT INTO `tour_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tour trọn gói', 1, NULL, NULL),
(2, 'Tour gia đình', 1, NULL, NULL),
(4, 'Du lịch khám phá', 1, NULL, '2023-11-19 08:42:53'),
(5, 'Du lịch sinh thái', 1, NULL, '2023-11-19 08:42:57'),
(7, 'Thiên nhiên vùng núi', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `type_otp` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `booking_rooms`
--
ALTER TABLE `booking_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_rooms_booking_id_room_id_unique` (`booking_id`,`room_id`),
  ADD KEY `booking_rooms_room_id_foreign` (`room_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinations_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_tour_id_question_unique` (`tour_id`,`question`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itineraries_tour_id_name_unique` (`tour_id`,`name`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `places_itinerary_id_name_unique` (`itinerary_id`,`name`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_tour_id_name_unique` (`tour_id`,`name`);

--
-- Chỉ mục cho bảng `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tours_slug_unique` (`slug`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Chỉ mục cho bảng `tour_types`
--
ALTER TABLE `tour_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_types_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `booking_rooms`
--
ALTER TABLE `booking_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tour_types`
--
ALTER TABLE `tour_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `booking_rooms`
--
ALTER TABLE `booking_rooms`
  ADD CONSTRAINT `booking_rooms_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`);

--
-- Các ràng buộc cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`);

--
-- Các ràng buộc cho bảng `itineraries`
--
ALTER TABLE `itineraries`
  ADD CONSTRAINT `itineraries_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`);

--
-- Các ràng buộc cho bảng `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`);

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tour_types` (`id`),
  ADD CONSTRAINT `tours_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
