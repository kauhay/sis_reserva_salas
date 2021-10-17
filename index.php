
<?php
    session_start();
    include "conexao2.php";
    if(isset($_SESSION['log'])==false){
        echo("<script>window.location = 'login.php';</script>");
    }
     $user=$_SESSION['user'];
?>

<!doctype html>
<html lang="pt-br" xml:lang="pt-br">
<head> 
	<title>SRS - Sistema de Reservas de Salas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="icon" href="assets/img/icone.png">
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
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/icone.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/icone.png">

  <script src="https://kit.fontawesome.com/d98d40e574.js" crossorigin="anonymous"></script>
  
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- TOPO -->
		

<?php
include "conexao.php";
  
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

              <p>VOC&Ecirc; EST&Aacute; EM:  <a href="../index.php">Home / </a>  <a href="#" class="">Agenda </a> </p>

        <div class="row">

<?php 
$result_salas = "SELECT * FROM salas";
$resultado_salas = mysqli_query($conn, $result_salas); 
while($row_salas = mysqli_fetch_array($resultado_salas)){
  $id_sala = $row_salas['id'];
  $descricao_sala = $row_salas['descricao'];
  $titulo_sala = $row_salas['titulo'];
  $localizacao_sala = $row_salas['localizacao'];
  $lugares_sala = $row_salas['lugares'];
  $telefone_sala = $row_salas['telefone'];
  $skype_sala = $row_salas['skype'];
  $teams_sala = $row_salas['teams'];
?>  


 
          <div class="col-md-3">
            <!-- PANEL NO PADDING -->
            <div class="panel">
<?php if($user=='selton' ){ ?>
            <div class="panel-heading">
									<h3 class="panel-title"></h3>
									<div class="right">

										<button type="button" class=""><i class="lnr lnr-pencil"
data-toggle="modal" data-target="#exampleModal3" 
data-whateverid3="<?php echo $row_salas['id']; ?>"
data-whatever3="<?php echo $row_salas['titulo']; ?>"
data-whateverdescricao3="<?php echo $descricao_sala; ?>"
data-whateverlocalizacao3="<?php echo $localizacao_sala; ?>"
data-whateverlugares3="<?php echo $lugares_sala; ?>"
 data-whatevertelefone3="<?php echo $telefone_sala; ?>"
 data-whateverskype3="<?php echo $skype_sala; ?>"
 data-whateverteams3="<?php echo $teams_sala; ?>"></i></button>

                    <button type="button" style="cursor: pointer;" class="" data-toggle="modal" data-target="#exampleModal2"
                    data-whatever2="<?php echo $row_salas['titulo']; ?>"
              ><i class="lnr lnr-trash"></i></button>
									</div>
								</div>
<?php }?>
              <form class="" action="fullcalendar/index.php" method="post" id="<?php echo $row_salas['valor']; ?>">
              <div style="cursor:pointer;" class="panel-body no-padding bg-primary text-center" onClick="document.getElementById('<?php echo $row_salas['valor']; ?>').submit();">
                <div class="padding-top-30 padding-bottom-30">
				<i class="<?php echo $row_salas['icon']; ?> fa-2x"></i>
                  <h3><?php echo $row_salas['titulo']; ?></h3>
                  <label>Capacidade: </label><span> <?php echo $row_salas['lugares']; ?></spam><br>
                  <label>Localização: </label><span> <?php echo $row_salas['localizacao']; ?></spam>

                </div>
              </div>
              <div  style="background-color: #1167ad; color: #ffff;" class="panel-body text-right">
              <span style="cursor: pointer;" class="fas fa-info fa-1x" 
              
data-toggle="modal" data-target="#exampleModal1"
data-whatever="<?php echo $row_salas['titulo']; ?>"
data-whateverdescricao="<?php echo $descricao_sala; ?>"
data-whateverlocalizacao="<?php echo $localizacao_sala; ?>"
data-whateverlugares="<?php echo $lugares_sala; ?>"
 data-whatevertelefone="<?php echo $telefone_sala; ?>"
 data-whateverskype="<?php echo $skype_sala; ?>"
 data-whateverteams="<?php echo $teams_sala; ?>"
></span>
							</div>
              <input type="hidden" name="color" value="#3A87AD">
              <input type="hidden" name="nome_sala" value="<?php echo $row_salas['valor']; ?>">
              <input type="hidden" name="user" value="<?php echo "$user"; ?>">
              <input type="hidden" name="sala_tilte" value="<?php echo "$titulo_sala"; ?>">
              </form>
            </div>
            <!-- END PANEL NO PADDING -->
          </div>
          

<?php } 

