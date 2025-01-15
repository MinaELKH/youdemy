<?php
namespace classes;
use config\DataBaseManager;
use Exception ;
class student extends Member
{

    
    public function __construct(
        ?DataBaseManager $db ,
        ?int $id_user = null,
        ?string $name_full = null, 
        ?string $email= null ,
        ?string $role = 'student',
        ?string $avatar = null,
        int $suspended = 0,
        int $archived = 0,
      
    ) {
        parent::__construct($db , $id_user, $name_full, $email, $role, $avatar ,$suspended , $archived ); 
    }
    // public function getAll():array
    // {
    //     return $this->db->selectAll("users") ;
    // }
    public function getAll(): array {
        $param=[
            "id_role" => Role::get_IdRole_ByName($this->role) ,
            "archived" => 0
        ] ;
        $results = $this->db->selectBy("users" , $param);
        $students = [];
        if ($results) {
            foreach ($results as $result) {
                                   // `u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`name_full` AS `name_full`,`u`.`avatar` AS `avatar`,`u`.`id_role` AS `id_role`,`u`.`created_at` AS `created_at`,`u`.`archived` AS `archived`,`u`.`suspended` AS `suspended`,`t`.`approved` AS `approved`,`t`.`message` AS `message`
                $students[] = new student
                (null,
                 $result->id_user,
                $result->name_full, 
                $result->email,  
                'student' , 
                $result->avatar, 
                $result->suspended , 
                $result->archived
                 );
            }
        }
        return $students ;
    }


    

    



    // Appeler la fonction d'ajout de cours depuis la classe Course
   
    public function getStatistics(): array
    {
        $totalCourses = $this->dbManager->selectBy('courses', ['id_student' => $this->id_user]);
        $query = "SELECT COUNT(DISTINCT course_registrations.student_id) AS total_students 
                  FROM course_registrations
                  INNER JOIN courses ON course_registrations.course_id = courses.id_course
                  WHERE courses.id_student = :studentId";
        $stmt = $this->dbManager->getConnection()->prepare($query);
        $stmt->bindValue(':studentId', $this->id_user, \PDO::PARAM_INT);  // Utilisation de id_user
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return [
            'totalCourses' => count($totalCourses),
            'totalStudents' => $result['total_students'] ?? 0,
        ];
    }


}
