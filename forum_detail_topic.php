<?php
if(empty($_GET['topic'])){
    header('Location:forum_sections.php');
}
$titre="Forum";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
include_once('classes/ForumMessageManager.class.php');
$db=new Mypdo();
$forumMessageManager=new ForumMessageManager($db);
$forumTopicManager=new ForumTopicManager($db);
if($_POST){
    $message=$_POST['message'];
    $forumMessageManager->add($_GET['topic'],$_SESSION['id'],$message);
}
if(empty($_GET['page'])){
   $page=1;
}else{
    $page=$_GET['page'];
}
$messages=$forumMessageManager->getAllMessagesOfTopicByPage($_GET['topic'],$page);
$topic=$forumTopicManager->getTopic($_GET['topic']);
?>
<main id="detail_topic_forum">
    <h1>Topic : <?php echo $topic->getTitle();?></h1>
    <div id="topic_forum">
    <?php foreach($messages as $message) { ?>
        <div class="message_topic_forum">
            <div class="forum_auteur">
                <div class="image_profil_forum">
                    <img src="images/utilisateurs/<?php echo $message->image_profil;?>">
                </div>
                <div class="pseudo_forum"><a href="profil.php?id=<?php echo $message->idUser;?>"><?php echo $message->username;?></a></div>
            </div>
            <div class="forum_message">
                <div class="date_message_forum"><?php echo 'Message posté le '.utf8_encode(strftime('%A %d %B',strtotime($message->dateCreated)));?></div>
                <?php echo nl2br($message->message);?>
            </div>
        </div>
    <?php } ?>
    </div>
    <div id="zone_message">
        <?php if (!empty($_SESSION['id'])){
            if($topic->getEstClos()==0){ ?>
                <form action="forum_detail_topic.php?topic=<?php echo $_GET['topic']; ?>" method="post">
                    <div>
                        <textarea placeholder="Ecrivez votre message ..." name="message"></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
            <?php }else{
                echo 'Topic clos.';
            }
        }else{
            echo 'Vous devez être connectés pour pouvoir poster un message !';
        } ?>
    </div>
    <nav id="numerotation_topic">
        <div>
        <?php
        $nombreMessagesDuTopic=$forumMessageManager->getNombreMessageOfTopic($_GET['topic'])->nombre_message_total;
        $nombrePagesDuTopic=$nombreMessagesDuTopic/20;
        for($i=1;$i<$nombrePagesDuTopic+1;$i++){
            if($i!=$page) {
                echo '<a class="numerotation_page_topic" href="forum_detail_topic.php?topic=' . $_GET["topic"] . '&page=' . $i . '">' . $i . '</a>';
            }else{
                echo '<a class="numerotation_page_topic" style="font-weight:bold" href="forum_detail_topic.php?topic=' . $_GET["topic"] . '&page=' . $i . '">' . $i . '</a>';
            }
        }

        ?>
        </div>
    </nav>
</main>
<?php
require_once("include/footer.inc.php");
?>