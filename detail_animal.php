<?php
$titre="Détail animal";
$description="";
include_once('include/header.inc.php');
include_once('classes/categorieManager.class.php');
$pdo=new Mypdo();
$animalManager=new animalManager($pdo);
$animal=$animalManager->getAnimal($_GET['idAnimal']);
?>
    <main>
        <h1>Comment s'occuper d'un <?php echo $animal->getLibelle();?> ?</h1>
        <img src="images/animaux/<?php echo $animal->getImage();?>">
        <p><?php echo $animal->getDescription();?></p>
    </main>
<?php
require_once("include/footer.inc.php");
