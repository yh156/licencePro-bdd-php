<?php
error_reporting(E_ALL /*^ E_NOTICE ^ E_WARNING*/);
function loadClass($className){
	require $className . '.class.php';
}
spl_autoload_register('loadClass');
session_start();
?>

<html>
	<meta charset="UTF-8" />
<?php
	$av = new Avatar("barimage.bmp");
        
        if(isset($_SESSION['isLog']) && $_SESSION['isLog'] == TRUE){ //si le citoyen est logué
            
        }
        else{ //si le citoyen n'est pas logué
            ?>
            <form action="signin.php" method="post">
                Login: <input type="text" name="login"><br>
                Password: <input type="password" name="pwd">
                <input type="submit" value="Sign In">
            </form>
            <a href="signup.php">sign up</a>
            <br>
            <br>
            <?php
        }

	/*
	 * Get de tous les citoyen
	 */
	$cit_manager = new Citoyen_Manager(null);
	$citoyens = $cit_manager->get();

	$table = new TableHTML($citoyens);
	$table->afficher();

	echo "<br>";
	/*
	 * find le citoyen "yhaut"
	 */
	$citoyen = $cit_manager->find("yhaut");
	//var_dump($citoyen);
	if($citoyen instanceof Citoyen){
            $table = new TableHTML(array(array($citoyen,$av)));
            $table->afficher();
	}
	else {
            echo "Aucun citoyen avec ce pseudo";
        }
		
	
	/*
	 * sup le citoyen avec l'id 3
	 */
	//$cit_manager->delete(3);


	//$tableId = new AttrId($table,"test");
	//$tableId->afficher();
	//$table->afficher();
?>
</html>
