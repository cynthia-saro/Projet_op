<?php

class animalPhoto
{
    private $idAnimal;
    private $photo;

    public function __construct($valeurs = array()){
        if (!empty($valeurs)) {
            $this->affecte($valeurs);
        }
    }

    public function affecte($donnee){
        foreach ($donnee as $attribut => $valeur) {
            switch ($attribut) {
                case 'idAniaml':
                    $this->setIdAnimal($valeur);
                    break;
                case 'photo':
                    $this->setPhoto($valeur);
                    break;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    /**
     * @param mixed $idAnimal
     */
    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


}