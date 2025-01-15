
-- DROP VIEW  viewteacher

-- CREATE VIEW  viewteacher AS 
-- SELECT u.*  , t.approved , t.message
-- FROM users u
-- INNER JOIN teachers t  ON u.id_user = t.id_user 
-- 




CREATE VIEW viewcourses AS 
SELECT 
    c.*, 
    ct.name AS category_name, 
    u.name_full AS teacher_name, 
    u.email AS instructor_email, 
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