<?php

class animalProprietaireManager
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($idProprietaire,$nom,$description){
        $sql='INSERT INTO animal_proprietaire(idProprietaire,nom,description) VALUES (:id_proprietaire,:nom,:description)';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':id_proprietaire',$idProprietaire);
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':description',$description);
        $requete->execute();
    }

    public function getAllAnimauxProprietaire($idProprietaire){
        $arrayAnimaux=array();
        $sql='SELECT * 
        FROM animal_proprietaire p
        WHERE idProprietaire=:idProprietaire
        ';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idProprietaire',$idProprietaire);
        $requete->execute();

        while ($animal_proprietaire = $requete->fetch(PDO::FETCH_OBJ)) {
            $arrayAnimaux[] = new animalProprietaire($animal_proprietaire);
        }
        $requete->closeCursor();
        return $arrayAnimaux;
    }
}