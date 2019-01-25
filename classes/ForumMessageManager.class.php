<?php

class ForumMessageManager{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($idTopic,$idUser,$message){
        $sql='INSERT INTO forum_messages(idTopic,idUser,message,dateCreated) VALUES(:idTopic,:idUser,:message,NOW())';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idTopic',$idTopic);
        $requete->bindValue(':idUser',$idUser);
        $requete->bindValue(':message',$message);
        $requete->execute();
    }

    /*public function getAllMessagesOfTopic($idTopic){
        $arrayMessages=array();
        $sql='SELECT m.id,idTopic,message,dateCreated,idUser,username FROM forum_messages m
              INNER JOIN users u ON u.id=m.idUser WHERE idTopic=:idTopic
              ORDER BY dateCreated ASC';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idTopic',$idTopic);
        $requete->execute();

        while ($message = $requete->fetch(PDO::FETCH_OBJ)) {
            $arrayMessages[] = new ForumMessage($message);
        }
        $requete->closeCursor();
        return $arrayMessages;
    }*/

    public function getAllMessagesOfTopic($idTopic){
        $sql='SELECT m.id,idTopic,message,dateCreated,idUser,username FROM forum_messages m
              INNER JOIN users u ON u.id=m.idUser WHERE idTopic=:idTopic
              ORDER BY dateCreated ASC';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idTopic',$idTopic);
        $requete->execute();

        $arrayMessagesUtilisateurs=$requete->fetchAll();
        $requete->closeCursor();
        return $arrayMessagesUtilisateurs;
    }
}