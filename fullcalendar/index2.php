<?php

ini_set('display_errors', 0 );
error_reporting(0);

include_once("../conexao.php");

$color='#3A87AD';
$sala=$_POST['nome_sala'];
$sala2="Escritorio Cocalqui";
$sala_title=$_POST['sala_tilte'];
$salaget2 = 'Escritorio Cocalqui';


session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = 'http://intranet.anigerne/index.php';</script>");
}
 $users=$_SESSION['user'];


if($sala == NULL){

	$salaget = $sala2;

} elseif ($sala2 == NULL) {

	$salaget = $sala;

}


if($sala == NULL){

	$salaget2 = $sala2;

} else {

	$salaget2 = $sala;

}

if ($sala != NULL){
$result_events = "SELECT * FROM events where sala = '$sala'";
$resultado_events = mysqli_query($conn, $result_events);
} 

elseif ($sala2 != NULL) {
	$result_events = "SELECT * FROM events where sala = '$sala2'";
	$resultado_events = mysqli_query($conn, $result_events);
} 

?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Sistema de Reservas de Salas	</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
			<link rel="icon" href="assets/img/favicon.png">

		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.js'></script>
		<script src='locale/pt-br.js'></script>


	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
		<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {

						$('#visualizar #id').text(event.id);
						$('#visualizar #id').val(event.id);
						$('#visualizar #title').text(event.title);
						$('#visualizar #title').val(event.title);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #color').val(event.color);
						$('#visualizar #user').text(event.user);
						$('#visualizar #user').val(event.user);
						$('#visualizar #id_index').text(event.id_index);
						$('#visualizar #id_index').val(event.id_index);
						$('#visualizar #serie').text(event.serie);
						$('#visualizar #serie').val(event.serie);

						localStorage.setItem('index_value', $('#id_index').val())
						localStorage.setItem('serie', $('#serie').val())
            $('#visualizar').modal('show');
            return false;


					},

					selectable: true,
					selectHelper: true,
					select: function(start, end){
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY'));
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY'));
						$('#cadastrar').modal('show');
					},
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){

								?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
								user: '<?php echo $row_events['user']; ?>',
								id_index: '<?php echo $row_events['id_index']; ?>',


								},
                <?php


							}
						?>
					]
				});
			});

			//Mascara para o campo data e hora
			function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}

				caracteres = '0123456789';
				separacao1 = '/';
				separacao2 = ' ';
				separacao3 = ':';
				conjunto1 = 2;
				conjunto2 = 5;
				conjunto3 = 10;
				conjunto4 = 13;
				conjunto5 = 16;
				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
					if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacao2;
					else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacao3;
					else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacao3;
				}else{
					event.returnValue = false;
				}
			}
		</script>

<style>
.fc-today .fc-day-number {

text-align:center;
width: 25px ; 
background-color: #f35958; 
color: #fff ; 
border-radius:35%;

}
</style>

	</head>
	<body>
	<div id="wrapper">
	
	<?php include"topo.php"; ?> 
	
	
	
		<?php include"menu_lateral.php"; ?> 
	
	
	
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				
				<div class="">
				
				
	
		<div class="">

		<p>VOC&Ecirc; EST&Aacute; EM:  <a href="http://intranet.anigerne/index.php">Home / </a>  <a href="../index.php" class="">Agenda</a> <a>/ 
		<?php  	
		$result_sala2 = "SELECT * FROM salas where valor = '$salaget2'";
		$resultado_sala2 = mysqli_query($conn, $result_sala2);
		while($row_sala2 = mysqli_fetch_array($resultado_sala2)){
			$sala_title2 = $row_sala2['titulo'];
			$id_sala2 = $row_salas2['id'];
			$descricao_sala2 = $row_salas22['descricao'];
			$localizacao_sala2 = $row_salas2['localizacao'];
			$lugares_sala2 = $row_salas2['lugares'];
			$telefone_sala2 = $row_salas2['telefone'];
			$skype_sala2 = $row_salas2['skype'];
			$teams_sala2 = $row_salas2['teams'];

			echo"$sala_title2";
		 }
		  ?>
		  
		  
		  
		  </a> </p>


			<div id='calendar'></div>

		</div>


<!-- MODAL DE CANCELAMENTO DE EDIÇÃO DE EVENTOS -->

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center" > <i class="far fa-calendar-alt"></i> Dados da Reserva  - <span id="title"></spam></h4>
					</div>

