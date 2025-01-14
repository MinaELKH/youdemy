<?php
namespace classes ;
use config\DataBaseManager ;
use config\Database ;


class Categorie {
    private ?DataBaseManager $db;
    private ?int $id_categorie; 
    private ?string $name; 
    private ?string $description;
    private ?int $archived; 

public function __construct(?DataBaseManager $db , ?int $id_categorie=0 , ?string $name=null , ?string $description=null  , ?int $archived=null)
{
    $this->db=$db ; 
    $this->id_categorie=$id_categorie;
    $this->name = $name ; 
    $this->description = $description ; 
    $this->archived = $archived ;
}

public function __get($att) {
    return $this->$att;
}
public function add():bool{
    $data = [
        "name"=>$this->name ,
        "description"=>$this->description ,
    ] ; 
    return $this->db->insert("categories" , $data) ;
}
public function delete():bool{
    $cond = "id_categorie" ; 
    $param = $this->id_categorie ;
    return $this->db->delete("categories" , $cond , $param) ;
}

public function update():bool{
    $data = [
        "name"=>$this->name , 
        "description"=>$this->description ,
    ] ; 
    $whereColumn = "id_categorie" ;
    $whereValue = $this->id_categorie ;
    return $this->db->update("categories" , $data , $whereColumn , $whereValue) ;
}

public function archived():bool{
    $data = [
        "archived"=>1
    ] ; 
    $whereColumn = "id_categorie" ;
    $whereValue = $this->id_categorie ;
    return $this->db->update("categories" , $data , $whereColumn , $whereValue) ;
}


// public function getAll():array
// {
//     return $this->db->selectAll("categories") ;
// }




public function getAll(): array {
    $results = $this->db->selectAll("categories");
    $categories = [];

    if ($results) {
        foreach ($results as $result) {
            $categories[] = new Categorie(null, $result->id_categorie, $result->name, $result->description, $result->archived);
        }
    }

    return $categories;
}

}