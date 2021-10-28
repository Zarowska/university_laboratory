-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Paź 2021, 22:53
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
-- Struktura widoku `report_for_student`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_for_student`  AS   (select `e`.`equipment_name` AS `equipment_name`,`e`.`producer` AS `producer`,`e`.`model` AS `model`,`e`.`amount` AS `amount`,`e`.`tag` AS `tag`,`e`.`description` AS `description`,`e`.`URL` AS `URL`,`e`.`image` AS `image`,`h`.`hire_id` AS `hire_id`,`h`.`equipment_id` AS `equipment_id`,`h`.`user_id` AS `user_id`,`h`.`login` AS `login`,`h`.`date_borrow` AS `date_borrow`,`h`.`date_return` AS `date_return` from (`equipments` `e` join `hire` `h`) where `e`.`equipment_id` = `h`.`equipment_id` and `h`.`date_return` is null order by `e`.`equipment_id`)  ;

--
-- VIEW `report_for_student`
-- Dane: Żaden
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
