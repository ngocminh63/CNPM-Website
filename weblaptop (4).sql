-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2021 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `weblaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Điện Thoại', 0, 'dien-thoai', '2021-05-18 20:07:52', '2021-05-18 20:07:52'),
(2, 'LapTop', 0, 'laptop', '2021-05-18 20:08:02', '2021-05-18 20:08:02'),
(3, 'Phụ Kiện', 0, 'phu-kien', '2021-05-18 20:08:15', '2021-05-18 20:08:15'),
(4, 'Iphone', 1, 'iphone', '2021-05-18 20:08:28', '2021-05-18 20:08:28'),
(5, 'OPPO', 1, 'oppo', '2021-05-18 20:08:43', '2021-05-18 20:08:43'),
(6, 'Iphone 83', 4, 'iphone-83', '2021-05-18 20:08:57', '2021-05-24 08:04:21'),
(7, 'ASUS', 2, 'asus', '2021-05-18 20:09:17', '2021-05-18 20:09:17'),
(8, 'Iphone 8 Plus', 4, 'iphone-8-plus', '2021-05-18 20:09:37', '2021-05-18 20:09:37'),
(9, 'Acer 3', 2, 'acer-3', '2021-05-18 20:09:54', '2021-05-24 08:01:39'),
(10, 'Acer 33', 2, 'acer-33', '2021-05-24 08:02:05', '2021-05-24 08:02:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `password`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Covid', 'kh01@gmail.com', '0222333666', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 1, 'Hà Nội', NULL, NULL),
(2, 'Nguyễn Khoảng Cách', 'kh02@gmail.com', '0222333777', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 2, 'Hà Tây', NULL, NULL),
(3, 'Nguyễn Khẩu Trang', 'kh03@gmail.com', '0222333888', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 1, 'Hà Đông', NULL, NULL),
(4, 'Nguyễn Khai Báo', 'kh05@gmail.com', '0222333111', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 1, 'Hà Đông', NULL, NULL),
(5, 'Nguyễn Khử Khuẩn', 'kh06@gmail.com', '0222333222', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 1, 'Hà Nam', NULL, NULL),
(6, 'Nguyễn Không Tụ Tập', 'kh07@gmail.com', '0222333444', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 2, 'Hà Bắc', NULL, NULL),
(7, 'Mai Âm Nhạc', 'kh08@gmail.com', '0222333555', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 2, 'Hà Tĩnh', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(137, '2014_10_12_000000_create_users_table', 1),
(138, '2014_10_12_100000_create_password_resets_table', 1),
(139, '2019_08_19_000000_create_failed_jobs_table', 1),
(140, '2021_05_11_134531_add_column_deleted_at_table_users', 1),
(141, '2021_05_14_055309_create_categories_table', 1),
(142, '2021_05_15_153040_create_products_table', 1),
(143, '2021_05_18_130547_create_customers_table', 1),
(144, '2021_05_21_020453_create_ships_table', 1),
(145, '2021_05_22_060205_create_orders_table', 1),
(146, '2021_05_22_060310_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaHoaDon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_id` bigint(20) UNSIGNED NOT NULL,
  `ships_id` bigint(20) UNSIGNED NOT NULL,
  `TenNguoiNhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChiNhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `MaHoaDon`, `customers_id`, `ships_id`, `TenNguoiNhan`, `DiaChiNhan`, `DienThoai`, `TrangThai`, `created_at`, `updated_at`) VALUES
(1, 'HD06', 3, 2, 'Dao Hai', 'thanh trì hà nội', '123456854', 1, '2021-05-23 06:56:04', '2020-05-24 08:10:42'),
(2, 'HD01', 2, 3, 'Dao Hai', 'thanh trì hà nội', '123456854', 1, '2021-05-18 20:11:19', '2021-05-23 06:56:04'),
(3, 'HD02', 2, 2, 'Dao Hai', 'thanh trì nghệ an', '123456854', 1, '2021-05-18 20:11:19', '2021-05-22 17:00:00'),
(4, 'HD03', 2, 1, 'Dao Hai', 'thanh trì hà nội', '123456854', 2, '2021-05-18 20:11:19', '2021-05-23 06:56:04'),
(5, 'HD04', 4, 2, 'Dao Hai', 'thanh trì hà nội', '123456854', 2, '2021-05-18 20:11:19', '2021-05-23 06:56:32'),
(6, 'HD05', 2, 4, 'Dao Hai', 'thanh trì hà nội', '123456854', 2, '2021-05-18 20:11:19', '2021-05-24 08:10:55'),
(7, 'HD07', 4, 2, 'Dao Hai', 'thanh trì hà nội', '123456854', 0, '2021-05-23 06:56:04', NULL),
(8, 'HD08', 5, 2, 'Dao Hai', 'thanh trì hà nội', '123456854', 0, '2021-05-23 06:56:04', NULL),
(9, 'HD09', 2, 3, 'Dao Hai', 'thanh trì nghệ an', '123456854', 2, '2021-05-23 06:56:04', '2021-05-24 16:54:27'),
(10, 'HD010', 2, 4, 'Dao Hai', 'thanh trì thanh hóa', '123456854', 1, '2021-05-23 06:56:04', '2021-05-24 16:54:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `products_id`, `orders_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3, NULL, NULL),
(2, 3, 3, 2, NULL, NULL),
(3, 3, 4, 2, NULL, NULL),
(4, 1, 1, 4, NULL, NULL),
(5, 3, 3, 5, NULL, NULL);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `slug`, `image`, `price`, `state`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 'iphonn 8 plus like new', 'sp01', 'iphonn-8-plus-like-new', 'iphonn-8-plus-like-new.PNG', '1500000.00', 1, 6, '2021-05-18 20:11:19', '2021-05-18 20:16:32'),
(2, 'iphone 8 new', 'sp02', 'iphone-8-new', 'iphone-8-new.jpg', '2500000.00', 1, 4, '2021-05-18 20:15:18', '2021-05-18 20:15:18'),
(3, 'Acer gaming', 'sp03', 'acer-gaming', 'acer-gaming.jpg', '1500000.00', 0, 9, '2021-05-18 20:16:01', '2021-05-18 20:16:01'),
(4, 'tai nghe sony', 'sp04', 'tai-nghe-sony', 'tai-nghe-sony.jpg', '1500000.00', 0, 3, '2021-05-18 20:17:14', '2021-05-18 20:17:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ships`
--

CREATE TABLE `ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenTing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ships`
--

INSERT INTO `ships` (`id`, `tenTing`, `gia`) VALUES
(1, 'Các Tỉnh Khác', 40000),
(2, 'hà nội', 20000),
(3, 'Hải Phòng', 30000),
(4, 'Hồ Chí Minh', 25000),
(5, 'Hưng Yên', 35000),
(7, 'Nghệ An', 30000),
(8, 'Thanh Hóa', 35000),
(9, 'Tuyên Quang', 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0395954444',
  `level` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `address`, `email`, `phone`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ha noi', 'admin@gmail.com', '0222555444', 2, NULL, NULL, NULL),
(2, 'đào văn hải', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'số nhà 17 ngõ 15', 'daovhai0110@gmail.com', '0979133267', 2, '2021-05-18 20:19:02', '2021-05-22 01:43:34', '2021-05-22 01:43:34'),
(3, 'nhân viên 01', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ho chi minh', 'nv01@gmail.com', '0979133267', 1, '2021-05-18 20:19:41', '2021-05-22 01:44:33', '2021-05-22 01:44:33'),
(4, 'nhân viên 02', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ho chi minh', 'nv02@gmail.com', '0979133267', 1, '2021-05-18 20:20:12', '2021-05-18 20:20:39', '2021-05-18 20:20:39'),
(5, 'nhân viên 03', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ho chi minh', 'nv03@gmail.com', '0979133267', 1, '2021-05-18 20:21:23', '2021-05-22 01:43:43', '2021-05-22 01:43:43'),
(6, 'nhân viên 04', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ha tinh', 'nv04@gmail.com', '0979133225', 1, '2021-05-18 20:21:48', '2021-05-22 01:43:30', '2021-05-22 01:43:30');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customers_id_foreign` (`customers_id`),
  ADD KEY `orders_ships_id_foreign` (`ships_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_products_id_foreign` (`products_id`),
  ADD KEY `order_details_orders_id_foreign` (`orders_id`);

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
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_categories_id_foreign` (`categories_id`);

--
-- Chỉ mục cho bảng `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ships`
--
ALTER TABLE `ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ships_id_foreign` FOREIGN KEY (`ships_id`) REFERENCES `ships` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
