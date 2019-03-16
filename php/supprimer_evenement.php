<?php
session_start();
require_once("../include/config.inc.php");
require_once("../include/autoLoad.inc.php");
include_once('../classes/Mypdo.class.php');
$dbo=new Mypdo();
$id_event=$_GET['id_event'];
//Récupération du créateur de l'événement
$sql="SELECT u.id FROM users u INNER JOIN events e ON u.id=e.id_user
        WHERE e.id=:id_event";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_event',$id_event);
$stmt->execute();
$createur_evenement=$stmt->fetch();
if($createur_evenement->id===$_SESSION['id']){
    //Suppression de tous les participants de l'événement
    $sql="DELETE FROM events_participants WHERE id_event=:id_event";
    $stmt=$dbo->prepare($sql);
    $stmt->bindValue('id_event',$id_event);
    $stmt->execute();
    
    //Suppression de tous les commentaires liés à l'événement
    $sql="DELETE FROM events_comments WHERE id_event=:id_event";
    $stmt=$dbo->prepare($sql);
    $stmt->bindValue('id_event',$id_event);
    $stmt->execute();
    
    //Suppression de l'événement
    $sql="DELETE FROM events WHERE id=:id_event";
    $stmt=$dbo->prepare($sql);
    $stmt->bindValue('id_event',$id_event);
    $stmt->execute();
    header('Location:../events_liste.php');
    exit();
}else{
    header('Location:../event_detail.php?id='.$id_event);
    exit();
}