-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 12:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `Name`) VALUES
(1, 'Warsaw'),
(2, 'Lódz'),
(3, 'Krakow'),
(4, 'Wroclaw'),
(5, 'Poznan'),
(6, 'Gdansk'),
(7, 'Szczecin'),
(8, 'Bydgoszcz'),
(9, 'Lublin'),
(10, 'Katowice');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ImageID` int(11) NOT NULL,
  `RestID` int(11) NOT NULL,
  `Image` varchar(1000) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ImageID`, `RestID`, `Image`, `FileName`, `Description`) VALUES
(1, 1, 'images\\Ceska Pivni - Warsaw\\restauracja-ceska.jpg', 'Ceska Pivni Restaurant', 'Front view of Ceska Pivni Restaurant'),
(2, 1, 'images\\Ceska Pivni - Warsaw\\restauracja-ceska_2.jpg', 'Ceska Pivni Restaurant', 'Side view Ceska Pivni Restaurant'),
(3, 1, 'images\\Ceska Pivni - Warsaw\\restauracja-ceska inside 2.jpg', 'Ceska Pivni Restaurant', 'Inside of Ceska Pivni Restaurant'),
(6, 3, 'images\\Caffee-galeria-sztuki - Warsaw\\caffee-galeria-sztuki.jpg', 'Caffee & Bistro Galeria Sztuki', 'Outside of Caffee & Bistro Galeria Sztuki'),
(8, 3, 'images\\Caffee-galeria-sztuki - Warsaw\\food 1.jpg', 'Caffee & Bistro Galeria Sztuki\r\n', 'Desert served in Caffee & Bistro Galeria Sztuki\r\n'),
(10, 4, 'images\\Slawkowska 1 - Krakow\\slawkowska-1.jpg', 'Slawkowska 1', 'Inside of Slawkowska 1'),
(11, 5, 'images\\Garden - Krakow\\Garden.jpg', 'Garden Restaurant', 'Outside of Garden Restaurant '),
(12, 5, 'images\\Garden - Krakow\\Garden inside.jpg', 'Garden Restaurant', 'Inside of Garden Restaurant'),
(13, 7, 'images\\Konspira - Wroclaw\\inside.jpg', 'Konspira Restaurant \r\n', 'Inside of Konspira Restaurant '),
(17, 2, 'images\\bazyliszek 2.jpg', 'Test', 'Test image upload'),
(18, 2, 'images\\bazyliszek food 1.jpg', 'Test 2', 'Multiple images upload test'),
(19, 2, 'images\\bazyliszek food 2.jpg', 'Test 2', 'Multiple images upload test'),
(23, 26, 'images\\bazyliszek food 2.jpg', 'aa', 'aaa'),
(24, 26, 'images\\bazyliszek inside.jpg', 'aa', 'aaa'),
(25, 26, 'images\\bazyliszek outside.jpg', 'aa', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RateID` int(11) NOT NULL,
  `Rating` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RateID`, `Rating`) VALUES
(1, 'Don’t come nearby!'),
(2, 'Something	needs	changing'),
(3, 'Neutral'),
(4, 'Good	quality'),
(5, 'Best	choice!');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Rating` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `CityID` int(11) NOT NULL,
  `ContactNum` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestID`, `Name`, `Description`, `Rating`, `Address`, `CityID`, `ContactNum`, `Email`, `Website`) VALUES
