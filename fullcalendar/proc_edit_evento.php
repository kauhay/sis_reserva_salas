<!doctype html>
<html lang="pt-br">
 
<head>
  <title>SRS - Sistema de Reserva de Salas</title>
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


  <div id="wrapper">
		<!-- NAVBAR -->

	<?php //include ('topo.php');?>

		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->

<?php


session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = '../login.php';</script>");
}
 $user=$_SESSION['user'];

 $user2=$_POST['user'];

include_once("../conexao.php");



$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$sala = filter_input(INPUT_POST, 'nome_sala', FILTER_SANITIZE_STRING);

// converte do formato brasileiro para o formato do banco de dados
$start_sem_barra = explode("/", $start);
$start_sem_barra = implode("-", $start_sem_barra);
$start_sem_barra = strtotime($start_sem_barra);
$start_sem_barra = date("Y-m-d H:i:s", $start_sem_barra);

// converte do formato brasileiro para o formato do banco de dados 
$end_sem_barra = explode("/", $end);
$end_sem_barra = implode("-", $end_sem_barra);
$end_sem_barra = strtotime($end_sem_barra);
$end_sem_barra = date("Y-m-d H:i:s", $end_sem_barra);

if ($start_sem_barra > $end_sem_barra || $start_sem_barra == $end_sem_barra ) {

	echo "<center>
  <div class='alert alert-danger' role='alert'><h2>Erro ao Editar o evento, verifique se a hora inicial é menor que a final.<h2><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>
  </center>
  <meta http-equiv=refresh content='4; URL=index.php?salaget=$sala';> ";
  
  }else {

if ($user==$user2 || $user=='selton' || $user2=='selton'|| $user=='mikaelly' || $user2=='mikaelly'||
$user=='Jessica Rayane' || $user2=='Jessica Rayane' || $user=='gabriel.pacheco' || $user2=='gabriel.pacheco'
|| $user=='jefferson.mike@cocalqui.com.br' || $user2=='jefferson.mike@cocalqui.com.br' || $user=='Sávio' || $user2=='Sávio'
|| $user=='rita' || $user2=='rita' || $user2=='davy' || $user=='davy' || $user2=='liliam' || $user=='liliam'
|| $user2=='francisco' || $user=='francisco') {
	// code...

	 //Seleciona as datas iguais (Caso exista algum) à que usuário tentou marcar 
	 $sql_data = "SELECT start, end FROM events WHERE (start >= '$start_sem_barra' or end >= '$start_sem_barra') AND (start <= '$end_sem_barra' or end <= '$end_sem_barra') AND sala = '$sala' AND id != $id";
	 $resultado_data = mysqli_query($conn,$sql_data) or die("Erro ao retornar dados 1");
 
	 while ($registro_data = mysqli_fetch_array($resultado_data))
  {
   $id_data = $registro_data['start'];
  }
 
 
 // Condição se não existir nenhuma data igual a que o usuário tentou marcar //
 if (!isset($id_data)) {

		if(!empty($id) && !empty($title) && !empty($color) && !empty($start) && !empty($end)){
			//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
			$data = explode(" ", $start);
			list($date, $hora) = $data;
			$data_sem_barra = array_reverse(explode("/", $date));
			$data_sem_barra = implode("-", $data_sem_barra);
			$start_sem_barra = $data_sem_barra . " " . $hora;

			$data = explode(" ", $end);
			list($date, $hora) = $data;
			$data_sem_barra = array_reverse(explode("/", $date));
			$data_sem_barra = implode("-", $data_sem_barra);
			$end_sem_barra = $data_sem_barra . " " . $hora;

			$result_events = "UPDATE events SET title='$title', color='$color', start='$start_sem_barra', end='$end_sem_barra' WHERE id='$id'";
			$resultado_events = mysqli_query($conn, $result_events);

			//Verificar se alterou no banco de dados através "mysqli_affected_rows"
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Evento editado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: index.php?salaget=$sala");
			}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: ../index.php");
			}

		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("Location: ../index.php");
		}

		//se tiver alguma data igual ele vai fazer um location para o index.php //
	}else{
		echo "<center>
	  <div class='alert alert-danger' role='alert'><h2> A Reserva não pode ser atualizada pois já há um reserva no intervalo de Horário escolhido! <h2><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>
	  </center>
	  <meta http-equiv=refresh content='3; URL=../index.php';> ";
	}


} else {
	echo "<meta http-equiv=refresh content='4; URL=../index.php';>

<center><h1>Você não é o responsavel por essa reunião!
<br>Entre em contato com o criador da reunião para edita-la.</h1></center>


   ";
}}?>

</div></div>
</body>

</html>
