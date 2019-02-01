<?php


class animal
{
    private $id;
    private $id_categorie;
    private $libelle;
    private $description;
    private $image;

    public function __construct($valeurs = array()){
        if (!empty($valeurs)) {
            $this->affecte($valeurs);
        }
    }

    public function affecte($donnee){
        foreach ($donnee as $attribut => $valeur) {
            switch ($attribut) {
                case 'id':
                    $this->setId($valeur);
                    break;
                case 'idCategorie':
                    $this->setIdCategorie($valeur);
                    break;
                case 'libelle':
                    $this->setLibelle($valeur);
                    break;
                case 'description':
                    $this->setDescription($valeur);
                    break;
                case 'image':
                    $this->setImage($valeur);
                    break;
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}