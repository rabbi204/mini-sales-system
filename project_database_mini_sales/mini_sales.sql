-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 10:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'admin@gmail.com', '2022-02-13 11:17:37', '$2a$10$IdrT9EZ2NgbRXKiTj9iYHuGhJNtSL64723XljgOnBvm6oEOm8lcYW', 'J1nIyZEqfkt4qXvUfdigHqcplCSAsfiJyBwQ80dsqd0XGNpaOdN3MOGIDp3q', NULL, '202202141726DSC_0763.jpg', '2022-02-13 11:17:38', '2022-02-14 11:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_bn`, `brand_slug_en`, `brand_slug_bn`, `brand_image`, `created_at`, `updated_at`) VALUES
(10, 'Apple', 'অ্যাপল', 'apple', 'অ্যাপল', 'upload/brand/1725014946518111.png', NULL, NULL),
(11, 'Samsung', 'সামস্যাং', 'samsung', 'সামস্যাং', 'upload/brand/1725014976900928.png', NULL, NULL),
(12, 'vivo', 'ভিভো', 'vivo', 'ভিভো', 'upload/brand/1725015011364342.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_bn`, `category_slug_en`, `category_slug_bn`, `category_icon`, `created_at`, `updated_at`) VALUES
(7, 'Fashion', 'ফ্যাশন', 'fashion', NULL, 'fa fa-paw', '2022-02-19 13:01:24', '2022-02-20 13:34:04'),
(8, 'Electronics', 'ইলেকট্রনিক্স', 'electronics', NULL, 'fa fa-user', '2022-02-19 13:04:04', '2022-02-19 13:04:04'),
(9, 'Sweet Home', 'সুইট হোম', 'sweet-home', NULL, 'fa fa-shopping-cart', '2022-02-19 13:05:07', '2022-02-19 13:05:07'),
(10, 'Appliances', 'আপ্পলিয়েন্সেস', 'appliances', NULL, 'fa fa-shopping-bag', '2022-02-19 13:06:00', '2022-02-20 13:32:43'),
(11, 'Beauty', 'বিউটি', 'beauty', NULL, 'fa fa-laptop', '2022-02-19 13:06:49', '2022-02-20 13:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_13_162633_create_sessions_table', 1),
(7, '2022_02_13_170536_create_admins_table', 2),
(8, '2022_02_16_172140_create_brands_table', 3),
(10, '2022_02_17_172838_create_categories_table', 4),
(13, '2022_02_19_055206_create_sub_categories_table', 5),
(14, '2022_02_19_091811_create_sub_sub_categories_table', 6),
(15, '2022_02_19_160511_create_products_table', 7),
(16, '2022_02_19_163424_create_multi_imgs_table', 8),
(17, '2022_02_20_152221_create_sliders_table', 9),
(18, '2022_02_22_175337_create_wishlists_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/products/multi-image/1725266875841934.jpeg', '2022-02-20 01:38:28', NULL),
(2, 2, 'upload/products/multi-image/1725267335414263.jpeg', '2022-02-20 01:45:46', NULL),
(3, 2, 'upload/products/multi-image/1725267335630588.jpeg', '2022-02-20 01:45:47', NULL),
(4, 2, 'upload/products/multi-image/1725267335887278.jpeg', '2022-02-20 01:45:47', NULL),
(5, 2, 'upload/products/multi-image/1725267336062866.jpeg', '2022-02-20 01:45:47', NULL),
(6, 3, 'upload/products/multi-image/1725267788160342.jpeg', '2022-02-20 01:52:58', NULL),
(7, 3, 'upload/products/multi-image/1725267788350795.jpeg', '2022-02-20 01:52:58', NULL),
(8, 3, 'upload/products/multi-image/1725267788537247.jpeg', '2022-02-20 01:52:59', NULL),
(9, 3, 'upload/products/multi-image/1725267788774276.jpeg', '2022-02-20 01:52:59', NULL),
(10, 4, 'upload/products/multi-image/1725284860583577.png', '2022-02-20 02:15:43', '2022-02-20 06:24:20'),
(11, 4, 'upload/products/multi-image/1725269219913492.png', '2022-02-20 02:15:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_offer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_deals` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `selling_price`, `discount_price`, `short_desc_en`, `short_desc_bn`, `long_desc_en`, `long_desc_bn`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 7, 9, 15, 'My Life My Rules Dizain Cotton half Sleeve T Shirt For Men', 'মাই লাইফ মাই রুলস ডিজাইন কটন হাফ হাতা টি শার্ট পুরুষদের জন্য', 'my-life-my-rules-dizain-cotton-half-sleeve-t-shirt-for-men', 'mai-laif-mai-ruls-dijain-ktn-haf-hata-ti-sart-purushder-jnz', '101', '200', 'round neck', 'রাউন্ড নেক', 'SM', 'ছোট', 'Red,Green,Blue', 'লাল ,নীল,আকাশি', '700', '500', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies,', '<p>Nunc at molestie nulla. Vivamus magna lorem, egestas ac neque vitae, porta sagittis ipsum. Morbi porttitor convallis turpis, non maximus nisl maximus nec. Phasellus maximus fermentum mi sit amet imperdiet. Donec feugiat sed dolor a pharetra. Cras hendrerit sapien nec eros vulputate scelerisque. Phasellus commodo lacus enim, id imperdiet ligula semper a. In commodo nunc ligula, et convallis orci facilisis ut. Aenean sit amet eros ut lacus sodales ullamcorper nec sed tellus.</p>', '<p>Nunc at molestie nulla. Vivamus magna lorem, egestas ac neque vitae, porta sagittis ipsum. Morbi porttitor convallis turpis, non maximus nisl maximus nec. Phasellus maximus fermentum mi sit amet imperdiet. Donec feugiat sed dolor a pharetra. Cras hendrerit sapien nec eros vulputate scelerisque. Phasellus commodo lacus enim, id imperdiet ligula semper a. In commodo nunc ligula, et convallis orci facilisis ut. Aenean sit amet eros ut lacus sodales ullamcorper nec sed tellus.</p>', 'upload/products/thambnail/1725266875061331.jpeg', '1', '1', NULL, NULL, '1', '2022-02-20 04:10:00', '2022-02-20 10:23:14'),
(2, 10, 7, 9, 15, 'Exclusive 100% Cotton Half Sleeve T Shirt For Men New', 'এক্সক্লুসিভ ১০০% কটন হাফ স্লীভ টি শার্ট ফর মেন্ নিউ', 'exclusive-100-cotton-half-sleeve-t-shirt-for-men-new', 'eksklusiv-100-ktn-haf-sleev-ti-sart-fr-men-niu', '102', '150', 'round neck', 'রাউন্ড নেক', 'SM,M,L', 'ছোট  ,মাঝারি,বড়', 'Red,Green,Blue', 'লাল,নীল ,ব্লু', '700', '600', 'Lorem ipsum dolor sit amet, consect frings est efficitur nec volutpat ornare erat at varius. Phasellus convallis turpis a enim feugiat volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies, purus est efficitur nisi, vel pellentesque purus massa id neque. Cras eu placerat quam. Integer varius augue ac nunc tincidunt ultrices. Donec volutpat ornare erat at varius. Phasellus convallis turpis a enim feugiat volutpat. Fusce elit tortor, lobortis eget justo sit amet, molestie cursus justo. Donec porta odio vitae laoreet ultrices. Nullam eu leo feugiat, blandit tellus imperdiet, scelerisque arcu. Morbi sit amet odio a sem iaculis ornare.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies, purus est efficitur nisi, vel pellentesque purus massa id neque. Cras eu placerat quam. Integer varius augue ac nunc tincidunt ultrices. Donec volutpat ornare erat at varius. Phasellus convallis turpis a enim feugiat volutpat. Fusce elit tortor, lobortis eget justo sit amet, molestie cursus justo. Donec porta odio vitae laoreet ultrices. Nullam eu leo feugiat, blandit tellus imperdiet, scelerisque arcu. Morbi sit amet odio a sem iaculis ornare.d aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies, purus est efficitur nisi, vel pellentesque purus massa id neque. Cras eu placerat quam. Integer varius augue ac nunc tincidunt ultrices. Donec volutpat ornare erat at varius. Phasellus convallis turpis a enim feugiat volutpat. Fusce elit tortor, lobortis eget justo sit amet, molestie cursus justo. Donec porta odio vitae laoreet ultrices. Nullam eu leo feugiat, blandit tellus imperdiet, scelerisque arcu. Morbi sit amet odio a sem iaculis ornare.</p>', 'upload/products/thambnail/1725267334917958.jpeg', '1', NULL, NULL, '1', '1', '2022-02-21 02:53:03', '2022-02-21 02:53:03'),
(3, 11, 7, 9, 15, 'casual printed jersey T shirt for Man', 'পুরুষদের জন্য ক্যাজুয়াল প্রিন্টেড জার্সি টি-শার্ট', 'casual-printed-jersey-t-shirt-for-man', 'purushder-jnz-kzajuzal-printed-jarsi-ti-sart', '103', '125', 'Round neck', 'রাউন্ড নেক', 'SM,M,L', 'ছোট ,বড় ,মাজারি', 'Red,Green,Yellow,Blue', 'লাল ,নীল,হলুদ', '500', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies, purus est efficitur nisi, vel pellentesque purus massa id neque. Cras eu placerat quam. Integer varius augue ac nunc tincidunt ultrices. Donec volutpat ornare erat at varius. Phasellus convallis turpis a enim feugiat volutpat. Fusce elit tortor, lobortis eget justo sit amet, molestie cursus justo. Donec porta odio vitae laoreet ultrices. Nullam eu leo feugiat, blandit tellus imperdiet, scelerisque arcu. Morbi sit amet odio a sem iaculis ornare.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla venenatis fringilla arcu quis facilisis. Vestibulum id aliquet eros, vitae dictum magna. Maecenas viverra, nibh eu vehicula ultricies, purus est efficitur nisi, vel pellentesque purus massa id neque. Cras eu placerat quam. Integer varius augue ac nunc tincidunt ultrices. Donec volutpat ornare erat at varius. Phasellus convallis turpis a enim feugiat volutpat. Fusce elit tortor, lobortis eget justo sit amet, molestie cursus justo. Donec porta odio vitae laoreet ultrices. Nullam eu leo feugiat, blandit tellus imperdiet, scelerisque arcu. Morbi sit amet odio a sem iaculis ornare.</p>', 'upload/products/thambnail/1725267787393152.jpeg', NULL, '1', '1', NULL, '1', '2022-02-21 03:57:35', '2022-02-21 03:57:35'),
(4, 12, 8, 20, 34, 'A.tech V-100 Back Light Multimedia Gaming Keyboard - Black', 'এ.টেক ভি-১০০ ব্যাক লাইট মাল্টিমিডিয়া গেমিং কীবোর্ড - ব্ল্যাক', 'atech-v-100-back-light-multimedia-gaming-keyboard-black', 'etek-vi-100-bzak-lait-maltimidiya-geming-keebord-blzak', '104', '100', 'back light', 'ব্যাক লাইট', 'L,sm', 'বড়,ছোট', 'black,red', 'ব্ল্যাক,লাল', '1400', '999', 'XBlaster style showing personality charm and colorful lights install in the front-side. Easy to operate the multimedia keys for media player, homepage, volume adjustment. And key life up-to 10 million times', 'XBlaster শৈলী ব্যক্তিত্বের কবজ দেখাচ্ছে এবং সামনের দিকে রঙিন আলো ইনস্টল করা হয়েছে।', '<p>XBlaster style showing personality charm and colorful lights install in the front-side. Easy to operate the multimedia keys for media player, homepage, volume adjustment. And key life up-to 10 million times</p>', '<p>XBlaster শৈলী ব্যক্তিত্বের কবজ দেখাচ্ছে এবং সামনের দিকে রঙিন আলো ইনস্টল করা হয়েছে। মিডিয়া প্লেয়ার, হোমপেজ, ভলিউম সমন্বয়ের জন্য মাল্টিমিডিয়া কীগুলি পরিচালনা করা সহজ। এবং মূল জীবন 10 মিলিয়ন বার পর্যন্ত</p>', 'upload/products/thambnail/1725286420707744.png', NULL, '1', '1', '1', '1', '2022-02-21 07:44:36', '2022-02-21 07:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VLTHknK501YWyIwhA5T1uZkEGvKv4LfxcicD3GMD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo4OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teWNhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiS0llSTlyaFAxaU1PRExFa0NuZGNValo1YTNqb0psY0MwUjVRaGIyWCI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR4SExWbmFYREZtbWtaLlJ2ZURDVmNlT0d0LkJZWmcyay9SZ0N0S0FDOWMuWTdsaW1qTy5ncSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkeEhMVm5hWERGbW1rWi5SdmVEQ1ZjZU9HdC5CWVpnMmsvUmdDdEtBQzljLlk3bGltak8uZ3EiO3M6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6ImRjYjliYzkxZWI3MWFiOTI0NDIyZTMzYTM5ZTg1ZjE3IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6MTE6e3M6NToicm93SWQiO3M6MzI6ImRjYjliYzkxZWI3MWFiOTI0NDIyZTMzYTM5ZTg1ZjE3IjtzOjI6ImlkIjtzOjE6IjEiO3M6MzoicXR5IjtpOjI7czo0OiJuYW1lIjtzOjU4OiJNeSBMaWZlIE15IFJ1bGVzIERpemFpbiBDb3R0b24gaGFsZiBTbGVldmUgVCBTaGlydCBGb3IgTWVuIjtzOjU6InByaWNlIjtkOjUwMDtzOjY6IndlaWdodCI7ZDoxO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjM6e3M6NToiaW1hZ2UiO3M6NDc6InVwbG9hZC9wcm9kdWN0cy90aGFtYm5haWwvMTcyNTI2Njg3NTA2MTMzMS5qcGVnIjtzOjU6ImNvbG9yIjtzOjM6IlJlZCI7czo0OiJzaXplIjtzOjI6IlNNIjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjc6InRheFJhdGUiO2k6MDtzOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtOO3M6NDY6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBkaXNjb3VudFJhdGUiO2k6MDtzOjg6Imluc3RhbmNlIjtzOjc6ImRlZmF1bHQiO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1645564775);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_desc_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `slider_title_en`, `slider_title_bn`, `slider_desc_en`, `slider_desc_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1725301128028260.jpg', 'a slide that is intended to feature text-heavy content', 'একটি স্লাইড যা টেক্সট-ভারী বিষয়বস্তু ফিচার করার উদ্দেশ্যে', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in arcu porttitor, aliquam lacus sed, suscipit tellus. Duis aliquet congue sapien', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in arcu porttitor, aliquam lacus sed, suscipit tellus. Duis aliquet congue sapien', 1, '2022-02-20 09:55:58', '2022-02-20 10:57:20'),
(3, 'upload/slider/1725302089616425.jpg', 'Duis congue diam et auctor elementum.', 'Duis congue diam et auctor elementum.', 'Phasellus ut felis pulvinar, porttitor neque ac, faucibus libero. Donec dapibus quam in arcu posuere volutpat. Aenean fringilla sollicitudin ultricies', 'Phasellus ut felis pulvinar, porttitor neque ac, faucibus libero. Donec dapibus quam in arcu posuere volutpat. Aenean fringilla sollicitudin ultricies', 0, '2022-02-20 10:58:11', '2022-02-20 13:57:45'),
(4, 'upload/slider/1725313379548683.jpg', 'test', 'টেস্ট', 'test', 'টেস্ট', 1, '2022-02-20 13:57:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_bn`, `subcategory_slug_en`, `subcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(9, 7, 'Mans Top Ware', 'ম্যান্স টপ ওয়্যার', 'mans-top-ware', 'mzans-tp-wzar', '2022-02-19 13:12:43', '2022-02-19 13:12:43'),
(15, 7, 'Mans Bottom Ware', 'ম্যান্স বটম ওয়ার', 'mans-bottom-ware', 'mzans-btm-war', '2022-02-19 13:20:26', '2022-02-19 13:20:26'),
(16, 7, 'Mans Footwear', 'ম্যান্স ফুটওয়ার', 'mans-footwear', 'mzans-futwar', '2022-02-19 13:21:02', '2022-02-19 13:21:02'),
(17, 7, 'Women Footwear', 'ওমেন ফুটওয়ার', 'women-footwear', 'oomen-futwar', '2022-02-19 13:21:27', '2022-02-19 13:21:27'),
(18, 8, 'Computer Peripherals', 'কম্পিউটার পেরিফেরালস', 'computer-peripherals', 'kmpiutar-periferals', '2022-02-19 13:22:28', '2022-02-19 13:22:28'),
(19, 8, 'Mobile Accessory', 'মোবাইল একসেসোরি', 'mobile-accessory', 'mobail-eksesori', '2022-02-19 13:22:46', '2022-02-19 13:22:46'),
(20, 8, 'Gaming', 'গেমিং', 'gaming', 'geming', '2022-02-19 13:23:03', '2022-02-19 13:23:03'),
(21, 9, 'Home Furnishings', 'হোম ফার্ণিসিংস', 'home-furnishings', 'hom-farnisings', '2022-02-19 13:23:31', '2022-02-19 13:23:31'),
(22, 9, 'Living Room', 'লিভিং রুম', 'living-room', 'living-rum', '2022-02-19 13:23:48', '2022-02-19 13:23:48'),
(23, 9, 'Home Decor', 'হোম ডেকোর', 'home-decor', 'hom-dekor', '2022-02-19 13:24:08', '2022-02-19 13:24:08'),
(24, 10, 'Televisions', 'টেলিভিশনস', 'televisions', 'telivisns', '2022-02-19 13:24:25', '2022-02-19 13:24:25'),
(25, 10, 'Washing Machines', 'ওয়াসিং মেশিন', 'washing-machines', 'wasing-mesin', '2022-02-19 13:25:02', '2022-02-19 13:25:02'),
(26, 10, 'Refrigerators', 'রেফ্রিজারেটর্স', 'refrigerators', 'refrijaretrs', '2022-02-19 13:25:43', '2022-02-19 13:25:43'),
(27, 11, 'Beauty and Personal Care', 'বিউটি এন্ড পার্সোনাল কেয়ার', 'beauty-and-personal-care', 'biuti-end-parsonal-keyar', '2022-02-19 13:26:20', '2022-02-19 13:26:20'),
(28, 11, 'Food and Drinks', 'ফুড এন্ড ড্রিংক্স', 'food-and-drinks', 'fud-end-dringks', '2022-02-19 13:26:38', '2022-02-19 13:26:38'),
(29, 11, 'Bady Care', 'বাডি কেয়ার', 'bady-care', 'badi-keyar', '2022-02-19 13:26:54', '2022-02-19 13:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsubcategory_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_bn`, `subsubcategory_slug_en`, `subsubcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(15, 7, 9, 'Mans Tshirt', 'মেন্স  টি-শার্ট', 'mans-tshirt', 'mens-ti-sart', '2022-02-19 13:29:30', '2022-02-19 13:29:30'),
(16, 7, 9, 'Mans Casual Shirts', 'মেন্স ক্যাজুয়াল শার্ট', 'mans-casual-shirts', 'mens-kzajuyal-sart', '2022-02-19 13:30:32', '2022-02-19 13:30:32'),
(17, 7, 9, 'Mens kurta', 'মেন্স কুর্তা', 'mens-kurta', 'mens-kurta', '2022-02-19 13:31:07', '2022-02-19 13:31:07'),
(18, 7, 15, 'Mans Jeans', 'মেন্স জিন্স', 'mans-jeans', 'mens-jins', '2022-02-19 13:32:23', '2022-02-19 13:32:23'),
(19, 7, 15, 'Mans Trousers', 'মেন্স ট্রাউজার্স', 'mans-trousers', 'mens-traujars', '2022-02-19 13:33:04', '2022-02-19 13:33:04'),
(20, 7, 15, 'Mans Cargos', 'মেন্স কার্গোস', 'mans-cargos', 'mens-kargos', '2022-02-19 13:33:27', '2022-02-19 13:33:27'),
(21, 7, 16, 'মেন্স স্পোর্টস সুজ', 'Mans Sports Shoes', 'mens-sports-suj', 'mans-sports-shoes', '2022-02-19 13:34:24', '2022-02-19 13:34:24'),
(22, 7, 16, 'Mans Casual Shoes', 'মেন্স ক্যাজুয়াল সুজ', 'mans-casual-shoes', 'mens-kzajuyal-suj', '2022-02-19 13:34:54', '2022-02-19 13:34:54'),
(23, 7, 16, 'Mans Formal Shoes', 'মেন্স ফর্মাল সুজ', 'mans-formal-shoes', 'mens-frmal-suj', '2022-02-19 13:35:27', '2022-02-19 13:35:27'),
(24, 7, 17, 'Women Flats', 'ওমেন ফ্লাটস', 'women-flats', 'oomen-flats', '2022-02-19 13:36:03', '2022-02-19 13:36:03'),
(25, 7, 17, 'Women Heels', 'ওমেন হিল্স', 'women-heels', 'oomen-hils', '2022-02-19 13:36:22', '2022-02-19 13:36:22'),
(26, 7, 17, 'Woman Sheakers', 'ওমেন সিকার্স', 'woman-sheakers', 'oomen-sikars', '2022-02-19 13:36:56', '2022-02-19 13:36:56'),
(27, 8, 18, 'Printers', 'প্রিন্টার্স', 'printers', 'printars', '2022-02-19 13:37:32', '2022-02-19 13:37:32'),
(28, 8, 18, 'Monitors', 'মনিটরস', 'monitors', 'mnitrs', '2022-02-19 13:37:51', '2022-02-19 13:37:51'),
(29, 8, 18, 'Projectors', 'প্রজেক্টর্স', 'projectors', 'prjektrs', '2022-02-19 13:38:11', '2022-02-19 13:38:11'),
(30, 8, 19, 'Plain Cases', 'প্লেইন কেজেস', 'plain-cases', 'plein-kejes', '2022-02-19 13:39:00', '2022-02-19 13:39:00'),
(31, 8, 19, 'Designer Cases', 'ডিসাইনার কেজেস', 'designer-cases', 'disainar-kejes', '2022-02-19 13:40:05', '2022-02-19 13:40:05'),
(32, 8, 19, 'Screen Guards', 'স্ক্রিন গার্ডস', 'screen-guards', 'skrin-gards', '2022-02-19 13:40:29', '2022-02-19 13:40:29'),
(33, 8, 19, 'Gaming Mouse', 'গেমিং মাউস', 'gaming-mouse', 'geming-maus', '2022-02-19 13:40:48', '2022-02-19 13:40:48'),
(34, 8, 20, 'Gaming Keyboard', 'গেমিং কীবোর্ড', 'gaming-keyboard', 'geming-keebord', '2022-02-19 13:41:18', '2022-02-21 07:15:56'),
(35, 8, 20, 'Gaming Mousepads', 'গেমিং মাইসপ্যাড', 'gaming-mousepads', 'geming-maispzad', '2022-02-19 13:42:14', '2022-02-19 13:42:14'),
(36, 9, 21, 'Bed Liners', 'বেড লিনেরস', 'bed-liners', 'bed-liners', '2022-02-19 13:42:42', '2022-02-19 13:42:42'),
(37, 9, 21, 'Bedsheets', 'বেডশীটস', 'bedsheets', 'bedseets', '2022-02-19 13:43:02', '2022-02-19 13:43:02'),
(38, 9, 21, 'Blankets', 'ব্লাঙ্কেটস', 'blankets', 'blankets', '2022-02-19 13:43:23', '2022-02-19 13:43:23'),
(39, 9, 22, 'Tv Units', 'টিভি উনিটস', 'tv-units', 'tivi-units', '2022-02-19 13:43:48', '2022-02-19 13:43:48'),
(40, 9, 22, 'Dining Sets', 'ডাইনিং সেট্স', 'dining-sets', 'daining-sets', '2022-02-19 13:44:06', '2022-02-19 13:44:06'),
(41, 9, 22, 'Coffee Tables', 'কফি টেবিল', 'coffee-tables', 'kfi-tebil', '2022-02-19 13:44:44', '2022-02-19 13:44:44'),
(42, 9, 22, 'Lightings', 'লাইটিংস', 'lightings', 'laitings', '2022-02-19 13:45:08', '2022-02-19 13:45:08'),
(43, 9, 22, 'Clocks', 'ক্লোক', 'clocks', 'klok', '2022-02-19 13:45:30', '2022-02-19 13:45:30'),
(44, 9, 22, 'Wall Decor', 'ওয়াল ডেকোর', 'wall-decor', 'wal-dekor', '2022-02-19 13:45:47', '2022-02-19 13:45:47'),
(45, 10, 24, 'Big Screen TVs', 'বিগ স্ক্রিন টিভি', 'big-screen-tvs', 'big-skrin-tivi', '2022-02-19 13:46:14', '2022-02-19 13:46:14'),
(46, 10, 24, 'Smart TV', 'স্মার্ট টিভি', 'smart-tv', 'smart-tivi', '2022-02-19 13:46:31', '2022-02-19 13:46:31'),
(47, 10, 24, 'OLED TV', 'ওলেড টিভি', 'oled-tv', 'ooled-tivi', '2022-02-19 13:46:47', '2022-02-19 13:46:47'),
(48, 10, 25, 'Washer Dryers', 'ওয়াশার ড্রয়ার্স', 'washer-dryers', 'wasar-dryars', '2022-02-19 13:47:27', '2022-02-19 13:47:27'),
(49, 10, 25, 'Washer Only', 'ওয়াশার অনলি', 'washer-only', 'wasar-onli', '2022-02-19 13:47:45', '2022-02-19 13:47:45'),
(50, 10, 25, 'Energy Efficient', 'এনার্জি এফিসিয়েন্ট', 'energy-efficient', 'enarji-efisiyent', '2022-02-19 13:48:00', '2022-02-19 13:48:00'),
(51, 10, 26, 'Single Door', 'সিঙ্গেল ডোর', 'single-door', 'singoel-dor', '2022-02-19 13:48:24', '2022-02-19 13:48:24'),
(52, 10, 26, 'Double Door', 'ডাবল ডোর', 'double-door', 'dabl-dor', '2022-02-19 13:48:46', '2022-02-19 13:48:46'),
(53, 10, 26, 'Mini Rerigerators', 'মিনি রেফ্রিজারেটর', 'mini-rerigerators', 'mini-refrijaretr', '2022-02-19 13:49:24', '2022-02-19 13:49:24'),
(54, 11, 27, 'Eye makeup', 'আই মেকআপ', 'eye-makeup', 'ai-mekap', '2022-02-19 13:50:27', '2022-02-19 13:50:27'),
(55, 11, 27, 'Lip Makeup', 'লিপ মেকআপ', 'lip-makeup', 'lip-mekap', '2022-02-19 13:51:11', '2022-02-19 13:51:11'),
(56, 11, 27, 'Hair Care', 'হেয়ার কেয়ার', 'hair-care', 'heyar-keyar', '2022-02-19 13:51:29', '2022-02-19 13:51:29'),
(57, 11, 28, 'Beverages', 'বেভারেজেস', 'beverages', 'bevarejes', '2022-02-19 13:51:56', '2022-02-19 13:51:56'),
(58, 11, 28, 'Chocolates', 'চকোলেটস', 'chocolates', 'ckolets', '2022-02-19 13:52:15', '2022-02-19 13:52:15'),
(59, 11, 28, 'Snacks', 'স্নাক্স', 'snacks', 'snaks', '2022-02-19 13:52:36', '2022-02-19 13:52:36'),
(60, 11, 29, 'Baby Diapers', 'বেবি ডায়াপার', 'baby-diapers', 'bebi-dayapar', '2022-02-19 13:53:11', '2022-02-19 13:53:11'),
(61, 11, 29, 'Baby Wipes', 'বেবি ওয়াইপ্স', 'baby-wipes', 'bebi-waips', '2022-02-19 13:53:51', '2022-02-19 13:53:51'),
(62, 11, 29, 'Baby Food', 'বেবি ফুড', 'baby-food', 'bebi-fud', '2022-02-19 13:54:14', '2022-02-19 13:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '0176386212955', 'Uttara', NULL, '$2y$10$xHLVnaXDFmmkZ.RveDCVceOGt.BYZg2k/RgCtKAC9c.Y7limjO.gq', NULL, NULL, 'ORLowsWGMWd3fj8kEGJqJXFgoHT1shCpivm3n9zIgviRYtdSkpMLcGDARYG1', NULL, '202202221839images.png', '2022-02-13 10:42:25', '2022-02-22 12:39:38'),
(2, 'Md. Rabbi (Ziauddin)', 'md.rabbi.web@gmail.com', '01729673492', 'House-239/40, Mirpur-2, Dhaka, Bangladesh', NULL, '$2y$10$xHLVnaXDFmmkZ.RveDCVceOGt.BYZg2k/RgCtKAC9c.Y7limjO.gq', NULL, NULL, NULL, NULL, '202202161137DSC_0763.jpg', '2022-02-16 01:50:39', '2022-02-16 10:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2022-02-22 12:33:37', NULL),
(2, 2, 3, '2022-02-22 12:33:39', NULL),
(3, 2, 3, '2022-02-22 12:33:47', NULL),
(4, 2, 1, '2022-02-22 12:35:20', NULL),
(7, 1, 1, '2022-02-22 13:31:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
