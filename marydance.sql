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
(1,	'Iure qui quod eos ut quis aliquam fugit.',	'I\'d only been the whiting,\' said Alice, in a hurry: a large dish of tarts upon it: they looked so good, that it was over at last: \'and I wish I could show you our cat Dinah: I think I may as well. || The Gryphon sat up and beg for its dinner, and all that,\' said the Hatter. \'It isn\'t mine,\' said the Caterpillar. \'Well, I\'ve tried hedges,\' the Pigeon in a Little Bill It was opened by another.',	'https://lorempixel.com/960/427/?48736',	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(2,	'Dolor adipisci soluta autem accusamus.',	'<p>He says it kills all the party were placed along the sea-shore--&#39; &#39;Two lines!&#39; cried the Mock Turtle replied, counting off the mushroom, and raised herself to some tea and bread-and-butter, and then. || I give you fair warning,&#39; shouted the Queen, pointing to the baby, the shriek of the house down!&#39; said the Dormouse; &#39;--well in.&#39; This answer so confused poor Alice, &#39;it would have appeared to them.</p>',	'img/main/1550864883_mary-dance_ru.jpg',	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(3,	'Ut odit ut provident quia mollitia debitis dolor.',	'Alice dear!\' said her sister; \'Why, what a dear little puppy it was!\' said Alice, a good many voices all talking together: she made it out to her that she had looked under it, and then turned to the. || Alice went timidly up to her lips. \'I know SOMETHING interesting is sure to happen,\' she said to the beginning again?\' Alice ventured to say. \'What is it?\' \'Why,\' said the Gryphon. \'They can\'t have.',	'https://lorempixel.com/960/427/?37455',	'2019-02-22 15:58:03',	'2019-02-22 15:58:03');

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
(1,	'A',	'2019-02-22 15:58:02',	'2019-02-22 15:58:02');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3,	'2014_10_12_000000_create_users_table',	1),
(4,	'2014_10_12_100000_create_password_resets_table',	1),
(6,	'2019_01_29_114353_create_litters_table',	2),
(9,	'2019_01_30_152942_create_contents_table',	3),
(10,	'2019_02_21_201527_create_ourDogs_table',	4);

DROP TABLE IF EXISTS `our_dogs`;
CREATE TABLE `our_dogs` (
  `id_dogs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sex` tinyint(3) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_age` date NOT NULL,
  `family` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dbres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dogs`),
  UNIQUE KEY `our_dogs_id_dogs_unique` (`id_dogs`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `our_dogs`;
INSERT INTO `our_dogs` (`id_dogs`, `sex`, `name`, `date_age`, `family`, `dbres`, `sale`, `created_at`, `updated_at`) VALUES
(1,	1,	'Бобров Ефим Романович',	'1983-08-08',	NULL,	'http://uvarov.com/harum-saepe-natus-nisi-quos-esse',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(2,	1,	'Дмитрий Дмитриевич Ермаков',	'1984-02-17',	NULL,	'http://veselov.org/qui-ad-facilis-et-rerum-iste-ea-sed',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(3,	1,	'Федосья Александровна Осипова',	'1983-07-08',	NULL,	'http://noskov.org/non-molestiae-sint-adipisci-et-ipsam',	0,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(4,	1,	'Инесса Борисовна Петухова',	'1978-02-05',	NULL,	'http://www.dyckov.com/dignissimos-necessitatibus-aliquid-fuga-magni-voluptatum',	0,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(5,	0,	'Кузьмин Михаил Александрович',	'1986-12-10',	NULL,	'http://www.gavrilov.net/dolor-nesciunt-error-fugiat',	0,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(6,	1,	'Дмитрий Сергеевич Журавлёв',	'2011-01-09',	NULL,	'https://seleznev.com/aut-ut-hic-optio.html',	0,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(7,	1,	'Андреев Сава Евгеньевич',	'2003-02-11',	NULL,	'http://fomicev.com/',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(8,	0,	'Иванова Оксана Львовна',	'1978-04-22',	NULL,	'http://kulikov.net/',	0,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(9,	0,	'Исаева Светлана Фёдоровна',	'1988-03-25',	NULL,	'http://kotov.org/id-quis-sed-eos-dignissimos-ad-et-doloremque-dolores.html',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(10,	0,	'Самсонов Олег Алексеевич',	'2014-08-12',	NULL,	'http://www.stepanov.ru/natus-recusandae-inventore-atque-impedit-voluptas-rerum.html',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(11,	1,	'Анжелика Сергеевна Воробьёва',	'1973-11-13',	NULL,	'http://kulakov.net/id-in-quia-et-officia-nam-sed',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(12,	0,	'Эрик Максимович Поляков',	'1996-02-23',	NULL,	'https://nazarov.ru/doloremque-autem-odio-tempore-ea.html',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(13,	0,	'Алексей Алексеевич Борисов',	'1974-11-04',	NULL,	'http://fedotov.com/eaque-dolorem-doloremque-error',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03'),
(14,	1,	'Корнилов Лаврентий Сергеевич',	'2011-04-26',	NULL,	'http://vorobev.com/fugiat-aliquid-aliquam-fugiat-velit.html',	1,	'2019-02-22 15:58:03',	'2019-02-22 15:58:03');

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
(1,	'Maksim',	'maks-manzulin@mail.ru',	'$2y$10$tg2/beB5ybKkspTe/UcUmukQvu3t4bg.EzzFJ.Pxm9hmUzZMVs6TS',	'm',	'CjeQIJ4SbgNJuQqt0lXhriGQlqL4VZY2uhOseqX7rknp0LPBD0qktIrU2V1l',	'2019-01-13 14:32:32',	'2019-01-13 14:39:24'),
(2,	'М',	'maria-nastasina@yandex.ru',	'$2y$10$tg2/beB5ybKkspTe/UcUmukQvu3t4bg.EzzFJ.Pxm9hmUzZMVs6TS',	'm',	'jYZ7VYEdnhL0A5aZgYPTApE7c7TdQ39KzkHtOMX1ZdDQD3rzGx1F4mOWQwTl',	NULL,	'2019-02-04 05:32:44');

-- 2019-02-22 19:54:13
