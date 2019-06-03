<?php
	include_once('../Conexao/conexao.php');
	ob_start();
	session_start();
	
	$_SESSION['idE']  = $_GET['id'];
	
	$consulta= "SELECT * FROM tbl_eventos WHERE Id_evento = '".$_SESSION['idE']."' LIMIT 1";	
	$busca = mysqli_query($conecta, $consulta);
	
	$consulta1= "SELECT date_format(Data_inicio, '%d/%m/%Y') FROM tbl_eventos WHERE Id_evento = '".$_SESSION['idE']."' LIMIT 1";	
	$busca1 = mysqli_query($conecta, $consulta1);
	
	$consulta2= "SELECT date_format(Data_termino, '%d/%m/%Y') FROM tbl_eventos WHERE Id_evento = '".$_SESSION['idE']."' LIMIT 1";	
	$busca2 = mysqli_query($conecta, $consulta2);
	
	//executando a consulta no BD
	$resultado = mysqli_fetch_assoc($busca);
	$resultado1 = mysqli_fetch_assoc($busca1);
	$resultado2 = mysqli_fetch_assoc($busca2);
	
	$_SESSION['inicio'] = $resultado['Data_inicio'];
	$_SESSION['final'] = $resultado['Data_termino'];
	
	
	
?>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.mask.js"></script>
	<script>
				$(document).ready(function(){
					$('#date').mask('0000/00/00');
				})	
				$(document).ready(function(){
					$('#date1').mask('0000/00/00');
				})	
	</script>
			
	<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Evendo</h1>
  </div>
  <!---criando um form que redireciona para a edição da imagem-->
  <!-- multipart/form-data utilizado para o tipo file-->
  <form method="POST" action="procEditaEvento.php" enctype="multipart/form-data">

			<label>Nome</label>
			  <!---Adicionando um campo com o valor do antigo nome no BD-->
			  <input type="text" name="nomeEvento" value="<?php echo $resultado['Nome_evento']; ?>"required><br>
			<label>descricao Evento</label>
			 <!---Adicionando um campo com o valor da antiga Descrção no BD-->
				<textarea  rows="5" name="descricaoEvento" required><?php echo $resultado['Descricao_evento']; ?></textarea><br>
			<label>inicio Evento: <?php echo $resultado1["date_format(Data_inicio, '%d/%m/%Y')"]; ?></label><br>
			 <!---Adicionando um campo com o valor do antigo inicio do evento no BD-->
				<br>
				<input type = "date" name = "inicioEvento" placeholder = "Começo evento"><br>
		  <label>final Evento: <?php echo $resultado2["date_format(Data_termino, '%d/%m/%Y')"];?> </label><br>
			 <!---Adicionando um campo com o valor do antigo final do evento no BD-->
				<input type = "date" name = "finalEvento"  placeholder = "Final Evento"><br>
		 <!---Adicionando um campo para adição da nova foto-->
				<label>Foto do Evento</label>
					<input name="imagem" type="file"/>	
		  <br>
		  <!---Vizuaização da antiga foto-->
		  <?php 
		  // jogando o valor da foto em uma variavel
		  
		  $foto = $resultado['Evento_imagem'];
		  //caso a varaivel seja vazia entarra nesta função "sem imagem"
		  if($foto == ""){?>
				<div>
					<label>	
						Foto do Evento Antiga:<br>
					</label>
					<div >
						Não tem foto antiga
					</div>
				</div>
		  <?php }
		  //caso diferente ele ira imprir a imagem antiga ba tela
		  if($foto != ""){?>
				<div>
					<label>	
						Foto do Evento Antiga
					</label>
					<div class="col-sm-10"><?php
						echo "<img src='../img/imgEve/".$resultado['Evento_imagem']."' width='100' height='100'>";
						?>
						<input type="hidden" name="imgAntiga" value='<?php echo $foto ?>'>
					</div>
				</div>
		  <?php } ?>
		  <br>
	
		  
		  <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
			  <button type="submit" class="btn btn-success">Editar</button>
		</form>


