<?php
Abstract class ElementHTML
{
	public function afficher(){
		echo $this->construireDebut();		
		echo $this->construireCorps();		
		echo $this->construireFin();
	}

	protected Abstract  function construireDebut();
	protected Abstract function construireCorps();
	protected Abstract function construireFin();
}

?>