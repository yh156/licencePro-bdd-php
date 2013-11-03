<?php
class CelluleHTML extends ElementHTML
{

	private $contenuCellule;

	public function __construct($data){
		$this->contenuCellule = $data;
	}

	protected  function construireDebut(){
		$debut  = "<td style='border: 1px solid black'>";
		return $debut;
	}

	protected function construireCorps(){
		$corps = $this->contenuCellule;
		return $corps;
	}

	protected function construireFin(){
		$fin =  "</td>";
		return $fin;
	}
}
?>