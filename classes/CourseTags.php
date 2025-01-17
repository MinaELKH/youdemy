<?php
namespace Classes;
use config\DataBaseManager ;
use PDO ;

class CourseTags
{
    private DatabaseManager $dbManager;
    private ?int $id_course;
    private ?int $id_tag;
    private ?string $archive;

    public function __construct(
        DatabaseManager $dbManager,
        ?int $id_course = null,
        ?int $id_tag = null,
        ?string $archive = '0'
    ) {
        $this->dbManager = $dbManager;
        $this->id_course = $id_course;
        $this->id_tag = $id_tag;
        $this->archive = $archive;
    }

    public function linkTagToArticle(): bool
    {
        $data = [
            'id_course' => $this->id_course,
            'id_tag' => $this->id_tag,
            'archive' => $this->archive,
        ];
        return $this->dbManager->insert('article_tags', $data);
    }


// &ffiche les tag dans l article
    public function getTagsByCourse(): array
    {
       $query = "select t.id_tag ,name_tag from tags t 
                 inner join Coursetags  a on a.id_tag = t.id_tag
                 where id_course = :id_course " ;
       $db = $this->dbManager->getConnection();
       $stmt=  $db->prepare($query);
       $stmt->bindParam(":id_course" , $this->id_course , PDO::PARAM_INT) ;
    //    var_dump($stmt->execute());
    //    die();
       if($stmt->execute()){
             return $stmt->fetchAll(PDO::FETCH_OBJ) ; 
       }else {

             return false ; 
       }
       
    }
}
