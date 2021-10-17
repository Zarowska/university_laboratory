-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Paź 2021, 03:06
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `university_laboratory`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipments`
--

CREATE TABLE `equipments` (
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(20) NOT NULL,
  `model` varchar(20) DEFAULT NULL,
  `producer` varchar(20) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `URL` varchar(1000) DEFAULT NULL,
  `tag` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `equipment_name`, `model`, `producer`, `image`, `description`, `URL`, `tag`, `amount`) VALUES
(1, 'microscope', 'EC.1001 ', 'EcoBlue', 'img/microscope.jpg', 'The outstanding optical performance of the ergonomic Euromex BlueLine microscopes enables long productive working sessions for students for beginner, intermediate, and advanced science teaching classes. Microscopes for education need to be easy-to use and student-friendly, which means able to withstand extensive use and rough handling', 'https://www.laboratoriumdiscounter.nl/en/ecoblue.html?gclid=Cj0KCQjwqp-LBhDQARIsAO0a6aKkiAyZPEPtdsld6iJ9n_q3FbDdX2oJqqDc4wDOCdPhEGzwqjkfvTkaAofDEALw_wcB', 'microscopes', 5),
(2, 'ammeter', '901-0368', ' RS PRO', NULL, 'Normy\r\nIEC51, BS89, DIN 43780, VDE 0410', 'https://pl.rs-online.com/web/p/amperomierze/9010368/?cm_mmc=PL-PLA-DS3A-_-google-_-CSS_PL_PL_Automatyka+i+sterowanie_Whoop_x-_-(PL:Whoop!)+Amperomierze-_-9010368&matchtype=&pla-476169180174&gclid=Cj0KCQjwqp-LBhDQARIsAO0a6aIZexQaywl7ohlBZWZsX3VgUBzfl10CNN5rcNwgLz4dYaw3ly2R9VMaApF0EALw_wcB&gclsrc=aw.ds', 'chemistry', 3),
(3, 'bunsen burner', 'HSG-090', 'Gelsonlab', 'https://i.trade-cloud.com.cn/upload/485/bunsen-burner_2295163.jpg', 'Bunsen Burner LP Gas with Needle Valve. For LP or Bottled Gas. Nickel plated brass burner tube 13 mm diameter with rotatable non-removable air regulator, on stable cast iron base, baked hammertone finish, with serrated gas inlet tube. Provided with threaded needle valve to regulate the intensity of the flame.', 'https://www.gelsonlab.com/bunsen-burner.html', 'chemistry', 10),
(4, 'crucible', 'HSCP-003', 'Gelsonlab', 'https://s.alicdn.com/@sc04/kf/HTB1nQ9sa.LrK1Rjy0Fj762YXFXap.png_300x300.png', 'Gelsonlab HSCP-003 Porcelain crucible with lid , Ceramic crucible with lid for Chemical Laboratory   ', 'https://www.gelsonlab.com/porcelain-crucible-with-lid.html', 'chemistry', 15),
(5, 'linear expansion app', 'HSPT-014', 'Gelsonlab', 'https://sc04.alicdn.com/kf/H536e7f8372974ef891b0ea11fa709d116.jpg', 'Heat Conduction Experiment is comprised of copper, Brass, aluminum, steel. An effective tool for demonstrating the coefficient of the expansion of metals. The rod is placed inside a tube that has both an Inlet and Outlet for steam. Compare the expanded length of the rod to the temperature difference before and after the rod expands by using a thermometer. The extent of the rod\'s expansion is measured by a micrometer.', 'https://www.gelsonlab.com/heat-conduction-experiment.html', 'physics', 1),
(6, 'dropping bottle', 'HSCG-145', 'Gelsonlab', 'https://m.media-amazon.com/images/I/41ELi-CFWYL._SX385_.jpg', 'White Glass Dropping bottle is suitable for the laboratory of medical and health, industrial and mining enterprises, colleges and universities, etc. And can be used as a standard solution for storing various reagents, an indicator solution, and a drop analysis.', 'https://www.gelsonlab.com/white-glass-dropping-bottle.html', 'chemistry', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hire`
--

CREATE TABLE `hire` (
  `hire_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `date_borrow` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_return` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `hire_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `date_borrow` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_return` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `tasks`
--

INSERT INTO `tasks` (`id`, `task`) VALUES
(1, 'DDD'),
(2, 'TEST');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` set('student','employee') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `login`, `user_name`, `surname`, `email`, `password`, `status`) VALUES
(1, 'jennifer', 'Jennifer', 'Doudna', 'Jennifer.Doudna@zai.com', '1', 'student'),
(2, 'emma', 'Emmanuelle', 'Charpentier', 'Emmanuelle.Charpentier@zai.com', '1', 'student'),
(3, 'gregwint', 'Gregory', 'Winter', 'Gregory.Winter@zai.com', '1', 'student'),
(4, 'benferinga', 'Ben', 'Feringa', 'Ben.Feringa@zai.com', '1', 'student'),
(5, 'giopar', 'Giorgio', 'Parisi', 'Giorgio.Parisi@zai.com', '1', 'student');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indeksy dla tabeli `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hire_id`),
  ADD KEY `hire_equipments` (`equipment_id`),
  ADD KEY `hire_users` (`user_id`);

--
-- Indeksy dla tabeli `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `hire`
--
ALTER TABLE `hire`
  MODIFY `hire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `hire`
--
ALTER TABLE `hire`
  ADD CONSTRAINT `hire_equipments` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`equipment_id`),
  ADD CONSTRAINT `hire_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
