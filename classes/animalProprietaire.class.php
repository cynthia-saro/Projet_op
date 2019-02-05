<?php

class animalProprietaire
{
    private $id;
    private $idProprietaire;
    private $nom;
    private $description;

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
                case 'idProprietaire':
                    $this->setIdProprietaire($valeur);
                    break;
                case 'nom':
                    $this->setNom($valeur);
                    break;
                case 'description':
                    $this->setDescription($valeur);
                    break;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdProprietaire()
    {
        return $this->idProprietaire;
    }

    /**
     * @param mixed $idProprietaire
     */
    public function setIdProprietaire($idProprietaire)
    {
        $this->idProprietaire = $idProprietaire;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}