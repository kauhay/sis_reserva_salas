<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "agenda";

	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	date_default_timezone_set('America/Fortaleza');

?>
