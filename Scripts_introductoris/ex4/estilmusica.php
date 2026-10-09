<?php
$missatge = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["musica"])) {

        $musica = $_POST["musica"];

        switch ($musica) {
            case "rock":
                $missatge = "T'agrada el Rock! Energia, guitarres i molta potència.";
                break;

            case "pop":
                $missatge = "T'agrada el Pop! Cançons enganxoses i molt bon ritme.";
                break;

            case "rap":
                $missatge = "T'agrada el Rap! Ritme, rimes i molta personalitat.";
                break;

            case "electronica":
                $missatge = "T'agrada la música Electrònica! Beats i ganes de ballar.";
                break;
        }

    } else {
        $missatge = "Has de seleccionar un estil de música.";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Enquesta de música</title>
</head>
<body>

    <h1>Quin estil de música t'agrada més?</h1>

    <form method="POST">

        <input type="radio" name="musica" value="rock">
        Rock
        <br>

        <input type="radio" name="musica" value="pop">
        Pop
        <br>

        <input type="radio" name="musica" value="rap">
        Rap
        <br>

        <input type="radio" name="musica" value="electronica">
        Electrònica
        <br><br>

        <input type="submit" value="Enviar">

    </form>

    <?php
    if ($missatge != "") {
        echo "<h2>$missatge</h2>";
    }
    ?>

</body>
</html>