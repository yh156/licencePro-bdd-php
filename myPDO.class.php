<?php
class myPDO
{
	private static $pdo = null;


	private function __construct(){
		self::$pdo = new PDO('mysql:dbname=tp_php;host=localhost',"root" ,""); 
	}

	public static function getInstance(){  
    if(is_null(self::$pdo)){
		new myPDO();
    }
    return self::$pdo;
  }

}
?>