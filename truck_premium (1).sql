-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 05:00 PM
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

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`id`, `type`, `date`, `driver_id`, `created_at`, `updated_at`) VALUES
(57, 'accident', '2020-02-02', 170, NULL, NULL),
(58, 'accident', '2020-02-03', 170, NULL, NULL),
(59, 'conviction', '2020-02-04', 170, NULL, NULL),
(60, 'conviction', '2020-02-05', 170, NULL, NULL),
(61, 'accident', '2020-02-07', 171, NULL, NULL),
(62, 'accident', '2020-02-08', 171, NULL, NULL),
(63, 'conviction', '2020-02-01', 171, NULL, NULL),
(64, 'conviction', '2020-02-02', 171, NULL, NULL);

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
  `min_radius` int(11) NOT NULL,
  `max_radius` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_factors`
--

INSERT INTO `class_factors` (`id`, `radius`, `min_radius`, `max_radius`, `class`, `notes`, `created_at`, `updated_at`) VALUES
(1, '39', 1, 39, 46, 'less then 40 killometers', NULL, NULL),
(2, '79', 40, 79, 49, 'greater 40 kilometers and less 80 kilometers', NULL, NULL),
(5, '161', 80, 1000000, 62, 'greater then 161 kilometers', NULL, NULL);

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
(18, 1, 4, 5181, 1, NULL, NULL),
(19, 1, 5, 7445, 2, NULL, NULL),
(20, 1, 6, 9305, 2, NULL, NULL),
(21, 1, 7, 10606, 1, NULL, NULL),
(22, 1, 8, 11139, 2, NULL, NULL),
(23, 1, 9, 6865, 2, NULL, NULL),
(24, 1, 10, 8466, 1, NULL, NULL),
(25, 1, 11, 9647, 2, NULL, NULL),
(26, 1, 12, 11030, 2, NULL, NULL),
(27, 1, 13, 11326, 1, NULL, NULL),
(28, 1, 14, 7968, 2, NULL, NULL),
(29, 1, 15, 10424, 2, NULL, NULL),
(30, 1, 16, 11139, 2, NULL, NULL),
(31, 1, 17, 11543, 2, NULL, NULL),
(32, 1, 18, 9305, 2, NULL, NULL);

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
(1, 1, 4, 612, 1, NULL, NULL),
(2, 1, 5, 870, 2, NULL, NULL),
(3, 1, 6, 1149, 2, NULL, NULL),
(4, 1, 7, 1368, 1, NULL, NULL),
(5, 1, 8, 1457, 2, NULL, NULL),
(6, 1, 9, 788, 2, NULL, NULL),
(7, 1, 10, 1019, 1, NULL, NULL),
(8, 1, 11, 1206, 3, NULL, NULL),
(9, 1, 12, 1439, 3, NULL, NULL),
(10, 1, 13, 1489, 1, NULL, NULL),
(11, 1, 14, 945, 2, NULL, NULL),
(12, 1, 15, 1336, 2, NULL, NULL),
(13, 1, 16, 1457, 2, NULL, NULL),
(14, 1, 17, 1526, 2, NULL, NULL),
(15, 1, 18, 1149, 2, NULL, NULL);

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
  `report_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `coll` double NOT NULL,
  `comp` double NOT NULL,
  `sp` double DEFAULT NULL,
  `lia` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deductibles`
--

INSERT INTO `deductibles` (`id`, `report_id`, `amount`, `coll`, `comp`, `sp`, `lia`, `created_at`, `updated_at`) VALUES
(5, 10, 16550, 9305, 1149, NULL, 6049, '2020-02-25 10:22:59', '2020-02-25 10:22:59'),
(6, 11, 16550, 9305, 1149, NULL, 6049, '2020-02-25 10:34:41', '2020-02-25 10:34:41'),
(7, 12, 18070, 10606, 1368, NULL, 6049, '2020-02-25 14:47:12', '2020-02-25 14:47:12');

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
(170, 'driver1name update', 'driver2nameupdate', 'driver1classupdate', '2020-02-01', 169, 10, '2020-02-25 05:22:59', '2020-02-25 05:29:00'),
(171, 'driver2name', 'driver2licenceupdate', 'driver2classupdate', '2020-02-06', 169, 10, '2020-02-25 05:22:59', '2020-02-25 05:29:00'),
(172, 'web1 dev', 'aaassas', 'adadadad', '2020-02-07', 170, 11, '2020-02-25 05:34:41', '2020-02-25 05:39:15'),
(173, 'web1 dev', 'asasassa', 'adadadad', '2020-02-01', 171, 12, '2020-02-25 09:47:12', '2020-02-25 09:55:23');

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
(165, 165, 7, NULL, NULL),
(166, 166, 7, NULL, NULL),
(167, 167, 8, NULL, NULL),
(168, 168, 9, NULL, NULL),
(169, 169, 9, NULL, NULL),
(170, 170, 10, NULL, NULL),
(171, 171, 10, NULL, NULL),
(172, 172, 11, NULL, NULL),
(173, 173, 12, NULL, NULL);

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

--
-- Dumping data for table `liabilitiys`
--

INSERT INTO `liabilitiys` (`id`, `territory_id`, `class_factor_id`, `premium_id`, `is_danger`, `liability_price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 1, 6049, '2020-02-23 19:00:00', '2020-02-23 19:00:00');

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
  `effect_date` date DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premiums`
--

INSERT INTO `premiums` (`id`, `effect_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, '2020-02-01', 'Feb 2020 Effect rates', NULL, NULL);

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
  `user_id` int(11) DEFAULT NULL,
  `activate_at` datetime DEFAULT NULL,
  `client_verify` tinyint(1) NOT NULL DEFAULT 0,
  `advisor_verify` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `address`, `phone`, `email`, `planned_driving_distance`, `planned_goods`, `location_truck_stop`, `purchase_type`, `purchase_compnay_name`, `purchase_company_address`, `standard_coverage`, `cargo_value`, `gap_insurance`, `health_insurance`, `hospitalize_cash_covrage`, `bussiness_liabilty`, `truck_id`, `created_at`, `updated_at`, `finance_advisor`, `finance_advisor_emial`, `access_token`, `token_expried_date`, `dealer_id`, `user_id`, `activate_at`, `client_verify`, `advisor_verify`) VALUES
