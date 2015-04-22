-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2015 г., 21:26
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `temp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baneer`
--

CREATE TABLE IF NOT EXISTS `baneer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `on_off` varchar(5) NOT NULL,
  `page` varchar(50) NOT NULL,
  `dt_start` datetime NOT NULL,
  `dt_end` datetime NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `baneer`
--

INSERT INTO `baneer` (`id`, `user_id`, `name`, `on_off`, `page`, `dt_start`, `dt_end`, `comment`) VALUES
(2, 1, 'banner 22', 'On', 'index', '1970-01-01 03:00:00', '2017-01-01 03:00:00', '<div>\r\n<h3>Banner!!</h3>\r\n<p>Ban ban ban!!!</p>\r\n</div>'),
(3, 1, 'banner 3', 'On', 'goods', '2014-01-01 03:00:00', '2020-01-01 03:00:00', '<h3>Comment banner3</h3>'),
(4, 1, 'banner 4', 'On', 'index ', '2010-01-01 03:00:00', '2017-01-01 03:00:00', '<h2>Hello world!</h2>'),
(5, 1, 'banner 5-1', 'On', 'search', '2013-01-01 03:00:00', '2016-01-01 03:00:00', '<h3>Banner 5-1</h3>'),
(18, 7, 'SyperBanner', 'On', 'index', '2014-10-10 03:00:00', '2015-10-10 03:00:00', '<h3>Super Banner</h3>'),
(19, 2, 'Banner 100', 'On', 'forum', '2013-10-10 03:00:00', '2015-10-10 03:00:00', '<p> New banner</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_hash`) VALUES
(1, 'mixa', '123456', ''),
(2, 'dima', '111111', ''),
(7, 'kirill', '123123', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
