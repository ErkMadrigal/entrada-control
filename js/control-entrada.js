//inicializa el plugin de foundation
$(document).foundation();

//codigo animacion cargando
$("#cargando").jRoll({
    radius: 80,
    animation: "gyroscope",
    colors:['#004c98','#5d8e28']
});

//codigo selects administrador

var listaDePlanteles = () => {
    $.ajax({
        data: { opcion: 'CargarPlanteles' },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response)=>{
            if (response.estado == 'ok') {
                $("#plantel").css("display", "initial");
                $("select#plantel option").remove();
                $("select#plantel").append('<option value="0">Elige un Plantel</option>');   
                for (var key in response.mensaje) {     
                    $("select#plantel").append('<option value=' + response.mensaje[key].id_Universidad + '>'+ response.mensaje[key].Nombre +'</option>');    
                }  
            }
            else{
                alert(response.mensaje)  
                $("#plantel").css("display", "none");
            }
        }
    });
}
var listaDePlantelesSubirImagen = () => {
    $.ajax({
        data: { opcion: 'CargarPlanteles' },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response)=>{
            if (response.estado == 'ok') {
                $("#plantelSubirFotos").css("display", "initial");
                $("select#plantelSubirFotos option").remove();
                $("select#plantelSubirFotos").append('<option value="0">Elige un Plantel</option>');   
                for (var key in response.mensaje) {     
                    $("select#plantelSubirFotos").append('<option value=' + response.mensaje[key].id_Universidad + '>'+ response.mensaje[key].Nombre +'</option>');    
                }  
            }
            else{
                alert(response.mensaje)  
                $("#plantelSubirFotos").css("display", "none");
            }
        }
    });
}
var obtenerPlantel = (idPlantel) => {
    $.ajax({
        data: { opcion: 'cargarLicenciaturas', idLicenciatura: idPlantel.value },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#licenciaturas").css("display", "initial");
                $("select#licenciaturas option").remove();
                $("select#licenciaturas").append('<option value="0">Elige una Licenciatura</option>');   
                for (var key in response.mensaje) {     
                    $("select#licenciaturas").append('<option value=' + response.mensaje[key].id_Licenciatura + '>'+ response.mensaje[key].Licenciatura +'</option>');    
                }  
            }
            else{
                alert(response.mensaje)  
                $("#licenciaturas").css("display", "none");
            }
        }
    });
}

var obtenerPlantelSubirFotos = (idPlantel) => {
    $.ajax({
        data: { opcion: 'cargarLicenciaturas', idLicenciatura: idPlantel.value },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#licenciaturasSubirFotos").css("display", "initial");
                $("select#licenciaturasSubirFotos option").remove();
                $("select#licenciaturasSubirFotos").append('<option value="0">Elige una Licenciatura</option>');   
                for (var key in response.mensaje) {     
                    $("select#licenciaturasSubirFotos").append('<option value=' + response.mensaje[key].id_Licenciatura + '>'+ response.mensaje[key].Licenciatura +'</option>');    
                }  
            }
            else{
                alert(response.mensaje)  
                $("#licenciaturasSubirFotos").css("display", "none");
                $("#contenedorFotos").css("display", "none");
            }
        }
    });
}

var mostrarBotonCargarFotografias = ( licenciatura ) => {
    if(licenciatura.value != 0)
        $("#contenedorFotos").css("display", "initial");
    else
        $("#contenedorFotos").css("display", "none");
}

var obtenerLicenciatura = (idLicenciatura) => {
    $.ajax({
        data: { opcion: 'cargarTurnos' },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                if(idLicenciatura.value != 0){
                    $("#turnos").css("display", "initial");
                    $("select#turnos option").remove();
                    $("select#turnos").append('<option value="0">Elige un Turno</option>');   
                    for (var key in response.mensaje) {     
                        $("select#turnos").append('<option value=' + response.mensaje[key].id_turno + "," + idLicenciatura.value + '>'+ response.mensaje[key].Turno +'</option>');    
                    }  
                }
                else{
                    $("#turnos").css("display", "none");
                }
            }
            else{
                alert(response.mensaje)  
                $("#turnos").css("display", "none");
            }
        }
    });
}
var obtenerTurno = (idTurno) => {
    if(idTurno.value != 0){
        $.ajax({
            data: { opcion: 'cargarGrupos', idLicenciatura: idTurno.value.split(",")[1] , idTurno : idTurno.value.split(",")[0] },
            url: url + 'php/casos.php',
            type: 'post',
            success: (response) => {
                if (response.estado == 'ok') {
                        $("#grupo").css("display", "initial");
                        $("select#grupo option").remove();
                        $("select#grupo").append('<option value="0">Elige un Grupo</option>');   
                        for (var key in response.mensaje) {     
                            $("select#grupo").append('<option value=' + response.mensaje[key].id_grupo + '>'+ response.mensaje[key].Nombre +'</option>');    
                        }   
                }
                else{
                    alert(response.mensaje)  
                    $("#grupo").css("display", "none");
                }
            }
        }); 
    }  
    else{
        $("#grupo").css("display", "none");
    }
}

