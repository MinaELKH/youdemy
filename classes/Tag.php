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
    private ?string $name_tag;
    private ?string $archive;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_tag = null,
        ?string $name_tag = null,
        ?string $archive = '0'
    ) {
        $this->dbManager = $dbManager;
        $this->id_tag = $id_tag;
        $this->name_tag = $name_tag;
        $this->archive = $archive;
    }

    public static function getAll(DataBaseManager $dbManager): array
    {
        $params = ['archive' => '0'];
        return $dbManager->selectAll('tags', $params);
    }


    public function getTagByname(): ?stdClass
    {
        $query = "SELECT * FROM tags WHERE name_tag = :name_tag AND archived = 0";
        $connection = $this->dbManager->getConnection();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(":name_tag", $this->name_tag, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result ?: null; // Retourne null si aucun tag trouvé
        }
        return null;
    }

    public function add(): bool
    {
        $data = [
            'name_tag' => $this->name_tag,
            'archived' => $this->archive,
        ];
        return $this->dbManager->insert('tags', $data);
    }


    public function __set($name, $value)
    {
        $name  = $value;
    }
}
