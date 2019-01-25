<?php

class ForumTopic{
    private $id;
    private $idSection;
    private $title;
    private $estClos;

    public function __construct($valeurs = array()) {
        if (! empty($valeurs)) {
            $this->affecte($valeurs);
        }
    }

    public function affecte($donnee){
        foreach ($donnee as $attribut => $valeur) {
            switch ($attribut) {
                case 'id':
                    $this->setId($valeur);
                    break;
                case 'idSection':
                    $this->setIdSection($valeur);
                    break;
                case 'title':
                    $this->setTitle($valeur);
                    break;
                case 'estClos':
                    $this->setEstClos($valeur);
                    break;
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdSection(){
        return $this->idSection;
    }

    public function setIdSection($idSection){
        $this->idSection = $idSection;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getEstClos()
    {
        return $this->estClos;
    }

    public function setEstClos($estClos)
    {
        $this->estClos = $estClos;
    }



}