<?php
$titre="Forum - Créer un topic";
require_once("include/header.inc.php");
if(empty($_SESSION['id'])){
    header('Location:index.php');
}
if(empty($_GET['section'])){
    header('Location:forum_sections.php');
}
if($_POST) {
    $title=$_POST['title'];
    $message=$_POST['message'];
    include_once('classes/Mypdo.class.php');
    include_once('classes/ForumTopicManager.class.php');
    include_once('classes/ForumMessageManager.class.php');
    $db=new Mypdo();
    $forumTopicManager=new ForumTopicManager($db);
    $forumTopicManager->add($_GET['section'],$_SESSION['id'],$title);
    $forumMessageManager=new ForumMessageManager($db);
    $idTopic=$db->lastInsertId();
    $forumMessageManager->add($idTopic,$_SESSION['id'],$message);
    header('Location:forum_detail_topic.php?topic='.$idTopic);
}
?>
    <main>
        <form action="forum_creer_topic.php?section=<?php echo $_GET['section'];?>" method="post">
            <div>
                <label>Sujet : </label>
                <input name="title">
            </div>
            <div>
                <textarea name="message"></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </main>
<?php
require_once("include/footer.inc.php");
?>