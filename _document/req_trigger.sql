
 -- Insertion automatique dans la table teachers apres l inseration de user avec id_role 2
 
DELIMITER $$
CREATE TRIGGER after_user_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN
    IF NEW.id_role = 2 THEN
       
        INSERT INTO teachers (id_user, approved, message)
        VALUES (NEW.id_user, 'pending', 'Demande d\'approbation en attente');
    END IF;
END$$

DELIMITER ;



INSERT INTO `users` 
(`email`, `password`, `name_full`, `avatar`, `id_role`, `archived`, `suspended`) VALUES 
('rabii.smiah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Rabii', 'avatar2.jpg', 2, 0, 0)



SELECT * FROM users WHERE name_full = 'Rabii'  -- id : 89
SELECT * FROM teachers WHERE id_user =  89 

INSERT INTO teachers (id_user, approved, message)
VALUES (88, 'pending', 'Demande d\'approbation en attente');