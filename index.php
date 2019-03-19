<?php 
$titre="Accueil";
require_once("include/header.inc.php");
$dbo=new Mypdo();
?>
<main>
    <?php //Liste des commentaires récents ?>
    <?php
    $sql="SELECT uc.id,idUserAuthor,content,dateCreated,last_name,first_name,image_profil
            FROM users u
            INNER JOIN user_comments uc
            ON u.id=uc.idUserAuthor
            ORDER BY dateCreated DESC
            LIMIT 15";
    $stmt = $dbo->prepare($sql);
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
</main>
<?php
require_once("include/footer.inc.php");
?>