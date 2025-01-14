<?php
namespace classes;
use config\DataBaseManager;
use Exception ;
class Teacher extends User
{
    private ?DataBaseManager $db;
    private int $approved;
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
        int  $approved = 0 
    ) {
        parent::__construct($id_user, $name_full, $email, $role, $avatar); 
        $this->db = $db; 
        $this->suspended = $suspended;
        $this->archived = $archived;
        $this->approved = $approved  ;
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

    // public function getAll():array
    // {
    //     return $this->db->selectAll("users") ;
    // }
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
                $result->approved);
            }
        }
        return $teachers ;
    }


    public function getAll_Pending(): array {
        $params = ["approved"=>0] ;
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

    



    // Appeler la fonction d'ajout de cours depuis la classe Course
    public function addCourse(string $title, string $description, string $content, array $tags, int $categoryId, float $price): bool
    {
        if ($this->approved) {
            $course = new Course($this->dbManager, $title, $description, $content, $tags, $categoryId, $price, $this->id_user); // Utilisation de id_user
            return $course->addCourse();
        }
        return false; // L'enseignant n'est pas approuvé
    }

    // Fonction pour mettre à jour l'état d'approbation de l'enseignant
    public function setApproval(bool $status): void
    {
        $this->approved = $status;
    }

    // Fonction pour accéder aux statistiques
    public function getStatistics(): array
    {
        $totalCourses = $this->dbManager->selectBy('courses', ['id_teacher' => $this->id_user]);
        $query = "SELECT COUNT(DISTINCT course_registrations.student_id) AS total_students 
                  FROM course_registrations
                  INNER JOIN courses ON course_registrations.course_id = courses.id_course
                  WHERE courses.id_teacher = :teacherId";
        $stmt = $this->dbManager->getConnection()->prepare($query);
        $stmt->bindValue(':teacherId', $this->id_user, \PDO::PARAM_INT);  // Utilisation de id_user
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return [
            'totalCourses' => count($totalCourses),
            'totalStudents' => $result['total_students'] ?? 0,
        ];
    }


}
