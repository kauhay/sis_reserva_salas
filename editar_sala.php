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
	echo("<script>window.location = 'login.php';</script>");
}
 $user=$_SESSION['user'];

 include_once("conexao.php");
 

$id = $_POST['id'];

$localizacao=$_POST['localizacao'];

$lugares=$_POST['lugares'];

$telefone=$_POST['telefone'];

$skype=$_POST['skype'];

$teams=$_POST['teams'];

$descricao=$_POST['descricao'];

$titulo=$_POST['titulo'];


 
$sql = "SELECT * FROM salas where id = '$id'";
$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
// Obtendo os dados por meio de um loop while
// While para e exilição dos items selecionados no filtro
while ($registro = mysqli_fetch_array($resultado))
{
//$id = $registro['id'];


$localizacao2=$registro['localizacao'];

$lugares2=$registro['lugares'];

$telefone2=$registro['telefone'];

$skype2=$registro['skype'];

$teams2=$registro['teams'];

$descricao2=$registro['descricao'];

$titulo2=$registro['titulo'];



}

if($localizacao == null){$localizacao3 = $localizacao2;} else {$localizacao3 = $localizacao;}

if($lugares == null){$lugares3 = $lugares2;} else {$lugares3 = $lugares;}

if($telefone == null){$telefone3 = $telefone2;} else {$telefone3 = $telefone;}

if($skype == null){$skype3 = $skype2;} else {$skype3 = $skype;}

if($teams == null){$teams3 = $teams2;} else {$teams3 = $teams;}

if($descricao == null){$descricao3 = $descricao2;} else {$descricao3 = $descricao;}

if($titulo == null){$titulo3 = $titulo2;} else {$titulo3 = $titulo;}


$result_events = "UPDATE salas SET localizacao='$localizacao3',lugares='$lugares3', telefone='$telefone3', 
skype='$skype3', teams='$teams3', descricao='$descricao3', titulo='$titulo3'WHERE id ='$id'";
			$resultado_events = mysqli_query($conn, $result_events);
			
			//Verificar se alterou no banco de dados através "mysqli_affected_rows"
			if(mysqli_affected_rows($conn)){
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Evento editado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: index.php");
				}else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				header("Location: index.php");
					 }  
			
	?>

</div></div>
</body>

</html>
