<?php
class Ptc extends Controller
{
	function index(){
		$ptcModel 		= $this->loadModel("PtcModel");
		$vars 			= new stdClass();
		$vars->table 	= $ptcModel->table();

		$this->view->render("ptc",$vars);
	}
	function insert(){
		$ptcModel 	= $this->loadModel("PtcModel");
		$frm 		= $this->createPostObject();
		if($ptcModel->insert($frm)){
			header("Location: /".FOLDER."ptc");
		}else{
			echo "No ingreso nada";
		}
	}
}