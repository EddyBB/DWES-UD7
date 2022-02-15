<?php

$error = "";
$resultado = "";

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {

    $params = Array(
        "name" => $_POST["name"]
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
    if (!empty($_POST['name'])) {

        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = $cliente->GetByName($params);
        
    } else {
        $error = "<strong>Error:</strong> Debes introducir un nombre que esté en el find person<br/><br/>Ej: 45678987";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Get By Name - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Get By Name</h1>
    <h2>Servicio Web + PHP + SOAP Demo cls</h2>
    <form action="getByName.php" method="post">
        <?php
        print "<input type='text' name='name'>";

        print "<input type='submit' name='enviar' value='Buscar'>";
        print "<p class='error'>$error</p>";
        //print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";

        if(isset($_POST['enviar'])){
            foreach($resultado->GetByNameResult as $persona){
                echo $persona . "<br>";

            }
        }
       
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Eddy</a></div>
</body>

</html>