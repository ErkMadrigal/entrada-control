<?php include('../php/config.php'); ?>
    <?php $titulo = "Grupo"; include '../php/header.php';?>
        <body class="fondo" onload="cargarGrupos(<?php echo $_GET['idLicenciatura']; ?>,<?php echo $_GET['idTurno']; ?>)">
            <div class="rectangulo-verde"></div>
            <div class="rectangulo-azul">
                <h1 class="text-center titulos-h1">Grupos</h1>
            </div>
            <div class="separador-data"></div>
            <div class="row">
                <a class="button" href="<?php echo $raiz ?>modulos/turno.php?idLicenciatura=<?php echo $_GET['idLicenciatura']; ?>&idPlantel=<?php echo $_GET['idPlantel']; ?>">Anterior</a>
                <a class="button" href="<?php echo $raiz ?>modulos/administrador.php">Regresar al Inicio</a>
                <button class="button" data-toggle="agregarGrupo">Agregar Grupo</button>
                <table class="unstriped hover ocultar-elementos" id="contendor-tabla" >
                    <thead>
                        <tr>
                            <th>Grupo(s)</th>
                            <th>Ciclo</th>
                            <th>Cuatrimestre</th>
                            <th class="text-center">Opciones</th>
                        </tr> 
                    <thead>
                    <tbody id="tBodyGrupos"></tbody>
                </table>
                <div id="cargando" style="margin: auto;" ></div>
                <p id="cargandoTexto" class="text-center">Cargando...</p>
            </div>
        </div>
    <?php include '../php/modals.php'; ?>
    <script>
        var idPlantel = "<?php echo $_GET['idPlantel']; ?>";
    </script>
<?php $opcion = "cargarGrupos"; include '../php/footer.php';?>