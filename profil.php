<?php 
$titre="Espace profil";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);
$utilisateur=$utilisateurManager->getUtilisateur($_GET['id']);
?>
<main>
    <div id="bloc_profil_utilisateur">
        <div id="image_utilisateur_profil"><img src="images/utilisateurs/<?php echo $utilisateur->getId().'_'.$utilisateur->getImageProfil();?>"></div>
        <div id="informations_utilisateur">
            <h1><?php echo $utilisateur->getLastName().' '.$utilisateur->getFirstName();?></h1>
            <div id="liste_informations_utilisateur">
                <div><i class="far fa-user"></i><span class="liste_info_user"><?php echo $utilisateur->getUsername();?></span></div>
                <div><i class="far fa-envelope"></i><span class="liste_info_user"><?php echo $utilisateur->getEmail();?></span></div>
                <div><i class="fas fa-birthday-cake"></i><span class="liste_info_user"><?php echo utf8_encode(strftime('%A %d %B %Y',strtotime($utilisateur->getDateBirthday())));?></span></div>
            </div>
        </div>
    </div>
</main>
<?php
require_once("include/footer.inc.php");
?>