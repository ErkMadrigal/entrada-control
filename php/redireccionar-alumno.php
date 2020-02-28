<?php
    session_start();
    include '../php/config.php';
    include '../php/class.conexion.php';
    include '../php/class.consultas.php';
    include '../php/construir-fecha.php';
    include '../php/class.inserciones.php';
    $consultas = new Consultas();
    $construirFecha = new construirFecha();
    $inseciones = new insertarConsultas();
    $fecha = $construirFecha->construirFecha();
    $obtenerDatosAlumno = $consultas->obtenerDatosAlumno($_GET['matricula']);
    $apellidoPaterno = $obtenerDatosAlumno[0][1];
    $apellidoMaterno = $obtenerDatosAlumno[0][2];
    $nombres = $obtenerDatosAlumno[0][3];
    $foto = ( !empty($obtenerDatosAlumno[0][4]) ) ? $obtenerDatosAlumno[0][4] : $raiz.'fotos/default.png';
    $grupo = $obtenerDatosAlumno[0][5];
    $licenciatura = $obtenerDatosAlumno[0][7];
    $plantel = $obtenerDatosAlumno[0][8];
    $_SESSION['apellidoPaterno'] =  utf8_encode($apellidoPaterno);
    $_SESSION['apellidoMaterno'] = utf8_encode($apellidoMaterno);
    $_SESSION['nombres'] =  $nombres;
    $_SESSION['foto'] = $foto;
    $_SESSION['grupo'] = $grupo;
    $_SESSION['licenciatura'] =  $licenciatura;
    $_SESSION['plantel'] =  $plantel;
    $_SESSION['fecha'] =  $fecha;
    $validarAsistencias =  $consultas->validarAsistencia(date("Y-m-d"),$obtenerDatosAlumno[0][0],$obtenerDatosAlumno[0][6]);
    if(!$validarAsistencias){
        $inseciones->agregarAsistencia($obtenerDatosAlumno[0][0],$obtenerDatosAlumno[0][6]);
    }
    header( 'location: '.$raiz.'modulos/datos-alumno.php');
?>
