<?php
class CPaciente{
	public $nombre;
	public $peso;
	public $estatura;
	public $edad;
	public $conpac;
	public $numexp;
	public $us;
	
	function CPaciente(){
		require_once('CUsuario.php');
		$us=new CUsuario();
		
	}
	
	
	
}
?>