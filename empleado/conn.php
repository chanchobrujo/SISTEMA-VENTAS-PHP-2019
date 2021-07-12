<?php 
	$servidor ='localhost';
	$usuario ='root';
	$clave ='';
	$bd ='sistema_web';
	$con = @mysqli_connect($servidor,$usuario,$clave,$bd) or die('ERROR'.mysql_error());
	
?>