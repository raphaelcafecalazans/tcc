<!DOCTYPE html>
<?php
	
	include_once('../Seguranca/seguro.php');
	include_once('../Conexao/conexao.php');	
	ob_start();
	
	$id=$_GET['id'];
	
	$consulta= "SELECT * FROM Tbl_cliente WHERE Id_cliente = '$id' LIMIT 1";	
	$busca = mysqli_query($conecta, $consulta);
	//executando a consulta no BD
	$resultado = mysqli_fetch_assoc($busca);
	// jogando os dados da consulta dentro de um vetor

	?>

<html>
<head>
	<meta charset='UTF-8'>
	<title>Editar</title>

	<link rel="stylesheet" type = "text/css" href = "../css/estiloMenu.css"/>
	<link rel="stylesheet" type = "text/css" href = "../css/estiloEditarCliente.css"/>
	<link rel="stylesheet" type = "text/css" href = "../css/estiloEditarClienteMob.css"/>
	<link rel = "stylesheet" type = "text/css" href = "../css/estiloMenuMob.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"><!--Fonte do Google-->

	<script>
		function verificar(){

	            var texto=document.getElementById("nome").value;

	            for (letra of texto){

	                if (!isNaN(texto)){

	                    alert("Não digite números");
	                    document.getElementById("nome").value="";
	                    return;
	                }

	                letraspermitidas="ABCEDFGHIJKLMNOPQRSTUVXWYZ abcdefghijklmnopqrstuvxwyzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ"

	                var ok = false;
	                for (letra2 of letraspermitidas ){

	                    if (letra==letra2){

	                        ok=true;
	                    }

	                 }

	                 if (!ok){
	                    alert("Não digite caracteres que não sejam letras ou espaços no campo!");
	                    document.getElementById("nome").value="";
	                    return; 
	                 }
	            }
	        }

         function confirmSair() {
			   if (confirm("Tem certeza que deseja sair?")) {
			      location.href="../Login/sair.php";
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
	<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.mask.js"></script>
			<script>
				$(document).ready(function(){
					$('#telefone').mask('(00) 0000-0000');
					$('#celular').mask('(00) 00000-0000');
				})	
			</script>

	<a href = "javascript:history.back(-1);"><div id = "back"></div></a>

	<div id = "quadro">
	<div id = "containerEdit">

		<h2>Editar Cliente</h2>
	

		<form method='POST' action='validaEditCliente.php'>

			<table>
				<tr>
					<td><p>Nome</p></td>
					<td>	
						<input type='text' name='nome' id='nome' onchange="verificar()" value='<?php echo $resultado['Nome_cliente'] ?>' required/>
					</td>
				</tr>
				<tr>					
					<td><p>Telefone</p></td>
					<td>
						<input type='text' name='telefone' id='telefone' value='<?php echo $resultado['Telefone_cliente'] ?>' required />
					</td>
				</tr>
				<tr>					
					<td><p>Celular</p></td>
					<td>
						<input type='text' name='celular' id='celular' value='<?php echo $resultado['Celular_cliente'] ?>' required/>
					</td>
				</tr>
				<tr>
					<td><p>Email</p></td>
					<td>
						<input type='email' name='email' id='email' value='<?php echo $resultado['Email_cliente'] ?>' required/>
					</td>
				</tr>
				<tr>
					<td><p>Segmento</p></td>
					<td>
						<input type='text' name='segmento' id='segmento' value='<?php echo $resultado['Segmento_cliente'] ?>' required />
					</td>
				</tr>
				<tr>
					<td></td>
					<td>	
						<input type='hidden' name ='id' value='<?php echo $resultado['Id_cliente'] ?>'>
						<input type='submit' name='btnEditUsuario' value='Editar'  id = "btnEditar"/><br><br>
					</td>
				</tr>
			</table>
		</form>

	</div>
</body>
</html>