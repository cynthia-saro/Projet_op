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

//Récupérer photo animal + nb likes
$sql="SELECT photo
FROM animal_photo
WHERE id=:id";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id',$id_photo);
$stmt->execute();
$photo=$stmt->fetch();

$sql="SELECT COUNT(*) as nb_likes
FROM user_aime_photo
WHERE idPhoto=:id";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id',$id_photo);
$stmt->execute();
$likes=$stmt->fetch();

$sql="SELECT idPhoto
FROM user_aime_photo
WHERE idUser=:idUser
AND idPhoto=:idPhoto";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':idUser',$_SESSION['id']);
$stmt->bindValue(':idPhoto',$id_photo);
$stmt->execute();
$like=$stmt->fetch();

if(empty($like)){
    $like=false;
}else{
    $like=true;
}

$arrayAllDonnees=array();

$arrayDonnees=array(
    'photo'=>$photo->photo,
    'nb_likes'=>$likes->nb_likes,
    'like'=>$like,
);
array_push($arrayAllDonnees, $arrayDonnees);
$json_data = json_encode($arrayAllDonnees);
file_put_contents('detail_photo_animal.json',$json_data);

//Récupérer les commentaires
$sql="SELECT u.id,image_profil,content
FROM comments_photo c
JOIN users u 
ON u.id=c.idUser
WHERE idPhoto=:id
ORDER BY dateCreated DESC";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id',$id_photo);
$stmt->execute();
$allDonnees=$stmt->fetchAll();
$arrayAllDonnees = array();
$arrayDonnees = array();

foreach($allDonnees as $donnee) {
    $arrayDonnees = array(
        "idUser" => $donnee->id,
        "image_profil" => $donnee->image_profil,
        "content" => $donnee->content,
    );
    array_push($arrayAllDonnees, $arrayDonnees);
}
$json_data = json_encode($arrayAllDonnees);
file_put_contents('commentaires_photo_animal.json',$json_data);