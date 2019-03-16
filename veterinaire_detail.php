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

if($_GET['id']==2){
    echo '<ul class="coordonnee">
    <li><p>Nom:</p><p class="donnee">PAGE</p></li>
    <li><p>Prénom:</p><p class="donnee">Dona</p></li>
    <li><p>Lieu:</p><p class="donnee">Paris</p></li>
    <li><p>Spécialité:</p><p class="donnee"> Vétérinaire reptiliens </p></li>
    <li><p>Téléphone:</p><p class="donnee"> 06 85 98 42 69</p></li>
    <li><p>Adresse postale:</p><p class="donnee"> 9 rue des bermudes,
     75000, Ste Luce Sur Loire</p></li>
    </ul>';
}

if($_GET['id']==3){
    echo '<ul class="coordonnee">
    <li><p>Nom:</p><p class="donnee">OMANDA</p></li>
    <li><p>Prénom:</p><p class="donnee">Hugo</p></li>
    <li><p>Lieu:</p><p class="donnee">Lille</p></li>
    <li><p>Spécialité:</p><p class="donnee"> Chirurgien équidés </p></li>
    <li><p>Téléphone:</p><p class="donnee"> 06 63 83 55 93</p></li>
    <li><p>Adresse postale:</p><p class="donnee"> 18 avenue des rochers,
     59000, Lille</p></li>
    </ul>';
}

if($_GET['id']==4){
    echo '<ul class="coordonnee">
    <li><p>Nom:</p><p class="donnee">LE SAUX</p></li>
    <li><p>Prénom:</p><p class="donnee">Arnaud</p></li>
    <li><p>Lieu:</p><p class="donnee">Lyon</p></li>
    <li><p>Spécialité:</p><p class="donnee"> Vétérinaire rongeurs </p></li>
    <li><p>Téléphone:</p><p class="donnee"> 06 63 83 55 93</p></li>
    <li><p>Adresse postale:</p><p class="donnee"> 18 avenue des 3 rue de la pentades,
    69000, Lyon</p></li>
    </ul>';
}

?>

<?php
require_once("include/footer.inc.php");
?> 