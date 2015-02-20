<?php

/* 
 * Inicio 17/02/2015
 */

class Conexion{

    public static function open(){
        $conn = new mysqli("localhost", "root", "", "catalogocuenta");
        if ($conn->connect_error) {
            echo "No se pudo conectar al servidor: ", $conn->connect_error;
        } else {
            $conn->set_charset("utf8");
            return $conn;
        }
        
    }
}