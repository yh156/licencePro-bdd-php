<?php
class TableHTML extends ElementHTML
{
	private $lignes;

	public function __construct($data){		
		foreach ($data as $key => $value) {			
			$this->lignes[$key] = new LigneHTML($value);
		}	
	}

	public  function construireDebut(){
		$debut  = "<table style='border: 1px solid black'";
		echo $debut;
	}

	public function construireCorps(){		
		$corps = ">";
		foreach ($this->lignes as $key => $value) {	
			$value->afficher();
		}		
	}

	public function construireFin(){
		$fin =  "</table>";
		echo $fin;
	}
}


?>