<?php include("../php/config.php"); ?>
	<?php $titulo = "Alumno"; include '../php/header.php'; ?>
	<body class="fondo" onload="cargarAlumnos(<?php echo $_GET['idGrupo']; ?>)">
		<div class="rectangulo-verde"></div>
		<div class="rectangulo-azul">
			<h1 class="text-center titulos-h1">Alumno(a)</h1>
		</div>
		<div class="separador-data"></div>
		<div class="row">
			<a class="button" href="<?php echo $raiz ?>modulos/grupo.php?idTurno=<?php echo  $_GET['idTurno']; ?>&idLicenciatura=<?php echo  $_GET['idLicenciatura']; ?>&idPlantel=<?php echo $_GET['idPlantel']; ?>">Anterior</a>
			<a class="button" href="<?php echo $raiz ?>modulos/administrador.php">Regresar al Inicio</a>
			<button class="button" data-toggle="agregarAlumno">Agregar Alumno</button>
			<div  class="table-scroll ocultar-elementos" id="contendor-tabla">
				<table  class="unstriped hover" style="width:200%;" >
					<thead>
						<tr>
							<th >No</th>
							<th>Matrícula</th>
							<th style="width:23rem;">Nombre Completo</th>
							<th style="width:23rem;">Dirección</th>
							<th style="width:9rem;">Numero celular</th>
							<th style="width:9rem;">Ciudad</th>
							<th style="width:9rem;">Población</th>
							<th style="width:9rem;">Correo</th>
							<th style="width:9rem;">Foto</th>
							<th style="width:23rem;">Referencia</th>
							<th style="width:9rem;">Parentesco</th>
							<th style="width:9rem;">Número Telefónico</th>
							<th class="text-center">Opciones</th>
						</tr>
					</thead>
					<tbody id="tBodyAlumnos"></tbody>
				</table> 
			</div>   
			<div id="cargando" style="margin: auto;" ></div>
            <p id="cargandoTexto" class="text-center">Cargando...</p>
	    </div>
    <?php include '../php/modals.php'; ?>
<?php $opcion = "cargarAlumnos"; include '../php/footer.php';?>