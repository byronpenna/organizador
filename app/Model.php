<?php 
class Model
{
	protected $sql;
	function __construct(){
		$this->sql = new Sql();
	}
	function getQuerySQL($query){
		$this->sql->query 	= $query;
		$reader 			= $this->sql->executeReader();
		return $reader; 
	}
	function ExecuteSQL($query){
		$this->sql->query 	= $query;
		echo $query;
		return $this->sql->executeQuery();
	}
	

}