<?php

class UtilisateurManager {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function add($last_name,$first_name,$username,$email,$password,$image_profil){
        $sql='INSERT INTO users(last_name,first_name,username,email,password,image_profil) VALUES (:last_name,:first_name,:username,:email,:password,:image_profil)';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':last_name',$last_name);
        $requete->bindValue(':first_name',$first_name);
        $requete->bindValue(':username',$username);
        $requete->bindValue(':email',$email);
        $requete->bindValue(':password',$password);
        $requete->bindValue(':image_profil',basename($image_profil['name']));
        $requete->execute();
    }
    
    public function getUtilisateur($id){
        $sql='SELECT * FROM users WHERE id=:id';
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':id',$id);
        $requete->execute();
        $user=$requete->fetch();
        return new Utilisateur($user);
    }

    public function getUtilisateurByEmailAndPassword($email,$password){
        $sql="SELECT id FROM users WHERE email=:email AND password=:password";
        $requete=$this->db->prepare($sql);
        $requete->bindValue(':email',$email);
        $requete->bindValue(':password',$password);
        $requete->execute();
        $user=$requete->fetch();
        return new Utilisateur($user);
    }
    
    /*
    public function selectEvenementsParSemaine($num) {
        $listeEvenement = array();

        $sql = 'SELECT idSemaine, numSemaine, dateSemaine, heureSemaine, contenu, jourSemaine FROM semaine WHERE numSemaine=' . $num;

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($evenement = $requete->fetch(PDO::FETCH_OBJ)) {
            $listeEvenement[] = new Semaine($evenement);
        }

        $requete->closeCursor();
        return $listeEvenement;
    }

    public function add($num, $date, $heure, $contenu, $jour) {
        $requete = $this->db->prepare('INSERT INTO semaine (numSemaine, dateSemaine, heureSemaine, contenu, jourSemaine) VALUES (:num, :dateS, :heure, :contenu, :jour)');
        $requete->bindValue(':num', getNumSemaine($num));
        $requete->bindValue(':dateS', getDateValide($date));
        $requete->bindValue(':heure', getHeureValide($heure));
        $requete->bindValue(':contenu', $contenu);
        $requete->bindValue(':jour', getJourValide($jour));

        $retour = $requete->execute();
        return $retour;
    }
    
    public function update($id,$num, $date, $heure, $contenu, $jour) {

        $requete = $this->db->prepare('UPDATE semaine SET numSemaine=:num,dateSemaine=:date,heureSemaine=:heure,contenu=:contenu,jourSemaine=:jour WHERE idSemaine=:id');
        $requete->bindValue(':id', $id);
        $requete->bindValue(':num', getNumSemaine($num));
        $requete->bindValue(':date', getDateValide($date));
        $requete->bindValue(':heure', getHeureValide($heure));
        $requete->bindValue(':contenu', $contenu);
        $requete->bindValue(':jour', getJourValide($jour));

        $retour = $requete->execute();
        return $retour;
    }
    
    public function delete($id) {
        $requete = $this->db->prepare('DELETE FROM semaine WHERE idSemaine=:id');
        $requete->bindValue(':id', $id);

        $retour = $requete->execute();
        return $retour;
    }
    
    public function selectAll(){
        $listeEvenement = array();

        $sql = 'SELECT idSemaine, numSemaine, dateSemaine, heureSemaine, contenu, jourSemaine FROM semaine';

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($evenement = $requete->fetch(PDO::FETCH_OBJ)) {
            $listeEvenement[] = new Semaine($evenement);
        }

        $requete->closeCursor();
        return $listeEvenement;
    }*/
}
?>
