<?php
$titre= "";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);



/*on cherche la photo de l'animal*/
$sql="SELECT *
      FROM animal_photo
      WHERE idAnimal=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['id']);
$stmt->execute();
$animalphotos = $stmt -> fetchAll();

?>


<main>
    <div class="images_animal">

      <?php foreach ($animalphotos as $photo){
        ?>
        <img src="images/animaux/<?php echo $_GET['id']."_".$photo->photo?>">
        <?php } ?>
    </div>
</main>
<?php
require_once("include/footer.inc.php");
?>
