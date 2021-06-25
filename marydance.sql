-- MySQL dump 10.19  Distrib 10.2.38-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: marydance
-- ------------------------------------------------------
-- Server version	10.2.38-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageContent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (2,'История породы Китайская хохлатая собака','<p>В книге Джоан Палмер &quot;Ваша собака&quot; приводятся довольно точные сведения о происхождении этой породы. К 1966 году эта порода практически считалась утерянной, оставалось лишь несколько особей, которых привезли в Великобританию. В настоящее время китайская хохлатая собака получила довольно широкое распространение, этой породой занимаются самые различные клубы, как в&nbsp;<a href=\"https://ru.wikipedia.org/wiki/Англия\" target=\"_blank\">Англии</a>, так и во всём мире. Именно в Великобритании был разработан первый стандарт этой породы, и англичане считаются основателями стандарта породы.</p>\r\n\r\n<p>Схожесть по внешним признакам китайской хохлатой с&nbsp;<a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D1%81%D0%BE%D0%BB%D0%BE%D0%B8%D1%82%D1%86%D0%BA%D1%83%D0%B8%D0%BD%D1%82%D0%BB%D0%B8\">Мексиканской</a>&nbsp;являются причиной спора кинологов, кто от кого произошёл. Найденные черепа собаки, жившей в 1500 году до нашей эры в&nbsp;<a href=\"https://ru.wikipedia.org/wiki/%D0%9C%D0%B5%D0%BA%D1%81%D0%B8%D0%BA%D0%B0\">Мексике</a>, позволяют предположить, что всё же китайские собаки произошли от&nbsp;<a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D1%81%D0%BE%D0%BB%D0%BE%D0%B8%D1%82%D1%86%D0%BA%D1%83%D0%B8%D0%BD%D1%82%D0%BB%D0%B8\">шоло</a>, так как в Китае аналогичные черепа были найдены на две тысячи лет позже. Как собаки попали в&nbsp;<a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D1%82%D0%B0%D0%B9\">Китай</a>, история умалчивает.</p>\r\n\r\n<p>Также есть предположение, что голые собаки впервые появились в&nbsp;<a href=\"https://ru.wikipedia.org/wiki/%D0%90%D1%84%D1%80%D0%B8%D0%BA%D0%B0\">Африке</a><a href=\"https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D1%82%D0%B0%D0%B9%D1%81%D0%BA%D0%B0%D1%8F_%D1%85%D0%BE%D1%85%D0%BB%D0%B0%D1%82%D0%B0%D1%8F_%D1%81%D0%BE%D0%B1%D0%B0%D0%BA%D0%B0#cite_note-1\">[1]</a>.</p>','img/main/1553207411_mary-dance_ru.jpg','2019-03-21 19:08:13','2020-03-17 19:33:22'),(3,'Уход и содержание','<p>Грамотный уход за щенком&nbsp;включает&nbsp;процедуры, к которым его необходимо приучать с первых днем. Только если он&nbsp;привык, что его ежедневно расчесывают, чистят глаза и уши, регулярно купают и сушат феном, стригут когти, он будет спокойно относиться к этим&nbsp;манипуляциям.</p>\r\n\r\n<p>Все&nbsp;делаем&nbsp;уверенно и аккуратно, чтобы не причинить боль и не закрепить негативное отношение к процессу.</p>','img/main/1553207430_mary-dance_ru.jpg','2019-03-21 19:08:13','2020-03-17 19:35:38'),(5,'Гигиена и груминг','<p>Особенно важно отношение&nbsp;к грумингу у&nbsp;выставочных питомцев. Перед выходом в ринг иногда приходится часами стоять на столе, пока&nbsp;грумер закончит свою работу.</p>\r\n\r\n<p>Приучать малыша к выставочной стойке следует с детства, так же, как и к осмотру зубов&nbsp;(плюс яичек у кобелей) и&nbsp;вообще к&nbsp;прикосновению посторонних людей.</p>\r\n\r\n<p>Доверие&nbsp;к хозяину и привычка к разнообразным манипуляциям&nbsp;пригодятся, если собака заболеет.&nbsp;Ветеринар окажет помощь гораздо скорее, если&nbsp;она&nbsp;будет вести себя спокойно во время осмотра, а не&nbsp;отчаянно&nbsp;сопротивляться, не давая к себе прикоснуться. В некоторых случаях от этого может зависеть жизнь животного.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>','/img/main/1584316309_mary-dance_ru.jpeg','2019-05-22 14:23:04','2020-03-17 19:36:06'),(6,'Зачем человеку нужна собака ?','<p>Человек и собака живут рядом уже много тысяч лет. Мохнатый зверь всегда верно служил людям. Он помогал в охоте, в охране дома и домашнего скота. Со временем технический прогресс сделал жизнь более комфортной, многие прежние функции, которые выполнял четвероногий друг, отпали за ненадобностью. Однако взаимоотношения животных и людей не прервались. Они лишь перешли в несколько иное качество. Так зачем человеку нужна собака в наши дни?</p>\r\n\r\n<p>Здесь существует много причин. Но бывает, что владелец животного даже не догадывается о тех подлинных внутренних мотивах, которые и заставляют его обзавестись живым существом. Иногда это связано с нереализованной детской мечтой. Будучи маленьким, человек хотел иметь четвероногого друга. Но родители были против: не позволяли жилищные условия или существовали какие-то иные причины. Однако детская мечта глубоко засела в подсознании. И вот, став взрослым, &quot;мечтатель&quot; наконец-то получает возможность претворить в жизнь заветное желание.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Но не всё так романтично, безобидно и безоблачно.&nbsp;<strong>Иногда при помощи собаки реализуется неосознанное стремление к абсолютной власти</strong>. В этом случае хозяин испытывает наслаждение, наказывая своего питомца. Унижение бессловесного существа вызывает в душе такой личности истинное удовольствие. Если же нерадивому владельцу указать на его поведение, то он может обидеться.</p>\r\n\r\n<p><strong>Через преданное бессловесное существо некоторые люди реализуют потребность в заботе о ближних</strong>. Это особенно характерно для тех семейных пар, в отношениях которых отсутствует теплота, сердечность и взаимопонимание. Четвероногий друг в таких случаях сглаживает эмоциональные проблемы. То же самое можно сказать о бездетных парах. Нерастраченная родительская любовь ищет выход. В этом случае собака и человек становятся незаменимыми друг для друга.</p>\r\n\r\n<p>И, конечно же,&nbsp;<strong>четвероногое существо оказывает неоценимую помощь одиноким людям</strong>. Здесь оно выступает и в качестве собеседника, и компаньона, и близкого друга. Всё в одном лице, а забытая всеми личность при этом не чувствует себя брошенной и никому не нужной.</p>\r\n\r\n<p><strong>Некоторые люди рассматривают собаку как защитника и охранника</strong>. Они чувствуют себя гораздо увереннее на улице, когда рядом идёт большой и сильный пёс. Да и дома добро надо охранять. Но по этой причине четвероногих друзей заводят не очень часто. В основном подобные мотивы преобладают у владельцев частных домов.</p>\r\n\r\n<p><strong>Причиной могут стать и дети</strong>. Они хотят иметь щенка, и родители покупают его. Иногда, правда, бывает, что, наигравшись с забавным четвероногим малышом, ребёнок охладевает к нему, и животное становится обузой. В этом случае его продают или отдают в другие руки. Что не очень хорошо, ведь это же живое существо, а не игрушка.</p>\r\n\r\n<p><strong>Мохнатые друзья также незаменимы в профессиональной деятельности</strong>. Они несут службу на границе и в полиции, спасают людей, служат поводырями у слепых. &quot;Работа&quot; может быть самой разнообразной. Собаки при этом всегда оказываются на высоте. Они же лишены корысти, им чужда личная выгода, неизвестно, что такое взятки и предательство.</p>\r\n\r\n<p>Итак, мы разобрали основные причины и выяснили в общих чертах, зачем человеку нужна собака. Теперь давайте поговорим о породах. Для многих они имеют большое значение, а определяющим фактором в выборе очень часто выступает мода.</p>','/img/main/1584316335_mary-dance_ru.jpeg','2019-05-22 14:25:34','2019-05-22 14:25:34');
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dogs_photos`
--

DROP TABLE IF EXISTS `dogs_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dogs_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_dogs` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dogs_photos_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dogs_photos`
--

