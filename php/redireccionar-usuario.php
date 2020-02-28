<?php
    session_start();
    include ('../php/config.php');
    $usuario = $_GET['usuario'];
    $_SESSION['usuario'] = $usuario;
    switch ($_GET['tipoDeUsuario']){
        case 1:
            header('location: '.$raiz.'modulos/administrador.php');
            break;
        case 2:
            
        header('location: '.$raiz.'modulos/lista.php');
        break;
            
        case 0:
            header('location: '.$raiz.'login.html');
        break; 
    }
?>