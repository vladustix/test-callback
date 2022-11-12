-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 12 2022 г., 15:05
-- Версия сервера: 8.0.30
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_callback`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calls`
--

CREATE TABLE `calls` (
  `id` bigint UNSIGNED NOT NULL,
  `outgoing_id` bigint UNSIGNED NOT NULL,
  `incoming_id` bigint UNSIGNED NOT NULL,
  `started_at` timestamp NOT NULL,
  `finished_at` timestamp NOT NULL,
  `duration` time NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calls`
--

INSERT INTO `calls` (`id`, `outgoing_id`, `incoming_id`, `started_at`, `finished_at`, `duration`, `cost`) VALUES
(1, 1, 2, '2022-11-08 21:01:04', '2022-11-08 21:15:12', '00:14:08', 1425),
(2, 9, 4, '2022-11-08 23:55:17', '2022-11-09 00:01:04', '00:05:47', 240),
(3, 10, 4, '2022-11-09 02:14:43', '2022-11-09 02:30:12', '00:15:29', 1280),
(4, 8, 4, '2022-11-09 04:02:04', '2022-11-09 04:58:51', '00:56:47', 4275),
(5, 7, 6, '2022-11-09 12:10:22', '2022-11-09 12:40:20', '00:29:58', 3150),
(6, 5, 1, '2022-11-09 21:06:03', '2022-11-09 21:54:10', '00:48:07', 5390),
(7, 3, 1, '2022-11-10 07:00:05', '2022-11-10 07:20:56', '00:20:51', 2205),
(8, 9, 7, '2022-11-10 15:01:58', '2022-11-10 16:34:12', '01:32:14', 2805),
(9, 1, 8, '2022-11-11 02:03:12', '2022-11-11 02:20:03', '00:16:51', 510),
(10, 7, 5, '2022-11-12 03:27:12', '2022-11-12 04:01:54', '00:34:42', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(8, '2022_11_09_092726_create_calls_table', 1),
(9, '2022_11_09_094242_create_operators_table', 1),
(10, '2022_11_09_094839_create_phones_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `operators`
--

CREATE TABLE `operators` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_within` int NOT NULL,
  `price_another` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `operators`
--

INSERT INTO `operators` (`id`, `name`, `price_within`, `price_another`) VALUES
(1, 'Мегафон', 10, 45),
(2, 'Билайн', 0, 60),
(3, 'МТС', 15, 50),
(4, 'Yota', 5, 55),
(5, 'Теле 2', 20, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `operator_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `number`, `user_id`, `operator_id`) VALUES
(1, '+79146372246', 1, 3),
(2, '+79241446274', 2, 1),
(3, '+79994233452', 3, 4),
(4, '+74441237422', 4, 5),
(5, '+79642236689', 5, 2),
(6, '+79241554764', 6, 1),
(7, '+79642326765', 7, 2),
(8, '+79842344367', 8, 3),
(9, '+7954145474', 9, 5),
(10, '+79997314575', 10, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Иванов Иван Иванович'),
(2, 'Петров Петр Петрович'),
(3, 'Михаилов Михаил Иванович'),
(4, 'Павлов Павел Павлович'),
(5, 'Васильев Василий Васильевич'),
(6, 'Александров Александр Александрович'),
(7, 'Орлова Ольга Николаевна'),
(8, 'Николаев Николай Николаевич'),
(9, 'Сергеева Екатерина Сергеевна'),
(10, 'Макарова Анастасия Антоновна');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_outgoing_id_foreign` (`outgoing_id`),
  ADD KEY `calls_incoming_id_foreign` (`incoming_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phones_number_unique` (`number`),
  ADD UNIQUE KEY `phones_user_id_unique` (`user_id`),
  ADD KEY `phones_operator_id_foreign` (`operator_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_incoming_id_foreign` FOREIGN KEY (`incoming_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_outgoing_id_foreign` FOREIGN KEY (`outgoing_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
