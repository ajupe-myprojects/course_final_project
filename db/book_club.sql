-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Jan 2020 um 21:41
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `book_club`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `cid` int(10) UNSIGNED NOT NULL,
  `comment_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_rev_rid` int(10) UNSIGNED NOT NULL,
  `comment_user_uid` int(10) UNSIGNED NOT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_changed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `elements`
--

CREATE TABLE `elements` (
  `id` int(10) UNSIGNED NOT NULL,
  `element_title` varchar(255) NOT NULL,
  `element_author` varchar(255) NOT NULL,
  `element_isbn` varchar(255) NOT NULL,
  `element_genre` varchar(255) NOT NULL,
  `element_description` text NOT NULL,
  `element_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `element_changed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `element_pic` varchar(255) NOT NULL,
  `element_thumb` varchar(255) NOT NULL,
  `user_uid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `elements`
--

INSERT INTO `elements` (`id`, `element_title`, `element_author`, `element_isbn`, `element_genre`, `element_description`, `element_created_at`, `element_changed_at`, `element_pic`, `element_thumb`, `user_uid`) VALUES
(1, 'Die Wasserstoff Sonate', 'Iain Banks', 'ISBN-13: 978-3453315464', 'Science Fiction', 'Zurück zu den Anfängen der Kultur\r\n\r\nDie ferne Zukunft: Die Menschheit hat sich in den letzten zehntausend Jahren in der Galaxis ausgebreitet. Künstliche Intelligenzen, denkende Raumschiffe und Mensch-Maschine-Wesen sind nun der Alltag in der sogenannten KULTUR. Doch wie hat all das einmal angefangen? Als die herrschende Elite einer alten Zivilisation komplett ausgelöscht wird, wird schnell eine Verdächtige präsentiert – doch Lieutenant Vyr Cossont ist unschuldig. Sie macht sich auf die Suche nach den Tätern und gerät in eine Verschwörung, die Tausende Jahre zurückreicht, bis in die Anfänge der KULTUR …', '2020-01-08 11:10:49', '2020-01-08 11:10:49', 'img/uploads/large/iain_banks_hydrogen_l.jpg', 'img/uploads/small/iain_banks_hydrogen_s.jpg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reviews`
--

CREATE TABLE `reviews` (
  `rid` int(10) UNSIGNED NOT NULL,
  `rev_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rev_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rev_element_id` int(10) UNSIGNED NOT NULL,
  `rev_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rev_changed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rev_user_uid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_changed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_role` int(10) UNSIGNED NOT NULL,
  `user_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`, `user_created_at`, `user_changed_at`, `user_role`, `user_description`) VALUES
(1, 'andymin', 'super@test.de', '$2y$10$ou4EvtDw5QnGy2.uWOB9xubqNrr8fs6faTe6szjuDqj4coEAN2rv2', '2020-01-08 10:38:28', '2020-01-08 10:38:28', 23, 'Bow down mortals! For i am the admin!');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `comment_rev_rid` (`comment_rev_rid`),
  ADD KEY `comment_user_uid` (`comment_user_uid`);

--
-- Indizes für die Tabelle `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_uid` (`user_uid`);

--
-- Indizes für die Tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `rev_element_id` (`rev_element_id`),
  ADD KEY `rev_user_id` (`rev_user_uid`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_rev_rid`) REFERENCES `reviews` (`rid`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_user_uid`) REFERENCES `users` (`uid`);

--
-- Constraints der Tabelle `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_ibfk_1` FOREIGN KEY (`user_uid`) REFERENCES `users` (`uid`);

--
-- Constraints der Tabelle `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`rev_element_id`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`rev_user_uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
