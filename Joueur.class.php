<?php
/**
* 
*/
class Joueur extends CelluleHTML
{
	private $nom;
	private $prenom;
	private $avatar;
	
	function __construct($nom,$prenom,$avatar){
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->avatar = $avatar;
	}

	protected function construireCorps(){
		$corps = "";
		$corps .= $this->nom;
		$corps .= " ";
		$corps .= $this->prenom;
		echo $corps;
	}
}

?>