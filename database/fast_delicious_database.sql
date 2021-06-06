-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 04 2021 г., 14:38
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fast_delicious_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aplication`
--

CREATE TABLE `aplication` (
  `id_aplication` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time_start` varchar(20) NOT NULL,
  `time_end` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `aplication_goods`
--

CREATE TABLE `aplication_goods` (
  `id` int(11) NOT NULL,
  `id_aplication` int(11) NOT NULL,
  `id_restourant_goods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `restourants`
--

CREATE TABLE `restourants` (
  `id_restourant` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `restourants_goods`
--

CREATE TABLE `restourants_goods` (
  `id_restourant_goods` int(11) NOT NULL,
  `id_goods_category` int(11) NOT NULL,
  `id_restourant` int(11) NOT NULL,
  `name_goods` varchar(100) NOT NULL,
  `description_goods` text NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `restourants_goods_category`
--

CREATE TABLE `restourants_goods_category` (
  `id_goods_category` int(11) NOT NULL,
  `id_restourant` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `restourants_goods_img`
--

CREATE TABLE `restourants_goods_img` (
  `id_goods_img` int(11) NOT NULL,
  `id_restourant_goods` int(11) NOT NULL,
  `goods_img` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `restourants_img`
--

CREATE TABLE `restourants_img` (
  `id_restourant_img` int(11) NOT NULL,
  `id_restourant` int(11) NOT NULL,
  `restaurant_img` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fio` text NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_box`
--

CREATE TABLE `user_box` (
  `id_box` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_restourant_goods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_img`
--

CREATE TABLE `user_img` (
  `id_user_img` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_img` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aplication`
--
ALTER TABLE `aplication`
  ADD PRIMARY KEY (`id_aplication`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `aplication_goods`
--
ALTER TABLE `aplication_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplication` (`id_aplication`),
  ADD KEY `id_restourant_goods` (`id_restourant_goods`);

--
-- Индексы таблицы `restourants`
--
ALTER TABLE `restourants`
  ADD PRIMARY KEY (`id_restourant`);

--
-- Индексы таблицы `restourants_goods`
--
ALTER TABLE `restourants_goods`
  ADD PRIMARY KEY (`id_restourant_goods`),
  ADD KEY `id_goods_category` (`id_goods_category`),
  ADD KEY `id_restourant` (`id_restourant`);

--
-- Индексы таблицы `restourants_goods_category`
--
ALTER TABLE `restourants_goods_category`
  ADD PRIMARY KEY (`id_goods_category`),
  ADD KEY `id_restourant` (`id_restourant`);

--
-- Индексы таблицы `restourants_goods_img`
--
ALTER TABLE `restourants_goods_img`
  ADD PRIMARY KEY (`id_goods_img`),
  ADD KEY `id_restourant_goods` (`id_restourant_goods`);

--
-- Индексы таблицы `restourants_img`
--
ALTER TABLE `restourants_img`
  ADD PRIMARY KEY (`id_restourant_img`),
  ADD KEY `id_restourant` (`id_restourant`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_box`
--
ALTER TABLE `user_box`
  ADD PRIMARY KEY (`id_box`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_restourant_goods` (`id_restourant_goods`);

--
-- Индексы таблицы `user_img`
--
ALTER TABLE `user_img`
  ADD PRIMARY KEY (`id_user_img`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `aplication`
--
ALTER TABLE `aplication`
  MODIFY `id_aplication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `aplication_goods`
--
ALTER TABLE `aplication_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restourants`
--
ALTER TABLE `restourants`
  MODIFY `id_restourant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restourants_goods`
--
ALTER TABLE `restourants_goods`
  MODIFY `id_restourant_goods` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restourants_goods_category`
--
ALTER TABLE `restourants_goods_category`
  MODIFY `id_goods_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restourants_goods_img`
--
ALTER TABLE `restourants_goods_img`
  MODIFY `id_goods_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restourants_img`
--
ALTER TABLE `restourants_img`
  MODIFY `id_restourant_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_box`
--
ALTER TABLE `user_box`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_img`
--
ALTER TABLE `user_img`
  MODIFY `id_user_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `aplication`
--
ALTER TABLE `aplication`
  ADD CONSTRAINT `aplication_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `aplication_goods`
--
ALTER TABLE `aplication_goods`
  ADD CONSTRAINT `aplication_goods_ibfk_1` FOREIGN KEY (`id_aplication`) REFERENCES `aplication` (`id_aplication`),
  ADD CONSTRAINT `aplication_goods_ibfk_2` FOREIGN KEY (`id_restourant_goods`) REFERENCES `restourants_goods` (`id_restourant_goods`);

--
-- Ограничения внешнего ключа таблицы `restourants_goods`
--
ALTER TABLE `restourants_goods`
  ADD CONSTRAINT `restourants_goods_ibfk_1` FOREIGN KEY (`id_restourant`) REFERENCES `restourants` (`id_restourant`),
  ADD CONSTRAINT `restourants_goods_ibfk_2` FOREIGN KEY (`id_goods_category`) REFERENCES `restourants_goods_category` (`id_goods_category`);

--
-- Ограничения внешнего ключа таблицы `restourants_goods_category`
--
ALTER TABLE `restourants_goods_category`
  ADD CONSTRAINT `restourants_goods_category_ibfk_1` FOREIGN KEY (`id_restourant`) REFERENCES `restourants` (`id_restourant`);

--
-- Ограничения внешнего ключа таблицы `restourants_goods_img`
--
ALTER TABLE `restourants_goods_img`
  ADD CONSTRAINT `restourants_goods_img_ibfk_1` FOREIGN KEY (`id_restourant_goods`) REFERENCES `restourants_goods` (`id_restourant_goods`);

--
-- Ограничения внешнего ключа таблицы `restourants_img`
--
ALTER TABLE `restourants_img`
  ADD CONSTRAINT `restourants_img_ibfk_1` FOREIGN KEY (`id_restourant`) REFERENCES `restourants` (`id_restourant`);

--
-- Ограничения внешнего ключа таблицы `user_box`
--
ALTER TABLE `user_box`
  ADD CONSTRAINT `user_box_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `user_box_ibfk_2` FOREIGN KEY (`id_restourant_goods`) REFERENCES `restourants_goods` (`id_restourant_goods`);

--
-- Ограничения внешнего ключа таблицы `user_img`
--
ALTER TABLE `user_img`
  ADD CONSTRAINT `user_img_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
