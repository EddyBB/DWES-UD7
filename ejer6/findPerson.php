<?php

$error = "";
$resultado = "";

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {

    $params = Array(
        "id" => $_POST["id"]
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
    if (!empty($_POST['id'])) {

        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = $cliente->FindPerson($params);
        
    } else {
        $error = "<strong>Error:</strong> Debes introducir un numero mayor a 0<br/><br/>Ej: 45678987";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Buscar Persona - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Find Person</h1>
    <h2>Servicio Web + PHP + SOAP Demo cls</h2>
    <form action="findPerson.php" method="post">
        <?php
        print "<input type='number' name='id'>";

        print "<input type='submit' name='enviar' value='Buscar'>";
        print "<p class='error'>$error</p>";
        //print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";

        if(isset($_POST['enviar'])){
            foreach($resultado as $persona){
                echo $persona->Name . "<br>";
                echo $persona->SSN . "<br>";
                echo $persona->DOB . "<br>";

                echo "Home: ";
                echo $persona->Home->Street . "<br>";
                echo $persona->Home->City . "<br>";
                echo $persona->Home->State . "<br>";
                echo $persona->Home->Zip . "<br>";

                echo "Office: ";
                echo $persona->Office->Street . "<br>";
                echo $persona->Office->City . "<br>";
                echo $persona->Office->State . "<br>";
                echo $persona->Office->Zip . "<br>";

                echo "Color: ";
                echo $persona->FavoriteColors->FavoriteColorsItem . "<br>";
            }
        }
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Eddy</a></div>
</body>

</html>