<?php
	//INSERTAR CODIGOS Y CLASES DE REDES AQUI
	require_once('CConecta.php');
	$con=new CConecta();
	$conn=$con->conex();
	
	if(!empty($_GET['qry']) && isset($_GET['qry'])){
		$query='INSERT INTO sintomas(sintoma,lugar,nivel,frecuencia,duracion) VALUES("dolor","garganta",8,"siempre","siempre")';
		if(mysqli_query($conn,$query)){
			$query='INSERT INTO enfermedades(nombre,mascara,diagnostico,duracion,tipo,edad,temporada,sintoma1) VALUES("Infeccion Vias Respiratorias","tos","Infeccion","siempre","Infeccion",1,"siempre",68)';
			
			if(mysqli_query($conn,$query)){
				$hoy=date('Y-m-d');
				$query='INSERT INTO historial(conhis,paciente,enfermedad,fecha,consulta) VALUES("'.keys(12).'","'.$_GET['lp'].'",75,"'.$hoy.'","'.$_GET['qry'].'")';
				if(mysqli_query($conn,$query)){
				echo $query;
				header('location:../inicio.php?lp='.$_GET['lp'].'&un='.$_GET['us']);
				}
				else{
					echo $query;
				}
			}
			else{
				echo $query;
				header('location:../log.php?error=5');
			}
					
				
		}
		else{
			echo $query;
		}
	}
	else{
			echo $query;
		}
		
	
	
	function keys($long){
		$key="";
		$cadena="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$n=0;
		while($n<$long){
			$key.=substr($cadena,rand(0,strlen($cadena)-1),1);
			$n++;
		}
		return $key;
	}
	
?>