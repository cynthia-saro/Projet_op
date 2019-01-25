<?php 
$titre="Forum";
require_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
?>
<main>
    <table class="table">
        <thead>
            <tr>
                <td>Sections</td>
                <td>Discussions</td>
                <td>Messages</td>
                <td>Dernier message</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $db=new Mypdo();
            $forumSectionManager=new ForumSectionManager($db);
            $sections=$forumSectionManager->getAllSections();
            foreach($sections as $section){ ?>
                <tr>
                    <td>
                        <a href="forum_topics.php?section=<?php echo $section->getId();?>">
                            <h3><?php echo $section->getTitle();?></h3>
                        </a>
                        <p><?php echo $section->getDescription();?></p>
                    </td>
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