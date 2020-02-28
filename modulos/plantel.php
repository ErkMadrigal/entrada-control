<?php include('../php/config.php');?>
<?php $titulo = "Plantel"; include '../php/header.php';?>
    <body class="fondo"  onload="cargarPlanteles()">
        <div class="rectangulo-verde"></div>
        <div class="rectangulo-azul">
            <h1 class="text-center titulos-h1">Plantel</h1>
        </div>
        <div class="separador-data"></div>
        <div class="row">
            <a class="button" href="administrador.php">Anterior</a>
            <button class="button" data-toggle="agregarPlantel">Agregar Plantel</button>
            <table class="unstriped hover ocultar-elementos" id="contendor-tabla">
                <thead>
                    <tr>
                        <th>Universidad</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th class="text-center">Opciones</th>
                    </tr> 
                </thead>
                <tbody id="tBodyPlanteles"></tbody>
            </table>
            <div id="cargando" style="margin: auto;" ></div>
            <p id="cargandoTexto" class="text-center">Cargando...</p>
        </div>
    <?php include '../php/modals.php'; ?>
<?php $opcion = "CargarPlanteles";  include '../php/footer.php';?>