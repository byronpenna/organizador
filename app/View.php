<?php 
class View
{
	
	function __construct()
	{

	}
	function render($view){
		$sourceView = SITE.$view.".html";
		$view 		= file_get_contents($sourceView);
		$keys 		= $this->getJson("map1.json");
		$view 		= $this->setKeys($keys,$view);
		echo $view;
	}
	// funciones de plantilla
		function getJson($name){
			$json = file_get_contents(MAP.$name);
			$json = json_decode($json);
			return $json;
		}
		function setKeys($keys,$view){
			foreach ($keys as $key => $value) {
				$view = str_replace("{@".$key."}", $value, $view);
			}
			return $view;
		}
}