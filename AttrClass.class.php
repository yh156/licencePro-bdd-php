<?php
/**
* 
*/
class AttrClass extends Attribut
{
	
	public function construireDebut(){
		$this->elementhtml->construireDebut();
		$debut = " class='".$this->value."'>";
		return $debut;
	}
}
?>