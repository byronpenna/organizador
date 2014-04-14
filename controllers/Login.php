<?php
class Login extends Controller
{
	function index(){
		$this->view->render("main");
	}
	function autentificar(){
		$frm 		= $this->createPostObject();
		$indexModel = $this->loadModel("indexModel");
		if($indexModel->login($frm)){
			session_start(true);
			$_SESSION['usuario'] = $frm->usuario;
			$this->index();
		}else{
			echo "Error en el inicio de session";
		}
	}
}
?>