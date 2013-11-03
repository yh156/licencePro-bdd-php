<?php
class LigneHTML extends ElementHTML
{

	private $cellules;

	public function __construct($data){
		foreach ($data as $key => $value) {
			$this->cellules[$key] = new CelluleHTML($value);
		}

	}

	protected  function construireDebut(){
		$debut  = "<tr>";
		return $debut;
	}

	protected function construireCorps(){
		$corps = "";
		foreach ($this->cellules as $key => $value) {			
			$corps .= $value->afficher();
		}
		return $corps;
	}

	protected function construireFin(){
		$fin =  "</tr>";
		return $fin;
	}


}

?>