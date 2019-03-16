<?php
$titre="Liste utilisateurs";
$description="";
include_once('include/header.inc.php');
include_once('classes/UtilisateurManager.class.php');
$pdo=new Mypdo();
$userManager=new UtilisateurManager($pdo);
$users=$userManager->getAllUsers();
?>
<div class="cadre_liste_user">
<?php
foreach($users as $user){ ?>
    <div class="cadre_user" data-id="<?php echo $user->getId();?>">
        <img src="images/utilisateurs/<?php echo $user->getId().'_'.$user->getImageProfil();?>">
        <div class="cadre_nom_prenom">
            <?php echo strtoupper ($user->getLastName()).' '.$user->getFirstName();?>
        </div>
    </div>
<?php
}
?>
</div>


<?php
require_once("include/footer.inc.php");
?>