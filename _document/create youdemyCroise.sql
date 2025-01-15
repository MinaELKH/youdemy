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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.categories : ~22 rows (environ)
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
	(38, 'Finance Personnelle', '2025-01-15 00:17:43', 0, NULL),
	(39, 'des activite physqiue te permet de vive sainement ', '2025-01-15 14:32:39', 0, 'des activite physqiue te permet de vive sainement '),
	(40, 'cuisiner, c est l art \r\n', '2025-01-15 14:35:39', 0, 'cuisiner, c est l art \r\n'),
	(41, 'Corrupti sit culpa ', '2025-01-15 14:46:16', 0, 'Corrupti sit culpa '),
	(42, 'Shea Bentley', '2025-01-15 14:59:08', 0, 'Consequatur ab et v'),
	(43, 'Ad quibusdam nisi ev', '2025-01-15 15:01:59', 0, 'Ad quibusdam nisi ev'),
	(44, 'Molestiae sit quisq', '2025-01-15 15:02:05', 0, 'Molestiae sit quisq'),
	(45, 'Dolorem sunt molliti', '2025-01-15 15:02:14', 0, 'Dolorem sunt molliti'),
	(46, 'Labore nihil consect', '2025-01-15 15:07:11', 0, 'Labore nihil consect'),
	(47, 'Voluptate fugiat exc', '2025-01-15 15:07:17', 0, 'Voluptate fugiat exc'),
	(48, 'test1', '2025-01-15 15:08:54', 0, 'des1'),
	(49, 'Ad sapiente illo qua', '2025-01-15 15:09:59', 0, 'Ad sapiente illo qua'),
	(50, 'Patrick Hooper', '2025-01-15 15:16:06', 0, 'Qui iure ut ullam do');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.courses : ~20 rows (environ)
INSERT INTO `courses` (`id_course`, `title`, `description`, `picture`, `id_teacher`, `status`, `id_categorie`, `created_at`, `updated_at`, `archived`, `prix`) VALUES
	(33, 'Introduction to Programming', 'Learn the basics of programming with this beginner-friendly course.', 'intro_programming.jpg', 1, 'approved', 29, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 50),
	(34, 'Advanced Python', 'Master advanced Python programming concepts.', 'advanced_python.jpg', 2, 'approved', 30, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 100),
	(35, 'Web Development Fundamentals', 'A comprehensive guide to web development for beginners.', 'web_dev.jpg', 3, 'approved', 31, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 80),
	(36, 'Machine Learning 101', 'An introduction to machine learning and its applications.', 'ml_101.jpg', 4, 'approved', 32, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 120),
	(37, 'Digital Marketing Basics', 'Learn the fundamentals of digital marketing.', 'digital_marketing.jpg', 5, 'approved', 33, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 60),
	(38, 'Data Science with R', 'Discover the power of R for data analysis and visualization.', 'data_science_r.jpg', 6, 'approved', 34, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 90),
	(39, 'UI/UX Design Principles', 'Master the principles of user interface and user experience design.', 'ui_ux_design.jpg', 7, 'approved', 35, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 70),
	(40, 'Project Management for Beginners', 'Learn essential project management skills.', 'project_management.jpg', 8, 'approved', 36, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 40),
	(41, 'Cybersecurity Basics', 'Understand the fundamentals of cybersecurity.', 'cybersecurity.jpg', 9, 'approved', 37, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 130),
	(42, 'Creative Writing Workshop', 'Improve your creative writing skills with hands-on exercises.', 'creative_writing.jpg', 10, 'approved', 38, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 30),
	(43, 'Financial Analysis for Beginners', 'Learn to analyze financial data effectively.', 'financial_analysis.jpg', 11, 'approved', 39, '2025-01-15 21:07:39', '2025-01-15 23:53:15', 0, 50),
	(44, 'Photography Masterclass', 'Master the art of photography with this comprehensive course.', 'photography.jpg', 12, 'rejected', 40, '2025-01-15 21:07:39', '2025-01-15 23:53:59', 0, 60),
	(45, 'Spanish for Beginners', 'Start your journey in learning Spanish.', 'spanish_beginners.jpg', 13, 'rejected', 41, '2025-01-15 21:07:39', '2025-01-15 23:53:59', 0, 20),
	(46, 'Yoga and Wellness', 'Achieve wellness through yoga practices.', 'yoga_wellness.jpg', 14, 'rejected', 42, '2025-01-15 21:07:39', '2025-01-15 23:53:59', 0, 25),
	(47, 'Graphic Design Essentials', 'A complete guide to graphic design principles.', 'graphic_design.jpg', 15, 'rejected', 43, '2025-01-15 21:07:39', '2025-01-15 23:53:59', 0, 70),
	(48, 'Blockchain and Cryptocurrency', 'Understand the basics of blockchain technology and cryptocurrencies.', 'blockchain_crypto.jpg', 16, 'rejected', 44, '2025-01-15 21:07:39', '2025-01-15 23:53:59', 0, 200),
	(49, 'French Language Advanced', 'Improve your advanced French language skills.', 'french_advanced.jpg', 17, 'pending', 45, '2025-01-15 21:07:39', '2025-01-15 23:51:43', 0, 40),
	(50, 'Public Speaking Mastery', 'Learn to speak confidently in public settings.', 'public_speaking.jpg', 18, 'pending', 46, '2025-01-15 21:07:39', '2025-01-15 23:51:43', 0, 50),
	(51, 'Fitness and Nutrition', 'Combine fitness and nutrition to achieve your health goals.', 'fitness_nutrition.jpg', 19, 'pending', 47, '2025-01-15 21:07:39', '2025-01-15 23:51:43', 0, 30),
	(52, 'Music Theory for Beginners', 'Explore the basics of music theory.', 'music_theory.jpg', 20, 'pending', 48, '2025-01-15 21:07:39', '2025-01-15 21:07:39', 0, 20);

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

