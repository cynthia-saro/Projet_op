<?php
$titre="Liste vétérinaires";
include_once("include/header.inc.php");
require_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$sql="SELECT * FROM veterinaires
      WHERE id=:id";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id',$_GET['id']);
$stmt->execute();
$veterinaire=$stmt->fetch();
?>
<main id="page_detail_veto">
    <h1>Vétérinaire <?php echo $veterinaire->prenom.' '.strtoupper($veterinaire->nom);?></h1>
    <div id="detail_veto">
        <div id="bloc_gauche_veto">
            <h2 id="specialite">Spécialité : <?php echo $veterinaire->specialite;?></h2>
            <div><?php echo nl2br($veterinaire->description);?></div>
        </div>
        <div id="bloc_droit_veto">
            <div id="contact_veto">
                <div id="telephone"><i class="fas fa-phone"></i><?php echo $veterinaire->telephone;?></div>
                <div id="mail"><i class="fas fa-envelope"></i><?php echo $veterinaire->mail;?></div>
                <div id="ville"><i class="fas fa-city"></i><?php echo $veterinaire->ville.' '.$veterinaire->code_postal;?></div>
                <div id="rue"><i class="fas fa-road"></i><?php echo $veterinaire->rue;?></div>
            </div>
        </div>
    </div>


    <?php
    $sql="SELECT * FROM veterinaires_photos
      WHERE idVeterinaire=:id";
    $stmt=$dbo->prepare($sql);
    $stmt->bindValue(':id',$_GET['id']);
    $stmt->execute();
    $photos=$stmt->fetchAll();
    ?>
    <h2 id="h2_veto">Quelques photos ...</h2>
    <div id="liste_photos_veto">
    <?php
    foreach($photos as $photo){ ?>
        <div class="cadre_photo_veto">
            <img src="images/veterinaires/<?php echo $photo->image;?>">
        </div>
        <?php
    }
    ?>
    </div>
</main>


<?php
require_once("include/footer.inc.php");
?> 