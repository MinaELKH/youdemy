
-- les 3  prof le plus actifs
SELECT name_full , COUNT(id_course) as nbCourse FROM users u
INNER JOIN  courses c  ON  u.id_user = c.id_teacher 
GROUP BY name_full
ORDER BY nbCourse desc
LIMIT 3


-- les 3 categories le plus demande 

SELECT NAME , COUNT(id_course) as nbCourse FROM categories  cat
INNER JOIN  courses c  ON  c.id_categorie = cat.id_categorie 
GROUP BY NAME , id_course 
ORDER BY nbCourse  , id_course desc
LIMIT 3

-- les cours on plus de 5 inscrits

SELECT c.*  , COUNT(e.id_student) AS inscrits FROM courses c
INNER JOIN enrollments e ON e.id_course = c.id_course
GROUP BY id_course
HAVING COUNT(e.id_student) >5 

-- les 3 cours avec plus de des inscrit 

SELECT c.*  , COUNT(e.id_student) AS inscrits FROM courses c
INNER JOIN enrollments e ON e.id_course = c.id_course
GROUP BY id_course
LIMIT 3 

-- le 3 prof avec plus des inscrits 

SELECT name_full  , count(id_student) as nb FROM users u
INNER JOIN  courses c  ON  u.id_user = c.id_teacher 
INNER JOIN  enrollments e  ON  e.id_course = c.id_course 
GROUP BY name_full 
ORDER BY  nb  DESC

-- nombre de courses pending 

SELECT COUNT(*) FROM courses WHERE status = 'pending'

-- nombre des demandes d ensignant  pending 

SELECT COUNT(*) FROM teachers WHERE approved = 'pending'

--





