<?php session_start();
ob_start();
if(empty($_SESSION['id'])){
    header('Location:connexion.php');
};?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" dir="ltr">
<meta charset="UTF-8">
<?php
require_once("include/functions.inc.php");
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $titre;?></title>

    <!-- FONT -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/forum.css">
    <link rel="stylesheet" href="css/formulaires.css">
    <link rel="stylesheet" href="css/formulaires_utilisateurs.css">
    <link rel="stylesheet" href="css/animaux.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/events.css">
    <link rel="stylesheet" href="css/veterinaire.css">

    <!-- CALENDAR -->
    <link rel='stylesheet' href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css'>
</head>
<?php  
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
setlocale (LC_TIME, 'fr_FR.utf8','fra');
?>