-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 08:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manageadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countrycode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryname`, `countrycode`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(2, 'Åland Islands', 'AX', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(3, 'Albania', 'AL', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(4, 'Algeria', 'DZ', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(5, 'American Samoa', 'AS', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(6, 'Andorra', 'AD', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(7, 'Angola', 'AO', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(8, 'Anguilla', 'AI', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(9, 'Antarctica', 'AQ', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(10, 'Antigua and Barbuda', 'AG', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(11, 'Argentina', 'AR', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(12, 'Armenia', 'AM', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(13, 'Aruba', 'AW', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(14, 'Australia', 'AU', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(15, 'Austria', 'AT', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(16, 'Azerbaijan', 'AZ', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(17, 'Bahamas', 'BS', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(18, 'Bahrain', 'BH', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(19, 'Bangladesh', 'BD', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(20, 'Barbados', 'BB', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(21, 'Belarus', 'BY', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(22, 'Belgium', 'BE', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(23, 'Belize', 'BZ', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(24, 'Benin', 'BJ', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(25, 'Bermuda', 'BM', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(26, 'Bhutan', 'BT', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(27, 'Bolivia, Plurinational State of', 'BO', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(29, 'Bosnia and Herzegovina', 'BA', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(30, 'Botswana', 'BW', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(31, 'Bouvet Island', 'BV', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(32, 'Brazil', 'BR', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(33, 'British Indian Ocean Territory', 'IO', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(34, 'Brunei Darussalam', 'BN', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(35, 'Bulgaria', 'BG', '2023-03-28 17:31:28', '2023-03-28 17:31:28'),
(36, 'Burkina Faso', 'BF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(37, 'Burundi', 'BI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(38, 'Cambodia', 'KH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(39, 'Cameroon', 'CM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(40, 'Canada', 'CA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(41, 'Cape Verde', 'CV', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(42, 'Cayman Islands', 'KY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(43, 'Central African Republic', 'CF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(44, 'Chad', 'TD', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(45, 'Chile', 'CL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(46, 'China', 'CN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(47, 'Christmas Island', 'CX', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(48, 'Cocos (Keeling) Islands', 'CC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(49, 'Colombia', 'CO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(50, 'Comoros', 'KM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(51, 'Congo', 'CG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(52, 'Congo, the Democratic Republic of the', 'CD', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(53, 'Cook Islands', 'CK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(54, 'Costa Rica', 'CR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(55, 'Côte d\'Ivoire', 'CI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(56, 'Croatia', 'HR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(57, 'Cuba', 'CU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(58, 'Curaçao', 'CW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(59, 'Cyprus', 'CY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(60, 'Czech Republic', 'CZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(61, 'Denmark', 'DK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(62, 'Djibouti', 'DJ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(63, 'Dominica', 'DM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(64, 'Dominican Republic', 'DO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(65, 'Ecuador', 'EC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(66, 'Egypt', 'EG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(67, 'El Salvador', 'SV', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(68, 'Equatorial Guinea', 'GQ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(69, 'Eritrea', 'ER', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(70, 'Estonia', 'EE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(71, 'Ethiopia', 'ET', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(72, 'Falkland Islands (Malvinas)', 'FK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(73, 'Faroe Islands', 'FO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(74, 'Fiji', 'FJ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(75, 'Finland', 'FI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(76, 'France', 'FR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(77, 'French Guiana', 'GF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(78, 'French Polynesia', 'PF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(79, 'French Southern Territories', 'TF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(80, 'Gabon', 'GA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(81, 'Gambia', 'GM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(82, 'Georgia', 'GE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(83, 'Germany', 'DE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(84, 'Ghana', 'GH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(85, 'Gibraltar', 'GI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(86, 'Greece', 'GR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(87, 'Greenland', 'GL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(88, 'Grenada', 'GD', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(89, 'Guadeloupe', 'GP', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(90, 'Guam', 'GU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(91, 'Guatemala', 'GT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(92, 'Guernsey', 'GG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(93, 'Guinea', 'GN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(94, 'Guinea-Bissau', 'GW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(95, 'Guyana', 'GY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(96, 'Haiti', 'HT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(97, 'Heard Island and McDonald Mcdonald Islands', 'HM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(98, 'Holy See (Vatican City State)', 'VA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(99, 'Honduras', 'HN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(100, 'Hong Kong', 'HK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(101, 'Hungary', 'HU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(102, 'Iceland', 'IS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(103, 'India', 'IN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(104, 'Indonesia', 'ID', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(105, 'Iran, Islamic Republic of', 'IR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(106, 'Iraq', 'IQ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(107, 'Ireland', 'IE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(108, 'Isle of Man', 'IM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(109, 'Israel', 'IL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(110, 'Italy', 'IT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(111, 'Jamaica', 'JM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(112, 'Japan', 'JP', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(113, 'Jersey', 'JE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(114, 'Jordan', 'JO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(115, 'Kazakhstan', 'KZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(116, 'Kenya', 'KE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(117, 'Kiribati', 'KI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(118, 'Korea, Democratic People\'s Republic of', 'KP', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(119, 'Korea, Republic of', 'KR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(120, 'Kuwait', 'KW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(121, 'Kyrgyzstan', 'KG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(122, 'Lao People\'s Democratic Republic', 'LA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(123, 'Latvia', 'LV', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(124, 'Lebanon', 'LB', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(125, 'Lesotho', 'LS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(126, 'Liberia', 'LR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(127, 'Libya', 'LY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(128, 'Liechtenstein', 'LI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(129, 'Lithuania', 'LT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(130, 'Luxembourg', 'LU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(131, 'Macao', 'MO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(132, 'Macedonia, the Former Yugoslav Republic of', 'MK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(133, 'Madagascar', 'MG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(134, 'Malawi', 'MW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(135, 'Malaysia', 'MY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(136, 'Maldives', 'MV', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(137, 'Mali', 'ML', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(138, 'Malta', 'MT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(139, 'Marshall Islands', 'MH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(140, 'Martinique', 'MQ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(141, 'Mauritania', 'MR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(142, 'Mauritius', 'MU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(143, 'Mayotte', 'YT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(144, 'Mexico', 'MX', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(145, 'Micronesia, Federated States of', 'FM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(146, 'Moldova, Republic of', 'MD', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(147, 'Monaco', 'MC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(148, 'Mongolia', 'MN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(149, 'Montenegro', 'ME', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(150, 'Montserrat', 'MS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(151, 'Morocco', 'MA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(152, 'Mozambique', 'MZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(153, 'Myanmar', 'MM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(154, 'Namibia', 'NA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(155, 'Nauru', 'NR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(156, 'Nepal', 'NP', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(157, 'Netherlands', 'NL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(158, 'New Caledonia', 'NC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(159, 'New Zealand', 'NZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(160, 'Nicaragua', 'NI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(161, 'Niger', 'NE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(162, 'Nigeria', 'NG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(163, 'Niue', 'NU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(164, 'Norfolk Island', 'NF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(165, 'Northern Mariana Islands', 'MP', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(166, 'Norway', 'NO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(167, 'Oman', 'OM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(168, 'Pakistan', 'PK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(169, 'Palau', 'PW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(170, 'Palestine, State of', 'PS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(171, 'Panama', 'PA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(172, 'Papua New Guinea', 'PG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(173, 'Paraguay', 'PY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(174, 'Peru', 'PE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(175, 'Philippines', 'PH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(176, 'Pitcairn', 'PN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(177, 'Poland', 'PL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(178, 'Portugal', 'PT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(179, 'Puerto Rico', 'PR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(180, 'Qatar', 'QA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(181, 'Réunion', 'RE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(182, 'Romania', 'RO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(183, 'Russian Federation', 'RU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(184, 'Rwanda', 'RW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(185, 'Saint Barthélemy', 'BL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(187, 'Saint Kitts and Nevis', 'KN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(188, 'Saint Lucia', 'LC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(189, 'Saint Martin (French part)', 'MF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(190, 'Saint Pierre and Miquelon', 'PM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(191, 'Saint Vincent and the Grenadines', 'VC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(192, 'Samoa', 'WS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(193, 'San Marino', 'SM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(194, 'Sao Tome and Principe', 'ST', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(195, 'Saudi Arabia', 'SA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(196, 'Senegal', 'SN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(197, 'Serbia', 'RS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(198, 'Seychelles', 'SC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(199, 'Sierra Leone', 'SL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(200, 'Singapore', 'SG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(201, 'Sint Maarten (Dutch part)', 'SX', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(202, 'Slovakia', 'SK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(203, 'Slovenia', 'SI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(204, 'Solomon Islands', 'SB', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(205, 'Somalia', 'SO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(206, 'South Africa', 'ZA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(207, 'South Georgia and the South Sandwich Islands', 'GS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(208, 'South Sudan', 'SS', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(209, 'Spain', 'ES', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(210, 'Sri Lanka', 'LK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(211, 'Sudan', 'SD', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(212, 'Suricountryname', 'SR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(213, 'Svalbard and Jan Mayen', 'SJ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(214, 'Swaziland', 'SZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(215, 'Sweden', 'SE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(216, 'Switzerland', 'CH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(217, 'Syrian Arab Republic', 'SY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(218, 'Taiwan', 'TW', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(219, 'Tajikistan', 'TJ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(220, 'Tanzania, United Republic of', 'TZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(221, 'Thailand', 'TH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(222, 'Timor-Leste', 'TL', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(223, 'Togo', 'TG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(224, 'Tokelau', 'TK', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(225, 'Tonga', 'TO', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(226, 'Trinidad and Tobago', 'TT', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(227, 'Tunisia', 'TN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(228, 'Turkey', 'TR', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(229, 'Turkmenistan', 'TM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(230, 'Turks and Caicos Islands', 'TC', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(231, 'Tuvalu', 'TV', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(232, 'Uganda', 'UG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(233, 'Ukraine', 'UA', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(234, 'United Arab Emirates', 'AE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(235, 'United Kingdom', 'GB', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(236, 'United States', 'US', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(237, 'United States Minor Outlying Islands', 'UM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(238, 'Uruguay', 'UY', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(239, 'Uzbekistan', 'UZ', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(240, 'Vanuatu', 'VU', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(241, 'Venezuela, Bolivarian Republic of', 'VE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(242, 'Viet Nam', 'VN', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(243, 'Virgin Islands, British', 'VG', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(244, 'Virgin Islands, U.S.', 'VI', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(245, 'Wallis and Futuna', 'WF', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(246, 'Western Sahara', 'EH', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(247, 'Yemen', 'YE', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(248, 'Zambia', 'ZM', '2023-03-28 17:31:29', '2023-03-28 17:31:29'),
(249, 'Zimbabwe', 'ZW', '2023-03-28 17:31:29', '2023-03-28 17:31:29');

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
-- Table structure for table `look_ups`
--

CREATE TABLE `look_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `look_ups`
--