var obtenerGrupo = ( grupo ) => {
    if(grupo.value != 0)
        $("#contenedorCsv").css("display", "initial");
    else
        $("#contenedorCsv").css("display", "none");
}
        
//codigo selects administrador

//codigo planteles
var cargarPlanteles = () =>{
    $.ajax({
        data: { opcion: opcion },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response)=>{
            if(response.estado == 'ok'){
                setTimeout(() => {
                    $('#tBodyPlanteles > tr').remove();
                    $.each(response.mensaje, (indice, valor) => {
                        $("#tBodyPlanteles").append('<tr class="text-center"><td><a class="button expanded secondary" href="licenciatura.php?idPlantel=' + valor.id_Universidad + '">' + valor.Nombre + '</a></td><td>' + valor.Direccion + '</td><td>' + valor.Telefono + '</td><td><div class="button-group"><button class="button"  data-toggle="editarPlantel" onclick="cargarDatosDelPlantel(' + valor.id_Universidad + ')">Editar</button><button class="button alert" onclick="eliminarPLantel(' + valor.id_Universidad + ",\'" + valor.Nombre + "\'" + ')">Eliminar</button></div></td>');
                    })
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").css("display", "none");
                    $("#contendor-tabla").css("display", "inline-table");
                }, 1500);
            }
            else{
                setTimeout(() => {
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").html(response.mensaje);
                }, 1500);
            }
        }
    });
}

var cargarDatosDelPlantel = (idPlantel) => {
    $.ajax({
        data: {  opcion: "cargarDatosDelPlantel", idPlantel: idPlantel },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#idUniversidad").val(response.mensaje[0].id_Universidad)
                $("#universidad").val(response.mensaje[0].Nombre)
                $("#direccionDeLaUniversidad").val(response.mensaje[0].Direccion)
                $("#telefonoDeLaUniversidad").val(response.mensaje[0].Telefono)
            }
            else
                alert(response.mensaje)
        }
    });
}
$('#formularioAgregarPlantel').submit((e) => {
    let objetoPlantel = {
        universidad: this.agregarUniversidad.value.trim(),
        direccion: this.agregarDireccionDeLaUniversidad.value.trim(),
        telefono: this.agregarTelefonoDeLaUniversidad.value.trim(),
        opcion: "agregarPlantel"
    };   
    if( !isEmpty(objetoPlantel.universidad) && !isEmpty(objetoPlantel.direccion) && !isEmpty(objetoPlantel.telefono))
        agregarPlantel(objetoPlantel);

    return false;
});
var agregarPlantel = (objetoPlantel) => {
    $.ajax({
        data: objetoPlantel,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarPlanteles();
                $("#formularioAgregarPlantel")[0].reset();
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarPlanteles();
                $("#formularioAgregarPlantel")[0].reset();
            }
        }
    });
}
$('#formularioEditarPlantel').submit((e) => {
    let objetoEditarPlantel = {
        idUniversidad: this.idUniversidad.value.trim(),
        universidad: this.universidad.value.trim(),
        direccion: this.direccionDeLaUniversidad.value.trim(),
        telefono: this.telefonoDeLaUniversidad.value.trim(),
        opcion: "editarPlantel"
    };
    actualizarInformacion(objetoEditarPlantel);
    return false;
});

var actualizarInformacion = (objetoEditarPlantel)=>{
    $.ajax({
        data: objetoEditarPlantel ,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if(response.estado == 'ok'){
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarPlanteles();
            }
            else{
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarPlanteles();
            }
        }
    });
}

