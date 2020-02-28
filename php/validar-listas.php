<?php
session_start();
include './config.php';
include './class.conexion.php';
include './class.consultas.php';
$claseConsultas = new Consultas();
$nombrePlantel = $claseConsultas->cargarDatosDelPlantel($_POST['plantel'])[0]['Nombre'];
$nombreLicenciatura = $claseConsultas->cargarDatosDeLaLicenciatura($_POST['licenciaturas'])[0]['Licenciatura'];
$nombreTurno = $claseConsultas->cargarDatosDeTurno(explode(",",$_POST['turnos'])[0])[0]['Turno'];
$nombreGrupo = $claseConsultas->cargarDatosDelGrupo($_POST['grupo'])[0]['Nombre'];
if($nombrePlantel != null && $nombreLicenciatura != null && $nombreTurno != null  && $nombreGrupo != null){
	$_SESSION["Plantel"]= $nombrePlantel; 
	$_SESSION["carrera"] = $nombreLicenciatura;
	$_SESSION["turno"] = $nombreTurno;
	$_SESSION["grupo"] = $nombreGrupo;	
	header( 'location: '.$raiz.'modulos/ver-listas.php');
}
else {
	header( 'location: '.$raiz.'modulos/lista.php');
}
?>