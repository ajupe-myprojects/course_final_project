-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2020 um 19:47
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
  `comment_el_id` int(10) UNSIGNED NOT NULL,
  `comment_user_uid` int(10) UNSIGNED NOT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_changed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`cid`, `comment_title`, `comment_text`, `comment_rev_rid`, `comment_el_id`, `comment_user_uid`, `comment_created_at`, `comment_changed_at`) VALUES
(1, 'Furchtbar', 'dvvgdfsdfbdfbdbdfbdbdbdfb', 2, 1, 1, '2020-01-11 11:24:47', '2020-01-11 11:34:02'),
(2, 'So lala', 'owufsbvbnvlcömcjdsofijslvnx,mynvljsvhfdjs', 2, 1, 1, '2020-01-11 11:24:47', '2020-01-11 11:34:09'),
(3, 'Review sucks', 'Echt jetzt\r\nSo was von!', 1, 1, 2, '2020-01-14 17:10:20', '2020-01-14 17:10:20'),
(4, 'Doofes Review', 'So nichtssagend!', 4, 1, 2, '2020-01-14 17:10:56', '2020-01-14 17:10:56'),
(5, 'So poetisch', 'stuff', 5, 1, 2, '2020-01-14 17:20:21', '2020-01-14 17:20:21'),
(6, 'Doofes Review', 'Echt jetzt', 1, 1, 2, '2020-01-15 09:13:23', '2020-01-15 09:13:23'),
(7, 'Blablubb', 'BlaBlabla', 1, 1, 2, '2020-01-15 09:13:45', '2020-01-15 09:13:45'),
(8, 'Test Kommentar', 'Bla blupp', 7, 4, 2, '2020-01-15 11:32:07', '2020-01-15 11:32:07');

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
(1, 'Die Wasserstoff Sonate', 'Iain Banks', '978-3453315464', 'Science Fiction', 'Zurück zu den Anfängen der Kultur\r\n\r\nDie ferne Zukunft: Die Menschheit hat sich in den letzten zehntausend Jahren in der Galaxis ausgebreitet. Künstliche Intelligenzen, denkende Raumschiffe und Mensch-Maschine-Wesen sind nun der Alltag in der sogenannten KULTUR. Doch wie hat all das einmal angefangen? Als die herrschende Elite einer alten Zivilisation komplett ausgelöscht wird, wird schnell eine Verdächtige präsentiert – doch Lieutenant Vyr Cossont ist unschuldig. Sie macht sich auf die Suche nach den Tätern und gerät in eine Verschwörung, die Tausende Jahre zurückreicht, bis in die Anfänge der KULTUR …', '2020-01-08 11:10:49', '2020-01-08 11:10:49', 'img/uploads/large/iain_banks_hydrogen_l.jpg', 'img/uploads/small/iain_banks_hydrogen_s.jpg', 1),
(4, 'Sterntagebücher', 'Stanislaw Lem', '978-3518455340', 'Science Fiction', 'Die großen Sternfahrer\r\nPilot Pirx, Ijon Tichy und die beiden Roboter Trurl und Klapauzius sind die bekanntesten Figuren des weltberühmten polnischen Science-fiction-Autors und Zukunftsforschers Stanislaw Lem. Die vorliegenden Sammelbände vereinen alle Geschichten dieser Protagonisten. Lem schickt den Leser weit in die Zukunft, treibt dort ein scharfsinnig-erfinderisches Spiel mit ihm und holt ihn dann wieder belehrt und bestens unterhalten auf die Erde zurück.', '2020-01-15 11:19:32', '2020-01-15 11:19:32', 'no image', 'no image', 2),
(5, 'Der Unbesiegbare', 'Stanislaw Lem', '978-3518389591', 'Science Fiction', 'Der Astrogar Horpach und sein Stellvertreter Rohan stehen vor einem Rätsel, als man die unversehrte Kondor und die überreste ihrer Besatzung findet. Es gibt keinen überlebenden, aber Lebensmittelvorräte, Wasser- und Sauerstoffreserven wären für viele Monate ausreichend gewesen. Allerdings sind die Innenräume des Raumschiffs in einem unbeschreiblichen Zustand, als habe eine Horde Wilder darin gehaust. Wie die Wissenschaftler des Unbesiegbaren feststellen, gibt es auf Regis III keine feindliche Fauna oder Flora und doch wird der Planet von einer Macht beherrscht, die auch der Rettungsexpedition fast zum Verhängnis wird.', '2020-01-15 11:27:18', '2020-01-15 11:27:18', 'no image', 'no image', 2),
(6, 'Helliconia', 'Brian Aldiss', '978-0575086159', 'Science Fiction', '(englisch)\r\nHelliconia is a planet that, due to the massively eccentric orbit of its own sun around another star, experiences seasons that lasts eons. Whole civilisations grow in the Spring, flourish in the Summer and then die in the brutal winters. The human-like inhabitants have been profoundly changed by their experience of this harsh cycle.\r\n\r\nIn orbit above the planet a terran mission struggles to observe and understand the effects on society of such a massive climatic impact.\r\n\r\nMassive, thoroughly researched, minutely organised, full of action, pulp references and deep drama this is a classic trilogy.', '2020-01-15 11:45:39', '2020-01-15 11:45:39', 'no image', 'no image', 2),
(9, 'Gesammelte Werke Band 6: Die Großen Alten', 'H.P. Lovecraft', '978-3865520678', 'Misc', 'Eine Sammlung verschiedener Kurzgeschichten.\r\nUnter anderem: Das Unnennbare, Kühle Luft, Der schreckliche alte Mann, Die lauernde Furcht', '2020-01-15 13:02:22', '2020-01-15 13:02:22', 'img/uploads/large/Gesammelte_Werke_Band_6_Die_Großen_Alten_l.jpg', 'img/uploads/small/Gesammelte_Werke_Band_6_Die_Großen_Alten_s.jpg', 2);

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

