
SELECT * FROM categories


SELECT * FROM viewcourses
users
SELECT * FROM enrollments ;

SELECT * FROM users  
WHERE name_full LIKE 'Emma%'

UPDATE users 
SET avatar = 'uploads/avatar10.jpg'
WHERE name_full LIKE 'S%'



delete FROM enrollments WHERE id_enrollements=95 ; 
SELECT  id_course  , COUNT(*) FROM reviews 
GROUP BY  id_course

SELECT * FROM viewcourses  WHERE id_teacher = 20

SELECT * FROM content WHERE id_course = 33 
SELECT * FROM courses WHERE id_course = 33 
select * FROM categories 
SELECT * FROM users 

SELECT * FROM tags 

SELECT * FROM coursetags 

select count(*) from courses where id_teacher = 20

WHERE id_role = 3 

SELECT * FROM tags 

SELECT * from reviews

contentcontent

SELECT * FROM courses WHERE id_course = 33

SELECT * FROM courses WHERE id_teacher= 20


SELECT * from content WHERE id_course = 33



ALTER TABLE courses
add column type  ENUM('texte', 'video') ;


UPDATE courses
SET DESCRIPTION = '<div class="bg-white rounded-lg shadow-md border border-gray-100 max-w-4xl mx-auto p-6 mt-4">
    <div class="flex items-center mb-4 border-b pb-3">
        <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h2 class="text-xl font-semibold text-gray-800">Description du Cours</h2>
    </div>

    <p class="text-sm text-gray-700 mb-6 leading-relaxed">
        La programmation est un élément essentiel de la technologie moderne. Elle permet de créer des applications et des solutions informatiques pour résoudre divers problèmes. Voici quelques concepts de base :
    </p>

    <ul class="space-y-3">
        <li class="flex items-center">
            <span class="mr-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-full w-6 h-6 flex items-center justify-center">
                1
            </span>
            <div class="text-gray-700 flex-grow">
                <strong>Les variables :</strong> pour stocker des données.
            </div>
        </li>
        <li class="flex items-center">
            <span class="mr-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-full w-6 h-6 flex items-center justify-center">
                2
            </span>
            <div class="text-gray-700 flex-grow">
                <strong>Les conditions :</strong> pour exécuter des actions basées sur des critères.
            </div>
        </li>
        <li class="flex items-center">
            <span class="mr-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-full w-6 h-6 flex items-center justify-center">
                3
            </span>
            <div class="text-gray-700 flex-grow">
                <strong>Les boucles :</strong> pour répéter des actions multiples fois.
            </div>
        </li>
        <li class="flex items-center">
            <span class="mr-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-full w-6 h-6 flex items-center justify-center">
                4
            </span>
            <div class="text-gray-700 flex-grow">
                <strong>Les fonctions :</strong> pour organiser et réutiliser le code.
            </div>
        </li>
        <li class="flex items-center">
            <span class="mr-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-full w-6 h-6 flex items-center justify-center">
                5
            </span>
            <div class="text-gray-700 flex-grow">
                <strong>Les erreurs :</strong> pour anticiper et gérer les problèmes dans le programme.
            </div>
        </li>
    </ul>
</div>
'
WHERE id_course = 33 ; 


UPDATE categories
SET name = 'finance public'
WHERE id_categorie = 39 ; 


select c.*  , name_full , avatar from reviews c
        inner join users  u on u.id_user = c.id_user
        where id_course = 33



DELETE FROM categories WHERE id_categorie = 39


CREATE TABLE content (
    id_content INT PRIMARY KEY AUTO_INCREMENT,
    id_course INT,
    title VARCHAR(255),
    type ENUM('texte', 'video', 'autre'),
    content_text TEXT,
    url_video VARCHAR(255),
    duration VARCHAR(50),
    url_file VARCHAR(255),
    FOREIGN KEY (id_course) REFERENCES courses(id_course)
);






SELECT DISTINCT viewCourses.*
        FROM viewCourses
        INNER JOIN Courses ar ON ar.id_Course = viewCourse.id_Course
        INNER JOIN cataegorie th ON ar.id_categorie = th.id_theme
        LEFT JOIN Course_tags artg ON ar.id_Course = artg.id_Course
        LEFT JOIN tags tg ON artg.id_tag = tg.id_tag
        WHERE 
            ar.title LIKE :MotSearch OR 
            ar.content LIKE :MotSearch OR 
            tg.name LIKE :MotSearch OR 
            th.name LIKE :MotSearch and 
            ar.archive =  0 
        LIMIT 10 OFFSET 0
        
        
        
        
        

