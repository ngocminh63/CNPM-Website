-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 05, 2021 lúc 10:09 AM
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
(1, 'Điện Thoại', 0, 'dien-thoai', '2021-05-18 13:07:52', '2021-05-18 13:07:52'),
(2, 'LapTop', 0, 'laptop', '2021-05-18 13:08:02', '2021-05-18 13:08:02'),
(3, 'Phụ Kiện', 0, 'phu-kien', '2021-05-18 13:08:15', '2021-05-18 13:08:15'),
(4, 'Iphone', 1, 'iphone', '2021-05-18 13:08:28', '2021-05-18 13:08:28'),
(5, 'OPPO', 1, 'oppo', '2021-05-18 13:08:43', '2021-05-18 13:08:43'),
(6, 'Iphone 83', 4, 'iphone-83', '2021-05-18 13:08:57', '2021-05-24 01:04:21'),
(7, 'ASUS', 2, 'asus', '2021-05-18 13:09:17', '2021-05-18 13:09:17'),
(8, 'Iphone 8 Plus', 4, 'iphone-8-plus', '2021-05-18 13:09:37', '2021-05-18 13:09:37'),
(9, 'Acer 3', 2, 'acer-3', '2021-05-18 13:09:54', '2021-05-24 01:01:39'),
(10, 'Acer 33', 2, 'acer-33', '2021-05-24 01:02:05', '2021-05-24 01:02:05');

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
(1, 'đào văn hải', 'ad@gmail.com', '0979133267', '098f6bcd4621d373cade4e832627b4f6', 2, 'số nhà 17 ngõ 15', '2021-06-04 09:37:56', '2021-06-04 09:37:56'),
(2, 'đào văn hải', 'admin@gmail.com', '0979133267', '098f6bcd4621d373cade4e832627b4f6', 2, 'số nhà 17 ngõ 15', '2021-06-04 09:38:29', '2021-06-04 09:38:29');

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
(218, '2014_10_12_000000_create_users_table', 1),
(219, '2014_10_12_100000_create_password_resets_table', 1),
(220, '2019_08_19_000000_create_failed_jobs_table', 1),
(221, '2021_05_11_134531_add_column_deleted_at_table_users', 1),
(222, '2021_05_14_055309_create_categories_table', 1),
(223, '2021_05_15_153040_create_products_table', 1),
(224, '2021_05_21_020453_create_ships_table', 1),
(225, '2021_06_04_154855_create_customers_table', 1),
(226, '2021_06_04_155338_create_orders_table', 1),
(227, '2021_06_04_155614_create_order_details_table', 1);

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
(6, 'sản phẩm 01', 'sp01', 'san-pham-01', 'san-pham-01.jpg', '1500000.00', 1, 1, '2021-06-04 11:04:32', '2021-06-04 11:04:32'),
(7, 'sản phẩm 02', 'sp02', 'san-pham-02', 'san-pham-02.jpg', '2500000.00', 1, 1, '2021-06-04 11:04:56', '2021-06-04 11:04:56'),
(8, 'sản phẩm 03', 'sp03', 'san-pham-03', 'san-pham-03.jpg', '1500000.00', 1, 1, '2021-06-04 11:05:19', '2021-06-04 11:05:19'),
(9, 'sản phẩm 04', 'sp04', 'san-pham-04', 'san-pham-04.jpg', '2500000.00', 1, 1, '2021-06-04 11:05:44', '2021-06-04 11:05:44'),
(10, 'sản phẩm 05', 'sp05', 'san-pham-05', 'san-pham-05.jpg', '2500000.00', 1, 1, '2021-06-04 11:06:10', '2021-06-04 11:06:10'),
(11, 'sản phẩm 06', 'sp06', 'san-pham-06', 'san-pham-06.jpg', '1500000.00', 1, 1, '2021-06-04 11:06:33', '2021-06-04 11:06:33'),
(12, 'sản phẩm 07', 'sp07', 'san-pham-07', 'san-pham-07.jpg', '1500000.00', 1, 1, '2021-06-04 11:06:55', '2021-06-04 11:06:55'),
(13, 'sản phẩm 08', 'sp08', 'san-pham-08', 'san-pham-08.jpg', '2500000.00', 1, 1, '2021-06-04 11:07:19', '2021-06-04 11:07:19'),
(14, 'sản phẩm 09', 'sp09', 'san-pham-09', 'san-pham-09.jpg', '2500000.00', 1, 1, '2021-06-04 11:07:42', '2021-06-04 11:07:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_user`
--

CREATE TABLE `product_user` (
  `id_user` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'đào văn hải', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'số nhà 17 ngõ 15', 'daovhai0110@gmail.com', '0979133267', 2, '2021-05-18 13:19:02', '2021-05-21 18:43:34', '2021-05-21 18:43:34'),
(3, 'nhân viên 01', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ho chi minh', 'nv01@gmail.com', '0979133267', 1, '2021-05-18 13:19:41', '2021-05-21 18:44:33', '2021-05-21 18:44:33'),
(4, 'nhân viên 02', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ho chi minh', 'nv02@gmail.com', '0979133267', 1, '2021-05-18 13:20:12', '2021-05-18 13:20:39', '2021-05-18 13:20:39'),
(5, 'nhân viên 03', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ho chi minh', 'nv03@gmail.com', '0979133267', 1, '2021-05-18 13:21:23', '2021-05-21 18:43:43', '2021-05-21 18:43:43'),
(6, 'nhân viên 04', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'ha tinh', 'nv04@gmail.com', '0979133225', 1, '2021-05-18 13:21:48', '2021-05-21 18:43:30', '2021-05-21 18:43:30');

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
-- Chỉ mục cho bảng `product_user`
--
ALTER TABLE `product_user`
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_product` (`id_product`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
