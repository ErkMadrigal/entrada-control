<?php

include('./config.php');
$mes = $_POST['mes'];

$plantel = $_POST['plantel'];
$licenciatura = $_POST['licenciatura'];       
$turno = $_POST['turno'];
$grupo = $_POST['grupo'];

$idg = "select id_grupo from grupo where nombre='$grupo'";
$reid= $conexion->query($idg);
while ($fila = $reid->fetch_array()){
    $vagrupo = $fila[0] ;
}
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Grupo_$grupo.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Lista de Alumnos</title>
</head>
<body>
<table width="80" border="1" cellspacing="0" cellpadding="0">
  <tr>
      <td colspan="17" bgcolor="#006699"><strong>Plantel: <?php echo $plantel;?></strong></td>
      <td colspan="16" bgcolor="#006699"><strong>Licenciatura: <?php echo $licenciatura; ?></strong></td>
    </tr>
    <tr>
     <td colspan="31"><CENTER><strong>Turno: <?php echo $turno; ?></strong><CENTER></td>
    </tr>
      <tr>
    <td colspan="31" bgcolor="#006699">
      
<CENTER><strong>Reporte de Asistencia de los Alumnos del grupo <?php echo $grupo; ?></strong></CENTER></td>
      
  <?php
//definimos los valores iniciales para nuestro calendario
date_default_timezone_set("America/Mexico_City");
$month=date("n"); //remplazar
$year=date("Y");
$diaActual=date("j");
 
//Obtenemos el dia de la semana del primer dia
// Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
//Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
 
$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>
  <tr>
    <td colspan="33" bgcolor="#006699">
      <center>
        <strong><?php echo $mes." del ".$year ;?></strong>
      </center>
    </td>
  </tr>
    <tr >
    <td bgcolor="#006699"><strong>N°</strong></td>
    <td bgcolor="#006699"><strong>Nombre del Alumno(A)</strong></td>
    <?php 
        
    $last_cell=$diaSemana+$ultimoDiaMes;
    // hacemos un bucle hasta 42, que es el máximo de valores que puede haber
    for($i=1;$i<=42;$i++)
    {
      if($i==$diaSemana)
      {
        // determinamos en que dia empieza
        $day=1;
      }
      if($i<$diaSemana || $i>=$last_cell)
      {
        // celca vacia
        //echo "<td>&nbsp;</td>";
      }else{
        // mostramos el dia
        if($day==$diaActual)
          echo "<td class='hoy'>$day</td>";
        else
          
          echo "<td>$day</td>";
                    
        $day++;       
      }
      // cuando llega al final de la semana, iniciamos una columna nueva
      /*if($i%7==0)
      {
        echo "</tr><tr>\n";
      }*/
          
    }
        ?></td>
        <td bgcolor="#006699"><strong>Total asistencias durante el mes de <?php echo $mes;?></strong></td>
    </tr>
    
    <?php
             $o = 1;
             $fi1 = 6;
             $fi2 = 6;
    
        $sel = "select id_alumno,Apellido_Paterno,Apellido_Materno,nombres from alumno where id_grupo='$vagrupo'";
        $re = $conexion->query( $sel);
        while ($fila = $re->fetch_array())
        {
            echo "<tr>";
            echo "<td>".$o++."</td><td>".$fila[1]." ".$fila[2]." ".$fila[3]."</td>";
            $last_cell=$diaSemana+$ultimoDiaMes;
    // hacemos un bucle hasta 42, que es el máximo de valores que puede
    // haber... 6 columnas de 7 dias
    for($i=1;$i<=42;$i++)
    {
      if($i==$diaSemana)
      {
        // determinamos en que dia empieza
        $day=1;
      }
      if($i<$diaSemana || $i>=$last_cell)
      {
        // celca vacia
        //echo "<td>&nbsp;</td>";
      }else{
        // mostramos el dia
        if($day==$diaActual)
                {
          $day;
                }
                 //$una = "select datetime from asistencia where datetime= ";
        else
          
                  //  echo "<td>".$day."</td>";
                     $day;
               $fec = $year."/".$month."/".$day;
               $ua = "select datetime from asistencia where datetime='$fec' and id_alumno ='$fila[0]' and id_grupo='$vagrupo'";
             $li= $conexion->query($ua);
                
               if($li -> num_rows >0)
               {
                echo "<CENTER><td bgcolor='#086acd'>A</td></CENTER>";
               }
               else
               {         
                 echo "<CENTER><td bgcolor='#5cb85c'>F</td></CENTER>";  
               }
                
              //$fila[0];
                $day++;        
      }
      // cuando llega al final de la semana, iniciamos una columna nueva
      /*if($i%7==0)
      {
        echo "</tr><tr>\n";
      }*/
    }
            echo "<td>=CONTAR.SI(C".$fi1++.":AF".$fi2++.",\"A\")</td>";

        }
        ?>
     </tr>
       </table>
</body>
</html>