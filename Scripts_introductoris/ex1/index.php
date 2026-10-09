<html>
    <head>

    </head>
    <body>
        <?php
        echo "Hola Mundo!"

        ?>
        <form action="" method="post">
            Nom:<input type="text" name="nombre"><br>
            Cognoms: <input type="text" name="cognoms"><br>
            Email: <input type="text" name="email"><br>
            Missatge: <textarea name="missatge" cols="30" rows="10"></textarea>
            <input type="submit" value="Enviar">
        </form>
        <?php
        if (isset($_GET["nombre"]) && 
            isset($_GET["cognoms"])
            isset($_GET["email"]) 
            isset($_GET["missatge"])){

            $nom = $_POST["nombre"];
            $cognoms = $_POST["cognoms"];
            $email= $_POST["email"];
            $missatge = $_POST["missatge"];
        
            echo "Missate rebut, " . $nom . " " . $cognoms . ". Gracies per contactar amb nosaltres. Li respondrem al seu correu: " . $email . ".<br>";
            echo "<form action='index.php' method='get'><button type='submit'>Tornar</button></form>";
        
            } else {
                echo "No s'ha desat el missatge. Error.";
                echo "<form action='index.html' method='get'><button type='submit'>Tornar</button></form>";
            }
        ?> 
        
    </body>
</html>