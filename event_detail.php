<?php
$titre="Events";
include_once("include/header.inc.php");
include_once('classes/Mypdo.class.php');
$dbo=new Mypdo();

//Récupération du détail de l'événement
$sql="SELECT * FROM events 
        WHERE id=:id_event AND is_published=1";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_event',$_GET['id']);
$stmt->execute();
$detail_evenement=$stmt->fetch();

//Récupération du créateur de l'événement
$sql="SELECT id,first_name,last_name FROM users
        WHERE id=:id_user";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_user',$detail_evenement->id_user);
$stmt->execute();
$createur_evenement=$stmt->fetch();

//Récupération du nombre de participants
$sql="SELECT COUNT(*) as nb_participants FROM events_participants 
        WHERE id_event=:id_event";
$stmt=$dbo->prepare($sql);
$stmt->bindValue('id_event',$_GET['id']);
$stmt->execute();
$nombre_participants=$stmt->fetch();
$nombre_participants=$nombre_participants->nb_participants;

//Récupération des participants
$sql="SELECT id,first_name,last_name FROM events_participants p
        INNER JOIN users u ON p.id_users=u.id
        WHERE id_event=:id_event";
$stmt=$dbo->prepare($sql);
$stmt->bindValue('id_event',$_GET['id']);
$stmt->execute();
$participants=$stmt->fetchAll();

//Savoir si le membre est un participant
if(!empty($_SESSION['id'])){
    $sql="SELECT id_users FROM events_participants WHERE id_users=:id_user AND id_event=:id_event";
    $stmt=$dbo->prepare($sql);
    $stmt->bindValue(':id_user',$_SESSION['id']);
    $stmt->bindValue(':id_event',$_GET['id']);
    $stmt->execute();
    $est_participant=$stmt->rowCount();
}

//Récupération des commentaires
$sql="SELECT first_name,last_name,body,c.date_created FROM users u INNER JOIN events_comments c ON u.id=c.id_user
        WHERE id_event=:id_event";
$stmt=$dbo->prepare($sql);
$stmt->bindValue(':id_event',$_GET['id']);
$stmt->execute();
$commentaires=$stmt->fetchAll();
?>
    <main class="container" id="page_detail_event">
        <h1 class="text_center">Détail de l'événement "<?php echo $detail_evenement->name;?>"</h1>
        <h2 class="text_center">Organisé par <?php echo $createur_evenement->last_name.' '.$createur_evenement->first_name;?></h2>
        <img class="bloc_center" src="images/events/<?php echo $_GET['id'].'_'.$detail_evenement->picture;?>">
        <div id="bloc_detail_evenement" class="row">

            <div class="col-sm-8 card">
                <p class="card-body">Rendez-vous à <?php echo $detail_evenement->name_city.', '.$detail_evenement->zip_code.', '.$detail_evenement->street_address.' de '.date('d-m-Y',strtotime($detail_evenement->date_start)).' à '.$detail_evenement->hour_start.' jusqu\'au '.date('d-m-Y',strtotime($detail_evenement->date_end)).' '.$detail_evenement->hour_end;?></p>
                <p class="card-body"><?php echo $detail_evenement->description;?></p>
            </div>

            <div class="col-sm-4">
                <?php
                if(!empty($_SESSION['id'])){
                    //S'il n'est pas un participant, il a accès au bouton participer, sinon il peut annuler sa participation
                    if($est_participant===0){
                        //Vérification que le nombre de participants n'a pas atteint sa limite
                        if($nombre_participants!==$detail_evenement->limited_number_participant){ ?>
                            <button class="btn btn-outline-dark" onclick="location.href='php/ajouter_participation_evenement.php?id_event=<?php echo $_GET['id'];?>'">Participer</button><br>
                        <?php }else{ ?>
                            <div>Limite de participants atteinte !</div>
                        <?php }
                    }else{ ?>
                        <button class="btn btn-outline-dark" onclick="location.href='php/annuler_participation_evenement.php?id_event=<?php echo $_GET['id'];?>'">Annuler participation</button><br>
                    <?php }
                }else{
                    echo '<div>Vous devez être connectés pour pouvoir participer à l\'événement !</div>';
                } ?>
                <?php if(!empty($_SESSION['id']) and !empty($_SESSION['role'])){ ?>
                    <?php if($createur_evenement->id===$_SESSION['id'] || $_SESSION['role']==="Administrateur"){ ?>
                        <button class="btn btn-outline-dark mt-5" onclick="location.href='php/supprimer_evenement.php?id_event=<?php echo $_GET['id'];?>'">Supprimer</button>
                    <?php }
                }?>
            </div>

        </div>
        <p>Nombre limité de participants : <?php echo $detail_evenement->limited_number_participant;?></p>
        <?php if(empty($participants)){
            echo '<div>Aucun participant actuellement.</div>';
        }else{ ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td colspan="3">Liste des participants</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($participants as $participant){ ?>
                    <tr class="text_center">
                        <td><?php echo $participant->last_name;?></td>
                        <td><?php echo $participant->first_name;?></td>
                        <td><i onclick="location.href='profil.php?id=<?php echo $participant->id;?>'" class="fas fa-user"></i></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <h2 class="h2">Espace commentaires</h2>
        <?php
        if(!empty($_SESSION['id'])){ ?>
            <form action="php/ajouter_commentaire.php" method="post">

                <div class="form-group">
                    <textarea class="form-control" name="commentaire" placeholder="Votre commentaire ..."></textarea>
                </div>
                <button class="btn btn-outline-dark"  name="bouton_event" value="<?php echo $_GET['id'];?>" type="submit">Envoyer</button>
            </form>
        <?php }
        //Liste de tous les commentaires existants pour cet événement
        foreach($commentaires as $commentaire){ ?>
            <div class="card mt-5" id="bloc_liste_commentaires">
                <p>Posté par <?php echo $commentaire->first_name.' '.$commentaire->last_name; ?></p>
                <p>Le : <?php echo $commentaire->date_created;?></p>
                <p><?php echo $commentaire->body;?></p>
            </div>
        <?php } ?>
    </main>
<?php
require_once("include/footer.inc.php");
?>