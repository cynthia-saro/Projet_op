<?php
$titre="Espace profil";
require_once("include/header.inc.php");
?>
    <main>
        <h1> Les vétérinaires </h1>
        <div class="container">
    
        <ul class="coordonnee">
            <li><p>Nom:</p><p class="donnee">RAJAO</p></li>
            <li><p>Prénom:</p><p class="donnee">Laura</p></li>
            <li><p>Lieu:</p><p class="donnee">Ste Luce sur Loire</p></li>
            <li><p>Spécialité:</p><p class="donnee"> Vétérinaire félins/canins</p></li>

            <button onclick="location.href='veterinaire_detail.php?id=1'">Contacter</button>
        </ul>
        <ul class="coordonnee">
            <li><p>Nom:</p><p class="donnee">PAGE</p></li>
            <li><p>Prénom:</p><p class="donnee">Donna</p></li>
            <li><p>Lieu:</p><p class="donnee">Paris</p></li>
            <li><p>Spécialité:</p><p class="donnee">Vétérinaire reptiliens</p></li>

            <button onclick="location.href='veterinaire_detail.php?id=2'">Contacter</button>
        </ul>
        <ul class="coordonnee">
            <li><p>Nom:</p><p class="donnee">OMANDA</p></li>
            <li><p>Prénom:</p><p class="donnee">Hugo</p></li>
            <li><p>Lieu:</p><p class="donnee">Lille</p></li>
            <li><p>Spécialité:</p><p class="donnee">Chirurgien équidés</p></li>

            <button onclick="location.href='veterinaire_detail.php?id=3'">Contacter</button>
        </ul>
        <ul class="coordonnee">
            <li><p>Nom:</p><p class="donnee">LE SAUX</p></li>
            <li><p>Prénom:</p><p class="donnee">Arnaud</p></li>
            <li><p>Lieu:</p><p class="donnee">Lyon</p></li>
            <li><p>Spécialité:</p><p class="donnee">Vétérinaire rongeurs</p></li>

            <button onclick="location.href='veterinaire_detail.php?id=4'">Contacter</button>
        </ul>
    
        </div>
    </main>
<?php
require_once("include/footer.inc.php");
?>