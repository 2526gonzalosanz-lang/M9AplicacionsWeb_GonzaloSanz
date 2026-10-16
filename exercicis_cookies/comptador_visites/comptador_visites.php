<?php

// Comprobamos si ya existe la cookie "visites".
if (isset($_COOKIE["visites"])) {

    // Si existe, recuperamos su valor y le sumamos 1.
    $visites = $_COOKIE["visites"] + 1;

} else {

    // Si no existe significa que es la primera visita.
    $visites = 1;
}

// Guardamos el nuevo número de visitas en una cookie.
// time() + 2592000 hace que la cookie dure 30 días.
setcookie("visites", $visites, time() + 2592000, "/");


// Creamos una variable para saber si el usuario ya ha comprado usando un descuento.
$descompteUtilitzat = false;

// Comprobamos si existe la cookie que indica que ya se utilizó un descuento.
if (isset($_COOKIE["descompte_utilitzat"])) {

    // Si existe y vale 1, significa que ya ha realizado una compra con descuento.
    if ($_COOKIE["descompte_utilitzat"] == "1") {
        $descompteUtilitzat = true;
    }
}


// Variable donde guardaremos mensajes relacionados con la compra.
$missatgeCompra = "";


// Comprobamos si el formulario se ha enviado mediante POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Aquí procesas la compra...

    // Reiniciamos el contador de visitas a 1.
    $visites = 1;
    setcookie("visites", $visites, time() + 2592000, "/");
    //reiniciamos el contador de visitas después de hacer la compra.

    // Recogemos el código introducido en el formulario.
    // trim elimina posibles espacios al principio o al final.
    $codi = trim($_POST["codi_descompte"] ?? "");


    // Si el usuario no ha escrito ningún código de descuento.
    if ($codi == "") {

        // Mostramos que la compra se ha realizado sin descuento.
        $missatgeCompra = "Compra realitzada sense descompte.";

    }

    // Comprobamos si ha escrito el código BOTIGA20.
    elseif ($codi == "BOTIGA20") {

        // El código del 20% se puede utilizar a partir de 5 visitas
        // y siempre que no haya usado antes otro descuento.
        if ($visites >= 5 && !$descompteUtilitzat) {

            // Indicamos que la compra tiene un 20% de descuento.
            $missatgeCompra = "Compra realitzada amb un 20% de descompte.";

            // Guardamos una cookie indicando que el descuento ya se ha utilizado.
            setcookie("descompte_utilitzat", "1", time() + 2592000, "/");

            // También actualizamos la variable para esta misma ejecución.
            $descompteUtilitzat = true;

        } else {

            // Si no cumple las condiciones, el código no es válido.
            $missatgeCompra = "El codi BOTIGA20 no està disponible.";
        }
    }

    // Comprobamos si ha escrito el código BOTIGA50.
    elseif ($codi == "BOTIGA50") {

        // El código del 50% solo se puede utilizar a partir de 10 visitas
        // y si todavía no se ha utilizado ningún descuento.
        if ($visites >= 10 && !$descompteUtilitzat) {

            // Indicamos que la compra tiene un 50% de descuento.
            $missatgeCompra = "Compra realitzada amb un 50% de descompte.";

            // Guardamos que el usuario ya ha utilizado un descuento.
            setcookie("descompte_utilitzat", "1", time() + 2592000, "/");

            // Actualizamos también la variable.
            $descompteUtilitzat = true;

        } else {

            // Si no cumple las condiciones, mostramos un error.
            $missatgeCompra = "El codi BOTIGA50 no està disponible.";
        }
    }

    // Si escribe cualquier otro código.
    else {

        // Mostramos que el código no es válido.
        $missatgeCompra = "El codi de descompte introduït no és correcte.";
    }
}

?>

<!DOCTYPE html>
<html lang="ca">

<head>

    <!-- Indicamos la codificación de caracteres. -->
    <meta charset="UTF-8">

    <!-- Título que aparece en la pestaña del navegador. -->
    <title>Comptador de visites</title>

</head>

<body>

    <!-- Título principal de la página. -->
    <h1>Botiga online</h1>


    <!-- Mostramos el número de visitas almacenado en la cookie. -->
    <p>Nombre de visites: <?php echo $visites; ?></p>


    <?php

    // Solo mostramos ofertas si todavía no se ha utilizado ningún descuento.
    if (!$descompteUtilitzat) {

        // Si tiene entre 5 y 9 visitas, ofrecemos el descuento del 20%.
        if ($visites >= 5 && $visites < 10) {

            echo "<p>
            Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% 
            de descompte en les teves primeres compres a la botiga
            </p>";
        }

        // Si tiene 10 visitas o más, ofrecemos el descuento del 50%.
        elseif ($visites >= 10) {

            echo "<p>
            Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 
            per obtenir un 50% de descompte en les teves primeres compres 
            a la botiga
            </p>";
        }
    }

    ?>


    <!-- Creamos el formulario de compra. -->
    <form method="POST">

        <!-- Etiqueta del campo donde se introduce el código. -->
        <label for="codi_descompte">Codi de descompte:</label>

        <!--
        Campo de texto para escribir el código.
        maxlength limita el máximo a 8 caracteres.
        pattern permite únicamente BOTIGA20 o BOTIGA50.
        El campo no tiene required porque también se puede comprar sin descuento.
        -->
        <input
            type="text"
            id="codi_descompte"
            name="codi_descompte"
            maxlength="8"
            pattern="BOTIGA20|BOTIGA50"
            title="Introdueix BOTIGA20 o BOTIGA50"
        >

        <!-- Botón que envía el formulario. -->
        <button type="submit">Comprar</button>

    </form>


    <?php

    // Si hay algún mensaje después de realizar la compra, lo mostramos.
    if ($missatgeCompra != "") {

        echo "<p>$missatgeCompra</p>";
    }

    ?>

</body>

</html>