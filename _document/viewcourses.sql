SELECT * FROM tags WHERE name_full = 'hh' AND archive = 0" 

SELECT * FROM users 

SELECT * FROM viewcourses


DROP VIEW viewcourses
CREATE VIEW viewcourses AS 
SELECT 
    c.*, 
    ct.name AS categorie_name, 
    u.name_full AS teacher_name, 
    u.email AS email, 
    COUNT(DISTINCT r.id_review) AS review_count, 
    COUNT(DISTINCT e.id_student) AS student_count  
FROM 
    courses c 
INNER JOIN 
    users u ON u.id_user = c.id_teacher 
INNER JOIN 
    categories ct ON ct.id_categorie = c.id_categorie
LEFT JOIN 
    reviews r ON c.id_course = r.id_course
LEFT JOIN 
    enrollments e ON c.id_course = e.id_course
GROUP BY 
    c.id_course, c.title, ct.name, u.name_full, u.email;


ALTER TABLE courses
MODIFY COLUMN status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending';


SELECT c.*  , ct.name , u.name_full ,u.email , COUNT( distinct id_review)
FROM   courses c 
INNER JOIN users u  ON u.id_user = c.id_teacher 
INNER JOIN categories ct ON ct.id_categorie =  c.id_categorie
left JOIN reviews  r ON c.id_course = r.id_course
GROUP BY c.id_course 

UPDATE users 
SET id_role = 2 
WHERE id_user IN (  SELECT id_user FROM courses ) 
