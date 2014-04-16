<?php 
class View
{
	
	function __construct()
	{

	}
	function render($view,$vars=null){// mandar un objeto con las variables dinamicas
		$sourceView = SITE.$view.".html";
		$view 		= file_get_contents($sourceView);
		$keys 		= $this->getJson("map1.json");
		$view 		= $this->setKeys($keys,$view);
		if($vars != null){
			$view = $this->setKeys($vars,$view,"#");
		}
		echo $view;
	}
	// funciones de plantilla
		function getJson($name){
			$json = file_get_contents(MAP.$name);
			$json = json_decode($json);
			return $json;
		}
		function setKeys($keys,$view,$char="@"){
			foreach ($keys as $key => $value) {
				$view = str_replace("{".$char."".$key."}", $value, $view);
			}
			return $view;
		}
}