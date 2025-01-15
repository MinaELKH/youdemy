-- INSERT INTO `roles` (`id_role`, `role`)
-- VALUES 
--     (1, 'admin'),
--     (2, 'teacher'),
--     (3, 'student')
    
    
    
    
    --Insertion dans la table users (en supposant que le rôle 2 est pour les enseignants)
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


INSERT INTO `users` (`email`, `password`, `name_full`, `avatar`, `id_role`, `created_at`, `archived`, `suspended`) VALUES
('johndoe92@gmail.com', 'password123', 'John Doe', 'avatar1.jpg', 3, NOW(), 0, 0),
('janedoe85@yahoo.com', 'password123', 'Jane Doe', 'avatar2.jpg', 3, NOW(), 0, 0),
('alice.smith@hotmail.com', 'password123', 'Alice Smith', 'avatar3.jpg', 3, NOW(), 0, 0),
('bob.brown@outlook.com', 'password123', 'Bob Brown', 'avatar4.jpg', 3, NOW(), 0, 0),
('charlie.davis@gmail.com', 'password123', 'Charlie Davis', 'avatar5.jpg', 3, NOW(), 0, 0),
('david.clark@icloud.com', 'password123', 'David Clark', 'avatar6.jpg', 3, NOW(), 0, 0),
('eva.evans@aol.com', 'password123', 'Eva Evans', 'avatar7.jpg', 3, NOW(), 0, 0),
('fay.green@live.com', 'password123', 'Fay Green', 'avatar8.jpg', 3, NOW(), 0, 0),
('george.harris@outlook.com', 'password123', 'George Harris', 'avatar9.jpg', 3, NOW(), 0, 0),
('holly.johnson@zoho.com', 'password123', 'Holly Johnson', 'avatar10.jpg', 3, NOW(), 0, 0),
('ian.king@icloud.com', 'password123', 'Ian King', 'avatar11.jpg', 3, NOW(), 0, 0),
('jack.lee@gmail.com', 'password123', 'Jack Lee', 'avatar12.jpg', 3, NOW(), 0, 0),
('karen.mitchell@aol.com', 'password123', 'Karen Mitchell', 'avatar13.jpg', 3, NOW(), 0, 0),
('liam.moore@outlook.com', 'password123', 'Liam Moore', 'avatar14.jpg', 3, NOW(), 0, 0),
('megan.nelson@zoho.com', 'password123', 'Megan Nelson', 'avatar15.jpg', 3, NOW(), 0, 0),
('nathan.oconnor@gmail.com', 'password123', 'Nathan Connor', 'avatar16.jpg', 3, NOW(), 0, 0),
('olivia.peters@live.com', 'password123', 'Olivia Peters', 'avatar17.jpg', 3, NOW(), 0, 0),
('paul.quinn@yahoo.com', 'password123', 'Paul Quinn', 'avatar18.jpg', 3, NOW(), 0, 0),
('quinn.roberts@hotmail.com', 'password123', 'Quinn Roberts', 'avatar19.jpg', 3, NOW(), 0, 0),
('rachel.smith@icloud.com', 'password123', 'Rachel Smith', 'avatar20.jpg', 3, NOW(), 0, 0);


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






voyageoop