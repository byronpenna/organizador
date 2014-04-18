<?php 
class IndexModel extends Model
{
	function __construct(){
		parent::__construct();
	}
	function login($frm){
		$consulta = "SELECT COUNT(*) AS validacion
					FROM usuarios 
					WHERE usuario = '".$frm->usuario."' and pass = MD5('".$frm->pass."')";
		$reader 			= $this->getQuerySQL($consulta);
		if ($reader[0]->validacion == 1) {
			return true;
		}else{
			return false;
		}
	}
}