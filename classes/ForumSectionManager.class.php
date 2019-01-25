<?php

class ForumSectionManager{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSections() {
        $listeSections = array();

        $sql = 'SELECT * FROM forum_sections';
        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($section = $requete->fetch(PDO::FETCH_OBJ)) {
            $listeSections[] = new ForumSection($section);
        }

        $requete->closeCursor();
        return $listeSections;
    }

    public function getSection($id){
        $sql='SELECT * FROM forum_sections WHERE id=:id';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':id',$id);
        $requete->execute();
        $section=$requete->fetch(PDO::FETCH_OBJ);
        $section=new ForumSection($section);
        return $section;
    }
}