
SELECT DISTINCT 
    v.*
FROM viewcourses v
inner JOIN 
    courses c ON c.id_course = v.id_course
JOIN 
    users u ON u.id_user = c.id_teacher
JOIN 
    categories ct ON ct.id_categorie = c.id_categorie
LEFT JOIN 
    content cont ON c.id_course = cont.id_course
LEFT JOIN 
    coursetags ctg ON c.id_course = ctg.id_course
LEFT JOIN 
    tags tg ON tg.id_tag = ctg.id_tag
WHERE  
    LOWER(c.STATUS) = 'approved'
    AND c.archived = 0
    AND (
        c.title LIKE '%prog%' OR 
        c.description LIKE '%prog%' OR 
        u.name_full LIKE '%prog%' OR 
        tg.name_tag LIKE '%prog%' OR 
        ct.name LIKE '%prog%' OR 
        cont.title LIKE '%prog%' OR 
        cont.content_text LIKE '%prog%'
    );


