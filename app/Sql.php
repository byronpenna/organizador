<?php 
class Sql
{
	protected	$connection;
	public 		$query;
	function __construct(){
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	}
	function execute(){
		return mysqli_query($this->connection,$this->query);
	}
	function executeReader(){
		$rs = $this->execute();
		$i = 0;
		$objs = null;
		while ($row = mysqli_fetch_assoc($rs)) {
			$obj = (object)$row;
			$objs[$i] = $obj;
			$i++;
		}
		return $objs;
	}
	function executeQuery(){
		echo "Entro";
		$result = $this->execute();
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
}