<!DOCTYPE html>
<?php
session_start();

$_SESSION['idC']  = $_GET['id'];

?>
<html>
	<head>
		<title>Cadastro evento</title>

		<link rel="stylesheet" type="text/css" href="../css/estiloCadastroEvento.css">

		<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenu.css"/>

		<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenuMob.css"/>

		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<script src = "../js/jquery-3.4.0.min.js"></script>

		<script>
			function confirmSair() {
			   if (confirm("Tem certeza que deseja sair?")) {
			      location.href="../Login/sair.php";
			   }
			}

			$(function(){

				$("input:file").siblings("span").text('');
				$("input:file").siblings("span").text($("input:file").val());

				$("input:file").change(function(){

					$(this).siblings("span").text('');
					$(this).siblings("span").text($(this).val().replace(/^.*\\/, "").substring(0,20)+"...");

				});
			});

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

			<a href = "javascript:history.back(-1);"><div id = "back"></div></a>

			<div id = "quadro"></div>
			<div id = "Container">

				<p id = "tit" align = "center">Cadastro de evento</p>

				<div id = "info">

					<form method = "post" action = "validaCadastroEven.php" enctype="multipart/form-data" id = "formulario">
					<table>
					<tr>
						<td>Nome:</td>
						<td>
							<input type = "text" name = "nomeEvento" placeholder = "nome" required>
						</td>
					</tr>
					<tr>
						<td>Incio:</td>
						<td>
							<input type = "date" name = "inicioEvento" placeholder = "Começo evento" required>
						</td>
					</tr>
					<tr>
						<td>Final:</td>
						<td>
							<input type = "date" name = "finalEvento"  placeholder = "Final Evento" required></td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>
								<textarea rows="5" name = "descricaoEvento" placeholder = "Descrição sobre o evento" required></textarea>
							</td>
						</tr>
						<tr>
							<td>imagem:</td>
							<td>
								<div id = "nomeArquivo">
									<span>arquivo.txt</span>
									<img src = "../img/adm/inputFileCam/cam1.png">
									<input type="file" name="imagemDescricao" id = "imgFile" required>
									<div style="clear:both"></div>
							</td>
						</tr>
						<tr>
							<td></td><td><input type = "submit" id = "btnEnviar"/></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	
	</body>
</html>

