<?php
$titre="Ajouter un événement";
$description="";
include_once('include/header.inc.php');
include_once('classes/evenementsManager.class.php');
$dbo=new Mypdo();
$evenementsManager=new evenementsManager($dbo);

//Si l'utilisateur n'est pas connecté, on le redirige sur la page de la liste de tous les événements.
if(empty($_SESSION['id'])){
    header('Location:events_liste.php');
}

//Vérification que tous les champs du formulaire sont renseignés
if($_POST) {
    if (!empty($_POST['event_name']) and !empty($_POST['date_start']) and !empty($_POST['hour_start']) and !empty($_POST['date_end']) and !empty($_POST['hour_end']) and !empty($_FILES['picture']) and !empty($_POST['description']) and !empty($_POST['limited_number_participants']) and !empty($_POST['zip_code']) and !empty($_POST['city']) and !empty($_POST['street'])) {

        $event_name = $_POST["event_name"];
        $date_start = $_POST["date_start"];
        $hour_start = $_POST["hour_start"];
        $date_end = $_POST["date_end"];
        $hour_end = $_POST["hour_end"];
        $picture = $_FILES["picture"];
        $description = $_POST["description"];
        $limited_number_participants = $_POST["limited_number_participants"];
        $zip_code = $_POST["zip_code"];
        $city = $_POST["city"];
        $street = $_POST["street"];

        if ($evenementsManager->nom_event_deja_pris($event_name) === true) {
            $erreur = "Nom d'événement déjà existant !";
        } else {
            //Contrôle de la logique des dates et des heures renseignées
            if ($date_start === $date_end) {
                if ($hour_start >= $hour_end) {
                    $erreur = "L'heure de fin doit être supérieur à la date de début, l'événement est sur la même journée !";
                }
            }

            if ($date_start > $date_end) {
                $erreur = "La date de fin doit survenir après le début de la date de l'événement ... !";
            }

            //Requête insertion d'un événement
            if (empty($erreur)) {
                $evenementsManager->add($_SESSION['id'], $event_name, $date_start, $hour_start, $date_end, $hour_end, $zip_code, $city, $street, $description, $limited_number_participants, $picture);

                $event_id = $dbo->lastInsertId();

                //Enregistrement de l'image dans le dossier images
                move_uploaded_file($_FILES['picture']['tmp_name'], 'images/events/' . $event_id . '_' . basename($_FILES['picture']['name']));
                //Enregistrement de l'image dans le dossier images
                move_uploaded_file($_FILES['picture']['tmp_name'], '../projet_op_admin/images/events/' . $event_id . '_' . basename($_FILES['picture']['name']));
            }
        }
    } else {
        $erreur = "Veuillez saisir tous les champs !";
    }

    if (empty($erreur)) {
        header('Location:events_liste.php');
    }
}

?>
    <main>
        <div>

            <h1>Ajouter un évènement</h1>

            <p style="text-align:center;font-size:1.1em">Votre évènement sera validé par un administrateur avant d'être diffusé sur notre site !</p>

            <form action="event_add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="event_name">Nom de l'événement</label>
                    <input class="form-control" type="text" name="event_name" id="event_name" required>
                </div>
                <div class="form-group">
                    <label for="date_start">Date de début</label>
                    <input class="form-control" type="date" name="date_start" id="date_start" required>
                </div>
                <div class="form-group">
                    <label for="hour_start">Heure de début</label>
                    <input class="form-control" type="time" name="hour_start" id="hour_start" required>
                </div>
                <div class="form-group">
                    <label for="date_end">Date de fin</label>
                    <input class="form-control" type="date" name="date_end" id="date_end" required>
                </div>
                <div class="form-group">
                    <label for="hour_end">Heure de fin</label>
                    <input class="form-control" type="time" name="hour_end" id="hour_end" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="limited_number_participants">Nombre limite de participants</label>
                    <input class="form-control" type="number" name="limited_number_participants" id="limited_number_participants" required>
                </div>
                <div class="form-group">
                    <label for="picture">Photo</label>
                    <input type="file" name="picture" id="picture" accept=".jpg, .jpeg, .png" required>
                </div>

                <h2 id="h2_event">Adresse de l'événement</h2>

                <div class="form-group">
                    <label for="city">Ville</label>
                    <input class="form-control" type="text" name="city" id="city" required>
                </div>
                <div class="form-group">
                    <label for="zip_code">Code postal</label>
                    <input class="form-control" type="text" name="zip_code" id="zip_code" required>
                </div>

                <div class="form-group">
                    <label for="street">Rue</label>
                    <input class="form-control" type="text" name="street" id="street" required>
                </div>
                <div class="error">
                    <?php if(isset($erreur)){
                        echo $erreur;
                    }
                    ?>
                </div>
                <div>
                    <button type="submit">Créer l'événement</button>
                </div>
            </form>
        </div>
    </main>
<?php
require_once("include/footer.inc.php");

