<?php
namespace classes;
use config\DataBaseManager;
use Exception , PDO;
class Teacher extends Member
{
  
    private ?string $approved;



    public function __construct(
        ?DataBaseManager $db ,
        ?int $id_user = null,
        ?string $name_full = null, 
        ?string $email= null ,
        ?string $role = 'teacher',
        ?string $avatar = null,
        int $suspended = 0,
        int $archived = 0,
        ?string $approved = null
    ) {
        parent::__construct($db , $id_user, $name_full, $email, $role, $avatar ,$suspended , $archived ); 
        $this->approved = $approved  ;
    }
    public function hasStatut(): ?object {
    
        $result = $this->db->selectBy("teachers", ["id_user" => $this->id_user]);
        if (empty($result)) {
            return null; 
        }
        $row = $result[0];
        return (object) $row; 
    }
    public function approved($statut):bool{
        $data = [
            "approved"=>$statut
        ] ; 
        $whereColumn = "id_user" ;
        $whereValue = $this->id_user ;
    // j ai ajouté un table teacher qui recois la modification de l approuvation 
        return $this->db->update("teachers" , $data , $whereColumn , $whereValue) ;
    }
 
    public function getAll(): array {
        $results = $this->db->selectAll("viewteacher");
        $teachers = [];
        if ($results) {
           
            foreach ($results as $result) {
     // `u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`name_full` AS `name_full`,`u`.`avatar` AS `avatar`,`u`.`id_role` AS `id_role`,`u`.`created_at` AS `created_at`,`u`.`archived` AS `archived`,`u`.`suspended` AS `suspended`,`t`.`approved` AS `approved`,`t`.`message` AS `message`
                $teachers[] = new teacher
                (null,
                 $result->id_user,
                $result->name_full, 
                $result->email,  
                'teacher' , 
                $result->avatar, 
                $result->suspended , 
                $result->archived, 
                $result->approved
                ) ;
        }}
        return $teachers ;
    }


    public function getAll_Pending(): array {
        $params = ["approved"=>'pending' , 
        "archived"=>0] ;
        $teachers = [];
        $results = $this->db->selectBy("viewteacher", $params );
        if ($results) {
            foreach ($results as $result) {
                                   // `u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`name_full` AS `name_full`,`u`.`avatar` AS `avatar`,`u`.`id_role` AS `id_role`,`u`.`created_at` AS `created_at`,`u`.`archived` AS `archived`,`u`.`suspended` AS `suspended`,`t`.`approved` AS `approved`,`t`.`message` AS `message`
                $teachers[] = new teacher
                (null,
                 $result->id_user,
                $result->name_full, 
                $result->email,  
                'teacher' , 
                $result->avatar, 
                $result->suspended , 
                $result->archived, 
                $result->approved);
            }
        }
        
        return $teachers ;
    }

    public function getMyCourses(): array {
        return $this->db->selectBy("viewcourses", ["id_teacher" => $this->id_user  , 'archived'=>0]);
    }

    public function getCountCoursesByTeacher(): int  {
        $query = "select count(*) as count_course from courses where id_teacher = :id_teacher" ;
        $dataBase = $this->db ;
        $cnx = $dataBase->getConnection();
        $stmt = $cnx->prepare($query);
        $stmt->bindvalue(':id_teacher' , $this->id_user , PDO::PARAM_INT);
         $stmt->execute();
         $result = $stmt->fetch() ; 

        //  print_r($result['count_course']) ; 
        //  die();
         return $result ;

    }







}
