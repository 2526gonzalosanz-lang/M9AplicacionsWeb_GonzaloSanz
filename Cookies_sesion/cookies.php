<?php
    $fechahora = "este es el primer acceso";
    $contador = 1;
    date_default_timezone_set('Europe/Paris');
    // si la variable está asignada quiere decir que existe la cookie
    if (isset($_COOKIE['fechahora'])){
        //fecha hora del último acceso
        $fechahora = $_COOKIE['fechahora'];
        $contador = $_COOKIE['contador'];
    }
    //actualización de la cookie
    //mandar cualquier cabecera a la salida
    setcookie("fechahora", date('d/m/Y h:i:s')); //actualiza la cookie
    setcookie("contador", $contador +1); //actualiza la cookie
?>

<html>
    <head> <title>Uso de cookies en PHP</title> </head>
    <body>
    <h3>Fecha y hora actual
    <?php
        echo date('d/m/Y h:i:s');
    ?>
    </h3><br><b>Contenido de la superglobal $_COOKIE</b><br>
<?php
    echo "Elemento fechahora:".$_COOKIE['fechahora']."<br>";
    echo "Elemento contador:".$_COOKIE['contador']."<br><br>";
    echo "<br>La últimaa vez que accedió a la página: $fechahora<br>";
    echo "<br>Cantidad de accesos a está página: $contador<br>";
?>
    </body>
</html>