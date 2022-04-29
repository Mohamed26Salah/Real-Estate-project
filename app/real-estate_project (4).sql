-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 05:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real-estate project`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `ID` int(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`ID`, `UserID`, `name`, `Title`, `email`, `Description`) VALUES
(20, 5, 'Yonus', 'Gamed ', 'hady@gmail.com', 'kemalet 3dd     '),
(21, 7, 'Joe', 'GD3', 'Joe@gmail.com', 'mfesh klam yewaffeh 72oh'),
(22, 8, 'Salah', 'Project Leader', 'Salah@gmai.com', 'rbna ysam7oh');

-- --------------------------------------------------------

--
-- Table structure for table `allestate`
--

CREATE TABLE `allestate` (
  `ID` int(255) NOT NULL,
  `AddressUser` varchar(255) NOT NULL,
  `AddressAdmin` varchar(255) NOT NULL,
  `Area` int(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `PaymentMethod` varchar(200) NOT NULL,
  `Owner` varchar(200) NOT NULL,
  `OwnerNumber` int(255) NOT NULL,
  `DescriptionUser` varchar(255) NOT NULL,
  `DescriptionAdmin` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Priroty` varchar(255) NOT NULL,
  `Visible` int(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `TypeID` int(255) NOT NULL,
  `offered` int(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allestate`
--

INSERT INTO `allestate` (`ID`, `AddressUser`, `AddressAdmin`, `Area`, `Price`, `PaymentMethod`, `Owner`, `OwnerNumber`, `DescriptionUser`, `DescriptionAdmin`, `Name`, `Priroty`, `Visible`, `Code`, `TypeID`, `offered`, `image`) VALUES
(1, '5-elmatareya.St', '5-elmatareya.St5-elmatareya.St', 220, 9500, 'Cash', 'Mohamed', 10, 'Test', 'Test', 'Villa Test', 'high', 1, 'A115', 1, 1, 'villa.png'),
(2, 'tagmou3 awel yasmeen 5', 'tagmou3 awel yasmeen 5 door awel ba3d el2ardy', 500, 1050000, 'instalment', 'salah', 1555134563, 'sahaka gameealgdn\r\n', 'shaka 2gmd\r\n', 'villa 3la zero rsha wrneesh\r\n', 'high', 1, 'A12', 1, 2, 'sala6.jpeg'),
(3, 'zhara madint nasr\r\n', 'zhara madint nasr elqt3a 15 shaka 3\r\n', 300, 2000000, 'Cash', 'Yonus', 1115232795, 'shaqa fshee5a\r\n', 'shaqa fshee5a fsh5\r\n', 'speed shaqa\r\n', 'mid', 1, 'A13', 1, 1, 'sala11.jpeg'),
(4, 'banafsg 5 3mrat', 'banafsg 5 3mrat door awel ba3d a2rdy\r\n', 250, 1000000, 'Cash', 'Speed', 1097262974, 'شفة بحري رشة\r\n', 'شفة بحري رشة ورنيش\r\n', 'shaqa blbnfsg\r\n', 'low\r\n', 1, 'A14', 1, 1, 'sala10.jpeg'),
(5, 'nargs vill 3', 'nargs vill 3 3mara 5 door 3\r\n', 500, 3000000, 'instalment', 'Youssef Alaa\r\n', 1114653056, 'شقة فبلي جارها حلو\r\n', 'شقة فبلي جارها حلو \r\nشفة برحة و فرحة تفتح النفس', 'Apartment penthouse view landscape with old price\r\n', 'high', 1, 'A15', 1, 1, 'sala1.jpeg'),
(6, 'west elbld bganb elmsgd\r\n', 'west elbld bganb elmsgd door 4 case on ground\r\n', 700, 1200000, 'Cash', 'Alaa', 102015641, 'shaqa bgware elmsgd mmkn tsly mn elblakoona\r\n', 'shaqa bgware elmsgd mmkn tsly mn elblakoona fshee5a yooogad takeef fe odot joex byboz awle elsummer', 'A Palace for sale in CFC In Al-Futtaim', 'mid', 1, 'A16', 1, 2, 'sala13.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `ID` int(200) NOT NULL,
  `NameOFAttribute` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`ID`, `NameOFAttribute`) VALUES
(1, 'Flat'),
(2, 'Finishing'),
(3, 'No.Rooms'),
(4, 'No.Bathrooms'),
(5, 'NumberOffloors'),
(6, 'Doublex'),
(7, 'TypeOFActivity'),
(8, 'TheNumberOFAB'),
(9, 'Type');

-- --------------------------------------------------------

--
-- Table structure for table `eav`
--

CREATE TABLE `eav` (
  `NewId` int(200) NOT NULL,
  `AllID` int(200) NOT NULL,
  `AtrributeID` int(200) NOT NULL,
  `Value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eav`
--

INSERT INTO `eav` (`NewId`, `AllID`, `AtrributeID`, `Value`) VALUES
(1, 1, 4, '1'),
(2, 4, 4, '2'),
(3, 3, 4, '3'),
(4, 4, 4, '4'),
(5, 1, 4, '2'),
(6, 6, 4, '3'),
(7, 1, 3, '3'),
(8, 2, 3, '3'),
(9, 3, 3, '2'),
(10, 4, 3, '2'),
(11, 5, 3, '1'),
(12, 6, 3, '1'),
(13, 1, 2, '1'),
(14, 2, 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE `errors` (
  `ErroNum` int(200) NOT NULL,
  `Level` varchar(200) NOT NULL,
  `Message` varchar(200) NOT NULL,
  `FileLog` varchar(200) NOT NULL,
  `LineNum` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `ID` int(255) NOT NULL,
  `typeName` varchar(255) NOT NULL,
  `area` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rentPrice` int(255) NOT NULL,
  `furnished` int(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `FD` varchar(255) NOT NULL,
  `TOR` varchar(255) NOT NULL,
  `Start_OF_Rent` varchar(255) NOT NULL,
  `END_OF_Rent` varchar(255) NOT NULL,
  `LessorName` varchar(255) NOT NULL,
  `TenantName` varchar(255) NOT NULL,
  `LessorNum` int(255) NOT NULL,
  `TenantNum` int(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`ID`, `typeName`, `area`, `description`, `rentPrice`, `furnished`, `floor`, `FD`, `TOR`, `Start_OF_Rent`, `END_OF_Rent`, `LessorName`, `TenantName`, `LessorNum`, `TenantNum`, `images`, `code`) VALUES
(1, 'Villa', 255, 'sad', 2500, 1, '1', '1', '2022-05-04', '2022-04-04', '2023-04-04', 'youssef', 'صلاح', 101, 10, '', 'A15'),
(2, 'Flat', 255, 'a Flat', 1500, 1, '9', 'True', '2022-05-04', '2022-04-04', '2023-04-04', 'Yonus', 'Yusuf', 101, 10, '', 'B16'),
(3, 'clinic', 1000, 'A clinic', 15000, 1, '1', 'False', '2022-05-04', '2022-04-04', '2023-04-04', 'صلاح', 'Hussen', 101, 10, '', 'V10'),
(4, 'clinic', 255, 'a Store', 2500, 1, '10', '2', '2022-05-04', '2022-04-04', '2023-04-04', 'Walid', 'Tarek', 101, 10, '', 'D12');

-- --------------------------------------------------------

--
-- Table structure for table `typeofestate`
--

CREATE TABLE `typeofestate` (
  `TypeID` int(200) NOT NULL,
  `TypeName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofestate`
--

INSERT INTO `typeofestate` (`TypeID`, `TypeName`) VALUES
(1, 'Flats'),
(2, 'Residential Building'),
(3, 'Villa'),
(4, 'Store'),
(5, 'clinic'),
(6, 'Schools'),
(7, 'Farm'),
(8, 'Factory'),
(9, 'Land');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(200) NOT NULL,
  `ID` int(255) NOT NULL,
  `Rank` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `ID`, `Rank`, `password`, `email`, `image`) VALUES
('TOREND', 5, 'User', '$2y$10$KBR6nBppfsv5AvFhmFrBIuI40OFpCMW.1Wpxylgobhms92l39kxSm', 'hady@gmail.com', 'Hady.jpg'),
('Yonus', 6, 'User', '$2y$10$fIbC/kpRnhFJ5yH5z5s2T.dZfv09TkkTInRwiVLEqHV4LhXWc/QFm', 'Yonus@gmail.com', 'Yonus.jpg'),
('Joe', 7, 'User', '$2y$10$Y/.QzZYLqTb1sOQOhPBtrenUlYfBmVTmi9aAAZyo10VNBLchBbKpm', 'Joe@gmail.com', 'Joe.jpg'),
('Salah', 8, 'User', '$2y$10$aAgU0eOaor0b5Nazm2ehl.uZGWkus74aw/Wcb6zSE2zf0K2s0MdmG', 'Salah@gmai.com', 'Salah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `UserID` int(200) NOT NULL,
  `All ID` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`ID`,`UserID`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `q` (`UserID`);

--
-- Indexes for table `allestate`
--
ALTER TABLE `allestate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `eav`
--
ALTER TABLE `eav`
  ADD PRIMARY KEY (`NewId`,`AllID`,`AtrributeID`) USING BTREE,
  ADD KEY `AllID` (`AllID`),
  ADD KEY `AtrributeID` (`AtrributeID`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `typeofestate`
--
ALTER TABLE `typeofestate`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`UserID`,`All ID`) USING BTREE,
  ADD KEY `All ID` (`All ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `allestate`
--
ALTER TABLE `allestate`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eav`
--
ALTER TABLE `eav`
  MODIFY `NewId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typeofestate`
--
ALTER TABLE `typeofestate`
  MODIFY `TypeID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `UserID` int(200) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD CONSTRAINT `q` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qq` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `allestate`
--
ALTER TABLE `allestate`
  ADD CONSTRAINT `allestate_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `typeofestate` (`TypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eav`
--
ALTER TABLE `eav`
  ADD CONSTRAINT `eav_ibfk_1` FOREIGN KEY (`AllID`) REFERENCES `allestate` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eav_ibfk_2` FOREIGN KEY (`AtrributeID`) REFERENCES `attribute` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`All ID`) REFERENCES `allestate` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
