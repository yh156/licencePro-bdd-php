<?php
Abstract class ElementHTML
{
	public function afficher(){
		$this->construireDebut();		
		$this->construireCorps();		
		$this->construireFin();
	}

	protected Abstract  function construireDebut();
	protected Abstract function construireCorps();
	protected Abstract function construireFin();
}

?>