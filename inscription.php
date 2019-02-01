<?php 
$titre="Espace d'inscription";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$last_name='';
$first_name='';
$username='';
$date_birthday='';
$email='';

$erreurLastName='';
$erreurFirstName='';
$erreurUsername='';
$erreurEmail='';
$erreurDateAnniversaire='';
$erreurPassword='';
$erreurPasswordBis='';
$erreurImageProfil='';

if($_POST){
    $last_name=$_POST['last_name'];
    $first_name=$_POST['first_name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $date_birthday=$_POST['date_birthday'];
    $password=$_POST['password'];
    $password_bis=$_POST['password_bis'];
    $image_profil=$_FILES['image_profil'];
    
    if(strlen($last_name)>255){
        $erreurLastName="La taille du nom de famille est trop grande.";
    }

    if(strlen($last_name)<4){
        $erreurLastName="Le nom de famille doit contenir au minimum 4 caractères.";
    }

    if(strlen($first_name)>255){
        $erreurFirstName="La taille du prénom est trop grande.";
    }

    if(strlen($first_name)<3){
        $erreurFirstName="Le prénom doit contenir au minimum 3 caractères";
    }

    if(strlen($username)>255){
        $erreurUsername="La taille du pseudo est trop grande.";
    }

    if(strlen($username)<5){
        $erreurUsername="Le pseudo doit contenir au minimum 5 caractères.";
    }

    if(strlen($email)>255){
        $erreurEmail="La taille de l'adresse mail est trop grande.";
    }

    if(strlen($password)>100){
        $erreurPassword="La taille du mot de passe est trop grande.";
    }

    if(strlen($password)<6){
        $erreurPassword="Le mot de passe doit contenir au minimum 6 caractères.";
    }

    if($password!=$password_bis) {
        $erreurPasswordBis = "Les mots de passe ne correspondent pas.";
    }

    if(empty($erreurLastName) and empty($erreurFirstName) and empty($erreurUsername) and empty($erreurEmail) and empty($erreurPassword) and empty($erreurPasswordBis)){
        $password=sha1($password);
        $dbo = new Mypdo();
        $utilisateurManager = new UtilisateurManager($dbo);
        $utilisateurManager->add($last_name, $first_name, $username, $email, $date_birthday, $password, $image_profil);
        $_SESSION['id'] = $dbo->lastInsertId();
        $folder='images/utilisateurs/';
        move_uploaded_file($_FILES['image_profil']['tmp_name'],$folder.$_SESSION['id'].'_'.basename($_FILES['image_profil']['name']));
        header('Location:index.php');
    }
}
?>
<main>
    <form action="inscription.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="last_name">Nom : </label>
            <input id="last_name" type="text" name="last_name" value="<?php echo $last_name;?>" placeholder="Nom" required>
            <div class="erreurs_formulaires"><?php echo $erreurLastName;?></div>
        </div>
        
        <div>
            <label for="first_name">Prénom : </label>
            <input id="first_name" type="text" name="first_name" value="<?php echo $first_name;?>" placeholder="Prénom" required>
            <div class="erreurs_formulaires"><?php echo $erreurFirstName;?></div>
        </div>
        
        <div>
            <label for="username">Pseudo : </label>
            <input id="username" type="text" name="username" value="<?php echo $username;?>" placeholder="Pseudo" required>
            <div class="erreurs_formulaires"><?php echo $erreurUsername;?></div>
        </div>
        
        <div>
            <label for="email" >Adresse mail : </label>
            <input id="email" type="email" name="email" value="<?php echo $email;?>" placeholder="Email" required>
            <div class="erreurs_formulaires"><?php echo $erreurEmail;?></div>
        </div>
        
        <div>
            <label for="date_birthday">Date anniversaire : </label>
            <input id="date_birthday" type="date" name="date_birthday" value="<?php echo date('Y-m-d',strtotime($date_birthday));?> placeholder="" required>
            <div class="erreurs_formulaires"><?php echo $erreurDateAnniversaire;?></div>
        </div>
        
        <div>
            <label for="password">Mot de passe : </label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            <div class="erreurs_formulaires"><?php echo $erreurPassword;?></div>
        </div>
        
        <div>
            <label for="password_bis">Confirmer le mot de passe : </label>
            <input id="password_bis" type="password" name="password_bis" placeholder="Confirmer mot de passe" required>
            <div class="erreurs_formulaires"><?php echo $erreurPasswordBis;?></div>
        </div>
        
        <div>
            <label for="image_profil">Image de profil : </label>
            <input type="file" name="image_profil" id="image_profil" accept=".jpg, .jpeg, .png" required>
            <div>Vous pourrez toujours modifier votre image de profil plus tard.</div>
            <!--<div id="liste_images_defaut_profil">
                <img src="images/utilisateurs/image_defaut_utilisateur_01.jpg">
                <img src="images/utilisateurs/image_defaut_utilisateur_02.jpg">
                <img src="images/utilisateurs/image_defaut_utilisateur_03.jpg">
            </div>-->
            <div class="erreurs_formulaires"><?php echo $erreurImageProfil;?></div>
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</main>
<?php
require_once("include/footer.inc.php");
?>