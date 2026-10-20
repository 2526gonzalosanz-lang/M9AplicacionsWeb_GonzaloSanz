<?php

// Comprovem si el formulari s'ha enviat mitjançant POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recollim l'opció de majoria d'edat.
    $majoredat = $_POST["majoredat"] ?? "";

    // Recollim l'idioma seleccionat.
    $idioma = $_POST["idioma"] ?? "";

    // Recollim la moneda seleccionada.
    $moneda = $_POST["moneda"] ?? "";


    // Comprovem que l'opció de majoria d'edat sigui correcta.
    $majoredatCorrecta = ($majoredat == "si" || $majoredat == "no");

    // Comprovem que l'idioma sigui un dels tres permesos.
    $idiomaCorrecte = (
        $idioma == "catala" ||
        $idioma == "espanyol" ||
        $idioma == "angles"
    );

    // Comprovem que la moneda sigui una de les tres permeses.
    $monedaCorrecta = (
        $moneda == "euros" ||
        $moneda == "lliures" ||
        $moneda == "dolars"
    );


    // Si totes les dades són correctes, les guardem en cookies.
    if ($majoredatCorrecta && $idiomaCorrecte && $monedaCorrecta) {

        // Guardem si l'usuari és major d'edat.
        // La cookie durarà 30 dies.
        setcookie("majoredat", $majoredat, time() + 2592000, "/");

        // Guardem l'idioma seleccionat.
        setcookie("idioma", $idioma, time() + 2592000, "/");

        // Guardem la moneda seleccionada.
        setcookie("moneda", $moneda, time() + 2592000, "/");

        // Redirigim l'usuari a la pàgina d'informació.
        header("Location: info.php");

        // Aturem l'execució.
        exit;
    }
}

?>

<html>

<head>

    <!-- Definim la codificació UTF-8. -->
    <meta charset="UTF-8">

    <!-- Títol de la pàgina. -->
    <title>Bodega</title>

</head>

<body>

    <!-- Títol principal. -->
    <h1>Benvingut a la nostra bodega</h1>


    <!--
    Creem el formulari.
    Les dades s'enviaran al mateix fitxer mitjançant POST.
    -->
    <form method="POST">


        <!-- Preguntem si l'usuari és major d'edat. -->
        <p>Ets major d'edat?</p>

        <!--
        Els dos radio buttons tenen el mateix name,
        per tant només es pot seleccionar una opció.
        required obliga a seleccionar-ne una.
        -->
        <input
            type="radio"
            id="major_si"
            name="majoredat"
            value="si"
            required
        >

        <!-- Etiqueta de l'opció Sí. -->
        <label for="major_si">Sí</label>


        <input
            type="radio"
            id="major_no"
            name="majoredat"
            value="no"
        >

        <!-- Etiqueta de l'opció No. -->
        <label for="major_no">No</label>


        <br><br>


        <!-- Etiqueta per seleccionar l'idioma. -->
        <label for="idioma">Idioma:</label>

        <!--
        Creem una llista desplegable amb els tres idiomes.
        required obliga a seleccionar una opció.
        -->
        <select name="idioma" id="idioma" required>

            <!-- Opció inicial sense valor. -->
            <option value="">Selecciona un idioma</option>

            <!-- Opció català. -->
            <option value="catala">Català</option>

            <!-- Opció espanyol. -->
            <option value="espanyol">Espanyol</option>

            <!-- Opció anglès. -->
            <option value="angles">Anglès</option>

        </select>


        <br><br>


        <!-- Etiqueta per seleccionar la moneda. -->
        <label for="moneda">Moneda:</label>

        <!-- Creem una llista desplegable amb les tres monedes. -->
        <select name="moneda" id="moneda" required>

            <!-- Opció inicial sense valor. -->
            <option value="">Selecciona una moneda</option>

            <!-- Euros. -->
            <option value="euros">Euros</option>

            <!-- Lliures. -->
            <option value="lliures">Lliures</option>

            <!-- Dòlars. -->
            <option value="dolars">Dòlars</option>

        </select>


        <br><br>


        <!-- Botó que envia el formulari. -->
        <button type="submit">Entrar a la botiga</button>

    </form>

</body>

</html>