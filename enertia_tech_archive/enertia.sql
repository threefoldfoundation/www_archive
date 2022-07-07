-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 02:51 AM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enertiaio`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_make`
--

CREATE TABLE `car_make` (
  `makeID` int(10) NOT NULL,
  `makeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_make`
--

INSERT INTO `car_make` (`makeID`, `makeName`) VALUES
(1, 'AUDI');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `modelID` int(10) NOT NULL,
  `makeID` int(11) NOT NULL,
  `modelName` varchar(255) NOT NULL,
  `modelYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`modelID`, `makeID`, `modelName`, `modelYear`) VALUES
(1, 1, 'E-TRON', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `ev_accesstype`
--

CREATE TABLE `ev_accesstype` (
  `accesstype_id` int(10) NOT NULL,
  `access_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_accesstype`
--

INSERT INTO `ev_accesstype` (`accesstype_id`, `access_name`) VALUES
(1, 'Public'),
(2, 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `ev_payment`
--

CREATE TABLE `ev_payment` (
  `payment_id` int(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_payment`
--

INSERT INTO `ev_payment` (`payment_id`, `payment_method`) VALUES
(1, 'Master'),
(2, 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `ev_plugtype`
--

CREATE TABLE `ev_plugtype` (
  `plugtype_id` int(10) NOT NULL,
  `plug_type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_plugtype`
--

INSERT INTO `ev_plugtype` (`plugtype_id`, `plug_type`) VALUES
(1, 'Phase 1'),
(2, 'Phase 2');

-- --------------------------------------------------------

--
-- Table structure for table `ev_point`
--

CREATE TABLE `ev_point` (
  `point_id` int(10) NOT NULL,
  `point` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_point`
--

INSERT INTO `ev_point` (`point_id`, `point`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ev_power`
--

CREATE TABLE `ev_power` (
  `power_id` int(10) NOT NULL,
  `power` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_power`
--

INSERT INTO `ev_power` (`power_id`, `power`) VALUES
(1, '1 KW'),
(2, '2 KW');

-- --------------------------------------------------------

--
-- Table structure for table `ev_price`
--

CREATE TABLE `ev_price` (
  `price_id` int(10) NOT NULL,
  `price` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_price`
--

INSERT INTO `ev_price` (`price_id`, `price`) VALUES
(1, '[\"1000 - 5000\"]');

-- --------------------------------------------------------

--
-- Table structure for table `ev_provider`
--

CREATE TABLE `ev_provider` (
  `provider_id` int(10) NOT NULL,
  `provider_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_provider`
--

INSERT INTO `ev_provider` (`provider_id`, `provider_name`) VALUES
(1, 'Tesla Motors (World Wide)'),
(2, 'test 2');

-- --------------------------------------------------------

--
-- Table structure for table `ev_stations`
--

CREATE TABLE `ev_stations` (
  `station_ID` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `station_Name` varchar(250) NOT NULL,
  `station_Address` text NOT NULL,
  `station_lat` varchar(250) NOT NULL,
  `station_long` varchar(250) NOT NULL,
  `station_country_code` varchar(10) NOT NULL,
  `station_Provider` int(11) NOT NULL,
  `station_from_day` varchar(50) NOT NULL,
  `station_to_day` varchar(50) NOT NULL,
  `station_from_time` varchar(50) NOT NULL,
  `station_to_time` varchar(50) NOT NULL,
  `station_open_time` enum('0','1') NOT NULL COMMENT '0=yes,1=no',
  `station_parking` enum('0','1') NOT NULL COMMENT '0=yes,1=no',
  `station_wifi` enum('0','1') NOT NULL COMMENT '0=yes,1=no',
  `station_payment` int(11) NOT NULL,
  `station_price` varchar(250) NOT NULL,
  `station_accesstype` int(11) NOT NULL,
  `station_plugtype` varchar(1000) NOT NULL,
  `station_power` varchar(1000) NOT NULL,
  `station_supplytype` varchar(1000) NOT NULL,
  `station_voltage` varchar(1000) NOT NULL,
  `station_point` varchar(1000) NOT NULL,
  `station_general_comment` longtext NOT NULL,
  `station_attachment` longtext NOT NULL,
  `station_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0= active 1= inactive',
  `station_deleted` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=yes 1=on',
  `station_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `station_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_stations`
--

INSERT INTO `ev_stations` (`station_ID`, `user_id`, `station_Name`, `station_Address`, `station_lat`, `station_long`, `station_country_code`, `station_Provider`, `station_from_day`, `station_to_day`, `station_from_time`, `station_to_time`, `station_open_time`, `station_parking`, `station_wifi`, `station_payment`, `station_price`, `station_accesstype`, `station_plugtype`, `station_power`, `station_supplytype`, `station_voltage`, `station_point`, `station_general_comment`, `station_attachment`, `station_status`, `station_deleted`, `station_created`, `station_updated`) VALUES
(1, 1, 'Crescent road, Jumeirah Zabeel Saray', 'Betma Indore', '22.683604', '75.632212', '', 1, 'monday', 'saturday', '10:00', '08:00', '0', '0', '0', 1, '2500', 1, '1,2', '1,2', '1,2', '1,2', '1,2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '[ { \"url\":\"http://alcyone.in/enertia/assets/uploads/stations_attachment/bg.PNG\", \"extention\":\"png\" }, { \"url\":\"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.mp4\", \"extention\":\"mp4\" }]', '0', '1', '2019-04-21 13:43:13', '2019-04-29 02:02:43'),
(4, 0, 'Our Tesla Home', 'Dhar, Madhya Pradesh, India', '22.6012922', '75.30246549999993', '', 1, 'Saturday', 'Monday', '10:00', '10:00', '1', '0', '0', 1, '$100000', 1, '1', '1', '1', '1', '1', 'This is a general comment.', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556222400_StationView_(2).png\"}]', '0', '1', '2019-04-26 06:58:16', '0000-00-00 00:00:00'),
(6, 0, 'dssd', 'Shipra River, Madhya Pradesh', '22.9758187', '75.91715810000005', '', 1, 'Tuesday', 'Tuesday', '12:00', '16:00', '1', '0', '0', 1, '10000', 1, '1', '1', '2', '1', '2', 'sdsd', '[{\"url\":\"\"}]', '0', '1', '2019-04-28 00:05:43', '0000-00-00 00:00:00'),
(7, 0, 'dssd', 'Shipra River, Madhya Pradesh', '22.9758187', '75.91715810000005', '', 1, 'Tuesday', 'Tuesday', '12:00', '16:00', '1', '0', '0', 1, '10000', 1, '1', '1', '2', '1', '2', 'sdsd', '[{\"url\":\"\"},{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556395200_IMG_20190420_114541_(1).jpg\"}]', '0', '1', '2019-04-28 01:01:59', '0000-00-00 00:00:00'),
(8, 0, 'df', 'Nayapura, Dewas, Madhya Pradesh, India', '22.5820016', '76.89227289999997', '', 1, 'Monday', 'Friday', '10:00', '15:00', '0', '0', '0', 0, 'df', 0, '1', '0', '0', '0', '0', 'df', '[{\"url\":\"\"},{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556395200_imgpsh_fullsize_anim.png\"}]', '0', '1', '2019-04-28 03:57:02', '0000-00-00 00:00:00'),
(9, 0, 'sdfs', 'DFO Forest Divisional Office, Civil Lines, Raipur, Chhattisgarh, India', '21.2439746', '81.64817310000001', '', 2, 'Wednesday', 'Saturday', '12:00', '14:00', '0', '0', '0', 0, 'sdf', 0, '1', '2', '1', '2', '2', 'df', '[{\"url\":\"\"},{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_download.jpg\"}]', '0', '1', '2019-04-28 23:26:51', '0000-00-00 00:00:00'),
(10, 0, 'my Tesla', 'Nipania, Indore, Madhya Pradesh, India', '22.7589871', '75.92890460000001', '', 1, 'Tuesday', 'Tuesday', '15:00', '15:00', '1', '0', '0', 2, 'df', 1, '1', '2', '1', '2', '1', 'dfdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_download1.jpg\"}]', '0', '1', '2019-04-29 06:51:51', '2019-04-29 06:55:05'),
(11, 0, 'my Tesla', 'Regal Square, Indore, Madhya Pradesh, India', '22.7201357', '75.87136880000003', 'AE', 1, 'Tuesday', 'Tuesday', '15:00', '15:00', '1', '0', '0', 2, 'df', 1, '1', '2', '1', '2', '1', 'dfdf', '[{\"url\":\"\"},{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_download1.jpg\"}]', '0', '1', '2019-04-29 06:52:49', '2019-04-30 06:40:06'),
(12, 0, 'my Tesla', 'Palasia, Indore, Madhya Pradesh, India', '22.724355', '75.88389440000003', 'IN', 1, 'Tuesday', 'Tuesday', '15:00', '15:00', '1', '0', '0', 2, 'df', 1, '1', '2', '1', '2', '1', 'dfdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_image_2019_04_15T17_00_48_295Z.png\"}]', '0', '1', '2019-04-29 06:55:33', '2019-04-30 06:39:53'),
(13, 0, 'my Tesla', 'Pipliyahana, Indore, Madhya Pradesh, India', '22.7093523', '75.90143920000003', 'IN', 1, 'Tuesday', 'Tuesday', '15:00', '15:00', '1', '0', '0', 2, 'df', 1, '1', '2', '1', '2', '1', 'dfdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_Dashboard_(2).png\"}]', '0', '1', '2019-04-29 06:57:34', '2019-04-30 06:38:59'),
(14, 0, 'my Tesla', 'Nayapura, Indore, Madhya Pradesh, India', '22.7252447', '75.8653779', 'IN', 1, 'Tuesday', 'Tuesday', '15:00', '15:00', '1', '0', '0', 2, 'df', 1, '1', '2', '1', '2', '1', 'dfdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_Step2_AddStation.png\"}]', '0', '1', '2019-04-29 06:58:25', '2019-04-30 06:38:42'),
(15, 0, 'my Tesla', 'Vijay Nagar, Indore, Madhya Pradesh, India', '22.7532848', '75.89369620000002', 'IN', 1, 'Tuesday', 'Tuesday', '15:00', '15:00', '1', '0', '0', 2, 'df', 1, '1', '2', '1', '2', '1', 'dfdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_StationView_(3).png\"}]', '0', '1', '2019-04-29 06:59:38', '2019-04-30 06:38:22'),
(16, 0, 'myyyyyyy', '27, N Raj Mohalla, North Rajmohalla, Raj Mohalla, Indore, Madhya Pradesh 452002, India', '22.715785884661283', '75.84188461303711', 'IN', 1, 'Wednesday', 'Thursday', '10:00', '15:00', '0', '0', '0', 0, 'dgf', 0, '2', '0', '0', '0', '0', 'dfg', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556481600_StationView_(2).png\"}]', '0', '1', '2019-04-29 09:26:04', '2019-04-30 06:37:42'),
(17, 0, 'ssdfsdf', 'India', '20.593684', '78.96288000000004', 'IN', 1, 'Tuesday', 'Tuesday', '15:00', '2:00', '0', '0', '0', 2, 'sd', 1, '1', '2', '1', '1', '1', 'dfssd', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556568000_image_2019_04_12T19_30_22_885Z.png\"}]', '0', '1', '2019-04-30 00:21:20', '0000-00-00 00:00:00'),
(18, 0, 'sdfsd', 'Indore, Madhya Pradesh, India', '22.7195687', '75.85772580000003', 'IN', 1, 'Thursday', 'Saturday', '14:00', '17:00', '0', '0', '0', 0, 'sdf', 0, '2', '2', '1', '2', '1', 'sdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556568000_image_2019_04_12T19_32_34_873Z.png\"}]', '0', '1', '2019-04-30 00:30:32', '2019-04-30 00:43:21'),
(19, 0, 'dsfdsad', 'Bombay Hospital, Scheme No 94 Sector WA, Indore, Madhya Pradesh, India', '22.7545065', '75.90354660000003', 'IN', 1, 'Monday', 'Tuesday', '12:00', '14:00', '0', '0', '0', 2, 'sdf', 1, '1', '1', '1', '1', '1', 'sdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556568000_image_2019_04_12T19_30_22_885Z1.png\"}]', '0', '1', '2019-04-30 00:44:16', '2019-04-30 06:37:27'),
(20, 0, 'sdf', 'Indore, Madhya Pradesh, India', '22.7195687', '75.85772580000003', 'IN', 1, 'Tuesday', 'Wednesday', '14:00', '16:00', '0', '0', '0', 0, 'sdf', 0, '1', '1', '1', '1', '2', 'sdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556568000_Dashboard.png\"}]', '0', '1', '2019-04-30 00:49:14', '0000-00-00 00:00:00'),
(21, 0, 'sdf', 'Bombay Hospital, Scheme No 94 Sector WA, Indore, Madhya Pradesh, India', '22.7545065', '75.90354660000003', 'IN', 1, 'Tuesday', 'Wednesday', '14:00', '16:00', '0', '0', '0', 0, 'sdf', 0, '1', '1', '1', '1', '2', 'sdf', '[{\"url\":\"https://www.alcyone.in/enertia/assets/uploads/1556568000_Dashboard.png\"}]', '0', '1', '2019-04-30 00:49:40', '0000-00-00 00:00:00'),
(22, 0, 'sdf', 'Dubai - United Arab Emirates', '25.2048493', '55.270782800000006', 'AE', 1, 'Tuesday', 'Wednesday', '15:00', '14:00', '0', '0', '0', 0, 'sdfs', 0, '0', '0', '0', '0', '0', 'sdf', '[]', '0', '1', '2019-04-30 08:59:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ev_supplytype`
--

CREATE TABLE `ev_supplytype` (
  `supply_id` int(10) NOT NULL,
  `supplytype` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_supplytype`
--

INSERT INTO `ev_supplytype` (`supply_id`, `supplytype`) VALUES
(1, 'AC'),
(2, 'DC');

-- --------------------------------------------------------

--
-- Table structure for table `ev_users`
--

CREATE TABLE `ev_users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPhone` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserOTP` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserSecret` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserIP` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserLoginType` enum('Social','Regular') COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserLastLogin` datetime NOT NULL,
  `UserSignupDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Userstep` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ev_users`
--

INSERT INTO `ev_users` (`UserID`, `UserName`, `UserEmail`, `UserPhone`, `UserOTP`, `UserSecret`, `UserIP`, `UserLoginType`, `UserLastLogin`, `UserSignupDate`, `Userstep`) VALUES
(2, 'Thakur Dhamndhiya', 'kamlesh74420@gmail.com', '917879759500', NULL, '1181567268687935', '47.247.221.156', 'Social', '2019-05-01 01:02:38', '2019-04-30 21:02:38', '3'),
(3, 'Abdul Rehman Rajput', 'hoticeee@hotmail.com', '971553157060', NULL, '10156842941025661', '94.207.81.150', 'Social', '2019-04-19 15:23:28', '2019-04-19 22:23:28', '3'),
(4, 's@gmail.com', 's@gmail.com', '9179961918', NULL, 'oDgbM7ZvHyJ0', '125.99.24.236', 'Regular', '2019-04-09 12:14:02', '2019-04-09 08:14:02', '1'),
(5, 's@gmail.com', 'ss@gmail.com', '5588662244', NULL, 'rtmIdflaLUBh', '125.99.24.236', 'Regular', '2019-04-09 12:15:47', '2019-04-09 19:15:47', '1'),
(6, 'skjjk@gmail.com', 'sjkllkj@gmail.com', '5451958649', NULL, 'SKqLFDx8X0fA', '125.99.24.236', 'Regular', '2019-04-10 09:42:43', '2019-04-10 16:42:43', '1'),
(7, 'aa', 'aa@gmail.com', '8899665544', NULL, 'a8MA0uU4jEDY', '125.99.24.236', 'Regular', '2019-04-11 09:44:03', '2019-04-11 16:44:03', '1'),
(8, 'tt', 'tt@gmail.com', '444545343', NULL, 'iL1nRwbZdfpt', '122.170.197.200', 'Regular', '2019-04-11 18:40:21', '2019-04-12 01:40:21', '1'),
(9, 'sfsdf', 'sf@gmail.com', '4445577885', NULL, 'pZSveunrXQKN', '122.170.197.200', 'Regular', '2019-04-12 09:55:59', '2019-04-12 16:55:59', '1'),
(10, 'aaa@gmail.com', 'aaa@gmail.com', '4445556688', NULL, 'O42ug6sfGcqz', '125.99.24.236', 'Regular', '2019-04-13 09:53:17', '2019-04-13 16:53:17', '1'),
(11, 'sxvx@gmail.com', 'xvx@gm.com', '4445557778', NULL, 'Hk2CF3RzvuQG', '125.99.24.236', 'Regular', '2019-04-13 13:11:43', '2019-04-13 20:11:43', '1'),
(12, 'aaa@gmail.com', 'aaa@m.com', '55555555', NULL, 'oUwTnNGqjmSI', '125.99.24.236', 'Regular', '2019-04-13 18:45:17', '2019-04-14 01:45:17', '1'),
(13, 'ddd', 'ddd@gmail.com', '2223334445', NULL, 'VFCN9ki25ldE', '47.247.28.58', 'Regular', '2019-04-14 21:47:33', '2019-04-15 04:47:33', '1'),
(14, 'eee', 'EEE@gmail.com', '4445556668', NULL, 'zFw5iGp2sgcO', '182.70.177.46', 'Regular', '2019-04-15 11:17:17', '2019-04-15 18:17:17', '1'),
(15, 'rrr', 'rrr@gmail.com', '1114445552', NULL, 'Wxgdy1EB7Hp9', '110.224.215.51', 'Regular', '2019-04-16 10:08:56', '2019-04-16 17:08:56', '1'),
(16, 'sdf', 'sdfdf@gmail.com', '444444', NULL, 'F2KXQOTdzbrm', '110.224.215.51', 'Regular', '2019-04-16 14:48:14', '2019-04-16 21:48:14', '1'),
(17, 'aaa', 'aaaaaa@gmailc.com', '343434343', NULL, '4vJlXAaOSyeg', '47.247.254.167', 'Regular', '2019-04-17 21:52:38', '2019-04-18 04:52:38', '1'),
(18, 'aaa', 'aqaq@gmail.com', '5556664445', NULL, 'L1tFRNACuVo9', '182.70.176.34', 'Regular', '2019-04-19 09:41:28', '2019-04-19 16:41:28', '1'),
(19, 'sdf', 'dsfsd@gmail.com', '111444555', NULL, 'G5Z8JOatsbYk', '122.170.223.47', 'Regular', '2019-04-19 13:09:52', '2019-04-19 20:09:52', '1'),
(20, 'sdf', 'sdf@gmail.com', '4445556665', NULL, 'VuhGilLoyxcX', '122.170.223.47', 'Regular', '2019-04-19 19:26:01', '2019-04-20 02:26:01', '1'),
(21, 'hhh', 'hhj@jj.com', '56565565', NULL, 'oqr59TlAjfuJ', '122.170.223.47', 'Regular', '2019-04-20 09:44:35', '2019-04-20 16:44:35', '1'),
(22, 'kkk', 'jhjhj@gmail.com', '4445558885', NULL, 'GVxI3Fvyf51D', '122.170.223.47', 'Regular', '2019-04-20 13:05:19', '2019-04-20 09:05:19', '1'),
(23, 'dfg', 'dfg@gmail.com', '545193433', NULL, 'wFXNsc976uMr', '122.170.223.47', 'Regular', '2019-04-20 13:26:38', '2019-04-20 09:26:38', '1'),
(24, 'fdg', 'dfg@gmaiol.com', '4534534534', NULL, 'ZEO61WBM9LNY', '122.170.223.47', 'Regular', '2019-04-20 13:51:45', '2019-04-20 20:51:45', '1'),
(25, 'sdf', 'feef3@gmail.com', '2343223423', NULL, '6Dt4mg1HOuAR', '122.170.223.47', 'Regular', '2019-04-20 13:53:43', '2019-04-20 20:53:43', '1'),
(26, 'sdfsd', 'sdfs@gmial.com', '3434334343', NULL, 'blrG9UY2hc4g', '122.170.223.47', 'Regular', '2019-04-20 15:59:20', '2019-04-20 22:59:20', '1'),
(27, 'www', 'wew@gmail.com', '4355345345', NULL, 'rlWid19twJ7V', '157.34.88.29', 'Regular', '2019-04-20 21:38:20', '2019-04-21 04:38:20', '1'),
(28, 'fdf', 'dfd', '3423232323', NULL, 'ZXUkhAdcpH0J', '157.34.88.29', 'Regular', '2019-04-20 21:52:47', '2019-04-21 04:52:47', '1'),
(29, 'ggh', 'hjhj@ggg.com', '7877878778', NULL, 'Fg1jSTsHh6Ub', '47.247.102.159', 'Regular', '2019-04-21 11:17:39', '2019-04-21 18:17:39', '1'),
(30, 'dfd@gmail.com', 'sdfj@gmail.com', '7787677676', NULL, 'g0Lsj6tMHZDx', '47.247.122.127', 'Regular', '2019-04-21 22:29:33', '2019-04-22 05:29:33', '1'),
(31, 'sdfs', 'sdsdf@gmial.ocm', '1156544665', NULL, 'ThLdk0ZbgAXR', '171.61.28.129', 'Regular', '2019-04-22 09:51:29', '2019-04-22 16:51:29', '1'),
(32, 'AWAWAW', 'AWAWAW@gmail.com', '4545484446', NULL, 'gPAzorBq4VWx', '182.70.236.158', 'Regular', '2019-04-25 14:41:34', '2019-04-25 21:41:34', '1'),
(33, 'sdfsd', 'sdf@gmila.com', '5465465645', NULL, 'gXSW1ZHRwhrm', '182.70.236.158', 'Regular', '2019-04-26 13:12:47', '2019-04-26 20:12:47', '1'),
(34, 'Tushar', 'tushar@siyatech', '9755397879', NULL, 'zUpRdoqlQBsi', '182.70.236.158', 'Regular', '2019-04-26 15:13:18', '2019-04-26 22:13:18', '1'),
(35, 'sdfsd', 'sdfsd@gmail.omc', '3454354354', NULL, 'V1hWUs4vkJGn', '182.70.236.158', 'Regular', '2019-04-27 11:13:56', '2019-04-27 18:13:56', '1'),
(36, 'eerer', 'erere@gmail.com', '3434434334', NULL, 'd2RA7ahq4MkC', '47.247.101.36', 'Regular', '2019-04-27 22:27:03', '2019-04-28 05:27:03', '1'),
(37, 'sdfsd', 'sdfsdf@gmail.com', '5453343434', NULL, 'eSzF9YqmRh0N', '47.247.165.0', 'Regular', '2019-04-28 10:32:27', '2019-04-28 17:32:27', '1'),
(38, 'fg', 'fg@gmail.com', '3454353453', NULL, '1xtI4ruJRkws', '122.170.195.144', 'Regular', '2019-04-29 09:34:23', '2019-04-29 05:34:23', '1'),
(39, 'dsfdf', 'sdfd343@gmail.com', '5474654934', NULL, '0T5P4MUKx7VY', '122.170.195.144', 'Regular', '2019-04-29 09:42:36', '2019-04-29 05:42:36', '1'),
(40, 'sdf', 'sd@gmail.com', '5646835454', NULL, 'x357EwTp9Msc', '122.170.195.144', 'Regular', '2019-04-29 10:15:00', '2019-04-29 17:15:00', '1'),
(41, 'gr', 'gfdgd@gmail.com', '4545874578', NULL, 'Hdwg815xILfp', '122.170.195.144', 'Regular', '2019-04-29 16:11:13', '2019-04-29 12:11:13', '1'),
(42, 'dfsdf', 'sdaatw4@gmail.com', '5491818454', NULL, '9vVgk2lfHp3c', '122.168.147.228', 'Regular', '2019-04-30 20:29:34', '2019-04-30 16:29:34', '1'),
(43, 'dsfds', 'sdf3@gmail.com', '4545435454', NULL, 'MTqanVmjp4Z6', '47.247.115.255', 'Regular', '2019-05-01 00:45:30', '2019-04-30 20:45:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ev_user_cars`
--

CREATE TABLE `ev_user_cars` (
  `ID` int(11) NOT NULL,
  `makeID` int(11) NOT NULL,
  `modelID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_user_cars`
--

INSERT INTO `ev_user_cars` (`ID`, `makeID`, `modelID`, `UserID`, `LastUpdated`) VALUES
(1, 1, 1, 1, '2019-03-22 10:12:09'),
(2, 1, 1, 2, '2019-03-22 11:29:23'),
(3, 1, 1, 3, '2019-03-25 15:45:31'),
(4, 1, 1, 4, '2019-04-09 08:12:01'),
(5, 1, 1, 5, '2019-04-09 08:15:48'),
(6, 1, 1, 6, '2019-04-10 05:42:44'),
(7, 1, 1, 7, '2019-04-11 05:44:04'),
(8, 1, 1, 8, '2019-04-11 14:40:23'),
(9, 1, 1, 9, '2019-04-12 05:56:00'),
(10, 1, 1, 10, '2019-04-13 05:53:18'),
(11, 1, 1, 11, '2019-04-13 09:11:44'),
(12, 1, 1, 12, '2019-04-13 14:45:18'),
(13, 1, 1, 13, '2019-04-14 17:47:34'),
(14, 1, 1, 14, '2019-04-15 07:17:18'),
(15, 1, 1, 15, '2019-04-16 06:08:57'),
(16, 1, 1, 16, '2019-04-16 10:48:15'),
(17, 1, 1, 17, '2019-04-17 17:52:39'),
(18, 1, 1, 18, '2019-04-19 05:41:29'),
(19, 1, 1, 19, '2019-04-19 09:09:53'),
(20, 1, 1, 20, '2019-04-19 15:26:02'),
(21, 1, 1, 21, '2019-04-20 05:44:36'),
(22, 1, 1, 22, '2019-04-20 05:50:37'),
(23, 1, 1, 23, '2019-04-20 09:07:08'),
(24, 1, 1, 24, '2019-04-20 09:51:46'),
(25, 1, 1, 25, '2019-04-20 09:53:44'),
(26, 1, 1, 26, '2019-04-20 11:59:21'),
(27, 1, 1, 27, '2019-04-20 17:38:21'),
(28, 1, 1, 28, '2019-04-20 17:52:48'),
(29, 1, 1, 29, '2019-04-21 07:17:40'),
(30, 1, 1, 30, '2019-04-21 18:29:34'),
(31, 1, 1, 31, '2019-04-22 05:51:30'),
(32, 1, 1, 32, '2019-04-25 10:41:36'),
(33, 1, 1, 33, '2019-04-26 09:12:48'),
(34, 1, 1, 34, '2019-04-26 11:13:19'),
(35, 1, 1, 35, '2019-04-27 07:13:57'),
(36, 1, 1, 36, '2019-04-27 18:27:04'),
(37, 1, 1, 37, '2019-04-28 06:32:28'),
(38, 1, 1, 38, '2019-04-29 05:24:57'),
(39, 1, 1, 39, '2019-04-29 05:41:17'),
(40, 1, 1, 40, '2019-04-29 06:15:01'),
(41, 1, 1, 41, '2019-04-29 12:08:39'),
(42, 1, 1, 42, '2019-04-30 05:32:15'),
(43, 1, 1, 43, '2019-04-30 19:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `ev_voltage`
--

CREATE TABLE `ev_voltage` (
  `voltage_id` int(10) NOT NULL,
  `voltage` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_voltage`
--

INSERT INTO `ev_voltage` (`voltage_id`, `voltage`) VALUES
(1, '200 HP'),
(2, '300 HP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_make`
--
ALTER TABLE `car_make`
  ADD PRIMARY KEY (`makeID`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`modelID`);

--
-- Indexes for table `ev_accesstype`
--
ALTER TABLE `ev_accesstype`
  ADD PRIMARY KEY (`accesstype_id`);

--
-- Indexes for table `ev_payment`
--
ALTER TABLE `ev_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `ev_plugtype`
--
ALTER TABLE `ev_plugtype`
  ADD PRIMARY KEY (`plugtype_id`);

--
-- Indexes for table `ev_point`
--
ALTER TABLE `ev_point`
  ADD PRIMARY KEY (`point_id`);

--
-- Indexes for table `ev_power`
--
ALTER TABLE `ev_power`
  ADD PRIMARY KEY (`power_id`);

--
-- Indexes for table `ev_price`
--
ALTER TABLE `ev_price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `ev_provider`
--
ALTER TABLE `ev_provider`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `ev_stations`
--
ALTER TABLE `ev_stations`
  ADD PRIMARY KEY (`station_ID`);

--
-- Indexes for table `ev_supplytype`
--
ALTER TABLE `ev_supplytype`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `ev_users`
--
ALTER TABLE `ev_users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `ev_user_cars`
--
ALTER TABLE `ev_user_cars`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `ev_voltage`
--
ALTER TABLE `ev_voltage`
  ADD PRIMARY KEY (`voltage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ev_accesstype`
--
ALTER TABLE `ev_accesstype`
  MODIFY `accesstype_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_payment`
--
ALTER TABLE `ev_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_plugtype`
--
ALTER TABLE `ev_plugtype`
  MODIFY `plugtype_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_point`
--
ALTER TABLE `ev_point`
  MODIFY `point_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_power`
--
ALTER TABLE `ev_power`
  MODIFY `power_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_price`
--
ALTER TABLE `ev_price`
  MODIFY `price_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ev_provider`
--
ALTER TABLE `ev_provider`
  MODIFY `provider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_stations`
--
ALTER TABLE `ev_stations`
  MODIFY `station_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ev_supplytype`
--
ALTER TABLE `ev_supplytype`
  MODIFY `supply_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_users`
--
ALTER TABLE `ev_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ev_user_cars`
--
ALTER TABLE `ev_user_cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ev_voltage`
--
ALTER TABLE `ev_voltage`
  MODIFY `voltage_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
