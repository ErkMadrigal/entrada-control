<?php include './php/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Salvador Felipe Martinez Lopez">
	<meta name="author" content="Carlos Antonio Gonzales Rosas">
	<meta name="author" content="Noelia Ariadna Mejía Arzaluz">
	<meta name="description" content="Sistema control de Entrada">    
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Inicio</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/ico/icono.ico"> 
	<link rel="stylesheet" href="css/control-entrada.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body class="fondo"> 
		<div class="container" id="QR-Code">
			<div class="panel panel-info">
				<div class="panel-heading" style="background: #004c98;">
					<div class="navbar-form navbar-left">
						<h4 style="color: white;">Sistema de Entrada </h4>
					</div>
					<div class="navbar-form navbar-right">
						<select class="form-control" style="display: none;" id="camera-select"></select>
						<div class="form-group">
							<button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip">
								<span class="glyphicon glyphicon-play"></span>
							</button>
							<button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip">
								<span class="glyphicon glyphicon-pause"></span>
							</button>
							<button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip">
								<span class="glyphicon glyphicon-stop"></span>
							</button>
							<a href="login.php" class="btn btn-success btn-sm" style="outline: none;">Login</a>
						</div>
					</div>
				</div>
				<div class="panel-body text-center">
					<div class="col-md-12">
						<div class="well" style="position: relative;display: inline-block;">
							<canvas style="height: 320px;width: 440px;" width="520" height="440" id="webcodecam-canvas"></canvas>
							<div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
							<div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
							<div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
							<div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
						</div>
					</div>
					<div class="col-md-6" style="display: none;">
						<div class="thumbnail" id="result">
							<div class="well" style="overflow: hidden;">
								<img width="420" height="340" id="scanned-img" src="">
							</div>
							<div class="caption">
							<!--	<h3>Resultado del código QR</h3>-->
								<p id="scanned-QR"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div style="text-align: center;">
				<span class="relogf" id="relojvivo"></span>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<script >var url = "<?php echo $raiz; ?>";</script>
		<script src="js/sweetalert.min.js"></script>
		<script src="js/relog.js"></script>
		<script src="js/filereader.js"></script>
		<script src="js/qrcodelib.js"></script>
		<script src="js/webcodecamjs.js"></script>
		<script src="js/main.js"></script>
</body>
</html>
