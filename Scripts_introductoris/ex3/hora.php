<html>
<head>
   
</head>
<body>

<?php

$hora = date("H");

if ($hora >= 5 && $hora < 14) {
    $salutacio = "Bona dia!";
} elseif ($hora >= 14 && $hora < 19) {
    $salutacio = "Bona tarda!";
} else {
    $salutacio = "Bona nit!";
}

echo $salutacio;
echo "<br>";
echo "Hora del servidor: " . date("H");

?>

</body>
</html>