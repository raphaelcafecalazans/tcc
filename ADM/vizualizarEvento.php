<!DOCTYPE html>
<?php
	include_once('../Conexao/conexao.php');
	ob_start();
	
	session_start();
	$_SESSION['idE']  = $_GET['id'];
	
	$id = $_GET['id'];
	
	$consulta= "SELECT * FROM tbl_eventos WHERE Id_evento = '$id' LIMIT 1";	
	$busca = mysqli_query($conecta, $consulta);
	
	$consulta1= "SELECT date_format(Data_inicio, '%d/%m/%Y') FROM tbl_eventos WHERE Id_evento = '$id' LIMIT 1";	
	$busca1 = mysqli_query($conecta, $consulta1);
	
	$consulta2= "SELECT date_format(Data_termino, '%d/%m/%Y') FROM tbl_eventos WHERE Id_evento = '$id' LIMIT 1";	
	$busca2 = mysqli_query($conecta, $consulta2);
	
	//executando a consulta no BD
	$resultado = mysqli_fetch_assoc($busca);
	$resultado1 = mysqli_fetch_assoc($busca1);
	$resultado2 = mysqli_fetch_assoc($busca2);
	// jogando os dados da consulta dentro de um vetor

?>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Visualizar Eventos</title>
</head>
<body>
	<h2>Informações do usuário</h2>
	<hr>
	<b>ID: </b>
	<?php echo $resultado['Id_evento'];?><br>
	<b>Nome: </b>
	<?php echo $resultado['Nome_evento'];?><br>
	<b>Descrição: </b>
	<?php echo $resultado['Descricao_evento'];?><br>
	<b>Inicio evento: </b>
	<?php echo $resultado1["date_format(Data_inicio, '%d/%m/%Y')"];?><br>
	
	<b>Final evento: </b>
	<?php echo $resultado2["date_format(Data_termino, '%d/%m/%Y')"];?><br>
	<b>Imagem: </b>
	<?php echo "<img src='../img/imgEve/".$resultado['Evento_imagem']."' width='100' height='100'>";?><br><br>
	
					
					<a href='editarEvento.php?&id=<?php echo$resultado['Id_evento'];?> '><input type='button' name='btnEditar' value='Editar'/></a>
					<a href='excluirEvento.php?&id=<?php echo$resultado['Id_evento'];?> '><input type='button' name='btnExcluir' value='excluir'/></a><br><br>
					link de acesso:<br>
					<form action="/" method="post">
						<input type="text" value="http://localhost/SiteNovaVersao/ADM/landing.php?&id=<?php echo$resultado['Id_evento'];?>" id="link"><br>						
						<button id="linkEvento">Copiar link</button>
					</form>
					
					<script src="../js/jquery.min.js"></script>
					<script src="../js/link.js"></script>
					<script src="../js/email.js"></script>
					<br><br><br><br><br>
					
					
	
	</body>
</html>

