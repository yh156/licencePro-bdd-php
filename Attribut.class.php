<?php
/**
* 
*/
abstract class Attribut extends ElementHTML
{
	protected $value;
	protected $elementhtml;

	function __construct($elementhtml,$value){
		$this->value = $value;
		$this->elementhtml = $elementhtml;
	}

	protected function construireFin(){
		$this->elementhtml->construireFin();
	}

	protected function construireCorps(){
		$this->elementhtml->construireCorps();
	}

}

?>