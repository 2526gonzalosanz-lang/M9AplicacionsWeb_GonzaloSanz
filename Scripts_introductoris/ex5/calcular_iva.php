<?php
$resultat = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $preu = $_POST["preu"];
    $iva = $_POST["iva"];

    $total= $preu + ($preu * $iva / 100);

    $resultat = "El preu amb IVA és: " . $total . " €";
}
?>
<DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <title>Calculadora IVA</title>
    </head>
    <body>  

        <h1>Calculadora d'IVA</h1>

        <form method="POST">

            <label>Preu:</label>
            <input type="number" name="preu" step="0.01" required>

            <br><br>

            <label>Tipus d'IVA:</label>

            <select name="iva" required>
                <option value="4">4%</option>
                <option value="10">10%</option>
                <option value="21">21%</option>
            </select>

            <br><br>

            <input type="submit" value="Calcular IVA">

        </form>

        <?php
        if ($resultat != "") {
            echo "<h2>$resultat</h2>";
        }
        ?>

    </body>
</html>