var eliminarPLantel = (idPlantel,nombre) => {
    swal({
        title: "Advertencia",
        text: "¿Esta seguro de eliminar a " + nombre + "?",
        icon: "warning",
        buttons: ["Cancelar","Aceptar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                data: { 
                    idPlantel : idPlantel,
                    opcion : 'eliminarPlantel' 
                },
                url: url + 'php/casos.php',
                type: 'post'
            });
            swal("Se ha eliminado a " + nombre +" correctamente", {
                icon: "success",
            });
            listaDePlanteles(idPlantel);
        }
      })
}
//codigo planteles
//codigo licenciaturas
var cargarLicenciaturas = (id) => {
    $.ajax({
        data: { opcion: opcion, idLicenciatura: id },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                setTimeout(() => {
                    $('#tBodyLicenciaturas > tr').remove();
                    $.each(response.mensaje, (indice, valor) => {
                        $("#tBodyLicenciaturas").append('<tr><td><a class="button expanded secondary" href="turno.php?idLicenciatura=' + valor.id_Licenciatura + '&idPlantel=' + id + '">' + valor.Licenciatura + '</a></td><td class="text-center"><div class="button-group"><button class="button"  data-toggle="editarLicenciatura" onclick="cargarDatosDeLicenciatura(' + valor.id_Licenciatura + ')">Editar</button><button class="button alert" onclick="eliminarLicenciatura(' + valor.id_Licenciatura + "," + valor.id_Universidad +",\'" + valor.Licenciatura  + "\'" +')">Eliminar</button></div></td>');
                    }) 
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").css("display", "none");
                    $("#contendor-tabla").css("display", "inline-table");
                },1500);
            }
            else{
                setTimeout(() => {
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").html(response.mensaje);
                }, 1500);
            }
        }
    });
}

var cargarDatosDeLicenciatura = (idLicenciatura) => {
    $.ajax({
        data: { opcion: "cargarDatosDeLaLicenciatura", idLicenciatura: idLicenciatura },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#idUniversidadLicenciatura").val(response.mensaje[0].id_Universidad)
                $("#idLicenciatura").val(response.mensaje[0].id_Licenciatura)
                $("#nombreDeLaLicenciatura").val(response.mensaje[0].Licenciatura)
            }
            else
                alert(response.mensaje)
        }
    });
}

$('#formularioAgregarLicenciatura').submit((e) => {
    let objetoLicenciatura = {
        iduniversidad: this.agregarIdUniversidad.value.trim(),
        licenciatura: this.agregarNombreLicenciatura.value.trim(),
        opcion: "agregarLicenciatura"
    };
    if (!isEmpty(objetoLicenciatura.licenciatura))
        agregarLicenciatura(objetoLicenciatura)
    return false;
});

var agregarLicenciatura = (objetoLicenciatura) =>{
    $.ajax({
        data: objetoLicenciatura,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarLicenciaturas(objetoLicenciatura.iduniversidad);
                $("#formularioAgregarLicenciatura")[0].reset();
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarLicenciaturas(objetoLicenciatura.iduniversidad);
                $("#formularioAgregarLicenciatura")[0].reset();
            }
        }
    });
}
$('#formularioEditarLicenciatura').submit((e) => {
    let objetoEditarLicenciatura = {
        idUniversidadLicenciatura: this.idUniversidadLicenciatura.value.trim(),
        idLicenciatura: this.idLicenciatura.value.trim(),
        licenciatura: this.nombreDeLaLicenciatura.value.trim(),
        opcion: "editarLicenciatura"
    };
    actualizarLicenciatura(objetoEditarLicenciatura);
    return false;
});

var actualizarLicenciatura = (objetoLicenciatura) => {
    $.ajax({
        data: objetoLicenciatura,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarLicenciaturas(objetoLicenciatura.idUniversidadLicenciatura)
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarLicenciaturas(objetoLicenciatura.idUniversidadLicenciatura)
            }
        }
    });
}

var eliminarLicenciatura = (idLicenciatura,idPlantel,nombre) => {
    swal({
        title: "Advertencia",
        text: "¿Esta seguro de eliminar la licenciatura " + nombre + "?",
        icon: "warning",
        buttons: ["Cancelar","Aceptar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                data: { 
                    idLicenciatura : idLicenciatura,
                    idPlantel : idPlantel,
                    opcion : 'eliminarLicenciatura' 
                },
                url: url + 'php/casos.php',
                type: 'post'
            });
            cargarLicenciaturas(idPlantel);
            swal("Se ha eliminado la licenciatura " + nombre +" correctamente", {
                icon: "success",
            });
        }
      });
}
//codigo licenciaturas

//codigo turno

var cargarTurnos = (idLicenciatura) => {
    $.ajax({
        data: { opcion: opcion },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                setTimeout(() => {
                    $('#tBodyTurnos > tr').remove();
                    $.each(response.mensaje, (indice, valor) => {
                        $("#tBodyTurnos").append('<tr class="text-center"><td><a class="button expanded secondary" href="grupo.php?idTurno=' + valor.id_turno + '&idLicenciatura=' + idLicenciatura + '&idPlantel=' + idPlantel + '">' + valor.Turno + '</a></td><td><div class="button-group"><button class="button"  data-toggle="editarTurno" onclick="cargarDatosDelTurno(' + valor.id_turno + ')">Editar</button><button class="button alert" onclick="eliminarTurno(' + valor.id_turno + "," + idLicenciatura +",\'" + valor.Turno + "\'" + ')">Eliminar<button></div></td>');
                    })
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").css("display", "none");
                    $("#contendor-tabla").css("display", "inline-table");
                },1500);
            }
            else{
                setTimeout(() => {
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").html(response.mensaje);
                }, 1500);
            }
        }
    });
}

