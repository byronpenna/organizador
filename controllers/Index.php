<?php
class Index extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function index($ar){
		$this->view->render("index");
	}
}