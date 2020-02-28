<?php 
    header('content-type: application/json; charset=utf-8'); 
    include './config.php';
    include './class.conexion.php';
    include './class.consultas.php';
    include './class.editarConsultas.php';
    include './class.inserciones.php';
    include './class.eliminaciones.php';
    $opcion =  ( isset( $_POST['opcion'] ) )  ? $_POST['opcion']  : 'no esta definida la variable'; 
    $consultas = new Consultas();
    $consultasEditar = new editarConsultas();
    $consultasInsertar = new insertarConsultas();
    $consultasEliminaciones = new eliminaciones();
    switch ($opcion) {
        
        case 'CargarPlanteles':
            $cargarPlanteles = $consultas->cargarPlanteles(); 
            if($cargarPlanteles != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarPlanteles;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontraron Planteles";
            }
        break;

        case 'cargarDatosDelPlantel':
            $cargarDatosDePlantel = $consultas->cargarDatosDelPlantel($_POST['idPlantel']); 
            if($cargarDatosDePlantel != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarDatosDePlantel;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontro informacion del plantel";
            }
        break;

        case 'editarPlantel':
            $editarPlantel = $consultasEditar->editarPlantel($_POST['idUniversidad'],$_POST['universidad'],$_POST['direccion'],$_POST['telefono']); 
            if($editarPlantel){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se edito correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo editar correctamente";
            }
        break;

        case 'agregarPlantel':
            $agregarPlantel = $consultasInsertar->agregarPlantel($_POST['universidad'],$_POST['direccion'],$_POST['telefono']); 
            if($agregarPlantel){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se agrego correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo agregar correctamente";
            }
        break;

        case 'eliminarPlantel':
            $cargarLicenciaturas = $consultas->cargarLicenciaturas($_POST['idPlantel']); 
            $cargarTurnos = $consultas->cargarTurnos(); 
            foreach($cargarLicenciaturas as $licenciatura){
                foreach($cargarTurnos as $turno){
                    if($consultas->cargarGrupos($licenciatura['id_Licenciatura'],$turno['id_turno']) != null){
                        foreach ($consultas->cargarGrupos($licenciatura['id_Licenciatura'],$turno['id_turno']) as  $grupo) {
                            if($consultas->cargarAlumnos($grupo['id_grupo']) != null){
                                $consultasEliminaciones->eliminarAsistencias($grupo['id_grupo']);
                                foreach($consultas->cargarAlumnos($grupo['id_grupo']) as $alumno){
                                    if($alumno['Foto'] != "")
                                        unlink($alumno['Foto']);
                                }   
                                $consultasEliminaciones->eliminarAlumnos($grupo['id_grupo']);    
                            }
                            $consultasEliminaciones->eliminarGrupos($turno['id_turno'],$licenciatura['id_Licenciatura']);
                        }
                    }
                }
            }
            $consultasEliminaciones->eliminarLicenciaturas($_POST['idPlantel']);
            $consultasEliminaciones->eliminarPlantel($_POST['idPlantel']);
        break;

        case 'cargarLicenciaturas':
            $cargarLicenciaturas = $consultas->cargarLicenciaturas($_POST['idLicenciatura']); 
            if($cargarLicenciaturas != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarLicenciaturas;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontraron Licenciaturas";
            }
        break;

        case 'cargarDatosDeLaLicenciatura':
            $cargarDatosDeLaLicenciatura = $consultas->cargarDatosDeLaLicenciatura($_POST['idLicenciatura']); 
            if($cargarDatosDeLaLicenciatura != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarDatosDeLaLicenciatura;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontro informacion de la Licenciatura";
            }
        break;

        case 'agregarLicenciatura':
            $agregarLicenciatura = $consultasInsertar->agregarLicenciatura($_POST['iduniversidad'],$_POST['licenciatura']); 
            if($agregarLicenciatura){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se agrego correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo agregar correctamente";
            }
        break;

        case 'editarLicenciatura':
            $editarLicenciatura = $consultasEditar->editarLicenciatura($_POST['idLicenciatura'],$_POST['licenciatura']); 
            if($editarLicenciatura){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se edito correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo editar correctamente";
            }
        break;

        case 'eliminarLicenciatura':
            $cargarTurnos = $consultas->cargarTurnos(); 
            foreach($cargarTurnos as $turno){
                if($consultas->cargarGrupos($_POST['idLicenciatura'],$turno['id_turno']) != null){
                    foreach($consultas->cargarGrupos($_POST['idLicenciatura'],$turno['id_turno']) as $grupo){
                        $consultasEliminaciones->eliminarAsistencias($grupo['id_grupo']);
                        foreach($consultas->cargarAlumnos($grupo['id_grupo']) as $alumno){
                            unlink($alumno['Foto']);
                        }
                        $consultasEliminaciones->eliminarAlumnos($grupo['id_grupo']);
                    }
                    $consultasEliminaciones->eliminarGrupos($turno['id_turno'],$_POST['idLicenciatura']);
                }
            }
            $consultasEliminaciones->eliminarLicenciatura($_POST['idLicenciatura'],$_POST['idPlantel']);
        break;

        case 'cargarTurnos':
            $cargarTurnos = $consultas->cargarTurnos(); 
            if($cargarTurnos != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarTurnos;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontraron Turnos";
            }
        break;

        case 'agregarTurno':
            $agregarTurno = $consultasInsertar->agregarTurno($_POST['turno']); 
            if($agregarTurno){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se agrego correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo agregar correctamente";
            }
        break;

        case 'cargarDatosDelTurno':
            $cargarDatosDeTurno = $consultas->cargarDatosDeTurno($_POST['idTurno']); 
            if($cargarDatosDeTurno != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarDatosDeTurno;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontro informacion de la Licenciatura";
            }
        break;

        case 'editarTurno':
            $editarTurno = $consultasEditar->editarTurno($_POST['idturno'],$_POST['turno']); 
            if($editarTurno){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se edito correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo editar correctamente";
            }
        break;

        case 'eliminarTurno':
            $cargarGrupos = $consultas->cargarGrupos($_POST['idLicenciatura'],$_POST['idTurno']); 
            foreach( $cargarGrupos as $value ){
                $consultasEliminaciones->eliminarAsistencias($value['id_grupo']);
                foreach($consultas->cargarAlumnos($value['id_grupo']) as $value){
                    unlink($value['Foto']);
                }
                $consultasEliminaciones->eliminarAlumnos($value['id_grupo']);
            }
            $consultasEliminaciones->eliminarGrupos($_POST['idTurno'],$_POST['idLicenciatura']);
            $consultasEliminaciones->eliminarTurno($_POST['idTurno']);
        break;

        case 'cargarGrupos':
            $cargarGrupos = $consultas->cargarGrupos($_POST['idLicenciatura'],$_POST['idTurno']); 
            if($cargarGrupos != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarGrupos;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontraron Grupos";
            }
        break;

        case 'cargarDatosDelGrupo':
            $cargarDatosDelGrupo = $consultas->cargarDatosDelGrupo($_POST['idGrupo']); 
            if($cargarDatosDelGrupo != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarDatosDelGrupo;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontro informacion de la Licenciatura";
            }
        break;

        case 'editarGrupo':
            $editarGrupo = $consultasEditar->editarGrupo($_POST['idGrupo'],$_POST['grupo'],$_POST['ciclo'],$_POST['cuatrimestre']); 
            if($editarGrupo){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se edito correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo editar correctamente";
            }
        break;

        case 'agregarGrupo':
            $agregarGrupo = $consultasInsertar->agregarGrupo($_POST['grupo'],$_POST['ciclo'],$_POST['cuatrimestre'],$_POST['idLicenciatura'],$_POST['idturno']); 
            if($agregarGrupo){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se agrego correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo agregar correctamente";
            }
        break;

        case 'eliminarGrupo':
            $consultasEliminaciones->eliminarAsistencias($_POST['idGrupo']);
            $cargarAlumnos = $consultas->cargarAlumnos($_POST['idGrupo']);
            foreach($cargarAlumnos  as $value){
                unlink($value['Foto']);
            }
            $consultasEliminaciones->eliminarAlumnos($_POST['idGrupo']);
            $consultasEliminaciones->eliminarGrupo($_POST['idGrupo'],$_POST['idTurno'],$_POST['idLicenciatura']);
        break;

        case 'cargarAlumnos':
            $cargarAlumnos = $consultas->cargarAlumnos($_POST['idGrupo']);
            if($cargarAlumnos != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarAlumnos;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontraron Alumnos";
            }
        break;

        case 'cargarDatosDelAlumno':
            $cargarDatosDeAlumno = $consultas->cargarDatosDeAlumno($_POST['idAlumno']); 
            if($cargarDatosDeAlumno != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarDatosDeAlumno;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontro informacion de la Licenciatura";
            }
        break;

        case 'editarAlumno':
            $rutaDeLaFoto = $consultas->obtenerRutaDeLaFoto($_POST['idAlumnoEditar']);
            $editarAlumno = $consultasEditar->editarAlumno($_POST['idAlumnoEditar'],$_POST['matriculaAlumnoEditar'],$_POST['nombreAlumnoEditar'],$_POST['apellidoPaternoAlumnoEditar'],$_POST['apellidoMaternoAlumnoEditar'],$_POST['direccionAlumnoEditar'],$_POST['numeroCelularAlumnoEditar'],$_POST['ciudadAlumnoEditar'],$_POST['poblacionAlumnoEditar'],$_POST['correoAlumnoEditar'],$_FILES['cargarFotoAlumnoEditar'],$_POST['referenciaAlumnoEditar'],$_POST['parentescoAlumnoEditar'],$_POST['numeroTelefonicoAlumnoEditar'],$rutaDeLaFoto[0]); 
            if($editarAlumno){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se edito correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo editar correctamente";
            }
        break;

        case 'agregarAlumno':
            $validarAlumno = $consultas->validarAlumno($_POST['matriculaAlumnoAgregar']);
            if($validarAlumno){
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "El alumno ya existe, intenta de nuevo";
            }
            else{
                $agregarAlumno = $consultasInsertar->agregarAlumno($_POST['idGrupoAlumnoAgregar'],$_POST['matriculaAlumnoAgregar'],$_POST['nombreAlumnoAgregar'],$_POST['apellidoPaternoAlumnoAgregar'],$_POST['apellidoMaternoAlumnoAgregar'],$_POST['direccionAlumnoAgregar'],$_POST['numeroCelularAlumnoAgregar'],$_POST['ciudadAlumnoAgregar'],$_POST['poblacionAlumnoAgregar'],$_POST['correoAlumnoAgregar'],$_FILES['cargarFotoAlumnoAgregar'],$_POST['referenciaAlumnoAgregar'],$_POST['parentescoAlumnoAgregar'],$_POST['numeroTelefonicoAlumnoAgregar']); 
                if($agregarAlumno){
                    $respuesta["estado"] = "ok";
                    $respuesta['mensaje']= "Se agrego correctamente";
                }else{
                    $respuesta["estado"] = "error";
                    $respuesta['mensaje']= "no se pudo agregar correctamente";
                }
            }
        break;

        case 'eliminarAlumno':
            $elimarAsistencia = $consultasEliminaciones->eliminarAsistenciaDelAlumno($_POST['idAlumno'],$_POST['idGrupo']);
            $rutaDeLaFoto = $consultas->obtenerRutaDeLaFoto($_POST['idAlumno']);
            $eliminarAlumno = $consultasEliminaciones->eliminarAlumno($_POST['idAlumno'],$_POST['idGrupo'], $rutaDeLaFoto[0]);
            $respuesta['mensaje']=  $elimarAsistencia;
            if($eliminarAlumno){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se ha eliminado correctamente";
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "No se ha podido eliminar correctamente";
            }
        break;

        case 'crearUsuario':
            $validarUsuario = $consultas->validarUsuario($_POST['usuario'],$_POST['password'],$_POST['tipoDeUsuario']);
            if($validarUsuario){
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "El usuario ya existe, intenta de nuevo";
            }
            else{
                $agregarUsuario = $consultasInsertar->agregarUsuario($_POST['usuario'],$_POST['password'],$_POST['tipoDeUsuario']); 
                if($agregarUsuario){
                    $respuesta["estado"] = "ok";
                    $respuesta['mensaje']= "Se creo correctamente";
                }else{
                    $respuesta["estado"] = "error";
                    $respuesta['mensaje']= "no se pudo crear correctamente";
                }
            }
        break;

        case 'validarUsuario':
            $validarUsuario = $consultas->validarUsuarioLogin($_POST['usuario'],$_POST['password']);
            if($validarUsuario){
                $cargarDatosDelUsuario = $consultas->cargarDatosDelUsuarioLogeado($_POST['usuario'],$_POST['password']);
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= $cargarDatosDelUsuario;
                
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "El usuario no existe";
            }
        break;

        case 'validarMatricula':
            $validarMatricula = $consultas->validarMatricula($_POST['matricula']);
            if($validarMatricula){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']=  $_POST['matricula'];
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "La matricula es muy corta o no existe, por favor intenta de nuevo";
            }
            
        break;

        case 'cargarFotografias':
            if(count($_FILES['cargarFotos']['tmp_name']) != 1){
                $claseConexion = new Conexion();
                $conexion = $claseConexion->conexion();
                $totalDeImegenes = count($_FILES["cargarFotos"]["tmp_name"]);
                $cargarTurnos =  $consultas->cargarTurnos();
                foreach($consultas->cargarTurnos() as $turno){
                    if($consultas->cargarGrupos($_POST['licenciaturasSubirFotos'],$turno['id_turno']) != null){
                        foreach($consultas->cargarGrupos($_POST['licenciaturasSubirFotos'],$turno['id_turno']) as $grupo){
                            foreach($consultas->cargarAlumnos($grupo['id_grupo']) as $alumno){
                                for ($i=0; $i < $totalDeImegenes ; $i++) { 
                                    if(explode(".png", $_FILES["cargarFotos"]["name"][$i])[0] == $alumno['matricula'] ){
                                        if(isset($alumno['Foto'])){
                                            unlink($alumno['Foto']);
                                        }
                                        $fotos = $_FILES["cargarFotos"]["name"][$i];
                                        $ruta = $_FILES["cargarFotos"]["tmp_name"][$i];
                                        $destino = '../fotos/'.$fotos;
                                        copy($ruta,$destino);
                                        $actualizar = "UPDATE alumno SET Foto='$destino' WHERE id_Alumno = '".$alumno['id_Alumno']."'";
                                        $conexion->query($actualizar);
                                        $respuesta['estado']  = "ok";
                                        $respuesta['mensaje']  = "se han cargado con exito";
                                    }
                                }
                            }
                        }
                    }
                }
            }
            else{
                $respuesta['estado']  = "error";
                $respuesta['mensaje']  = "Error por favor carga las fotografias";
            }
        break;

        case 'cargarCsv':
            if($_FILES['archivo']['type'] != null && $_FILES['archivo']['size']  != null && $_FILES['archivo']['tmp_name'] != null){
                $nombreDelGrupo = $consultas->cargarDatosDelGrupo($_POST['grupo'])[0]['Nombre'];
                $archivoScv = file($_FILES['archivo']['tmp_name']);
                foreach($archivoScv as $numeroDeLinea => $linea){
                    if($numeroDeLinea!=0){
                        $datos = explode(",",$linea);
                        if($nombreDelGrupo == trim($datos[0])){
                            $validarAlumno = $consultas->validarMatricula(trim($datos[1]));
                            if(!$validarAlumno){
                                $ingresarNuevoAlumno = $consultasInsertar->agregarAlumno($_POST['grupo'],trim($datos[1]),trim($datos[5]),trim($datos[3]),trim($datos[4]),'','','','','','','','',''); 
                                if($ingresarNuevoAlumno){
                                    $respuesta['estado'] = 'ok';
                                    $respuesta['mensaje'] =  "se ha cargado la lista exitosamente";
                                }
                            }else{
                                $respuesta['estado'] = 'ok';
                                $respuesta['mensaje'] =  "se ha cargado la lista exitosamente";
                            }
                        }
                    }
                }
            }else{
                $respuesta['estado'] = 'error';
                $respuesta['mensaje'] = "Por favor carga un archivo CSV";
            }
        break;

        case 'cargarUsuarios':
            $cargarUsuarios = $consultas->cargarUsuarios(); 
            if($cargarUsuarios != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarUsuarios;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontraron Usuarios";
            }
        break;

        case 'cargarDatosDeUsuario':
            $cargarDatosDeUsuario = $consultas->cargarDatosDeUsuario($_POST['idUsuario']); 
            if($cargarDatosDeUsuario != null){
                $respuesta["estado"] = "ok";
                $respuesta["mensaje"] = $cargarDatosDeUsuario;
            }
            else{
                $respuesta["estado"] = "error";
                $respuesta["mensaje"] = "No se encontro informacion del Usuario";
            }
        break;
        case 'eliminarUsuario':
            $eliminarUsuario = $consultasEliminaciones->eliminarUsuario($_POST['idUsuario']);
        break;
        
        case 'editarUsuario':
            $editarUsuario = $consultasEditar->editarUsuario($_POST['idUsuario'],$_POST['usuario'],$_POST['password'],$_POST['tipoDeUsuario']); 
            if($editarUsuario){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se edito correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo editar correctamente";
            }
        break;

        case 'agregarUsuario':
            $agregarUsuario = $consultasInsertar->agregarUsuario($_POST['usuario'],$_POST['password'],$_POST['tipoUsuario']); 
            if($agregarUsuario){
                $respuesta["estado"] = "ok";
                $respuesta['mensaje']= "Se agrego correctamente";
            }else{
                $respuesta["estado"] = "error";
                $respuesta['mensaje']= "no se pudo agregar correctamente";
            }
        break;
    }
    
    echo json_encode($respuesta);
?>