(10, 'company name', 'compnay address', '123456780', 'zirgham.abbas2015@gmail.com', '200', 'gasoline', 'new york', 'financed', 'finace compnay name', 'finace compnay adress', 'high deductible 1m/5k/5k', '123', 1, 1, 1, 1, 169, '2020-02-25 05:22:59', '2020-02-25 05:29:00', 'jhon', 'test4buss@gmail.com', '798e8873103ab9784b59c7e05fdd79b92045e032', '2020-02-26 10:02:00', 1, 1, NULL, 1, 1),
(11, 'web1 dev', 'abcd', '1111111111', 'zirgham.abbas2015@gmail.com', '100', 'gasoline', 'new york', 'lease', 'finace compnay name', 'asssa', 'Package of standard 1m/1k/1k', '111', 1, 1, 1, 1, 170, '2020-02-25 05:34:41', '2020-02-25 05:39:15', 'jhon', 'test4buss@gmail.com', 'c12b166ebc08b14f0d63dedbd23870c901d3c609', '2020-02-26 10:02:15', 2, 1, NULL, 1, 1),
(12, 'web1 dev', 'abcd', '1111111111', 'test4buss@gmail.com', '166', 'Flamable', 'new york', 'financed', 'dddddd', 'dddddd', 'Package of standard 1m/1k/1k', '123', 1, 1, 1, 1, 171, '2020-02-25 09:47:12', '2020-02-25 09:55:23', 'jhon', 'test4buss@gmail.com', 'f0944e793157f57f32555f5ca7c2a048f4477829', '2020-02-26 14:02:23', 2, 1, NULL, 0, 0);

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
  `truck_effective_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `truck_made_year`, `truck_brand_name`, `truck_model`, `cost_purchase`, `date_of_purchase`, `truck_effective_date`, `created_at`, `updated_at`) VALUES
(169, '2005', 'Honda', '2010', '1', '2020-02-13', '2020-02-28', '2020-02-25 05:22:59', '2020-02-25 05:25:53'),
(170, '2020', 'toyota', '2010', '1', '2020-02-14', '2020-02-20', '2020-02-25 05:34:41', '2020-02-25 05:34:41'),
(171, '2010', 'asadadad', 'dzsfgasfaf', '4', '2020-02-07', '2020-02-01', '2020-02-25 09:47:12', '2020-02-25 09:47:12');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `token`, `expire_date`) VALUES
(1, 'jhon', 'test4buss@gmail.com', '2020-01-31 19:00:00', 'test123', 'janabvafaffafa', '2020-01-31 19:00:00', '2020-01-31 19:00:00', 'nabnavacaddadaa', '2020-03-05 00:00:00');

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
  ADD KEY `password_resets_email_index` (`email`(191));

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `driver_report`
--
ALTER TABLE `driver_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `premiums`
--
ALTER TABLE `premiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `territorys`
--
ALTER TABLE `territorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
