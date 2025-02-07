-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 10:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rkn_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'محمد رياض', 'محمد-رياض', 1, '2023-10-23 21:27:04', '2023-10-23 21:27:04'),
(2, 'محمد أحمد', 'محمد-أحمد', 1, '2023-10-23 21:27:16', '2023-10-23 21:27:16'),
(3, 'سالم سعيد', 'سالم-سعيد', 1, '2023-10-23 21:27:32', '2023-10-23 21:27:32'),
(4, 'سالم بشر', 'سالم-بشر', 1, '2023-10-23 21:27:38', '2023-10-23 21:27:38'),
(5, 'قاسم سالم', 'قاسم-سالم', 1, '2023-10-23 21:27:48', '2023-10-23 21:27:48'),
(6, 'فأس رأس', 'فأس-رأس', 1, '2023-10-23 21:27:56', '2023-10-23 21:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `best_seller` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `publish_year` int(10) UNSIGNED DEFAULT NULL,
  `number_of_pages` int(10) UNSIGNED DEFAULT NULL,
  `number_of_copies` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `price` decimal(8,2) DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `best_seller`, `slug`, `isbn`, `description`, `publish_year`, `number_of_pages`, `number_of_copies`, `price`, `cover_image`, `created_at`, `updated_at`, `currency_id`, `user_id`) VALUES
