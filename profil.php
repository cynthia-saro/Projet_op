<?php
$titre="Espace profil";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);
$utilisateur=$utilisateurManager->getUtilisateur($_GET['id']);

$sql="SELECT * FROM animal_photo a1
      JOIN animal_proprietaire a2
      ON a1.idAnimal=a2.id
      WHERE idProprietaire=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['id']);
$stmt->execute();
$photos = $stmt -> fetchAll();
?>
<main>
    <div id="bloc_profil_utilisateur">
        <div id="image_utilisateur_profil"><img src="images/utilisateurs/<?php echo $utilisateur->getId().'_'.$utilisateur->getImageProfil();?>"></div>
        <div id="informations_utilisateur">
            <h1><?php echo $utilisateur->getLastName().' '.$utilisateur->getFirstName();?></h1>
            <div id="liste_informations_utilisateur">
                <div><i class="far fa-user"></i><span class="liste_info_user"><?php echo $utilisateur->getUsername();?></span></div>
            </div>
        </div>
    </div>
    <div class="posts">
      <?php foreach ($photos as $photo){
        ?> <div class="post">
            <img src="images/animaux/<?php echo $photo->id."_".$photo->photo?>">
          </div>
        <?php } ?>
    </div>

    <?php
    if(!empty($_SESSION['id'])){
        if($_SESSION['id']===$utilisateur->getId()) { ?>
            <button onclick="location.href = 'ajouter_animal.php'">Ajouter animal</button>
        <?php
        }
    } ?>
</main>
<?php
require_once("include/footer.inc.php");
?>
