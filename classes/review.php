<?php
namespace classes;
use config\DatabaseManager;
use stdClass;
use PDO;

class Review
{
    private DatabaseManager $dbManager;
    private ?int $id_review;
    private ?string $comment;
    private ?int $id_course;
    private ?int $id_user;
    private ?string $archived;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_review = null,
        ?string $comment = null,
        ?int $id_course = null,
        ?int $id_user = null,
        ?string $archived = '0'
    ) {
        $this->dbManager = $dbManager;
        $this->id_review = $id_review;
        $this->comment = $comment;
        $this->id_course = $id_course;
        $this->id_user = $id_user;
        $this->archived = $archived;
    }

    public function getAllByArticle($id_course): array
    {
        $params = ['id_course' => $id_course, 'archived' => '0'];
        return $this->dbManager->selectAll('reviews', $params);
    }

    public function add(): bool
    {
        $data = [
            'comment' => $this->comment,
            'id_course' => $this->id_course,
            'id_user' => $this->id_user,
            'archived' => $this->archived,
        ];
        return $this->dbManager->insert('reviews', $data);
    }

    public function delete(): bool
    {
        $query = "delete from reviews
                   where id_review= :id_review  " ; 
        $db= $this->dbManager->getConnection();
        $stmt = $db->prepare($query) ; 
        $stmt->bindValue(":id_review",$this->id_review , PDO::PARAM_INT) ;                      
        // $displayQuery = str_replace(':id_review', $this->id_review, $query);
        // echo($displayQuery);
        // die();
        return     $stmt->execute(); 
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getReviewByCourse()
    {
        $query = "select c.*  , name_full , avatar from reviews c
        inner join users  u on u.id_user = c.id_user
        where id_course = :id_course";
        $connection = $this->dbManager->getConnection();
        $stmt = $connection->prepare($query);
        $stmt->bindparam(":id_course", $this->id_course, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }
}
