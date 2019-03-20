<?php

class Utilisateur {

    private $id;
    private $last_name;
    private $first_name;
    private $username;
    private $email;
    private $password;
    private $image_profil;
    private $date_created;

    public function __construct($valeurs = array()) {
        if (! empty($valeurs)) {
            $this->affecte($valeurs);
        }
    }

    public function affecte($donnee) {
        foreach ($donnee as $attribut => $valeur) {
            switch ($attribut) {
                case 'id':
                    $this->setId($valeur);
                    break;
                case 'last_name':
                    $this->setLastName($valeur);
                    break;
                case 'first_name':
                    $this->setFirstName($valeur);
                    break;
                case 'username':
                    $this->setUsername($valeur);
                    break;
                case 'email':
                    $this->setEmail($valeur);
                    break;
                case 'password':
                    $this->setPassword($valeur);
                    break;
                case 'image_profil':
                    $this->setImageProfil($valeur);
                    break;
                case 'date_created':
                    $this->setDateCreated($valeur);
                    break;
            }
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getLastName(){
        return $this->last_name;
    }
    
    public function setLastName($last_name){
        $this->last_name=$last_name;
    }
    
    public function getFirstName(){
        return $this->first_name;
    }
    
    public function setFirstName($first_name){
        $this->first_name=$first_name;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username){
        $this->username=$username;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($password){
        $this->password=$password;
    }

    public function getImageProfil()
    {
        return $this->image_profil;
    }

    public function setImageProfil($image_profil)
    {
        $this->image_profil = $image_profil;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }


}
?>
