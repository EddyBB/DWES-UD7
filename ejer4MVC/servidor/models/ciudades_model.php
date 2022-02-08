<?php

    function getConnection(){
        $user = 'root';
        $password = 'root';
        return new PDO('mysql:host=localhost;dbname=Poblacion', $user, $password);
    }

    function obtenerCiudades($numHabitantes){
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