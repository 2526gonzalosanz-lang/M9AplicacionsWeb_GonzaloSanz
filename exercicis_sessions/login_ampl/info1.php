<?php

// Iniciem la sessió per poder consultar les dades guardades.
session_start();


// Comprovem si existeix la variable de sessió "usuari".
if (!isset($_SESSION["usuari"])) {

    // Si no existeix, significa que l'usuari no ha iniciat sessió.
    // Per tant, el redirigim a la pàgina de login.
    header("Location: index.html");

    // Finalitzem l'execució de la pàgina.
    exit;
}

?>

<html>

<head>

    <!-- Definim la codificació UTF-8. -->
    <meta charset="UTF-8">

    <!-- Títol de la primera pàgina d'informació. -->
    <title>Informació 1</title>

</head>

<body>

    <!--
    Mostrem a la part superior el nom de l'usuari que ha iniciat sessió.
    htmlspecialchars evita que el text introduït per l'usuari s'interpreti com HTML.
    -->
    <p>
        Usuari: <?php echo htmlspecialchars($_SESSION["usuari"]); ?>
        <a href="logout.php">Tancar sessió</a>
    </p>

    <!-- Títol principal de la pàgina. -->
    <h1>Pàgina d'informació 1</h1>

    <!-- Contingut de la primera pàgina. -->
    <p>Aquesta és la primera pàgina d'informació del lloc web.</p>

    <!-- Enllaç que permet anar a la segona pàgina d'informació. -->
    <a href="info2.php">Anar a la pàgina 2</a>

    <br><br>

    <!-- Enllaç que permet tancar la sessió. -->
    <a href="logout.php">Tancar sessió</a>

</body>

</html>