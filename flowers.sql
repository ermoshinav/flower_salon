-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2018 г., 09:09
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `flowers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bukets`
--

CREATE TABLE IF NOT EXISTS `bukets` (
  `id_buket` int(11) NOT NULL,
  `name_buket` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `price` float(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bukets`
--

INSERT INTO `bukets` (`id_buket`, `name_buket`, `img`, `price`) VALUES
(3, 'Помпея', 'images/3.jpg', 1500.00),
(4, 'Летний', 'images/4.png', 1500.00),
(5, 'Полевой', 'images/5.jpg', 2750.00),
(6, 'Флоранж', 'images/6_1.jpg', 1770.00),
(7, 'Нежность', 'images/7.jpg', 1110.00),
(8, 'Рассвет', 'images/11.jpg', 2110.00),
(9, 'Букет лилии', 'images/8.jpg', 1500.00),
(10, '8 марта', 'images/9.jpg', 1765.00),
(11, 'Статица', 'images/10.jpg', 350.00),
(12, 'Фантазерка', 'images/12.jpg', 2140.00);

-- --------------------------------------------------------

--
-- Структура таблицы `otzivi`
--

CREATE TABLE IF NOT EXISTS `otzivi` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `fio` varchar(60) NOT NULL,
  `email` varchar(20) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `otzivi`
--

INSERT INTO `otzivi` (`id`, `date`, `fio`, `email`, `text`) VALUES
(1, '2018-05-07', 'Максим Авдеев', 'max.avdeev@yandex.ru', 'Я впервые делал заказ цветов по интернету, поэтому были небольшие опасения. Но к счастью всё прошло отлично. Сам заказ я оформил на сайте после того как выбрал нужный мне букет. Цветы доставили в точно назначенное мною время, букет был очень красивый и составлен в точности как я и заказал. Жена была приятно удивленна, чего я и добивался. Так что услугами этой компании я остался очень доволен!'),
(2, '2018-04-28', 'Татьяна', 'tata@mail.ru', 'Всё замечательно! Букет шикарный! Курьер очень внимательна и отзывчива! Маме исполнилось 80 и она осталось очень довольна! Плакала от счастья! Спасибо!\r\n\r\n\r\n'),
(3, '2018-04-02', 'Наталья', 'natasha57777@yandex.', 'Спасибо за то, что вы так организованно и качественно помогаете дарить эмоции.'),
(4, '2018-05-08', 'Алиса', 'lisa_alisa@list.ru', 'Букет превзошёл ожидания, доставка была осуществлена в срок. Рекомендую:)');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(15, 'jjjj', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'maria', '25d55ad283aa400af464c76d713c07ad'),
(18, 'admin', 'bbad8d72c1fac1d081727158807a8798');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE IF NOT EXISTS `uslugi` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `img` varchar(50) NOT NULL,
  `descr` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `name`, `img`, `descr`) VALUES
(8, 'ДОСТАВКА ЦВЕТОВ И БУКЕТОВ', 'images/dostavka.jpg', 'Услуги флориста – не единственное, что требуется современному занятому человеку. В нашем городе  не обойтись без доставки букета по адресу. Мы решили эту проблему и предлагаем Вам удобную схему удалённого сотрудничества. Благодаря ей Вы не только сможете оформить заказ из любой точки мира в любое удобное для Вас время, но и быть уверенным в том, что адресат получит букет от Вас точно в срок. '),
(9, 'СВАДЕБНЫЕ БУКЕТЫ', 'images/nevesty.jpg', 'Для создания свадебных букетов требуется особое мастерство, хороший вкус и профильное образование. Лишь флорист, располагающий всем этим может создать уникальную композицию, которая будет гармонировать с нарядом невесты, тематикой свадьбы и оформлением праздничного зала. В наших умелых руках цветы превращаются в удивительный, элегантный, непохожий ни на один букет, который станет настоящим украшением свадебного торжества.'),
(10, 'ОФОРМЛЕНИЕ ТОРЖЕСТВ И МЕРОПРИЯТИЙ', 'images/mer.jpg', 'Владение флористическим искусством в совершенстве позволяет нашим флористам творить чудеса. Мы оформляем торжества и мероприятия в соответствии с их тематикой, стилистикой, бюджетом и пожеланиями заказчика. Вы будете удивлены тому, насколько органичным может выглядеть пространство для празднования того или иного события после того, как наши флористы оформят его цветами и декором. В этом им помогут их навыки, хороший вкус, ощущение цвета и использование качественных материалов.');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE IF NOT EXISTS `zakaz` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_buket` int(11) NOT NULL,
  `kolvo` float(6,2) NOT NULL,
  `summa` float(6,2) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `fio` varchar(60) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `dostavka` varchar(20) NOT NULL,
  `oplata` varchar(20) NOT NULL,
  `fakt_data` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `data`, `id_buket`, `kolvo`, `summa`, `id_user`, `fio`, `tel`, `adres`, `dostavka`, `oplata`, `fakt_data`, `status`, `message`) VALUES
(33, '2018-06-01', 10, 1.00, NULL, 15, 'Улыбышев Семен', '892522522', 'пр.Огня ', 'Самовывоз', 'Банковская карта', '2018-06-01', '1', 'на защиту димплома'),
(34, '2018-05-31', 7, 3.00, NULL, 15, 'Полякова', '245665', 'пр.Баклановский 77', 'Курьер', 'Банковская карта', '2018-06-01', '1', ''),
(36, '2018-06-01', 9, 3.00, NULL, 15, 'Иванов', '4216542', 'ул.Московская 70', 'Самовывоз', 'Наличные', NULL, NULL, ''),
(39, '2018-06-03', 4, 1.00, NULL, 16, 'Петрова Мария', '5656232035', 'ул Народная 44', 'Курьер', 'Банковская карта', NULL, NULL, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bukets`
--
ALTER TABLE `bukets`
  ADD PRIMARY KEY (`id_buket`);

--
-- Индексы таблицы `otzivi`
--
ALTER TABLE `otzivi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klient` (`id_user`),
  ADD KEY `id_klient_2` (`id_user`),
  ADD KEY `id_buket` (`id_buket`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bukets`
--
ALTER TABLE `bukets`
  MODIFY `id_buket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `otzivi`
--
ALTER TABLE `otzivi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD CONSTRAINT `zakaz_ibfk_2` FOREIGN KEY (`id_buket`) REFERENCES `bukets` (`id_buket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zakaz_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
