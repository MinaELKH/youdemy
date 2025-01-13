<?php
namespace classes ;
use config\DataBaseManager ;
use config\Database ;


class Categorie {
private DataBaseManager $db ;
private int $id_categorie ; 
private  string $name  ; 
private  int $archive ; 

public function __construct($db , $id_categorie , $name , $archive)
{
    $this->db=$db ; 
    $this->id_categorie=$id_categorie;
    $this->name = $name ; 
    $this->archive = $archive ;
}

public function addCategorie():bool{
    $data = [
        "id_categorie" => $this->id_categorie ,
        "name"=>$this->name
    ] ; 
    return $this->db->insert("categories" , $data) ;
}
public function deleteCategorie():bool{
    $cond = "id_categorie" ; 
    $param = $this->id_categorie ;
    return $this->db->delete("categories" , $cond , $param) ;
}

public function updateCategorie():bool{
    $data = [
        "name"=>$this->name
    ] ; 
    $whereColumn = "id_categorie" ;
    $whereValue = $this->id_categorie ;
    return $this->db->update("categories" , $data , $whereColumn , $whereValue) ;
}

public function archiveCategorie():bool{
    $data = [
        "archive"=>1
    ] ; 
    $whereColumn = "id_categorie" ;
    $whereValue = $this->id_categorie ;
    return $this->db->update("categories" , $data , $whereColumn , $whereValue) ;
}


public function getAll():bool
{

    return $this->db->selectAll("categories") ;
}


}