-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 05, 2021 lúc 01:46 PM
-- Phiên bản máy phục vụ: 10.3.21-MariaDB
-- Phiên bản PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dat10520_dathangsieutoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` text NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `metadata_customer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `email`, `phone`, `address`, `metadata_customer`) VALUES
(3, 'Trịnh Việt Hưng', 'kkk@gmail.com', '0987654321', 'hà nội', NULL),
(4, 'Trịnh Quyết Tiến', 'hoang9872@gmail.com', '09876543211', 'hà nội', NULL),
(5, 'test 12313', '123@gmail.com', '0987654321', 'hà nội', NULL),
(6, 'kiki', 'kiki@gmail.com', '123123123123', '123123123', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_products`
--

CREATE TABLE `customer_products` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer_products`
--

INSERT INTO `customer_products` (`customer_id`, `product_id`) VALUES
(3, 4),
(3, 22),
(3, 23),
(4, 24),
(3, 25),
(3, 26),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(4, 32),
(3, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_transaction`
--

CREATE TABLE `history_transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status_id` int(11) NOT NULL DEFAULT 0,
  `transaction_status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_price` float(16,3) NOT NULL DEFAULT 0.000,
  `last_balance` float(16,3) DEFAULT 0.000,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_transaction`
--

INSERT INTO `history_transaction` (`id`, `transaction_code`, `transaction_status_id`, `transaction_status_name`, `transaction_price`, `last_balance`, `note`, `order_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, '52521052', 1, 'Nạp Tiền', 500000.000, 500000.000, 'CK TECH', 0, 1, '2020-05-11 08:04:13', '2020-05-11 08:04:13'),
(2, '52521052', 1, 'Nạp Tiền', 500000.000, 999999.000, 'CK TECH', 0, 1, '2020-05-11 08:04:13', '2020-05-11 08:04:13'),
(3, '52521053', 3, 'Tất toán đơn hàng', 300000.000, 700000.000, 'Đặt cọc: 90% tiền hàng (Chưa bao gồm phí phát sinh)', 1, 1, '2020-05-11 08:04:13', '2020-05-11 08:04:13'),
(4, '52521054', 1, 'Nạp Tiền', 750000.000, 999999.000, 'CK TECH', 0, 1, '2020-05-11 08:04:13', '2020-05-11 08:04:13'),
(5, '52521055', 2, 'Rút Tiền', 500000.000, 950000.000, 'Rút tiền về tài khoản ngân hàng', 0, 1, '2020-05-11 08:04:13', '2020-05-11 08:04:13');

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
(11, '2020_05_01_151455_create_orders_table', 1),
(12, '2020_05_01_151504_create_order_detail_table', 1),
(13, '2020_05_02_133001_adds_api_token_to_users_table', 2),
(14, '2020_05_10_151817_add_missing_price_to_orders_table', 2),
(15, '2020_05_10_155607_create_wallet_table', 3),
(16, '2020_05_10_155711_create_shipping_detail_table', 3),
(21, '2020_05_10_160614_create_history_transaction_table', 4),
(34, '2020_05_12_140530_change_column_type_orders_table', 5),
(35, '2020_05_12_140536_change_column_type_order_detail_table', 5),
(36, '2020_05_12_140723_change_column_type_wallet_table', 5),
(37, '2020_05_12_140742_change_column_type_history_transaction_table', 5),
(38, '2020_05_20_000009_create_terms_table', 6),
(39, '2020_05_20_000010_create_terms_things_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `group`, `description`, `locale`) VALUES
(1, 'locale_default', 'vi', 'system', 'Mã ngôn ngữ mặc định', ''),
(2, 'locale_list', '[{\"locale\":\"vi\",\"name\":\"Tiếng Việt\",\"flag\":\"/backend/assets/images/flag_vi.png\"},{\"locale\":\"en\",\"name\":\"English\",\"flag\":\"/backend/assets/images/flag_en.png\"}]', 'system', 'Danh sách ngôn ngữ hỗ trợ', ''),
(3, 'site_title', 'Guide review asia', 'site', 'Tiêu đề mặc định', 'en'),
(4, 'site_title', 'Guide review asia', 'site', 'Tiêu đề mặc định', 'vi'),
(5, 'site_description', 'Do not worry about tourism, guidereview.asia will help you not miss any great things in your travel. We choose the hotel suitable, special tours, detailed travel information with attractive prices.', 'site', 'Mô tả ngắn gọn về site', 'en'),
(6, 'site_description', 'Đừng lo lắng về chuyến đi, guidereview.asia sẽ giúp bạn không bỏ lỡ bất kỳ điều tuyệt vời nào trong chuyến du lịch của bạn. Chúng tôi chọn khách sạn phù hợp, các tour du lịch đặc biệt, thông tin du lịch chi tiết với mức giá hấp dẫn.', 'site', 'Mô tả ngắn gọn về site', 'vi'),
(7, 'site_image', '/upload/slide-1.jpg', 'site', 'Ảnh mặc định của website', ''),
(8, 'order_status', '[\"Tạo đơn hàng\", \"Chờ đặt cọc\", \"Đã đặt cọc\", \"Đang đặt hàng\", \"Đã đặt hàng\", \"Shop xưởng giao\", \"Đang vận chuyển\", \"Kho VN nhận\", \"Đã trả hàng\", \"Đã Hủy\"]', 'system', NULL, 'vi'),
(9, 'exchange_rate', '3.3999', 'system', NULL, 'vi'),
(10, 'purchase_fee', '3', NULL, NULL, 'vi'),
(11, 'service_fee', '{\"locale\":\"vi\",\"title\":\"Ph\\u00ed d\\u1ecbch v\\u1ee5\",\"header\":\"3%\",\"content\":[\"Chi\\u1ebft kh\\u1ea5u l\\u00ean \\u0111\\u1ebfn 20%\",\"T\\u1ec9 l\\u1ec7 ph\\u1ea7n tr\\u0103m \\u0111\\u1eb7t c\\u1ecdc 90%\",\"Ch\\u00ednh s\\u00e1ch kh\\u00e1ch h\\u00e0ng th\\u00e2n thi\\u1ebft\",\"Support 24\\/7\"]}', 'system', 'Phí dịch vụ', ''),
(12, 'transport_fee', '{\"locale\":\"vi\",\"title\":\"Ph\\u00ed v\\u1eadn chuy\\u1ec3n\",\"header\":\"30.000\\/kg\",\"content\":[\"<=10kg ch\\u1ec9 30.000 vn\\u0111\",\"10.1-20kg ch\\u1ec9 29.000 vn\\u0111\",\"20.1-100kg ch\\u1ec9 28.000 vn\\u0111\",\"Tr\\u00ean 100kg li\\u00ean h\\u1ec7 tr\\u1ef1c ti\\u1ebfp \\u0111\\u1ec3 gi\\u00e1 t\\u1ed1t nh\\u1ea5t\"]}', 'system', 'Phí vận chuyển', ''),
(13, 'deposit_fee', '{\"locale\":\"vi\",\"title\":\"Ph\\u00ed k\\u00ed g\\u1eedi\",\"header\":\"21.000\\/kg\",\"content\":[\"H\\u1ed7 tr\\u1ee3 ki\\u1ec3m \\u0111\\u1ebfm\",\"Giao h\\u00e0ng mi\\u1ec5n ph\\u00ed n\\u1ed9i th\\u00e0nh bao tr\\u00ean 60kg\",\"Nh\\u1eadn h\\u00e0ng nhanh 2-5 ng\\u00e0y\",\"Ph\\u00ed ship n\\u1ed9i \\u0111\\u1ecba r\\u1ebb nh\\u1ea5t\"]}', 'system', 'Phí kí gửi', ''),
(14, 'history_transaction_status', '[\"Nạp tiền\",\"Rút tiền\",\"Thanh toán đơn hàng\",\"Đặt cọc đơn hàng\",\"Tất toán đơn hàng\",\"Hoàn lại tiền\"]', NULL, NULL, 'vi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `number_counted` int(11) NOT NULL DEFAULT 0,
  `number_order` int(11) NOT NULL DEFAULT 0,
  `received_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prepayment` float(16,3) DEFAULT 0.000,
  `price_vn` float(16,3) DEFAULT 0.000,
  `price_cn` float(16,3) DEFAULT 0.000,
  `ship_cn` float(16,3) DEFAULT 0.000,
  `ship_vn` float(16,3) DEFAULT 0.000,
  `weight` float(16,3) DEFAULT 0.000,
  `weight_fee` float(16,3) DEFAULT 0.000,
  `purchase_fee` float(16,3) DEFAULT 0.000,
  `additional_fee` float(16,3) DEFAULT 0.000,
  `arrears_fee` float(16,3) DEFAULT 0.000,
  `counting_fee` float(16,3) DEFAULT 0.000,
  `packing_fee` float(16,3) DEFAULT 0.000,
  `total_price_vn` float(16,3) DEFAULT 0.000,
  `total_price_cn` float(16,3) DEFAULT 0.000,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ tạo đơn hàng',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `missing_price` double(8,2) NOT NULL DEFAULT 0.00,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `shipping_code`, `shop_name`, `shop_id`, `warehouse`, `number_counted`, `number_order`, `received_address`, `product_type`, `prepayment`, `price_vn`, `price_cn`, `ship_cn`, `ship_vn`, `weight`, `weight_fee`, `purchase_fee`, `additional_fee`, `arrears_fee`, `counting_fee`, `packing_fee`, `total_price_vn`, `total_price_cn`, `user_id`, `customer_id`, `status_id`, `status_name`, `note`, `metadata`, `created_at`, `updated_at`, `missing_price`, `deleted_at`) VALUES
(1, '75500', '发现好货', '4691948847', 'KHO HN', 3, 5, 'ha dong, ha noi 3', '1,2,3', 31500.000, 35000.000, 10.000, 5.000, 30000.000, 1.500, 10000.000, 20000.000, 0.000, 70555.000, 0.000, 0.000, 62005.000, 18237.301, '1, 25', 1, 5, 'Shop xưởng giao', 'Laravel\'s versioning scheme maintains the following convention: paradigm.major.minor. Major framework releases are released every six months (February and August)', NULL, '2020-05-02 11:28:07', '2020-06-13 06:54:53', 0.00, NULL),
(2, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 1, 'ha dong, ha noi', '1,3', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 70000.000, 20.000, '1, 24', 1, 4, 'Đã đặt hàng', NULL, NULL, '2020-04-02 11:28:07', '2020-06-13 06:40:01', 0.00, NULL),
(3, '75500', '发现好货', '4691948847', 'KHO HN', 3, 2, 'ha dong, ha noi', '', 31500.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 14000.000, 4.000, '', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-12-30 10:23:25', '2020-05-07 07:00:07', 0.00, NULL),
(4, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 7, 'ha dong, ha noi', '', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 126000.000, 36.000, '1, 24', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-12-30 10:23:25', '2020-05-07 09:50:46', 0.00, NULL),
(5, '75500', '发现好货', '4691948847', 'KHO HN', 3, 4, 'ha dong, ha noi', '1,2', 31500.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 161000.000, 46.000, '1, 24', 1, 2, 'Chờ đặt cọc', NULL, NULL, '2020-05-06 10:23:24', '2020-06-13 06:23:06', 0.00, NULL),
(6, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 6, 'ha dong, ha noi', '1,2', 0.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 241500.000, 69.000, '1, 24', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-06 10:23:24', '2020-05-07 07:00:07', 0.00, NULL),
(7, '75500', '发现好货', '4691948847', 'KHO HN', 3, 4, 'ha dong, ha noi', '2,3', 31500.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 217000.000, 62.000, '1, 25', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-12-30 10:23:25', '2020-05-12 08:15:57', 0.00, NULL),
(8, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 5, 'ha dong, ha noi', '', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 42000.000, 12.000, '1, 24', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-06 10:23:25', '2020-05-07 07:00:35', 0.00, NULL),
(9, '75500', '发现好货', '4691948847', 'KHO HN', 3, 8, 'ha dong, ha noi', '', 0.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 73500.000, 21.000, '1, 25', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-06 10:23:26', '2020-05-07 07:00:35', 0.00, NULL),
(10, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 7, 'ha dong, ha noi', '', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 189000.000, 54.000, '1, 24', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-06 10:23:26', '2020-05-09 21:58:08', 0.00, NULL),
(11, '75500', '发现好货', '4691948847', 'KHO HN', 3, 8, 'ha dong, ha noi', '', 31500.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 203000.000, 58.000, '1, 25', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-07 10:00:10', '2020-05-07 10:01:53', 0.00, NULL),
(12, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'Kho HN', 0, 1, 'ha dong, ha noi', '1, 3', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 70000.000, 20.000, '1, 24', 1, 0, 'Chờ tạo đơn hàng', NULL, NULL, '2020-05-07 10:00:10', '2020-05-07 10:00:10', 0.00, NULL),
(13, '75500', '发现好货', '4691948847', 'KHO HN', 3, 6, 'ha dong, ha noi', '', 31500.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 238000.000, 68.000, '1, 25', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-07 10:00:12', '2020-05-16 02:06:07', 0.00, NULL),
(14, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 5, 'ha dong, ha noi', '', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 105000.000, 30.000, '1, 24', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-07 10:00:12', '2020-05-07 10:01:53', 0.00, NULL),
(15, '75500', '发现好货', '4691948847', 'KHO HN', 3, 8, 'ha dong, ha noi', '', 31500.000, 35000.000, 10.000, 0.000, 30000.000, 1.500, 10000.000, 1050.000, 0.000, 50550.000, 0.000, 0.000, 140000.000, 40.000, '1, 25', 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-07 10:00:13', '2020-05-07 10:01:53', 0.00, NULL),
(16, '3520000012', '實時推薦最適合你的寶貝', '24442857143', 'KHO HN', 0, 4, 'ha dong, ha noi', '', 63000.000, 70000.000, 20.000, 0.000, 30000.000, 1.000, 10000.000, 2100.000, 0.000, 49100.000, 0.000, 0.000, 28000.000, 8.000, '1, 24', 1, 0, 'Chờ đặt cọc', NULL, NULL, '2020-05-07 10:00:13', '2020-05-22 08:00:41', 0.00, NULL),
(31, NULL, 'daovantuyen96@gmail.com', '123ez123', 'KHO HN', 0, 3, NULL, '', 30591.000, 33990.000, 10.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 33990.000, 0.000, 0.000, 33990.000, 10.000, NULL, 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-16 07:23:34', '2020-05-22 08:13:29', 0.00, NULL),
(32, NULL, 'da6@gmail.com', '123ez123', 'KHO HN', 0, 3, NULL, '', 30591.000, 33990.000, 10.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 33990.000, 0.000, 0.000, 33990.000, 10.000, NULL, 1, 1, 'Chờ đặt cọc', NULL, NULL, '2020-05-16 07:23:34', '2020-05-22 08:13:29', 0.00, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `detail_price_cn` float(16,3) DEFAULT 0.000,
  `detail_price_vn` float(16,3) DEFAULT 0.000,
  `detail_total_price_cn` float(16,3) DEFAULT 0.000,
  `detail_total_price_vn` float(16,3) DEFAULT 0.000,
  `detail_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `name`, `image_link`, `size`, `color`, `number`, `detail_price_cn`, `detail_price_vn`, `detail_total_price_cn`, `detail_total_price_vn`, `detail_note`, `detail_metadata`, `order_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/7.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 1, '2020-05-02 11:28:07', '2020-05-03 04:03:15', NULL),
(2, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/4.jpg', 'S', 'do', 3, 2.000, 7000.000, 6.000, 21000.000, NULL, NULL, 1, '2020-05-02 11:28:07', '2020-05-03 04:03:15', NULL),
(3, '23袋 咸菜', 'backend/assets/images/products/big/3.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 2, '2020-05-02 11:28:07', '2020-05-02 11:28:07', NULL),
(4, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/12.jpg', 'S', 'do', 3, 3.000, 10500.000, 9.000, 31500.000, NULL, NULL, 6, '2020-05-06 10:28:51', '2020-05-07 07:00:07', NULL),
(5, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/12.jpg', 'S', 'do', 0, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 4, '2020-05-06 10:28:51', '2020-05-07 09:50:46', NULL),
(6, '23袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 4, '2020-05-06 10:28:51', '2020-05-06 10:28:51', NULL),
(7, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/8.jpg', 'S', 'do', 5, 3.000, 10500.000, 15.000, 52500.000, NULL, NULL, 9, '2020-05-06 10:28:52', '2020-05-07 07:00:35', NULL),
(8, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/15.jpg', 'S', 'do', 2, 2.000, 7000.000, 4.000, 14000.000, NULL, NULL, 3, '2020-05-06 10:28:52', '2020-05-07 07:00:07', NULL),
(9, '23袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'M', 'xanh', 2, 20.000, 70000.000, 40.000, 140000.000, NULL, NULL, 5, '2020-05-06 10:28:52', '2020-05-07 07:00:07', NULL),
(10, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 4, '2020-05-06 10:28:53', '2020-05-06 10:28:53', NULL),
(11, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'S', 'do', 3, 2.000, 7000.000, 6.000, 21000.000, NULL, NULL, 9, '2020-05-06 10:28:53', '2020-05-06 10:56:08', NULL),
(12, '23袋 咸菜', 'backend/assets/images/products/big/15.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 7, '2020-05-06 10:28:53', '2020-05-06 10:28:53', NULL),
(13, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/14.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 8, '2020-05-06 10:28:54', '2020-05-06 10:28:54', NULL),
(14, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/14.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 4, '2020-05-06 10:28:54', '2020-05-06 10:28:54', NULL),
(15, '23袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 7, '2020-05-06 10:28:54', '2020-05-06 10:28:54', NULL),
(16, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 4, '2020-05-06 10:28:55', '2020-05-06 10:28:55', NULL),
(17, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/13.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 7, '2020-05-06 10:28:55', '2020-05-06 10:28:55', NULL),
(18, '23袋 咸菜', 'backend/assets/images/products/big/9.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 7, '2020-05-06 10:28:55', '2020-05-06 10:28:55', NULL),
(19, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/9.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 10, '2020-05-06 10:28:56', '2020-05-06 10:28:56', NULL),
(20, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/9.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 8, '2020-05-06 10:28:56', '2020-05-06 10:28:56', NULL),
(21, '23袋 咸菜', 'backend/assets/images/products/big/8.jpg', 'M', 'xanh', 2, 20.000, 70000.000, 40.000, 140000.000, NULL, NULL, 6, '2020-05-06 10:28:56', '2020-05-06 10:56:15', NULL),
(22, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/13.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 5, '2020-05-06 10:28:57', '2020-05-06 10:28:57', NULL),
(23, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/15.jpg', 'S', 'do', 2, 2.000, 7000.000, 4.000, 14000.000, NULL, NULL, 8, '2020-05-06 10:28:57', '2020-05-07 07:00:35', NULL),
(24, '23袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 6, '2020-05-06 10:28:57', '2020-05-06 10:28:57', NULL),
(25, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/8.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 11, '2020-05-07 10:01:22', '2020-05-07 10:01:22', NULL),
(26, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 16, '2020-05-07 10:01:22', '2020-05-07 10:01:22', NULL),
(27, '23袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 13, '2020-05-07 10:01:22', '2020-05-07 10:01:22', NULL),
(28, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/8.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 14, '2020-05-07 10:01:24', '2020-05-07 10:01:24', NULL),
(29, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/12.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 14, '2020-05-07 10:01:24', '2020-05-07 10:01:24', NULL),
(30, '23袋 咸菜', 'backend/assets/images/products/big/12.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 11, '2020-05-07 10:01:24', '2020-05-07 10:01:24', NULL),
(31, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 11, '2020-05-07 10:01:25', '2020-05-07 10:01:25', NULL),
(32, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/14.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 13, '2020-05-07 10:01:25', '2020-05-07 10:01:25', NULL),
(33, '23袋 咸菜', 'backend/assets/images/products/big/8.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 13, '2020-05-07 10:01:25', '2020-05-07 10:01:25', NULL),
(34, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/9.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 15, '2020-05-07 10:01:26', '2020-05-07 10:01:26', NULL),
(35, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/15.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 16, '2020-05-07 10:01:26', '2020-05-07 10:01:26', NULL),
(36, '23袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 10, '2020-05-07 10:01:26', '2020-05-07 10:01:26', NULL),
(37, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/15.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 15, '2020-05-07 10:01:27', '2020-05-07 10:01:27', NULL),
(38, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 10, '2020-05-07 10:01:27', '2020-05-07 10:01:27', NULL),
(39, '23袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 10, '2020-05-07 10:01:27', '2020-05-07 10:01:27', NULL),
(40, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/15.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 11, '2020-05-07 10:01:27', '2020-05-07 10:01:27', NULL),
(41, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/8.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 16, '2020-05-07 10:01:27', '2020-05-07 10:01:27', NULL),
(42, '23袋 咸菜', 'backend/assets/images/products/big/13.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 15, '2020-05-07 10:01:28', '2020-05-07 10:01:28', NULL),
(43, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 13, '2020-05-07 10:01:28', '2020-05-07 10:01:28', NULL),
(44, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/11.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 16, '2020-05-07 10:01:28', '2020-05-07 10:01:28', NULL),
(45, '23袋 咸菜', 'backend/assets/images/products/big/14.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 13, '2020-05-07 10:01:28', '2020-05-07 10:01:28', NULL),
(46, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/13.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 10, '2020-05-07 10:01:29', '2020-05-07 10:01:29', NULL),
(47, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/12.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 15, '2020-05-07 10:01:29', '2020-05-07 10:01:29', NULL),
(48, '23袋 咸菜', 'backend/assets/images/products/big/13.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 11, '2020-05-07 10:01:29', '2020-05-07 10:01:29', NULL),
(49, '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/10.jpg', 'S', 'do', 2, 3.000, 10500.000, 6.000, 21000.000, NULL, NULL, 15, '2020-05-07 10:01:30', '2020-05-07 10:01:30', NULL),
(50, '糖麻辣味250g*3袋 咸菜', 'backend/assets/images/products/big/13.jpg', 'S', 'do', 1, 2.000, 7000.000, 2.000, 7000.000, NULL, NULL, 14, '2020-05-07 10:01:30', '2020-05-07 10:01:30', NULL),
(51, '23袋 咸菜', 'backend/assets/images/products/big/9.jpg', 'M', 'xanh', 1, 20.000, 70000.000, 20.000, 70000.000, NULL, NULL, 14, '2020-05-07 10:01:30', '2020-05-07 10:01:30', NULL),
(76, 'ao-01', 'backend/assets/images/products/big/4.jpg', NULL, NULL, 2, 3.000, 10197.000, 6.000, 20394.000, NULL, NULL, 31, '2020-05-16 07:23:34', '2020-05-16 07:23:34', NULL),
(77, 'ao-01', 'backend/assets/images/products/big/4.jpg', NULL, NULL, 1, 4.000, 13596.000, 4.000, 13596.000, NULL, NULL, 31, '2020-05-16 07:23:34', '2020-05-16 07:23:34', NULL),
(78, 'ao-01', 'backend/assets/images/products/big/4.jpg', NULL, NULL, 2, 3.000, 10197.000, 6.000, 20394.000, NULL, NULL, 32, '2020-05-16 07:23:34', '2020-05-16 07:23:34', NULL),
(79, 'ao-01', 'backend/assets/images/products/big/4.jpg', NULL, NULL, 1, 4.000, 13596.000, 4.000, 13596.000, NULL, NULL, 32, '2020-05-16 07:23:34', '2020-05-16 07:23:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thing_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `name`, `thing_id`, `locale`, `created_at`, `updated_at`) VALUES
(60, 'list-user', 'Danh sách Người dùng', 27, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(61, 'add-user', 'Thêm Người dùng', 29, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(62, 'edit-user', 'Cập nhật Người dùng', 30, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(63, 'delete-user', 'Xóa Người dùng', 31, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(64, 'list-role', 'Danh sách Nhóm vai trò', 32, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(65, 'add-role', 'Thêm Nhóm vai trò', 33, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(66, 'edit-role', 'Cập nhật Nhóm vai trò', 34, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(67, 'delete-role', 'Xóa Nhóm vai trò', 35, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(68, 'list-permission', 'Danh sách Quyền', 36, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(69, 'add-permission', 'Thêm Quyền', 37, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(70, 'edit-permission', 'Cập nhật Quyền', 38, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(71, 'delete-permission', 'Xóa Quyền', 39, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(72, 'list-news', 'Danh sách Tin tức', 40, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(73, 'add-news', 'Thêm Tin tức', 41, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(74, 'edit-news', 'Cập nhật Tin tức', 42, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(75, 'delete-news', 'Xóa Tin tức', 43, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(76, 'list-category', 'Chuyên mục Tin tức', 44, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(77, 'add-category', 'Thêm chuyên mục Tin tức', 45, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(78, 'edit-category', 'Cập nhật chuyên mục Tin tức', 46, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(79, 'delete-category', 'Xóa chuyên mục Tin tức', 47, 'vi', '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(80, 'list-order', 'Đặt hàng', 48, 'vi', '2020-05-22 09:45:54', '2020-05-22 09:45:54'),
(81, 'list-order-detail', 'Chi tiết đơn hàng', 51, 'vi', '2020-05-22 09:45:54', '2020-05-22 09:45:54'),
(82, 'add-order', 'Tạo mới đơn hàng', 50, 'vi', '2020-05-22 09:45:54', '2020-05-22 09:45:54'),
(83, 'list-history-transaction', 'Lịch sử giao dịch', 65, 'vi', '2020-05-22 09:45:54', '2020-05-22 09:45:54'),
(84, 'edit-option', 'Cập nhật Tùy chỉnh', 89, 'vi', '2020-05-28 14:24:33', '2020-05-28 14:24:33'),
(85, 'edit-order', 'chỉnh sửa đơn hàng', 90, 'vi', '2020-06-07 16:53:47', '2020-06-07 16:53:47'),
(86, 'wallet', 'Ví điện tử', 64, 'vi', '2020-05-22 09:45:54', '2020-05-22 09:45:54'),
(87, 'edit-history-transaction', 'Lịch sử giao dịch', 91, 'vi', '2020-06-14 14:36:12', '2020-06-14 14:36:12'),
(88, 'delete-order', 'xóa đơn hàng', 92, 'vi', '2020-06-20 15:40:38', '2020-06-20 15:40:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT 0,
  `number` int(11) DEFAULT 0,
  `sum` double DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transporters` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) DEFAULT 0,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '1. Chưa đặt',
  `parent_id` bigint(20) DEFAULT 0,
  `order_index` bigint(20) NOT NULL DEFAULT 1,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` bigint(20) NOT NULL DEFAULT 0,
  `customer_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status_code` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `number`, `sum`, `content`, `slug`, `type`, `transporters`, `transport_code`, `author`, `status`, `parent_id`, `order_index`, `metadata`, `locale`, `locale_source_id`, `customer_id`, `created_at`, `updated_at`, `deleted_at`, `discount`, `total`, `status_code`) VALUES
(42, 'áo dạ', 1000, 2, 2000, '<p>mua &aacute;o cho fanta mặc</p>', 'ao-da', 'product', 'vietel', 'cd500', 1, '1', 0, 1, '{\"link\":\"https:\\/\\/www.w3schools.com\\/html\\/tryit.asp?filename=tryhtml_input_week\",\"rate\":\"3.5\",\"weight\":null,\"ship\":\"1000\",\"shipCN\":null,\"total\":5250}', 'vi', 0, '5', '2019-01-18 09:44:24', '2019-03-04 08:49:54', NULL, 500, 1500, 1),
(43, 'áo len', 1000, 3, 3000, NULL, 'ao-len', 'product', 'vietel', 'cd500', 1, '5.Đang chuyển HN', 0, 1, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/backyard\\/product\\/add\",\"rate\":\"3.5\",\"weight\":\"2\",\"ship\":\"10\",\"shipCN\":null,\"total\":8820}', 'en', 0, '3', '2019-01-18 10:05:32', '2019-03-18 09:57:28', NULL, 500, 2520, 1),
(44, 'áo len', 1000, 3, 3000, NULL, 'ao-len', 'product', 'vietel', 'cd500', 1, '3', 0, 1, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/backyard\\/product\\/add\",\"rate\":\"3.5\",\"weight\":\"2\",\"ship\":\"10\"}', 'vi', 0, '3', '2019-01-18 10:06:10', '2019-01-18 10:06:10', NULL, 500, 2520, 1),
(45, 'áo mỡ', 0, 0, 0, NULL, 'ao-mo', 'product', '0', '0', 1, '4. Kho TQ đã kí nhận', 0, 1, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/backyard\\/product\\/add\",\"rate\":\"3.5\",\"weight\":\"2\",\"ship\":\"10\",\"shipCN\":null,\"total\":70}', 'en', 0, '3', '2019-01-20 09:04:20', '2019-03-13 20:46:06', NULL, 0, 20, 1),
(46, 'Kỹ thuật hệ thống', 1000, 1000, 1000000, 'Chúng tôi cung cấp các dịch vụ order hàng hoá trên các trang thương mại điện tử taobao, 1688, tmail. Dịch vụ nạp tiền alipay, chuyển tiền, hỗ trợ mua hàng. Và các dịch vụ chuyển phát nhanh, cho thuê kho, tư vấn nhập hàng.\r\n\r\n', 'ky-thuat-he-thong', 'product', 'vietel', 'cd500', 1, '1', 0, 1, '{\"link\":\"https:\\/\\/www.w3schools.com\\/html\\/tryit.asp?filename=tryhtml_input_week\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":\"10\",\"shipCN\":\"50\"}', 'vi', 0, '3', '2019-01-20 11:24:19', '2019-01-20 11:24:19', NULL, 50, 3500000, 1),
(47, 'Kỹ thuật hệ thống', 1000, 3, 3000, NULL, 'ky-thuat-he-thong', 'product', 'vietel', 'cd500', 1, '1', 0, 1, '{\"link\":\"https:\\/\\/www.w3schools.com\\/html\\/tryit.asp?filename=tryhtml_input_week\",\"rate\":\"3.5\",\"weight\":\"3\",\"ship\":\"10\",\"shipCN\":\"500\"}', 'vi', 0, '3', '2019-01-22 08:10:03', '2019-01-22 08:10:03', NULL, 500, 10530, 1),
(49, 'sp test 2', 0, 0, 0, NULL, 'sp-test-2', 'product', NULL, NULL, 1, '3.Shop đã phát hàng', 0, 1, '{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}', 'en', 0, '3', '2019-03-18 09:42:57', '2019-03-18 09:42:57', NULL, 0, 0, 1),
(50, 'sp test 24', 0, 0, 0, NULL, 'sp-test-24', 'product', NULL, NULL, 1, '2.Đã thanh toán', 0, 1, '{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}', 'en', 0, '3', '2019-03-18 09:46:09', '2019-03-18 09:46:09', NULL, 0, 0, 1),
(51, 'sp test 2434534', 0, 0, 0, NULL, 'sp-test-2434534', 'product', NULL, NULL, 1, '6.HN đã nhận', 0, 1, '{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}', 'en', 0, '3', '2019-03-18 09:48:43', '2019-03-18 09:48:43', NULL, 0, 0, 1),
(52, 'sp test 1', 0, 0, 0, NULL, 'sp-test-1', 'product', NULL, NULL, 1, '3.Shop đã phát hàng', 0, 1, '{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}', 'en', 0, '3', '2019-03-18 09:50:30', '2019-03-18 09:50:30', NULL, 0, 0, 1),
(53, 'sp test 12345', 0, 0, 0, NULL, 'sp-test-12345', 'product', NULL, NULL, 1, '6.HN đã nhận', 0, 1, '{\"link\":\"\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":0,\"shipCN\":0}', 'en', 0, '3', '2019-03-18 09:53:03', '2019-03-18 09:53:03', NULL, 0, 0, 1),
(54, 'sp test 12345', 100, 0, 0, '<p>00000</p>', 'sp-test-12345', 'product', '0', '0', 1, '6.HN đã nhận', 0, 1, '{\"link\":\"000\",\"rate\":\"3.5\",\"weight\":\"0\",\"ship\":\"0\",\"shipCN\":\"0\"}', 'en', 0, '3', '2019-03-18 09:53:27', '2019-03-18 09:53:27', NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_things`
--

CREATE TABLE `product_things` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `order_index` bigint(20) NOT NULL DEFAULT 1,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `locale`, `locale_source_id`, `created_at`, `updated_at`) VALUES
(6, 'developer', 'Kỹ thuật hệ thống', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(7, 'developer', 'System Developer', 'en', 6, '2020-05-22 09:08:26', '2020-05-22 09:08:26'),
(8, 'quan-tri-vien', 'Quản trị viên', 'vi', 0, '2020-05-25 15:37:26', '2020-05-25 15:37:26'),
(9, 'nguoi-dung', 'người dùng', 'vi', 0, '2020-06-13 06:26:27', '2020-06-13 06:26:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(6, 60),
(6, 61),
(6, 62),
(6, 63),
(6, 64),
(6, 65),
(6, 66),
(6, 67),
(6, 68),
(6, 69),
(6, 70),
(6, 71),
(6, 72),
(6, 73),
(6, 74),
(6, 75),
(6, 76),
(6, 77),
(6, 78),
(6, 79),
(6, 80),
(6, 81),
(6, 82),
(6, 83),
(6, 84),
(9, 86),
(9, 0),
(9, 83),
(9, 80),
(9, 81),
(9, 82),
(9, 85),
(6, 87),
(8, 72),
(8, 0),
(8, 77),
(8, 78),
(8, 79),
(8, 74),
(8, 75),
(8, 73),
(8, 76),
(8, 80),
(8, 81),
(8, 82),
(8, 85),
(8, 86),
(8, 83),
(8, 87),
(8, 84),
(6, 88);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_detail`
--

CREATE TABLE `shipping_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thing_count` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `terms`
--

INSERT INTO `terms` (`id`, `name`, `slug`, `type`, `parent_id`, `icon`, `thing_count`, `status`, `metadata`, `locale`, `locale_source_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Danh mục quản trị', 'backend-menu', 'backend_menu', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-05-22 09:06:51', '2020-05-22 09:06:51', NULL),
(3, 'Danh mục Frontend', 'frontend-menu', 'frontend_menu', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-05-22 09:06:51', '2020-05-22 09:06:51', NULL),
(4, 'Danh mục quản trị', 'backend-menu', 'backend_menu', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(5, 'Danh mục Frontend', 'frontend-menu', 'frontend_menu', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(6, 'Kinh nghiệm', 'kinh-nghiem', 'news_category', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-05-22 09:59:42', '2020-05-25 15:49:27', NULL),
(7, 'Hướng dẫn mua hàng', 'huong-dan-mua-hang', 'news_category', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-05-26 16:50:45', '2020-05-26 16:50:45', NULL),
(8, 'HƯỚNG DẪN SỬ DỤNG', 'huong-dan-su-dung', 'news_category', 0, NULL, 0, 'publish', NULL, 'vi', 0, '2020-06-13 06:08:41', '2020-06-13 06:08:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `terms_things`
--

CREATE TABLE `terms_things` (
  `term_id` int(10) UNSIGNED NOT NULL,
  `thing_id` bigint(20) UNSIGNED NOT NULL,
  `order_index` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `terms_things`
--

INSERT INTO `terms_things` (`term_id`, `thing_id`, `order_index`) VALUES
(2, 28, 0),
(2, 32, 0),
(2, 36, 0),
(2, 40, 0),
(2, 48, 0),
(2, 52, 0),
(2, 56, 0),
(2, 60, 0),
(2, 66, 0),
(2, 72, 0),
(6, 79, 0),
(6, 80, 0),
(7, 81, 0),
(7, 82, 0),
(7, 83, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `things`
--

CREATE TABLE `things` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `order_index` bigint(20) NOT NULL DEFAULT 1,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi',
  `locale_source_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `things`
--

INSERT INTO `things` (`id`, `title`, `slug`, `featured_img`, `excerpt`, `content`, `type`, `author`, `status`, `parent_id`, `order_index`, `metadata`, `locale`, `locale_source_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 'Người dùng', '/user', 'ti-user', NULL, NULL, 'menu_item', 0, 'publish', 0, 8, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:06:51', '2020-05-22 09:06:51', NULL),
(28, 'Người dùng', '/user', 'ti-user', NULL, NULL, 'menu_item', 0, 'publish', 0, 8, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(29, 'Thêm', '/user/add', '', NULL, NULL, 'menu_item', 0, 'publish', 27, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(30, 'Sửa', '/user/edit', '', NULL, NULL, 'menu_item', 0, 'publish', 27, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(31, 'Xóa', '/user/delete', '', NULL, NULL, 'menu_item', 0, 'publish', 27, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(32, 'Nhóm vai trò', '/role', 'ti-cup', NULL, NULL, 'menu_item', 0, 'publish', 27, 2, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(33, 'Thêm', '/role/add', '', NULL, NULL, 'menu_item', 0, 'publish', 32, 1, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(34, 'Sửa', '/role/edit', '', NULL, NULL, 'menu_item', 0, 'publish', 32, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(35, 'Xóa', '/role/delete', '', NULL, NULL, 'menu_item', 0, 'publish', 32, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(36, 'Danh sách Quyền', '/permission', 'ti-shield', NULL, NULL, 'menu_item', 0, 'publish', 27, 3, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(37, 'Thêm', '/permission/add', '', NULL, NULL, 'menu_item', 0, 'publish', 36, 1, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(38, 'Sửa', '/permission/edit', '', NULL, NULL, 'menu_item', 0, 'publish', 36, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(39, 'Xóa', '/permission/delete', '', NULL, NULL, 'menu_item', 0, 'publish', 36, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(40, 'Tin tức', '/news', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 5, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(41, 'Thêm mới', '/news/add', '', NULL, NULL, 'menu_item', 0, 'publish', 40, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(42, 'Cập nhật', '/news/edit', '', NULL, NULL, 'menu_item', 0, 'publish', 40, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(43, 'Xóa', '/news/delete', '', NULL, NULL, 'menu_item', 0, 'publish', 40, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(44, 'Chuyên mục', '/news/category', '', NULL, NULL, 'menu_item', 0, 'publish', 40, 2, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(45, 'Thêm chuyên mục', '/news/category/add', '', NULL, NULL, 'menu_item', 0, 'publish', 44, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(46, 'Cập nhật chuyên mục', '/news/category/edit', '', NULL, NULL, 'menu_item', 0, 'publish', 44, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(47, 'Xóa chuyên mục', '/news/category/delete', '', NULL, NULL, 'menu_item', 0, 'publish', 44, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL),
(48, 'Đặt Hàng', '/order', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:41:58', '2020-05-22 09:41:58', NULL),
(49, 'Tạo mới đơn hàng', '/order/add', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:41:58', '2020-05-22 09:41:58', NULL),
(50, 'Giỏ hàng', '/order/cart', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:41:58', '2020-05-22 09:41:58', NULL),
(51, 'Chi tiết đơn hàng', '/order/order-detail', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:41:58', '2020-05-22 09:41:58', NULL),
(52, 'Đặt Hàng', '/order', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:43:39', '2020-05-22 09:43:39', NULL),
(53, 'Tạo mới đơn hàng', '/order/add', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:43:39', '2020-05-22 09:43:39', NULL),
(54, 'Giỏ hàng', '/order/cart', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:43:39', '2020-05-22 09:43:39', NULL),
(55, 'Chi tiết đơn hàng', '/order/order-detail', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:43:39', '2020-05-22 09:43:39', NULL),
(56, 'Đặt Hàng', '/order', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:23', '2020-05-22 09:44:23', NULL),
(57, 'Tạo mới đơn hàng', '/order/add', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:23', '2020-05-22 09:44:23', NULL),
(58, 'Giỏ hàng', '/order/cart', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:23', '2020-05-22 09:44:23', NULL),
(59, 'Chi tiết đơn hàng', '/order/order-detail', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:23', '2020-05-22 09:44:23', NULL),
(60, 'Đặt Hàng', '/order', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:43', '2020-05-22 09:44:43', NULL),
(61, 'Tạo mới đơn hàng', '/order/add', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:43', '2020-05-22 09:44:43', NULL),
(62, 'Giỏ hàng', '/order/cart', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:43', '2020-05-22 09:44:43', NULL),
(63, 'Chi tiết đơn hàng', '/order/order-detail', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:43', '2020-05-22 09:44:43', NULL),
(64, 'Ví điện tử', '/wallet', '', NULL, NULL, 'menu_item', 0, 'publish', 0, 0, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:43', '2020-05-22 09:44:43', NULL),
(65, 'Lịch sử giao dịch', '/history-transaction', '', NULL, NULL, 'menu_item', 0, 'publish', 64, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:43', '2020-05-22 09:44:43', NULL),
(66, 'Đặt Hàng', '/order', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:59', '2020-05-22 09:44:59', NULL),
(67, 'Tạo mới đơn hàng', '/order/add', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:59', '2020-05-22 09:44:59', NULL),
(68, 'Giỏ hàng', '/order/cart', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:59', '2020-05-22 09:44:59', NULL),
(69, 'Chi tiết đơn hàng', '/order/order-detail', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:59', '2020-05-22 09:44:59', NULL),
(70, 'Ví điện tử', '/wallet', '', NULL, NULL, 'menu_item', 0, 'publish', 0, 0, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:44:59', '2020-05-22 09:44:59', NULL),
(71, 'Lịch sử giao dịch', '/history-transaction', '', NULL, NULL, 'menu_item', 0, 'publish', 64, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:44:59', '2020-05-22 09:44:59', NULL),
(72, 'Đặt Hàng', '/order', 'ti-direction-alt', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:45:54', '2020-05-22 09:45:54', NULL),
(73, 'Tạo mới đơn hàng', '/order/add', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 1, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:45:54', '2020-05-22 09:45:54', NULL),
(74, 'Giỏ hàng', '/order/cart', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:45:54', '2020-05-22 09:45:54', NULL),
(75, 'Chi tiết đơn hàng', '/order/order-detail', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:45:54', '2020-05-22 09:45:54', NULL),
(76, 'Ví điện tử', '/wallet', '', NULL, NULL, 'menu_item', 0, 'publish', 0, 0, '{\"hasChild\":true,\"showOnMenu\":true}', 'vi', 0, '2020-05-22 09:45:54', '2020-05-22 09:45:54', NULL),
(77, 'Lịch sử giao dịch', '/history-transaction', '', NULL, NULL, 'menu_item', 0, 'publish', 64, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-05-22 09:45:54', '2020-05-22 09:45:54', NULL),
(79, 'Tìm giá về tay của sản phẩm khi order hàng Trung Quốc?', 'tim-gia-ve-tay-cua-san-pham-khi-order-hang-trung-quoc', '/upload/CT chung.png', 'Việc nhập hàng Trung Quốc, order Alibaba, Taobao, Tmall, 1688 ngày càng trở nên phổ biến và quen thuộc, nhất là với các bạn kinh doanh hay bán hàng online. Tuy nhiên, khi nhập hàng nhiều bạn vẫn còn băn khoăn, chưa biết rõ cách làm sao để tính được đầy đủ các khoản phí khi hàng về tay.', '<p>Do đ&oacute;, để c&aacute;c bạn hiểu r&otilde; hơn về c&aacute;ch t&iacute;nh gi&aacute; h&agrave;ng h&oacute;a về tay khi đặt h&agrave;ng qua c&aacute;c đơn vị vận chuyển, NhapHangChina sẽ hướng dẫn c&aacute;c bạn một c&aacute;ch chi tiết.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>C&ocirc;ng thức chung của việc t&iacute;nh gi&aacute; của hầu hết c&aacute;c đơn vị đ&oacute; l&agrave;:</p>\r\n<p>Gi&aacute; về tay = Gi&aacute; sản phẩm + Ph&iacute; dịch vụ + Ph&iacute; ship nội địa Trung + Ph&iacute; vận chuyển + Ph&iacute; kiểm đếm/đ&oacute;ng gỗ (nếu c&oacute;).</p>\r\n<p>Cụ thể c&aacute;c loại ph&iacute; đ&oacute; l&agrave; như thế n&agrave;o? C&aacute;ch t&iacute;nh ra sao?</p>\r\n<p>1. Gi&aacute; sản phẩm:</p>\r\n<p>L&agrave; gi&aacute; gốc được ni&ecirc;m yết tr&ecirc;n website Trung Quốc, c&aacute;c bạn c&oacute; thể dễ d&agrave;ng xem tr&ecirc;n web. Gi&aacute; sẽ được để theo Nh&acirc;n d&acirc;n tệ. Để quy đổi ra tiền Việt, bạn lấy gi&aacute; tr&ecirc;n web nh&acirc;n với tỉ gi&aacute; tại thời điểm bạn đặt mua.</p>\r\n<p>V&iacute; dụ: Gi&aacute; tr&ecirc;n web l&agrave; 35 tệ, tỉ gi&aacute; hiện đang l&agrave; 3420 th&igrave; gi&aacute; sản phẩm sẽ l&agrave;: 35 x 3420 = 119 700 (VNĐ)</p>\r\n<p>Lưu &yacute; rằng, tỉ gi&aacute; Nh&acirc;n d&acirc;n tệ sẽ thường xuy&ecirc;n thay đổi theo biến động tỉ gi&aacute; tr&ecirc;n thị trường chứ kh&ocirc;ng cố định, bạn cần thường xuy&ecirc;n cập nhật nh&eacute;!</p>\r\n<p>2. Ph&iacute; dịch vụ:</p>\r\n<p>L&agrave; ph&iacute; giao dịch mua h&agrave;ng m&agrave; kh&aacute;ch h&agrave;ng trả cho đơn vị order để giao dịch với nh&agrave; cung cấp, thực hiện mua v&agrave; thanh to&aacute;n đơn h&agrave;ng. Ph&iacute; n&agrave;y được t&iacute;nh theo từng đơn h&agrave;ng v&agrave; thường dao động từ 1-5% tổng gi&aacute; trị đơn h&agrave;ng, t&ugrave;y v&agrave;o đơn vị vận chuyển.</p>\r\n<p>V&iacute; dụ: Đơn h&agrave;ng của bạn c&oacute; tổng gi&aacute; trị l&agrave; 2 triệu, ph&iacute; dịch vụ l&agrave; 3% th&igrave; ph&iacute; sẽ l&agrave;: 2 000 000 x 3% = 60 000 (VNĐ)</p>\r\n<p>3. Ph&iacute; ship nội địa Trung:</p>\r\n<p>L&agrave; ph&iacute; chuyển h&agrave;ng từ nh&agrave; cung cấp tới kho của đơn vị vận chuyển tại Trung Quốc. Ph&iacute; n&agrave;y sẽ được shop Trung thu. Ph&iacute; ship nội địa Trung Quốc được t&iacute;nh theo khối lượng h&agrave;ng v&agrave; khoảng c&aacute;ch từ shop đến kho của đơn vị vận chuyển.</p>\r\n<p>Th&ocirc;ng thường, khi mua h&agrave;ng ở c&aacute;c shop tr&ecirc;n Taobao v&agrave; Tmall, bạn sẽ được freeship v&igrave; c&aacute;c website n&agrave;y thi&ecirc;n về b&aacute;n lẻ. C&ograve;n tr&ecirc;n Alibaba v&agrave; 1688 sẽ c&oacute; &iacute;t shop freeship hơn v&igrave; ở đ&acirc;y thi&ecirc;n về b&aacute;n sỉ.</p>\r\n<p>4. Ph&iacute; vận chuyển:</p>\r\n<p>L&agrave; ph&iacute; vận chuyển từ kho Trung Quốc về kho của đơn vị vận chuyển tại Việt Nam (Đơn vị Kg)</p>\r\n<p>C&oacute; một lưu &yacute; đ&oacute; l&agrave; đối với h&agrave;ng nặng hoặc cồng kềnh, ph&iacute; vận chuyển được t&iacute;nh theo hai c&aacute;ch l&agrave; trọng lượng theo h&agrave;ng nặng, v&agrave; thể t&iacute;ch cho h&agrave;ng cồng kềnh.</p>\r\n<p>5. Ph&iacute; kiểm đếm hoặc đ&oacute;ng gỗ:</p>\r\n<p>Ph&iacute; kiểm đếm l&agrave; ph&iacute; cho dịch vụ đảm bảo sản phẩm của kh&aacute;ch kh&ocirc;ng bị nh&agrave; cung cấp giao sai hoặc thiếu. Đơn vị vận chuyển sẽ kiểm tra h&agrave;ng khi nhận được tại kho Trung Quốc. H&agrave;ng h&oacute;a sẽ được kiểm tra theo số lượng v&agrave; c&aacute;c thuộc t&iacute;nh cơ bản, ph&acirc;n loại h&agrave;ng h&oacute;a m&agrave; kh&aacute;ch h&agrave;ng đ&atilde; thao t&aacute;c chọn khi đưa v&agrave;o giỏ h&agrave;ng.</p>\r\n<p>Đ&oacute;ng gỗ l&agrave; một h&igrave;nh thức nhằm đảm bảo an to&agrave;n cho h&agrave;ng h&oacute;a v&agrave; hạn chế xảy ra rủi ro đối với h&agrave;ng h&oacute;a dễ vỡ, dễ biến dạng trong qu&aacute; tr&igrave;nh vận chuyển.</p>\r\n<p>Đ&acirc;y l&agrave; hai loại ph&iacute; kh&ocirc;ng bắt buộc.</p>\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; tất cả c&aacute;c loại ph&iacute; m&agrave; bạn cần biết khi đặt h&agrave;ng tr&ecirc;n c&aacute;c website b&aacute;n h&agrave;ng Trung Quốc. Sau khi nắm được c&aacute;ch t&iacute;nh cũng như c&aacute;c loại ph&iacute;, c&aacute;c bạn ho&agrave;n to&agrave;n c&oacute; thể tự t&iacute;nh gi&aacute; h&agrave;ng h&oacute;a về tay khi nhập h&agrave;ng Trung Quốc, order Alibaba, Taobao, Tmall, 1688...</p>\r\n<p>Thao khảo b&agrave;i viết C&aacute;ch t&igrave;m nguồn h&agrave;ng v&agrave; đặt h&agrave;ng Taobao, 1688, Tmall tr&ecirc;n m&aacute;y t&iacute;nh</p>\r\n<p>Thao khảo b&agrave;i viết C&aacute;ch t&igrave;m nguồn h&agrave;ng v&agrave; đặt h&agrave;ng Taobao, 1688, Tmall tr&ecirc;n điện thoại.</p>\r\n<p>Mọi vấn đề thắc mắc hoặc cần hỗ trợ, qu&yacute; kh&aacute;ch h&agrave;ng h&atilde;y li&ecirc;n hệ ngay với ch&uacute;ng t&ocirc;i tại:</p>\r\n<p>Hotline: 096.247.1688</p>\r\n<p>Email: ordernhaphangchina@gmail.com</p>\r\n<p>Fanpage: https://www.facebook.com/ordertaobaonhaphangchina/</p>', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"gi\\u00e1 order\",\"ph\\u00ed v\\u1eadn chuy\\u1ec3n\",\"ph\\u00ed d\\u1ecbch v\\u1ee5\"],\"hot\":\"1\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-26 18:01:13', NULL),
(80, 'Tìm kiếm các link xưởng 1688 uy tín, chất lượng', 'tim-kiem-cac-link-xuong-1688-uy-tin-chat-luong', '/upload/unnamed.jpg', 'Mua hàng, đặt hàng Trung Quốc đang là xu hướng phổ biến ở nước ta. Bởi các mặt hàng có nguồn gốc này thường chất lượng, giá thành phải chăng. Tuy nhiên, nhiều người không biết được xưởng cung cấp hàng chất lượng, uy tín. Trên các website uy tín thường có rất nhiều xưởng khác nhau. Người mua cần lựa chọn link xưởng 1688 để lựa chọn được nhà cung cấp tốt nhất.', '<h2>1.&nbsp;&nbsp;&nbsp;&nbsp; Đ&aacute;nh gi&aacute; v&agrave; t&igrave;m kiếm c&aacute;c shop uy t&iacute;n tr&ecirc;n 1688</h2>\r\n<p>Để lựa chọn được shop uy t&iacute;n tr&ecirc;n 1688 người mua cần phải căn cứ v&agrave;o một số yếu tố như sau:</p>\r\n<h3>Căn cứ v&agrave;o cấp độ:</h3>\r\n<p>Tr&ecirc;n 1688 c&oacute; c&aacute;c cấp độ kh&aacute;c nhau. Việc ph&acirc;n cấp độ n&agrave;y dựa tr&ecirc;n quy m&ocirc; gi&aacute; trị, số lượng đ&atilde; thực hiện giao dịch. V&igrave; vậy, c&aacute;p độ c&agrave;ng cao th&igrave; chứng tỏ giao dịch c&agrave;ng nhiều được nhiều người lựa chọn.</p>\r\n<h3>Khối lượng giao dịch:</h3>\r\n<p>Bảng khối lượng giao dịch t&iacute;nh theo A từ cấp độ 1 đến 5. Người ti&ecirc;u d&ugrave;ng c&oacute; thể căn cứ theo số lượng sao A n&agrave;y để đ&aacute;nh gi&aacute;. Hiển nhi&ecirc;n cấp độ tăng dần từ 1 đến 5.</p>\r\n<p><img src=\"https://nhaphangchina.vn/pictures/images/532-link-xuong-1688-uy-tin.jpg\" alt=\"link xưởng 1688\" width=\"800\" height=\"479\" /></p>\r\n<h3>Căn cứ theo thời gian:</h3>\r\n<p>Thời gian tồn tại của một shop c&agrave;ng l&acirc;u chứng tỏ độ uy t&iacute;n, chất lượng c&agrave;ng tốt, được đảm bảo chắc chắn.</p>\r\n<h3>C&aacute;c cứ th&ocirc;ng tin tr&ecirc;n shop:</h3>\r\n<p>C&aacute;c th&ocirc;ng tin về m&ocirc; tả h&agrave;ng h&oacute;a, tốc độ phản hồi, tốc độ b&aacute;n h&agrave;ng, chuyển h&agrave;ng đều được cung cấp. Với những shop đầy đủ sẽ tạo ra uy t&iacute;n v&agrave; l&ograve;ng tin cho kh&aacute;ch h&agrave;ng.</p>\r\n<h3>C&aacute;c b&igrave;nh luận của người mua:</h3>\r\n<p>Đ&acirc;y c&oacute; lẽ l&agrave; đặc điểm quan trọng nhất để người d&ugrave;ng nhận biết được shop đ&oacute; c&oacute; uy t&iacute;n hay kh&ocirc;ng. Người mua cần ph&acirc;n biệt để nhận biết c&aacute;c th&ocirc;ng tin đ&aacute;nh gi&aacute; kh&aacute;ch quan về chất lượng phục vụ, chất lượng sản phẩm của shop đ&oacute; ra sao, tỷ lệ đ&aacute;nh gi&aacute; ra sao... Từ đ&oacute; nhận biết được shop c&oacute; uy t&iacute;n hay kh&ocirc;ng?</p>\r\n<h2>2.&nbsp;&nbsp;&nbsp;&nbsp; Hướng dẫn c&aacute;ch t&igrave;m kiếm shop uy t&iacute;n tr&ecirc;n 1688</h2>\r\n<p>Th&ocirc;ng thường, những shop uy t&iacute;n, chất lượng sẽ được đặt danh hiệu l&agrave; c&oacute; vương miện. V&igrave; vậy, người ti&ecirc;u d&ugrave;ng cần t&igrave;m kiếm c&aacute;c c&aacute;c shop như vậy. Sau đ&acirc;y l&agrave; c&aacute;ch t&igrave;m shop vương miện tr&ecirc;n 1688:</p>\r\n<h3>T&igrave;m kiếm nh&agrave; cung cấp:</h3>\r\n<p>Tại website của 1688 ch&uacute;ng ta v&agrave;o mục t&igrave;m kiếm nh&agrave; cung cấp thay v&igrave; t&igrave;m kiếm sản phẩm như th&ocirc;ng thường. Mục n&agrave;y ở mục thứ 2 từ tr&ecirc;n xuống. Người d&ugrave;ng sẽ phải g&otilde; từ kh&oacute;a v&agrave;o &ocirc; b&ecirc;n cạnh để t&igrave;m kiếm. Th&ocirc;ng thường từ kh&oacute;a cần g&otilde; phải l&agrave; từ tiếng Trung về từ kh&oacute;a ng&agrave;nh m&igrave;nh kinh doanh.</p>\r\n<p><img src=\"https://nhaphangchina.vn/pictures/images/529-link-xuong-1688-uy-tin.jpg\" alt=\"link xưởng 1688\" width=\"800\" height=\"570\" /></p>\r\n<h3>Kiểm tra c&aacute;c th&ocirc;ng tin được t&igrave;m kiếm:</h3>\r\n<p>Sau khi nhấn chọn t&igrave;m kiếm th&igrave; website sẽ xuất hiện h&agrave;ng loạt c&aacute;c địa chỉ của nh&agrave; cung cấp. Người mua h&agrave;ng c&oacute; thể căn cứ v&agrave;o c&aacute;c biểu tượng như h&igrave;nh dưới. Biểu tượng n&agrave;y tượng trưng cho việc x&aacute;c nhận tại địa phương của shop kinh doanh. Người mua h&agrave;ng c&oacute; thể xem c&aacute;c th&ocirc;ng tin của xưởng như nh&acirc;n c&ocirc;ng, diện t&iacute;ch, quy m&ocirc; hoạt động, m&aacute;y m&oacute;c...</p>\r\n<h3>Chọn lựa shop uy t&iacute;n</h3>\r\n<p>Khi đ&atilde; c&oacute; đ&aacute;nh gi&aacute; sơ bộ về shop đ&oacute; c&oacute; uy t&iacute;n hay kh&ocirc;ng? Người mua sẽ chọn lựa cho m&igrave;nh shop chuy&ecirc;n cung cấp c&aacute;c sản phẩm m&agrave; m&igrave;nh t&igrave;m kiếm. Từ đ&oacute; sẽ lọc ra được nh&agrave; cung cấp ph&ugrave; hợp nhất.</p>\r\n<p>Việc lựa chọn c&aacute;c nh&agrave; cung cấp sau c&ugrave;ng n&agrave;y sẽ dựa tr&ecirc;n nhiều ti&ecirc;u ch&iacute;. Ti&ecirc;u ch&iacute; về chất lượng sản phẩm, về gi&aacute; b&aacute;n, về dịch vụ...Người mua sẽ chọn lựa ra được shop ph&ugrave; hợp với điều kiện của m&igrave;nh nhất.</p>\r\n<p>Với c&aacute;c th&ocirc;ng tin kể tr&ecirc;n, ch&uacute;ng ta đ&atilde; biết được&nbsp;<strong>link xưởng 1688</strong>&nbsp;n&agrave;o chất lượng. Đồng th&ograve;i, qua đ&acirc;y, người d&ugrave;ng cũng biết c&aacute;ch t&igrave;m kiếm c&aacute;c shop uy t&iacute;n theo mong muốn v&agrave; ti&ecirc;u chuẩn của m&igrave;nh. Việc chọn lựa được shop uy t&iacute;n sẽ cho người d&ugrave;ng c&oacute; được nh&agrave; cung cấp h&agrave;ng h&oacute;a chất lượng, dịch vụ đảm bảo hơn.</p>', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"shop uy t\\u00edn\",\"1688\"],\"hot\":\"1\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-26 18:04:18', NULL),
(81, 'Hướng dẫn cách order đặt mua hàng trên 1688', 'huong-dan-cach-order-dat-mua-hang-tren-1688', '/upload/Untitled.png', 'Không nổi tiếng như Taobao, Tmall nhưng khi nhắc đến những trang thương mại điện tử uy tín, chất lượng chuyên cung cấp đa dạng nguồn hàng hóa khác nhau khách hàng không thể không nhắc đến 1688', '<p style=\"font-weight: 400;\">Để đ&aacute;p ứng nhu cầu mua bu&ocirc;n c&aacute;c sản phẩm của kh&aacute;ch h&agrave;ng trong nội địa Trung Quốc cũng như c&aacute;c nước tr&ecirc;n thế giới. Tập đo&agrave;n Alibaba ph&aacute;t triển website 1688.com như một s&agrave;n giao dịch b&aacute;n bu&ocirc;n online cho h&agrave;ng ngh&igrave;n nh&agrave; cung cấp (NCC) c&ugrave;ng kh&aacute;ch h&agrave;ng giao lưu mua b&aacute;n.</p>\r\n<p style=\"font-weight: 400;\">Đ&acirc;y l&agrave; s&agrave;n TMĐT c&oacute; thể gi&uacute;p bạn t&igrave;m thấy bất kỳ sản phẩm n&agrave;o m&igrave;nh muốn v&agrave; nhiều nhất l&agrave; c&aacute;c loại h&agrave;ng thời trang v&agrave; phụ kiện. Tại đ&acirc;y, hệ thống kiểm so&aacute;t h&agrave;ng h&oacute;a của 1688 c&oacute; những kh&acirc;u kiểm tra chặt chẽ từ c&aacute;c loại đ&aacute;nh gi&aacute; xếp hạng cho NCC đến c&aacute;c mục đ&aacute;nh gi&aacute; từ kh&aacute;ch h&agrave;ng, gửi ảnh feelback,...</p>\r\n<p style=\"font-weight: 400;\">V&igrave; vậy n&ecirc;n, đa số h&agrave;ng h&oacute;a tại 1688 đều c&oacute; nguồn gốc r&otilde; r&agrave;ng v&agrave; chất lượng như đ&uacute;ng những b&agrave;i đăng b&aacute;n được th&ocirc;ng b&aacute;o. Tuy nhi&ecirc;n v&igrave; qu&aacute; nhiều NCC n&ecirc;n bạn cũng cần c&oacute; nhiều ch&uacute; &yacute; để đ&aacute;nh gi&aacute; đ&acirc;u l&agrave; shop uy t&iacute;n tr&ecirc;n 1688 c&oacute; g&aacute;i cả h&agrave;ng h&oacute;a hợp l&yacute; nhất để chọn lựa.</p>\r\n<h2 style=\"font-weight: 600;\">Cần ch&uacute; &yacute; g&igrave; khi mua h&agrave;ng ở 1688</h2>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Gi&aacute; h&agrave;ng order 1688.com</li>\r\n</ul>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Gi&aacute; h&agrave;ng h&oacute;a tại s&agrave;n giao dịch n&agrave;y thường rất rẻ</li>\r\n<li>C&agrave;ng mua nhiều gi&aacute; đơn h&agrave;ng sẽ c&agrave;ng được khuyến m&atilde;i s&acirc;u</li>\r\n<li>H&agrave;ng h&oacute;a được b&aacute;n theo h&igrave;nh thức đấu gi&aacute;</li>\r\n<li>Đa phần h&agrave;ng h&oacute;a được sản xuất từ xưởng gốc n&ecirc;n gi&aacute; th&agrave;nh c&oacute; thể đ&agrave;m ph&aacute;n để mua l&acirc;u d&agrave;i.</li>\r\n</ul>\r\n<ul style=\"font-weight: 400;\">\r\n<li>C&aacute;c loại mặt h&agrave;ng kinh doanh</li>\r\n</ul>\r\n<ul style=\"font-weight: 400;\">\r\n<li>1688 c&oacute; c&aacute;c loại h&agrave;ng thời trang: quần &aacute;o, gi&agrave;y d&eacute;p, t&uacute;i x&aacute;ch, phụ kiện thời trang,...</li>\r\n<li>H&agrave;ng c&ocirc;ng nghệ: Điện thoại, m&aacute;y t&iacute;nh, c&aacute;c thiết bị th&ocirc;ng minh, phụ kiện th&ocirc;ng minh,...</li>\r\n<li>H&agrave;ng gia dụng</li>\r\n<li>Đồ nội thất</li>\r\n<li>Mỹ phẩm, c&aacute;c sản phẩm l&agrave;m đẹp</li>\r\n</ul>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Kh&acirc;u thanh to&aacute;n v&agrave; vận chuyển</li>\r\n</ul>\r\n<ul style=\"font-weight: 400;\">\r\n<li>1688 l&agrave; website chỉ nhận thanh to&aacute;n bằng c&aacute;c loại thẻ nội địa n&ecirc;n nhiều kh&aacute;ch h&agrave;ng kh&ocirc;ng c&oacute; t&agrave;i khoản tại c&aacute;c ng&acirc;n h&agrave;ng nội địa Trung Quốc sẽ gặp nhiều kh&oacute; khăn</li>\r\n<li>Ngo&agrave;i h&igrave;nh thức thanh to&aacute;n thẻ, thanh to&aacute;n trực tiếp th&igrave; 1688.com c&ograve;n sử dụng h&igrave;nh thức thanh to&aacute;n bằng Alipay. Bạn c&oacute; thể tham khảo c&aacute;ch đăng k&yacute; t&agrave;i khoản Alipay tại đ&acirc;y.</li>\r\n<li>Kh&acirc;u vận chuyển h&agrave;ng của 1688 cũng kh&aacute; kh&oacute; khăn cho c&aacute;c kh&aacute;ch h&agrave;ng nước ngo&agrave;i. C&aacute;c chủ shop tr&ecirc;n 1688 kh&ocirc;ng hỗ trợ nhiều việc vận chuyển ngo&agrave;i nội địa Trung Quốc.&nbsp;</li>\r\n</ul>\r\n<h3 style=\"font-weight: 600;\">Ưu v&agrave; nhược điểm khi mua h&agrave;ng ở 1688</h3>\r\n<h4 style=\"font-weight: 600;\">Ưu điểm</h4>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Sản phẩm gi&aacute; rẻ</li>\r\n<li>Mẫu m&atilde;, chủng loại, thiết kế đa dạng, phong ph&uacute;</li>\r\n<li>Mọi sản phẩm đều ph&ugrave; hợp với thị hiếu của người ti&ecirc;u d&ugrave;ng</li>\r\n<li>Kiểu d&aacute;ng lu&ocirc;n thay đổi cập nhật theo xu hướng thời trang thế giới</li>\r\n<li>Tiết kiệm thời gian mua h&agrave;ng hay đi nhập h&agrave;ng từ c&aacute;c đại l&yacute;, chợ lớn</li>\r\n<li>Tiết kiệm chi ph&iacute; đi lại, chi ph&iacute; ăn uống, ngủ nghỉ khi phải đi đ&aacute;nh h&agrave;ng trung quốc</li>\r\n</ul>\r\n<h4 style=\"font-weight: 600;\">Hạn chế khi mua h&agrave;ng tr&ecirc;n 1688</h4>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Trở ngại về ng&ocirc;n ngữ: 1688 chỉ d&ugrave;ng ng&ocirc;n ngữ tiếng Trung</li>\r\n<li>Kh&acirc;u thanh to&aacute;n phức tạp hơn nữa chỉ d&ugrave;ng thanh to&aacute;n nội địa</li>\r\n<li>Nhiều NCC chỉ vận chuyển nội địa, đăng k&yacute; vận chuyển quốc tế kh&oacute; khăn, chi ph&iacute; vận chuyển lớn.</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">V&igrave; những hạn chế tr&ecirc;n bạn n&ecirc;n t&igrave;m cho m&igrave;nh một c&ocirc;ng ty vận chuyển h&agrave;ng Trung - Việt uy t&iacute;n để k&yacute; gửi đơn h&agrave;ng. Nhập h&agrave;ng China l&agrave; một trong những đơn vị h&agrave;ng đầu c&oacute; thể gi&uacute;p bạn mua h&agrave;ng tr&ecirc;n 1688 gi&aacute; rẻ l&atilde;i cao.</p>\r\n<h2 style=\"font-weight: 600;\">C&aacute;ch mua h&agrave;ng tr&ecirc;n 1688.com</h2>\r\n<p style=\"font-weight: 400;\">Bước 1: Tạo t&agrave;i khoản 1688</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Truy cập trang&nbsp;<a href=\"http://www.1688.com/\">www.1688.com</a>&nbsp;v&agrave; sử dụng GG dịch hoặc c&aacute;c phần mềm kh&aacute;c để dịch trang</li>\r\n<li>V&agrave;o mục đăng k&yacute; t&agrave;i khoản v&agrave; l&agrave;m theo hướng dẫn</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Bước 2: T&igrave;m sản phẩm cần mua</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>G&otilde; t&ecirc;n loại sản phẩm v&agrave;o thanh t&igrave;m kiếm</li>\r\n</ul>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Hoặc bạn c&oacute; thể sử dụng c&ocirc;ng cụ t&igrave;m kiếm bằng ảnh tr&ecirc;n g&oacute;c phải thanh c&ocirc;ng cụ</li>\r\n<li>Một số loại t&ecirc;n sản phẩm bạn c&oacute; thể tham khảo</li>\r\n</ul>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>H&agrave;ng Thời Trang</p>\r\n</td>\r\n<td>\r\n<p>H&agrave;ng Tạp H&oacute;a</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>&Aacute;o sơ mi : 衬衫</p>\r\n<p>V&aacute;y ： 裙子</p>\r\n<p>Quần： 裤子</p>\r\n<p>Quần tất : 打底裤</p>\r\n<p>Vest : 西装</p>\r\n<p>&Aacute;o da : 皮衣</p>\r\n<p>&Aacute;o gi&oacute; :风衣</p>\r\n<p>&Aacute;o len : 毛衣</p>\r\n<p>&Aacute;o ren / voan : 蕾丝衫/雪纺衫</p>\r\n<p>Quần &aacute;o trung ni&ecirc;n ： 中老年服装</p>\r\n<p>V&aacute;y c&ocirc;ng sở nữ : 职业女裙套装</p>\r\n<p>Thời trang c&ocirc;ng sở/ Đồ học sinh/Đồng phục : 职业套装/学生校服/工作制服</p>\r\n</td>\r\n<td>\r\n<p>Phụ kiện điện thoại : 手机配件</p>\r\n<p>Ốp lưng : 保护壳</p>\r\n<p>Tai nghe : 耳机</p>\r\n<p>Mặt k&iacute;nh điện thoại : 玻璃膜</p>\r\n<p>Pin : 电池</p>\r\n<p>Tủ : 柜子</p>\r\n<p>Giường : 床</p>\r\n<p>B&agrave;n : 壁纸</p>\r\n<p>Giấy d&aacute;n tường : 壁纸</p>\r\n<p>Tranh treo tường : 壁画</p>\r\n<p>Đ&egrave;n : 灯</p>\r\n<p>V&ograve;i tắm : 淋浴</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"font-weight: 400;\">Bước 3: Nhập th&ocirc;ng tin giao h&agrave;ng</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Tại bước n&agrave;y bạn phải nhập t&agrave;i khoản ng&acirc;n h&agrave;ng</li>\r\n<li>Nhập địa chỉ nhận h&agrave;ng tại Trung Quốc</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Bước 4: Thanh to&aacute;n v&agrave; nhận h&agrave;ng</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Sau khi bạn thanh to&aacute;n đơn h&agrave;ng c&aacute;c sản phẩm sẽ về trong v&ograve;ng 3 - 5 ng&agrave;y t&ugrave;y theo địa chỉ giao h&agrave;ng nội địa bạn cung cấp.</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Mua h&agrave;ng tr&ecirc;n 1688 đơn giản hơn c&ugrave;ng Nhập H&agrave;ng China</p>\r\n<p style=\"font-weight: 400;\">Bước 1: Đăng k&yacute; t&agrave;i khoản</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Truy cập&nbsp;<a href=\"https://nhaphangchina.vn/\">https://nhaphangchina.vn/</a>&nbsp;v&agrave; chọn đăng k&yacute;&nbsp;</li>\r\n<li>L&agrave;m theo c&aacute;c bước hướng dẫn từ hệ thống để đăng k&yacute; sử dụng dịch vụ k&yacute; gửi h&agrave;ng h&oacute;a của ch&uacute;ng t&ocirc;i.</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Bước 2: Tải tiện &iacute;ch mua h&agrave;ng</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Sử dụng tiện &iacute;ch mua h&agrave;ng của nhaphangchina.vn để đặt h&agrave;ng 1688 tiện lợi kh&ocirc;ng cần c&ocirc;ng cụ dịch.</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Bước 3: T&igrave;m kiếm sản phẩm</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Bạn chọn loại sản phẩm ưng &yacute; v&agrave; th&ecirc;m v&agrave;o giỏ h&agrave;ng</li>\r\n<li>Bạn n&ecirc;n lưu &yacute; đ&aacute;nh gi&aacute; shop uy t&iacute;n để nguồn h&agrave;ng c&oacute; chất lượng tốt hơn</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Bước 4: L&ecirc;n đơn v&agrave; đặt cọc</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Bạn v&agrave;o đơn h&agrave;ng chọn những sản phẩm bạn muốn order về Việt Nam, l&ecirc;n đơn v&agrave; tiến h&agrave;ng đặt cọc</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Bước 5: Nhận h&agrave;ng</p>\r\n<ul style=\"font-weight: 400;\">\r\n<li>Sau khi đơn h&agrave;ng được chuyển từ Trung Quốc về Việt Nam ch&uacute;ng t&ocirc;i sẽ giao h&agrave;ng đến địa chỉ bạn cung cấp</li>\r\n<li>Hoặc bạn c&oacute; thể đến kho của Nhập h&agrave;ng China để nhận h&agrave;ng.</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">Mọi thắc mắc v&agrave; y&ecirc;u cầu cần giải đ&aacute;p h&atilde;y li&ecirc;n hệ với nhaphangchina ngay theo SDT 096.247.1688 - 086.247.1688 hoặc email:&nbsp;<a href=\"mailto:ordernhaphangchina@gmail.com\">ordernhaphangchina@gmail.com</a>. Ch&uacute;c bạn sớm c&oacute; c&aacute;ch mua h&agrave;ng tr&ecirc;n 1688 ph&ugrave; hợp nhất. Nhaphangchina.vn&nbsp;<a href=\"https://nhaphangchina.vn/\"><strong>c&ocirc;ng ty order h&agrave;ng Trung Quốc uy t&iacute;n</strong></a>&nbsp;nhất hiện nay.</p>', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"1\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-26 17:58:18', NULL),
(82, 'Thắc mắc thường gặp khi mới nhập hàng TQ', 'thac-mac-thuong-gap-khi-moi-nhap-hang-tq', '/upload/iuw1578281890.jpg', 'Nếu bạn mới làm quen với nhập hàng Trung Quốc, order Taobao, Tmall, 1688 chắc hẳn sẽ có rất nhiều những thắc mắc liên quan đến quá trình mua hàng. Những giải đáp sau sẽ giúp cho bạn hiểu một số điều cơ bản khi đặt mua hàng trên các trang thương mại điện tử Trung Quốc.', '<p>Nếu bạn mới l&agrave;m quen với nhập h&agrave;ng Trung Quốc, order Taobao, Tmall, 1688 chắc hẳn sẽ c&oacute; rất nhiều những thắc mắc li&ecirc;n quan đến qu&aacute; tr&igrave;nh mua h&agrave;ng. Những giải đ&aacute;p sau sẽ gi&uacute;p cho bạn hiểu một số điều cơ bản khi đặt mua h&agrave;ng tr&ecirc;n c&aacute;c trang thương mại điện tử Trung Quốc.&nbsp;</p>\r\n<p><strong>1. T&igrave;m nguồn h&agrave;ng Trung Quốc ở đ&acirc;u?</strong></p>\r\n<p>Hầu hết những &ldquo;con bu&ocirc;n&rdquo; h&agrave;ng Trung Quốc đều t&igrave;m nguồn h&agrave;ng tr&ecirc;n c&aacute;c website thương mại đi&ecirc;̣n tử n&ocirc;̉i ti&ecirc;́ng của Trung Quốc như Alibaba, Taobao, 1688, Tmall...Những trang web n&agrave;y tập hợp h&agrave;ng ngh&igrave;n nguồn h&agrave;ng đa dạng, đầy đủ c&aacute;c mặt h&agrave;ng v&agrave; nhiều mức gi&aacute; kh&aacute;c nhau. Đ&acirc;y ch&iacute;nh l&agrave; &ldquo;thi&ecirc;n đường&rdquo; cho những người người muốn kinh doanh.</p>\r\n<p>Tham khảo hướng dẫn t&igrave;m nguồn h&agrave;ng<a href=\"https://nhaphangchina.vn/huong-dan-dat-hang-tren-website-nhap-hang-china/\">&nbsp;tr&ecirc;n m&aacute;y t&iacute;nh</a>/&nbsp;<a href=\"https://nhaphangchina.vn/huong-dan-dang-nhap-va-tim-hang-tren-taobao-bang-dien-thoai/\">tr&ecirc;n điện thoại</a>.</p>\r\n<p><strong>2. Kh&ocirc;ng biết tiếng Trung c&oacute; đặt được h&agrave;ng kh&ocirc;ng?&nbsp;</strong></p>\r\n<p>Ho&agrave;n to&agrave;n c&oacute; thể. Bạn c&oacute; thể sử dụng c&ocirc;ng cụ hỗ trợ&nbsp;dịch Google Translate để t&igrave;m hiểu về&nbsp;sản phẩm hoặc nhờ đến một đơn vị trung gian vận chuyển hỗ trợ bạn t&igrave;m v&agrave; đặt h&agrave;ng.</p>\r\n<p><strong>3. Quy tr&igrave;nh mua&nbsp;h&agrave;ng tại NhapHangChina như thế n&agrave;o?</strong></p>\r\n<p>Để mua h&agrave;ng tại NhapHangChina, c&aacute;c bạn cần:</p>\r\n<ul>\r\n<li>Tạo t&agrave;i khoản Alibaba, Taobao, Tmall, 1688 (hướng dẫn&nbsp;<a href=\"https://nhaphangchina.vn/cac-buoc-dang-ky-tai-khoan-tren-taobao-1688-tmall-nhanh-nhat/\">tr&ecirc;n m&aacute;y t&iacute;nh</a>/&nbsp;<a href=\"https://nhaphangchina.vn/tao-tai-khoan-taobao-tren-dien-thoai/\">tr&ecirc;n điện thoại</a>).</li>\r\n<li>Chọn h&agrave;ng tại c&aacute;c website Trung Quốc.</li>\r\n<li>L&ecirc;n đơn h&agrave;ng tr&ecirc;n website NhapHangChina.vn (nếu bạn d&ugrave;ng m&aacute;y t&iacute;nh) hoặc gửi link sản phẩm muốn nhập cho NhapHangChina (nếu bạn d&ugrave;ng điện thoại).</li>\r\n<li>Đặt cọc &iacute;t nhất&nbsp;70% gi&aacute; trị đơn h&agrave;ng.</li>\r\n<li>H&agrave;ng được mua v&agrave; vận chuyển từ&nbsp;Trung Quốc về kho Việt Nam.</li>\r\n<li>Nhận h&agrave;ng tại kho hoặc NhapHangChina sẽ giao h&agrave;ng tận tay đến kh&aacute;ch h&agrave;ng.</li>\r\n</ul>\r\n<p>4. NhapHangChina c&oacute; c&ocirc;ng cụ hỗ trợ đặt h&agrave;ng bằng tiếng Việt hay App mobile kh&ocirc;ng?</p>\r\n<p>Ch&uacute;ng t&ocirc;i c&oacute; c&ocirc;ng cụ t&igrave;m h&agrave;ng v&agrave; đặt h&agrave;ng bằng tiếng Việt tr&ecirc;n m&aacute;y t&iacute;nh. Trong thời gian tới, app mobile chắc chắn sẽ được ra mắt để việc mua h&agrave;ng trở n&ecirc;n dễ d&agrave;ng, tiện lợi hơn.</p>\r\n<p>5. NhapHangChina c&oacute; sẵn h&agrave;ng để b&aacute;n kh&ocirc;ng?</p>\r\n<p>Kh&ocirc;ng. NhapHangChina kh&ocirc;ng phải shop b&aacute;n h&agrave;ng. Ch&uacute;ng t&ocirc;i l&agrave; đơn vị hỗ trợ mua h&agrave;ng, vận chuyển h&agrave;ng h&oacute;a Trung Quốc - Việt Nam.</p>\r\n<p>6. NhapHangChina nhận order những mặt h&agrave;ng g&igrave;?</p>\r\n<p>NhapHangChina order tất cả c&aacute;c mặt h&agrave;ng b&aacute;n tr&ecirc;n c&aacute;c website của Trung Quốc như Alibaba, Taobao,1688, Tmall&hellip; Trừ h&agrave;ng cấm, h&oacute;a chất độc hại v&agrave; hạn chế đối với những mặt h&agrave;ng dễ vỡ, dễ ch&aacute;y nổ.</p>\r\n<p><strong>7. C&aacute;c loại ph&iacute; cần trả khi đặt h&agrave;ng qua c&aacute;c đơn vị vận chuyển?</strong></p>\r\n<p>Mỗi đơn vị vận chuyển đều sẽ c&oacute; quy định ri&ecirc;ng về c&aacute;c loại ph&iacute;. Th&ocirc;ng thường sẽ bao gồm:</p>\r\n<ul>\r\n<li>Ph&iacute; dịch vụ:&nbsp;L&agrave; ph&iacute; giao dịch mua h&agrave;ng m&agrave; kh&aacute;ch h&agrave;ng trả cho đơn vị order để giao dịch với nh&agrave; cung cấp, thực hiện mua v&agrave; thanh to&aacute;n đơn h&agrave;ng. Ph&iacute; n&agrave;y được t&iacute;nh theo từng đơn h&agrave;ng v&agrave; thường dao động từ 1-5% tổng gi&aacute; trị đơn h&agrave;ng, t&ugrave;y v&agrave;o đơn vị vận chuyển.</li>\r\n<li>Ph&iacute; ship nội địa Trung Quốc:&nbsp;L&agrave; ph&iacute; chuyển h&agrave;ng từ nh&agrave; cung cấp tới kho của đơn vị vận chuyển tại Trung Quốc. Ph&iacute; n&agrave;y sẽ do shop Trung thu. Ph&iacute; ship nội địa Trung Quốc được t&iacute;nh theo khối lượng h&agrave;ng v&agrave; khoảng c&aacute;ch từ shop đến kho của đơn vị vận chuyển.</li>\r\n<li>Ph&iacute; vận chuyển Trung Quốc - Việt Nam:&nbsp;L&agrave; ph&iacute; vận chuyển từ kho Trung Quốc về kho của đơn vị vận chuyển tại Việt Nam (t&iacute;nh theo đơn vị Kg)</li>\r\n<li>Ph&iacute; kiểm đếm (kh&ocirc;ng bắt buộc): L&agrave; ph&iacute; cho dịch vụ đảm bảo sản phẩm của kh&aacute;ch kh&ocirc;ng bị nh&agrave; cung cấp giao sai hoặc thiếu. Đơn vị vận chuyển sẽ kiểm tra h&agrave;ng khi nhận được tại kho Trung Quốc. H&agrave;ng h&oacute;a sẽ được kiểm tra theo số lượng v&agrave; c&aacute;c thuộc t&iacute;nh cơ bản, ph&acirc;n loại h&agrave;ng h&oacute;a m&agrave; kh&aacute;ch h&agrave;ng đ&atilde; thao t&aacute;c chọn khi đưa v&agrave;o giỏ h&agrave;ng.</li>\r\n<li>Ph&iacute; đ&oacute;ng gỗ (kh&ocirc;ng bắt buộc): L&agrave; một h&igrave;nh thức nhằm đảm bảo an to&agrave;n cho h&agrave;ng h&oacute;a v&agrave; hạn chế xảy ra rủi ro đối với h&agrave;ng h&oacute;a dễ vỡ, dễ biến dạng trong qu&aacute; tr&igrave;nh vận chuyển.</li>\r\n</ul>\r\n<p><strong>8. H&agrave;ng h&oacute;a được vận chuyển ra sao?</strong></p>\r\n<p>Sau khi ho&agrave;n tất việc đặt h&agrave;ng, h&agrave;ng h&oacute;a sẽ được người b&aacute;n Trung Quốc ship đến kho của đơn vị vận chuyển tại Trung Quốc. Từ kho Trung, h&agrave;ng lại tiếp tục được vận chuyển về kho h&agrave;ng tại Việt Nam.</p>\r\n<p><strong>9. Mất bao l&acirc;u để h&agrave;ng về đến Việt Nam?</strong></p>\r\n<p>Khi đặt h&agrave;ng, c&aacute;c shop Trung Quốc sẽ cần c&oacute; 1 khoảng thời gian để chuẩn bị h&agrave;ng v&agrave; ph&aacute;t h&agrave;ng.&nbsp; Khi h&agrave;ng đ&atilde; đến kho Trung của NhapHangChina, thời gian để h&agrave;ng về kho H&agrave; Nội l&agrave; 1-2 ng&agrave;y; về kho HCM l&agrave; 3-5 ng&agrave;y.</p>\r\n<p>Lưu &yacute;: thời gian thực tế c&oacute; thể thay đổi t&ugrave;y thuộc t&igrave;nh h&igrave;nh thị trường tại từng thời điểm.</p>\r\n<p><strong>10. Kh&aacute;ch h&agrave;ng c&oacute; thể nhận h&agrave;ng như thế n&agrave;o?</strong></p>\r\n<p>Khi h&agrave;ng về Việt Nam, bạn c&oacute; 2 h&igrave;nh thức nhận h&agrave;ng:&nbsp;</p>\r\n<ul>\r\n<li>Nhận h&agrave;ng trực tiếp tại kho h&agrave;ng của ch&uacute;ng t&ocirc;i&nbsp;</li>\r\n<li>Gửi h&agrave;ng qua chuyển ph&aacute;t nhanh hoặc gửi xe đến địa chỉ của bạn.</li>\r\n</ul>\r\n<p><strong>11. NhapHangChina c&oacute; mấy kho h&agrave;ng?</strong></p>\r\n<p>Hiện NhapHangChina c&oacute; 3 kho h&agrave;ng tại c&aacute;c địa chỉ:</p>\r\n<ul>\r\n<li>Tại H&agrave; Nội: Thịnh Liệt - Ho&agrave;ng Mai - H&agrave; Nội</li>\r\n<li>Tại TP.Hồ Chi Minh: L&ecirc; Văn Sỹ - P1 - Q.T&acirc;n B&igrave;nh</li>\r\n<li>Tại Trung Quốc: 广西壮族自治区 崇左市 凭祥市 凭祥镇 狮子山路 111</li>\r\n</ul>\r\n<p>Trong năm 2020, NhapHangChina sẽ mở th&ecirc;m 1 kho h&agrave;ng tại Đ&agrave; Nẵng để đ&aacute;p ứng nhu cầu mua h&agrave;ng của c&aacute;c bạn.</p>\r\n<p>12. NhapHangChina c&oacute; cam kết về chất lượng sản phẩm kh&ocirc;ng?</p>\r\n<p>V&igrave; NhapHangChina l&agrave; đơn vị trung gian vận chuyển n&ecirc;n ch&uacute;ng t&ocirc;i kh&ocirc;ng cam kết về chất lượng sản phẩm. Dịch vụ kiểm đếm của ch&uacute;ng t&ocirc;i sẽ chỉ kiểm tra một số thuộc t&iacute;nh sản phẩm (số lượng, m&agrave;u sắc, size in tr&ecirc;n sản phẩm).</p>\r\n<p>Tuy nhi&ecirc;n ch&uacute;ng t&ocirc;i sẽ hỗ trợ c&aacute;c bạn t&igrave;m nguồn h&agrave;ng chất lượng cũng như kiểm tra độ uy t&iacute;n của shop v&agrave; sản phẩm.</p>\r\n<p><strong>13. H&agrave;ng h&oacute;a sai s&oacute;t, hư hỏng hoặc thiếu th&igrave; xử l&yacute; như thế n&agrave;o?</strong></p>\r\n<p>Trong trường hợp h&agrave;ng bị nh&agrave; sản xuất ph&aacute;t sai, ph&aacute;t thiếu, NhapHangChina sẽ hỗ trợ c&aacute;c bạn khiếu nại với shop Trung Quốc.</p>\r\n<p>Trường hợp sai s&oacute;t do lỗi của NhapHangChina, ch&uacute;ng t&ocirc;i cam kết sẽ ho&agrave;n tiền cho c&aacute;c bạn. Cụ thể bạn tham khảo ch&iacute;nh s&aacute;ch khiếu nại tại website NhapHangChina.vn</p>\r\n<p>Hy vọng những c&acirc;u trả lời tr&ecirc;n sẽ giải đ&aacute;p được thắc mắc của bạn. Nếu c&ograve;n bất cứ kh&oacute; khăn hay thắc mắc, h&atilde;y li&ecirc;n hệ ngay cho NhapHangChina để được tư vấn v&agrave; hỗ trợ nhanh ch&oacute;ng!</p>\r\n<div>\r\n<p>Hotline:&nbsp;096.247.1688</p>\r\n<p>Email:&nbsp;ordernhaphangchina@gmail.com</p>\r\n<p>Fanpage:&nbsp;<a href=\"https://www.facebook.com/ordertaobaonhaphangchina/\">https://www.facebook.com/ordertaobaonhaphangchina/</a></p>\r\n</div>', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"1\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-26 18:09:12', NULL),
(83, 'Hướng dẫn tìm hàng bán chạy nhất hiện nay', 'huong-dan-tim-hang-ban-chay-nhat-hien-nay', '/upload/hqdefault.jpg', 'Bắt đầu khởi nghiệp kinh doanh chắc hẳn ai cũng phải tìm hiểu kỹ lưỡng về mặt hàng. Làm thế nào để mặt hàng đó bán chạy trên thị trường. Vậy cách tìm kiếm mặt hàng bán chạy nhất hiện nay như thế nào? Hãy cùng chúng tôi đi tìm hiểu vấn đề này qua nội dung bài viết dưới đây nhé!', '<p>Bắt đầu khởi nghiệp kinh doanh chắc hẳn ai cũng phải t&igrave;m hiểu kỹ lưỡng về mặt h&agrave;ng. L&agrave;m thế n&agrave;o để mặt h&agrave;ng đ&oacute; b&aacute;n chạy tr&ecirc;n thị trường. Vậy c&aacute;ch t&igrave;m kiếm&nbsp;<strong>mặt h&agrave;ng b&aacute;n chạy nhất hiện nay</strong>&nbsp;như thế n&agrave;o? H&atilde;y c&ugrave;ng ch&uacute;ng t&ocirc;i đi t&igrave;m hiểu vấn đề n&agrave;y qua nội dung b&agrave;i viết dưới đ&acirc;y nh&eacute;!</p>\r\n<h2>C&aacute;ch t&igrave;m kiếm những mặt h&agrave;ng b&aacute;n chạy nhất hiện nay</h2>\r\n<p>Với thời đại c&ocirc;ng nghệ ng&agrave;y c&agrave;ng ph&aacute;t triển như hiện nay, thật kh&ocirc;ng hề kh&oacute; khăn để bạn t&igrave;m ra mặt h&agrave;ng đang b&aacute;n chạy tr&ecirc;n thị trường, đặc biệt l&agrave; nguồn h&agrave;ng hot trend từ Trung Quốc. C&aacute;ch t&igrave;m kiếm h&agrave;ng b&aacute;n chạy tr&ecirc;n c&aacute;c trang thương mại điện tử đang được nhiều người &aacute;p dụng v&agrave; th&agrave;nh c&ocirc;ng. Vậy t&igrave;m kiếm như thế n&agrave;o để biết được th&ocirc;ng tin chi tiết?</p>\r\n<h3>Aliexpress.com</h3>\r\n<p>Aliexpress.com được đ&aacute;nh gi&aacute; l&agrave; trang thương mại điện tử lớn nhất thuộc tập đo&agrave;n Alibaba. Điểm đặc biệt của website n&agrave;y đ&oacute; ch&iacute;nh l&agrave; chỉ b&aacute;n h&agrave;ng cho người nước ngo&agrave;i. V&igrave; vậy, nguồn h&agrave;ng đảm bảo độ tin cậy tốt hơn. C&aacute;ch t&igrave;m h&agrave;ng b&aacute;n chạy nhất hiện nay tr&ecirc;n trang n&agrave;y như thế n&agrave;o?</p>\r\n<p><img src=\"https://nhaphangchina.vn/pictures/images/535-cach-tim-kiem-mat-hang-ban-chay-nhat-hien-nay.png\" alt=\"c&aacute;ch t&igrave;m kiếm mặt h&agrave;ng b&aacute;n chạy nhất hiện nay\" width=\"800\" height=\"414\" /></p>\r\n<p><strong>Bước 1:</strong>&nbsp;Bạn truy cập v&agrave;o website Aliexpress.com.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Chọn mục &ldquo;b&aacute;n chạy nhất&rdquo;. Hay c&aacute;ch kh&aacute;c bạn c&oacute; thể truy cập thẳng v&agrave;o link https://bestselling.aliexpress.com.</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Chọn danh mục Hot Products hoặc Weekly BestSelling.</p>\r\n<p>L&uacute;c n&agrave;y, bạn sẽ thấy h&igrave;nh ảnh c&aacute;c mặt h&agrave;ng b&aacute;n chạy nhất hiện nay.</p>\r\n<h3>Taobao.com</h3>\r\n<p>Một c&aacute;ch kh&aacute;c để tham khảo h&agrave;ng hot trend tr&ecirc;n thị trường đ&oacute; l&agrave; truy cập v&agrave;o website taobao.com. Ch&uacute;ng d&agrave;nh ri&ecirc;ng cho c&aacute;c kh&aacute;ch lẻ của Alibaba, bạn muốn lấy số lượng &iacute;t để tham khảo thị trường th&igrave; đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo. C&aacute;c mặt h&agrave;ng tr&ecirc;n trang điện từ n&agrave;y v&ocirc; c&ugrave;ng đa dạng, gi&aacute; th&agrave;nh cực tốt. Bởi vậy, taobao.com kh&ocirc;ng c&ograve;n xa lạ với kh&aacute;ch h&agrave;ng hiện nay. C&aacute;ch t&igrave;m kiếm mặt h&agrave;ng b&aacute;n chạy tr&ecirc;n taobao.com:</p>\r\n<p><strong>Bước 1:</strong>&nbsp;Bạn truy cập v&agrave;o website taobao.com v&agrave; chọn danh mục cuối c&ugrave;ng tr&ecirc;n thanh c&ocirc;ng cụ của website. Hoặc bạn c&oacute; thể truy cập v&agrave;o link https://top.taobao.com.</p>\r\n<p><img src=\"https://nhaphangchina.vn/pictures/images/536-cach-tim-kiem-mat-hang-ban-chay-nhat-hien-nay.png\" alt=\"c&aacute;ch t&igrave;m kiếm mặt h&agrave;ng b&aacute;n chạy nhất hiện nay\" width=\"800\" height=\"475\" /></p>\r\n<p><strong>Bước 2:</strong>&nbsp;L&uacute;c n&agrave;y, bạn c&oacute; thể nh&igrave;n thấy c&aacute;c h&igrave;nh ảnh sản phẩm đang b&aacute;n chạy tr&ecirc;n thị trường. Bạn c&oacute; thể sử dụng translate để t&igrave;m hiểu th&ocirc;ng tin chi tiết của từng sản phẩm.</p>\r\n<h3>1688.com</h3>\r\n<p>1688.com l&agrave; trang thương mại điện tử đ&aacute;p ứng cho kh&aacute;ch bu&ocirc;n l&agrave; chủ yếu. Nguồn h&agrave;ng cực kỳ đa dạng, phong ph&uacute; với số lượng lớn. T&igrave;m&nbsp;<strong>những mặt h&agrave;ng b&aacute;n chạy ở Việt Nam</strong>&nbsp;bằng c&aacute;ch truy cập v&agrave;o website https://index.1688.com. Tr&ecirc;n đ&acirc;y tổng hợp c&aacute;c giao dịch b&aacute;n bu&ocirc;n mặt h&agrave;ng với số lượng, th&ocirc;ng tin chi tiết về đơn h&agrave;ng. Bạn c&oacute; thể tham khảo, t&igrave;m hiểu cụ thể.</p>\r\n<p><img src=\"https://nhaphangchina.vn/pictures/images/537-cach-tim-kiem-mat-hang-ban-chay-nhat-hien-nay(1).PNG\" alt=\"c&aacute;ch t&igrave;m kiếm mặt h&agrave;ng b&aacute;n chạy nhất hiện nay\" width=\"800\" height=\"483\" /></p>\r\n<h2>C&aacute;ch đặt mặt h&agrave;ng b&aacute;n chạy từ Trung Quốc</h2>\r\n<p>Sau khi t&igrave;m hiểu v&agrave; chọn lựa được mặt h&agrave;ng b&aacute;n chạy nhất, bạn muốn đặt v&agrave; lấy về thị trường. Bạn cần phải t&igrave;m c&oacute; một số điều kiện như:</p>\r\n<p>T&agrave;i khoản ng&acirc;n h&agrave;ng Trung Quốc sử dụng để giao dịch mua b&aacute;n.</p>\r\n<p>T&agrave;i khoản để đặt h&agrave;ng tr&ecirc;n c&aacute;c trang thương mại điện tử,&hellip;.</p>\r\n<p>Nếu bạn đang gặp phải một số trở ngại n&agrave;o đ&oacute;, bạn c&oacute; thể t&igrave;m đến c&aacute;c đơn vị cung cấp&nbsp;<a href=\"https://nhaphangchina.vn/\"><strong>dịch vụ đặt h&agrave;ng Trung Quốc</strong></a>, vận chuyển h&agrave;ng&nbsp;về Việt Nam. Nhaphangchina.vn l&agrave; một trong những đơn vị đ&aacute;ng tin cậy hiện nay, cung cấp bảng gi&aacute; v&ocirc; c&ugrave;ng cạnh tranh. Bạn c&oacute; thể tham khảo chọn lựa.</p>\r\n<p>Kh&aacute;ch h&agrave;ng chỉ cần cung cấp đường link mặt h&agrave;ng m&agrave; bạn muốn mua. Đơn vị sẽ t&igrave;m kiếm nguồn h&agrave;ng, đặt mua tại nh&agrave; cung cấp uy t&iacute;n, gi&aacute; rẻ. H&agrave;ng h&oacute;a nhập về Việt Nam bạn kh&ocirc;ng c&ograve;n phải lo ngại về bất cứ vấn đề g&igrave; cả.</p>\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; một số chia sẻ về c&aacute;ch t&igrave;m kiếm&nbsp;<strong>mặt h&agrave;ng b&aacute;n chạy nhất hiện nay</strong>. Hy vọng th&ocirc;ng qua b&agrave;i viết n&agrave;y bạn c&oacute; th&ecirc;m kinh nghiệm để khởi nghiệm kinh doanh tốt nhất. Ch&uacute;c bạn khởi nghiệp sớm th&agrave;nh c&ocirc;ng nh&eacute;.</p>', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"1\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-26 18:37:06', NULL),
(84, 'What we can do for you', 'what-we-can-do-for-you', '/upload/3.jpg', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those what can do for you rationally encounter consequences that are extremely painful.', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\nNo one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\n\nThe display is most important\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.\n\nbecause it is pleasure, but because those who do not know how to pursue pleasure\n\n“Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.”\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"0\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-23 09:19:59', NULL);
INSERT INTO `things` (`id`, `title`, `slug`, `featured_img`, `excerpt`, `content`, `type`, `author`, `status`, `parent_id`, `order_index`, `metadata`, `locale`, `locale_source_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(85, 'What we can do for you', 'what-we-can-do-for-you', '/upload/3.jpg', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those what can do for you rationally encounter consequences that are extremely painful.', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\nNo one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\n\nThe display is most important\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.\n\nbecause it is pleasure, but because those who do not know how to pursue pleasure\n\n“Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.”\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"0\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-23 09:19:59', NULL),
(86, 'What we can do for you', 'what-we-can-do-for-you', '/upload/3.jpg', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those what can do for you rationally encounter consequences that are extremely painful.', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\nNo one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\n\nThe display is most important\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.\n\nbecause it is pleasure, but because those who do not know how to pursue pleasure\n\n“Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.”\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"0\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-23 09:19:59', NULL),
(87, 'What we can do for you', 'what-we-can-do-for-you', '/upload/3.jpg', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those what can do for you rationally encounter consequences that are extremely painful.', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\nNo one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\n\nThe display is most important\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.\n\nbecause it is pleasure, but because those who do not know how to pursue pleasure\n\n“Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.”\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"0\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-23 09:19:59', NULL),
(88, 'What we can do for you', 'what-we-can-do-for-you', '/upload/3.jpg', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those what can do for you rationally encounter consequences that are extremely painful.', 'I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\nNo one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.\n\n\nThe display is most important\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.\n\nbecause it is pleasure, but because those who do not know how to pursue pleasure\n\n“Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.”\nI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', 'news', 1, 'publish', 0, 0, '{\"tags\":[\"\"],\"hot\":\"0\"}', 'vi', 0, '2020-05-23 09:19:59', '2020-05-23 09:19:59', NULL),
(89, 'Tùy chỉnh', '/option/edit', 'ti-settings', NULL, NULL, 'menu_item', 0, 'publish', 0, 6, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-05-28 14:22:39', '2020-05-28 14:22:39', NULL),
(90, 'chỉnh sửa đơn hàng', '/order/order-detail/edit', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-06-07 16:52:38', '2020-06-07 16:52:38', NULL),
(91, 'Lịch sử giao dịch', '/edit-history-transaction', '', NULL, NULL, 'menu_item', 0, 'publish', 64, 0, '{\"hasChild\":false,\"showOnMenu\":true}', 'vi', 0, '2020-06-14 14:28:45', '2020-06-14 14:28:45', NULL),
(92, 'xóa đơn hàng', '/order/delete', '', NULL, NULL, 'menu_item', 0, 'publish', 48, 0, '{\"hasChild\":false,\"showOnMenu\":false}', 'vi', 0, '2020-06-20 15:40:38', '2020-06-20 15:40:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `channel`, `username`, `email`, `name`, `avatar`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `api_token`) VALUES
(1, 'backend', 'system', 'hungtrinh.un@gmail.com', 'Thanh Nhàn ', NULL, NULL, '$2y$10$sBaCexqdfGIkl4U881IRWuN.4PtbEH7Zs2RwFYdtoOxrKjlvJbzsu', 'Okx4ka5A7reIeYnISKgNCKUAmu1aEGQfhsWUj0uNEKB27EWyb2DtDXabJ1R5', '2020-05-22 09:08:26', '2021-03-15 15:33:33', NULL, 'fIC1ZlVDnlCv3CoHMpGPFlLDEi2AQ2FWBfmgpAoX377OjazzqN9hskyTTDys'),
(2, 'frontend', 'tuannm', 'hungtrinh.un@gmail.com', 'Nguyễn Minh Tuấn', NULL, NULL, '$2y$10$1y8P.6j.5xMQMHZRsbaNzOyPJRxthHkRMF0J9r1DMxSCkJU6xAX9W', NULL, '2020-05-22 09:08:26', '2020-05-22 09:08:26', NULL, NULL),
(3, 'backend', 'thaotm', 'thaotrinhminh@gmail.com', 'thaotm', NULL, NULL, '$2y$10$ZoSioHpus.WybqvcoT/BMOQow5cNZYY9sEOB0XyilEFMxBU9lw30m', 'Zrs75deLX4gvVERw3f34p0aRsCyoWfvl7B4JkbtgRnKhniIWEzSnH2tWd2Wm', '2020-05-25 15:38:02', '2021-01-03 11:02:54', NULL, 'fBa9aOQrNgqoS1kyFXg1dj3agqJ9Vrf9WrbP8zBZfFBqWyjQ45ZwCLOIXgfe'),
(4, 'backend', 'vhung', 'hung.trinh@sotatek.com', 'vhung', NULL, NULL, '$2y$10$QN9zftIx5/sB.76rHV2wjuNb.2UFl9EtkbXGNn3Al10o2c6w2st5K', NULL, '2020-05-26 16:50:06', '2020-05-26 16:50:06', NULL, NULL),
(5, 'backend', 'thuydung', 'thuydung@gmail.com', 'thuydung', NULL, NULL, '$2y$10$djAv6M.jhITPoJFqFUqk2OUlYqA71LAzrSvcl4eQL.9e2U2vySn0K', 'O20EemrL8bkFpbD9ee0FKfUKISQ3R71gJ86CzIgQnw9GHAQIcZjWreKs0k3M', '2020-05-27 02:30:10', '2020-05-27 02:30:10', NULL, NULL),
(6, 'backend', 'qtvien', 'hungtv42@wru.vn', 'qtvien', NULL, NULL, '$2y$10$lyvKZnV86E6.v4iM1kujhugKwM7amW3OWAhRIiXVvM8Wk7AhHzbQi', 'zM3rYzFpy1X34EQT9CRKJlHZOZfNoYx9f1QYvC3Y0nFMzS7bMBtcmUpoWXZn', '2020-06-18 14:47:38', '2020-06-25 02:20:00', NULL, 'qi0xtmiF2ts8VyfPeb87SGRw8sNI6gYwgoFkyOnSgdLLdv1cwxij8dYaflIF'),
(7, 'backend', 'hungcustomer123', 'hungcustomer123@gmail.comm', 'trinh viet hung', NULL, NULL, '$2y$10$HdDMzYERiYZ04KvYiiMJZuCVP8Ny6XmddY4OpLEQJj9i9/18zFxB2', 'ceoboh5tTXjUI1ibDstPpRKH8Pb2me7r9tXRiKDum3c1X4RG9r4Qn4vXJkoI', '2020-06-29 14:57:50', '2020-07-12 15:10:28', NULL, 'koT2oO42qHJQ3UYsvVtSEjcsblSR5ZbahNlGlEuyckRfv2UKQD4BC7hXOXeM'),
(8, 'backend', 'namnguyen0504', 'namnguyentien0504@gmail.com', 'Nguyễn Tiến Nam', NULL, NULL, '$2y$10$BWdF25EXlJSwGTvGGTcQJu.AjBZTWw89ZsPMVmZJ5FLLzzKLUuewi', '53ZkQjhoWKM7fglChYoq8QjZqOLLb5LPpqI3qIDZeAphBR6DlNDEIcdFKTsF', '2020-10-22 13:18:46', '2020-10-22 13:19:07', NULL, 'scj2A5tT9GDS0Wmlyi5FGMsGtEfSGXjfMIpznRGIsyDzOfiwHbUPH357iMUj'),
(9, 'backend', 'tiepanh', 'trantiepa@gmail.com', 'Trần Danh Tiệp', NULL, NULL, '$2y$10$D4HJGHIqqsFvuejmDO4t3egcehuGEUfWVztLAoTjVYM8P82a62ES.', 'e3HxncBlYVI8TbY3FY7VMCRedQwMBIbRkKVIWiKwjszVlj49vaSH4s0Qr4q3', '2020-11-07 14:05:00', '2020-11-07 14:05:07', NULL, 'BGliyBlLCVtSaVIRXUn4h3lSaPzpljvvMaKSYncp3Z94FxRr1v1qfeNhRT4z'),
(10, 'backend', 'minhnguyen102', 'minhnguyen.it1995@gmail.com', 'Nguyễn Minh Nguyền', NULL, NULL, '$2y$10$ahzJwVFyw/D7HvHpkMBUG.zT/qSktDhytlYDKQxWkt/V5EHRZRtVO', NULL, '2021-02-25 11:45:34', '2021-02-25 11:45:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(3, 75),
(3, 76),
(3, 77),
(3, 78),
(3, 79),
(3, 80),
(3, 81),
(3, 82),
(3, 83),
(3, 72),
(3, 77),
(3, 78),
(3, 79),
(3, 74),
(3, 75),
(3, 73),
(3, 76),
(3, 60),
(3, 66),
(3, 67),
(3, 65),
(3, 70),
(3, 71),
(3, 69),
(3, 62),
(3, 63),
(3, 61),
(3, 64),
(3, 68),
(3, 80),
(3, 81),
(3, 82),
(4, 72),
(4, 77),
(4, 78),
(4, 79),
(4, 74),
(4, 75),
(4, 73),
(4, 76),
(4, 60),
(4, 66),
(4, 67),
(4, 65),
(4, 70),
(4, 71),
(4, 69),
(4, 62),
(4, 63),
(4, 61),
(4, 64),
(4, 68),
(4, 80),
(4, 81),
(4, 82),
(5, 72),
(5, 77),
(5, 78),
(5, 79),
(5, 74),
(5, 75),
(5, 73),
(5, 76),
(5, 60),
(5, 66),
(5, 67),
(5, 65),
(5, 70),
(5, 71),
(5, 69),
(5, 62),
(5, 63),
(5, 61),
(5, 64),
(5, 68),
(5, 80),
(5, 81),
(5, 82),
(1, 84),
(1, 90),
(1, 85),
(1, 86),
(1, 87),
(6, 72),
(6, 77),
(6, 78),
(6, 79),
(6, 74),
(6, 75),
(6, 73),
(6, 76),
(6, 80),
(6, 81),
(6, 82),
(6, 85),
(6, 86),
(6, 83),
(6, 87),
(6, 84),
(1, 88),
(7, 86),
(7, 83),
(7, 80),
(7, 81),
(7, 82),
(7, 85),
(8, 86),
(8, 83),
(8, 80),
(8, 81),
(8, 82),
(8, 85),
(9, 86),
(9, 83),
(9, 80),
(9, 81),
(9, 82),
(9, 85),
(10, 86),
(10, 83),
(10, 80),
(10, 81),
(10, 82),
(10, 85);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 6),
(1, 8),
(3, 6),
(3, 8),
(4, 8),
(5, 8),
(1, 9),
(6, 8),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet`
--

CREATE TABLE `wallet` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `deposit` float(16,3) DEFAULT 0.000,
  `withdraw` float(16,3) DEFAULT 0.000,
  `total_payment` float(16,3) DEFAULT 0.000,
  `balance` float(16,3) DEFAULT 0.000,
  `refund` float(16,3) DEFAULT 0.000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallet`
--

INSERT INTO `wallet` (`id`, `customer_id`, `deposit`, `withdraw`, `total_payment`, `balance`, `refund`, `created_at`, `updated_at`) VALUES
(1, 1, 1000000.000, 500000.000, 300000.000, 950000.000, 0.000, '2020-05-11 10:21:29', '2020-05-11 10:21:29'),
(2, 28, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 07:45:10', '2020-05-20 07:45:10'),
(3, 29, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:17:54', '2020-05-20 08:17:54'),
(4, 30, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:23:02', '2020-05-20 08:23:02'),
(5, 31, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:26:53', '2020-05-20 08:26:53'),
(6, 32, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:27:20', '2020-05-20 08:27:20'),
(7, 33, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:27:30', '2020-05-20 08:27:30'),
(8, 34, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:36:42', '2020-05-20 08:36:42'),
(9, 35, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:37:58', '2020-05-20 08:37:58'),
(10, 36, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:45:37', '2020-05-20 08:45:37'),
(11, 37, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-20 08:45:47', '2020-05-20 08:45:47'),
(12, 3, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-25 15:38:02', '2020-05-25 15:38:02'),
(13, 4, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-26 16:50:06', '2020-05-26 16:50:06'),
(14, 5, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-05-27 02:30:10', '2020-05-27 02:30:10'),
(15, 6, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-06-18 14:47:38', '2020-06-18 14:47:38'),
(16, 7, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-06-29 14:57:50', '2020-06-29 14:57:50'),
(17, 8, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-10-22 13:18:46', '2020-10-22 13:18:46'),
(18, 9, 0.000, 0.000, 0.000, 0.000, 0.000, '2020-11-07 14:05:00', '2020-11-07 14:05:00'),
(19, 10, 0.000, 0.000, 0.000, 0.000, 0.000, '2021-02-25 11:45:34', '2021-02-25 11:45:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `history_transaction`
--
ALTER TABLE `history_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_things`
--
ALTER TABLE `product_things`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_detail`
--
ALTER TABLE `shipping_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `terms_things`
--
ALTER TABLE `terms_things`
  ADD PRIMARY KEY (`term_id`,`thing_id`),
  ADD KEY `terms_things_thing_id_foreign` (`thing_id`);

--
-- Chỉ mục cho bảng `things`
--
ALTER TABLE `things`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Chỉ mục cho bảng `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `history_transaction`
--
ALTER TABLE `history_transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `shipping_detail`
--
ALTER TABLE `shipping_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `things`
--
ALTER TABLE `things`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `terms_things`
--
ALTER TABLE `terms_things`
  ADD CONSTRAINT `terms_things_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `terms_things_thing_id_foreign` FOREIGN KEY (`thing_id`) REFERENCES `things` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
