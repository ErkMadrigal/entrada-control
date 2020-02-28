<!-- modal agregar Plantel -->
<div class="reveal" id="agregarPlantel" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Agregar Plantel</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioAgregarPlantel" data-abide novalidate>
            <input type="text" name="agregarUniversidad" id="agregarUniversidad" placeholder="Plantel Univeritario"  required>
            <input type="text" name="agregarDireccionDeLaUniversidad" id="agregarDireccionDeLaUniversidad" placeholder="Dirección" required>
            <input type="text" name="agregarTelefonoDeLaUniversidad" id="agregarTelefonoDeLaUniversidad" placeholder="Teléfono" required>
            <button class="button">Crear plantel</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal agregar Plantel -->
<!-- modal editar Plantel -->
<div class="reveal" id="editarPlantel" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Editar Plantel</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioEditarPlantel">
            <input type="text" name="idUniversidad" id="idUniversidad" class="ocultar-elementos">
            <input type="text" name="universidad" id="universidad">
            <input type="text" name="direccionDeLaUniversidad" id="direccionDeLaUniversidad">
            <input type="text" name="telefonoDeLaUniversidad" id="telefonoDeLaUniversidad">
            <input class="button" type="submit" value="Actualizar información" data-close aria-label="Close reveal">
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal editar Plantel -->
<!-- modal agregar Plantel -->
<div class="reveal" id="agregarLicenciatura" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Agregar Licenciatura</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioAgregarLicenciatura" data-abide novalidate>
            <input type="text" name="agregarIdUniversidad" id="agregarIdUniversidad" value="<?php echo $_GET['idPlantel']; ?>" class="ocultar-elementos">
            <input type="text" name="agregarNombreLicenciatura" id="agregarNombreLicenciatura" placeholder="Licenciatura" required>
            <button class= "button">Crear Licenciatura</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal agregar Plantel -->
<!-- modal editar Licenciatura -->
<div class="reveal" id="editarLicenciatura" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Editar Licenciatura</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioEditarLicenciatura">
            <input type="text" name="idUniversidadLicenciatura" id="idUniversidadLicenciatura" class="ocultar-elementos">
            <input type="text" name="idLicenciatura" id="idLicenciatura" class="ocultar-elementos">
            <input type="text" name="nombre" id="nombreDeLaLicenciatura"> 
            <button class="button" data-close aria-label="Close reveal" >Actualizar información</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal editar Licenciatura -->
<!-- modal agregar Turno -->
<div class="reveal" id="agregarTurno" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Agregar Turno</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioAgregarTurno" data-abide novalidate>
              <input type="text" name="idLicenciaturaTurno" id="idLicenciaturaTurno" value="<?php echo $_GET['idLicenciatura']; ?>"  class="ocultar-elementos">
            <input type="text" name="turnoAgregar" id="turnoAgregar" placeholder="Turno" required>
            <button class= "button">Crear Turno</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal agregar Turno -->
<!-- modal editar Turno -->
<div class="reveal" id="editarTurno" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Editar Turno</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioEditarTurno">
            <input type="text" class="ocultar-elementos" name="idLicenciaturaEditar" id="idLicenciaturaEditar" value="<?php echo $_GET['idLicenciatura']; ?>" >
            <input type="text" class="ocultar-elementos" name="idTurnoEditar" id="idTurnoEditar">
            <input type="text" name="nombreTurnoEditar" id="nombreTurnoEditar">
            <button class="button" data-close aria-label="Close reveal">Actualizar información</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal editar Turno -->
<!-- modal agregar Grupo -->
<div class="reveal" id="agregarGrupo" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Agregar Grupo</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioAgregarGrupo" data-abide novalidate>
            <input type="text" name="idLicenciaturaAgregar" id="idLicenciaturaAgregar" class="ocultar-elementos" value="<?php echo $_GET['idLicenciatura']; ?>">
            <input type="text" name="idTurnoAgregar" id="idTurnoAgregar" class="ocultar-elementos" value="<?php echo $_GET['idTurno']; ?>">
            <input type="text" name="grupoAgregar" id="grupoAgregar" placeholder="Grupo" required>
            <input type="text" name="cicloAgregar" id="cicloAgregar" placeholder="Ciclo" required>
            <input type="text" name="cuatrimestreAgregar" id="cuatrimestreAgregar" placeholder="Cuatrimestre" required>
            <button class="button">Crear Grupo</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal agregar Grupo -->
