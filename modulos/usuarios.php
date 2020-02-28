<?php include('../php/config.php');?>
<?php $titulo = "Administrar Usuarios"; include '../php/header.php';?>
    <body class="fondo"  onload="cargarUsuarios()">
        <div class="rectangulo-verde"></div>
        <div class="rectangulo-azul">
            <h1 class="text-center titulos-h1">Administrar Usuarios</h1>
        </div>
        <div class="separador-data"></div>
        <div class="row">
            <a class="button" href="administrador.php">Anterior</a>
            <button class="button" data-toggle="agregarUsuario">Agregar Usuario</button>
            <table class="unstriped hover ocultar-elementos" id="contendor-tabla">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Tipo de Usuario</th>
                        <th class="text-center">Opciones</th>
                    </tr> 
                </thead>
                <tbody id="tBodyUsuarios"></tbody>
            </table>
            <div id="cargando" style="margin: auto;" ></div>
            <p id="cargandoTexto" class="text-center">Cargando...</p>
        </div>
        <?php include '../php/modals.php'; ?>
<?php $opcion = "cargarUsuarios";  include '../php/footer.php';?>