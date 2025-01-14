<?php
namespace classes ; 
use config\DataBaseManager ;
use config\Database ;


class Course {
    private ?DataBaseManager $db;
    private ?int $id_Course; 
    private ?string $title; 
    private ?string $description;
    private ?int $archived; 

public function __construct(?DataBaseManager $db , ?int $id_Course=0 , ?string $title=null , ?string $description=null  , ?int $archived=null)
{
    $this->db=$db ; 
    $this->id_Course=$id_Course;
    $this->title = $title ; 
    $this->description = $description ; 
    $this->archived = $archived ;
}

public function __get($att) {
    return $this->$att;
}
public function add():bool{
    $data = [
        "title"=>$this->title ,
        "description"=>$this->description ,
    ] ; 
    return $this->db->insert("Courses" , $data) ;
}
public function delete():bool{
    $cond = "id_Course" ; 
    $param = $this->id_Course ;
    return $this->db->delete("Courses" , $cond , $param) ;
}

public function update():bool{
    $data = [
        "title"=>$this->title , 
        "description"=>$this->description ,
    ] ; 
    $whereColumn = "id_Course" ;
    $whereValue = $this->id_Course ;
    return $this->db->update("Courses" , $data , $whereColumn , $whereValue) ;
}

public function archived():bool{
    $data = [
        "archived"=>1
    ] ; 
    $whereColumn = "id_Course" ;
    $whereValue = $this->id_Course ;
    return $this->db->update("Courses" , $data , $whereColumn , $whereValue) ;
}


// public function getAll():array
// {
//     return $this->db->selectAll("Courses") ;
// }




public function getAll(): array {
    $results = $this->db->selectAll("Courses");
    $Courses = [];

    if ($results) {
        foreach ($results as $result) {
            $Courses[] = new Course(null, $result->id_Course, $result->title, $result->description, $result->archived);
        }
    }

    return $Courses;
}

}