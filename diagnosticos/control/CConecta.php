<?php
class CConecta{
		public $host;
		public $usua;
		public $pass;
		public $base;
		
		function CConecta(){
			$this->host='localhost';
			$this->host='localhost';
			$this->usua='root';
			$this->pass='';
			$this->base='proyecto';
			
		}
		
		function conex(){
			$llave='';
			$error="";
			if($llave=mysqli_connect($this->host,$this->usua,$this->pass)){
				if(mysqli_select_db($llave,$this->base)){
					
				}
				else{
					echo die('FATAL ERROR: No connection to: '.$this->base);
					return $error;
				}
			}
			else{
				echo die('Fatal ERROR: No Connection MySQL' . mysqli_error);
				return $error;
			}
			return $llave;
		}
	}
?>