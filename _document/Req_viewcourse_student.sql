SELECT 
    v.*
    e.id_student AS id_student,
    e.enrollment_date AS enrollment_date
FROM 
    viewcourses v
JOIN 
    enrollments e  ON v.id_course = e.id_course;


DROP VIEW viewcourse_student


CREATE VIEW viewcourse_student AS 
SELECT  
    v.*, 
    e.id_enrollements, 
    e.id_student, 
    e.enrollment_date, 
    e.archived AS student_archived
FROM   
    viewcourses v, 
    enrollments e   
WHERE 
    e.id_course = v.id_course;


SELECT * FROM  viewcourse_student