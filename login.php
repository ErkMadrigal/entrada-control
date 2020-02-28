<?php include 'php/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <title>Iniciar sesión</title>
        <link rel="shortcut icon" href="img/ico/icono.ico"> 
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/motion-ui.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/control-entrada.css">
    </head>
    <body class="fondo fondo-login">
       <div class="row text-center ">
           <div class="columns medium-6 medium-offset-3">
                <form class="padding-3 rgba-azul-0-7 border" id="formularioLogin"  data-abide novalidate>
                    <h2 class="h2">Iniciar Sesión</h2>
                    <input type="text" name="usuario" id="usuario" required placeholder="Usuario">
                    <div class="input-group">
                        <input class="input-group-field" type="password" name="password" id="password" required placeholder="Password">
                        <div class="input-group-button">
                            <button id="mostrarContraseniaLogin" class="button no-outline"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <button class="button expanded bg-green boton-entrar">Entrar</button>
                </form>
           </div>
       </div>
        <script src="js/jquery.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script> var url =" <?php echo $raiz; ?>"; </script>
        <script src="js/foundation.min.js"></script>
        <script src="js/login.js"></script>

    </body>
</html>