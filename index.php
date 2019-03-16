<?php 
$titre="Accueil";
require_once("include/header.inc.php");
$dbo=new Mypdo();
?>
<main>
    <?php //Liste des commentaires récents ?>
    <?php
    $sql="SELECT idUserAuthor,content,dateCreated,last_name,first_name,image_profil
            FROM users u
            INNER JOIN user_comments uc
            ON u.id=uc.idUserAuthor
            ORDER BY dateCreated
            LIMIT 15";
    $stmt = $dbo->prepare($sql);
    $stmt->execute();
    $comments = $stmt -> fetchAll();
    foreach($comments as $comment){ ?>
        <div class="bloc_commentaire_profil">
            <div class="commentaire_profil">
                <?php echo $comment->content;?>
            </div>
            <div class="commentaire_date">
                <?php echo 'Message posté le '.utf8_encode(strftime('%A %d %B',strtotime($comment->dateCreated))).' par : '.$comment->first_name.' '.strtoupper($comment->last_name);?>
            </div>
        </div>
        <?php
    }
    ?>
</main>
<?php
require_once("include/footer.inc.php");
?>