<?php
$titre= "";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);

$sql="SELECT * FROM `animal_proprietaire` where id=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['id']);
$stmt->execute();
$info = $stmt -> fetch();

/*on cherche la photo de l'animal
$sql="SELECT photo FROM animal_photo a1
      JOIN animal_proprietaire a2
      ON a1.idAnimal=a2.id
      WHERE idProprietaire=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['idAnimal']);
$stmt->execute();
$info = $stmt -> fetch();*/
?>


<main>
    <div>
      <h2> nom: <?php echo $info->nom ?> </h2>
      <p> description: <?php echo $info->description ?> </p>
    </div>
</main>
<?php
require_once("include/footer.inc.php");
?>