<!-- modal editar Grupo -->
<div class="reveal" id="editarGrupo" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Editar Grupo</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioEditarGrupo">
            <input type="text" class="ocultar-elementos" name="idLicenciaturaGrupoEditar" id="idLicenciaturaGrupoEditar">
            <input type="text" class="ocultar-elementos" name="idTurnoGrupoEditar" id="idTurnoGrupoEditar">
            <input type="text" class="ocultar-elementos" name="idGrupoEditar" id="idGrupoEditar">
            <input type="text" name="nombreGrupoEditar" id="nombreGrupoEditar">
            <input type="text" name="cicloGrupoEditar" id="cicloGrupoEditar">
            <input type="text" name="cuatrimestreGrupoEditar" id="cuatrimestreGrupoEditar">
            <button class="button" data-close aria-label="Close reveal">Actualizar información</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal editar Grupo -->
<!-- modal agregar Alumno -->
<div class="reveal" id="agregarAlumno" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Agregar Alumno</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioAgregarAlumno" data-abide novalidate name="formularioAgregarAlumno" onsubmit="return false" enctype="multipart/form-data">
            <input type="text" name="idGrupoAlumnoAgregar" id="idGrupoAlumnoAgregar"  class="ocultar-elementos" placeholder="id Grupo" value="<?php echo $_GET['idGrupo']; ?>" required>
            <input type="text" name="matriculaAlumnoAgregar" id="matriculaAlumnoAgregar" placeholder="Matricula"  required>
            <input type="text" name="nombreAlumnoAgregar" id="nombreAlumnoAgregar" placeholder="Nombre"  required>
            <input type="text" name="apellidoPaternoAlumnoAgregar" id="apellidoPaternoAlumnoAgregar" placeholder="Apellido Paterno" required>
            <input type="text" name="apellidoMaternoAlumnoAgregar" id="apellidoMaternoAlumnoAgregar" placeholder="Apellido Materno" required>
            <input type="text" name="direccionAlumnoAgregar" id="direccionAlumnoAgregar" placeholder="Dirección" required>
            <input type="text" name="numeroCelularAlumnoAgregar" id="numeroCelularAlumnoAgregar" placeholder="Número Celular" required>
            <input type="text" name="ciudadAlumnoAgregar" id="ciudadAlumnoAgregar" placeholder="Ciudad"  required>
            <input type="text" name="poblacionAlumnoAgregar" id="poblacionAlumnoAgregar" placeholder="Población"  required>
            <input type="email" name="correoAlumnoAgregar" id="correoAlumnoAgregar" placeholder="Correo" required>
            <label for="cargarFotoAlumnoAgregar" class="button expanded">Buscar imagen o foto</label>
            <input id="cargarFotoAlumnoAgregar"  class="show-for-sr" type="file" name="cargarFotoAlumnoAgregar" accept="image/jpeg " required>
            <input type="text" name="referenciaAlumnoAgregar" id="referenciaAlumnoAgregar" placeholder="Referencia"  required>
            <input type="text" name="parentescoAlumnoAgregar" id="parentescoAlumnoAgregar" placeholder="Parentesco"  required>
            <input type="text" name="numeroTelefonicoAlumnoAgregar" id="numeroTelefonicoAlumnoAgregar" placeholder="Número Telefonico"  required>
            <button class="button">crear Alumno</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal agregar Alumno -->
<!-- modal editar Alumno -->
<div class="reveal" id="editarAlumno" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Editar Alumno</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioEditarAlumno" name="formularioEditarAlumno" onsubmit="return false" enctype="multipart/form-data">
            <input type="text" name="idGrupoAlumnoEditar" id="idGrupoAlumnoEditar" class="ocultar-elementos">
            <input type="text" name="idAlumnoEditar" id="idAlumnoEditar"  class="ocultar-elementos">
            <input type="text" name="matriculaAlumnoEditar" placeholder="Matricula" id="matriculaAlumnoEditar">
            <input type="text" name="nombreAlumnoEditar" placeholder="Nombre" id="nombreAlumnoEditar">
            <input type="text" name="apellidoPaternoAlumnoEditar" placeholder="Apellido Paterno" id="apellidoPaternoAlumnoEditar">
            <input type="text" name="apellidoMaternoAlumnoEditar" placeholder="Apellido Materno" id="apellidoMaternoAlumnoEditar">
            <input type="text" name="direccionAlumnoEditar" placeholder="Dirección" id="direccionAlumnoEditar">
            <input type="text" name="numeroCelularAlumnoEditar" placeholder="Número Celular" id="numeroCelularAlumnoEditar">
            <input type="text" name="ciudadAlumnoEditar" placeholder="Ciudad" id="ciudadAlumnoEditar">
            <input type="text" name="poblacionAlumnoEditar" placeholder="Población" id="poblacionAlumnoEditar">
            <input type="email" name="correoAlumnoEditar" placeholder="Correo"  id="correoAlumnoEditar">
            <input type="text" name="fotoAlumnoEditar" id="fotoAlumnoEditar"  class="ocultar-elementos">
            <label for="cargarFotoAlumnoEditar" class="button expanded">Buscar imagen o foto</label>
            <input id="cargarFotoAlumnoEditar"  class="show-for-sr" type="file" name="cargarFotoAlumnoEditar" accept="image/jpeg ">
            <input type="text" name="referenciaAlumnoEditar" placeholder="Referencia" id="referenciaAlumnoEditar" >
            <input type="text" name="parentescoAlumnoEditar" placeholder="Parentesco" id="parentescoAlumnoEditar">
            <input type="text" name="numeroTelefonicoAlumnoEditar" placeholder="Número Telefonico" id="numeroTelefonicoAlumnoEditar">
            <input type="submit" class="button" value="Actualizar información" data-close aria-label="Close reveal">
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal editar Alumno -->
<!-- modal subir fotos -->
<div class="reveal" style="overflow-y: initial;" id="subirFotos" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Subir fotos</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="cargarImagenes" name="cargarImagenes" enctype="multipart/form-data" onsubmit="return false">
            <select  id="plantelSubirFotos" name="plantelSubirFotos" onchange="obtenerPlantelSubirFotos(this);">
                <option value="0">Elige un Plantel</option>
            </select>
            <select name="licenciaturasSubirFotos"  id="licenciaturasSubirFotos" class="ocultar-elementos"  onchange="mostrarBotonCargarFotografias(this);">
                <option value="0">Elige una Licenciatura</option>
            </select>
            <div class="row">
                <div class="medium-6 column ocultar-elementos" id="contenedorFotos">
                    <label for="cargarFotos" class="button expanded">Cargar Fotos</label>
                    <input type="file" id="cargarFotos"  name="cargarFotos[]" accept="image/x-png" multiple class="show-for-sr">
                </div>
                <div class="medium-6 column">
                    <button  class="button expanded">Subir Fotos</button>
                </div>
            </div>            
        </form> 
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal subir fotos -->