<?php if ($salaget2=='Escritorio Cocalqui' || $salaget2=='SALA 05') {

	if ($users=='selton' || $users=='francisco' || $users=='lilian' || $users=='davy' || $users=='hericks' || $users=='helder' || $users=='victor.gomes@cocalqui.com.br' || $users=='Jessica Rayane' || $users=='mikaelly' || $users=='jefferson.mike@cocalqui.com.br' || $users=='gabriel.pacheco') {
		# code...
?>

              <div class="modal-body">
                <div class="visualizar">
                <div class="container">
                <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                <dl class="dl-horizontal">
                    <dt>ID da Reserva</dt>
                    <dd id="id"></dd>
                    <dt>Titulo da Reseva</dt>
                    <dd id="title"></dd>
                    <dt>Inicio da Reserva</dt>
                    <dd id="start"></dd>
                    <dt>Fim da Reserva</dt>
                    <dd id="end"></dd>
                    <dt>Responsavel</dt>
                    <dd><span id="user"></dd>
			
                </dl>
                </div>
                <div class="col-md-1"></div>
                </div>
                </div>


                 
           

<?php echo " 
<div class='container'>
<div class='row justify-content-center'>

<div class='col-md-1' style='padding-left:125px;'></div>

			  <div class='col-md-1'>
							<button class='btn btn-canc-vis btn-warning'>Editar</button>
			  </div>
			  
			  <div class='col-md-3'>	
							  <form class='form-inline' action='cancelar-reuniao.php' method='post'>
							  <input type='hidden' name='id' id='id'>
							  <input type='hidden' name='id_index' id='id_index'>
							  <input type='hidden' name='nome_sala' value='$salaget'>
							  <input type='hidden' name='user' id='user'>
							  <input type='hidden' name='start' id='start'>
							  <button type='submit' class='btn btn-danger'>Cancelar Reunião</button>
                              <label>&nbsp;&nbsp;</label>
   
			  </div>
        
			  </div>
              </div>
			  
              
              <div class=''>
              <label>&nbsp;&nbsp;</label><br>
			  <input type='checkbox' class='form-check-input' name='index' value='sim'>
			  <label class='form-check-label' for='exampleCheck1'>Cancelamento de reserva recorrente.</label>
			  </div>
			  
			  </form>
              "; 
             ?>

						</div>

						<div class="form">
							<form class="form-horizontal" method="POST" action="proc_edit_evento.php">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Título</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title" id="title" placeholder="Título da Reunião" required>
									</div>
								</div>

					<input type="hidden" name="color" value="<?php echo "$color"; ?>">
					<input type="hidden" name="nome_sala" value="<?php echo "$salaget"; ?>">

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)" required >
                  </div>


								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)" required >
                  </div>

								</div>
								<input type="hidden" class="form-control" name="id" id="id">

                <input type="hidden" class="form-control" name="user" id="user">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-canc-edit btn-danger">Cancelar</button>
										<button type="submit" class="btn btn-primary">Salvar Alterações</button>
									</div>
								</div>
							</form>


<?php } else { echo "<div class='alert alert-secondary' role='alert'>
Você não tem permissão para adicionar ou alterar reservas nesta sala, por favor entre em contato com a recepção ANIGER no ramal 211 / 212, ou com o T&D no ramal 233.
</div>"; } } else {?>
	


    <div class="modal-body">
                <div class="visualizar">
                <div class="container">
                <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                <dl class="dl-horizontal">
                    <dt>ID da Reserva</dt>
                    <dd id="id"></dd>
                    <dt>Titulo da Reseva</dt>
                    <dd id="title"></dd>
                    <dt>Inicio da Reserva</dt>
                    <dd id="start"></dd>
                    <dt>Fim da Reserva</dt>
                    <dd id="end"></dd>
                    <dt>Responsavel</dt>
                    <dd><span id="user"></dd>
			
                </dl>
                </div>
                <div class="col-md-1"></div>
                </div>
                </div>


                 
           

<?php echo " 
<div class='container'>
<div class='row justify-content-center'>

<div class='col-md-1'></div>

			  <div class='col-md-1'>
							<button class='btn btn-canc-vis btn-warning'>Editar</button>
			  </div>
			  
			  <div class='col-md-3'>	
							  <form class='form-inline' action='cancelar-reuniao.php' method='post'>
							  <input type='hidden' name='id' id='id'>
							  <input type='hidden' name='id_index' id='id_index'>
							  <input type='hidden' name='nome_sala' value='$salaget'>
							  <input type='hidden' name='user' id='user'>
							  <input type='hidden' name='start' id='start'>
							  <button type='submit' class='btn btn-danger'>Cancelar Reunião</button>
                              <label>&nbsp;&nbsp;</label>
                              <label>&nbsp;&nbsp;</label>
			  </div>
              <div class='col-md-1'></div>
			  </div>
              </div>
			  
              
              <div class=''>
              <label>&nbsp;&nbsp;</label><br>
			  <input type='checkbox' class='form-check-input' name='index' value='sim'>
			  <label class='form-check-label' for='exampleCheck1'>Cancelamento de reserva recorrente.</label>
			  </div>
			  
			  </form>
              "; 
             ?>

						</div>

						<div class="form">
							<form class="form-horizontal" method="POST" action="proc_edit_evento.php">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Título</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title" id="title" placeholder="Título da Reunião" required>
									</div>
								</div>

					<input type="hidden" name="color" value="<?php echo "$color"; ?>">
					<input type="hidden" name="nome_sala" value="<?php echo "$salaget"; ?>">

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)" required >
                  </div>


								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)" required >
                  </div>

								</div>
								<input type="hidden" class="form-control" name="id" id="id">

                <input type="hidden" class="form-control" name="user" id="user">
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-canc-edit btn-danger">Cancelar</button>
										<button type="submit" class="btn btn-primary">Salvar Alterações</button>
									</div>
								</div>
							</form>


