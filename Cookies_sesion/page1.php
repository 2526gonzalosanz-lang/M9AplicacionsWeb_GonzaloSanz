<?php
    session_start();
    header("Cache-control: private");
    $_SESSION = array();
    session_destroy();
    echo "<strong>Se ha destruido esta sesión</strong><br />";
    if($_SESSION['name']){
        echo "La sesión está todavía activa";
    } else {
        echo "Ok, la sesión ya no está activa! <br />";
        echo "<a href=\"page1.php\"><<Vuelta atrás</a>";
    }
?>