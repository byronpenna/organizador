<?php
class Login extends Controller
{
	function index(){
		
	}
	function autentificar(){
		$frm 		= $this->createPostObject();
		$indexModel = $this->loadModel("IndexModel");
		if($indexModel->login($frm)){
			session_start(true);
			$_SESSION['usuario'] = $frm->usuario;
			header("Location: /".FOLDER."main");
		}else{
			echo "Error en el inicio de session";
		}
	}
}
?>