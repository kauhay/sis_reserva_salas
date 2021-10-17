<!doctype html>
<html lang="pt-br" xml:lang="pt-br">
<head> 
	<title>SRS - Sistema de Reservas de Salas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

  <script src="https://kit.fontawesome.com/d98d40e574.js" crossorigin="anonymous"></script>
  
</head>

<?php
    session_start();

    if(isset($_SESSION['log'])==false){
        echo("<script>window.location = 'login.php';</script>");
    }
     $user=$_SESSION['user'];
?>


<?php
	include ("conexao.php");
?>

<?php

$titulo=$_POST['titulo'];

$valor=$_POST['valor'];

$icon=$_POST['icon'];

$localizacao=$_POST['localizacao'];

$lugares=$_POST['lugares'];

$telefone=$_POST['telefone'];

$skype=$_POST['skype'];

$teams=$_POST['teams'];

$descricao=$_POST['descricao'];


 $sql = "INSERT INTO salas (titulo, valor, icon, localizacao, lugares, telefone, skype, teams, descricao)
 VALUES ('$titulo', '$valor', '$icon', '$localizacao', '$lugares', '$telefone', '$skype', '$teams', '$descricao')";
 mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro 02");

mysqli_close($conn);

{ echo "<br><center><b><h2>Operação realizada com sucesso!</h2></b></center>
	<meta http-equiv=refresh content='1; URL=add_salas.php';> "; }


?>
</html>
