<?php
        session_start();
        error_reporting(0);
        if(!isset($_SESSION['usuario'])){
            include '../modulos/error.php';
            header ("refresh:3; url=".$raiz."login.php");
            die();
        }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $titulo; ?></title>
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