<!DOCTYPE html>
<?php
	
	include_once('../Seguranca/seguro.php');
	include_once('../Conexao/conexao.php');	
	ob_start();
	
	$id = $_GET['id'];
	$_SESSION['idC'] = $_GET['id'];
	
	$consulta= "SELECT * FROM Tbl_cliente WHERE Id_cliente = '$id' LIMIT 1";	
	$busca = mysqli_query($conecta, $consulta);
	//executando a consulta no BD
	$resultado = mysqli_fetch_assoc($busca);
	// jogando os dados da consulta dentro de um vetor

?>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Visualizar usuário</title>

	<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenu.css"/>
	<link rel = "stylesheet" type = "text/css" href = "../css/estiloVisualizarCliente.css"/>

	<link rel = "stylesheet" type = "text/css" href = "../css/estiloVisualizarClienteMob.css"/>

	<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenuMob.css"/>

	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		function confirmSair() {
		   if (confirm("Tem certeza que deseja sair?")) {
		      location.href="../Login/sair.php";
		   }
		}

		function confirmExc() {
		   if (confirm("Tem certeza que deseja apagar este cliente?")) {
		      location.href="../ADM/apagarCliente.php?&id=<?php echo $resultado['Id_cliente'];?> ";
		   }
		}
	</script>

	<script>
		$(document).ready(function(){
			$('.botao').click(function(){
				$('.menuList li, .quadroTransp').toggle();
			});
		});
	</script>
</head>
<body id = "listaCliente">

	<div id = "menu">
		<div id="content">
			<div class = "linkCentro">	
				
				<!--Aqui vira todos os links de ADM-->	
				<a href='../ADM/index.php' id = "areaAdministração">Area de administração</a> 
				<a href='../ADM/cadastroCliente.php' id = "cadastroCliente">Cadastrar Cliente</a> 
				<a href='../ADM/listaCliente.php' id = "listaCliente">Clientes Cadastrados</a> 

			</div>
			<input type = "submit" value = "Sair" onclick="confirmSair()"/>
		</div>

		<div id = "menuMob">
			<div class = "botao">
				<img src = "../img/logo/menuIcon.png">
			</div>

			<div class = "quadroTransp"></div>

			<div class = "menuList">
				<ul>
					<a href='index.php' class = "link"><li>Area de administração</li></a>
					<a href='cadastroCliente.php' class = "link"><li>Cadastrar Cliente</li></a>
					<a href='listaCliente.php' class = "link"><li>Clientes Cadastrados</li></a>
					
					<li><input type = "submit" value = "Sair" onclick="confirmSair()"/></li>
				</ul>
			</div>

		</div>
	</div>

	<a href = "javascript:history.back(-1);"><div id = "back"></div></a>

	<div id = "quadro"></div>
	<div id = "containerInfo">

		<div class = "info">

			<h2>Informações do cliente</h2>

			<p><b>Nome:</b>
			<?php echo $resultado['Nome_cliente'];?></p>

			<p><b>E-mail:</b>
			<?php echo $resultado['Email_cliente'];?></p>

			<p><b>Telefone:</b>
			<?php echo $resultado['Telefone_cliente'];?></p>
			
			<p><b>Celular:</b>
			<?php echo $resultado['Celular_cliente'];?></p>

			<p><b>Segmento:</b>
			<?php echo $resultado['Segmento_cliente'];?></p>
			
			<p><b>Estado: </b>
			<?php echo $resultado['Uf_cliente'];?></p>

			<p><b>Cidade: </b>
			<?php echo $resultado['Cidade_cliente'];?></p>

		</div>

		<div class = "btAlign">
			
			<a href='../ADM/CadastroEvento.php?&id=<?php echo $resultado['Id_cliente'];?> '>
				<input type='button' name='btnCadastra' value='Cadastrar Evento' class = "btnAlt" id = "btnCadEve">
			</a>

			<a href='../ADM/vizualizaEvento.php?&id=<?php echo $resultado['Id_cliente'];?> '>
				<input type='button' name='btnCadastra' value='Vizualizar Evento' class = "btnAlt" id = "btnVisEve">
			</a>

			<br>

			<a href='../ADM/editarCliente.php?&id=<?php echo $resultado['Id_cliente'];?> '>
				<input type='button' name='btnEditar' value='Editar' class = "btnAlt" id = "btnEdit"/>
			</a>

			
			<input type='button' name='btnExcluir' value='Excluir' class = "btnAlt" id = "btnExc" onclick="confirmExc()">
	
		</div>

	</div>
	
</body>
</html>