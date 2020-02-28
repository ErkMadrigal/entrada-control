<?php
/*
==================================
	nombre del proyecto global
==================================
*/

	$raiz ='http://localhost/control-de-entrada/';

/*
==================================
	conexion a la base de datos
==================================
*/
	$servidor      = "localhost";
	$usuario	   = "root";
	$password      = "";
	$base_de_datos = "dbuniver";
	$conexion = mysqli_connect($servidor,$usuario,$password,$base_de_datos);
		if ($conexion->connect_error){
			die("Error: ".$conexion->connect_error);
		}
?>