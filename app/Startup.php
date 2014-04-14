<?php 
class Startup
{
	function __construct()
	{
		$request 	= new Request();
		$controller = $request->getController();
		$method 	= $request->getMethod(); 
		$args 		= $request->getArgs();
		// echo $controller;
		if(!is_readable(CONTROLLERS.$controller.".php")){
			echo "Error 404";
			exit; # para evitar gasto de memoria ejecutando lo de abajo
		}
		$controller = $this->createController($controller);
		if(!method_exists($controller,$method)){
			echo "No existe metodo";
			exit;
		}
		$controller->{$method}($args);
	}
	private function createController($controller){
		require_once CONTROLLERS.$controller.".php";
		return new $controller();
	}
}