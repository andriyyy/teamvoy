-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2015 г., 15:47
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `sharer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `content`, `user_id`, `sharer_id`) VALUES
(3, 'Pellentesque id massa lectus. In ultrices, arcu eu finibus euismod, arcu nunc luctus lectus, at interdum mi lorem in nulla. Suspendisse id volutpat arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas tempor pulvinar convallis. Praesent ornare turpis ante, et fringilla erat condimentum id. Mauris fermentum felis ac est viverra tristique. Maecenas ac justo nibh.\n', 4, 1),
(4, 'Praesent sodales ultricies arcu, nec consectetur nisl feugiat sit amet. Ut at mi sed sapien hendrerit volutpat vel nec turpis. Fusce tristique aliquet nulla, ut elementum odio sodales vel. Pellentesque leo enim, maximus at ultrices ac, fringilla ut neque. Ut eget volutpat ipsum. Proin eget cursus tortor. Nulla consectetur, ante at sagittis malesuada, velit nisl vehicula eros, eget sollicitudin lectus metus et quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vitae sapien enim. Pellentesque in turpis bibendum, laoreet nisl vel, rutrum augue. Maecenas in tortor massa. Maecenas eleifend leo vel nunc iaculis convallis. Maecenas a placerat quam. Fusce nec dapibus erat. Mauris sit amet elit lorem. Etiam facilisis sapien arcu, id mollis leo suscipit ut.', 1, 4),
(5, 'Aliquam tincidunt odio id sollicitudin lobortis. Ut semper dui et risus luctus malesuada. Praesent at turpis porta, scelerisque odio vitae, efficitur quam. In hac habitasse platea dictumst. Proin vitae tellus sit amet massa rutrum scelerisque. Etiam varius risus in libero sollicitudin, ac lacinia ante bibendum. Nullam porta enim massa, at volutpat est consequat ut. Mauris quis pharetra tellus. Donec odio urna, sodales ut bibendum malesuada, scelerisque et nulla. Nunc tempus tellus nec elit tincidunt elementum. In quis augue a arcu elementum egestas a ut quam. Mauris a varius nunc. Maecenas sed lectus sodales, auctor nibh et, rutrum eros. Morbi dapibus, nunc vel condimentum faucibus, tellus arcu ultricies felis, a maximus augue nisl in risus.', 1, 1),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non felis blandit, luctus urna vitae, maximus arcu. Vestibulum lobortis in diam eget hendrerit. Aliquam eget quam consectetur eros porttitor porttitor. Fusce et dolor ac odio ultricies volutpat. Nunc vel vulputate turpis, non pellentesque enim. Phasellus maximus consequat orci, et convallis ante varius ac. Phasellus vitae est gravida, iaculis purus eget, eleifend erat.', 2, 4),
(7, 'Morbi pellentesque ut elit luctus tempus. Etiam aliquet nunc eu mi lobortis, at lacinia massa pulvinar. Aliquam erat volutpat. Vestibulum tempus eget velit vitae aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac magna sodales lorem convallis maximus convallis a magna. Maecenas tristique molestie nisl sed lacinia. Nunc at tortor vel urna interdum pretium a eget metus. Duis egestas eros vitae ipsum gravida pulvinar. Suspendisse turpis arcu, aliquam ut blandit id, venenatis sit amet risus. Donec eu diam vitae tortor semper ornare. Quisque vitae pellentesque nunc, nec placerat dui. Nullam ornare faucibus purus vel luctus. Suspendisse potenti.', 3, 1),
(12, 'Pellentesque id massa lectus. In ultrices, arcu eu finibus euismod, arcu nunc luctus lectus, at interdum mi lorem in nulla. Suspendisse id volutpat arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas tempor pulvinar convallis. Praesent ornare turpis ante, et fringilla erat condimentum id. Mauris fermentum felis ac est viverra tristique. Maecenas ac justo nibh.', 5, 1),
(13, 'Mauris tincidunt, orci nec semper malesuada, nisi justo hendrerit odio, sit amet eleifend justo massa vel lacus. Proin rutrum sem eu dolor varius blandit vitae vel mauris. Aenean quis lectus at ex eleifend luctus. Vestibulum efficitur nisl nec luctus ultricies. Donec sit amet elit commodo, elementum massa id, eleifend elit. Duis neque elit, vehicula volutpat blandit non, cursus sed nisl. Curabitur libero nisi, viverra at leo et, consequat tincidunt lorem. Pellentesque faucibus quis nulla ut elementum. Maecenas sed tellus at ipsum vestibulum mattis. Sed non elit laoreet, tincidunt ligula vel, vulputate sapien. Donec quis porta ante.', 6, 1),
(14, 'Praesent vel faucibus sapien. Ut dapibus a tortor faucibus condimentum. In hac habitasse platea dictumst. Maecenas ac interdum magna, varius hendrerit sapien. Cras suscipit, diam at dictum tempus, elit nisl volutpat nibh, efficitur molestie risus ligula sit amet quam. Maecenas non porttitor risus, eget molestie risus. Vivamus facilisis turpis id nisi semper, non commodo elit ultrices. Curabitur fermentum mi id metus tristique, vitae elementum elit dictum. Nulla dui augue, scelerisque eget lobortis et, mattis vitae turpis. Maecenas ac suscipit est. Sed blandit dictum sem, gravida faucibus metus pellentesque laoreet. Proin accumsan ante eu turpis gravida, sit amet semper diam malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 3, 1),
(17, 'In ultrices massa ut est pellentesque, sed malesuada est sollicitudin. Suspendisse potenti. Vivamus ut sem consectetur, malesuada turpis sit amet, efficitur lacus. Aenean quis eros non leo venenatis rutrum elementum sed diam. Curabitur porta lobortis imperdiet. Phasellus consequat ipsum at blandit scelerisque. Fusce eget sapien dignissim, accumsan turpis quis, fermentum ligula. In non turpis libero.', 2, 1),
(18, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non felis blandit, luctus urna vitae, maximus arcu. Vestibulum lobortis in diam eget hendrerit. Aliquam eget quam consectetur eros porttitor porttitor. Fusce et dolor ac odio ultricies volutpat. Nunc vel vulputate turpis, non pellentesque enim. Phasellus maximus consequat orci, et convallis ante varius ac. Phasellus vitae est gravida, iaculis purus eget, eleifend erat.', 5, 1),
(19, 'Praesent lobortis et ex non fringilla. Aenean efficitur neque in metus molestie pharetra. Aliquam mi ante, gravida eu risus ac, varius sollicitudin libero. Donec finibus urna eu quam pulvinar, eget commodo eros dictum. Integer porttitor erat lacus, ut gravida risus interdum vitae. Suspendisse pellentesque nisi sed sapien mattis, vel laoreet enim commodo. Vestibulum eget volutpat dui. Pellentesque pulvinar eget arcu vulputate interdum. In vel elementum velit. Sed condimentum ligula ac metus consectetur, sit amet egestas arcu rhoncus. Praesent dignissim ipsum nisi, ac posuere ligula luctus eget.', 6, 1),
(20, '1Pellentesque id massa lectus. In ultrices, arcu eu finibus euismod, arcu nunc luctus lectus, at interdum mi lorem in nulla. Suspendisse id volutpat arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas tempor pulvinar convallis. Praesent ornare turpis ante, et fringilla erat condimentum id. Mauris fermentum felis ac est viverra tristique. Maecenas ac justo nibh.', 1, 1),
(22, 'Pellentesque id massa lectus. In ultrices, arcu eu finibus euismod, arcu nunc luctus lectus, at interdum mi lorem in nulla. Suspendisse id volutpat arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas tempor pulvinar convallis. Praesent ornare turpis ante, et fringilla erat condimentum id. Mauris fermentum felis ac est viverra tristique. Maecenas ac justo nibh.', 1, 1),
(28, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur dignissim arcu dapibus fringilla. Fusce a libero magna. Nulla euismod, ipsum a sodales feugiat, risus tortor tempor tortor, nec vestibulum mauris sem at nisl. Morbi lacus orci, pellentesque vel consectetur quis, cursus vel ipsum. Nam commodo tincidunt ornare. Cras consequat lacus purus, non pretium massa rhoncus ac. Nullam efficitur vestibulum turpis, nec gravida orci ullamcorper id. Quisque a sollicitudin mauris. Proin turpis ex, mollis ac magna at, pellentesque pharetra erat. Duis id eros elit. Donec ipsum ipsum, sodales in tortor sit amet, rhoncus iaculis justo. Nam blandit felis id ligula accumsan, quis ornare dolor congue.', 1, 1),
(31, 'Maecenas tempor pulvinar convallis. Praesent ornare turpis ante, et fringilla erat condimentum id. Mauris fermentum felis ac est viverra tristique. Maecenas ac justo nibh.', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `hash` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `hash`, `status`) VALUES
(1, 'manager', 'e10adc3949ba59abbe56e057f20f883e', 'user1@gmail.com', '', 1),
(2, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 'user1@gmail.com', '224487', 0),
(3, 'user2', 'e10adc3949ba59abbe56e057f20f883e', 'user2@gmail.com', '237569', 0),
(4, 'user3', 'e10adc3949ba59abbe56e057f20f883e', 'user3@gmail.com', '', 1),
(5, 'user4', 'dc0fa7df3d07904a09288bd2d2bb5f40', 'user4@gmail.com', '069854', 0),
(6, 'user5', 'dc0fa7df3d07904a09288bd2d2bb5f40', 'user5@gmail.com', '547346', 0),
(36, 'user6', 'dc0fa7df3d07904a09288bd2d2bb5f40', 'uuuu@test.com1', '824438', 0),
(37, 'user7', 'dc0fa7df3d07904a09288bd2d2bb5f40', 'test@test.com1', '705374', 0),
(38, 'user8', 'dc0fa7df3d07904a09288bd2d2bb5f40', 'test@test.com2', '', 1),
(39, 'user9', 'e10adc3949ba59abbe56e057f20f883e', 'test@test.com3', '432720', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
