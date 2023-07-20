-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 20 2023 г., 20:09
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `StudentEatery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Cart`
--

CREATE TABLE `Cart` (
  `id` int NOT NULL,
  `userID` int NOT NULL,
  `productID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Cart`
--

INSERT INTO `Cart` (`id`, `userID`, `productID`, `quantity`, `price`, `status`, `date`) VALUES
(66, 2, '1 1', '1 1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Food`
--

CREATE TABLE `Food` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(54) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `category` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Food`
--

INSERT INTO `Food` (`id`, `title`, `description`, `img`, `price`, `category`) VALUES
(1, 'Борщ со свининой', 'Состав: свинина, капуста, лук, морковь, свекла, чеснок', 'Борщ со свининой.jpg', 666, 'Понедельник'),
(7, 'Салат Цезарь', 'Состав: курица, помидоры, салат Айсберг, сыр, майонез', 'Салат Цезарь.jpg', 50, 'Среда'),
(8, 'Щи с курицей', 'Состав: картошка, курица, морковь, капуста', 'Щи с курицей.jpg', 100, 'Четверг'),
(9, 'Салат Летний', 'Состав: помидоры, огурцы, зелень, лук, масло оливковое', 'Салат Летний.jpg', 79, 'Пятница'),
(10, 'Картошка жаренная', 'Состав: картошка', 'Картошка жаренная.jpg', 65, 'Суббота'),
(12, 'Окрошка', 'афыафыафы', 'Окрошка.jpg', 123, 'Вторник');

-- --------------------------------------------------------

--
-- Структура таблицы `OrderHistory`
--

CREATE TABLE `OrderHistory` (
  `id` int NOT NULL,
  `userID` int NOT NULL,
  `productID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `OrderHistory`
--

INSERT INTO `OrderHistory` (`id`, `userID`, `productID`, `quantity`, `price`, `status`, `date`) VALUES
(14, 2, '1 11', '1 1', 270, 'Готов к выдаче', '2023-07-19'),
(15, 2, '7 8', '1 1', 150, 'Ожидает подтверждения на кассе', '2023-07-19'),
(16, 1, '1 12', '1 1', 789, 'Ожидает подтверждения на кассе', '2023-07-20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `PhoneNumber`) VALUES
(1, 'admin', '$2y$10$P0./G46TwzrLRP66gTXF5eBWQkYg3nBWKhlCZQq.fPwr77S97cnH2', 'iso121@yandex.ru', '79143449463'),
(2, 'luckyiso', '$2y$10$iyLwA3n8kQwuFigDiHKTTOCFJAXuP6vQpa0iA73.hTRc82DNBlgre', 'luckyiso121@gmail.com', '79147029927'),
(3, 'cashier', '$2y$10$X9dWbucX4FBjl7G1rLkh8ub3RURxSeYtUwEbVmNyTMs9Tnjg9dL6S', 'iso1211@yandex.ru', '79143449464');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Индексы таблицы `Food`
--
ALTER TABLE `Food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `OrderHistory`
--
ALTER TABLE `OrderHistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cart`
--
ALTER TABLE `Cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `Food`
--
ALTER TABLE `Food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `OrderHistory`
--
ALTER TABLE `OrderHistory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `OrderHistory`
--
ALTER TABLE `OrderHistory`
  ADD CONSTRAINT `orderhistory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
