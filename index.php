<html>
    title>Problema</title>
-</head>
<body>
<?php
    $dia = 24; //se declara una variable tipo integer
    $sueldo = 758.43; //se declara una variable de tipo double
    $nombre = "Juan"; //se declara una variable de tipo string
    $exite = true; //se declara una variable de tipo boolean
    echo "Variable entera";
    echo $dia;
    echo "<br>";
    echo "Variable double";
    echo $sueldo;
    echo "<br>";
    echo "Variable string";
    echo $nombre;
    echo "<br>";
    echo "Variable booleana";
    echo $exite;
   
    $var1 = "3";
    settype($var1, "integer"); //forzamos cambio a entero
    echo $var1; // 3
?>        
</body>
</html>