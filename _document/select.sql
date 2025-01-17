tag_course

SELECT * FROM categories

SELECT  id_course  , COUNT(*) FROM reviews 
GROUP BY  id_course

SELECT * FROM viewcourses  WHERE id_teacher = 20

SELECT * FROM content

SELECT * FROM users 

select count(*) from courses where id_teacher = 20

WHERE id_role = 3 

SELECT * FROM tags 

SELECT * from reviews

SELECT * FROM courses WHERE id_course = 60

SELECT * FROM courses WHERE id_teacher= 20


SELECT * from content WHERE id_course = 60



ALTER TABLE courses
add column type  ENUM('texte', 'video') ;


UPDATE courses
SET type = 'texte'
WHERE id_course = 61 ; 


UPDATE courses
SET type = 'video'
WHERE id_course = 60 ; 





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





ALTER TABLE  Coursetag RENAME to  Coursetags