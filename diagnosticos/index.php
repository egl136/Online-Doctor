<?php
session_start();
if(!empty($_SESSION['usk']) && isset($_SESSION['usk'])){
	header('location:inicio.php');
}
$cadena="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$guest="";
$n=0;
while($n<6){
	$guest.=substr($cadena,rand(0,strlen($cadena)-1),1);
	$n++;
}
$_SESSION['guest']=$guest;
if(!empty($_SESSION['guest']) && isset($_SESSION['guest']) && empty($_GET['ne']) && !isset($_GET['ne'])){
			$error=0;		
}
else{
	$error=1;
	header('location:index.php?ne='.$error);
}

if(empty($_GET['ne'])){
?>
<!doctype html/>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="estilos/for.css"/>
		<link type="text/css" rel="stylesheet" href="estilos/sg.css"/>
		<meta charset="UTF-8">
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
			<h1>Hola, soy Eduardo, y estás viendo Disney Channel</h1>
			<div id="consulta" class="inter">
				<form class="formularios" method="post" action="consultaSR.php">
					<label for="conSR">Escriba sus sintomas aquí:</label>
					<input type="text" name="conSR"/><br/><br/>
					
					<label for="pesoSR">Peso:</label>
					<input type="text" name="pesoSR"><br/><br/>
					<label for="estaSR">Estatura:</label>
					<input type="text" name="estaSR"><br/><br/>
					<label for="edadSR">Edad:</label>
					<input type="text" name="edadSR"><br/><br/>
					<input type="submit">
				</form>
			</div>
			
			<div id="izq" class="inter">
				<h3>COSAS SOBRE LA PÁGINA</h3>
				<p>¿Desea la mayor precisión que podamos otorgar? Registrese, de esta manera tendremos un historial de diagnosticos cargado para mejor analisis y mejorar su consulta.</p>
				<a href="regpac.php?g=<?php echo$_SESSION['guest'];?>&error=<?php echo$error;?>">Registrate</a>
			</div>
			
			<div id="der"class="inter">
				<h3>COSAS SOBRE LOS USUARIOS</h3>
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
<?php
}
else if($_GET['ne']==1){
?>
<!doctype html/>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>POR FAVOR EVITE SER BANEADO DE ESTE PORTAL, ESTAS ACCIONES NO ESTÁN PERMITIDAS ALMENOS QUE SE PIDA PERMISO ESPECIAL</h1>
	</body>
</html>
<?php
}	
?>
