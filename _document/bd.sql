-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour youdemy_croise
CREATE DATABASE IF NOT EXISTS `youdemy_croise` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `youdemy_croise`;

-- Listage de la structure de table youdemy_croise. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id_course` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `id_teacher` int DEFAULT NULL,
  `status` enum('pending','active','archived') DEFAULT 'pending',
  `id_categorie` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  `prix` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_course`),
  KEY `id_teacher` (`id_teacher`),
  KEY `id_category` (`id_categorie`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `users` (`id_user`),
  CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. enrollments
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id_enrollements` int NOT NULL AUTO_INCREMENT,
  `id_student` int DEFAULT NULL,
  `id_course` int DEFAULT NULL,
  `enrollment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_enrollements`),
  KEY `id_student` (`id_student`),
  KEY `id_course` (`id_course`),
  CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `users` (`id_user`),
  CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id_reviews` int NOT NULL AUTO_INCREMENT,
  `id_article` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_reviews`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `courses` (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `name_tag` varchar(50) NOT NULL,
  `archived` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tag`),
  UNIQUE KEY `name_tag` (`name_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. tag_course
CREATE TABLE IF NOT EXISTS `tag_course` (
  `id_course` int NOT NULL,
  `id_tag` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_course`,`id_tag`),
  KEY `id_tag` (`id_tag`),
  CONSTRAINT `tag_course_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`),
  CONSTRAINT `tag_course_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id_user` int NOT NULL,
  `approved` enum('pending','approved','rejected') DEFAULT 'pending',
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table youdemy_croise. users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name_full` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `id_role` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  `suspended` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de vue youdemy_croise. viewteacher
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `viewteacher` (
	`id_user` INT(10) NOT NULL,
	`email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`name_full` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`avatar` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`id_role` INT(10) NOT NULL,
	`created_at` DATETIME NULL,
	`archived` TINYINT(1) NULL,
	`suspended` TINYINT(1) NULL,
	`approved` ENUM('pending','approved','rejected') NULL COLLATE 'utf8mb4_0900_ai_ci',
	`message` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Listage de la structure de vue youdemy_croise. viewteacher
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `viewteacher`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewteacher` AS select `u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`name_full` AS `name_full`,`u`.`avatar` AS `avatar`,`u`.`id_role` AS `id_role`,`u`.`created_at` AS `created_at`,`u`.`archived` AS `archived`,`u`.`suspended` AS `suspended`,`t`.`approved` AS `approved`,`t`.`message` AS `message` from (`users` `u` join `teachers` `t` on((`u`.`id_user` = `t`.`id_user`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
