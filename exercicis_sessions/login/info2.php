<?php

// Iniciem la sessió per poder consultar l'usuari identificat.
session_start();


// Comprovem si existeix la variable de sessió "usuari".
if (!isset($_SESSION["usuari"])) {

    // Si no hi ha cap usuari identificat,
    // redirigim el visitant a la pàgina de login.
    header("Location: index.html");

    // Finalitzem l'execució.
    exit;
}

?>

<!DOCTYPE html>

<!-- Indiquem que la pàgina està escrita en català. -->
<html lang="ca">

<head>

    <!-- Definim la codificació de caràcters. -->
    <meta charset="UTF-8">

    <!-- Títol de la segona pàgina d'informació. -->
    <title>Informació 2</title>

</head>

<body>

    <!-- Mostrem el nom de l'usuari a la part superior. -->
    <p>
        Usuari: <?php echo htmlspecialchars($_SESSION["usuari"]); ?>
    </p>

    <!-- Títol principal. -->
    <h1>Pàgina d'informació 2</h1>

    <!-- Contingut de la segona pàgina. -->
    <p>Aquesta és la segona pàgina d'informació del lloc web.</p>

    <!-- Enllaç per tornar a la primera pàgina. -->
    <a href="info1.php">Tornar a la pàgina 1</a>

    <br><br>

    <!-- Enllaç per tancar la sessió. -->
    <a href="logout.php">Tancar sessió</a>

</body>

</html>