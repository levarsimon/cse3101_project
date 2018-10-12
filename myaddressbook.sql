-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 09:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myaddressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlenameone` varchar(30) NOT NULL,
  `middlenametwo` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `homenumber` int(15) NOT NULL,
  `worknumber` int(15) NOT NULL,
  `mobilenumber` int(15) NOT NULL,
  `addresslineone` varchar(100) NOT NULL,
  `addresslinetwo` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `memo` varchar(450) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contactID`, `firstname`, `middlenameone`, `middlenametwo`, `lastname`, `nickname`, `homenumber`, `worknumber`, `mobilenumber`, `addresslineone`, `addresslinetwo`, `email`, `dob`, `memo`, `userID`) VALUES
(1, 'Egbert', 'Carl', '', 'Adams', 'Eggsy', 2235964, 2256439, 6253924, 'TT Bent Street', 'Wortmanville', 'egbert_adams@yahoo.com', '1998-10-16', '', 2),
(2, 'Debra', 'Olga', 'Sandy', 'Adolphus', 'Debbie', 4445224, 4444522, 6442425, '337 Block 22', 'Wismar', 'debra_adolphus@gmail.com', '1969-04-08', '', 3),
(3, 'Charles', 'Anthony', 'David', 'Adonis', '', 3334828, 3332488, 6244882, '17 Lad Lane', 'New Amsterdam', 'charles_adonis@yahoo.com', '1984-06-22', '', 2),
(4, 'Colleen', 'Fazia', 'Nia', 'Agard', 'Fazzy', 2181842, 2274218, 6617824, '1636', 'South Ruimveldt Park', 'colleen_agard@gmail.com', '1989-11-25', '', 3),
(5, 'Bibi', 'Nazmoon', 'Zabida', 'Bacchus', 'Aunty B', 2203249, 2259423, 6772439, '171 Seventh Street', 'Success', 'bibi_bacchus@yahoo.com', '1975-10-09', '', 2),
(6, 'Bernadette', 'Leoni', '', 'Barker', '', 2275823, 2252783, 6148532, '38 Da Silva Street', 'Newtown Kitty', 'bernadette_barker@gmail.com', '1981-02-19', '', 3),
(7, 'Nicholas', 'Andre', '', 'Blackman', 'Nick', 2235618, 2266581, 6183522, '47 Joseph Pollydore Street', 'Lodge', 'nicholas_blackman@yahoo.com', '1991-07-02', '', 2),
(8, 'Darshanand', 'Loknauth', 'Lakeram', 'Brijanand', 'Jotie', 3354158, 3335814, 6621485, '20 #78 Village', 'Corentyne', 'darsha_b@gmail.com', '1971-05-13', '', 3),
(9, 'Margaret', 'Ann', '', 'Changlee', 'Maggie', 2278797, 2277789, 6778279, '10 Norton Street', 'Lodge', 'maggie_changlee@yahoo.com', '1978-07-26', '', 2),
(10, 'Radica', '', '', 'Charran', 'Baby', 2652288, 2265828, 6228582, '12 Last Street', 'Herstelling', 'radica_charran@gmail.com', '1987-01-11', '', 3),
(11, 'Marlon', 'Adrian', '', 'De Souza', '', 2181274, 2274811, 6182247, '1169 Pigeon Place', 'South Ruimveldt Park', 'marlon_desouza@yahoo.com', '1999-09-05', '', 2),
(12, 'Nandram', 'Boodram', '', 'Deochand', '', 3287932, 3283927, 6798223, '577 Bath', 'West Coast Berbice', 'nand_deochand@gmail.com', '1972-07-28', '', 3),
(13, 'Ron', 'Michael', '', 'Devonish', 'Ronnie', 2264677, 2267647, 6247627, '211 Middle Road', 'La Penitance', 'ronnie_devonish@yahoo.com', '2000-08-13', '', 2),
(14, 'Susan', 'Christine', '', 'Dorsett', '', 2258710, 2275801, 6875228, '333 Harpy Drive', 'North East La Penitance', 'susan_dorsett@gmail.com', '1992-03-04', '', 3),
(15, 'Shireen', '', '', 'Eastman', 'Sherry', 2704695, 2274059, 6275049, '245 Section B Non Parel', 'East Coast Demerara', 'sherry_eastman@yahoo.com', '1967-11-30', '', 2),
(16, 'Samantha', '', '', 'Edmonds', '', 4402233, 4402332, 6873322, 'C Bethune Street', 'Kwakwani', 'samantha_edmonds@gmail.com', '1976-11-30', '', 3),
(17, 'Sewpaul', 'Ramkarran', '', 'Etwaroo', 'Paulie', 2580391, 2581930, 6153109, '6 Broom Hall', 'Mahaicony', 'Sew_etwaroo@yahoo.com', '1985-07-08', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `user_type`) VALUES
(1, 'admin', '0954656babc828e90538effde271814a', 'admin'),
(2, 'user1', 'd63bc3b5d814f0644e4712173a0a9682', 'user'),
(3, 'user2', 'e7052a21b2db0f57879150ddbf32f791', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
