<?php 
class PtcModel extends Model
{
	function __construct(){
		parent::__construct();

	}
	function table(){
		$consulta 	= " SELECT 	idPtc AS ptcId,nombre,pagoPorReferidoDirecto,pagoPorReferidoRentado,
						costoReciclaje,ganancias,
						(SELECT COUNT(*) FROM usuario_ptc WHERE idPtc = ptcId and usuario = 'sonyer10') AS unido
						FROM ptc";
		$reader 	= $this->getQuerySQL($consulta);
		$retorno 	= "";
		foreach ($reader as $key => $ptc) {
			$retorno .= "<tr>";
			$retorno .= "<td>".$ptc->nombre."</td>";
			$retorno .= "<td>".$ptc->pagoPorReferidoDirecto."</td>";
			$retorno .= "<td>".$ptc->pagoPorReferidoRentado."</td>";
			$retorno .= "<td>".$ptc->costoReciclaje."</td>";
			$retorno .= "<td>".$ptc->ganancias."</td>";
			if($ptc->unido == 0){
				$link = "Unirse";
			}else{
				$link = "Unido";
			}
			$retorno .= "<td>
							<a href='#' unido='".$ptc->unido."' class='unirsePtc'>".$link."</td>
						</td>";
			$retorno .= "</tr>";
		}
		return $retorno;
	}
	function insert($frm){
		$consulta = "INSERT INTO ptc VALUES(
			NULL,'".$frm->nombrePtc."',".$frm->pagoRefDirecto.",".$frm->pagoRefRentado.",".$frm->costoReciclaje.",0)";
		return $this->ExecuteSQL($consulta);
	}
}