$('#formularioAgregarTurno').submit((e) => {
    let objetoTurno= {
        idLicenciatura: this.idLicenciaturaTurno.value.trim(),
        turno: this.turnoAgregar.value.trim(),
        opcion: "agregarTurno"
    };
    if (!isEmpty(objetoTurno.turno))
        agregarTurno(objetoTurno)
    return false;
});

var agregarTurno = (objetoTurno) => {
    $.ajax({
        data: objetoTurno,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarTurnos(objetoTurno.idLicenciatura);
                $("#formularioAgregarTurno")[0].reset();
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarTurnos(objetoTurno.idLicenciatura);
                $("#formularioAgregarTurno")[0].reset();
            }
        }
    });
}

var cargarDatosDelTurno = (idTurno) => {
    $.ajax({
        data: { opcion: "cargarDatosDelTurno", idTurno : idTurno },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#idTurnoEditar").val(response.mensaje[0].id_turno)
                $("#nombreTurnoEditar").val(response.mensaje[0].Turno)
            }
            else
                alert(response.mensaje)
        }
    });
}

$('#formularioEditarTurno').submit((e) => {
    let objetoEditarTurno = {
        idLicenciatura: this.idLicenciaturaEditar.value.trim(),
        idturno: this.idTurnoEditar.value.trim(),
        turno: this.nombreTurnoEditar.value.trim(),
        opcion: "editarTurno"
    };
    actualizarTurno(objetoEditarTurno);
    return false;
});

var actualizarTurno = (objetoTurno) => {
   $.ajax({
       data: objetoTurno,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarTurnos(objetoTurno.idLicenciatura)
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarTurnos(objetoTurno.idLicenciatura)
            }
        }
    });
}

var eliminarTurno = (idTurno,idLicenciatura,nombre) => {
    swal({
        title: "Advertencia",
        text: "¿Esta seguro de eliminar el Turno " + nombre + "?",
        icon: "warning",
        buttons: ["Cancelar","Aceptar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                data: {
                    idTurno : idTurno,
                    idLicenciatura : idLicenciatura,
                    opcion : 'eliminarTurno'
                },
                url: url + 'php/casos.php',
                type: 'post'
            });
            swal("Se ha eliminado el Turno "+nombre +" correctamente", {
                icon: "success",
            });
            cargarTurnos(idLicenciatura);
        }
      });
}
//codigo turno
//codigo Grupos
var cargarGrupos = (idLicenciatura,idTurno) => {
    $.ajax({
        data: { opcion: opcion, idLicenciatura: idLicenciatura , idTurno : idTurno },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                setTimeout(() => {
                    $('#tBodyGrupos > tr').remove();
                    $.each(response.mensaje, (indice, valor) => {
                        $("#tBodyGrupos").append('<tr class="text-center"><td><a class="button expanded secondary" href="alumno.php?idGrupo=' + valor.id_grupo + '&idTurno='+ idTurno + '&idLicenciatura=' + idLicenciatura + '&idPlantel=' + idPlantel + '">' + valor.Nombre + '</a></td><td>' + valor.Ciclo + '</td><td>' + valor.Cuatrimestre + '</td><td><div class="button-group"><button class="button"  data-toggle="editarGrupo" onclick="cargarDatosDelGrupo(' + valor.id_grupo + ')">Editar</button><button class="button alert" onclick="eliminarGrupo(' + valor.id_grupo + "," +idLicenciatura + "," + idTurno +",\'" + valor.Nombre +"\'" + ')">Eliminar</button></div></td>');
                    });
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").css("display", "none");
                    $("#contendor-tabla").css("display", "inline-table");
                },1500);
            }
            else{
                setTimeout(() => {
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").html(response.mensaje);
                }, 1500);
            } 
        }
    });   
}

var cargarDatosDelGrupo = (idGrupo) => {
    $.ajax({
        data: { opcion: "cargarDatosDelGrupo", idGrupo: idGrupo },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#idTurnoGrupoEditar").val(response.mensaje[0].id_turno)
                $("#idGrupoEditar").val(response.mensaje[0].id_grupo)
                $("#idLicenciaturaGrupoEditar").val(response.mensaje[0].id_Licenciatura)
                $("#nombreGrupoEditar").val(response.mensaje[0].Nombre)
                $("#cicloGrupoEditar").val(response.mensaje[0].Ciclo)
                $("#cuatrimestreGrupoEditar").val(response.mensaje[0].Cuatrimestre)
            }
            else
                alert(response.mensaje)
        }
    });
}

