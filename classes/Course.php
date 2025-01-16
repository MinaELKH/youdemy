<?php
namespace classes;

use config\DataBaseManager;

class Course {
    private ?DataBaseManager $db;
    private ?int $id_course; 
    private ?string $title; 
    private ?string $description;
    private ?string $picture;
    private ?int $id_teacher;
    private ?int $id_categorie;
    private ?string $status;
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
        ?float $prix = null
    ) {
        $this->db = $db;
        $this->id_course = $id_course;
        $this->title = $title;
        $this->description = $description;
        $this->picture = $picture;
        $this->id_teacher = $id_teacher;
        $this->id_categorie = $id_categorie;
        $this->status = $status;
        $this->archived = $archived;
        $this->prix = $prix;
    }
    public function __get($att) {
        return $this->$att;
    }
    public function __set($att, $value) {
        $this->$att = $value;
    }
    public function add(): bool {
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "picture" => $this->picture,
            "id_teacher" => $this->id_teacher,
            "id_categorie" => $this->id_categorie,
            "status" => self::STATUS_PENDING,
            "prix" => $this->prix
        ];
        return $this->db->insert("courses", $data);
    }
    public function delete(): bool {
        $cond = "id_course";
        $param = $this->id_course;
        return $this->db->delete("courses", $cond, $param);
    }
    public function update(): bool {
        $data = [
            "title" => $this->title,
            "description" => $this->description,
            "picture" => $this->picture,
            "id_teacher" => $this->id_teacher,
            "id_categorie" => $this->id_categorie,
            "prix" => $this->prix,
        ];
        $whereColumn = "id_course";
        $whereValue = $this->id_course;
        return $this->db->update("courses", $data, $whereColumn, $whereValue);
    }
    public function archive(): bool {
        $data = ["archived" => 1];
        $whereColumn = "id_course";
        $whereValue = $this->id_course;
        return $this->db->update("courses", $data, $whereColumn, $whereValue);
    }
    public function approve(string $status): bool {
        if (!in_array($status, [self::STATUS_PENDING, self::STATUS_ACTIVE, self::STATUS_ARCHIVED])) {
            throw new \InvalidArgumentException("Statut invalide.");
        }
        $data = ["status" => $status];
        $whereColumn = "id_course";
        $whereValue = $this->id_course;
        return $this->db->update("courses", $data, $whereColumn, $whereValue);
    }

    public function getAllPending(): array {
        $params = [
            "status" => self::STATUS_PENDING,
            "archived" => 0
        ];
        return $this->db->selectBy("viewcourses", $params);
    }

    public function getAll(): array {
        return $this->db->selectAll("viewcourses");
    }

    public function getById(int $id_course): array {
        return $this->db->selectBy("viewcourses", ["id_course" => $id_course]);
    }
}
