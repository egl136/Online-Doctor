<?php
	session_start();
	if(!empty($_SESSION['usk']) && isset($_SESSION['usk']) && !empty($_GET['lp']) && isset($_GET['lp']) && !empty($_GET['un']) && isset($_GET['un'])){
		
	
	
	$histo=array();
	$llave=$_GET['lp'];
	$usuario=$_GET['un'];
	require_once('control/CConecta.php');
	$con=new CConecta();
	$conn=$con->conex();
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
			<ul >
				<button><li><a href="inicio.php?lp=<?php echo $llave?>&un=<?php echo $usuario?>">Inicio</a></li></button>
				<button id="esq"><li><a href="control/logout.php">Cerrar Sesión</a></li></button>
			</ul>
		</div>
		
		<div id="contenido" class="cont">
			<h1>Bienvenido<?php echo " ".$usuario?></h1>
			<div id="consulta">
				<form  method="post" action="control/consultaR.php?lp=<?php echo $llave?>&us=<?php echo $usuario?>">
					<label for="consulta">Escriba sus sintomas aquí:</label>
					<input type="text" name="consulta"/><br/><br/>
					
					<input type="submit" value="Consultar"/>
				</form>
			</div>
			
			<div class="inter">
				<h3>Datos De Paciente: </h3>
				<h4>HISTORIAL MEDICO</h4>
					<table border="">
						<thead>
							<tr>
								<th>No.Consulta</th>
								<th>Consulta Realizada</th>
								<th>Enfermedad Diagnosticada</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$res;
									$qry='SELECT * FROM historial WHERE paciente="'.$llave.'"';
									
										if($res=mysqli_query($conn,$qry)){
											
										}
								
								
								while($n=mysqli_fetch_array($res)){?>
								<?php 	  $enf;
										  $query="SELECT nombre FROM enfermedades WHERE conenf=".$n['enfermedad'];
										
										  if($m=mysqli_query($conn,$query)){
											  
											  $no=mysqli_fetch_assoc($m);
											  $enf=$no['nombre'];
										  }?>
								<tr>
									
									<td><?php echo $n['conhis'];?></td>
									<td><?php echo $n['consulta'];?></td>
									<td><?php echo $enf;?></td>
									<td><?php echo $n['fecha'];?></td>
									
								</tr>
							<?php
								
								}?>
						</tbody>
					
					</table>
				
			</div>
			
			<div class="inter">
				<h3>Gente Compatible Con Su Tipo De Sangre</h3>
				<ul>
					<li>AQUI IRA LA GENTE QUE ES COMPATIBLE CON EL TIPO DE SANGRE</li>
				</ul>
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
	else{
		unset($_SESSION['usk']);
		session_destroy();
		header('location:index.php?error=4');
	}
?>