$('#formularioAgregarGrupo').submit((e) => {
    let objetoGrupo= {
        idLicenciatura: this.idLicenciaturaAgregar.value.trim(),
        idturno: this.idTurnoAgregar.value.trim(),
        grupo: this.grupoAgregar.value.trim(),
        ciclo: this.cicloAgregar.value.trim(),
        cuatrimestre: this.cuatrimestreAgregar.value.trim(),
        opcion: "agregarGrupo"
    };
    if (!isEmpty(objetoGrupo.grupo) && !isEmpty(objetoGrupo.ciclo) && !isEmpty(objetoGrupo.cuatrimestre))
        agregarGrupo(objetoGrupo)
    return false;
});

var agregarGrupo = (objetoGrupo) => {
    $.ajax({
        data: objetoGrupo,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarGrupos(objetoGrupo.idLicenciatura,objetoGrupo.idturno);
                $("#formularioAgregarGrupo")[0].reset();
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarGrupos(objetoGrupo.idLicenciatura,objetoGrupo.idturno);
                $("#formularioAgregarGrupo")[0].reset();
            }
        }
    });
}

$('#formularioEditarGrupo').submit((e) => {
    let objetoEditarGrupo = {
        idLicenciatura: this.idLicenciaturaGrupoEditar.value.trim(),
        idturno: this.idTurnoGrupoEditar.value.trim(),
        idGrupo: this.idGrupoEditar.value.trim(),
        grupo: this.nombreGrupoEditar.value.trim(),
        ciclo: this.cicloGrupoEditar.value.trim(),
        cuatrimestre: this.cuatrimestreGrupoEditar.value.trim(),
        opcion: "editarGrupo"
    };
    actualizarGrupo(objetoEditarGrupo);
    return false;
});

var actualizarGrupo = (objetoEditarGrupo) => {
    $.ajax({
        data: objetoEditarGrupo,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarGrupos(objetoEditarGrupo.idLicenciatura,objetoEditarGrupo.idturno)
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarGrupos(objetoEditarGrupo.idLicenciatura,objetoEditarGrupo.idturno)
            }
        }
    });
}

var eliminarGrupo = (idGrupo,idLicenciatura,idTurno,nombre) => {
    swal({
            title: "Advertencia",
            text: "¿Esta seguro de eliminar al grupo " + nombre + "?",
            icon: "warning",
            buttons: ["Cancelar","Aceptar"],
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {
                        idGrupo : idGrupo,
                        idLicenciatura : idLicenciatura,
                        idTurno : idTurno,
                        opcion : 'eliminarGrupo'
                    },
                    url: url + 'php/casos.php',
                    type: 'post'
                });
                swal("Se ha eliminado el grupo "+nombre +" correctamente", {
                    icon: "success",
                });
                cargarGrupos(idLicenciatura,idTurno);
            }
        });
}
//codigo Grupos
//codigo Alumnos
var cargarAlumnos = (idGrupo) => {
    $.ajax({
        data: { opcion: opcion, idGrupo: idGrupo },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                setTimeout(() => {
                    $('#tBodyAlumnos > tr').remove();
                    let contador = 1;
                    $.each(response.mensaje, (indice, valor) => {
                        $("#tBodyAlumnos").append('<tr><td>' + (contador++) + '</td><td>' + valor.matricula + '</td><td>' +  valor.Apellido_Paterno + " " + valor.Apellido_Materno + " " + valor.Nombres + '</td><td>' + valor.Direccion + '</td><td>' + valor.Numero_Celular + '</td><td>' + valor.Ciudad + '</td><td>' + valor.Poblacion  + '</td><td>' + valor.Correo + '</td><td>' + valor.Foto + '</td><td>' + valor.Nombre_de_Referencia + '</td><td>' + valor.Parentesco + '</td><td>' + valor.Numero_Telefonico + '</td><td><div class="button-group"><button class="button expanded"  data-toggle="editarAlumno" onclick="cargarDatosDelAlumno(' + valor.id_Alumno + ')">Editar</button><button class="button expanded alert" onclick="eliminarAlumno(' + valor.id_Alumno +',' + valor.id_grupo +',\'' + valor.Nombres + '\')">Eliminar</button></div></td>');
                    });
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").css("display", "none");
                    $("#contendor-tabla").css("display", "block");
                },1500);
            }
            else{
                setTimeout(() => {
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").html(response.mensaje);
                }, 1500);
            }
        }
    });   
}

