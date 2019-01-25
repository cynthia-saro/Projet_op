<?php
if(empty($_GET['section'])){
    header('Location:forum_sections.php');
}
$titre="Forum";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$db=new Mypdo();
$forumTopicManager=new ForumTopicManager($db);
$topics=$forumTopicManager->getAllTopicsBySection($_GET['section']);
$forumSectionManager=new ForumSectionManager($db);
$section=$forumSectionManager->getSection($_GET['section']);
?>
<main>
    <?php
        if(($section->getEstPossibleCreerTopic()==1) && (!empty($_SESSION['id']))){ ?>
            <button><a href="forum_creer_topic.php?section=<?php echo $section->getId();?>">Créer un topic</a></button>
            <?php
        }
    ?>
    <table class="table">
        <thead>
        <tr>
            <td>Topics</td>
            <td>Réponses</td>
            <td>Vues</td>
            <td>Dernier message</td>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach($topics as $topic){ ?>
                <tr>
                    <td><a href="forum_detail_topic.php?topic=<?php echo $topic->getId();?>"><?php echo $topic->getTitle();?></a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php
require_once("include/footer.inc.php");
?>