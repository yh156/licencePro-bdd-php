<?php
/**
* 
*/
class Avatar extends CelluleHTML
{
	private $img;

	function __construct($img){
		$this->img = $img;
	}

	protected function construireCorps(){
		$corps = "<img src='images/".$this->img."'/>";
		echo $corps;
	}
}
?>