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
$messages=$forumMessageManager->getAllMessagesOfTopic($_GET['topic']);
$topic=$forumTopicManager->getTopic($_GET['topic']);
?>
<main id="detail_topic_forum">
    <h1>Topic : <?php echo $topic->getTitle();?></h1>
    <?php foreach($messages as $message) { ?>
        <div class="forum_auteur">
            <?php echo $message->username;?>
        </div>
        <div class="forum_message">
            <?php echo $message->message;?>
        </div>
    <?php } ?>
    <div id="zone_message">
        <?php if (!empty($_SESSION['id'])){
            if($topic->getEstClos()==0){ ?>
                <form action="forum_detail_topic.php?topic=<?php echo $_GET['topic']; ?>" method="post">
                    <div>
                        <textarea name="message"></textarea>
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
</main>
<?php
require_once("include/footer.inc.php");
?>