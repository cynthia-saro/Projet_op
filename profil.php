<?php
$titre="Espace profil";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();
$utilisateurManager=new UtilisateurManager($dbo);
$utilisateur=$utilisateurManager->getUtilisateur($_GET['id']);
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
            <textarea id="textarea_profil" name="commentaire" placeholder="Ecrire un commentaire ..." required></textarea>
            <button type="submit">Envoyer</button>
        </form>

        <?php //Liste des commentaires de ce profil ?>
        <?php
        $sql="SELECT uc.id,idUserAuthor,content,dateCreated,last_name,first_name,image_profil
            FROM users u
            INNER JOIN user_comments uc
            ON u.id=uc.idUserAuthor
            WHERE idUserReceiver=:idProfil
            ORDER BY dateCreated DESC";
        $stmt = $dbo->prepare($sql);
        $stmt->bindValue(":idProfil",$_GET['id']);
        $stmt->execute();
        $comments = $stmt -> fetchAll();
        foreach($comments as $comment){ ?>
            <?php //Récupérer nombre des j'aime du commentaire
            $sql="SELECT COUNT(*) AS nb_likes
                    FROM user_aime_comments
                    WHERE idComment=:idCommentaire";
            $stmt = $dbo->prepare($sql);
            $stmt->bindValue(":idCommentaire",$comment->id);
            $stmt->execute();
            $likes = $stmt -> fetch();
            ?>
            <div class="bloc_commentaire_profil">
                <div onclick="location.href = 'profil.php?id=<?php echo $comment->idUserAuthor;?>'" class="cadre_photo_profil_commentaire">
                    <?php echo '<img src="images/utilisateurs/'.$comment->image_profil.'">';?>
                </div>
                <div class="commentaire_profil">
                    <?php echo $comment->content;?>
                </div>
                <div class="commentaire_date">
                    <?php echo 'Message posté le '.utf8_encode(strftime('%A %d %B',strtotime($comment->dateCreated))).' par : '.$comment->first_name.' '.strtoupper($comment->last_name);?>
                </div>
                <?php
                //savoir si l'utilisateur aime déjà le poste
                $sql="SELECT idUser,idComment FROM user_aime_comments
                      WHERE idUser=:idUser AND idComment=:idComment";
                $stmt = $dbo->prepare($sql);
                $stmt->bindValue(":idUser",$_SESSION['id']);
                $stmt->bindValue(":idComment",$comment->id);
                $stmt->execute();
                $aLike = $stmt -> fetch();
                if(empty($aLike)) {
                    ?>
                    <div data-id-commentaire="<?php echo $comment->id; ?>" data-like="false" data-total-like="<?php echo $likes->nb_likes;?>" class="cadre_like">
                        <div class="icon_like"><img src="images/like_icon.png"></div>
                        <div class="like">J'aime (<?php echo $likes->nb_likes;?>)</div>
                    </div>
                    <?php
                }else {
                    ?>
                    <div data-id-commentaire="<?php echo $comment->id; ?>" data-like="true" data-total-like="<?php echo $likes->nb_likes;?>" class="cadre_like cadre_liked">
                        <div class="icon_like"><img src="images/like_icon.png"></div>
                        <div class="like"><b>J'aime</b> (<?php echo $likes->nb_likes;?>)</div>
                    </div>
                    <?php
                }
                ?>
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
        <?php
        $sql="SELECT * FROM animal_photo a1
      JOIN animal_proprietaire a2
      ON a1.idAnimal=a2.id
      WHERE idProprietaire=:id
      GROUP BY id";
        $stmt = $dbo->prepare($sql);
        $stmt->bindValue(":id",$_GET['id']);
        $stmt->execute();
        $photos = $stmt -> fetchAll();
        ?>
      <?php foreach ($photos as $photo){
        ?> <div onclick="location.href='post.php?id=<?php echo $photo->id?>'" class="post">

            <img src="images/animaux/<?php echo $photo->id."_".$photo->photo?>">
            <div class="informations_animal">
              <div class="nom_animal"><?php echo $photo->nom ?></div>
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
