<?php
$titre= "";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);

/*info animal*/
$sql="SELECT u.id,a.id as idAnimal,u.image_profil,u.first_name,u.last_name,nom,description
      FROM animal_proprietaire a 
      JOIN users u 
      ON a.idProprietaire=u.id
      WHERE a.id=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['id']);
$stmt->execute();
$animal = $stmt -> fetch();

/*on cherche les photo de l'animal*/
$sql="SELECT id,idAnimal,photo
      FROM animal_photo
      WHERE idAnimal=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['id']);
$stmt->execute();
$animalphotos = $stmt -> fetchAll();
?>
<main data-id-animal="<?php echo $animal->idAnimal;?>">
    <div id="cadre_page_posts">
        <div onclick="location.href = 'profil.php?id=<?php echo $animal->id;?>'" class="cadre_photo_profil_commentaire cadre_posts">
            <?php echo '<img src="images/utilisateurs/'.$animal->image_profil.'">';?>
        </div>
        <h1><?php echo $animal->nom;?>, animal de <?php echo $animal->first_name.' '.strtoupper($animal->last_name);?></h1>
    </div>
    <p class="description_animal"><?php echo $animal->description;?></p>
    <?php
    if($_SESSION['id']===$animal->id) {
        ?>
        <button onclick="location.href='ajouter_photo_animal.php?id=<?php echo $animal->idAnimal; ?>'">Ajouter des
            photos de <?php echo $animal->nom; ?></button>
        <?php
    }
    ?>
    <div id="images_animal_user">

      <?php foreach ($animalphotos as $photo){
        ?>
          <div class="animal_photos_liste">
              <img data-id="<?php echo $photo->id?>" class="image_animal_post" src="images/animaux/<?php echo $_GET['id']."_".$photo->photo?>">
          </div>
        <?php } ?>
    </div>
</main>
<?php
require_once("include/footer.inc.php");
?>
