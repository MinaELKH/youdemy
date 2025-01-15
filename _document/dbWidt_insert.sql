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
DROP DATABASE IF EXISTS `youdemy_croise`;
CREATE DATABASE IF NOT EXISTS `youdemy_croise` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `youdemy_croise`;

-- Listage de la structure de table youdemy_croise. categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.categories : ~0 rows (environ)
INSERT INTO `categories` (`id_categorie`, `name`, `created_at`, `archived`, `description`) VALUES
	(29, 'Développement Web', '2025-01-15 00:17:43', 0, NULL),
	(30, 'Data Science', '2025-01-15 00:17:43', 0, NULL),
	(31, 'Design Graphique', '2025-01-15 00:17:43', 0, NULL),
	(32, 'Marketing Digital', '2025-01-15 00:17:43', 0, NULL),
	(33, 'Gestion de Projet', '2025-01-15 00:17:43', 0, NULL),
	(34, 'Photographie', '2025-01-15 00:17:43', 0, NULL),
	(35, 'Programmation Mobile', '2025-01-15 00:17:43', 0, NULL),
	(36, 'Sécurité Informatique', '2025-01-15 00:17:43', 0, NULL),
	(37, 'Intelligence Artificielle', '2025-01-15 00:17:43', 0, NULL),
	(38, 'Finance Personnelle', '2025-01-15 00:17:43', 0, NULL);

-- Listage de la structure de table youdemy_croise. courses
DROP TABLE IF EXISTS `courses`;
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

-- Listage des données de la table youdemy_croise.courses : ~0 rows (environ)

-- Listage de la structure de table youdemy_croise. enrollments
DROP TABLE IF EXISTS `enrollments`;
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

-- Listage des données de la table youdemy_croise.enrollments : ~0 rows (environ)

-- Listage de la structure de table youdemy_croise. reviews
DROP TABLE IF EXISTS `reviews`;
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

-- Listage des données de la table youdemy_croise.reviews : ~0 rows (environ)

-- Listage de la structure de table youdemy_croise. roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.roles : ~0 rows (environ)
INSERT INTO `roles` (`id_role`, `role`) VALUES
	(1, 'admin'),
	(3, 'student'),
	(2, 'teacher');

-- Listage de la structure de table youdemy_croise. tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `name_tag` varchar(50) NOT NULL,
  `archived` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tag`),
  UNIQUE KEY `name_tag` (`name_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.tags : ~0 rows (environ)

