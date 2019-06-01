-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 01 2019 г., 10:43
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
-- База данных: `Thread_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `author` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `post_id`, `date`, `content`, `author`) VALUES
(1, 1, 1, '2019-06-01 07:04:47', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, nesciunt qui neque quaerat architecto dolor fugiat quas consequatur velit dicta id quae perferendis laborum fugit itaque eius porro. Culpa, quis.\r\n', 'admin'),
(2, 1, 1, '2019-06-01 07:16:14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `article` varchar(128) NOT NULL,
  `author` varchar(32) NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `content` text NOT NULL,
  `upvotes` int(11) UNSIGNED NOT NULL,
  `downvotes` int(11) UNSIGNED NOT NULL,
  `comments_id` text NOT NULL,
  `comments_count` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `article`, `author`, `author_id`, `data`, `content`, `upvotes`, `downvotes`, `comments_id`, `comments_count`) VALUES
(1, 'Как я избил бабку', 'admin', 1, '2019-05-29', 'Прочитав пост про вредных бабок в очереди, вспомнил одну историю про бабку в поезде.\r\nЕхал я как-то домой на поезде на верхней полке. В вагоне тишина, кто-то дремлет, кто-то смотрит фильм на планшете, прям идеальная поездка для дешёвого плацкарта. Даже кто-то пельмешки умудрился сварить!\r\nВскоре настала ночь, а я полез спать на верх. До моей станции ещё была одна ночная остановка. Поэтому, опасаясь за свой портфель(у меня был с собой только он ), я положил его в ноги прикрепил боковой стойке.\r\nТак вот, время уже 3 ночи, мне снится сон про то, как я катаюсь на лошадке и расчесываю ей гриву. И тут я чувствую, что сквозь сон, кто-то своей пятернёй вонючей шурудит у меня около жопы. Я просыпаюсь и вижу такую картину, как какая-то бабка шарится у меня в портфеле. Массивная, толстая бабка!<br> \"От сучья ляжка\"- подумал я. От неожиданности я пяткой зарядил ей прямиком в лоб, да так сильно, что она покатилась как колобок. Шучу... Просто упала на 5ю точку и заорала мол - \"грааабют, насилуют помогите!\"\r\nОтпуская подробности прибежали люди в форме и стали разбираться, бабка же с огромной шишкой на лбу говорила, что я такой наркоман, напал на нее и хотел ограбить. Я в свою очередь описал свою ситуацию.\r\nНе знаю чем бы всё это закончилось, но на выручку женщина с соседней полки и сказал, что сама видела как бабка у меня шурудила, но подумала, что она меня будит.\r\nВ свое оправдание бабка сказала , что в рюкзаке моем она в увидела мышь и хотел ее прогнать. Мышь!!! Мышь сука!\r\nВ итоге бабку куда то увели, а я полез гладить гриву лошадки.', 1000, 123, '1', 1),
(2, 'Коротко о том как мой знакомый свой бизнес открыл.', 'admin', 1, '2019-05-30', 'Решил сдавать электросамокаты на прокат, Купил 4 самоката по 24000р за штуку, брал с клиента залог 5000р и паспорт.<br>\r\nПрошло 3 дня его работы, теперь у него 4 паспорта и 20000р\r\n', 500, 0, '2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `image`, `password`, `email`) VALUES
(1, 'admin', '/user.png', 'admin', ''),
(2, 'Useer', '/user.png', 'asdasd', 'asdasd@asd.asd'),
(3, 'MMoon', '/user.png', 'asdasd', 'mmesyatz@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
