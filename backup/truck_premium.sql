-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 12:32 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truck_premium`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE `accidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_rate_groups`
--

CREATE TABLE `car_rate_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_pricing_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_rate_groups`
--

INSERT INTO `car_rate_groups` (`id`, `car_pricing_rating`, `notes`, `created_at`, `updated_at`) VALUES
(1, '75', '75 thousand dolors', '2020-02-07 19:00:00', '2020-02-07 19:00:00'),
(2, '100', '1 lakh dollors', NULL, NULL),
(4, '150', '150 thousand dollers', NULL, NULL),
(5, '200', '200 thousand dollers', NULL, NULL),
(6, '50', 'kjjjjll', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_factors`
--

CREATE TABLE `class_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `radius` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_factors`
--

INSERT INTO `class_factors` (`id`, `radius`, `class`, `notes`, `created_at`, `updated_at`) VALUES
(1, '39', 46, 'less then 40 killometers', NULL, NULL),
(2, '79', 49, 'greater 40 kilometers and less 80 kilometers', NULL, NULL),
(5, '161', 62, 'greater then 161 kilometers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collisions`
--

CREATE TABLE `collisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `territory_id` bigint(20) UNSIGNED NOT NULL,
  `group_factor_id` bigint(20) UNSIGNED NOT NULL,
  `collision_price` double NOT NULL,
  `premium_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collisions`
--

INSERT INTO `collisions` (`id`, `territory_id`, `group_factor_id`, `collision_price`, `premium_id`, `created_at`, `updated_at`) VALUES
(18, 1, 4, 5181, 11, NULL, NULL),
(19, 1, 5, 7445, 14, NULL, NULL),
(20, 1, 6, 9305, 18, NULL, NULL),
(21, 1, 7, 10606, 23, NULL, NULL),
(22, 1, 8, 11139, 27, NULL, NULL),
(23, 1, 9, 6865, 13, NULL, NULL),
(24, 1, 10, 8466, 16, NULL, NULL),
(25, 1, 11, 9647, 19, NULL, NULL),
(26, 1, 12, 11030, 25, NULL, NULL),
(27, 1, 13, 11326, 29, NULL, NULL),
(28, 1, 14, 7968, 15, NULL, NULL),
(29, 1, 15, 10424, 22, NULL, NULL),
(30, 1, 16, 11139, 27, NULL, NULL),
(31, 1, 17, 11543, 32, NULL, NULL),
(32, 1, 18, 9305, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comprehensives`
--

CREATE TABLE `comprehensives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `territory_id` bigint(20) UNSIGNED NOT NULL,
  `group_factor_id` bigint(20) UNSIGNED NOT NULL,
  `comprehensive_price` double NOT NULL,
  `premium_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comprehensives`
--

INSERT INTO `comprehensives` (`id`, `territory_id`, `group_factor_id`, `comprehensive_price`, `premium_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 612, 11, NULL, NULL),
(2, 1, 5, 870, 14, NULL, NULL),
(3, 1, 6, 1149, 18, NULL, NULL),
(4, 1, 7, 1368, 23, NULL, NULL),
(5, 1, 8, 1457, 27, NULL, NULL),
(6, 1, 9, 788, 13, NULL, NULL),
(7, 1, 10, 1019, 16, NULL, NULL),
(8, 1, 11, 1206, 19, NULL, NULL),
(9, 1, 12, 1439, 25, NULL, NULL),
(10, 1, 13, 1489, 29, NULL, NULL),
(11, 1, 14, 945, 15, NULL, NULL),
(12, 1, 15, 1336, 22, NULL, NULL),
(13, 1, 16, 1457, 27, NULL, NULL),
(14, 1, 17, 1526, 32, NULL, NULL),
(15, 1, 18, 1149, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dealears`
--

CREATE TABLE `dealears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealears`
--

INSERT INTO `dealears` (`id`, `name`, `phone`, `adress`, `created_at`, `updated_at`) VALUES
(1, 'david', 1111111111, 'asasas asddda', NULL, NULL),
(2, 'jhon', 123456789, 'wddd ssssdsd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deductibles`
--

CREATE TABLE `deductibles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `coll` double NOT NULL,
  `comp` double NOT NULL,
  `sp` double NOT NULL,
  `lia` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_license_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `Name`, `license_number`, `driver_license_class`, `date_of_birth`, `truck_id`, `report_id`, `created_at`, `updated_at`) VALUES
(140, 'nanan', 'nanann', 'nsnsnsn', '2020-01-01', 144, 141, '2020-02-08 17:13:02', '2020-02-08 17:13:02'),
(141, 'aksaka', 'kakakak', 'kakakk', '2000-01-02', 145, 142, '2020-02-08 17:17:03', '2020-02-08 17:17:03'),
(142, 'aksaka', 'kakakak', 'kakakk', '2000-01-02', 146, 143, '2020-02-08 17:17:45', '2020-02-08 17:17:45'),
(143, 'aksaka', 'kakakak', 'kakakk', '2000-01-02', 147, 144, '2020-02-08 17:19:21', '2020-02-08 17:19:21'),
(144, 'aksaka', 'kakakak', 'kakakk', '2000-01-02', 148, 145, '2020-02-08 17:19:50', '2020-02-08 17:19:50'),
(145, 'aksaka', 'kakakak', 'kakakk', '2000-01-02', 149, 146, '2020-02-08 17:20:30', '2020-02-08 17:20:30'),
(146, 'akakka', 'KAKAKKAKAK', 'skksksks', '2020-02-12', 151, 148, '2020-02-08 17:21:22', '2020-02-08 17:21:22'),
(147, 'akakka', 'KAKAKKAKAK', 'skksksks', '2020-02-12', 152, 149, '2020-02-08 17:23:08', '2020-02-08 17:23:08'),
(148, 'akakka', 'KAKAKKAKAK', 'skksksks', '2020-02-12', 153, 150, '2020-02-08 17:23:37', '2020-02-08 17:23:37'),
(149, 'mamama', 'mamam', 'ammama', '2020-01-01', 154, 151, '2020-02-08 17:27:58', '2020-02-08 17:27:58'),
(150, 'mama', 'mamam', 'aama', '2020-02-09', 155, 152, '2020-02-08 17:35:22', '2020-02-08 17:35:22'),
(151, 'lalla', 'lalal', 'alalla', '2020-01-01', 156, 153, '2020-02-08 17:43:31', '2020-02-08 17:43:31'),
(152, 'lalal', 'lalal', 'lalal', '2020-12-30', 157, 154, '2020-02-08 17:56:26', '2020-02-08 17:56:26'),
(153, 'kakak', 'kakak', 'akakk', '2020-02-09', 158, 155, '2020-02-08 17:57:27', '2020-02-08 17:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `driver_report`
--

CREATE TABLE `driver_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_report`
--

INSERT INTO `driver_report` (`id`, `driver_id`, `report_id`, `created_at`, `updated_at`) VALUES
(140, 140, 141, NULL, NULL),
(141, 141, 142, NULL, NULL),
(142, 142, 143, NULL, NULL),
(143, 143, 144, NULL, NULL),
(144, 144, 145, NULL, NULL),
(145, 145, 146, NULL, NULL),
(146, 146, 148, NULL, NULL),
(147, 147, 149, NULL, NULL),
(148, 148, 150, NULL, NULL),
(149, 149, 151, NULL, NULL),
(150, 150, 152, NULL, NULL),
(151, 151, 153, NULL, NULL),
(152, 152, 154, NULL, NULL),
(153, 153, 155, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups_factors`
--

CREATE TABLE `groups_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_start` year(4) NOT NULL,
  `year_end` year(4) NOT NULL,
  `car_rate_group_id` bigint(20) UNSIGNED NOT NULL,
  `group` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups_factors`
--

INSERT INTO `groups_factors` (`id`, `year_start`, `year_end`, `car_rate_group_id`, `group`, `created_at`, `updated_at`) VALUES
(4, 2005, 2009, 6, 11, NULL, NULL),
(5, 2005, 2009, 1, 14, NULL, NULL),
(6, 2005, 2009, 2, 18, NULL, NULL),
(7, 2005, 2009, 4, 23, NULL, NULL),
(8, 2005, 2009, 5, 27, NULL, NULL),
(9, 2010, 2019, 6, 13, NULL, NULL),
(10, 2010, 2019, 1, 16, NULL, NULL),
(11, 2010, 2019, 2, 19, NULL, NULL),
(12, 2010, 2019, 4, 25, NULL, NULL),
(13, 2010, 2019, 5, 29, NULL, NULL),
(14, 2020, 2025, 6, 15, NULL, NULL),
(15, 2020, 2025, 2, 22, NULL, NULL),
(16, 2020, 2025, 4, 27, NULL, NULL),
(17, 2020, 2025, 5, 32, NULL, NULL),
(18, 2020, 2025, 1, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `liabilitiys`
--

CREATE TABLE `liabilitiys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `territory_id` bigint(20) UNSIGNED NOT NULL,
  `class_factor_id` bigint(20) UNSIGNED NOT NULL,
  `premium_id` bigint(20) UNSIGNED NOT NULL,
  `is_danger` tinyint(1) NOT NULL,
  `liability_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_04_122812_create_trucks_table', 1),
(5, '2020_01_04_123235_create-reports_table', 1),
(6, '2020_01_04_123532_create-drivers_table', 2),
(7, '2020_01_03_195810_create_driver_report_table', 3),
(8, '2020_01_03_193638_create_accidents_table', 4),
(9, '2020_02_08_142618_create_premium_table', 5),
(10, '2020_02_08_143217_create_territory_table', 5),
(11, '2020_02_08_143449_create_car_rate_groups_table', 5),
(12, '2020_02_08_143933_create_groups_factors_table', 5),
(13, '2020_02_08_144817_create_class_factors_table', 5),
(14, '2020_02_08_145443_create_collisions_table', 5),
(15, '2020_02_08_150026_create_comprehensives_table', 5),
(16, '2020_02_08_150202_create_liabilitiys_table', 5),
(17, '2020_02_08_150818_create_deductibles_table', 5),
(18, '2020_02_08_152300_add_reocrds_to_users', 6),
(19, '2020_02_08_152601_create_dealears_table', 7),
(20, '2020_02_08_155222_add_reocrds_to_reports', 8);

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
-- Table structure for table `premiums`
--

CREATE TABLE `premiums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `effect_date` year(4) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `premium_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premiums`
--

INSERT INTO `premiums` (`id`, `effect_date`, `notes`, `created_at`, `updated_at`, `premium_id`) VALUES
(1, 2005, 'asasas', NULL, NULL, 27),
(11, 2005, 'adaadad', NULL, NULL, 11),
(13, 2010, 'asaas', NULL, NULL, 13),
(14, 2005, 'adaasad', NULL, NULL, 14),
(15, 2020, '2020 years', NULL, NULL, 15),
(16, 2010, 'assaas', NULL, NULL, 16),
(17, 2005, '2qwqwqw', NULL, NULL, 18),
(18, 2020, 'assasa', NULL, NULL, 18),
(19, 2010, 'sasasasas', NULL, NULL, 19),
(22, 2020, '2020 notes', NULL, NULL, 22),
(23, 2005, 'assaas', NULL, NULL, 23),
(25, 2010, 'dadadad', NULL, NULL, 25),
(27, 2020, 'asassaas', NULL, NULL, 27),
(29, 2010, '2010asas', NULL, NULL, 29),
(32, 2020, 'asssa', NULL, NULL, 32);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planned_driving_distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planned_goods` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_truck_stop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_compnay_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard_coverage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gap_insurance` tinyint(1) NOT NULL,
  `health_insurance` tinyint(1) NOT NULL,
  `hospitalize_cash_covrage` tinyint(1) NOT NULL,
  `bussiness_liabilty` tinyint(1) NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finance_advisor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finance_advisor_emial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_expried_date` datetime NOT NULL,
  `dealer_id` bigint(20) UNSIGNED NOT NULL,
  `activate_at` datetime DEFAULT NULL,
  `client_verify` tinyint(1) NOT NULL DEFAULT 0,
  `advisor_verify` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `address`, `phone`, `email`, `planned_driving_distance`, `planned_goods`, `location_truck_stop`, `purchase_type`, `purchase_compnay_name`, `purchase_company_address`, `standard_coverage`, `cargo_value`, `gap_insurance`, `health_insurance`, `hospitalize_cash_covrage`, `bussiness_liabilty`, `truck_id`, `created_at`, `updated_at`, `finance_advisor`, `finance_advisor_emial`, `access_token`, `token_expried_date`, `dealer_id`, `activate_at`, `client_verify`, `advisor_verify`) VALUES
(141, 'test', 'test', '123456789', 'test4buss@gmail.com', '79', 'gasoline', 'mqamam', 'financed', 'KAKKA', 'KLAKAKK', 'Package of standard 1m/1k/1k', '12', 1, 1, 1, 1, 144, '2020-02-08 17:13:02', '2020-02-08 17:13:02', 'hah', 'test4buss@gmail.com', '354d87b4e42c394a8b2cf66bc75372540b11ecfb', '2020-02-09 22:02:02', 1, NULL, 0, 0),
(142, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '333', 1, 1, 1, 1, 145, '2020-02-08 17:17:03', '2020-02-08 17:17:03', 'shshsh', 'test4buss@gmail.com', '0e072e56e261e31c55cbbd02956e6783c5216a08', '2020-02-09 22:02:03', 1, NULL, 0, 0),
(143, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '333', 1, 1, 1, 1, 146, '2020-02-08 17:17:45', '2020-02-08 17:17:45', 'shshsh', 'test4buss@gmail.com', '6955713d27650929a6ed16dbe0ea71b69c764a7b', '2020-02-09 22:02:45', 1, NULL, 0, 0),
(144, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '333', 1, 1, 1, 1, 147, '2020-02-08 17:19:21', '2020-02-08 17:19:21', 'shshsh', 'test4buss@gmail.com', 'a9a9d55399fbc95b1a5d49b9d78bd8bc7e28510b', '2020-02-09 22:02:21', 1, NULL, 0, 0),
(145, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '333', 1, 1, 1, 1, 148, '2020-02-08 17:19:50', '2020-02-08 17:19:50', 'shshsh', 'test4buss@gmail.com', '257c82efc00a93679582a40683dca2ea0ffb7182', '2020-02-09 22:02:50', 1, NULL, 0, 0),
(146, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '333', 1, 1, 1, 1, 149, '2020-02-08 17:20:30', '2020-02-08 17:20:30', 'shshsh', 'test4buss@gmail.com', '4f0adc81d8af2e66517d5f1912604317c1abcdd7', '2020-02-09 22:02:30', 1, NULL, 0, 0),
(147, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '0', 1, 1, 1, 1, 150, '2020-02-08 17:20:39', '2020-02-08 17:20:39', 'shshsh', 'test4buss@gmail.com', '64b342a2adc2aa9c1cb30ec5211f118c20c69824', '2020-02-09 22:02:39', 1, NULL, 0, 0),
(148, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '0', 1, 1, 1, 1, 151, '2020-02-08 17:21:22', '2020-02-08 17:21:22', 'shshsh', 'test4buss@gmail.com', 'ae0f51e5fab66f66b0e5d7189481126041aeb671', '2020-02-09 22:02:22', 1, NULL, 0, 0),
(149, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '0', 1, 1, 1, 1, 152, '2020-02-08 17:23:08', '2020-02-08 17:23:08', 'shshsh', 'test4buss@gmail.com', '450957abb05a2dbde7d16ab0f1687ca2c147fc32', '2020-02-09 22:02:08', 1, NULL, 0, 0),
(150, 'AAAS', 'LWLLA', 'HSHSH', 'test4buss@gmail.com', '39', 'gasoline', 'KAKAKK', 'financed', 'JAJAJ', 'JAJJA', 'Package of standard 1m/1k/1k', '0', 1, 1, 1, 1, 153, '2020-02-08 17:23:37', '2020-02-08 17:23:37', 'shshsh', 'test4buss@gmail.com', '728c1388c22905537989f953939a6767c3b55d40', '2020-02-09 22:02:37', 1, NULL, 0, 0),
(151, 'hahah', 'hahhah', 'ahahha', 'test4buss@gmail.com', '39', 'Flamable', 'kqkqk', 'financed', 'llalal', 'lalal', 'Package of standard 1m/1k/1k', '12', 1, 1, 1, 1, 154, '2020-02-08 17:27:58', '2020-02-08 17:27:58', 'akakak', 'zirgham.abbas2015@gmail.com', 'c54d4402f96bdca607b2ec11889b230ac96c5dd0', '2020-02-09 22:02:58', 1, NULL, 0, 0),
(152, 'hahah', 'hahhah', 'haahha', 'test4buss@gmail.com', '79', 'Flamable', 'kakak', 'financed', 'kskak', 'kskak', 'Package of standard 1m/1k/1k', '123', 1, 1, 1, 1, 155, '2020-02-08 17:35:22', '2020-02-08 17:35:22', 'shshsh', 'jajja', '8d173955754425362a9d3c71dae3a9b82182b239', '2020-02-09 22:02:22', 1, NULL, 0, 0),
(153, 'jaaj', 'jajaj', 'jajaj', 'test4buss@gmail.com', '79', 'Flamable', 'lllslslq', 'financed', 'alala', 'alala', 'Package of standard 1m/1k/1k', '11', 1, 1, 1, 1, 156, '2020-02-08 17:43:31', '2020-02-08 17:43:31', 'jaja', 'zirgham.abbas2015@gmail.com', 'b8fdf77d97fc2d47873a22cafd55a493304caeeb', '2020-02-09 22:02:31', 1, NULL, 0, 0),
(154, 'jajaj', 'jajjaj', 'jajajj', 'jajaj', '79', 'Flamable', 'lalal', 'lease', 'akak', 'akkakak', 'premium 2m/500/500', '12', 1, 1, 1, 1, 157, '2020-02-08 17:56:26', '2020-02-08 17:56:26', 'jajaj', 'jajajja', 'fedd2032e711fbd62e31fef913cb22570532e3af', '2020-02-09 22:02:26', 1, NULL, 0, 0),
(155, 'jajaj', 'jajjaj', 'jajajj', 'test4buss@gmail.com', '79', 'Flamable', 'lalal', 'lease', 'akak', 'akkakak', 'premium 2m/500/500', '0', 1, 1, 1, 1, 158, '2020-02-08 17:57:27', '2020-02-08 17:57:27', 'jajaj', 'zirgham.abbas2015@gmail.com', '27a07c9e689cd39e730baf4d23ab5b865fa350df', '2020-02-09 22:02:27', 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `territorys`
--

CREATE TABLE `territorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `territorys`
--

INSERT INTO `territorys` (`id`, `name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'new york', 'new york,new,city', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truck_made_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truck_brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truck_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_purchase` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `truck_made_year`, `truck_brand_name`, `truck_model`, `cost_purchase`, `date_of_purchase`, `created_at`, `updated_at`) VALUES
(1, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 07:53:02', '2020-01-04 07:53:02'),
(2, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:03:15', '2020-01-04 08:03:15'),
(3, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:04:03', '2020-01-04 08:04:03'),
(4, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:04:58', '2020-01-04 08:04:58'),
(5, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:07:10', '2020-01-04 08:07:10'),
(6, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:08:20', '2020-01-04 08:08:20'),
(7, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:08:42', '2020-01-04 08:08:42'),
(8, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:09:32', '2020-01-04 08:09:32'),
(9, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:10:32', '2020-01-04 08:10:32'),
(10, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:11:02', '2020-01-04 08:11:02'),
(11, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:12:00', '2020-01-04 08:12:00'),
(12, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:13:09', '2020-01-04 08:13:09'),
(13, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:15:03', '2020-01-04 08:15:03'),
(14, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:18:03', '2020-01-04 08:18:03'),
(15, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:20:41', '2020-01-04 08:20:41'),
(16, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:21:04', '2020-01-04 08:21:04'),
(17, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:25:07', '2020-01-04 08:25:07'),
(18, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:26:16', '2020-01-04 08:26:16'),
(19, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 08:28:56', '2020-01-04 08:28:56'),
(20, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:01:42', '2020-01-04 09:01:42'),
(21, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:04:18', '2020-01-04 09:04:18'),
(22, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:06:33', '2020-01-04 09:06:33'),
(23, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:07:20', '2020-01-04 09:07:20'),
(24, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:09:22', '2020-01-04 09:09:22'),
(25, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:12:38', '2020-01-04 09:12:38'),
(26, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:14:50', '2020-01-04 09:14:50'),
(27, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:17:39', '2020-01-04 09:17:39'),
(28, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:18:43', '2020-01-04 09:18:43'),
(29, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:20:42', '2020-01-04 09:20:42'),
(30, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:21:55', '2020-01-04 09:21:55'),
(31, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:24:03', '2020-01-04 09:24:03'),
(32, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:37:30', '2020-01-04 09:37:30'),
(33, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:37:58', '2020-01-04 09:37:58'),
(34, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:38:22', '2020-01-04 09:38:22'),
(35, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:38:40', '2020-01-04 09:38:40'),
(36, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:40:37', '2020-01-04 09:40:37'),
(37, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:41:42', '2020-01-04 09:41:42'),
(38, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:42:18', '2020-01-04 09:42:18'),
(39, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:49:21', '2020-01-04 09:49:21'),
(40, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:50:46', '2020-01-04 09:50:46'),
(41, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:52:31', '2020-01-04 09:52:31'),
(42, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:52:49', '2020-01-04 09:52:49'),
(43, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:54:01', '2020-01-04 09:54:01'),
(44, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 09:57:12', '2020-01-04 09:57:12'),
(45, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:01:52', '2020-01-04 10:01:52'),
(46, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:03:36', '2020-01-04 10:03:36'),
(47, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:04:04', '2020-01-04 10:04:04'),
(48, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:06:54', '2020-01-04 10:06:54'),
(49, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:10:55', '2020-01-04 10:10:55'),
(50, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:12:06', '2020-01-04 10:12:06'),
(51, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:14:09', '2020-01-04 10:14:09'),
(52, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:14:40', '2020-01-04 10:14:40'),
(53, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:14:52', '2020-01-04 10:14:52'),
(54, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:15:01', '2020-01-04 10:15:01'),
(55, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:15:10', '2020-01-04 10:15:10'),
(56, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:17:55', '2020-01-04 10:17:55'),
(57, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:18:17', '2020-01-04 10:18:17'),
(58, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:21:26', '2020-01-04 10:21:26'),
(59, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:21:53', '2020-01-04 10:21:53'),
(60, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:22:35', '2020-01-04 10:22:35'),
(61, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:29:38', '2020-01-04 10:29:38'),
(62, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:32:13', '2020-01-04 10:32:13'),
(63, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:36:40', '2020-01-04 10:36:40'),
(64, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:37:07', '2020-01-04 10:37:07'),
(65, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:39:02', '2020-01-04 10:39:02'),
(66, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:42:58', '2020-01-04 10:42:58'),
(67, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:43:23', '2020-01-04 10:43:23'),
(68, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:44:07', '2020-01-04 10:44:07'),
(69, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:44:53', '2020-01-04 10:44:53'),
(70, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:45:22', '2020-01-04 10:45:22'),
(71, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:45:38', '2020-01-04 10:45:38'),
(72, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:46:10', '2020-01-04 10:46:10'),
(73, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:46:30', '2020-01-04 10:46:30'),
(74, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:48:46', '2020-01-04 10:48:46'),
(75, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:49:33', '2020-01-04 10:49:33'),
(76, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:50:07', '2020-01-04 10:50:07'),
(77, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:50:25', '2020-01-04 10:50:25'),
(78, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:51:06', '2020-01-04 10:51:06'),
(79, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:51:32', '2020-01-04 10:51:32'),
(80, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:53:17', '2020-01-04 10:53:17'),
(81, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:53:52', '2020-01-04 10:53:52'),
(82, '2010', 'asadadad', 'dzsfgasfaf', '100', '2020-01-17', '2020-01-04 10:54:13', '2020-01-04 10:54:13'),
(83, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 10:55:48', '2020-01-04 10:55:48'),
(84, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 10:57:30', '2020-01-04 10:57:30'),
(85, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 10:58:01', '2020-01-04 10:58:01'),
(86, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 10:58:38', '2020-01-04 10:58:38'),
(87, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:07:07', '2020-01-04 11:07:07'),
(88, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:07:37', '2020-01-04 11:07:37'),
(89, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:08:57', '2020-01-04 11:08:57'),
(90, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:09:18', '2020-01-04 11:09:18'),
(91, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:09:53', '2020-01-04 11:09:53'),
(92, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:10:25', '2020-01-04 11:10:25'),
(93, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:11:15', '2020-01-04 11:11:15'),
(94, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:12:20', '2020-01-04 11:12:20'),
(95, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:12:42', '2020-01-04 11:12:42'),
(96, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:13:51', '2020-01-04 11:13:51'),
(97, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:14:22', '2020-01-04 11:14:22'),
(98, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:14:43', '2020-01-04 11:14:43'),
(99, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:14:56', '2020-01-04 11:14:56'),
(100, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:15:38', '2020-01-04 11:15:38'),
(101, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:16:03', '2020-01-04 11:16:03'),
(102, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:16:29', '2020-01-04 11:16:29'),
(103, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:17:00', '2020-01-04 11:17:00'),
(104, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:17:28', '2020-01-04 11:17:28'),
(105, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:18:41', '2020-01-04 11:18:41'),
(106, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:19:45', '2020-01-04 11:19:45'),
(107, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:20:35', '2020-01-04 11:20:35'),
(108, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:21:08', '2020-01-04 11:21:08'),
(109, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:21:44', '2020-01-04 11:21:44'),
(110, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:22:13', '2020-01-04 11:22:13'),
(111, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:22:36', '2020-01-04 11:22:36'),
(112, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:23:02', '2020-01-04 11:23:02'),
(113, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:23:29', '2020-01-04 11:23:29'),
(114, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:24:07', '2020-01-04 11:24:07'),
(115, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:24:42', '2020-01-04 11:24:42'),
(116, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:25:31', '2020-01-04 11:25:31'),
(117, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:26:13', '2020-01-04 11:26:13'),
(118, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:29:04', '2020-01-04 11:29:04'),
(119, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:30:00', '2020-01-04 11:30:00'),
(120, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:30:11', '2020-01-04 11:30:11'),
(121, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:31:19', '2020-01-04 11:31:19'),
(122, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:32:10', '2020-01-04 11:32:10'),
(123, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:33:43', '2020-01-04 11:33:43'),
(124, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:36:08', '2020-01-04 11:36:08'),
(125, '2020', 'adasassS', 'ssSS', '100', '2020-01-10', '2020-01-04 11:36:36', '2020-01-04 11:36:36'),
(126, '2005', 'SD MDMD', 'ADMDM', '50', '2020-01-10', '2020-01-04 12:34:15', '2020-01-04 12:34:15'),
(127, '2005', 'SD MDMD', 'ADMDM', '50', '2020-01-10', '2020-01-04 12:37:38', '2020-01-04 12:37:38'),
(128, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:41:04', '2020-02-08 16:41:04'),
(129, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:42:04', '2020-02-08 16:42:04'),
(130, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:42:41', '2020-02-08 16:42:41'),
(131, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:43:10', '2020-02-08 16:43:10'),
(132, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:44:41', '2020-02-08 16:44:41'),
(133, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:45:07', '2020-02-08 16:45:07'),
(134, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:45:55', '2020-02-08 16:45:55'),
(135, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:46:37', '2020-02-08 16:46:37'),
(136, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:46:55', '2020-02-08 16:46:55'),
(137, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:48:13', '2020-02-08 16:48:13'),
(138, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:49:13', '2020-02-08 16:49:13'),
(139, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:51:02', '2020-02-08 16:51:02'),
(140, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:51:17', '2020-02-08 16:51:17'),
(141, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:51:46', '2020-02-08 16:51:46'),
(142, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:52:12', '2020-02-08 16:52:12'),
(143, '2010', 'test-brand-truck', '2010', '1', '2020-02-09', '2020-02-08 16:58:16', '2020-02-08 16:58:16'),
(144, '2020', 'qkqkqk', '2010', '4', '2020-02-10', '2020-02-08 17:13:02', '2020-02-08 17:13:02'),
(145, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:17:03', '2020-02-08 17:17:03'),
(146, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:17:45', '2020-02-08 17:17:45'),
(147, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:19:21', '2020-02-08 17:19:21'),
(148, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:19:50', '2020-02-08 17:19:50'),
(149, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:20:30', '2020-02-08 17:20:30'),
(150, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:20:39', '2020-02-08 17:20:39'),
(151, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:21:22', '2020-02-08 17:21:22'),
(152, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:23:08', '2020-02-08 17:23:08'),
(153, '2010', 'lallal', '2010', '1', '2020-01-01', '2020-02-08 17:23:37', '2020-02-08 17:23:37'),
(154, '2020', 'akka', '2020', '1', '2020-01-01', '2020-02-08 17:27:58', '2020-02-08 17:27:58'),
(155, '2020', 'lalal', '2020', '1', '2020-02-09', '2020-02-08 17:35:22', '2020-02-08 17:35:22'),
(156, '2020', 'kskskq', '2010', '2', '2020-01-01', '2020-02-08 17:43:31', '2020-02-08 17:43:31'),
(157, '2020', 'akak', '2010', '1', '2020-01-01', '2020-02-08 17:56:26', '2020-02-08 17:56:26'),
(158, '2020', 'akak', '2010', '1', '2020-01-01', '2020-02-08 17:57:27', '2020-02-08 17:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidents`
--
ALTER TABLE `accidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accidents_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `car_rate_groups`
--
ALTER TABLE `car_rate_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_factors`
--
ALTER TABLE `class_factors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collisions`
--
ALTER TABLE `collisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collisions_territory_id_foreign` (`territory_id`),
  ADD KEY `collisions_group_factor_id_foreign` (`group_factor_id`),
  ADD KEY `collisions_premium_id_foreign` (`premium_id`);

--
-- Indexes for table `comprehensives`
--
ALTER TABLE `comprehensives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comprehensives_territory_id_foreign` (`territory_id`),
  ADD KEY `comprehensives_group_factor_id_foreign` (`group_factor_id`),
  ADD KEY `comprehensives_premium_id_foreign` (`premium_id`);

--
-- Indexes for table `dealears`
--
ALTER TABLE `dealears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductibles`
--
ALTER TABLE `deductibles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_truck_id_foreign` (`truck_id`),
  ADD KEY `drivers_report_id_foreign` (`report_id`);

--
-- Indexes for table `driver_report`
--
ALTER TABLE `driver_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_report_driver_id_foreign` (`driver_id`),
  ADD KEY `driver_report_report_id_foreign` (`report_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_factors`
--
ALTER TABLE `groups_factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_factors_car_rate_group_id_foreign` (`car_rate_group_id`);

--
-- Indexes for table `liabilitiys`
--
ALTER TABLE `liabilitiys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liabilitiys_territory_id_foreign` (`territory_id`),
  ADD KEY `liabilitiys_class_factor_id_foreign` (`class_factor_id`),
  ADD KEY `liabilitiys_premium_id_foreign` (`premium_id`);

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
-- Indexes for table `premiums`
--
ALTER TABLE `premiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_truck_id_foreign` (`truck_id`),
  ADD KEY `reports_dealer_id_foreign` (`dealer_id`);

--
-- Indexes for table `territorys`
--
ALTER TABLE `territorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_rate_groups`
--
ALTER TABLE `car_rate_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_factors`
--
ALTER TABLE `class_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `collisions`
--
ALTER TABLE `collisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comprehensives`
--
ALTER TABLE `comprehensives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dealears`
--
ALTER TABLE `dealears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deductibles`
--
ALTER TABLE `deductibles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `driver_report`
--
ALTER TABLE `driver_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups_factors`
--
ALTER TABLE `groups_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `liabilitiys`
--
ALTER TABLE `liabilitiys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `territorys`
--
ALTER TABLE `territorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accidents`
--
ALTER TABLE `accidents`
  ADD CONSTRAINT `accidents_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `collisions`
--
ALTER TABLE `collisions`
  ADD CONSTRAINT `collisions_group_factor_id_foreign` FOREIGN KEY (`group_factor_id`) REFERENCES `groups_factors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `collisions_premium_id_foreign` FOREIGN KEY (`premium_id`) REFERENCES `premiums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `collisions_territory_id_foreign` FOREIGN KEY (`territory_id`) REFERENCES `territorys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comprehensives`
--
ALTER TABLE `comprehensives`
  ADD CONSTRAINT `comprehensives_group_factor_id_foreign` FOREIGN KEY (`group_factor_id`) REFERENCES `groups_factors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comprehensives_premium_id_foreign` FOREIGN KEY (`premium_id`) REFERENCES `premiums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comprehensives_territory_id_foreign` FOREIGN KEY (`territory_id`) REFERENCES `territorys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drivers_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_report`
--
ALTER TABLE `driver_report`
  ADD CONSTRAINT `driver_report_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `driver_report_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups_factors`
--
ALTER TABLE `groups_factors`
  ADD CONSTRAINT `groups_factors_car_rate_group_id_foreign` FOREIGN KEY (`car_rate_group_id`) REFERENCES `car_rate_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `liabilitiys`
--
ALTER TABLE `liabilitiys`
  ADD CONSTRAINT `liabilitiys_class_factor_id_foreign` FOREIGN KEY (`class_factor_id`) REFERENCES `class_factors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `liabilitiys_premium_id_foreign` FOREIGN KEY (`premium_id`) REFERENCES `premiums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `liabilitiys_territory_id_foreign` FOREIGN KEY (`territory_id`) REFERENCES `territorys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_dealer_id_foreign` FOREIGN KEY (`dealer_id`) REFERENCES `dealears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
