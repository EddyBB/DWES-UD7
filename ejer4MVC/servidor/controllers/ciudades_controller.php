<?php

    function ciudadesServidor() {
        require "./models/ciudades_model.php";
        // Instanciamos un nuevo servidor SOAP
        $uri="http://localhost/DesarrolloEntornoServidor/DWES-UD7/ejer4MVC/servidor";
        $server = new SoapServer(null,array('uri'=>$uri));
        $server->addFunction("obtenerCiudades");
        $server->handle();
    }

?>