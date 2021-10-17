
<?php
    session_start();

    	include 'conexao.php';


 if(isset($_SESSION['log'])==false){
        echo("<script>window.location = 'login.php';</script>");
    }
      $user=$_SESSION['user'];
?>

<!doctype html>
<html lang="pt-br">

<head>
	<title>Sistema de Controle Patrimônial</title>
	<meta charset="utf-8">
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

	<link href="new/vendor/datatables/datatables.bootstrap4.css" rel="stylesheet">

	<!-- <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script> -->

<style>
select{
  padding:8px 5px;
  border-radius:5px;
  color:#333;
  width:250px;
}
.font-awesome .fa{
  font-family: "Font Awesome 5 Free", Open Sans;
  font-weight:501;
}
</style>

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- TOPO -->
		


<?php
  
  include_once "topo.php";

?>


		<!-- TOPO -->
		
		<!-- MENU LATERAL -->
	
	<?php
  
	include_once "menu_lateral.php";

	?>

		<!-- MENU LATERAL -->

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Cadastrar Sala</h3>
					
						</div>
					
								


<div class="table-responsive">



	<form id="contact-form" method="post" action="cadastro_sala.php">

            <div class="col-md-2 col-sm-2">
               <input name="titulo" type="text" class="form-control" placeholder="Titulo da Sala" required>
            </div>
			<div class="col-md-1 col-sm-2">
               <input name="valor" type="text" class="form-control" placeholder="Numero da Sala" required>
            </div>

			<div class="col-md-1 col-sm-2">

			
			<select name="icon" class="form-control">
								<option value="" class="form-control">Tipo</option>
								<option value="fas fa-video">SALA DE VIDEO</option>
								<option value="far fa-comments">SALA DE REUNIÕES</option>
								<option value="fas fa-pencil-ruler">SALA DE TREINAMENTO</option>
								
			</select>
						
                      
            </div>

			<div class="col-md-2 col-sm-2">
               <input name="localizacao" type="text" class="form-control" placeholder="Localização da Sala" required>
            </div>

			<div class="col-md-2 col-sm-2">
               <input name="lugares" type="text" class="form-control" placeholder="Quant de lugares da Sala" required>
            </div>
			

			<div class="col-md-2 col-sm-2">
               <input name="telefone" type="text" class="form-control" placeholder="Telefone da Sala" required>
            </div>

			<div class="col-md-2 col-sm-2">
               <input name="skype" type="text" class="form-control" placeholder="Skype da Sala" required>
            </div>
			<BR><BR><BR>
			<div class="col-md-2 col-sm-2">
               <input name="teams" type="text" class="form-control" placeholder="Teams da Sala" required>
            </div>
		
			<div class="col-md-3 col-sm-2">
			<input name="descricao" type="text" class="form-control" placeholder="Descrição da Sala" required>
            </div>



			<br><br><br>   

            <div class="">
            <input type="submit" class="form-control submit btn btn-primary" value="Cadastrar">
            </div>

					
    </form>


</div>  



<br>

</div>
</div>






	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

	<script src="new/vendor/datatables/jquery.datatables.js"></script>
<script src="new/vendor/datatables/datatables.bootstrap4.js"></script>
<script src="new/js/sb-admin-datatables.min.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>

</html>


