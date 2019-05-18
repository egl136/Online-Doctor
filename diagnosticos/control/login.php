<?php
	session_start();
	require_once('CConecta.php');
	$con=new CConecta();
	$conn=$con->conex();
	if(!empty($_POST['nomusu']) && isset($_POST['nomusu']) && !empty($_POST['uspass']) && isset($_POST['uspass'])){
		$query='SELECT COUNT(*) AS total FROM usuarios WHERE nomusu="'.$_POST['nomusu'].'" and uspass="'.md5(sha1($_POST['uspass'])).'"';
		if($r=mysqli_query($conn,$query)){
			$re=mysqli_fetch_assoc($r);
			if($re['total']==1){
				$query='SELECT conusu FROM usuarios WHERE nomusu="'.$_POST['nomusu'].'" and uspass="'.md5(sha1($_POST['uspass'])).'"';
				if($u=mysqli_query($conn,$query)){
					$us=mysqli_fetch_assoc($u);
					$sv=$us['conusu'];
					$sv=serialize($us['conusu']);
					$_SESSION['usk']=$sv;
					$query='SELECT paciente FROM usuarios WHERE conusu="'.$us['conusu'].'"';
					if($var=mysqli_query($conn,$query)){
						$llpa=mysqli_fetch_assoc($var);
						$lp=$llpa['paciente'];
						header('location:../inicio.php?lp='.$lp.'&un='.$_POST['nomusu']);
					}
				}
				else{
					header('location:../log.php?error=1');
				}
			}
			else{
				header('location:../log.php?error=2');
			}
		}
	}
	else{
		header('location:../log.php?error=3');
	}
?>