<!-- modal subir csv-->
<div class="reveal" style="overflow-y: initial;" id="cargarCsv" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Subir Listas</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioCargarCsv" name="formularioCargarCsv" enctype="multipart/form-data" onsubmit="return false">
            <select  id="plantel" name="plantel" onchange="obtenerPlantel(this);">
                <option value="0">Elige un Plantel</option>
            </select>
            <select name="licenciaturas"  id="licenciaturas" onchange="obtenerLicenciatura(this);" class="ocultar-elementos">
                <option value="0">Elige una Licenciatura</option>
            </select>
            <select name="turnos" id="turnos" onchange="obtenerTurno(this);" class="ocultar-elementos">
                <option value="0">Elige un Turno</option>
            </select>
            <select name="grupo" id="grupo" onchange="obtenerGrupo(this);" class="ocultar-elementos">
                <option value="0">Elige un grupo</option>
            </select>
            <br> 
            <div class="row">
                <div class="medium-6 column ocultar-elementos" id="contenedorCsv" >
                    <label for="archivo" class="button expanded">Buscar Archivo (.csv)</label>
                    <input class="show-for-sr" id="archivo" accept=".csv"  name="archivo" type="file"/> 
                    <input name="MAX_FILE_SIZE" class="button" type="hidden" value="20000" /> 
                </div>
                <div class="medium-6 column">
                    <button  class="button expanded">Subir archivo (.csv)</button>
                </div>
            </div>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal subir csv-->

<!-- modal agregar Usuario -->
<div class="reveal" id="agregarUsuario" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Agregar Usuario</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioAgregarUsuario" data-abide novalidate>
            <input type="text" name="agregarUsuario" id="agregarNombreUsuario"  placeholder="Usuario"  required>
            <div class="input-group">
                <input class="input-group-field" type="password" name="agregarPassword" id="agregarPassword"  placeholder="Password" required>
                <div class="input-group-button">
                    <button id="mostrarContraseniaAgregar" class="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                </div>
            </div>
            <select name="agregarTipoUsuario" id="agregarTipoUsuario">
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
            </select>
            <button class="button">Crear Usuario</button>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal agregar Usuario -->
<!-- modal editar Usuario -->
<div class="reveal" id="editarUsuario" data-reveal data-close-on-click="false" data-animation-in="slide-in-down" data-animation-out="slide-out-down">
    <h1 class="text-center">Editar Usuario</h1>
    <div class="separador-data"></div>
    <div class="row text-center">
        <form id="formularioEditarUsuario">
            <input type="text" name="idUsuario" id="idUsuario" class="ocultar-elementos">
            <input type="text" name="usuario" id="usuario">
            <div class="input-group">
                <input class="input-group-field" type="password" name="password" id="password">
                <div class="input-group-button">
                    <button id="mostrarContrasenia" class="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                </div>
            </div>
            <select name="tipoDeUsuario" id="tipoDeUsuario">
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
            </select>
            <input class="button" type="submit" value="Actualizar información" data-close aria-label="Close reveal">
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close reveal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- modal editar Usuario -->