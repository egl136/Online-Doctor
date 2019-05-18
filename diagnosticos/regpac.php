<?php
session_start();
$_SESSION['usk']=serialize($_GET['g']);
if(!empty($_GET['g']) && isset($_GET['g']) && $_GET['error']==0){
	$guest=$_GET['g'];
}
else if(!empty($_GET['g']) && isset($_GET['g']) && $_GET['error']==1){
	header('location:index.php?ne=1');
}
?>
<!doctype html/>
<html>
	<head>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="estilos/for.css"/>
		<link type="text/css" rel="stylesheet" href="estilos/sg.css"/>
	</head>
	<body>
		<div id="menu" class="cont">
			<ul>
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
			<h1>Por favor llene los siguientes datos:</h1>
			<div id="consulta">
				<form  class="formularios" method="post" action="control/CForma.php">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre"/><br/><br/>
					<label for="peso">Peso:</label>
					<input type="text" name="peso"/><br/><br/>
					<label for="estatura">Estatura:</label>
					<input type="text" name="estatura"/><br/><br/>
					<label for="edad">Edad:</label>
					<input type="text" name="edad"/><br/><br/>
				
					<label for="nomusu">Nombre de usuario:</label>
					<input type="text" maxlength="12" name="nomusu"/>
					<?php
						if(!empty($_GET['error']) && isset($_GET['error']) && $_GET['error']==2){
					?>
						<p style="font-size:12px;color:red;">**Este usuario ya existe**</p>
					<?php	
						}
					?><br/><br/>
					<label for="uspass">Contraseña:</label>
					<input type="text" name="uspass"/><br/><br/>
					<input type="submit" value="Registrarse"/>
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