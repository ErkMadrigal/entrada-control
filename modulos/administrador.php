<?php include('../php/config.php'); ?>
    <?php $titulo = "Menú"; include '../php/header.php'; ?>
    <body class="fondo">
        <div class="rectangulo-verde"></div>
        <div class="rectangulo-azul">
            <h1 class="text-center titulos-h1">Menu de Opciones</h1>
        </div>
        <div class="separador-data"></div>
        <div class="row align-middle" > 
            <div class="large-10 large-offset-1 columns text-center " >
                <div class="button-group large-up-3">
                    <div class="columns">
                        <button class="button expanded" data-toggle="subirFotos" onclick="listaDePlantelesSubirImagen()"><i class="fa fa-upload" aria-hidden="true"></i> Subir Fotos</button>
                    </div>
                    <div class="columns">
                    <button class="button  expanded" data-toggle="cargarCsv" onclick="listaDePlanteles()"><i class="fa fa-upload" aria-hidden="true"></i> Subir Archivo (.csv)</button>
                    </div>
                    <div class="columns">
                        <a class="button expanded" href="<?php echo $raiz ?>php/plantilla-excel.php"><i class="fa fa-download" aria-hidden="true"></i> Descargar Plantilla</a>
                    </div>
                    <div class="columns">
                        <a class="button expanded" href="plantel.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> Ir al panel del Administrador</a>
                    </div>
                    <div class="columns">
                    <a class="button expanded" href="usuarios.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Administrar Usuarios</a>
                    </div>
                    <div class="columns">
                        <a class="button expanded" href="<?php echo $raiz ?>php/cerrar-sesion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../php/modals.php';?>
        <?php  include '../php/footer.php';?>