CREATE  view viewcourse_Student AS 
SELECT v.*  ,e.id_student , e.enrollment_date FROM viewcourses v
INNER JOIN enrollments e  ON  v.id_course = e.id_course