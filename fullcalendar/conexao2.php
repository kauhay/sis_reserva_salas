<?php
	try{
	$conn = new PDO('mysql:host=localhost;dbname=agenda', 'root', '');
	$conn -> exec("SET CHARACTER SET utf8");
	}
	catch(PDOException $e){
		echo "<script> alert('Erro na conexão!'); </script>";
	}

	date_default_timezone_set('America/Fortaleza');
?>
