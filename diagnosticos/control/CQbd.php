<?php	
		session_start();
		require_once('CConecta.php');
		$conejo=new CConecta();
		$con=$conejo->conex();
		if($con && !empty($_GET['conpac']) && !empty($_GET['nombre']) && !empty($_GET['peso']) && !empty($_GET['estatura']) && !empty($_GET['edad']) /*&& !empty($expnum)*/){
			if(dobleU($_GET['nomusu'],$con)){
				$query='INSERT INTO pacientes(conpac,nombre,peso,estatura,edad) VALUES("'.$_GET['conpac'].'","'.$_GET['nombre'].'",'.$_GET['peso'].','.$_GET['estatura'].','.$_GET['edad'].')';
			if(mysqli_query($con,$query)){
			echo $query;
			$bandera=true;
			$hoy=date('Y-m-d');
			$queryU='INSERT INTO usuarios(conusu,nomusu,uspass,regdat,paciente) VALUES("'.$_GET['conusu'].'","'.$_GET['nomusu'].'","'.$_GET['uspass'].'","'.$hoy.'","'.$_GET['conpac'].'")';
			echo $queryU;
				if(mysqli_query($con,$queryU)){
					echo 'REGISTRADO';
					$_SESSION['usk']=serialize($_GET['conpac']);
					header('location:../inicio.php?lp='.$_GET['conpac'].'&un='.$_GET['nomusu']);
				}
				else{
					header('location:../regpac.php?error=101');
				}
			}
			else{
					header('location:../regpac.php?error=102');
				}
		}
			else{
				header('location:../regpac.php?error=2');
			}
		}
		else if($con && !empty($conpac) && !empty($peso) && !empty($estatura) && !empty($edad)){
			$query='INSERT INTO pacientes(conpac,nombre,peso,estatura,edad,expnum) VALUES("'.$conpac.'","'.$peso.'",'.$estatura.','.$edad.')';
			mysql_query($con->conex(),$query);
		}
		else{
			 header('location:../regpac.php?error=3');
		}
		
		
		function dobleU($un,$con){
			$bandera=true;
			
			$query='SELECT COUNT(*) AS total FROM usuarios WHERE nomusu="'.$_GET['nomusu'].'"';
			if($r=mysqli_query($con,$query)){
				$col=mysqli_fetch_assoc($r);
				
				$un=$col['total'];
				if(!$un==0){
					$bandera=false;
				}
			}
			
			return $bandera;
		}
?>