<?php

$error = "";
$resultado = "";

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {


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
    $resultado = $cliente->Mission();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mission - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Mission</h1>
    <h2>Servicio Web + PHP + SOAP Demo cls</h2>
    <form action="mission.php" method="post">
        <?php


        print "<input type='submit' name='enviar' value='Buscar'>";
        print "<p class='error'>$error</p>";
        //print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";

        if(isset($_POST['enviar'])){
            echo $resultado->MissionResult;
            echo "</p>";
        }
        
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Eddy</a></div>
</body>

</html>