-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 20 2020 г., 13:18
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
-- База данных: `db_employee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `LOGIN` varchar(500) NOT NULL,
  `PASS` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`ID`, `LOGIN`, `PASS`) VALUES
(1, 'admin', 'admin');

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
(116, 27, 30, 'Ладно', '', '2020-11-19 04:47:05', ''),
(115, 30, 27, 'Гоу ', '', '2020-11-19 04:41:12', ''),
(114, 30, 27, 'Хорошо', '', '2020-11-19 04:39:51', ''),
(113, 27, 30, 'Как дела?', '', '2020-11-19 04:32:12', ''),
(112, 27, 30, 'Привет', '', '2020-11-19 04:22:07', ''),
(111, 30, 27, 'Салем', '', '2020-11-19 04:21:39', '');

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
-- Структура таблицы `dic_need`
--

CREATE TABLE `dic_need` (
  `ID` int(11) NOT NULL,
  `NEED_NAME` varchar(4000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dic_need`
--

INSERT INTO `dic_need` (`ID`, `NEED_NAME`) VALUES
(1, 'Строители или мастер на мой заказ'),
(2, 'Специалист в компанию или бригаду на постоянную работу'),
(3, 'Строительные материалы');

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
(28, 9, 'Лыжи', 1234, 27, '2020-11-09'),
(44, 7, 'Чистка ковров', 4000, 27, '2020-11-15');

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
  `SPECID` int(11) NOT NULL,
  `FILE_PATH` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`ID`, `NAME_SERV`, `SPECID`, `FILE_PATH`) VALUES
(7, 'Строительство гараж', 3, ''),
(6, 'Строительство дома', 3, ''),
(5, 'Ремонт офиса', 3, ''),
(31, 'Комлпексная услуга', 3, ''),
(32, 'Некомплексная работа', 4, ''),
(39, 'некомплексная работа 123', 4, 'services/');

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
(3, 'Комплексные работы'),
(4, 'Некомплексные работы');

-- --------------------------------------------------------

--
-- Структура таблицы `tender`
--