--
-- Daten für Tabelle `reviews`
--

INSERT INTO `reviews` (`rid`, `rev_title`, `rev_text`, `rev_element_id`, `rev_created_at`, `rev_changed_at`, `rev_user_uid`) VALUES
(1, 'Gutes Buch', 'Jemand musste Josef K. verleumdet haben, denn ohne dass er etwas Böses getan hätte, wurde er eines Morgens verhaftet. »Wie ein Hund!« sagte er, es war, als sollte die Scham ihn überleben. Als Gregor Samsa eines Morgens aus unruhigen Träumen erwachte, fand er sich in seinem Bett zu einem ungeheueren Ungeziefer verwandelt. Und es war ihnen wie eine Bestätigung ihrer neuen Träume und guten Absichten, als am Ziele ihrer Fahrt die Tochter als erste sich erhob und ihren jungen Körper dehnte. »Es ist ein eigentümlicher Apparat«, sagte der Offizier zu dem Forschungsreisenden und überblickte mit einem gewissermaßen bewundernden Blick den ihm doch wohlbekannten Apparat. Sie hätten noch ins Boot springen\r\n', 1, '2020-01-11 10:52:59', '2020-01-11 21:01:10', 1),
(2, 'Fantastisch', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et', 1, '2020-01-11 10:52:59', '2020-01-11 10:52:59', 1),
(3, 'Test Review', 'Testreview und so!', 1, '2020-01-14 12:23:35', '2020-01-14 12:23:35', 2),
(4, 'Test Test Test', 'Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle. By the same illusion which lifts the horizon of the sea to the level of the spectator on a hillside, the sable cloud beneath was dished out, and the car seemed to float in the middle of an immense dark sphere, whose upper half was strewn with silver. Looking down into the dark gulf below, I could see a ruddy light streaming through a rift in the clouds.', 1, '2020-01-14 12:24:29', '2020-01-14 12:24:29', 2),
(5, 'Test Test Test2!', 'Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle. By the same illusion which lifts the horizon of the sea to the level of the spectator on a hillside, the sable cloud beneath was dished out, and the car seemed to float in the middle of an immense dark sphere, whose upper half was strewn with silver. Looking down into the dark gulf below, I could see a ruddy light streaming through a rift in the clouds.', 1, '2020-01-14 12:25:21', '2020-01-14 12:25:21', 2),
(7, 'Test Review', 'Mal schauen....', 4, '2020-01-15 11:31:45', '2020-01-15 11:31:45', 2);

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
(1, 'andymin', 'super@test.de', '$2y$10$ou4EvtDw5QnGy2.uWOB9xubqNrr8fs6faTe6szjuDqj4coEAN2rv2', '2020-01-08 10:38:28', '2020-01-08 10:38:28', 23, 'Bow down mortals! For i am the admin!'),
(2, 'Normie', 'test@test.de', '$2y$10$DFlPRdso2RDJAl7ssph1/ekdLIZsgY7dhbJSCLg33w43EqJ9QtIJO', '2020-01-13 16:21:20', '2020-01-15 18:43:22', 1, NULL),
(4, 'Dude', 'new@new.de', '$2y$10$dC4MSJ0ObhZmMBMR4kNvk.ywfnzKTz3fitvYqW0y3Pi3a7gG8M92e', '2020-01-13 16:41:02', '2020-01-13 16:41:02', 1, NULL),
(13, 'Moppel', 'alt@alt.de', '$2y$10$sv3qxqhFX6XglLHZ3iNyo..ihb45PQwRt3zEbeOMAk0HcjJ9wt4yG', '2020-01-13 16:52:44', '2020-01-13 16:52:44', 1, NULL),
(18, 'Blabla', 'alt@alt.de', '$2y$10$TFpOym4h2wyCT65gowvBmutl3A0SDQ0uRBHKmqgMrks5MmffJl7oC', '2020-01-14 15:08:51', '2020-01-14 15:08:51', 1, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `comment_rev_rid` (`comment_rev_rid`),
  ADD KEY `comment_user_uid` (`comment_user_uid`),
  ADD KEY `comment_el_id` (`comment_el_id`);

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
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_rev_rid`) REFERENCES `reviews` (`rid`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_user_uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`comment_el_id`) REFERENCES `elements` (`id`);

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
