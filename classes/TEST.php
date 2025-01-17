<?php

// require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
// use classes\AbstractContent;
// use classes\ContentVideo;
// use classes\ContentText;
// use config\DataBaseManager ; 

// // Initialiser la connexion à la base de données
// $dbManager = new DataBaseManager();

// // Ajouter un contenu vidéo
// $videoContent = new ContentVideo($dbManager);
// $videoContent->setTitle("JS en testing");
// $videoContent->setDuration(120);
// $videoContent->setCourseId(33);
// $videoContent->setUrl("https://example.com/video.mp4");
// $videoContent->add();

// // Ajouter un contenu texte
// $textContent = new ContentText($dbManager);
// $textContent->setTitle("Chapitre 2- les principe de js");
// $textContent->setCourseId(33) ;
// $textContent->setContent("Ceci est une introduction au cours PHP.");
// $textContent->add();

// // Afficher un contenu (peu importe le type)
// function displayContent(AbstractContent $content) {
//     $details = $content->getById();
//     print_r($details);
// }

// displayContent($videoContent);
// displayContent($textContent);


<?php
namespace classes;
use config\DataBaseManager;
use Exception ;
abstract class Member extends User
{
    private ?DataBaseManager $db;
    private  int $archived ; 
    private  int $suspended ;
    

    public function __construct(
        ?DataBaseManager $db ,
        ?int $id_user = null,
        ?string $name_full = null, 
        ?string $email= null ,
        ?string $role = null,
        ?string $avatar = null,
        int $suspended = 0,
        int $archived = 0,
      
    ) {
        parent::__construct($id_user, $name_full, $email, $role, $avatar); 
        $this->db = $db; 
        $this->suspended = $suspended;
        $this->archived = $archived;
      
    }


    public function __get($att) {
        if (property_exists($this, $att)) {
            return $this->$att ?? null;
        }
        throw new Exception("Undefined property: " . $att);
    }

    public function delete():bool{
        $cond = "id_user" ; 
        $param = $this->id_user ;
        return $this->db->delete("users" , $cond , $param) ;
    }  
    public function archived():bool{
        $data = [
            "archived"=>1
        ] ; 
        $whereColumn = "id_user" ;
        $whereValue = $this->id_user ;
    
        return $this->db->update("users" , $data , $whereColumn , $whereValue) ;
    }

    public function suspended():bool{
        $data = [
            "suspended"=>1
        ] ; 
        $whereColumn = "id_user" ;
        $whereValue = $this->id_user ;
    
        return $this->db->update("users" , $data , $whereColumn , $whereValue) ;
    }

    public function activited():bool{
        $data = [
            "suspended"=>0
        ] ; 
        $whereColumn = "id_user" ;
        $whereValue = $this->id_user ;
    
        return $this->db->update("users" , $data , $whereColumn , $whereValue) ;
    }
  
    abstract public function getAll() ;
   
    abstract function getStatistics();


}


$obj = new Member()