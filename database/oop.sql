-- MySQL dump 10.16  Distrib 10.3.10-MariaDB, for osx10.14 (x86_64)
--
-- Host: localhost    Database: oop
-- ------------------------------------------------------
-- Server version	10.3.10-MariaDB

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'/Users/pmoskovets/Sites/taskp2/public/avatar/3da856ae667fccf4e7c3b5cd21f79282.jpg',10),(2,'/Users/pmoskovets/Sites/taskp2/public/avatar/4c8aeccd9711e0215d774b608d597966.jpg',3),(3,'/Users/pmoskovets/Sites/taskp2/public/avatar/d7bed0cbe4a198d40240ce64da78538a.jpg',5),(4,'/Users/pmoskovets/Sites/taskp2/public/avatar/10bfb6cf3b71be89d1f52db5ba4aa6b2.jpg',2),(5,'/Users/pmoskovets/Sites/taskp2/public/avatar/557eb00ff51c51beac54509a7e68e578.jpg',3),(6,'/Users/pmoskovets/Sites/taskp2/public/avatar/d9a1d60308dfcda9a1a4263f2bc60161.jpg',2),(7,'/Users/pmoskovets/Sites/taskp2/public/avatar/65bec4e4bd45c1788b687a8cab60fb39.jpg',7),(8,'/Users/pmoskovets/Sites/taskp2/public/avatar/6ad0c00590140967f1888f4cb110166e.jpg',9),(9,'/Users/pmoskovets/Sites/taskp2/public/avatar/761964f7c3b24b4cf1b446b11138d6e3.jpg',8),(10,'/Users/pmoskovets/Sites/taskp2/public/avatar/5efb31968f7cb65c59a3c643a7d8b29f.jpg',4),(11,'/Users/pmoskovets/Sites/taskp2/public/userfile/11_20181129_0935_test.jpg',11),(12,'/Users/pmoskovets/Sites/taskp2/public/userfile/11_20181129_0935_test.jpg',11);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Игнат Сергеевич Абрамов','xfokin@rambler.ru','i&zsz$J>J\"(,\'[',28,'/Users/pmoskovets/Sites/taskp2/public/userfile/e3b2cdfc5d0895581d68d0c33903af05.jpg',''),(2,'Тит Максимович Аксёнов','alina.kotov@ya.ru','M(4tc-VWph^E[vDz5a',43,'/Users/pmoskovets/Sites/taskp2/public/userfile/13980c06f563eb8fbd2d0ac3dbf4cefc.jpg',''),(3,'Григорий Львович Макаров','lev.solovev@vorobev.com','.|T<t5%pjq58G9Wyh#B',11,'/Users/pmoskovets/Sites/taskp2/public/userfile/ceccb1f6360a788e7d472e9897ec9457.jpg',''),(4,'Афанасьев Никита Владимирович','bkorolev@safonov.com','wVnQRX&6d]',43,'/Users/pmoskovets/Sites/taskp2/public/userfile/8c07f9f19e666f1f3326211d7299ad7d.jpg',''),(5,'Нонна Владимировна Ефремова','bromanov@isaev.com','t4G(Mkt8]E\\LW\'wwmO',47,'/Users/pmoskovets/Sites/taskp2/public/userfile/5776c824a889a81f5821ba369a61d7ae.jpg',''),(6,'Ольга Евгеньевна Селиверстова','kapitolina.panfilov@rambler.ru','4>d>[3feTa8$!',27,'/Users/pmoskovets/Sites/taskp2/public/userfile/3d9cc6b5a70b6d2036d608796ddf9e3e.jpg',''),(7,'Лаврентьев Игорь Андреевич','maria.sarapov@yandex.ru','$argon2i$v=19$m=1024,t=2,p=2$VFMzcjlNbXVscGNmMDQ4cw$6DVZ+kjA/nM1VYoLzw+z7xnHEo8LEK6tSsJ968MFr4w',9,'/Users/pmoskovets/Sites/taskp2/public/userfile/1078562a43967b72223b5f7b1e95d6b1.jpg','                            '),(8,'Сава Дмитриевич Ковалёв','alena.pavlov@list.ru','si4.lr3yIP',40,'/Users/pmoskovets/Sites/taskp2/public/userfile/44dd00b50707593fa792075717fcf54d.jpg',''),(9,'Симонова Светлана Фёдоровна','german.sysoev@list.ru','I#!I/m8',37,'/Users/pmoskovets/Sites/taskp2/public/userfile/41ce9852c26c745ee575272a2b149ca3.jpg',''),(10,'Ольга Дмитриевна Турова','jkalasnikov@inbox.ru','}d>g/f',54,'/Users/pmoskovets/Sites/taskp2/public/userfile/c2ca6d6a38243e490e3bc40a859cfb92.jpg',''),(11,'Админ','test@test.com','$argon2i$v=19$m=1024,t=2,p=2$S0tzZFhtVi9RcXk4a2hJLg$+ZoFjD9K9x30jSGWeJkfLfcRwVsLnNHd4nY8qJXNwxk',22,'/Users/pmoskovets/Sites/taskp2/public/avatar/11_test.jpg','1234\r\n        '),(12,'Новый','t2@mail.ru','$argon2i$v=19$m=1024,t=2,p=2$SDJkSE5NZ1RGL25tLzRXMA$eRXEDLJNh3HzPi6srEBpCRChnfhtY7cxaQODqFdd52Q',2,'','            13456'),(13,'Новейший','t3@mail.ru','$argon2i$v=19$m=1024,t=2,p=2$SUtoYi9SZDhZcjF6MExZdA$Lsth5lz9kopKWZs/rpzTMsSCRTaX9cgwgkY1xW32TPM',23,'/Users/pmoskovets/Sites/taskp2/public/avatar/13_test.jpg','            24124');
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

-- Dump completed on 2018-11-30  1:12:44
