<?php

namespace classes;

use config\DataBaseManager;
use stdClass;
use Exception;

class Course
{
    private ?DataBaseManager $db;
    private ?int $id_course;
    private ?string $title;
    private ?string $description;
    private ?string $picture;
    private ?int $id_teacher;
    private ?int $id_categorie;
    private ?string $status;
    private ?string $type;
    private ?int $archived;
    private ?float $prix;

    // Constantes pour le statut
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';

    public function __construct(
        ?DataBaseManager $db,
        ?int $id_course = 0,
        ?string $title = null,
        ?string $description = null,
        ?string $picture = null,
        ?int $id_teacher = null,
        ?int $id_categorie = null,
        ?string $status = self::STATUS_PENDING,
        ?int $archived = 0,
        ?float $prix = null , 
        ?string $type = null,
    ) {
        
        $this->db = $db;
        $this->id_course = $id_course;
        $this->title = $title;
        $this->description = $description;
        $this->picture = $picture;
        $this->id_teacher = $id_teacher;
        $this->id_categorie = $id_categorie;
        $this->status = $status;
        $this->archived = $archived ;
        $this->prix = $prix;
        $this->type = $type;
    }
    public function __get($att)
    {
        return $this->$att;
    }
    public function __set($att, $value)
    {
        $this->$att = $value;
    }
    public function add(): bool
    {
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "picture" => $this->picture,
            "id_teacher" => $this->id_teacher,
            "id_categorie" => $this->id_categorie,
            "status" => self::STATUS_PENDING,
            "prix" => $this->prix,
            "type" => $this->type
        ];
        return $this->db->insert("courses", $data);
    }
    public function delete(): bool
    {
        $cond = "id_course";
        $param = $this->id_course;
        return $this->db->delete("courses", $cond, $param);
    }
    public function update(): bool
    {
        // Préparer les données pour la mise à jour
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "id_categorie" => $this->id_categorie,
            "prix" => $this->prix,
            "picture" => $this->picture,
            "status" => $this->status,
            "archived" => $this->archived,
            "id_teacher" => $this->id_teacher,
            "type" => $this->type,
        ];
    
        $whereColumn = "id_course";
        $whereValue = $this->id_course;
        
        return $this->db->update("courses", $data, $whereColumn, $whereValue);
    }
    
    public function convert_array_to_objet(array|stdClass $data): void
    {
        if (is_array($data)) {
            $data = (object) $data; // Convertir un tableau en objet
        }
        $this->id_course = $data->id_course ;
        $this->title = $data->title;
        $this->description = $data->description;
        $this->picture = $data->picture;
        $this->id_teacher = $data->id_teacher;
        $this->id_categorie = $data->id_categorie;
        $this->status = $data->status;
        $this->archived = $data->archived;
        $this->prix = $data->prix;    
        $this->type = $data->type;  
    }

    public function getById()
    {
        $result = $this->db->selectBy("courses", ["id_course" => $this->id_course]);
        // var_dump($result);  
        if (!empty($result)) {
            $this->convert_array_to_objet($result[0]); // converti array to objet 
            return $this;  // je return l ojbet rempli 
        } else {
            return false;
        }
    }

    public function getDetailCourse()
    {
        $result = $this->db->selectBy("viewcourses", ["id_course" => $this->id_course]); 
        return (object)$result[0];
     
    }
    public function archive(): bool
    {
        $data = ["archived" => 1];
        $whereColumn = "id_course";
        $whereValue = $this->id_course;
        return $this->db->update("courses", $data, $whereColumn, $whereValue);
    }
    public function approve(string $status): bool
    {
        if (!in_array($status, [self::STATUS_PENDING, self::STATUS_ACTIVE, self::STATUS_ARCHIVED])) {
            throw new \InvalidArgumentException("Statut invalide.");
        }
        $data = ["status" => $status];
        $whereColumn = "id_course";
        $whereValue = $this->id_course;
        return $this->db->update("courses", $data, $whereColumn, $whereValue);
    }

    public function getAllPending(): array
    {
        $params = [
            "status" => self::STATUS_PENDING,
            "archived" => 0
        ];
        return $this->db->selectBy("viewcourses", $params);
    }

    public function getAll(): array
    {
        return $this->db->selectAll("viewcourses");
    }
}
