-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2021 г., 10:24
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tp_articles`
--

CREATE TABLE `tp_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `uri` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tp_articles`
--

INSERT INTO `tp_articles` (`id`, `uri`, `title`, `content`, `date`) VALUES
(1, 'red-book', 'Красная книга', 'Здесь находится описание красной книги...', 1612768455),
(2, 'green-book', 'Зеленая книга', 'Здесь находится описание зеленой книги...', 1612768455),
(3, 'blue-book', 'Синяя книга', 'Здесь находится описание синей книги...', 1612768455),
(4, 'white-book', 'Белая книга', 'Здесь находится описание белой книги...', 1612768455),
(5, 'yellow-book', 'Желтая книга', 'Здесь находится описание желтой книги...', 1612768455);

-- --------------------------------------------------------

--
-- Структура таблицы `tp_users`
--

CREATE TABLE `tp_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tp_users`
--

INSERT INTO `tp_users` (`id`, `email`, `password`) VALUES
(2, 'post@post.post', '$2y$10$u0tplAsMPU4zAZFrrtE96uBiyvZuh5aBfqHfEe64l9VPt5r1DnzOS'),
(16, 'mail@mail.mail', '$2y$10$tkgEiUfkZawEOLB0jHes9e0Iu7YKvVsZBcHwz94TVjDu0EBPXNGJa'),
(17, 'list@list.list', '$2y$10$DK5KOp8PyypjsoBowsLJC.tV0ONPl1PliM3gIDKDRX1sXaxgyCJb.'),
(18, 'cold@cold.cold', '$2y$10$JEMkvVaSAD83yRfIo7H98.ZRrHcnz4hjnVSAccBV/I/b8DiTSuueq'),
(19, 'link@link.link', '$2y$10$G8bABEaMazA8kL7q9V.GW.1nnPKBK.PoI6.Y2uxwOAp6LXREwttZy'),
(20, 'asd@asd.asd', '$2y$10$8Qm64X7CDxUQsd4fTZabYe7eHzw5Cz8JSmErHfWD2NFd.XUixDkuu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tp_articles`
--
ALTER TABLE `tp_articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `uri` (`uri`);

--
-- Индексы таблицы `tp_users`
--
ALTER TABLE `tp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tp_articles`
--
ALTER TABLE `tp_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `tp_users`
--
ALTER TABLE `tp_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
