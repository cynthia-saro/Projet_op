<?php
$titre="Catégories animaux";
$description="";
include_once('include/header.inc.php');
include_once('classes/categorieManager.class.php');
$pdo=new Mypdo();
$categorieManager=new categorieManager($pdo);
$categories=$categorieManager->getAllCategoriesAnimaux();
?>
<main>
    <?php
    foreach($categories as $categorie) {
    ?>
        <div data-id-categorie="<?php echo $categorie->getId();?>">
            <img src="<?php echo $categorie->getImage();?>"> <?php //cover avec l'attribut style sur la div ??? ?>
            <span><?php echo $categorie->getLibelle();?></span>
        </div>
    <?php
    }
    ?>
</main>
<?php
require_once("include/footer.inc.php");