if($user=='selton'){?>

          <div class="col-md-3">
            <!-- PANEL NO PADDING -->
            <div class="panel">
       
            <div class="panel-heading">
									<h3 class="panel-title"></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up-circle"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross-circle"></i></button>
									</div>
								</div>
               
              <div style="cursor:pointer;" class="panel-body no-padding bg-primary text-center" onClick="location.href='add_salas.php'">
                <div class="padding-top-30 padding-bottom-30">
                  <i class="far fa-plus-square fa-2x"></i>
				      <h3>Adicionar Sala</h3>
              <label> &nbsp </label><span> </spam><br>
              <label> &nbsp </label><span> </spam>
                    </div>
              </div>
              <div  style="background-color: #1167ad; color: #ffff;" class="panel-body text-right">
              <span style="cursor: pointer;" class="fas fa-info fa-1x"></span>
							</div>
              <input type="hidden" name="color" value="#3A87AD">
              <input type="hidden" name="nome_sala" value="13">
              <input type="hidden" name="user" value="<?php echo "$user"; ?>">
              </form>
            </div>
            <!-- END PANEL NO PADDING -->
          </div>


<?php } ?>

        </div>

      </div>
    </div>
    <!-- END MAIN CONTENT -->
  </div>


<?php include"include_modal_info.php"; ?>



<!-- MAIN -->

	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

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
<!-- Envia as Informações para o modal de Informações -->

<!-- Envia as Informações para o modal de exclusão -->
<script type="text/javascript">

  	$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient2 = button.data('whatever2')
  
  
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  // modal.find('.modal-body input').val(recipient)
  var modal = $(this)
  modal.find('#recipient-id').val(recipient2)
  modal.find('.modal-title').text('Deseja realmente excluir a sala? : ' + recipient2)
  

})

</script>
<!-- Envia as Informações para o modal de exclusão -->


<!-- Envia as Informações para o modal de edição -->
<script type="text/javascript">

  	$('#exampleModal3').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient3 = button.data('whatever3')
  var recipientdescricao3 = button.data('whateverdescricao3')
  var recipientlocalizacao3 = button.data('whateverlocalizacao3')
  var recipientlugares3 = button.data('whateverlugares3')
  var recipienttelefone3 = button.data('whatevertelefone3')
  var recipientskype3 = button.data('whateverskype3')
  var recipientteams3 = button.data('whateverteams3')
  var recipientid3 = button.data('whateverid3')
  
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  // modal.find('.modal-body input').val(recipient)
  var modal = $(this)
  modal.find('#recipient-ti3').val(recipient3)
  modal.find('.modal-title3').text('Editar informaçãoes da sala: ' + recipient3)
  modal.find('#recipient-ti3').text('Titulo: ' + recipient3)
  
  modal.find('#recipient-descricao3').val(recipientdescricao3)
  modal.find('#recipient-descricao3').text('Descrição: ' + recipientdescricao3)

  modal.find('#recipient-localizacao3').val(recipientlocalizacao3)
  modal.find('#recipient-localizacao3').text('Localizacao: ' + recipientlocalizacao3)

  modal.find('#recipient-lugares3').val(recipientlugares3)
  modal.find('#recipient-lugares3').text('Quantidade de Lugares: ' + recipientlugares3)

  modal.find('#recipient-telefone3').val(recipienttelefone3)
  modal.find('#recipient-telefone3').text('Telefone: ' + recipienttelefone3)

  modal.find('#recipient-skype3').val(recipientskype3)
  modal.find('#recipient-skype3').text('Skype: ' + recipientskype3)

  modal.find('#recipient-teams3').val(recipientteams3)
  modal.find('#recipient-teams3').text('Teams / Zoom: ' + recipientteams3)

  modal.find('#recipient-id3').val(recipientid3)
  modal.find('#recipient-id3').text('Id da sala: ' + recipientid3)

  
})

</script>


<!--<script>
					$(document).ready(function(){
						$('#exampleModal1').modal('show');
					});
</script> -->
<!-- Envia as Informações para o modal de edição -->

</body>

</html>
