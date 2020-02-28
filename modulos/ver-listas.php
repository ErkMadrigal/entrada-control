<?php
session_start();
error_reporting(0);
include('../php/config.php');
$_SESSION["Plantel"];
$_SESSION["carrera"];
$_SESSION["turno"];
$grup = $_SESSION["grupo"];

$idgrup = "SELECT id_grupo FROM grupo WHERE Nombre = '$grup'";
$resug = $conexion->query($idgrup);

while ( $fila = $resug->fetch_array()) {
    $vagrupo = $fila[0];
}

// definimos los valores iniciales para nuestro calendario
date_default_timezone_set("America/Mexico_City");
$month= isset($_GET['mes'])? $_GET['mes'] : date("n"); 
$year= isset($_GET['anio'])? $_GET['anio'] : date("Y");

//datos anteriores
$numero_mes_anterior = $month - 1;
$numero_anio_anterior = $year;
if($numero_mes_anterior <= 0) //cero es anterior a enero
{
  $numero_mes_anterior = 12; //si es cero saltamos a diciembre
  $numero_anio_anterior = $numero_anio_anterior - 1;
}

//datos anteriores
$numero_mes_siguiente = $month + 1;
$numero_anio_siguiente = $year;
if($numero_mes_anterior >= 13) //estoy por encima de diciembre
{
  $numero_mes_anterior = 1; //vuelve a ser enero
  $numero_anio_siguiente++;
}

$diaActual=date("j");

//Obtenemos el dia de la semana del primer dia
// Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
//Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

$meses=array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver Lista</title>
    <meta charset="utf-8">
    <!--icono-->
    <link rel="shortcut icon" href="<?php echo $raiz;?>img/ico/icono.ico"> 
    <!--librerias awesome-->
    <link rel="stylesheet" href="<?php echo $raiz;?>css/font-awesome.css">
    <!--librerias foundation-->
    <link rel="stylesheet" href="<?php echo $raiz;?>css/foundation.css">
    <!--librerias css personalizadas-->
    <link rel="stylesheet" href="<?php echo $raiz;?>css/control-entrada.css">
</head>
<body class="fondo">
    <form method="post" action="<?php echo $raiz;?>php/reporte-excel.php">
        <div class="row large-up-2"> 
            <div class="columns">
                <label>Plantel: </label>
                <input type="text" OnFocus="this.blur()" value="<?php echo  $_SESSION["Plantel"];?>" name="plantel">
            </div>
            <div class="columns">
                <label>Licenciatura: </label>
                <input type="text" OnFocus="this.blur()" value="<?php echo  $_SESSION["carrera"];?>" name="licenciatura">
            </div>
            <div class="columns">
                <label>Turno: </label>
                <input type="text" OnFocus="this.blur()" value="<?php echo $_SESSION["turno"]; ?>" name="turno">
            </div>
            <div class="columns">
                <label>Grupo: </label>
                <input type="text" OnFocus="this.blur()" value="<?php echo $_SESSION["grupo"]; ?>" name="grupo">  
            </div>
        </div>
        <div class="row columns text-center">
            <a class="button" href="<?php echo $raiz;?>modulos/lista.php">Regresar</a>
            <input class="button" type="submit" value="Exportar (.xls)">
        </div>
    </form>
    <div class="row">
        <div class="large-6 large-offset-3 columns"> 
            <input type="text" name="mes" style="display:none;" value="<?php  echo $meses[$month];?>">
        </div>
    </div>
    <div class="table-scroll">
        <table>
            <tr class="trs">
                <td>
                    <a href="ver-listas.php?anio=<?php echo $numero_anio_anterior;?>&amp;mes=<?php echo $numero_mes_anterior?>">
                        <i class="fa fa-angle-double-left trs" aria-hidden="true"></i>
                    </a>
                </td>
                <td colspan="31">
                    <center><?php echo $meses[$month]." ".$year?></center>
                </td>
                <td>
                    <a href="ver-listas.php?anio=<?php echo $numero_anio_siguiente;?>&amp;mes=<?php echo $numero_mes_siguiente?>">
                        <i class="fa fa-angle-double-right trs" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="trst">NO</td>
                <td class="trst">Nombre del Alumno(A)</td>
                <?php 
                    $last_cell=$diaSemana+$ultimoDiaMes;
                    // hacemos un bucle hasta 42, que es el máximo de valores que puede
                    for($i=1;$i<=42;$i++) {
                        if($i==$diaSemana){
                            // determinamos en que dia empieza
                            $day=1;
                        }
                        if($i<$diaSemana || $i>=$last_cell) {
                        }else{
                            // mostramos el dia
                            if($day==$diaActual)
                                echo "<td class='dia-actual'>$day</td>";
                            else
                                echo "<td class='dia-normal'>$day</td>";
                            $day++;
                        }
                    }
                ?>
            </tr>
            <?php   
                $numeroDeLista = 1;
                $sql = "SELECT id_alumno,Apellido_Paterno,Apellido_Materno,nombres FROM alumno WHERE id_grupo='$vagrupo'";
                mysqli_set_charset($conexion,"utf8");
                $query = $conexion->query( $sql );
                while ($fila = $query->fetch_array()){
                    echo "<tr>";
                    echo "<td>".$numeroDeLista++."</td><td>".$fila[1]." ".$fila[2]." ".$fila[3]."</td>";
                    $last_cell=$diaSemana+$ultimoDiaMes;
                    // hacemos un bucle hasta 42, que es el máximo de valores que puede
                    // haber... 6 columnas de 7 dias
                    for($i=1;$i<=42;$i++){
                        if($i==$diaSemana) {
                            // determinamos en que dia empieza
                            $day=1;
                        }
                        if($i<$diaSemana || $i>=$last_cell){}
                        else{
                            // mostramos el dia
                            if($day==$diaActual){
                                $day;
                            }
                            $fecha = $year."/".$month."/".$day; 
                            $ua = "SELECT datetime FROM asistencia where datetime='$fecha' AND id_alumno ='$fila[0]' AND id_grupo='$vagrupo'";
                            $li = $conexion->query($ua);
                            if($li->num_rows>0){
                                echo "<CENTER><td class='asistencia text-center'>A</td></CENTER>";
                            }
                            else{
                                echo "<CENTER><td class='falta text-center'>F</td></CENTER>";
                            }
                        }
                        $day++;
                    }
                }
                ?>
                </tr>
        </table>
    </div>
</body>
</html>