-- Listage des données de la table youdemy_croise.enrollments : ~74 rows (environ)
INSERT INTO `enrollments` (`id_enrollements`, `id_student`, `id_course`, `enrollment_date`, `archived`, `created_at`) VALUES
	(1, 61, 33, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(2, 62, 34, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(3, 63, 35, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(4, 64, 36, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(5, 65, 37, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(6, 66, 38, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(7, 67, 39, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(8, 68, 40, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(9, 69, 41, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(10, 70, 42, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(11, 71, 43, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(12, 72, 44, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(13, 73, 45, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(14, 74, 46, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(15, 75, 47, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(16, 76, 48, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(17, 77, 49, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(18, 78, 50, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(19, 79, 51, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(20, 80, 52, '2025-01-15 22:38:53', 0, '2025-01-15 22:38:53'),
	(27, 61, 33, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(28, 62, 34, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(29, 63, 35, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(30, 64, 36, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(31, 65, 37, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(32, 66, 38, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(33, 67, 39, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(34, 68, 40, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(35, 69, 41, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(36, 70, 42, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(37, 71, 43, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(38, 72, 44, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(39, 73, 45, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(40, 74, 46, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(41, 75, 47, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(42, 76, 48, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(43, 77, 49, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(44, 78, 50, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(45, 79, 51, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(46, 80, 52, '2025-01-15 22:39:05', 0, '2025-01-15 22:39:05'),
	(47, 61, 50, '2025-01-15 22:39:37', 0, '2025-01-15 22:39:37'),
	(48, 63, 50, '2025-01-15 22:39:37', 0, '2025-01-15 22:39:37'),
	(49, 65, 40, '2025-01-15 22:39:37', 0, '2025-01-15 22:39:37'),
	(50, 67, 40, '2025-01-15 22:39:37', 0, '2025-01-15 22:39:37'),
	(51, 70, 40, '2025-01-15 22:39:37', 0, '2025-01-15 22:39:37'),
	(52, 73, 40, '2025-01-15 22:39:37', 0, '2025-01-15 22:39:37'),
	(53, 74, 38, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(54, 70, 38, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(55, 66, 38, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(56, 72, 38, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(57, 79, 44, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(58, 63, 44, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(59, 67, 44, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(60, 66, 44, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(61, 77, 48, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(62, 66, 48, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(63, 80, 52, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(64, 80, 52, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(65, 70, 52, '2025-01-15 22:45:52', 0, '2025-01-15 22:45:52'),
	(66, 61, 38, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(67, 67, 38, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(68, 72, 38, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(69, 65, 38, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(70, 74, 44, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(71, 68, 44, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(72, 73, 44, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(73, 62, 44, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(74, 79, 48, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(75, 75, 48, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(76, 71, 48, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(77, 69, 48, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(78, 66, 52, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(79, 61, 52, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21'),
	(80, 63, 52, '2025-01-15 22:46:21', 0, '2025-01-15 22:46:21');

-- Listage de la structure de table youdemy_croise. reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id_review` int NOT NULL AUTO_INCREMENT,
  `id_course` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0',
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_review`) USING BTREE,
  KEY `fk_reviews_users` (`id_user`),
  KEY `id_course` (`id_course`) USING BTREE,
  CONSTRAINT `fk_reviews_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.reviews : ~78 rows (environ)
INSERT INTO `reviews` (`id_review`, `id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES
	(36, 33, 'Amazing course! Very detailed and clear.', '2025-01-15 22:11:31', 0, 61),
	(37, 34, 'The instructor was great, but the material could be improved.', '2025-01-15 22:11:31', 0, 62),
	(38, 35, 'Good content but lacked practical examples.', '2025-01-15 22:11:31', 0, 63),
	(39, 36, 'Well-structured and easy to follow.', '2025-01-15 22:11:31', 0, 64),
	(40, 37, 'Some sections were a bit too basic for me.', '2025-01-15 22:11:31', 0, 65),
	(41, 38, 'I loved the way it was explained, great for beginners!', '2025-01-15 22:11:31', 0, 66),
	(42, 39, 'Good pace and comprehensive, would recommend.', '2025-01-15 22:11:31', 0, 67),
	(43, 40, 'A bit too slow for advanced learners.', '2025-01-15 22:11:31', 0, 68),
	(44, 41, 'Great course overall, I would love more exercises.', '2025-01-15 22:11:31', 0, 69),
	(45, 42, 'I enjoyed the course, but it could use more real-life examples.', '2025-01-15 22:11:31', 0, 70),
	(46, 43, 'The course material was helpful, but the pace was slow.', '2025-01-15 22:11:31', 0, 71),
	(47, 44, 'Perfect for beginners, very clear explanations.', '2025-01-15 22:11:31', 0, 72),
	(48, 45, 'Amazing material, but some chapters were repetitive.', '2025-01-15 22:11:31', 0, 73),
	(49, 46, 'This course was exactly what I needed to learn the basics.', '2025-01-15 22:11:31', 0, 74),
	(50, 47, 'Very informative, but I would prefer more depth.', '2025-01-15 22:11:31', 0, 75),
	(51, 48, 'I wish there were more interactive content.', '2025-01-15 22:11:31', 0, 76),
	(52, 49, 'Loved the content, just wished it was more challenging.', '2025-01-15 22:11:31', 0, 77),
	(53, 50, 'Some parts were unclear, but overall a solid course.', '2025-01-15 22:11:31', 0, 78),
	(54, 51, 'The course exceeded my expectations, very thorough.', '2025-01-15 22:11:31', 0, 79),
	(55, 52, 'I wish there were more practical exercises.', '2025-01-15 22:11:31', 0, 80),
	(56, 33, 'This course helped me a lot to improve my skills.', '2025-01-15 22:13:15', 0, 61),
	(57, 34, 'The course material is good but could use more case studies.', '2025-01-15 22:13:15', 0, 62),
	(58, 35, 'I didn’t find it very engaging, but the information was useful.', '2025-01-15 22:13:15', 0, 63),
	(59, 36, 'Excellent course! I learned a lot of useful techniques.', '2025-01-15 22:13:15', 0, 64),
	(60, 37, 'The course was a bit too slow, but the explanations were clear.', '2025-01-15 22:13:15', 0, 65),
	(61, 38, 'I appreciate the practical approach, but more examples would help.', '2025-01-15 22:13:15', 0, 66),
	(62, 39, 'Nice course, but the instructor could engage more with the students.', '2025-01-15 22:13:15', 0, 67),
	(63, 40, 'Very detailed and helpful, but could be more interactive.', '2025-01-15 22:13:15', 0, 68),
	(64, 41, 'I loved the course! The structure was excellent and the examples were practical.', '2025-01-15 22:13:15', 0, 69),
	(65, 42, 'Could be better with more focus on real-world applications.', '2025-01-15 22:13:15', 0, 70),
	(66, 43, 'I expected more in-depth content for the price.', '2025-01-15 22:13:15', 0, 71),
	(67, 44, 'Great start, but the course could benefit from a bit more complexity.', '2025-01-15 22:13:15', 0, 72),
	(68, 45, 'Amazing! The best course I have taken in a long time.', '2025-01-15 22:13:15', 0, 73),
	(69, 46, 'The course content was great, but I found some parts too fast-paced.', '2025-01-15 22:13:15', 0, 74),
	(70, 47, 'Very informative, but the examples were too simplistic for my level.', '2025-01-15 22:13:15', 0, 75),
	(71, 48, 'I would recommend this course, but with more advanced content.', '2025-01-15 22:13:15', 0, 76),
	(72, 49, 'Good course for beginners, but I was hoping for more advanced material.', '2025-01-15 22:13:15', 0, 77),
	(73, 50, 'The course exceeded my expectations, but it could have been shorter.', '2025-01-15 22:13:15', 0, 78),
	(74, 51, 'Great course, but more assignments or quizzes would be helpful.', '2025-01-15 22:13:15', 0, 79),
	(75, 52, 'I found this course to be very insightful, but I want more exercises.', '2025-01-15 22:13:15', 0, 80),
	(76, 40, 'Very detailed and helpful, but could be more interactive.', '2025-01-15 22:24:03', 0, 61),
	(77, 42, 'Could be better with more focus on real-world applications.', '2025-01-15 22:24:03', 0, 62),
	(78, 36, 'Excellent course! I learned a lot of useful techniques.', '2025-01-15 22:24:03', 0, 63),
	(79, 33, 'This course helped me a lot to improve my skills.', '2025-01-15 22:24:03', 0, 64),
	(80, 41, 'I loved the course! The structure was excellent and the examples were practical.', '2025-01-15 22:24:03', 0, 65),
	(81, 48, 'I would recommend this course, but with more advanced content.', '2025-01-15 22:24:03', 0, 66),
	(82, 34, 'The course material is good but could use more case studies.', '2025-01-15 22:24:03', 0, 67),
	(83, 44, 'Great start, but the course could benefit from a bit more complexity.', '2025-01-15 22:24:03', 0, 68),
	(84, 45, 'Amazing! The best course I have taken in a long time.', '2025-01-15 22:24:03', 0, 69),
	(85, 46, 'The course content was great, but I found some parts too fast-paced.', '2025-01-15 22:24:03', 0, 70),
	(86, 35, 'I didn’t find it very engaging, but the information was useful.', '2025-01-15 22:24:03', 0, 71),
	(87, 39, 'Nice course, but the instructor could engage more with the students.', '2025-01-15 22:24:03', 0, 72),
	(88, 50, 'The course exceeded my expectations, but it could have been shorter.', '2025-01-15 22:24:03', 0, 73),
	(89, 37, 'The course was a bit too slow, but the explanations were clear.', '2025-01-15 22:24:03', 0, 74),
	(90, 52, 'I found this course to be very insightful, but I want more exercises.', '2025-01-15 22:24:03', 0, 75),
	(91, 49, 'Good course for beginners, but I was hoping for more advanced material.', '2025-01-15 22:24:03', 0, 76),
	(92, 38, 'I appreciate the practical approach, but more examples would help.', '2025-01-15 22:24:03', 0, 77),
	(93, 47, 'Very informative, but the examples were too simplistic for my level.', '2025-01-15 22:24:03', 0, 78),
	(94, 51, 'Great course, but more assignments or quizzes would be helpful.', '2025-01-15 22:24:03', 0, 79),
	(95, 43, 'I expected more in-depth content for the price.', '2025-01-15 22:24:03', 0, 80),
	(96, 40, 'The course was very informative, but I would love more case studies.', '2025-01-15 22:25:07', 0, 61),
	(97, 40, 'I enjoyed the course but felt some topics could have been covered in more detail.', '2025-01-15 22:25:07', 0, 62),
	(98, 40, 'Great course! The examples helped me understand the material better.', '2025-01-15 22:25:07', 0, 63),
	(99, 40, 'I appreciate the practical approach, but the pacing was a bit slow.', '2025-01-15 22:25:07', 0, 64),
	(100, 40, 'Very detailed, but could use more interactive exercises for better engagement.', '2025-01-15 22:25:07', 0, 65),
	(101, 40, 'I found the course content useful, but I would have liked more real-life examples.', '2025-01-15 22:25:07', 0, 66),
	(102, 40, 'Good course overall, but some sections could have been more advanced.', '2025-01-15 22:25:07', 0, 67),
	(103, 40, 'The instructor was great, but the course could be more challenging for advanced learners.', '2025-01-15 22:25:07', 0, 68),
	(104, 33, 'This course helped me gain a deeper understanding of the subject.', '2025-01-15 22:27:10', 0, 69),
	(105, 33, 'The content was solid, but I would have preferred more hands-on projects.', '2025-01-15 22:27:10', 0, 70),
	(106, 51, 'The course was well-structured, but I would have liked more advanced topics.', '2025-01-15 22:27:10', 0, 71),
	(107, 44, 'Great introduction to the topic! More practical examples would be helpful.', '2025-01-15 22:27:10', 0, 72),
	(108, 44, 'The course was very clear, but it could be improved with more real-life case studies.', '2025-01-15 22:27:10', 0, 73),
	(109, 45, 'A very useful course with clear explanations and good examples.', '2025-01-15 22:28:39', 0, 74),
	(110, 45, 'I learned a lot from this course, but the pace was a bit slow.', '2025-01-15 22:28:39', 0, 75),
	(111, 45, 'The course was informative, but some topics felt rushed.', '2025-01-15 22:28:39', 0, 76),
	(112, 51, 'The instructor was knowledgeable, but I would have liked more quizzes to test my understanding.', '2025-01-15 22:28:39', 0, 77),
	(113, 44, 'I found the course content a bit too basic, but the structure was good.', '2025-01-15 22:28:39', 0, 78);

-- Listage de la structure de table youdemy_croise. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.roles : ~3 rows (environ)
INSERT INTO `roles` (`id_role`, `role`) VALUES
	(1, 'admin'),
	(3, 'student'),
	(2, 'teacher');

-- Listage de la structure de table youdemy_croise. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `name_tag` varchar(50) NOT NULL,
  `archived` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tag`),
  UNIQUE KEY `name_tag` (`name_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.tags : ~5 rows (environ)
INSERT INTO `tags` (`id_tag`, `name_tag`, `archived`, `created_at`) VALUES
	(1, 'help', 0, '2025-01-15 19:38:14'),
	(2, 'hy', 0, '2025-01-15 19:38:14'),
	(3, 'xx', 0, '2025-01-15 19:38:14'),
	(4, 'heh', 0, '2025-01-15 19:38:53'),
	(5, 'azeaz', 0, '2025-01-15 19:38:53');

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

-- Listage des données de la table youdemy_croise.tag_course : ~0 rows (environ)

-- Listage de la structure de table youdemy_croise. teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id_user` int NOT NULL,
  `approved` enum('pending','approved','rejected') DEFAULT 'pending',
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.teachers : ~20 rows (environ)
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
	(11, 'rejected', 'Refusé : Niveau technique insuffisant, nécessite un développement professionnel supplémentaire.'),
	(12, 'approved', 'Approuvé : Architecte réseau certifié CCNA, plus de 8 ans d\'expérience dans l\'infrastructure IT.'),
	(13, 'approved', 'Validation : Game designer professionnel, a travaillé sur des projets AAA et possède des diplômes spécialisés.'),
	(14, 'approved', 'Refusé : Compétences en analyse de données trop junior, recommandation de formations complémentaires.'),
	(15, 'approved', 'Approuvé : Data scientist avec doctorat, publications dans des revues scientifiques internationales.'),
	(16, 'approved', 'Refusé : Manque de preuves concrètes de réalisations en machine learning.'),
	(17, 'approved', 'Validation : Développeur blockchain reconnu, plusieurs smart contracts audités et publiés.'),
	(18, 'rejected', 'Approuvé : Consultant cyberdéfense pour des organisations gouvernementales, certifications de haut niveau.'),
	(19, 'rejected', 'Refusé : Compétences déclarées non vérifiées, nécessité de fournir des preuves supplémentaires.'),
	(20, 'approved', 'Validation : Expert en technologies émergentes, conférencier international et mentor reconnu.');

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table youdemy_croise.users : ~64 rows (environ)
INSERT INTO `users` (`id_user`, `email`, `password`, `name_full`, `avatar`, `id_role`, `created_at`, `archived`, `suspended`) VALUES
	(1, 'john.smith@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John Smith', 'john_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(2, 'emma.johnson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Emma Johnson', 'emma_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 1),
	(3, 'michael.brown@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Michael Brown', 'michael_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(4, 'sophia.davis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sophia Davis', 'sophia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(5, 'david.wilson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'David Wilson', 'david_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(6, 'olivia.martinez@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Olivia Martinez', 'olivia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(7, 'james.anderson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'James Anderson', 'james_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(8, 'ava.thomas@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ava Thomas', 'ava_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(9, 'ethan.jackson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ethan Jackson', 'ethan_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 1),
	(10, 'isabella.white@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Isabella White', 'isabella_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(11, 'alexander.harris@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Alexander Harris', 'alexander_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(12, 'mia.martin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mia Martin', 'mia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(13, 'william.thompson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'William Thompson', 'william_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(14, 'charlotte.garcia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Charlotte Garcia', 'charlotte_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(15, 'benjamin.robinson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Benjamin Robinson', 'benjamin_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(16, 'amelia.clark@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Amelia Clark', 'amelia_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 1),
	(17, 'daniel.rodriguez@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Daniel Rodriguez', 'daniel_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(18, 'harper.lewis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Harper Lewis', 'harper_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(19, 'mason.lee@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mason Lee', 'mason_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(20, 'evelyn.walker@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Evelyn Walker', 'evelyn_avatar.jpg', 2, '2025-01-15 00:13:35', 0, 0),
	(41, 'johndoe92@gmail.com', 'password123', 'John Doe', 'avatar1.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(42, 'janedoe85@yahoo.com', 'password123', 'Jane Doe', 'avatar2.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(43, 'alice.smith@hotmail.com', 'password123', 'Alice Smith', 'avatar3.jpg', 2, '2025-01-15 01:45:42', 1, 0),
	(44, 'bob.brown@outlook.com', 'password123', 'Bob Brown', 'avatar4.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(45, 'charlie.davis@gmail.com', 'password123', 'Charlie Davis', 'avatar5.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(46, 'david.clark@icloud.com', 'password123', 'David Clark', 'avatar6.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(47, 'eva.evans@aol.com', 'password123', 'Eva Evans', 'avatar7.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(48, 'fay.green@live.com', 'password123', 'Fay Green', 'avatar8.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(49, 'george.harris@outlook.com', 'password123', 'George Harris', 'avatar9.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(50, 'holly.johnson@zoho.com', 'password123', 'Holly Johnson', 'avatar10.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(51, 'ian.king@icloud.com', 'password123', 'Ian King', 'avatar11.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(52, 'jack.lee@gmail.com', 'password123', 'Jack Lee', 'avatar12.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(53, 'karen.mitchell@aol.com', 'password123', 'Karen Mitchell', 'avatar13.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(54, 'liam.moore@outlook.com', 'password123', 'Liam Moore', 'avatar14.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(55, 'megan.nelson@zoho.com', 'password123', 'Megan Nelson', 'avatar15.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(56, 'nathan.oconnor@gmail.com', 'password123', 'Nathan Connor', 'avatar16.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(57, 'olivia.peters@live.com', 'password123', 'Olivia Peters', 'avatar17.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(58, 'paul.quinn@yahoo.com', 'password123', 'Paul Quinn', 'avatar18.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(59, 'quinn.roberts@hotmail.com', 'password123', 'Quinn Roberts', 'avatar19.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(60, 'rachel.smith@icloud.com', 'password123', 'Rachel Smith', 'avatar20.jpg', 2, '2025-01-15 01:45:42', 0, 0),
	(61, 'oliver.williams@example.com', 'password65', 'Oliver Williams', 'avatar65.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(62, 'sophia.jones@example.com', 'password66', 'Sophia Jones', 'avatar66.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(63, 'liam.miller@example.com', 'password67', 'Liam Miller', 'avatar67.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(64, 'emma.davis@example.com', 'password68', 'Emma Davis', 'avatar68.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(65, 'jack.moore@example.com', 'password69', 'Jack Moore', 'avatar69.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(66, 'isabella.garcia@example.com', 'password70', 'Isabella Garcia', 'avatar70.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(67, 'mason.martinez@example.com', 'password71', 'Mason Martinez', 'avatar71.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(68, 'mia.hernandez@example.com', 'password72', 'Mia Hernandez', 'avatar72.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(69, 'ethan.clark@example.com', 'password73', 'Ethan Clark', 'avatar73.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(70, 'ava.rodriguez@example.com', 'password74', 'Ava Rodriguez', 'avatar74.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(71, 'lucas.lewis@example.com', 'password75', 'Lucas Lewis', 'avatar75.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(72, 'olivia.walker@example.com', 'password76', 'Olivia Walker', 'avatar76.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(73, 'jacob.allen@example.com', 'password77', 'Jacob Allen', 'avatar77.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(74, 'charlotte.young@example.com', 'password78', 'Charlotte Young', 'avatar78.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(75, 'aiden.king@example.com', 'password79', 'Aiden King', 'avatar79.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(76, 'harper.scott@example.com', 'password80', 'Harper Scott', 'avatar80.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(77, 'elijah.green@example.com', 'password81', 'Elijah Green', 'avatar81.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(78, 'lily.adams@example.com', 'password82', 'Lily Adams', 'avatar82.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(79, 'james.baker@example.com', 'password83', 'James Baker', 'avatar83.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(80, 'amelia.nelson@example.com', 'password84', 'Amelia Nelson', 'avatar84.jpg', 3, '2025-01-15 22:06:51', 0, 0),
	(81, 'john.doe@example.com', 'password61', 'John Doe', 'avatar61.jpg', 3, '2025-01-15 22:07:25', 0, 0),
	(82, 'jane.smith@example.com', 'password62', 'Jane Smith', 'avatar62.jpg', 3, '2025-01-15 22:07:25', 0, 0),
	(83, 'michael.johnson@example.com', 'password63', 'Michael Johnson', 'avatar63.jpg', 3, '2025-01-15 22:07:25', 0, 0),
	(84, 'emily.brown@example.com', 'password64', 'Emily Brown', 'avatar64.jpg', 3, '2025-01-15 22:07:25', 0, 0);

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
