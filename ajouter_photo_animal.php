<?php
$titre="Ajouter animal";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();

if($_FILES){
    $idAnimal=$_GET['id'];

    $animalPhotoManager=new animalPhotoManager($dbo);
    foreach ($_FILES['photos_animal']['name'] as $f => $name) {
        $animalPhotoManager->add($idAnimal,$_FILES['photos_animal']['name'][$f]);
        move_uploaded_file($_FILES["photos_animal"]["tmp_name"][$f], 'images/animaux/'.$idAnimal.'_'.basename($_FILES['photos_animal']['name'][$f]));
    }
    header("Location:post.php?id=$idAnimal");
}
?>
    <main id="page_ajouter_animal">
        <h1>Ajouter une photo de votre animal</h1>
        <form action="ajouter_photo_animal.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="photos_animal[]" multiple="multiple" required id="gallery-photo-add">
                <div class="gallery"></div>
            </div>
            <button type="submit">Ajouter</button>
        </form>
    </main>
<?php
require_once("include/footer.inc.php");
?>