    <footer>
        <nav>
            <ul>
                <li><a href="mentions_legales.php">Mentions Légales</a></li>
                <li><a href="credits.php">Crédits</a></li>
            </ul>
        </nav>
        <div id="footer_animaux">
            <div id="liste_image_animaux">
                <div class="image_animal">
                    <img src="images/turtle.png">
                </div>
                <div class="image_animal">
                    <img src="images/rabbit.png">
                </div>
                <div class="image_animal">
                    <img src="images/cat.png">
                </div>
                <div class="image_animal">
                    <img src="images/dog.png">
                </div>
                <div class="image_animal">
                    <img src="images/horse.png">
                </div>
            </div>
        </div>
    </footer>
</body>
    <?php include_once('include/javascript.php');?>
</html>
<?php 
//destruction de la variable nous permettant de nous connecter à la BDD 
unset($dbo);
ob_end_flush();
?>