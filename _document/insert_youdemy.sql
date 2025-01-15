-- INSERT INTO `roles` (`id_role`, `role`)
-- VALUES 
--     (1, 'admin'),
--     (2, 'teacher'),
--     (3, 'student')
    
    
    
-- Insertion dans la table users (en supposant que le rôle 2 est pour les enseignants)
-- INSERT INTO `users` 
-- (`email`, `password`, `name_full`, `avatar`, `id_role`, `archived`, `suspended`) VALUES 
-- ('john.smith@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John Smith', 'john_avatar.jpg', 2, 0, 0),
-- ('emma.johnson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Emma Johnson', 'emma_avatar.jpg', 2, 0, 0),
-- ('michael.brown@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Michael Brown', 'michael_avatar.jpg', 2, 0, 0),
-- ('sophia.davis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Sophia Davis', 'sophia_avatar.jpg', 2, 0, 0),
-- ('david.wilson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'David Wilson', 'david_avatar.jpg', 2, 0, 0),
-- ('olivia.martinez@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Olivia Martinez', 'olivia_avatar.jpg', 2, 0, 0),
-- ('james.anderson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'James Anderson', 'james_avatar.jpg', 2, 0, 0),
-- ('ava.thomas@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ava Thomas', 'ava_avatar.jpg', 2, 0, 0),
-- ('ethan.jackson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ethan Jackson', 'ethan_avatar.jpg', 2, 0, 0),
-- ('isabella.white@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Isabella White', 'isabella_avatar.jpg', 2, 0, 0),
-- ('alexander.harris@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Alexander Harris', 'alexander_avatar.jpg', 2, 0, 0),
-- ('mia.martin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mia Martin', 'mia_avatar.jpg', 2, 0, 0),
-- ('william.thompson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'William Thompson', 'william_avatar.jpg', 2, 0, 0),
-- ('charlotte.garcia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Charlotte Garcia', 'charlotte_avatar.jpg', 2, 0, 0),
-- ('benjamin.robinson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Benjamin Robinson', 'benjamin_avatar.jpg', 2, 0, 0),
-- ('amelia.clark@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Amelia Clark', 'amelia_avatar.jpg', 2, 0, 0),
-- ('daniel.rodriguez@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Daniel Rodriguez', 'daniel_avatar.jpg', 2, 0, 0),
-- ('harper.lewis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Harper Lewis', 'harper_avatar.jpg', 2, 0, 0),
-- ('mason.lee@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mason Lee', 'mason_avatar.jpg', 2, 0, 0),
-- ('evelyn.walker@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Evelyn Walker', 'evelyn_avatar.jpg', 2, 0, 0);
-- 
-- Insertion dans la table teacher

-- INSERT INTO `teachers` 
-- (`id_user`, `approved`, `message`) VALUES 
-- (1, 'approved', 'Profil validé : 10 ans d\'expérience en développement web, diplôme de l\'École Polytechnique et références professionnelles solides.'),
-- (2, 'approved', 'Approuvé : Portfolio impressionnant, plusieurs projets innovants et certifications internationales en design UX/UI.'),
-- (3, 'approved', 'Validation confirmée : Ancien ingénieur cloud chez Google, publications techniques et expertise reconnue.'),
-- (4, 'rejected', 'Refusé : Manque d\'expérience professionnelle significative et absence de certifications pertinentes.'),
-- (5, 'approved', 'Approuvé : Expert cybersécurité certifié CISSP, 15 ans dans le domaine de la sécurité informatique.'),
-- (6, 'rejected', 'Refusé : Parcours académique incomplet et peu de projets concrets en intelligence artificielle.'),
-- (7, 'approved', 'Validation : DBA senior avec plus de 12 ans d\'expérience chez Oracle et MySQL, formateur reconnu.'),
-- (8, 'rejected', 'Refusé : Dossier incomplet, informations de qualification manquantes.'),
-- (9, 'approved', 'Approuvé : Contributeur open-source majeur, formateur Python dans plusieurs bootcamps internationaux.'),
-- (10, 'approved', 'Validation confirmée : Lead développeur JavaScript, nombreuses conférences et workshops donnés.'),
-- (11, 'rejected', 'Refusé : Niveau technique insuffisant, nécessite un développement professionnel supplémentaire.'),
-- (12, 'approved', 'Approuvé : Architecte réseau certifié CCNA, plus de 8 ans d\'expérience dans l\'infrastructure IT.'),
-- (13, 'approved', 'Validation : Game designer professionnel, a travaillé sur des projets AAA et possède des diplômes spécialisés.'),
-- (14, 'rejected', 'Refusé : Compétences en analyse de données trop junior, recommandation de formations complémentaires.'),
-- (15, 'approved', 'Approuvé : Data scientist avec doctorat, publications dans des revues scientifiques internationales.'),
-- (16, 'rejected', 'Refusé : Manque de preuves concrètes de réalisations en machine learning.'),
-- (17, 'approved', 'Validation : Développeur blockchain reconnu, plusieurs smart contracts audités et publiés.'),
-- (18, 'approved', 'Approuvé : Consultant cyberdéfense pour des organisations gouvernementales, certifications de haut niveau.'),
-- (19, 'rejected', 'Refusé : Compétences déclarées non vérifiées, nécessité de fournir des preuves supplémentaires.'),
-- (20, 'approved', 'Validation : Expert en technologies émergentes, conférencier international et mentor reconnu.');


-- INSERT INTO `users` (`email`, `password`, `name_full`, `avatar`, `id_role`, `created_at`, `archived`, `suspended`) VALUES
-- ('johndoe92@gmail.com', 'password123', 'John Doe', 'avatar1.jpg', 3, NOW(), 0, 0),
-- ('janedoe85@yahoo.com', 'password123', 'Jane Doe', 'avatar2.jpg', 3, NOW(), 0, 0),
-- ('alice.smith@hotmail.com', 'password123', 'Alice Smith', 'avatar3.jpg', 3, NOW(), 0, 0),
-- ('bob.brown@outlook.com', 'password123', 'Bob Brown', 'avatar4.jpg', 3, NOW(), 0, 0),
-- ('charlie.davis@gmail.com', 'password123', 'Charlie Davis', 'avatar5.jpg', 3, NOW(), 0, 0),
-- ('david.clark@icloud.com', 'password123', 'David Clark', 'avatar6.jpg', 3, NOW(), 0, 0),
-- ('eva.evans@aol.com', 'password123', 'Eva Evans', 'avatar7.jpg', 3, NOW(), 0, 0),
-- ('fay.green@live.com', 'password123', 'Fay Green', 'avatar8.jpg', 3, NOW(), 0, 0),
-- ('george.harris@outlook.com', 'password123', 'George Harris', 'avatar9.jpg', 3, NOW(), 0, 0),
-- ('holly.johnson@zoho.com', 'password123', 'Holly Johnson', 'avatar10.jpg', 3, NOW(), 0, 0),
-- ('ian.king@icloud.com', 'password123', 'Ian King', 'avatar11.jpg', 3, NOW(), 0, 0),
-- ('jack.lee@gmail.com', 'password123', 'Jack Lee', 'avatar12.jpg', 3, NOW(), 0, 0),
-- ('karen.mitchell@aol.com', 'password123', 'Karen Mitchell', 'avatar13.jpg', 3, NOW(), 0, 0),
-- ('liam.moore@outlook.com', 'password123', 'Liam Moore', 'avatar14.jpg', 3, NOW(), 0, 0),
-- ('megan.nelson@zoho.com', 'password123', 'Megan Nelson', 'avatar15.jpg', 3, NOW(), 0, 0),
-- ('nathan.oconnor@gmail.com', 'password123', 'Nathan Connor', 'avatar16.jpg', 3, NOW(), 0, 0),
-- ('olivia.peters@live.com', 'password123', 'Olivia Peters', 'avatar17.jpg', 3, NOW(), 0, 0),
-- ('paul.quinn@yahoo.com', 'password123', 'Paul Quinn', 'avatar18.jpg', 3, NOW(), 0, 0),
-- ('quinn.roberts@hotmail.com', 'password123', 'Quinn Roberts', 'avatar19.jpg', 3, NOW(), 0, 0),
-- ('rachel.smith@icloud.com', 'password123', 'Rachel Smith', 'avatar20.jpg', 3, NOW(), 0, 0);


-- INSERT INTO categories (name, created_at) VALUES
-- ('Développement Web', NOW()),
-- ('Data Science', NOW()),
-- ('Design Graphique', NOW()),
-- ('Marketing Digital', NOW()),
-- ('Gestion de Projet', NOW()),
-- ('Photographie', NOW()),
-- ('Programmation Mobile', NOW()),
-- ('Sécurité Informatique', NOW()),
-- ('Intelligence Artificielle', NOW()),
-- ('Finance Personnelle', NOW());



-- INSERT INTO `courses` (`title`, `description`, `picture`, `id_teacher`, `status`, `id_categorie`, `prix`) VALUES
-- ('Introduction to Programming', 'Learn the basics of programming with this beginner-friendly course.', 'intro_programming.jpg', 1, 'active', 29, 49.99),
-- ('Advanced Python', 'Master advanced Python programming concepts.', 'advanced_python.jpg', 2, 'active', 30, 99.99),
-- ('Web Development Fundamentals', 'A comprehensive guide to web development for beginners.', 'web_dev.jpg', 3, 'pending', 31, 79.99),
-- ('Machine Learning 101', 'An introduction to machine learning and its applications.', 'ml_101.jpg', 4, 'active', 32, 119.99),
-- ('Digital Marketing Basics', 'Learn the fundamentals of digital marketing.', 'digital_marketing.jpg', 5, 'active', 33, 59.99),
-- ('Data Science with R', 'Discover the power of R for data analysis and visualization.', 'data_science_r.jpg', 6, 'archived', 34, 89.99),
-- ('UI/UX Design Principles', 'Master the principles of user interface and user experience design.', 'ui_ux_design.jpg', 7, 'active', 35, 69.99),
-- ('Project Management for Beginners', 'Learn essential project management skills.', 'project_management.jpg', 8, 'pending', 36, 39.99),
-- ('Cybersecurity Basics', 'Understand the fundamentals of cybersecurity.', 'cybersecurity.jpg', 9, 'active', 37, 129.99),
-- ('Creative Writing Workshop', 'Improve your creative writing skills with hands-on exercises.', 'creative_writing.jpg', 10, 'active', 38, 29.99);
-- 
-- INSERT INTO `courses` (`title`, `description`, `picture`, `id_teacher`, `status`, `id_categorie`, `prix`) VALUES
-- ('Financial Analysis for Beginners', 'Learn to analyze financial data effectively.', 'financial_analysis.jpg', 11, 'active', 39, 49.99),
-- ('Photography Masterclass', 'Master the art of photography with this comprehensive course.', 'photography.jpg', 12, 'pending', 40, 59.99),
-- ('Spanish for Beginners', 'Start your journey in learning Spanish.', 'spanish_beginners.jpg', 13, 'active', 41, 19.99),
-- ('Yoga and Wellness', 'Achieve wellness through yoga practices.', 'yoga_wellness.jpg', 14, 'archived', 42, 24.99),
-- ('Graphic Design Essentials', 'A complete guide to graphic design principles.', 'graphic_design.jpg', 15, 'active', 43, 69.99),
-- ('Blockchain and Cryptocurrency', 'Understand the basics of blockchain technology and cryptocurrencies.', 'blockchain_crypto.jpg', 16, 'pending', 44, 199.99),
-- ('French Language Advanced', 'Improve your advanced French language skills.', 'french_advanced.jpg', 17, 'active', 45, 39.99),
-- ('Public Speaking Mastery', 'Learn to speak confidently in public settings.', 'public_speaking.jpg', 18, 'active', 46, 49.99),
-- ('Fitness and Nutrition', 'Combine fitness and nutrition to achieve your health goals.', 'fitness_nutrition.jpg', 19, 'active', 47, 29.99),
-- ('Music Theory for Beginners', 'Explore the basics of music theory.', 'music_theory.jpg', 20, 'pending', 48, 19.99);
-- 
-- 



-- INSERT INTO `users` (`email`, `password`, `name_full`, `avatar`, `id_role`, `created_at`, `archived`, `suspended`) VALUES
-- ('oliver.williams@example.com', 'password65', 'Oliver Williams', 'avatar65.jpg', 3, NOW(), 0, 0),
-- ('sophia.jones@example.com', 'password66', 'Sophia Jones', 'avatar66.jpg', 3, NOW(), 0, 0),
-- ('liam.miller@example.com', 'password67', 'Liam Miller', 'avatar67.jpg', 3, NOW(), 0, 0),
-- ('emma.davis@example.com', 'password68', 'Emma Davis', 'avatar68.jpg', 3, NOW(), 0, 0),
-- ('jack.moore@example.com', 'password69', 'Jack Moore', 'avatar69.jpg', 3, NOW(), 0, 0),
-- ('isabella.garcia@example.com', 'password70', 'Isabella Garcia', 'avatar70.jpg', 3, NOW(), 0, 0),
-- ('mason.martinez@example.com', 'password71', 'Mason Martinez', 'avatar71.jpg', 3, NOW(), 0, 0),
-- ('mia.hernandez@example.com', 'password72', 'Mia Hernandez', 'avatar72.jpg', 3, NOW(), 0, 0),
-- ('ethan.clark@example.com', 'password73', 'Ethan Clark', 'avatar73.jpg', 3, NOW(), 0, 0),
-- ('ava.rodriguez@example.com', 'password74', 'Ava Rodriguez', 'avatar74.jpg', 3, NOW(), 0, 0),
-- ('lucas.lewis@example.com', 'password75', 'Lucas Lewis', 'avatar75.jpg', 3, NOW(), 0, 0),
-- ('olivia.walker@example.com', 'password76', 'Olivia Walker', 'avatar76.jpg', 3, NOW(), 0, 0),
-- ('jacob.allen@example.com', 'password77', 'Jacob Allen', 'avatar77.jpg', 3, NOW(), 0, 0),
-- ('charlotte.young@example.com', 'password78', 'Charlotte Young', 'avatar78.jpg', 3, NOW(), 0, 0),
-- ('aiden.king@example.com', 'password79', 'Aiden King', 'avatar79.jpg', 3, NOW(), 0, 0),
-- ('harper.scott@example.com', 'password80', 'Harper Scott', 'avatar80.jpg', 3, NOW(), 0, 0),
-- ('elijah.green@example.com', 'password81', 'Elijah Green', 'avatar81.jpg', 3, NOW(), 0, 0),
-- ('lily.adams@example.com', 'password82', 'Lily Adams', 'avatar82.jpg', 3, NOW(), 0, 0),
-- ('james.baker@example.com', 'password83', 'James Baker', 'avatar83.jpg', 3, NOW(), 0, 0),
-- ('amelia.nelson@example.com', 'password84', 'Amelia Nelson', 'avatar84.jpg', 3, NOW(), 0, 0);
-- INSERT INTO `users` (`email`, `password`, `name_full`, `avatar`, `id_role`, `created_at`, `archived`, `suspended`) VALUES
-- ('john.doe@example.com', 'password61', 'John Doe', 'avatar61.jpg', 3, NOW(), 0, 0),
-- ('jane.smith@example.com', 'password62', 'Jane Smith', 'avatar62.jpg', 3, NOW(), 0, 0),
-- ('michael.johnson@example.com', 'password63', 'Michael Johnson', 'avatar63.jpg', 3, NOW(), 0, 0),
-- ('emily.brown@example.com', 'password64', 'Emily Brown', 'avatar64.jpg', 3, NOW(), 0, 0);

-- 
-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (33, 'Amazing course! Very detailed and clear.', NOW(), 0, 61),
-- (34, 'The instructor was great, but the material could be improved.', NOW(), 0, 62),
-- (35, 'Good content but lacked practical examples.', NOW(), 0, 63),
-- (36, 'Well-structured and easy to follow.', NOW(), 0, 64),
-- (37, 'Some sections were a bit too basic for me.', NOW(), 0, 65),
-- (38, 'I loved the way it was explained, great for beginners!', NOW(), 0, 66),
-- (39, 'Good pace and comprehensive, would recommend.', NOW(), 0, 67),
-- (40, 'A bit too slow for advanced learners.', NOW(), 0, 68),
-- (41, 'Great course overall, I would love more exercises.', NOW(), 0, 69),
-- (42, 'I enjoyed the course, but it could use more real-life examples.', NOW(), 0, 70),
-- (43, 'The course material was helpful, but the pace was slow.', NOW(), 0, 71),
-- (44, 'Perfect for beginners, very clear explanations.', NOW(), 0, 72),
-- (45, 'Amazing material, but some chapters were repetitive.', NOW(), 0, 73),
-- (46, 'This course was exactly what I needed to learn the basics.', NOW(), 0, 74),
-- (47, 'Very informative, but I would prefer more depth.', NOW(), 0, 75),
-- (48, 'I wish there were more interactive content.', NOW(), 0, 76),
-- (49, 'Loved the content, just wished it was more challenging.', NOW(), 0, 77),
-- (50, 'Some parts were unclear, but overall a solid course.', NOW(), 0, 78),
-- (51, 'The course exceeded my expectations, very thorough.', NOW(), 0, 79),
-- (52, 'I wish there were more practical exercises.', NOW(), 0, 80);
-- 


-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (33, 'This course helped me a lot to improve my skills.', NOW(), 0, 61),
-- (34, 'The course material is good but could use more case studies.', NOW(), 0, 62),
-- (35, 'I didn’t find it very engaging, but the information was useful.', NOW(), 0, 63),
-- (36, 'Excellent course! I learned a lot of useful techniques.', NOW(), 0, 64),
-- (37, 'The course was a bit too slow, but the explanations were clear.', NOW(), 0, 65),
-- (38, 'I appreciate the practical approach, but more examples would help.', NOW(), 0, 66),
-- (39, 'Nice course, but the instructor could engage more with the students.', NOW(), 0, 67),
-- (40, 'Very detailed and helpful, but could be more interactive.', NOW(), 0, 68),
-- (41, 'I loved the course! The structure was excellent and the examples were practical.', NOW(), 0, 69),
-- (42, 'Could be better with more focus on real-world applications.', NOW(), 0, 70),
-- (43, 'I expected more in-depth content for the price.', NOW(), 0, 71),
-- (44, 'Great start, but the course could benefit from a bit more complexity.', NOW(), 0, 72),
-- (45, 'Amazing! The best course I have taken in a long time.', NOW(), 0, 73),
-- (46, 'The course content was great, but I found some parts too fast-paced.', NOW(), 0, 74),
-- (47, 'Very informative, but the examples were too simplistic for my level.', NOW(), 0, 75),
-- (48, 'I would recommend this course, but with more advanced content.', NOW(), 0, 76),
-- (49, 'Good course for beginners, but I was hoping for more advanced material.', NOW(), 0, 77),
-- (50, 'The course exceeded my expectations, but it could have been shorter.', NOW(), 0, 78),
-- (51, 'Great course, but more assignments or quizzes would be helpful.', NOW(), 0, 79),
-- (52, 'I found this course to be very insightful, but I want more exercises.', NOW(), 0, 80);


-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (40, 'Very detailed and helpful, but could be more interactive.', NOW(), 0, 61),
-- (42, 'Could be better with more focus on real-world applications.', NOW(), 0, 62),
-- (36, 'Excellent course! I learned a lot of useful techniques.', NOW(), 0, 63),
-- (33, 'This course helped me a lot to improve my skills.', NOW(), 0, 64),
-- (41, 'I loved the course! The structure was excellent and the examples were practical.', NOW(), 0, 65),
-- (48, 'I would recommend this course, but with more advanced content.', NOW(), 0, 66),
-- (34, 'The course material is good but could use more case studies.', NOW(), 0, 67),
-- (44, 'Great start, but the course could benefit from a bit more complexity.', NOW(), 0, 68),
-- (45, 'Amazing! The best course I have taken in a long time.', NOW(), 0, 69),
-- (46, 'The course content was great, but I found some parts too fast-paced.', NOW(), 0, 70),
-- (35, 'I didn’t find it very engaging, but the information was useful.', NOW(), 0, 71),
-- (39, 'Nice course, but the instructor could engage more with the students.', NOW(), 0, 72),
-- (50, 'The course exceeded my expectations, but it could have been shorter.', NOW(), 0, 73),
-- (37, 'The course was a bit too slow, but the explanations were clear.', NOW(), 0, 74),
-- (52, 'I found this course to be very insightful, but I want more exercises.', NOW(), 0, 75),
-- (49, 'Good course for beginners, but I was hoping for more advanced material.', NOW(), 0, 76),
-- (38, 'I appreciate the practical approach, but more examples would help.', NOW(), 0, 77),
-- (47, 'Very informative, but the examples were too simplistic for my level.', NOW(), 0, 78),
-- (51, 'Great course, but more assignments or quizzes would be helpful.', NOW(), 0, 79),
-- (43, 'I expected more in-depth content for the price.', NOW(), 0, 80);

-- 
-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (40, 'The course was very informative, but I would love more case studies.', NOW(), 0, 61),
-- (40, 'I enjoyed the course but felt some topics could have been covered in more detail.', NOW(), 0, 62),
-- (40, 'Great course! The examples helped me understand the material better.', NOW(), 0, 63),
-- (40, 'I appreciate the practical approach, but the pacing was a bit slow.', NOW(), 0, 64),
-- (40, 'Very detailed, but could use more interactive exercises for better engagement.', NOW(), 0, 65),
-- (40, 'I found the course content useful, but I would have liked more real-life examples.', NOW(), 0, 66),
-- (40, 'Good course overall, but some sections could have been more advanced.', NOW(), 0, 67),
-- (40, 'The instructor was great, but the course could be more challenging for advanced learners.', NOW(), 0, 68);


-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (33, 'This course helped me gain a deeper understanding of the subject.', NOW(), 0, 69),
-- (33, 'The content was solid, but I would have preferred more hands-on projects.', NOW(), 0, 70),
-- (51, 'The course was well-structured, but I would have liked more advanced topics.', NOW(), 0, 71),
-- (44, 'Great introduction to the topic! More practical examples would be helpful.', NOW(), 0, 72),
-- (44, 'The course was very clear, but it could be improved with more real-life case studies.', NOW(), 0, 73);



-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (45, 'A very useful course with clear explanations and good examples.', NOW(), 0, 74),
-- (45, 'I learned a lot from this course, but the pace was a bit slow.', NOW(), 0, 75),
-- (45, 'The course was informative, but some topics felt rushed.', NOW(), 0, 76),
-- (51, 'The instructor was knowledgeable, but I would have liked more quizzes to test my understanding.', NOW(), 0, 77),
-- (44, 'I found the course content a bit too basic, but the structure was good.', NOW(), 0, 78);
-- 


-- INSERT INTO `enrollments` (`id_student`, `id_course`, `enrollment_date`, `archived`, `created_at`) VALUES
-- (61, 33, NOW(), 0, NOW()),
-- (62, 34, NOW(), 0, NOW()),
-- (63, 35, NOW(), 0, NOW()),
-- (64, 36, NOW(), 0, NOW()),
-- (65, 37, NOW(), 0, NOW()),
-- (66, 38, NOW(), 0, NOW()),
-- (67, 39, NOW(), 0, NOW()),
-- (68, 40, NOW(), 0, NOW()),
-- (69, 41, NOW(), 0, NOW()),
-- (70, 42, NOW(), 0, NOW()),
-- (71, 43, NOW(), 0, NOW()),
-- (72, 44, NOW(), 0, NOW()),
-- (73, 45, NOW(), 0, NOW()),
-- (74, 46, NOW(), 0, NOW()),
-- (75, 47, NOW(), 0, NOW()),
-- (76, 48, NOW(), 0, NOW()),
-- (77, 49, NOW(), 0, NOW()),
-- (78, 50, NOW(), 0, NOW()),
-- (79, 51, NOW(), 0, NOW()),
-- (80, 52, NOW(), 0, NOW());
-- 
-- 
-- 
-- INSERT INTO `enrollments` (`id_student`, `id_course`, `enrollment_date`, `archived`, `created_at`) VALUES
-- (61, 50, NOW(), 0, NOW()),
-- (63, 50, NOW(), 0, NOW()),
-- (65, 40, NOW(), 0, NOW()),
-- (67, 40, NOW(), 0, NOW()),
-- (70, 40, NOW(), 0, NOW()),
-- (73, 40, NOW(), 0, NOW());



-- INSERT INTO enrollments (id_student, id_course, enrollment_date, archived, created_at) VALUES
-- (74, 38, NOW(), 0, NOW()),
-- (70, 38, NOW(), 0, NOW()),
-- (66, 38, NOW(), 0, NOW()),
-- (72, 38, NOW(), 0, NOW()),
-- (79, 44, NOW(), 0, NOW()),
-- (63, 44, NOW(), 0, NOW()),
-- (67, 44, NOW(), 0, NOW()),
-- (66, 44, NOW(), 0, NOW()),
-- (77, 48, NOW(), 0, NOW()),
-- (66, 48, NOW(), 0, NOW()),
-- (80, 52, NOW(), 0, NOW()),
-- (80, 52, NOW(), 0, NOW()),
-- (70, 52, NOW(), 0, NOW());
-- 

-- INSERT INTO enrollments (id_student, id_course, enrollment_date, archived, created_at) VALUES
-- (61, 38, NOW(), 0, NOW()),
-- (67, 38, NOW(), 0, NOW()),
-- (72, 38, NOW(), 0, NOW()),
-- (65, 38, NOW(), 0, NOW()),
-- (74, 44, NOW(), 0, NOW()),
-- (68, 44, NOW(), 0, NOW()),
-- (73, 44, NOW(), 0, NOW()),
-- (62, 44, NOW(), 0, NOW()),
-- (79, 48, NOW(), 0, NOW()),
-- (75, 48, NOW(), 0, NOW()),
-- (71, 48, NOW(), 0, NOW()),
-- (69, 48, NOW(), 0, NOW()),
-- (66, 52, NOW(), 0, NOW()),
-- (61, 52, NOW(), 0, NOW()),
-- (63, 52, NOW(), 0, NOW());
-- 

