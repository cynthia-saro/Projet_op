<?php 
include_once("include/header.inc.php"); 
?>

<?php

if($_GET['id']==1){
    echo '<ul class="coordonnee">
    <li><p>Nom:</p><p class="donnee">RAJAO</p></li>
    <li><p>Prénom:</p><p class="donnee">Laura</p></li>
    <li><p>Lieu:</p><p class="donnee">Ste Luce sur Loire</p></li>
    <li><p>Spécialité:</p><p class="donnee"> Vétérinaire félins/canins</p></li>
    <li><p>Téléphone:</p><p class="donnee"> 06 03 17 97 97</p></li>
    <li><p>Adresse postale:</p><p class="donnee"> 9 impasse des cochons,
     44980, Ste Luce Sur Loire</p></li>
    </ul>';
}

?>

<?php
require_once("include/footer.inc.php");
?> 