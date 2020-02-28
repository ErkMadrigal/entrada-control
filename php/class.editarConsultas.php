<?php
    class editarConsultas {
        public function editarPlantel($idPlantel,$nombre,$direccion,$telefono){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $actualizar ="UPDATE universidad SET Nombre='$nombre', Direccion='$direccion', Telefono='$telefono' WHERE id_Universidad = '$idPlantel'";
            $query = $conexion->query($actualizar);
            return ( !$query ) ? false : true;
        }
        public function editarLicenciatura($idLicenciatura,$licenciatura){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $actualizar ="UPDATE licenciatura SET Licenciatura='$licenciatura' WHERE id_Licenciatura = '$idLicenciatura'";
            $query = $conexion->query($actualizar);
            return ( !$query ) ? false : true;
        }
        public function editarTurno($idturno,$turno){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $actualizar ="UPDATE turno SET Turno='$turno' WHERE id_Turno = '$idturno'";
            $query = $conexion->query($actualizar);
            return ( !$query ) ? false : true;
        }
        public function editarGrupo($idGrupo,$nombre,$ciclo,$cuatrimestre){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $actualizar = "UPDATE grupo SET Nombre='$nombre', Ciclo='$ciclo', Cuatrimestre='$cuatrimestre' WHERE id_grupo = '$idGrupo'";
            $query = $conexion->query($actualizar);
            return ( !$query ) ? false : true;
        }
        public function editarAlumno($idAlumno,$matricula,$nombre,$apellidoPaterno,$apellidoMaterno,$direccion,$numeroCelular,$ciudad,$poblacion,$correo,$foto,$referencia,$parentesco,$numeroTelefonico,$rutaDeLaFoto){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            if(!empty($foto['name'])){
                $fotos = $foto["name"];
                $ruta = $foto["tmp_name"];
                $destino = '../fotos/'.$fotos;
                copy($ruta,$destino);
                unlink($rutaDeLaFoto);
                $actualizar ="UPDATE alumno SET matricula='$matricula', nombres='$nombre', Apellido_Paterno='$apellidoPaterno',Apellido_Materno='$apellidoMaterno',Direccion='$direccion',Numero_Celular='$numeroCelular',Ciudad='$ciudad',Poblacion='$poblacion',Correo='$correo',Foto='$destino',Nombre_de_Referencia='$referencia',parentesco='$parentesco',Numero_Telefonico='$numeroTelefonico' WHERE id_alumno = '$idAlumno'";
            }
            else{
                $actualizar ="UPDATE alumno SET matricula='$matricula', nombres='$nombre', Apellido_Paterno='$apellidoPaterno',Apellido_Materno='$apellidoMaterno',Direccion='$direccion',Numero_Celular='$numeroCelular',Ciudad='$ciudad',Poblacion='$poblacion',Correo='$correo',Nombre_de_Referencia='$referencia',parentesco='$parentesco',Numero_Telefonico='$numeroTelefonico' WHERE id_alumno = '$idAlumno'";
            }
            $query1 = $conexion->query($actualizar);
            return ( !$query1 ) ? false : true;
        } 
        public function editarUsuario($idUsuario,$usuario,$password,$tipoDeUsuario){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $actualizar ="UPDATE usuario SET usuario='$usuario', password='$password', Tipo='$tipoDeUsuario' WHERE id_Usuario = '$idUsuario'";
            $query = $conexion->query($actualizar);
            return ( !$query ) ? false : true;
        }
    }
?>