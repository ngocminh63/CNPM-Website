-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2021 lúc 06:23 AM
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LAPTOP', 0, 'laptop', '2021-05-13 23:22:30', '2021-05-13 23:22:30', NULL),
(2, 'ASUS', 1, 'asus', '2021-05-13 23:28:38', '2021-05-13 23:29:57', NULL),
(3, 'ASUS Gaming', 2, 'asus-gaming', '2021-05-13 23:31:58', '2021-05-13 23:31:58', NULL),
(4, 'đào văn hải', 3, 'dao-van-hai', '2021-05-13 23:33:19', '2021-05-13 23:33:54', '2021-05-13 23:33:54'),
(5, 'đào văn hải', 0, 'dao-van-hai', '2021-05-13 23:34:49', '2021-05-13 23:34:55', '2021-05-13 23:34:55'),
(6, 'ĐIỆN THOẠI', 0, 'dien-thoai', '2021-05-13 23:36:01', '2021-05-13 23:36:01', NULL),
(7, 'OPPO', 6, 'oppo', '2021-05-13 23:36:15', '2021-05-13 23:36:15', NULL),
(8, 'IPHONE', 6, 'iphone', '2021-05-13 23:36:30', '2021-05-13 23:36:30', NULL),
(9, 'IPHONE 6s', 8, 'iphone-6s', '2021-05-13 23:38:06', '2021-05-13 23:38:06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_11_134531_add_column_deleted_at_table_users', 2),
(5, '2021_05_14_055309_create_categories_table', 3),
(6, '2021_05_14_062445_add_column_deleted_at_table_categories', 4),
(7, '2021_05_15_153040_create_products_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(10, 'IPHONE 8s', 'sp0144', 'iphone-8s', 'iphone-8s.jpg', '134566355.00', 0, 8, '2021-05-15 11:09:02', '2021-05-15 20:32:18'),
(11, 'grbb', 'sac', 'grbb', 'grbb.jpg', '1500000000.00', 1, 3, '2021-05-15 20:33:18', '2021-05-15 20:33:18'),
(12, 'đào văn hải', '3M8SUW7', 'dao-van-hai', 'dao-van-hai.jpg', '1500000.00', 0, 7, '2021-05-15 20:37:25', '2021-05-15 20:37:25'),
(13, 'đào văn hải', 'XWRIAPJ', 'dao-van-hai', 'dao-van-hai.PNG', '1500000.00', 1, 3, '2021-05-15 20:41:54', '2021-05-15 20:41:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0395954444',
  `level` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `address`, `email`, `phone`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', NULL, 'admin@gmail.com', '0395954444', 2, NULL, NULL, NULL),
(2, 'NV01', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Hà Nội', 'nv01@gmail.com', '0395954444', 1, NULL, NULL, NULL),
(3, 'NV02', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Hồ Chí Minh', 'nv02@gmail.com', '0395954444', 1, NULL, NULL, NULL),
(4, 'NV03', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Nghệ An', 'nv03@gmail.com', '0395954444', 1, NULL, NULL, NULL),
(5, 'Admin02', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Hà Nội', 'admin02@gmail.com', '0395954444', 2, NULL, NULL, NULL),
(6, 'Admin03', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Hà Nội', 'admin03@gmail.com', '0395954444', 2, NULL, NULL, NULL),
(7, 'NV04', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Hà Nội', 'nv04@gmail.com', '0395954444', 1, NULL, NULL, NULL),
(8, 'NV05', '$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'Hà Nội', 'nv05@gmail.com', '0395954444', 1, NULL, NULL, NULL),
(9, 'đào văn hải2', '$2y$10$z/8hESBx.2U6tTs.SufRkePBTDKF7U3hXg/3X9bGDAF3O0dACFBXW', 'số nhà 17 ngõ 153', 'daovhai0@gmail.com', '0979133244', 1, '2021-05-10 20:15:37', '2021-05-11 06:47:59', '2021-05-11 06:47:59'),
(10, 'đào văn hải', '$2y$10$G5loCZc1Vnd3aDbCSfZEvuXdbkURi9q9MilKEfjuvpz8xDjEtyc/G', 'số nhà 17 ngõ 15', 'daovhai0110@gmail.com', '0979133267', 2, '2021-05-11 06:48:14', '2021-05-11 06:49:12', '2021-05-11 06:49:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
