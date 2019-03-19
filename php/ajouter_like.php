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

$sql="INSERT INTO user_aime_comments(idUser,idComment) VALUES(:id_user,:id_comment)";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_user',$_SESSION['id']);
$stmt->bindValue(':id_comment',$idComment);
$stmt->execute();

