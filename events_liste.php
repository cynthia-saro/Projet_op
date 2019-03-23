<?php
$titre="Events";
$description="";
include_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
include_once('classes/evenementsManager.class.php');
$dbo=new Mypdo();
$evenementsManager=new evenementsManager($dbo);
?>
    <main>
        <h1>Liste des prochains évènements</h1>
        <div id="page_events">
        <div id="prochains_events">
            <ul>
                <li id="titre_liste_prochains_events">Prochains événements</li>
                <?php
                $events=$evenementsManager->getFutureEvents();
                foreach($events as $event){ ?>
                    <li onclick="location.href = 'event_detail.php?id=<?php echo $event->getId();?>'" class="liste_prochains_events"><?php echo $event->getName();?></li>
                    <?php
                }
                ?>

            </ul>
        <?php
        if(!empty($_SESSION['id'])){ ?>
            <button onclick="location.href = 'event_add.php'">Ajouter un événement</button>
            <?php
        } ?>
        </div>

        <?php
        $sql="SELECT id,name,date_start,date_end FROM events WHERE is_published=1";
        $stmt=$dbo->prepare($sql);
        $stmt->execute();
        $events=$stmt->fetchAll();

        $tableauAllEvents=array();
        foreach($events as $event){
            $tableauEvent=array(
                'id'=>$event->id,
                'title'=>$event->name,
                'start'=>$event->date_start,
                'end'=>date('Y-m-d',strtotime($event->date_end.' +1 day')),
                'url'=>'./event_detail.php?id='.$event->id
            );
            array_push($tableauAllEvents,$tableauEvent);
        }

        $fp = fopen('./json/all_events_published.json', 'w');
        fwrite($fp, json_encode($tableauAllEvents));
        fclose($fp);
        ?>

        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
        </div>
    </main>
<?php
require_once("include/footer.inc.php");
?>