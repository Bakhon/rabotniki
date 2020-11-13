-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 13 2020 г., 06:12
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `09112020`
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
(8, 21, 19, 'привет ', '', '2020-11-03 11:23:01', ''),
(9, 26, 23, 'test', '', '2020-11-05 00:34:04', ''),
(10, 26, 23, 'test', '', '2020-11-05 00:34:04', ''),
(25, 26, 23, 'test', '', '2020-11-05 00:56:41', ''),
(24, 26, 23, 'zaq', '', '2020-11-05 00:56:35', ''),
(23, 26, 23, 'Hello world! ', '', '2020-11-05 00:54:44', ''),
(22, 26, 23, 'test321', '', '2020-11-05 00:47:03', '');

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
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `ID` int(11) NOT NULL,
  `DOC_NAME` varchar(4000) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `ID` int(11) NOT NULL,
  `ID_SERVICE` int(11) NOT NULL,
  `TITLE` varchar(4000) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `POST_DATE` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`ID`, `ID_SERVICE`, `TITLE`, `PRICE`, `ID_USER`, `POST_DATE`) VALUES
(28, 9, 'Лыжи', 1234, 27, '2020-11-09');

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
(12, 'da', 'da', 'da', 'da', 21, 19, '0000-00-00'),
(13, 'test', 'test', 'test', 'test', 23, 23, '0000-00-00'),
(14, 'test', 'test', 'test', 'test', 23, 23, '0000-00-00'),
(15, 'test', 'test', 'test', 'test', 23, 23, '0000-00-00'),
(16, 'test', 'test', 'test', 'test', 23, 23, '0000-00-00'),
(17, '123', '123', '123', '123', 23, 23, '0000-00-00'),
(18, 'tengrinews', 'tengrinews', 'tengrinews', 'tengrinews', 23, 23, '0000-00-00'),
(19, 'zakon', 'zakon', 'zakon', 'zakon', 23, 23, '0000-00-00'),
(20, 'Отзыв на тендер:', 'Что понравилось:', 'Не понравилось:', 'Общие выводы:', 23, 23, '0000-00-00'),
(21, 'Хороший отзыв', 'Хороший отзыв', 'Хороший отзыв', 'Хороший отзыв', 26, 26, '0000-00-00'),
(22, 'test', 'test', 'test', 'test', 29, 19, '0000-00-00'),
(23, 'Все было замечательно', 'Все было замечательно', 'Все было замечательно', 'Все было замечательно', 27, 27, '0000-00-00'),
(24, 'test', 'test', 'tetste', 'testes', 27, 19, '0000-00-00');

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
(7, 'Строительство гаража', 3),
(6, 'Строительство сруба', 3),
(5, 'Ремонт офиса', 3),
(4, 'Ремонт кухни', 3),
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
-- Структура таблицы `tender`
--

CREATE TABLE `tender` (
  `ID` int(11) NOT NULL,
  `ADDRES` varchar(4000) NOT NULL,
  `TITLE` varchar(4000) NOT NULL,
  `DESCRIPTION` mediumtext NOT NULL,
  `PATH_FILE` varchar(1000) NOT NULL,
  `CATEGORY` int(11) NOT NULL,
  `WHOIS` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `DATE_BEGIN` date NOT NULL,
  `DATE_END` date NOT NULL,
  `CONTACT_NAME` varchar(2000) NOT NULL,
  `PHONE` varchar(4000) NOT NULL,
  `SHOW_PHONE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `POST_DATE` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `NAME`, `LASTNAME`, `PHONE`, `TYPE`, `PASSWORD`, `STATUS`, `LOCATION`, `ABOUT`, `AVATAR`, `POST_DATE`) VALUES
(29, 'Макпал', '', '+7(778) 142-0449', 1, '4549e2ac35e84f7c8b6d73b71bc4a5e3', 1, 1, '1.1. Агент и Принципал согласны официально подтвердить свое сотрудничество подписанием данного договора.  В течение  срока действия Договора, Агент вправе  продвигать    продукцию   клиентам Принципала – программное обеспечение для стоматологических клиник Dent Time  – (далее именуемая – Продукция) в Республике Казахстан (далее  именуемая как Территория), при этом стороны договорились о том, что все расходы, произведенные «АГЕНТОМ » в связи с исполнением настоящего поручения предусмотрены и оплачены агентским вознаграждением.', '', '0000-00-00'),
(19, 'asd', 'ter', '+77004000556', 2, 'asd', 1, 2, '', '', '2020-11-03'),
(20, 'test', '', 'test', 1, 'test', 2, 1, '', '', '2020-11-03'),
(27, 'Иван', 'Петров', '+7(700) 400-0556', 2, 'ef86656266184d77e084510113a11edf', 1, 2, 'Работаю 24/7 каждый день', '', '0000-00-00'),
(30, 'IN YAN', '', '+7(778) 137-3477', 2, 'ef86656266184d77e084510113a11edf', 1, 1, 'Ответственный', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `users_photo`
--

CREATE TABLE `users_photo` (
  `ID` int(11) NOT NULL,
  `PHOTO_NAME` varchar(500) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_photo`
--

INSERT INTO `users_photo` (`ID`, `PHOTO_NAME`, `USER_ID`) VALUES
(29, 'photos/1604658361.jpg', 26),
(31, 'photos/1604659322.jpg', 26);

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
(38, 27, 5),
(28, 23, 6),
(27, 23, 5),
(26, 23, 4),
(37, 26, 7),
(36, 26, 6),
(35, 26, 5),
(34, 26, 4),
(39, 27, 6),
(40, 30, 7),
(41, 30, 5),
(42, 30, 4),
(43, 30, 9);

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
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
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
-- Индексы таблицы `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users_photo`
--
ALTER TABLE `users_photo`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `dic_country`
--
ALTER TABLE `dic_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT для таблицы `tender`
--
ALTER TABLE `tender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users_photo`
--
ALTER TABLE `users_photo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users_speciality`
--
ALTER TABLE `users_speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
