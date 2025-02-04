-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 06:55 AM
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
-- Database: `new_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amy_countries`
--

CREATE TABLE `amy_countries` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code_1` varchar(5) DEFAULT NULL,
  `code_2` varchar(5) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amy_countries`
--

INSERT INTO `amy_countries` (`encrypt_id`, `id`, `name`, `code_1`, `code_2`, `status`, `created_at`, `updated_at`) VALUES
('eyJpdiI6IktlUWQrcHJjRENuQlNXNG1VTzcyaUE9PSIsInZhbH', 1, 'Oman', 'OM', 'OMN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `symbol` varchar(5) NOT NULL DEFAULT '$',
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`encrypt_id`, `id`, `name`, `code`, `description`, `symbol`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'Oman Rial', 'OMR', 'Oman Rial', '﷼', 'Active', 1, 1, NULL, '2025-01-07 18:54:15', '2025-01-07 18:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `code` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `customer_type` enum('Individual','Business') NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `post_box` varchar(255) DEFAULT NULL,
  `balance` double(15,3) DEFAULT NULL,
  `credit_limit` double(15,3) DEFAULT NULL,
  `loyality_point` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_notification`
--

CREATE TABLE `custom_notification` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `date_formate`
--

CREATE TABLE `date_formate` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `date_formate`
--

INSERT INTO `date_formate` (`encrypt_id`, `id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'y-m-d', 'Dat-0001', 'YY-MM-DD', 'Active', 1, 1, NULL, '2025-01-06 06:46:26', '2025-01-06 06:46:26'),
(NULL, 2, 'd-m-Y', 'Dat-0002', 'DD-MM-YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 3, 'd-m-y', 'Dat-0003', 'DD-MM-YY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 4, 'm-d-Y', 'Dat-0004', 'MM-DD-YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 5, 'm-d-y', 'Dat-0005', 'MM-DD-YY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 6, 'Y-m-d', 'Dat-0006', 'YYYY-MM-DD', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 7, 'y/m/d', 'Dat-0007', 'YY/MM/DD', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 8, 'd/m/Y', 'Dat-0008', 'DD/MM/YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 9, 'd/m/y', 'Dat-0009', 'DD/MM/YY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 10, 'm/d/Y', 'Dat-0010', 'DD/MM/YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 11, 'm/d/Y', 'Dat-0011', 'YYYY-MM-DD', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 12, 'Y/m/d', 'Dat-0012', 'YYYY/MM/DD', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 13, 'd M Y', 'Dat-0013', 'DD MM YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 14, 'j F Y', 'Dat-0014', 'DD Month YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06'),
(NULL, 15, 'l F j Y', 'Dat-0015', 'Day Month DD YYYY', 'Active', 1, 1, 1, '2025-01-06 07:17:06', '2025-01-06 07:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_master`
--

CREATE TABLE `email_master` (
  `encrypt_id` varchar(50) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_master`
--

INSERT INTO `email_master` (`encrypt_id`, `id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'OTP For Supplier Registration Request', 'Ema-001', '[COMPANY_NAME],[OTP],[REQUESTER_NAME]', 'Active', 1, 1, NULL, '2024-02-22 00:44:38', '2024-02-22 03:52:20'),
(NULL, 2, 'Quotation / Purchase order Generated For Supplier', 'Ema-009', '[DOCUMENT_TYPE],[SUPPLIER_NAME],[DOCUMENT_ID],[URL],[CREATED_ON]', 'Active', 1, 1, NULL, '2024-02-22 00:44:23', '2024-02-22 01:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `veriable` varchar(191) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `email_master_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`encrypt_id`, `id`, `name`, `code`, `subject`, `veriable`, `content`, `email_master_id`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'OTP FOR Supplier Registration Request', 'Ema-0001', 'Login OTP', '[COMPANY_NAME],[OTP],[REQUESTER_NAME]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear <strong>[REQUESTER_NAME]</strong>,</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing [COMPANY_NAME]</span>&nbsp;as a business partner,</span></span> <span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Your one-time password (OTP) is <strong>[OTP]</strong>.</span></span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\">&nbsp;</p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">If you need any help, you can contact support@amysoftech.com.</span></span></span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span></span><span class=\"scxw25855296\">&nbsp;</span><br><span class=\"normaltextrun\"><span data-ccp-charstyle=\"Strong\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Team BIDMATE</span></span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw25855296\">&nbsp;</span><br><strong><span class=\"normaltextrun\"><span data-ccp-parastyle=\"Normal (Web)\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Note: This is an autogenerated mail, please </span>don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></strong></p>', 1, 'Active', 3, 1, 1, '2024-02-23 01:17:50', '2024-09-24 11:36:18'),
(NULL, 2, 'Quotation / Purchase order Generated For Supplier', 'Ema-0009', '[DOCUMENT_TYPE] Generated: - #[DOCUMENT_ID]', '[DOCUMENT_TYPE],[SUPPLIER_NAME],[DOCUMENT_ID],[URL],[CREATED_ON]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[DOCUMENT_TYPE]</span></span><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">&nbsp; - </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">#[DOCUMENT_ID] has been generated into your account is pending for your action.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below mentioned request details:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Raised On:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[CREATED_ON]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, </span></span></span><span xml:lang=\"EN-US\" data-contrast=\"none\">[URL]</span></p>\r\n<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> Further for any assistance, you may contact support@amysoftech.com</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw3174939\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw3174939\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 2, 'Active', 1, 1, 1, '2024-02-23 01:29:30', '2024-02-23 01:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
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
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imagable_type` varchar(191) NOT NULL,
  `imagable_id` bigint(20) UNSIGNED NOT NULL,
  `formate` varchar(50) DEFAULT NULL,
  `accessable_type` enum('Yes','No','','') NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_login`
--

CREATE TABLE `last_login` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `role_id`, `model_type`, `model_id`) VALUES
(6, 1, 'App\\Models\\User', 35),
(37, 1, 'App\\Models\\User', 34),
(39, 1, 'App\\Models\\User', 36),
(41, 1, 'App\\Models\\User', 37),
(43, 1, 'App\\Models\\User', 38),
(45, 1, 'App\\Models\\User', 39),
(47, 1, 'App\\Models\\User', 40),
(49, 1, 'App\\Models\\User', 41),
(51, 1, 'App\\Models\\User', 42),
(54, 1, 'App\\Models\\User', 46),
(63, 1, 'App\\Models\\User', 73),
(65, 1, 'App\\Models\\User', 74),
(68, 26, 'App\\Models\\User', 51),
(70, 26, 'App\\Models\\User', 61),
(76, 14, 'App\\Models\\User', 48),
(81, 26, 'App\\Models\\User', 83),
(82, 26, 'App\\Models\\User', 75),
(83, 26, 'App\\Models\\User', 99),
(86, 14, 'App\\Models\\User', 130),
(87, 2, 'App\\Models\\User', 72),
(88, 14, 'App\\Models\\User', 72),
(89, 2, 'App\\Models\\User', 144),
(90, 14, 'App\\Models\\User', 144),
(91, 14, 'App\\Models\\User', 156),
(94, 1, 'App\\Models\\User', 5),
(95, 1, 'App\\Models\\User', 8),
(96, 1, 'App\\Models\\User', 11),
(97, 1, 'App\\Models\\User', 14),
(98, 1, 'App\\Models\\User', 17),
(99, 1, 'App\\Models\\User', 20),
(100, 1, 'App\\Models\\User', 23),
(101, 14, 'App\\Models\\User', 4),
(102, 14, 'App\\Models\\User', 7),
(103, 14, 'App\\Models\\User', 10),
(104, 14, 'App\\Models\\User', 13),
(105, 14, 'App\\Models\\User', 16),
(106, 14, 'App\\Models\\User', 19),
(107, 14, 'App\\Models\\User', 22),
(108, 14, 'App\\Models\\User', 25),
(109, 14, 'App\\Models\\User', 3),
(110, 14, 'App\\Models\\User', 6),
(111, 14, 'App\\Models\\User', 9),
(112, 14, 'App\\Models\\User', 12),
(113, 14, 'App\\Models\\User', 18),
(114, 14, 'App\\Models\\User', 21),
(115, 14, 'App\\Models\\User', 24),
(116, 14, 'App\\Models\\User', 15),
(117, 26, 'App\\Models\\User', 27),
(118, 26, 'App\\Models\\User', 28),
(119, 26, 'App\\Models\\User', 26),
(120, 26, 'App\\Models\\User', 29),
(121, 26, 'App\\Models\\User', 30),
(122, 26, 'App\\Models\\User', 31),
(123, 26, 'App\\Models\\User', 33),
(124, 26, 'App\\Models\\User', 32),
(125, 2, 'App\\Models\\User', 1),
(126, 1, 'App\\Models\\User', 2),
(127, 2, 'App\\Models\\User', 2),
(128, 26, 'App\\Models\\User', 40),
(129, 26, 'App\\Models\\User', 57),
(130, 26, 'App\\Models\\User', 62),
(131, 26, 'App\\Models\\User', 66),
(132, 26, 'App\\Models\\User', 67),
(133, 14, 'App\\Models\\User', 69),
(134, 14, 'App\\Models\\User', 71),
(136, 2, 'App\\Models\\User', 76),
(138, 2, 'App\\Models\\User', 79),
(139, 14, 'App\\Models\\User', 79),
(140, 2, 'App\\Models\\User', 81),
(141, 14, 'App\\Models\\User', 81),
(142, 1, 'App\\Models\\User', 71);

-- --------------------------------------------------------

--
-- Table structure for table `modeofpayment`
--

CREATE TABLE `modeofpayment` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modeofpayment`
--

INSERT INTO `modeofpayment` (`encrypt_id`, `id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'Cash', 'Cash', 'Active', NULL, NULL),
(NULL, 2, 'Card', 'Card', 'Active', NULL, NULL),
(NULL, 3, 'Online', 'Online', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('lalsingh@amysoftech.in', '$2y$10$p5hkx2f.S3Nre8iGlWgQseZbL7U4GjDysvJGyDpsY13H/uEwZ90Wm', '2024-09-27 10:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `menu_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `menu_id`, `created_at`, `updated_at`) VALUES
(538, 'Edit Purchase order', 'web', 1, '2024-08-21 05:43:55', '2024-08-21 05:43:55'),
(539, 'View Purchase Order', 'web', 1, '2024-08-21 05:45:07', '2024-08-21 05:45:07'),
(540, 'Create Purchase Order', 'web', 1, '2024-08-21 05:45:32', '2024-08-21 05:45:32'),
(541, 'Delete Purchase Order', 'web', 1, '2024-08-21 05:45:49', '2024-08-21 05:45:49'),
(542, 'Create Product Receipt', 'web', 2, '2024-08-21 05:47:23', '2024-08-21 05:47:23'),
(543, 'View Product Receipt', 'web', 2, '2024-08-21 05:47:42', '2024-08-21 05:47:42'),
(544, 'Edit Product Receipt', 'web', 2, '2024-08-21 05:48:46', '2024-08-21 05:48:46'),
(545, 'Delete Product Receipt', 'web', 2, '2024-08-21 05:49:09', '2024-08-21 05:49:09'),
(546, 'Create Purchase Invoice', 'web', 3, '2024-08-21 05:50:19', '2024-08-21 05:50:19'),
(547, 'Edit Purchase Invoice', 'web', 3, '2024-08-21 05:51:17', '2024-08-21 05:51:17'),
(548, 'View Purchase Invoice', 'web', 3, '2024-08-21 05:51:46', '2024-08-21 05:51:46'),
(549, 'Delete Purchase Invoice', 'web', 3, '2024-08-21 05:52:10', '2024-08-21 05:52:10'),
(550, 'Create Task', 'web', 4, '2024-08-21 05:53:59', '2024-08-21 05:53:59'),
(551, 'View Task', 'web', 4, '2024-08-21 05:54:34', '2024-08-21 05:54:34'),
(552, 'Delete task', 'web', 4, '2024-08-21 05:54:51', '2024-08-21 05:54:51'),
(553, 'Edit Task', 'web', 4, '2024-08-21 05:55:24', '2024-08-21 05:55:24'),
(554, 'Create Query', 'web', 5, '2024-08-21 05:56:53', '2024-08-21 05:56:53'),
(555, 'View Query', 'web', 5, '2024-08-21 05:58:04', '2024-08-21 05:58:04'),
(556, 'Edit Query', 'web', 5, '2024-08-21 05:58:25', '2024-08-21 05:58:25'),
(557, 'Delete Query', 'web', 5, '2024-08-21 05:59:40', '2024-08-21 05:59:40'),
(558, 'Create Payments', 'web', 6, '2024-08-21 06:00:26', '2024-08-21 06:00:26'),
(559, 'View Payments', 'web', 6, '2024-08-21 06:00:44', '2024-08-21 06:00:44'),
(560, 'Edit Payments', 'web', 6, '2024-08-21 06:01:07', '2024-08-21 06:01:07'),
(561, 'Delete Payments', 'web', 6, '2024-08-21 06:01:31', '2024-08-21 06:01:31'),
(562, 'Create Tender Master', 'web', 7, '2024-08-21 06:02:13', '2024-08-21 06:02:13'),
(563, 'View Tender Master', 'web', 7, '2024-08-21 06:03:36', '2024-08-21 06:03:36'),
(564, 'Edit Tender Master', 'web', 7, '2024-08-21 06:48:18', '2024-08-21 06:48:18'),
(565, 'Delete Tender Master', 'web', 7, '2024-08-21 06:49:05', '2024-08-21 06:49:05'),
(566, 'Create Vendor Request', 'web', 8, '2024-08-21 06:50:00', '2024-08-21 06:50:00'),
(567, 'View Vendor Request', 'web', 8, '2024-08-21 06:50:19', '2024-08-21 06:50:19'),
(568, 'Edit Vendor Request', 'web', 8, '2024-08-21 06:52:38', '2024-08-21 06:52:38'),
(569, 'Delete Vendor Request', 'web', 8, '2024-08-21 06:54:08', '2024-08-21 06:54:08'),
(570, 'Create Vendors', 'web', 9, '2024-08-21 06:54:24', '2024-08-21 06:54:24'),
(571, 'View Vendors', 'web', 9, '2024-08-21 06:54:39', '2024-08-21 06:54:39'),
(572, 'Edit Vendors', 'web', 9, '2024-08-21 06:54:56', '2024-08-21 06:54:56'),
(573, 'Delete Vendors', 'web', 9, '2024-08-21 06:55:45', '2024-08-21 06:55:45'),
(578, 'Create Supplier Side', 'web', 11, '2024-08-21 06:57:35', '2024-08-21 06:57:35'),
(579, 'View Supplier Side', 'web', 11, '2024-08-21 07:07:19', '2024-08-21 07:07:19'),
(580, 'Edit Supplier Side', 'web', 11, '2024-08-21 07:07:48', '2024-08-21 07:07:48'),
(581, 'Delete Supplier Side', 'web', 11, '2024-08-21 07:08:41', '2024-08-21 07:08:41'),
(582, 'Create Quotation', 'web', 12, '2024-08-21 07:09:13', '2024-08-21 07:09:13'),
(583, 'View Quotation', 'web', 12, '2024-08-21 07:09:27', '2024-08-21 07:09:27'),
(584, 'Edit Quotation', 'web', 12, '2024-08-21 07:09:43', '2024-08-21 07:09:43'),
(585, 'Delete Quotation', 'web', 12, '2024-08-21 07:10:01', '2024-08-21 07:10:01'),
(586, 'Create Document List', 'web', 13, '2024-08-21 07:10:38', '2024-08-21 07:10:38'),
(587, 'View Document List', 'web', 13, '2024-08-21 07:10:53', '2024-08-21 07:10:53'),
(588, 'Edit Document List', 'web', 13, '2024-08-21 07:11:13', '2024-08-21 07:11:13'),
(589, 'Delete Document List', 'web', 13, '2024-08-21 07:11:41', '2024-08-21 07:11:41'),
(590, 'Create Purchase Request', 'web', 14, '2024-08-21 07:12:15', '2024-08-21 07:12:15'),
(591, 'View Purchase Request', 'web', 14, '2024-08-21 07:12:34', '2024-08-21 07:12:34'),
(592, 'Edit Purchase Request', 'web', 14, '2024-08-21 07:12:48', '2024-08-21 07:12:48'),
(593, 'Delete Purchase Request', 'web', 14, '2024-08-21 07:13:05', '2024-08-21 07:13:05'),
(594, 'Create RFI/EOI', 'web', 15, '2024-08-21 07:16:51', '2024-08-21 07:16:51'),
(595, 'View RFI/EOI', 'web', 15, '2024-08-21 07:17:07', '2024-08-21 07:17:07'),
(596, 'Edit RFI/EOI', 'web', 15, '2024-08-21 07:17:24', '2024-08-21 07:17:24'),
(597, 'Delete RFI/EOI', 'web', 15, '2024-08-21 07:17:38', '2024-08-21 07:17:38'),
(598, 'Create Auction', 'web', 16, '2024-08-21 07:18:00', '2024-08-21 07:18:00'),
(599, 'View Auction', 'web', 16, '2024-08-21 07:18:19', '2024-08-21 07:18:19'),
(600, 'Edit Auction', 'web', 16, '2024-08-21 07:18:50', '2024-08-21 07:18:50'),
(601, 'Delete Auction', 'web', 16, '2024-08-21 07:19:05', '2024-08-21 07:19:05'),
(602, 'Create Reports', 'web', 17, '2024-08-21 07:21:20', '2024-08-21 07:21:20'),
(603, 'View Reports', 'web', 17, '2024-08-21 07:21:39', '2024-08-21 07:21:39'),
(604, 'Edit Reports', 'web', 17, '2024-08-21 07:21:53', '2024-08-21 07:21:53'),
(605, 'Delete Reports', 'web', 17, '2024-08-21 07:22:22', '2024-08-21 07:22:22'),
(606, 'Employee Dashboard', 'web', 18, '2024-09-03 14:20:03', '2024-09-03 14:20:03'),
(607, 'Vendor Dashboard', 'web', 18, '2024-09-03 14:20:25', '2024-09-03 14:20:25'),
(608, 'Create PBG', 'web', 19, '2024-09-04 04:18:51', '2024-09-04 04:18:51'),
(609, 'Edit PBG', 'web', 19, '2024-09-04 04:19:08', '2024-09-04 04:19:08'),
(610, 'View PBG', 'web', 19, '2024-09-04 04:19:22', '2024-09-04 04:19:22'),
(611, 'Create GRN', 'web', 20, '2024-09-04 04:19:47', '2024-09-04 04:19:47'),
(612, 'Edit GRN', 'web', 20, '2024-09-04 04:20:04', '2024-09-04 04:20:04'),
(613, 'View GRN', 'web', 20, '2024-09-04 04:20:22', '2024-09-04 04:20:22'),
(614, 'Delete GRN', 'web', 20, '2024-09-04 04:20:43', '2024-09-04 04:20:43'),
(615, 'Create Notice & Communication', 'web', 21, '2024-09-04 04:21:47', '2024-09-04 04:21:47'),
(616, 'View Notice & Communication', 'web', 21, '2024-09-04 04:22:07', '2024-09-04 04:22:07'),
(617, 'Edit Notice & Communication', 'web', 21, '2024-09-04 04:22:27', '2024-09-04 04:22:27'),
(618, 'Delete Notice & Communication', 'web', 21, '2024-09-04 04:22:46', '2024-09-04 04:22:46'),
(619, 'Pending Vendor', 'web', 8, '2024-09-04 04:41:02', '2024-09-04 04:41:02'),
(620, 'Approved Vendor', 'web', 8, '2024-09-04 04:41:30', '2024-09-04 04:41:30'),
(621, 'In Review Vendor', 'web', 8, '2024-09-04 04:46:50', '2024-09-04 04:46:50'),
(622, 'Blocked Vendor List', 'web', 9, '2024-09-04 04:48:30', '2024-09-04 04:48:30'),
(623, 'Approved Vendor List', 'web', 9, '2024-09-04 04:49:01', '2024-09-04 04:49:01'),
(624, 'Rejected Vendor List', 'web', 9, '2024-09-04 04:50:55', '2024-09-04 04:50:55'),
(625, 'Delete PBG', 'web', 19, '2024-09-04 05:11:08', '2024-09-04 05:11:08'),
(626, 'Master Setup', 'web', 10, '2024-09-04 12:49:28', '2024-09-04 12:49:28'),
(627, 'Contracts List', 'web', 22, '2024-09-04 12:59:13', '2024-09-04 12:59:13'),
(628, 'GRN Invoice Generated', 'web', 20, '2024-09-04 13:21:24', '2024-09-04 13:21:24'),
(629, 'InReview GRN', 'web', 20, '2024-09-04 13:21:39', '2024-09-04 13:21:39'),
(630, 'All GRN List', 'web', 20, '2024-09-04 13:21:55', '2024-09-04 13:21:55'),
(631, 'Rejected GRN', 'web', 20, '2024-09-04 13:22:09', '2024-09-04 13:22:09'),
(632, 'Approved GRN', 'web', 20, '2024-09-04 13:22:22', '2024-09-04 13:22:22'),
(633, 'All Workflow Status', 'web', 4, '2024-09-04 13:24:56', '2024-09-04 13:24:56'),
(634, 'Workflow', 'web', 4, '2024-09-04 13:25:08', '2024-09-04 13:25:08'),
(635, 'All Vendor Request List', 'web', 8, '2024-09-04 13:26:45', '2024-09-04 13:26:45'),
(636, 'InReview Purchase Order', 'web', 1, '2024-09-04 13:31:26', '2024-09-04 13:31:26'),
(637, 'Rejected Purchase Order', 'web', 1, '2024-09-04 13:31:40', '2024-09-04 13:31:40'),
(638, 'Approved Purchase Order', 'web', 1, '2024-09-04 13:31:58', '2024-09-04 13:31:58'),
(639, 'All Purchase Order List', 'web', 1, '2024-09-04 13:32:49', '2024-09-04 13:32:49'),
(640, 'Quotation Generated Purchase Request', 'web', 14, '2024-09-04 13:52:40', '2024-09-04 13:52:40'),
(641, 'PO Generated Quotations', 'web', 12, '2024-09-04 13:53:14', '2024-09-04 13:53:14'),
(642, 'InReview Quotation', 'web', 12, '2024-09-04 13:54:55', '2024-09-04 13:54:55'),
(643, 'Rejected Quotation', 'web', 12, '2024-09-04 13:55:13', '2024-09-04 13:55:13'),
(644, 'Approved Quotation', 'web', 12, '2024-09-04 13:55:28', '2024-09-04 13:55:28'),
(645, 'Awarded Quotation', 'web', 12, '2024-09-04 13:55:46', '2024-09-04 13:55:46'),
(646, 'All Quotation List', 'web', 12, '2024-09-04 13:56:13', '2024-09-04 13:56:13'),
(647, 'EOI Published List', 'web', 15, '2024-09-04 13:57:21', '2024-09-04 13:57:21'),
(648, 'Create EOI Development', 'web', 15, '2024-09-04 13:57:38', '2024-09-04 13:57:38'),
(649, 'EOI Development List', 'web', 15, '2024-09-04 13:57:55', '2024-09-04 13:57:55'),
(650, 'View Vendor Dashboard', 'web', 7, '2024-09-09 13:47:43', '2024-09-09 13:47:43'),
(651, 'View Tender Dashboard', 'web', 7, '2024-09-09 13:52:52', '2024-09-09 13:52:52'),
(652, 'Add Generate Query', 'web', 17, '2024-09-27 04:15:37', '2024-09-27 04:15:37'),
(653, 'Delete Generate Query', 'web', 17, '2024-09-27 04:15:59', '2024-09-27 04:15:59'),
(654, 'Execute Generate Query', 'web', 17, '2024-09-27 04:16:17', '2024-09-27 04:16:17'),
(655, 'Store Generated Query', 'web', 17, '2024-09-27 04:16:40', '2024-09-27 04:16:40'),
(656, 'Generated Queries List', 'web', 17, '2024-09-27 04:17:06', '2024-09-27 04:17:06'),
(657, 'All Purchase Request List', 'web', 14, '2024-09-27 09:37:06', '2024-09-27 09:37:06'),
(658, 'Purchase Order List', 'web', 1, '2024-10-01 05:18:53', '2024-10-01 05:18:53'),
(659, 'Purchase Request List', 'web', 14, '2024-10-01 11:54:43', '2024-10-01 11:54:43'),
(660, 'Master Permission', 'web', 23, '2024-10-18 09:36:05', '2024-10-18 09:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
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
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `guard_name`, `created_at`, `updated_at`, `deleted_at`, `description`) VALUES
(1, 'Admin', 'Active', 'web', '2023-11-08 11:08:16', '2024-04-04 05:58:16', NULL, 'admin'),
(2, 'Super Admin', 'Active', 'web', '2023-11-09 05:15:05', '2023-11-09 05:15:14', NULL, NULL),
(14, 'Employee', 'Active', 'web', '2024-04-04 05:55:27', '2024-04-04 05:55:27', NULL, 'Employee'),
(26, 'Vendor', 'Active', 'web', '2024-09-03 14:15:01', '2024-09-03 14:15:01', NULL, NULL);

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
(538, 1),
(538, 2),
(538, 14),
(539, 1),
(539, 2),
(539, 14),
(539, 26),
(540, 2),
(540, 14),
(541, 1),
(541, 2),
(541, 14),
(542, 1),
(543, 1),
(544, 1),
(545, 1),
(546, 2),
(546, 14),
(547, 1),
(547, 2),
(547, 14),
(548, 1),
(548, 2),
(548, 14),
(548, 26),
(549, 1),
(549, 2),
(549, 14),
(550, 2),
(550, 14),
(551, 1),
(551, 2),
(551, 14),
(552, 1),
(552, 2),
(552, 14),
(553, 1),
(553, 2),
(553, 14),
(554, 2),
(554, 14),
(555, 1),
(555, 2),
(555, 14),
(556, 1),
(556, 2),
(556, 14),
(557, 1),
(557, 2),
(557, 14),
(558, 2),
(558, 14),
(559, 1),
(559, 2),
(559, 14),
(559, 26),
(560, 1),
(560, 2),
(560, 14),
(561, 1),
(561, 2),
(561, 14),
(562, 2),
(562, 14),
(563, 1),
(563, 2),
(563, 14),
(563, 26),
(564, 1),
(564, 2),
(564, 14),
(565, 1),
(565, 2),
(565, 14),
(566, 1),
(566, 2),
(566, 14),
(567, 1),
(567, 2),
(567, 14),
(568, 1),
(568, 2),
(568, 14),
(569, 1),
(569, 2),
(569, 14),
(570, 1),
(570, 2),
(570, 14),
(571, 1),
(571, 2),
(571, 14),
(572, 1),
(572, 2),
(572, 14),
(573, 1),
(573, 2),
(573, 14),
(579, 26),
(582, 2),
(582, 14),
(583, 1),
(583, 14),
(583, 26),
(584, 1),
(584, 2),
(584, 14),
(585, 1),
(585, 2),
(585, 14),
(590, 2),
(590, 14),
(591, 1),
(591, 2),
(591, 14),
(592, 1),
(592, 2),
(592, 14),
(593, 1),
(593, 2),
(593, 14),
(594, 2),
(594, 14),
(595, 1),
(595, 2),
(595, 14),
(595, 26),
(596, 1),
(596, 2),
(596, 14),
(597, 1),
(597, 2),
(598, 2),
(599, 1),
(599, 2),
(599, 26),
(600, 1),
(600, 2),
(601, 2),
(606, 1),
(606, 2),
(606, 14),
(607, 1),
(607, 26),
(608, 2),
(608, 14),
(609, 2),
(609, 14),
(610, 2),
(610, 14),
(611, 1),
(611, 2),
(611, 14),
(611, 26),
(612, 1),
(612, 2),
(612, 14),
(612, 26),
(613, 1),
(613, 2),
(613, 14),
(613, 26),
(614, 1),
(614, 2),
(614, 14),
(615, 2),
(616, 2),
(617, 2),
(618, 2),
(619, 1),
(619, 2),
(619, 14),
(620, 1),
(620, 2),
(620, 14),
(621, 1),
(621, 2),
(621, 14),
(622, 1),
(622, 2),
(622, 14),
(623, 1),
(623, 2),
(623, 14),
(624, 1),
(624, 2),
(624, 14),
(625, 2),
(625, 14),
(626, 1),
(626, 2),
(627, 2),
(628, 1),
(628, 2),
(628, 14),
(628, 26),
(629, 1),
(629, 2),
(629, 14),
(629, 26),
(630, 1),
(630, 2),
(630, 14),
(631, 1),
(631, 2),
(631, 14),
(632, 1),
(632, 2),
(632, 14),
(633, 1),
(633, 2),
(633, 14),
(634, 1),
(634, 2),
(634, 14),
(635, 1),
(635, 2),
(635, 14),
(636, 1),
(636, 2),
(636, 14),
(637, 1),
(637, 2),
(637, 14),
(638, 1),
(638, 2),
(638, 14),
(639, 1),
(639, 2),
(639, 14),
(640, 1),
(640, 2),
(640, 14),
(641, 1),
(641, 2),
(641, 14),
(642, 1),
(642, 2),
(642, 14),
(643, 1),
(643, 2),
(643, 14),
(644, 1),
(644, 2),
(644, 14),
(645, 1),
(645, 2),
(645, 14),
(646, 1),
(646, 2),
(646, 14),
(647, 1),
(647, 2),
(647, 14),
(648, 1),
(648, 2),
(648, 14),
(649, 1),
(649, 2),
(649, 14),
(650, 1),
(650, 2),
(650, 14),
(651, 1),
(651, 2),
(651, 14),
(652, 2),
(653, 2),
(654, 2),
(655, 2),
(656, 2),
(657, 1),
(657, 2),
(657, 14),
(658, 1),
(658, 14),
(659, 1),
(659, 14),
(660, 1),
(660, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` double(5,3) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`encrypt_id`, `id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(NULL, 1, 5.000, 'Tax-0001', 'Vat 5%', 'Active', 1, 1, NULL, '2025-01-12 09:52:24', '2025-01-12 09:52:24'),
(NULL, 2, 10.000, 'Tax-0002', 'Vat 10%', 'Active', 1, 1, NULL, '2025-01-12 09:52:37', '2025-01-12 09:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu_setting`
--

CREATE TABLE `tblmenu_setting` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menuname` varchar(255) DEFAULT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblmenu_setting`
--

INSERT INTO `tblmenu_setting` (`encrypt_id`, `id`, `user_id`, `menuname`, `groupName`, `status`, `position`, `created_at`, `updated_at`) VALUES
(NULL, 1, 1, 'Purchase Order', 'Purchase Order', 'Active', 1, NULL, NULL),
(NULL, 2, 1, 'Product Receipts', 'Product Receipts', 'Active', 2, NULL, NULL),
(NULL, 3, 1, 'Purchase invoices', 'Purchase invoices', 'Active', 3, NULL, NULL),
(NULL, 4, 1, 'All Task', 'All Task', 'Active', 4, NULL, NULL),
(NULL, 5, 1, 'Query', 'Query', 'Active', 5, NULL, NULL),
(NULL, 6, 1, 'Payments', 'Payments', 'Active', 6, NULL, NULL),
(NULL, 7, 1, 'Tender Master', 'Tender Master', 'Active', 7, NULL, NULL),
(NULL, 8, 1, 'Vendor Request', 'Vendor Request', 'Active', 8, NULL, NULL),
(NULL, 9, 1, 'Vendors', 'Vendors', 'Active', 9, NULL, NULL),
(NULL, 10, 1, 'Settings', 'Settings', 'Active', 10, NULL, NULL),
(NULL, 11, 1, 'Supplier Side', 'Supplier Side', 'Active', 11, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 12, 1, 'Quotation', 'Quotation', 'Active', 12, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 13, 1, 'Document List', 'Document List', 'Active', 13, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 14, 1, 'purchase request', 'purchase request', 'Active', 14, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 15, 1, 'RFI/EOI', 'RFI/EOI', 'Active', 15, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 16, 1, 'Auction', 'Auction', 'Active', 16, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 17, 1, 'Reports', 'Reports', 'Active', 17, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 18, 1, 'Dashboard', 'Dashboard', 'Active', 18, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 19, 1, 'PBG', 'PBG', 'Active', 19, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 20, 1, 'GRN', 'GRN', 'Active', 20, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 21, 1, 'Notice & Communication', 'Notice & Communication', 'Active', 21, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 22, 1, 'Contracts', 'Contracts', 'Active', 22, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(NULL, 23, 1, 'Master Permission', 'Master Permission', 'Active', 23, '2024-01-05 08:54:12', '2024-01-05 08:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alertlog`
--

CREATE TABLE `tbl_alertlog` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `eoi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `email_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `communication_id` bigint(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `exception` varchar(20) DEFAULT NULL,
  `emp_id` bigint(20) DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_alertlog`
--

INSERT INTO `tbl_alertlog` (`encrypt_id`, `id`, `tender_id`, `auction_id`, `eoi_id`, `type`, `email_id`, `created_at`, `updated_at`, `communication_id`, `status`, `exception`, `emp_id`, `vendor_id`) VALUES
(NULL, 38, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-20 04:29:02', '2024-09-20 04:29:02', 8, 'Sent', NULL, NULL, 81),
(NULL, 39, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-20 04:29:04', '2024-09-20 04:29:04', 8, 'Sent', NULL, NULL, 57),
(NULL, 40, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-23 05:26:36', '2024-09-23 05:26:36', 8, 'Sent', NULL, NULL, 81),
(NULL, 41, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-23 05:26:41', '2024-09-23 05:26:41', 8, 'Sent', NULL, NULL, 57),
(NULL, 42, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-23 11:28:25', '2024-09-23 11:28:25', 11, 'Sent', NULL, NULL, 81),
(NULL, 43, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-23 11:28:28', '2024-09-23 11:28:28', 11, 'Sent', NULL, NULL, 57),
(NULL, 44, 30, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-23 11:28:29', '2024-09-23 11:28:29', 12, 'Sent', NULL, NULL, 57),
(NULL, 45, 30, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-23 11:28:30', '2024-09-23 11:28:30', 12, 'Sent', NULL, NULL, 81),
(NULL, 46, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-26 09:15:24', '2024-09-26 09:15:24', 14, 'Sent', NULL, NULL, 81),
(NULL, 47, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-26 09:15:24', '2024-09-26 09:15:24', 14, 'Sent', NULL, NULL, 57),
(NULL, 48, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-26 09:23:27', '2024-09-26 09:23:27', 15, 'Sent', NULL, NULL, 81),
(NULL, 49, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-26 09:23:28', '2024-09-26 09:23:28', 15, 'Sent', NULL, NULL, 57);

-- --------------------------------------------------------

--
-- Table structure for table `time_zone`
--

CREATE TABLE `time_zone` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_zone`
--

INSERT INTO `time_zone` (`encrypt_id`, `id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(NULL, 1, '+04:30', 'Tim-0001', 'Asia/Kabul', 'Active', 1, 1, NULL, '2025-01-07 20:06:23', '2025-01-07 20:06:23'),
(NULL, 2, '+01:00', 'Tim-0002', 'Europe/Tirane', 'Active', 1, 1, NULL, '2025-01-07 20:06:39', '2025-01-07 20:06:39'),
(NULL, 3, '+01:00', 'Tim-0003', 'Africa/Algiers', 'Active', 1, 1, NULL, '2025-01-07 16:11:02', '2025-01-07 16:11:02'),
(NULL, 4, '-11:00', 'Tim-0004', 'Pacific/Pago_Pago', 'Active', 1, 1, NULL, '2025-01-07 16:15:00', '2025-01-07 16:15:00'),
(NULL, 5, '+01:00', 'Tim-0005', 'Europe/Andorra', 'Active', 1, 1, NULL, '2025-01-07 16:15:16', '2025-01-07 16:15:16'),
(NULL, 6, '+01:00', 'Tim-0006', 'Africa/Luanda', 'Active', 1, 1, NULL, '2025-01-07 16:15:32', '2025-01-07 16:15:32'),
(NULL, 7, '-04:00', 'Tim-0007', 'America/Anguilla', 'Active', 1, 1, NULL, '2025-01-07 16:18:11', '2025-01-07 16:18:11'),
(NULL, 8, '+08:00', 'Tim-0008', 'Antarctica/Casey', 'Active', 1, 1, NULL, '2025-01-07 16:18:46', '2025-01-07 16:18:46'),
(NULL, 9, '+07:00', 'Tim-0009', 'Antarctica/Davis', 'Active', 1, 1, NULL, '2025-01-07 16:21:24', '2025-01-07 16:21:24'),
(NULL, 10, 'UTC +10:00', 'Tim-0010', 'Antarctica/DumontDUrville', 'Active', 1, 1, NULL, '2025-01-07 16:21:41', '2025-01-07 16:21:41'),
(NULL, 11, '+05:00', 'Tim-0011', 'Antarctica/Mawson', 'Active', 1, 1, NULL, '2025-01-07 16:22:00', '2025-01-07 16:22:00'),
(NULL, 12, '+13:00', 'Tim-0012', 'Antarctica/McMurdo', 'Active', 1, 1, NULL, '2025-01-07 16:22:16', '2025-01-07 16:22:16'),
(NULL, 13, '-03:00', 'Tim-0013', 'Antarctica/Palmer', 'Active', 1, 1, NULL, '2025-01-07 16:22:37', '2025-01-07 16:22:37'),
(NULL, 14, '-03:00', 'Tim-0014', 'Antarctica/Rothera', 'Active', 1, 1, NULL, '2025-01-07 16:30:22', '2025-01-07 16:30:22'),
(NULL, 15, '+03:00', 'Tim-0015', 'Antarctica/Syowa', 'Active', 1, 1, NULL, '2025-01-07 16:30:38', '2025-01-07 16:30:38'),
(NULL, 16, '+05:00', 'Tim-0016', 'Antarctica/Vostok', 'Active', 1, 1, NULL, '2025-01-07 16:30:56', '2025-01-07 16:30:56'),
(NULL, 17, '-04:00', 'Tim-0017', 'America/Antigua', 'Active', 1, 1, NULL, '2025-01-07 16:31:12', '2025-01-07 16:31:12'),
(NULL, 18, '-03:00', 'Tim-0018', 'America/Argentina/Buenos_Aires', 'Active', 1, 1, NULL, '2025-01-07 16:31:33', '2025-01-07 16:31:33'),
(NULL, 19, '-03:00', 'Tim-0019', 'America/Argentina/Catamarca', 'Active', 1, 1, NULL, '2025-01-07 16:34:19', '2025-01-07 16:34:19'),
(NULL, 20, '-03:00', 'Tim-0020', 'America/Argentina/Cordoba', 'Active', 1, 1, NULL, '2025-01-07 16:34:42', '2025-01-07 16:34:42'),
(NULL, 21, '-03:00', 'Tim-0021', 'America/Argentina/Jujuy', 'Active', 1, 1, NULL, '2025-01-07 16:35:06', '2025-01-07 16:35:06'),
(NULL, 22, '-03:00', 'Tim-0022', 'America/Argentina/La_Rioja', 'Active', 1, 1, NULL, '2025-01-07 16:35:20', '2025-01-07 16:35:20'),
(NULL, 23, '-03:00', 'Tim-0023', 'America/Argentina/Mendoza', 'Active', 1, 1, NULL, '2025-01-07 16:35:48', '2025-01-07 16:35:48'),
(NULL, 24, '-03:00', 'Tim-0024', 'America/Argentina/Rio_Gallegos', 'Active', 1, 1, NULL, '2025-01-07 16:36:10', '2025-01-07 16:36:10'),
(NULL, 25, '-03:00', 'Tim-0025', 'America/Argentina/Salta', 'Active', 1, 1, NULL, '2025-01-07 16:36:30', '2025-01-07 16:36:30'),
(NULL, 26, '-03:00', 'Tim-0026', 'America/Argentina/San_Juan', 'Active', 1, 1, NULL, '2025-01-07 16:37:20', '2025-01-07 16:37:20'),
(NULL, 27, '-03:00', 'Tim-0027', 'America/Argentina/San_Luis', 'Active', 1, 1, NULL, '2025-01-07 16:37:44', '2025-01-07 16:37:44'),
(NULL, 28, '-03:00', 'Tim-0028', 'America/Argentina/Tucuman', 'Active', 1, 1, NULL, '2025-01-07 16:37:55', '2025-01-07 16:37:55'),
(NULL, 29, '-03:00', 'Tim-0029', 'America/Argentina/Ushuaia', 'Active', 1, 1, NULL, '2025-01-07 17:02:13', '2025-01-07 17:02:13'),
(NULL, 30, '+04:00', 'Tim-0030', 'Asia/Yerevan', 'Active', 1, 1, NULL, '2025-01-07 17:02:36', '2025-01-07 17:02:36'),
(NULL, 31, '-04:00', 'Tim-0031', 'America/Aruba', 'Active', 1, 1, NULL, '2025-01-07 17:02:53', '2025-01-07 17:02:53'),
(NULL, 32, '+11:00', 'Tim-0032', 'Antarctica/Macquarie', 'Active', 1, 1, NULL, '2025-01-07 17:03:46', '2025-01-07 17:03:46'),
(NULL, 33, '+10:30', 'Tim-0033', 'Australia/Adelaide', 'Active', 1, 1, NULL, '2025-01-07 17:04:02', '2025-01-07 17:04:02'),
(NULL, 34, '+10:00', 'Tim-0034', 'Australia/Brisbane', 'Active', 1, 1, NULL, '2025-01-07 17:04:22', '2025-01-07 17:04:22'),
(NULL, 35, '+10:30', 'Tim-0035', 'Australia/Broken_Hill', 'Active', 1, 1, NULL, '2025-01-07 17:04:46', '2025-01-07 17:04:46'),
(NULL, 36, '+09:30', 'Tim-0036', 'Australia/Darwin', 'Active', 1, 1, NULL, '2025-01-07 17:05:00', '2025-01-07 17:05:00'),
(NULL, 37, '+08:45', 'Tim-0037', 'Australia/Eucla', 'Active', 1, 1, NULL, '2025-01-07 17:05:15', '2025-01-07 17:05:15'),
(NULL, 38, '+11:00', 'Tim-0038', 'Australia/Hobart', 'Active', 1, 1, NULL, '2025-01-07 17:05:31', '2025-01-07 17:05:31'),
(NULL, 39, '+10:00', 'Tim-0039', 'Australia/Lindeman', 'Active', 1, 1, NULL, '2025-01-07 17:05:45', '2025-01-07 17:05:45'),
(NULL, 40, '+11:00', 'Tim-0040', 'Australia/Lord_Howe', 'Active', 1, 1, NULL, '2025-01-07 17:06:18', '2025-01-07 17:06:18'),
(NULL, 41, '+11:00', 'Tim-0041', 'Australia/Melbourne', 'Active', 1, 1, NULL, '2025-01-07 17:06:48', '2025-01-07 17:06:48'),
(NULL, 42, '+08:00', 'Tim-0042', 'Australia/Perth', 'Active', 1, 1, NULL, '2025-01-07 17:07:06', '2025-01-07 17:07:06'),
(NULL, 43, '+11:00', 'Tim-0043', 'Australia/Sydney', 'Active', 1, 1, NULL, '2025-01-07 17:07:30', '2025-01-07 17:07:30'),
(NULL, 44, '+01:00', 'Tim-0044', 'Europe/Vienna', 'Active', 1, 1, NULL, '2025-01-07 17:07:46', '2025-01-07 17:07:46'),
(NULL, 45, '+04:00', 'Tim-0045', 'Asia/Baku', 'Active', 1, 1, NULL, '2025-01-07 17:08:18', '2025-01-07 17:08:18'),
(NULL, 46, '-05:00', 'Tim-0046', 'America/Nassau', 'Active', 1, 1, NULL, '2025-01-07 17:11:14', '2025-01-07 17:11:14'),
(NULL, 47, '+03:00', 'Tim-0047', 'Asia/Bahrain', 'Active', 1, 1, NULL, '2025-01-07 17:11:54', '2025-01-07 17:11:54'),
(NULL, 48, '+06:00', 'Tim-0048', 'Asia/Dhaka', 'Active', 1, 1, NULL, '2025-01-07 17:12:22', '2025-01-07 17:12:22'),
(NULL, 49, '-04:00', 'Tim-0049', 'America/Barbados', 'Active', 1, 1, NULL, '2025-01-07 12:13:13', '2025-01-07 12:13:13'),
(NULL, 50, '+03:00', 'Tim-0050', 'Europe/Minsk', 'Active', 1, 1, NULL, '2025-01-07 12:13:28', '2025-01-07 12:13:28'),
(NULL, 51, '+01:00', 'Tim-0051', 'Europe/Brussels', 'Active', 1, 1, NULL, '2025-01-07 12:13:48', '2025-01-07 12:13:48'),
(NULL, 52, '-06:00', 'Tim-0052', 'America/Belize', 'Active', 1, 1, NULL, '2025-01-07 12:14:11', '2025-01-07 12:14:11'),
(NULL, 53, '+01:00', 'Tim-0053', 'Africa/Porto-Novo', 'Active', 1, 1, NULL, '2025-01-07 12:14:26', '2025-01-07 12:14:26'),
(NULL, 54, '-04:00', 'Tim-0054', 'Atlantic/Bermuda', 'Active', 1, 1, NULL, '2025-01-07 12:39:21', '2025-01-07 12:39:21'),
(NULL, 55, '+06:00', 'Tim-0055', 'Asia/Thimphu', 'Active', 1, 1, NULL, '2025-01-07 12:39:38', '2025-01-07 12:39:38'),
(NULL, 56, '-04:00', 'Tim-0056', 'America/La_Paz', 'Active', 1, 1, NULL, '2025-01-07 12:40:05', '2025-01-07 12:40:05'),
(NULL, 57, '-04:00', 'Tim-0057', 'America/Kralendijk', 'Active', 1, 1, NULL, '2025-01-07 12:40:25', '2025-01-07 12:40:25'),
(NULL, 58, '+01:00', 'Tim-0058', 'Europe/Sarajevo', 'Active', 1, 1, NULL, '2025-01-07 12:40:46', '2025-01-07 12:40:46'),
(NULL, 59, '+02:00', 'Tim-0059', 'Africa/Gaborone', 'Active', 1, 1, NULL, '2025-01-07 12:41:16', '2025-01-07 12:41:16'),
(NULL, 60, '-03:00', 'Tim-0060', 'America/Araguaina', 'Active', 1, 1, NULL, '2025-01-07 12:41:47', '2025-01-07 12:41:47'),
(NULL, 61, '-03:00', 'Tim-0061', 'America/Bahia', 'Active', 1, 1, NULL, '2025-01-07 12:42:02', '2025-01-07 12:42:02'),
(NULL, 62, '-03:00', 'Tim-0062', 'America/Belem', 'Active', 1, 1, NULL, '2025-01-07 12:42:19', '2025-01-07 12:42:19'),
(NULL, 63, '-04:00', 'Tim-0063', 'America/Boa_Vista', 'Active', 1, 1, NULL, '2025-01-07 12:42:32', '2025-01-07 12:42:32'),
(NULL, 64, '-04:00', 'Tim-0064', 'America/Campo_Grande', 'Active', 1, 1, NULL, '2025-01-07 12:43:09', '2025-01-07 12:43:09'),
(NULL, 65, '-04:00', 'Tim-0065', 'America/Cuiaba', 'Active', 1, 1, NULL, '2025-01-07 12:45:03', '2025-01-07 12:45:03'),
(NULL, 66, '-05:00', 'Tim-0066', 'America/Eirunepe', 'Active', 1, 1, NULL, '2025-01-07 12:45:31', '2025-01-07 12:45:31'),
(NULL, 67, '-03:00', 'Tim-0067', 'America/Fortaleza', 'Active', 1, 1, NULL, '2025-01-07 12:46:00', '2025-01-07 12:46:00'),
(NULL, 68, '-03:00', 'Tim-0068', 'America/Maceio', 'Active', 1, 1, NULL, '2025-01-07 12:46:23', '2025-01-07 12:46:23'),
(NULL, 69, '-04:00', 'Tim-0069', 'America/Manaus', 'Active', 1, 1, NULL, '2025-01-07 12:46:36', '2025-01-07 12:46:36'),
(NULL, 70, '-02:00', 'Tim-0070', 'America/Noronha', 'Active', 1, 1, NULL, '2025-01-07 12:46:53', '2025-01-07 12:46:53'),
(NULL, 71, '-04:00', 'Tim-0071', 'America/Porto_Velho', 'Active', 1, 1, NULL, '2025-01-07 12:47:11', '2025-01-07 12:47:11'),
(NULL, 72, '-03:00', 'Tim-0072', 'America/Recife', 'Active', 1, 1, NULL, '2025-01-07 12:47:31', '2025-01-07 12:47:31'),
(NULL, 73, '-05:00', 'Tim-0073', 'America/Rio_Branco', 'Active', 1, 1, NULL, '2025-01-07 12:47:46', '2025-01-07 12:47:46'),
(NULL, 74, '-03:00', 'Tim-0074', 'America/Santarem', 'Active', 1, 1, NULL, '2025-01-07 12:48:05', '2025-01-07 12:48:05'),
(NULL, 75, '-03:00', 'Tim-0075', 'America/Sao_Paulo', 'Active', 1, 1, NULL, '2025-01-07 12:48:48', '2025-01-07 12:48:48'),
(NULL, 76, '+06:00', 'Tim-0076', 'Indian/Chagos', 'Active', 1, 1, NULL, '2025-01-07 12:49:18', '2025-01-07 12:49:18'),
(NULL, 77, '+08:00', 'Tim-0077', 'Asia/Brunei', 'Active', 1, 1, NULL, '2025-01-07 12:49:43', '2025-01-07 12:49:43'),
(NULL, 78, '+02:00', 'Tim-0078', 'Europe/Sofia', 'Active', 1, 1, NULL, '2025-01-07 12:50:13', '2025-01-07 12:50:13'),
(NULL, 79, '+02:00', 'Tim-0079', 'Africa/Bujumbura', 'Active', 1, 1, NULL, '2025-01-07 12:50:29', '2025-01-07 12:50:29'),
(NULL, 80, '+07:00', 'Tim-0080', 'Asia/Phnom_Penh', 'Active', 1, 1, NULL, '2025-01-07 12:50:46', '2025-01-07 12:50:46'),
(NULL, 81, '+01:00', 'Tim-0081', 'Africa/Douala', 'Active', 1, 1, NULL, '2025-01-07 12:51:05', '2025-01-07 12:51:05'),
(NULL, 82, '-05:00', 'Tim-0082', 'America/Atikokan', 'Active', 1, 1, NULL, '2025-01-07 12:51:36', '2025-01-07 12:51:36'),
(NULL, 83, '-04:00', 'Tim-0083', 'America/Blanc-Sablon', 'Active', 1, 1, NULL, '2025-01-07 12:51:58', '2025-01-07 12:51:58'),
(NULL, 84, '-07:00', 'Tim-0084', 'America/Cambridge_Bay', 'Active', 1, 1, NULL, '2025-01-07 12:52:21', '2025-01-07 12:52:21'),
(NULL, 85, '-07:00', 'Tim-0085', 'America/Creston', 'Active', 1, 1, NULL, '2025-01-07 12:52:37', '2025-01-07 12:52:37'),
(NULL, 86, '-07:00', 'Tim-0086', 'America/Dawson', 'Active', 1, 1, NULL, '2025-01-07 12:52:53', '2025-01-07 12:52:53'),
(NULL, 87, '-07:00', 'Tim-0087', 'America/Dawson_Creek', 'Active', 1, 1, NULL, '2025-01-07 12:53:10', '2025-01-07 12:53:10'),
(NULL, 88, '-07:00', 'Tim-0088', 'America/Edmonton', 'Active', 1, 1, NULL, '2025-01-07 12:53:36', '2025-01-07 12:53:36'),
(NULL, 89, '-07:00', 'Tim-0089', 'America/Fort_Nelson', 'Active', 1, 1, NULL, '2025-01-07 12:53:55', '2025-01-07 12:53:55'),
(NULL, 90, '-04:00', 'Tim-0090', 'America/Glace_Bay', 'Active', 1, 1, NULL, '2025-01-07 12:54:15', '2025-01-07 12:54:15'),
(NULL, 91, '-04:00', 'Tim-0091', 'America/Goose_Bay', 'Active', 1, 1, NULL, '2025-01-07 12:54:39', '2025-01-07 12:54:39'),
(NULL, 92, '-04:00', 'Tim-0092', 'America/Halifax', 'Active', 1, 1, NULL, '2025-01-07 12:54:57', '2025-01-07 12:54:57'),
(NULL, 93, '-07:00', 'Tim-0093', 'America/Inuvik', 'Active', 1, 1, NULL, '2025-01-07 12:55:14', '2025-01-07 12:55:14'),
(NULL, 94, '-05:00', 'Tim-0094', 'America/Iqaluit', 'Active', 1, 1, NULL, '2025-01-07 12:55:29', '2025-01-07 12:55:29'),
(NULL, 95, '-04:00', 'Tim-0095', 'America/Moncton', 'Active', 1, 1, NULL, '2025-01-07 12:55:45', '2025-01-07 12:55:45'),
(NULL, 96, '-06:00', 'Tim-0096', 'America/Rankin_Inlet', 'Active', 1, 1, NULL, '2025-01-07 12:56:01', '2025-01-07 12:56:01'),
(NULL, 97, '-06:00', 'Tim-0097', 'America/Regina', 'Active', 1, 1, NULL, '2025-01-07 12:56:32', '2025-01-07 12:56:32'),
(NULL, 98, '-06:00', 'Tim-0098', 'America/Resolute', 'Active', 1, 1, NULL, '2025-01-07 12:57:02', '2025-01-07 12:57:02'),
(NULL, 99, '-03:30', 'Tim-0099', 'America/St_Johns', 'Active', 1, 1, NULL, '2025-01-07 12:58:04', '2025-01-07 12:58:04'),
(NULL, 100, '-06:00', 'Tim-0100', 'America/Swift_Current', 'Active', 1, 1, NULL, '2025-01-07 12:58:21', '2025-01-07 12:58:21'),
(NULL, 101, '-05:00', 'Tim-0101', 'America/Toronto', 'Active', 1, 1, NULL, '2025-01-07 12:58:41', '2025-01-07 12:58:41'),
(NULL, 102, '-08:00', 'Tim-0102', 'America/Vancouver', 'Active', 1, 1, NULL, '2025-01-07 12:59:01', '2025-01-07 12:59:01'),
(NULL, 103, '-07:00', 'Tim-0103', 'America/Whitehorse', 'Active', 1, 1, NULL, '2025-01-07 12:59:17', '2025-01-07 12:59:17'),
(NULL, 104, '-06:00', 'Tim-0104', 'America/Winnipeg', 'Active', 1, 1, NULL, '2025-01-07 12:59:45', '2025-01-07 12:59:45'),
(NULL, 105, '-01:00', 'Tim-0105', 'Atlantic/Cape_Verde', 'Active', 1, 1, NULL, '2025-01-07 13:00:03', '2025-01-07 13:00:03'),
(NULL, 106, '-05:00', 'Tim-0106', 'America/Cayman', 'Active', 1, 1, NULL, '2025-01-08 04:38:00', '2025-01-08 04:38:00'),
(NULL, 107, '+01:00', 'Tim-0107', 'Africa/Bangui', 'Active', 1, 1, NULL, '2025-01-08 04:38:51', '2025-01-08 04:38:51'),
(NULL, 108, '+01:00', 'Tim-0108', 'Africa/Ndjamena', 'Active', 1, 1, NULL, '2025-01-08 04:39:23', '2025-01-08 04:39:23'),
(NULL, 109, '-03:00', 'Tim-0109', 'America/Punta_Arenas', 'Active', 1, 1, NULL, '2025-01-08 04:40:19', '2025-01-08 04:40:19'),
(NULL, 110, '-03:00', 'Tim-0110', 'America/Santiago', 'Active', 1, 1, NULL, '2025-01-08 04:40:45', '2025-01-08 04:40:45'),
(NULL, 111, '-05:00', 'Tim-0111', 'Pacific/Easter', 'Active', 1, 1, NULL, '2025-01-08 04:41:56', '2025-01-08 04:41:56'),
(NULL, 112, '+08:00', 'Tim-0112', 'Asia/Shanghai', 'Active', 1, 1, NULL, '2025-01-08 04:42:12', '2025-01-08 04:42:12'),
(NULL, 113, '+06:00', 'Tim-0113', 'Asia/Urumqi', 'Active', 1, 1, NULL, '2025-01-08 04:43:33', '2025-01-08 04:43:33'),
(NULL, 114, '+07:00', 'Tim-0114', 'Indian/Christmas', 'Active', 1, 1, NULL, '2025-01-08 04:43:48', '2025-01-08 04:43:48'),
(NULL, 115, '+06:30', 'Tim-0115', 'Indian/Cocos', 'Active', 1, 1, NULL, '2025-01-08 04:44:08', '2025-01-08 04:44:08'),
(NULL, 116, '-05:00', 'Tim-0116', 'America/Bogota', 'Active', 1, 1, NULL, '2025-01-08 04:59:46', '2025-01-08 04:59:46'),
(NULL, 117, '+03:00', 'Tim-0117', 'Indian/Comoro', 'Active', 1, 1, NULL, '2025-01-08 05:00:04', '2025-01-08 05:00:04'),
(NULL, 118, '+01:00', 'Tim-0118', 'Africa/Brazzaville', 'Active', 1, 1, NULL, '2025-01-08 05:00:20', '2025-01-08 05:00:20'),
(NULL, 119, '+01:00', 'Tim-0119', 'Africa/Kinshasa', 'Active', 1, 1, NULL, '2025-01-08 05:00:36', '2025-01-08 05:00:36'),
(NULL, 120, '+02:00', 'Tim-0120', 'Africa/Lubumbashi', 'Active', 1, 1, NULL, '2025-01-08 05:00:52', '2025-01-08 05:00:52'),
(NULL, 121, '-10:00', 'Tim-0121', 'Pacific/Rarotonga', 'Active', 1, 1, NULL, '2025-01-08 05:01:06', '2025-01-08 05:01:06'),
(NULL, 122, '-06:00', 'Tim-0122', 'America/Costa_Rica', 'Active', 1, 1, NULL, '2025-01-08 05:01:23', '2025-01-08 05:01:23'),
(NULL, 123, '+01:00', 'Tim-0123', 'Europe/Zagreb', 'Active', 1, 1, NULL, '2025-01-08 05:01:40', '2025-01-08 05:01:40'),
(NULL, 124, '-05:00', 'Tim-0124', 'America/Havana', 'Active', 1, 1, NULL, '2025-01-08 05:01:56', '2025-01-08 05:01:56'),
(NULL, 125, '-04:00', 'Tim-0125', 'America/Curacao', 'Active', 1, 1, NULL, '2025-01-08 05:02:19', '2025-01-08 05:02:19'),
(NULL, 126, '+02:00', 'Tim-0126', 'Asia/Famagusta', 'Active', 1, 1, NULL, '2025-01-08 05:02:56', '2025-01-08 05:02:56'),
(NULL, 127, '+02:00', 'Tim-0127', 'Asia/Nicosia', 'Active', 1, 1, NULL, '2025-01-08 05:03:33', '2025-01-08 05:03:33'),
(NULL, 128, '+01:00', 'Tim-0128', 'Europe/Prague', 'Active', 1, 1, NULL, '2025-01-08 05:07:18', '2025-01-08 05:07:18'),
(NULL, 129, '+01:00', 'Tim-0129', 'Europe/Copenhagen', 'Active', 1, 1, NULL, '2025-01-08 05:07:40', '2025-01-08 05:07:40'),
(NULL, 130, '+03:00', 'Tim-0130', 'Africa/Djibouti', 'Active', 1, 1, NULL, '2025-01-08 05:07:52', '2025-01-08 05:07:52'),
(NULL, 131, '-04:00', 'Tim-0131', 'America/Dominica', 'Active', 1, 1, NULL, '2025-01-08 05:08:11', '2025-01-08 05:08:11'),
(NULL, 132, '-04:00', 'Tim-0132', 'America/Santo_Domingo', 'Active', 1, 1, NULL, '2025-01-08 05:08:39', '2025-01-08 05:08:39'),
(NULL, 133, '-05:00', 'Tim-0133', 'America/Guayaquil', 'Active', 1, 1, NULL, '2025-01-08 05:09:04', '2025-01-08 05:09:04'),
(NULL, 134, '-06:00', 'Tim-0134', 'Pacific/Galapagos', 'Active', 1, 1, NULL, '2025-01-08 05:09:49', '2025-01-08 05:09:49'),
(NULL, 135, '+02:00', 'Tim-0135', 'Africa/Cairo', 'Active', 1, 1, NULL, '2025-01-08 05:10:11', '2025-01-08 05:10:11'),
(NULL, 136, '-06:00', 'Tim-0136', 'America/El_Salvador', 'Active', 1, 1, NULL, '2025-01-08 05:10:36', '2025-01-08 05:10:36'),
(NULL, 137, '+01:00', 'Tim-0137', 'Africa/Malabo', 'Active', 1, 1, NULL, '2025-01-08 05:10:49', '2025-01-08 05:10:49'),
(NULL, 138, '+03:00', 'Tim-0138', 'Africa/Asmara', 'Active', 1, 1, NULL, '2025-01-08 05:11:02', '2025-01-08 05:11:02'),
(NULL, 139, '+02:00', 'Tim-0139', 'Europe/Tallinn', 'Active', 1, 1, NULL, '2025-01-08 05:11:20', '2025-01-08 05:11:20'),
(NULL, 140, '+03:00', 'Tim-0140', 'Africa/Addis_Ababa', 'Active', 1, 1, NULL, '2025-01-08 05:11:39', '2025-01-08 05:11:39'),
(NULL, 141, '-03:00', 'Tim-0141', 'Atlantic/Stanley', 'Active', 1, 1, NULL, '2025-01-08 05:11:52', '2025-01-08 05:11:52'),
(NULL, 142, '+12:00', 'Tim-0142', 'Pacific/Fiji', 'Active', 1, 1, NULL, '2025-01-08 05:12:05', '2025-01-08 05:12:05'),
(NULL, 143, '+02:00', 'Tim-0143', 'Europe/Helsinki', 'Active', 1, 1, NULL, '2025-01-08 05:12:27', '2025-01-08 05:12:27'),
(NULL, 144, '+01:00', 'Tim-0144', 'Europe/Paris', 'Active', 1, 1, NULL, '2025-01-08 05:12:52', '2025-01-08 05:12:52'),
(NULL, 145, '-03:00', 'Tim-0145', 'America/Cayenne', 'Active', 1, 1, NULL, '2025-01-08 05:13:17', '2025-01-08 05:13:17'),
(NULL, 146, '-09:00', 'Tim-0146', 'Pacific/Gambier', 'Active', 1, 1, NULL, '2025-01-08 05:13:39', '2025-01-08 05:13:39'),
(NULL, 147, '-09:30', 'Tim-0147', 'Pacific/Marquesas', 'Active', 1, 1, NULL, '2025-01-08 05:13:57', '2025-01-08 05:13:57'),
(NULL, 148, '-10:00', 'Tim-0148', 'Pacific/Tahiti', 'Active', 1, 1, NULL, '2025-01-08 05:14:11', '2025-01-08 05:14:11'),
(NULL, 149, '+05:00', 'Tim-0149', 'Indian/Kerguelen', 'Active', 1, 1, NULL, '2025-01-08 05:14:26', '2025-01-08 05:14:26'),
(NULL, 150, '+01:00', 'Tim-0150', 'Africa/Libreville', 'Active', 1, 1, NULL, '2025-01-08 05:14:45', '2025-01-08 05:14:45'),
(NULL, 151, '+04:00', 'Tim-0151', 'Asia/Tbilisi', 'Active', 1, 1, NULL, '2025-01-08 05:15:08', '2025-01-08 05:15:08'),
(NULL, 152, '+01:00', 'Tim-0152', 'Europe/Berlin', 'Active', 1, 1, NULL, '2025-01-08 05:15:24', '2025-01-08 05:15:24'),
(NULL, 153, '+01:00', 'Tim-0153', 'Europe/Busingen', 'Active', 1, 1, NULL, '2025-01-08 05:15:42', '2025-01-08 05:15:42'),
(NULL, 154, '+01:00', 'Tim-0154', 'Europe/Gibraltar', 'Active', 1, 1, NULL, '2025-01-08 05:16:20', '2025-01-08 05:16:20'),
(NULL, 155, '+02:00', 'Tim-0155', 'Europe/Athens', 'Active', 1, 1, NULL, '2025-01-08 05:18:50', '2025-01-08 05:18:50'),
(NULL, 156, '-02:00', 'Tim-0156', 'America/Nuuk', 'Active', 1, 1, NULL, '2025-01-08 05:19:02', '2025-01-08 05:19:02'),
(NULL, 157, '-02:00', 'Tim-0157', 'America/Scoresbysund', 'Active', 1, 1, NULL, '2025-01-08 05:19:14', '2025-01-08 05:19:14'),
(NULL, 158, '-04:00', 'Tim-0158', 'America/Thule', 'Active', 1, 1, NULL, '2025-01-08 05:19:27', '2025-01-08 05:19:27'),
(NULL, 159, '-04:00', 'Tim-0159', 'America/Grenada', 'Active', 1, 1, NULL, '2025-01-08 05:19:49', '2025-01-08 05:19:49'),
(NULL, 160, '-04:00', 'Tim-0160', 'America/Guadeloupe', 'Active', 1, 1, NULL, '2025-01-08 05:20:06', '2025-01-08 05:20:06'),
(NULL, 161, '+10:00', 'Tim-0161', 'Pacific/Guam', 'Active', 1, 1, NULL, '2025-01-08 05:20:21', '2025-01-08 05:20:21'),
(NULL, 162, '-06:00', 'Tim-0162', 'America/Guatemala', 'Active', 1, 1, NULL, '2025-01-08 05:20:52', '2025-01-08 05:20:52'),
(NULL, 163, '-04:00', 'Tim-0163', 'America/Guyana', 'Active', 1, 1, NULL, '2025-01-08 05:21:18', '2025-01-08 05:21:18'),
(NULL, 164, '-05:00', 'Tim-0164', 'America/Port-au-Prince', 'Active', 1, 1, NULL, '2025-01-08 05:21:31', '2025-01-08 05:21:31'),
(NULL, 165, '+01:00', 'Tim-0165', 'Europe/Vatican', 'Active', 1, 1, NULL, '2025-01-08 05:21:42', '2025-01-08 05:21:42'),
(NULL, 166, '-06:00', 'Tim-0166', 'America/Tegucigalpa', 'Active', 1, 1, NULL, '2025-01-08 05:22:01', '2025-01-08 05:22:01'),
(NULL, 167, '+08:00', 'Tim-0167', 'Asia/Hong_Kong', 'Active', 1, 1, NULL, '2025-01-08 05:22:16', '2025-01-08 05:22:16'),
(NULL, 168, '+01:00', 'Tim-0168', 'Europe/Budapest', 'Active', 1, 1, NULL, '2025-01-08 05:27:16', '2025-01-08 05:27:16'),
(NULL, 169, '+05:30', 'Tim-0169', 'Asia/Kolkata', 'Active', 1, 1, NULL, '2025-01-08 05:27:30', '2025-01-08 05:27:30'),
(NULL, 170, '+07:00', 'Tim-0170', 'Asia/Jakarta', 'Active', 1, 1, NULL, '2025-01-08 05:29:46', '2025-01-08 05:29:46'),
(NULL, 171, '+09:00', 'Tim-0171', 'Asia/Jayapura', 'Active', 1, 1, NULL, '2025-01-08 05:31:11', '2025-01-08 05:31:11'),
(NULL, 172, '+08:00', 'Tim-0172', 'Asia/Makassar', 'Active', 1, 1, NULL, '2025-01-08 05:31:24', '2025-01-08 05:31:24'),
(NULL, 173, '+07:00', 'Tim-0173', 'Asia/Pontianak', 'Active', 1, 1, NULL, '2025-01-08 05:32:11', '2025-01-08 05:32:11'),
(NULL, 174, '+03:30', 'Tim-0174', 'Asia/Tehran', 'Active', 1, 1, NULL, '2025-01-08 05:32:24', '2025-01-08 05:32:24'),
(NULL, 175, '+03:00', 'Tim-0175', 'Asia/Baghdad', 'Active', 1, 1, NULL, '2025-01-08 05:32:50', '2025-01-08 05:32:50'),
(NULL, 176, '+02:00', 'Tim-0176', 'Asia/Jerusalem', 'Active', 1, 1, NULL, '2025-01-08 05:33:07', '2025-01-08 05:33:07'),
(NULL, 177, '+01:00', 'Tim-0177', 'Europe/Rome', 'Active', 1, 1, NULL, '2025-01-08 05:33:23', '2025-01-08 05:33:23'),
(NULL, 178, '-05:00', 'Tim-0178', 'America/Jamaica', 'Active', 1, 1, NULL, '2025-01-08 05:34:20', '2025-01-08 05:34:20'),
(NULL, 179, '+09:00', 'Tim-0179', 'Asia/Tokyo', 'Active', 1, 1, NULL, '2025-01-08 05:34:41', '2025-01-08 05:34:41'),
(NULL, 180, '+03:00', 'Tim-0180', 'Asia/Amman', 'Active', 1, 1, NULL, '2025-01-08 05:36:15', '2025-01-08 05:36:15'),
(NULL, 181, '+05:00', 'Tim-0181', 'Asia/Almaty', 'Active', 1, 1, NULL, '2025-01-08 05:36:26', '2025-01-08 05:36:26'),
(NULL, 182, '+05:00', 'Tim-0182', 'Asia/Aqtau', 'Active', 1, 1, NULL, '2025-01-08 05:36:38', '2025-01-08 05:36:38'),
(NULL, 183, '+05:00', 'Tim-0183', 'Asia/Aqtobe', 'Active', 1, 1, NULL, '2025-01-08 05:36:49', '2025-01-08 05:36:49'),
(NULL, 184, '+05:00', 'Tim-0184', 'Asia/Atyrau', 'Active', 1, 1, NULL, '2025-01-08 05:37:01', '2025-01-08 05:37:01'),
(NULL, 185, '+05:00', 'Tim-0185', 'Asia/Oral', 'Active', 1, 1, NULL, '2025-01-08 05:37:13', '2025-01-08 05:37:13'),
(NULL, 186, '+05:00', 'Tim-0186', 'Asia/Qostanay', 'Active', 1, 1, NULL, '2025-01-08 05:37:32', '2025-01-08 05:37:32'),
(NULL, 187, '+05:00', 'Tim-0187', 'Asia/Qyzylorda', 'Active', 1, 1, NULL, '2025-01-08 05:37:44', '2025-01-08 05:37:44'),
(NULL, 188, '+03:00', 'Tim-0188', 'Africa/Nairobi', 'Active', 1, 1, NULL, '2025-01-08 05:39:17', '2025-01-08 05:39:17'),
(NULL, 189, '+13:00', 'Tim-0189', 'Pacific/Kanton', 'Active', 1, 1, NULL, '2025-01-08 05:39:31', '2025-01-08 05:39:31'),
(NULL, 190, '+14:00', 'Tim-0190', 'Pacific/Kiritimati', 'Active', 1, 1, NULL, '2025-01-08 05:39:55', '2025-01-08 05:39:55'),
(NULL, 191, '+12:00', 'Tim-0191', 'Pacific/Tarawa', 'Active', 1, 1, NULL, '2025-01-08 05:40:19', '2025-01-08 05:40:19'),
(NULL, 192, '+09:00', 'Tim-0192', 'Asia/Pyongyang', 'Active', 1, 1, NULL, '2025-01-08 05:40:33', '2025-01-08 05:40:33'),
(NULL, 193, '+09:00', 'Tim-0193', 'Asia/Seoul', 'Active', 1, 1, NULL, '2025-01-08 05:40:49', '2025-01-08 05:40:49'),
(NULL, 194, '+03:00', 'Tim-0194', 'Asia/Kuwait', 'Active', 1, 1, NULL, '2025-01-08 05:46:37', '2025-01-08 05:46:37'),
(NULL, 195, '+06:00', 'Tim-0195', 'Asia/Bishkek', 'Active', 1, 1, NULL, '2025-01-08 05:48:18', '2025-01-08 05:48:18'),
(NULL, 196, '+07:00', 'Tim-0196', 'Asia/Vientiane', 'Active', 1, 1, NULL, '2025-01-08 05:48:32', '2025-01-08 05:48:32'),
(NULL, 197, '+02:00', 'Tim-0197', 'Europe/Riga', 'Active', 1, 1, NULL, '2025-01-08 05:48:46', '2025-01-08 05:48:46'),
(NULL, 198, '+02:00', 'Tim-0198', 'Asia/Beirut', 'Active', 1, 1, NULL, '2025-01-08 05:49:08', '2025-01-08 05:49:08'),
(NULL, 199, '+02:00', 'Tim-0199', 'Africa/Maseru', 'Active', 1, 1, NULL, '2025-01-08 05:49:39', '2025-01-08 05:49:39'),
(NULL, 200, '+02:00', 'Tim-0200', 'Africa/Tripoli', 'Active', 1, 1, NULL, '2025-01-08 05:49:53', '2025-01-08 05:49:53'),
(NULL, 201, '+01:00', 'Tim-0201', 'Europe/Vaduz', 'Active', 1, 1, NULL, '2025-01-08 05:50:06', '2025-01-08 05:50:06'),
(NULL, 202, '+02:00', 'Tim-0202', 'Europe/Vilnius', 'Active', 1, 1, NULL, '2025-01-08 05:50:22', '2025-01-08 05:50:22'),
(NULL, 203, '+01:00', 'Tim-0203', 'Europe/Luxembourg', 'Active', 1, 1, NULL, '2025-01-08 05:50:34', '2025-01-08 05:50:34'),
(NULL, 204, '+08:00', 'Tim-0204', 'Asia/Macau', 'Active', 1, 1, NULL, '2025-01-08 05:50:48', '2025-01-08 05:50:48'),
(NULL, 205, '+01:00', 'Tim-0205', 'Europe/Skopje', 'Active', 1, 1, NULL, '2025-01-08 05:51:01', '2025-01-08 05:51:01'),
(NULL, 206, '+03:00', 'Tim-0206', 'Indian/Antananarivo', 'Active', 1, 1, NULL, '2025-01-08 05:51:16', '2025-01-08 05:51:16'),
(NULL, 207, '+02:00', 'Tim-0207', 'Africa/Blantyre', 'Active', 1, 1, NULL, '2025-01-08 05:51:31', '2025-01-08 05:51:31'),
(NULL, 208, '+08:00', 'Tim-0208', 'Asia/Kuala_Lumpur', 'Active', 1, 1, NULL, '2025-01-08 05:51:44', '2025-01-08 05:51:44'),
(NULL, 209, '+08:00', 'Tim-0209', 'Asia/Kuching', 'Active', 1, 1, NULL, '2025-01-08 05:52:30', '2025-01-08 05:52:30'),
(NULL, 210, '+05:00', 'Tim-0210', 'Indian/Maldives', 'Active', 1, 1, NULL, '2025-01-08 05:52:56', '2025-01-08 05:52:56'),
(NULL, 211, '+01:00', 'Tim-0211', 'Europe/Malta', 'Active', 1, 1, NULL, '2025-01-08 05:53:17', '2025-01-08 05:53:17'),
(NULL, 212, '12:00', 'Tim-0212', 'Pacific/Kwajalein', 'Active', 1, 1, NULL, '2025-01-08 05:53:59', '2025-01-08 05:53:59'),
(NULL, 213, '+12:00', 'Tim-0213', 'Pacific/Majuro', 'Active', 1, 1, NULL, '2025-01-08 06:32:18', '2025-01-08 06:32:18'),
(NULL, 214, '-04:00', 'Tim-0214', 'America/Martinique', 'Active', 1, 1, NULL, '2025-01-08 06:32:50', '2025-01-08 06:32:50'),
(NULL, 215, '+04:00', 'Tim-0215', 'Indian/Mauritius', 'Active', 1, 1, NULL, '2025-01-08 06:33:10', '2025-01-08 06:33:10'),
(NULL, 216, '+03:00', 'Tim-0216', 'Indian/Mayotte', 'Active', 1, 1, NULL, '2025-01-08 06:33:26', '2025-01-08 06:33:26'),
(NULL, 217, '-06:00', 'Tim-0217', 'America/Bahia_Banderas', 'Active', 1, 1, NULL, '2025-01-08 06:33:40', '2025-01-08 06:33:40'),
(NULL, 218, '-05:00', 'Tim-0218', 'America/Cancun', 'Active', 1, 1, NULL, '2025-01-08 06:35:05', '2025-01-08 06:35:05'),
(NULL, 219, '-06:00', 'Tim-0219', 'America/Chihuahua', 'Active', 1, 1, NULL, '2025-01-08 06:35:27', '2025-01-08 06:35:27'),
(NULL, 220, '-07:00', 'Tim-0220', 'America/Ciudad_Juarez', 'Active', 1, 1, NULL, '2025-01-08 06:35:41', '2025-01-08 06:35:41'),
(NULL, 221, '-07:00', 'Tim-0221', 'America/Hermosillo', 'Active', 1, 1, NULL, '2025-01-08 06:36:03', '2025-01-08 06:36:03'),
(NULL, 222, '-06:00', 'Tim-0222', 'America/Matamoros', 'Active', 1, 1, NULL, '2025-01-08 06:36:21', '2025-01-08 06:36:21'),
(NULL, 223, '-07:00', 'Tim-0223', 'America/Mazatlan', 'Active', 1, 1, NULL, '2025-01-08 06:36:40', '2025-01-08 06:36:40'),
(NULL, 224, '-06:00', 'Tim-0224', 'America/Merida', 'Active', 1, 1, NULL, '2025-01-08 06:36:55', '2025-01-08 06:36:55'),
(NULL, 225, '-06:00', 'Tim-0225', 'America/Mexico_City', 'Active', 1, 1, NULL, '2025-01-08 06:37:11', '2025-01-08 06:37:11'),
(NULL, 226, '-06:00', 'Tim-0226', 'America/Monterrey', 'Active', 1, 1, NULL, '2025-01-08 06:37:55', '2025-01-08 06:37:55'),
(NULL, 227, '-06:00', 'Tim-0227', 'America/Ojinaga', 'Active', 1, 1, NULL, '2025-01-08 06:38:06', '2025-01-08 06:38:06'),
(NULL, 228, '-08:00', 'Tim-0228', 'America/Tijuana', 'Active', 1, 1, NULL, '2025-01-08 06:38:21', '2025-01-08 06:38:21'),
(NULL, 229, '+10:00', 'Tim-0229', 'Pacific/Chuuk', 'Active', 1, 1, NULL, '2025-01-08 06:38:35', '2025-01-08 06:38:35'),
(NULL, 230, '+11:00', 'Tim-0230', 'Pacific/Kosrae', 'Active', 1, 1, NULL, '2025-01-08 06:38:51', '2025-01-08 06:38:51'),
(NULL, 231, '+11:00', 'Tim-0231', 'Pacific/Pohnpei', 'Active', 1, 1, NULL, '2025-01-08 06:39:40', '2025-01-08 06:39:40'),
(NULL, 232, '+02:00', 'Tim-0232', 'Europe/Chisinau', 'Active', 1, 1, NULL, '2025-01-08 06:40:12', '2025-01-08 06:40:12'),
(NULL, 233, '+01:00', 'Tim-0233', 'Europe/Monaco', 'Active', 1, 1, NULL, '2025-01-08 06:40:25', '2025-01-08 06:40:25'),
(NULL, 234, '+07:00', 'Tim-0234', 'Asia/Hovd', 'Active', 1, 1, NULL, '2025-01-08 06:40:37', '2025-01-08 06:40:37'),
(NULL, 235, '+08:00', 'Tim-0235', 'Asia/Ulaanbaatar', 'Active', 1, 1, NULL, '2025-01-08 06:40:51', '2025-01-08 06:40:51'),
(NULL, 236, '+01:00', 'Tim-0236', 'Europe/Podgorica', 'Active', 1, 1, NULL, '2025-01-08 06:41:06', '2025-01-08 06:41:06'),
(NULL, 237, '-04:00', 'Tim-0237', 'America/Montserrat', 'Active', 1, 1, NULL, '2025-01-08 06:41:22', '2025-01-08 06:41:22'),
(NULL, 238, '+01:00', 'Tim-0238', 'Africa/Casablanca', 'Active', 1, 1, NULL, '2025-01-08 06:43:06', '2025-01-08 06:43:06'),
(NULL, 239, '+01:00', 'Tim-0239', 'Africa/El_Aaiun', 'Active', 1, 1, NULL, '2025-01-08 06:43:28', '2025-01-08 06:43:28'),
(NULL, 240, '+02:00', 'Tim-0240', 'Africa/Maputo', 'Active', 1, 1, NULL, '2025-01-08 06:43:42', '2025-01-08 06:43:42'),
(NULL, 241, '+06:30', 'Tim-0241', 'Asia/Yangon', 'Active', 1, 1, NULL, '2025-01-08 06:43:59', '2025-01-08 06:43:59'),
(NULL, 242, '+02:00', 'Tim-0242', 'Africa/Windhoek', 'Active', 1, 1, NULL, '2025-01-08 06:44:12', '2025-01-08 06:44:12'),
(NULL, 243, '+12:00', 'Tim-0243', 'Pacific/Nauru', 'Active', 1, 1, NULL, '2025-01-08 06:44:22', '2025-01-08 06:44:22'),
(NULL, 244, '+05:45', 'Tim-0244', 'Asia/Kathmandu', 'Active', 1, 1, NULL, '2025-01-08 06:44:40', '2025-01-08 06:44:40'),
(NULL, 245, '+01:00', 'Tim-0245', 'Europe/Amsterdam', 'Active', 1, 1, NULL, '2025-01-08 06:45:02', '2025-01-08 06:45:02'),
(NULL, 246, '+11:00', 'Tim-0246', 'Pacific/Noumea', 'Active', 1, 1, NULL, '2025-01-08 06:45:27', '2025-01-08 06:45:27'),
(NULL, 247, '+13:00', 'Tim-0247', 'Pacific/Auckland', 'Active', 1, 1, NULL, '2025-01-08 06:45:46', '2025-01-08 06:45:46'),
(NULL, 248, '+13:45', 'Tim-0248', 'Pacific/Chatham', 'Active', 1, 1, NULL, '2025-01-08 06:46:01', '2025-01-08 06:46:01'),
(NULL, 249, '-06:00', 'Tim-0249', 'America/Managua', 'Active', 1, 1, NULL, '2025-01-08 06:46:21', '2025-01-08 06:46:21'),
(NULL, 250, '+01:00', 'Tim-0250', 'Africa/Niamey', 'Active', 1, 1, NULL, '2025-01-08 06:46:41', '2025-01-08 06:46:41'),
(NULL, 251, '+01:00', 'Tim-0251', 'Africa/Lagos', 'Active', 1, 1, NULL, '2025-01-08 06:47:08', '2025-01-08 06:47:08'),
(NULL, 252, '-11:00', 'Tim-0252', 'Pacific/Niue', 'Active', 1, 1, NULL, '2025-01-08 06:47:20', '2025-01-08 06:47:20'),
(NULL, 253, '+12:00', 'Tim-0253', 'Pacific/Norfolk', 'Active', 1, 1, NULL, '2025-01-08 06:47:37', '2025-01-08 06:47:37'),
(NULL, 254, '+10:00', 'Tim-0254', 'Pacific/Saipan', 'Active', 1, 1, NULL, '2025-01-08 06:48:03', '2025-01-08 06:48:03'),
(NULL, 255, '+01:00', 'Tim-0255', 'Europe/Oslo', 'Active', 1, 1, NULL, '2025-01-08 06:48:15', '2025-01-08 06:48:15'),
(NULL, 256, '+04:00', 'Tim-0256', 'Asia/Muscat', 'Active', 1, 1, NULL, '2025-01-08 06:48:27', '2025-01-08 06:48:27'),
(NULL, 257, '+05:00', 'Tim-0257', 'Asia/Karachi', 'Active', 1, 1, NULL, '2025-01-08 06:48:43', '2025-01-08 06:48:43'),
(NULL, 258, '+09:00', 'Tim-0258', 'Pacific/Palau', 'Active', 1, 1, NULL, '2025-01-08 06:49:00', '2025-01-08 06:49:00'),
(NULL, 259, '+02:00', 'Tim-0259', 'Asia/Gaza', 'Active', 1, 1, NULL, '2025-01-08 06:50:05', '2025-01-08 06:50:05'),
(NULL, 260, '+02:00', 'Tim-0260', 'Asia/Hebron', 'Active', 1, 1, NULL, '2025-01-08 06:50:20', '2025-01-08 06:50:20'),
(NULL, 261, '-05:00', 'Tim-0261', 'America/Panama', 'Active', 1, 1, NULL, '2025-01-08 06:50:35', '2025-01-08 06:50:35'),
(NULL, 262, '+11:00', 'Tim-0262', 'Pacific/Bougainville', 'Active', 1, 1, NULL, '2025-01-08 06:51:06', '2025-01-08 06:51:06'),
(NULL, 263, '+10:00', 'Tim-0263', 'Pacific/Port_Moresby', 'Active', 1, 1, NULL, '2025-01-08 06:51:19', '2025-01-08 06:51:19'),
(NULL, 264, '-03:00', 'Tim-0264', 'America/Asuncion', 'Active', 1, 1, NULL, '2025-01-08 06:51:39', '2025-01-08 06:51:39'),
(NULL, 265, '-05:00', 'Tim-0265', 'America/Lima', 'Active', 1, 1, NULL, '2025-01-08 06:51:50', '2025-01-08 06:51:50'),
(NULL, 266, '+08:00', 'Tim-0266', 'Asia/Manila', 'Active', 1, 1, NULL, '2025-01-08 06:52:02', '2025-01-08 06:52:02'),
(NULL, 267, '-08:00', 'Tim-0267', 'Pacific/Pitcairn', 'Active', 1, 1, NULL, '2025-01-08 06:52:20', '2025-01-08 06:52:20'),
(NULL, 268, '+01:00', 'Tim-0268', 'Europe/Warsaw', 'Active', 1, 1, NULL, '2025-01-08 06:52:39', '2025-01-08 06:52:39'),
(NULL, 269, '-01:00', 'Tim-0269', 'Atlantic/Azores', 'Active', 1, 1, NULL, '2025-01-08 06:52:51', '2025-01-08 06:52:51'),
(NULL, 270, '-04:00', 'Tim-0270', 'America/Puerto_Rico', 'Active', 1, 1, NULL, '2025-01-08 06:53:10', '2025-01-08 06:53:10'),
(NULL, 271, '+03:00', 'Tim-0271', 'Asia/Qatar', 'Active', 1, 1, NULL, '2025-01-08 06:53:29', '2025-01-08 06:53:29'),
(NULL, 272, '+02:00', 'Tim-0272', 'Europe/Bucharest', 'Active', 1, 1, NULL, '2025-01-08 06:53:40', '2025-01-08 06:53:40'),
(NULL, 273, '+12:00', 'Tim-0273', 'Asia/Anadyr', 'Active', 1, 1, NULL, '2025-01-08 06:53:54', '2025-01-08 06:53:54'),
(NULL, 274, '+07:00', 'Tim-0274', 'Asia/Barnaul', 'Active', 1, 1, NULL, '2025-01-08 06:54:08', '2025-01-08 06:54:08'),
(NULL, 275, '+09:00', 'Tim-0275', 'Asia/Chita', 'Active', 1, 1, NULL, '2025-01-08 06:54:21', '2025-01-08 06:54:21'),
(NULL, 276, '+08:00', 'Tim-0276', 'Asia/Irkutsk', 'Active', 1, 1, NULL, '2025-01-08 06:54:47', '2025-01-08 06:54:47'),
(NULL, 277, '+12:00', 'Tim-0277', 'Asia/Kamchatka', 'Active', 1, 1, NULL, '2025-01-08 06:55:00', '2025-01-08 06:55:00'),
(NULL, 278, '+09:00', 'Tim-0278', 'Asia/Khandyga', 'Active', 1, 1, NULL, '2025-01-08 06:55:14', '2025-01-08 06:55:14'),
(NULL, 279, '+07:00', 'Tim-0279', 'Asia/Krasnoyarsk', 'Active', 1, 1, NULL, '2025-01-08 06:55:32', '2025-01-08 06:55:32'),
(NULL, 280, '+11:00', 'Tim-0280', 'Asia/Magadan', 'Active', 1, 1, NULL, '2025-01-08 06:55:51', '2025-01-08 06:55:51'),
(NULL, 281, '+07:00', 'Tim-0281', 'Asia/Novokuznetsk', 'Active', 1, 1, NULL, '2025-01-08 06:56:16', '2025-01-08 06:56:16'),
(NULL, 282, '+07:00', 'Tim-0282', 'Asia/Novosibirsk', 'Active', 1, 1, NULL, '2025-01-08 06:56:28', '2025-01-08 06:56:28'),
(NULL, 283, '+06:00', 'Tim-0283', 'Asia/Omsk', 'Active', 1, 1, NULL, '2025-01-08 06:56:39', '2025-01-08 06:56:39'),
(NULL, 284, '+11:00', 'Tim-0284', 'Asia/Sakhalin', 'Active', 1, 1, NULL, '2025-01-08 06:56:50', '2025-01-08 06:56:50'),
(NULL, 285, '11:00', 'Tim-0285', 'Asia/Srednekolymsk', 'Active', 1, 1, NULL, '2025-01-08 06:57:03', '2025-01-08 06:57:03'),
(NULL, 286, '+07:00', 'Tim-0286', 'Asia/Tomsk', 'Active', 1, 1, NULL, '2025-01-08 06:57:19', '2025-01-08 06:57:19'),
(NULL, 287, '+10:00', 'Tim-0287', 'Asia/Ust-Nera', 'Active', 1, 1, NULL, '2025-01-08 06:57:35', '2025-01-08 06:57:35'),
(NULL, 288, '+10:00', 'Tim-0288', 'Asia/Vladivostok', 'Active', 1, 1, NULL, '2025-01-08 06:57:48', '2025-01-08 06:57:48'),
(NULL, 289, '+09:00', 'Tim-0289', 'Asia/Yakutsk', 'Active', 1, 1, NULL, '2025-01-08 06:58:03', '2025-01-08 06:58:03'),
(NULL, 290, '+05:00', 'Tim-0290', 'Asia/Yekaterinburg', 'Active', 1, 1, NULL, '2025-01-08 06:58:33', '2025-01-08 06:58:33'),
(NULL, 291, '+04:00', 'Tim-0291', 'Europe/Astrakhan', 'Active', 1, 1, NULL, '2025-01-08 06:58:46', '2025-01-08 06:58:46'),
(NULL, 292, '+02:00', 'Tim-0292', 'Europe/Kaliningrad', 'Active', 1, 1, NULL, '2025-01-08 06:59:05', '2025-01-08 06:59:05'),
(NULL, 293, '+03:00', 'Tim-0293', 'Europe/Kirov', 'Active', 1, 1, NULL, '2025-01-08 06:59:34', '2025-01-08 06:59:34'),
(NULL, 294, '+03:00', 'Tim-0294', 'Europe/Moscow', 'Active', 1, 1, NULL, '2025-01-08 06:59:46', '2025-01-08 06:59:46'),
(NULL, 295, '+04:00', 'Tim-0295', 'Europe/Samara', 'Active', 1, 1, NULL, '2025-01-08 07:00:00', '2025-01-08 07:00:00'),
(NULL, 296, '+04:00', 'Tim-0296', 'Europe/Saratov', 'Active', 1, 1, NULL, '2025-01-08 07:00:13', '2025-01-08 07:00:13'),
(NULL, 297, '+04:00', 'Tim-0297', 'Europe/Ulyanovsk', 'Active', 1, 1, NULL, '2025-01-08 07:00:25', '2025-01-08 07:00:25'),
(NULL, 298, '+03:00', 'Tim-0298', 'Europe/Volgograd', 'Active', 1, 1, NULL, '2025-01-08 07:00:38', '2025-01-08 07:00:38'),
(NULL, 299, '+02:00', 'Tim-0299', 'Africa/Kigali', 'Active', 1, 1, NULL, '2025-01-08 07:00:50', '2025-01-08 07:00:50'),
(NULL, 300, '+04:00', 'Tim-0300', 'Indian/Reunion', 'Active', 1, 1, NULL, '2025-01-08 07:01:17', '2025-01-08 07:01:17'),
(NULL, 301, '-04:00', 'Tim-0301', 'America/St_Barthelemy', 'Active', 1, 1, NULL, '2025-01-08 07:01:30', '2025-01-08 07:01:30'),
(NULL, 302, '-04:00', 'Tim-0302', 'America/St_Kitts', 'Active', 1, 1, NULL, '2025-01-08 07:02:08', '2025-01-08 07:02:08'),
(NULL, 303, '-04:00', 'Tim-0303', 'America/St_Lucia', 'Active', 1, 1, NULL, '2025-01-08 07:02:24', '2025-01-08 07:02:24'),
(NULL, 304, '-04:00', 'Tim-0304', 'America/Marigot', 'Active', 1, 1, NULL, '2025-01-08 07:02:38', '2025-01-08 07:02:38'),
(NULL, 305, '-03:00', 'Tim-0305', 'America/Miquelon', 'Active', 1, 1, NULL, '2025-01-08 07:02:55', '2025-01-08 07:02:55'),
(NULL, 306, '-04:00', 'Tim-0306', 'America/St_Vincent', 'Active', 1, 1, NULL, '2025-01-08 07:03:06', '2025-01-08 07:03:06'),
(NULL, 307, '+13:00', 'Tim-0307', 'Pacific/Apia', 'Active', 1, 1, NULL, '2025-01-08 07:03:18', '2025-01-08 07:03:18'),
(NULL, 308, '+01:00', 'Tim-0308', 'Europe/San_Marino', 'Active', 1, 1, NULL, '2025-01-08 07:03:37', '2025-01-08 07:03:37'),
(NULL, 309, '+03:00', 'Tim-0309', 'Asia/Riyadh', 'Active', 1, 1, NULL, '2025-01-08 07:03:48', '2025-01-08 07:03:48'),
(NULL, 310, '+01:00', 'Tim-0310', 'Europe/Belgrade', 'Active', 1, 1, NULL, '2025-01-08 07:03:59', '2025-01-08 07:03:59'),
(NULL, 311, '+04:00', 'Tim-0311', 'Indian/Mahe', 'Active', 1, 1, NULL, '2025-01-08 07:04:16', '2025-01-08 07:04:16'),
(NULL, 312, '+08:00', 'Tim-0312', 'Asia/Singapore', 'Active', 1, 1, NULL, '2025-01-08 07:04:49', '2025-01-08 07:04:49'),
(NULL, 313, '-04:00', 'Tim-0313', 'America/Lower_Princes', 'Active', 1, 1, NULL, '2025-01-08 07:05:04', '2025-01-08 07:05:04'),
(NULL, 314, '+01:00', 'Tim-0314', 'Europe/Bratislava', 'Active', 1, 1, NULL, '2025-01-08 07:05:16', '2025-01-08 07:05:16'),
(NULL, 315, '+01:00', 'Tim-0315', 'Europe/Ljubljana', 'Active', 1, 1, NULL, '2025-01-08 07:05:31', '2025-01-08 07:05:31'),
(NULL, 316, '+11:00', 'Tim-0316', 'Pacific/Guadalcanal', 'Active', 1, 1, NULL, '2025-01-08 07:05:50', '2025-01-08 07:05:50'),
(NULL, 317, '+03:00', 'Tim-0317', 'Africa/Mogadishu', 'Active', 1, 1, NULL, '2025-01-08 07:06:01', '2025-01-08 07:06:01'),
(NULL, 318, '+02:00', 'Tim-0318', 'Africa/Johannesburg', 'Active', 1, 1, NULL, '2025-01-08 07:06:12', '2025-01-08 07:06:12'),
(NULL, 319, '-02:00', 'Tim-0319', 'Atlantic/South_Georgia', 'Active', 1, 1, NULL, '2025-01-08 07:06:24', '2025-01-08 07:06:24'),
(NULL, 320, '+02:00', 'Tim-0320', 'Africa/Juba', 'Active', 1, 1, NULL, '2025-01-08 07:06:35', '2025-01-08 07:06:35'),
(NULL, 321, '+01:00', 'Tim-0321', 'Africa/Ceuta', 'Active', 1, 1, NULL, '2025-01-08 07:06:47', '2025-01-08 07:06:47'),
(NULL, 322, '+01:00', 'Tim-0322', 'Europe/Madrid', 'Active', 1, 1, NULL, '2025-01-08 07:06:59', '2025-01-08 07:06:59'),
(NULL, 323, '+05:30', 'Tim-0323', 'Asia/Colombo', 'Active', 1, 1, NULL, '2025-01-08 07:07:17', '2025-01-08 07:07:17'),
(NULL, 324, '+02:00', 'Tim-0324', 'Africa/Khartoum', 'Active', 1, 1, NULL, '2025-01-08 07:08:03', '2025-01-08 07:08:03'),
(NULL, 325, '-03:00', 'Tim-0325', 'America/Paramaribo', 'Active', 1, 1, NULL, '2025-01-08 07:08:20', '2025-01-08 07:08:20'),
(NULL, 326, '+01:00', 'Tim-0326', 'Arctic/Longyearbyen', 'Active', 1, 1, NULL, '2025-01-08 07:08:32', '2025-01-08 07:08:32'),
(NULL, 327, '+02:00', 'Tim-0327', 'Africa/Mbabane', 'Active', 1, 1, NULL, '2025-01-08 07:08:45', '2025-01-08 07:08:45'),
(NULL, 328, '+01:00', 'Tim-0328', 'Europe/Stockholm', 'Active', 1, 1, NULL, '2025-01-08 07:08:56', '2025-01-08 07:08:56'),
(NULL, 329, '+01:00', 'Tim-0329', 'Europe/Zurich', 'Active', 1, 1, NULL, '2025-01-08 07:09:08', '2025-01-08 07:09:08'),
(NULL, 330, '+03:00', 'Tim-0330', 'Asia/Damascus', 'Active', 1, 1, NULL, '2025-01-08 07:09:28', '2025-01-08 07:09:28'),
(NULL, 331, '+08:00', 'Tim-0331', 'Asia/Taipei', 'Active', 1, 1, NULL, '2025-01-08 07:09:41', '2025-01-08 07:09:41'),
(NULL, 332, '+05:00', 'Tim-0332', 'Asia/Dushanbe', 'Active', 1, 1, NULL, '2025-01-08 07:09:55', '2025-01-08 07:09:55'),
(NULL, 333, '+03:00', 'Tim-0333', 'Africa/Dar_es_Salaam', 'Active', 1, 1, NULL, '2025-01-08 07:10:16', '2025-01-08 07:10:16'),
(NULL, 334, '+07:00', 'Tim-0334', 'Asia/Bangkok', 'Active', 1, 1, NULL, '2025-01-08 07:10:37', '2025-01-08 07:10:37'),
(NULL, 335, '+09:00', 'Tim-0335', 'Asia/Dili', 'Active', 1, 1, NULL, '2025-01-08 07:10:49', '2025-01-08 07:10:49'),
(NULL, 336, '+13:00', 'Tim-0336', 'Pacific/Fakaofo', 'Active', 1, 1, NULL, '2025-01-08 07:11:01', '2025-01-08 07:11:01'),
(NULL, 337, '+13:00', 'Tim-0337', 'Pacific/Tongatapu', 'Active', 1, 1, NULL, '2025-01-08 07:11:14', '2025-01-08 07:11:14'),
(NULL, 338, '-04:00', 'Tim-0338', 'America/Port_of_Spain', 'Active', 1, 1, NULL, '2025-01-08 07:11:35', '2025-01-08 07:11:35'),
(NULL, 339, '+01:00', 'Tim-0339', 'Africa/Tunis', 'Active', 1, 1, NULL, '2025-01-08 07:11:47', '2025-01-08 07:11:47'),
(NULL, 340, '+03:00', 'Tim-0340', 'Europe/Istanbul', 'Active', 1, 1, NULL, '2025-01-08 07:14:38', '2025-01-08 07:14:38'),
(NULL, 341, '+05:00', 'Tim-0341', 'Asia/Ashgabat', 'Active', 1, 1, NULL, '2025-01-08 07:14:49', '2025-01-08 07:14:49'),
(NULL, 342, '-05:00', 'Tim-0342', 'America/Grand_Turk', 'Active', 1, 1, NULL, '2025-01-08 07:14:59', '2025-01-08 07:14:59'),
(NULL, 343, '+12:00', 'Tim-0343', 'Pacific/Funafuti', 'Active', 1, 1, NULL, '2025-01-08 07:15:57', '2025-01-08 07:15:57'),
(NULL, 344, '+03:00', 'Tim-0344', 'Africa/Kampala', 'Active', 1, 1, NULL, '2025-01-08 07:17:24', '2025-01-08 07:17:24'),
(NULL, 345, '+02:00', 'Tim-0345', 'Europe/Kyiv', 'Active', 1, 1, NULL, '2025-01-08 07:17:43', '2025-01-08 07:17:43'),
(NULL, 346, '+03:00', 'Tim-0346', 'Europe/Simferopol', 'Active', 1, 1, NULL, '2025-01-08 07:17:59', '2025-01-08 07:17:59'),
(NULL, 347, '+04:00', 'Tim-0347', 'Asia/Dubai', 'Active', 1, 1, NULL, '2025-01-08 07:18:13', '2025-01-08 07:18:13'),
(NULL, 348, '-10:00', 'Tim-0348', 'America/Adak', 'Active', 1, 1, NULL, '2025-01-08 07:18:29', '2025-01-08 07:18:29'),
(NULL, 349, '-09:00', 'Tim-0349', 'America/Anchorage', 'Active', 1, 1, NULL, '2025-01-08 07:18:42', '2025-01-08 07:18:42'),
(NULL, 350, '-07:00', 'Tim-0350', 'America/Boise', 'Active', 1, 1, NULL, '2025-01-08 07:18:59', '2025-01-08 07:18:59'),
(NULL, 351, '-06:00', 'Tim-0351', 'America/Chicago', 'Active', 1, 1, NULL, '2025-01-08 07:19:11', '2025-01-08 07:19:11'),
(NULL, 352, '-07:00', 'Tim-0352', 'America/Denver', 'Active', 1, 1, NULL, '2025-01-08 07:19:50', '2025-01-08 07:19:50'),
(NULL, 353, '-05:00', 'Tim-0353', 'America/Detroit', 'Active', 1, 1, NULL, '2025-01-08 07:20:01', '2025-01-08 07:20:01'),
(NULL, 354, '-05:00', 'Tim-0354', 'America/Indiana/Indianapolis', 'Active', 1, 1, NULL, '2025-01-08 07:20:13', '2025-01-08 07:20:13'),
(NULL, 355, '-06:00', 'Tim-0355', 'America/Indiana/Knox', 'Active', 1, 1, NULL, '2025-01-08 07:20:26', '2025-01-08 07:20:26'),
(NULL, 356, '-05:00', 'Tim-0356', 'America/Indiana/Marengo', 'Active', 1, 1, NULL, '2025-01-08 07:20:39', '2025-01-08 07:20:39'),
(NULL, 357, '-05:00', 'Tim-0357', 'America/Indiana/Petersburg', 'Active', 1, 1, NULL, '2025-01-08 07:21:01', '2025-01-08 07:21:01'),
(NULL, 358, '-06:00', 'Tim-0358', 'America/Indiana/Tell_City', 'Active', 1, 1, NULL, '2025-01-08 07:21:21', '2025-01-08 07:21:21'),
(NULL, 359, '-05:00', 'Tim-0359', 'America/Indiana/Vevay', 'Active', 1, 1, NULL, '2025-01-08 07:21:39', '2025-01-08 07:21:39'),
(NULL, 360, '-05:00', 'Tim-0360', 'America/Indiana/Vincennes', 'Active', 1, 1, NULL, '2025-01-08 07:21:50', '2025-01-08 07:21:50'),
(NULL, 361, '-05:00', 'Tim-0361', 'America/Indiana/Winamac', 'Active', 1, 1, NULL, '2025-01-08 07:22:07', '2025-01-08 07:22:07'),
(NULL, 362, '-09:00', 'Tim-0362', 'America/Juneau', 'Active', 1, 1, NULL, '2025-01-08 07:22:35', '2025-01-08 07:22:35'),
(NULL, 363, '-05:00', 'Tim-0363', 'America/Kentucky/Louisville', 'Active', 1, 1, NULL, '2025-01-08 07:22:47', '2025-01-08 07:22:47'),
(NULL, 364, '-05:00', 'Tim-0364', 'America/Kentucky/Monticello', 'Active', 1, 1, NULL, '2025-01-08 07:23:15', '2025-01-08 07:23:15'),
(NULL, 365, '-08:00', 'Tim-0365', 'America/Los_Angeles', 'Active', 1, 1, NULL, '2025-01-08 07:23:27', '2025-01-08 07:23:27'),
(NULL, 366, '-06:00', 'Tim-0366', 'America/Menominee', 'Active', 1, 1, NULL, '2025-01-08 07:23:40', '2025-01-08 07:23:40'),
(NULL, 367, '-09:00', 'Tim-0367', 'America/Metlakatla', 'Active', 1, 1, NULL, '2025-01-08 07:24:00', '2025-01-08 07:24:00'),
(NULL, 368, '-05:00', 'Tim-0368', 'America/New_York', 'Active', 1, 1, NULL, '2025-01-08 07:24:14', '2025-01-08 07:24:14'),
(NULL, 369, '-09:00', 'Tim-0369', 'America/Nome', 'Active', 1, 1, NULL, '2025-01-08 07:24:35', '2025-01-08 07:24:35'),
(NULL, 370, '-06:00', 'Tim-0370', 'America/North_Dakota/Beulah', 'Active', 1, 1, NULL, '2025-01-08 07:24:51', '2025-01-08 07:24:51'),
(NULL, 371, '-06:00', 'Tim-0371', 'America/North_Dakota/Center', 'Active', 1, 1, NULL, '2025-01-08 07:25:04', '2025-01-08 07:25:04'),
(NULL, 372, '-06:00', 'Tim-0372', 'America/North_Dakota/New_Salem', 'Active', 1, 1, NULL, '2025-01-08 07:25:16', '2025-01-08 07:25:16'),
(NULL, 373, '-07:00', 'Tim-0373', 'America/Phoenix', 'Active', 1, 1, NULL, '2025-01-08 07:25:29', '2025-01-08 07:25:29'),
(NULL, 374, '-09:00', 'Tim-0374', 'America/Sitka', 'Active', 1, 1, NULL, '2025-01-08 07:25:41', '2025-01-08 07:25:41'),
(NULL, 375, '-09:00', 'Tim-0375', 'America/Yakutat', 'Active', 1, 1, NULL, '2025-01-08 07:26:00', '2025-01-08 07:26:00'),
(NULL, 376, '-10:00', 'Tim-0376', 'Pacific/Honolulu', 'Active', 1, 1, NULL, '2025-01-08 07:26:16', '2025-01-08 07:26:16'),
(NULL, 377, '-11:00', 'Tim-0377', 'Pacific/Midway', 'Active', 1, 1, NULL, '2025-01-08 07:26:26', '2025-01-08 07:26:26'),
(NULL, 378, '+12:00', 'Tim-0378', 'Pacific/Wake', 'Active', 1, 1, NULL, '2025-01-08 07:26:37', '2025-01-08 07:26:37'),
(NULL, 379, '-03:00', 'Tim-0379', 'America/Montevideo', 'Active', 1, 1, NULL, '2025-01-08 07:26:57', '2025-01-08 07:26:57'),
(NULL, 380, '+05:00', 'Tim-0380', 'Asia/Samarkand', 'Active', 1, 1, NULL, '2025-01-08 07:27:19', '2025-01-08 07:27:19'),
(NULL, 381, '+05:00', 'Tim-0381', 'Asia/Tashkent', 'Active', 1, 1, NULL, '2025-01-08 07:27:33', '2025-01-08 07:27:33'),
(NULL, 382, '+11:00', 'Tim-0382', 'Pacific/Efate', 'Active', 1, 1, NULL, '2025-01-08 07:27:46', '2025-01-08 07:27:46'),
(NULL, 383, '-04:00', 'Tim-0383', 'America/Caracas', 'Active', 1, 1, NULL, '2025-01-08 07:28:01', '2025-01-08 07:28:01'),
(NULL, 384, '+07:00', 'Tim-0384', 'Asia/Ho_Chi_Minh', 'Active', 1, 1, NULL, '2025-01-08 07:28:17', '2025-01-08 07:28:17'),
(NULL, 385, '-04:00', 'Tim-0385', 'America/Tortola', 'Active', 1, 1, NULL, '2025-01-08 07:28:33', '2025-01-08 07:28:33'),
(NULL, 386, '-04:00', 'Tim-0386', 'America/St_Thomas', 'Active', 1, 1, NULL, '2025-01-08 07:28:47', '2025-01-08 07:28:47'),
(NULL, 387, '+12:00', 'Tim-0387', 'Pacific/Wallis', 'Active', 1, 1, NULL, '2025-01-08 07:29:02', '2025-01-08 07:29:02'),
(NULL, 388, '+03:00', 'Tim-0388', 'Asia/Aden', 'Active', 1, 1, NULL, '2025-01-08 07:29:13', '2025-01-08 07:29:13'),
(NULL, 389, '+02:00', 'Tim-0389', 'Africa/Lusaka', 'Active', 1, 1, NULL, '2025-01-08 07:29:41', '2025-01-08 07:29:41'),
(NULL, 390, '+02:00', 'Tim-0390', 'Africa/Harare', 'Active', 1, 1, NULL, '2025-01-08 07:30:03', '2025-01-08 07:30:03'),
(NULL, 391, '+02:00', 'Tim-0391', 'Europe/Mariehamn', 'Active', 1, 1, NULL, '2025-01-08 07:30:18', '2025-01-08 07:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('Super Admin','Admin','Customer') NOT NULL,
  `status` enum('Active','Blocked') NOT NULL,
  `profile_img` longtext DEFAULT NULL,
  `reset_password_token` varchar(250) DEFAULT NULL,
  `reset_password_expiry_time` varchar(50) DEFAULT NULL,
  `two_factor_enabled` tinyint(1) DEFAULT NULL,
  `google2fa_secret` varchar(20) DEFAULT NULL,
  `blocked_reason` text DEFAULT NULL,
  `blocked_type` varchar(191) DEFAULT NULL,
  `blocked_at` timestamp NULL DEFAULT NULL,
  `code` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `post_box` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`encrypt_id`, `id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `company_id`, `created_at`, `updated_at`, `type`, `status`, `profile_img`, `reset_password_token`, `reset_password_expiry_time`, `two_factor_enabled`, `google2fa_secret`, `blocked_reason`, `blocked_type`, `blocked_at`, `code`, `dob`, `city`, `post_box`, `address`, `country_id`) VALUES
(NULL, 1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$Xdmt5sDi.MKe3KejsSmb0e2muNf/9pEDa/tJk1hOm/e7Kj10MBGAu', NULL, 1, '2023-12-10 22:29:09', '2025-01-28 09:17:25', 'Super Admin', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 99),
(NULL, 2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Xdmt5sDi.MKe3KejsSmb0e2muNf/9pEDa/tJk1hOm/e7Kj10MBGAu', NULL, 1, '2024-11-25 10:54:10', '2025-01-30 10:41:39', 'Admin', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-01-21', 'Hzb', '123456', 'Noida', 99),
(NULL, 3, 'Customer', 'customer@gmail.com', NULL, '$2y$10$Xdmt5sDi.MKe3KejsSmb0e2muNf/9pEDa/tJk1hOm/e7Kj10MBGAu', NULL, 1, '2024-11-25 10:54:10', '2025-01-30 10:41:39', 'Customer', 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-01-21', 'Hzb', '123456', 'Noida', 99);

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `encrypt_id` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Status` enum('Active','In active') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_company`
--

INSERT INTO `user_company` (`encrypt_id`, `id`, `user_id`, `company_id`, `Status`, `created_at`, `updated_at`) VALUES
(NULL, 2, 79, 4, 'Active', '2025-01-12 10:40:15', '2025-01-12 10:40:15'),
(NULL, 3, 81, 1, 'Active', '2025-01-27 04:53:47', '2025-01-27 04:53:47'),
(NULL, 4, 81, 2, 'Active', '2025-01-27 04:53:47', '2025-01-27 04:53:47'),
(NULL, 5, 81, 4, 'Active', '2025-01-27 04:53:47', '2025-01-27 04:53:47'),
(NULL, 6, 71, 1, 'Active', '2025-01-27 08:55:26', '2025-01-27 08:55:26'),
(NULL, 7, 71, 2, 'Active', '2025-01-27 08:55:26', '2025-01-27 08:55:26'),
(NULL, 8, 71, 4, 'Active', '2025-01-27 08:55:26', '2025-01-27 08:55:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amy_countries`
--
ALTER TABLE `amy_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_code_unique` (`code`),
  ADD KEY `customer_company_id_foreign` (`company_id`),
  ADD KEY `customer_created_by_foreign` (`created_by`),
  ADD KEY `customer_updated_by_foreign` (`updated_by`),
  ADD KEY `customer_country_id_foreign` (`country_id`);

--
-- Indexes for table `custom_notification`
--
ALTER TABLE `custom_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_notification_user_id_foreign` (`user_id`);

--
-- Indexes for table `date_formate`
--
ALTER TABLE `date_formate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date_formate_code_unique` (`code`),
  ADD KEY `date_formate_company_id_foreign` (`company_id`),
  ADD KEY `date_formate_created_by_foreign` (`created_by`),
  ADD KEY `date_formate_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_master`
--
ALTER TABLE `email_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_login`
--
ALTER TABLE `last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modeofpayment`
--
ALTER TABLE `modeofpayment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modeofpayment_name_unique` (`name`),
  ADD UNIQUE KEY `modeofpayment_code_unique` (`code`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_code_unique` (`code`),
  ADD KEY `tax_company_id_foreign` (`company_id`),
  ADD KEY `tax_created_by_foreign` (`created_by`),
  ADD KEY `tax_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tblmenu_setting`
--
ALTER TABLE `tblmenu_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alertlog`
--
ALTER TABLE `tbl_alertlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_zone`
--
ALTER TABLE `time_zone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_zone_code_unique` (`code`),
  ADD KEY `time_zone_company_id_foreign` (`company_id`),
  ADD KEY `time_zone_created_by_foreign` (`created_by`),
  ADD KEY `time_zone_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amy_countries`
--
ALTER TABLE `amy_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_notification`
--
ALTER TABLE `custom_notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `date_formate`
--
ALTER TABLE `date_formate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_master`
--
ALTER TABLE `email_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `last_login`
--
ALTER TABLE `last_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `modeofpayment`
--
ALTER TABLE `modeofpayment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmenu_setting`
--
ALTER TABLE `tblmenu_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_alertlog`
--
ALTER TABLE `tbl_alertlog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `time_zone`
--
ALTER TABLE `time_zone`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `amy_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `date_formate`
--
ALTER TABLE `date_formate`
  ADD CONSTRAINT `date_formate_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `date_formate_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `date_formate_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tax_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tax_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_zone`
--
ALTER TABLE `time_zone`
  ADD CONSTRAINT `time_zone_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_zone_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_zone_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
