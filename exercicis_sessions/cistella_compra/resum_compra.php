<?php

// Iniciem la sessió per poder consultar la cistella.
session_start();


// Definim el preu de cada producte.
$preus = [
    "samarreta" => 20,
    "pantalons" => 35
];


// Definim els noms que mostrarem a la pantalla.
$noms = [
    "samarreta" => "Samarreta",
    "pantalons" => "Pantalons"
];


// Creem la variable que guardarà el preu total de la compra.
$total = 0;

?>

<html>

<head>

    <!-- Definim la codificació UTF-8. -->
    <meta charset="UTF-8">

    <!-- Títol de la pàgina. -->
    <title>Resum de la compra</title>

</head>

<body>

    <!-- Títol principal. -->
    <h1>Resum de la compra</h1>


    <?php

    // Comprovem si existeix una cistella i si no està buida.
    if (isset($_SESSION["cistella"]) && !empty($_SESSION["cistella"])) {


        // Recorrem tots els productes guardats a la cistella.
        foreach ($_SESSION["cistella"] as $producte => $quantitat) {


            // Obtenim el preu del producte.
            $preu = $preus[$producte];


            // Calculem el subtotal d'aquest producte.
            $subtotal = $preu * $quantitat;


            // Sumem el subtotal al total de la compra.
            $total += $subtotal;


            // Mostrem el nom del producte.
            echo "<p>Producte: " . $noms[$producte] . "</p>";

            // Mostrem la quantitat comprada.
            echo "<p>Quantitat: $quantitat</p>";

            // Mostrem el preu unitari.
            echo "<p>Preu unitari: $preu €</p>";

            // Mostrem el subtotal.
            echo "<p>Subtotal: $subtotal €</p>";

            // Mostrem una línia separadora.
            echo "<hr>";
        }


        // Mostrem el preu total de tota la compra.
        echo "<h2>Total: $total €</h2>";


        ?>

        <!--
        Creem un formulari que ens permet confirmar la compra.
        Quan es premi el botó anirem a confirmar.php.
        -->
        <form action="confirmar_compra.php" method="POST">

            <!-- Botó que simula el pagament. -->
            <button type="submit">Confirmar compra</button>

        </form>

        <?php


    } else {

        // Si la cistella està buida, mostrem un missatge.
        echo "<p>La cistella està buida.</p>";
    }

    ?>


    <br>


    <!-- Enllaç per tornar a la botiga i continuar comprant. -->
    <a href="index.html">Tornar a la botiga</a>


</body>

</html>