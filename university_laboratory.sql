-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lis 2021, 00:20
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
(1, 'microscope', 'EC.1001 ', 'EcoBlue', 'img/microscope.jpg', 'The outstanding optical performance of the ergonomic Euromex BlueLine microscopes enables long productive working sessions for students for beginner, intermediate, and advanced science teaching classes. Microscopes for education need to be easy-to use and student-friendly, which means able to withstand extensive use and rough handling', 'https://www.laboratoriumdiscounter.nl/en/ecoblue.html?gclid=Cj0KCQjwqp-LBhDQARIsAO0a6aKkiAyZPEPtdsld6iJ9n_q3FbDdX2oJqqDc4wDOCdPhEGzwqjkfvTkaAofDEALw_wcB', 'microscope', 5),
(2, 'ammeter', '901-0368', ' RS PRO', 'img/ammeter.jpg', 'Normy\r\nIEC51, BS89, DIN 43780, VDE 0410', 'https://pl.rs-online.com/web/p/amperomierze/9010368/?cm_mmc=PL-PLA-DS3A-_-google-_-CSS_PL_PL_Automatyka+i+sterowanie_Whoop_x-_-(PL:Whoop!)+Amperomierze-_-9010368&matchtype=&pla-476169180174&gclid=Cj0KCQjwqp-LBhDQARIsAO0a6aIZexQaywl7ohlBZWZsX3VgUBzfl10CNN5rcNwgLz4dYaw3ly2R9VMaApF0EALw_wcB&gclsrc=aw.ds', 'chemistry', 3),
(3, 'bunsen burner', 'HSG-090', 'Gelsonlab', 'img/bunsen_burner.jpg', 'Bunsen Burner LP Gas with Needle Valve. For LP or Bottled Gas. Nickel plated brass burner tube 13 mm diameter with rotatable non-removable air regulator, on stable cast iron base, baked hammertone finish, with serrated gas inlet tube. Provided with threaded needle valve to regulate the intensity of the flame.', 'https://www.gelsonlab.com/bunsen-burner.html', 'chemistry', 10),
(4, 'crucible', 'HSCP-003', 'Gelsonlab', 'img/crucible.jpg', 'Gelsonlab HSCP-003 Porcelain crucible with lid , Ceramic crucible with lid for Chemical Laboratory   ', 'https://www.gelsonlab.com/porcelain-crucible-with-lid.html', 'chemistry', 15),
(5, 'linear expansion app', 'HSPT-014', 'Gelsonlab', 'img/linear_expansion_app.jpg', 'Heat Conduction Experiment is comprised of copper, Brass, aluminum, steel. An effective tool for demonstrating the coefficient of the expansion of metals. The rod is placed inside a tube that has both an Inlet and Outlet for steam. Compare the expanded length of the rod to the temperature difference before and after the rod expands by using a thermometer. The extent of the rod\'s expansion is measured by a micrometer.', 'https://www.gelsonlab.com/heat-conduction-experiment.html', 'physics', 1),
(6, 'dropping bottle', 'HSCG-145', 'Gelsonlab', 'img/dropping_bottle.jpg', 'White Glass Dropping bottle is suitable for the laboratory of medical and health, industrial and mining enterprises, colleges and universities, etc. And can be used as a standard solution for storing various reagents, an indicator solution, and a drop analysis.', 'https://www.gelsonlab.com/white-glass-dropping-bottle.html', 'chemistry', 6),
(8, 'test', 'test', 'test', 'test', 'test', 'test', 'microscope', 7),
(12, 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'chemistry', 105);

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

--
-- Zrzut danych tabeli `hire`
--

