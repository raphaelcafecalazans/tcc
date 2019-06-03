<?php
	session_start();
	include_once('../Conexao/conexao.php');	
	ob_start();
	$id = $_GET['id'];
	$_SESSION['idA'] = $_GET['id'];
	
	$consulta= "SELECT * FROM Tbl_agenda WHERE Id_agenda = '$id' LIMIT 1";	
	
	$busca = mysqli_query($conecta, $consulta);
	//executando a consulta no BD
	$resultado = mysqli_fetch_assoc($busca);
	// jogando os dados da consulta dentro de um vetor

?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta lang="pt-BR">
		<title>Lista testadora de compromissos</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/estiloListaCliente.css"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->
	</head>
	<body>
		<div class='container'>
			<h2>Informações do compromisso</h2>
				<hr>
				<b>Nome: </b>
				<?php echo $resultado['Nome_agenda'];?><br>
				<b>Data de inicio: </b>
				<?php echo substr($resultado['Inicio_agenda'],8,2),
					substr($resultado['Inicio_agenda'],4,4),
					substr($resultado['Inicio_agenda'],0,4);?><br>
				<b>Data de termino: </b>
				<?php echo substr($resultado['Final_agenda'],8,2),
					substr($resultado['Final_agenda'],4,4),
					substr($resultado['Final_agenda'],0,4);?><br>
				<b>Horário de inicio: </b>
				<?php echo substr($resultado['Inicio_agenda'],11,5);?><br>
				<b>Horário de termino: </b>
				<?php echo substr($resultado['Final_agenda'],11,5);?><br>
				<b>Descrição: </b>
				<?php echo $resultado['Descricao_agenda'];?><br>
				
	<!--Botao de cadastro -->
			<div align="left">
				<button type='button' class="btn btn-danger" data-toggle="modal" data-target="#ModalDeletar">Excluir</button>
				 <a href='agenda.php'><button type="button" class="btn btn-info">Voltar</button></a>			 
			</div>
	</div>		
	<!--Script do Modal-->	
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
	<script src="../js/bootstrap.min.js"></script>
	
	<!-- Modal de Exclusao -->
	<div class="container theme-showcase" role="main">
			<div class="modal fade" id="ModalDeletar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<h4 class="modal-title" id="myModalLabel">Excluir Compromisso</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						</div>
							<div class="modal-body">
								<form method="POST" action="apagarAgenda.php">
									<div class="form-group">
										Você realmente deseja excluir esse compromisso?
									</div>
									<input name = "id" type = "hidden" id = "id-agenda">
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-danger">Deletar</button>
									</div>									
								</form>
							</div>	  
					</div>
				</div>
			</div>
		</div>
		<!--Fim do Modal-->	
		<script type='text/javascript'>
			$('#ModalDeletar').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var id = button.data('id') //recebendo os valores das variaveis
				var modal = $(this)
				//mandando os valores para o campo 
				modal.find('#id-agenda').val(id)
			})
		</script>
	
	</body>			
</html>