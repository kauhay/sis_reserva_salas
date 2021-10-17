<?php  	
		$result_sala3 = "SELECT * FROM salas where valor = '$salaget2'";
		$resultado_sala3 = mysqli_query($conn, $result_sala3);
		
		  ?>

<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="../index.php"><img src="assets/img/logo-dark.png" alt="Aniger Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
	
				</div>

		 	 
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="fas fa-info"
								<?php	
								while($row_salas3 = mysqli_fetch_array($resultado_sala3)){
									$sala_title3 = $row_salas3['titulo'];
									$id_sala3 = $row_salas3['id'];
									$descricao_sala3 = $row_salas3['descricao'];
									$localizacao_sala3 = $row_salas3['localizacao'];
									$lugares_sala3 = $row_salas3['lugares'];
									$telefone_sala3 = $row_salas3['telefone'];
									$skype_sala3 = $row_salas3['skype'];
									$teams_sala3 = $row_salas3['teams'];
									?>
									
data-toggle="modal" data-target="#exampleModal1"
data-whatever="<?php echo $sala_title3; ?>"
data-whateverdescricao="<?php echo $descricao_sala3; ?>"
data-whateverlocalizacao="<?php echo $localizacao_sala3; ?>"
data-whateverlugares="<?php echo $lugares_sala3; ?>"
data-whatevertelefone="<?php echo $telefone_sala3; ?>"
data-whateverskype="<?php echo $skype_sala3; ?>"
data-whateverteams="<?php echo $teams_sala3; ?>"
						
								<?php 
								}
								?>
								></i>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Ajuda</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
							<li><a target="_blank" href="#">Link</a></li>							
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/logo_user.jpg" class="img-circle" alt="Avatar"> <span> <?php echo "$users"; ?> </span></a>
							
						</li>
					
					</ul>
				</div>
			</div>
		</nav>