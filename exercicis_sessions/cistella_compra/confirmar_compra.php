<?php

// Iniciem la sessió per poder accedir a la cistella.
session_start();


// Eliminem la cistella guardada dins de la sessió.
unset($_SESSION["cistella"]);

?>

<!DOCTYPE html>

<html lang="ca">

<head>

    <!-- Definim la codificació UTF-8. -->
    <meta charset="UTF-8">

    <!-- Títol de la pàgina. -->
    <title>Compra confirmada</title>

</head>

<body>

    <!-- Mostrem un missatge indicant que la compra s'ha completat. -->
    <h1>Compra confirmada</h1>

    <!-- Simulem que l'usuari ha realitzat el pagament. -->
    <p>El pagament s'ha realitzat correctament.</p>

    <!-- Informem que la cistella s'ha buidat. -->
    <p>La cistella de compra s'ha buidat.</p>

    <!-- Enllaç per tornar a començar una nova compra. -->
    <a href="index.html">Tornar a la botiga</a>

</body>

</html>