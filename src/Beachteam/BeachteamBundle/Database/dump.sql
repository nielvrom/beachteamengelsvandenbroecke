# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.32)
# Database: beachteam
# Generation Time: 2014-03-29 10:40:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_23A0E66BF396750` FOREIGN KEY (`id`) REFERENCES `item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`id`, `body`)
VALUES
	(2,'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec id elit non mi porta gravida at eget metus. Duis mollis,\n        est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui.'),
	(3,'Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.\n        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.');

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `type` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_user1_idx` (`user_id`),
  CONSTRAINT `fk_item_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;

INSERT INTO `item` (`id`, `title`, `description`, `type`, `created`, `deleted`, `user_id`)
VALUES
	(2,'Dummy title 1','Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.','ARTICLE','2014-03-06 17:13:16',NULL,5),
	(3,'Dummy title 2','Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper.','ARTICLE','2014-03-06 17:13:16',NULL,6);

/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `mimetype` varchar(255) NOT NULL,
  `isexternal` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_media_item1_idx` (`item_id`),
  CONSTRAINT `FK_6A2CA10C126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `item_id`, `url`, `mimetype`, `isexternal`)
VALUES
	(1,NULL,'stef.jpg','image/jpeg',NULL),
	(2,NULL,'maarten.jpg','image/jpeg',NULL);

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table player
# ------------------------------------------------------------

DROP TABLE IF EXISTS `player`;

CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthplace` varchar(45) NOT NULL,
  `birthdate` datetime NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `length` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `club` varchar(255) NOT NULL,
  `posiition` varchar(255) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_players_media1_idx` (`media_id`),
  CONSTRAINT `fk_players_media1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;

INSERT INTO `player` (`id`, `name`, `facebook_url`, `email`, `birthplace`, `birthdate`, `nationality`, `length`, `weight`, `club`, `posiition`, `media_id`)
VALUES
	(1,'Stef Engels','https://www.facebook.com/stef.engels?fref=ts','stefengels@hotmail.com','Kruishoutem','2014-03-06 17:13:16','Belg',NULL,NULL,'VC Gavere','Opposite',1),
	(2,'Maarten Vandenbroecke','https://www.facebook.com/maarten.vandenbroecke?fref=ts','maarten.vdb@telenet.be','Gavere','2014-03-06 17:13:16','Belg',NULL,NULL,'VC Gavere','Midden',2);

/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `name`, `description`)
VALUES
	(7,'ROLE_ADMIN','ADMIN OF THE WEBSITE'),
	(8,'ROLE_SUPERADMIN','SUPERADMIN OF THE WEBSITE');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tournament
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tournament`;

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `tournamenttype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tournament` WRITE;
/*!40000 ALTER TABLE `tournament` DISABLE KEYS */;

INSERT INTO `tournament` (`id`, `start`, `end`, `location`, `tournamenttype`)
VALUES
	(1,'2014-05-05 00:00:00','2014-05-06 00:00:00','Brussel','Belgian Beach Volley'),
	(2,'2014-05-12 00:00:00','2014-05-13 00:00:00','Hechtel','Belgian Beach Volley'),
	(3,'2014-05-20 00:00:00','2014-05-21 00:00:00','Gent','Belgian Beach Volley'),
	(4,'2014-06-16 00:00:00','2014-06-17 00:00:00','Kortrijk','Belgian Beach Volley'),
	(5,'2014-05-31 00:00:00','2014-06-01 00:00:00','Sint-Niklaas','Belgian Beach Volley'),
	(6,'2014-07-07 00:00:00','2014-07-08 00:00:00','Hannut','Belgian Beach Volley'),
	(7,'2014-07-21 00:00:00','2014-07-22 00:00:00','Leuven','Belgian Beach Volley'),
	(8,'2014-08-04 00:00:00','2014-08-05 00:00:00','Maaseik','Belgian Beach Volley'),
	(9,'2014-09-10 00:00:00','2014-09-12 00:00:00','Knokke','Belgian Beach Volley');

/*!40000 ALTER TABLE `tournament` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salt` varchar(30) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(45) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_roles_idx` (`role_id`),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `firstname`, `surname`, `email`, `token`, `created`, `role_id`)
VALUES
	(5,'stefengels','$2y$15$MEAF2iKg2w.4HtdXMrjtY.5Hvu5gs0bkBIY2Ke0cjOoF0sWP9wdcO','8gqnl01r6kkksg8c4w8oow8sgws0gs','Stef','Engels','stefengels@hotmail.com',NULL,'2014-03-06 17:13:13',7),
	(6,'maartenvandenbroecke','$2y$15$pBu2pbU4wNMOLthPB8kAQ.KMt5kJmkohPHeU49IQ08IUzVNqn6F0S','qk112cuql68o80w8c8sk84osso0scw','Maarten','Vandenbroecke','maarten.vdb@telenet.be',NULL,'2014-03-06 17:13:16',7);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
