-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 30. čec 2020, 10:55
-- Verze serveru: 10.1.37-MariaDB
-- Verze PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `odkazy`
--
CREATE DATABASE IF NOT EXISTS `odkazy` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `odkazy`;

-- --------------------------------------------------------

--
-- Struktura tabulky `odkaz`
--

CREATE TABLE `odkaz` (
  `id_odkaz` int(11) NOT NULL,
  `id_uzivatel` int(11) NOT NULL,
  `url` varchar(256) COLLATE utf8_czech_ci NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `odkaz`
--

INSERT INTO `odkaz` (`id_odkaz`, `id_uzivatel`, `url`, `datum`) VALUES
(12, 32, 'www.facebook.com', '2020-07-29 17:18:46'),
(13, 33, 'www.facebook.com', '2020-07-29 17:19:24'),
(14, 34, 'www.facebook.com', '2020-07-29 17:20:19'),
(15, 35, 'dfhshfg.vom', '2020-07-29 17:23:39'),
(16, 36, 'www.twitter.com', '2020-07-29 21:18:17'),
(19, 38, 'www.neco.cz', '2020-07-29 21:59:54'),
(20, 39, 'www.kudyznudy.cz', '2020-07-29 22:01:25'),
(21, 39, 'www.asdfa.cz', '2020-07-29 22:01:54'),
(22, 39, 'www.janevim.cz', '2020-07-29 22:17:02'),
(23, 39, 'www.facebook.com', '2020-07-29 22:17:46'),
(24, 39, 'google.cz', '2020-07-29 22:19:46'),
(25, 39, 'www.seznam.cz', '2020-07-29 22:23:38'),
(26, 39, 'www.facebook.com', '2020-07-29 22:24:14'),
(27, 39, 'www.facebook.com', '2020-07-29 22:24:37'),
(28, 39, 'lkjhlkjh', '2020-07-29 22:26:15'),
(29, 40, 'czc.cz', '2020-07-29 23:40:06'),
(30, 41, 'www.alza.cz', '2020-07-30 00:15:03'),
(31, 42, 'www.seznam.cz', '2020-07-30 09:51:54'),
(32, 39, 'www.reddit.com', '2020-07-30 10:06:00'),
(33, 42, 'google.cz', '2020-07-30 10:12:12'),
(34, 42, 'ff.cz', '2020-07-30 10:12:37'),
(35, 44, 'www.w3schools.com', '2020-07-30 10:42:04'),
(36, 44, 'www.vlada.cz', '2020-07-30 10:43:00'),
(37, 45, 'www.php.net', '2020-07-30 10:43:40'),
(38, 46, 'www.facebook.com', '2020-07-30 10:47:20'),
(39, 46, 'www.seznam.cz', '2020-07-30 10:47:53'),
(40, 46, 'www.reddit.com', '2020-07-30 10:47:56'),
(41, 46, 'www.twitter.com', '2020-07-30 10:48:27'),
(42, 46, 'www.linkedin.com', '2020-07-30 10:49:12');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

CREATE TABLE `uzivatel` (
  `id_uzivatel` int(11) NOT NULL,
  `jmeno` varchar(256) COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(256) COLLATE utf8_czech_ci NOT NULL,
  `pocet_odkazu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatel`
--

INSERT INTO `uzivatel` (`id_uzivatel`, `jmeno`, `heslo`, `pocet_odkazu`) VALUES
(1, 'kuba', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(3, 'petr', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(6, 'zz', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(7, 'hhjk', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(8, 'rtfcvdf', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(9, 'xoxo', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(10, 'ctron', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(14, 'fop', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(15, 'MatÄ›j', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(17, 'belzzz', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(18, 'ash', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(19, 'frantisek', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(32, 'Jakub', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 1),
(33, 'Jakubkk', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(34, 'edeffder', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 0),
(35, 'aagghhjjui', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 1),
(36, 'Mike', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 1),
(38, 'pepicek', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 1),
(39, 'pruzkumnik', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 10),
(40, 'Haha', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 1),
(42, 'Bob', '8cc6fcef7d3e41ff8bda76c7aefff7a2', 3),
(43, 'Uzivatel01', '38ff907d99c23986f8fc4b0fa1555046', 0),
(44, 'Uzivatel02', '256b346553dffe801fc6520acf4e8a48', 2),
(45, 'Uzivatel03', '', 1),
(46, 'Uzivatel04', '', 5);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `odkaz`
--
ALTER TABLE `odkaz`
  ADD PRIMARY KEY (`id_odkaz`);

--
-- Klíče pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`id_uzivatel`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `odkaz`
--
ALTER TABLE `odkaz`
  MODIFY `id_odkaz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  MODIFY `id_uzivatel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
