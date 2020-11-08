-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 03 2020 г., 18:18
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `emp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `FROM_USER` int(11) NOT NULL,
  `TO_USER` int(11) NOT NULL,
  `MSG` mediumtext NOT NULL,
  `FILE` varchar(255) NOT NULL,
  `POST_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `POST_TIME` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`ID`, `FROM_USER`, `TO_USER`, `MSG`, `FILE`, `POST_DATE`, `POST_TIME`) VALUES
(1, 21, 21, 'test', '', '2020-11-02 18:00:00', ''),
(2, 21, 19, 'asd', '', '2020-11-03 06:07:47', ''),
(3, 21, 19, 'tema', '', '2020-11-03 06:15:14', ''),
(4, 21, 19, 'asd', '', '2020-11-03 06:16:46', ''),
(5, 21, 19, 'theme', '', '2020-11-03 06:16:50', ''),
(6, 21, 19, 'asd', '', '2020-11-03 06:19:59', ''),
(7, 21, 19, 'test', '', '2020-11-03 11:22:40', ''),
(8, 21, 19, 'привет ', '', '2020-11-03 11:23:01', '');

-- --------------------------------------------------------

--
-- Структура таблицы `dic_country`
--

CREATE TABLE `dic_country` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dic_country`
--

INSERT INTO `dic_country` (`ID`, `NAME`) VALUES
(1, 'Нур-Султан'),
(2, 'Алматы');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `REV_TENDER` mediumtext NOT NULL,
  `LIKE_REV` mediumtext NOT NULL,
  `NOTLIKE_REV` mediumtext NOT NULL,
  `ALL_CONCL` mediumtext NOT NULL,
  `ID_FROM` int(11) NOT NULL,
  `ID_TO` int(11) NOT NULL,
  `DATE_COMMENT` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`ID`, `REV_TENDER`, `LIKE_REV`, `NOTLIKE_REV`, `ALL_CONCL`, `ID_FROM`, `ID_TO`, `DATE_COMMENT`) VALUES
(8, 'Все понравилось', 'Все понравилось', 'Все понравилось', 'Все понравилось', 21, 21, '0000-00-00'),
(7, 'tes', 'test', 'test', 'tes', 21, 21, '0000-00-00'),
(9, 'Отзыв на тендер:', 'Что понравилось:', 'Не понравилось:', 'Общие выводы:', 21, 21, '0000-00-00'),
(10, 'test321', 'test321', 'test321', 'test321', 21, 21, '0000-00-00'),
(11, 'Master', 'Master', 'Master', 'Master', 21, 19, '0000-00-00'),
(12, 'da', 'da', 'da', 'da', 21, 19, '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `NAME_SERV` varchar(255) NOT NULL,
  `SPECID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`ID`, `NAME_SERV`, `SPECID`) VALUES
(4, 'Ремонт кухни', 3),
(5, 'Ремонт офиса', 3),
(6, 'Строительство сруба', 3),
(7, 'Строительство гаража', 3),
(8, 'Работа 2', 4),
(9, 'Работа 3', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE `speciality` (
  `ID` int(11) NOT NULL,
  `NAME_SPEC` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speciality`
--

INSERT INTO `speciality` (`ID`, `NAME_SPEC`) VALUES
(3, 'КОМПЛЕКСНЫЕ РАБОТЫ'),
(4, 'Некомплексные работы');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `PHONE` varchar(255) NOT NULL,
  `TYPE` int(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `LOCATION` int(11) NOT NULL,
  `ABOUT` mediumtext NOT NULL,
  `AVATAR` varchar(100) NOT NULL,
  `POST_DATE` date DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `NAME`, `LASTNAME`, `PHONE`, `TYPE`, `PASSWORD`, `STATUS`, `LOCATION`, `ABOUT`, `AVATAR`, `POST_DATE`) VALUES
(18, 'qweqwew', '', '+7(771) 980-5314', 2, '88468caed55221baac033a615533285a', 1, 1, '', '', '2020-11-03'),
(17, 'Bahon', '', '+7(771) 980-5314', 2, '88468caed55221baac033a615533285a', 1, 2, '', '', '2020-11-03'),
(19, 'asd', 'ter', '+77004000556', 2, 'asd', 1, 2, '', '', '2020-11-03'),
(20, 'test', '', 'test', 1, 'test', 2, 1, '', '', '2020-11-03'),
(21, 'Test', 'Test', '+7(700) 400-0556', 2, 'ef86656266184d77e084510113a11edf', 1, 1, 'Предлагаю качественную работу в сфере строительства.Опыт работы на рынке строительных услуг 11 лет. Составляю сметы и помогаю в закупке материала. Сотрудничаю с дизайнером. Выполняю ремонт любой сложности, работаю сам и с бригадой в зависимости от объекта. Гарантирую быструю и качественную работу, выполненную в соответствии со всеми требованиями и стандартами.Будутt вопросы задавайте всегда рад помочь советом.  test', 'avatar/1604378343.jpg', '2020-11-03');

-- --------------------------------------------------------

--
-- Структура таблицы `users_speciality`
--

CREATE TABLE `users_speciality` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `USER_SPECIALITY` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_speciality`
--

INSERT INTO `users_speciality` (`ID`, `USER_ID`, `USER_SPECIALITY`) VALUES
(20, 19, 4),
(19, 17, 5),
(18, 17, 4),
(21, 20, 4),
(22, 21, 4),
(23, 21, 5),
(24, 21, 6),
(25, 21, 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `dic_country`
--
ALTER TABLE `dic_country`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users_speciality`
--
ALTER TABLE `users_speciality`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `dic_country`
--
ALTER TABLE `dic_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `speciality`
--
ALTER TABLE `speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users_speciality`
--
ALTER TABLE `users_speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
