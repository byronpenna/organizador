<?php 
class Request
{
	private $controller;
	private $method;
	private $args;

	function __construct(){
		//Get URL string and handle it.
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = explode('/', $url);

			$this->controller 	= strtolower(array_shift($url));
			$this->method 		= strtolower(array_shift($url));
	        $this->args 		= $url; //This could be an array.
	}
	// Gets and sets
		public function getController() {
			return $this->controller != null ? $this->controller : "index";
		}

		public function getMethod() {
			return $this->method != null ? $this->method : "index";
		}

		public function getArgs() {
			return $this->args != null ? $this->args : array("index");
		}
}