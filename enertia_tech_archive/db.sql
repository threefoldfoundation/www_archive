-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 08:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enertia`
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
  `accesstype_id` int(11) NOT NULL,
  `access_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_accesstype`
--

INSERT INTO `ev_accesstype` (`accesstype_id`, `access_name`) VALUES
(1, 'public'),
(2, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `ev_payment`
--

CREATE TABLE `ev_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(250) NOT NULL
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
  `plugtype_id` int(11) NOT NULL,
  `plug_type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_plugtype`
--

INSERT INTO `ev_plugtype` (`plugtype_id`, `plug_type`) VALUES
(1, 'Phase 1'),
(2, 'Phase 3');

-- --------------------------------------------------------

--
-- Table structure for table `ev_point`
--

CREATE TABLE `ev_point` (
  `point_id` int(11) NOT NULL,
  `point` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_point`
--

INSERT INTO `ev_point` (`point_id`, `point`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `ev_power`
--

CREATE TABLE `ev_power` (
  `power_id` int(11) NOT NULL,
  `power` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_power`
--

INSERT INTO `ev_power` (`power_id`, `power`) VALUES
(1, '1 kW '),
(2, '5 kW'),
(3, '10 kW');

-- --------------------------------------------------------

--
-- Table structure for table `ev_provider`
--

CREATE TABLE `ev_provider` (
  `provider_id` int(11) NOT NULL,
  `provider_name` varchar(250) NOT NULL
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

INSERT INTO `ev_stations` (`station_ID`, `user_id`, `station_Name`, `station_Address`, `station_lat`, `station_long`, `station_Provider`, `station_from_day`, `station_to_day`, `station_from_time`, `station_to_time`, `station_open_time`, `station_parking`, `station_wifi`, `station_payment`, `station_price`, `station_accesstype`, `station_plugtype`, `station_power`, `station_supplytype`, `station_voltage`, `station_point`, `station_general_comment`, `station_attachment`, `station_status`, `station_deleted`, `station_created`, `station_updated`) VALUES
(1, 2, 'Crescent road, Jumeirah Zabeel Saray', 'Betma Indore', '22.683604', '75.632212', 1, 'monday', 'saturday', '10:00', '08:00', '0', '0', '0', 1, '2500', 1, '1,2', '1,2', '1,2', '1,2', '1,2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '[{\"url\" : \"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.PNG\",\"extention\":\"png\"}, { \"url\":\"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.mp4\",\"extention\":\"mp4\"}]', '0', '1', '2019-04-21 13:43:13', '2019-04-22 10:48:11'),
(2, 2, 'Madhumilan pump', 'Madhumilan Square, Murai Mohalla, Chhoti Gwaltoli, Indore, Madhya Pradesh', '22.7141683', '75.8722449', 1, 'monday', 'saturday', '10:00', '08:00', '0', '0', '0', 1, '2500', 1, '1,2', '1,2', '1,2', '1,2', '1,2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '[{\"url\":\"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.PNG\",\"extention\":\"png\"},{url\":\"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.mp4\",\"extention\":\"mp4\"}][{\"url\" : \"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.PNG\",\"extention\":\"png\"}, { \"url\":\"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.mp4\",\"extention\":\"mp4\"}]', '0', '1', '2019-04-21 13:43:13', '2019-04-22 10:48:12'),
(3, 1, 'Vijay Nagar lpg', 'Vijay Nagar, Indore, Madhya Pradesh', '22.7529441', '75.8915147', 1, 'monday', 'saturday', '10:00', '08:00', '0', '0', '0', 1, '2500', 1, '1,2', '1,2', '1,2', '1,2', '1,2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '[{\"url\" : \"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.PNG\",\"extention\":\"png\"}, { \"url\":\"http://localhost/enertia.io/assets/uploads/stations_attachment/bg.mp4\",\"extention\":\"mp4\"}]', '0', '1', '2019-04-21 13:43:13', '2019-04-22 10:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `ev_supplytype`
--

CREATE TABLE `ev_supplytype` (
  `supply_id` int(11) NOT NULL,
  `supplytype` varchar(250) NOT NULL
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
(2, 'Thakur Dhamndhiya', 'kamlesh74420@gmail.com', '917879759500', NULL, '1181567268687935', '47.247.221.156', 'Social', '2019-04-22 08:30:26', '2019-04-22 04:30:26', '3'),
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
(22, 'kkk', 'jhjhj@gmail.com', '4445558885', NULL, 'GVxI3Fvyf51D', '122.170.223.47', 'Regular', '2019-04-20 09:50:36', '2019-04-20 16:50:36', '1');

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
(22, 1, 1, 22, '2019-04-20 05:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `ev_voltage`
--

CREATE TABLE `ev_voltage` (
  `voltage_id` int(11) NOT NULL,
  `voltage` varchar(250) NOT NULL
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
  ADD PRIMARY KEY (`accesstype_id`),
  ADD UNIQUE KEY `accesstype_id` (`accesstype_id`);

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
  MODIFY `accesstype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_payment`
--
ALTER TABLE `ev_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_plugtype`
--
ALTER TABLE `ev_plugtype`
  MODIFY `plugtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_point`
--
ALTER TABLE `ev_point`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ev_power`
--
ALTER TABLE `ev_power`
  MODIFY `power_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ev_provider`
--
ALTER TABLE `ev_provider`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_stations`
--
ALTER TABLE `ev_stations`
  MODIFY `station_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ev_supplytype`
--
ALTER TABLE `ev_supplytype`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ev_users`
--
ALTER TABLE `ev_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ev_user_cars`
--
ALTER TABLE `ev_user_cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ev_voltage`
--
ALTER TABLE `ev_voltage`
  MODIFY `voltage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
