<?php
abstract class Controller
{
	// Elementary functions 
		protected $view;
		public function __construct() {
			$this->view = new View();
		}
	// --------------
		public function loadModel($model){ // return instance object of model
			require_once MODELS . $model . ".php";
			$obj = new $model();
			return $obj;
		}
	// Data functions 
		public function createPostObject(){
			$obj = new stdClass();
			foreach ($_POST as $key => $value) {
				$obj->$key = $value;
			}
			return $obj;
		}

}