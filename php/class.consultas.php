<?php
    class Consultas {
        public function cargarPlanteles(){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM universidad ";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }
        public function cargarDatosDelPlantel( $idPlantel ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM universidad WHERE id_Universidad='$idPlantel'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarLicenciaturas( $idPlantel ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM licenciatura WHERE id_Universidad ='$idPlantel'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarDatosDeLaLicenciatura( $idLicenciatura ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM licenciatura WHERE id_Licenciatura ='$idLicenciatura'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarTurnos(){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM turno";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }
        public function cargarDatosDeTurno( $idTurno ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM turno WHERE id_turno='$idTurno'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }
        public function cargarGrupos( $idLicenciatura , $idTurno ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM Grupo WHERE id_Licenciatura ='$idLicenciatura' and id_turno= '$idTurno'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarDatosDelGrupo( $idGrupo ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM grupo WHERE id_grupo='$idGrupo'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarAlumnos( $idGrupo ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * from alumno WHERE id_grupo='$idGrupo'";
            mysqli_set_charset($conexion,"utf8");
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarDatosDeAlumno( $idAlumno ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * from alumno WHERE id_Alumno='$idAlumno'";
            mysqli_set_charset($conexion,"utf8");
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function obtenerRutaDeLaFoto( $idAlumno ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT Foto FROM alumno WHERE id_Alumno='$idAlumno'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result[0];
            }
            return $rows;
        }

        public function validarAlumno( $matricula ){
            $existeAlumno = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM alumno WHERE matricula = '$matricula'";
            $query = $conexion->query( $sql );
            if ($query->num_rows > 0){
                $existeAlumno = true;
            }
            else{
                $existeAlumno = false;
            }
            return $existeAlumno;
        }

        public function validarUsuario( $usuario , $password , $tipoDeUsuario ){
            $existeUsuario = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM Usuario WHERE Usuario ='$usuario' AND Password ='$password' AND Tipo ='$tipoDeUsuario'";
            $query = $conexion->query( $sql );
            if ($query->num_rows > 0){
                $existeUsuario = true;
            }
            else{
                $existeUsuario = false;
            }
            return $existeUsuario;
        }

        public function cargarDatosDelUsuario( $usuario , $password , $tipoDeUsuario ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM Usuario WHERE Usuario ='$usuario' AND Password ='$password' AND Tipo ='$tipoDeUsuario'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }
        
        public function validarMatricula( $matricula ){
            $existeMatricula = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM alumno WHERE matricula='$matricula'";
            $query = $conexion->query( $sql );
            if ($query->num_rows > 0){
                $existeMatricula = true;
            }
            else{
                $existeMatricula = false;
            }
            return $existeMatricula;
        }

        public function obtenerDatosAlumno( $matricula ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT alumno.id_Alumno , alumno.Apellido_Paterno , alumno.Apellido_Materno , alumno.Nombres ,  alumno.Foto , grupo.Nombre , grupo.id_grupo , licenciatura.Licenciatura , universidad.Nombre  FROM alumno 
            INNER JOIN grupo ON grupo.id_grupo = alumno.id_grupo 
            INNER JOIN licenciatura ON licenciatura.id_Licenciatura = grupo.id_Licenciatura
            INNER JOIN universidad ON universidad.id_Universidad = licenciatura.id_Universidad
            WHERE alumno.matricula = '$matricula'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                  $rows[] = $result;
            }
            return $rows;
        }

        public function validarAsistencia( $fecha , $idAlumno , $idGrupo ){
            $existeAsistencia = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM asistencia WHERE Datetime='$fecha' AND id_Alumno='$idAlumno' AND id_grupo='$idGrupo'";
            $query = $conexion->query( $sql );
            if ($query->num_rows > 0){
                $existeAsistencia = true;
            }
            else{
                $existeAsistencia = false;
            }
            return $existeAsistencia;
        }
        public function cargarUsuarios(){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM usuario";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function cargarDatosDeUsuario( $idUsuario ){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM usuario WHERE id_Usuario ='$idUsuario'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }
        public function validarUsuarioLogin( $usuario , $password){
            $existeUsuario = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM Usuario WHERE Usuario ='$usuario' AND Password ='$password'";
            $query = $conexion->query( $sql );
            if ($query->num_rows > 0){
                $existeUsuario = true;
            }
            else{
                $existeUsuario = false;
            }
            return $existeUsuario;
        }
        public function cargarDatosDelUsuarioLogeado( $usuario , $password){
            $rows = null;
            $claseConexion = new Conexion();
            $conexion = $claseConexion->conexion();
            $sql = "SELECT * FROM Usuario WHERE usuario ='$usuario' AND password ='$password'";
            $query = $conexion->query( $sql );
            while($result = $query->fetch_array()){
                $rows[] = $result;
            }
            return $rows;
        }
    }
?>
