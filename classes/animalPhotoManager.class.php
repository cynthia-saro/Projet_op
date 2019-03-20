<?php

class animalPhotoManager
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($idAnimal,$photo){
        $sql='INSERT INTO animal_photo(idAnimal,photo,date) VALUES (:idAnimal,:photo,NOW())';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idAnimal',$idAnimal);
        $requete->bindValue(':photo',$photo);
        $requete->execute();
    }
}