<?php

class ForumSection{
    private $id;
    private $title;
    private $description;
    private $estPossibleCreerTopic;

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
                case 'title':
                    $this->setTitle($valeur);
                    break;
                case 'description':
                    $this->setDescription($valeur);
                    break;
                case 'estPossibleCreerTopic':
                    $this->setEstPossibleCreerTopic($valeur);
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

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getEstPossibleCreerTopic()
    {
        return $this->estPossibleCreerTopic;
    }

    public function setEstPossibleCreerTopic($estPossibleCreerTopic)
    {
        $this->estPossibleCreerTopic = $estPossibleCreerTopic;
    }



    

}