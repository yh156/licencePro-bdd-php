<?php
error_reporting(E_ALL);
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

	$table = new TableHTML($data);
	$tableId = new AttrId($table,"test");
	$tableId->afficher();
?>
</html>
