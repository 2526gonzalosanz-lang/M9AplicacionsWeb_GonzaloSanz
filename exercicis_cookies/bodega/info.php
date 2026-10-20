<?php

// Comprovem si existeixen les tres cookies necessàries.
if (
    !isset($_COOKIE["majoredat"]) ||
    !isset($_COOKIE["idioma"]) ||
    !isset($_COOKIE["moneda"])
) {

    // Si falta alguna cookie, tornem al formulari.
    header("Location: bodega.php");

    // Aturem l'execució.
    exit;
}


// Guardem en variables els valors de les cookies.
$majoredat = $_COOKIE["majoredat"];
$idioma = $_COOKIE["idioma"];
$moneda = $_COOKIE["moneda"];


// Si l'usuari NO és major d'edat.
if ($majoredat == "no") {

    // Seleccionem el missatge segons l'idioma.
    switch ($idioma) {

        // Missatge en català.
        case "catala":
            $missatge = "No et podem vendre alcohol si ets menor d'edat.";
            break;

        // Missatge en espanyol.
        case "espanyol":
            $missatge = "No podemos venderte alcohol si eres menor de edad.";
            break;

        // Missatge en anglès.
        case "angles":
            $missatge = "We cannot sell you alcohol if you are underage.";
            break;
    }

} else {

    // Si és major d'edat, preparem els productes.


    // Assignem els preus segons la moneda seleccionada.
    switch ($moneda) {

        // Preus en euros.
        case "euros":

            // Preu del primer producte.
            $preuVi = "39 €";

            // Preu del segon producte.
            $preuCava = "25 €";

            break;


        // Preus en lliures.
        case "lliures":

            // Preu aproximat en lliures.
            $preuVi = "34 £";

            // Preu aproximat en lliures.
            $preuCava = "22 £";

            break;


        // Preus en dòlars.
        case "dolars":

            // Preu aproximat en dòlars.
            $preuVi = "42 $";

            // Preu aproximat en dòlars.
            $preuCava = "27 $";

            break;
    }


    // Seleccionem els textos segons l'idioma.
    switch ($idioma) {

        // Textos en català.
        case "catala":

            // Títol de la pàgina.
            $titol = "Els nostres productes";

            // Missatge del primer producte.
            $producte1 = "T'oferim el vi \"Les Terrasses\" a un preu de $preuVi.";

            // Missatge del segon producte.
            $producte2 = "T'oferim el cava \"Reserva Brut\" a un preu de $preuCava.";

            break;


        // Textos en espanyol.
        case "espanyol":

            // Títol en espanyol.
            $titol = "Nuestros productos";

            // Primer producte en espanyol.
            $producte1 = "Te ofrecemos el vino \"Les Terrasses\" a un precio de $preuVi.";

            // Segon producte en espanyol.
            $producte2 = "Te ofrecemos el cava \"Reserva Brut\" a un precio de $preuCava.";

            break;


        // Textos en anglès.
        case "angles":

            // Títol en anglès.
            $titol = "Our products";

            // Primer producte en anglès.
            $producte1 = "We offer you the wine \"Les Terrasses\" for $preuVi.";

            // Segon producte en anglès.
            $producte2 = "We offer you the cava \"Reserva Brut\" for $preuCava.";

            break;
    }
}

?>

<html>

<head>

    <!-- Definim la codificació UTF-8. -->
    <meta charset="UTF-8">

    <!-- Títol de la pestanya. -->
    <title>Bodega</title>

</head>

<body>


    <?php

    // Comprovem si l'usuari és menor d'edat.
    if ($majoredat == "no") {

        // Si és menor, només mostrem el missatge d'avís.
        echo "<h1>$missatge</h1>";

    } else {

        // Si és major d'edat, mostrem el títol.
        echo "<h1>$titol</h1>";

        // Mostrem el primer producte.
        echo "<p>$producte1</p>";

        // Mostrem el segon producte.
        echo "<p>$producte2</p>";
    }

    ?>


    <br>


    <!-- Enllaç per tornar al formulari i canviar les preferències. -->
    <a href="bodega.php">Canviar preferències</a>


</body>

</html>