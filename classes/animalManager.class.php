<?php

class animalManager
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAnimal($id){
        $sql='SELECT * FROM animals WHERE id=:id';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':id',$id);
        $requete->execute();
        $animal=$requete->fetch(PDO::FETCH_OBJ);
        $animal=new Animal($animal);
        return $animal;
    }

    public function getAllAnimauxOfOneCategorie($idCategorie){
        $arrayAnimaux=array();
        $sql='SELECT * 
        FROM animals
        WHERE idCategorie=:idCategorie
        ORDER BY libelle
        ';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idCategorie',$idCategorie);
        $requete->execute();

        while ($animal = $requete->fetch(PDO::FETCH_OBJ)) {
            $arrayAnimaux[] = new Animal($animal);
        }
        $requete->closeCursor();
        return $arrayAnimaux;
    }


}