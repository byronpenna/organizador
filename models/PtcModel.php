<?php 
class PtcModel
{
	private $sql;
	function __construct(){
		$this->sql = new Sql();
	}
	function table(){
		$retorno  = "";
		$consulta = "SELECT * 
					 FROM ptc";
		$this->sql->query 	= $consulta;
		$reader 			= $this->sql->executeReader();
		foreach ($reader as $key => $ptc) {
			$retorno .= "<tr>";
			$retorno .= "<td> ".$ptc->nombre." </td>";
			$retorno .= "<td> ".$ptc->pagoPorReferidoDirecto." </td>";
			$retorno .= "<td> ".$ptc->pagoPorReferidoRentado." </td>";
			$retorno .= "<td> ".$ptc->costoReciclaje." </td>";
			$retorno .= "<td> ".$ptc->ganancias." </td>";
			$retorno .= "</tr>";
		}
		return $retorno;
	}
}
