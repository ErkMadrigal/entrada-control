<?php include('../php/config.php'); ?>
    <?php $titulo = "Licenciatura"; include '../php/header.php';?>
    <body class="fondo" onload="cargarLicenciaturas(<?php echo $_GET['idPlantel']; ?>)">
        <div class="rectangulo-verde"></div>
        <div class="rectangulo-azul">
            <h1 class="text-center titulos-h1">Licenciatura</h1>
        </div>
        <div class="separador-data"></div>
        <div class="row">
            <a class="button" href="<?php echo $raiz ?>modulos/plantel.php">Anterior</a>
            <a class="button" href="<?php echo $raiz ?>modulos/administrador.php">Regresar al Inicio</a>
            <button class="button" data-toggle="agregarLicenciatura">Agregar Licenciatura</button>
            <table class="unstriped hover ocultar-elementos" id="contendor-tabla">
                <thead>
                    <tr>
                        <th>Licenciatura(s)</th>
                        <th class="text-center">Opciones</th>
                    </tr> 
                </thead>
                <tbody id="tBodyLicenciaturas"></tbody>
            </table>
            <div id="cargando" style="margin: auto;" ></div>
            <p id="cargandoTexto" class="text-center">Cargando...</p>
        </div>
    <?php include '../php/modals.php'; ?>
<?php $opcion = "cargarLicenciaturas"; include '../php/footer.php';?>