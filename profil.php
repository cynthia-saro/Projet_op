<?php
$titre="Espace profil";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);
$utilisateur=$utilisateurManager->getUtilisateur($_GET['id']);

$sql="SELECT * FROM animal_photo a1
      JOIN animal_proprietaire a2
      ON a1.idAnimal=a2.id
      WHERE idProprietaire=:id";
$stmt = $dbo->prepare($sql);
$stmt->bindValue(":id",$_GET['id']);
$stmt->execute();
$photos = $stmt -> fetchAll();

?>

<main>
    <div id="bloc_profil_utilisateur">
        <div id="image_utilisateur_profil"><img src="images/utilisateurs/<?php echo $utilisateur->getId().'_'.$utilisateur->getImageProfil();?>"></div>
        <div id="informations_utilisateur">
            <h1><?php echo strtoupper ($utilisateur->getLastName()).' '.$utilisateur->getFirstName();?></h1>
            <div id="liste_informations_utilisateur">
                <div><i class="far fa-user"></i><span class="liste_info_user"><?php echo $utilisateur->getUsername();?></span></div>
            </div>
        </div>
    </div>

    <div id="bloc_commentaire">
        <?php //ajouter un commentaire ?>
        <form action="php/ajouter_commentaire_profil.php?idProfil=<?php echo $_GET['id'];?>" method="post">
            <textarea name="commentaire" placeholder="Ecrire un commentaire ..."></textarea>
            <button type="submit">Envoyer</button>
        </form>

        <?php //Liste des commentaires de ce profil ?>
        <?php
        $sql="SELECT idUserAuthor,content,dateCreated,last_name,first_name,image_profil
            FROM users u
            INNER JOIN user_comments uc
            ON u.id=uc.idUserAuthor
            WHERE idUserReceiver=:idProfil";
        $stmt = $dbo->prepare($sql);
        $stmt->bindValue(":idProfil",$_GET['id']);
        $stmt->execute();
        $comments = $stmt -> fetchAll();
        foreach($comments as $comment){ ?>
            <div class="bloc_commentaire_profil">
                <div class="commentaire_profil">
                    <?php echo $comment->content;?>
                </div>
                <div class="commentaire_date">
                    <?php echo 'Message posté le '.utf8_encode(strftime('%A %d %B',strtotime($comment->dateCreated)));?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    if(!empty($_SESSION['id'])){
        if($_SESSION['id']===$utilisateur->getId()) { ?>
            <button onclick="location.href = 'ajouter_animal.php'">Ajouter animal</button>
        <?php
        }
    } ?>


    <div class="posts">
      <?php foreach ($photos as $photo){
        ?> <div class="post">

            <img src="images/animaux/<?php echo $photo->id."_".$photo->photo?>">
            <div class="informations_animal">
              <p> <b>nom:</b> <?php echo $photo->nom ?> </p>
              <p> <b>description:</b> <?php echo $photo->description ?> </p>
              <!--faire une condition pour qu'il s'affiche que quand il y a + d'une photo -> requete sql count()-->
              <a href="post.php?id=<?php echo $photo->id?>">
              <p> voir toutes les photos de <?php echo $photo->nom ?></p>
              </a>
            </div>
          </div>
        <?php } ?>
    </div>
    
    <?php include_once('php/get_events_participate.php') ?>


    <table class="table table-bordered table-striped table_page_profil">

    <tbody>
        <tr>
      <td class="text_titre_events_profil">Événement où je participe</td>
    </tr>

    <?php foreach($events as $event){ ?>
    <tr>
        <td><a href="event_detail.php?id=<?php echo $event->id;?>"><?php echo $event->name; ?></a></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>

    <?php include_once('php/get_events_created.php') ?>


    <table class="table table-bordered table-striped table_page_profil">

    <tbody>
        <tr>
      <td class="text_titre_events_profil">Événement créés</td>
    </tr>

    <?php foreach($events as $event){ ?>
    <tr>
        <td><a href="event_detail.php?id=<?php echo $event->id;?>"><?php echo $event->name; ?></a></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>


</main>
<?php
require_once("include/footer.inc.php");
?>