CREATE TABLE `tender` (
  `ID` int(11) NOT NULL,
  `ADDRES` varchar(4000) NOT NULL,
  `WE_NEED` int(11) NOT NULL,
  `TITLE` varchar(4000) NOT NULL,
  `DESCRIPTION` mediumtext NOT NULL,
  `PATH_FILE` varchar(1000) NOT NULL,
  `CATEGORY` int(11) DEFAULT NULL,
  `WHOIS` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `DATE_BEGIN` date NOT NULL,
  `DATE_END` date NOT NULL,
  `CONTACT_NAME` varchar(2000) NOT NULL,
  `PHONE` varchar(4000) NOT NULL,
  `SHOW_PHONE` int(11) NOT NULL,
  `POST_DATE` date DEFAULT NULL,
  `STATUS` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_TENDER` int(11) NOT NULL,
  `SEEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tender`
--

INSERT INTO `tender` (`ID`, `ADDRES`, `WE_NEED`, `TITLE`, `DESCRIPTION`, `PATH_FILE`, `CATEGORY`, `WHOIS`, `PRICE`, `DATE_BEGIN`, `DATE_END`, `CONTACT_NAME`, `PHONE`, `SHOW_PHONE`, `POST_DATE`, `STATUS`, `ID_USER`, `ID_TENDER`, `SEEN`) VALUES
(117, 'Иманова', 2, 'Заголовок', 'тест\r\n', '', 7, 3, 555, '2020-11-10', '2020-11-19', '123', '+7(333) 333-3333', 1, '2020-11-14', 1, 27, 864653, 0),
(118, 'Иманова', 2, 'Заголовок', 'тест\r\n', '', 4, 3, 555, '2020-11-10', '2020-11-19', '123', '+7(333) 333-3333', 1, '2020-11-14', 1, 27, 864653, 0),
(119, 'Новый район', 3, 'Укладка 100 кв.м. тротуарной плитки на бетонное основание', 'Подробное описание тендера\r\n', 'tender/Техническое задание проекта job.docx', 6, 2, 80000, '2020-11-20', '2020-11-27', 'Bahon', '+7(700) 400-0556', 1, '2020-11-14', 1, 27, 807985, 0),
(120, 'Новый район', 3, 'Укладка 100 кв.м. тротуарной плитки на бетонное основание', 'Подробное описание тендера\r\n', 'tender/Техническое задание проекта job.docx', 5, 2, 80000, '2020-11-20', '2020-11-27', 'Bahon', '+7(700) 400-0556', 1, '2020-11-14', 1, 27, 807985, 0),
(121, 'Новый район', 3, 'Укладка 100 кв.м. тротуарной плитки на бетонное основание', 'Подробное описание тендера\r\n', 'tender/Техническое задание проекта job.docx', 8, 2, 80000, '2020-11-20', '2020-11-27', 'Bahon', '+7(700) 400-0556', 1, '2020-11-14', 1, 27, 807985, 0),
(122, 'qwe', 1, 'qwe', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n', 'tender/', 7, 1, 80000, '2020-11-17', '2020-11-24', 'Шерлок', '+7(771) 980-5314', 1, '2020-11-16', 0, 27, 377332, NULL),
(123, 'фывыф', 0, 'фывыф', 'фывыф\n', 'tender/tnsnames.ora.txt', 7, 1, 1231, '2020-11-17', '2020-11-24', 'Шерлок', '+7(771) 980-5314', 1, '2020-11-16', 0, 27, 308471, NULL),
(124, 'Новый тендер', 0, 'Ремонт офиса', 'Ремонт офиса\r\n', 'tender/', 5, 1, 80000, '2020-11-18', '2020-11-25', 'Bahon', '+7(700) 400-0556', 1, '2020-11-17', 1, 27, 90285, NULL),
(125, 'asdsa', 0, 'dasd', 'asdsa\r\n', 'tender/', 7, 2, 13213, '2020-11-18', '2020-11-25', 'Mist', '+7(700) 000-0000', 1, '2020-11-17', 1, 27, 347052, NULL),
(126, 'Услуга барбера', 2, 'Услуга барбера', 'Услуга барбера\r\n', 'tender/', 32, 1, 900000, '2020-11-20', '2020-11-26', 'Барбер', '+7(778) 784-5565', 1, '2020-11-19', 1, 27, 61163, NULL),
(127, 'Иманова', 1, 'Работа офисная ремонт', 'Работа офисная ремонт\n', 'tender/', 5, 1, 800000, '2020-11-20', '2020-11-27', 'Артур', '+7(700) 400-0555', 1, '2020-11-20', 0, 27, 594209, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tender_comment`
--

CREATE TABLE `tender_comment` (
  `ID` int(11) NOT NULL,
  `COMMENT` text NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_TENDER` int(11) NOT NULL,
  `POST_DATE` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tender_comment`
--

INSERT INTO `tender_comment` (`ID`, `COMMENT`, `ID_USER`, `ID_TENDER`, `POST_DATE`) VALUES
(1, 'test', 27, 807985, NULL),
(2, 'Готов к работе', 27, 807985, '2020-11-15 09:00:12'),
(3, 'Готов приступить к работе', 27, 807985, '2020-11-15 09:02:48'),
(4, 'gotov', 27, 807985, '2020-11-15 09:03:28'),
(5, 'test', 27, 864653, '2020-11-15 09:15:50'),
(6, 'Новая ', 27, 864653, '2020-11-15 09:49:35'),
(7, 'Готов выполнить данный заказ', 27, 864653, '2020-11-15 10:48:12'),
(8, 'qwe', 27, 864653, '2020-11-16 04:55:50'),
(9, 'test', 27, 308471, '2020-11-16 05:15:20'),
(10, 'Готов приступить к работе! ', 27, 347052, '2020-11-17 07:21:28'),
(11, 'Предложение есть', 27, 61163, '2020-11-19 05:55:18');

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
(20, 'test', '', 'test', 1, 'test', 1, 1, '', '', '2020-11-03'),
(27, 'Иван', 'Петров', '+7(700) 400-0556', 2, 'ef86656266184d77e084510113a11edf', 1, 2, 'Работаю 24/7 каждый день', 'avatar/1605431820.jpg', '0000-00-00'),
(30, 'IN YAN', '', '+7(778) 137-3477', 1, 'ef86656266184d77e084510113a11edf', 1, 1, 'Ответственный', 'avatar/1605693332.jpg', '0000-00-00');

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
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

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
-- Индексы таблицы `dic_need`
--
ALTER TABLE `dic_need`
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
-- Индексы таблицы `tender_comment`
--
ALTER TABLE `tender_comment`
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
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT для таблицы `dic_country`
--
ALTER TABLE `dic_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `dic_need`
--
ALTER TABLE `dic_need`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `speciality`
--
ALTER TABLE `speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `tender`
--
ALTER TABLE `tender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT для таблицы `tender_comment`
--
ALTER TABLE `tender_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users_photo`
--
ALTER TABLE `users_photo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `users_speciality`
--
ALTER TABLE `users_speciality`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
