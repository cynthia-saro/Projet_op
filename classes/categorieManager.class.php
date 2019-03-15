<?php

class categorieManager{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCategoriesAnimaux(){
        $arrayCategories=array();
        $sql='SELECT * 
        FROM categories
        ORDER BY libelle
        ';
        $requete=$this->db->prepare($sql);
        $requete->execute();

        while ($categorie = $requete->fetch(PDO::FETCH_OBJ)) {
            $arrayCategories[] = new Categorie($categorie);
        }
        $requete->closeCursor();
        return $arrayCategories;
    }

    public function getNomCategorieAnimauxById($id){
        $sql='SELECT * FROM categories WHERE id=:id';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':id',$id);
        $requete->execute();
        $categorie=$requete->fetch(PDO::FETCH_OBJ);
        $categorie=new categorie($categorie);
        return $categorie;
    }
}