var cargarDatosDelAlumno = (idAlumno) =>{
    $.ajax({
        data: { opcion: "cargarDatosDelAlumno", idAlumno: idAlumno },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
               $('#idGrupoAlumnoEditar').val(response.mensaje[0].id_grupo)
               $('#idAlumnoEditar').val(response.mensaje[0].id_Alumno)
               $('#matriculaAlumnoEditar').val(response.mensaje[0].matricula)
               $('#nombreAlumnoEditar').val(response.mensaje[0].Nombres)
               $('#apellidoPaternoAlumnoEditar').val(response.mensaje[0].Apellido_Paterno)
               $('#apellidoMaternoAlumnoEditar').val(response.mensaje[0].Apellido_Materno)
               $('#direccionAlumnoEditar').val(response.mensaje[0].Direccion)
               $('#numeroCelularAlumnoEditar').val(response.mensaje[0].Numero_Celular)
               $('#ciudadAlumnoEditar').val(response.mensaje[0].Ciudad)
               $('#poblacionAlumnoEditar').val(response.mensaje[0].Poblacion)
               $('#correoAlumnoEditar').val(response.mensaje[0].Correo)
               $('#fotoAlumnoEditar').val(response.mensaje[0].Foto)
               $('#referenciaAlumnoEditar').val(response.mensaje[0].Nombre_de_Referencia)
               $('#parentescoAlumnoEditar').val(response.mensaje[0].Parentesco)
               $('#numeroTelefonicoAlumnoEditar').val(response.mensaje[0].Numero_Telefonico)
            }
            else
                alert(response.mensaje)
        }
    });
}

var formAgregarAlumno = document.forms.namedItem("formularioAgregarAlumno");
if(formAgregarAlumno!=null)
    formAgregarAlumno.addEventListener('submit', (e) => {
        
        let objetoAgregarAlumno = {
            idGrupo: this.idGrupoAlumnoAgregar.value.trim(),
            matricula: this.matriculaAlumnoAgregar.value.trim(),
            nombre: this.nombreAlumnoAgregar.value.trim(),
            apellidoPaterno: this.apellidoPaternoAlumnoAgregar.value.trim(),
            apellidoMaterno: this.apellidoMaternoAlumnoAgregar.value.trim(),
            direccion: this.direccionAlumnoAgregar.value.trim(),
            numeroCelular: this.numeroCelularAlumnoAgregar.value.trim(),
            ciudad: this.ciudadAlumnoAgregar.value.trim(),
            poblacion: this.poblacionAlumnoAgregar.value.trim(),
            correo: this.correoAlumnoAgregar.value.trim(),
            cargarFoto: this.cargarFotoAlumnoAgregar.files[0],
            referencia: this.referenciaAlumnoAgregar.value.trim(),
            parentesco: this.parentescoAlumnoAgregar.value.trim(),
            numeroTelefonico: this.numeroTelefonicoAlumnoAgregar.value.trim()
        };
        if(!isEmpty(objetoAgregarAlumno.idGrupo) && !isEmpty(objetoAgregarAlumno.matricula) && !isEmpty(objetoAgregarAlumno.nombre) && 
        !isEmpty(objetoAgregarAlumno.apellidoPaterno) && !isEmpty(objetoAgregarAlumno.apellidoMaterno)  && !isEmpty(objetoAgregarAlumno.direccion) &&
        !isEmpty(objetoAgregarAlumno.numeroCelular) && !isEmpty(objetoAgregarAlumno.ciudad) && !isEmpty(objetoAgregarAlumno.poblacion) &&
        !isEmpty(objetoAgregarAlumno.correo) && validarEmail(objetoAgregarAlumno.correo)  && objetoAgregarAlumno.cargarFoto !=undefined && !isEmpty(objetoAgregarAlumno.referencia) &&
        !isEmpty(objetoAgregarAlumno.parentesco) && !isEmpty(objetoAgregarAlumno.numeroTelefonico) ){
                agregarAlumno();
        }
        
    },false);

