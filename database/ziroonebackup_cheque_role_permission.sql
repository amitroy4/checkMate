-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 12:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziroonebackup_cheque_role_permission`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `branch_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Sonali bank', 'drbr', 'xdy', '2024-10-29 09:20:59', '2024-10-29 09:44:18'),
(2, 'Rupali bank', 'rvtsret', 'dhaka dhaka', '2024-10-29 09:30:47', '2024-11-10 07:05:50'),
(3, 'Sonali bank', 'evvvvsy', 'eryeryery', '2024-10-29 09:44:30', '2024-10-29 09:44:30'),
(4, 'Amaze bank', 'Uganda', 'uganda, World.', '2024-10-29 09:55:51', '2024-10-29 09:55:59'),
(6, 'Jomuna Bank', 'Dhaka', 'dhaka', '2024-10-29 12:11:01', '2024-11-08 16:56:31'),
(7, 'guo,uo', 'hu.iohu,o', ',oipp;.i', '2024-10-29 12:40:58', '2024-10-29 12:40:58'),
(10, 'Amit Bank', 'tbyufu', 'tufbu', '2024-10-31 11:09:08', '2024-10-31 11:09:08'),
(11, 'Ext bank1', 'bh5gry', 'ye5yr5yvrey', '2024-11-01 15:43:10', '2024-11-01 15:43:10'),
(12, 'ARA BANK', 'rtnbyr', 'dfg', '2024-11-05 05:38:03', '2024-11-06 11:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_pays`
--

CREATE TABLE `cheque_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `cheque_date` date NOT NULL,
  `payee_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `cheque_number` varchar(255) NOT NULL,
  `is_fly_cheque` tinyint(1) NOT NULL,
  `cheque_status` varchar(255) DEFAULT 'Pending',
  `cheque_clearing_date` date DEFAULT NULL,
  `cheque_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cheque_pays`
--

INSERT INTO `cheque_pays` (`id`, `company_id`, `cheque_date`, `payee_id`, `bank_id`, `amount`, `paytype`, `cheque_number`, `is_fly_cheque`, `cheque_status`, `cheque_clearing_date`, `cheque_reason`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-21', 12, 2, 6564.00, 'No Cross', '95123666', 0, 'Approved', '2024-11-03', NULL, '2024-11-10 06:45:25', '2024-11-11 09:30:19'),
(2, 11, '2024-11-30', 12, 12, 6871692.00, 'Cross Only', '697269', 0, 'Rejected', '2024-11-30', 'done reject', '2024-11-10 07:21:29', '2024-11-11 09:30:44'),
(29, 1, '2024-11-14', 10, 4, 123.00, 'Cross Only', '9521254', 0, 'Pending', NULL, NULL, '2024-11-11 10:03:29', '2024-11-11 10:03:29'),
(30, 1, '2024-11-11', 13, 7, 652.00, 'Cross Only', '29959', 0, 'Pending', NULL, NULL, '2024-11-11 10:03:55', '2024-11-11 10:03:55'),
(31, 5, '2024-11-11', 13, 6, 652000.00, 'Cross Only', '6532', 0, 'Bounce', NULL, 'my refefd', '2024-11-11 11:25:59', '2024-11-11 12:04:59'),
(32, 5, '2024-11-12', 10, 7, 526000.00, 'Cross Only', '546', 0, 'Pending', NULL, NULL, '2024-11-12 06:05:04', '2024-11-12 06:05:04'),
(33, 5, '2024-11-12', 13, 4, 120000.00, 'Cross Only', '958522636', 1, 'Approved', NULL, NULL, '2024-11-12 06:05:50', '2024-11-12 06:05:50'),
(34, 5, '2024-11-12', 13, 4, 2.00, 'Cross Only', '958522636', 1, 'Approved', NULL, NULL, '2024-11-12 06:06:15', '2024-11-12 06:06:15'),
(35, 5, '2024-11-12', 13, 4, 2.00, 'Cross Only', '958522636', 0, 'Pending', NULL, NULL, '2024-11-12 06:06:28', '2024-11-12 06:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_receives`
--

CREATE TABLE `cheque_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `cheque_date` date NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `receivetype` varchar(255) NOT NULL,
  `cheque_receiver_name` varchar(255) NOT NULL,
  `cheque_number` varchar(255) NOT NULL,
  `is_fly_cheque` tinyint(1) NOT NULL,
  `cheque_status` varchar(255) DEFAULT 'Pending',
  `cheque_clearing_date` date DEFAULT NULL,
  `cheque_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cheque_receives`
--

INSERT INTO `cheque_receives` (`id`, `company_id`, `cheque_date`, `client_id`, `bank_id`, `amount`, `receivetype`, `cheque_receiver_name`, `cheque_number`, `is_fly_cheque`, `cheque_status`, `cheque_clearing_date`, `cheque_reason`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-10', 13, 7, 68796.00, 'No Cross', 'me me', '96486', 0, 'Rejected', '2024-11-29', 'Yes', '2024-11-10 06:56:13', '2024-11-11 05:49:52'),
(2, 7, '2024-11-13', 6, 2, 6523.00, 'Cross A/C client / Or Brear', '6523000', '6544135', 1, 'Approved', NULL, NULL, '2024-11-11 05:15:46', '2024-11-11 05:15:46'),
(3, 7, '2024-11-13', 6, 2, 6523.00, 'No Cross', '6523000', '6544135', 0, 'Pending', '2024-09-11', 'no reason', '2024-11-11 05:16:04', '2024-11-11 09:38:43'),
(4, 5, '2024-11-15', 13, 3, 6523.00, 'Cross Only', 'arif', '65841', 0, 'Pending', NULL, NULL, '2024-11-11 11:26:40', '2024-11-11 11:26:40'),
(5, 7, '2024-11-14', 10, 12, 520000.00, 'Cross A/C client / Not Negotiable / Or Brear', '1236544', '1236545858', 1, 'Approved', NULL, NULL, '2024-11-12 06:07:16', '2024-11-12 06:07:16'),
(6, 7, '2024-11-14', 10, 12, 520000.00, 'Cross A/C client / Not Negotiable / Or Brear', '1236544', '1236545858', 0, 'Pending', NULL, NULL, '2024-11-12 06:07:28', '2024-11-12 06:07:28'),
(7, 7, '2024-11-14', 10, 12, 520001.00, 'Cross A/C client / Not Negotiable / Or Brear', '1236544', '1236545858', 0, 'Pending', NULL, NULL, '2024-11-12 06:07:52', '2024-11-12 06:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_designation` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `client_designation`, `company_name`, `mobile_number`, `whatsapp_number`, `email`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Mamun', 'babuchi', 'nai company', '0012344560', '01234560', 'mamun@gmail.com', 1, '2024-10-29 08:58:05', '2024-11-06 06:38:20'),
(7, 'Afrinna', 'JSE', 'er byr', '632514', '814798', 'am@gmail.com', 0, '2024-10-29 09:29:40', '2024-11-08 16:55:47'),
(9, 'rsdbts', 'svrdtrt', 'rdtvt', '5628', '79874', 'aaaa@mail.com', 0, '2024-10-29 09:51:00', '2024-11-06 11:47:49'),
(10, 'dbgd', 'g dgd', 'gxv', '7415785', '75285', 'asdx@gmail.com', 1, '2024-10-29 12:39:59', '2024-10-29 12:39:59'),
(11, 'Robi', 'rbg', 'rbryb', '01269798', '64926769', 'robi@gmail.com', 0, '2024-11-05 05:37:28', '2024-11-07 10:47:57'),
(12, 'Beauty', 'nryutu', 'nutut', '9862', '8268', 'beauty@gmail.com', 1, '2024-11-05 06:41:37', '2024-11-05 06:41:37'),
(13, 'CLient 1', 'erbyey', 'rntyru', '4715785', '758275', 'c@gmail.com', 1, '2024-11-05 07:03:00', '2024-11-05 07:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` text DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `land_line_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `company_facebook_url` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_address`, `contact_number`, `whatsapp_number`, `land_line_number`, `email`, `company_website`, `company_facebook_url`, `company_logo`, `registration_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'QBit Tech', 'rbyterye', '617169', '58176346', '69716930', 'afrin@gmail.com', 'http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/dashboard', 'company_logos/C0U1rGkyeXtn58SOVeOjcT91ishuWQvjLyh2YSOX.png', '58769', 1, '2024-10-28 11:43:52', '2024-11-11 11:46:50'),
(5, 'Ami Company name', 'werbywy', '102544', '0112345', '0155422', 'amitroy@mail.com', 'http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/dashboard', 'company_logos/uFoL5yVGEdeKl1pNYbiNNQx93velhAw9CpzeB6Ej.jpg', '01234560', 1, '2024-10-28 12:13:04', '2024-11-09 15:26:53'),
(7, 'AAA', '78srbyr', '617169', '9867187', '6177778', 'aaa@gmail.com', 'http://127.0.0.1:8000/dashboard', 'http://127.0.0.1:8000/dashboard', 'company_logos/jXWiVx9hfLL3ohXHA6ffyK7dNyrbKrHOwJouvSCx.jpg', '78', 1, '2024-10-29 06:33:30', '2024-10-29 06:49:49'),
(11, 'New company', 'sevrtrt', '4546325478', '652448652', '0155422', 'new@gmail.com', 'https://www.new.com', 'https://fb/newcompany', 'company_logos/G2xQd3TYSSactHWxBa4wEnH7ZlvY7Z8g4HjFGMu2.png', '6525', 1, '2024-11-10 07:20:32', '2024-11-10 07:20:32');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_10_28_005544_add_ip_address_to_users_table', 2),
(10, '2024_10_28_165721_create_companies_table', 3),
(11, '2024_10_23_115534_create_clients_table', 4),
(12, '2024_10_29_141657_create_vendors_table', 5),
(13, '2024_10_23_115548_create_banks_table', 6),
(22, '2024_11_07_125056_create_user_roles_table', 9),
(25, '2024_10_24_112921_create_cheque_receives_table', 10),
(26, '2024_10_23_115609_create_cheque_pays_table', 11),
(28, '2024_10_20_093610_create_web_settings_table', 12),
(29, '2024_11_17_222149_create_permission_tables', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Company', 'web', '2024-11-17 17:21:15', '2024-11-17 17:21:15'),
(2, 'Update Company', 'web', '2024-11-17 17:21:52', '2024-11-17 17:21:52'),
(3, 'Delete Company', 'web', '2024-11-17 17:44:20', '2024-11-17 17:44:20'),
(4, 'Add Client', 'web', '2024-11-17 17:45:55', '2024-11-17 17:45:55'),
(5, 'Update Client', 'web', '2024-11-17 17:46:08', '2024-11-17 17:46:08'),
(7, 'Delete Client', 'web', '2024-11-17 18:41:46', '2024-11-17 18:41:46'),
(8, 'Add User', 'web', '2024-11-18 05:42:24', '2024-11-18 05:42:24'),
(9, 'Update User', 'web', '2024-11-18 05:42:32', '2024-11-18 05:42:32'),
(10, 'Delete User', 'web', '2024-11-18 05:42:38', '2024-11-18 05:42:38'),
(11, 'Add View', 'web', '2024-11-18 07:46:46', '2024-11-18 07:46:46'),
(12, 'Add Manager', 'web', '2024-11-18 07:47:47', '2024-11-18 07:47:47');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'web', '2024-11-17 19:18:47', '2024-11-17 19:18:47'),
(3, 'Admin', 'web', '2024-11-17 19:53:21', '2024-11-17 19:53:21'),
(4, 'Editor', 'web', '2024-11-18 04:18:18', '2024-11-18 04:18:18'),
(5, 'View', 'web', '2024-11-18 07:45:54', '2024-11-18 07:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(3, 2),
(3, 4),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(5, 4),
(7, 2),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(11, 2),
(11, 3),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0,
  `ip_address` varchar(255) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userId`, `email`, `phone`, `status`, `is_superadmin`, `ip_address`, `last_login_at`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'superadmin@mail.com', '12345678900', 1, 1, '192.168.68.188', '2024-11-18 10:36:29', '2024-10-27 18:16:06', '$2y$10$6SLXYdFEisW3dEOqudsqv.lXrBMJBLUkoTfpdwrff5zbXoeuXuzfu', 'ENSM2i43gLMazS2NCJlwqUWgGXJQFSKTekZTPc14T1pp111GqoBthLDPj2Iz', '2024-10-27 18:16:06', '2024-11-18 10:36:29'),
(12, 'Amit', 'amit', 'amit@gmail.com', '01234567890', 1, 0, NULL, NULL, NULL, '$2y$10$s.ucjlLIDN.n0f10LMSgYeTDy86Psg66TI2BfrTlyw3AdCjfi5Wtu', NULL, '2024-11-18 04:51:21', '2024-11-18 04:51:21'),
(13, 'Arif Hossen', 'arif', 'arif@gmail.com', '09876543210', 0, 0, NULL, NULL, NULL, '$2y$10$azKh9w8rwK9KvdW.M16wJOJRIgbvb0SMn3WEgViz805AsCgXADfsK', NULL, '2024-11-18 04:53:09', '2024-11-18 05:15:01'),
(14, 'afrin', 'afrin', 'afrin@gmail.com', '45632107890', 1, 0, '127.0.0.1', '2024-11-18 09:59:46', NULL, '$2y$10$wIP7n2NvssYTmclNabVkbOWn.5kJKp8wQEiJqtMbIMgi3bwEyt3Uq', NULL, '2024-11-18 05:21:50', '2024-11-18 09:59:46'),
(15, 'Arnob', 'arnob', 'arnob@gmail.com', '12398745601', 1, 0, NULL, NULL, NULL, '$2y$10$rMYJGzb0em.FIfNhUqnXLuzH1rILvWLTL3EmcuMHtTZK0SZG/t29u', NULL, '2024-11-18 05:55:10', '2024-11-18 06:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', '2024-11-07 07:18:47', '2024-11-07 07:21:16'),
(7, 'Manager', '2024-11-07 09:50:39', '2024-11-17 17:53:32'),
(8, 'Editor', '2024-11-07 09:50:51', '2024-11-07 09:50:51'),
(9, 'Modaretor', '2024-11-07 09:50:58', '2024-11-07 09:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_designation` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `vendor_designation`, `company_name`, `mobile_number`, `whatsapp_number`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'V1', 'D1', 'Company11', '123456', '123456', 'email@mail.com', 0, '2024-10-29 08:58:49', '2024-11-06 11:48:39'),
(10, 'Vendor 1', 'rvtg', 'ty', '7817', '78757', 'v1@gmail.com', 1, '2024-10-31 09:20:55', '2024-10-31 09:20:55'),
(12, 'Edit Vendor 1', 'tryuun', 'my ccc', '816786', '86462', 'exv2@gmail.com', 0, '2024-11-01 15:42:53', '2024-11-10 07:25:29'),
(13, 'test', 'gyutfb', 'ugyttufgy', '482646', '62548', 'sdkk@gmail.com', 1, '2024-11-06 09:43:10', '2024-11-06 09:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `landphone` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `systemLogo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `company_name`, `company_address`, `contact`, `website`, `email`, `landphone`, `logo`, `favicon`, `systemLogo`, `created_at`, `updated_at`) VALUES
(1, 'Cheque Mate', '522/B North Shajahanpur, Dhaka.', '01234560', 'www.qbit-tech.com', 'info@qbit-tech.com', '1234567890', 'uploads/companyLogo/xYKoXZjeAFGjz4RZCaFfQWQcff5wb7lQsKi8wYCI.png', 'uploads/companyLogo/cqNoKADkqx8a7GBJBTj6IZ2tiovQbAgWmGCJnyFp.png', 'uploads/companyLogo/7md44TgR2baD4cbS5Ai8sL2sATUbzhjKcbxMDFC4.png', NULL, '2024-11-18 04:08:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_pays`
--
ALTER TABLE `cheque_pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheque_pays_company_id_foreign` (`company_id`),
  ADD KEY `cheque_pays_payee_id_foreign` (`payee_id`),
  ADD KEY `cheque_pays_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `cheque_receives`
--
ALTER TABLE `cheque_receives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheque_receives_company_id_foreign` (`company_id`),
  ADD KEY `cheque_receives_client_id_foreign` (`client_id`),
  ADD KEY `cheque_receives_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cheque_pays`
--
ALTER TABLE `cheque_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cheque_receives`
--
ALTER TABLE `cheque_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cheque_pays`
--
ALTER TABLE `cheque_pays`
  ADD CONSTRAINT `cheque_pays_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `cheque_pays_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `cheque_pays_payee_id_foreign` FOREIGN KEY (`payee_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `cheque_receives`
--
ALTER TABLE `cheque_receives`
  ADD CONSTRAINT `cheque_receives_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `cheque_receives_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `cheque_receives_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
