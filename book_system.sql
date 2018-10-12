-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 okt 2018 kl 15:04
-- Serverversion: 10.1.34-MariaDB
-- PHP-version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `book_system`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `author`
--

CREATE TABLE `author` (
  `AuthorID` int(11) NOT NULL,
  `F_name` varchar(255) NOT NULL,
  `L_name` varchar(255) NOT NULL,
  `PN` varchar(255) DEFAULT NULL,
  `Birthyear` year(4) DEFAULT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `author`
--

INSERT INTO `author` (`AuthorID`, `F_name`, `L_name`, `PN`, `Birthyear`, `Link`) VALUES
(1, 'Kaito', 'Kuroba', '1642061089699', 1998, 'https://wowenwilsonquiz.com/'),
(2, 'Izuku', 'Midoriya', '1629033029999', 2000, 'http://corndog.io/'),
(3, 'Shinishi', 'Kudo', '59864569854096', 1998, 'https://heeeeeeeey.com/'),
(4, 'Diablo', 'DemonLord', NULL, NULL, 'http://eelslap.com/'),
(5, 'Katsuki', 'Bakugo', NULL, 2000, 'http://www.staggeringbeauty.com/');

-- --------------------------------------------------------

--
-- Tabellstruktur `author_books`
--

CREATE TABLE `author_books` (
  `Book_ID` int(11) NOT NULL,
  `Author_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `author_books`
--

INSERT INTO `author_books` (`Book_ID`, `Author_ID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1),
(7, 2),
(8, 3),
(9, 4);

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Edition` int(11) NOT NULL,
  `Pub_year` year(4) NOT NULL,
  `Inc_date` date NOT NULL,
  `Reserved` tinyint(1) NOT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`BookID`, `ISBN`, `Title`, `Pages`, `Edition`, `Pub_year`, `Inc_date`, `Reserved`, `User_ID`) VALUES
(1, '564645645645', 'Cat on the moon', 345, 3, 1990, '2018-09-24', 1, NULL),
(2, '67433548833', 'Harry Potter', 468, 1, 2008, '2018-09-07', 0, NULL),
(3, '56464544646456', 'Potter mastery 1', 233, 1, 2012, '2018-09-02', 0, NULL),
(4, '945645464556', 'Potter mastery 2', 283, 2, 2013, '2018-09-01', 0, NULL),
(5, '5464754722342', 'Hunger games', 564, 1, 2015, '2018-09-08', 0, NULL),
(6, '97655345', 'Love and war', 122, 3, 2008, '2018-09-02', 1, NULL),
(7, '345345345345', 'Cook master', 864, 2, 2018, '2018-09-06', 0, NULL),
(8, '345676765', 'DIY 101', 89, 1, 2012, '2018-09-02', 0, NULL),
(9, '765456435678', 'Death angels', 345, 1, 2016, '2018-09-05', 0, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `gallery`
--

CREATE TABLE `gallery` (
  `ImgID` int(11) NOT NULL,
  `ImgPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `gallery`
--

INSERT INTO `gallery` (`ImgID`, `ImgPath`) VALUES
(12, 'uploads/books.png'),
(13, 'uploads/4f05b0c8c29216dc003b5774510878f1.jpg'),
(14, 'uploads/183325-education.png'),
(15, 'uploads/pile-of-books.jpg'),
(21, 'uploads/Asset 1@4x.png'),
(22, 'uploads/20170809_142603.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `library`
--

CREATE TABLE `library` (
  `LibraryID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `library`
--

INSERT INTO `library` (`LibraryID`, `Title`) VALUES
(1, 'Gamleby local Library'),
(2, 'Stockholm National Library'),
(3, 'Vadstena museum and library'),
(4, 'Local church library');

-- --------------------------------------------------------

--
-- Tabellstruktur `library_books`
--

CREATE TABLE `library_books` (
  `LibraryID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `Barcode` int(11) NOT NULL,
  `ShelfID` int(11) NOT NULL,
  `Inc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `publishers`
--

CREATE TABLE `publishers` (
  `PubID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `publishers`
--

INSERT INTO `publishers` (`PubID`, `Title`) VALUES
(1, 'Publisher AB'),
(2, 'Books and others AB'),
(3, 'Writers den AB'),
(4, 'Books are life AB');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`) VALUES
(1, 'Admin', 'iCodethings'),
(2, 'BookNrd48', 'iLOVEbooks');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`);

--
-- Index för tabell `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ImgID`);

--
-- Index för tabell `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`LibraryID`);

--
-- Index för tabell `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`PubID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `author`
--
ALTER TABLE `author`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ImgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT för tabell `library`
--
ALTER TABLE `library`
  MODIFY `LibraryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `publishers`
--
ALTER TABLE `publishers`
  MODIFY `PubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
