<?php
class TableHTML extends ElementHTML
{
	private $lignes;

	public function __construct($data){		
		foreach ($data as $key => $value) {			
			$this->lignes[$key] = new LigneHTML($value);
		}	
	}

	protected  function construireDebut(){
		$debut  = "<table style='border: 1px solid black'>";
		return $debut;
	}

	protected function construireCorps(){
		$corps = "";
		foreach ($this->lignes as $key => $value) {	
			$corps .= $value->afficher();
		}
		return $corps;
	}

	protected function construireFin(){
		$fin =  "</table>";
		return $fin;
	}


}


?>