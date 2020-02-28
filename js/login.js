//inicializa el plugin de foundation
$(document).foundation();

$('#formularioLogin').submit((e) => {
    let objetoLogin = {
        usuario: this.usuario.value,
        password: this.password.value,
        opcion: 'validarUsuario'
    };
    if (!isEmpty(objetoLogin.usuario) && !isEmpty(objetoLogin.password))
        iniciarSesion(objetoLogin)
    else
        swal({
            title: "Error",
            text: "Algún campo esta vacío, por favor revisa de nuevo",
            icon: "error",
            buttons: false,
            timer: 2000
        })
    return false;
});
//codigo para validar un usuario e iniciar sesion
var iniciarSesion = (objetoLogin) => {
    $.ajax({
        data: objetoLogin,
        url: url + 'php/casos.php',
        type: 'post',
        success: (response) => {
            if (response.estado == 'ok')
                location.href = url + 'php/redireccionar-usuario.php?usuario=' + response.mensaje[0].Usuario + "&tipoDeUsuario=" + response.mensaje[0].Tipo;
            else {
                $('#formularioLogin')[0].reset();
                swal({
                    title: "Error",
                    text: response.mensaje,
                    icon: "error",
                    buttons: false,
                    timer: 2000
                })
            }
        }
    });

}
var isEmpty = (input) => (input.length === 0) ? true : false;

$('#mostrarContraseniaLogin').click(()=>{
    resetearPassword('#password')
    return false;
});

var resetearPassword = (input) => {
    if($(input).attr("type") == 'password')
        $(input).attr("type","text")
    else
        $(input).attr("type","password")
    return input;
}