<?php  }  ?>

						</div>
					</div>
				</div>
			</div>
		</div>

<!-- MODAL DE CANCELAMENTO DE EDIÇÃO DE EVENTOS -->









<!-- MODAL DE CADASTRO DE EVENTOS -->
		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center"><i class="far fa-calendar-alt"></i> Cadastrar reserva em: <?php echo"$sala_title2"; ?> </h4>
					</div>

					<?php if ($salaget2=='Escritorio Cocalqui' || $salaget2=='SALA 05') {

if ($users=='selton' || $users=='francisco' || $users=='lilian' || $users=='davy' || $users=='hericks' || $users=='helder' || $users=='victor.gomes@cocalqui.com.br' || $users=='Jessica Rayane' || $users=='mikaelly' || $users=='jefferson.mike@cocalqui.com.br' || $users=='gabriel.pacheco') {
	# code...
?>


   <div class="modal-body">
     <form class="form-horizontal" method="POST" action="proc_cad_evento.php">
       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="title" placeholder="Titulo da Reunião" required>
         </div>
       </div>
	   <input type="hidden" name="color" value="<?php echo "$color"; ?>">
	   <input type="hidden" name="user" value="	<?php echo"$users";?>">
	 
       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
         <div class="col-sm-3">
           <input type="datetime" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)" required>
         </div>
         <div class="col-sm-3">
             <input type="time" name="hora_start" value="" class="form-control" required>

         </div>
       </div>
       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
         <div class="col-sm-3">
           <input type="text" class="form-control" name="end" id="start" onKeyPress="DataHora(event, this)" required>
         </div>
           <div class="col-sm-3">
               <input type="time" name="hora_end" value="" class="form-control" required>

           <input type="hidden" class="form-control" name="user" value="<?php echo"$users";?>">
		   <input type="hidden" name="nome_sala" value="<?php echo "$salaget"; ?>">
         </div>
       </div>

       <div class="form-group">
	   <label for="inputEmail3" class="col-sm-2 control-label">Recorrencia</label>
      
         <div class="col-sm-10">
           <input type="checkbox" class="form-check-input" name="repetir_semana" value="7"> 
             <label class="form-check-label" for="exampleCheck1">Repetir Reserva Semanalmente. <input type="text" class="form-control" name="quant" value="50" placeholder="Numero de Retições"> </label>

           </div>

     
		   <label for="inputEmail3" class="col-sm-2 control-label">Recorrencia</label>
         <div class="col-sm-10">
           <input type="checkbox" class="form-check-input" name="repetir_mes" value="30"> 
             <label class="form-check-label" for="exampleCheck1">Repetir Reserva Mensalmente. <input type="text" class="form-control" name="quant_mes" value="50" placeholder="Numero de Retições"> </label>

           </div>

  
		   <label for="inputEmail3" class="col-sm-2 control-label">Recorrencia</label>
         <div class="col-sm-10">
           <input type="checkbox" class="form-check-input" name="repetir_ano" value="365"> 
             <label class="form-check-label" for="exampleCheck1">Repetir Reserva Anualmente. <input type="text" class="form-control" name="quant_ano" value="5" placeholder="Numero de Retições"> </label>

           </div>

    
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="form-control submit" style="background-color:#004A74; color:white;">Adicionar</button>
         </div>
       </div>
     </form>
   </div>

   <?php } else { echo "<div class='alert alert-secondary' role='alert'>
Você não tem permissão para adicionar ou alterar reservas nesta sala, por favor entre em contato com a recepção ANIGER no ramal 211 / 212, ou com o T&D no ramal 233.
</div>"; } } else {?>
	
	<div class="modal-body">
     <form class="form-horizontal" method="POST" action="proc_cad_evento.php">
       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" name="title" placeholder="Titulo da Reunião" required>
         </div>
       </div>
	   <input type="hidden" name="color" value="<?php echo "$color"; ?>">
	   <input type="hidden" name="user" value="	<?php echo"$users";?>">
	 
       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
         <div class="col-sm-3">
           <input type="datetime" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)" required>
         </div>
         <div class="col-sm-3">
             <input type="time" name="hora_start" value="" class="form-control" required>

         </div>
       </div>
       <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
         <div class="col-sm-3">
           <input type="text" class="form-control" name="end" id="start" onKeyPress="DataHora(event, this)" required>
         </div>
           <div class="col-sm-3">
               <input type="time" name="hora_end" value="" class="form-control" required>

           <input type="hidden" class="form-control" name="user" value="<?php echo"$users";?>">
		   <input type="hidden" name="nome_sala" value="<?php echo "$salaget"; ?>">
         </div>
       </div>

       <div class="form-group">
	   <label for="inputEmail3" class="col-sm-2 control-label">Recorrencia</label>
      
         <div class="col-sm-10">
           <input type="checkbox" class="form-check-input" name="repetir_semana" value="7"> 
             <label class="form-check-label" for="exampleCheck1">Repetir Reserva Semanalmente. <input type="text" class="form-control" name="quant" value="50" placeholder="Numero de Retições"> </label>

           </div>

     
		   <label for="inputEmail3" class="col-sm-2 control-label">Recorrencia</label>
         <div class="col-sm-10">
           <input type="checkbox" class="form-check-input" name="repetir_mes" value="30"> 
             <label class="form-check-label" for="exampleCheck1">Repetir Reserva Mensalmente. <input type="text" class="form-control" name="quant_mes" value="50" placeholder="Numero de Retições"> </label>

           </div>

  
		   <label for="inputEmail3" class="col-sm-2 control-label">Recorrencia</label>
         <div class="col-sm-10">
           <input type="checkbox" class="form-check-input" name="repetir_ano" value="365"> 
             <label class="form-check-label" for="exampleCheck1">Repetir Reserva Anualmente. <input type="text" class="form-control" name="quant_ano" value="5" placeholder="Numero de Retições"> </label>

           </div>

    
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="form-control submit" style="background-color:#004A74; color:white;">Adicionar</button>
         </div>
       </div>
     </form>
   </div>

