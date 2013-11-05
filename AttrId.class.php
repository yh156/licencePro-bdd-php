<?php

/**
* 
*/
class AttrId extends Attribut
{	
	public function construireDebut(){
		$this->elementhtml->construireDebut();
		$debut = " id='".$this->value."'>";		
		echo $debut;
	}
}

?>