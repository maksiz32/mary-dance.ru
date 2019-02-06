-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `marydance`;
CREATE DATABASE `marydance` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `marydance`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageContent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `contents`;
INSERT INTO `contents` (`id`, `title`, `pageContent`, `photo`, `created_at`, `updated_at`) VALUES
(1,	'Molestias itaque illo eum beatae nam sint ullam.',	'Hatter: \'I\'m on the same size: to be no use in talking to him,\' said Alice in a piteous tone. And the executioner myself,\' said the Gryphon: and it sat for a great hurry; \'and their names were. || March Hare, who had been jumping about like that!\' said Alice as it happens; and if the Queen never left off when they saw her, they hurried back to the porpoise, \"Keep back, please: we don\'t want.',	'https://lorempixel.com/960/427/?88959',	'2019-02-04 14:18:37',	'2019-02-04 14:18:37'),
(2,	'Iste eos consequuntur ea a ipsum est.',	'Some of the Rabbit\'s voice along--\'Catch him, you by the soldiers, who of course you don\'t!\' the Hatter continued, \'in this way:-- \"Up above the world you fly, Like a tea-tray in the air. \'--as far. || THAT is--\"Take care of themselves.\"\' \'How fond she is such a thing before, but she could see it written up somewhere.\' Down, down, down. There was nothing so VERY nearly at the end of the same age.',	'https://lorempixel.com/960/427/?27484',	'2019-02-04 14:18:37',	'2019-02-04 14:18:37'),
(3,	'Aut quia repellendus accusamus sed necessitatibus harum consectetur eum.',	'Rabbit\'s voice along--\'Catch him, you by the officers of the Lobster Quadrille?\' the Gryphon repeated impatiently: \'it begins \"I passed by his garden.\"\' Alice did not at all know whether it was. || Soup! \'Beautiful Soup! Who cares for you?\' said the youth, \'one would hardly suppose That your eye was as long as I do,\' said the Pigeon in a trembling voice:-- \'I passed by his face only, she would.',	'https://lorempixel.com/960/427/?52485',	'2019-02-04 14:18:37',	'2019-02-04 14:18:37');

DROP TABLE IF EXISTS `dogs_photos`;
CREATE TABLE `dogs_photos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_dogs` int(11) unsigned NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dogs` (`id_dogs`),
  CONSTRAINT `dogs_photos_ibfk_2` FOREIGN KEY (`id_dogs`) REFERENCES `our_dogs` (`id_dogs`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

TRUNCATE `dogs_photos`;
INSERT INTO `dogs_photos` (`id`, `id_dogs`, `photo`) VALUES
(1,	1,	'1532902478_mary-dance_ru.jpg'),
(2,	24,	'_30.jpg'),
(3,	24,	'_31.jpg'),
(4,	1,	'_32.jpg'),
(5,	3,	'_33.jpg'),
(6,	4,	'_34.jpg'),
(7,	4,	'_35.jpg'),
(8,	4,	'_36.jpg'),
(9,	8,	'_37.jpg'),
(10,	11,	'_38.jpg'),
(11,	11,	'_39.jpg'),
(12,	39,	'_40.jpg'),
(13,	1,	'_38.jpg');

DROP TABLE IF EXISTS `litters`;
CREATE TABLE `litters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `litter` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `litters`;
INSERT INTO `litters` (`id`, `litter`, `created_at`, `updated_at`) VALUES
(1,	'A',	'2019-02-04 14:18:36',	'2019-02-04 14:18:36');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3,	'2014_10_12_000000_create_users_table',	1),
(4,	'2014_10_12_100000_create_password_resets_table',	1),
(6,	'2019_01_29_114353_create_litters_table',	2),
(9,	'2019_01_30_152942_create_contents_table',	3);

