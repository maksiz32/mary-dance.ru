-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `marydance`;
CREATE DATABASE `marydance` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `marydance`;

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

DROP TABLE IF EXISTS `frase`;
CREATE TABLE `frase` (
  `id_frase` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `frase` varchar(300) NOT NULL,
  `author` varchar(30) NOT NULL,
  PRIMARY KEY (`id_frase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `frase`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1);

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `text` varchar(2000) NOT NULL,
  `author` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

TRUNCATE `news`;
INSERT INTO `news` (`id`, `title`, `date`, `photo`, `text`, `author`) VALUES
(1,	'News 1',	'2018-06-24',	'IMG_0201.JPG',	'text of news1',	'Mary-Dance');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

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
(39,	0,	'1111111',	'2018-04-01',	'А',	NULL,	0,	0,	'2019-01-19',	'2019-01-19');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Maksim',	'maks-manzulin@mail.ru',	'$2y$10$tg2/beB5ybKkspTe/UcUmukQvu3t4bg.EzzFJ.Pxm9hmUzZMVs6TS',	'm',	'VApZf3Wk2vif1UG5smsqHVGPqTXqu0qTwRFso7c7BrG7zDS2lHf2RsUfJ7pg',	'2019-01-13 17:32:32',	'2019-01-13 17:39:24');

-- 2019-01-21 22:19:30
