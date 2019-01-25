<?php

class ForumMessage
{
    private $id;
    private $idTopic;
    private $idUser;
    private $message;
    private $dateCreated;

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
                case 'idTopic':
                    $this->setIdTopic($valeur);
                    break;
                case 'idUser':
                    $this->setIdUser($valeur);
                    break;
                case 'message':
                    $this->setMessage($valeur);
                    break;
                case 'dateCreated':
                    $this->setDateCreated($valeur);
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

    public function getIdTopic()
    {
        return $this->idTopic;
    }

    public function setIdTopic($idTopic)
    {
        $this->idTopic = $idTopic;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

}