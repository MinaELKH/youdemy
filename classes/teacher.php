<?php
namespace classes;
use config\DataBaseManager;

class Teacher extends User
{
    private DataBaseManager $dbManager;
    private bool $approved;

    public function __construct(
        DataBaseManager $dbManager ,
        int $id_user,
        ?string $name_full,
        ?string $email,
        string $role,
        ?string $avatar = null,
        bool $approved // L'attribut approved doit être un booléen
    ) {
        parent::__construct($id_user, $name_full, $email, $role, $avatar);  // Corriger l'appel du constructeur parent
        $this->dbManager = $dbManager; // Initialisation de dbManager
        $this->approved = $approved;
    }


    public function __get($att) {
        return $this->$att;
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
    
    
    // public function getAll():array
    // {
    //     return $this->db->selectAll("users") ;
    // }
    
    
    
    
    public function getAll(): array {
        $results = $this->db->selectAll("users");
        $users = [];
    
        if ($results) {
            foreach ($results as $result) {
                $users[] = new user(null, $result->id_user, $result->name, $result->description, $result->archived);
            }
        }
    
        return $users;
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
