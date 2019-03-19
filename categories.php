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
        <h1>Guide informatif sur les animaux</h1>
        <div id="liste_categories_animaux">
            <?php
            foreach($categories as $categorie) {
                ?>
                <div style="cursor:pointer" class="categories_animaux" data-id-categorie="<?php echo $categorie->getId();?>">
                    <img src="images/categories_animaux/<?php echo $categorie->getImage();?>">
                    <div><?php echo $categorie->getLibelle();?></div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>
<?php
require_once("include/footer.inc.php");