INSERT INTO `look_ups` (`id`, `name`, `parent`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Company', NULL, 'all lookup create here', '2023-05-16 06:23:11', '2023-07-26 22:51:15');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_27_085106_create_registrations_table', 1),
(6, '2023_03_27_090013_create_modules_table', 1),
(7, '2023_03_27_090031_create_roles_table', 1),
(8, '2023_03_27_090055_create_work_groups_table', 1),
(9, '2023_03_27_090125_create_user_work_groups_table', 1),
(10, '2023_03_27_090147_create_look_ups_table', 1),
(11, '2023_03_28_052619_create_countries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sortorder` int(11) DEFAULT NULL,
  `contentid` int(11) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sectionid` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `display` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `url`, `sortorder`, `contentid`, `icon`, `sectionid`, `parent`, `active`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'dashboard', NULL, NULL, 'ti-home', NULL, NULL, 1, '1', '2023-04-16 04:56:16', '2023-04-16 04:56:22'),
(2, 'User/Role', NULL, NULL, NULL, 'fa fa-user', NULL, NULL, 1, '1', '2023-05-11 05:50:29', '2023-05-13 23:08:20'),
(3, 'Module', NULL, NULL, NULL, 'fa fa-modx', NULL, NULL, 1, '1', '2023-04-16 04:56:25', '2023-04-16 04:56:28'),
(4, 'Navigation', 'navigation', NULL, NULL, 'fa fa-bars ', NULL, 3, 1, '1', '2023-04-16 04:56:25', '2023-04-16 04:56:28'),
(5, 'Workgroup', 'workgroup', NULL, NULL, 'fa fa-suitcase', NULL, 3, 1, '1', '2023-05-08 06:19:05', '2023-05-16 03:38:01'),
(16, 'User', 'users', NULL, NULL, 'fa fa-user-plus', NULL, 2, 1, '1', '2023-05-14 05:06:19', '2023-05-14 05:14:29'),
(17, 'Role', 'roles', NULL, NULL, 'fa fa-vcard-o', NULL, 2, 1, '1', '2023-05-14 05:29:21', '2023-05-14 05:33:32'),
(18, 'User Workgroup', 'user-workgroup', NULL, NULL, 'fa fa-tasks', NULL, 3, 1, '1', '2023-05-16 04:47:20', '2023-05-16 04:47:20'),
(19, 'Lookup', 'lookup', NULL, NULL, 'fa fa-search', NULL, 3, 1, '1', '2023-05-16 05:57:27', '2023-05-16 05:58:24'),
(24, 'Content', NULL, NULL, NULL, 'fa fa-user', NULL, NULL, 1, '1', '2023-07-29 22:24:17', '2023-07-29 22:24:17'),
(25, 'new content', 'new-content', NULL, NULL, NULL, NULL, 24, 1, '1', '2023-07-29 22:25:20', '2023-07-29 22:25:20');

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
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `role`, `moduleid`, `category`) VALUES
(1, 3, 1, NULL),
(2, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `firstname`, `lastname`, `company`, `email`, `mobile`, `address`, `state`, `city`, `zipcode`, `country`, `nid`, `verification_link`, `is_verified`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Nur', 'Mohammad', NULL, 'nur.mohammad@aaqa.co', '01789786453', NULL, NULL, NULL, NULL, 'BD', NULL, '949ca82f02135ac5c62de32ecb8324bb12bb01d3', 1, NULL, '2023-07-29 21:42:45', '2023-07-29 21:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2023-04-02 07:18:40', '2023-04-02 07:18:48'),
(2, 'Admin', NULL, '2023-04-02 07:18:52', '2023-04-02 07:18:56'),
(3, 'User', NULL, '2023-04-02 07:19:00', '2023-04-02 07:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `company` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(30) DEFAULT NULL,
  `country` varchar(120) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `mobileverified` bit(1) NOT NULL DEFAULT b'0',
  `emailverified` bit(1) NOT NULL DEFAULT b'0',
  `nidverified` bit(1) NOT NULL DEFAULT b'0',
  `isactive` bit(1) NOT NULL DEFAULT b'0',
  `isauthorized` bit(1) NOT NULL DEFAULT b'0',
  `createdon` datetime NOT NULL DEFAULT current_timestamp(),
  `createdby` int(10) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_work_groups`
--

CREATE TABLE `user_work_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `workgroupid` int(11) DEFAULT NULL,
  `issupervisor` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_work_groups`
--

INSERT INTO `user_work_groups` (`id`, `userid`, `workgroupid`, `issupervisor`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2023-05-16 05:30:50', '2023-05-16 05:43:15'),
(4, 13, 2, 0, '2023-07-26 22:31:37', '2023-07-26 22:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `work_groups`
--

CREATE TABLE `work_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_groups`
--

INSERT INTO `work_groups` (`id`, `name`, `description`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Currency', 'all currencies taken here', NULL, '2023-05-16 04:20:21', '2023-05-16 23:55:52'),
(2, 'BDT', 'Bangladesi taka', 1, '2023-05-16 04:26:49', '2023-05-16 23:56:33'),
(5, 'Dollar', 'US Dollar', 1, '2023-07-26 22:54:40', '2023-07-26 22:54:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `look_ups`
--
ALTER TABLE `look_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
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
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrations_email_unique` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_work_groups`
--
ALTER TABLE `user_work_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_groups`
--
ALTER TABLE `work_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `look_ups`
--
ALTER TABLE `look_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_work_groups`
--
ALTER TABLE `user_work_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_groups`
--
ALTER TABLE `work_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
