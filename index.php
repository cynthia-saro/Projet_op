<?php 
$titre="Accueil";
require_once("include/header.inc.php");
$dbo=new Mypdo();
?>
<main>
    <div>
        KEKONPEUTMETTREICI?
    </div>
    <?php //Liste des commentaires récents ?>
    <?php
    $sql="SELECT uc.id,idUserAuthor,content,dateCreated,last_name,first_name,image_profil
            FROM users u
            INNER JOIN user_comments uc
            ON u.id=uc.idUserAuthor
            ORDER BY dateCreated DESC
            LIMIT 30";
    $sql="(SELECT uc.id,idUserAuthor,content,last_name,first_name,image_profil,'' as idAnimal,'' as nomAnimal,'' as photo,dateCreated
            FROM users u
            INNER JOIN user_comments uc
            ON u.id=uc.idUserAuthor)
            
            UNION ALL
            
            (SELECT '','','','','','',id,nom,photo,date as dateCreated FROM animal_proprietaire ap 
            JOIN animal_photo ap2
            ON ap.id=ap2.idAnimal)
            ORDER BY dateCreated DESC";
    $stmt = $dbo->prepare($sql);
    $stmt->execute();
    $comments = $stmt -> fetchAll();
    foreach($comments as $comment){ ?>
        <?php
        //PHOTO
        if(!empty($comment->idAnimal)){ ?>
            <div class="bloc_commentaire_image">
                <img src="images/animaux/<?php echo $comment->idAnimal.'_'.$comment->photo;?>">
            </div>
        <?php
        }else {
            //Récupérer nombre des j'aime du commentaire
            $sql = "SELECT COUNT(*) AS nb_likes
                    FROM user_aime_comments
                    WHERE idComment=:idCommentaire";
            $stmt = $dbo->prepare($sql);
            $stmt->bindValue(":idCommentaire", $comment->id);
            $stmt->execute();
            $likes = $stmt->fetch();
            ?>
            <div class="bloc_commentaire_profil">
                <div onclick="location.href = 'profil.php?id=<?php echo $comment->idUserAuthor; ?>'"
                     class="cadre_photo_profil_commentaire">
                    <?php echo '<img src="images/utilisateurs/' . $comment->image_profil . '">'; ?>
                </div>
                <div class="commentaire_profil">
                    <?php echo $comment->content; ?>
                </div>
                <div class="commentaire_date">
                    <?php echo 'Message posté le ' . utf8_encode(strftime('%A %d %B', strtotime($comment->dateCreated))) . ' par ' . $comment->first_name . ' ' . strtoupper($comment->last_name); ?>
                </div>
                <?php
                //savoir si l'utilisateur aime déjà le poste
                $sql = "SELECT idUser,idComment FROM user_aime_comments
                      WHERE idUser=:idUser AND idComment=:idComment";
                $stmt = $dbo->prepare($sql);
                $stmt->bindValue(":idUser", $_SESSION['id']);
                $stmt->bindValue(":idComment", $comment->id);
                $stmt->execute();
                $aLike = $stmt->fetch();
                if (empty($aLike)) {
                    ?>
                    <div data-id-commentaire="<?php echo $comment->id; ?>" data-like="false"
                         data-total-like="<?php echo $likes->nb_likes; ?>" class="cadre_like">
                        <div class="icon_like"><img src="images/like_icon.png"></div>
                        <div class="like">J'aime (<?php echo $likes->nb_likes; ?>)</div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div data-id-commentaire="<?php echo $comment->id; ?>" data-like="true"
                         data-total-like="<?php echo $likes->nb_likes; ?>" class="cadre_like cadre_liked">
                        <div class="icon_like"><img src="images/like_icon.png"></div>
                        <div class="like"><b>J'aime</b> (<?php echo $likes->nb_likes; ?>)</div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
    ?>
</main>
<?php
require_once("include/footer.inc.php");
?>