DROP TABLE IF EXISTS `our_dogs`;
CREATE TABLE `our_dogs` (
  `id_dogs` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sex` int(1) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_age` date NOT NULL,
  `family` varchar(3) NOT NULL,
  `dbres` varchar(100) DEFAULT NULL,
  `sale` int(1) unsigned NOT NULL,
  `little` int(1) unsigned NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id_dogs`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

TRUNCATE `our_dogs`;
INSERT INTO `our_dogs` (`id_dogs`, `sex`, `name`, `date_age`, `family`, `dbres`, `sale`, `little`, `updated_at`, `created_at`) VALUES
(1,	0,	'Сучка',	'2018-02-05',	'ЛЕ2',	'http://www.ccddb.com/local/foo/bar.html',	1,	0,	'2019-01-19',	NULL),
(3,	0,	'3',	'2018-02-15',	'kll',	'www.ccddb.com/local/foo/bar.html',	1,	0,	NULL,	NULL),
(4,	1,	'4',	'2018-02-15',	'wcd',	'http://ccddb.com/local/foo/bar.html',	0,	0,	NULL,	NULL),
(5,	1,	'5',	'2018-02-15',	'wcd',	'ccddb.com/local/foo/bar.html',	1,	0,	NULL,	NULL),
(8,	0,	'8',	'2018-02-15',	'ddd',	'http://ccddb.com/local/foo/',	0,	0,	NULL,	NULL),
(11,	0,	'11',	'2017-02-15',	'wcd',	NULL,	1,	0,	NULL,	NULL),
(20,	2,	'1234',	'2018-07-06',	'444',	NULL,	0,	0,	NULL,	NULL),
(22,	0,	'321',	'2017-07-20',	'222',	NULL,	1,	1,	NULL,	NULL),
(24,	2,	'13225465',	'2018-03-03',	'A',	'http://www.2ccddb.com/louless/foo/bar/baz.html',	0,	1,	NULL,	NULL),
(38,	2,	'ввв',	'2018-08-01',	'в1',	'',	0,	1,	NULL,	NULL),
(39,	0,	'1111111',	'2018-04-01',	'А',	NULL,	0,	0,	'2019-01-19',	'2019-01-19'),
(40,	1,	'121212',	'2019-01-01',	'n',	NULL,	0,	0,	'2019-01-23',	'2019-01-23');

DROP TABLE IF EXISTS `our_news`;
CREATE TABLE `our_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `text` varchar(2000) NOT NULL,
  `author` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

TRUNCATE `our_news`;
INSERT INTO `our_news` (`id`, `title`, `date`, `photo`, `text`, `author`, `updated_at`, `created_at`) VALUES
(1,	'News 1',	'2018-06-24',	'IMG_0201.JPG',	'text of news1',	'Mary-Dance',	NULL,	NULL),
(8,	'6',	'2019-01-23',	NULL,	'6666',	'MaryDance',	'2019-01-23',	'2019-01-23'),
(11,	'6',	'2019-01-24',	NULL,	'<p>bkbj b k kjhb bhb hbb bb b bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbb</p>\r\n\r\n<figure class=\"easyimage easyimage-side\"><img alt=\"\" src=\"blob:http://mary-dance.lc/0040ebfb-43dc-46a4-8dbf-f54e8b922308\" width=\"267\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>bbbbbbbbbbb bbbbbbbbhhhhhhhhhhh hhhhhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhh hhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>\r\n\r\n<p>&nbsp;</p>',	'MaryDance',	'2019-01-24',	'2019-01-24'),
(15,	'7',	'2019-01-25',	'img/7xaaPPyFdABcL2eR89aZcioCysXXliHnKJNBL70r.jpeg',	'<p>744444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444</p>vvvvvv<p>sdddddddddddddddddddddddsssssssssssssssssssfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</p>',	'MaryDance',	NULL,	NULL),
(16,	'8',	'2019-01-28',	NULL,	'<p>888</p>\r\n\r\n<p>8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888</p>',	'MaryDance',	NULL,	NULL),
(17,	'9',	'2019-01-28',	NULL,	'<p>6999999999999999999</p>',	'MaryDance',	NULL,	NULL),
(18,	'10',	'2019-01-28',	'img/1fGxb0946I2qMbc06rfOiA9CRtPmfp1P9j4Lv5eM.jpeg',	'<p>10</p>',	'MaryDance',	NULL,	NULL),
(19,	'11',	'2019-01-28',	'img/1548702718_mary-dance_ru',	'<p>11</p>',	'MaryDance',	NULL,	NULL),
(20,	'12',	'2019-01-28',	'img/1548706278_mary-dance_ru.png',	'<p>12</p>',	'MaryDance',	NULL,	NULL),
(21,	'k',	'2019-01-28',	'img/1548706696_mary-dance_ru.jpg',	'<p>kkk</p>',	'MaryDance',	NULL,	NULL),
(22,	'k',	'2019-01-28',	'img/1548706802_mary-dance_ru.jpg',	'<p>kkk</p>',	'MaryDance',	NULL,	NULL),
(23,	'k',	'2019-01-28',	'img/1548706944_mary-dance_ru.jpg',	'<p>kkk</p>',	'MaryDance',	NULL,	NULL),
(24,	'k',	'2019-01-28',	'img/1548707098_mary-dance_ru.jpg',	'<p>kkk</p>',	'MaryDance',	NULL,	NULL),
(25,	'l',	'2019-01-28',	'img/1548707134_mary-dance_ru.jpg',	'<p>lll</p>',	'MaryDance',	NULL,	NULL),
(26,	'l',	'2019-01-28',	'img/1548707320_mary-dance_ru.jpg',	'<p>lll</p>',	'MaryDance',	NULL,	NULL),
(27,	'm',	'2019-01-28',	'img/1548707357_mary-dance_ru.jpg',	'<p>mmm</p>',	'MaryDance',	NULL,	NULL),
(28,	'm',	'2019-01-28',	'img/1548708829_mary-dance_ru.jpg',	'<p>mmm</p>',	'MaryDance',	NULL,	NULL),
(29,	'n',	'2019-01-28',	'img/1548708884_mary-dance_ru.jpg',	'<p>nnn</p>',	'MaryDance',	NULL,	NULL),
(30,	'n',	'2019-01-28',	'img/1548708907_mary-dance_ru.jpg',	'<p>nnn</p>',	'MaryDance',	NULL,	NULL),
(31,	'o',	'2019-01-28',	'img/1548708934_mary-dance_ru.jpg',	'<p>ooo</p>',	'MaryDance',	NULL,	NULL),
(32,	'p',	'2019-01-28',	NULL,	'<p><s>ppp</s></p>',	'MaryDance',	NULL,	NULL);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `password_resets`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'a',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Maksim',	'maks-manzulin@mail.ru',	'$2y$10$tg2/beB5ybKkspTe/UcUmukQvu3t4bg.EzzFJ.Pxm9hmUzZMVs6TS',	'm',	'lanDgwQnLxDOlTJ7SIHuGQVPqk53xY8UxaMpjbui9lE1UebQdl7vVG65nwOM',	'2019-01-13 14:32:32',	'2019-01-13 14:39:24'),
(2,	'М',	'maria-nastasina@yandex.ru',	'$2y$10$tg2/beB5ybKkspTe/UcUmukQvu3t4bg.EzzFJ.Pxm9hmUzZMVs6TS',	'm',	'jYZ7VYEdnhL0A5aZgYPTApE7c7TdQ39KzkHtOMX1ZdDQD3rzGx1F4mOWQwTl',	NULL,	'2019-02-04 05:32:44');

-- 2019-02-04 18:19:41
