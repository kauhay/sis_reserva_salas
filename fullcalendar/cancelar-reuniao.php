<!doctype html>
<html lang="pt-br">

<head>
  <title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS --> 
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/fontico/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
<!-- tabela -->

	<link href="new/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<link href="new/sk.css" rel="stylesheet">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->

	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="new/js/jquery.form.js"></script>

</head>

<body>

<?php

session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = 'login.php';</script>");
}

$users=$_SESSION['user'];

$id=$_POST['id'];

$user2=$_POST['user'];
$id_index=$_POST['id_index'];
$index=$_POST['index'];

$start=$_POST['start'];

$data = explode(" ", $start);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$add_start_sem_barra = $data_sem_barra . " " . '00:00:00';


$sala = filter_input(INPUT_POST, 'nome_sala', FILTER_SANITIZE_STRING);

ini_set('display_errors', 0 );
error_reporting(0);

include '../conexao.php'; 

$cont = 0;
$sql1 = "SELECT * FROM events WHERE id_index = '$id_index'";
$resultado1 = mysqli_query($conn,$sql1) or die("Erro ao retornar dados 1");

while ($registro1 = mysqli_fetch_array($resultado1))
{
$id_index2 = $registro_data['id_index'];
$cont++;
}

?>

  <div id="wrapper">
		<!-- NAVBAR -->

	<?php include 'topo.php';?>

		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT  william -->
<br>
<?php


// verifica se o usuario que esta fazendo o cancelamento tem permição.
if ($users==$user2 || $users=='selton') {

  // if de verificação, ele verifica se a reserva a ser excluida é uma reserva recorrente 
if ($cont > 1 && $index == 'sim' && $id_index > 1) {
	$sql = "DELETE FROM events WHERE start >= '$add_start_sem_barra' AND id_index='$id_index'";
	$result = mysqli_query($conn, $sql) or die("Erro ao retornar dados delete $add_start_sem_barra");

{ echo "<meta http-equiv=refresh content='0; URL=index.php?salaget=$sala';> "; }

} else {
	
	$sql = "DELETE FROM events WHERE id='$id'";
	$result = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
	
	{ echo "<meta http-equiv=refresh content='0; URL=index.php?salaget=$sala';> "; }

}

} else {
echo "<meta http-equiv=refresh content='3; URL=index.php?salaget=$sala';>
<br><br><br><br>
<center><h1>Você não é o responsável por essa reunião!
<br>Entre em contato com o criador da reunião.</h1></center>";
}

?>

</div></div>
</body>

</html>

