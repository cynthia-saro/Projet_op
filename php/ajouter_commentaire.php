<?php
session_start();
if(empty($_SESSION['id'])){
    header('Location:../index.php');
    exit();
}
require_once("../include/config.inc.php");
require_once("../include/autoLoad.inc.php");
include_once('../classes/Mypdo.class.php');
$dbo =new Mypdo();
$id_event=$_POST['bouton_event'];
$commentaire=$_POST['commentaire'];

$sql="INSERT INTO events_comments(id_event,id_user,body,date_created) VALUES(:id_event,:id_user,:body,NOW())";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_event',$id_event);
$stmt->bindValue(':id_user',$_SESSION['id']);
$stmt->bindValue(':body',$commentaire);
$stmt->execute();
header('Location:../event_detail.php?id='.$id_event);
