<?php
abstract class CelluleHTML extends ElementHTML
{

	protected $contenuCellule;

	public function __construct($data){
		$this->contenuCellule = $data;
	}

	public  function construireDebut(){
		$debut  = "<td style='border: 1px solid black'>";
		echo $debut;
	}

	public function construireFin(){
		$fin =  "</td>";
		echo $fin;
	}
}
?>