<?php

// Iniciem la sessió actual.
session_start();


// Eliminem totes les variables guardades a la sessió.
session_unset();


// Destruïm completament la sessió.
session_destroy();


// Redirigim l'usuari a la pàgina de login.
header("Location: index.html");


// Finalitzem l'execució.
exit;

?>