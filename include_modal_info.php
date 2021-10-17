<!-- modal de exibição de informações -->
<div class="row">

<div class="modal fade" id="exampleModal1" tabindex="+100" role="dialog" aria-labelledby="exampleModalLabel" >
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header " style="color:#246A8E;">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <center>
     <i class="fa fa-info fa-5x"></i>
     </br></br>
     <h3 class="modal-title" id="exampleModalLabel">Informações da sala</h3></center>
	</div>
<div class="modal-body" style="background-color:#EBF6FB; color:#246A8E;">

<i class="fas fa-list-alt"></i>  <label class="control-label"> Descrição:</label><spam for="recipient-descricao" id="recipient-descricao" class="control-label">Descrição:</spam>
<br>
<i class="fas fa-map-marker-alt"></i>  <label class="control-label"> Localização:</label><spam for="recipient-localizacao" id="recipient-localizacao" class="control-label">localizacao</spam>
<br>
<i class="fas fa-list-ol"></i>  <label class="control-label"> Lugares:</label><spam for="recipient-lugares" id="recipient-lugares" class="control-label">lugares</spam>
<br>
<i class="fas fa-phone"></i> <label class="control-label"> Telefone:</label> <spam for="recipient-telefone" id="recipient-telefone" class="control-label">Telefone:</spam>
<br>
<i class="fab fa-skype"></i>  <label class="control-label"> Skype:</label><spam for="recipient-skype" id="recipient-skype" class="control-label">Skype</spam>
<br>
<i class="fas fa-users"></i> <label class="control-label"> Teams / Zoom:</label><spam for="recipient-teams" id="recipient-teams" >Teams / Zoom</spam>
		 
</div> 
	<div class="modal-footer ">
	<div class="form-group col-md-12 col-sm-12">
	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</div>
	</div>

  </div>
</div>
</div>

 </div>
<!-- modal de exibição de informações -->

<!-- modal de exclusão de sala -->
<div class="row">

<div class="modal fade" id="exampleModal2" tabindex="+100" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header " style="color:#246A8E;">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <center>
     <i class="fas fa-trash-alt fa-5x"></i>
     </br></br>
     <h3 class="modal-title" id="exampleModalLabel">Deseja realmente excluir a sala? :</h3></center>
	</div>
<div class="modal-body" style="background-color:#EBF6FB; color:#246A8E;">
<center>
<form class="" action="excluir_sala.php" method="post">
<input type="hidden" name="sala" class="modal-title" id="recipient-id">
<input type="submit" value="Sim" class="btn btn-danger">
<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
</form>
</center>
</div>
	<div class="modal-footer ">
	<div class="form-group col-md-12 col-sm-12">

	</div>
	</div>

  </div>
</div>
</div>

</div>
<!-- modal de exclusão de sala -->

<!-- modal de edição de informações -->
<div class="row">
<div class="modal fade" id="exampleModal3" tabindex="+100" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header " style="color:#246A8E;">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <center>
     <i class="far fa-edit fa-5x"></i>
     </br></br>
     <h3 class="modal-title3" id="exampleModalLabel3">Editar informações da sala</h3></center>
	</div>
<div class="modal-body" style="background-color:#EBF6FB; color:#246A8E;">
<form class="" action="editar_sala.php" method="post">
<i class="fas fa-list-alt"></i>  <label for="recipient-ti3" id="recipient-ti3" class="control-label">Titulo:</label>
<br>
<input type="text" class="form-control" name="titulo" placeholder="Alterar Titulo">
<br>
<i class="fas fa-list-alt"></i>  <label for="recipient-descricao3" id="recipient-descricao3" class="control-label">Descrição:</label>
<br>
<input type="text" class="form-control" name="descricao" placeholder="Alterar Descrição" >
<input type="hidden" class="form-control" name="id" id="recipient-id3">
<br>
<i class="fas fa-map-marker-alt"></i>  <label for="recipient-localizacao3" id="recipient-localizacao3" class="control-label">localizacao</label>
<br>
<input type="text" class="form-control" name="localizacao" placeholder="Alterar Localização" >
<br>
<i class="fas fa-list-ol"></i>  <label for="recipient-lugares3" id="recipient-lugares3" class="control-label">lugares</label>
<br>
<input type="text" class="form-control" name="lugares" placeholder="Alterar Quantidade de lugares" >
<br>
<i class="fas fa-phone-square-alt"></i>  <label for="recipient-telefone3" id="recipient-telefone3" class="control-label">Telefone:</label>
<br>
<input type="text" class="form-control" name="telefone" placeholder="Alterar Telefone">
<br>
<i class="fas fa-video"></i>  <label for="recipient-skype3" id="recipient-skype3" class="control-label">Skype:</label>
<br>
<input type="text" class="form-control" name="skype" placeholder="Alterar Skype">
<br>
<i class="fas fa-video"></i>  <label for="recipient-teams3" id="recipient-teams3" class="control-label">Teams / Zoom:</label>
<br>
<input type="text" class="form-control" name="teams" placeholder="Alterar Teams">		 
</div>
	<div class="modal-footer ">
	<div class="form-group col-md-12 col-sm-12">
	<input type="submit" value="Alterar" class="btn btn-primary">
	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	</form>
	</div>
	</div>

  </div>
</div>
</div>

 </div>
<!-- modal de exibição de informações -->