<?php

class evenements
{
    private $id;
    private $id_user;
    private $name;
    private $date_start;
    private $hour_start;
    private $date_end;
    private $hour_end;
    private $zip_code;
    private $name_city;
    private $street_address;
    private $description;
    private $limited_number_participant;
    private $date_created;
    private $picture;
    private $is_published;

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
                case 'id_user':
                    $this->setIdUser($valeur);
                    break;
                case 'name':
                    $this->setName($valeur);
                    break;
                case 'date_start':
                    $this->setDateStart($valeur);
                    break;
                case 'hour_start':
                    $this->setHourStart($valeur);
                    break;
                case 'date_end':
                    $this->setDateEnd($valeur);
                    break;
                case 'hour_end':
                    $this->setHourEnd($valeur);
                    break;
                case 'zip_code':
                    $this->setZipCode($valeur);
                    break;
                case 'name_city':
                    $this->setNameCity($valeur);
                    break;
                case 'street_address':
                    $this->setStreetAddress($valeur);
                    break;
                case 'description':
                    $this->setDescription($valeur);
                    break;
                case 'limited_number_participant':
                    $this->setLimitedNumberParticipant($valeur);
                    break;
                case 'date_created':
                    $this->setDateCreated($valeur);
                    break;
                case 'picture':
                    $this->setPicture($valeur);
                    break;
                case 'is_published':
                    $this->setIsPublished($valeur);
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
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getHourStart()
    {
        return $this->hour_start;
    }

    /**
     * @param mixed $hour_start
     */
    public function setHourStart($hour_start)
    {
        $this->hour_start = $hour_start;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_end
     */
    public function setDateEnd($date_end)
    {
        $this->date_end = $date_end;
    }

    /**
     * @return mixed
     */
    public function getHourEnd()
    {
        return $this->hour_end;
    }

    /**
     * @param mixed $hour_end
     */
    public function setHourEnd($hour_end)
    {
        $this->hour_end = $hour_end;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @return mixed
     */
    public function getNameCity()
    {
        return $this->name_city;
    }

    /**
     * @param mixed $name_city
     */
    public function setNameCity($name_city)
    {
        $this->name_city = $name_city;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->street_address;
    }

    /**
     * @param mixed $street_address
     */
    public function setStreetAddress($street_address)
    {
        $this->street_address = $street_address;
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

    /**
     * @return mixed
     */
    public function getLimitedNumberParticipant()
    {
        return $this->limited_number_participant;
    }

    /**
     * @param mixed $limited_number_participant
     */
    public function setLimitedNumberParticipant($limited_number_participant)
    {
        $this->limited_number_participant = $limited_number_participant;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getisPublished()
    {
        return $this->is_published;
    }

    /**
     * @param mixed $is_published
     */
    public function setIsPublished($is_published)
    {
        $this->is_published = $is_published;
    }


}