<?php
// Iniciem la sessió per poder utilitzar variables de sessió.
session_start();

// Comprovem que el formulari s'ha enviat mitjançant el mètode POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recollim el valor del camp usuari.
    // trim elimina possibles espais al principi i al final.
    $usuari = trim($_POST["usuari"] ?? "");

    // Recollim el valor del camp password.
    $password = trim($_POST["password"] ?? "");


    // Comprovem que cap dels dos camps estigui buit.
    // També comprovem que l'usuari sigui exactament igual a la contrasenya.
    if ($usuari != "" && $password != "" && $usuari === $password) {

        // Guardem el nom de l'usuari dins de la sessió.
        $_SESSION["usuari"] = $usuari;

        // Redirigim l'usuari a la primera pàgina d'informació.
        header("Location: info1.php");

        // Finalitzem l'execució del programa.
        exit;

    } else {

        // Si l'usuari i la contrasenya no coincideixen,
        // redirigim l'usuari de nou a la pàgina de login.
        header("Location: index.html");

        // Finalitzem l'execució.
        exit;
    }

} else {

    // Si algú intenta accedir directament a login.php sense enviar el formulari,
    // el redirigim també a la pàgina de login.
    header("Location: index.html");

    // Finalitzem l'execució.
    exit;
}

?>