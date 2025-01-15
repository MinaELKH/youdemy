<?php
namespace classes ; 
use config\DataBaseManager ;
use config\Database ;


class Course {
    private ?DataBaseManager $db;
    private ?int $id_course; 
    private ?string $title; 
    private ?string $description;
    private ?int $archived; 

public function __construct(?DataBaseManager $db , ?int $id_course=0 , ?string $title=null , ?string $description=null  , ?int $archived=null)
{
    $this->db=$db ; 
    $this->id_course=$id_course;
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
    $cond = "id_course" ; 
    $param = $this->id_course ;
    return $this->db->delete("Courses" , $cond , $param) ;
}

public function update():bool{
    $data = [
        "title"=>$this->title , 
        "description"=>$this->description ,
    ] ; 
    $whereColumn = "id_course" ;
    $whereValue = $this->id_course ;
    return $this->db->update("Courses" , $data , $whereColumn , $whereValue) ;
}

public function archived():bool{
    $data = [
        "archived"=>1
    ] ; 
    $whereColumn = "id_course" ;
    $whereValue = $this->id_course ;
    return $this->db->update("Courses" , $data , $whereColumn , $whereValue) ;
}



public function approved($status):bool{
    $data = [
        "status"=>$status
    ] ; 
    $whereColumn = "id_user" ;
    $whereValue = $this->id_user ;
// j ai ajouté un table teacher qui recois la modification de l approuvation 
    return $this->db->update("teachers" , $data , $whereColumn , $whereValue) ;
}
// public function getAll():array
// {
//     return $this->db->selectAll("Courses") ;
// }

public function getAll_Pending(): array {
    $params = ["status"=>'pending' , 
    "archived"=>0] ;
    $teachers = [];
    $results = $this->db->selectBy("viewCourses", $params );
    return $results ;
}


public function getAll(): array {
    return $this->db->selectAll("viewcourses");
}

}