LOCK TABLES `dogs_photos` WRITE;
/*!40000 ALTER TABLE `dogs_photos` DISABLE KEYS */;
INSERT INTO `dogs_photos` VALUES (1,1,'img/dogs/15585414820_marydance.jpeg',NULL,NULL),(2,1,'img/dogs/15585415280_marydance.jpeg',NULL,NULL),(3,1,'img/dogs/15585415281_marydance.jpeg',NULL,NULL),(4,1,'img/dogs/15585415282_marydance.jpeg',NULL,NULL),(5,0,'img/dogs/15585417760_marydance.jpeg',NULL,NULL),(6,0,'img/dogs/15585417771_marydance.jpeg',NULL,NULL),(7,0,'img/dogs/15585417772_marydance.jpeg',NULL,NULL),(8,2,'img/dogs/15585418790_marydance.jpeg',NULL,NULL),(9,2,'img/dogs/15585418791_marydance.jpeg',NULL,NULL),(10,2,'img/dogs/15585418792_marydance.jpeg',NULL,NULL),(11,3,'img/dogs/15585423740_marydance.jpeg',NULL,NULL),(12,3,'img/dogs/15585423741_marydance.jpeg',NULL,NULL),(13,4,'img/dogs/15585424960_marydance.jpeg',NULL,NULL),(14,4,'img/dogs/15585424961_marydance.jpeg',NULL,NULL),(15,4,'img/dogs/15585424962_marydance.jpeg',NULL,NULL),(16,5,'img/dogs/15585430410_marydance.jpeg',NULL,NULL);
/*!40000 ALTER TABLE `dogs_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `litters`
--

DROP TABLE IF EXISTS `litters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `litters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `litter` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDog1` int(11) NOT NULL,
  `idDog2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `litters`
--

LOCK TABLES `litters` WRITE;
/*!40000 ALTER TABLE `litters` DISABLE KEYS */;
/*!40000 ALTER TABLE `litters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (34,'2014_10_12_000000_create_users_table',1),(35,'2014_10_12_100000_create_password_resets_table',1),(36,'2019_01_29_114353_create_litters_table',1),(37,'2019_01_30_152942_create_contents_table',1),(38,'2019_02_21_201527_create_ourDogs_table',1),(39,'2019_02_24_141523_create_dogsPhoto_table',1),(40,'2019_03_09_223324_create_photoSchen_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `our_dogs`
--

DROP TABLE IF EXISTS `our_dogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `our_dogs` (
  `id_dogs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sex` tinyint(3) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_age` date NOT NULL,
  `dbres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dogs`),
  UNIQUE KEY `our_dogs_id_dogs_unique` (`id_dogs`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `our_dogs`
--

LOCK TABLES `our_dogs` WRITE;
/*!40000 ALTER TABLE `our_dogs` DISABLE KEYS */;
INSERT INTO `our_dogs` VALUES (1,1,'Apriori Vip Orlando Bloom','2011-10-23','http://www.chinesecrested.no/en/registry/105089/Apriori+Vip+Orlando+Bloom.html',0,'2019-05-22 13:10:39','2019-05-22 13:10:39'),(2,1,'Fiery Fame Magic Sun \"Liam\"','2016-09-04','http://www.chinesecrested.no/en/registry/133185/Fiery+Fame+Magic+Sun.html',0,'2019-05-22 13:17:16','2019-05-22 13:18:26'),(3,0,'Fiery Fame Believe In Victory','2012-10-12','http://www.chinesecrested.no/en/registry/112140/Fiery+Fame+Believe+In+Victory.html',0,'2019-05-22 13:25:18','2019-05-22 13:25:18'),(4,0,'Fiery Fame Kiss-Mania \"Masha\"','2015-08-27','http://www.chinesecrested.no/en/registry/128871/Fiery+Fame+Kiss.Mania.html',0,'2019-05-22 13:27:40','2019-05-22 13:27:40'),(5,0,'Premier Mari Tsyganka Sera','2018-05-22','http://www.chinesecrested.no/en/registry/140284/Premier+Mari+Tsyganka+Sera.html',0,'2019-05-22 13:37:07','2019-05-22 13:37:07');
/*!40000 ALTER TABLE `our_dogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `our_news`
--

DROP TABLE IF EXISTS `our_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `our_news`
--

LOCK TABLES `our_news` WRITE;
/*!40000 ALTER TABLE `our_news` DISABLE KEYS */;
INSERT INTO `our_news` VALUES (1,'Выставка','2019-05-22','img/news/1558544186_marydance.jpeg','<p>26 мая состоится национальный клуб породы Китайской&nbsp;хохлатой собаки.</p>\r\n\r\n<p>&nbsp;</p>','MaryDance',NULL,NULL);
/*!40000 ALTER TABLE `our_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_schens`
--

DROP TABLE IF EXISTS `photo_schens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_schens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idLitt` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_schens`
--

LOCK TABLES `photo_schens` WRITE;
/*!40000 ALTER TABLE `photo_schens` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo_schens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Maksim','maks-manzulin@mail.ru','$2y$10$30XjmhBUgX5GaDOISSjGMupLkQm0dsnokmzVpV5K01j3G6P.kYPwy','m','ewzSXfuHK9KOMwzaXCXT7UTf0R70EXPgkzXvmULxWN87wnER0sxucNVYiAEQ','2019-03-15 17:31:43','2019-03-15 17:31:43'),(2,'Mary','maria-nastasina@yandex.ru','$2y$10$ps4bkkapelzQmCrnu20NauW5v1zpW02tLWhU4BkgsY/n2CAapQYIW','m','7a8wI4W0CWCRn0Fr38CahDl6FgfnouHHV988rT2rieeNDxVYNgbLzYh51sZT','2019-03-15 17:31:43','2019-03-15 17:31:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-24 15:51:40
