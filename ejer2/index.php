<!DOCTYPE html>
<html>

<head>
    <title>Par o impar</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
    // Vaciamos algunas variables
    $error = "";
    $resultado = "";
    $n1 = "";

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://192.168.129.70/DWES-UD7/ejercicio2/parImpar.php";
    $uri = "http://192.168.129.70/DWES-UD7/ejercicio2/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['n1']) >0) {
            $n1 = $_POST['n1'];
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
            $resultado = "El número es: " . $cliente->parImpar($n1);
        } else {
            $error = "<strong>Error:</strong> Debes introducir un numero mayor a 0<br/><br/>Ej: 45678987";
        }
    }
    ?>
    <h1>Obtener par impar</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='n1'>";
        print "<input type='submit' name='enviar' value='Impar o Par'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>

</html>