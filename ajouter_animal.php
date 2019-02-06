<?php
$titre="Ajouter animal";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();

if($_POST){
    $animalProprietaireManager = new animalProprietaireManager($dbo);
    $nom=$_POST['nom_animal'];
    $description=$_POST['description_animal'];
    $animalProprietaireManager->add($_SESSION['id'],$nom,$description);

    $idAnimal=$dbo->lastInsertId();

    $animalPhotoManager=new animalPhotoManager($dbo);
    foreach ($_FILES['photos_animal']['name'] as $f => $name) {
        $animalPhotoManager->add($idAnimal,$_FILES['photos_animal']['name'][$f]);
        move_uploaded_file($_FILES["photos_animal"]["tmp_name"][$f], 'images/animaux/'.$idAnimal.'_'.basename($_FILES['photos_animal']['name'][$f]));
    }
    $id=$_SESSION['id'];
    header("Location:profil.php?id=$id");
}
?>
    <main>
        <form action="ajouter_animal.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="nom_animal">Nom animal</label>
                <input type="text" id="nom_animal" name="nom_animal" required>
            </div>
            <div>
                <label for="description_animal">Description de l'animal</label>
                <textarea id="description_animal" name="description_animal" required></textarea>
            </div>
            <div>
                <input type="file" name="photos_animal[]" multiple="multiple" required>
            </div>
            <button type="submit">Ajouter</button>
        </form>
    </main>
<?php
require_once("include/footer.inc.php");
?>