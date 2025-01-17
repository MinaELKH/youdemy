<?php
namespace classes;

use config\DataBaseManager;

abstract class AbstractContent {
    protected ?DataBaseManager $db;
    protected ?int $id_content;
    protected ?int $id_course;
    protected ?string $title;
    protected ?string $type;

    public function __construct(
        ?DataBaseManager $db,
        ?int $id_content = null,
        ?int $id_course = null,
        ?string $title = null,
        ?string $type = null
    ) {
        $this->db = $db;
        $this->id_content = $id_content;
        $this->id_course = $id_course;
        $this->title = $title;
        $this->type = $type;
    }

    // Méthodes abstraites 
    abstract public function add(): bool;
    abstract public function update(): bool;
    abstract public function delete(): bool;
    abstract public function getById(): ?object;
    abstract public function getByIdCourse(): ?object;

    // Getters génériques

    public function __get($att) {
        return $this->$att;
    }

    public function __set($att , $value): void {
        $this->$att = $value;
    }


    public function getId(): ?int {
        return $this->id_content;
    }

    public function getCourseId(): ?int {
        return $this->id_course;
    }

    // Setters avec chaînage
    public function setTitle(?string $title): self {
        $this->title = $title;
        return $this;
    }

    public function setCourseId(?int $id_course): self {
        $this->id_course = $id_course;
        return $this;
    }


    // public  static function getAllByCourse($db): array {
    //     try {
    //         $query = "SELECT * FROM content WHERE id_course = ?";
    //         $stmt = $this->db->getConnection()->prepare($query);
    //         $stmt->execute([$this->id_course]);
    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
            
    //         return [];
    //     }
    // }
}