INSERT INTO `hire` (`hire_id`, `equipment_id`, `equipment_name`, `user_id`, `login`, `date_borrow`, `date_return`) VALUES
(1, 1, 'microscope', 1, 'jennifer', '2021-09-30 22:21:46', '2021-10-07 22:21:46'),
(2, 2, 'ammeter', 2, 'emma', '2021-10-14 22:28:10', NULL),
(3, 1, 'microscope', 5, 'gregwint', '2021-10-21 22:29:24', NULL),
(6, 4, 'crucible', 4, 'benferinga', '2021-10-20 22:46:50', NULL),
(7, 4, 'crucible', 5, 'giopar', '2021-10-21 23:01:46', NULL),
(8, 3, 'bunsen burner', 3, 'gregwint', '2021-10-13 22:47:47', NULL),
(9, 3, 'bunsen burner', 1, 'jennifer', '2021-10-21 22:51:37', NULL),
(10, 4, 'cruclible', 2, 'emma', '2021-10-21 23:03:08', NULL);

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
-- Zastąpiona struktura widoku `report_for_employee`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `report_for_employee` (
`equipment_name` varchar(20)
,`producer` varchar(20)
,`model` varchar(20)
,`amount` int(11)
,`tag` varchar(20)
,`description` text
,`URL` varchar(1000)
,`image` varchar(1000)
,`hire_id` int(11)
,`equipment_id` int(11)
,`user_id` int(11)
,`login` varchar(20)
,`date_borrow` timestamp
,`date_return` timestamp
,`user_name` varchar(20)
,`surname` varchar(20)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `report_for_guest`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `report_for_guest` (
`equipment_id` int(11)
,`equipment_name` varchar(20)
,`producer` varchar(20)
,`model` varchar(20)
,`amount` int(11)
,`amount_free` bigint(22)
,`tag` varchar(20)
,`description` text
,`URL` varchar(1000)
,`image` varchar(1000)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `report_for_student`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `report_for_student` (
`equipment_name` varchar(20)
,`producer` varchar(20)
,`model` varchar(20)
,`amount` int(11)
,`tag` varchar(20)
,`description` text
,`URL` varchar(1000)
,`image` varchar(1000)
,`hire_id` int(11)
,`equipment_id` int(11)
,`user_id` int(11)
,`login` varchar(20)
,`date_borrow` timestamp
,`date_return` timestamp
);

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
(2, 'TEST'),
(3, 'lll');

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
(1, 'jennifer', 'Jennifer', 'Doudna', 'Jennifer.Doudna@zai.com', '5ffba41ecf29473f80665c8a8d0a64fd', 'student'),
(2, 'emma', 'Emmanuelle', 'Charpentier', 'Emmanuelle.Charpentier@zai.com', '5ffba41ecf29473f80665c8a8d0a64fd', 'student'),
(3, 'gregwint', 'Gregory', 'Winter', 'Gregory.Winter@zai.com', '5ffba41ecf29473f80665c8a8d0a64fd', 'student'),
(4, 'benferinga', 'Ben', 'Feringa', 'Ben.Feringa@zai.com', '5ffba41ecf29473f80665c8a8d0a64fd', 'student'),
(5, 'giopar', 'Giorgio', 'Parisi', 'Giorgio.Parisi@zai.com', '5ffba41ecf29473f80665c8a8d0a64fd', 'student'),
(6, 'alfnob', 'Alfred', 'Nobel', 'Alfred.Nobel@zai.com', 'ab601a6f79e6a06d278e5c4dae6e77fa', 'employee'),
(32, 'test', 'test', 'test', 'test', '0b2b6aa20c1508f1ab48ea810846087d', 'student'),
(33, '11', '11', '11', '11', 'c4f49af8f2f10d715cc13b5429f7f6a0', 'student');

-- --------------------------------------------------------

--
-- Struktura widoku `report_for_employee`
--
DROP TABLE IF EXISTS `report_for_employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_for_employee`  AS   (select `e`.`equipment_name` AS `equipment_name`,`e`.`producer` AS `producer`,`e`.`model` AS `model`,`e`.`amount` AS `amount`,`e`.`tag` AS `tag`,`e`.`description` AS `description`,`e`.`URL` AS `URL`,`e`.`image` AS `image`,`h`.`hire_id` AS `hire_id`,`h`.`equipment_id` AS `equipment_id`,`h`.`user_id` AS `user_id`,`h`.`login` AS `login`,`h`.`date_borrow` AS `date_borrow`,`h`.`date_return` AS `date_return`,`u`.`user_name` AS `user_name`,`u`.`surname` AS `surname`,`u`.`email` AS `email` from ((`equipments` `e` join `hire` `h` on(`e`.`equipment_id` = `h`.`equipment_id`)) join `users` `u` on(`u`.`login` = `h`.`login`)) where `h`.`date_return` is null)  ;

-- --------------------------------------------------------

--
-- Struktura widoku `report_for_guest`
--
DROP TABLE IF EXISTS `report_for_guest`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_for_guest`  AS   (select `e`.`equipment_id` AS `equipment_id`,`e`.`equipment_name` AS `equipment_name`,`e`.`producer` AS `producer`,`e`.`model` AS `model`,`e`.`amount` AS `amount`,ifnull(`e`.`amount`,0) - ifnull(`h`.`used`,0) AS `amount_free`,`e`.`tag` AS `tag`,`e`.`description` AS `description`,`e`.`URL` AS `URL`,`e`.`image` AS `image` from (`equipments` `e` left join (select `hire`.`equipment_id` AS `equipment_id`,ifnull(count(0),0) AS `used` from `hire` where `hire`.`date_return` is null group by `hire`.`equipment_id`) `h` on(`e`.`equipment_id` = `h`.`equipment_id`)) order by `e`.`equipment_id`)  ;

-- --------------------------------------------------------

--
-- Struktura widoku `report_for_student`
--
DROP TABLE IF EXISTS `report_for_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_for_student`  AS   (select `e`.`equipment_name` AS `equipment_name`,`e`.`producer` AS `producer`,`e`.`model` AS `model`,`e`.`amount` AS `amount`,`e`.`tag` AS `tag`,`e`.`description` AS `description`,`e`.`URL` AS `URL`,`e`.`image` AS `image`,`h`.`hire_id` AS `hire_id`,`h`.`equipment_id` AS `equipment_id`,`h`.`user_id` AS `user_id`,`h`.`login` AS `login`,`h`.`date_borrow` AS `date_borrow`,`h`.`date_return` AS `date_return` from (`equipments` `e` join `hire` `h`) where `e`.`equipment_id` = `h`.`equipment_id` and `h`.`date_return` is null order by `e`.`equipment_id`)  ;

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
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `hire`
--
ALTER TABLE `hire`
  MODIFY `hire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
