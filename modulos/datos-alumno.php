<?php
    session_start();
    error_reporting(0);
    include '../php/config.php';

    if(!isset($_SESSION['apellidoPaterno'])){
        include '../modulos/error.php';
        header ("refresh:1; url=".$raiz."index.php");
        die();
    }
    header( "refresh:1; url=".$raiz."index.php" );
    session_destroy();
    ini_set('date.timezone','America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $titulo="Datos del alumno"; ?></title>
        <!--icono-->
        <link rel="shortcut icon" href="<?php echo $raiz; ?>img/ico/icono.ico"> 
        <!--librerias awesome-->
        <link rel="stylesheet" href="<?php echo $raiz; ?>css/font-awesome.css">
        <!--librerias foundation-->
        <link rel="stylesheet" href="<?php echo $raiz; ?>css/foundation.css">
        <!--librerias css personalizadas-->
        <link rel="stylesheet" href="<?php echo $raiz; ?>css/control-entrada.css">
        <link rel="stylesheet" href="<?php echo $raiz; ?>css/jRoll.css">
         <!-- lbreria motion para modals e inputs -->
        <link rel="stylesheet" href="<?php echo $raiz; ?>css/motion-ui.min.css" />
    </head>
    <body class="fondo">
    	<div class="rectangulo-verde"></div>
    	<div class="rectangulo-azul">
    		<h1 class="text-center titulos-h1">Datos del Alumno</h1>
    	</div>
        <div class="separador-datos"></div>
        <div class="row">
            <div class="medium-6 columns ">
                <div class="row">
                    <div class="column datos-alumno">
                        <p> <strong>Universidad:     </strong><?php echo $_SESSION['plantel'];?></p>
                        <p> <strong>Licenciatura:    </strong><?php  echo $_SESSION['licenciatura']; ?></p>
                        <p> <strong>Nombre:   </strong><?php echo  $_SESSION['nombres']." ".$_SESSION['apellidoPaterno']. " ".$_SESSION['apellidoMaterno'];?></p>
                        <p> <strong>Grupo:   </strong><?php echo $_SESSION['grupo']; ?> </p>
                        <p> <strong>Fecha:   </strong><?php  echo $_SESSION['fecha'];  ?></p>
                        <p> <strong>Hora de registro:    </strong><?php $time = time(); echo date("h:i:s", $time);  ?></p>
                    </div>
                </div>
            </div>        
            <div class="medium-6 columns text-center">
               <img class='fotos-alumno' src="<?php echo $_SESSION['foto']; ?>">   
            </div>        
        </div>
    </body>
</html>
