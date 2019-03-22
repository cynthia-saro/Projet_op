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
        <h1><?php echo $animal->getLibelle();?></h1>
        <div id="image_detail_animal">
            <img src="images/categories_animaux/<?php echo $animal->getImage();?>">
        </div>
        <p id="description_detail_animal"><?php echo $animal->getDescription();?></p>
    </main>
<?php
require_once("include/footer.inc.php");
