CREATE TRIGGER after_user_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN
    -- Vérifier si le rôle de l'utilisateur est égal à 2 (enseignant)
    IF NEW.id_role = 2 THEN
        -- Insertion automatique dans la table teachers
        INSERT INTO teachers (id_user, approved, message)
        VALUES (NEW.id_user, 'pending', 'Demande d\'approbation en attente');
    END IF;
END$$

DELIMITER ;