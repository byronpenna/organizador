<?php
class Ptc extends Controller
{
	function index(){
		$ptcModel = $this->loadModel("PtcModel");
		$vars = new stdClass();
		$vars->table = $ptcModel->table();
		$this->view->render("ptc",$vars);
	}
}