-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 19 2019 г., 09:35
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `films`
--

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `video` text NOT NULL,
  `film` varchar(6) NOT NULL,
  `serial` varchar(6) NOT NULL,
  `rang` int(2) NOT NULL,
  `data` date NOT NULL,
  `style` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `time` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`id`, `name`, `description`, `img`, `video`, `film`, `serial`, `rang`, `data`, `style`, `country`, `time`, `link`) VALUES
(62, 'kwa', 'zdsd', 'img/20191118181747162.jpg', 'video/20191118181747292.mp4', 'on', '', 2, '2019-10-30', 'триллер', 'США', 2, 'http://kino-site/src/kwa.php'),
(63, 'ryt', 'zzzzzz', 'img/20191118184152835.jpg', 'video/20191118184152930.mp4', 'on', '', 2, '2019-11-06', 'комедия', 'Франция', 3, 'http://kino-site/src/ryt.php'),
(64, 'top', 'bvv', 'img/20191118185017227.jpg', 'video/20191118185017407.mp4', 'on', '', 12, '2019-11-06', 'комедия', 'Великобритания', 12, 'http://kino-site/src/top.php');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