var agregarAlumno = () => {
    let data = new FormData($('#formularioAgregarAlumno')[0]);
    data.append("opcion", "agregarAlumno"); 
    let idGrupo = $('#idGrupoAlumnoAgregar').val();
    $.ajax({
        url: url + 'php/casos.php',
        type: 'post',
        data: data,
        complete: (data) => {
            if (data.responseJSON.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : data.responseJSON.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarAlumnos(idGrupo)
                $("#formularioAgregarAlumno")[0].reset();
            }
            else {
                swal({
                    title : "Error",
                    text : data.responseJSON.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarAlumnos(idGrupo)
                $("#formularioAgregarAlumno")[0].reset();
            }
        },
        processData: false,
        contentType: false
    })
}

var form = document.forms.namedItem("formularioEditarAlumno");
if(form!=null)
    form.addEventListener('submit', (e) => {
        let data = new FormData($('#formularioEditarAlumno')[0]);
        data.append("opcion", "editarAlumno");
        let idGrupo = $('#idGrupoAlumnoEditar').val();
        $.ajax({
            url: url + 'php/casos.php',
            type: 'post',
            data: data,
            /*complete: (data) => {
                let response= $.parseJSON(data.responseText);
                if (response.estado == 'ok') {
                    alert(response.mensaje);
                    cargarAlumnos(idGrupo);
                }
                else {
                    alert(response.mensaje);
                    cargarAlumnos(idGrupo);
                }
            },*/
            processData: false,
            contentType: false
        })
        swal({
            title : "Exito",
            text : "Se edito correctamente",
            icon : 'success',
            timer : 2000,
            buttons : false
        });
        cargarAlumnos(idGrupo);
    },false);

var eliminarAlumno = (idAlumno,idGrupo,nombre) => {
        swal({
            title: "Advertencia",
            text: "¿Esta seguro de eliminar al alumno " + nombre + "?",
            icon: "warning",
            buttons: ["Cancelar","Aceptar"],
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {
                        idAlumno : idAlumno,
                        idGrupo : idGrupo,
                        opcion : 'eliminarAlumno'
                    },
                    url: url + 'php/casos.php',
                    type: 'post'/*,
                    success: (response) => {
                       if (response.estado == 'ok') {
                            alert(response.mensaje);
                            cargarAlumnos(idGrupo);
                        }
                        else {
                            alert(response.mensaje);
                            cargarAlumnos(idGrupo);
                        }
                    }*/
                });
                swal("Se ha eliminado el alumno "+nombre +" correctamente", {
                    icon: "success",
                });
                cargarAlumnos(idGrupo);
            }
        });
}
//codigo Alumnos
//verifica si los input están vacíos
var isEmpty = (input) => {
    return (input.length === 0) ? true : false;
}  
var validarEmail = (email) => {
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}
//cargar imagenes
var formularioSubirImagenes = document.forms.namedItem("cargarImagenes");
if(formularioSubirImagenes!=null)
    formularioSubirImagenes.addEventListener('submit', (e) => {
        let formularioCargarImagenes = new FormData($('#cargarImagenes')[0]);
        formularioCargarImagenes.append('opcion','cargarFotografias');
        $.ajax({
            url: url + 'php/casos.php',
            type: 'post',
            data: formularioCargarImagenes,
            complete: (data) => {
               if(data.responseJSON.estado == 'ok'){
                    swal({
                        title : "Exito",
                        text : data.responseJSON.mensaje,
                        icon : 'success',
                        timer : 2000,
                        buttons : false
                    });
                    $('#cargarImagenes')[0].reset();
                }
                else{
                    swal({
                        title : "Error",
                        text : data.responseJSON.mensaje,
                        icon : 'error',
                        timer : 2000,
                        buttons : false
                    });
                }
            },
            processData: false,
            contentType: false
        });
    },false);
//cargar imagenes
//cargar csv
var formularioSubirCsv = document.forms.namedItem("formularioCargarCsv");
if(formularioSubirCsv != null)
    formularioSubirCsv.addEventListener('submit', (e) => {
        let formularioCargarCsv = new FormData($('#formularioCargarCsv')[0]);
        formularioCargarCsv.append('opcion','cargarCsv');
        $.ajax({
            url: url + 'php/casos.php',
            type: 'post',
            data: formularioCargarCsv,
            complete: (data) => {
              if(data.responseJSON.estado == 'ok'){
                    swal({
                        title : "Exito",
                        text : data.responseJSON.mensaje,
                        icon : 'success',
                        timer : 2000,
                        buttons : false
                    });
                    $('#formularioCargarCsv')[0].reset();
                }
                else{
                    swal({
                        title : "Error",
                        text : data.responseJSON.mensaje,
                        icon : 'error',
                        timer : 2000,
                        buttons : false
                    });
                }
            },
            processData: false,
            contentType: false
        });
        $('#formularioCargarCsv')[0].reset();
    },false);
//cargar csv

