<?php include('../php/config.php'); ?>
    <?php $titulo = "Lista"; include '../php/header.php';?>
    <body class="fondo" onload="listaDePlanteles()">
        <div class="rectangulo-verde"></div>
        <div class="rectangulo-azul">
            <h1 class="text-center titulos-h1">Ver Lista</h1>
        </div>
        <div class="separador-data"></div>
        <div class="row text-center">
            <div class="large-8 large-offset-2 columns">
                <form name="form1" action="<?php echo $raiz;?>php/validar-listas.php" method="post">
                    <select  id="plantel" name="plantel" onchange="obtenerPlantel(this);">
                        <option value="0">Elige un Plantel</option>
                    </select>
                    <select name="licenciaturas"  id="licenciaturas" onchange="obtenerLicenciatura(this);" class="ocultar-elementos">
                        <option value="0">Elige una Licenciatura</option>
                    </select>
                    <select name="turnos" id="turnos" onchange="obtenerTurno(this);" class="ocultar-elementos">
                        <option value="0">Elige un Turno</option>
                    </select>
                    <select name="grupo" id="grupo" class="ocultar-elementos">
                        <option value="0">Elige un grupo</option>
                    </select>
                    <input class="button" type="submit" value="Mostrar listas">
                    <a class="button" href="<?php echo $raiz; ?>php/cerrar-sesion.php">Cerrar Sesión</a>
                </form>
            </div>
        </div>
        <?php  include '../php/footer.php';?>
