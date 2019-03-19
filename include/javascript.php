<!-- SCRIPTS JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/formulaires.js"></script>
<script src="js/formulaires_utilisateurs.js"></script>
<script src="js/animaux.js"></script>
<script src="./node_modules/moment/moment.js"></script>
<script src='./node_modules/jquery/dist/jquery.min.js'></script>
<script src='./node_modules/fullcalendar/dist/fullcalendar.min.js'></script>
<script src='./node_modules/fullcalendar/dist/locale-all.js'></script>
<script src="./js/calendrier.js"></script>
<script type="text/javascript">
    //<!--
    function ffalse()
    {
        return false;
    }
    function ftrue()
    {
        return true;
    }
    document.onselectstart = new Function ("return false");
    if(window.sidebar)
    {
        document.onmousedown = ffalse;
        document.onclick = ftrue;
    }
    //-->
</script>