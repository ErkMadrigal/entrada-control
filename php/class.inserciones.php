<?php
    class insertarConsultas {
        public function agregarPlantel($nombre,$direccion,$telefono){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $insertar ="INSERT INTO universidad VALUES('','$nombre','$direccion','$telefono')";
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }
        public function agregarLicenciatura($idUniversidad,$licenciatura){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $insertar ="INSERT INTO licenciatura VALUES('','$licenciatura','$idUniversidad')";
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }
        public function agregarTurno($turno){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $insertar ="INSERT INTO turno VALUES('','$turno')";
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }
        public function agregarGrupo($grupo,$ciclo,$cuatrimestre,$idLicenciatura,$idturno){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $insertar ="INSERT INTO grupo VALUES('','$grupo','$ciclo','$cuatrimestre','$idLicenciatura','$idturno')";
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }
        public function agregarAlumno($idGrupo,$matricula,$nombre,$apellidoPaterno,$apellidoMaterno,$direccion,$numeroCelular,$ciudad,$poblacion,$correo,$foto,$referencia,$parentesco,$numeroTelefonico){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            if(isset($foto)){
                $fotos = $foto["name"];
                $ruta = $foto["tmp_name"];
                $destino = '../fotos/'.$fotos;
                copy($ruta,$destino);
                $insertar ="INSERT INTO alumno VALUES ('','$matricula','$nombre','$apellidoPaterno','$apellidoMaterno','$direccion','$numeroCelular','$ciudad','$poblacion','$correo','$destino','$referencia','$parentesco','$numeroTelefonico',$idGrupo)";
            }else{
                $insertar ="INSERT INTO alumno VALUES ('','$matricula','$nombre','$apellidoPaterno','$apellidoMaterno','$direccion','$numeroCelular','$ciudad','$poblacion','$correo','$foto','$referencia','$parentesco','$numeroTelefonico',$idGrupo)";
            }
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }

        public function agregarUsuario( $usuario , $password , $tipoDeUsuario ){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $insertar = "INSERT INTO Usuario VALUES('','$usuario','$password','$tipoDeUsuario')";
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }

        public function agregarAsistencia( $idAlumno , $idGrupo ){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $insertar = "INSERT INTO asistencia VALUES(now(),'$idAlumno','$idGrupo')";
            $query = $conexion->query($insertar);
            return ( !$query ) ? false : true;
        }

    }
?>