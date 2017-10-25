-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2017 г., 19:47
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `work`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `direction` int(11) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `yer` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `planting_costs` int(11) NOT NULL,
  `driver_phone` varchar(255) NOT NULL,
  `costs_per_1` int(11) NOT NULL,
  `car_photo` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `status`, `color`, `direction`, `reg_number`, `yer`, `brand`, `model`, `currency`, `planting_costs`, `driver_phone`, `costs_per_1`, `car_photo`, `lat`, `lan`) VALUES
(2, 1, 'red', 300, 'AA 2345', 2014, 'Audi', 'A4', 'frn', 32, '380976357289', 2, 'http://example.com/data/cars/mercedes-ml.png', '23.333', '45.3434'),
(3, 1, 'red', 300, 'AA 2345', 2014, 'Audi', 'A4', 'frn', 32, '380976357289', 2, 'http://example.com/data/cars/mercedes-ml.png', '23.333', '45.3434');

-- --------------------------------------------------------

--
-- Структура таблицы `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `username_canonical` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `email`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `username_canonical`, `email_canonical`, `number`, `country`) VALUES
(1, 'testuser', 'testuser@gmail.com', 1, NULL, '$2y$13$7wnQRgNzsaBFJQYzxt/faON3ftn4xyRC7wGmgOec5E5GVKZcqdPii', NULL, NULL, NULL, 'N;', 'testuser', 'testuser@gmail.com', '', '0'),
(71, 'Dmitry', 'Dmitry@gmail.com', 1, NULL, '$2y$13$dcAxSD3xhpL2q9CjccBnTOVFfGm/YRfIgpPPL1sMDAy5KX5d7ui3C', NULL, 'z4RankfkkHkarFRZ', NULL, 'N;', 'dmitry', 'dmitry@gmail.com', '+380955903036', '804');

-- --------------------------------------------------------

--
-- Структура таблицы `fos_user_add_on_email`
--

CREATE TABLE `fos_user_add_on_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `fos_user_add_on_email`
--

INSERT INTO `fos_user_add_on_email` (`id`, `user_id`, `created_at`, `email`) VALUES
(1, 1, '2017-10-03 00:00:00', 'df');

-- --------------------------------------------------------

--
-- Структура таблицы `itinerarys`
--

CREATE TABLE `itinerarys` (
  `id` int(11) NOT NULL,
  `idroute` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `itinerarys`
--

INSERT INTO `itinerarys` (`id`, `idroute`, `address`, `lat`, `lon`, `sort`) VALUES
(1, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(2, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(3, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(4, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(5, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(6, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(7, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(8, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(9, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(10, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(11, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(12, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(13, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(14, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(15, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(16, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(17, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(18, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(19, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(20, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(21, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(22, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(23, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(24, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(25, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(26, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(27, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(28, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(29, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(30, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(31, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(32, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(33, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(34, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(35, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(36, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(37, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(38, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(39, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(40, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(41, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(42, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(43, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(44, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(45, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(46, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(47, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(48, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(49, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(50, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(51, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(52, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(53, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(54, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(55, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(56, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(57, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(58, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(59, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(60, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(61, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(62, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(63, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(64, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(65, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(66, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(67, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(68, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(69, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(70, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(71, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(72, 12, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(73, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(74, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(75, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(76, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(77, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(78, 1, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(79, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(80, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(81, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(82, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(83, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(84, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(85, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(86, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(87, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(88, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(89, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(90, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(91, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(92, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(93, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(94, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(95, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(96, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3),
(97, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 1),
(98, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 2),
(99, 71, 'Ukraine, Dnipro, Malinovskogo 2', '45.32323', '39.544645', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `location`, `auto`, `country`, `region`, `driver`, `time`, `active`) VALUES
(11, '1', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(12, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(13, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(14, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(15, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(16, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(17, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(18, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(19, '22.333,34.455', '32', '13', 12, 71, '2016-09-25 14:55', 2),
(20, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(21, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(22, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(23, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(24, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(25, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0),
(26, '22.333,34.455', '32', '13', 12, 12, '2016-09-25 14:55', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Индексы таблицы `fos_user_add_on_email`
--
ALTER TABLE `fos_user_add_on_email`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_24839793E7927C74` (`email`),
  ADD KEY `IDX_24839793A76ED395` (`user_id`);

--
-- Индексы таблицы `itinerarys`
--
ALTER TABLE `itinerarys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT для таблицы `fos_user_add_on_email`
--
ALTER TABLE `fos_user_add_on_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `itinerarys`
--
ALTER TABLE `itinerarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `fos_user_add_on_email`
--
ALTER TABLE `fos_user_add_on_email`
  ADD CONSTRAINT `FK_24839793A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
