<?php
    class eliminaciones{

        public function eliminarAsistenciaDelAlumno($idAlumno,$idGrupo){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM asistencia WHERE id_Alumno ='$idAlumno' AND id_grupo='$idGrupo'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarAlumno($idAlumno,$idGrupo,$tutaDeLaFoto){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            unlink($tutaDeLaFoto);
            $sql = "DELETE FROM alumno WHERE id_Alumno='$idAlumno' AND id_grupo='$idGrupo'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarAlumnos( $idGrupo ){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM alumno WHERE  id_grupo='$idGrupo'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarGrupo($idGrupo,$idTurno,$idLicenciatura){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM grupo WHERE id_grupo= '$idGrupo' AND id_turno = '$idTurno' AND id_Licenciatura ='$idLicenciatura'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarAsistencias($idGrupo){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM asistencia WHERE id_grupo='$idGrupo'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarGrupos($idTurno,$idLicenciatura){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM grupo WHERE id_turno = '$idTurno' AND id_Licenciatura ='$idLicenciatura'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarTurno($idTurno){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM turno WHERE id_Turno='$idTurno'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarLicenciatura($idLicenciatura,$idPlantel){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM licenciatura WHERE id_Licenciatura='$idLicenciatura' AND id_Universidad='$idPlantel'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarLicenciaturas($idPlantel){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM licenciatura WHERE id_Universidad='$idPlantel'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarPlantel($idPlantel){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM universidad WHERE id_Universidad='$idPlantel'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }

        public function eliminarUsuario($idUsuario){
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "DELETE FROM usuario WHERE id_Usuario='$idUsuario'";
            $query = $conexion->query( $sql );
            return ( !$query ) ? false : true;
        }
    }
?>