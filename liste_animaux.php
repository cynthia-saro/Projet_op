<?php
$titre="Liste animaux";
$description="";
include_once('include/header.inc.php');
include_once('classes/categorieManager.class.php');
$pdo=new Mypdo();
$animalManager=new animalManager($pdo);
$animaux=$animalManager->getAllAnimauxOfOneCategorie($_GET['idCategorie']);
?>
    <main>
        <div id="liste_animaux">
            <?php
            foreach($animaux as $animal) {
            ?>
            <div style="cursor:pointer" class="animaux"" data-id-animal="<?php echo $animal->getId();?>">
            <img src="images/categories_animaux/<?php echo $animal->getImage();?>">
            <div><?php echo $animal->getLibelle();?></div>
        </div>
        <?php
        }
        ?>
        </div>
    </main>
<?php
require_once("include/footer.inc.php");
