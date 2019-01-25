<?php 
$titre="Espace d'inscription";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$last_name='';
$first_name='';
$username='';
$email='';

$erreurLastName='';
$erreurFirstName='';
$erreurUsername='';
$erreurEmail='';
$erreurPassword='';
$erreurPasswordBis='';

if($_POST){
    $last_name=$_POST['last_name'];
    $first_name=$_POST['first_name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password_bis=$_POST['password_bis'];
    
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
        $utilisateurManager->add($last_name, $first_name, $username, $email, $password);
        $_SESSION['id'] = $db->lastInsertId();
        header('Location:index.php');
    }
}
?>
<main>
    <form action="inscription.php" method="post">
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
            <label for="password">Mot de passe : </label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            <div class="erreurs_formulaires"><?php echo $erreurPassword;?></div>
        </div>
        
        <div>
            <label for="password_bis">Confirmer le mot de passe : </label>
            <input id="password_bis" type="password" name="password_bis" placeholder="Confirmer mot de passe" required>
            <div class="erreurs_formulaires"><?php echo $erreurPasswordBis;?></div>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</main>
<?php
require_once("include/footer.inc.php");
?>