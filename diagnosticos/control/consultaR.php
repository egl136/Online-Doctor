<?php
	if(!empty($_POST['consulta']) && isset($_POST['consulta'])){
		header('location:consulta.php?qry='.$_POST['consulta'].'&lp='.$_GET['lp'].'&us='.$_GET['us']);
	}
	else{
		echo 'NOC';
	}
?>