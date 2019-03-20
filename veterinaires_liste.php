<?php
$titre="Espace profil";
require_once("include/header.inc.php");
require_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$sql="SELECT * FROM veterinaires";
$stmt=$dbo->prepare($sql);
$stmt->execute();
$veterinaires=$stmt->fetchAll();
?>
    <main>
        <h1> Les vétérinaires </h1>
        <div id="liste_veto">

        <?php
        foreach($veterinaires as $veterinaire){ ?>
            <ul class="coordonnee">
                <li><p>Vétérinaire :</p><p class="donnee"><?php echo $veterinaire->prenom.' '.strtoupper($veterinaire->nom);?></p></li>
                <li><p>Ville :</p><p class="donnee"><?php echo $veterinaire->ville;?></p></li>
                <li><p>Spécialité :</p><p class="donnee"><?php echo $veterinaire->specialite;?></p></li>

                <button onclick="location.href='veterinaire_detail.php?id=<?php echo $veterinaire->id;?>'">Contacter</button>
            </ul>
        <?php
        }
        ?>
        </div>
    </main>
<?php
require_once("include/footer.inc.php");
?>