<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
function loadClass($className){
	require $className . '.class.php';
}
spl_autoload_register('loadClass');
?>

<html>
	<meta charset="UTF-8" />
<?php
	$av = new Avatar("barimage.bmp");
	$data = array(
		array(new Joueur("Haution","Yohann",$av),$av),
		array(new Joueur("Pignouf","Gérard",$av),$av)
	);

	/*
	 * Ajout de citoyen
	 */
	//$cit_manager = new Citoyen_Manager(new Citoyen("gege","Pignouf","Gérard","gege@gmail.com",null));
	//$cit_manager->add();

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
	else 
		echo "Aucun citoyen avec ce pseudo";
	
	/*
	 * sup le citoyen avec l'id 3
	 */
	//$cit_manager->delete(3);


	//$tableId = new AttrId($table,"test");
	//$tableId->afficher();
	//$table->afficher();
?>
</html>
