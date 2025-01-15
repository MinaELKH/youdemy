<?php

namespace classes;

use config\DataBaseManager;
use config\Database;

use stdClass;
use PDO;

class Tag
{
    private DatabaseManager $dbManager;
    private ?int $id_tag;
    private ?string $name_full;
    private ?string $archive;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_tag = null,
        ?string $name_full = null,
        ?string $archive = '0'
    ) {
        $this->dbManager = $dbManager;
        $this->id_tag = $id_tag;
        $this->name_full = $name_full;
        $this->archive = $archive;
    }

    public function getAll(): array
    {
        $params = ['archive' => '0'];
        return $this->dbManager->selectAll('tags', $params);
    }


    public function getTagByname(): ?stdClass
    {
        $query = "SELECT * FROM tags WHERE name_full = :name_full AND archive = 0";
        $connection = $this->dbManager->getConnection();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(":name_full", $this->name_full, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result ?: null; // Retourne null si aucun tag trouvé
        }
        return null;
    }

    public function add(): bool
    {
        $data = [
            'name_full' => $this->name_full,
            'archive' => $this->archive,
        ];
        return $this->dbManager->insert('tags', $data);
    }


    public function __set($name, $value)
    {
        $name  = $value;
    }
}
