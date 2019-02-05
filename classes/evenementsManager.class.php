<?php

class evenementsManager
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($id_user,$event_name,$date_start,$hour_start,$date_end,$hour_end,$zip_code,$city,$street,$description,$limited_number_participants,$picture){
        $sql='INSERT INTO events(id_user,name,date_start,hour_start,date_end,hour_end,zip_code,name_city,street_address,description,limited_number_participant,date_created,picture,is_published)
            VALUES(:id_user,:name,:date_start,:hour_start,:date_end,:hour_end,:zip_code,:name_city,:street_address,:description,:limited_number_participant,NOW(),:picture,0)';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':id_user',$id_user);
        $requete->bindValue(':name',$event_name);
        $requete->bindValue(':date_start',$date_start);
        $requete->bindValue(':hour_start',$hour_start);
        $requete->bindValue(':date_end',$date_end);
        $requete->bindValue(':hour_end',$hour_end);
        $requete->bindValue(':zip_code',$zip_code);
        $requete->bindValue(':name_city',$city);
        $requete->bindValue(':street_address',$street);
        $requete->bindValue(':description',$description);
        $requete->bindValue(':limited_number_participant',$limited_number_participants);
        $requete->bindValue(':picture',$event_name.' '.basename($picture['name']));
        $requete->execute();
    }

    public function nom_event_deja_pris($event_name){
        $sql="SELECT name FROM events WHERE name=:event_name";
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':event_name',$event_name);
        $requete->execute();
        $event_exist=$requete->fetch();
        if(empty($event_exist)){
            return false;
        }else{
            return true;
        }
    }

    public function getFutureEvents(){
        $arrayEvents=array();
        $sql= "SELECT id, name
	       FROM events
				 WHERE is_published=1
				 AND date_start>=NOW()
				 ORDER BY date_start
				 LIMIT 10";

        $requete=$this->db->prepare($sql);
        $requete->execute();
        while ($event = $requete->fetch(PDO::FETCH_OBJ)) {
            $arrayEvents[] = new evenements($event);
        }
        $requete->closeCursor();
        return $arrayEvents;
    }
}