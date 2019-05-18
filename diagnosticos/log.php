<!doctype html/>
<html>
	<head>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="estilos/for.css"/>
		<link type="text/css" rel="stylesheet" href="estilos/sg.css"/>
	</head>
	<body>
		<div id="menu" class="cont">
			<ul >
				<button><li><a href="index.php">Inicio</a></li></button>
				<button><li><a href="regpac.php
				<?php
				if(!empty($_SESSION['guest'])){
					echo "?g=".$_SESSION['guest']."&error=0";
				}
				?>
				">Registrarse</a></li></button>
				<button id="esq"><li><a href="log.php">Iniciar Sesión</a></li></button>
			</ul>
		</div>
		
		<div id="contenido" class="cont">
			<h1>Hola, soy Eduardo, y estás viendo Disney Channel</h1>
			<div class="inter">
				<form method="post" action="control/login.php">
					<label for="nomusu">Nombre:</label>
					<input type="text" name="nomusu"/><br/><br/>
					<label for="uspass">Peso:</label>
					<input type="text" name="uspass"/><br/><br/>
					<input type="submit"/>
				</form>
			</div>
		</div>
		
		<div id="fo" class="cont">
			
			<div id="lef">
				COSA 1
			</div>
			
			<div id="cen">
				COSA 2
			</div>
			
			<div id="rig">
				COSA 3
			</div>
			
		</div>
	</body>
</html>