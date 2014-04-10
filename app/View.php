<?php 
class View
{
	
	function __construct()
	{

	}
	function render($view){
		$sourceView = ROOT."site".DS.$view.".html";
		$view = file_get_contents($sourceView);
		echo $view;
	}
}