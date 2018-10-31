-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2018 г., 13:05
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `manual`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blocks`
--

CREATE TABLE `blocks` (
  `block_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `block_type_id` int(11) NOT NULL,
  `content` text,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blocks`
--

INSERT INTO `blocks` (`block_id`, `section_id`, `block_type_id`, `content`, `position`) VALUES
(2, 12, 1, 'a:1:{s:4:\"text\";s:29:\"asdfsafs123\n   1212\n1233dfsfd\";}', 0),
(8, 12, 3, 'a:5:{s:12:\"code-content\";s:5:\"12332\";s:7:\"comment\";s:1:\"0\";s:15:\"comment-content\";s:15:\"111            \";s:6:\"result\";s:1:\"0\";s:14:\"result-content\";s:42:\"111122                                    \";}', 1),
(10, 12, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `manuals`
--

CREATE TABLE `manuals` (
  `manual_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manuals`
--

INSERT INTO `manuals` (`manual_id`, `name`, `description`) VALUES
(4, 'HTML и CSS', 'Методичка для курса по верстке'),
(5, 'JavaScript', 'Курс по js1');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `manual_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`section_id`, `parent_id`, `manual_id`, `name`, `description`, `position`) VALUES
(1, NULL, 4, 'Введение в HTML', 'Описание раздела', 0),
(2, 1, 4, 'Структура документа', 'Описание структуры HTML-документа', 0),
(3, NULL, 4, 'Основные теги', 'Теги HTML, которые в основном используются', 1),
(4, NULL, 4, 'Основы CSS', 'Раздел по основам каскадных таблиц стилей', 5),
(5, 4, 4, 'Синтаксис CSS', 'Разбор синтаксиса каскадных таблиц стилей', 1),
(6, 4, 4, 'Селекторы', 'Основные селекторы в CSS', 3),
(7, 6, 4, 'Селекторы по тегам', 'Разбор селекторов по тегам', 0),
(8, NULL, 4, 'Селекторы по классам', 'Разбор селекторов по классам', 4),
(9, 4, 4, 'Селекторы по идентификаторам', 'Разбор селекторов по идентификаторам', 2),
(10, NULL, 4, 'Блочные элементы', 'Описание раздела', 2),
(11, NULL, 4, 'Блочная верстка', 'Описание раздела', 3),
(12, NULL, 5, '123231', 'Описание раздела123выффыв', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Индексы таблицы `manuals`
--
ALTER TABLE `manuals`
  ADD PRIMARY KEY (`manual_id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `manual_id` (`manual_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `manuals`
--
ALTER TABLE `manuals`
  MODIFY `manual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`);

--
-- Ограничения внешнего ключа таблицы `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`manual_id`) REFERENCES `manuals` (`manual_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
