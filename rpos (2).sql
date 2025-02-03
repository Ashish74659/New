-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 01:59 PM
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
-- Database: `rpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(191) DEFAULT NULL,
  `source_id` bigint(20) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amy_countries`
--

CREATE TABLE `amy_countries` (
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

INSERT INTO `amy_countries` (`id`, `name`, `code_1`, `code_2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', 'USA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(2, 'Albania', 'AL', 'ALB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(3, 'Algeria', 'DZ', 'DZA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(4, 'American Samoa', 'AS', 'ASM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(5, 'Andorra', 'AD', 'AND', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(6, 'Angola', 'AO', 'AGO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(7, 'Anguilla', 'AI', 'AIA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(8, 'Antarctica', 'AQ', 'ATA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(10, 'Argentina', 'AR', 'ARG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(11, 'Armenia', 'AM', 'ARM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(12, 'Aruba', 'AW', 'ABW', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(13, 'Australia', 'AU', 'AUS', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(14, 'Austria', 'AT', 'AUT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(15, 'Azerbaijan', 'AZ', 'AZE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(16, 'Bahamas', 'BS', 'BHS', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(17, 'Bahrain', 'BH', 'BHR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(18, 'Bangladesh', 'BD', 'BGD', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(19, 'Barbados', 'BB', 'BRB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(20, 'Belarus', 'BY', 'BLR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(21, 'Belgium', 'BE', 'BEL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(22, 'Belize', 'BZ', 'BLZ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(23, 'Benin', 'BJ', 'BEN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(24, 'Bermuda', 'BM', 'BMU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(25, 'Bhutan', 'BT', 'BTN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(26, 'Bolivia', 'BO', 'BOL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(28, 'Botswana', 'BW', 'BWA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(29, 'Bouvet Island', 'BV', 'BVT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(30, 'Brazil', 'BR', 'BRA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(32, 'Brunei Darussalam', 'BN', 'BRN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(33, 'Bulgaria', 'BG', 'BGR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(34, 'Burkina Faso', 'BF', 'BFA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(35, 'Burundi', 'BI', 'BDI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(36, 'Cambodia', 'KH', 'KHM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(37, 'Cameroon', 'CM', 'CMR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(38, 'Canada', 'CA', 'CAN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(39, 'Cape Verde', 'CV', 'CPV', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(40, 'Cayman Islands', 'KY', 'CYM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(41, 'Central African Republic', 'CF', 'CAF', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(42, 'Chad', 'TD', 'TCD', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(43, 'Chile', 'CL', 'CHL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(44, 'China', 'CN', 'CHN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(45, 'Christmas Island', 'CX', 'CXR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(47, 'Colombia', 'CO', 'COL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(48, 'Comoros', 'KM', 'COM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(49, 'Congo', 'CG', 'COG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(50, 'Cook Islands', 'CK', 'COK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(51, 'Costa Rica', 'CR', 'CRI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(53, 'Croatia', 'HR', 'HRV', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(54, 'Cuba', 'CU', 'CUB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(55, 'Cyprus', 'CY', 'CYP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(56, 'Czech Republic', 'CZ', 'CZE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(57, 'Denmark', 'DK', 'DNK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(58, 'Djibouti', 'DJ', 'DJI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(59, 'Dominica', 'DM', 'DMA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(60, 'Dominican Republic', 'DO', 'DOM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(61, 'East Timor', 'TP', 'TMP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(62, 'Ecuador', 'EC', 'ECU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(63, 'Egypt', 'EG', 'EGY', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(64, 'El Salvador', 'SV', 'SLV', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(66, 'Eritrea', 'ER', 'ERI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(67, 'Estonia', 'EE', 'EST', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(68, 'Ethiopia', 'ET', 'ETH', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(70, 'Faroe Islands', 'FO', 'FRO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(71, 'Fiji', 'FJ', 'FJI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(72, 'Finland', 'FI', 'FIN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(73, 'France', 'FR', 'FRA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(74, 'France, Metropolitan', 'FX', 'FXX', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(75, 'French Guiana', 'GF', 'GUF', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(76, 'French Polynesia', 'PF', 'PYF', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(77, 'French Southern Territories', 'TF', 'ATF', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(78, 'Gabon', 'GA', 'GAB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(79, 'Gambia', 'GM', 'GMB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(80, 'Georgia', 'GE', 'GEO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(81, 'Germany', 'DE', 'DEU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(82, 'Ghana', 'GH', 'GHA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(83, 'Gibraltar', 'GI', 'GIB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(84, 'Greece', 'GR', 'GRC', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(85, 'Greenland', 'GL', 'GRL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(86, 'Grenada', 'GD', 'GRD', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(87, 'Guadeloupe', 'GP', 'GLP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(88, 'Guam', 'GU', 'GUM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(89, 'Guatemala', 'GT', 'GTM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(90, 'Guinea', 'GN', 'GIN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(91, 'Guinea-bissau', 'GW', 'GNB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(92, 'Guyana', 'GY', 'GUY', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(93, 'Haiti', 'HT', 'HTI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(95, 'Honduras', 'HN', 'HND', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(96, 'Hong Kong', 'HK', 'HKG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(97, 'Hungary', 'HU', 'HUN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(98, 'Iceland', 'IS', 'ISL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(99, 'India', 'IN', 'IND', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(100, 'Indonesia', 'ID', 'IDN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(102, 'Iraq', 'IQ', 'IRQ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(103, 'Ireland', 'IE', 'IRL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(104, 'Israel', 'IL', 'ISR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(105, 'Italy', 'IT', 'ITA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(106, 'Jamaica', 'JM', 'JAM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(107, 'Japan', 'JP', 'JPN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(108, 'Jordan', 'JO', 'JOR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(109, 'Kazakhstan', 'KZ', 'KAZ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(110, 'Kenya', 'KE', 'KEN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(111, 'Kiribati', 'KI', 'KIR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(112, 'Korea, Democratic People\'s Republic of', 'KP', 'PRK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(113, 'Korea, Republic of', 'KR', 'KOR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(114, 'Kuwait', 'KW', 'KWT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(117, 'Latvia', 'LV', 'LVA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(118, 'Lebanon', 'LB', 'LBN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(119, 'Lesotho', 'LS', 'LSO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(120, 'Liberia', 'LR', 'LBR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(122, 'Liechtenstein', 'LI', 'LIE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(123, 'Lithuania', 'LT', 'LTU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(124, 'Luxembourg', 'LU', 'LUX', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(125, 'Macau', 'MO', 'MAC', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(127, 'Madagascar', 'MG', 'MDG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(128, 'Malawi', 'MW', 'MWI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(129, 'Malaysia', 'MY', 'MYS', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(130, 'Maldives', 'MV', 'MDV', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(131, 'Mali', 'ML', 'MLI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(132, 'Malta', 'MT', 'MLT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(133, 'Marshall Islands', 'MH', 'MHL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(134, 'Martinique', 'MQ', 'MTQ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(135, 'Mauritania', 'MR', 'MRT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(136, 'Mauritius', 'MU', 'MUS', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(137, 'Mayotte', 'YT', 'MYT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(138, 'Mexico', 'MX', 'MEX', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(140, 'Moldova, Republic of', 'MD', 'MDA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(141, 'Monaco', 'MC', 'MCO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(142, 'Mongolia', 'MN', 'MNG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(143, 'Montserrat', 'MS', 'MSR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(144, 'Morocco', 'MA', 'MAR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(145, 'Mozambique', 'MZ', 'MOZ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(146, 'Myanmar', 'MM', 'MMR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(147, 'Namibia', 'NA', 'NAM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(148, 'Nauru', 'NR', 'NRU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(149, 'Nepal', 'NP', 'NPL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(150, 'Netherlands', 'NL', 'NLD', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(151, 'Netherlands Antilles', 'AN', 'ANT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(152, 'New Caledonia', 'NC', 'NCL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(153, 'New Zealand', 'NZ', 'NZL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(154, 'Nicaragua', 'NI', 'NIC', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(155, 'Niger', 'NE', 'NER', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(156, 'Nigeria', 'NG', 'NGA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(157, 'Niue', 'NU', 'NIU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(158, 'Norfolk Island', 'NF', 'NFK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(160, 'Norway', 'NO', 'NOR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(161, 'Oman', 'OM', 'OMN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(162, 'Pakistan', 'PK', 'PAK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(163, 'Palau', 'PW', 'PLW', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(164, 'Panama', 'PA', 'PAN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(165, 'Papua New Guinea', 'PG', 'PNG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(166, 'Paraguay', 'PY', 'PRY', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(167, 'Peru', 'PE', 'PER', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(168, 'Philippines', 'PH', 'PHL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(169, 'Pitcairn', 'PN', 'PCN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(170, 'Poland', 'PL', 'POL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(171, 'Portugal', 'PT', 'PRT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(172, 'Puerto Rico', 'PR', 'PRI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(173, 'Qatar', 'QA', 'QAT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(174, 'Reunion', 'RE', 'REU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(175, 'Romania', 'RO', 'ROM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(176, 'Russian Federation', 'RU', 'RUS', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(177, 'Rwanda', 'RW', 'RWA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(179, 'Saint Lucia', 'LC', 'LCA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(181, 'Samoa', 'WS', 'WSM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(182, 'San Marino', 'SM', 'SMR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(183, 'Sao Tome and Principe', 'ST', 'STP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(184, 'Saudi Arabia', 'SA', 'SAU', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(185, 'Senegal', 'SN', 'SEN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(186, 'Seychelles', 'SC', 'SYC', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(187, 'Sierra Leone', 'SL', 'SLE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(188, 'Singapore', 'SG', 'SGP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(190, 'Slovenia', 'SI', 'SVN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(191, 'Solomon Islands', 'SB', 'SLB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(192, 'Somalia', 'SO', 'SOM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(193, 'South Africa', 'ZA', 'ZAF', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(195, 'Spain', 'ES', 'ESP', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(196, 'Sri Lanka', 'LK', 'LKA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(197, 'St. Helena', 'SH', 'SHN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(199, 'Sudan', 'SD', 'SDN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(200, 'Suriname', 'SR', 'SUR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(202, 'Swaziland', 'SZ', 'SWZ', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(203, 'Sweden', 'SE', 'SWE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(204, 'Switzerland', 'CH', 'CHE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(206, 'Taiwan', 'TW', 'TWN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(207, 'Tajikistan', 'TJ', 'TJK', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(209, 'Thailand', 'TH', 'THA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(210, 'Togo', 'TG', 'TGO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(211, 'Tokelau', 'TK', 'TKL', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(212, 'Tonga', 'TO', 'TON', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(214, 'Tunisia', 'TN', 'TUN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(215, 'Turkey', 'TR', 'TUR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(216, 'Turkmenistan', 'TM', 'TKM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(218, 'Tuvalu', 'TV', 'TUV', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(219, 'Uganda', 'UG', 'UGA', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(220, 'Ukraine', 'UA', 'UKR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(221, 'United Arab Emirates', 'AE', 'ARE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(222, 'United Kingdom', 'GB', 'GBR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(223, 'Afghanistan', 'AF', 'AFG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(225, 'Uruguay', 'UY', 'URY', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(226, 'Uzbekistan', 'UZ', 'UZB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(227, 'Vanuatu', 'VU', 'VUT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(229, 'Venezuela', 'VE', 'VEN', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(230, 'Viet Nam', 'VN', 'VNM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(234, 'Western Sahara', 'EH', 'ESH', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(235, 'Yemen', 'YE', 'YEM', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(236, 'Yugoslavia', 'YU', 'YUG', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(237, 'Zaire', 'ZR', 'ZAR', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(238, 'Zambia', 'ZM', 'ZMB', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10'),
(239, 'Zimbabwe', 'ZW', 'ZWE', 'Active', '2023-12-01 09:37:10', '2023-12-01 09:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source_id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(191) NOT NULL,
  `attachment_name` varchar(191) NOT NULL,
  `attachment_type` varchar(191) NOT NULL,
  `status` enum('Draft','Submitted') NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `postype_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `description`, `postype_id`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Vej', 'Cat-0001', 'Vej', 1, 'Active', 1, 1, NULL, '2024-11-28 04:34:13', '2024-11-28 04:34:13'),
(2, 'NonVej', 'Cat-0002', 'NonVej', 1, 'Active', 1, 1, NULL, '2024-11-28 04:34:25', '2024-11-28 04:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(191) DEFAULT NULL,
  `source_id` bigint(20) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_images`
--

CREATE TABLE `comment_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) DEFAULT NULL,
  `attachment_name` varchar(191) DEFAULT NULL,
  `attachment_type` varchar(191) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vat_no` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `registration_no` varchar(100) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `origin_date` date NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL,
  `default_company` enum('Yes','No') NOT NULL DEFAULT 'No',
  `country_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `code`, `name`, `vat_no`, `address`, `city`, `state`, `zip_code`, `company_logo`, `about`, `registration_no`, `website`, `origin_date`, `contact_number`, `status`, `default_company`, `country_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Amy-001', 'AmySoftech', 'Vt-001', '06', 'Barhi xchgkBarhi xchgkBarhi xcBarhi xchgkBarhi xch', 'Jharkhand', '825405', 'documents/UnknownCompany/Company/IS4wYGAKYAo=/Company Logo/1732530680527.png', 'lkjh', 'Reg-001', 'http://127.0.0.1:8000/company/company-add', '2024-11-21', '9204224938', 'Active', 'No', 16, 1, 1, '2024-11-25 10:01:20', '2024-11-25 10:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `company_employee`
--

CREATE TABLE `company_employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `empCode` varchar(50) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `position_id` bigint(20) DEFAULT NULL,
  `reportto_id` bigint(20) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `business_unit` varchar(191) DEFAULT NULL,
  `cost_center` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_employee`
--

INSERT INTO `company_employee` (`id`, `code`, `name`, `email`, `empCode`, `contact_no`, `permanent_address`, `current_address`, `city`, `state`, `zip_code`, `status`, `country_id`, `profile_picture`, `position_id`, `reportto_id`, `department_id`, `user_id`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `business_unit`, `cost_center`) VALUES
(922, 'Company_Emp-000001', 'Ashish', 'ashish.k@amysoftech.in', 'E-001', '09060467085', 'Dumari\r\n106', 'Dumari\r\n106', 'HAZARIBAG', 'Jharkhand', '825406', 'Active', 99, 'documents/AmySoftech/Company_employee/Iy4zKFIKYAo=/Employee Pic/1732531557317.jpg', 61, 922, 233, 71, 1, 1, 1, '2024-11-25 10:15:56', '2024-11-25 10:54:12', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
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
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'UAE Dirham', 'AED', 'UAE Dirham', 'Active', 1, 1, NULL, '2023-12-21 04:17:09', '2023-12-21 04:17:09'),
(2, 'Australian Dollar', 'AUD', 'Australian Dollar', 'Active', 1, 1, NULL, '2023-12-21 04:17:38', '2023-12-21 04:17:38'),
(3, 'Afghani', 'AFN', 'Afghanistan', 'Active', 1, 1, NULL, '2023-12-21 04:20:01', '2024-09-19 04:25:59'),
(4, 'Omani rial', 'OMR', 'Omani rial', 'Active', 3, 1, NULL, '2024-08-12 05:38:08', '2024-08-12 05:38:08'),
(5, 'US Dollar', 'USD', 'US Dollar', 'Active', 3, 1, NULL, '2024-08-12 05:38:40', '2024-08-12 05:38:40'),
(6, 'AED_one', 'AED_one', 'This currency is added by ERP', 'Active', 1, 1, NULL, '2024-11-18 05:13:54', '2024-11-18 05:13:54'),
(7, 'FDO', 'FDO', 'This currency is added by ERP', 'Active', 3, 1, NULL, '2024-11-21 05:21:54', '2024-11-21 05:21:54'),
(8, 'ea', 'ea', 'This currency is added by ERP', 'Active', 3, 1, NULL, '2024-11-21 11:20:02', '2024-11-21 11:20:02'),
(9, 'New', 'New', 'dfxf', 'Active', 1, 1, NULL, '2024-11-25 09:29:53', '2024-11-25 09:29:53'),
(10, 'new1', 'ersdcx', 'ewsazdx', 'Active', 1, 1, NULL, '2024-11-25 09:31:39', '2024-11-25 09:31:39'),
(11, 'UAE Dirhamw', 'UAE Dirhamw', 'wers', 'Active', 1, 1, NULL, '2024-11-25 09:34:35', '2024-11-25 09:34:35'),
(12, 'UAE Dirhamdswesd', 'UAE Dirhamwwesard', 'esd', 'Active', 1, 1, NULL, '2024-11-25 09:48:37', '2024-11-25 09:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customer_type` enum('Individual','Business') NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `alertnate_phone_no` varchar(15) DEFAULT NULL,
  `pos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_no` varchar(25) DEFAULT NULL,
  `balance` double(15,3) DEFAULT NULL,
  `credit_limit` double(15,3) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `code`, `email`, `customer_type`, `phone_no`, `alertnate_phone_no`, `pos_id`, `company_employee_id`, `tax_no`, `balance`, `credit_limit`, `address1`, `address2`, `city`, `state`, `country_id`, `zipcode`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'lkjfdlxkj', 'redkjgh', 'lkjerksdlfj@kjdsf.dszxjf', 'Individual', '23456', NULL, 1, 922, 'wesdzfxc', 2345.456, 345.300, 'weszdsc', 'sedzxc', '3ersdf', 'erdfxdgv', 14, '1111', 'Active', 1, 1, 1, '2024-11-28 08:45:01', '2024-11-28 08:48:20'),
(11, 'erdsxv', 'esdzxfc', 'kashishji1999@gmail.com', 'Business', '12345678', NULL, NULL, NULL, '', 3245678.000, 4356.000, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, 1, '2024-11-28 10:21:17', '2024-11-28 10:43:10'),
(13, 'Ashish', 'New', 'ashish.k@amysoftech.in', 'Business', '09060467085', NULL, NULL, NULL, NULL, 8787.000, 567.000, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 1, 1, 1, '2024-11-28 11:16:07', '2024-11-28 11:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prifix` varchar(15) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_contact`
--

INSERT INTO `customer_contact` (`id`, `prifix`, `firstname`, `lastname`, `email`, `phone_no`, `customer_id`, `created_at`, `updated_at`) VALUES
(6, 'resdf', 'ersdf', 'kr', 'ashish.k@amysoftech.in', '07033082170', 13, '2024-11-28 11:16:26', '2024-11-28 11:16:26'),
(7, 'ersdf', 'ersdf', '32wer', 'kashishji1999@gmail.com', '08757624875', 13, '2024-11-28 11:16:26', '2024-11-28 11:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `custom_notification`
--

CREATE TABLE `custom_notification` (
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
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `company_employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
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

INSERT INTO `email_master` (`id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'OTP For Supplier Registration Request', 'Ema-001', '[COMPANY_NAME],[OTP],[REQUESTER_NAME]', 'Active', 1, 1, NULL, '2024-02-22 00:44:38', '2024-02-22 03:52:20'),
(2, 'Supplier Invitation', 'Ema-002', '[EMAIL_ID],[PASSWORD],[REQUEST_ID],[VENDOR_NAME],[COMPANY_NAME],[URL]', 'Active', 1, 1, NULL, '2024-02-22 00:44:09', '2024-10-03 06:01:13'),
(3, 'Supplier Request Submission', 'Ema-003', '[REQUESTER],[COMPANY_NAME],[SUPPLIER_REQUEST_ID]', 'Active', 1, 1, NULL, '2024-02-22 00:43:18', '2024-02-22 01:02:08'),
(4, 'Supplier Request Approval', 'Ema-004', '[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[EMAIL_ID],[PASSWORD],[VENDOR_NAME]', 'Active', 1, 1, NULL, '2024-02-22 00:43:53', '2024-02-22 01:04:23'),
(5, 'Supplier Request Rejection', 'Ema-005', '[REQUEST_ID],[VENDOR_NAME],[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[NUMBER_FROM_PARAMETER]', 'Active', 1, 1, NULL, '2024-02-22 00:43:38', '2024-02-22 00:43:38'),
(6, 'Workflow Task Assignment', 'Ema-006', '[TASK_ID],[NAME],[DOCUMENT_NO],[URL],[DOCUMENT_TYPE],[CREATED_BY],[CREATED_ON]', 'Active', 1, 1, NULL, '2024-02-19 22:54:09', '2024-02-22 03:14:24'),
(7, 'Vendor Account Approval', 'Ema-007', '[VENDOR_NAME],[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[BIDMATE_VENDOR_ID],[EMAIL_ID],[PASSWORD]', 'Active', 1, 1, NULL, '2024-02-22 00:41:58', '2024-02-22 01:12:01'),
(8, 'Vendor Account Rejection', 'Ema-008', '[VENDOR_NAME],[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[NUMBER_FROM_PARAMETER]', 'Active', 1, 1, NULL, '2024-02-22 00:41:41', '2024-02-22 00:41:41'),
(9, 'Quotation / Purchase order Generated For Supplier', 'Ema-009', '[DOCUMENT_TYPE],[SUPPLIER_NAME],[DOCUMENT_ID],[URL],[CREATED_ON]', 'Active', 1, 1, NULL, '2024-02-22 00:44:23', '2024-02-22 01:17:01'),
(10, 'GRN Approved', 'Ema-0010', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[APPROVAL_DATE],[URL]', 'Active', 1, 1, NULL, '2024-02-22 00:46:00', '2024-02-22 00:46:00'),
(11, 'GRN Rejected', 'Ema-0011', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[REJECTED_DATE],[URL]', 'Active', 1, 1, NULL, '2024-02-22 00:45:47', '2024-02-22 00:45:47'),
(12, 'Invoice Approved', 'Ema-0012', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[INVOICE_AMOUNT],[CURRENCY],[DOCUMENT_ID],[DOCUMENT_TYPE],[APPROVAL_DATE],[URL]', 'Active', 1, 1, NULL, '2024-02-22 00:45:32', '2024-02-22 00:45:32'),
(13, 'Invoice Rejected', 'Ema-0013', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[REJECTED_DATE],[URL]', 'Active', 1, 1, NULL, '2024-02-22 00:45:18', '2024-02-22 00:45:18'),
(14, 'Tender/ RFI Sent to supplier', 'Ema-0014', '[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[URL],[CREATED_ON],[COMPANY_NAME]', 'Active', 1, 1, NULL, '2024-02-22 00:42:15', '2024-02-22 01:27:41'),
(15, 'Tender Payment Status', 'Ema-0015', '[TRANSACTION_ID],[SUPPLIER_NAME],[PAYMENT_STATUS],[DOCUMENT_TYPE],[URL],[TRANSACTION_DATE_TIME],[TRANSACTION_AMOUNT]', 'Active', 1, 1, NULL, '2024-02-22 00:42:34', '2024-02-23 23:03:29'),
(16, 'Tender Award to Supplier', 'Ema-0016', '[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[URL],[AWARDED_DATE],[COMPANY_NAME]', 'Active', 1, 1, NULL, '2024-02-22 00:42:54', '2024-02-22 00:42:54'),
(18, 'OTP For Creating User', 'Ema-0017', '[USER_TYPE],[EMAIL],[PASSWORD],[USER_NAME]', 'Active', 1, 1, NULL, '2024-05-10 00:28:20', '2024-05-10 00:54:18'),
(19, 'Forget Password', 'Ema-0018', '[URL],[OTP],[REQUESTER_NAME]', 'Active', 1, 1, NULL, '2024-05-10 00:28:20', '2024-09-24 12:24:36'),
(20, '2FA Verify', 'Ema-0019', '[OTP],[NAME]', 'Active', 1, 1, NULL, '2024-05-09 18:58:20', '2024-05-09 19:24:18'),
(21, 'Auction Award Intimation', 'Ema-0020', '[NAME],[AUCTION_ID],[AUCTION_TITLE],[DESCRIPTION],[AMOUNT],', 'Active', 1, 1, NULL, '2024-05-09 18:58:20', '2024-05-09 19:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
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

INSERT INTO `email_template` (`id`, `name`, `code`, `subject`, `veriable`, `content`, `email_master_id`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(18, 'OTP FOR Supplier Registration Request', 'Ema-0001', 'Login OTP', '[COMPANY_NAME],[OTP],[REQUESTER_NAME]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear <strong>[REQUESTER_NAME]</strong>,</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing [COMPANY_NAME]</span>&nbsp;as a business partner,</span></span> <span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Your one-time password (OTP) is <strong>[OTP]</strong>.</span></span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\">&nbsp;</p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">If you need any help, you can contact support@amysoftech.com.</span></span></span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span></span><span class=\"scxw25855296\">&nbsp;</span><br><span class=\"normaltextrun\"><span data-ccp-charstyle=\"Strong\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Team BIDMATE</span></span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw25855296\">&nbsp;</span><br><strong><span class=\"normaltextrun\"><span data-ccp-parastyle=\"Normal (Web)\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Note: This is an autogenerated mail, please </span>don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></strong></p>', 1, 'Active', 3, 1, 1, '2024-02-23 01:17:50', '2024-09-24 11:36:18'),
(19, 'Supplier Invitation', 'Ema-0002', 'Invitation: Supplier Registration', '[EMAIL_ID],[PASSWORD],[REQUEST_ID],[VENDOR_NAME],[COMPANY_NAME],[URL]', '<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">Dear&nbsp;<strong>[VENDOR_NAME]</strong></span><strong><span style=\"font-size: 12pt;\">&nbsp;</span></strong></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">We are glad to invite you as a procurement partner with <strong>[COMPANY_NAME]</strong>.</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">Please use the credentials below to access your account:</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: 1;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">             &nbsp; <strong>Login URL: </strong>&nbsp;[URL]</span></span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: 1;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Email:</strong> [EMAIL_ID]</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: 1;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">              <strong>Password:</strong> [PASSWORD]</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">Request ID: </span></span></strong><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">[REQUEST_ID]</span></span><span style=\"font-family: arial, helvetica, sans-serif;\"><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">The Supplier Registration Process consists of the following 4 stages: </span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">1. Request Submitted</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">2. Request Approved</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">3. Profile submission</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">4. Profile approval &amp; account creation</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">The process is sequential, i.e. any supplier cannot skip or proceed to the next stage without successfully passing stages.</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span lang=\"EN-US\" style=\"font-size: 12pt;\">Further for any assistance, you may contact support@amysoftech.com</span><strong><span style=\"font-size: 12pt;\">&nbsp;</span></strong></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><strong><span lang=\"EN-US\" style=\"font-size: 12pt;\">Warm Regards,</span></strong><span style=\"font-size: 12pt;\">&nbsp;<br></span><span lang=\"EN-US\" style=\"font-size: 12pt;\">Team BIDMATE</span><span style=\"font-size: 12pt;\">&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-margin-top-alt: auto; mso-margin-bottom-alt: auto; line-height: normal;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><span style=\"font-size: 12pt;\">&nbsp;<br></span><strong><span lang=\"EN-US\" style=\"font-size: 12pt;\">Note: This is autogenerated mail, don\'t reply to this mail.</span><span style=\"font-size: 12pt;\">&nbsp;</span></strong></span></p>', 2, 'Active', 2, 1, 144, '2024-02-23 01:25:03', '2024-10-07 09:34:26'),
(20, 'Supplier Request Submission', 'Ema-0003', 'Acknowledgement: Supplier Registration', '[REQUESTER],[COMPANY_NAME],[SUPPLIER_REQUEST_ID]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [REQUESTER]</span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing [COMPANY_NAME] as a business partner,</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Your supplier registration request #[SUPPLIER_REQUEST_ID] has been received,</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any </span>assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span></span><span class=\"scxw36499238\">&nbsp;</span><br><span class=\"normaltextrun\"><span data-ccp-charstyle=\"Strong\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Team BIDMATE</span></span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p><span class=\"scxw36499238\"><span style=\"font-size: 11.0pt; line-height: 107%; font-family: \'Calibri\',sans-serif; mso-ascii-theme-font: minor-latin; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-hansi-theme-font: minor-latin; mso-bidi-font-family: \'Times New Roman\'; mso-bidi-theme-font: minor-bidi; mso-ansi-language: EN-IN; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\">&nbsp;</span></span><span style=\"font-size: 11.0pt; line-height: 107%; font-family: \'Calibri\',sans-serif; mso-ascii-theme-font: minor-latin; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-hansi-theme-font: minor-latin; mso-bidi-font-family: \'Times New Roman\'; mso-bidi-theme-font: minor-bidi; mso-ansi-language: EN-IN; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\"><br></span><span class=\"normaltextrun\"><span data-ccp-parastyle=\"Normal (Web)\"><span lang=\"EN-US\" style=\"font-size: 11.0pt; line-height: 107%; font-family: \'Calibri\',sans-serif; mso-ascii-theme-font: minor-latin; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-hansi-theme-font: minor-latin; mso-bidi-font-family: \'Times New Roman\'; mso-bidi-theme-font: minor-bidi; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Note: This is autogenerated mail, </span>don\'t reply to this mail.</span></span></span><span class=\"eop\"><span style=\"font-size: 11.0pt; line-height: 107%; font-family: \'Calibri\',sans-serif; mso-ascii-theme-font: minor-latin; mso-fareast-font-family: Calibri; mso-fareast-theme-font: minor-latin; mso-hansi-theme-font: minor-latin; mso-bidi-font-family: \'Times New Roman\'; mso-bidi-theme-font: minor-bidi; mso-ansi-language: EN-IN; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;\"><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\">&nbsp;</span></span></span></p>', 3, 'Active', 1, 1, 1, '2024-02-23 01:25:44', '2024-02-23 01:25:44'),
(21, 'Supplier Request Approval', 'Ema-0004', 'Approved: Supplier Registration request', '[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[EMAIL_ID],[PASSWORD],[VENDOR_NAME]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear <strong>[VENDOR_NAME]</strong>,</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing [COMPANY_NAME]</span> as a business partner, we are glad to inform you that your supplier registration request has been approved.</span></span></p>\r\n<p class=\"paragraph\">&nbsp;</p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please use the credentials below to complete your profile:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">              </span>Email: <strong>[EMAIL_ID]</strong></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">              </span>Password: <strong>[PASSWORD]</strong></span></span></p>\r\n<p class=\"paragraph\">&nbsp;</p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">The Supplier Registration Process consists of the following 4 stages: </span></span></span><span data-ccp-props=\"{&quot;134233118&quot;:true,&quot;201341983&quot;:2,&quot;335557856&quot;:16777215,&quot;335559739&quot;:160,&quot;335559740&quot;:360}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">1. Request Submitted.</span></span></span><span data-ccp-props=\"{&quot;134233118&quot;:true,&quot;201341983&quot;:2,&quot;335557856&quot;:16777215,&quot;335559731&quot;:720,&quot;335559739&quot;:160,&quot;335559740&quot;:360}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">2. Request Approved.</span></span></span><span data-ccp-props=\"{&quot;134233118&quot;:true,&quot;201341983&quot;:2,&quot;335557856&quot;:16777215,&quot;335559731&quot;:720,&quot;335559739&quot;:160,&quot;335559740&quot;:360}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">3. Profile submission.</span></span></span><span data-ccp-props=\"{&quot;134233118&quot;:true,&quot;201341983&quot;:2,&quot;335557856&quot;:16777215,&quot;335559731&quot;:720,&quot;335559739&quot;:160,&quot;335559740&quot;:360}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">4. Profile approval &amp; account creation.</span></span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;134233118&quot;:true,&quot;201341983&quot;:2,&quot;335557856&quot;:16777215,&quot;335559731&quot;:720,&quot;335559739&quot;:160,&quot;335559740&quot;:360}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">The process is sequential, <strong>i.e.</strong> any supplier cannot skip or proceed to the next stage without successfully passing stages.</span></span></span><span data-ccp-props=\"{&quot;134233118&quot;:true,&quot;201341983&quot;:2,&quot;335557856&quot;:16777215,&quot;335559739&quot;:160,&quot;335559740&quot;:360}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\">&nbsp;</p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\">&nbsp;</p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw223351377\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw223351377\">&nbsp;</span><br><strong><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is an autogenerated mail, please don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></strong></p>', 4, 'Active', 3, 1, 1, '2024-02-23 01:26:21', '2024-09-26 06:24:23'),
(22, 'Supplier Request Rejection', 'Ema-0005', 'Rejected: Supplier Registration request #[REQUEST_ID]', '[REQUEST_ID],[VENDOR_NAME],[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[NUMBER_FROM_PARAMETER]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [VENDOR_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing [COMPANY_NAME]</span>&nbsp;as a business partner,</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Unfortunately, your supplier registration request #</span>[SUPPLIER_REQUEST_ID] has been rejected during the verification process.</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">You can re-register as a supplier after the completion of waiting period of [NUMBER_FROM_PARAMETER]</span>&nbsp;Days.</span></span><span data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any </span>assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"none\"><span data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span></span><span class=\"scxw257496951\">&nbsp;</span><br><span class=\"normaltextrun\"><span data-ccp-charstyle=\"Strong\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Team BIDMATE</span></span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw257496951\">&nbsp;</span><br><span class=\"normaltextrun\"><span data-ccp-parastyle=\"Normal (Web)\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"none\">Note: This is autogenerated mail, </span>don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 5, 'Active', 1, 1, 1, '2024-02-23 01:26:53', '2024-02-23 01:26:53'),
(23, 'Workflow Task Assignment', 'Ema-0006', 'Task Assignment :- [TASK_ID]', '[TASK_ID],[NAME],[DOCUMENT_NO],[URL],[DOCUMENT_TYPE],[CREATED_BY],[CREATED_ON]', '<p><span class=\"ui-provider\">Dear [NAME],</span></p>\r\n<p><span class=\"ui-provider\">This is a system-generated email as a part of the approval process, Below mentioned details require your action.</span></p>\r\n<p><strong>Document ID</strong>: [DOCUMENT_NO]</p>\r\n<p><strong>Document Type</strong>: [DOCUMENT_TYPE]</p>\r\n<p><strong>Requested by:</strong> [CREATED_BY]</p>\r\n<p><strong>Assigned On:</strong> [CREATED_ON]</p>\r\n<p>&nbsp;</p>\r\n<p>To view the complete document [URL]</p>\r\n<p>&nbsp;</p>\r\n<p>Further for any assistance, you may contact support@amysoftech.com</p>\r\n<p>Warm Regards,<br><strong>Team BIDMATE</strong></p>\r\n<p><br>Note: This is autogenerated mail, don\'t reply to this mail.</p>', 6, 'Active', 1, 1, 1, '2024-02-23 01:27:33', '2024-02-23 01:27:33'),
(24, 'Vendor Account Approval', 'Ema-0007', 'Approved: Supplier Registration', '[VENDOR_NAME],[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[BIDMATE_VENDOR_ID],[EMAIL_ID],[PASSWORD]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [VENDOR_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing [COMPANY_NAME]</span>&nbsp;as a business partner, we are glad to inform you that your supplier registration request #[SUPPLIER_REQUEST_ID]&nbsp;has been approved with Account ID : [BIDMATE_VENDOR_ID]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">You are now eligible to participate in &ldquo;Sourcing events&rdquo; conducted by the competent authorities.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">However, in order to conduct business (Receive orders / contract awards) with Company, you need to be &lsquo;Qualified&rsquo;.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please use the credentials below to access your account:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">              </span>Email : [EMAIL_ID]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">              </span>Password : [PASSWORD]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Note: This is a system-generated password, changing the password is recommended to secure your account.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw184361347\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw184361347\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">This is an autogenerated mail, please don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 7, 'Active', 1, 1, 1, '2024-02-23 01:28:13', '2024-02-23 01:28:13'),
(25, 'Vendor Account Rejection', 'Ema-0008', 'Rejected: Supplier Registration', '[VENDOR_NAME],[COMPANY_NAME],[SUPPLIER_REQUEST_ID],[NUMBER_FROM_PARAMETER]', '<p class=\"paragraph\" style=\"margin: 0in; vertical-align: baseline;\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif; mso-ansi-language: EN-US;\">Dear </span></span><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">[VENDOR_NAME],</span></span><span class=\"eop\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif;\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\" style=\"margin: 0in; vertical-align: baseline; -webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; overflow-wrap: break-word; white-space: pre-wrap; font-kerning: none;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif; mso-ansi-language: EN-US;\">Thanks for choosing </span></span></span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">[COMPANY_NAME]</span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif; mso-ansi-language: EN-US;\"> as a business partner,</span></span></span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif;\">&nbsp;</span></span></span></p>\r\n<p class=\"paragraph\" style=\"margin: 0in; vertical-align: baseline; -webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; overflow-wrap: break-word; white-space: pre-wrap; font-kerning: none;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif; mso-ansi-language: EN-US;\">Unfortunately, your </span>supplier registration request #</span></span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">[SUPPLIER_REQUEST_ID]</span></span><span class=\"normaltextrun\"><strong><span style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif; mso-ansi-language: EN-US;\"> </span></strong></span>has been rejected during the verification process.</span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\"><span style=\"font-size: 11.0pt; font-family: \'Calibri\',sans-serif;\">&nbsp;</span></span></span></p>\r\n<p class=\"paragraph\" style=\"margin: 0in; vertical-align: baseline; -webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; overflow-wrap: break-word; white-space: pre-wrap; font-kerning: none;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; outline: transparent solid 1px; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"auto\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 10.0pt; font-family: \'Calibri\',sans-serif; color: black; mso-color-alt: windowtext; background: white; mso-ansi-language: EN-US;\">You can re-register</span> as a supplier after the completion of waiting period of </span><strong>[</strong></span></span><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">NUMBER_FROM_PARAMETER</span></span><span class=\"normaltextrun\"><strong><span lang=\"EN-US\" style=\"font-size: 10.0pt; font-family: \'Calibri\',sans-serif; color: black; mso-color-alt: windowtext; background: white; mso-ansi-language: EN-US;\">] </span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\">Days</span></strong></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-props=\"{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}\"><span class=\"eop\"><span style=\"font-size: 10.0pt; font-family: \'Calibri\',sans-serif;\">&nbsp;</span></span></span></p>\r\n<p class=\"paragraph\" style=\"background: white; vertical-align: baseline; -webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; overflow-wrap: break-word; white-space: pre-wrap; font-kerning: none;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"none\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343; mso-ansi-language: EN-US;\">Further for any </span>assistance, you may contact support@amysoftech.com</span></span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">&nbsp;</span></span></span></p>\r\n<p class=\"paragraph\" style=\"background: white; vertical-align: baseline; -webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; overflow-wrap: break-word; white-space: pre-wrap; font-kerning: none;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"none\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-parastyle=\"Normal (Web)\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343; mso-ansi-language: EN-US;\">Warm Regards,</span></span></span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span class=\"scxw169396407\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">&nbsp;</span></span><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\"><br style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"></span><strong><span lang=\"EN-US\" style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343; mso-ansi-language: EN-US;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-charstyle=\"Strong\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"none\">Team BIDMATE</span></span></span></strong></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240}\"><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">&nbsp;</span></span></span></p>\r\n<div style=\"mso-element: para-border-div; border: none; border-bottom: solid black 1.0pt; mso-border-bottom-alt: solid black .75pt; padding: 0in 0in 1.0pt 0in; background: white;\">\r\n<p class=\"paragraph\" style=\"background: white; vertical-align: baseline; border: none; mso-border-bottom-alt: solid black .75pt; padding: 0in; mso-padding-alt: 0in 0in 1.0pt 0in; -webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; overflow-wrap: break-word; white-space: pre-wrap; border-left-color: initial; border-right-color: initial; border-top-color: initial; font-kerning: none;\"><span class=\"scxw169396407\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"><span style=\"font-size: 10.5pt; color: black; mso-color-alt: windowtext;\">&nbsp;</span></span><span style=\"font-size: 10.5pt; color: black; mso-color-alt: windowtext;\"><br style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\"></span><span lang=\"EN-US\" style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343; mso-ansi-language: EN-US;\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-parastyle=\"Normal (Web)\"><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text; font-variant-ligatures: none !important;\" xml:lang=\"EN-US\" data-contrast=\"none\">Note: This is autogenerated mail, </span>don\'t reply to this mail.</span></span></span><span style=\"-webkit-user-drag: none; -webkit-tap-highlight-color: transparent; user-select: text;\" data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335557856&quot;:16777215,&quot;335559740&quot;:240,&quot;335572079&quot;:6,&quot;335572080&quot;:1,&quot;335572081&quot;:4278190080,&quot;469789806&quot;:&quot;single&quot;}\"><span class=\"eop\"><span style=\"font-size: 10.5pt; font-family: \'Calibri\',sans-serif; color: #434343;\">&nbsp;</span></span></span></p>\r\n</div>', 8, 'Active', 1, 1, 1, '2024-02-23 01:28:39', '2024-02-23 01:28:39'),
(26, 'Quotation / Purchase order Generated For Supplier', 'Ema-0009', '[DOCUMENT_TYPE] Generated: - #[DOCUMENT_ID]', '[DOCUMENT_TYPE],[SUPPLIER_NAME],[DOCUMENT_ID],[URL],[CREATED_ON]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[DOCUMENT_TYPE]</span></span><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">&nbsp; - </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">#[DOCUMENT_ID] has been generated into your account is pending for your action.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below mentioned request details:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Raised On:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[CREATED_ON]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, </span></span></span><span xml:lang=\"EN-US\" data-contrast=\"none\">[URL]</span></p>\r\n<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> Further for any assistance, you may contact support@amysoftech.com</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw3174939\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw3174939\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 9, 'Active', 1, 1, 1, '2024-02-23 01:29:30', '2024-02-23 01:29:30');
INSERT INTO `email_template` (`id`, `name`, `code`, `subject`, `veriable`, `content`, `email_master_id`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(27, 'GRN Approved', 'Ema-0010', 'Approved: Product Receipt for #[PURCHASE_ORDER_ID]', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[APPROVAL_DATE],[URL]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Your raised GRN #[DOCUMENT_ID] against the purchase order</span></span><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">#[PURCHASE_ORDER_ID] has been approved.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned document details for further process:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Approved on:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[APPROVAL_DATE]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, </span></span></span><span xml:lang=\"EN-US\" data-contrast=\"none\">[URL]<span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw31901182\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw31901182\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 10, 'Active', 1, 1, 1, '2024-02-23 01:30:08', '2024-02-23 01:30:08'),
(28, 'GRN Rejected', 'Ema-0011', 'Rejected: Product Receipt for #[PURCHASE_ORDER_ID]', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[REJECTED_DATE],[URL]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Subject</span><span xml:lang=\"EN-US\" data-contrast=\"auto\">: Rejected:</span></span><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Product Receipt for #[PURCHASE_ORDER_ID]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> Dear [SUPPLIER_NAME],</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Unfortunately, Your raised GRN #[DOCUMENT_ID] against the purchase order #[PURCHASE_ORDER_ID] has been rejected.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned document details for further process:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Rejected on:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[REJECTED_DATE]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, </span></span></span><span xml:lang=\"EN-US\" data-contrast=\"none\">[URL]</span></p>\r\n<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw242311506\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw242311506\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 11, 'Active', 8, 1, 1, '2024-02-23 01:31:35', '2024-10-17 12:32:24'),
(29, 'Invoice Approved', 'Ema-0012', 'Approved: Invoice for #[PURCHASE_ORDER_ID]', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[INVOICE_AMOUNT],[CURRENCY],[DOCUMENT_ID],[DOCUMENT_TYPE],[APPROVAL_DATE],[URL]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Your raised invoice #[DOCUMENT_ID] with sum of [INVOICE_AMOUNT] [CURRENCY]&nbsp;against the purchase order #[PURCHASE_ORDER_ID] has been approved.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned document details for further process:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Approved on:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[APPROVAL_DATE]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, [URL]</span></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw2715559\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw2715559\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 12, 'Active', 1, 1, 1, '2024-02-23 01:32:04', '2024-02-23 01:32:04'),
(30, 'Invoice Rejected', 'Ema-0013', 'Rejected: Invoice for #[PURCHASE_ORDER_ID]', '[PURCHASE_ORDER_ID],[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[REJECTED_DATE],[URL]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Unfortunately, Your raised Invoice #[DOCUMENT_ID] against the purchase order #[PURCHASE_ORDER_ID] has been rejected.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned document details for further process:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Rejected on:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[REJECTED_DATE]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, [URL]</span></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw126406661\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw126406661\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 13, 'Active', 1, 1, 1, '2024-02-23 01:32:31', '2024-02-23 01:32:31'),
(31, 'Tender/ RFI Sent to supplier', 'Ema-0014', '[DOCUMENT_TYPE] Bid Submission Request: - #[DOCUMENT_ID]', '[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[URL],[CREATED_ON],[COMPANY_NAME]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">#[COMPANY_NAME]</span></span><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">has raised a Bid submission request against the [DOCUMENT_TYPE]</span></span><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">#[DOCUMENT_ID] has into your account and is pending for your action.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned request details:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Raised On:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[CREATED_ON]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, [URL]</span></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw182214742\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw182214742\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240,&quot;335572079&quot;:6,&quot;335572080&quot;:1,&quot;335572081&quot;:4278190080,&quot;469789806&quot;:&quot;single&quot;}\"><span class=\"eop\">&nbsp;</span></span></p>', 14, 'Active', 1, 1, 1, '2024-02-23 01:34:22', '2024-02-23 01:34:22'),
(32, 'Tender Payment Status', 'Ema-0015', 'Payment Summary: - #[TRANSACTION_ID]', '[TRANSACTION_ID],[SUPPLIER_NAME],[PAYMENT_STATUS],[DOCUMENT_TYPE],[URL],[TRANSACTION_DATE_TIME],[TRANSACTION_AMOUNT]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">&nbsp;</span></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">We would like to inform you that the payment against [DOCUMENT_TYPE] is [PAYMENT_STATUS].</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned payment details:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Transaction ID</span>: [TRANSACTION_ID]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Transaction amount</span>: [TRANSACTION_AMOUNT]</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Transaction Date:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[TRANSACTION_DATE_TIME]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, [URL]</span></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw233373175\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw233373175\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240,&quot;335572079&quot;:6,&quot;335572080&quot;:1,&quot;335572081&quot;:4278190080,&quot;469789806&quot;:&quot;single&quot;}\"><span class=\"eop\">&nbsp;</span></span></p>', 15, 'Active', 1, 1, 1, '2024-02-23 01:34:56', '2024-02-23 23:04:17'),
(33, 'Tender Award to Supplier', 'Ema-0016', 'Tender Awarded: - #[DOCUMENT_ID]', '[SUPPLIER_NAME],[DOCUMENT_ID],[DOCUMENT_TYPE],[URL],[AWARDED_DATE],[COMPANY_NAME]', '<p class=\"paragraph\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Dear [SUPPLIER_NAME],</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Congratulations!</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Thanks for choosing business with #[COMPANY_NAME], We are glad to inform you that your Bid submission against the Tender#[DOCUMENT_ID] has been approved and company requires the confirmation to process the post awarding formalities.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Please note the below-mentioned request details:</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document ID</span>: [DOCUMENT_ID]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Document Type</span>: [DOCUMENT_TYPE]</span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Awarded On:</span></span></span><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"textrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">[AWARDED_DATE]</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"> </span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">To view the complete document, [URL]</span></span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Further for any assistance, you may contact support@amysoftech.com</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:120,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span xml:lang=\"EN-US\" data-contrast=\"auto\"><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\">Warm Regards,</span></span></span><span class=\"scxw99950514\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Team BIDMATE</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>\r\n<p class=\"paragraph\"><span class=\"scxw99950514\">&nbsp;</span><br><span class=\"normaltextrun\"><span lang=\"EN-US\" style=\"mso-ansi-language: EN-US;\"><span xml:lang=\"EN-US\" data-contrast=\"auto\">Note: This is autogenerated mail, don\'t reply to this mail.</span></span></span><span data-ccp-props=\"{&quot;134233117&quot;:true,&quot;134233118&quot;:true,&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:240}\"><span class=\"eop\">&nbsp;</span></span></p>', 16, 'Active', 1, 1, 1, '2024-02-23 01:35:36', '2024-02-23 01:35:36'),
(34, 'OTP For Creating User', 'Ema-0017', 'User acess', '[USER_TYPE],[EMAIL],[PASSWORD],[USER_NAME]', '<p>Dear [USER_NAME]</p>\r\n<p>&nbsp;</p>\r\n<p>You are now authorised to login as [USER_TYPE] in the system.</p>\r\n<p>&nbsp;</p>\r\n<p>Please use the credentials below to access your account:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email : [EMAIL]<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password : [PASSWORD]</p>\r\n<p>&nbsp;</p>\r\n<p>Further for any assistance, you may contact support@amysoftech.com<br>Warm Regards,<br>Team BIDMATE</p>\r\n<p>&nbsp;</p>\r\n<p>This is an autogenerated mail, please don\'t reply to this mail.</p>', 18, 'Active', 1, 1, 1, '2024-05-10 00:55:18', '2024-05-10 00:55:18'),
(35, 'Forget Password', 'Ema-0018', 'Forget Password', '[URL],[OTP],[REQUESTER_NAME]', '<p>Dear <strong>[REQUESTER_NAME]</strong>,</p>\r\n<p>&nbsp;</p>\r\n<p>We received a request to reset the password for your account. If you made this request, please click the link below:</p>\r\n<p>[URL]</p>\r\n<p>&nbsp;</p>\r\n<p>If you did not request a password reset, please ignore this email your account remains secure.</p>\r\n<p>&nbsp;</p>\r\n<p><span lang=\"EN-US\">If you need any help, you can contact support@amysoftech.com.</span>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span lang=\"EN-US\">Warm Regards,</span>&nbsp;<br><span lang=\"EN-US\">Team BIDMATE</span>&nbsp;</p>\r\n<p>&nbsp;<br><strong><span lang=\"EN-US\">Note: This is an autogenerated mail, please don\'t reply to this mail.</span>&nbsp;</strong></p>', 19, 'Active', 3, 1, 1, NULL, '2024-09-26 06:27:55'),
(36, '2FA Verify', 'Ema-0019', '2FA Verify', '[OTP],[NAME]', '<p>Dear [NAME],</p>\r\n<p>Below is your 2FA token:-</p>\r\n<h4> [OTP] </h4>\r\n<p>Thank you for using our application!</p>\r\n<p>Warm Regards,</p>\r\n<p>Team Bidmate</p>\r\n<p>Note: This is autogenerated mail, don\'t reply to this mail.</p>', 20, 'Active', 1, 1, NULL, NULL, NULL),
(37, 'Auction Award Intimation', 'Ema-0020', 'Auction Award Intimation', '[NAME],[AUCTION_ID],[AUCTION_TITLE],[DESCRIPTION],[AMOUNT],', '  <h1>Hello [NAME],</h1>\r\n\r\n    <p>Thank you for the participation!</p>\r\n\r\n    <p><strong>We are delighted to inform you that the auction is awarded to you as per following details: -</strong></p>\r\n    <p>Auction ID : [AUCTION_ID]</p>\r\n    <p>Auction Title : [AUCTION_TITLE]</p>\r\n    <p>Item Description : [DESCRIPTION]</p>\r\n    <p>Awarded Bid Price : [AMOUNT]</p>\r\n    \r\n    <p>Warm Regards,</p>\r\n<p>Team Bidmate</p>\r\n<p>Note: This is autogenerated mail, don\'t reply to this mail.</p>', 21, 'Active', 1, 1, NULL, NULL, NULL);

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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `unit_price` double(15,3) DEFAULT NULL,
  `tax` double(5,3) DEFAULT NULL,
  `uom_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'Active', NULL, NULL),
(2, 'ind', 'Hindi', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `last_login`
--

CREATE TABLE `last_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `last_login`
--

INSERT INTO `last_login` (`id`, `login_time`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2024-11-26 10:24:32', 1, '2024-11-26 10:24:32', '2024-11-26 10:24:32'),
(2, '2024-11-27 03:30:12', 1, '2024-11-27 03:30:12', '2024-11-27 03:30:12'),
(3, '2024-11-27 12:18:39', 1, '2024-11-27 12:18:39', '2024-11-27 12:18:39'),
(4, '2024-11-28 03:30:08', 1, '2024-11-28 03:30:08', '2024-11-28 03:30:08');

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
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_20_055355_create_notifications_table', 1),
(7, '2023_10_10_140603_create_workflow_map_table', 2),
(8, '2023_10_10_141834_create_workflow_setup_table', 2),
(9, '2023_10_10_142742_create_workflow_steps_table', 2),
(10, '2023_10_10_161629_create_workflow_assignment_table', 3),
(11, '2023_10_10_173247_create_workflow_transition_header_table', 3),
(12, '2023_10_10_173311_create_workflow_transition_line_table', 3),
(13, '2023_10_16_135815_create_workflow_map_log_table', 3),
(14, '2023_10_25_174744_create_workflow_deligation_table', 3),
(15, '2023_10_25_175044_create_workflow_event_history_table', 3),
(16, '2023_10_31_101852_create_numbersequence_map_table', 4),
(17, '2023_10_31_101857_create_numbersequence_table', 4),
(18, '2023_11_08_161742_create_permission_tables', 4),
(19, '2023_11_21_133219_create_sytemadminsetup_table', 4),
(20, '2023_11_25_054724_create_images_table', 4),
(21, '2023_12_11_090332_create_tax_table', 4),
(22, '2023_12_11_090742_create_question_table', 4),
(23, '2023_12_11_090746_create_checklisttype_table', 4),
(24, '2023_12_11_090751_create_lineofbusiness_table', 4),
(25, '2023_12_11_090755_create_businessclassification_table', 5),
(26, '2023_12_11_090759_create_modeofdelivery_table', 5),
(27, '2023_12_11_090804_create_termsofdelivery_table', 5),
(28, '2023_12_11_090808_create_termsofpayment_table', 5),
(29, '2023_12_11_090814_create_chain_table', 5),
(30, '2023_12_11_090822_create_suppliertype_table', 5),
(31, '2023_12_11_090828_create_project_table', 5),
(32, '2023_12_11_090833_create_unit_table', 5),
(33, '2023_12_11_090838_create_itemgroup_table', 5),
(34, '2023_12_11_090843_create_procurementtype_table', 5),
(35, '2023_12_11_090847_create_tendertype_table', 5),
(36, '2023_12_11_090851_create_category_table', 5),
(37, '2023_12_11_090855_create_formofcontract_table', 5),
(39, '2023_12_11_090904_create_evaluation_table', 5),
(44, '2023_12_11_100004_create_subsegment_table', 10),
(45, '2023_12_11_100008_create_subcategory_table', 11),
(46, '2023_12_11_100012_create_position_table', 12),
(47, '2023_12_11_100016_create_department_table', 13),
(48, '2023_12_13_045751_create_item_table', 14),
(49, '2023_12_18_064921_create_currency_table', 15),
(50, '2023_12_18_064930_create_site_table', 16),
(51, '2023_12_18_064941_create_warehouse_table', 17),
(53, '2023_12_18_093050_create_tenderrequireddocument_table', 19),
(54, '2023_12_11_090900_create_bidderrequireddocument_table', 20),
(55, '2023_12_19_064527_create_covertypes_table', 21),
(56, '2023_12_11_090746_create_checklist_table', 22),
(57, '2023_12_19_083146_create_task_table', 23),
(58, '2023_12_19_083222_create_taskline_table', 24),
(59, '2023_12_21_041644_create_itemsalestaxgroup_table', 25),
(62, '2023_12_27_102305_create_modeofpayment_table', 28),
(71, '2023_12_27_094037_create_vendor_profile_table', 37),
(72, '2023_12_27_102911_create_vendor_bankdetails_table', 38),
(73, '2023_12_27_104047_create_vendor_reference_table', 39),
(74, '2024_01_02_064317_create_vendor_turnover_table', 40),
(80, '2023_12_11_090332_create_salestaxgroup_table', 46),
(83, '2023_12_21_083904_create_purchaserequest_table', 49),
(84, '2023_12_21_090744_create_purchaserequestline_table', 50),
(85, '2023_12_26_043125_create_quotation_table', 51),
(86, '2023_12_26_043737_create_quotationline_table', 52),
(87, '2023_12_27_112023_create_quotationcase_table', 53),
(88, '2023_12_27_112032_create_quotationheader_table', 54),
(89, '2023_12_27_112041_create_quotationsendline_table', 55),
(98, '2024_01_04_064412_create_purchaseorder_table', 64),
(99, '2024_01_04_064425_create_purchaseorderline_table', 65),
(100, '2024_01_08_114249_create_grnheaderheader_table', 66),
(101, '2024_01_08_114258_create_grnline_table', 67),
(102, '2024_01_08_114314_create_invoiceheader_table', 68),
(104, '2024_01_12_042142_create_tender_table', 69),
(105, '2024_01_12_070726_create_tender_pre_send_table', 70),
(106, '2024_01_12_071407_create_tenderline_table', 71),
(107, '2024_01_15_055809_create_tender_document_table', 72),
(108, '2024_01_15_055821_create_tender_members_table', 73),
(109, '2024_01_16_091540_create_tender_parameter_table', 74),
(110, '2024_01_16_091544_create_tender_subparameter_table', 75),
(111, '2024_01_19_042521_create_tender_send_table', 76),
(112, '2024_01_19_081558_create_query_table', 77),
(113, '2024_01_23_084341_create_assigned_task_table', 78),
(114, '2024_02_05_085751_create_segment_table', 79),
(115, '2024_02_06_043700_create_vendor_lineofbusiness_table', 80),
(116, '2024_02_08_084239_create_rfi_bidder_document_table', 81),
(117, '2024_02_08_085416_create_tenderline_reply_table', 82),
(118, '2024_02_16_114518_create_fee_payment_table', 83),
(121, '2024_02_19_121838_create_email_master_table', 86),
(123, '2024_02_19_121813_create_email_template_table', 87),
(124, '2024_02_20_111747_create_languages_table', 88),
(125, '2024_05_24_090356_create_contract_template_table', 89),
(126, '2024_05_27_045041_create_contract_template_signatures_table', 90),
(127, '2024_05_25_075912_create_agreement_classification_table', 91),
(128, '2024_05_25_094855_create_contracts_table', 92),
(129, '2024_05_25_102409_create_contracts_items_table', 93),
(130, '2024_05_27_070757_create_contract_signatures_table', 94),
(131, '2024_05_30_062915_userhascompany', 95),
(132, '2024_06_25_144436_create_supplier_request_table', 96),
(133, '2024_06_25_152311_create_supplier_otp_request_table', 97),
(134, '2024_06_25_152812_create_user_company_table', 98),
(135, '2024_06_25_152824_create_document_company_table', 99),
(136, '2024_07_08_141106_create_type_of_business_table', 100),
(137, '2024_07_15_140049_create_auction_bidding_tables', 101),
(138, '2024_07_16_143848_create_auto_biddings', 102),
(139, '2024_07_13_152037_create_tbl_itemlist_rfi_table', 103),
(140, '2024_07_18_112907_create_email_logs_table', 104),
(141, '2024_07_30_134204_create_evaluation_parameter_table', 105),
(142, '2024_07_30_134315_create_evaluation_subparameter_table', 106),
(143, '2024_07_24_091800_create_evaluation_group_table', 107),
(144, '2024_07_24_091808_create_evaluation_members_table', 108),
(145, '2024_07_24_091837_create_rating_criteria_table', 109),
(146, '2024_07_29_155457_create_apply_evaluation_table', 110),
(147, '2024_07_31_080714_create_evaluation_table', 111),
(148, '2024_07_31_104648_vendor_evaluation_score_table', 112),
(149, '2024_08_12_141721_create_invoice_grn_table', 113),
(150, '2024_09_14_135044_create_attachments_table', 114),
(151, '2024_09_17_145529_create_budgets_table', 115),
(152, '2024_09_17_170514_create_businessunits_table', 116),
(153, '2024_09_17_160455_add_columns_to_purchaserequest_table', 117),
(154, '2024_09_17_170715_create_costcenters_table', 118),
(155, '2024_09_18_102638_create_last_login_table', 119),
(156, '2024_09_20_081710_create_workflow_condition_table', 120),
(157, '2024_09_20_132525_create_activity_logs_table', 121),
(158, '2024_09_20_150941_create_comments_table', 122),
(159, '2024_09_20_150327_create_commentimages_table', 123),
(162, '2024_09_25_102708_create_tbl_report_generator_table', 126),
(163, '2024_09_25_104017_create_report_child_tbl_table', 127),
(164, '2024_09_28_134427_create_tbl_awards_table', 128),
(165, '2024_09_28_140635_create_tbl_award_lines_table', 129),
(166, '2024_09_28_142859_create_tender_award_checklist_table', 130),
(167, '2024_09_30_203244_update_tbl_awards_add_pending_status', 131),
(168, '2024_10_01_094958_create_tender_version_date_table', 132),
(169, '2024_10_01_095029_create_tender_version_docs_table', 133),
(170, '2024_10_04_093241_create_tender_opener_table', 134),
(174, '2024_10_04_203432_addcolumn_to_rfi_development', 137),
(175, '2024_10_04_205821_addcolumn_to_tbl_itemlist_rfi', 138),
(176, '2024_10_09_134133_addcolumn_to_rfi_development', 139),
(177, '2024_10_09_093626_create_custom_notification_table', 140),
(178, '2024_10_10_154931_add_resend_attempt_to_supplier_otp_request', 141),
(179, '2024_10_11_085916_create_vendor_reqdocuments_table', 142),
(180, '2024_10_14_132135_change_datatype_of_column_in_rfi_development_table', 143),
(181, '2024_10_14_125454_create_ranking_table', 144),
(183, '2024_10_16_101134_add_max_bid_increment_to_aution_details_table', 146),
(184, '2024_10_15_153509_add_bid_limit_to_auto_biddings_table', 147),
(185, '2024_10_16_160301_create_tbl_compair_quotation_table', 148),
(186, '2024_10_16_160929_create_tbl_compair_quotation_line_table', 149),
(187, '2024_10_21_162719_add_column_to_quotationsendline', 150),
(188, '2024_10_21_232237_add_column_to_quotationline', 151),
(189, '2018_08_08_100000_create_telescope_entries_table', 152),
(190, '2024_07_23_102009_create_optional_email_credential', 152),
(191, '2024_10_23_084835_add_po_id_to_tbl_compair_quotation_line_table', 153),
(192, '2024_10_23_092603_add_line_no_to_tbl_compair_quotation_line_table', 154),
(193, '2024_10_23_110239_create_tender_checklist_attachment_table', 155),
(194, '2024_10_17_152825_add_min_bid_amount_to_auction_details_table', 156),
(195, '2024_10_23_211423_add_flag_to_tbl_compair_quotation_table', 157),
(196, '2024_10_29_090235_add_accessable_type_to_tender_document_table', 158),
(198, '2024_11_12_092145_crate_quotationrequireddocument_table', 159),
(200, '2024_11_12_092023_crate_quotation_document_table', 160),
(201, '2024_11_14_083013_add_cost_center_to_company_employee', 161),
(202, '2024_11_14_132146_add_blocked_reason_to_users', 162),
(203, '2024_11_14_151810_add_blocked_type_to_users', 163),
(204, '2024_11_19_091843_add_auto_release_time_to_systemadminsetup', 164),
(205, '2024_11_19_091718_add_blocked_at_to_users', 165),
(206, '2024_11_21_170056_update_vendor_profile_columns', 166),
(207, '2024_11_21_170723_update_vendor_bankdetails_columns', 167),
(208, '2024_10_15_083143_create_create_admin_tables_table', 168),
(209, '2024_10_15_085027_create_calender_cates_table', 168),
(210, '2024_10_15_085258_create_calender_days_table', 168),
(211, '2024_10_15_100052_create_complains_table', 168),
(212, '2024_10_15_101737_create_complaint_replies_table', 168),
(213, '2024_10_15_101938_create_countries_table', 168),
(214, '2024_10_15_102617_create_coupon_cards_table', 168),
(215, '2024_10_15_103929_create_coupon_logs_table', 168),
(216, '2024_10_15_104450_create_coupon_purchase_logs_table', 168),
(217, '2024_10_15_104639_create_customers_table', 168),
(218, '2024_10_15_105120_create_customer_credits_table', 168),
(219, '2024_10_15_105300_create_holidays_table', 168),
(220, '2024_10_15_105943_create_loyalty_cards_table', 168),
(221, '2024_10_15_110601_create_loyalty_logs_table', 168),
(222, '2024_10_15_111233_create_loyalty_rules_table', 168),
(223, '2024_10_16_042758_create_loyality_points_table', 168),
(224, '2024_10_16_043131_create_master_offers_table', 168),
(225, '2024_10_16_045006_create_products_table', 168),
(226, '2024_10_16_051024_create_product_categories_table', 168),
(227, '2024_10_16_052833_create_restaurants_table', 168),
(228, '2024_10_16_062347_create_restaurant_kitchen_sections_table', 168),
(229, '2024_10_16_062511_create_restaurant_master_addons_table', 168),
(230, '2024_10_16_062655_create_restaurant_menus_table', 168),
(231, '2024_10_16_094819_create_restaurant_products_table', 168),
(232, '2024_10_16_101551_create_restaurant_product_addons_table', 168),
(233, '2024_10_16_120157_create_restaurant_product_categories_table', 168),
(234, '2024_10_16_120701_create_restaurant_product_orders_table', 168),
(235, '2024_10_17_045407_create_restaurant_product_order_details_table', 168),
(236, '2024_10_17_045648_create_restaurant_product_order_payments_table', 168),
(237, '2024_10_17_050525_create_restaurant_sitting_sections_table', 168),
(238, '2024_10_17_050803_create_restaurant_sitting_tables_table', 168),
(239, '2024_10_17_050926_create_sequence_setups_table', 168),
(240, '2024_10_17_051047_create_settings_table', 168),
(241, '2024_10_17_051149_create_setup_days_table', 168),
(242, '2024_10_17_051253_create_static_pages_table', 168),
(243, '2024_11_28_080402_create_pos_type_table', 169),
(246, '2024_11_28_080315_create_category_table', 172),
(247, '2024_11_28_080325_create_subcategory_table', 173),
(249, '2024_11_28_091131_create_pos_table', 174),
(250, '2024_11_28_100958_create_customer_table', 175),
(251, '2024_11_28_144125_create_customer_contact_table', 176),
(252, '2024_11_28_160646_create_uom_table', 177),
(253, '2024_11_28_155315_create_item_table', 178);

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
(136, 2, 'App\\Models\\User', 76);

-- --------------------------------------------------------

--
-- Table structure for table `notice_communication`
--

CREATE TABLE `notice_communication` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(60) NOT NULL,
  `tender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `eoi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `auction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dateType` date DEFAULT NULL,
  `subject_body` text DEFAULT NULL,
  `mail_body` text DEFAULT NULL,
  `type` enum('Tender','EOI','Auction') NOT NULL,
  `alert_on` enum('Due In','Due Date') NOT NULL,
  `days` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` enum('Draft','Published','Sent','Cancel') DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_enum` varchar(100) DEFAULT NULL,
  `whom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `numbersequence`
--

CREATE TABLE `numbersequence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `constant_no` varchar(10) NOT NULL,
  `range_no` varchar(2) DEFAULT NULL,
  `maping_date` date DEFAULT NULL,
  `next` int(11) NOT NULL DEFAULT 1,
  `format` varchar(30) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `numbersequence_map_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `numbersequence`
--

INSERT INTO `numbersequence` (`id`, `name`, `code`, `constant_no`, `range_no`, `maping_date`, `next`, `format`, `status`, `numbersequence_map_id`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'Purchase Request', 'Seq-001', 'AWF/PR-', '6', '2024-07-17', 55, 'AWF/PR-######', 'Active', NULL, 1, 1, 1, '2024-07-17 09:55:00', '2024-11-25 06:55:07'),
(9, 'Quotation', 'SEQ-002', 'AWF/RFQ-', '8', '2024-07-17', 32, 'AWF/RFQ-########', 'Active', 2, 1, 1, 1, '2024-07-17 09:55:49', '2024-11-20 10:43:06'),
(10, 'Purchase Order', 'SEQ-003', 'AWF/PO-', '8', '2024-07-17', 14, 'AWF/PO-########', 'Active', 3, 1, 1, 1, '2024-07-17 09:57:35', '2024-11-20 11:46:16'),
(11, 'GRN', 'SEQ-004', 'AWF/GRN-', '8', '2024-07-17', 5, 'AWF/GRN-########', 'Active', 4, 1, 1, 1, '2024-07-17 09:58:00', '2024-11-20 05:18:53'),
(12, 'Invoice', 'SEQ-005', 'AWF/INV-', '8', '2024-07-17', 5, 'AWF/INV-########', 'Active', 5, 1, 1, 1, '2024-07-17 09:59:02', '2024-11-20 05:43:19'),
(13, 'Tender', 'SEQ-006', 'AWF/TD-', '8', '2024-07-17', 6, 'AWF/TD-########', 'Active', 6, 1, 1, 1, '2024-07-17 09:59:34', '2024-11-20 08:16:59'),
(15, 'Vendor Registration', 'SEQ-008', 'V-', '8', '2024-07-17', 534, 'AWF/V-########', 'Active', 8, 1, 1, 1, '2024-07-17 10:00:43', '2024-11-19 09:58:51'),
(16, 'Supplier Request', 'SEQ-007', 'AWF/SR-', '8', '2024-07-17', 169, 'AWF/SR-########', 'Active', 7, 1, 1, 1, '2024-07-17 10:01:28', '2024-11-21 09:35:55'),
(17, 'Need', 'SEQ-009', 'AWF/N-', '8', '2024-07-17', 5, 'AWF/N-########', 'Active', 9, 1, 1, 1, '2024-07-17 10:01:59', '2024-09-03 13:19:29'),
(18, 'RFI Development', 'SEQ-010', 'AWF/RFID-', '8', '2024-07-17', 12, 'AWF/RFID-########', 'Active', 10, 1, 1, 1, '2024-07-17 10:03:19', '2024-11-13 10:10:10'),
(19, 'RFI Publication', 'SEQ-011', 'AWF/RFIP-', '8', '2024-07-17', 7, 'AWF/RFIP-########', 'Active', 11, 1, 1, 1, '2024-07-17 10:05:43', '2024-11-13 10:49:53'),
(20, 'RFI Distribution', 'SEQ-012', 'AWF/RFIDI-', '8', '2024-07-17', 9, 'AWF/RFIDI-########', 'Active', 12, 1, 1, 1, '2024-07-17 10:08:25', '2024-10-28 05:04:13'),
(21, 'Contracts', 'SEQ-013', 'AWF/CON-', '8', '2024-07-17', 1, 'AWF/CON-########', 'Active', 13, 1, 1, 1, '2024-07-17 10:09:48', '2024-07-17 10:16:23'),
(22, 'Vendor Approval', 'SEQ-014', 'AWF/VA-', '8', '2024-07-17', 58, 'AWF/VA-########', 'Active', 14, 1, 1, 1, '2024-07-17 10:11:26', '2024-11-19 09:50:20'),
(23, 'Auction Details', 'SEQ-015', 'AWF/AUC-', '8', '2024-07-17', 7, 'AWF/AUC-########', 'Active', 15, 1, 1, 1, '2024-07-17 10:12:15', '2024-11-13 09:51:10'),
(24, 'Contracts version', 'SEQ-016', 'AWF/CONV-', '8', '2024-07-17', 1, 'AWF/CONV-########', 'Active', 16, 1, 1, 1, '2024-07-17 10:13:03', '2024-07-17 10:16:45'),
(25, 'Signothers persion', 'SEQ-017', 'AWF/SP-', '8', '2024-07-17', 1, 'AWF/SP-########', 'Active', 17, 1, 1, 1, '2024-07-17 10:14:27', '2024-07-17 10:16:53'),
(26, 'Purchase Request', 'SEQ-001', 'BW/PR-', '8', '2024-07-17', 15, 'BW/PR-########', 'Active', 1, 2, 1, 1, '2024-07-17 10:39:49', '2024-11-21 12:23:48'),
(27, 'Quotation', 'SEQ-002', 'BW/RFQ-', '8', '2024-07-17', 10, 'BW/RFQ-########', 'Active', 2, 2, 1, 1, '2024-07-17 10:43:52', '2024-10-08 07:31:59'),
(28, 'Purchase Order', 'SEQ-003', 'BW/PO-', '8', '2024-07-17', 8, 'BW/PO-########', 'Active', 3, 2, 1, 1, '2024-07-17 10:43:52', '2024-10-04 16:16:06'),
(29, 'GRN', 'SEQ-004', 'BW/GRN-', '8', '2024-07-17', 6, 'BW/GRN-########', 'Active', 4, 2, 1, 1, '2024-07-17 10:43:52', '2024-09-04 04:02:28'),
(30, 'Invoice', 'SEQ-005', 'BW/INV-', '8', '2024-07-17', 34, 'BW/INV-########', 'Active', 5, 2, 1, 1, '2024-07-17 10:43:52', '2024-09-24 11:08:16'),
(31, 'Tender', 'SEQ-006', 'BW/TD-', '8', '2024-07-17', 8, 'BW/TD-########', 'Active', 6, 2, 1, 1, '2024-07-17 10:43:52', '2024-10-08 07:31:21'),
(32, 'Supplier Request', 'SEQ-007', 'BW/SR-', '8', '2024-07-17', 1, 'BW/SR-########', 'Active', 7, 2, 1, 1, '2024-07-17 10:43:52', '2024-07-17 11:27:56'),
(33, 'Vendor Registration', 'SEQ-008', 'BW/V-', '8', '2024-07-17', 1, 'BW/V-########', 'Active', 8, 2, 1, 1, '2024-07-17 10:43:52', '2024-07-17 11:28:04'),
(34, 'Need', 'SEQ-009', 'BW/N-', '8', '2024-07-17', 2, 'BW/N-########', 'Active', 9, 2, 1, 1, '2024-07-17 10:43:52', '2024-10-04 05:56:48'),
(35, 'RFI Development', 'SEQ-010', 'BW/RFID-', '8', '2024-07-17', 2, 'BW/RFID-########', 'Active', 10, 2, 1, 1, '2024-07-17 10:43:52', '2024-09-03 13:24:14'),
(36, 'RFI Publication', 'SEQ-011', 'BW/RFIP-', '8', '2024-07-17', 2, 'BW/RFIP-########', 'Active', 11, 2, 1, 1, '2024-07-17 10:51:43', '2024-09-03 13:25:43'),
(37, 'RFI Distribution', 'SEQ-012', 'BW/RFIDI-', '8', '2024-07-17', 1, 'BW/RFIDI-########', 'Active', 12, 2, 1, 1, '2024-07-17 10:51:43', '2024-07-17 11:28:39'),
(38, 'Contracts', 'SEQ-013', 'BW/CON-', '8', '2024-07-17', 1, 'BW/CON-########', 'Active', 13, 2, 1, 1, '2024-07-17 10:51:43', '2024-07-17 11:28:46'),
(39, 'Vendor Approval', 'SEQ-014', 'BW/VA-', '8', '2024-07-17', 6, 'BW/VA-########', 'Active', 14, 2, 1, 1, '2024-07-17 10:51:43', '2024-09-27 07:56:43'),
(40, 'Auction Details', 'SEQ-015', 'BW/AUC-', '8', '2024-07-17', 6, 'BW/AUC-########', 'Active', 15, 2, 1, 1, '2024-07-17 10:51:43', '2024-08-21 10:10:06'),
(41, 'Contracts version', 'SEQ-016', 'BW/CONV-', '8', '2024-07-17', 1, 'BW/CONV-########', 'Active', 16, 2, 1, 1, '2024-07-17 10:51:43', '2024-07-17 11:29:14'),
(42, 'Signothers persion', 'SEQ-017', 'BW/SP-', '8', '2024-07-17', 1, 'BW/SP-########', 'Active', 17, 2, 1, 1, '2024-07-17 10:51:43', '2024-07-17 11:29:21'),
(43, 'Purchase Request', 'SEQ-001', 'FDO/PR-', '8', '2024-07-17', 29, 'FDO/PR-########', 'Active', 1, 3, 1, 1, '2024-07-17 10:58:42', '2024-11-21 11:20:03'),
(44, 'Quotation', 'SEQ-002', 'FDO/RFQ-', '8', '2024-07-17', 20, 'FDO/RFQ-########', 'Active', 2, 3, 1, 1, '2024-07-17 10:58:42', '2024-11-04 09:31:18'),
(45, 'Purchase Order', 'SEQ-003', 'FDO/PO-', '8', '2024-07-17', 12, 'FDO/PO-########', 'Active', 3, 3, 1, 1, '2024-07-17 10:58:42', '2024-09-24 10:42:33'),
(46, 'GRN', 'SEQ-004', 'FDO/GRN-', '8', '2024-07-17', 15, 'FDO/GRN-########', 'Active', 4, 3, 1, 1, '2024-07-17 10:58:42', '2024-10-09 05:19:18'),
(47, 'Invoice', 'SEQ-005', 'FDO/INV-', '8', '2024-07-17', 61, 'FDO/INV-########', 'Active', 5, 3, 1, 1, '2024-07-17 10:58:42', '2024-09-30 10:00:23'),
(48, 'Tender', 'SEQ-006', 'FDO/TD-', '8', '2024-07-17', 10, 'FDO/TD-########', 'Active', 6, 3, 1, 1, '2024-07-17 10:58:42', '2024-10-28 09:11:51'),
(49, 'Supplier Request', 'SEQ-007', 'FDO/SR-', '8', '2024-07-17', 1, 'FDO/SR-########', 'Active', 7, 3, 1, 1, '2024-07-17 10:58:42', '2024-07-17 11:25:32'),
(50, 'Vendor Registration', 'SEQ-008', 'FDO/V-', '8', '2024-07-17', 1, 'FDO/V-########', 'Active', 8, 3, 1, 1, '2024-07-17 10:58:42', '2024-07-17 11:25:40'),
(51, 'Need', 'SEQ-009', 'FDO/N-', '8', '2024-07-17', 2, 'FDO/N-########', 'Active', 9, 3, 1, 1, '2024-07-17 10:58:42', '2024-09-10 09:03:13'),
(52, 'RFI Development', 'SEQ-010', 'FDO/RFID-', '8', '2024-07-17', 4, 'FDO/RFID-########', 'Active', 10, 3, 1, 1, '2024-07-17 10:58:42', '2024-10-07 11:29:37'),
(53, 'RFI Publication', 'SEQ-011', 'FDO/RFIP-', '8', '2024-07-17', 3, 'FDO/RFIP-########', 'Active', 11, 3, 1, 1, '2024-07-17 11:09:07', '2024-10-07 11:34:18'),
(54, 'RFI Distribution', 'SEQ-012', 'FDO/RFIDI-', '8', '2024-07-17', 5, 'FDO/RFIDI-########', 'Active', 12, 3, 1, 1, '2024-07-17 11:09:07', '2024-10-07 11:35:10'),
(55, 'Contracts', 'SEQ-013', 'FDO/CON-', '8', '2024-07-17', 1, 'FDO/CON-########', 'Active', 13, 3, 1, 1, '2024-07-17 11:09:07', '2024-07-17 11:26:20'),
(56, 'Vendor Approval', 'SEQ-014', 'FDO/VA-', '8', '2024-07-17', 6, 'FDO/VA-########', 'Active', 14, 3, 1, 1, '2024-07-17 11:09:07', '2024-09-27 07:56:43'),
(57, 'Auction Details', 'SEQ-015', 'FDO/AUC-', '8', '2024-07-17', 2, 'FDO/AUC-########', 'Active', 15, 3, 1, 1, '2024-07-17 11:09:07', '2024-08-14 04:54:20'),
(58, 'Contracts version', 'SEQ-016', 'FDO/CONV-', '8', '2024-07-17', 1, 'FDO/CONV-########', 'Active', 16, 3, 1, 1, '2024-07-17 11:09:07', '2024-07-17 11:26:48'),
(59, 'Signothers persion', 'SEQ-017', 'FDO/SP-', '8', '2024-07-17', 1, 'FDO/SP-########', 'Active', 17, 3, 1, 1, '2024-07-17 11:09:07', '2024-07-17 11:26:56'),
(60, 'Purchase Request', 'SEQ-001', 'ISFC/PR-', '8', '2024-07-17', 1, 'ISFC/PR-########', 'Active', 1, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:22:34'),
(61, 'Quotation', 'SEQ-002', 'ISFC/RFQ-', '8', '2024-07-17', 2, 'ISFC/RFQ-########', 'Active', 2, 4, 1, 1, '2024-07-17 11:22:16', '2024-09-11 11:11:00'),
(62, 'Purchase Order', 'SEQ-003', 'ISFC/PO-', '8', '2024-07-17', 1, 'ISFC/PO-########', 'Active', 3, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:22:51'),
(63, 'GRN', 'SEQ-004', 'ISFC/GRN-', '8', '2024-07-17', 1, 'ISFC/GRN-########', 'Active', 4, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:22:59'),
(64, 'Invoice', 'SEQ-005', 'ISFC/INV-', '8', '2024-07-17', 1, 'ISFC/INV-########', 'Active', 5, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:06'),
(65, 'Tender', 'SEQ-006', 'ISFC/TD-', '8', '2024-07-17', 1, 'ISFC/TD-########', 'Active', 6, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:12'),
(66, 'Supplier Request', 'SEQ-007', 'ISFC/SR-', '8', '2024-07-17', 1, 'ISFC/SR-########', 'Active', 7, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:23'),
(67, 'Vendor Registration', 'SEQ-008', 'ISFC/V-', '8', '2024-07-17', 1, 'ISFC/V-########', 'Active', 8, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:32'),
(68, 'Need', 'SEQ-009', 'ISFC/N-', '8', '2024-07-17', 1, 'ISFC/N-########', 'Active', 9, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:41'),
(69, 'RFI Development', 'SEQ-010', 'ISFC/RFID-', '8', '2024-07-17', 1, 'ISFC/RFID-########', 'Active', 10, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:48'),
(70, 'RFI Publication', 'SEQ-011', 'ISFC/RFIP-', '8', '2024-07-17', 1, 'ISFC/RFIP-########', 'Active', 11, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:23:58'),
(71, 'RFI Distribution', 'SEQ-012', 'ISFC/RFIDI', '8', '2024-07-17', 1, 'ISFC/RFIDI-########', 'Active', 12, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:24:05'),
(72, 'Contracts', 'SEQ-013', 'ISFC/CON-', '8', '2024-07-17', 1, 'ISFC/CON-########', 'Active', 13, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:24:12'),
(73, 'Vendor Approval', 'SEQ-014', 'ISFC/VA-', '8', '2024-07-17', 6, 'ISFC/VA-########', 'Active', 14, 4, 1, 1, '2024-07-17 11:22:16', '2024-09-27 07:56:44'),
(74, 'Auction Details', 'SEQ-015', 'ISFC/AUC-', '8', '2024-07-17', 1, 'ISFC/AUC-########', 'Active', 15, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:24:27'),
(75, 'Contracts version', 'SEQ-016', 'ISFC/CONV-', '8', '2024-07-17', 1, 'ISFC/CONV-########', 'Active', 16, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:24:33'),
(76, 'Signothers persion', 'SEQ-017', 'ISFC/SP-', '8', '2024-07-17', 1, 'ISFC/SP-########', 'Active', 17, 4, 1, 1, '2024-07-17 11:22:16', '2024-07-17 11:24:40'),
(77, 'Purchase Request', 'SEQ-001', 'MDI/PR-', '8', '2024-07-17', 1, 'MDI/PR-########', 'Active', 1, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:31:16'),
(78, 'Quotation', 'SEQ-002', 'MDI/RFQ-', '8', '2024-07-17', 1, 'MDI/RFQ-########', 'Active', 2, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:31:24'),
(79, 'Purchase Order', 'SEQ-003', 'MDI/PO-', '8', '2024-07-17', 1, 'MDI/PO-########', 'Active', 3, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:32:03'),
(80, 'GRN', 'SEQ-004', 'MDI/GRN-', '8', '2024-07-17', 1, 'MDI/GRN-########', 'Active', 4, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:32:29'),
(81, 'Invoice', 'SEQ-005', 'MDI/INV-', '8', '2024-07-17', 1, 'MDI/INV-########', 'Active', 5, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:32:35'),
(82, 'Tender', 'SEQ-006', 'MDI/TD-', '8', '2024-07-17', 1, 'MDI/TD-########', 'Active', 6, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:32:43'),
(83, 'Supplier Request', 'SEQ-007', 'MDI/SR-', '8', '2024-07-17', 1, 'MDI/SR-########', 'Active', 7, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:32:52'),
(84, 'Vendor Registration', 'SEQ-008', 'MDI/V-', '8', '2024-07-17', 1, 'MDI/V-########', 'Active', 8, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:33:30'),
(85, 'Need', 'SEQ-009', 'MDI/N-', '8', '2024-07-17', 1, 'MDI/N-########', 'Active', 9, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:33:40'),
(86, 'RFI Development', 'SEQ-010', 'MDI/RFID-', '8', '2024-07-17', 1, 'MDI/RFID-########', 'Active', 10, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:33:50'),
(87, 'RFI Publication', 'SEQ-011', 'MDI/RFIP-', '8', '2024-07-17', 1, 'MDI/RFIP-########', 'Active', 11, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:34:02'),
(88, 'RFI Distribution', 'SEQ-012', 'MDI/RFIDI-', '8', '2024-07-17', 1, 'MDI/RFIDI-########', 'Active', 12, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:34:17'),
(89, 'Contracts', 'SEQ-013', 'MDI/CON-', '8', '2024-07-17', 1, 'MDI/CON-########', 'Active', 13, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:34:26'),
(90, 'Vendor Approval', 'SEQ-014', 'MDI/VA-', '8', '2024-07-17', 5, 'MDI/VA-########', 'Active', 14, 5, 1, 1, '2024-07-17 12:25:53', '2024-09-27 07:56:44'),
(91, 'Auction Details', 'SEQ-015', 'MDI/AUC-', '8', '2024-07-17', 1, 'MDI/AUC-########', 'Active', 15, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:34:58'),
(92, 'Contracts version', 'SEQ-016', 'MDI/CONV-', '8', '2024-07-17', 1, 'MDI/CONV-########', 'Active', 16, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:35:06'),
(93, 'Signothers persion', 'SEQ-017', 'MDI/SP-', '8', '2024-07-17', 1, 'MDI/SP-########', 'Active', 17, 5, 1, 1, '2024-07-17 12:25:53', '2024-07-17 12:35:12'),
(94, 'Purchase Request', 'SEQ-001', 'NSA/PR-', '8', '2024-07-17', 1, 'NSA/PR-########', 'Active', 1, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:50:44'),
(95, 'Quotation', 'SEQ-002', 'NSA/RFQ-', '8', '2024-07-17', 1, 'NSA/RFQ-########', 'Active', 2, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:50:51'),
(96, 'Purchase Order', 'SEQ-003', 'NSA/PO-', '8', '2024-07-17', 1, 'NSA/PO-########', 'Active', 3, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:50:57'),
(97, 'GRN', 'SEQ-004', 'NSA/GRN-', '8', '2024-07-17', 1, 'NSA/GRN-########', 'Active', 4, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:05'),
(98, 'Invoice', 'SEQ-005', 'NSA/INV-', '8', '2024-07-17', 1, 'NSA/INV-########', 'Active', 5, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:12'),
(99, 'Tender', 'SEQ-006', 'NSA/TD-', '8', '2024-07-17', 1, 'NSA/TD-########', 'Active', 6, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:20'),
(100, 'Supplier Request', 'SEQ-007', 'NSA/SR-', '8', '2024-07-17', 1, 'NSA/SR-########', 'Active', 7, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:28'),
(101, 'Vendor Registration', 'SEQ-008', 'NSA/V-', '8', '2024-07-17', 1, 'NSA/V-########', 'Active', 8, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:35'),
(102, 'Need', 'SEQ-009', 'NSA/N-', '8', '2024-07-17', 1, 'NSA/N-########', 'Active', 9, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:42'),
(103, 'RFI Development', 'SEQ-010', 'NSA/RFID-', '8', '2024-07-17', 1, 'NSA/RFID-########', 'Active', 10, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:49'),
(104, 'RFI Publication', 'SEQ-011', 'NSA/RFIP-', '8', '2024-07-17', 1, 'NSA/RFIP-########', 'Active', 11, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:51:57'),
(105, 'RFI Distribution', 'SEQ-012', 'NSA/RFIDI-', '8', '2024-07-17', 1, 'NSA/RFIDI-########', 'Active', 12, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:52:03'),
(106, 'Contracts', 'SEQ-013', 'NSA/CON-', '8', '2024-07-17', 1, 'NSA/CON-########', 'Active', 13, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:52:10'),
(107, 'Vendor Approval', 'SEQ-014', 'NSA/VA-', '8', '2024-07-17', 5, 'NSA/VA-########', 'Active', 14, 6, 1, 1, '2024-07-17 12:50:24', '2024-09-27 07:56:44'),
(108, 'Auction Details', 'SEQ-015', 'NSA/AUC-', '8', '2024-07-17', 1, 'NSA/AUC-########', 'Active', 15, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:52:33'),
(109, 'Contracts version', 'SEQ-016', 'NSA/CONV-', '8', '2024-07-17', 1, 'NSA/CONV-########', 'Active', 16, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:52:41'),
(110, 'Signothers persion', 'SEQ-017', 'MDI/SP-', '8', '2024-07-17', 1, 'MDI/SP-########', 'Active', 17, 6, 1, 1, '2024-07-17 12:50:24', '2024-07-17 12:52:47'),
(111, 'Purchase Request', 'SEQ-001', 'OSA/PR-', '8', '2024-07-17', 1, 'OSA/PR-########', 'Active', 1, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:02:52'),
(112, 'Quotation', 'SEQ-002', 'OSA/RFQ-', '8', '2024-07-17', 1, 'OSA/RFQ-########', 'Active', 2, 7, 1, 1, '2024-07-17 13:02:36', '2024-08-09 05:01:58'),
(113, 'Purchase Order', 'SEQ-003', 'OSA/PO-', '8', '2024-07-17', 1, 'OSA/PO-########', 'Active', 3, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:03:05'),
(114, 'GRN', 'SEQ-004', 'OSA/GRN-', '8', '2024-07-17', 1, 'OSA/GRN-########', 'Active', 4, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:03:11'),
(115, 'Invoice', 'SEQ-005', 'OSA/INV-', '8', '2024-07-17', 1, 'OSA/INV-########', 'Active', 5, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:03:23'),
(116, 'Tender', 'SEQ-006', 'OSA/TD-', '8', '2024-07-17', 2, 'OSA/TD-########', 'Active', 6, 7, 1, 1, '2024-07-17 13:02:36', '2024-08-09 09:47:40'),
(117, 'Supplier Request', 'SEQ-007', 'OSA/SR-', '8', '2024-07-17', 1, 'OSA/SR-########', 'Active', 7, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:03:36'),
(118, 'Vendor Registration', 'SEQ-008', 'OSA/V-', '8', '2024-07-17', 1, 'OSA/V-########', 'Active', 8, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:03:44'),
(119, 'Need', 'SEQ-009', 'OSA/N-', '8', '2024-07-17', 1, 'OSA/N-########', 'Active', 9, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:03:50'),
(120, 'RFI Development', 'SEQ-010', 'OSA/RFID-', '8', '2024-07-17', 1, 'OSA/RFID-########', 'Active', 10, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:02'),
(121, 'RFI Publication', 'SEQ-011', 'OSA/RFIP-', '8', '2024-07-17', 1, 'OSA/RFIP-########', 'Active', 11, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:09'),
(122, 'RFI Distribution', 'SEQ-012', 'OSA/RFIDI-', '8', '2024-07-17', 1, 'OSA/RFIDI-########', 'Active', 12, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:16'),
(123, 'Contracts', 'SEQ-013', 'OSA/CON-', '8', '2024-07-17', 1, 'OSA/CON-########', 'Active', 13, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:24'),
(124, 'Vendor Approval', 'SEQ-014', 'OSA/VA-', '8', '2024-07-17', 5, 'OSA/VA-########', 'Active', 14, 7, 1, 1, '2024-07-17 13:02:36', '2024-09-27 07:56:44'),
(125, 'Auction Details', 'SEQ-015', 'OSA/AUC-', '8', '2024-07-17', 1, 'OSA/AUC-########', 'Active', 15, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:36'),
(126, 'Contracts version', 'SEQ-016', 'OSA/CONV-', '8', '2024-07-17', 1, 'OSA/CONV-########', 'Active', 16, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:43'),
(127, 'Signothers persion', 'SEQ-017', 'OSA/SP-', '8', '2024-07-17', 1, 'OSA/SP-########', 'Active', 17, 7, 1, 1, '2024-07-17 13:02:36', '2024-07-17 13:04:51'),
(128, 'Purchase Request', 'SEQ-001', 'ORA/PR-', '8', '2024-07-18', 1, 'ORA/PR-########', 'Active', 1, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:31:14'),
(129, 'Quotation', 'SEQ-002', 'ORA/RFQ-', '8', '2024-07-18', 1, 'ORA/RFQ-########', 'Active', 2, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:31:19'),
(130, 'Purchase Order', 'SEQ-003', 'ORA/PO-', '8', '2024-07-18', 1, 'ORA/PO-########', 'Active', 3, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:31:41'),
(131, 'GRN', 'SEQ-004', 'ORA/GRN-', '8', '2024-07-18', 1, 'ORA/GRN-########', 'Active', 4, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:32:00'),
(132, 'Invoice', 'SEQ-005', 'ORA/INV-', '8', '2024-07-18', 1, 'ORA/INV-########', 'Active', 5, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:32:07'),
(133, 'Tender', 'SEQ-006', 'ORA/TD-', '8', '2024-07-18', 2, 'ORA/TD-########', 'Active', 6, 8, 1, 1, '2024-07-18 04:29:14', '2024-08-13 01:49:33'),
(134, 'Supplier Request', 'SEQ-007', 'ORA/SR-', '8', '2024-07-18', 1, 'ORA/SR-########', 'Active', 7, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:32:23'),
(135, 'Vendor Registration', 'SEQ-008', 'ORA/V-', '8', '2024-07-18', 1, 'ORA/V-########', 'Active', 8, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:32:33'),
(136, 'Need', 'SEQ-009', 'ORA/N-', '8', '2024-07-18', 1, 'ORA/N-########', 'Active', 9, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:32:40'),
(137, 'RFI Development', 'SEQ-010', 'ORA/RFID-', '8', '2024-07-18', 1, 'ORA/RFID-########', 'Active', 10, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:33:23'),
(138, 'RFI Publication', 'SEQ-011', 'ORA/RFIP-', '8', '2024-07-18', 1, 'ORA/RFIP-########', 'Active', 11, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:33:31'),
(139, 'RFI Distribution', 'SEQ-012', 'ORA/RFIDI-', '8', '2024-07-18', 1, 'ORA/RFIDI-########', 'Active', 12, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:33:41'),
(140, 'Contracts', 'SEQ-013', 'ORA/CON-', '8', '2024-07-18', 1, 'ORA/CON-########', 'Active', 13, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:33:49'),
(141, 'Vendor Approval', 'SEQ-014', 'ORA/VA-', '8', '2024-07-18', 5, 'ORA/VA-########', 'Active', 14, 8, 1, 1, '2024-07-18 04:29:14', '2024-09-27 07:56:44'),
(142, 'Auction Details', 'SEQ-015', 'ORA/AUC-', '8', '2024-07-18', 2, 'ORA/AUC-########', 'Active', 15, 8, 1, 1, '2024-07-18 04:29:14', '2024-09-20 06:06:48'),
(143, 'Contracts version', 'SEQ-016', 'ORA/CONV-', '8', '2024-07-18', 1, 'ORA/CONV-########', 'Active', 16, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:34:29'),
(144, 'Signothers persion', 'SEQ-017', 'ORA/SP-', '8', '2024-07-18', 1, 'ORA/SP-########', 'Active', 17, 8, 1, 1, '2024-07-18 04:29:14', '2024-07-18 04:34:36'),
(145, 'Compair Quotation', 'SEQ-018', 'CMPQ-', '4', '2024-10-22', 5, 'CMPQ-####', 'Active', 19, 1, 2, 2, '2024-10-22 12:22:20', '2024-11-19 12:28:15'),
(146, 'Award Tender', 'SEQ-019', 'AWF/AWARD-', '6', '2024-10-22', 5, 'AWF/AWARD-######', 'Active', 18, 1, 2, 2, '2024-10-22 12:26:07', '2024-11-20 09:59:43'),
(148, 'new', 'new', 'new-', '8', '2024-11-25', 1, 'new-########', 'Active', 1, 1, 1, 1, '2024-11-25 06:54:51', '2024-11-25 06:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `numbersequence_map`
--

CREATE TABLE `numbersequence_map` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(60) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `numbersequence_map`
--

INSERT INTO `numbersequence_map` (`id`, `name`, `code`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Purchase Request', 'Sequence 1', 'Active', 1, 1, NULL, NULL, '2023-12-12 05:29:08'),
(2, 'Quotation', 'Sequence 2', 'Active', 1, 1, NULL, NULL, '2023-12-12 05:29:16'),
(3, 'Purchase Order', 'Sequence 3', 'Active', 1, 1, NULL, NULL, '2023-12-12 05:29:24'),
(4, 'GRN', 'Sequence 4', 'Active', 1, 1, NULL, NULL, '2023-12-12 05:29:31'),
(5, 'Invoice', 'Sequence 5', 'Active', 1, 1, NULL, NULL, '2023-12-12 05:29:39'),
(6, 'Tender', 'Sequence 6', 'Active', 1, 1, NULL, NULL, '2023-12-12 05:29:45'),
(7, 'Supplier Request', 'Sequence 7', 'Active', 1, 1, 1, NULL, NULL),
(8, 'Vendor Registration', 'Sequence 8', 'Active', 1, 1, 1, NULL, NULL),
(9, 'Need', 'Sequence 9', 'Active', 1, 1, 1, NULL, NULL),
(10, 'RFI Development', 'Sequence 10', 'Active', 1, 1, 1, NULL, NULL),
(11, 'RFI Publication', 'Sequence 11', 'Active', 1, 1, 1, NULL, NULL),
(12, 'RFI Distribution', 'Sequence 12', 'Active', 1, 1, 1, NULL, NULL),
(13, 'Contracts', 'Sequence 13', 'Active', 1, 1, 1, NULL, NULL),
(14, 'Vendor Approval', 'Sequence 14', 'Active', 1, 1, 1, NULL, NULL),
(15, 'Auction Details', 'Sequence 15', 'Active', 1, 1, 1, NULL, NULL),
(16, 'Contracts version', 'Sequence 16', 'Active', 1, 1, 1, NULL, NULL),
(17, 'Signothers persion', 'Sequence 17', 'Active', 1, 1, 1, NULL, NULL),
(18, 'Award Tender', 'Sequence 18', 'Active', 1, 1, 1, NULL, NULL),
(19, 'Compair Quotation', 'Sequence 19', 'Active', 1, 1, 1, NULL, NULL);

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
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `postype_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `name`, `code`, `description`, `postype_id`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'weasd', 'weasd', 'wesdc', 1, 'Active', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `company_employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `code`, `description`, `company_employee_id`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(60, 'Position 1', 'Pos-0001', 'dess', 922, 'Active', 1, 1, NULL, '2024-11-25 10:21:33', '2024-11-25 10:21:33'),
(61, 'Position 2', 'Pos-0002', 'fghb', 922, 'Active', 1, 1, NULL, '2024-11-25 10:21:47', '2024-11-25 10:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `pos_type`
--

CREATE TABLE `pos_type` (
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
-- Dumping data for table `pos_type`
--

INSERT INTO `pos_type` (`id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant', 'Pos-0001', 'Restaurant', 'Active', 1, 1, NULL, '2024-11-28 04:02:33', '2024-11-28 04:02:33'),
(2, 'Spa / Saloon', 'Pos-0002', 'Spa / Saloon', 'Active', 1, 1, NULL, '2024-11-28 04:03:45', '2024-11-28 04:03:45'),
(3, 'Bar', 'Pos-0003', 'Bar', 'Active', 1, 1, NULL, '2024-11-28 04:03:55', '2024-11-28 04:03:55'),
(4, 'Furniture', 'Pos-0004', 'Furniture', 'Active', 1, 1, NULL, '2024-11-28 04:04:22', '2024-11-28 04:04:22'),
(5, 'Footwear', 'Pos-0005', 'Footwear', 'Active', 1, 1, NULL, '2024-11-28 04:04:38', '2024-11-28 04:04:38'),
(6, 'Apparel', 'Pos-0006', 'Apparel', 'Active', 1, 1, NULL, '2024-11-28 04:05:37', '2024-11-28 04:05:37');

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
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `code`, `category_id`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Drinks', 'Sub-0001', 1, 'Drinks', 'Active', 1, 1, NULL, '2024-11-28 04:34:45', '2024-11-28 04:34:45'),
(2, 'Drinks', 'Sub-0002', 2, 'Drinks', 'Active', 1, 1, NULL, '2024-11-28 04:34:57', '2024-11-28 04:34:57'),
(3, 'Food', 'Sub-0003', 1, 'Food', 'Active', 1, 1, NULL, '2024-11-28 04:35:08', '2024-11-28 04:35:08'),
(4, 'Food', 'Sub-0004', 2, 'Food', 'Active', 1, 1, NULL, '2024-11-28 04:35:16', '2024-11-28 04:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `systemadminsetup`
--

CREATE TABLE `systemadminsetup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otptime` varchar(100) DEFAULT NULL,
  `otp_enable` tinyint(1) DEFAULT NULL,
  `two_fa_enable_employee` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `numbertime` varchar(100) DEFAULT NULL,
  `workflow_type` enum('Consolidated','Company Wise') NOT NULL DEFAULT 'Consolidated',
  `numbersequence_type` enum('Consolidated','Company Wise') NOT NULL DEFAULT 'Consolidated',
  `number_enable` tinyint(1) DEFAULT NULL,
  `registration` tinyint(1) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mailSetting` tinyint(1) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `port` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `encryption` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `default_currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('Approved','Rejected') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auto_release_time` int(11) DEFAULT NULL,
  `auto_release_enable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `systemadminsetup`
--

INSERT INTO `systemadminsetup` (`id`, `otptime`, `otp_enable`, `two_fa_enable_employee`, `numbertime`, `workflow_type`, `numbersequence_type`, `number_enable`, `registration`, `user_id`, `mailSetting`, `host`, `port`, `username`, `password`, `encryption`, `address`, `default_currency_id`, `status`, `created_at`, `updated_at`, `auto_release_time`, `auto_release_enable`) VALUES
(1, '60', NULL, 'Yes', '3', 'Company Wise', 'Company Wise', 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, '2024-11-26 10:54:34', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu_setting`
--

CREATE TABLE `tblmenu_setting` (
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

INSERT INTO `tblmenu_setting` (`id`, `user_id`, `menuname`, `groupName`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'Purchase Order', 'Purchase Order', 'Active', 1, NULL, NULL),
(2, 1, 'Product Receipts', 'Product Receipts', 'Active', 2, NULL, NULL),
(3, 1, 'Purchase invoices', 'Purchase invoices', 'Active', 3, NULL, NULL),
(4, 1, 'All Task', 'All Task', 'Active', 4, NULL, NULL),
(5, 1, 'Query', 'Query', 'Active', 5, NULL, NULL),
(6, 1, 'Payments', 'Payments', 'Active', 6, NULL, NULL),
(7, 1, 'Tender Master', 'Tender Master', 'Active', 7, NULL, NULL),
(8, 1, 'Vendor Request', 'Vendor Request', 'Active', 8, NULL, NULL),
(9, 1, 'Vendors', 'Vendors', 'Active', 9, NULL, NULL),
(10, 1, 'Settings', 'Settings', 'Active', 10, NULL, NULL),
(11, 1, 'Supplier Side', 'Supplier Side', 'Active', 11, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(12, 1, 'Quotation', 'Quotation', 'Active', 12, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(13, 1, 'Document List', 'Document List', 'Active', 13, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(14, 1, 'purchase request', 'purchase request', 'Active', 14, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(15, 1, 'RFI/EOI', 'RFI/EOI', 'Active', 15, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(16, 1, 'Auction', 'Auction', 'Active', 16, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(17, 1, 'Reports', 'Reports', 'Active', 17, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(18, 1, 'Dashboard', 'Dashboard', 'Active', 18, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(19, 1, 'PBG', 'PBG', 'Active', 19, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(20, 1, 'GRN', 'GRN', 'Active', 20, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(21, 1, 'Notice & Communication', 'Notice & Communication', 'Active', 21, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(22, 1, 'Contracts', 'Contracts', 'Active', 22, '2024-01-05 08:54:12', '2024-01-05 08:54:12'),
(23, 1, 'Master Permission', 'Master Permission', 'Active', 23, '2024-01-05 08:54:12', '2024-01-05 08:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alertlog`
--

CREATE TABLE `tbl_alertlog` (
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

INSERT INTO `tbl_alertlog` (`id`, `tender_id`, `auction_id`, `eoi_id`, `type`, `email_id`, `created_at`, `updated_at`, `communication_id`, `status`, `exception`, `emp_id`, `vendor_id`) VALUES
(38, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-20 04:29:02', '2024-09-20 04:29:02', 8, 'Sent', NULL, NULL, 81),
(39, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-20 04:29:04', '2024-09-20 04:29:04', 8, 'Sent', NULL, NULL, 57),
(40, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-23 05:26:36', '2024-09-23 05:26:36', 8, 'Sent', NULL, NULL, 81),
(41, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-23 05:26:41', '2024-09-23 05:26:41', 8, 'Sent', NULL, NULL, 57),
(42, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-23 11:28:25', '2024-09-23 11:28:25', 11, 'Sent', NULL, NULL, 81),
(43, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-23 11:28:28', '2024-09-23 11:28:28', 11, 'Sent', NULL, NULL, 57),
(44, 30, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-23 11:28:29', '2024-09-23 11:28:29', 12, 'Sent', NULL, NULL, 57),
(45, 30, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-23 11:28:30', '2024-09-23 11:28:30', 12, 'Sent', NULL, NULL, 81),
(46, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-26 09:15:24', '2024-09-26 09:15:24', 14, 'Sent', NULL, NULL, 81),
(47, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-26 09:15:24', '2024-09-26 09:15:24', 14, 'Sent', NULL, NULL, 57),
(48, 27, NULL, NULL, 'Tender', 'deepankar@attaya.co', '2024-09-26 09:23:27', '2024-09-26 09:23:27', 15, 'Sent', NULL, NULL, 81),
(49, 27, NULL, NULL, 'Tender', 'RajTesting@gmail.com', '2024-09-26 09:23:28', '2024-09-26 09:23:28', 15, 'Sent', NULL, NULL, 57);

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
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
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `name`, `code`, `description`, `status`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'KG', 'UOM-0001', 'kg', 'Active', 1, 1, NULL, '2024-11-28 12:18:50', '2024-11-28 12:18:50'),
(2, 'Piece', 'UOM-0002', 'piece', 'Active', 1, 1, NULL, '2024-11-28 12:20:27', '2024-11-28 12:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `emp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('Admin','User','Employee') DEFAULT NULL,
  `status` enum('Active','Blocked') NOT NULL,
  `profile_img` longtext DEFAULT NULL,
  `reset_password_token` varchar(250) DEFAULT NULL,
  `reset_password_expiry_time` varchar(50) DEFAULT NULL,
  `two_factor_enabled` tinyint(1) DEFAULT NULL,
  `google2fa_secret` varchar(20) DEFAULT NULL,
  `blocked_reason` text DEFAULT NULL,
  `blocked_type` varchar(191) DEFAULT NULL,
  `blocked_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `emp_id`, `email_verified_at`, `password`, `remember_token`, `company_id`, `created_at`, `updated_at`, `type`, `status`, `profile_img`, `reset_password_token`, `reset_password_expiry_time`, `two_factor_enabled`, `google2fa_secret`, `blocked_reason`, `blocked_type`, `blocked_at`) VALUES
(1, 'Admin', 'admin@amysoftech.in', NULL, NULL, '$2y$10$Xdmt5sDi.MKe3KejsSmb0e2muNf/9pEDa/tJk1hOm/e7Kj10MBGAu', 'Ef7XaIjGVavkt530pFOBpdSOk9ZHALkfHnB8VtdQDXFmF3SZkf7fK3D0jc2M', 1, '2023-12-10 22:29:09', '2024-11-21 04:52:17', 'Admin', 'Active', '1729167905.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Ashish', 'ashish.k@amysoftech.in', 922, NULL, '$2y$10$UP7LgAwT2bkSSFnmm2Yh9unuWEIZc7bkO5n6Z0tELHsRW.b58mV0a', NULL, 1, '2024-11-25 10:54:10', '2024-11-25 10:54:10', 'Employee', 'Active', 'documents/AmySoftech/Company_employee/Iy4zKFIKYAo=/Employee Pic/1732531557317.jpg', NULL, NULL, 1, 'C6VR4ROAVBV52JWB', NULL, NULL, NULL),
(76, 'erdsf', 'anmol.k@amysoftech.in', NULL, NULL, '$2y$10$nEHRVJkfKPGy1RcaTBwuouxhhmVGeslopHVY9WFB/RdQwilm8rlyO', NULL, NULL, '2024-11-25 12:10:46', '2024-11-25 12:19:53', 'User', 'Active', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Status` enum('Active','In active') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workflow_assignment`
--

CREATE TABLE `workflow_assignment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workflow_setup_id` bigint(20) UNSIGNED NOT NULL,
  `workflow_step_id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED DEFAULT NULL,
  `level` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow_assignment`
--

INSERT INTO `workflow_assignment` (`id`, `workflow_setup_id`, `workflow_step_id`, `dept_id`, `level`, `employee_id`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(75, 99, 100, NULL, 10, NULL, 1, 1, 1, '2024-11-25 06:46:15', '2024-11-25 06:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `workflow_deligation`
--

CREATE TABLE `workflow_deligation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `workflow_id` bigint(20) UNSIGNED DEFAULT NULL,
  `emp_from` bigint(20) UNSIGNED NOT NULL,
  `emp_to` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workflow_event_history`
--

CREATE TABLE `workflow_event_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `statement` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workflow_map`
--

CREATE TABLE `workflow_map` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workflow_name` varchar(50) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow_map`
--

INSERT INTO `workflow_map` (`id`, `workflow_name`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Purchase Request', 1, NULL, 1, NULL, '2023-12-12 05:22:06', NULL),
(2, 'Quotation', 1, NULL, 1, NULL, '2023-12-12 05:24:06', NULL),
(3, 'Purchase Order', 1, NULL, 1, NULL, '2023-12-12 05:21:55', NULL),
(4, 'GRN', 1, NULL, 1, NULL, '2023-12-12 05:21:34', NULL),
(5, 'Invoice', 1, NULL, 1, NULL, '2024-02-26 12:47:39', NULL),
(6, 'Tender', 1, NULL, 1, NULL, '2023-12-12 05:24:14', NULL),
(7, 'Need', 1, NULL, 1, NULL, '2023-12-12 05:24:14', NULL),
(8, 'EOI Development', 1, NULL, 1, NULL, '2024-05-22 00:37:01', NULL),
(9, 'Vendor Request', 1, NULL, 1, NULL, '2023-12-12 05:24:14', NULL),
(10, 'Supplier Registration Request', 1, NULL, 1, NULL, '2024-02-15 11:31:04', NULL),
(11, 'Auction', 1, NULL, 1, NULL, '2024-02-26 12:47:31', NULL),
(12, 'Award Tender', 1, NULL, 1, NULL, '2024-02-26 12:47:31', NULL),
(13, 'Quotation Reply', 1, NULL, 1, NULL, '2024-02-26 12:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workflow_map_log`
--

CREATE TABLE `workflow_map_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workflow_setup_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mapping_date` date DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `version` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow_map_log`
--

INSERT INTO `workflow_map_log` (`id`, `map_id`, `workflow_setup_id`, `mapping_date`, `company_id`, `version`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(112, 10, 99, '2024-11-25', 1, 1, 1, NULL, '2024-11-25 06:50:40', '2024-11-25 06:50:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workflow_setup`
--

CREATE TABLE `workflow_setup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workflow_code` varchar(191) NOT NULL,
  `workflow_name` varchar(191) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `apply_on_id` bigint(20) UNSIGNED NOT NULL,
  `mapping_date` date DEFAULT NULL,
  `workflow_map_id` bigint(20) DEFAULT NULL,
  `version` int(11) NOT NULL DEFAULT 0,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow_setup`
--

INSERT INTO `workflow_setup` (`id`, `workflow_code`, `workflow_name`, `status`, `apply_on_id`, `mapping_date`, `workflow_map_id`, `version`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'W-001', 'Auction request', 'Active', 11, '2024-07-22', 11, 1, 1, 1, 1, '2024-07-18 08:49:40', '2024-07-22 10:16:19', NULL),
(2, 'W-002', 'Need', 'Active', 7, '2024-07-23', 7, 2, 1, 1, 1, '2024-07-18 09:04:16', '2024-07-23 09:39:18', NULL),
(3, 'W-003', 'EOI Development', 'Active', 8, '2024-07-18', 8, 1, 1, 1, 1, '2024-07-18 09:05:02', '2024-11-13 10:21:51', NULL),
(4, 'W-004', 'GRN', 'Active', 4, '2024-07-22', 4, 1, 1, 1, 1, '2024-07-18 09:16:43', '2024-07-22 10:16:27', NULL),
(5, 'W-005', 'Invoice', 'Active', 5, '2024-07-22', 5, 1, 1, 1, 1, '2024-07-18 09:16:58', '2024-07-22 10:16:33', NULL),
(6, 'W-006', 'Purchase order', 'Active', 3, '2024-07-23', 3, 3, 1, 1, 1, '2024-07-18 09:18:02', '2024-07-23 09:39:01', NULL),
(7, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-10', 1, 1, 1, 1, 1, '2024-07-18 09:18:22', '2024-07-18 09:18:22', NULL),
(8, 'W-008', 'Quotation', 'Active', 2, '2024-07-04', 2, 1, 1, 1, 1, '2024-07-18 09:18:47', '2024-07-23 09:37:28', NULL),
(9, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-22', NULL, 1, 1, 1, 1, '2024-07-18 09:26:50', '2024-11-25 06:50:40', NULL),
(10, 'W-010', 'Tender Request', 'Active', 6, '2024-07-22', 6, 1, 1, 1, 1, '2024-07-18 09:43:25', '2024-07-23 09:35:35', NULL),
(11, 'W-011', 'Vendor request', 'Active', 9, '2024-07-10', 9, 1, 1, 1, 1, '2024-07-18 09:43:57', '2024-07-18 09:43:57', NULL),
(12, 'W-0001', 'Auction', 'Active', 11, '2024-07-19', 11, 1, 2, 1, 1, '2024-07-18 10:10:43', '2024-07-19 11:26:42', NULL),
(13, 'W-0002', 'Need', 'Active', 7, '2024-07-19', 7, 2, 2, 1, 1, '2024-07-18 10:18:37', '2024-07-19 11:27:34', NULL),
(14, 'W-0003', 'RFI Development', 'Active', 8, '2024-07-19', 8, 1, 2, 1, 1, '2024-07-18 10:19:03', '2024-07-19 11:28:11', NULL),
(15, 'W-0004', 'GRN', 'Active', 4, '2024-07-19', 4, 1, 2, 1, 1, '2024-07-18 10:19:41', '2024-07-19 11:26:51', NULL),
(16, 'W-0005', 'Invoice', 'Active', 5, '2024-07-19', 5, 1, 2, 1, 1, '2024-07-18 10:20:04', '2024-07-19 11:27:24', NULL),
(17, 'W-0006', 'Purchase order', 'Active', 3, '2024-07-19', 3, 1, 2, 1, 1, '2024-07-18 10:20:24', '2024-07-19 11:27:43', NULL),
(18, 'W-0007', 'Purchase Request', 'Active', 1, '2024-07-19', 1, 1, 2, 1, 1, '2024-07-18 10:20:58', '2024-07-19 11:27:52', NULL),
(19, 'W-0008', 'Quotation', 'Active', 2, '2024-07-19', 2, 1, 2, 1, 1, '2024-07-18 10:22:31', '2024-07-19 11:28:02', NULL),
(20, 'W-0009', 'Supplier Registration request', 'Active', 10, '2024-07-19', 10, 1, 2, 1, 1, '2024-07-18 10:23:07', '2024-07-19 11:28:22', NULL),
(21, 'W-010', 'Tender Request', 'Active', 6, '2024-07-19', 6, 1, 2, 1, 1, '2024-07-18 10:23:25', '2024-07-19 11:28:36', NULL),
(22, 'W-0012', 'Vendor request', 'Active', 9, '2024-07-19', 9, 1, 2, 1, 1, '2024-07-18 10:24:27', '2024-07-19 11:29:33', NULL),
(23, 'W-001', 'Auction', 'Active', 11, '2024-07-23', 11, 1, 3, 1, 1, '2024-07-18 10:42:06', '2024-07-23 07:00:47', NULL),
(24, 'W-002', 'Need', 'Active', 7, '2024-07-23', 7, 1, 3, 1, 1, '2024-07-18 10:42:24', '2024-07-23 07:01:22', NULL),
(25, 'W-003', 'RFI Development', 'Active', 8, '2024-07-23', 8, 1, 3, 1, 1, '2024-07-18 10:47:33', '2024-07-23 07:03:10', NULL),
(26, 'W-004', 'GRN', 'Active', 4, '2024-07-23', 4, 1, 3, 1, 1, '2024-07-18 10:52:29', '2024-07-23 07:00:55', NULL),
(27, 'W-005', 'Invoice', 'Active', 5, '2024-07-23', 5, 1, 3, 1, 1, '2024-07-18 10:52:46', '2024-07-23 07:01:04', NULL),
(28, 'W-006', 'Purchase order', 'Active', 3, '2024-07-23', 3, 1, 3, 1, 1, '2024-07-18 10:53:03', '2024-07-23 07:01:31', NULL),
(29, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-23', 1, 1, 3, 1, 1, '2024-07-19 04:43:47', '2024-07-23 07:03:55', NULL),
(30, 'W-008', 'Quotation', 'Active', 2, '2024-07-23', 2, 2, 3, 1, 1, '2024-07-19 04:44:04', '2024-07-23 08:41:54', NULL),
(31, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-23', 10, 1, 3, 1, 1, '2024-07-19 04:44:23', '2024-07-23 07:03:21', NULL),
(32, 'W-010', 'Tender Request', 'Active', 6, '2024-07-23', 6, 1, 3, 1, 1, '2024-07-19 04:44:55', '2024-07-23 07:03:30', NULL),
(33, 'W-011', 'Vendor request', 'Active', 9, '2024-07-23', 9, 1, 3, 1, 1, '2024-07-19 04:45:16', '2024-07-23 07:03:42', NULL),
(34, 'W-001', 'Auction request', 'Active', 11, '2024-07-23', 11, 1, 4, 1, 1, '2024-07-19 04:45:48', '2024-07-23 09:04:47', NULL),
(35, 'W-002', 'Need', 'Active', 7, '2024-07-23', 7, 1, 4, 1, 1, '2024-07-19 04:46:02', '2024-07-23 09:05:45', NULL),
(36, 'W-003', 'RFI Development', 'Active', 8, '2024-07-23', 8, 1, 4, 1, 1, '2024-07-19 04:46:22', '2024-07-23 09:06:28', NULL),
(37, 'W-004', 'GRN', 'Active', 4, '2024-07-23', 4, 1, 4, 1, 1, '2024-07-19 04:46:34', '2024-07-23 09:05:02', NULL),
(38, 'W-005', 'Invoice', 'Active', 5, '2024-07-23', 5, 1, 4, 1, 1, '2024-07-19 04:47:17', '2024-07-23 09:05:15', NULL),
(39, 'W-006', 'Purchase order', 'Active', 3, '2024-07-23', 3, 1, 4, 1, 1, '2024-07-19 04:47:34', '2024-07-23 09:05:55', NULL),
(40, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-23', 1, 1, 4, 1, 1, '2024-07-19 04:47:51', '2024-07-23 09:06:08', NULL),
(41, 'W-008', 'Quotation', 'Active', 2, '2024-07-23', 2, 1, 4, 1, 1, '2024-07-19 04:48:06', '2024-07-23 09:06:19', NULL),
(42, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-23', 10, 1, 4, 1, 1, '2024-07-19 04:48:23', '2024-07-23 09:06:38', NULL),
(43, 'W-010', 'Tender Request', 'Active', 6, '2024-07-23', 6, 1, 4, 1, 1, '2024-07-19 04:48:39', '2024-07-23 09:06:51', NULL),
(44, 'W-011', 'Vendor request', 'Active', 9, '2024-07-23', 9, 1, 4, 1, 1, '2024-07-19 04:49:07', '2024-07-23 09:07:20', NULL),
(45, 'W-001', 'Auction request', 'Active', 11, '2024-07-23', 11, 1, 5, 1, 1, '2024-07-19 04:56:34', '2024-07-23 09:32:50', NULL),
(46, 'W-002', 'Need', 'Active', 7, '2024-07-23', 7, 1, 5, 1, 1, '2024-07-19 04:56:48', '2024-07-23 09:40:07', NULL),
(47, 'W-003', 'RFI Development', 'Active', 8, '2024-07-23', 8, 1, 5, 1, 1, '2024-07-19 04:57:06', '2024-07-23 09:36:49', NULL),
(48, 'W-004', 'GRN', 'Active', 4, '2024-07-23', 4, 1, 5, 1, 1, '2024-07-19 04:57:50', '2024-07-23 09:32:59', NULL),
(49, 'W-005', 'Invoice', 'Active', 5, '2024-07-23', 5, 1, 5, 1, 1, '2024-07-19 04:58:57', '2024-07-23 09:33:08', NULL),
(50, 'W-006', 'Purchase order', 'Active', 3, '2024-07-23', 3, 1, 5, 1, 1, '2024-07-19 04:59:20', '2024-07-23 09:40:20', NULL),
(51, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-23', 1, 1, 5, 1, 1, '2024-07-19 04:59:40', '2024-07-23 09:40:32', NULL),
(52, 'W-008', 'Quotation', 'Active', 2, '2024-07-23', 2, 1, 5, 1, 1, '2024-07-19 04:59:57', '2024-07-23 09:40:52', NULL),
(53, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-23', 10, 1, 5, 1, 1, '2024-07-19 05:00:14', '2024-07-23 09:36:40', NULL),
(54, 'W-010', 'Tender Request', 'Active', 6, '2024-07-23', 6, 1, 5, 1, 1, '2024-07-19 05:00:30', '2024-07-23 09:36:31', NULL),
(55, 'W-011', 'Vendor request', 'Active', 9, NULL, NULL, 0, 5, 1, 1, '2024-07-19 05:00:54', '2024-07-19 05:00:54', NULL),
(56, 'W-001', 'Auction request', 'Active', 11, '2024-07-30', 11, 1, 6, 1, 1, '2024-07-19 05:01:48', '2024-07-30 06:08:50', NULL),
(57, 'W-002', 'Need', 'Active', 7, '2024-07-30', 7, 1, 6, 1, 1, '2024-07-19 05:02:36', '2024-07-30 06:09:25', NULL),
(58, 'W-003', 'RFI Development', 'Active', 8, '2024-07-30', 8, 1, 6, 1, 1, '2024-07-19 05:02:54', '2024-07-30 06:10:16', NULL),
(59, 'W-004', 'GRN', 'Active', 4, '2024-07-30', 4, 1, 6, 1, 1, '2024-07-19 05:03:15', '2024-07-30 06:08:58', NULL),
(60, 'W-005', 'Invoice', 'Active', 5, '2024-07-30', 5, 1, 6, 1, 1, '2024-07-19 05:03:35', '2024-07-30 06:09:14', NULL),
(61, 'W-006', 'Purchase order', 'Active', 3, '2024-07-30', 3, 1, 6, 1, 1, '2024-07-19 05:03:49', '2024-07-30 06:09:39', NULL),
(62, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-30', 1, 1, 6, 1, 1, '2024-07-19 05:04:09', '2024-07-30 06:09:56', NULL),
(63, 'W-008', 'Quotation', 'Active', 2, '2024-07-30', 2, 1, 6, 1, 1, '2024-07-19 05:05:36', '2024-07-30 06:10:05', NULL),
(64, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-30', 10, 1, 6, 1, 1, '2024-07-19 05:07:58', '2024-07-30 06:10:25', NULL),
(65, 'W-010', 'Tender Request', 'Active', 6, '2024-07-30', 6, 1, 6, 1, 1, '2024-07-19 05:08:14', '2024-07-30 06:10:33', NULL),
(66, 'W-011', 'Vendor request', 'Active', 9, '2024-07-30', 9, 1, 6, 1, 1, '2024-07-19 05:08:49', '2024-07-30 06:10:44', NULL),
(67, 'W-001', 'Auction request', 'Active', 11, '2024-07-30', 11, 2, 7, 1, 1, '2024-07-19 05:10:08', '2024-07-30 06:06:37', NULL),
(68, 'W-002', 'Need', 'Active', 7, '2024-07-30', 7, 1, 7, 1, 1, '2024-07-19 05:10:25', '2024-07-30 06:07:24', NULL),
(69, 'W-003', 'RFI Development', 'Active', 8, '2024-07-30', 8, 1, 7, 1, 1, '2024-07-19 05:10:43', '2024-07-30 06:08:01', NULL),
(70, 'W-004', 'GRN', 'Active', 4, '2024-07-30', 4, 1, 7, 1, 1, '2024-07-19 05:11:21', '2024-07-30 06:06:45', NULL),
(71, 'W-005', 'Invoice', 'Active', 5, '2024-07-30', 5, 1, 7, 1, 1, '2024-07-19 05:11:37', '2024-07-30 06:07:12', NULL),
(72, 'W-006', 'Purchase order', 'Active', 3, '2024-07-30', 3, 1, 7, 1, 1, '2024-07-19 05:11:54', '2024-07-30 06:07:33', NULL),
(73, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-30', 1, 1, 7, 1, 1, '2024-07-19 05:12:13', '2024-07-30 06:07:42', NULL),
(74, 'W-008', 'Quotation', 'Active', 2, '2024-07-30', 2, 1, 7, 1, 1, '2024-07-19 05:12:46', '2024-07-30 06:07:51', NULL),
(75, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-30', 10, 1, 7, 1, 1, '2024-07-19 05:14:42', '2024-07-30 06:08:09', NULL),
(76, 'W-010', 'Tender Request', 'Active', 6, '2024-07-30', 6, 1, 7, 1, 1, '2024-07-19 05:15:11', '2024-07-30 06:08:19', NULL),
(77, 'W-011', 'Vendor request', 'Active', 9, '2024-07-30', 9, 1, 7, 1, 1, '2024-07-19 05:15:52', '2024-07-30 06:08:28', NULL),
(78, 'W-001', 'Auction request', 'Active', 11, '2024-07-30', 11, 1, 8, 1, 1, '2024-07-19 05:19:35', '2024-07-30 06:44:41', NULL),
(79, 'W-002', 'Need', 'Active', 7, '2024-07-30', 7, 1, 8, 1, 1, '2024-07-19 05:19:57', '2024-07-30 06:45:29', NULL),
(80, 'W-003', 'RFI Development', 'Active', 8, '2024-07-30', 8, 1, 8, 1, 1, '2024-07-19 05:20:15', '2024-07-30 06:46:38', NULL),
(81, 'W-004', 'GRN', 'Active', 4, '2024-07-30', 4, 1, 8, 1, 1, '2024-07-19 05:20:31', '2024-07-30 06:45:10', NULL),
(82, 'W-005', 'Invoice', 'Active', 5, '2024-07-30', 5, 1, 8, 1, 1, '2024-07-19 05:20:45', '2024-07-30 06:45:20', NULL),
(83, 'W-006', 'Purchase order', 'Active', 3, '2024-07-30', 3, 1, 8, 1, 1, '2024-07-19 05:21:00', '2024-07-30 06:45:46', NULL),
(84, 'W-007', 'Purchase Request', 'Active', 1, '2024-07-30', 1, 1, 8, 1, 1, '2024-07-19 05:21:48', '2024-07-30 06:46:08', NULL),
(86, 'W-008', 'Quotation', 'Active', 2, '2024-07-30', 2, 1, 8, 1, 1, '2024-07-19 05:38:50', '2024-07-30 06:46:20', NULL),
(87, 'W-009', 'Supplier Registration request', 'Active', 10, '2024-07-30', 10, 1, 8, 1, 1, '2024-07-19 05:39:17', '2024-07-30 06:47:30', NULL),
(88, 'W-010', 'Tender Request', 'Active', 6, '2024-07-30', 6, 1, 8, 1, 1, '2024-07-19 05:39:35', '2024-07-30 06:47:40', NULL),
(89, 'W-011', 'Vendor request', 'Active', 9, '2024-07-30', 9, 1, 8, 1, 1, '2024-07-19 05:39:57', '2024-07-30 06:47:52', NULL),
(90, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 1, 1, 1, '2024-10-15 09:25:44', '2024-10-15 09:56:39', NULL),
(91, 'W-0010', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 2, 1, 1, '2024-10-15 09:42:54', '2024-10-15 09:55:55', NULL),
(92, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 3, 1, 1, '2024-10-15 09:43:59', '2024-10-15 09:55:15', NULL),
(93, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 4, 1, 1, '2024-10-15 09:44:47', '2024-10-15 09:54:26', NULL),
(94, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 5, 1, 1, '2024-10-15 09:45:26', '2024-10-15 09:53:47', NULL),
(95, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 6, 1, 1, '2024-10-15 09:46:08', '2024-10-15 09:53:07', NULL),
(96, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 7, 1, 1, '2024-10-15 09:46:54', '2024-10-15 09:49:00', NULL),
(97, 'W-012', 'Tender Award', 'Active', 12, '2024-10-15', 12, 1, 8, 1, 1, '2024-10-15 09:47:36', '2024-10-15 09:48:16', NULL),
(98, 'W-013', 'Quotation Compair Reply', 'Active', 13, '2024-10-22', 13, 1, 1, 2, 2, '2024-10-22 11:23:25', '2024-10-22 11:25:59', NULL),
(99, 'New', 'New', 'Active', 2, '2024-11-25', 10, 1, 1, 1, 1, '2024-11-25 06:20:27', '2024-11-25 06:50:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workflow_steps`
--

CREATE TABLE `workflow_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workflow_setup_id` bigint(20) UNSIGNED NOT NULL,
  `step_name` varchar(191) DEFAULT NULL,
  `condition` enum('Employee','Line Department','Other Department','Line Manager','Signatory','Conditional') DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `approval_type` enum('Single Employee','All Employee') DEFAULT NULL,
  `system_notification` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `email_notification` enum('Yes','No') DEFAULT NULL,
  `email_template_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow_steps`
--

INSERT INTO `workflow_steps` (`id`, `workflow_setup_id`, `step_name`, `condition`, `status`, `approval_type`, `system_notification`, `email_notification`, `email_template_id`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 08:50:16', '2024-07-18 08:50:16', NULL),
(2, 2, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:07:47', '2024-07-18 09:07:47', NULL),
(3, 3, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:10:03', '2024-07-18 09:10:03', NULL),
(4, 4, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:44:42', '2024-07-18 09:44:42', NULL),
(5, 5, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:46:46', '2024-07-18 09:46:46', NULL),
(6, 6, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:48:23', '2024-07-18 09:48:23', NULL),
(7, 7, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:53:14', '2024-07-18 09:53:14', NULL),
(8, 8, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 09:56:40', '2024-07-18 09:56:40', NULL),
(9, 10, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 10:00:00', '2024-07-18 10:00:00', NULL),
(10, 11, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 1, 1, '2024-07-18 10:05:52', '2024-07-18 10:05:52', NULL),
(11, 12, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 05:48:52', '2024-07-19 05:48:52', NULL),
(12, 13, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:14:04', '2024-07-19 06:14:04', NULL),
(13, 14, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:14:34', '2024-07-19 06:14:34', NULL),
(14, 15, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:26:06', '2024-07-19 06:26:06', NULL),
(15, 16, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:27:25', '2024-07-19 06:27:25', NULL),
(16, 17, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:28:02', '2024-07-19 06:28:02', NULL),
(17, 18, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:28:40', '2024-07-19 06:28:40', NULL),
(18, 19, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:32:06', '2024-07-19 06:32:06', NULL),
(19, 20, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:39:29', '2024-07-19 06:39:29', NULL),
(20, 22, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:39:58', '2024-07-19 06:39:58', NULL),
(21, 21, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 1, 1, '2024-07-19 06:42:35', '2024-07-19 06:42:35', NULL),
(22, 23, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 06:50:01', '2024-07-19 06:50:01', NULL),
(23, 24, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 06:50:25', '2024-07-19 06:50:25', NULL),
(24, 25, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 06:50:43', '2024-07-19 06:50:43', NULL),
(25, 26, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 06:51:36', '2024-07-19 06:51:36', NULL),
(26, 27, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 06:52:33', '2024-07-19 06:52:33', NULL),
(27, 28, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 06:52:58', '2024-07-19 06:52:58', NULL),
(28, 29, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 07:06:48', '2024-07-19 07:06:48', NULL),
(29, 30, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 07:07:09', '2024-07-19 07:07:09', NULL),
(30, 31, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 07:07:26', '2024-07-19 07:07:26', NULL),
(31, 32, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 07:08:35', '2024-07-19 07:08:35', NULL),
(32, 33, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 1, 1, '2024-07-19 09:12:53', '2024-07-19 09:12:53', NULL),
(33, 34, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:36:40', '2024-07-19 09:36:40', NULL),
(34, 35, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:39:30', '2024-07-19 09:39:30', NULL),
(35, 36, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:39:59', '2024-07-19 09:39:59', NULL),
(36, 37, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:41:38', '2024-07-19 09:41:38', NULL),
(37, 38, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:42:01', '2024-07-19 09:42:01', NULL),
(38, 39, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:43:27', '2024-07-19 09:43:27', NULL),
(39, 40, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:43:52', '2024-07-19 09:43:52', NULL),
(40, 41, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:44:43', '2024-07-19 09:44:43', NULL),
(41, 42, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:45:03', '2024-07-19 09:45:03', NULL),
(42, 43, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:46:14', '2024-07-19 09:46:14', NULL),
(43, 44, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 1, 1, '2024-07-19 09:47:20', '2024-07-19 09:47:20', NULL),
(44, 45, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 09:47:59', '2024-07-19 09:47:59', NULL),
(45, 46, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 09:48:20', '2024-07-19 09:48:20', NULL),
(46, 47, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 09:49:43', '2024-07-19 09:49:43', NULL),
(47, 48, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 09:50:03', '2024-07-19 09:50:03', NULL),
(48, 49, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 09:50:28', '2024-07-19 09:50:28', NULL),
(49, 50, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 10:03:59', '2024-07-19 10:03:59', NULL),
(50, 54, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 10:09:52', '2024-07-19 10:09:52', NULL),
(51, 53, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 10:11:04', '2024-07-19 10:11:04', NULL),
(52, 52, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 10:13:00', '2024-07-19 10:13:00', NULL),
(53, 51, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 10:13:22', '2024-07-19 10:13:22', NULL),
(54, 55, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 5, 1, 1, '2024-07-19 10:13:48', '2024-07-19 10:13:48', NULL),
(55, 56, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:14:18', '2024-07-19 10:14:18', NULL),
(56, 57, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:14:44', '2024-07-19 10:14:44', NULL),
(57, 58, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:15:03', '2024-07-19 10:15:03', NULL),
(58, 60, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:15:27', '2024-07-19 10:15:27', NULL),
(59, 61, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:15:49', '2024-07-19 10:15:49', NULL),
(60, 62, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:16:17', '2024-07-19 10:16:17', NULL),
(61, 63, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:16:52', '2024-07-19 10:16:52', NULL),
(62, 64, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:17:10', '2024-07-19 10:17:10', NULL),
(63, 65, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:17:30', '2024-07-19 10:17:30', NULL),
(64, 66, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-19 10:18:07', '2024-07-19 10:18:07', NULL),
(65, 67, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:21:20', '2024-07-19 10:21:20', NULL),
(66, 68, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:21:51', '2024-07-19 10:21:51', NULL),
(67, 69, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:22:13', '2024-07-19 10:22:13', NULL),
(68, 70, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:24:03', '2024-07-19 10:24:03', NULL),
(69, 71, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:24:29', '2024-07-19 10:24:29', NULL),
(70, 72, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:24:51', '2024-07-19 10:24:51', NULL),
(71, 73, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 10:25:31', '2024-07-19 10:25:31', NULL),
(72, 77, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 11:17:11', '2024-07-19 11:17:11', NULL),
(73, 76, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 11:19:55', '2024-07-19 11:19:55', NULL),
(74, 75, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-19 11:20:44', '2024-07-19 11:20:44', NULL),
(75, 78, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:21:39', '2024-07-19 11:21:39', NULL),
(76, 79, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:22:00', '2024-07-19 11:22:00', NULL),
(77, 80, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:22:23', '2024-07-19 11:22:23', NULL),
(78, 81, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:22:47', '2024-07-19 11:22:47', NULL),
(79, 83, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:23:15', '2024-07-19 11:23:15', NULL),
(80, 84, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:23:40', '2024-07-19 11:23:40', NULL),
(81, 86, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:24:06', '2024-07-19 11:24:06', NULL),
(82, 87, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:24:27', '2024-07-19 11:24:27', NULL),
(83, 88, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:24:52', '2024-07-19 11:24:52', NULL),
(84, 89, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-19 11:25:18', '2024-07-19 11:25:18', NULL),
(85, 59, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 6, 1, 1, '2024-07-30 05:45:41', '2024-07-30 05:45:41', NULL),
(86, 74, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 1, 1, '2024-07-30 06:04:37', '2024-07-30 06:04:37', NULL),
(87, 82, 'Step 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 1, 1, '2024-07-30 06:30:21', '2024-07-30 06:30:21', NULL),
(88, 84, 'Step 2', 'Conditional', 'Inactive', NULL, 'Yes', 'No', NULL, 8, 1, 1, '2024-09-20 05:58:15', '2024-10-17 04:09:25', NULL),
(89, 29, 'Step 2', 'Conditional', 'Inactive', NULL, 'Yes', 'No', NULL, 3, 1, 1, '2024-09-20 10:23:57', '2024-10-16 11:20:28', NULL),
(90, 23, '01', 'Conditional', 'Inactive', NULL, 'Yes', 'No', NULL, 3, 29, 29, '2024-10-16 08:45:40', '2024-10-16 08:47:24', NULL),
(91, 9, 'Step - 1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 2, 2, '2024-10-16 11:07:22', '2024-10-16 11:07:22', NULL),
(92, 90, 'Step-1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 2, 2, '2024-10-16 11:08:02', '2024-10-16 11:08:02', NULL),
(93, 90, 'Step-1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 2, 2, '2024-10-16 11:09:32', '2024-10-16 11:09:32', NULL),
(94, 91, 'Step-1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 2, 5, 5, '2024-10-16 11:17:10', '2024-10-16 11:17:10', NULL),
(95, 92, 'Step-1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 3, 8, 8, '2024-10-16 11:20:51', '2024-10-16 11:20:51', NULL),
(96, 93, 'Step-1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 4, 11, 11, '2024-10-16 12:29:18', '2024-10-16 12:29:18', NULL),
(97, 96, 'Step -1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 7, 20, 20, '2024-10-17 04:06:27', '2024-10-17 04:06:27', NULL),
(98, 97, 'Step-1', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 8, 23, 23, '2024-10-17 04:09:51', '2024-10-17 04:09:51', NULL),
(99, 98, 'Quotation Reply Approval', 'Employee', 'Active', 'Single Employee', 'Yes', 'No', NULL, 1, 2, 2, '2024-10-22 11:24:49', '2024-10-22 11:24:49', NULL),
(100, 99, 'cond', 'Conditional', 'Active', NULL, 'Yes', 'No', NULL, 1, 1, 1, '2024-11-25 06:23:24', '2024-11-25 06:23:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workflow_transition_header`
--

CREATE TABLE `workflow_transition_header` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_code` varchar(191) DEFAULT NULL,
  `workflow_map_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workflow_steps_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workflow_setup_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_code` varchar(191) DEFAULT NULL,
  `requester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('Active','Completed') DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workflow_transition_line`
--

CREATE TABLE `workflow_transition_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workflow_transition_header` bigint(20) UNSIGNED DEFAULT NULL,
  `ref_code` varchar(191) DEFAULT NULL,
  `workflow_map_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workflow_steps_id` bigint(20) UNSIGNED DEFAULT NULL,
  `workflow_setup_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_code` varchar(191) DEFAULT NULL,
  `emp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `requester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `approval_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('Approved','Pending','Rejected','Change request') DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `signature` enum('No','Yes') DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amy_countries`
--
ALTER TABLE `amy_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code_unique` (`code`),
  ADD KEY `category_company_id_foreign` (`company_id`),
  ADD KEY `category_created_by_foreign` (`created_by`),
  ADD KEY `category_updated_by_foreign` (`updated_by`),
  ADD KEY `category_postype_id_foreign` (`postype_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_images`
--
ALTER TABLE `comment_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_employee`
--
ALTER TABLE `company_employee`
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
  ADD UNIQUE KEY `customer_email_unique` (`email`),
  ADD UNIQUE KEY `customer_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `customer_tax_no_unique` (`tax_no`),
  ADD KEY `customer_company_id_foreign` (`company_id`),
  ADD KEY `customer_created_by_foreign` (`created_by`),
  ADD KEY `customer_updated_by_foreign` (`updated_by`),
  ADD KEY `customer_company_employee_id_foreign` (`company_employee_id`),
  ADD KEY `customer_country_id_foreign` (`country_id`),
  ADD KEY `customer_pos_id_foreign` (`pos_id`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_contact_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `custom_notification`
--
ALTER TABLE `custom_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_notification_user_id_foreign` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_code_unique` (`code`),
  ADD KEY `item_company_id_foreign` (`company_id`),
  ADD KEY `item_created_by_foreign` (`created_by`),
  ADD KEY `item_updated_by_foreign` (`updated_by`),
  ADD KEY `item_uom_id_foreign` (`uom_id`),
  ADD KEY `item_category_id_foreign` (`category_id`),
  ADD KEY `item_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `notice_communication`
--
ALTER TABLE `notice_communication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notice_communication_company_id_foreign` (`company_id`),
  ADD KEY `notice_communication_created_by_foreign` (`created_by`),
  ADD KEY `notice_communication_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `numbersequence`
--
ALTER TABLE `numbersequence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbersequence_map`
--
ALTER TABLE `numbersequence_map`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pos_code_unique` (`code`),
  ADD KEY `pos_company_id_foreign` (`company_id`),
  ADD KEY `pos_created_by_foreign` (`created_by`),
  ADD KEY `pos_updated_by_foreign` (`updated_by`),
  ADD KEY `pos_postype_id_foreign` (`postype_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_type`
--
ALTER TABLE `pos_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pos_type_name_unique` (`name`),
  ADD UNIQUE KEY `pos_type_code_unique` (`code`),
  ADD KEY `pos_type_company_id_foreign` (`company_id`),
  ADD KEY `pos_type_created_by_foreign` (`created_by`),
  ADD KEY `pos_type_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategory_code_unique` (`code`),
  ADD KEY `subcategory_company_id_foreign` (`company_id`),
  ADD KEY `subcategory_created_by_foreign` (`created_by`),
  ADD KEY `subcategory_updated_by_foreign` (`updated_by`),
  ADD KEY `subcategory_category_id_foreign` (`category_id`);

--
-- Indexes for table `systemadminsetup`
--
ALTER TABLE `systemadminsetup`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uom_code_unique` (`code`),
  ADD KEY `uom_company_id_foreign` (`company_id`),
  ADD KEY `uom_created_by_foreign` (`created_by`),
  ADD KEY `uom_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `workflow_assignment`
--
ALTER TABLE `workflow_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_deligation`
--
ALTER TABLE `workflow_deligation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_event_history`
--
ALTER TABLE `workflow_event_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_map`
--
ALTER TABLE `workflow_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_map_log`
--
ALTER TABLE `workflow_map_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_setup`
--
ALTER TABLE `workflow_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_steps`
--
ALTER TABLE `workflow_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_transition_header`
--
ALTER TABLE `workflow_transition_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_transition_line`
--
ALTER TABLE `workflow_transition_line`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amy_countries`
--
ALTER TABLE `amy_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_images`
--
ALTER TABLE `comment_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_employee`
--
ALTER TABLE `company_employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=923;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_contact`
--
ALTER TABLE `customer_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `custom_notification`
--
ALTER TABLE `custom_notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_master`
--
ALTER TABLE `email_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `last_login`
--
ALTER TABLE `last_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `notice_communication`
--
ALTER TABLE `notice_communication`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `numbersequence`
--
ALTER TABLE `numbersequence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `numbersequence_map`
--
ALTER TABLE `numbersequence_map`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pos_type`
--
ALTER TABLE `pos_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `systemadminsetup`
--
ALTER TABLE `systemadminsetup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workflow_assignment`
--
ALTER TABLE `workflow_assignment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `workflow_deligation`
--
ALTER TABLE `workflow_deligation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workflow_event_history`
--
ALTER TABLE `workflow_event_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `workflow_map`
--
ALTER TABLE `workflow_map`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `workflow_map_log`
--
ALTER TABLE `workflow_map_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `workflow_setup`
--
ALTER TABLE `workflow_setup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `workflow_steps`
--
ALTER TABLE `workflow_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `workflow_transition_header`
--
ALTER TABLE `workflow_transition_header`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `workflow_transition_line`
--
ALTER TABLE `workflow_transition_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_postype_id_foreign` FOREIGN KEY (`postype_id`) REFERENCES `pos_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_company_employee_id_foreign` FOREIGN KEY (`company_employee_id`) REFERENCES `company_employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `amy_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_pos_id_foreign` FOREIGN KEY (`pos_id`) REFERENCES `pos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD CONSTRAINT `customer_contact_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_uom_id_foreign` FOREIGN KEY (`uom_id`) REFERENCES `uom` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `pos_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pos_postype_id_foreign` FOREIGN KEY (`postype_id`) REFERENCES `pos_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pos_type`
--
ALTER TABLE `pos_type`
  ADD CONSTRAINT `pos_type_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pos_type_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pos_type_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcategory_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcategory_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcategory_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uom`
--
ALTER TABLE `uom`
  ADD CONSTRAINT `uom_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uom_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uom_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
