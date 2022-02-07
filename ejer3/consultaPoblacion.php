<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Instanciamos un nuevo servidor SOAP
$uri="http://localhost/DesarrolloEntornoServidor/DWES-UD7/ejer3/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("obtenerCiudad");
$server->handle();

// Función para obtener raíz cuadrada
// function obtenerCiudad($numHabitantes) {
//     $resultado=substr("TRWAGMYFPDXBNJZSQVHLCKE",$dni%23,1);
//     return $resultado;
// }

function getConnection(){
    $user = 'root';
    $password = 'root';
    return new PDO('mysql:host=localhost;dbname=Poblacion', $user, $password);
}

function obtenerCiudad($numHabitantes){
    try {
        $conexion = getConnection();
        $sql = $conexion->prepare("SELECT * FROM `ciudades` WHERE numHabitantes >= :numHabitantes");
        $sql->bindParam(":numHabitantes",$numHabitantes);
        $sql->execute();
        
        return $sql->fetchAll();
        
    } catch (PDOException $e) {
        return $e->getMessage();
    }
    $conexion=null;
}
?>