(1, 'Ceska Pivni', 'MEALS: Lunch, Dinner, Brunch\r\n\r\n\r\nCUISINES: Bar, European, Pub, Czech, Eastern European, Central European\r\n\r\n\r\nFEATURES: Reservations, Outdoor Seating, Seating, Highchairs Available, Wheelchair Accessible, Serves Alcohol, Full Bar, Free Wifi, Accepts Credit Cards, Table Service', 4, 'ul. Chmielna 35, \r\n00-021', 1, '+48 602 333 444', 'ceska@ceska.pl', 'http://ceska.pl'),
(2, 'Bazyliszek', 'SPECIAL DIETS: Vegetarian-Friendly\r\n\r\nMEALS: Lunch, Dinner, Brunch, Late Night\r\n\r\nCUISINES: Polish, Bar, European, Eastern European, Central European, Grill\r\n\r\nFEATURES: Reservations, Outdoor Seating, Private Dining, Seating, Highchairs Available, Serves Alcohol, Full Bar, Accepts Credit Cards, Table Service', 4, 'Ul. Rynek Starego Miasta 1/3, \r\n00-272', 1, '+48 22 831 18 41', 'info@bazyliszek.waw.pl', 'http://bazyliszek.waw.pl'),
(3, 'Caffee & Bistro Galeria Sztuki', 'PRICE RANGE: PLN 26 - PLN 52\r\n\r\nSPECIAL DIETS: Vegetarian-Friendly\r\n\r\nMEALS: Breakfast, Lunch, Dinner, Brunch\r\n\r\nCUISINES: Polish, Bar, Cafe, European, Central European\r\n\r\nFEATURES: Reservations, Seating, Serves Alcohol, Table Service', 5, 'ul. Zabkowska 13, \r\n03-736\r\n', 1, '+48 22 619 81 09', 'caffee@stanowski.pl', 'http://caffee.stanowski.pl'),
(4, 'Slawkowska 1\r\n', 'PRICE RANGE: PLN 11 - PLN 67\r\n\r\n\r\nSPECIAL DIETS: Gluten Free Options\r\n\r\n\r\nMEALS: Lunch, Dinner, Drinks, Brunch\r\n\r\nCUISINES: Steakhouse, Polish, European, Grill, Soups, Eastern European, Central European\r\n\r\n\r\nFEATURES: Reservations, Outdoor Seating, Seating, Serves Alcohol, Full Bar, Wine and Beer, Accepts Mastercard, Accepts Visa, Free Wifi, Wheelchair Accessible, Accepts Credit Cards, Table Service, Highchairs Available', 5, 'ul. Slawkowska 1, \r\n31-014', 3, '+48 12 422 51 41', 'restauracja@slawkowska1.pl', 'http://www.slawkowska1.pl'),
(5, 'Garden', 'PRICE RANGE: PLN 131 - PLN 378\r\n\r\nSPECIAL DIETS: Gluten-Free Options\r\n\r\nMEALS: Dinner, Drinks\r\n\r\nCUISINES: International, Fusion, Central European\r\n\r\nFEATURES: Reservations, Outdoor Seating, Private Dining, Seating, Parking Available, Street Parking, Validated Parking, Free Off-Street Parking, Serves Alcohol, Wine and Beer, Accepts American Express, Accepts Mastercard, Accepts Visa, Free Wifi, Accepts Discover, Accepts Credit Cards, Full Bar', 5, 'ul. Krowoderska 71, \r\n32-158', 3, '+48 12 354 20 20 ', 'restauracja@gardenrestauracja.pl', 'http://gardenrestauracja.pl'),
(7, 'Konspira ', 'SPECIAL DIETS: Vegetarian Friendly\r\n\r\n\r\nMEALS: Lunch, Dinner, Brunch\r\n\r\n\r\nCUISINES: Polish, European, Eastern European, Central European\r\n\r\n\r\nFEATURES: Reservations, Outdoor Seating, Private Dining, Seating, Highchairs Available, Serves Alcohol, Full Bar, Wine and Beer, Accepts American Express, Accepts Mastercard, Accepts Visa, Free Wifi, Accepts Credit Cards, Table Service', 5, 'pl. Solny 11, \r\n50-061', 4, '+48 796 326 600', 'rezerwacje.konspira@gmail.com', 'https://restauracjakonspira.pl'),
(26, 'a', 'asdfgh', 2, 'Warszawska 15/5', 8, '538353672', 'lidyagnuramo@gmail.com', 'aa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `restaurants`
-- (See below for the actual view)
--
CREATE TABLE `restaurants` (
`RestID` int(11)
,`Name` varchar(255)
,`Description` text
,`Rating` int(11)
,`Address` varchar(255)
,`CityName` varchar(255)
,`ContactNum` varchar(255)
,`Email` varchar(255)
,`Website` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `RevID` int(11) NOT NULL,
  `RestID` int(11) NOT NULL,
  `ReviewerName` varchar(255) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`RevID`, `RestID`, `ReviewerName`, `Comment`) VALUES
(4, 2, 'Lidya Nuramo ', 'Good service '),
(8, 3, 'Lidya Nuramo ', 'Hello'),
(9, 3, 'User A', 'Test'),
(11, 26, 'Anonymous', 'aaaaaaaa'),
(12, 26, 'Lidya Nuramo ', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Email`, `FirstName`, `LastName`, `Password`) VALUES
(16, 'lidyagnuramo@gmail.com', 'Lidya', 'Nuramo', 'asdfgh'),
(17, 'lidyanuramo@gmail.com', 'Lidya', 'Nuramo', '123456'),
(18, 'tsionnuramo@gmail.com', 'Tsion', 'Nuramo', '123456'),
(19, 'lidyagintamo@gmail.com', 'Test', 'Account', '123456'),
(20, 'testaccount@ta.pl', 'Test', 'Acc', '123456'),
(21, 'test.account@ta.pl', 'Test', 'Account', '123456');

-- --------------------------------------------------------

--
-- Structure for view `restaurants`
--
DROP TABLE IF EXISTS `restaurants`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `restaurants`  AS  select `restaurant`.`RestID` AS `RestID`,`restaurant`.`Name` AS `Name`,`restaurant`.`Description` AS `Description`,`restaurant`.`Rating` AS `Rating`,`restaurant`.`Address` AS `Address`,`city`.`Name` AS `CityName`,`restaurant`.`ContactNum` AS `ContactNum`,`restaurant`.`Email` AS `Email`,`restaurant`.`Website` AS `Website` from (`restaurant` join `city` on((`restaurant`.`CityID` = `city`.`CityID`))) order by `restaurant`.`Name` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `ImageToRest` (`RestID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RateID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestID`),
  ADD KEY `RestToCity` (`CityID`),
  ADD KEY `Rating` (`Rating`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`RevID`),
  ADD KEY `RevToRest` (`RestID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RevID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `ImageToRest` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`RestID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `RestToCity` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `RestToRate` FOREIGN KEY (`Rating`) REFERENCES `rating` (`RateID`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `RevToRest` FOREIGN KEY (`RestID`) REFERENCES `restaurant` (`RestID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