-- Listage de la structure de table youdemy_croise. tag_course
DROP TABLE IF EXISTS `tag_course`;
CREATE TABLE IF NOT EXISTS `tag_course` (
  `id_course` int NOT NULL,
  `id_tag` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_course`,`id_tag`),
  KEY `id_tag` (`id_tag`),
  CONSTRAINT `tag_course_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`),
  CONSTRAINT `tag_course_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.tag_course : ~0 rows (environ)

-- Listage de la structure de table youdemy_croise. teachers
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id_user` int NOT NULL,
  `approved` enum('pending','approved','rejected') DEFAULT 'pending',
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.teachers : ~0 rows (environ)
INSERT INTO `teachers` (`id_user`, `approved`, `message`) VALUES
	(1, 'rejected', 'Profil validé : 10 ans d\'expérience en développement web, diplôme de l\'École Polytechnique et références professionnelles solides.'),
	(2, 'approved', 'Approuvé : Portfolio impressionnant, plusieurs projets innovants et certifications internationales en design UX/UI.'),
	(3, 'approved', 'Validation confirmée : Ancien ingénieur cloud chez Google, publications techniques et expertise reconnue.'),
	(4, 'rejected', 'Refusé : Manque d\'expérience professionnelle significative et absence de certifications pertinentes.'),
	(5, 'approved', 'Approuvé : Expert cybersécurité certifié CISSP, 15 ans dans le domaine de la sécurité informatique.'),
	(6, 'rejected', 'Refusé : Parcours académique incomplet et peu de projets concrets en intelligence artificielle.'),
	(7, 'approved', 'Validation : DBA senior avec plus de 12 ans d\'expérience chez Oracle et MySQL, formateur reconnu.'),
	(8, 'approved', 'Refusé : Dossier incomplet, informations de qualification manquantes.'),
	(9, 'approved', 'Approuvé : Contributeur open-source majeur, formateur Python dans plusieurs bootcamps internationaux.'),
	(10, 'approved', 'Validation confirmée : Lead développeur JavaScript, nombreuses conférences et workshops donnés.'),
	(11, 'approved', 'Refusé : Niveau technique insuffisant, nécessite un développement professionnel supplémentaire.'),
	(12, 'pending', 'Approuvé : Architecte réseau certifié CCNA, plus de 8 ans d\'expérience dans l\'infrastructure IT.'),
	(13, 'approved', 'Validation : Game designer professionnel, a travaillé sur des projets AAA et possède des diplômes spécialisés.'),
	(14, 'approved', 'Refusé : Compétences en analyse de données trop junior, recommandation de formations complémentaires.'),
	(15, 'approved', 'Approuvé : Data scientist avec doctorat, publications dans des revues scientifiques internationales.'),
	(16, 'approved', 'Refusé : Manque de preuves concrètes de réalisations en machine learning.'),
	(17, 'approved', 'Validation : Développeur blockchain reconnu, plusieurs smart contracts audités et publiés.'),
	(18, 'rejected', 'Approuvé : Consultant cyberdéfense pour des organisations gouvernementales, certifications de haut niveau.'),
	(19, 'rejected', 'Refusé : Compétences déclarées non vérifiées, nécessité de fournir des preuves supplémentaires.'),
	(20, 'approved', 'Validation : Expert en technologies émergentes, conférencier international et mentor reconnu.');

-- Listage de la structure de table youdemy_croise. users
DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.users : ~0 rows (environ)
INSERT INTO `users` (`id_user`, `email`, `password`, `name_full`, `avatar`, `id_role`, `created_at`, `archived`, `suspended`) VALUES
	(1, 'john.smith@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John Smith', 'john_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(2, 'emma.johnson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Emma Johnson', 'emma_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(3, 'michael.brown@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Michael Brown', 'michael_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(4, 'sophia.davis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sophia Davis', 'sophia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(5, 'david.wilson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'David Wilson', 'david_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(6, 'olivia.martinez@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Olivia Martinez', 'olivia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(7, 'james.anderson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'James Anderson', 'james_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(8, 'ava.thomas@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ava Thomas', 'ava_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(9, 'ethan.jackson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ethan Jackson', 'ethan_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(10, 'isabella.white@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Isabella White', 'isabella_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(11, 'alexander.harris@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Alexander Harris', 'alexander_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(12, 'mia.martin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mia Martin', 'mia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(13, 'william.thompson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'William Thompson', 'william_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(14, 'charlotte.garcia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Charlotte Garcia', 'charlotte_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(15, 'benjamin.robinson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Benjamin Robinson', 'benjamin_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(16, 'amelia.clark@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Amelia Clark', 'amelia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(17, 'daniel.rodriguez@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Daniel Rodriguez', 'daniel_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(18, 'harper.lewis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Harper Lewis', 'harper_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(19, 'mason.lee@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mason Lee', 'mason_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(20, 'evelyn.walker@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Evelyn Walker', 'evelyn_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(41, 'johndoe92@gmail.com', 'password123', 'John Doe', 'avatar1.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(42, 'janedoe85@yahoo.com', 'password123', 'Jane Doe', 'avatar2.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(43, 'alice.smith@hotmail.com', 'password123', 'Alice Smith', 'avatar3.jpg', 3, '2025-01-15 01:45:42', 1, 0),
	(44, 'bob.brown@outlook.com', 'password123', 'Bob Brown', 'avatar4.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(45, 'charlie.davis@gmail.com', 'password123', 'Charlie Davis', 'avatar5.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(46, 'david.clark@icloud.com', 'password123', 'David Clark', 'avatar6.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(47, 'eva.evans@aol.com', 'password123', 'Eva Evans', 'avatar7.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(48, 'fay.green@live.com', 'password123', 'Fay Green', 'avatar8.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(49, 'george.harris@outlook.com', 'password123', 'George Harris', 'avatar9.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(50, 'holly.johnson@zoho.com', 'password123', 'Holly Johnson', 'avatar10.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(51, 'ian.king@icloud.com', 'password123', 'Ian King', 'avatar11.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(52, 'jack.lee@gmail.com', 'password123', 'Jack Lee', 'avatar12.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(53, 'karen.mitchell@aol.com', 'password123', 'Karen Mitchell', 'avatar13.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(54, 'liam.moore@outlook.com', 'password123', 'Liam Moore', 'avatar14.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(55, 'megan.nelson@zoho.com', 'password123', 'Megan Nelson', 'avatar15.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(56, 'nathan.oconnor@gmail.com', 'password123', 'Nathan Connor', 'avatar16.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(57, 'olivia.peters@live.com', 'password123', 'Olivia Peters', 'avatar17.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(58, 'paul.quinn@yahoo.com', 'password123', 'Paul Quinn', 'avatar18.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(59, 'quinn.roberts@hotmail.com', 'password123', 'Quinn Roberts', 'avatar19.jpg', 3, '2025-01-15 01:45:42', 0, 0),
	(60, 'rachel.smith@icloud.com', 'password123', 'Rachel Smith', 'avatar20.jpg', 3, '2025-01-15 01:45:42', 0, 0);

-- Listage de la structure de vue youdemy_croise. viewteacher
DROP VIEW IF EXISTS `viewteacher`;
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
DROP VIEW IF EXISTS `viewteacher`;
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `viewteacher`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewteacher` AS select `u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`name_full` AS `name_full`,`u`.`avatar` AS `avatar`,`u`.`id_role` AS `id_role`,`u`.`created_at` AS `created_at`,`u`.`archived` AS `archived`,`u`.`suspended` AS `suspended`,`t`.`approved` AS `approved`,`t`.`message` AS `message` from (`users` `u` join `teachers` `t` on((`u`.`id_user` = `t`.`id_user`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
