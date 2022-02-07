<!DOCTYPE html>
<html>

<head>
    <title>Buscar Ciudades</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
    // Vaciamos algunas variables
    $error = "";
    $resultado = "";
    $numHabitantes = "";

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://localhost/DesarrolloEntornoServidor/DWES-UD7/ejer4MVC/consultaPoblacion.php";
    $uri = "http://localhost/DesarrolloEntornoServidor/DWES-UD7/ejer4MVC/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['numHabitantes']) >0) {
            $numHabitantes = $_POST['numHabitantes'];
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
            $resultado = $cliente->obtenerCiudad($numHabitantes);
        } else {
            $error = "<strong>Error:</strong> Debes introducir un numero mayor a 0<br/><br/>Ej: 45678987";
        }
    }
    ?>
    <h1>Obtener Ciudades</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='numHabitantes'>";
        print "<input type='submit' name='enviar' value='Enviar'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        foreach ($resultado as $ciudad) {
            
            print($ciudad["nombre"]. "<br>");
            print($ciudad["numHabitantes"]. "<br><br>");
            
        }
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Eddy Alejandro González Chávez</a></div>
</body>

</html>