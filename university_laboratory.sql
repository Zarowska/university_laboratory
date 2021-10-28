-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Paź 2021, 22:11
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
-- Struktura widoku `report_for_guest`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_for_guest`  AS   (select `e`.`equipment_id` AS `equipment_id`,`e`.`equipment_name` AS `equipment_name`,`e`.`producer` AS `producer`,`e`.`model` AS `model`,`e`.`amount` AS `amount`,ifnull(`e`.`amount`,0) - ifnull(`h`.`used`,0) AS `amount_free`,`e`.`tag` AS `tag`,`e`.`description` AS `description`,`e`.`URL` AS `URL`,`e`.`image` AS `image` from (`equipments` `e` left join (select `hire`.`equipment_id` AS `equipment_id`,ifnull(count(0),0) AS `used` from `hire` where `hire`.`date_return` is null group by `hire`.`equipment_id`) `h` on(`e`.`equipment_id` = `h`.`equipment_id`)) order by `e`.`equipment_id`)  ;

--
-- VIEW `report_for_guest`
-- Dane: Żaden
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
