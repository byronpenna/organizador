<?php 
class test extends Controller
{
	
	function index(){
		$var = file_get_contents("http://www.neobux.com/c/rl/?vl=A0F10A8CFAE72D3987E92001F98675F8&ss3=2");
		echo $var;

	}
}