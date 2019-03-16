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
$id_profil=$_GET['idProfil'];
$commentaire=$_POST['commentaire'];

$sql="INSERT INTO user_comments(idUserAuthor,idUserReceiver,content,dateCreated) VALUES(:idUserAuthor,:idUserReceiver,:content,NOW())";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':idUserAuthor',$_SESSION['id']);
$stmt->bindValue(':idUserReceiver',$id_profil);
$stmt->bindValue(':content',$commentaire);
$stmt->execute();
header('Location:../profil.php?id='.$id_profil);
