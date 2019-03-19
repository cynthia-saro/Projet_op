<?php include_once('head.inc.php');
include_once('components/debuger.php');
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
?>
<header>
    <div id="bloc_header">
        <div id="logo_site" onclick="location.href = 'index.php'">
            <img src="images/mironos.png">
        </div>
        <?php
        $sql="SELECT first_name,last_name,image_profil
            FROM users
            WHERE id=:idProfil";
        $stmt = $dbo->prepare($sql);
        $stmt->bindValue(":idProfil",$_SESSION['id']);
        $stmt->execute();
        $user = $stmt -> fetch();
        ?>
        <div onclick="location.href = 'profil.php?id=<?php echo $_SESSION['id'];?>'" id="espace_profil">
            <div id="photo_profil">
                <?php echo '<img src="images/utilisateurs/'.$user->image_profil.'">';?>
            </div>
            <div id="nom_prenom">
                <?php echo $user->first_name.' '.strtoupper($user->last_name);?>
            </div>
        </div>
    </div>
    <nav id="nav_principal">
        <ul>
            <li><a class="nav-link" href="index.php">Accueil</a></li>
            <li><a class="nav-link" href="categories.php">Animaux</a></li>
            <li><a class="nav-link" href="events_liste.php">Évènements</a></li>
            <li><a class="nav-link" href="users_liste.php">Utilisateurs</a></li>
            <li><a class="nav-link" href="veterinaires_liste.php">Vétérinaires</a></li>
            <?php if(empty($_SESSION['id'])){ ?>
                <li><a class="nav-link" href="connexion.php">Connexion</a></li>
                <li><a class="nav-link" href="inscription.php">Inscription</a></li>
            <?php }else{ ?>
                <?php /*<li class="nav-item"><a class="nav-link" href="profil.php?id=<?php echo $_SESSION['id'];?>">Profil</a></li>*/?>
                <li><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
            <?php } ?>
            <!--<li class="nav-item"><a class="nav-link" href="#debuger" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="debuger">Debuger</a></li>-->
        </ul>
    </nav>
</header>
