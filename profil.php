<?php 
$titre="Espace profil";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);
$utilisateur=$utilisateurManager->getUtilisateur($_GET['id']);
?>
<main>
<?php print_r($utilisateur);?>
    <h1><?php echo $utilisateur->getLastName().' '.$utilisateur->getFirstName();?></h1>
</main>
<?php
require_once("include/footer.inc.php");
?>