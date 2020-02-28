<?php
    /* 
    ========================================
            configuracion de la  database
    ========================================
    */
    class Conexion {
        public function conexion(){
            //configuracion de manera local con la base de datos de mysql, se pueden remplazar por los datos del hosting
            $host = "localhost";
            $nombreBaseDeDatos = "dbuniver";
            $usuario = "root";
            $contraseña = ""; 
            $conexion = mysqli_connect($host,$usuario,$contraseña,$nombreBaseDeDatos);
            return $conexion; 
        }
    }
?>
