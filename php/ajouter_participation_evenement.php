<?php
session_start();
$id=$_GET['id_event'];
if(empty($_SESSION['id'])){
    header('Location:../event_detail.php?id='.$id);
    exit();
}
require_once("../include/config.inc.php");
require_once("../include/autoLoad.inc.php");
include_once('../classes/Mypdo.class.php');
$dbo=new Mypdo();
$sql="INSERT INTO events_participants VALUES(:id_event,:id_user)";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_event',$_GET['id_event']);
$stmt->bindValue(':id_user',$_SESSION['id']);
$stmt->execute();
header('Location:../event_detail.php?id='.$id);