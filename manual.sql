-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 03 2018 г., 17:01
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
  `block_type_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `block_types`
--

CREATE TABLE `block_types` (
  `block_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `elements`
--

CREATE TABLE `elements` (
  `element_id` int(11) NOT NULL,
  `element_type_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `element_types`
--

CREATE TABLE `element_types` (
  `element_type_id` int(11) NOT NULL,
  `block_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 'HTML и CSS', 'Методичка для курса по верстке');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `manual_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`section_id`, `parent_id`, `manual_id`, `name`, `description`, `position`) VALUES
(1, 0, 4, 'Введение в HTML', 'Описание раздела', 0),
(2, 1, 4, 'Структура документа', 'Описание структуры HTML-документа', 0),
(3, 1, 4, 'Основные теги', 'Теги HTML, которые в основном используются', 1),
(4, 0, 4, 'Основы CSS', 'Раздел по основам каскадных таблиц стилей', 2),
(5, 4, 4, 'Синтаксис CSS', 'Разбор синтаксиса каскадных таблиц стилей', 0),
(6, 4, 4, 'Селекторы', 'Основные селекторы в CSS', 2),
(7, 6, 4, 'Селекторы по тегам', 'Разбор селекторов по тегам', 0),
(8, 0, 4, 'Селекторы по классам', 'Разбор селекторов по классам', 1),
(9, 4, 4, 'Селекторы по идентификаторам', 'Разбор селекторов по идентификаторам', 1),
(10, 0, 4, 'Блочные элементы', 'Описание раздела', 0),
(11, 0, 4, 'Блочная верстка', 'Описание раздела', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`),
  ADD KEY `block_type_id` (`block_type_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Индексы таблицы `block_types`
--
ALTER TABLE `block_types`
  ADD PRIMARY KEY (`block_type_id`);

--
-- Индексы таблицы `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`element_id`),
  ADD KEY `block_id` (`block_id`),
  ADD KEY `element_type_id` (`element_type_id`);

--
-- Индексы таблицы `element_types`
--
ALTER TABLE `element_types`
  ADD PRIMARY KEY (`element_type_id`),
  ADD KEY `block_type_id` (`block_type_id`);

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
  ADD KEY `manual_id` (`manual_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `block_types`
--
ALTER TABLE `block_types`
  MODIFY `block_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `elements`
--
ALTER TABLE `elements`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `element_types`
--
ALTER TABLE `element_types`
  MODIFY `element_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `manuals`
--
ALTER TABLE `manuals`
  MODIFY `manual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_ibfk_2` FOREIGN KEY (`block_type_id`) REFERENCES `block_types` (`block_type_id`),
  ADD CONSTRAINT `blocks_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`);

--
-- Ограничения внешнего ключа таблицы `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`block_id`),
  ADD CONSTRAINT `elements_ibfk_2` FOREIGN KEY (`element_type_id`) REFERENCES `element_types` (`element_type_id`);

--
-- Ограничения внешнего ключа таблицы `element_types`
--
ALTER TABLE `element_types`
  ADD CONSTRAINT `element_types_ibfk_1` FOREIGN KEY (`block_type_id`) REFERENCES `block_types` (`block_type_id`);

--
-- Ограничения внешнего ключа таблицы `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`manual_id`) REFERENCES `manuals` (`manual_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
