<?php 
class IndexModel
{
	private $sql;
	function __construct(){
		$this->sql = new Sql();
	}
	function login($frm){
		$consulta = "SELECT COUNT(*) AS validacion
					FROM usuarios 
					WHERE usuario = '".$frm->usuario."' and pass = MD5('".$frm->pass."')";
		$this->sql->query 	= $consulta;
		$reader 			= $this->sql->executeReader();
		if ($reader[0]->validacion == 1) {
			return true;
		}else{
			return false;
		}
	}
}