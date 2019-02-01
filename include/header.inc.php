<?php include_once('head.inc.php');
include_once('components/debuger.php');
include_once('classes/Mypdo.class.php');?>
<header>
    <div id="bloc_header">
        <div id="logo_site">
            <img src="images/logo.png">
            <div id="texte_logo">Minoros</div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="categories.php">Animaux</a></li>
            <li class="nav-item"><a class="nav-link" href="evenements_liste.php">Evenements</a></li>
            <li class="nav-item"><a class="nav-link" href="veterinaires_liste.php">Vétérinaires</a></li>
            <li class="nav-item"><a class="nav-link" href="forum_sections.php">Forum</a></li>
            <?php if(empty($_SESSION['id'])){ ?>
            <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
            <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
            <?php }else{ ?>
            <li class="nav-item"><a class="nav-link" href="profil.php?id=<?php echo $_SESSION['id'];?>">Profil</a></li>
            <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
            <?php } ?>
            <li class="nav-item"><a class="nav-link" href="#debuger" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="debuger">Debuger</a></li>
        </ul>
    </nav>
</header>