<?PHP } ?>
				</div>
			</div>
		</div>
<!-- MODAL DE CADASTRO DE EVENTOS -->




</div>

<?php include"../include_modal_info.php"; ?>

<!-- Envia as Informações para o modal de informaçãoes -->
<script type="text/javascript">

  	$('#exampleModal1').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var recipientdescricao = button.data('whateverdescricao')
  var recipientlocalizacao = button.data('whateverlocalizacao')
  var recipientlugares = button.data('whateverlugares')

  var recipienttelefone = button.data('whatevertelefone')
  var recipientskype = button.data('whateverskype')
  var recipientteams = button.data('whateverteams')
  
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  // modal.find('.modal-body input').val(recipient)
  var modal = $(this)
  modal.find('#recipient-id').val(recipient)
  modal.find('.modal-title').text('Informações: ' + recipient)
  
  modal.find('#recipient-descricao').val(recipientdescricao)
  modal.find('#recipient-descricao').text(' ' + recipientdescricao)

  modal.find('#recipient-localizacao').val(recipientlocalizacao)
  modal.find('#recipient-localizacao').text(' ' + recipientlocalizacao)

  modal.find('#recipient-lugares').val(recipientlugares)
  modal.find('#recipient-lugares').text(' ' + recipientlugares)

  modal.find('#recipient-telefone').val(recipienttelefone)
  modal.find('#recipient-telefone').text(' ' + recipienttelefone)

  modal.find('#recipient-skype').val(recipientskype)
  modal.find('#recipient-skype').text(' ' + recipientskype)
  
  modal.find('#recipient-teams').val(recipientteams)
  modal.find('#recipient-teams').text(' ' + recipientteams)



  
})

</script>

		<script>
			$('.btn-canc-vis').on("click", function() {
				$('.form').slideToggle();
				$('.visualizar').slideToggle();
			});
			$('.btn-canc-edit').on("click", function() {
				$('.visualizar').slideToggle();
				$('.form').slideToggle();
			});
		</script>

	</body>
</html>
