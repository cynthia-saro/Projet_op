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
$id_photo=$_POST['id_photo'];
$content=$_POST['content'];

$sql="INSERT INTO comments_photo(idPhoto,idUser,content,dateCreated) VALUES(:idPhoto,:idUser,:content,NOW())";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':idPhoto',$id_photo);
$stmt->bindValue(':idUser',$_SESSION['id']);
$stmt->bindValue(':content',$content);
$stmt->execute();