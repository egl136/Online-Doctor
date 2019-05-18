<?php
		if(
		(
		!empty($_POST['nombre']) && isset($_POST['nombre']) &&
		!empty($_POST['estatura']) && isset($_POST['estatura']) &&
		!empty($_POST['peso']) && isset($_POST['peso']) &&
		!empty($_POST['edad']) && isset($_POST['edad']) 
		)&&	
		(
		!empty($_POST['nomusu']) && isset($_POST['nomusu']) &&
		!empty($_POST['uspass']) && isset($_POST['uspass']) 		
		)
		){
			require_once('../modelo/CPaciente.php');
			require_once('../modelo/CUsuario.php');
			$pac=new CPaciente();
			$usu=new CUsuario();
			
			$pac->conpac=keys(12);
			$pac->nombre=$_POST['nombre'];
			$pac->edad=$_POST['edad'];
			$pac->estatura=$_POST['estatura'];
			$pac->peso=$_POST['peso'];
			
			$usu->conusu=keys(12);
			$usu->nomusu=$_POST['nomusu'];
			$usu->uspass=md5(sha1($_POST['uspass']));
			
			echo $usu->conusu;
			header('location:CQbd.php?conpac='.$pac->conpac.'&nombre='.$pac->nombre.' &edad='.$pac->edad.' &estatura='.$pac->estatura.' &peso='.$pac->peso.' &conusu='.$usu->conusu.' &nomusu='.$usu->nomusu.' &uspass='.$usu->uspass);
			
		}
		
		else{
			
			header('../regpac.php?error=2');
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