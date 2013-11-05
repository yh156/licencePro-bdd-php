<?php
class LigneHTML extends ElementHTML
{

	private $cellules;

	public function __construct($data){
		foreach ($data as $key => $value) {
			$this->cellules[$key] = $value;
		}
		
	}

	public  function construireDebut(){
		$debut  = "<tr>";
		echo $debut;
	}

	public function construireCorps(){
		$corps = "";		
		foreach ($this->cellules as $key => $value) {
			$value->afficher();
		}
	}

	public function construireFin(){
		$fin =  "</tr>";
		echo $fin;
	}


}

?>