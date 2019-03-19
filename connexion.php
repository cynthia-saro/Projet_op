<?php 
$titre="Espace de connexion";
require_once("include/header_connexion_inscription.inc.php");
include_once('classes/UtilisateurManager.class.php');
$email='';
$erreurAdresseMail='';
$erreurMotDePasse='';
$erreurConnexion='';
if($_POST){
    $email=$_POST['email'];
    $password=sha1($_POST['password']);

    if(strlen($email)>255){
        $erreurAdresseMail="La taille de l'adresse mail est trop grande.";
    }

    if(strlen($password)>100){
        $erreurMotDePasse="La taille du mot de passe est trop grande.";
    }

    if(empty($erreurAdresseMail) and empty($erreurMotDePasse)){
        $dbo = new Mypdo();
        $utilisateurManager = new UtilisateurManager($dbo);
        $user = $utilisateurManager->getUtilisateurByEmailAndPassword($email, $password);
        $idUser=$user->getId();
        if(!empty($idUser)){
            $_SESSION['id'] = $idUser;
            header('Location:index.php');
        }else{
            $erreurConnexion="Les informations renseignées sont incorrectes.";
        }
    }
}
?>
<main id="pages_connexion_inscription">
    <div id="bloc_connexion_inscription">
        <div id="liste_image_animaux">
            <div class="image_animal">
                <img src="images/turtle.png">
            </div>
            <div class="image_animal">
                <img src="images/rabbit.png">
            </div>
            <div class="image_animal">
                <img src="images/cat.png">
            </div>
            <div class="image_animal">
                <img src="images/dog.png">
            </div>
            <div class="image_animal">
                <img src="images/horse.png">
            </div>
        </div>
        <div id="texte_connexion_inscription">
            Le premier réseau social destiné aux propriétaires et aux passionnés d'animaux !
        </div>
    </div>
    <div id="bloc_ci">
        <div id="selected"><a href="connexion.php">Connexion</a></div>
        <div id="non_selected"><a href="inscription.php">Inscription</a></div>
    </div>
    <form action="connexion.php" method="post">
        <div>
            <label for="email">Adresse mail</label>
            <input id="email" type="email" name="email" value="<?php echo $email;?>" placeholder="Email" required>
            <div class="erreurs_formulaires"><?php echo $erreurAdresseMail;?></div>
        </div>
        
        <div>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            <div class="erreurs_formulaires"><?php echo $erreurMotDePasse;?></div>
        </div>
        <button type="submit">Se connecter</button>
        <div class="erreurs_formulaires"><?php echo $erreurConnexion;?></div>
    </form>
</main>
<?php/*
include_once('include/footer.inc.php');*/