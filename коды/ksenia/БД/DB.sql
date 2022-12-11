-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2021 г., 23:14
-- Версия сервера: 10.3.13-MariaDB-log
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
-- База данных: `ksenia`
--

-- --------------------------------------------------------

--
-- Структура таблицы `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `Login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `userdata`
--

INSERT INTO `userdata` (`id`, `Login`, `Password`) VALUES
(1, 'awe', 'awe'),
(2, 'awe1', 'awe1');

-- --------------------------------------------------------

--
-- Структура таблицы `диагноз`
--

CREATE TABLE `диагноз` (
  `id` int(11) NOT NULL,
  `Код МКБ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Наименование диагноза` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `диагноз`
--

INSERT INTO `диагноз` (`id`, `Код МКБ`, `Наименование диагноза`) VALUES
(2, '80085', 'ИБС. Прогрессирующую стенокардию Н II А (ФК II). Ожирение III степени.'),
(3, '123', 'Хроническое двигательное тикозное расстройство');

-- --------------------------------------------------------

--
-- Структура таблицы `должность`
--

CREATE TABLE `должность` (
  `id` int(11) NOT NULL,
  `наименование должности` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Оклад` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `должность`
--

INSERT INTO `должность` (`id`, `наименование должности`, `Оклад`) VALUES
(1, 'Врач', 60000),
(2, 'Бухгалтер', 40000),
(3, 'Медсестра', 45000);

-- --------------------------------------------------------

--
-- Структура таблицы `история_болезни`
--

CREATE TABLE `история_болезни` (
  `id` int(11) NOT NULL,
  `Жалобы` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Анамнез` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Диагноз` int(11) DEFAULT NULL,
  `Лечение` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Лекарства` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Анализы` int(11) DEFAULT NULL,
  `Процедуры` int(11) DEFAULT NULL,
  `Эпикриз` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Операции` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `история_болезни`
--

INSERT INTO `история_болезни` (`id`, `Жалобы`, `Анамнез`, `Диагноз`, `Лечение`, `Лекарства`, `Анализы`, `Процедуры`, `Эпикриз`, `Операции`) VALUES
(2, 'Давящие боли за грудиной с иррадиацией в оба надплечья, \r\nвозникающие при ходьбе в обычном темпе на расстояние до 200-300 м,\r\nпериодически в покое, длительностью до 5-7 минут, снимаемые приемом\r\nнитроглицерина через 3-5 минут; суточная потребность в котором составляет\r\nдо 5-7 таблеток. Кроме того, больной отмечает умеренную отдышку при\r\nпривычных физических нагрузках, эпизодически отеки на нижних\r\nконечностях, обычно к концу дня.\r\n', 'Больным себя считает в течение 8-10 лет, когда впервые при значительных\nнагрузках стал отмечать кратковременные давящие боли за грудиной,\nпроходящие самостоятельно в покое, возникающие не чаще 1 раза в 1-2\nмесяца. К врачам не обращался.\n', 2, '1', '1', 1, 1, '1', 1),
(11, 'фывфывчсф', 'фывфцйу', 3, NULL, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `квалификация`
--

CREATE TABLE `квалификация` (
  `id` int(11) NOT NULL,
  `Категория квалификации` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `квалификация`
--

INSERT INTO `квалификация` (`id`, `Категория квалификации`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `пациент`
--

CREATE TABLE `пациент` (
  `id` int(11) NOT NULL,
  `ФИО` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Год рождения` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Паспорт` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Полис` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Телефон` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Адрес` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Госпитализация` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `пациент`
--

INSERT INTO `пациент` (`id`, `ФИО`, `Год рождения`, `Паспорт`, `Полис`, `Телефон`, `Адрес`, `Госпитализация`) VALUES
(2, 'Семенов Семен Семенович', '22.07.1989', '2222 222222', '12345678909', '8(988)-787-76-67', 'г. Жуковский, ул. пр. Победы, д. 8, кв. 5', 1),
(4, 'Иванов Иван Петрович', ' 1313 123123', ' 1313 123123', ' 12345678910', '8(998)-111-22-33', ' г. Жуковский, ул. Первомайская, д.10, кв. 10', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `персонал`
--

CREATE TABLE `персонал` (
  `id` int(11) NOT NULL,
  `ФИО` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Паспорт` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Телефон` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Адрес` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Отделение` int(11) NOT NULL,
  `Квалификация` int(11) NOT NULL,
  `Должность` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `персонал`
--

INSERT INTO `персонал` (`id`, `ФИО`, `Паспорт`, `Телефон`, `Адрес`, `Отделение`, `Квалификация`, `Должность`) VALUES
(1, 'Иван Иванов Иванович', '1111 111111', '8(999)-777-66-55', 'г. Мытищи, ул. Декабристов, д. 5, кв. 20', 1, 2, 1),
(2, 'Бухгалтер', '2222 222222', '23432424', 'выкеуеуе', 1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `препараты`
--

CREATE TABLE `препараты` (
  `id` int(11) NOT NULL,
  `Код АТС` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Наименование препарата` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Курс приема` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Дозировка` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `процедуры`
--

CREATE TABLE `процедуры` (
  `id` int(11) NOT NULL,
  `Наименование процедуры` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Продолжительность курса` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Медсестра` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `анализы`
--

CREATE TABLE `анализы` (
  `id` int(11) NOT NULL,
  `Наименование анализов` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Результаты анализов` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Лаборатория` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `анализы`
--

INSERT INTO `анализы` (`id`, `Наименование анализов`, `Результаты анализов`, `Лаборатория`) VALUES
(1, 'БИОХИМИЧЕСКИЙ АНАЛИЗ КРОВИ', 'Всё плохо', 1),
(2, 'Общий анализ крови', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `больница`
--

CREATE TABLE `больница` (
  `id` int(11) NOT NULL,
  `Корпус` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Адрес` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Отделения` int(11) NOT NULL,
  `Лаборатории` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `госпитализация`
--

CREATE TABLE `госпитализация` (
  `id` int(11) NOT NULL,
  `История болезни` int(11) NOT NULL,
  `Дата поступления` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Дата выписки` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Отделение` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `госпитализация`
--

INSERT INTO `госпитализация` (`id`, `История болезни`, `Дата поступления`, `Дата выписки`, `Отделение`) VALUES
(1, 2, '02.02.2021', '20.02.2021', 1),
(3, 2, 'укеуеуе', NULL, 1),
(5, 11, ' 10.06.2021', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `лаборатории`
--

CREATE TABLE `лаборатории` (
  `№ лаборатории` int(11) NOT NULL,
  `Наименование лаборатории` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `лаборатории`
--

INSERT INTO `лаборатории` (`№ лаборатории`, `Наименование лаборатории`) VALUES
(1, 'Пумпкин индастриз');

-- --------------------------------------------------------

--
-- Структура таблицы `операции`
--

CREATE TABLE `операции` (
  `id` int(11) NOT NULL,
  `Наименование операции` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Врач` int(11) NOT NULL,
  `Результат операции` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `отделение`
--

CREATE TABLE `отделение` (
  `№ отделения` int(11) NOT NULL,
  `Наименование отделения` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `отделение`
--

INSERT INTO `отделение` (`№ отделения`, `Наименование отделения`) VALUES
(1, 'Неврологическое');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `диагноз`
--
ALTER TABLE `диагноз`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `должность`
--
ALTER TABLE `должность`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `история_болезни`
--
ALTER TABLE `история_болезни`
  ADD PRIMARY KEY (`id`),
  ADD KEY `История_болезни_fk2` (`Анализы`),
  ADD KEY `Диагноз` (`Диагноз`);

--
-- Индексы таблицы `квалификация`
--
ALTER TABLE `квалификация`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `пациент`
--
ALTER TABLE `пациент`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Госпитализация` (`Госпитализация`);

--
-- Индексы таблицы `персонал`
--
ALTER TABLE `персонал`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Персонал_fk0` (`Отделение`),
  ADD KEY `Персонал_fk1` (`Квалификация`),
  ADD KEY `Персонал_fk2` (`Должность`);

--
-- Индексы таблицы `препараты`
--
ALTER TABLE `препараты`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `процедуры`
--
ALTER TABLE `процедуры`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Процедуры_fk0` (`Медсестра`);

--
-- Индексы таблицы `анализы`
--
ALTER TABLE `анализы`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Анализы_fk0` (`Лаборатория`);

--
-- Индексы таблицы `больница`
--
ALTER TABLE `больница`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Больница_fk0` (`Отделения`),
  ADD KEY `Больница_fk1` (`Лаборатории`);

--
-- Индексы таблицы `госпитализация`
--
ALTER TABLE `госпитализация`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Отделение` (`Отделение`),
  ADD KEY `История болезни` (`История болезни`);

--
-- Индексы таблицы `лаборатории`
--
ALTER TABLE `лаборатории`
  ADD PRIMARY KEY (`№ лаборатории`);

--
-- Индексы таблицы `операции`
--
ALTER TABLE `операции`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Врач` (`Врач`);

--
-- Индексы таблицы `отделение`
--
ALTER TABLE `отделение`
  ADD PRIMARY KEY (`№ отделения`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `диагноз`
--
ALTER TABLE `диагноз`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `должность`
--
ALTER TABLE `должность`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `история_болезни`
--
ALTER TABLE `история_болезни`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `квалификация`
--
ALTER TABLE `квалификация`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `пациент`
--
ALTER TABLE `пациент`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `персонал`
--
ALTER TABLE `персонал`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `препараты`
--
ALTER TABLE `препараты`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `процедуры`
--
ALTER TABLE `процедуры`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `анализы`
--
ALTER TABLE `анализы`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `больница`
--
ALTER TABLE `больница`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `госпитализация`
--
ALTER TABLE `госпитализация`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `операции`
--
ALTER TABLE `операции`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`id`) REFERENCES `персонал` (`id`);

--
-- Ограничения внешнего ключа таблицы `история_болезни`
--
ALTER TABLE `история_болезни`
  ADD CONSTRAINT `История_болезни_fk2` FOREIGN KEY (`Анализы`) REFERENCES `анализы` (`id`),
  ADD CONSTRAINT `история_болезни_ibfk_1` FOREIGN KEY (`Диагноз`) REFERENCES `диагноз` (`id`);

--
-- Ограничения внешнего ключа таблицы `пациент`
--
ALTER TABLE `пациент`
  ADD CONSTRAINT `пациент_ibfk_1` FOREIGN KEY (`Госпитализация`) REFERENCES `госпитализация` (`id`);

--
-- Ограничения внешнего ключа таблицы `персонал`
--
ALTER TABLE `персонал`
  ADD CONSTRAINT `Персонал_fk0` FOREIGN KEY (`Отделение`) REFERENCES `отделение` (`№ отделения`),
  ADD CONSTRAINT `Персонал_fk1` FOREIGN KEY (`Квалификация`) REFERENCES `квалификация` (`id`),
  ADD CONSTRAINT `Персонал_fk2` FOREIGN KEY (`Должность`) REFERENCES `должность` (`id`);

--
-- Ограничения внешнего ключа таблицы `процедуры`
--
ALTER TABLE `процедуры`
  ADD CONSTRAINT `Процедуры_fk0` FOREIGN KEY (`Медсестра`) REFERENCES `персонал` (`id`);

--
-- Ограничения внешнего ключа таблицы `анализы`
--
ALTER TABLE `анализы`
  ADD CONSTRAINT `Анализы_fk0` FOREIGN KEY (`Лаборатория`) REFERENCES `лаборатории` (`№ лаборатории`);

--
-- Ограничения внешнего ключа таблицы `больница`
--
ALTER TABLE `больница`
  ADD CONSTRAINT `Больница_fk0` FOREIGN KEY (`Отделения`) REFERENCES `отделение` (`№ отделения`),
  ADD CONSTRAINT `Больница_fk1` FOREIGN KEY (`Лаборатории`) REFERENCES `лаборатории` (`№ лаборатории`);

--
-- Ограничения внешнего ключа таблицы `госпитализация`
--
ALTER TABLE `госпитализация`
  ADD CONSTRAINT `госпитализация_ibfk_1` FOREIGN KEY (`Отделение`) REFERENCES `отделение` (`№ отделения`),
  ADD CONSTRAINT `госпитализация_ibfk_2` FOREIGN KEY (`История болезни`) REFERENCES `история_болезни` (`id`);

--
-- Ограничения внешнего ключа таблицы `операции`
--
ALTER TABLE `операции`
  ADD CONSTRAINT `операции_ibfk_1` FOREIGN KEY (`Врач`) REFERENCES `персонал` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
