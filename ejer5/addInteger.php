<?php

$error = "";
$resultado = "";

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {

    $params = Array(
        "Arg1" => $_POST["num1"],
        "Arg2" => $_POST["num2"]
    );

    $options = Array(
        "uri"=> $wsdl,
        "style"=> SOAP_RPC,
        "use"=> SOAP_ENCODED,
        "soap_version"=> SOAP_1_1,
        "cache_wsdl"=> WSDL_CACHE_BOTH,
        "connection_timeout" => 15,
        "trace" => false,
        "encoding" => "UTF-8",
        "exceptions" => false,
    );

    $cliente = new SoapClient($wsdl, $options);

    // Establecemos los parámetros de envío
    if (!empty($_POST['num1']) && !empty($_POST['num2']) > 0) {

        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = $cliente->AddInteger($params)->AddIntegerResult;
    } else {
        $error = "<strong>Error:</strong> Debes introducir un numero mayor a 0<br/><br/>Ej: 45678987";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Calcular Letra DNI - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Add Integer</h1>
    <h2>Servicio Web + PHP + SOAP Demo cls</h2>
    <form action="addInteger.php" method="post">
        <?php
        print "<input type='number' name='num1'>";
        print "<input type='number' name='num2'>";

        print "<input type='submit' name='enviar' value='Calcular'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>

</html>