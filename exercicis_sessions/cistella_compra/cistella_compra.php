<?php

// Iniciem la sessió per poder guardar la cistella de compra.
session_start();


// Comprovem que el formulari s'ha enviat mitjançant POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recollim el producte enviat pel formulari.
    $producte = $_POST["producte"] ?? "";

    // Recollim la quantitat.
    $quantitat = $_POST["quantitat"] ?? 0;


    // Convertim la quantitat a un nombre enter.
    $quantitat = (int)$quantitat;


    // Comprovem que el producte sigui un dels dos productes disponibles.
    $producteCorrecte = (
        $producte == "samarreta" ||
        $producte == "pantalons"
    );


    // Comprovem que la quantitat sigui superior a 0.
    if ($producteCorrecte && $quantitat > 0) {


        // Comprovem si encara no existeix la cistella dins de la sessió.
        if (!isset($_SESSION["cistella"])) {

            // Creem una cistella buida.
            $_SESSION["cistella"] = [];
        }


        // Comprovem si el producte ja existeix dins de la cistella.
        if (isset($_SESSION["cistella"][$producte])) {

            // Si ja existeix, sumem la nova quantitat a l'anterior.
            $_SESSION["cistella"][$producte] += $quantitat;

        } else {

            // Si no existeix, guardem el producte amb la quantitat indicada.
            $_SESSION["cistella"][$producte] = $quantitat;
        }
    }
}


// Tornem a la pàgina principal de la botiga.
header("Location: index.html");

// Finalitzem l'execució.
exit;

?>