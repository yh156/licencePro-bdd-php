<?php
class myPDO
{
        /**
         *
         * @var PDO
         */
	private static $pdo = null;

        /**
         * /!\ PDO is set with pgsql. Change to mysql in the PDO constructor for a MySQL database
         */
	private function __construct(){
            try {
                self::$pdo = new PDO('pgsql:dbname=tp_php;host=localhost',"admin" ,"admin");
                self::$pdo->setAttribute(PDO::ERRMODE_EXCEPTION, true);
            } 
            catch (PDOException $exc) {
                echo $exc->getTraceAsString();
            } 
	}

	public static function getInstance(){  
    if(is_null(self::$pdo)){
		new myPDO();
    }
    return self::$pdo;
  }

}
?>