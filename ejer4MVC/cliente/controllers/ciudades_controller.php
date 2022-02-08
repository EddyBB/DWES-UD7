<?php

    function formulario(){
    // Vaciamos algunas variables
        $error = "";
        $resultado = [];
        $numHabitantes = "";

        // Iniciamos el cliente SOAP
        // Escribimos la dirección donde se encuentra el servicio
        $url = "http://localhost/DesarrolloEntornoServidor/DWES-UD7/ejer4MVC/servidor/index.php?controller=ciudades&action=ciudadesServidor";
        $uri = "http://localhost/DesarrolloEntornoServidor/DWES-UD7/";
        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

        // Ejecutamos las siguientes líneas al enviar el formulario
        if (isset($_POST['enviar'])) {
            // Establecemos los parámetros de envío
            if (!empty($_POST['numHabitantes']) >0) {
                $numHabitantes = $_POST['numHabitantes'];
                // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
                $resultado = $cliente->obtenerCiudades($numHabitantes);
            } else {
                $error = "<strong>Error:</strong> Debes introducir un numero mayor a 0<br/><br/>Ej: 45678987";
            }
        }
        include 'views/formulario_view.php';
    }

?>