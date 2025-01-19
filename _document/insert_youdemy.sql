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

-- les inscrits in course : 33 

-- INSERT INTO enrollments (id_student, id_course, enrollment_date, archived, created_at) VALUES
-- (61, 33, NOW(), 0, NOW()),
-- (67, 33, NOW(), 0, NOW()),
-- (72,  33, NOW(), 0, NOW()),
-- (65, 33, NOW(), 0, NOW()),
-- (74, 33, NOW(), 0, NOW()),
-- (68, 33, NOW(), 0, NOW()),
-- (73, 33, NOW(), 0, NOW()),
-- (62, 33, NOW(), 0, NOW()),
-- (79, 33, NOW(), 0, NOW()),
-- (75, 33, NOW(), 0, NOW()),
-- (71, 33, NOW(), 0, NOW()),
-- (69, 33, NOW(), 0, NOW()),
-- (66, 33, NOW(), 0, NOW()),
-- (63, 33, NOW(), 0, NOW());
-- 




-- INSERT INTO `reviews` (`id_course`, `comment`, `created_at`, `archived`, `id_user`) VALUES 
-- (33, 'A very useful course with clear explanations and good examples.', NOW(), 0, 74),
-- (33, 'I learned a lot from this course, but the pace was a bit slow.', NOW(), 0, 75),
-- (33, 'The course was informative, but some topics felt rushed.', NOW(), 0, 76),
-- (33, 'The instructor was knowledgeable, but I would have liked more quizzes to test my understanding.', NOW(), 0, 77),
-- (33, 'I found the course content a bit too basic, but the structure was good.', NOW(), 0, 78);
-- 


UPDATE courses 
SET DESCRIPTION =  '<div class="max-w-4xl mx-auto p-6">
  <h1 class="text-3xl font-bold text-center mb-4">Introduction à la Programmation</h1>
  <p class="text-lg text-gray-700 mb-6">
    La programmation est un élément essentiel de la technologie moderne. Elle permet de créer des applications et des solutions informatiques pour résoudre divers problèmes. Voici quelques concepts de base :
  </p>
  <ul class="list-disc pl-6 text-gray-700">
    <li>Les variables : pour stocker des données.</li>
    <li>Les conditions : pour exécuter des actions basées sur des critères.</li>
    <li>Les boucles : pour répéter des actions multiples fois.</li>
    <li>Les fonctions : pour organiser et réutiliser le code.</li>
    <li>Les erreurs : pour anticiper et gérer les problèmes dans le programme.</li>
  </ul>
</div>'
WHERE id_course = 33





