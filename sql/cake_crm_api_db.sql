-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2021 at 08:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_crm_api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `sms_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city_id`, `state_id`, `gender`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Shoile', 'Afrin', 'se.shoile@gmail.com', '918329819375', NULL, NULL, NULL, NULL, 1, '2021-05-10 05:14:10', '2021-05-10 05:14:10'),
(2, 2, 'Shoile2', 'Afrin', 'se.shoile@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-05-10 05:20:40', '2021-05-10 05:20:40'),
(3, 3, 'John', 'Alex', 'alex@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-05-10 05:22:21', '2021-05-10 05:22:21'),
(4, 2, 'Shoile3', 'Afrin', 'se.shoile@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-05-10 23:22:03', '2021-05-10 23:22:03'),
(5, 2, 'Shoile4', 'Afrin', 'se.shoile@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-05-10 23:44:23', '2021-05-10 23:44:23'),
(11, 2, 'Piyash', 'Azhar', 'piyash@gmail.com', '01800586665', NULL, NULL, NULL, NULL, 0, '2021-05-11 05:51:50', '2021-05-11 05:51:50'),
(12, 4, 'Shoile5', 'Afrin', 'se.shoile@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-05-17 07:05:03', '2021-05-17 07:05:03'),
(13, 4, 'ShoileX', 'Afrin', 'se.shoile@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-05-17 07:40:12', '2021-05-17 07:40:12'),
(14, 2, 'ShoileX', 'Afrin', 'se.shoile@gmail.com', '0182636366', NULL, NULL, NULL, NULL, 0, '2021-10-13 06:40:37', '2021-10-13 06:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_events`
--

DROP TABLE IF EXISTS `customer_events`;
CREATE TABLE IF NOT EXISTS `customer_events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `event_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_events_customer_id_foreign` (`customer_id`),
  KEY `customer_events_user_id_foreign` (`user_id`),
  KEY `customer_events_event_id_foreign` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_events`
--

INSERT INTO `customer_events` (`id`, `customer_id`, `user_id`, `event_id`, `event_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2021-05-28', '2021-05-11 03:08:31', '2021-05-11 03:08:31'),
(2, 1, 2, 1, '1995-01-15', '2021-05-11 03:11:09', '2021-05-11 03:11:09'),
(3, 3, 2, 1, '1995-01-15', '2021-05-11 03:25:12', '2021-05-11 03:25:12'),
(4, 4, 2, 1, '1995-01-19', '2021-05-11 03:50:06', '2021-05-11 03:50:06'),
(7, 11, 2, 1, '1995-04-21', '2021-05-11 05:51:50', '2021-05-11 05:51:50'),
(8, 11, 2, 2, '1995-04-23', '2021-05-11 05:51:50', '2021-05-11 05:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_template` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `sms_template`, `created_at`, `updated_at`) VALUES
(1, 'Anniversary', NULL, '2021-05-11 01:54:55', '2021-05-11 01:54:55'),
(2, 'Birthday', NULL, '2021-05-11 01:57:23', '2021-05-11 02:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2000_01_01_000001_create_users_table', 1),
(2, '2000_01_01_000002_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2016_12_29_201047_create_permission_tables', 1),
(9, '2017_09_12_174826_create_notifications_table', 1),
(10, '2017_10_27_091547_add_level_column_to_roles_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_03_01_150940_create_jobs_table', 1),
(14, '2021_05_06_102008_create_sellers_table', 2),
(15, '2021_05_10_064848_create_plans_table', 3),
(17, '2021_05_10_102138_create_customers_table', 5),
(18, '2021_05_11_072105_create_events_table', 6),
(19, '2021_05_11_082333_create_customer_events_table', 7),
(20, '2021_05_12_085111_add_otp_to_users_table', 8),
(21, '2021_05_12_085111_add_lastname_to_users_table', 9),
(22, '2021_05_12_085111_add_otp_timer_to_users_table', 10),
(25, '2021_05_18_123005_create_orders_table', 11),
(27, '2021_05_10_081538_create_subscriptions_table', 13),
(28, '2021_05_25_085111_add_razorpay_to_subscriptions_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Containers\\AppSection\\User\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1f0c7dde-a432-4fa9-bf52-0b3cf6dcb7ec', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 4, '[]', NULL, '2021-05-13 00:17:26', '2021-05-13 00:17:26'),
('51ba8629-4616-4a9d-a694-7c7453a43d0b', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 11, '[]', NULL, '2021-05-16 15:39:06', '2021-05-16 15:39:06'),
('60f44436-6501-4586-b4c5-f7fe5b3f1769', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 10, '[]', NULL, '2021-05-16 14:39:24', '2021-05-16 14:39:24'),
('75dba840-929c-482e-84b3-eef708d40be7', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 3, '[]', NULL, '2021-05-06 22:49:11', '2021-05-06 22:49:11'),
('8fe2eec3-7509-4c65-a5dd-95e5a6357613', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 7, '[]', NULL, '2021-05-13 00:33:30', '2021-05-13 00:33:30'),
('a0e19216-6f4d-417c-8969-c1116ce07ebc', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 2, '[]', NULL, '2021-05-06 03:43:31', '2021-05-06 03:43:31'),
('b11f9dc4-549e-4e45-a563-c5a185e4d79f', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 5, '[]', NULL, '2021-05-13 00:22:09', '2021-05-13 00:22:09'),
('b6bc9a4e-9f0e-49da-a50f-9081782dc64e', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 8, '[]', NULL, '2021-05-13 00:34:55', '2021-05-13 00:34:55'),
('e0083ac6-0a73-4929-969e-fe55974d514a', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 9, '[]', NULL, '2021-05-13 01:12:02', '2021-05-13 01:12:02'),
('f6411692-1745-42ed-b01f-cf5673369e07', 'App\\Containers\\AppSection\\User\\Notifications\\UserRegisteredNotification', 'App\\Containers\\AppSection\\User\\Models\\User', 6, '[]', NULL, '2021-05-13 00:32:53', '2021-05-13 00:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00f8701de0f52ef69a45a123393536d4b535cfecf9edb292dc1706f014baf803d8e682a78763d56b', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-31 10:08:14', '2021-05-31 10:08:14', '2022-05-31 16:08:14'),
('05f4cf1aeba2ec7923ff06363ebb43e6eda5f26ec0824fc594326389ffea353ab36c8f1dd27c23da', 4, 2, NULL, '[]', 0, '2021-05-13 00:37:47', '2021-05-13 00:37:47', '2021-05-14 06:37:47'),
('0721a226ef9b213c94905fe02dda0f7a0ece0deeba34733454913a2b46a5add1dc90ffa49b4a9b12', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-17 02:50:20', '2021-05-17 02:50:20', '2022-05-17 08:50:20'),
('094d93722244245d18bb14a765f7f1c11219fae503c4038e89f7bf9e565b64aa6b02291e4ba60e37', 2, 2, NULL, '[]', 0, '2021-05-12 04:17:46', '2021-05-12 04:17:46', '2021-05-13 10:17:46'),
('0f16f09062a9ae522315171c426fc668b9a1518af5328c5693f78e72587497f48494f71eefb9f25f', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-17 06:51:07', '2021-05-17 06:51:07', '2022-05-17 12:51:07'),
('10e8e26e7e5e097dd71a87c493b8ea4759086550181a05e35ff253c509399a28292c9eed3f4a10fb', 2, 1, 'authTokenOTP', '[]', 0, '2021-10-13 06:36:28', '2021-10-13 06:36:28', '2022-10-13 12:36:28'),
('34c9c86c90d475175f79cb2b1ea42855a2e08fafaf0ddae775642d3e3c8cbdee958ede2ebb6c5171', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-13 06:11:34', '2021-05-13 06:11:34', '2022-05-13 12:11:34'),
('35b7aaccc8ec3b1da2b96c5589e203faa2f4d01353813614ccae63e27af2fbff4e668ccd75a316b2', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-24 23:38:41', '2021-05-24 23:38:41', '2022-05-25 05:38:41'),
('3c1a5eabb64a9977b4b0cc99f46cb3bb50610e39855ce8bcd1c0b96ef2adcad503c96776a3fdd09d', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-17 02:07:06', '2021-05-17 02:07:06', '2022-05-17 08:07:06'),
('429e30698ec111b52491efdb3075d76980941c0434beec1f77ff29c29e633dc1559c4bbb857d2c54', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-20 01:38:58', '2021-05-20 01:38:58', '2022-05-20 07:38:58'),
('57722b4f3eb2efc32f7436f8a372dd978ed5c613b8604a8e5b271b36b782d1de0812dba1c1ee4236', 2, 1, 'authToken', '[]', 0, '2021-05-12 16:27:06', '2021-05-12 16:27:06', '2022-05-12 22:27:06'),
('5dffbbe4f9471d00d14ccfedc042f449b97504657515d0f04a2d3f62a5f38ce0c865d6756d56bcd4', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-13 06:04:27', '2021-05-13 06:04:27', '2022-05-13 12:04:27'),
('60b5999bc402d1b1da82f6bd51fd20e48c467a62802d90c5441ce91f4419b0018dba9a251792f9d1', 2, 1, 'authToken', '[]', 0, '2021-05-12 16:27:11', '2021-05-12 16:27:11', '2022-05-12 22:27:11'),
('7954b6fd0a0637d77bcc9b94e005c82506d3d5dbf360f83b769058d77d156a7a23ba066e287281f5', 2, 2, NULL, '[]', 0, '2021-05-06 04:03:44', '2021-05-06 04:03:44', '2021-05-07 10:03:44'),
('9084b6fbef2d32116e004bfec68b669a17db2fc115895ee98fa7737f9fd4ec02db8d02997d50ae9d', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-25 05:36:27', '2021-05-25 05:36:27', '2022-05-25 11:36:27'),
('93031b95ffab2d0fd5bb30acd324bb4655564c76bb552b5690055ecfbd615228581eaa50074326aa', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-16 15:54:18', '2021-05-16 15:54:18', '2022-05-16 21:54:18'),
('9514fb86a3ea84dfbb53e3135659aac44f6fc057f3e0d918af0d50ce81a4cee6b91d68fc3aa845a6', 2, 1, 'authTokenOTP', '[]', 0, '2021-05-20 23:47:21', '2021-05-20 23:47:21', '2022-05-21 05:47:21'),
('b77bd11ea9fbc298f965176b0edc01d4955d9d4822493439c8f89239c3a5cea6de2dcf19b5dd8e0e', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-17 02:05:47', '2021-05-17 02:05:47', '2022-05-17 08:05:47'),
('b933c761089698d7475350770cd3bc70ab3350cb6ccfa059357b3b8955e03a4a034ed4b4b1555e74', 2, 1, 'authToken', '[]', 0, '2021-05-12 16:26:16', '2021-05-12 16:26:16', '2022-05-12 22:26:16'),
('ba0ed29b428d6865a06e3a32bb626d175afa7a8f53c5dd589d8b8a465d9c68547f89b8379f4e38ac', 2, 1, 'authToken', '[]', 0, '2021-05-12 16:29:06', '2021-05-12 16:29:06', '2022-05-12 22:29:06'),
('bcb052467ef74a645f94672edeaa7dcfa9538bd96a088471e4e9cb0db881eaf0ba425fb26e248a10', 2, 2, NULL, '[]', 0, '2021-05-10 01:37:24', '2021-05-10 01:37:24', '2021-05-11 07:37:24'),
('beab6ef34319db96dc24b67d00b12c9992d1c2f17289316b9b5118912e70447a79e5a55cd412b285', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-13 05:59:38', '2021-05-13 05:59:38', '2022-05-13 11:59:38'),
('cebd5bc689a1ae03d92d23e2efd5d31ba9788657867ad893ef72a226b33f5bfcdcbf34b20f732a80', 2, 2, NULL, '[]', 0, '2021-05-11 01:51:48', '2021-05-11 01:51:48', '2021-05-12 07:51:48'),
('d8afef0a4a29735940c5ce1202cb55478440e9a6fcab52ce0788390727a93fc381563ca0e5089e8b', 2, 2, NULL, '[]', 0, '2021-05-07 04:13:27', '2021-05-07 04:13:27', '2021-05-08 10:13:27'),
('fe10e0dc3d7f9110d7ee615ae7d6cecd948835fef1b44f6649000c06804563c012d3cbb143fd80d4', 4, 1, 'authTokenOTP', '[]', 0, '2021-05-16 16:07:57', '2021-05-16 16:07:57', '2022-05-16 22:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'cakeCRM Personal Access Client', 'cXQCKFcJWej6Tf590zW6QBfBCiCB5F3flVMTDwiI', NULL, 'http://localhost', 1, 0, 0, '2021-05-06 03:15:15', '2021-05-06 03:15:15'),
(2, NULL, 'cakeCRM Password Grant Client', 'nClIsZxyFh6xMaKBNAgDUtJRZlIosYEFn58KnKk8', 'users', 'http://localhost', 0, 1, 0, '2021-05-06 03:15:15', '2021-05-06 03:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-06 03:15:15', '2021-05-06 03:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('24787165a494ce8ffe851cc501d516bdc74c419449eaf5f2d233c9cb01d6922643bb3dede81596da', '094d93722244245d18bb14a765f7f1c11219fae503c4038e89f7bf9e565b64aa6b02291e4ba60e37', 0, '2021-06-11 10:17:46'),
('3a1728ddd1e9dd6079564ae1762e86bf40f41aee5c00d68b5769d5648b942681d1cae48d36bd1969', '7954b6fd0a0637d77bcc9b94e005c82506d3d5dbf360f83b769058d77d156a7a23ba066e287281f5', 0, '2021-06-05 10:03:44'),
('5773a088b574f12e9a067910212c9c271fb2699f48c0121cb69a36b58b477150b75047c4a22612c3', 'cebd5bc689a1ae03d92d23e2efd5d31ba9788657867ad893ef72a226b33f5bfcdcbf34b20f732a80', 0, '2021-06-10 07:51:48'),
('90d4cb15f551986dd661d121b97a1e90b79ff5d94ffb599094d03dd0c043408bb99de832b3e19134', 'bcb052467ef74a645f94672edeaa7dcfa9538bd96a088471e4e9cb0db881eaf0ba425fb26e248a10', 0, '2021-06-09 07:37:24'),
('a783d9588116675a26d49d12ea7b5bdc3bab06451692321e884c3c37cec14bf7cd7ceb7e5a4200db', 'd8afef0a4a29735940c5ce1202cb55478440e9a6fcab52ce0788390727a93fc381563ca0e5089e8b', 0, '2021-06-06 10:13:27'),
('f754749d97092e7001efd1c3c637d307c873c83c0cecca9164bd65650ea8936d26f333b197eda280', '05f4cf1aeba2ec7923ff06363ebb43e6eda5f26ec0824fc594326389ffea353ab36c8f1dd27c23da', 0, '2021-06-12 06:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `cake_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cake_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` longtext COLLATE utf8mb4_unicode_ci,
  `road_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_event_id_foreign` (`customer_event_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_event_id_foreign` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_event_id`, `user_id`, `customer_id`, `event_id`, `delivery_date`, `first_name`, `last_name`, `note`, `cake_title`, `cake_size`, `phone`, `delivery_address`, `road_name`, `city_id`, `state_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 2, '2021-05-26', 'SAZAL', 'AH', 'deep chocolate', 'MOU\'s 2021', '2kg', '00128296954', 'dhaka', NULL, NULL, NULL, 0, '2021-05-25 05:22:38', '2021-05-25 05:22:45'),
(2, 1, 2, 1, 1, '2021-05-28', 'SAZAL', 'AH', 'deep chocolate X', 'MOU\'s 2021', '2kg', '00128296954', 'dhaka', NULL, NULL, NULL, 0, '2021-05-25 05:22:38', '2021-05-25 05:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage-roles', 'web', NULL, 'Create, Update, Delete, Get All, Attach/detach permissions to Roles and Get All Permissions.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(2, 'create-admins', 'web', NULL, 'Create new Users (Admins) from the dashboard.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(3, 'manage-admins-access', 'web', NULL, 'Assign users to Roles.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(4, 'access-dashboard', 'web', NULL, 'Access the admins dashboard.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(5, 'search-users', 'web', NULL, 'Find a User in the DB.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(6, 'list-users', 'web', NULL, 'Get All Users.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(7, 'update-users', 'web', NULL, 'Update a User.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(8, 'delete-users', 'web', NULL, 'Delete a User.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(9, 'refresh-users', 'web', NULL, 'Refresh User data.', '2021-05-06 03:14:41', '2021-05-06 03:14:41'),
(10, 'access-private-docs', 'web', NULL, 'Access the private docs.', '2021-05-06 03:14:41', '2021-05-06 03:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `customer` int(11) DEFAULT NULL,
  `sms` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `razorpay_plan_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `price`, `customer`, `sms`, `created_at`, `updated_at`, `razorpay_plan_id`, `month`) VALUES
(1, 'Standard Monthly', 354.00, 50, NULL, '2021-05-10 01:48:52', '2021-05-10 02:09:09', 'plan_HCG5IOSRVhZvqm', 1),
(2, 'Standard Yearly', 4248.00, 50, NULL, '2021-05-10 01:48:52', '2021-05-10 02:09:09', 'plan_H91htLmC4Ba1Oe', 12);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `display_name`, `description`, `created_at`, `updated_at`, `level`) VALUES
(1, 'admin', 'web', 'Administrator Role', 'Administrator', '2021-05-06 03:14:41', '2021-05-06 03:14:41', 999);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sellers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `first_name`, `last_name`, `brand_name`, `phone`, `logo`, `address`, `city_id`, `state_id`, `zip_code`, `trial_ends_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'SAZAL', 'AHAMED', 'Mou Dessert', '01758148788', NULL, NULL, NULL, NULL, NULL, '2021-06-06', '2021-05-06 08:40:58', '2021-05-06 08:40:58'),
(5, 3, 'MALIHA', 'MOU', 'Cake LOVE', '010000000', 'seller-logo/20210521123619_303.jpg', NULL, NULL, NULL, '5555', '2021-06-07', '2021-05-07 00:57:39', '2021-05-21 06:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trial_ends_at` date DEFAULT NULL,
  `ends_at` date DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `razorpay_payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_subscription_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_plan_id_foreign` (`plan_id`),
  KEY `subscriptions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `plan_id`, `user_id`, `trial_ends_at`, `ends_at`, `payment_id`, `order_id`, `sms_count`, `created_at`, `updated_at`, `razorpay_payment_id`, `razorpay_subscription_id`, `razorpay_signature`) VALUES
(3, 1, 2, '2021-06-25', '2021-12-25', NULL, NULL, NULL, '2021-05-25 06:15:02', '2021-05-25 06:50:14', 'xplan_HCG5IOSRVhZvqm', 'sub_HHJt8Jfxv6N5S4', 'xzplan_HCG5IOSRVhZvqm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_expire` timestamp NULL DEFAULT NULL,
  `storage` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `gender`, `birth`, `device`, `platform`, `is_admin`, `image`, `phone`, `remember_token`, `created_at`, `updated_at`, `otp`, `active`, `last_name`, `otp_expire`, `storage`) VALUES
(1, 'Super Admin', 'admin@admin.com', '$2y$10$cPAf7VOUefwfrJQmJ7zfFOsN3hU2aQPHcRi2QXkoghoAXtOigVGoy', '2021-05-06 03:14:41', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-05-06 03:14:41', '2021-05-06 03:14:41', NULL, 0, NULL, NULL, NULL),
(2, 'Sazal Ahamed', 'sazal@webassic.com', '$2y$10$HA2SG08BLsyaf0hswMKX4uXIxW8oWQrKcwWJrA8AO77GF1bV2KQvq', NULL, NULL, NULL, NULL, NULL, 0, NULL, '918329819375', '1234', '2021-05-06 03:43:28', '2021-10-13 06:34:40', 's8c08fdwdGfIRMzYAAEUrw==', 0, NULL, '2021-10-13 06:37:40', '1'),
(3, 'Maliha Mou', 'maliha@gmail.com', '$2y$10$M/ENMxSFb6U0seY6Z50Sp.BJPFdhmd4kf.l26gLrj4v6u8j47L1T2', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2021-05-06 22:49:09', '2021-05-06 22:49:09', NULL, 0, NULL, NULL, NULL),
(4, 'Piyash', 'piyash@mail.com', '$2y$10$0JooMvfrlQ/F.om5X3Ye.ehjT8kcnopQP7DPpeKTK/j3jbUXRSUey', NULL, NULL, NULL, NULL, NULL, 0, NULL, '918530488998', NULL, '2021-05-13 00:17:23', '2021-05-17 06:50:05', 'pgzaLjlkoCr2lgb/ktqX+w==', 0, 'Ahamed', '2021-05-17 06:53:05', NULL),
(9, 'Piyash5', 'piyash5@mail.com', '$2y$10$YDWLZPSU9mRoNuiLv9NlG.QJ4F0GBad3cvPdLK6A3I4ymZ7pcX8L.', NULL, NULL, NULL, NULL, NULL, 0, NULL, '012548354786553', NULL, '2021-05-13 01:12:02', '2021-05-13 03:57:55', '4155', 1, 'Ahamed', NULL, NULL),
(10, 'Piyash9', 'piyash9@mail.com', '$2y$10$z2Q81RHq6KkDwVi4Tph2SOpHXaoBRFwzf0meLpTvpXQ3q9LT0mb3W', NULL, NULL, NULL, NULL, NULL, 0, NULL, '918530488999', NULL, '2021-05-16 14:39:13', '2021-05-16 15:06:26', '1924', 0, 'Azhar', '2021-05-15 21:37:44', NULL),
(11, 'Piyash00', 'piyash00@mail.com', '$2y$10$gMN.9zPP6JIGO3Qs/.sZbesVeTJsTPsm7xJZUBluQhGinX.oEEDdm', NULL, NULL, NULL, NULL, NULL, 0, NULL, '918329819371', NULL, '2021-05-16 15:39:06', '2021-05-17 02:40:57', 'DICtrc2WIw16ewHICNWx5g==', 1, 'Azhar', '2021-05-17 02:42:33', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_events`
--
ALTER TABLE `customer_events`
  ADD CONSTRAINT `customer_events_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_events_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_event_id_foreign` FOREIGN KEY (`customer_event_id`) REFERENCES `customer_events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