(1, 'الكتاب الأول', 0, 'الكتاب-الأول-1', '3303030303', NULL, 2011, 229, 55, 1120.00, 'images/books/covers/1738694053-1.jpg', '2023-10-20 15:01:24', '2025-02-04 15:34:13', 1, 1),
(2, 'الكتاب الثاني', 1, 'الكتاب-الثاني-2', NULL, NULL, 2022, 44, 120, 1000.00, 'images/books/covers/1738694080-5.jpg', '2023-10-23 21:29:31', '2025-02-04 15:34:41', 1, 1),
(3, 'الكتاب الثالث', 1, 'الكتاب-الثالث-2', '100000000000000002', NULL, 2022, 1100, 33, 6000.00, 'images/books/covers/1738694110-4.jpg', '2023-10-23 21:31:30', '2025-02-04 15:35:10', 1, 1),
(4, 'الكتاب الخامص', 0, 'الكتاب-الخامص-1', '100000000002', NULL, NULL, NULL, 0, NULL, 'images/books/covers/1738694251-7.jpg', '2023-10-23 21:32:01', '2025-02-04 15:37:31', NULL, 1),
(5, 'الكتاب السادس', 0, 'الكتاب-السادس-1', '111111111122', NULL, 2023, 65, 250, 400.00, 'images/books/covers/1738694271-13.jpg', '2023-10-23 21:32:40', '2025-02-04 15:37:51', 1, 1),
(6, 'الكتاب الرابع', 1, 'الكتاب-الرابع-1', '2828288222', NULL, 2023, 1000, 22, 3200.00, 'images/books/covers/1738694291-2.jpg', '2023-10-23 21:34:00', '2025-02-04 15:38:11', 1, 1),
(7, 'الكتاب السابع', 0, 'الكتاب-السابع', '222222222222', NULL, 2000, 112, 0, NULL, 'images/books/covers/1698107680-IMG-20230724-WA0058.jpg', '2023-10-23 21:34:40', '2023-10-23 21:34:40', NULL, 1),
(8, 'الكتاب الثامن', 1, 'الكتاب-الثامن-1', '20202222222', NULL, NULL, NULL, 0, NULL, 'images/books/covers/1738963211-10.jpg', '2023-10-23 21:35:25', '2025-02-07 18:20:12', NULL, 1),
(9, 'الكتاب التاسع', 1, 'الكتاب-التاسع-1', '2992929222', NULL, 2000, NULL, 0, NULL, 'images/books/covers/1738963260-6.jpg', '2023-10-23 21:35:55', '2025-02-07 18:21:01', NULL, 1),
(10, 'الكتاب العاشر', 1, 'الكتاب-العاشر-1', '000000000000000000', NULL, 2022, 12, 0, 300.00, 'images/books/covers/1738963291-13.jpg', '2023-10-23 21:37:17', '2025-02-07 18:21:31', 1, 1),
(11, 'الكتاب الحادي عشر', 0, 'الكتاب-الحادي-عشر-1', '22222222222', NULL, NULL, NULL, 0, NULL, 'images/books/covers/1738963317-12.jpg', '2023-10-23 21:37:42', '2025-02-07 18:21:57', NULL, 1),
(12, 'الكتاب الثاني عشر', 0, 'الكتاب-الثاني-عشر-1', '1010101001010', NULL, NULL, NULL, 0, NULL, 'images/books/covers/1738963335-13.jpg', '2023-10-23 21:38:09', '2025-02-07 18:22:15', NULL, 1),
(13, 'الكتاب الثالث عشر', 0, 'الكتاب-الثالث-عشر-1', '2929292929292', NULL, NULL, NULL, 0, NULL, 'images/books/covers/1738963355-6.jpg', '2023-10-23 21:38:51', '2025-02-07 18:22:35', NULL, 1),
(14, 'كتاب جديد', 1, 'كتاب-جديد', '784156156', NULL, NULL, NULL, 0, NULL, 'images/books/covers/1738688905-4.jpg', '2025-02-04 14:08:25', '2025-02-04 14:08:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`id`, `created_at`, `updated_at`, `author_id`, `book_id`) VALUES
(16, NULL, NULL, 2, 7),
(17, NULL, NULL, 5, 7),
(31, NULL, NULL, 1, 14),
(38, NULL, NULL, 3, 1),
(39, NULL, NULL, 4, 1),
(40, NULL, NULL, 6, 1),
(41, NULL, NULL, 1, 2),
(42, NULL, NULL, 2, 2),
(43, NULL, NULL, 3, 2),
(44, NULL, NULL, 4, 2),
(45, NULL, NULL, 5, 2),
(46, NULL, NULL, 6, 2),
(47, NULL, NULL, 6, 3),
(48, NULL, NULL, 1, 4),
(49, NULL, NULL, 2, 4),
(50, NULL, NULL, 1, 5),
(51, NULL, NULL, 4, 6),
(52, NULL, NULL, 5, 6),
(53, NULL, NULL, 5, 8),
(54, NULL, NULL, 1, 9),
(55, NULL, NULL, 5, 9),
(56, NULL, NULL, 1, 10),
(57, NULL, NULL, 5, 10),
(58, NULL, NULL, 4, 11),
(59, NULL, NULL, 5, 12),
(60, NULL, NULL, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(18, 7, 4, NULL, NULL),
(19, 7, 2, NULL, NULL),
(34, 14, 4, NULL, NULL),
(35, 14, 3, NULL, NULL),
(40, 1, 1, NULL, NULL),
(41, 1, 3, NULL, NULL),
(42, 1, 5, NULL, NULL),
(43, 2, 2, NULL, NULL),
(44, 2, 3, NULL, NULL),
(45, 2, 4, NULL, NULL),
(46, 2, 5, NULL, NULL),
(47, 3, 3, NULL, NULL),
(48, 3, 5, NULL, NULL),
(49, 4, 2, NULL, NULL),
(50, 4, 3, NULL, NULL),
(51, 5, 2, NULL, NULL),
(52, 5, 3, NULL, NULL),
(53, 5, 5, NULL, NULL),
(54, 6, 1, NULL, NULL),
(55, 6, 3, NULL, NULL),
(56, 6, 5, NULL, NULL),
(57, 8, 3, NULL, NULL),
(58, 9, 3, NULL, NULL),
(59, 9, 5, NULL, NULL),
(60, 10, 1, NULL, NULL),
(61, 10, 3, NULL, NULL),
(62, 11, 5, NULL, NULL),
(63, 12, 4, NULL, NULL),
(64, 13, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_user`
--

CREATE TABLE `book_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_of_copies` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `bought` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_user`
--

INSERT INTO `book_user` (`id`, `number_of_copies`, `bought`, `created_at`, `updated_at`, `user_id`, `book_id`) VALUES
(13, 0, 0, NULL, NULL, 1, 10),
(15, 0, 0, NULL, NULL, 1, 8),
(17, 0, 0, NULL, NULL, 1, 4),
(18, 0, 0, NULL, NULL, 1, 3),
(19, 0, 0, NULL, NULL, 1, 2),
(20, 0, 0, NULL, NULL, 1, 12),
(21, 0, 0, NULL, NULL, 1, 13),
(22, 0, 0, NULL, NULL, 1, 9),
(23, 0, 0, NULL, NULL, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carousels_photo_path` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `carousels_photo_path`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'images/webinfo/carousel/1738693120-_116880077_147601485_1089108031608576_4257165343425909245_n-1.jpg', 1, '2025-02-04 15:18:41', '2025-02-04 15:18:41'),
(7, 'images/webinfo/carousel/1738693121-Hamad-bin-Jassim-Al-Thani-Mosque.jpg', 1, '2025-02-04 15:18:41', '2025-02-04 15:18:41'),
(8, 'images/webinfo/carousel/1738693121-photo0jpg.jpg', 1, '2025-02-04 15:18:41', '2025-02-04 15:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'روايات', 'روايات', NULL, 1, '2023-10-23 21:26:07', '2023-10-23 21:26:07'),
(2, 'روايات حزينة', 'روايات-حزين', NULL, 1, '2023-10-23 21:26:19', '2023-10-23 21:26:19'),
(3, 'روايات سعيدة', 'روايات-سعيد', NULL, 1, '2023-10-23 21:26:26', '2023-10-23 21:26:26'),
(4, 'طعام', 'طعام', NULL, 1, '2023-10-23 21:26:43', '2023-10-23 21:26:43'),
(5, 'قوائم', 'قوائم', NULL, 1, '2023-10-23 21:26:52', '2023-10-23 21:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ريال يمني', NULL, NULL),
(2, 'ريال سعودي', NULL, NULL),
(3, 'دولار أمريكي', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_photo_path` varchar(255) NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `book_photo_path`, `book_id`, `created_at`, `updated_at`) VALUES
(11, 'images/books/images/1698107521-IMG-20230724-WA0057.jpg', 4, '2023-10-23 21:32:01', '2023-10-23 21:32:01'),
(12, 'images/books/images/1698107521-IMG-20230724-WA0058.jpg', 4, '2023-10-23 21:32:01', '2023-10-23 21:32:01'),
(13, 'images/books/images/1698107521-IMG-20230724-WA0059.jpg', 4, '2023-10-23 21:32:02', '2023-10-23 21:32:02'),
(14, 'images/books/images/1698107560-IMG-20230727-WA0007.jpg', 5, '2023-10-23 21:32:40', '2023-10-23 21:32:40'),
(15, 'images/books/images/1698107560-IMG-20230727-WA0008.jpg', 5, '2023-10-23 21:32:40', '2023-10-23 21:32:40'),
(16, 'images/books/images/1698107560-IMG-20230727-WA0009.jpg', 5, '2023-10-23 21:32:41', '2023-10-23 21:32:41'),
(20, 'images/books/images/1698107681-IMG-20230727-WA0007.jpg', 7, '2023-10-23 21:34:41', '2023-10-23 21:34:41'),
(21, 'images/books/images/1698107681-IMG-20230727-WA0008.jpg', 7, '2023-10-23 21:34:41', '2023-10-23 21:34:41'),
(22, 'images/books/images/1698107681-IMG-20230727-WA0009.jpg', 7, '2023-10-23 21:34:41', '2023-10-23 21:34:41'),
(39, 'images/books/images/1738694053-6.jpg', 1, '2025-02-04 15:34:13', '2025-02-04 15:34:13'),
(40, 'images/books/images/1738694053-7.jpg', 1, '2025-02-04 15:34:13', '2025-02-04 15:34:13'),
(41, 'images/books/images/1738694080-7.jpg', 2, '2025-02-04 15:34:40', '2025-02-04 15:34:40'),
(42, 'images/books/images/1738694080-8.jpg', 2, '2025-02-04 15:34:40', '2025-02-04 15:34:40'),
(43, 'images/books/images/1738694110-3.png', 3, '2025-02-04 15:35:10', '2025-02-04 15:35:10'),
(44, 'images/books/images/1738694291-8.jpg', 6, '2025-02-04 15:38:11', '2025-02-04 15:38:11'),
(45, 'images/books/images/1738694291-9.jpg', 6, '2025-02-04 15:38:11', '2025-02-04 15:38:11'),
(46, 'images/books/images/1738963212-3.png', 8, '2025-02-07 18:20:12', '2025-02-07 18:20:12'),
(47, 'images/books/images/1738963261-8.jpg', 9, '2025-02-07 18:21:01', '2025-02-07 18:21:01'),
(48, 'images/books/images/1738963261-9.jpg', 9, '2025-02-07 18:21:01', '2025-02-07 18:21:01'),
(49, 'images/books/images/1738963261-10.jpg', 9, '2025-02-07 18:21:01', '2025-02-07 18:21:01'),
(50, 'images/books/images/1738963291-3.jpg', 10, '2025-02-07 18:21:31', '2025-02-07 18:21:31'),
(51, 'images/books/images/1738963291-3.png', 10, '2025-02-07 18:21:31', '2025-02-07 18:21:31'),
(52, 'images/books/images/1738963291-4.jpg', 10, '2025-02-07 18:21:31', '2025-02-07 18:21:31'),
(53, 'images/books/images/1738963355-6.jpg', 13, '2025-02-07 18:22:35', '2025-02-07 18:22:35'),
(54, 'images/books/images/1738963355-7.jpg', 13, '2025-02-07 18:22:35', '2025-02-07 18:22:35'),
(55, 'images/books/images/1738963355-8.jpg', 13, '2025-02-07 18:22:35', '2025-02-07 18:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_03_29_184834_create_authors_table', 1),
(5, '2019_03_29_184954_create_categories_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2020_05_21_100000_create_teams_table', 1),
(9, '2020_05_21_200000_create_team_user_table', 1),
(10, '2020_09_19_130310_create_sessions_table', 1),
(11, '2023_09_20_205426_create_currencies_table', 1),
(12, '2023_09_22_202817_create_web_info_table', 1),
(13, '2024_03_29_185012_create_books_table', 1),
(14, '2024_04_29_185306_create_book_author_table', 1),
(15, '2024_05_29_185336_create_book_user_table', 1),
(16, '2024_07_17_123955_create_ratings_table', 1),
(17, '2024_08_12_093152_create_images', 1),
(18, '2024_6_11_124959_create_book_category', 1),
(19, '2023_11_23_210354_create_carousels_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `value` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `book_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 4, '2023-10-23 23:24:01', '2023-10-23 23:24:01'),
(2, 1, 2, 5, '2023-10-23 23:51:01', '2025-02-07 18:26:41'),
(3, 1, 12, 3, '2023-10-24 00:57:14', '2023-10-24 00:57:14'),
(4, 1, 3, 5, '2023-10-24 01:09:24', '2023-10-24 01:09:24'),
(5, 1, 11, 3, '2023-10-24 01:11:09', '2023-10-24 01:11:09'),
(6, 1, 9, 4, '2024-12-30 23:07:00', '2024-12-30 23:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('auZSRqU74HDfrd0Pe0MRZcQc3kgrzhI5TFoLW9KO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTERHbzNBNEVwVTZ3b1dwZzRVNUk0MGhPNHFZelhjUGM1Y1ZTTjBTSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8wMTAxMC1hZG1pbi0wMTAxMC91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1738964734),
('Ki6Zl5RsSA5t0spLHZIcAta3WjzHGIWnVBVpYbaH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOENOYVhJcEMybVBKbnJkbE05cHF3MThSQUFWQnBEemRtS0lqU3NjQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8wMTAxMC1hZG1pbi0wMTAxMC91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1738963788),
('MhnmIbhQSs3aytfZzBjKuYuObUpoWnPjetemyarf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMTY0dTB1WmVUaVExcURTaVM5czgwYlFXQ2JLOUQ5R0wySW1xdkp0MiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvMDEwMTAtYWRtaW4tMDEwMTAvdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1738963942);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `administration_level` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `administration_level`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `created_at`, `updated_at`) VALUES
(1, 'Medo', 'user1@gmail.com', NULL, 0, '$2y$10$qVGS/bjcha48r1WSfgIE4O4J05iiIt7s/oHhSKlVKxDvBBQPPKBt.', NULL, NULL, 'N8IrebrKlC6iI1f53Oi4f5FJcuU4BOkfeU6nsWTiYZnKI1uexGsqt5yqjua4', NULL, '2023-10-19 21:39:25', '2023-10-19 21:39:25'),
(2, 'أحمد', 'ahmed@gmail.com', NULL, 2, '$2y$10$ECiRNPNViFqoHkHQDe/Pje/NZiTvFxf2RzoTwB8bnWFD5TCjf0vay', NULL, NULL, NULL, NULL, '2025-02-07 18:31:32', '2025-02-07 18:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `webinfos`
--

CREATE TABLE `webinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `about` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'logo.png',
  `web_cover_image` varchar(255) NOT NULL DEFAULT 'webImage.png',
  `phone_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `whatsapp_first_group_url` varchar(255) DEFAULT NULL,
  `whatsapp_second_group_url` varchar(255) DEFAULT NULL,
  `whatsapp_third_group_url` varchar(255) DEFAULT NULL,
  `whatsapp_forth_group_url` varchar(255) DEFAULT NULL,
  `telegram_group_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `insta_url` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinfos`
--

INSERT INTO `webinfos` (`id`, `title`, `description`, `about`, `location`, `logo`, `web_cover_image`, `phone_number`, `whatsapp_number`, `whatsapp_first_group_url`, `whatsapp_second_group_url`, `whatsapp_third_group_url`, `whatsapp_forth_group_url`, `telegram_group_url`, `facebook_url`, `insta_url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'الزمير لبيع الكتب', '<p>الزمير لبيع الكتب هو متحر لبيع الكتب حيث نبيع فيه الكتب الأكثر قراءة، فقط اطلب أي كتاب حتى ولو لم يكن موجودًا فإننا نوفره لك</p>', '<p>الزمير لبيع الكتب هو متحر لبيع الكتب حيث نبيع فيه الكتب الأكثر قراءة، فقط اطلب أي كتاب حتى ولو لم يكن موجودًا فإننا نوفره لك</p>', '<p>اليمن - حضرموت - المكلا - المساكن</p>', 'logo.png', 'C:\\xampp\\tmp\\php13FA.tmp', '777777777', '777777777', 'https://whatsapp.com', 'https://whatsapp.com', 'https://whatsapp.com', 'https://whatsapp.com', 'https://telegram.com', 'https://facebook.com', 'https://instgram.com', NULL, NULL, '2025-02-07 18:25:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_name_unique` (`name`),
  ADD UNIQUE KEY `authors_slug_unique` (`slug`),
  ADD KEY `authors_user_id_foreign` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_slug_unique` (`slug`),
  ADD KEY `books_currency_id_foreign` (`currency_id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_author_author_id_foreign` (`author_id`),
  ADD KEY `book_author_book_id_foreign` (`book_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_book_id_foreign` (`book_id`),
  ADD KEY `book_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `book_user`
--
ALTER TABLE `book_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_user_user_id_foreign` (`user_id`),
  ADD KEY `book_user_book_id_foreign` (`book_id`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carousels_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_book_id_foreign` (`book_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_book_id_foreign` (`book_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webinfos`
--
ALTER TABLE `webinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `webinfos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `book_user`
--
ALTER TABLE `book_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webinfos`
--
ALTER TABLE `webinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_author_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_user`
--
ALTER TABLE `book_user`
  ADD CONSTRAINT `book_user_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carousels`
--
ALTER TABLE `carousels`
  ADD CONSTRAINT `carousels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `webinfos`
--
ALTER TABLE `webinfos`
  ADD CONSTRAINT `webinfos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
