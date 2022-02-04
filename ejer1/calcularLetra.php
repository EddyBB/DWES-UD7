<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.45/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("suma");
$server->handle();

// Función para obtener raíz cuadrada
function suma($n1,$n2) {
    $resultado=$n1 + $n2;
    return $resultado;
}
?>