INSERT INTO content (id_course, title, content_text)
VALUES (33, "Introduction", "<div class='max-w-4xl mx-auto p-6'>
  <h1 class='text-3xl font-bold text-center mb-4'>Introduction à la Programmation</h1>
  <p class='text-lg text-gray-700 mb-6'>
    La programmation est un élément essentiel de la technologie moderne. Elle permet de créer des applications et des solutions informatiques pour résoudre divers problèmes. En apprenant à programmer, vous serez en mesure de développer des logiciels, des sites web et des applications mobiles. Chaque programme informatique repose sur des principes de base que tous les développeurs doivent comprendre.
  </p>
  <ul class='list-disc pl-6 text-gray-700 mb-6'>
    <li>
      <strong>Les variables :</strong> Les variables sont utilisées pour stocker des valeurs dans un programme. Elles peuvent contenir différents types de données, tels que des nombres, des chaînes de caractères ou des objets. Par exemple, dans un programme, vous pouvez déclarer une variable `x` pour stocker un nombre, puis utiliser cette variable dans des calculs ou des conditions.
      <br><br>
      Les variables sont essentielles pour gérer l'état d'un programme. Chaque fois que vous modifiez la valeur d'une variable, vous modifiez l'état du programme, ce qui peut affecter son comportement. Il est crucial de bien nommer les variables pour qu'elles aient un sens et facilitent la compréhension du code.
    </li>
    <li>
      <strong>Les conditions :</strong> Les structures conditionnelles permettent d'exécuter des instructions spécifiques en fonction de certaines conditions. Par exemple, un programme peut vérifier si une personne est adulte ou mineure et afficher un message en conséquence. Les conditions sont souvent utilisées avec des opérateurs de comparaison comme `==`, `!=`, `>`, `<`, et `>=`.
      <br><br>
      Elles permettent de rendre un programme plus interactif et réactif. Par exemple, dans un jeu vidéo, une condition peut vérifier si le joueur a gagné ou perdu. L'utilisation correcte des conditions est essentielle pour le bon fonctionnement des applications.
    </li>
    <li>
      <strong>Les boucles :</strong> Les boucles sont utilisées pour exécuter un bloc de code plusieurs fois, souvent sous certaines conditions. Par exemple, vous pouvez utiliser une boucle pour parcourir une liste d'éléments et effectuer des actions sur chaque élément. Les boucles `for`, `while` et `do-while` sont les plus couramment utilisées.
      <br><br>
      Les boucles permettent d'automatiser des tâches répétitives, ce qui simplifie le code et le rend plus efficace. En travaillant avec des boucles, vous apprendrez à gérer la répétition dans vos programmes, ce qui est une compétence clé pour tout programmeur.
    </li>
    <li>
      <strong>Les fonctions :</strong> Les fonctions sont des blocs de code réutilisables qui effectuent une tâche spécifique. Une fonction peut être appelée plusieurs fois dans un programme, ce qui permet de ne pas répéter le même code à plusieurs endroits. Les fonctions sont particulièrement utiles pour organiser le code et le rendre plus modulaire.
      <br><br>
      Les fonctions prennent souvent des arguments en entrée et retournent des valeurs en sortie. Cela permet de rendre les programmes plus flexibles et d'encapsuler la logique complexe dans des unités séparées. Par exemple, vous pouvez créer une fonction pour calculer la somme de deux nombres.
    </li>
    <li>
      <strong>Les erreurs :</strong> La gestion des erreurs est cruciale pour garantir que vos programmes se comportent correctement même en cas de situations inattendues. Par exemple, si un utilisateur entre un texte au lieu d'un nombre dans un formulaire, le programme doit être capable de gérer cette erreur sans se planter.
      <br><br>
      La gestion des erreurs comprend l'utilisation de mécanismes tels que les blocs `try-catch` pour capturer les erreurs et y répondre de manière appropriée. Un bon programmeur doit toujours anticiper les erreurs possibles et prévoir des solutions pour éviter que le programme ne cesse de fonctionner de manière inattendue.
    </li>
  </ul>
</div>");



*


INSERT INTO content (id_course, title, TYPE , content_text)
VALUES 


(33, "Chapitre 2: Types de Données en Programmation","texte" ,  "<div class='max-w-4xl mx-auto p-6'>
  <h1 class='text-3xl font-bold text-center mb-4'>Chapitre 2: Types de Données en Programmation</h1>
  <p class='text-lg text-gray-700 mb-6'>
    Les types de données sont utilisés pour définir la nature des informations manipulées dans un programme. Il existe différents types, tels que les entiers, les chaînes de caractères, les booléens, les listes, et les objets. Chaque type de donnée a des caractéristiques et des utilisations spécifiques.
  </p>
  <ul class='list-disc pl-6 text-gray-700 mb-6'>
    <li><strong>Les nombres :</strong> Les nombres entiers (int) et flottants (float) sont utilisés pour effectuer des calculs dans un programme.</li>
    <li><strong>Les chaînes de caractères :</strong> Les chaînes sont utilisées pour manipuler du texte, comme des mots, des phrases et des informations utilisateurs.</li>
    <li><strong>Les booléens :</strong> Les valeurs booléennes, qui ne peuvent être que `true` ou `false`, sont principalement utilisées dans des conditions.</li>
    <li><strong>Les tableaux :</strong> Un tableau est une collection de valeurs du même type, ce qui permet de regrouper des données de manière organisée.</li>
    <li><strong>Les objets :</strong> Les objets regroupent plusieurs types de données sous un même nom, permettant de structurer des informations complexes.</li>
  </ul>
</div>"),

(33, "Chapitre 3: Structures Conditionnelles et Boucles", "texte" , "<div class='max-w-4xl mx-auto p-6'>
  <h1 class='text-3xl font-bold text-center mb-4'>Chapitre 3: Structures Conditionnelles et Boucles</h1>
  <p class='text-lg text-gray-700 mb-6'>
    Les structures conditionnelles et les boucles permettent de contrôler le flux d'exécution d'un programme. Les conditions permettent de vérifier des critères et d'exécuter des actions en fonction de la vérité de ces critères, tandis que les boucles permettent de répéter des actions plusieurs fois.
  </p>
  <ul class='list-disc pl-6 text-gray-700 mb-6'>
    <li><strong>Les structures conditionnelles :</strong> Par exemple, un bloc `if` vérifie si une condition est vraie, et dans ce cas, il exécute un code spécifique. Sinon, le programme peut exécuter un autre code dans un bloc `else`.</li>
    <li><strong>Les boucles :</strong> Une boucle `for` est utilisée lorsque vous savez à l'avance combien de fois vous voulez répéter un bloc de code. Une boucle `while` continue tant que la condition donnée est vraie.</li>
    <li><strong>Les boucles imbriquées :</strong> Parfois, il peut être nécessaire d'utiliser des boucles à l'intérieur d'autres boucles pour traiter des données complexes ou des matrices.</li>
    <li><strong>La gestion du flux avec `break` et `continue` :</strong> Ces instructions permettent de quitter une boucle prématurément (`break`) ou de passer à l'itération suivante (`continue`).</li>
    <li><strong>Les opérateurs logiques :</strong> Les opérateurs comme `&&` (et) et `||` (ou) sont utilisés pour combiner plusieurs conditions dans une structure conditionnelle.</li>
  </ul>
</div>"),

(33, "Chapitre 4: La Programmation Orientée Objet", "texte" ,  "<div class='max-w-4xl mx-auto p-6'>
  <h1 class='text-3xl font-bold text-center mb-4'>Chapitre 4: La Programmation Orientée Objet</h1>
  <p class='text-lg text-gray-700 mb-6'>
    La programmation orientée objet (POO) est un paradigme de programmation qui permet de structurer le code sous forme d'objets. Chaque objet possède des propriétés (données) et des méthodes (comportements) qui lui sont associées. Ce chapitre explore les concepts fondamentaux de la POO.
  </p>
  <ul class='list-disc pl-6 text-gray-700 mb-6'>
    <li><strong>Les classes :</strong> Une classe définit un modèle pour un objet. Elle contient des propriétés et des méthodes qui seront utilisées par les objets créés à partir de cette classe.</li>
    <li><strong>Les objets :</strong> Un objet est une instance d'une classe. Par exemple, si vous avez une classe `Voiture`, un objet pourrait être une voiture spécifique avec des caractéristiques comme `marque` et `couleur`.</li>
    <li><strong>L'héritage :</strong> L'héritage permet à une classe de hériter des propriétés et méthodes d'une autre classe. Cela permet de réutiliser le code et de simplifier la gestion de classes similaires.</li>
    <li><strong>Le polymorphisme :</strong> Le polymorphisme permet à une méthode d'avoir différentes implémentations en fonction de l'objet qui l'appelle.</li>
    <li><strong>Encapsulation :</strong> L'encapsulation consiste à protéger les données d'un objet en restreignant l'accès direct à certaines propriétés et en offrant des méthodes publiques pour les manipuler.</li>
  </ul>
</div>");







INSERT INTO content (id_course, title,type ,  content_text)
VALUES 
(33, "Chapitre 1: L'Environnement de Travail en Programmation", "texte",  "<div class='max-w-4xl mx-auto p-6'>
  <h1 class='text-3xl font-bold text-center mb-4'>Chapitre 5: L'Environnement de Travail en Programmation</h1>
  <p class='text-lg text-gray-700 mb-6'>
    Un environnement de travail bien configuré est essentiel pour tout développeur. Il comprend les outils et logiciels nécessaires pour écrire, tester, déboguer et déployer du code. Ce chapitre présente les composants clés de l'environnement de travail d'un programmeur et la manière de les configurer pour une productivité optimale.
  </p>
  <ul class='list-disc pl-6 text-gray-700 mb-6'>
    <li><strong>Les éditeurs de code :</strong> Un éditeur de code est un logiciel où vous écrivez votre code. Les éditeurs populaires incluent Visual Studio Code, Sublime Text et Atom. Ces outils offrent des fonctionnalités comme la coloration syntaxique, l'auto-complétion et la gestion de projets pour faciliter l'écriture de code.</li>
    <li><strong>Les IDE (Environnements de Développement Intégrés) :</strong> Un IDE est un outil plus complet qui combine un éditeur de code avec d'autres outils comme un débogueur, un gestionnaire de version et des outils de compilation. Des exemples d'IDE populaires sont IntelliJ IDEA, Eclipse et PyCharm.</li>
    <li><strong>Les systèmes de contrôle de version :</strong> Un système de contrôle de version, comme Git, permet de suivre les modifications apportées au code au fil du temps. Git permet de travailler en collaboration, de revenir à une version précédente du code et de gérer plusieurs versions simultanément avec des branches.</li>
    <li><strong>Les gestionnaires de paquets :</strong> Un gestionnaire de paquets permet d'installer, de mettre à jour et de gérer des bibliothèques ou des frameworks nécessaires au développement. Par exemple, NPM (Node Package Manager) pour JavaScript, Composer pour PHP, et PIP pour Python.</li>
    <li><strong>Les environnements de développement local :</strong> Il est essentiel de configurer un environnement local sur votre machine pour tester votre code avant de le déployer en production. Vous pouvez utiliser des outils comme Docker ou des machines virtuelles pour créer des environnements isolés et reproductibles.</li>
  </ul>
  <p class='text-lg text-gray-700'>
    En plus de ces outils, il est important d'adopter des pratiques de travail efficaces, comme l'utilisation de la ligne de commande, la configuration de raccourcis clavier pour les tâches répétitives, et la gestion des tâches avec des outils comme Trello ou Jira. Ces pratiques vous aideront à améliorer votre productivité et à mieux organiser votre travail.
  </p>
</div>");

-- 
-- INSERT INTO `coursetags` (`id_course`, `id_tag`) 
-- VALUES   (61 , 33) ,
--    (61 , 34) ,
--    (61 , 35) ,
--  (60 , 30) ,
--   (60 , 31) ;

youdemy_croiseusers