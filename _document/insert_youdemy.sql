-- Ajout des catégories
INSERT INTO categories (name, created_at) VALUES
('Développement Web', NOW()),
('Data Science', NOW()),
('Design Graphique', NOW()),
('Marketing Digital', NOW()),
('Gestion de Projet', NOW()),
('Photographie', NOW()),
('Programmation Mobile', NOW()),
('Sécurité Informatique', NOW()),
('Intelligence Artificielle', NOW()),
('Finance Personnelle', NOW());

-- Ajout des cours pour chaque catégorie
INSERT INTO courses (title, description, picture, prix, status, id_teacher, id_category, archive, created_at, updated_at)
VALUES
-- Catégorie 1 : Développement Web
('HTML & CSS', 'Cours complet sur les bases du développement web avec HTML et CSS.', 'html_css.png', 49.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('JavaScript pour débutants', 'Apprenez les bases de JavaScript et développez des projets.', 'javascript.png', 59.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('PHP et MySQL', 'Créez des applications web dynamiques avec PHP et MySQL.', 'php_mysql.png', 69.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('Frameworks JavaScript', 'Introduction aux frameworks populaires comme React et Vue.', 'frameworks.png', 79.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('Node.js et Express', 'Construisez des applications backend avec Node.js.', 'nodejs.png', 89.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('Bootstrap avec Tailwind', 'Design web avancé avec Bootstrap et Tailwind CSS.', 'bootstrap_tailwind.png', 49.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('Optimisation SEO', 'Apprenez à optimiser votre site pour les moteurs de recherche.', 'seo.png', 39.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),
('API REST', 'Maîtrisez la création d’API RESTful avec PHP et JavaScript.', 'api_rest.png', 69.99, 'active', FLOOR(40 + (RAND() * 7)), 1, '0', NOW(), NOW()),

-- Répétez cette structure pour les 9 autres catégories

-- Exemple pour la Catégorie 2 : Data Science
('Python pour Data Science', 'Introduction à Python pour la science des données.', 'python_datasci.png', 99.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('Analyse des données', 'Apprenez à analyser des données avec pandas et NumPy.', 'data_analysis.png', 89.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('Visualisation avec Matplotlib', 'Créez des visualisations de données attractives.', 'matplotlib.png', 79.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('Machine Learning', 'Introduction aux algorithmes d’apprentissage automatique.', 'ml.png', 119.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('Deep Learning', 'Apprenez les bases des réseaux de neurones.', 'deep_learning.png', 129.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('Big Data', 'Manipulez et analysez de grandes quantités de données.', 'big_data.png', 149.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('SQL Avancé', 'Maîtrisez SQL pour des requêtes complexes.', 'sql_advanced.png', 69.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW()),
('Statistiques', 'Bases des statistiques appliquées pour Data Science.', 'statistics.png', 79.99, 'active', FLOOR(40 + (RAND() * 7)), 2, '0', NOW(), NOW());
