<?php
function loadClass($className){
	require $className . '.class.php';
}
spl_autoload_register('loadClass');
?>

<html>
<?php
	if(isset($_GET['ligne']))
		$maxligne = $_GET['ligne'];
	else
		$maxligne = 10;

	if (isset($_GET['col'])) 
		$maxcol = $_GET['col'];
	else
		$maxcol = 5;
	
	$data;
	$count = 1;
	for ($i=0; $i < $maxcol ; $i++) {		
		for ($j=0; $j < $maxligne; $j++) { 
			$data[$i][$j] = "Cellule ".$count;
			$count++;
		}
	}	
	$table = new TableHTML($data);
	$table->afficher();
?>
</html>
