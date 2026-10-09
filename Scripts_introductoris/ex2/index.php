<html>
<head>
   
</head>
<body>

    <h1>Conversor de monedes</h1>

    <h2>Euros a dòlars</h2>

    <form method="post">
        <label>Quantitat en euros:</label>
        <input type="number" name="euros" step="0.01" required>
        <input type="submit" name="convertir_euros" value="Convertir">
    </form>

    <?php
    if (isset($_POST["convertir_euros"])) {
        $euros = $_POST["euros"];

        $dollars = $euros * 1.17;

        echo "<p>$euros € són aproximadament " 
            . number_format($dollars, 2) 
            . " $</p>";
    }
    ?>

    <hr>

    <h2>Dòlars a euros</h2>

    <form method="post">
        <label>Quantitat en dòlars:</label>
        <input type="number" name="dollars" step="0.01" required>
        <input type="submit" name="convertir_dollars" value="Convertir">
    </form>

    <?php
    if (isset($_POST["convertir_dollars"])) {
        $dollars = $_POST["dollars"];

        $euros = $dollars / 1.17;

        echo "<p>$dollars $ són aproximadament " 
            . number_format($euros, 2) 
            . " €</p>";
    }
    ?>

</body>
</html>