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
$idComment=$_POST['idComment'];

$sql="DELETE FROM user_aime_comments WHERE idUser=:id_user AND idComment=:id_comment";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_user',$_SESSION['id']);
$stmt->bindValue(':id_comment',$idComment);
$stmt->execute();