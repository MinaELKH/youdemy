
DROP VIEW  viewTeacher
VIEW teacher 
CREATE VIEW  viewTeacher AS 
SELECT u.*  , t.approved , t.message
FROM users u
INNER JOIN teachers t  ON u.id_user = t.id_user 

