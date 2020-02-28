<?php include('../php/config.php'); ?>
    <?php $titulo = "Turno"; include '../php/header.php';?>
    <body class="fondo" onload="cargarTurnos(<?php echo $_GET['idLicenciatura']; ?>)">
        <div class="rectangulo-verde"></div>
        <div class="rectangulo-azul">
            <h1 class="text-center titulos-h1">Turno</h1>
        </div>
        <div class="separador-data"></div>
        <div class="row">
            <a class="button" href="<?php echo $raiz?>modulos/licenciatura.php?idPlantel=<?php echo $_GET['idPlantel']; ?>">Anterior</a>
            <a class="button" href="<?php echo $raiz ?>modulos/administrador.php">Regresar al Inicio</a>
            <button class="button" data-toggle="agregarTurno">Agregar Turno</button>
            <table class="unstriped hover ocultar-elementos" id="contendor-tabla">
                <thead>
                    <tr>
                        <th>Turno(s)</th>
                        <th class="text-center">Opciones</th>
                    </tr> 
                </thead>
                <tbody id="tBodyTurnos"></tbody>
            </table>
            <div id="cargando" style="margin: auto;" ></div>
            <p id="cargandoTexto" class="text-center">Cargando...</p>
        </div>
    <?php include '../php/modals.php'; ?>
    <script>
        var idPlantel = "<?php echo $_GET['idPlantel']; ?>";
    </script>
<?php $opcion = "cargarTurnos"; include '../php/footer.php';?>