<?php

class ForumTopicManager{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTopicsBySection($idSection){
        $listeTopics = array();

        $sql = 'SELECT * FROM forum_topics WHERE idSection=:idSection';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':idSection',$idSection);
        $requete->execute();

        while ($topic = $requete->fetch(PDO::FETCH_OBJ)) {
            $listeTopics[] = new ForumTopic($topic);
        }

        $requete->closeCursor();
        return $listeTopics;
    }

    public function getTopic($idTopic){
        $sql = 'SELECT * FROM forum_topics WHERE id=:idTopic';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':idTopic',$idTopic);
        $requete->execute();
        $topic=$requete->fetch();
        $topic=new ForumTopic($topic);

        $requete->closeCursor();
        return $topic;
    }

    public function add($idSection,$idUser,$title){
        $sql='INSERT INTO forum_topics(idSection,idUser,title,estClos) VALUES(:idSection,:idUser,:title,0)';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':idSection',$idSection);
        $requete->bindValue(':idUser',$idUser);
        $requete->bindValue(':title',$title);
        $requete->execute();
    }
}