//cargar usuarios
var cargarUsuarios = () =>{
    $.ajax({
        data: { opcion: opcion },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response)=>{
            if(response.estado == 'ok'){
                setTimeout(() => {
                    $('#tBodyUsuarios > tr').remove();
                    $.each(response.mensaje, (indice, valor) => {
                        $("#tBodyUsuarios").append('<tr class="text-center"><td>'+ valor.Usuario  + '</td><td>' + (transformarAAsteriscos(valor.Password))  + '</td><td>' + ((valor.Tipo == 1) ? "Administrador" : "Usuario") + '</td><td><div class="button-group"><button class="button"  data-toggle="editarUsuario" onclick="cargarDatosDelUsuario(' + valor.id_Usuario + ')">Editar</button><button class="button alert" onclick="eliminarUsuario(' + valor.id_Usuario + ",\'" + valor.Usuario  + "\'" + ')">Eliminar</button></div></td>');
                    })
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").css("display", "none");
                    $("#contendor-tabla").css("display", "inline-table");
                }, 1500);
            }
            else{
                setTimeout(() => {
                    $("#cargando").css("display", "none");
                    $("#cargandoTexto").html(response.mensaje);
                }, 1500);
            }
        }
    });
}

var eliminarUsuario = (idUsuario, usuario) =>{
    swal({
        title: "Advertencia",
        text: "¿Esta seguro de eliminar a " + usuario + "?",
        icon: "warning",
        buttons: ["Cancelar","Aceptar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                data: { 
                    idUsuario : idUsuario,
                    opcion : 'eliminarUsuario' 
                },
                url: url + 'php/casos.php',
                type: 'post'
            });
            swal("Se ha eliminado a " + nombre +" correctamente", {
                icon: "success",
            });
            cargarUsuarios();
        }
    })
}

var cargarDatosDelUsuario = (idUsuario)=>{
    $.ajax({
        data: {  opcion: "cargarDatosDeUsuario", idUsuario: idUsuario },
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                $("#idUsuario").val(response.mensaje[0].id_Usuario)
                $("#usuario").val(response.mensaje[0].Usuario)
                $("#password").val(response.mensaje[0].Password)
                $("#tipoDeUsuario").val(response.mensaje[0].Tipo)
            }
            else
                alert(response.mensaje)
        }
    });
}

$('#formularioEditarUsuario').submit((e) => {
    let objetoEditarUsuario= {
        idUsuario: this.idUsuario.value.trim(),
        usuario: this.usuario.value.trim(),
        password: this.password.value.trim(),
        tipoDeUsuario: this.tipoDeUsuario.value.trim(),
        opcion: "editarUsuario"
    };
    actualizarUsuario(objetoEditarUsuario)
    return false;
});

var actualizarUsuario = (objetoUsuario) => {
    $.ajax({
        data: objetoUsuario,
         url: url + 'php/casos.php',
         type: 'post',
         success: (response) => {
             if (response.estado == 'ok') {
                swal({
                     title : "Exito",
                     text : response.mensaje,
                     icon : 'success',
                     timer : 2000,
                     buttons : false
                });
                cargarUsuarios();
             }
             else {
                swal({
                     title : "Error",
                     text : response.mensaje,
                     icon : 'error',
                     timer : 2000,
                     buttons : false
                });
                cargarUsuarios();
            }
        }
    });
}

$('#formularioAgregarUsuario').submit((e) => {
    let objetoUsuario = {
        usuario: this.agregarNombreUsuario.value.trim(),
        password: this.agregarPassword.value.trim(),
        tipoUsuario: this.agregarTipoUsuario.value.trim(),
        opcion: "agregarUsuario"
    };   
    if( !isEmpty(objetoUsuario.usuario) && !isEmpty(objetoUsuario.password))
        agregarUsuario(objetoUsuario);
    return false;
});

var agregarUsuario = (objetoUsuario) => {
    $.ajax({
        data: objetoUsuario,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok') {
                swal({
                    title : "Exito",
                    text : response.mensaje,
                    icon : 'success',
                    timer : 2000,
                    buttons : false
                });
                cargarUsuarios();
                $("#formularioEditarUsuario")[0].reset();
            }
            else {
                swal({
                    title : "Error",
                    text : response.mensaje,
                    icon : 'error',
                    timer : 2000,
                    buttons : false
                });
                cargarUsuarios();
                $("#formularioEditarUsuario")[0].reset();
            }
        }
    });
}

var transformarAAsteriscos = (cadena) => cadena.replace(/./g,"*");

$('#mostrarContrasenia').click(function(){
    if ($('#password').attr("type") == 'password')
        $('#password').attr("type","text")
    else
        $('#password').attr("type","password")
    return false;
});


$('#mostrarContraseniaAgregar').click(function(){
    if ($('#agregarPassword').attr("type") == 'password')
        $('#agregarPassword').attr("type","text")
    else
        $('#agregarPassword').attr("type","password")
    return false;
});

