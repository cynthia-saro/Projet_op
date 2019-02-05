<?php session_start();?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="fr" dir="ltr">
<meta charset="UTF-8">
<?php
require_once("include/functions.inc.php");
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $titre;?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/connexion_inscription.css">
</head>
<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
setlocale (LC_TIME, 'fr_FR.utf8','fra');
?>