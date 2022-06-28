-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 28, 2022 at 02:50 PM
-- Server version: 10.8.3-MariaDB-1:10.8.3+maria~jammy
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `eventType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `eventType`) VALUES
(1, 'coding'),
(3, 'food'),
(10, 'music');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventName`, `eventDate`, `price`, `description`, `image`, `categoryID`) VALUES
(4, 'Lechi Kondens', '2022-07-08', '12.50', 'Zonnige dagen zijn aangebroken en wij gaan SENDE in AMSTERDAM!', 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bXVzaWMlMjBldmVudHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60', 10),
(5, 'EL CHAVAL DE LA BACHATA', '2022-07-08', '9.99', 'EL CHAVAL DE LA BACHATA LIVE ON STAGE Bachata Lovers Ticket limited edition', 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8bXVzaWMlMjBldmVudHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60', 10),
(7, 'Kaasmarkt Alkmaar', '2022-07-01', '0.00', 'Iedere vrijdag tot en met 30 september 2022 kun je in Alkmaar de beroemde Kaasmarkt bezoeken', 'https://www.kaasmarkt.nl/media/1037/rvf_1078-version-3.jpg?width=303&height=284&mode=crop', 3),
(8, 'Festival Bodega Norton Culinair ', '2022-07-02', '0.00', 'Geniet op dit foodfestival in Zoetermeer - het grootste openlucht restaurant van de regio. Heerlijke happen, lekkere wijntjes en toffe muziek!', 'https://static.wixstatic.com/media/a46e92_79631eb5cdb448a9ba3f8006e10dfe1c~mv2_d_2048_1365_s_2.jpg/v1/fill/w_1899,h_956,al_b,q_85,usm_0.66_1.00_0.01,enc_auto/a46e92_79631eb5cdb448a9ba3f8006e10dfe1c~mv2_d_2048_1365_s_2.jpg', 3),
(9, 'Code 101: Explore Software Development', '2022-10-01', '100.00', 'Get a sneak peek at Code Fellows learning experience, find out how websites are built, and code a webpage yourself!', 'https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F186475469%2F70704071081%2F1%2Foriginal.20200731-010435?w=800&auto=format%2Ccompress&q=75&sharp=10&rect=0%2C0%2C1080%2C540&s=fc12310c8b8012a50f52f4832d5c7eeb', 1),
(10, 'The Code Canteen', '2022-07-07', '24.99', 'The Code Canteen opens weekly to give you a scheduled time to learn to code and to learn with others.', 'https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F122473611%2F215819319602%2F1%2Foriginal.20200412-121518?w=800&auto=format%2Ccompress&q=75&sharp=10&rect=0%2C0%2C1080%2C540&s=2c391846e86dfbe9e797371512d84f1e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', '$2a$04$NxcsgWhNI1DMw5y4Yk4agexOmhS0lfQsvThdmi1XwqhFWYCktMPF6', 'admin@test.com', 'Admin'),
(2, 'james', '$2a$04$yxbKtlEzgAT8MHBVeE/OOug8mDtaQyk3J.GBjXpgQe09umhYCJw7u', 'james@test.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `event_catagory` (`categoryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_catagory` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
